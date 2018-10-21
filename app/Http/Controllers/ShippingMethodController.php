<?php

namespace App\Http\Controllers;

use App\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingMethodController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function ShippingMethods()
    {
        $ShippingMethods = ShippingMethod::all();
        return view('Dashboard.ShippingMethods.index',compact('ShippingMethods'));
        
    }
    public function Add(){
        return view('Dashboard.ShippingMethods.add');
    }
    public function postAdd(Request $request){
        $validation = $request->validate(ShippingMethod::$rules);
        return(ShippingMethod::saveShippingMethod($request->all(), null));
    }
    public function Edit($id){
        $ShippingMethod = ShippingMethod::where('id',$id)->first();
        return view('Dashboard.ShippingMethods.edit',compact('ShippingMethod'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(ShippingMethod::$rules);
        return(ShippingMethod::saveShippingMethod($request->all(), $request->id));
    }
    public function Delete($id){
        if (ShippingMethod::destroy($id)) {
            return redirect('admin/shipping-methods')->withSuccess('Shipping Method Successfully Deleted!');
        }
        return redirect('admin/shipping-methods')->withDanger('Failed Delete Shipping Method !');
    }
}
