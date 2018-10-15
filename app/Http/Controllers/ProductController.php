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
        $validation = $request->validate(Product::$rules);
        $new = (new Product)->CreateProduct($request);
        return redirect('admin/products')->withSuccess('Successful Added!');
    }

    public function Edit($id){
        $Product = Product::where('id',$id)->first();
        return view('Dashboard.Products.edit',compact('Product'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(Product::$rules);
        $new = (new Product)->UpdateProduct($request);
        return redirect('admin/products')->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $Product = Product::where('id',$id)->first();
        $Product->delete();
        return redirect('admin/products')->withDanger('Successful Deleted!');
    }
}
