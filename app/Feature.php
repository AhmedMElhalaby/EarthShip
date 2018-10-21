<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class Feature extends Model
{
    protected $table = 'features';
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'name'  => 'required'
            );
        }
        return self::$rules;
    }

    public static function saveFeature($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
        if(is_null($id)){
            $Feature =new Feature();
            $Feature->created_at =date('Y-m-d H:i:s');
        }else{
            $Feature = self::findOrFail($id);
            $Feature->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['name'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Feature->$key=$value;
                }
            }
        }

       if($Feature->save()){
            return redirect('admin/features/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/features/')->withDanger('An Error Occurred During Execution!');

    }

}
