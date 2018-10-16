<?php

namespace App\Http;

class Helpers
{


    protected static $validator;

    public static function getFromTable($table, $key, $value, $where = "", $soft_delete = false) {
        if ($where) {
            $rs = \DB::table($table)->select($key, $value);
            for ($i = 0; $i < @count($where); $i++)
                $rs->where($where[$i][0], $where[$i][1], $where[$i][2]);
            if ($soft_delete)
                $rs = $rs->whereNull('deleted_at');
            $rs = $rs->get();
        }
        else {
            $rs = \DB::table($table)->select($key, $value);
            if ($soft_delete)
                $rs = $rs->whereNull('deleted_at');
            $rs = $rs->get();
        }
        return $rs;
    }

    public static function isValid($attributes,$rules){

        self::$validator = \Validator::make($attributes,$rules) ;

        if(!self::$validator->passes()){
            return ['status'=>false ,'error_type' =>'validate_inputs' ,'msg' => self::$validator->messages()];
        }

        return null;
    }



}
