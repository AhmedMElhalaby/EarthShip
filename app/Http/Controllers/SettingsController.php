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
        $new = (new Setting)->CreateSetting($request);
        return redirect('admin/settings-category/'.$request->category_id)->withSuccess('Successful Added!');
    }
    
    public function Edit($category ,$id){
        $Setting = Setting::where('id',$id)->first();
        return view('Dashboard.Settings.General.edit',compact('category','Setting'));
    }

    

    public function postEdit(Request $request){
        $validation = $request->validate(Setting::$rules);
        $new = (new Setting)->UpdateSetting($request);
        return redirect('admin/settings-category/'.$request->category_id)->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $Setting = Setting::where('id',$id)->first();
        $category = $Setting->category_id ;
        $Setting->delete();
        return redirect('admin/settings-category/'.$category)->withDanger('Successful Deleted!');
    }
}
