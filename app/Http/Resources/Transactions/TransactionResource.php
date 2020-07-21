<?php

namespace App\Http\Resources\Transactions;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'service' => $this->service,
            'payment_mode' => $this->payment_mode,
            'amount' => $this->amount,
            'user' => $this->user->name,
            'client' => $this->client,
            'client_id' => $this->client_id,
            'created_at' => $this->created_at->format('H:m A D M Y')
        ];
    }
}
