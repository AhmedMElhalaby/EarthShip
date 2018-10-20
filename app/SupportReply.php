<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportReply extends Model
{
    protected $table = 'support_reply';
    protected $fillable = ['support_id','sender_id','sender_type','details'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
            'support_id' => 'required',
            'sender_id' => 'required',
            'sender_type' => 'required',
            'details' => 'required|max:255',
    ];  

    public static function saveSupportReply($attributes,$id){
        if(is_null($id)){
            $SupportReply =new SupportReply();
            $SupportReply->created_at = date('Y-m-d H:i:s');
        }else{
            $SupportReply = self::findOrFail($id);
            $SupportReply->updated_at = date('Y-m-d H:i:s');
        }

        $inputs = ['support_id','sender_id','sender_type','details'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $SupportReply->$key=$value;
                }
            }
        }

       if($SupportReply->save()){
            return redirect('admin/support-replies/'.$attributes['support_id'])->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/support-replies/'.$attributes['support_id'])->withDanger('An Error Occurred During Execution!');

    }
  
}
