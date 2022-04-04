<?php


namespace Khaleds\LaravelProduct\Libraries;


class ApiResponseLibrary
{


    public static $append=[];
    // Response data with status code 200
    public static function ResponseWithData($data){
        return response(['status' => true, 'data' => $data,'appends'=>self::$append]);
    }

    // Response error with status code 500
    public static function ResponseError($message){
        return response(['status' => false, 'error' => $message],500);
    }

}
