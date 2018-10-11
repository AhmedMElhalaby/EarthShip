<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    public static $rules =[
        'client_id' => 'required',
        'password' => 'required',
        'type' => 'required',
        
    ];

    protected $fillable = [
        'client_id','password','type',
    ];

    public function CreatePaymentMethod($request){
        $new = PaymentMethod::create(array(
            'client_id'=>$request->client_id,
            'password'=>Hash::make($request->password),
            'type'=>$request->type
        ));
    }

    public static function UpdatePaymentMethod($request){
        $PaymentMethod = PaymentMethod::where('id',$request->id)->first();
        $PaymentMethod->update(array('client_id'=>$request->client_id,'password'=>Hash::make($request->password),'type'=>$request->type));
    }
}
