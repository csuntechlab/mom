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
        $projects = ProjectMeta::with('dates')->get();
        return view('pages.admin.index', compact('projects'));
    }

    public function getCreateProject()
    {

    }

    public function postCreateProject()
    {

    }

    public function editProject()
    {

    }

    public function postEditProject()
    {

    }

}
