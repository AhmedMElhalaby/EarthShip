<?php

namespace App\Http\Controllers;

use App\SettingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingCategoryController extends Controller{
    public function __construct() {
        $this->middleware('admin');
     }

    public function SettingCategories()
    {
        $SettingCategories = SettingCategory::all();
        return view('Dashboard.Settings.Category.index',compact('SettingCategories'));
        
    }
    public function Add(){
        return view('Dashboard.Settings.Category.add');
    }
    public function postAdd(Request $request){
        $validation = $request->validate(SettingCategory::$rules);
        return(SettingCategory::saveSettingCategory($request->all(), null));
    }
    public function Edit($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        return view('Dashboard.Settings.Category.edit',compact('SettingCategory'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(SettingCategory::$rules);
        return(SettingCategory::saveSettingCategory($request->all(), $request->id));
    }
    public function Delete($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        if (SettingCategory::destroy($id)) {
            $SettingCategory->settings()->delete();
            return redirect('admin/settings-categories')->withSuccess('Successfully Deleted!');
        }
        return redirect('admin/settings-categories')->withDanger('Failed Delete  !');
    }

    public function ShowCategorySettings($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        return view('Dashboard.Settings.General.index',compact('SettingCategory'));        
    }
}
