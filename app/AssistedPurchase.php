<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AssistedPurchase extends Model
{
    protected $table = 'assisted_purchase';

    public static $rules =[
        'site_name' => 'required',
        'site_url' => 'required',
        'address_id' => 'required',
    ];

    protected $fillable = [
        'site_name',
        'user_id',
        'site_url',
        'address_id',
        'other_instruction',
        'handling_charges',
        'domestic_tax',
        'status',
    ];


    public function user() {
        return  $this->belongsTo('App\User','user_id','id');
    }
    public function AssistedPurchaseItem(){
        return AssistedPurchaseItem::where('assisted_purchase_id',$this->id)->get();
    }
    public function TotalItemsPrice(){
        return AssistedPurchaseItem::where('assisted_purchase_id',$this->id)->get()->sum(function ($t){
            return $t->price * $t->quantity;
        });

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
