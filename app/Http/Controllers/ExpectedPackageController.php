<?php

namespace App\Http\Controllers;

use App\ExpectedPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpectedPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function index(){
        return view('UserDashboard.ExpectedPackages');
    }

    public function add(Request $request){
        $validation = $request->validate(ExpectedPackage::$rules);
        $new = (new ExpectedPackage)->create(array(
            'vendor'=>$request->vendor,
            'recipient_name'=>$request->recipient_name,
            'address_id'=>$request->address_id,
            'tracking_number'=>$request->tracking_number,
            'user_id'=>Auth::guard('user')->user()->id,
            'note'=>$request->note,
        ));
        return redirect('expected-packages');
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
