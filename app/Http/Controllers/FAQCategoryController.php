<?php

namespace App\Http\Controllers;

use App\FAQCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQCategoryController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }

    public function FaqCategories()
    {
        $FaqCategories = FAQCategory::all();
        return view('Dashboard.FAQ.Category.index',compact('FaqCategories'));
        
    }
    public function Add(){
        return view('Dashboard.FAQ.Category.add');
    }
    public function postAdd(Request $request){
        $validation = $request->validate(FAQCategory::$rules);
        $new = (new FAQCategory)->CreateFAQCategory($request);
        return redirect('admin/faq-category/')->withSuccess('Successful Added!');;
    }
    public function Edit($id){
        $FAQCategory = FAQCategory::where('id',$id)->first();
        $Questions = FAQCategory::with('questions')->find($id); 
        return view('Dashboard.FAQ.Category.edit',compact('FAQCategory','Questions'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(FAQCategory::$rules);
        $new = (new FAQCategory)->UpdateFAQCategory($request);
        return redirect('admin/faq-category/')->withInfo('Successful Updated!');;
    }
    public function Delete($id){
        $FAQCategory = FAQCategory::with('questions')->find($id);
        if($FAQCategory){
            $FAQCategory->questions()->delete();
        }
        unlink($FAQCategory->icon);
        unlink($FAQCategory->image);
        $FAQCategory->delete();
        return redirect('admin/faq-category/')->withDanger('Successful Deleted!');;
    }

    
    public function ShowCategoryQuestions($id){
        $FAQCategory = FAQCategory::where('id',$id)->first();
        $Questions = FAQCategory::with('questions')->find($id); 
        return view('Dashboard.FAQ.Question.index',compact('FAQCategory'));        
    }

}
