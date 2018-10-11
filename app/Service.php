<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    public static $rules =[
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        
    ];

    protected $fillable = [
        'name','description','price',
    ];

    public function CreateService($request){
        $new = Service::create(array('name'=>$request->name,'description'=>$request->description,'price'=>$request->price));
    }
    public static function UpdateService($request){
        $Service = Service::where('id',$request->id)->first();
        $Service->update(array('name'=>$request->name,'description'=>$request->description,'price'=>$request->price));
    }
}
