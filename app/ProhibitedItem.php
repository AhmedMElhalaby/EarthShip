<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProhibitedItem extends Model
{
    protected $table = 'prohibited_items';

    public static $rules =[
        'category_id' => 'required',
        'name' => 'required',
        'details' => 'required',
        
    ];

    protected $fillable = [
        'category_id','name','details',
    ];

    public function category() {
        return  $this->belongsTo('App\ProhibitedCategory');
    }
    
    public function limitedItems() {
        return  $this->hasMany('App\ProhibitedItemCountry');
    }

    public function CreateProhibitedItem($request){
        $new = ProhibitedItem::create(array(
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'details'=>$request->details
        ));
    }
    public static function UpdateProhibitedItem($request){
        $ProhibitedItem = ProhibitedItem::where('id',$request->id)->first();
        $ProhibitedItem->update(array(
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'details'=>$request->details
        ));
    }


}
