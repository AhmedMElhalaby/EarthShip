<?php

namespace App\Http\Controllers;

use App\Setting;
use App\SettingCategory ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller{
    public function __construct() {
        $this->middleware('admin');
     }

    public function Add($id){
        return view('Dashboard.Settings.General.add',compact('id'));
    }
    public function postAdd(Request $request){
        $validation = $request->validate(Setting::$rules);
        return(Setting::saveSetting($request->all(), null));
    }
    
    public function Edit($category ,$id){
        $Setting = Setting::where('id',$id)->first();
        return view('Dashboard.Settings.General.edit',compact('category','Setting'));
    }

    public function postEdit(Request $request){
        $validation = $request->validate(Setting::$rules);
        return(Setting::saveSetting($request->all(), $request->id));
    }
    public function Delete($id){
        $Setting = Setting::where('id',$id)->first();
        $category = $Setting->category_id ;
        if (Setting::destroy($id)) {
            return redirect('admin/settings-category/'.$category)->withSuccess('Successfully Deleted!');
        }
        return redirect('admin/settings-category/'.$category)->withDanger('Failed Delete  !');
    }

}
