<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReceptionUpdateRequest extends FormRequest
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
            //'client_id'     => 'required',
            'equipment_id'  => 'required',
            'description'   => 'required|max:512:',
            'reason_id'     => 'required',
            'concept'       => 'required|max:4000',
            'model'         => 'max:500',
            'battery'       => 'max:500',
            'charge'        => 'max:500',
            //'status' => 'required|in:WAITING,RECEIVED'

        ];

        if($this->get('image'))        
            $rules = array_merge($rules, ['image'         => 'mimes:jpg,jpeg,png']);
        
        return $rules;
    }
}
