<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/eskills_logo_only.svg" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body id="registerbody">
    <div class="register always-centered">
        <div class="register-container always-centered">
            <img src="images/banner-logo-white.png" alt="Eskills Logo">
            <form class="always-centered" method="post" action="utils/register.php" onsubmit="return validateForm()">
                <div id="userpass">
                    <div class="username">
                        <h4>Username</h4>
                        <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                    <div class="password">
                        <h4>Password</h4>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="email">
                    <h4>Email</h4>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div id="fnamelname">
                    <div class="fname">
                        <h4>First Name</h4>
                        <input type="text" class="form-control" placeholder="First Name" name="first_name">
                    </div>
                    <div class="lname">
                        <h4>Last Name</h4>
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                    </div>
                </div>
                <div class="dob">
                    <h4>Date of Birth</h4>
                    <input type="date" class="form-control" name="date_of_birth">
                </div>
                <div class="address">
                    <h4>Address</h4>
                    <input type="text" class="form-control" placeholder="Address" name="address">
                </div>
                <div class="phonenum">
                    <h4>Phone Number</h4>
                    <input type="text" class="form-control" placeholder="Phone Number" name="phone_number">
                </div>
                <div class="usertype">
                    <h4>Register as</h4>
                    <select name="user_type" id="user_type">
                        <option value="instructor">Instructor</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <button type="submit" name="submit" id="register">Create Account</button>
                <a href='index.php'>Already have an account? Back to Login</a>
            </form>
        </div>
    </div>
</body>

</html>