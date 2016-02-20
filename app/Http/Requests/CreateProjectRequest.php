<?php namespace Mom\Http\Requests;

use Mom\Http\Requests\Request;
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
            'title' => 'required|unique:projectmeta,title|min:3',
            //'owner_id' => 'required'
            'description' => 'required'
  
        ];
        // retrieves primary key to ignore 'project name already exist' error
        // if keeping the same name on edit/update 
        if($this['_method'] == 'PUT'){
            $parameters     = Route::current()->parameters();
            $project_id     = array_values($parameters)[0];
            $rules['title']  = "required|unique:projectmeta,title,$project_id,project_id|min:3";
            //$rules['owner_id']  = "required|unique:projectmeta,owner_id,$project_id,project_id";
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
            'title.required'        => 'The project name field is required.',
            'title.unique'          => 'The project ' . Request::get('title') . ' already exists.',
            //'owner_id.required'     => 'A project owner is required.',
            'description.required'  => 'The project\'s description field is required.',
        ];
       
    }
}
