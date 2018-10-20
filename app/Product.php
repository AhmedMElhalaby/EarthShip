<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','image','price','url','notes'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
            'name' => 'required',
            'price' => 'required',
            'url' => 'required',
            'notes' => 'required',     

    ];
    
   
    public static function saveProduct($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/products/";
            $image->move($destinationPath, $name);            
        }
        if(is_null($id)){
            $Product =new Product();
            $Product->image='public/app-images/products/'.$name ;
            $Product->created_at = date('Y-m-d H:i:s');
        }else{
            $Product = self::findOrFail($id);
            $Product->updated_at = date('Y-m-d H:i:s');
        }

        $inputs = ['name','price','image','url','notes'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Product->$key=$value;

                }
                if($key =="image"){
                    $Product->image='public/app-images/products/'.$name ;
                }
            }
        }

       if($Product->save()){
            return redirect('admin/products/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/products/')->withDanger('An Error Occurred During Execution!');

    }

}
