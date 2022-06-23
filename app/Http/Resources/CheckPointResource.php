<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckPointResource extends JsonResource
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
            'id'          => $this->id,
            'name'         => $this->name,
            'code_number'        => $this->code_number,
            'organization' => $this?->organization?->name,
            'organization_id' => $this?->organization?->id,
            'description'       => $this->description,
            'creation_time'     => $this->creation_time,
        ];
    }
}
