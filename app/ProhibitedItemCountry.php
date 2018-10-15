<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProhibitedItemCountry extends Model
{
    protected $table = 'prohibited_item_country';

    public static $rules =[
        'country_id' => 'required',
        'prohibited_item_id' => 'required',
        
    ];

    protected $fillable = [
        'country_id','prohibited_item_id',
    ];

    public function country() {
        return  $this->belongsTo('App\Country');
    }
    public function prohibitedItem() {
        return  $this->belongsTo('App\ProhibitedItem');
    }
    
    public function CreateProhibitedItemCountry($request){
        $Found = ProhibitedItemCountry::where('prohibited_item_id',$request->prohibited_item_id)
                                      ->where('country_id',$request->country_id)->first();
        if(!$Found){
            $new = ProhibitedItemCountry::create(array(
                'prohibited_item_id'=>$request->prohibited_item_id,
                'country_id'=>$request->country_id,
            ));
        }
        else{
            return false ;
        }
        
    }

}
