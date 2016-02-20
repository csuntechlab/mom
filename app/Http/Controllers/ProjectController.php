<?php namespace Mom\Http\Controllers;

use Mom\Models\Project;
use Mom\Http\Requests;
use Mom\Http\Controllers\Controller;
use Mom\Http\Requests\CreateProjectRequest;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
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
        Project::create($request->all());
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
        $project = Project::findOrFail('projects:' . $id);
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
        $project = Project::findOrFail('projects: ' . $id);
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
        $project = Project::findOrFail('projects:' . $id);

        $project->fill($request->all());
        $project->save();
        $project->touch();
        return redirect()
                ->to('project/' . $project->project_id)
                ->with('message', "Project {$project->title} updated successfully!");
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
        $project = Project::findOrFail('projects: ' . $id);
        $project->delete();

        return redirect()
            ->to('project/')
            ->with('message', "Project {$project->title} deleted successfully!");
    }
}
