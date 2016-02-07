<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Route;

class CreateProjectRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|unique:projects,name|min:3',
  
        ];
        // retrieves primary key to ignore 'project name already exist' error
        // if keeping the same name on edit/update 
        if($this['_method'] == 'PUT'){
            $parameters     = Route::current()->parameters();
            $project_id     = array_values($parameters)[0];
            $rules['name']  = "required|unique:projects,name,$project_id,project_id|min:3";
        }
        return $rules;

    }

    /**
     * Get the custom messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'     => 'The project name field is required.',
            'name.unique'       => 'The project ' . CreateProjectRequest::get('name') . ' already exists.',

        ];
       
    }
}
