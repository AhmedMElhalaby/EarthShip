<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;

    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'name'  => 'required',   
            );
        }
        return self::$rules;
    }


    public function users() {
        return  $this->hasMany('App\User');
    }
    public function addresses() {
        return  $this->hasMany('App\Address');
    }

    public function limitedItems() {
        return  $this->hasMany('App\ProhibitedItemCountry');
    }

    public static function saveCountry($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator); 
        }
        if(is_null($id)){
            $Country =new Country();
            $Country->created_at =date('Y-m-d H:i:s');
        }else{
            $Country = self::findOrFail($id);
            $Country->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['name'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Country->$key=$value;
                }
            }
        }

       if($Country->save()){
            return redirect('admin/countries/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/countries/')->withDanger('An Error Occurred During Execution!');
    }


}
