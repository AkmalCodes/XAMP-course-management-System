<?php
    $sql = "SELECT * FROM `instructor` where `instructor_id` = $instructor_id";
    $result = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
    
        $sql = "SELECT * FROM `users` where `user_id` = $user_id";
        $result = mysqli_query($con, $sql);
        if ($row = mysqli_fetch_array($result)) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
        }    
    }
?>
