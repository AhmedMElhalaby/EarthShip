<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class HowItWorkStep extends Model
{
    protected $table = 'how_it_work_steps';
    protected $fillable = ['title','description','image'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
                'title'  => 'required|max:100',
                'description' => 'required|max:255', 

    ];
    
    public function subSteps(){
        return $this->hasMany('App\HowItWorkSubStep','parent_step','id');
    }

    public static function saveMainStep($attributes,$id){
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

        $inputs = ['title','description','image'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $MainStep->$key=$value;

                }
                if($key =="image"){
                    $MainStep->image='public/app-images/how-it-work/main-steps/'.$name ;
                }
                
            }
        }

       if($MainStep->save()){
            return redirect('admin/howItWork-mainSteps/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/howItWork-mainSteps/')->withDanger('An Error Occurred During Execution!');

    }

    
}
