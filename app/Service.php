<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;
 

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = ['name','description','price','image'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules; 

    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
            );
        }
        return self::$rules;
    }

    public static function saveService($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
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

        $inputs = ['name','description','price'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if($key =="image"){
                    $Service->image='public/app-images/services/'.$name ;
                }
                if ( $value != "" ) {
                    $Service->$key=$value;

                }
            }
        }

       if($Service->save()){
            return redirect('admin/services/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/services/')->withDanger('An Error Occurred During Execution!');

    }

}
