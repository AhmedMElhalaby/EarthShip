<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }
     
    public function Admins() {
        $Admins = Admin::all();
        return view('Dashboard.Admins.index',compact('Admins'));
    }
    public function Add(){
        return view('Dashboard.Admins.add');
    }
    public function postAdd(Request $request){
        $validation = $request->validate(Admin::$rules);
        $new = (new Admin)->CreateAdmin($request);
        return redirect('admin/admins');
    }
    public function Edit($id){
        $Admin = Admin::where('id',$id)->first();
        return view('Dashboard.Admins.edit',compact('Admin'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(Admin::$rules);
        $new = (new Admin)->UpdateAdmin($request);
        return redirect('admin/admins');
    }
    public function Delete($id){
        $Admin = Admin::where('id',$id)->first();
        $Admin->delete();
        return redirect('admin/admins');
    }
}
