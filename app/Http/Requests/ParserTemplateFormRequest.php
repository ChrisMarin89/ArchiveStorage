<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParserTemplateFormRequest extends FormRequest
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
        //dd($this->parsertemplate);
        if($this->parsertemplate)  
            return [
                'name' => 'required|max:255|without_spaces|unique:global_configurations,name,' . $this->parsertemplate,
                'description' => 'max:255',
                'value' => 'required',
            ];
        else 
            return [
                'name' => 'required|max:255|without_spaces|unique:global_configurations,name',
                'description' => 'max:255',
                'value' => 'required',
            ];
    }
}
