<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public static $rules =[
        'name' => 'required',
        'price' => 'required',
        'url' => 'required',
        'notes' => 'required',
        
    ];

    protected $fillable = [
        'name','image','price','url','notes',
    ];

    public function CreateProduct($request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/products/";
            $image->move($destinationPath, $name);            
        }
        $new = Product::create(array(
            'name'=>$request->name,
            'url'=>$request->url,
            'price'=>$request->price,
            'notes'=>$request->notes,
            'image'=>'public/app-images/products/'.$name ,
        ));
    }
    
    public static function UpdateProduct($request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/products/";
            $image->move($destinationPath, $name);            
        }
        $Product = Product::where('id',$request->id)->first();
        $Product->update(array(
            'name'=>$request->name,
            'url'=>$request->url,
            'price'=>$request->price,
            'notes'=>$request->notes,
            'image'=>'public/app-images/products/'.$name ,
        ));
    }
}
