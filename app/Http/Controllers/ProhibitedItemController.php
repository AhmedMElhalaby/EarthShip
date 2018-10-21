<?php

namespace App\Http\Controllers;

use App\ProhibitedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProhibitedItemController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function Add($id){
        return view('Dashboard.Prohibitions.Item.add',compact('id'));
    }
    public function postAdd(Request $request){
        return(ProhibitedItem::saveProhibitedItem($request->all(), null));
    }
    public function Edit($category,$id){
        $ProhibitedItem = ProhibitedItem::where('id',$id)->first();
        return view('Dashboard.Prohibitions.Item.edit',compact('category','ProhibitedItem'));
    }
    public function postEdit(Request $request){
        return(ProhibitedItem::saveProhibitedItem($request->all(), $request->id));
    }
    public function Delete($id){
        $ProhibitedItem = ProhibitedItem::where('id',$id)->first();
        $category=$ProhibitedItem->category_id ;
        if (ProhibitedItem::destroy($id)) {
            $ProhibitedItem->limitedItems()->delete();
            return redirect('admin/prohibited-category-item/'.$category)->withSuccess('Product Successfully Deleted!');
        }
        return redirect('admin/prohibited-category-item/'.$category)->withDanger('Failed Delete Product !');
    }
}
