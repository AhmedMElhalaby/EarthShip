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
        $validation = $request->validate(MembershipFeature::$rules);
        $new = (new MembershipFeature)->CreateMembershipFeature($request);
        return redirect('admin/membership-features/'.$request->membership_id)->withSuccess('Successful Added!');
    }
    public function Edit($membership,$id){
        $Features = Feature::all();
        $MembershipFeature = MembershipFeature::where('id',$id)->first();
        return view('Dashboard.MembershipFeatures.edit',compact('membership','MembershipFeature','Features'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(MembershipFeature::$rules);
        $new = (new MembershipFeature)->UpdateMembershipFeature($request);
        return redirect('admin/membership-features/'.$request->membership_id)->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $MembershipFeature = MembershipFeature::where('id',$id)->first();
        $membershipID=$MembershipFeature->membership_id ;
        $MembershipFeature->delete();
        return redirect('admin/membership-features/'.$membershipID)->withDanger('Successful Deleted!');
    }

}
