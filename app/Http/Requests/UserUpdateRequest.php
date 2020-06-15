<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        //dd($this->manageuser);
        return [
            'name'      => 'required',
            'username'  => 'required|unique:users,username,' . $this->manageuser,
            'email'     => 'required|unique:users,email,'. $this->manageuser
        ];
    }
}
