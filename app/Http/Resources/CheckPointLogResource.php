<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckPointLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date = new DateTime();
        $date->setTimestamp($this->create_time);
        $createTime = $date->format('Y-m-d H:i:s');
        return [
            'id' => $this->id,
            'areaName' => $this->checkpoint?->organization?->name,
            'checkpoint' => $this->checkPoint,
            'checkpointId' => $this->checkpoint_id,
            // 'createTime' => $this->create_time,
            'createTime' => $createTime,
            'device' => $this->device,
            'deviceId' => $this->device_id,
            'eventLogs' => [], // may be use in future
            'patrolmanId' => $this->patrolman_id,
            'patrolmanName' => $this->patrolman?->name,
            'uuid' => $this->id,

        ];
    }
}
