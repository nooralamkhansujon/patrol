<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceRouteResource extends JsonResource
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
            'device' => $this->device,
            'device_name' => $this->device?->device_name,
            'device_number' => $this->device?->device_number,
            'routeId'  => $this->route?->id,
            'route_name'  => $this->route?->name,
        ];
    }
}