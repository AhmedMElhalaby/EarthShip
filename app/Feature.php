<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';

    public static $rules =[
        'name' => 'required',
    ];

    protected $fillable = [
        'name',
    ];

    public function CreateFeature($request){
        $new = Feature::create(array('name'=>$request->name));
    }
    public static function UpdateFeature($request){
        $Feature = Feature::where('id',$request->id)->first();
        $Feature->update(array('name'=>$request->name));
    }
}
