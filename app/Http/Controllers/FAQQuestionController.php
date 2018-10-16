<?php

namespace App\Http\Controllers;

use App\FAQQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQQuestionController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
     }
 
    public function Add($id){
        return view('Dashboard.FAQ.Question.add',compact('id'));
    }
    public function postAdd(Request $request){
        return(FAQQuestion::saveFAQQuestion($request->all(), null));
    }
    public function Edit($category,$id){
        $FAQQuestion = FAQQuestion::where('id',$id)->first();
        return view('Dashboard.FAQ.Question.edit',compact('FAQQuestion','category'));
    }
    public function postEdit(Request $request){
        return(FAQQuestion::saveFAQQuestion($request->all(), $request->id));
        //return redirect('admin/faq-category-question/'.$request->faq_category_id)->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $FAQQuestion = FAQQuestion::where('id',$id)->first();
        $category=$FAQQuestion->faq_category_id ;
        if (FAQQuestion::destroy($id)) {
            return redirect('admin/faq-category-question/'.$category)->withSuccess('FAQ Question Successfully Deleted!');
        }
        return redirect('admin/faq-category-question/'.$category)->withDanger('Failed Delete FAQ Question !');
    }
}
