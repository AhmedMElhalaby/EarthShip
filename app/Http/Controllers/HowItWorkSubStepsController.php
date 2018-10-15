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
        $new = (new HowItWorkSubStep)->CreateSubStep($request);
        return redirect('admin/howItWork-subSteps/'.$request->parent_step)->withSuccess('Successful Added!');;
    }
    public function Edit($mainStep,$id){
        $HowItWorkSubStep = HowItWorkSubStep::where('id',$id)->first();
        return view('Dashboard.HowItWork.SubSteps.edit',compact('HowItWorkSubStep','mainStep'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(HowItWorkSubStep::$rules);
        $new = (new HowItWorkSubStep)->UpdateSubStep($request);
        return redirect('admin/howItWork-subSteps/'.$request->parent_step)->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $HowItWorkSubStep = HowItWorkSubStep::where('id',$id)->first();
        $parent_step=$HowItWorkSubStep->parent_step ;
        $HowItWorkSubStep->delete();
        return redirect('admin/howItWork-subSteps/'.$parent_step)->withDanger('Successful Deleted!');;
    }
}
