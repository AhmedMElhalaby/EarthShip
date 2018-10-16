<?php

namespace App\Http\Controllers;

use App\AssistedPurchase;
use App\AssistedPurchaseItem;
use App\Support;
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
    public function edit(Request $request){
        $validation = $request->validate(ExpectedPackage::$rules);
        $ExpectedPackage= ExpectedPackage::where('id',$request->id)->first();
        $ExpectedPackage->update(array(
            'vendor'=>$request->vendor,
            'recipient_name'=>$request->recipient_name,
            'address_id'=>$request->address_id,
            'tracking_number'=>$request->tracking_number,
            'note'=>$request->note,
        ));
        return redirect('expected-packages');
    }
    public function delete(Request $request){
        $ExpectedPackage= ExpectedPackage::where('id',$request->id)->first();
        $ExpectedPackage->delete();
        return redirect('expected-packages');
    }
}
