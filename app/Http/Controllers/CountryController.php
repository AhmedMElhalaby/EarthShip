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
        $validation = $request->validate(Country::$rules);
        $new = (new Country)->CreateCountry($request);
        return redirect('admin/countries/')->withSuccess('Successful Added!');
        
    }
    public function Edit($id){
        $Country = Country::where('id',$id)->first();
        return view('Dashboard.Countries.edit',compact('Country'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(Country::$rules);
        $new = (new Country)->UpdateCountry($request);
        return redirect('admin/countries/')->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $Country = Country::where('id',$id)->first();
        $Country->delete();
        return redirect('admin/countries/')->withDanger('Successful Deleted!');
    }
}
