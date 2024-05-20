<?php

    if(isset($_SESSION['user_name'])){
    }else if(!isset($_SESSION['user_name'])){
        header("location:utils/sessionnull_true.php");
        // sleep(5);
        exit();
    }
    
?>