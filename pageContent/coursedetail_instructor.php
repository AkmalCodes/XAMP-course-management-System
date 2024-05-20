<?php
    $stmt = mysqli_stmt_init($con);
    $sql = "SELECT * FROM `instructor` where `instructor_id` = ?";

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"i",$instructor_id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_error($stmt)) {
        echo "SQL error: " . mysqli_stmt_error($stmt);
    }else {
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_array($result)) {
            $user_id = $row['user_id'];
    
            $sql = "SELECT * FROM `users` where `user_id` = ?";
            $stmt = mysqli_stmt_init($con);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
    
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_array($result);
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            
        }
    }
