<?php
include 'utils/connect.php';
include 'pageContent/profile_grid_getdata.php';
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
    <h6><?php echo fixdate($date_of_birth); ?></h6>
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

<?php
if ($user_type === "student") {
include 'profile_grid_student.php';
} else if ($user_type === "instructor") { 
include 'profile_grid_instructor.php';
}
?>