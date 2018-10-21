<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CustomDeclaration extends Model
{
    protected $table = 'customs_declaration';

    public static $rules =[
        'battery_in' => 'required',
        'battery_with' => 'required',
        'dangerous_goods' => 'required',
        'alcoholic' => 'required',
        'describe_package' => 'required',
    ];

    protected $fillable = [
        'battery_in',
        'battery_with',
        'dangerous_goods',
        'alcoholic',
        'describe_package',
        'processing_fee',
        'consolidation_fee',
        'special_request',
        'postage',
        'package_id',
    ];


    public function package() {
        return  $this->belongsTo('App\Package','package_id','id');
    }
    public function ExpectedPackage() {
        return  $this->belongsTo('App\ExpectedPackage','package_id','id');
    }
    public function Items() {
        return CustomDeclarationItem::where('custom_id',$this->id)->first();
    }
}
