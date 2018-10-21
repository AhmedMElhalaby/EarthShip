<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class MembershipFeature extends Model
{
    protected $table = 'membership_features';
    protected $fillable = ['membership_id','feature_id'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;

    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'membership_id' => 'required',
                'feature_id' => 'required',
            );
        }
        return self::$rules;
    }

    public function feature(){
        return $this->belongsTo('App\Feature');
    }
    public function membership(){
        return $this->belongsTo('App\Membership');
    }
    public static function saveMembershipFeature($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
        if(is_null($id)){
            $MembershipFeature =new MembershipFeature();
            $MembershipFeature->created_at =date('Y-m-d H:i:s');
        }else{
            $MembershipFeature = self::findOrFail($id);
            $MembershipFeature->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['membership_id','feature_id'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $MembershipFeature->$key=$value;
                }
            }
        }

       if($MembershipFeature->save()){
            return redirect('admin/membership-features/'.$attributes['membership_id'])->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/membership-features/'.$attributes['membership_id'])->withDanger('An Error Occurred During Execution!');

    }
}
