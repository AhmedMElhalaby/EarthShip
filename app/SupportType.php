<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class SupportType extends Model
{
    protected $table = 'support-types';
    protected $fillable = ['type'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules; 
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'type' => 'required',
            );
        }
        return self::$rules;
    }

    public function support(){
        return $this->hasMany('App\Support','type','id');
    }

    
}
