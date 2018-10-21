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
        return(SettingCategory::saveSettingCategory($request->all(), null));
    }
    public function Edit($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        return view('Dashboard.Settings.Category.edit',compact('SettingCategory'));
    }
    public function postEdit(Request $request){
        return(SettingCategory::saveSettingCategory($request->all(), $request->id));
    }
    public function Delete($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        if($SettingCategory){
            $SettingCategory->settings()->delete();
            return redirect('admin/settings-categories')->withSuccess('Successful Successfully Deleted!');
        }
        return redirect('admin/settings-categories')->withDanger('Successfully Delete Successful  !');
    }

    public function ShowCategorySettings($id){
        $SettingCategory = SettingCategory::where('id',$id)->first();
        return view('Dashboard.Settings.General.index',compact('SettingCategory'));        
    }
}
