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
        $new = (new SettingCategory)->CreateSettingCategory($request);
        return redirect('admin/settings-categories')->withSuccess('Successful Added!');
    }
    public function Edit($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        return view('Dashboard.Settings.Category.edit',compact('SettingCategory'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(SettingCategory::$rules);
        $new = (new SettingCategory)->UpdateSettingCategory($request);
        return redirect('admin/settings-categories')->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        $SettingCategory->delete();
        return redirect('admin/settings-categories')->withDanger('Successful Deleted!');
    }

    public function ShowCategorySettings($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        $SettingCategory = SettingCategory::with('settings')->find($id); 
        return view('Dashboard.Settings.General.index',compact('SettingCategory'));        
    }
}
