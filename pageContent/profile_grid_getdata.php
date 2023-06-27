<?php 

function fixdate($date){ // function to sort date dd-mm-yyyy instead of yyyy-mm-dd
    return date('d-m-Y',strtotime($date));
}

$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

$stmt = mysqli_stmt_init($con);
$sql = "SELECT * FROM users WHERE user_name = ? AND user_id = ?"; // query to basic user details
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "si", $user_name, $user_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

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
    $sql1 = "SELECT * FROM student WHERE user_id =?";
    mysqli_stmt_prepare($stmt, $sql1);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $result1 = mysqli_stmt_get_result($stmt);
    if ($result1) {
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $enrollment_date = $row['enrollment_date'];
                $enrollment_date = fixdate($enrollment_date);
                $major = $row['major'];
                $year_of_study = $row['year_of_study'];
                $year_of_study = fixdate($year_of_study);
            }
        }
    } else {
        echo "Error executing SQL query: " . mysqli_error($con);
    }
} else if ($_SESSION['user_type'] === 'instructor') {  // query if user type is instructor
    $sql1 = "SELECT * FROM instructor WHERE user_id = ?";
    mysqli_stmt_prepare($stmt, $sql1);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    
    $result1 = mysqli_query($con, $sql1);
    if ($result1) {
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $hire_date = $row['hire_date'];
                $hire_date = fixdate($hire_date);
                $specialty = $row['specialty'];
            }
        }
    } else {
        echo "Error executing SQL query: " . mysqli_error($con);
    }
}

?>