<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatrolTaskResource extends JsonResource
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
            "areaName" => $this->route?->organization->name,
            "building" => $this->building,
            "cycle"    => $this->cycle,
            "dayPlanTimeData" =>PlanTimeResource::collection($this->planTimes),
            "endDate"   =>  $this->end_date,
            "fri"       => $this->fri,
            "id"        =>  $this->id,
            "route_id"  =>  $this->route_id,
            "lineName"  =>  $this->route?->name,
            "lineId"  =>  $this->route?->id,
            "mon"       => $this->mon,
            "name"      => $this->name,
            "planTimes" =>PlanTimeResource::collection($this->planTimes),
            "reCreate"  => $this->reCreate,
            "sat"       => $this->sat,
            "startDate" => $this->start_date,
            "sun"       => $this->sun,
            "thu"       => $this->thu,
            "tue"       => $this->tue,
            "type"      => $this->type,
            "wed"       => $this->wed
        ];
    }
}