<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowItWorkStep extends Model
{
    protected $table = 'how_it_work_steps';

    public static $rules =[
        'title' => 'required',
        'description' => 'required',
        
    ];

    protected $fillable = [
        'title','description','image',
    ];


    public function subSteps()
    {
        return $this->hasMany('App\HowItWorkSubStep','parent_step','id');
    }



    public function CreateMainStep($request){
        if ($request->hasFile('image')) {
            $step_image = $request->file('image');
            $step_image_name = $step_image->getClientOriginalName();
            $destinationPath_Img = "public/app-images/how-it-work/main-steps/";
            $step_image->move($destinationPath_Img, $step_image_name);            
        }
        $new = HowItWorkStep::create(array(
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>'public/app-images/how-it-work/main-steps/'.$step_image_name ,
        ));
    }
    public static function UpdateMainStep($request){
        $MainStep = HowItWorkStep::where('id',$request->id)->first();
        if(empty($request->image)){
            $image = $MainStep->image ;
        }
        else{
            $Imgfile = $request->file('image');
            $image = $Imgfile->getClientOriginalName();
            $destinationPath_Img = "public/app-images/how-it-work/main-steps/";
            $Imgfile->move($destinationPath_Img, $image); 
        }
        $MainStep->update(array(
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>'public/app-images/how-it-work/main-steps/'.$image ,
        ));
    }
    
}
