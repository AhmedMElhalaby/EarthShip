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
        $validation = $request->validate(FAQQuestion::$rules);
        $new = (new FAQQuestion)->CreateFAQQuestion($request);
        return redirect('admin/faq-category-question/'.$request->faq_category_id)->withSuccess('Successful Added!');;
    }
    public function Edit($category,$id){
        $FAQQuestion = FAQQuestion::where('id',$id)->first();
        return view('Dashboard.FAQ.Question.edit',compact('FAQQuestion','category'));
    }
    public function postEdit(Request $request){
        $validation = $request->validate(FAQQuestion::$rules);
        $new = (new FAQQuestion)->UpdateFAQQuestion($request);
        return redirect('admin/faq-category-question/'.$request->faq_category_id)->withInfo('Successful Updated!');
    }
    public function Delete($id){
        $FAQQuestion = FAQQuestion::where('id',$id)->first();
        $category=$FAQQuestion->faq_category_id ;
        $FAQQuestion->delete();
        return redirect('admin/faq-category-question/'.$category)->withDanger('Successful Deleted!');;
    }
}
