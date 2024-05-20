<?php
include 'coursedetail_detail.php'; // gets from table course and instructor_id
include 'coursedetail_instructor.php'; // gets from table instructor
?>

<div class="detail name">
    <h1><?php echo $course_name ?></h1>
</div>
<div class="detail description">
    <h4><?php echo $course_description ?></h4>
</div>
<div class="detail course">
    <h4>Length of course: <?php echo $course_length?> weeks</h4>
    <h4>Credits earned: <?php echo $course_credit ?> credits</h4>
</div>
<div class="detail instructor">
    <div class='instructor alias'>
        <img id='instructorimage' src='images/profile.png'>
        <h3 id='instructorname'> <?php echo $first_name . ' ' . $last_name ?></h3>
    </div>
    <div class='instructor tablewrapper'>
        <div class='instructor available'>
            <!-- table for availability? -->
            <table class='instructor table'>
                <thead>
                    <th scope="col">day</th>
                    <th scope="col">time</th>
                    <th scope="col">class links</th>
                </thead>
                <tbody>
                    <?php include 'coursedetail_instructor_availability.php';?>

                </tbody>
            </table>
            <div>
                <?php include 'coursedetail_enroll.php'; ?>
            </div>
        </div>
    </div>
</div>
<div class="detail reviews">
    <?php 
    if($_SESSION['user_type'] === 'student'){ // checks if current user is student to display review forms
        echo "<div class='reviews instructor'>";
        include 'coursedetail_coursereview.php';
        echo "</div>";
        echo "<div class='reviews course'>";
        include 'coursedetail_instructorreview.php';
        echo "</div>";
    }else if($_SESSION['user_type'] === 'instructor'){
        echo "<div>";
        include 'coursedetail_enrolledstudents.php';
        echo"</div>";
    }
    ?>
</div>