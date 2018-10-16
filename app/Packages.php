<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Packages extends Model
{
    protected $table = 'package';

    public static $rules =[
        'name' => 'required|unique:additional_name',
    ];

    protected $fillable = [
        'date_requested',
        'user_id',
        'shipping_method',
        'received_from',
        'insurance',
        'status',
        'cost',
        'weight',
        'dimension_x',
        'dimension_y',
        'dimension_z',
        'storage_left',
        'package_location',
    ];


    public function user() {
        return  $this->belongsTo('App\User','user_id','id');
    }

    public function CreateAdditionalName($request){
        $new = AdditionalName::create(array(
            'name'=>$request->name,
            'user_id'=>Auth::guard('user')->user()->id,
        ));
        return $new;
    }
    public static function UpdateAdditionalName($request){
        $AdditionalName = AdditionalName::where('id',$request->id)->first();
        $AdditionalName->update(array(
            'name'=>$request->name,
        ));
    }
}
