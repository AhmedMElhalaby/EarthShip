<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
    protected $fillable = ['client_id','password','type'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
            'client_id'  => 'required',
            'password'  => 'required',
            'type'  => 'required',      

    ];
    
 
    public static function savePaymentMethod($attributes,$id){
        if(is_null($id)){
            $PaymentMethod =new PaymentMethod();
            $PaymentMethod->password =Hash::make($attributes['password']);
            $PaymentMethod->created_at =date('Y-m-d H:i:s');
        }else{
            $PaymentMethod = self::findOrFail($id);
            $PaymentMethod->password =Hash::make($attributes['password']);
            $PaymentMethod->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['client_id','type','password'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $PaymentMethod->$key=$value;
                }
            }
        }

       if($PaymentMethod->save()){
            return redirect('admin/payment-methods/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/payment-methods/')->withDanger('An Error Occurred During Execution!');
    }

}
