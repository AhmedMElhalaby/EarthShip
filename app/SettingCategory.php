<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class SettingCategory extends Model
{
    protected $table = 'setting_category';
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
            'name' => 'required|max:100',
    ];
    

    public function settings()
    {
        return $this->hasMany('App\Setting','category_id','id');
    }


    public static function saveSettingCategory($attributes,$id){
        if(is_null($id)){
            $SettingCategory =new SettingCategory();
            $SettingCategory->created_at =date('Y-m-d H:i:s');
        }else{
            $SettingCategory = self::findOrFail($id);
            $SettingCategory->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['name'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $SettingCategory->$key=$value;
                }
            }
        }

       if($SettingCategory->save()){
            return redirect('admin/settings-categories/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/settings-categories/')->withDanger('An Error Occurred During Execution!');

    }
}
