<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanTimeResource extends JsonResource
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
            'uuid'=> $this->id,
            'id'=> $this->id,
            'start_time' => $this->start_time,
            'startTime' => $this->start_time,
            'endTime' => $this->end_time,
            'endTime' => $this->end_time,
            'task_id' => $this->task_id,
        ];
    }
}
