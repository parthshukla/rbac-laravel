<?php

namespace ParthShukla\Rbac\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * MenuResource class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class MenuResource extends JsonResource
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
            'displayName' => empty($this->display_name) ? "" : $this->display_name ,
            'parentId' => empty($this->parent_id) ? 0 : $this->parent_id,
            'displayOrder' => $this->display_order,
            'status' => $this->status
        ];
    }
}
// end of class MenuResource
// end of file MenuResource.php
