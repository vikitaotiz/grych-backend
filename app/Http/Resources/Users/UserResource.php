<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'phone' => $this->phone,
            'id_number' => $this->id_number,
            'email' => $this->email,
            'department_id' => $this->department_id,
            'role_id' => $this->role_id,
            'services' => $this->services,
            'email' => $this->email,
            'password' => $this->password,
            'created_at' => $this->created_at->format('H:m A D M Y'),
            'role' => $this->role->name,
            'department' => $this->department->name
        ];
    }
}
