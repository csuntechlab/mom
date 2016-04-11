<?php namespace Mom\Http\Requests;

use Mom\Http\Requests\Request;
use Route;
use DateTime;

class ProjectRequest extends Request
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
            'title'         => 'required|unique:projectmeta,title|min:3',
            'project_link'  => 'url',
            'description'   => 'required',
            'start_date'    => 'required|date_format:Y-m-d',
            // if value is entered, then it will be validated and must be after start_date
            'end_date'      => 'date_format:Y-m-d',
            // 'product_owner' => 'required',
            // 'scrum_master'  => 'required',
        ];

        // check whether start_date input is properly formatted; if so, apply after
        if(Request::has('start_date')){
            $date_format = 'Y-m-d';
            $start_date = Request::get('start_date');

            $start_date = trim($start_date);
            $date = strtotime($start_date);

            if(date($date_format, $date) == $start_date)
                // if date_format fails, bail will prevent 'after' from validating
                $rules['end_date'] = "bail|date_format:Y-m-d|after:$start_date";
        }
        // retrieves primary key to ignore 'project name already exist' error
        // if keeping the same name on edit/update 
        if($this['_method'] == 'PUT'){
            $parameters     = Route::current()->parameters();
            $project_id     = 'projects:' . array_values($parameters)[0];
            $rules['title'] = "required|unique:projectmeta,title,$project_id,project_id|min:3";
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
            'description.required'  => 'The project\'s description field is required.',
            'end_date.after'        =>  'The estimated end date must be a after the ' . Request::get('start_date') . ' date.',
        ];
       
    }
}
