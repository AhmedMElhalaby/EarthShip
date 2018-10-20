<?php

namespace App\Http\Controllers;

use App\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function Memberships()
    {
        $Memberships = Membership::all();
        return view('Dashboard.Membership.index',compact('Memberships'));      
    }
    public function Add(){
        return view('Dashboard.Membership.add');
    }
    public function postAdd(Request $request){
        $validation = $request->validate(Membership::$rules);
        return(Membership::saveMembership($request->all(), null));
    }
    public function Edit($id){
        $Membership = Membership::where('id',$id)->first();
        return view('Dashboard.Membership.edit',compact('Membership'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(Membership::$rules);
        return(Membership::saveMembership($request->all(), $request->id));
    }
    public function Delete($id){
        $Membership = Membership::with('features')->find($id);
        if($Membership){
            $Membership->features()->delete();
            $Membership->delete();
            return redirect('admin/memberships')->withSuccess('MemberShip Successfully Deleted!');
        }   
        return redirect('admin/memberships')->withDanger('Failed Delete MemberShip !');     
    }

    public function ShowMembershipFeatures($id){
        $Membership = Membership::where('id',$id)->first();
        return view('Dashboard.MembershipFeatures.index',compact('Membership'));        
    }
}
