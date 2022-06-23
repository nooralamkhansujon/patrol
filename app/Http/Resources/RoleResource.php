<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected $withPermissions;
    public function __construct($resource, $withPermissions=false) {
        // Ensure we call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        $this->withPermissions = $withPermissions;
    }

    public function toArray($request)
    {
        $data=  [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
        ];
        if($this->withPermissions){
          $data['permissions'] = $this->permissions;
        }
        return $data;
    }
}
