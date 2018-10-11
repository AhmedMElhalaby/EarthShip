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
        $validation = $request->validate(Support::$rules);
        Support::CreateSupport($request);
        return redirect('admin/support/')->withSuccess('Successful Added!');
    }
    public function Edit($id){
        $Support = Support::where('id',$id)->first();
        $SupportTypes = SupportType::all(); 
        return view('Dashboard.Support.edit',compact('Support','SupportTypes'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(Support::$rules);
        $new = (new Support)->UpdateSupport($request);
        return redirect('admin/support/')->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $Support = Support::where('id',$id)->first();
        unlink($Support->attachment);
        $Support->delete();
        return redirect('admin/support/')->withDanger('Successful Deleted!');
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
        $Support = Support::with('replies')->find($id); 
        return view('Dashboard.SupportReply.index',compact('Support'));        
    }
}
