<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table = 'support';

    public static $rules =[
        'subject' => 'required',
        'detail' => 'required',
        'attachment' => 'required',
        'type' => 'required',
        'status' => 'required',
        'close_date' => 'required',
        
    ];

    protected $fillable = [
        'subject','detail','attachment','type','status','close_date',
    ];

    public function supportType(){
        return $this->belongsTo('App\SupportType','type','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function replies(){
        return $this->hasMany('App\SupportReply','support_id','id');
    }

    public static function CreateSupport($request){
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $name = $image->getClientOriginalName();
            $destinationPath = "storage/app/attachments";
            $image->move($destinationPath, $name);            
        }

        $new = Support::create(array(
            'subject'=>$request->subject,
            'detail'=>$request->detail,
            'attachment'=>'storage/app/attachments/'.$name ,
            'type'=>$request->type,
            'status'=>$request->status,
            'close_date'=>$request->close_date
        ));

    }
    public static function UpdateSupport($request){
        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $name = $image->getClientOriginalName();
            $destinationPath = "storage/app/attachments";
            $image->move($destinationPath, $name);            
        }

        $Support = Support::where('id',$request->id)->first();
        $Support->update(array(
            'subject'=>$request->subject,
            'detail'=>$request->detail,
            'attachment'=>'storage/app/attachments/'.$name ,
            'type'=>$request->type,
            'status'=>$request->status,
            'close_date'=>$request->close_date
        ));
    }
}
