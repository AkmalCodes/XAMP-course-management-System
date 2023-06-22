<?php
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
if (isset($_POST['enroll'])) {
    $sql = "SELECT * FROM `student` WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $student_id = $row['student_id'];

    $sql = "SELECT * FROM `enrollment` WHERE student_id = '$student_id' AND course_id = '$course_id'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) === 0) { // check if dosent exist
        $insertsql = "INSERT INTO `enrollment` (student_id,course_id) VALUES ('$student_id', '$course_id')";
        mysqli_query($con, $insertsql);
        header("location: coursedetail.php?course_id=$course_id");
        exit();
    } else { // if it exists display error
        header("location: coursedetail.php?course_id=$course_id&error= Already Enrolled!");
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