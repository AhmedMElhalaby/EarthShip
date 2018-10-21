<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CustomDeclarationItem extends Model
{
    protected $table = 'custom_declaration_item';

    public static $rules =[
        'item_name' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'origin' => 'required',
        'custom_id' => 'required',
    ];

    protected $fillable = [
        'item_name',
        'quantity',
        'price',
        'origin',
        'custom_id',
    ];


    public function Custom() {
        return  $this->belongsTo('App\CustomDeclaration','custom_id','id');
    }

}
