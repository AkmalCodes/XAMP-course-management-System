<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body id="loginbody">
    <div class="login">
        <div class="login-container">
            <form method="post" action="utils/login.php">
                <h2>Training Provider Management System</h2>
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div class="username">
                    <label>Username</label>
                    <input type="text" name="user_name" placeholder="Enter name">
                </div>
                <div class="password">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter password">
                </div>
                <input id="login" type="submit" value="Login">
            </form>
        </div>
        <?php echo "<a href='registerpage.php'>Register</a>"; ?>
    </div>
    
</body>

</html>