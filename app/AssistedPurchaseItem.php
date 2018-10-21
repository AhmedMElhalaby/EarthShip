<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AssistedPurchaseItem extends Model
{
    protected $table = 'assisted_purchase_items';

    public static $rules =[
        'site_name' => 'required',
        'site_url' => 'required',
        'address_id' => 'required',
    ];

    protected $fillable = [
        'item_name',
        'option',
        'item_url',
        'price',
        'quantity',
        'assisted_purchase_id',
    ];


    public function user() {
        return  $this->belongsTo('App\User','user_id','id');
    }

//
//    public function Create($request){
//        $new = ExpectedPackage::create(array(
//            'vendor'=>$request->vendor,
//            'recipient_name'=>$request->recipient_name,
//            'address_id'=>$request->address_id,
//            'tracking_number'=>$request->tracking_number,
//            'user_id'=>Auth::guard('user')->user()->id,
//        ));
//        return $new;
//    }
//    public function Update($request){
//        $AdditionalName = AdditionalName::where('id',$request->id)->first();
//        $AdditionalName->update(array(
//            'vendor'=>$request->vendor,
//            'recipient_name'=>$request->recipient_name,
//            'address_id'=>$request->address_id,
//            'tracking_number'=>$request->tracking_number,
//        ));
//    }
}
