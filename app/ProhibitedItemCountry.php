<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProhibitedItemCountry extends Model
{
    protected $table = 'prohibited_item_country';
    protected $fillable = ['country_id','prohibited_item_id'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
            'country_id' => 'required',
            'prohibited_item_id' => 'required',  

    ];
    
    public function country() {
        return  $this->belongsTo('App\Country');
    }
    public function prohibitedItem() {
        return  $this->belongsTo('App\ProhibitedItem');
    }

    public static function saveProhibitedItemCountry($attributes,$id){
        $Found = ProhibitedItemCountry::where('prohibited_item_id',$attributes['prohibited_item_id'])
                                      ->where('country_id',$attributes['country_id'])->first();
        if(is_null($id) && !$Found){
            $ProhibitedItemCountry =new ProhibitedItemCountry();
            $ProhibitedItemCountry->created_at =date('Y-m-d H:i:s');
        }else{
            $ProhibitedItemCountry = self::findOrFail($id);
            $ProhibitedItemCountry->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['country_id','prohibited_item_id'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $ProhibitedItemCountry->$key=$value;
                }
            }
        }

       if($ProhibitedItemCountry->save()){
            return redirect('admin/prohibited-category-item/'.$attributes['category_id'])->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/prohibited-category-item/'.$attributes['category_id'])->withDanger('An Error Occurred During Execution!');

    }

}
