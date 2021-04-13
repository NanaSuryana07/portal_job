<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        $id = $this->profile;
        return [
            'position' => 'required|max:255',
            'company' => 'required|max:255',
            'salary' => 'required|numeric',
            'description' => 'required|max:4000',
            'image' => 'image|mimes:jpeg,png|min:10|max:7000',
        ];
    }
    public function message()
    {
        return [
            'position.required' => 'Position is required',
            'company.required' => 'Company is required',
            'salary.required' => 'Salary is required',
            'description' => 'Description is required',
        ];
    }
}
