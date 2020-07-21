<?php

namespace App\Http\Resources\Operations;

use Illuminate\Http\Resources\Json\JsonResource;

class OperationResource extends JsonResource
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
            'service' => $this->service,
            'payment_frequency' => $this->payment_frequency,
            'amount' => $this->amount,
            'user' => $this->user->name,
            'client' => $this->user_name,
            'client_id' => $this->user_id_number,
            'created_at' => $this->created_at->format('H:m A D M Y')
        ];
    }
}
