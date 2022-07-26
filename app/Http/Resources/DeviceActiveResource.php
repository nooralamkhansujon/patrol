<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceActiveResource extends JsonResource
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
            'id'               => $this->device->id,
            'name'             => $this->device->name,
            'device_number'    => $this->device?->device_number,
            'mode'             => $this->device->mode,
            'organization_id'  => $this->device?->organization?->id,
            'organizationName' => $this->device?->organization?->name,
            'beep'             => $this?->device?->deviceSetting?->sound,
            'ele'              => $this?->ele,
            'description'      => $this->device?->description,
            'lastReadTime'     => date('Y-m-d H:i:s',strtotime($this->last_scan_time)),
            'model'            => $this?->device?->model,
            'patrolmanId'      => $this?->device?->owner?->id,
            'patrolmanName'    => $this?->device?->owner?->name,
            'reCode'        => $this?->device?->device_number,
            'userId'        => null,
            'customerId'    => null,
            'customerName'  => null,
            'delFlag'       => 0,
            'deviceLines'   => $this->device?->deviceLines->count()?DeviceRouteResource::collection($this->device?->deviceLines):[],
            'clockGroupId'  => $this?->deviceSetting?->clock,
            'created_at'    => date('Y-m-d',strtotime($this->created_at))
        ];
    }
}
