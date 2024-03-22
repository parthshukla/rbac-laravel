<?php

namespace ParthShukla\Rbac\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * MenuCollection class
 *
 * @since 1.0.0
 * @version 1.0.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class MenuCollection extends ResourceCollection
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
                    'name' => $data->name,
                    'displayName' => empty($data->display_name) ? "" : $data->display_name,
                    'parentId' => empty($data->parent_id) ? "" : $data->parent_id,
                    'displayOrder' => $data->display_order,
                    'status' => $data->status,
                    'parentName' => $data->parent_name,
                    'icon' => empty($data->icon) ? "" : $data->icon,
                    'route' => empty($data->route) ? "" : $data->route,
                ];
            }),
            'pagination' => [
                'totalResult' => $this->total(),
                'count' => $this->count(),
                'per_page' => $this->perPage(),
                'current_page' => $this->currentPage(),
                'total_pages' => $this->lastPage()
            ]
        ];
    }
}
// end of class MenuCollection
// end of file MenuCollection.php
