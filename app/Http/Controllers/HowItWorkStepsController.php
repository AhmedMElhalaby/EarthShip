<?php

namespace App\Http\Controllers;

use App\HowItWorkStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HowItWorkStepsController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function MainSteps() {
        $MainSteps = HowItWorkStep::all();
        return view('Dashboard.HowItWork.MainSteps.index',compact('MainSteps'));
        
    }
    public function Add(){
        return view('Dashboard.HowItWork.MainSteps.add');
    }
    public function postAdd(Request $request){
        $validation = $request->validate(HowItWorkStep::$rules);
        return(HowItWorkStep::saveMainStep($request->all(), null));
    }
    public function Edit($id){
        $HowItWorkStep = HowItWorkStep::where('id',$id)->first();
        $subSteps = HowItWorkStep::with('subSteps')->find($id); 
        return view('Dashboard.HowItWork.MainSteps.edit',compact('HowItWorkStep','subSteps'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(HowItWorkStep::$rules);
        return(HowItWorkStep::saveMainStep($request->all(), $request->id));
    }
    public function Delete($id){
        $HowItWorkStep = HowItWorkStep::with('subSteps')->find($id);
        if($HowItWorkStep){
            $HowItWorkStep->subSteps()->delete();
            unlink($HowItWorkStep->image);
            $HowItWorkStep->delete();
            return redirect('admin/howItWork-mainSteps/')->withSuccess('How It WorkStep Category Successfully Deleted!');
        }
        return redirect('admin/howItWork-mainSteps/')->withDanger('Failed Delete !');
     
    }

    
    public function ShowSubSteps($id){
        $HowItWorkStep = HowItWorkStep::where('id',$id)->first();
        return view('Dashboard.HowItWork.SubSteps.index',compact('HowItWorkStep'));        
    }

}
