<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers;
use Session ;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
    protected $fillable = ['client_id','password','type'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'client_id'  => 'required',
                'password'  => 'required',
                'type'  => 'required',
            );
        }
        return self::$rules;
    }

    public static function savePaymentMethod($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
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
