<?php

namespace ParthShukla\Rbac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * MenuPutRequest class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class MenuPutRequest extends FormRequest
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
            'name' => 'required|max:32|unique:menu,name,'.$this->id,
            'displayName'=> 'nullable|max:32',
            'parentId' => 'nullable|int|exists:menu,id',
            'displayOrder' => 'nullable|int',
            'status' => 'nullable|in:active',
            'permissionId' => 'nullable|exists:permissions,id',
            'icon' => 'nullable|max:32',
            'route' => 'nullable|max:63',
        ];
    }
}
// end of class MenuPutRequest
// end of file MenuPutRequest.php
