<?php

namespace ParthShukla\Rbac\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class RoleListForDropdownCollection
 *
 * @package ParthShukla\Rbac\Http\Resources
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RoleListForDropdownCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($data) {
                return [
                    'id' => $data->id,
                    'name' => $data->name
                ];
            }),
        ];
    }
}
//end of class RoleListForDropdownCollection
//end of file RoleListForDropdownCollection.php
