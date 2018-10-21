<?php

namespace App\Http\Controllers;

use App\AdditionalName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountUDController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function membership(){
        return view('UserDashboard.account.membership');
    }
    public function preferences(){
        return view('UserDashboard.account.preferences');
    }
    public function email_news(){
        if(Auth::guard('user')->user()->email_news){
            Auth::guard('user')->user()->update(array('email_news'=>0));
        }else{
            Auth::guard('user')->user()->update(array('email_news'=>1));
        }
    }
    public function package_photo(){
        if(Auth::guard('user')->user()->package_photo){
            Auth::guard('user')->user()->update(array('package_photo'=>0));
        }else{
            Auth::guard('user')->user()->update(array('package_photo'=>1));
        }
    }
    public function content_photo(){
        if(Auth::guard('user')->user()->content_photo){
            Auth::guard('user')->user()->update(array('content_photo'=>0));
        }else{
            Auth::guard('user')->user()->update(array('content_photo'=>1));
        }
    }
    public function detailed_photo(){
        if(Auth::guard('user')->user()->detailed_photo){
            Auth::guard('user')->user()->update(array('detailed_photo'=>0));
        }else{
            Auth::guard('user')->user()->update(array('detailed_photo'=>1));
        }
    }
    public function open_package(){
        if(Auth::guard('user')->user()->open_package){
            Auth::guard('user')->user()->update(array('open_package'=>0));
        }else{
            Auth::guard('user')->user()->update(array('open_package'=>1));
        }
    }
    public function address(){
        return view('UserDashboard.account.address');
    }
    public function names(){
        return view('UserDashboard.account.names');
    }
    public function add_name(Request $request){
        $validation = $request->validate(AdditionalName::$rules);
        $new = (new AdditionalName)->CreateAdditionalName($request);
        return response()->json(['status' => true,'id'=>$new->id,'name'=>$new->name]);
    }

    public function delete_name(Request $request){
        $AdditionalName = (new AdditionalName)->where('id',$request->id)->where('user_id',Auth::guard('user')->user()->id)->first();
        if($AdditionalName != null)
            $AdditionalName->delete();
        return response()->json(['status' => true,'msg'=>'Deleted Successfully !']);
    }

    public function wallet(){
        return view('UserDashboard.account.wallet');
    }

}
