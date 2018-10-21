<?php

namespace App\Http\Controllers;

use App\ProhibitedItem;
use App\ProhibitedItemCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProhibitedItemCountryController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }
   
    public function postAdd(Request $request){
        return(ProhibitedItemCountry::saveProhibitedItemCountry($request->all(), null));
    }

    public function Delete($id){
        $ProhibitedItemCountry = ProhibitedItemCountry::where('id',$id)->first();
        $category= ProhibitedItem::where('id',$ProhibitedItemCountry->prohibited_item_id)->pluck('category_id') ;
        $category_id= $category[0];
        if (ProhibitedItemCountry::destroy($id)) {
            return redirect('admin/prohibited-category-item/'.$category_id)->withSuccess('Product Successfully Deleted!');
        }
        return redirect('admin/prohibited-category-item/'.$category_id)->withDanger('Successful Deleted!');
    }
}
