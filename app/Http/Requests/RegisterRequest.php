<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rule = [
            'type'          => 'required',
            'name'          => 'required|string|max:150',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      =>'required|string|min:8',
            'phone'         => 'required|min:10|max:10|unique:users,phone',
            'agree'         => 'required',
        ];

        // Add sponsor_code validation only if type is 'agent'
        if ($request->input('type') === 'agent') {
            $rule['sponsor_code'] = 'nullable|exists:users,user_name,type,agent';
        }

        return $rule;
    }
}
