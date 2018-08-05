<?php 
    $latitude   = $_POST['latitude'];
    $longitude  = $_POST['longitude'];
    if (!empty($latitude) && !empty($longitude)) {
        $jsonurl = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".trim($latitude).",".trim($longitude)."&sensor=true";
        $json = file_get_contents($jsonurl,0,null,null);
        $json_output = json_decode($json);
        //echo $json_output->results[0]->formatted_address;
        // end curl
        //$data = json_decode($response);
        if ($json) {
            $lengkap = str_replace('"', " ", json_encode($json_output->results[0]->formatted_address));
            echo $lengkap;
        }else{
            echo json_encode(false);
        }
    }
 ?>
