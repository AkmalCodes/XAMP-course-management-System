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

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
  $user_type = mysqli_real_escape_string($con, $_POST['user_type']);
  $date_of_birth = mysqli_real_escape_string($con, $_POST['date_of_birth']);
  $address = mysqli_real_escape_string($con, $_POST['address']);
  $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);

  $stmt = mysqli_stmt_init($con);
  $query = "INSERT INTO `users` (user_name, password, email, first_name, last_name, user_type, date_of_birth, address, phone_number) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

  mysqli_stmt_prepare($stmt, $query);
  mysqli_stmt_bind_param($stmt, 'sssssssss', $username, $password, $email, $first_name, $last_name, $user_type, $date_of_birth, $address, $phone_number);

  $result = mysqli_stmt_execute($stmt);
  if ($result) {
    $success_message = "Successfully created";
    echo $success_message;

    // Reset variables to null

    header("Location: ../loginpage.php");
    exit();
  } else {
    echo mysqli_error($con);
  }

  mysqli_stmt_close($stmt);
}

?>
