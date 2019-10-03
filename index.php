<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
require_once('Toll.php');

$vehicle = array( 
            "0" => array (
               "name" => 'A',
               "type" => 'Normal',  
               "arrival_time" => '10:00 AM'
            ),
            
            "1" => array (
               "name" => 'B',
               "type" => 'Normal',  
               "arrival_time" => '10:00 AM'
            ),
         "2" => array (
               "name" => 'C',
               "type" => 'Normal',  
               "arrival_time" => '10:01 AM'
            ),
         "3" => array (
               "name" => 'D',
               "type" => 'VIP',  
               "arrival_time" => '10:00 AM'
            ),
         "4" => array (
               "name" => 'A1',
               "type" => 'Normal',  
               "arrival_time" => '10:00 AM'
            ),
            
            "5" => array (
               "name" => 'B1',
               "type" => 'Normal',  
               "arrival_time" => '11:02 AM'
            ),
         "7" => array (
               "name" => 'D1',
               "type" => 'VIP',  
               "arrival_time" => '10:00 AM'
            ),
         "8" => array (
               "name" => 'A2',
               "type" => 'Normal',  
               "arrival_time" => '10:00 AM'
            ),
         "9" => array (
               "name" => 'B2',
               "type" => 'Normal',  
               "arrival_time" => '11:00 AM'
            ),
            "10" => array (
               "name" => 'C2',
               "type" => 'Normal',  
               "arrival_time" => '10:00 AM'
            ),
         "11" => array (
               "name" => 'D2',
               "type" => 'VIP',  
               "arrival_time" => '10:00 AM'
            )
         
         );


$obj = new Toll($vehicle);

$obj->calculate_departure_time();

?>