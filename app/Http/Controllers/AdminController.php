<?php

namespace Mom\Http\Controllers;

use Illuminate\Http\Request;

use Mom\Models\User;
use Mom\Http\Requests;
use Mom\Models\Project;
use Mom\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Serve up the index page for the admins.
     * List the projects at metalab.
     * @return view
     */
    public function getIndex() 
    {
        $projects = Project::with('meta', 'productOwner', 'scrumMaster', 'members')->orderBy('updated_at', 'DESC')->get();
        // remove 'projects:' from project_id to only have the integers
        foreach($projects as $project){
            $id = explode(':', $project->project_id);
            $project->project_id = array_pop($id);
            $project->productOwner =  count($project->productOwner) ? $project->productOwner[0] : new User();
            $project->scrumMaster =  count($project->scrumMaster) ? $project->scrumMaster[0] : new User();
        }
        return view('pages.admin.index', compact('projects'));
    }

}
