<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQQuestion extends Model
{
    protected $table = 'faq_question';

    public static $rules =[
        'question' => 'required',
        'answer' => 'required',
        'faq_category_id' => 'required',
        
    ];

    protected $fillable = [
        'question','answer','faq_category_id',
    ];

    public function category() {
        return  $this->belongsTo('App\FAQCategory');
    }

    public function CreateFAQQuestion($request){
        $new = FAQQuestion::create(array('question'=>$request->question,'answer'=>$request->answer,'faq_category_id'=>$request->faq_category_id));
    }
    public static function UpdateFAQQuestion($request){
        $FAQQuestion = FAQQuestion::where('id',$request->id)->first();
        $FAQQuestion->update(array('question'=>$request->question,'answer'=>$request->answer,'faq_category_id'=>$request->faq_category_id));
    }


}
