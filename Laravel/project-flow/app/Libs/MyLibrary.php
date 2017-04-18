<?php
namespace App\Libs;

class MyLibrary {

    /**
     * @param $time
     * @return string
     */
    public static function getWidthByPercent($time){
        if($time ==0){
            return '0px';
        }
        $total_time = 288000;
        $my_time = $time;
        $result = $my_time / $total_time *100;
        return $result.'%';
    }

    /**
     * @param $time
     * @return float
     */
    public static function getHourFromSecond($time){
        $result = floor($time / 3600);
        return $result;
    }

    /**
     * @param $time
     * @return float
     */
    public static function getMinuteFromSecond($time){
        $hours = floor($time / 3600);
        $result = floor(($time - ($hours*3600)) / 60);
        //$result = floor($time / 3600);
        return $result;
    }
}