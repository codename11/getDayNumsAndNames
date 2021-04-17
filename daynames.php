<?php 

    function getDayNumsAndNames($date){

        $obj = new stdClass();
        $str = strtotime($date);
        $obj->monthNum = date("m", $str);
        $obj->month = date("F", $str);
        $obj->year = date("Y", $str);

        $numOfDays=cal_days_in_month(CAL_GREGORIAN,$obj->monthNum,$obj->year);

        $obj->dayNamesInMonth = [];
        for ($i = 1; $i <= $numOfDays; $i++) {
            $obj->dayNamesInMonth[$i] = date("l", strtotime($i."-".$obj->monthNum."-".$obj->year));
        }

        echo(json_encode($obj));

    }
    
    if(isset($_POST) && !empty($_POST["datum"])){
        getDayNumsAndNames(1, $_POST["datum"]);
    }
    
?>