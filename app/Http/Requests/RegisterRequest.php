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
            'type' => 'required',
            'name' => 'required|string|max:150',
            'phone' => 'required|min:10|max:10|unique:users,phone',
            'password' =>'required|string|min:8'
        ];
        if($request->email){
            $rule['email']='required|string|email|max:255|unique:users';
        }
        if($request->referral_code){
            $rule['referral_code']='exists:users,referrer_code';
        }
        if($request->pincode){
            $rule['pincode']='exists:pincodes,pincode';
        }
        if($request->type == 'associate'){
            $rule['aadhar_number']='required';
        }

        return $rule;
    }
}
