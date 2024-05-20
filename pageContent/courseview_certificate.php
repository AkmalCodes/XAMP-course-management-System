<?php
//course_id & course_name &student_id & instructor_id
$user_id = $_SESSION['user_id']; // declare variable for session user_id
$instructor_id = $_GET['instructor_id'];
$course_name = $_GET['course_name'];
$course_id = $_GET['course_id'];
$student_id = $_GET['student_id'];


$stmt = mysqli_stmt_init($con);
$sql = "SELECT * FROM users WHERE user_id = ?"; // retrieve user full name

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$first_name = $row['first_name'];
$last_name = $row['last_name'];

$stmt = mysqli_stmt_init($con);
$sql = "SELECT * FROM instructor WHERE instructor_id = ?"; // retrieve user_id of instructor


mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $instructor_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$instructor_user_id = $row['user_id'];

$stmt = mysqli_stmt_init($con);
$sql = "SELECT * FROM users WHERE user_id = ?"; // retrieve full name of instructor for signature

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $instructor_user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$instructor_fname = $row['first_name'];
$instructor_lname = $row['last_name'];

$stmt = mysqli_stmt_init($con);
$sql = "SELECT * FROM certificate WHERE student_id = ? AND course_id = ?"; // retrieve data from enrollment

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "ii", $student_id,$course_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$completion_date = $row['completion_date']; 
?>


<div class="certificate">
    <h1>Certificate of Completion</h1>
    <div class="recipient">
        <p>This is to certify that</p>
        <h2><?php echo $first_name . ' ' . $last_name; ?></h2>
        <p>has successfully completed the course on <?php echo $course_name; ?></p>
    </div>
    <div class="signature">
        <p>Signature: <?php echo $instructor_fname . ' ' . $instructor_lname; ?></p>
        <p>Date: <?php echo date('d-m-Y', strtotime($completion_date)); ?></p>
    </div>
</div>


