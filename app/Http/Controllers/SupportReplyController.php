<?php

namespace App\Http\Controllers;

use App\Support;
use App\SupportReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportReplyController extends Controller
{

    public function __construct() {
        $this->middleware('admin');
     }
    
    public function Add($id){
        $Replies = SupportReply::all();
        return view('Dashboard.SupportReply.add',compact('id','Replies'));
    }
    public function postAdd(Request $request){
        return(SupportReply::saveSupportReply($request->all(), null));
    }

}
