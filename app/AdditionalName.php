<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AdditionalName extends Model
{
    protected $table = 'additional_name';

    public static $rules =[
        'name' => 'required|unique:additional_name',
    ];

    protected $fillable = [
        'name', 'user_id',
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
