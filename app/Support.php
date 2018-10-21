<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;

class Support extends Model
{
    protected $table = 'support';
    protected $fillable = ['subject','user_id','detail','attachment','type','status','close_date'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
        'subject' => 'required|max:100',
        'detail' => 'required|max:255',
        'type' => 'required',
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

    public static function saveSupport($attributes,$id){
        if (\Request::hasFile('attachment')) {
            $attachment = \Request::file('attachment');
            $name = $attachment->getClientOriginalName();
            $destinationPath = "public/app-images/support-attachments/";
            $attachment->move($destinationPath, $name);            
        }
        if(is_null($id)){
            $Support =new Support();
            $Support->user_id = 1 ;
            $Support->attachment='public/app-images/support-attachments/'.$name ;
            $Support->created_at = date('Y-m-d H:i:s');
        }else{
            $Support = self::findOrFail($id);
            $Support->user_id = 1 ;
            $Support->updated_at = date('Y-m-d H:i:s');
        }

        $inputs = ['subject','detail','type','status','close_date'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if($key =='attachment'){
                    $Support->attachment='public/app-images/support-attachments/'.$name ;
                }
                if ( $value != "" ) {
                    $Support->$key=$value;

                }
            }
        }

       if($Support->save()){
            return redirect('admin/support/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/support/')->withDanger('An Error Occurred During Execution!');

    }

}
