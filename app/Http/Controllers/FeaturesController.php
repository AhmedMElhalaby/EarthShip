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
        $validation = $request->validate(Feature::$rules);
        $new = (new Feature)->CreateFeature($request);
        return redirect('admin/features/')->withSuccess('Successful Added!');
    }
    public function Edit($id){
        $Feature = Feature::where('id',$id)->first();
        return view('Dashboard.Features.edit',compact('Feature'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(Feature::$rules);
        $new = (new Feature)->UpdateFeature($request);
        return redirect('admin/features')->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $Feature = Feature::where('id',$id)->first();
        $Feature->delete();
        return redirect('admin/features')->withDanger('Successful Deleted!');
    }
}
