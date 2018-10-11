<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Payment extends Model
{
    protected $table = 'payment';

    public static $rules =[
        'payment_first_name' => 'required',
        'payment_second_name' => 'required',
        'card_number' => 'required',
        'expiration_month' => 'required',
        'expiration_year' => 'required',
        'user_id' => 'required',
        'payment_method_type' => 'required',

    ];

    protected $fillable = [
        'payment_first_name',
        'payment_second_name',
        'card_number',
        'expiration_month',
        'expiration_year',
        'user_id',
        'payment_method_type',
    ];

    public function CreatePayment($request,$id){
        $new = Payment::create(array(
            'payment_first_name'=>$request->payment_first_name,
            'payment_second_name'=>$request->payment_second_name,
            'card_number'=>$request->card_number,
            'expiration_month'=>$request->expiration_month,
            'expiration_year'=>$request->expiration_year,
            'user_id'=>$id,
            'payment_method_type'=>$request->payment_method_type,
        ));
    }

    public static function UpdatePayment($request){
        $Payment = Payment::where('id',$request->id)->first();
        $Payment->update(array(
            'payment_first_name'=>$request->payment_first_name,
            'payment_second_name'=>$request->payment_second_name,
            'card_number'=>$request->card_number,
            'expiration_month'=>$request->expiration_month,
            'expiration_year'=>$request->expiration_year,
            'payment_method_type'=>$request->payment_method_type,
        ));
    }
}
