<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['name','value','category_id',];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
            'name' => 'required|max:100',
            'value' => 'required|max:255',
            'category_id' => 'required',    

    ]; 
    
  
    public static function saveSetting($attributes,$id){
        if(is_null($id)){
            $Setting =new Setting();
            $Setting->created_at =date('Y-m-d H:i:s');
        }else{
            $Setting = self::findOrFail($id);
            $Setting->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['name','value','category_id'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Setting->$key=$value;
                }
            }
        }

       if($Setting->save()){
            return redirect('admin/settings-category/'.$attributes['category_id'])->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/settings-category/'.$attributes['category_id'])->withDanger('An Error Occurred During Execution!');

    }

}
