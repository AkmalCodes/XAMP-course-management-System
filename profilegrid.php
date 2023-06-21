<?php
include 'config/connect.php';


$user_name = $_SESSION['user_name'];
$user_Id = $_SESSION['user_id'];
$user_Type = $_SESSION['user_type'];

$sql = "SELECT * FROM users WHERE user_name = '$user_name' AND user_id = '$user_Id'";
$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        $email = $row['email'];
        $first_name  = $row['first_name'];
        $last_name = $row['last_name'];
        $date_of_birth = $row['date_of_birth'];
        $address = $row['address'];
        $phone_number = $row['phone_number'];
    }
}

if ($_SESSION['user_type'] === 'student') { // query if user type is student
    $sql1 = "SELECT * FROM student WHERE user_id ='$user_Id'";
    $result1 = mysqli_query($con, $sql1);
    if ($result1) {
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $enrollment_date = $row['enrollment_date'];
                $major = $row['major'];
                $year_of_study = $row['year_of_study'];
            }
        }
    } else {
        echo "Error executing SQL query: " . mysqli_error($con);
    }
} else if ($_SESSION['user_type'] === 'instructor') {  // query if user t ype is instructor
    $sql1 = "SELECT * FROM instructor WHERE  user_id = '$user_Id'";
    $result1 = mysqli_query($con, $sql1);
    if ($result1) {
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $hire_date = $row['hire_date'];
                $specialty = $row['specialty'];
            }
        }
    } else {
        echo "Error executing SQL query: " . mysqli_error($con);
    }
}




?>


<div id="details1" class="details">
    <img id="current-picture" src="images/profile.png" alt="profile-pict">
    <button id="change-pict">Change Picture</button>
</div>
<div id="username-1" class="details">
    <h5>Username: </h5>
</div>
<div id="username-2" class="details">
    <h6><?php echo $user_name; ?></h6>
</div>
<div id="fullname-1" class="details">
    <h5>Full Name: </h5>
</div>
<div id="fullname-2" class="details">
    <h6><?php echo $first_name . " " . $last_name; ?></h6>
</div>
<div id="major-1" class="details">
    <h5>Major: </h5>
</div>
<div id="major-2" class="details">
    <h6><?php echo $major; ?></h6>
</div>
<div id="enrolmentdate-1" class="details">
    <h5>Enrollment Date: </h5>
</div>
<div id="enrolmentdate-2" class="details">
    <h6><?php echo $enrollment_date; ?></h6>
</div>
<div id="email-1" class="details">
    <h5>Email: </h5>
</div>
<div id="email-2" class="details">
    <h6><?php echo $email; ?></h6>
</div>
<div id="dob-1" class="details">
    <h5>Date Of Birth: </h5>
</div>
<div id="dob-2" class="details">
    <h6><?php echo $date_of_birth; ?></h6>
</div>
<div id="address-1" class="details">
    <h5>Address: </h5>
</div>
<div id="address-2" class="details">
    <h6><?php echo $address; ?></h6>
</div>
<div id="phonenumber-1" class="details">
    <h5>Phone number: </h5>
</div>
<div id="phonenumber-2" class="details">
    <h6><?php echo $phone_number; ?></h6>
</div>