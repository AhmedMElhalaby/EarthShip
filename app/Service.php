<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['name','description','price','image'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required',    

    ];
    

    public static function saveService($attributes,$id){
        if (\Request::hasFile('image')) {
            $image = \Request::file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = "public/app-images/services/";
            $image->move($destinationPath, $name);            
        }
        if(is_null($id)){
            $Service =new Service();
            $Service->image='public/app-images/services/'.$name ;
            $Service->created_at = date('Y-m-d H:i:s');
        }else{
            $Service = self::findOrFail($id);
            $Service->updated_at = date('Y-m-d H:i:s');
        }

        $inputs = ['name','description','image','price'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
               if ( $value != "" ) {
                    $Service->$key=$value;
                }
                 if($key =="image"){
                    $Service->image='public/app-images/services/'.$name ;
                }
                
            }
        }

       if($Service->save()){
            return redirect('admin/services/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/services/')->withDanger('An Error Occurred During Execution!');

    }

}
