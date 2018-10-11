<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class SettingCategory extends Model
{
    protected $table = 'setting_category';

    public static $rules =[
        'name' => 'required',        
    ];

    protected $fillable = [
        'name',
    ];


    public function settings()
    {
        return $this->hasMany('App\Setting','category_id','id');
    }

    public function CreateSettingCategory($request){
        $new = SettingCategory::create(array(
            'name'=>$request->name,
        ));
    }
    public static function UpdateSettingCategory($request){
        $SettingCategory = SettingCategory::where('id',$request->id)->first();
        $SettingCategory->update(array(
            'name'=>$request->name,
        ));
    }
}
