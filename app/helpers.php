<?php

function changeDateFormat($date, $dateformat){
    return \Carbon\Carbon::createFromFormat("Y-m-d",$date)->format($dateformat);
}