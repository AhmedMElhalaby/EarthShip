<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ExpectedPackage extends Model
{
    protected $table = 'expected_package';

    public static $rules =[
        'vendor' => 'required',
        'recipient_name' => 'required',
        'address_id' => 'required',
        'tracking_number' => 'required',
    ];

    protected $fillable = [
        'vendor', 'user_id', 'recipient_name','tracking_number','address_id','note',
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
