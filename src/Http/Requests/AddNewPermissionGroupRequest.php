<?php

namespace ParthShukla\Rbac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AddNewPermissionGroupRequest
 *
 * @package ParthShukla\Rbac\Http\Requests
 * @since 1.1.0
 * @version 1.1.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class AddNewPermissionGroupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:63|unique:permission_groups,name',
            'description' => 'string|max:255'
        ];
    }
}
//end of class AddNewPermissionGroupRequest
//end of file AddNewPermissionGroupRequest.php
