<?php 

    function getDayNumsAndNames($date){

        $obj = new stdClass();
        $str = strtotime($date);
        $obj->monthNum = date("m", $str);
        $obj->month = date("F", $str);
        $obj->year = date("Y", $str);

        $numOfDays=cal_days_in_month(CAL_GREGORIAN,$obj->monthNum,$obj->year);

        $obj->dayNamesInMonthWithNums = [];
        for ($i = 1; $i <= $numOfDays; $i++) {

            $obj->dayNamesInMonthWithNums[$i] = new stdClass();
            $obj->dayNamesInMonthWithNums[$i]->dayName = date("l", strtotime($i."-".$obj->monthNum."-".$obj->year));
            $obj->dayNamesInMonthWithNums[$i]->dayNum = $i;
            
        }

        return json_encode($obj);

    }
    
    if(isset($_POST) && !empty($_POST["datum"])){
        echo (getDayNumsAndNames($_POST["datum"]));
    }
    
?>