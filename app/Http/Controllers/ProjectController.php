<?php namespace Mom\Http\Controllers;

use Mom\Models\Project;
use Mom\Models\ProjectMeta;
use Mom\Models\NemoEntity;
use Mom\Models\NemoMembership;
use Mom\Models\User;
use Mom\Models\Role;
use Mom\Http\Requests;
use Mom\Http\Controllers\Controller;
use Mom\Http\Requests\CreateProjectRequest;
use Carbon\Carbon;

class ProjectController extends Controller
{

    /**
     * Generate new project_id.
     *
     * @return Integer project_id
     */
    private function generateProjectNewID() {
        $latestID = NemoEntity::where('entities_id', 'LIKE', 'projects:%')->latest()->first()->entities_id;
        // split string 'projects:#' into an array with ':' delimiter and then append 'projects:' after adding 1
        $project_id = explode(':', $latestID);
        return 'projects:' . (array_pop($project_id) + 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with(['meta', 'productOwner', 'scrumMaster', 'members'])->get();
        // remove 'projects:' from project_id to only have the integers
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
        $end_date = $request->end_date  === "" ? NULL: $request->end_date;
        // product_owner and scrum_master are required fields validated in CreateProjectRequest
        $product_owner = $request->product_owner;
        $scrum_master = $request->scrum_master;
        // expecting a list of user_id's
        $members = $request->members;
        // account for an empty array

        try {
            NemoEntity::create([
                'entities_id' => $project_id,
                'parent_entities_id' => 'departments:10390',
                'entity_type' => 'Project',
                'display_name' => $title,
                'description' => $description,
            ]);

             $project = Project::create([
                'project_id' => $project_id,
                'start_date' => $start_date,
                'end_date'   => $end_date,
            ]);
        } 
        catch (\PDOException $e) {
            // add some sort of notification of error
            return redirect()->back();
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
        $project = Project::with(['meta', 'productOwner', 'scrumMaster', 'members'])->findOrFail('projects:' . $id);
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
        $project = Project::with(['meta', 'productOwner', 'scrumMaster', 'members'])->findOrFail('projects:' . $id);
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
        $projectMeta = NemoEntity::findOrFail('projects:' . $id);
        try {
            $projectMeta->fill([
                'title'         =>  $request->title,
                'description'   =>  $request->description,
            ]);
            $projectMeta->save();
            $projectMeta->touch();
        } catch (\PDOException $e){
            // add some sort of notification of error
            return redirect()->back();
        }
        
        $project = Project::findOrFail('projects:' . $id);
        try {
            $project->fill([
                'start_date' =>  $request->start_date,
                'end_date'   =>  $request->end_date  === "" ? NULL: $request->end_date,
            ]);
            $project->save();
            $project->touch();
        } catch (\PDOException $e) {
            // add some sort of notification of error
            return redirect()->back();
        }

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
        $project = Project::with('meta', 'productOwner', 'scrumMaster', 'members')->findOrFail('projects:' . $id);
        $project->productOwner()->sync([]);
        $project->scrumMaster()->sync([]);
        $project->members()->sync([]);

        $project->delete();
        $projectMeta = NemoEntity::findOrFail('projects:' . $id);
        $projectMeta->delete();

        return redirect()
            ->to('project/')
            ->with('message', "Project {$project->meta->title} has been deleted successfully!");
    }
}
