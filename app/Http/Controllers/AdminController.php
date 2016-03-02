<?php

namespace Mom\Http\Controllers;

use Illuminate\Http\Request;

use Mom\Http\Requests;
use Mom\Models\ProjectMeta;
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
        $projects = ProjectMeta::with('dates')->orderBy('updated_at', 'DESC')->get();
        // remove 'projects:' from project_id to only have the integers
        foreach($projects as $project){
            $id = explode(':', $project->project_id);
            $project->project_id = array_pop($id);
        }
        return view('pages.admin.index', compact('projects'));
    }

}
