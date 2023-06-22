<?php 
include '../config/connect.php';
$username = '';
$email = '';
$password = '';
$first_name = '';
$last_name = '';
$user_type = '';
$date_of_birth = '';
$phone_number = '';
$address = '';
$success_message = '';


if (isset($_POST['submit'])) { // no error checking yet
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
  $user_type = mysqli_real_escape_string($con, $_POST['user_type']);
  $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
  $sql = "INSERT INTO `users` (user_name,password,email,first_name,last_name,user_type,date_of_birth,address,phone_number) 
        VALUES ('$username','$password', '$email', '$first_name', '$last_name', '$user_type','$date_of_birth','$address','$phone_number')";

    // if($user_type === 'student'){
    //     $sql = "INSERT INTO `student`
    // }

  $result = mysqli_query($con, $sql); // connection variable and query variable
  if ($result) {
    $success_message = "successfully created";
    echo $success_message;

    //reset variable to null

    header("Location: ../loginpage.php");
    exit();
  } else {
    echo die(mysqli_error($con));
  }
}

?>