<?php
include 'coursedetail_detail.php'; // gets from table course and instructor_id
include 'coursedetail_instructor.php'; // gets from table instructor
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
        <img id='instructorimage' src='images/profile.png'>
        <h3 id='instructorname'> <?php echo $first_name . ' ' . $last_name ?></h3>
    </div>
    <div class='instructor tablewrapper'>
        <div class='instructor available'> <!-- table for availability? -->
            <table class='instructor table'>
                <thead>
                    <th scope="col">day</th>
                    <th scope="col">time</th>
                    <th scope="col">class links</th>
                </thead>
                <tbody>
                    <td>Tuesday</td>
                    <td>08:00 am - 10:00 am</td>
                    <td>
                        <a href="#">link<a>
                    </td>
                </tbody>
            </table>
            <div>
            <?php include 'coursedetail_enroll.php'; ?>
            </div>
            
        </div>
        
    </div>
</div>