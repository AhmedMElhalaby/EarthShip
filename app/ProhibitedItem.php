<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class ProhibitedItem extends Model
{
    protected $table = 'prohibited_items';
    protected $fillable = ['category_id','name','details'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules; 
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'category_id' => 'required',
                'name' => 'required',
                'details' => 'required',
            );
        }
        return self::$rules;
    }


    public function category() {
        return  $this->belongsTo('App\ProhibitedCategory');
    }
    
    public function limitedItems() {
        return  $this->hasMany('App\ProhibitedItemCountry');
    }

    public static function saveProhibitedItem($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
        if(is_null($id)){
            $ProhibitedItem =new ProhibitedItem();
            $ProhibitedItem->created_at =date('Y-m-d H:i:s');
        }else{
            $ProhibitedItem = self::findOrFail($id);
            $ProhibitedItem->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['category_id','name','details'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $ProhibitedItem->$key=$value;
                }
            }
        }

       if($ProhibitedItem->save()){
            return redirect('admin/prohibited-category-item/'.$attributes['category_id'])->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/prohibited-category-item/'.$attributes['category_id'])->withDanger('An Error Occurred During Execution!');

    }


}
