<?php 
const EARTH_RADIUS = 6371;
if(!function_exists('get_distance')){
    function get_distance($latitude1, $longitude1, $latitude2, $longitude2) {
    
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
    
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = EARTH_RADIUS * $c;
    
        return $d;
    }
}