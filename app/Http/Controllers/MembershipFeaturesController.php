<?php

namespace App\Http\Controllers;

use App\MembershipFeature;
use App\Feature ; 
use Illuminate\Http\Request;

class MembershipFeaturesController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }
    
    public function Add($id){
        $Features = Feature::all();
        return view('Dashboard.MembershipFeatures.add',compact('id','Features'));
    }
    public function postAdd(Request $request){
        return(MembershipFeature::saveMembershipFeature($request->all(), null));
    }
    public function Edit($membership,$id){
        $Features = Feature::all();
        $MembershipFeature = MembershipFeature::where('id',$id)->first();
        return view('Dashboard.MembershipFeatures.edit',compact('membership','MembershipFeature','Features'));
    }
    public function postEdit(Request $request){
        return(MembershipFeature::saveMembershipFeature($request->all(), $request->id));
    }
    public function Delete($id){
        $MembershipFeature = MembershipFeature::where('id',$id)->first();
        $membershipID=$MembershipFeature->membership_id ;
        if (MembershipFeature::destroy($id)) {
            return redirect('admin/membership-features/'.$membershipID)->withSuccess('Feature Successfully Deleted!');
        }
        return redirect('admin/membership-features/'.$membershipID)->withDanger('Failed Delete Feature !');
    }

}
