<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'id'   => $this->id,
            'code' =>$this->code,
            'name' =>$this->name,
            'pId' =>$this->parent_id,
            'icon' => null,
            'open'=>true,
            'title'=>null,
            'nocheck'=>false,
            'isParent' =>false,
            'children' =>[],

        ];
    }
}
