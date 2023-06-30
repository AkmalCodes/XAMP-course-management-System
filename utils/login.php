<?php

include 'connect.php';

if (isset($_POST['user_name']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data); // removes whitespace on left and right of string
        // ltrim() remove on left rtrim() remove on right
        // $data = stripslashes($data);// removes slashes
        // $data = htmlspecialchars($data);
        return $data;
    }

    $user_name = validate($_POST['user_name']);
    $password = validate($_POST['password']);

    if (empty($user_name)) { // checks if input for username is not empty
        header("location: ../loginpage.php?error=Username is required");
        exit();
    } elseif (empty($password)) { // checks if input for username is not empty
        header("location: ../loginpage.php?error=Password is required");
        exit();
    } else{
        $sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL FAILED";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $user_name, $password); // using prepared statements for secure
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['user_name'] === $user_name && $row['password'] === $password) { // if credentials correct
                    include 'session_start.php';
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_type'] = $row['user_type'];
                    header("Location: ../courseview.php");
                    exit();
                } else { // condition for wrong credentials
                    header("Location: ../loginpage.php?error=Incorrect User Name or Password"); 
                    exit();
                }
            } else {
                header("Location: ../loginpage.php?error=Incorrect User Name or Password");
                exit();
            }
        }
    }
}
