<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionFormRequest extends FormRequest
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
        //dd($this->permission);
        if($this->permission)   return ['name' => 'required|max:255|unique:permissions,name,' . $this->permission,];
        else                    return ['name' => 'required|max:255|unique:permissions,name'];
    }
}
