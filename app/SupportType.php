<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportType extends Model
{
    protected $table = 'support-types';
    protected $fillable = ['type'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
            'type' => 'required',
    ]; 
    
    public function support(){
        return $this->hasMany('App\Support','type','id');
    }

    
}
