<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportReply extends Model
{
    protected $table = 'support_reply';

    public static $rules =[
        'support_id' => 'required',
        'sender_id' => 'required',
        'sender_type' => 'required',
        'details' => 'required',        
    ];

    protected $fillable = [
        'support_id','sender_id','sender_type','details',
    ];


    public static function CreateSupportReply($request){
        $new = SupportReply::create(array(
            'support_id'=>$request->support_id,
            'sender_id'=>$request->sender_id,
            'sender_type'=>$request->sender_type,
            'details'=>$request->details,
        ));

    }
  
}
