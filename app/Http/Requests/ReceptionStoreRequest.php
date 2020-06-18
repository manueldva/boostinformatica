<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceptionStoreRequest extends FormRequest
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
       $rules = [
            'client_id'     => 'required',
            'equipment_id'  => 'required',
            'description'   => 'required',
            'reason_id'     => 'required',
            'concept'       => 'required',
            'status'        => 'required|in:PROCESS,RECEIVED'

        ];

         if($this->get('codmanual')) // si codmanual esta chequeado agrega validacion para que se cargue el codigo
            $rules = array_merge($rules, ['codigo' => 'required|integer|min:1']);


        if($this->get('image'))        
            $rules = array_merge($rules, ['image'         => 'mimes:jpg,jpeg,png']);
        
        return $rules;
    }
}
