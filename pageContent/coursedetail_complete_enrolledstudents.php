<?php
    include '../utils/connect.php';
    $course_id = $_GET['course_id'];
    $student_id = $_GET['student_id'];

    $stmt = mysqli_stmt_init($con);
    $sql = "UPDATE `certificate` SET `completion` = 'complete', `completion_date` = NOW() WHERE `course_id` = ? AND `student_id` = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $course_id, $student_id);
    mysqli_stmt_execute($stmt);

    // header("Location: ../coursedetail.php?course_id=$course_id.php");
    exit;
?>
