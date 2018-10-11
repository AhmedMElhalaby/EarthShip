<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportType extends Model
{
    protected $table = 'support-types';

    public static $rules =[
        'type' => 'required',        
    ];

    protected $fillable = [
        'type',
    ];


    public function support(){
        return $this->hasMany('App\Support','type','id');
    }

    
}
