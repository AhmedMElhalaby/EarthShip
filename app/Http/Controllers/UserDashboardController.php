<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function index(){
        $Product = Product::limit(9)->get();
        return view('UserDashboard.index',compact('Product'));
    }
    public function package(){
        return view('UserDashboard.SentPackage');
    }

}
