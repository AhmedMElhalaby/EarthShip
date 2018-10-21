<?php

namespace App\Http\Controllers;
use App\Country ;
use App\ProhibitedCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProhibitedCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function ProhibitedCategories()
    {
        $ProhibitedCategories = ProhibitedCategory::all();
        return view('Dashboard.Prohibitions.Category.index',compact('ProhibitedCategories'));
        
    }
    public function Add(){
        return view('Dashboard.Prohibitions.Category.add');
    }
    public function postAdd(Request $request){
        $validation = $request->validate(ProhibitedCategory::$rules);
        return(ProhibitedCategory::saveProhibitedCategory($request->all(), null));
    }
    public function Edit($id){
        $ProhibitedCategory = ProhibitedCategory::where('id',$id)->first();
        $Items = ProhibitedCategory::with('items')->find($id); 
        return view('Dashboard.Prohibitions.Category.edit',compact('ProhibitedCategory','Items'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(ProhibitedCategory::$rules);
        return(ProhibitedCategory::saveProhibitedCategory($request->all(),  $request->id));
    }
    public function Delete($id){
        $ProhibitedCategory = ProhibitedCategory::where('id',$id)->first();
        if (ProhibitedCategory::destroy($id)) {
            $ProhibitedCategory->items()->delete();
            unlink($ProhibitedCategory->image);
            return redirect('admin/prohibited-category/')->withSuccess('Product Successfully Deleted!');
        }
        return redirect('admin/prohibited-category/')->withDanger('Failed Delete Product !');
    }

    
    public function ShowCategoryItems($id){
        $ProhibitedCategory = ProhibitedCategory::where('id',$id)->first();
        $countries = Country::All();
        return view('Dashboard.Prohibitions.Item.index',compact('ProhibitedCategory','countries'));        
    }

}
