<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;
use App\MembershipFeature;

class Membership extends Model
{
    protected $table = 'membership';
    protected $fillable = ['name','price','billed'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'name' => 'required',
                'price' => 'required',
                'billed' => 'required',
            );
        }
        return self::$rules;
    }

    public function users(){
        return $this->hasMany('App\User','membership_id','id');
    }
    public function features(){
        return $this->hasMany('App\MembershipFeature','membership_id','id');
    }

    public static function saveMembership($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
        if(is_null($id)){
            $Membership =new Membership();
            $Membership->created_at =date('Y-m-d H:i:s');
        }else{
            $Membership = self::findOrFail($id);
            $Membership->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['name','price','billed'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Membership->$key=$value;
                }
            }
        }

       if($Membership->save()){
            return redirect('admin/memberships/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/memberships/')->withDanger('An Error Occurred During Execution!');

    }
    public function featureExist($id){
        $MemFeat = MembershipFeature::where('membership_id',$this->id)->where('feature_id',$id)->first();
        if($MemFeat != null){return true;}
        else{return false;}
    }
}
