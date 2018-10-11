<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use App\Country;
use App\Membership;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function Users(){
        $Users = User::all();
        return view('Dashboard.Users.index',compact('Users'));
        
    }
    public function Add(){
        $defaultAddresses = Address::all();
        $countries= Country::all();
        $memberships=Membership::all();
        return view('Dashboard.Users.add',compact('defaultAddresses','countries','memberships'));
    }
    public function postAdd(Request $request){
        $validation = $request->validate(User::$rules);
        $new = (new User)->CreateUser($request);
        return redirect('admin/users/')->withSuccess('Successful Added!');
    }
    public function Show($id){
        $User = User::where('id',$id)->first();
        return view('Dashboard.Users.show',compact('User'));
    }

    public function Edit($id){
        $defaultAddresses = Address::all();
        $countries= Country::all();
        $memberships=Membership::all();

        $User = User::where('id',$id)->first();
        return view('Dashboard.Users.edit',compact('User','defaultAddresses','countries','memberships'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(User::$rules);
        $new = (new User)->UpdateUser($request);
        return redirect('admin/users/')->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $User = User::where('id',$id)->first();
        $User->delete();
        return redirect('admin/users/')->withDanger('Successful Deleted!');
    }
}
