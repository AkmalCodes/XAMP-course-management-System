<?php
        if (isset($_GET['course_id'])) {
            $course_id = $_GET['course_id'];
            $stmt = mysqli_stmt_init($con);
            $sql = "SELECT * FROM `course` where `course_id` = ?";

            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "i", $course_id);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
        
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo "sql error";
            }else{
                $row = mysqli_fetch_assoc($result);
                $course_name = $row['course_name'];
                $course_description = $row['course_description'];
                $course_credit = $row['course_credit'];
                $course_length = $row['course_length'];
                $instructor_id = $row['instructor_id'];
            }
        }
?>