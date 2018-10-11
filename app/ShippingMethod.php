<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class ShippingMethod extends Model
{
    protected $table = 'shipping_method';

    public static $rules =[
        'name' => 'required',
        'password' => 'required',
        'client_id' => 'required',
        
    ];

    protected $fillable = [
        'name','password','client_id',
    ];

    public function CreateShippingMethod($request){
        $new = ShippingMethod::create(array('name'=>$request->name,'password'=>Hash::make($request->password),'client_id'=>$request->client_id));
    }
    public static function UpdateShippingMethod($request){
        $ShippingMethod = ShippingMethod::where('id',$request->id)->first();
        $ShippingMethod->update(array('name'=>$request->name,'password'=>Hash::make($request->password),'client_id'=>$request->client_id));
    }
}
