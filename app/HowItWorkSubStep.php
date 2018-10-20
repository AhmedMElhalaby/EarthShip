<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowItWorkSubStep extends Model
{
    protected $table = 'how_it_work_sub_steps';
    protected $fillable = ['parent_step','title', 'description','image'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
                'parent_step' => 'required',
                'title'  => 'required|max:100',
                'description' => 'required|max:255', 

    ];

    public function parent(){
        return $this->belongsTo('App\HowItWorkStep');
    }

    public static function saveSubStep($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/how-it-work/sub-steps/";
            $image->move($destinationPath, $name);            
        }
        if(is_null($id)){
            $SubStep =new HowItWorkSubStep();
            $SubStep->image='public/app-images/how-it-work/sub-steps/'.$name ;
            $SubStep->created_at = date('Y-m-d H:i:s');
        }else{
            $SubStep = self::findOrFail($id);
            $SubStep->updated_at = date('Y-m-d H:i:s');
        }

        $inputs = ['parent_step','title', 'description','image'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $SubStep->$key=$value;
                }
                if($key =="image"){
                    $SubStep->image='public/app-images/how-it-work/sub-steps/'.$name ;
                }
                
            }
        }

       if($SubStep->save()){
            return redirect('admin/howItWork-subSteps/'.$attributes['parent_step'])->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/howItWork-subSteps/'.$attributes['parent_step'])->withDanger('An Error Occurred During Execution!');

    }


}
