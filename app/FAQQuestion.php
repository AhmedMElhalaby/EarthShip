<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Helpers;
use Session ;

class FAQQuestion extends Model
{
    protected $table = 'faq_question';
    protected $fillable = ['question','answer','faq_category_id'];
    protected $hidden = ['created_at','updated_at']; 
    protected static $rules;

    public static function getValidatorRules(){
        if (!self::$rules) {
            self::$rules = array(
                'question' => 'required',
                'answer' => 'required',
                'faq_category_id' => 'required',
            );
        }
        return self::$rules;
    }

    public function category() {
        return  $this->belongsTo('App\FAQCategory');
    }

    public static function saveFAQQuestion($attributes,$id){
        $validator = Helpers::isValid($attributes,self::getValidatorRules());
        if(!is_null($validator)){
            Session::flash('danger', $validator);
        }
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
