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
        $validation = $request->validate(Service::$rules);
        $new = (new Service)->CreateService($request);
        return redirect('admin/services')->withSuccess('Successful Added!');
    }
    public function Edit($id){
        $Service = Service::where('id',$id)->first();
        return view('Dashboard.Services.edit',compact('Service'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(Service::$rules);
        $new = (new Service)->UpdateService($request);
        return redirect('admin/services')->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $Service = Service::where('id',$id)->first();
        $Service->delete();
        return redirect('admin/services')->withDanger('Successful Deleted!');
    }
}
