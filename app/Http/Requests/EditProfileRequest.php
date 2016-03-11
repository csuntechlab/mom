<?php

namespace Mom\Http\Requests;

use Mom\Http\Requests\Request;

class EditProfileRequest extends Request
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
            'profile_image'  => 'image',
            'linkedin_url'   => 'url',
            'github_url'     => 'url',
            'portfolium_url' => 'url',
            // 'skill'          => 'required',
            // 'skills'         => 'required',
            // 'experience'     => 'required',
            // 'background'     => 'required'
        ];

        // foreach($this->request->get('skills') as $key)
        // {
        //     $rules['skills'] = 'required';
        // }

        return $rules;
    }

    // Return custom messages
    public function messages()
    {
        return [
            'profile_image.image' => 'Acceptable file types for profile image are .jpg, .png, .svg, .bmp',
            'linkedin_url.url'    => 'LinkedIn url is not valid',
            'github_url.url'      => 'GitHub url is not valid',
            'portfolium_url.url'      => 'Portfolium url is not valid',
            'skill.required'      => 'A minimum of 1 skill is required',
            'experience.required' => 'A minimum of 1 experience is required',
            'background.required' => 'A minimum of 1 background is required'        
        ];
    }
}
