<?php

namespace ParthShukla\Rbac\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use ParthShukla\Rbac\Http\Resources\PermissionResource;

/**
 * RolePermissionResource class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class RolePermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'permissions' => PermissionResource::collection($this->permissions)
        ];
    }
}
// end of class RolePermissionResource
// end of file RolePermissionResource.php
