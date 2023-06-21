<?php

    $con = new mysqli("localhost","root","","managementdb");
    if($con){
        echo ""; // insert connection succes message
    }else{
        die("Could not connect to managementdb");
    }
    
?>