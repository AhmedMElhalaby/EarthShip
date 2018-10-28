<?php

namespace App\Http\Controllers;

use App\AssistedPurchase;
use App\AssistedPurchaseItem;
use App\ExpectedPackage;
use App\Support;
use App\SupportReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function index(){
        return view('UserDashboard.SupportTicket');
    }

    public function add(Request $request){
        $validation = $request->validate(Support::$rules);
        $new = (new Support)->create(array(
            'subject'=>$request->subject,
            'detail'=>$request->detail,
            'type'=>$request->type,
            'user_id'=>Auth::guard('user')->user()->id,
        ));
        return redirect('support-ticket');
    }
    public function replay(Request $request){
        $validation = $request->validate( array(
            'support_id' => 'required',
            'sender_id' => 'required',
            'sender_type' => 'required',
            'details' => 'required',
            'subject' => 'required',
        ));
        $SupportReply= SupportReply::where('id',$request->id)->first();
        $new =SupportReply::create(array(
            'support_id'=>$request->support_id,
            'sender_id'=>$request->sender_id,
            'sender_type'=>$request->sender_type,
            'details'=>$request->details,
            'subject'=>$request->subject,
        ));
        return redirect('support-ticket');
    }
}
