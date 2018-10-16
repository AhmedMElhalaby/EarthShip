<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = ['address', 'suite', 'city','state', 'post_code', 'country_id','permission'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'address' => 'required',
                'suite' => 'required',
                'city' => 'required',
                'state' => 'required',
                'post_code' => 'required',
                'country_id' => 'required',
                'permission' => 'required',
            );
        }
        return self::$rules;
    }

    public function country() {
        return  $this->belongsTo('App\Country','country_id','id');
    }

    public static function saveِAddress($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
        if(is_null($id)){
            $Address =new Address();
            $Address->created_at =date('Y-m-d H:i:s');
        }else{
            $Address = self::findOrFail($id);
            $Address->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['address', 'suite', 'city','state', 'post_code', 'country_id','permission'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Address->$key=$value;
                }
            }
        }

       if($Address->save()){
            return redirect('admin/addresses/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/addresses/')->withDanger('An Error Occurred During Execution!');

    }
}
