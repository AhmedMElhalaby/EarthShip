<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    protected $table = 'address';
    protected $fillable = ['address', 'suite', 'city','state', 'post_code', 'country_id','permission'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
                'address' => 'required',
                'suite' => 'required',
                'city' => 'required',
                'state' => 'required',
                'post_code' => 'required',
                'country_id' => 'required',
                'permission' => 'required',      

    ];


    public function country() {
        return  $this->belongsTo('App\Country','country_id','id');
    }

    public static function saveAddress($attributes,$id){
        if(is_null($id)){
            $Address =new Address();
            $Address->created_at =date('Y-m-d H:i:s');
        }else{
            $Address = self::findOrFail($id);
            $Address->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['address', 'suite', 'city','state', 'post_code', 'country_id','permission'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $Address->$key=$value;
                }
            }
        }

       if($Address->save()){
            return redirect('admin/addresses/')->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/addresses/')->withDanger('An Error Occurred During Execution!');

    }
}
