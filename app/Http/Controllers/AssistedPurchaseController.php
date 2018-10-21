<?php

namespace App\Http\Controllers;

use App\AssistedPurchase;
use App\AssistedPurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssistedPurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function index(){
        return view('UserDashboard.AssistedPurchase');
    }

    public function add(Request $request){
        $validation = $request->validate(AssistedPurchase::$rules);
        $new = (new AssistedPurchase)->create(array(
            'site_name'=>$request->site_name,
            'site_url'=>$request->site_url,
            'address_id'=>$request->address_id,
            'other_instruction'=>$request->other_instruction,
            'user_id'=>Auth::guard('user')->user()->id,
            'handling_charges'=>$request->handling_charges,
            'domestic_tax'=>$request->domestic_tax,
        ));
        $new1 = (new AssistedPurchaseItem)->create(array(
            'item_name'=>$request->item_name,
            'option'=>$request->option,
            'item_url'=>$request->item_url,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'assisted_purchase_id'=>$new->id,
        ));
        return redirect('assisted-purchase');
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
