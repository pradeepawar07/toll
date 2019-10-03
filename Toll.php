<?php


class Toll
{
    
    private $user_cars;
    
    public function __construct($user_cars)
    {
        
        $this->user_cars = $user_cars;
    }
    
    
    
    public function calculate_departure_time()
    {
        
        $vehicle = $this->user_cars;
        echo "<pre>";
        echo "Given input :\n";
        print_r($vehicle);
        echo "</pre>";
        
        #sort given array using time
        array_multisort(array_map('strtotime', array_column($vehicle, 'arrival_time')), SORT_ASC, $vehicle);
        
        #define two separte array for normal vehicle and vip vehicle 
        $i              = 0;
        $normal_vehicle = array();
        $vip_vehicle    = array();
        
        foreach ($vehicle as $k => $v) {
         #check vehicle type and separte vehicle according to type.
            if ($v['type'] == 'Normal') {
                $normal_vehicle[] = $v;
            } else {
                $vip_vehicle[] = $v;
            }
            
        }
        
        $final_normal_lane_array = array();
        $final_vip_lane_array    = array();
        $i                       = 1;
        $j                       = 1;
        
        foreach ($normal_vehicle as $k => $val) {
            $check_time = null;
            #Add vehicle into 4 differnt lane for normal type vehicle
            if ($i == 5) {
                $i = 1;
                $j++;
                
            }
            if ($k > 0)
                $check_time = $normal_vehicle[$k - 1]['arrival_time'];
            $arrival_time = strtotime($val['arrival_time']);
            if ($val['arrival_time'] !== $check_time) {
               #time is different, do different things here
               #calculate departure time
                $dep_time = date("H:i A", strtotime('+1 minutes', $arrival_time));
            } else {
                $dep_time = date("H:i A", strtotime('+' . $j . 'minutes', $arrival_time));
            }
            
            
            
            
            $val['departure_time']                   = $dep_time;
            $final_normal_lane_array['Lane ' . $i][] = $val;
            $lastFrom                                = $val['arrival_time'];
            $i++;
        }
        
        $i = 1;
        
        foreach ($vip_vehicle as $key => $val) {
            $check_time = null;
            #Add vehicle into 5th lane for VIP type vehicle
            $check_time = $vip_vehicle[$i - 1]['arrival_time'];
            
            $arrival_time = strtotime($val['arrival_time']);
            
            
            if ($val['arrival_time'] !== $check_time) {
                #time is different, do different things here
                #calculate departure time
                $dep_time = date("H:i A", strtotime('+' . $key . 'minutes', $arrival_time));
            } else {
                
                $dep_time = date("H:i A", strtotime('+' . $key + '1' . 'minutes', $arrival_time));
            }
            
            
            
            
            
            $val['departure_time']            = $dep_time;
            $final_vip_lane_array['Lane 5'][] = $val;
            $i++;
        }
        #Merge normal type array and VIP type array     
        echo "<pre>";
        echo "Output with departure time :\n";
        $final_arr = array_merge($final_normal_lane_array, $final_vip_lane_array);
        print_r($final_arr);
        echo "</pre>";
    }
    
}
?>