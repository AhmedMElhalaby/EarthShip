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
        'name','description','price','image',
    ];

    public function CreateService($request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/services/";
            $image->move($destinationPath, $name);            
        }
        $new = Service::create(array(
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>'public/app-images/services/'.$name ,
        ));
    }
    
    public static function UpdateService($request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/services/";
            $image->move($destinationPath, $name);            
        }
        $Service = Service::where('id',$request->id)->first();
        $Service->update(array(
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>'public/app-images/services/'.$name ,
        ));
    }
}
