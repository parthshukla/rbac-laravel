<?php

namespace ParthShukla\Rbac\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * MenuPostRequest class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class MenuPostRequest extends FormRequest
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
            'name' => 'required|max:32|unique:menu,name',
            'displayName'=> 'nullable|max:32',
            'parentId' => 'nullable|int|exists:menu,id',
            'displayOrder' => 'nullable|int',
            'status' => 'nullable|in:active'
        ];
    }
}
// end of class MenuPostRequest
// end of file MenuPostRequest.php
