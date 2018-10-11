<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipFeature extends Model
{
    protected $table = 'membership_features';

    public static $rules =[
        'membership_id' => 'required',
        'feature_id' => 'required',
        
    ];

    protected $fillable = [
        'membership_id','feature_id',
    ];

    public function feature(){
        return $this->belongsTo('App\Feature');
    }
    public function membership(){
        return $this->belongsTo('App\Membership');
    }

    public function CreateMembershipFeature($request){
        $new = MembershipFeature::create(array('membership_id'=>$request->membership_id,'feature_id'=>$request->feature_id));
    }
    public static function UpdateMembershipFeature($request){
        $MembershipFeature = MembershipFeature::where('id',$request->id)->first();
        $MembershipFeature->update(array('membership_id'=>$request->membership_id,'feature_id'=>$request->feature_id));
    }
}
