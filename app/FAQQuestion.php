<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class FAQQuestion extends Model
{
    protected $table = 'faq_question';
    protected $fillable = ['question','answer','faq_category_id'];
    protected $hidden = ['created_at','updated_at']; 
    public static $rules =[
                'question' => 'required|max:255',
                'answer' => 'required|max:255',
                'faq_category_id' => 'required',
    ];


    public function category() {
        return  $this->belongsTo('App\FAQCategory');
    }

    public static function saveFAQQuestion($attributes,$id){
        if(is_null($id)){
            $FAQQuestion =new FAQQuestion();
            $FAQQuestion->created_at =date('Y-m-d H:i:s');
        }else{
            $FAQQuestion = self::findOrFail($id);
            $FAQQuestion->updated_at =date('Y-m-d H:i:s');
        }

        $inputs = ['question','answer','faq_category_id'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $inputs)) {
                if ( $value != "" ) {
                    $FAQQuestion->$key=$value;
                }
            }
        }

       if($FAQQuestion->save()){
            return redirect('admin/faq-category-question/'.$attributes['faq_category_id'])->withSuccess('Operation Accomplished Successfully!');
        }
        return redirect('admin/faq-category-question/'.$attributes['faq_category_id'])->withDanger('An Error Occurred During Execution!');

    }


}
