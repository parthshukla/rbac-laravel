<?php

namespace ParthShukla\Rbac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * RolePostRequest class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RolePostRequest extends FormRequest
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

    //-------------------------------------------------------------------------

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:roles,name|max:64',
            'description' => 'max:64'
        ];
    }

    //-------------------------------------------------------------------------

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.unique' => 'Role name already exists',
        ];
    }
}
// end of class RolePostRequest
// end of file RolePostRequest
