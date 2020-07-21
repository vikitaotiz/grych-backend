<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'id_number' => $this->id_number,
            'phone' => $this->phone,
            'email' => $this->email,
            'role' => $this->role->name,
            'department' => $this->department->name,
            'created_at' => $this->created_at->format('H:m A D M Y')
        ];
    }
}
