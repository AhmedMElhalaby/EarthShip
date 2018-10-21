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
        return(FAQCategory::saveFAQCategory($request->all(), null));
    }
    public function Edit($id){
        $FAQCategory = FAQCategory::where('id',$id)->first();
        $Questions = FAQCategory::with('questions')->find($id); 
        return view('Dashboard.FAQ.Category.edit',compact('FAQCategory','Questions'));
    }
    public function postEdit(Request $request){
        return(FAQCategory::saveFAQCategory($request->all(), $request->id));
    }
    public function Delete($id){
        $FAQCategory = FAQCategory::with('questions')->find($id);
        if($FAQCategory){
            $FAQCategory->questions()->delete();
            unlink($FAQCategory->icon);
            unlink($FAQCategory->image);
            $FAQCategory->delete();
            return redirect('admin/faq-category')->withSuccess('FAQ Category Successfully Deleted!');
        }
        return redirect('admin/faq-category')->withDanger('Successfully Delete FAQ Category !');
    }

    
    public function ShowCategoryQuestions($id){
        $FAQCategory = FAQCategory::where('id',$id)->first();
        return view('Dashboard.FAQ.Question.index',compact('FAQCategory'));        
    }

}
