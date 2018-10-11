<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    public static $rules =[
        'name' => 'required',
        'email' => 'required',
    ];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function CreateAdmin($request){
        $new = Admin::create(array(
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ));
    }
    public static function UpdateAdmin($request){
        $Admin = Admin::where('id',$request->id)->first();
        if(empty($request->password)){
            $password = $Admin->password ;
        }
        else{
            $password = Hash::make($request->password) ;
        }
        $Admin->update(array(
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$password
        ));
    }

}
