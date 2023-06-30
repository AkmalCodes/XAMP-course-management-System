<?php

    if($_SESSION['user_name']){

    }else{
        header("location:utils/sessionnull_true.php");
        // sleep(5);
        exit();
    }
    
?>