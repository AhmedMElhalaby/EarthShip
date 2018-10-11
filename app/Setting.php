<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    public static $rules =[
        'name' => 'required',
        'value' => 'required',
        'category_id' => 'required',
        	
        
    ];

    protected $fillable = [
        'name','value','category_id',
    ];

    public function CreateSetting($request){
        $new = Setting::create(array(
            'name'=>$request->name,
            'value'=>$request->value,
            'category_id'=>$request->category_id,
        ));
    }
    public static function UpdateSetting($request){
        $Setting = Setting::where('id',$request->id)->first();
        $Setting->update(array(
            'name'=>$request->name,
            'value'=>$request->value,
            'category_id'=>$request->category_id,
        ));
    }
}
