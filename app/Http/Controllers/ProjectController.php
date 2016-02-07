<?php

namespace App\Http\Controllers;

use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;

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
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $project = Project::create($request->all());
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
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
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
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
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
        $project = Project::findOrFail($id);

        $project->fill($request->all());
        $project->save();
        $project->touch();
        return redirect()
                ->to('project/' . $project->project_id)
                ->with('message', "Project {$project->name} updated successfully!");
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
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()
            ->to('project/')
            ->with('message', "Project {$project->name} deleted successfully!");
    }
}
