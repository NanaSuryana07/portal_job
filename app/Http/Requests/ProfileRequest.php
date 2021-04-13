<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'address' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:5,13',
            'ed_ex' => 'required|max:4000',
            'photo' => 'required|image|mimes:jpeg,png|min:10|max:7000',
            'cv' => 'required|file|mimes:docx,pdf|min:1|max:10000'
        ];
    }
    public function message()
    {
        return [
            'address.required' => 'Address is required',
            'phone.required' => 'Phone number is required',
            'ed_ex' => 'Education and Experience are required',
            'photo' => 'Photo is required',
            'cv' => 'CV is required',
        ];
    }
}
