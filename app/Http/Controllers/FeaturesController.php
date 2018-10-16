<?php

namespace App\Http\Controllers;

use App\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeaturesController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function Features()
    {
        $Features = Feature::all();
        return view('Dashboard.Features.index',compact('Features'));
        
    }
    public function Add(){
        return view('Dashboard.Features.add');
    }
    public function postAdd(Request $request){ 
        return(Feature::saveFeature($request->all(), null));
    }
    public function Edit($id){
        $Feature = Feature::where('id',$id)->first();
        return view('Dashboard.Features.edit',compact('Feature'));
    }
    public function postEdit(Request $request){
        return(Feature::saveFeature($request->all(), $request->id));
    }
    public function Delete($id){
        if (Feature::destroy($id)) {
            return redirect('admin/features')->withSuccess('Feature Successfully Deleted!');
        }
        return redirect('admin/features')->withDanger('Failed Delete Feature !');
    }
}
