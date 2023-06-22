<?php
        if (isset($_GET['course_id'])) {
            $course_id = $_GET['course_id'];
            $sql = "SELECT * FROM `course` where `course_id` = $course_id";
            $result = mysqli_query($con, $sql);
        
            $row = mysqli_fetch_array($result);
            $course_name = $row['course_name'];
            $course_description = $row['course_description'];
            $course_credit = $row['course_credit'];
            $course_length = $row['course_length'];
            $instructor_id = $row['instructor_id'];
        }
        
?>