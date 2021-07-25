<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserRegistration extends FormRequest
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

    public function rules()
    {
		return [
            "name" => "required",
            "email" => "required|unique:users",
            "password" => "required|min:8",
			'password_confirmation' => 'required|min:8|same:password',
        ];
    }
}
