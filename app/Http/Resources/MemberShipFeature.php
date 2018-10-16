<?php

namespace App\Http\Resources;

use App\Feature;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberShipFeature extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $feature = Feature::find($this->feature_id);
        return [
            'id'=>$this->id,
            'name'=>$feature->name,
            'membership_id'=>$this->membership_id,
            'feature_id'=>$this->feature_id
        ];
//        return parent::toArray($request);
    }
}
