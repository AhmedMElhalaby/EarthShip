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
        return(Admin::saveAdmin($request->all(), null));
    }
    public function Edit($id){
        $Admin = Admin::where('id',$id)->first();
        return view('Dashboard.Admins.edit',compact('Admin'));
    }
    public function postEdit(Request $request){
        return(Admin::saveAdmin($request->all(), $request->id));
    }
    public function Delete($id){
        if (Admin::destroy($id)) {
            return redirect('admin/admins')->withSuccess('Admin Successfully Deleted!');
        }
        return redirect('admin/admins')->withDanger('Failed Delete Admin !');
    }
}
