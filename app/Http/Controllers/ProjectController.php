<?php namespace Mom\Http\Controllers;

use Mom\Models\Project;
use Mom\Models\ProjectMeta;
use Mom\Models\NemoEntity;
use Mom\Http\Requests;
use Mom\Http\Controllers\Controller;
use Mom\Http\Requests\CreateProjectRequest;
use Carbon\Carbon;

class ProjectController extends Controller
{

    private function generateProjectNewID(){
        $latestID = NemoEntity::latestProject()->entities_id;
        // strip split string 'projects:#' into an array and add 1 with ':' delimiter
        $project_id = explode(':', $latestID);
        return 'projects:' . ($project_id[1] + 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = ProjectMeta::with('dates')->get();
        
        // remove 'projects:' from project_id to only have the integers
        foreach($projects as $project){
            $id = explode(':', $project->project_id);
            $project->project_id = array_pop($id);
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
        // Change view as needed
        return view('pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $project_id = ($this->generateProjectNewID());
        $title = $request->title;
        $description = $request->description;
        $start_date = $request->start_date;
        $end_date = $request->end_date  === "" ? NULL: $request->end_date;
        
        NemoEntity::create([
            'entities_id' => $project_id,
            'parent_entities_id' => 'departments:10390',
            'entity_type' => 'Project',
            'display_name' => $title,
            'description' => $description,
        ]);

        Project::create([
            'project_id' => $project_id,
            'start_date' => $start_date,
            'end_date'   => $end_date,
        ]);

        return redirect()->to('project');
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
        $project = ProjectMeta::findOrFail('projects:' . $id);
        $project->load('dates');
        $project->project_id = $id;
        
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
        $project = ProjectMeta::findOrFail('projects:' . $id);
        $project->load('dates');
        //dd($project);
        $project->project_id = $id;
        // Change view as needed
        return view('pages.projects.edit', compact('project'));
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
        $projectMeta = ProjectMeta::findOrFail('projects:' . $id);
        $projectMeta->fill([
            'title'         =>  $request->title,
            'description'   =>  $request->description,
        ]);
        $projectMeta->save();
        $projectMeta->touch();

        $project = Project::findOrFail('projects:' . $id);
        $project->fill([
            'start_date' =>  $request->start_date,
            'end_date'   =>  $request->end_date  === "" ? NULL: $request->end_date,
        ]);
        $project->save();
        $project->touch();

        return redirect()
                ->to('project/' . $id)
                ->with('message', "Project {$projectMeta->title} updated successfully!");
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
        $projectMeta = ProjectMeta::findOrFail('projects:' . $id);
        $projectMeta->delete();
        $project = Project::findOrFail('projects:' . $id);
        $project->delete();
        
        return redirect()
            ->to('project/')
            ->with('message', "Project {$projectMeta->title} deleted successfully!");
    }
}
