<?php

namespace ParthShukla\Rbac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * AssignPermissionRoleRequest
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class AssignPermissionRoleRequest extends FormRequest
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
            'role' => 'required|int|exists:roles,id',
            'permissions' => 'required|array',
            'permissions.*' => 'int|exists:permissions,id'
        ];
    }
}
// end of class AssignPermissionRoleRequest
// end of file AssignPermissionRoleRequest.php
