<?php
class Timedate extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function get_nice_date($timestamp, $format) 
{
    switch ($format) {
        case 'full':
        // FULL // March 10th of Feburary  2017 at 5:16:00 PM
        $date = date("l jS \of F Y \a\\t h:i:s A",$timestamp); 
        break;

        case 'shorter':
        //SHORTER // 18th of Feburary 2017
        $date = date('jS \of F Y',$timestamp);
        break;

        case 'old':
        // OLD // 03/10/01
        $date = date("j\/n\/y",$timestamp); 
        break;

        case 'mini':
        // MINI // 18th Feb 2017
        $date = date('jS M Y',$timestamp);
        break;

        case 'datepicker':
        // MINI // 18th Feb 2017
        $date = date('m\/d\/y',$timestamp);
        break;

        case 'datepicker_us':
        // MINI // 18th Feb 2017
        $date = date('m\/d\/y',$timestamp);
        break;

        case 'cool':
        // COOL // Friday 18th of Feburary 2017
        $date = date('l jS \of F Y',$timestamp);
        break;
    }
    return $date;
}

function make_timestamp_from_datepicker($datepicker) {
    $hour = 7;
    $minute = 0;
    $second = 0;

    $day = substr($datepicker, 0,2);
    $month = substr($datepicker, 3,2);
    $year = substr($datepicker, 6,4);

    $timestamp = mktime($hour, $minute, $second,  $month, $day,$year);

    return $timestamp;
}

function make_timestamp_from_datepicker_us($datepicker) {
    $hour = 7;
    $minute = 0;
    $second = 0;

    $month = substr($datepicker, 0,2);
    $day = substr($datepicker, 3,2);
    $year = substr($datepicker, 6,4);

    $timestamp = mktime($hour, $minute, $second,  $month, $day, $year);

    return $timestamp;
}


function make_timestamp($day, $month, $year) {
    $hour = 7;
    $minute = 0;
    $second = 0;

    $timestamp = mktime($hour, $minute, $second,  $month, $day,$year);

    return $timestamp;
}


}