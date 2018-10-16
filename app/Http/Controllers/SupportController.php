<?php

namespace App\Http\Controllers;

use App\Support;
use App\SupportType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{

    public function Support(){
        $Support = Support::all();
        return view('Dashboard.Support.index',compact('Support'));
        
    }

    public function Add(){
        $SupportTypes = SupportType::all(); 
        return view('Dashboard.Support.add',compact('SupportTypes'));
    }
    public function postAdd(Request $request){
        return(Support::saveSupport($request->all(), null));
    }
    public function Edit($id){
        $Support = Support::where('id',$id)->first();
        $SupportTypes = SupportType::all(); 
        return view('Dashboard.Support.edit',compact('Support','SupportTypes'));
    }
    public function postEdit(Request $request){
        return(Support::saveSupport($request->all(),  $request->id));
    }
    public function Delete($id){
        $Support = Support::where('id',$id)->first();
        unlink($Support->attachment);   
        if (Support::destroy($id)) {
            return redirect('admin/support')->withSuccess('Feature Successfully Deleted!');
        }
        return redirect('admin/support')->withDanger('Failed Delete Feature !');
    }

    public function Close($id){
        $Support = Support::where('id',$id)->first();
        if($Support->status == 0){
            $msg= 'support already Closed';
            return redirect('admin/support/')->withDanger($msg);
        }
        else{
            $msg= 'support succseful Closed';
            $Support->status = 0 ;
            $Support->save();
            return redirect('admin/support/')->withSuccess($msg);
        }        
    }

    public function Replies($id){
        $Support = Support::where('id',$id)->first();
        return view('Dashboard.SupportReply.index',compact('Support'));        
    }
}
