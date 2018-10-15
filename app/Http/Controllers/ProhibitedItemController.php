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
        $validation = $request->validate(ProhibitedItem::$rules);
        $new = (new ProhibitedItem)->CreateProhibitedItem($request);
        return redirect('admin/prohibited-category-item/'.$request->category_id)->withSuccess('Successful Added!');;
    }
    public function Edit($category,$id){
        $ProhibitedItem = ProhibitedItem::where('id',$id)->first();
        return view('Dashboard.Prohibitions.Item.edit',compact('category','ProhibitedItem'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(ProhibitedItem::$rules);
        $new = (new ProhibitedItem)->UpdateProhibitedItem($request);
        return redirect('admin/prohibited-category-item/'.$request->category_id)->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $ProhibitedItem = ProhibitedItem::where('id',$id)->first();
        $category=$ProhibitedItem->category_id ;
        $ProhibitedItem->delete();
        return redirect('admin/prohibited-category-item/'.$category)->withDanger('Successful Deleted!');;
    }
}
