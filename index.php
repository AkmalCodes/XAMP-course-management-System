<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to E-Skills</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/eskills_logo_only.svg" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<!-- This is the login page, the starting page of the website. REPLACED loginpage.php -->

<body id="loginbody">
    <div class="login always-centered">
        <div class="login-container always-centered">
            <img src="images/banner-logo-white.png" alt="Eskills Logo">
            <form class="always-centered" method="post" action="utils/login.php">
                <h2>Welcome!</h2>
                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div id="username-login" class="always-centered">
                    <input type="text" name="user_name" placeholder="Username">
                </div>
                <div id="password-login" class="always-centered">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <input id="login" type="submit" value="Login">
                <a href='registerpage.php'>No account? Register here</a>
            </form>
        </div>
    </div>
</body>

</html>