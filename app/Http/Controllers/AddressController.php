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
        $validation = $request->validate(Address::$rules);
        $new = (new Address)->CreateAddress($request);
        return redirect('admin/addresses/')->withSuccess('Successful Added!');
    }
    public function Edit($id){
        $countries=Country::all();
        $Address = Address::where('id',$id)->first();
        return view('Dashboard.Addresses.edit',compact('Address','countries'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(Address::$rules);
        $new = (new Address)->UpdateAddress($request);
        return redirect('admin/addresses/')->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $Address = Address::where('id',$id)->first();
        $Address->delete();
        return redirect('admin/addresses/')->withDanger('Successful Deleted!');
    }
}
