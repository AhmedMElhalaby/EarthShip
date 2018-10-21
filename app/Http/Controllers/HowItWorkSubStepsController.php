<?php

namespace App\Http\Controllers;

use App\HowItWorkSubStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HowItWorkSubStepsController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function Add($id){
        return view('Dashboard.HowItWork.SubSteps.add',compact('id'));
    }
    public function postAdd(Request $request){
        $validation = $request->validate(HowItWorkSubStep::$rules);
        return(HowItWorkSubStep::saveSubStep($request->all(), null));
    }
    public function Edit($mainStep,$id){
        $HowItWorkSubStep = HowItWorkSubStep::where('id',$id)->first();
        return view('Dashboard.HowItWork.SubSteps.edit',compact('HowItWorkSubStep','mainStep'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(HowItWorkSubStep::$rules);
        return(HowItWorkSubStep::saveSubStep($request->all(), $request->id));
    }
    public function Delete($id){
        $HowItWorkSubStep = HowItWorkSubStep::where('id',$id)->first();
        $parent_step=$HowItWorkSubStep->parent_step ;
        if (HowItWorkSubStep::destroy($id)) {
            return redirect('admin/howItWork-subSteps/'.$parent_step)->withSuccess('How It Work-sub Step Successfully Deleted!');
        }
        return redirect('admin/howItWork-subSteps/'.$parent_step)->withDanger('Failed Delete How It Work-sub Step  !');
    }
}
