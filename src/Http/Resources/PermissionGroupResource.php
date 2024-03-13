<?php

namespace ParthShukla\Rbac\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PermissionGroupResource
 *
 * @since 1.1.0
 * @version 1.1.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class PermissionGroupResource extends JsonResource
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
            'status' => $this->is_active ? "Active" : "Inactive",
            'permissions' => PermissionResource::collection($this->permissions)
            ];
    }
}
//end of class PermissionGroupResource
//end of file PermissionGroupResource.php
