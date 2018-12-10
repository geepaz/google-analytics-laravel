<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'fname' => 'required|string|max:100',
                    'lname' => 'required|string|max:100',
                    'email' => 'required|unique:users,email|max:150',
                    'password' => 'required|string|min:6|confirmed',
                    'role' => 'required|in:user,admin'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                if(@$request->password){
                    return [
                        'fname' => 'required|string|max:100',
                        'lname' => 'required|string|max:100',
                        'email' => 'required|unique:users,email,'.$this->user->id.'|max:150',
                        'password' => 'string|min:6|confirmed',
                        'role' => 'required|in:user,admin'
                    ];
                }
                else{
                    return [
                        'fname' => 'required|string|max:100',
                        'lname' => 'required|string|max:100',
                        'email' => 'required|unique:users,email,'.$this->user->id.'|max:150',
                        'role' => 'required|in:user,admin'
                    ];
                }
                
            }
            default:break;
        }
    }
}