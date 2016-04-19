<?php

namespace Mom\Http\Controllers;

use Illuminate\Http\Request;

use Mom\Http\Requests;
use Mom\Http\Requests\StudentRequest;
use Mom\Http\Controllers\Controller;
use Mom\Models\NemoMembership;
use Mom\Models\User;
use Mom\Models\BedrockRegistry;

class AdminController extends Controller
{
    
    /**
     * Middleware for controller.
    */
    public function __construct(){
    	$this->middleware('auth');
    	$this->middleware('admin');
    }

    /**
     * View for admin dashboard.
     *
     * @return View
    */
    public function dashboard(){
    	return view('pages.admin.dashboard');
    }

    /**
     * View to manage students from META+Lab.
     *
     * @return View
    */
    public function studentsIndex(){
        $students = User::students()->lists('display_name', 'user_id');

    	return view('pages.admin.manage-students.index', compact('students'));
    }

    /**
     * View to add students to META+Lab.
     *
     * @return View
    */
    public function studentsAddMembership(){
        $students = User::students()->lists('display_name', 'user_id');

        return view('pages.admin.manage-students.add', compact('students'));
    }

    /**
     * Give student membership to META+Lab.
     *
     * @param  StudentRequest $request
     * @return \Illuminate\Http\Response
    */
    public function postStudentsAddMembership(StudentRequest $request){
        // Cannot check if members:# exists on StudentRequest custom form because
        // it does not recognize bedrock.registry
        // BedrockRegistry was created with entities_id as primary key
        // find returns null if no record/row found
        if(empty(BedrockRegistry::find('members:' . $request->input('student_id'))))
            return redirect()->back()->withErrors('Invalid Student ID.');

    	try{
    		NemoMembership::firstOrCreate([
    			'parent_entities_id' 	=> 'departments:10390',
    			'individuals_id'		=> 'members:' . $request->input('student_id'),
    			'role_position'			=> 'student',
    		]);
    	} catch (\PDOException $e){
    		return redirect()->back()->withErrors($e->getMessage());
    	}

        return redirect()->back()->with('message', 'Student membership successfully added.');
    }


    /**
     * Returns students with META+Lab department
     *
     * @return User
     */
    public function studentsRemoveMembership(){
        $students = User::students()->lists('display_name', 'user_id');

        return view('pages.admin.manage-students.delete', compact('students'));
    }

    /**
     * Remove student membership from META+Lab.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postStudentsRemoveMembership(Request $request){
        $record = NemoMembership::where('parent_entities_id', 'departments:10390')
                                ->where('individuals_id', $request->input('individuals_id'))
                                ->where('role_position', 'student')
                                ->delete();

        if($record)                     
            return redirect('admin/manage-students/remove')->with('message', 'Student membership successfully removed.');
        else 
            return redirect()->back()->withErrors('An error occured when removing student membership.');
    }
}
