<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteCheckpointResource extends JsonResource
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
            'id'=>$this->id,
            'checkpoint_id'=>$this->checkpoint_id,
            'checkpoint'=>$this->checkpoint,
            'route'=>$this->route,
            'route_id'=>$this->route_id,
            'orderNum'=>$this->order_num
        ];
    }
}