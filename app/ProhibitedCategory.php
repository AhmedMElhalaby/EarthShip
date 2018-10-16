<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class ProhibitedCategory extends Model
{
    protected $table = 'prohibited_categories';
    protected $fillable = ['name','details','image',];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules; 
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'name' => 'required',
                'details' => 'required',
            );
        }
        return self::$rules;
    }

    public function items(){
        return $this->hasMany('App\ProhibitedItem','category_id','id');
    }

    public static function saveProhibitedCategory($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/prohibitions/";
            $image->move($destinationPath, $name);            
        }
        if(is_null($id)){
            $ProhibitedCategory =new ProhibitedCategory();
            $ProhibitedCategory->image='public/app-images/prohibitions/'.$name ;
            $ProhibitedCategory->created_at = date('Y-m-d H:i:s');
        }else{
            $ProhibitedCategory = self::findOrFail($id);
            $ProhibitedCategory->updated_at = date('Y-m-d H:i:s');
        }

        $inputs = ['name','details'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if($key =="image"){
                    $ProhibitedCategory->image='public/app-images/prohibitions/'.$name ;
                }
                if ( $value != "" ) {
                    $ProhibitedCategory->$key=$value;

                }
            }
        }

       if($ProhibitedCategory->save()){
            return redirect('admin/prohibited-category/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/prohibited-category/')->withDanger('An Error Occurred During Execution!');

    }

}
