<?php
    include 'connect.php';
    include 'session_start.php';
    include 'sessionnull.php';
    $user_id = $_SESSION['user_id'];
    $stmt = mysqli_stmt_init($con);
    $sql = "SELECT * FROM users WHERE user_id = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        $password = $row['password'];
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the submitted form data is valid
        if(isset($_POST['old_pass']) && isset($_POST['new_pass']) && isset($_POST['new_pass1'])) {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $new_pass1 = $_POST['new_pass1'];

            // Verify if the old password matches the stored password
            if($old_pass === $password) {
                // Check if the new password and confirm password match
                if($new_pass === $new_pass1) {
                    // Update the password in the database if the new password is filled
                    if (!empty($new_pass)) {
                        $update_stmt = mysqli_stmt_init($con);
                        $update_sql = "UPDATE users SET password = ? WHERE user_id = ?";
                        mysqli_stmt_prepare($update_stmt, $update_sql);
                        mysqli_stmt_bind_param($update_stmt, "si", $new_pass, $user_id);
                        mysqli_stmt_execute($update_stmt);
                        header("Location: ../profile_update.php?success=you have changed your password");
                        exit;
                    }else{
                        header("Location: ../profile_update.php?error=passwords cannot be empty");
                        exit;
                    }
                    // Redirect to a success page or perform any additional actions
                   
                } else {
                    // Passwords don't match
                    header("Location: ../profile_update.php?error=passwords do not match");
                }
            } else {
                // Incorrect old password
                header("Location: ../profile_update.php?error=your password is incorrect");
            }
        } else {
            // Invalid form data
            echo "Invalid form data.";
        }
    }
?>
