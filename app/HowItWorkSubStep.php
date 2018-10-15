<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowItWorkSubStep extends Model
{
    protected $table = 'how_it_work_sub_steps';

    public static $rules =[
        'parent_step' => 'required',
        'title' => 'required',
        'description' => 'required',
        
    ];

    protected $fillable = [
        'parent_step','title', 'description','image'
    ];

    
    public function parent(){
        return $this->belongsTo('App\HowItWorkStep');
    }

    public function CreateSubStep($request){
        if ($request->hasFile('image')) {
            $step_image = $request->file('image');
            $step_image_name = $step_image->getClientOriginalName();
            $destinationPath_Img = "public/app-images/how-it-work/sub-steps/";
            $step_image->move($destinationPath_Img, $step_image_name);            
        }
        $new = HowItWorkSubStep::create(array(
            'parent_step'=>$request->parent_step,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>'public/app-images/how-it-work/sub-steps/'.$step_image_name ,
        ));
    }
    public static function UpdateSubStep($request){
        $SubStep = HowItWorkSubStep::where('id',$request->id)->first();
        if(empty($request->image)){
            $image = $SubStep->image ;
        }
        else{
            $Imgfile = $request->file('image');
            $image = $Imgfile->getClientOriginalName();
            $destinationPath_Img = "public/app-images/how-it-work/sub-steps/";
            $Imgfile->move($destinationPath_Img, $image); 
        }
        $SubStep->update(array(
            'parent_step'=>$request->parent_step,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>'public/app-images/how-it-work/sub-steps/'.$image ,
        ));
    }
}
