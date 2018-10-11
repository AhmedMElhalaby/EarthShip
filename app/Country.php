<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    public static $rules =[
        'name' => 'required',
    ];

    protected $fillable = [
        'name',
    ];

    public function users() {
        return  $this->hasMany('App\User');
    }
    public function addresses() {
        return  $this->hasMany('App\Address');
    }
    public function CreateCountry($request){
        $new = Country::create(array('name'=>$request->name));
    }
    public static function UpdateCountry($request){
        $Country = Country::where('id',$request->id)->first();
        $Country->update(array('name'=>$request->name));
    }
}
