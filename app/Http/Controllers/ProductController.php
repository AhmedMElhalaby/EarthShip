<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function Products()
    {
        $Products = Product::all();
        return view('Dashboard.Products.index',compact('Products'));
        
    }
    public function Add(){
        return view('Dashboard.Products.add');
    }
    public function postAdd(Request $request){
        return(Product::saveProduct($request->all(), null));
    }
    public function Edit($id){
        $Product = Product::where('id',$id)->first();
        return view('Dashboard.Products.edit',compact('Product'));
    }
    public function postEdit(Request $request){
        return(Product::saveProduct($request->all(), $request->id));
    }

    public function Delete($id){
        if (Product::destroy($id)) {
            return redirect('admin/products')->withSuccess('Product Successfully Deleted!');
        }
        return redirect('admin/products')->withDanger('Failed Delete Product !');
    }
}
