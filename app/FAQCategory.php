<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class FAQCategory extends Model
{
    protected $table = 'faq_category';
    protected $fillable = ['name','description','image','icon'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'name' => 'required',
                'description' => 'required',
            );
        }
        return self::$rules;
    }
    
    public function questions(){
        return $this->hasMany('App\FAQQuestion','faq_category_id','id');
    }

    public static function saveFAQCategory($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
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

        $inputs = ['name','description'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if($key =="image"){
                    $FAQCategory->image='public/app-images/faq/img/'.$image_name ;
                }
                if($key =="icon"){
                    $FAQCategory->icon='public/app-images/faq/icon/'.$icon_name ;
                }
                if ( $value != "" ) {
                    $FAQCategory->$key=$value;
                }
            }
        }

       if($FAQCategory->save()){
            return redirect('admin/faq-category/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/faq-category/')->withDanger('An Error Occurred During Execution!');

    }



}
