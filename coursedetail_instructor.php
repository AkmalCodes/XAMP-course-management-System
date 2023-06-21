
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
}
?>
