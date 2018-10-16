<?php

namespace App\Http\Controllers;

use App\Address;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function __construct() {
       $this->middleware('admin');
    }

    public function Addresses()
    {
        $Addresses = Address::all();
        return view('Dashboard.Addresses.index',compact('Addresses'));
        
    }
    public function Add(){
        $countries=Country::all();
        return view('Dashboard.Addresses.add',compact('countries'));
    }
    public function postAdd(Request $request){
        return(Address::saveAddress($request->all(), null));
    }
    public function Edit($id){
        $countries=Country::all();
        $Address = Address::where('id',$id)->first();
        return view('Dashboard.Addresses.edit',compact('Address','countries'));
    }
    public function postEdit(Request $request){
        return(Address::saveAddress($request->all(),  $request->id));
    }
    public function Delete($id){
        if (Address::destroy($id)) {
            return redirect('admin/addresses/')->withSuccess('Address Successfully Deleted!');
        }
        return redirect('admin/addresses/')->withDanger('Failed Delete Address !');

    }
}
