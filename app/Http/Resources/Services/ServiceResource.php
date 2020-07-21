<?php

namespace App\Http\Resources\Services;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'users' => $this->users,
            'status' => $this->status,
            'created_at' => $this->created_at->format('H:m A D M Y')
        ];
    }
}
