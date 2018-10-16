<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function Countries()
    {
        $Countries = Country::all();
        return view('Dashboard.Countries.index',compact('Countries'));
        
    }
    public function Add(){
        return view('Dashboard.Countries.add');
    }
    public function postAdd(Request $request){
        return(Country::saveCountry($request->all(), null));       
    }
    public function Edit($id){
        $Country = Country::where('id',$id)->first();
        return view('Dashboard.Countries.edit',compact('Country'));
    }
    public function postEdit(Request $request){
        return(Country::saveCountry($request->all(), $request->id));
    }
    public function Delete($id){
        if (Country::destroy($id)) {
            return redirect('admin/countries/')->withSuccess('Country Successfully Deleted!');
        }
        return redirect('admin/countries/')->withDanger('Failed Delete Country !');
    }
}
