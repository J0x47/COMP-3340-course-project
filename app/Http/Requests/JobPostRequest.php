<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
        return [
            'job_title'=>'required|min:10',
            'description'=>'required',
            'city'=>'required',
            'region'=>'required',
            'due_date'=>'required',
            'vacancy'=>'required|numeric',
            'experience'=>'required|numeric'
        ];
    }
}
