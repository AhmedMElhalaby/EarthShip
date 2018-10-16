<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class HowItWorkStep extends Model
{
    protected $table = 'how_it_work_steps';
    protected $fillable = ['title','description','image'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;
    
    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'title' => 'required', 
                'description' => 'required',
            );
        }
        return self::$rules;
    }

    public function subSteps(){
        return $this->hasMany('App\HowItWorkSubStep','parent_step','id');
    }

    public static function saveMainStep($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/how-it-work/main-steps/";
            $image->move($destinationPath, $name);            
        }
        if(is_null($id)){
            $MainStep =new HowItWorkStep();
            $MainStep->image='public/app-images/how-it-work/main-steps/'.$name ;
            $MainStep->created_at = date('Y-m-d H:i:s');
        }else{
            $MainStep = self::findOrFail($id);
            $MainStep->updated_at = date('Y-m-d H:i:s');
        }

        $inputs = ['title','description'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if($key =="image"){
                    $MainStep->image='public/app-images/how-it-work/main-steps/'.$name ;
                }
                if ( $value != "" ) {
                    $MainStep->$key=$value;

                }
            }
        }

       if($MainStep->save()){
            return redirect('admin/howItWork-mainSteps/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/howItWork-mainSteps/')->withDanger('An Error Occurred During Execution!');

    }

    
}
