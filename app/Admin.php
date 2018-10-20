<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;



class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admins';
    protected $fillable = ['name','email','password'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
                'name'  => 'required|max:255',
                'email' => 'required|email', 
    ];


    public static function saveAdmin($attributes,$id){
        if(is_null($id)){
            $Admin =new Admin();
            $Admin->password =Hash::make($attributes['password']);
            $Admin->created_at =date('Y-m-d H:i:s');
        }else{
            $Admin = self::findOrFail($id);
            $Admin->password =Hash::make($attributes['password']);
            $Admin->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['name','email'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Admin->$key=$value;
                }
            }
        }

       if($Admin->save()){
            return redirect('admin/admins/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/admins/')->withDanger('An Error Occurred During Execution!');
    }

}
