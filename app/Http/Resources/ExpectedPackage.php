<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExpectedPackage extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'vendor'=>$this->vendor,
            'recipient_name'=>$this->recipient_name,
            'address_id'=>$this->address_id,
            'tracking_number'=>$this->tracking_number,
            'user_id'=>$this->user_id,
            'note'=>$this->note,
        ];
    }
}
