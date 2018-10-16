<?php

namespace App\Http\Controllers;

use App\Service; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function Services()
    {
        $Services = Service::all();
        return view('Dashboard.Services.index',compact('Services'));
        
    }
    public function Add(){
        return view('Dashboard.Services.add');
    }
    public function postAdd(Request $request){
        return(Service::saveService($request->all(), null));
    }
    public function Edit($id){
        $Service = Service::where('id',$id)->first();
        return view('Dashboard.Services.edit',compact('Service'));
    }
    public function postEdit(Request $request){
        return(Service::saveService($request->all(),  $request->id));
    }
    public function Delete($id){
        if (Service::destroy($id)) {
            return redirect('admin/services')->withSuccess('Shipping Method Successfully Deleted!');
        }
        return redirect('admin/services')->withDanger('Failed Delete Shipping Method !');
    }
}
