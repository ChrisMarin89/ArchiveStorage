<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
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
        //dd($this->user);
        if($this->user){
            return [
                'name' => 'required|max:255',
                'lastname' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $this->user,
                //'email' => ['required','email','max:255',Rule::unique('users')->ignore($this->user),],
                'password' => 'min:6|confirmed',
            ];
        }else{
            return [
                'name' => 'required|max:255',
                'lastname' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'min:6|confirmed',
            ];
        }
    }
}
