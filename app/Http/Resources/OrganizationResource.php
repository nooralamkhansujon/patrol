<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
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
            'name' =>$this->name,
            'title'=>null,
            'pId' =>$this->parent_id,
            'icon' => null,
              'open'=>true,
              'title'=>null,
              'nocheck'=>false,
              'isParent' =>false,
              'children'=>[],
              'dataId'=>null,
              'icon'=>null,
              'typeId'=>0
        ];
    }
}
