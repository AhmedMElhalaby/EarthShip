<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function PaymentMethods()
    {
        $PaymentMethods = PaymentMethod::all();
        return view('Dashboard.PaymentMethods.index',compact('PaymentMethods'));
        
    }
    public function Add(){
        return view('Dashboard.PaymentMethods.add');
    }
    public function postAdd(Request $request){
        return(PaymentMethod::savePaymentMethod($request->all(), null));
    }
    public function Edit($id){
        $PaymentMethod = PaymentMethod::where('id',$id)->first();
        return view('Dashboard.PaymentMethods.edit',compact('PaymentMethod'));
    }
    public function postEdit(Request $request){
        return(PaymentMethod::savePaymentMethod($request->all(), $request->id));
    }
    public function Delete($id){
        if (PaymentMethod::destroy($id)) {
            return redirect('admin/payment-methods')->withSuccess('Payment Method Successfully Deleted!');
        }
        return redirect('admin/payment-methods')->withDanger('Failed Delete Payment Method !');
    }
}
