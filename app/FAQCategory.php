<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    protected $table = 'faq_category';
    protected $fillable = ['name','description','image','icon'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
                'name'  => 'required|max:100',
                'description' => 'required|max:255',    

    ];
    
  
    public function questions(){
        return $this->hasMany('App\FAQQuestion','faq_category_id','id');
    }

    public static function saveFAQCategory($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $image_name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/faq/img/";
            $image->move($destinationPath, $image_name);            
        }
        if (\Request::hasFile('icon')) {
            $icon = \Request::file('icon');
            $icon_name = $icon->getClientOriginalName();
            $destinationPath = "public/app-images/faq/icon/";
            $icon->move($destinationPath, $icon_name);            
        }

        if(is_null($id)){
            $FAQCategory =new FAQCategory();
            $FAQCategory->image='public/app-images/faq/img/'.$image_name ;
            $FAQCategory->icon='public/app-images/faq/icon/'.$icon_name ;
            $FAQCategory->created_at =date('Y-m-d H:i:s');
        }else{
            $FAQCategory = self::findOrFail($id);
            $FAQCategory->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['name','description','image','icon'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $FAQCategory->$key=$value;
                }
                if($key =="image"){
                    $FAQCategory->image='public/app-images/faq/img/'.$image_name ;
                }
                if($key =="icon"){
                    $FAQCategory->icon='public/app-images/faq/icon/'.$icon_name ;
                }
            }
        }

       if($FAQCategory->save()){
            return redirect('admin/faq-category/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/faq-category/')->withDanger('An Error Occurred During Execution!');

    }



}
