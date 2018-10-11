<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';

    public static $rules =[
        'name' => 'required',
        'price' => 'required',
        'billed' => 'required',
        
    ];

    protected $fillable = [
        'name','price','billed',
    ];


    public function users()
    {
        return $this->hasMany('App\User','membership_id','id');
    }

    
    public function features()
    {
        return $this->hasMany('App\MembershipFeature','membership_id','id');
    }


    public function CreateMembership($request){
        $new = Membership::create(array('name'=>$request->name,'price'=>$request->price,'billed'=>$request->billed));
    }
    public static function UpdateMembership($request){
        $Membership = Membership::where('id',$request->id)->first();
        $Membership->update(array('name'=>$request->name,'price'=>$request->price,'billed'=>$request->billed));
    }
    public function featureExist($id){
        $MemFeat = MembershipFeature::where('membership_id',$this->id)->where('feature_id',$id)->first();
        if($MemFeat != null){return true;}
        else{return false;}
    }
}
