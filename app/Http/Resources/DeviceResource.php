<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
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
            'id'               => $this->id,
            'name'             => $this->name,
            'device_number'    => $this->device_number,
            'mode'             => $this->mode,
            'organization_id'  => $this->organization->id,
            'organizationName' => $this->organization?->name,
            'beep'             => $this?->deviceSetting?->sound,
            'ele'              => $this?->deviceActivities?->ele,
            'description'      => $this->description,
            'lastReadTime'     => date('Y-m-d H:i:s',strtotime($this->deviceActivities->last_scan_time)),
            'model'            => $this->model,
            'patrolmanId'      => $this?->owner?->id,
            'patrolmanName'    => $this?->owner?->name,
            'reCode'        => $this?->device_number,
            'userId'        => null,
            'customerId'    => null,
            'customerName'  => null,
            'delFlag'       => 0,
            'deviceLines'   => $this->deviceLines,
            'clockGroupId'  => $this?->deviceSetting?->clock,
            'created_at'    => date('Y-m-d',strtotime($this->created_at))

        ];

    }
}