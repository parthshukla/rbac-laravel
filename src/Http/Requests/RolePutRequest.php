<?php

namespace ParthShukla\Rbac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * RolePutRequest class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RolePutRequest extends FormRequest
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
            'name' => 'required|max:64|unique:roles,name,'.$this->id,
            'description' => 'max:64',
            "status" => 'required|in:active,blocked',
        ];
    }
}
// end of class RolePutRequest
// end of file RolePutRequest
