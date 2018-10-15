<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProhibitedCategory extends Model
{
    protected $table = 'prohibited_categories';

    public static $rules =[
        'name' => 'required',
        'details' => 'required',        
    ];

    protected $fillable = [
        'name','details','image',
    ];


    public function items(){
        return $this->hasMany('App\ProhibitedItem','category_id','id');
    }

    public function CreateProhibitedCategory($request){
        if ($request->hasFile('image')) {
            $category_image = $request->file('image');
            $category_image_name = $category_image->getClientOriginalName();
            $destinationPath_Img = "public/app-images/prohibitions/";
            $category_image->move($destinationPath_Img, $category_image_name);            
        }
        
        $new = ProhibitedCategory::create(array(
            'name'=>$request->name,
            'details'=>$request->details,
            'image'=>'public/app-images/prohibitions/'.$category_image_name ,
        ));
    }




    public static function UpdateProhibitedCategory($request){
        $ProhibitedCategory = ProhibitedCategory::where('id',$request->id)->first();
        if(empty($request->image)){
            $image = $ProhibitedCategory->image ;
        }
        else{
            $Imgfile = $request->file('image');
            $image = $Imgfile->getClientOriginalName();
            $destinationPath_Img = "public/app-images/prohibitions/";
            $Imgfile->move($destinationPath_Img, $image); 
        }

        
        $ProhibitedCategory->update(array(
            'name'=>$request->name,
            'details'=>$request->details,
            'image'=>'public/app-images/prohibitions/'.$image ,

        ));
    }


}
