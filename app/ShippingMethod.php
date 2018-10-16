<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers;
use Session ;

class ShippingMethod extends Model
{
    protected $table = 'shipping_method';
    protected $fillable = ['name','password','client_id'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'client_id'  => 'required',
                'password'  => 'required',
                'name'  => 'required',
            );
        }
        return self::$rules;
    }

    public static function saveShippingMethod($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
        if(is_null($id)){
            $ShippingMethod =new ShippingMethod();
            $ShippingMethod->password =Hash::make($attributes['password']);
            $ShippingMethod->created_at =date('Y-m-d H:i:s');
        }else{
            $ShippingMethod = self::findOrFail($id);
            $ShippingMethod->password =Hash::make($attributes['password']);
            $ShippingMethod->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['client_id','name','password'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $ShippingMethod->$key=$value;
                }
            }
        }

       if($ShippingMethod->save()){
            return redirect('admin/shipping-methods/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/shipping-methods/')->withDanger('An Error Occurred During Execution!');
    }
}
