<?php

include 'config/connect.php';
include 'coursedetail_instructor.php';
$user_id =$_SESSION['user_id'];
?>

<div class="detail name">
    <h1><?php echo $course_name ?></h1>
</div>
<div class="detail description">
    <h3><?php echo $course_description ?></h3>
</div>
<div class="detail course">
    <h2>Length of course: <?php echo $course_length  ?> weeks</h2>
    <h2>Credits earned: <?php echo $course_credit ?> credits</h2>
</div>
<div class="detail instructor">
    
    <div class='instructor alias'>
        <img id='instructor image' src='images/profile.png'>
        <h3 id='instructor name'> <?php echo $first_name . ' ' . $last_name ?></h3>
    </div>
    <div class='instructor available'>
        table for availability?
    </div>
</div>
<div class="detail register">
    <?php include 'coursedetail_enroll.php'; ?>
</div>