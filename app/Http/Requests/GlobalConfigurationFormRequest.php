<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GlobalConfigurationFormRequest extends FormRequest
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
        //dd($this->globalconfig);
        if($this->globalconfig)  
            return [
                'name' => 'required|max:255|without_spaces|unique:global_configurations,name,' . $this->globalconfig,
                'description' => 'max:255',
                'value' => 'required|max:255',
                'type' => 'required|max:255',
            ];
        else 
            return [
                'name' => 'required|max:255|without_spaces|unique:global_configurations,name',
                'description' => 'max:255',
                'value' => 'required|max:255',
                'type' => 'required|max:255',
            ];
    }
}
