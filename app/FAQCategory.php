<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Model\FAQQuestion;

class FAQCategory extends Model
{
    protected $table = 'faq_category';

    public static $rules =[
        'name' => 'required',
        'description' => 'required',        
    ];

    protected $fillable = [
        'name','description','image','icon',
    ];


    public function questions(){
        return $this->hasMany('App\FAQQuestion','faq_category_id','id');
    }

    public function CreateFAQCategory($request){
        if ($request->hasFile('image')) {
            $category_image = $request->file('image');
            $category_image_name = $category_image->getClientOriginalName();
            $destinationPath_Img = "storage/app/faq/img";
            $category_image->move($destinationPath_Img, $category_image_name);            
        }
        if ($request->hasFile('icon')) {
            $category_icon = $request->file('icon');
            $category_icon_name = $category_icon->getClientOriginalName();
            $destinationPath_Icon = "storage/app/faq/icon";
            $category_icon->move($destinationPath_Icon, $category_icon_name);            
        }
        $new = FAQCategory::create(array(
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=>'storage/app/faq/img/'.$category_image_name ,
            'icon'=>'storage/app/faq/icon/'.$category_icon_name 
        ));
    }




    public static function UpdateFAQCategory($request){
        $FAQCategory = FAQCategory::where('id',$request->id)->first();
        if(empty($request->image)){
            $image = $FAQCategory->image ;
        }
        else{
            $Imgfile = $request->file('image');
            $image = $Imgfile->getClientOriginalName();
            $destinationPath_Img = "storage/app/faq/img";
            $Imgfile->move($destinationPath_Img, $image); 
        }

        if(empty($request->icon)){
            $icon = $FAQCategory->icon ;
        }
        else{
            $Iconfile = $request->file('icon');
            $icon = $Iconfile->getClientOriginalName();
            $destinationPath_Icon = "storage/app/faq/img";
            $Iconfile->move($destinationPath_Icon, $icon); 
        }
        
        $FAQCategory->update(array(
            'name'=>$request->name,
            'description'=>$request->description,
            'image'=> 'storage/app/faq/img/'.$image ,
            'icon'=>  'storage/app/faq/icon/'.$icon 
        ));
    }


}
