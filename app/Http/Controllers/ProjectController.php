<?php namespace Mom\Http\Controllers;

use Mom\Traits\ImageHandler;

use Mom\Models\Image;
use Mom\Models\Project;
use Mom\Models\ProjectMeta;
use Mom\Models\NemoEntity;
use Mom\Models\LinkEntity;
use Mom\Models\User;
use Mom\Models\Role;
use Mom\Http\Requests;
use Mom\Http\Controllers\Controller;
use Mom\Http\Requests\CreateProjectRequest;
use Carbon\Carbon;

class ProjectController extends Controller
{
    // trait used to handle image resizing using Intervention
    // found in app\Traits\ImageHandler.php
    use ImageHandler;

    public function __construct(){
        $this->middleware('admin', ['except' => [
            'work',
        ]]);
    }

    /**
     * Generate new project_id.
     *
     * @return Integer project_id
     */
    private function generateProjectNewID() {
        $latestID = NemoEntity::where('entities_id', 'LIKE', 'projects-mom:%')->latest()->first();

        if (is_null($latestID)) {
            return "projects-mom:0";
        }
        else {
        // split string 'projects-mom:#' into an array with ':' delimiter and then append 'projects-mom:' after adding 1
        $project_id = explode(':', $latestID->entities_id);
        return 'projects-mom:' . (array_pop($project_id) + 1);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $projects = Project::with(['meta', 'productOwner', 'scrumMaster', 'members', 'image', 'link'])->get();
        // remove 'projects-mom:' from project_id to only have the integers
        // Take into account projects with no product owner and scrum master
        // if count > 0 then it is true
        foreach($projects as $project) {
            $id = explode(':', $project->project_id);
            $project->project_id = array_pop($id);
            $project->productOwner =  count($project->productOwner) ? $project->productOwner[0] : new User();
            $project->scrumMaster =  count($project->scrumMaster) ? $project->scrumMaster[0] : new User();
        }
        // Change view as needed
        return view('pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status', 'Active')->get()->lists('display_name', 'user_id');
        // Change view as needed
        return view('pages.projects.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        // CreateProjectRequest validates both models columns
        // project_id must be generated by retrieving most recent one 
        // from entities table in nemo
        $project_id = ($this->generateProjectNewID());
        $title = $request->title;
        $description = $request->description;
        $start_date = $request->start_date;
        $end_date = $request->end_date  === "" ? NULL : $request->end_date;
        $sponsor = $request->sponsor;
        // product_owner and scrum_master are required fields validated in CreateProjectRequest
        $product_owner = $request->product_owner;
        $scrum_master = $request->scrum_master;
        // expecting a list of user_id's
        $members = $request->members;

        //Hide Project was toggled
        $confidential = 0;
        if($request->hidden_toggle == "set"){
            $confidential = 1;
        }

        // account for an empty array

        try {
            NemoEntity::create([
                'entities_id' => $project_id,
                'parent_entities_id' => 'departments:10390',
                'entity_type' => 'Project',
                'display_name' => $title,
                'description' => $description,
                'confidential' => $confidential,
            ]);

             $project = Project::create([
                'project_id' => $project_id,
                'start_date' => $start_date,
                'end_date'   => $end_date,
                'sponsor'    => $sponsor,
            ]);

             if($request->hasFile('project_image'))
             {
                $image = $request->file('project_image');
                $time = time();
                $smImage = 'sm_' . $time . $image->getClientOriginalName();
                $lgImage = 'lg_' . $time . $image->getClientOriginalName();

                $this->resizeImage($image, 150, 150, '/imgs/projects/' . $smImage);
                $this->resizeImage($image, 290, 175, '/imgs/projects/' . $lgImage);

                $image->move('imgs/projects/', $image->getClientOriginalName());

                Image::create([
                    'imageable_id'   => $project_id,
                    'imageable_type' => 'Mom\Models\Project',
                    'src'            => $time . $image->getClientOriginalName()
                ]);

             }

        } 
        catch (\PDOException $e) {
            // add some sort of notification of error
            return redirect()->back();
        }
        if($request->url){
            LinkEntity::create([
                'entities_id' => $project_id,
                'link_id'     => 5,
                'link_url'    => $request->url
            ]);
        }

        // lazy load relationships to add PO, SM, and members.
        $project->load('meta', 'productOwner', 'scrumMaster', 'members');
        // Only add product_owner and scrum_master roles into the project if $product_owner and $scrum_master exists
        if(!empty($product_owner))
            $project->productOwner()->sync([$product_owner => ['role_position' => 'product_owner']]);
        if(!empty($scrum_master))
            $project->scrumMaster()->sync([$scrum_master => ['role_position' => 'scrum_master']]);

        $membersToAdd = array();
        // $members comes in as an array 
        if(isset($members)) {
            foreach ($members as $value) {
                $membersToAdd[$value] = ['role_position' => 'member'];
            }
        }
        $project->members()->sync($membersToAdd);

        return redirect()->to('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // Look in app/Exceptions/Handler.php for how a
        // ModelNotFoundException exception will be caught for
        // findOrFail under the /project URI
        // eager load relationships as well
        $project = Project::with(['meta', 'productOwner', 'scrumMaster', 'members'])->findOrFail('projects-mom:' . $id);
        $project->project_id = $id;
        
        // Take into account projects with no product owner and scrum master
        // if count > 0 then it is true
        $project->productOwner =  count($project->productOwner) ? $project->productOwner[0] : new User();
        $project->scrumMaster =  count($project->scrumMaster) ? $project->scrumMaster[0] : new User();
        
        // Change view as needed
        return view('pages.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Look in app/Exceptions/Handler.php for how a
        // ModelNotFoundException exception will be caught for
        // findOrFail under the /project URI
        // eager load relationships as well
        $project = Project::with(['meta', 'productOwner', 'scrumMaster', 'members', 'image', 'link'])->findOrFail('projects-mom:' . $id);
        $project->project_id = $id;

        // Take into account projects with no product owner and scrum master
        // if count > 0 then it is true
        $project->productOwner = count($project->productOwner) ? $project->productOwner[0] : new User();
        $project->scrumMaster  = count($project->scrumMaster) ? $project->scrumMaster[0] : new User();
        $users = User::where('status', 'Active')->get()->lists('display_name', 'user_id');
        // Change view as needed
         
        //return members to the view as well.
        $members = $project->members->pluck('user_id')->toArray();

        return view('pages.projects.edit', compact('project', 'users', 'members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProjectRequest $request, $id)
    {     
        // Look in app/Exceptions/Handler.php for how a
        // ModelNotFoundException exception will be caught for
        // findOrFail under the /project URI
        // Columns are updated in their respective models
        $projectMeta = NemoEntity::findOrFail('projects-mom:' . $id);

        //Hide Project was toggled
        $confidential = 0;
        if($request->hidden_toggle == "set"){
            $confidential = 1;
        }

        try {
            $projectMeta->fill([
                'display_name'  =>  $request->title,
                'description'   =>  $request->description,
                'confidential'  =>  $confidential
            ]);
            $projectMeta->save();
            $projectMeta->touch();
        } catch (\PDOException $e){
            // add some sort of notification of error
            return redirect()->back();
        }
        
        $project = Project::findOrFail('projects-mom:' . $id);
        try {
            $project->fill([
                'start_date' =>  $request->start_date,
                'end_date'   =>  $request->end_date  === "" ? NULL: $request->end_date,
                'sponsor'    =>  $request->sponsor,
            ]);
            $project->save();
            $project->touch();
        } catch (\PDOException $e) {
            // add some sort of notification of error
            return redirect()->back();
        }

        $projectImage = Image::where('imageable_id', 'projects-mom:' . $id)->first();

        $file = $request->file('project_image');
        
        // Does incoming request have a file uploaded
        if($request->hasFile('project_image'))
        {  
            $image = $request->file('project_image');
            $time = time();
            $smImage = 'sm_' . $time . $image->getClientOriginalName();
            $lgImage = 'lg_' . $time . $image->getClientOriginalName();

            $this->resizeImage($image, 150, 150, '/imgs/projects/' . $smImage);
            $this->resizeImage($image, 290, 175, '/imgs/projects/' . $lgImage);

            // Does the project already have an image saved in DB?
            if($projectImage)
            {
                // Yes, so delete old images
                $files = [
                    'imgs/projects/' . 'sm_' . $projectImage->src,
                    'imgs/projects/' . 'lg_' . $projectImage->src
                ];

                \File::delete($files);

                // and update images table
                $projectImage->update([
                    'src' => $time . $image->getClientOriginalName()
                ]);
            }

            // No image has ever been uploaded for project so create one
            else 
            {
                Image::create([
                    'imageable_id'   => 'projects-mom:' . $id,
                    'imageable_type' => 'Mom\Models\Project',
                    'src'            => $time . $image->getClientOriginalName()
                ]);
            }
            
        }

        $linkEntity = LinkEntity::updateOrCreate(
            ['entities_id'=>'projects-mom:'.$id, 'link_id'=>5], 
            ['link_url' => $request->url]
        );

        // lazy load relationships to update PO, SM, and members. Also title and description (meta).
        $project->load('productOwner', 'scrumMaster', 'members', 'meta');

        // Checks to see if the product owner or scrum master slots are empty strings before syncing.
        // The sync method accepts an array of IDs with it's associated role to store. 
        // If Any IDs with it's associated role are not in the given array that were on the table before, will be removed.
        // Must use associate array to attach the role to members id as a key
        $emptyArr = array();
        if(!empty($request->product_owner))
            $project->productOwner()->sync([$request->product_owner => ['role_position' => 'product_owner']]);
        else
            $project->productOwner()->sync($emptyArr);
        
        if(!empty($request->scrum_master))
            $project->scrumMaster()->sync([$request->scrum_master => ['role_position' => 'scrum_master']]);
        else 
            $project->scrumMaster()->sync($emptyArr);

        // Update members in this project with sync as well
        $updatedMembers = array(); 
        if(isset($request->members)) {
            foreach ($request->members as $value) {
                $updatedMembers[$value] = ['role_position' => 'member'];
            }
        }
        $project->members()->sync($updatedMembers);
        
        return redirect()
                ->to('admin')
                ->with('message', "Project {$project->meta->title} updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Look in app/Exceptions/Handler.php for how a
        // ModelNotFoundException exception will be caught for
        // findOrFail under the /project URI
        // Must be deleted on both models
        // projects and respective relationships are just being deleted for testing purposes
        $project = Project::with('meta', 'productOwner', 'scrumMaster', 'members')->findOrFail('projects-mom:' . $id);
        $project->productOwner()->sync([]);
        $project->scrumMaster()->sync([]);
        $project->members()->sync([]);

        $project->delete();
        $projectMeta = NemoEntity::findOrFail('projects-mom:' . $id);
        $projectMeta->delete();

        return redirect()
            ->to('project/')
            ->with('message', "Project {$project->meta->title} has been deleted successfully!");
    }

    public function work(){
        $projects = Project::with([
            'meta', 'image',
            'productOwner.profile.links', 'productOwner.profile.skills', 'productOwner.profile.experience', 'productOwner.profile.image',
            'scrumMaster.profile.links', 'scrumMaster.profile.skills', 'scrumMaster.profile.experience', 'scrumMaster.profile.image', 
            'members.profile.links', 'members.profile.skills', 'members.profile.experience', 'members.profile.image',
            'link'
            ])
            ->paginate(5);
        foreach($projects as $project) {
            $project->productOwner =  count($project->productOwner) ? $project->productOwner[0] : new User();
            $project->scrumMaster =  count($project->scrumMaster) ? $project->scrumMaster[0] : new User();

            //return $projects;
        }

        
        return view('pages.projects.work', compact('projects'));
    }
}
