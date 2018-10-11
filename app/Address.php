<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    public static $rules =[
        'address' => 'required',
        'suite' => 'required',
        'city' => 'required',
        'state' => 'required',
        'post_code' => 'required',
        'country_id' => 'required',
    ];

    protected $fillable = [
        'address', 'suite', 'city','state', 'post_code', 'country_id','permission',
    ];


    public function country() {
        return  $this->belongsTo('App\Country','country_id','id');
    }

    public function CreateAddress($request){
        $new = Address::create(array(
            'address'=>$request->address,
            'suite'=>$request->suite,
            'city'=>$request->city,
            'state'=>$request->state,
            'post_code'=>$request->post_code,
            'country_id'=>$request->country_id,
            'permission'=>$request->permission
        ));
    }
    public static function UpdateAddress($request){
        $Address = Address::where('id',$request->id)->first();
        $Address->update(array(
            'address'=>$request->address,
            'suite'=>$request->suite,
            'city'=>$request->city,
            'state'=>$request->state,
            'post_code'=>$request->post_code,
            'country_id'=>$request->country_id,
            'permission'=>$request->permission
        ));
    }
}
