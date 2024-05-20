<?php
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
if (isset($_POST['enroll'])) {
    $stmt = mysqli_stmt_init($con);
    $sql = "SELECT * FROM `student` WHERE user_id = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $student_id = $row['student_id'];

    $sql = "SELECT * FROM `enrollment` WHERE student_id = ? AND course_id = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $student_id,$course_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 0) { // check if it doesn't exist
        $insertsql = "INSERT INTO `enrollment` (student_id, course_id) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $insertsql);
        mysqli_stmt_bind_param($stmt, "ii", $student_id, $course_id);
        mysqli_stmt_execute($stmt);
        
        $insertsql = "INSERT INTO `certificate` (student_id, course_id) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, $insertsql);
        mysqli_stmt_bind_param($stmt, "ii", $student_id, $course_id);
        mysqli_stmt_execute($stmt);
        
        header("location: coursedetail.php?course_id=$course_id");
        exit();
    } else { // if it exists, display error
        header("location: coursedetail.php?course_id=$course_id&error=Already Enrolled!");
        exit();
    }
}
?>

<?php

if ($user_type === 'student') {
    echo "<form class='enroll' method='post'>
    <h4>Enroll for this Course! </h4>
    <input id='enroll' type='submit' name='enroll' value='Enroll'></input>";
?>

    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']  ?></p>
    <?php } ?>
<?php
    echo "</form>";
}
?>