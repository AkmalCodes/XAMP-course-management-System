


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
        <h1>Training Provider Management System</h1>
            <fieldset>
                <form method="post" action="utils/login.php">
                    <?php if(isset($_GET['error'])) { ?>
                        <p class = "error"><?php echo $_GET['error'];?></p>
                    <?php } ?>
                    <label>Username</label>
                    <input type="text" name="user_name" placeholder="Enter name">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter password">
                    <input type="submit" id="submit">
                </form>
            </fieldset>
    </section>
    <?php echo "<a href='registerpage.php'>Register</a>";?>
</body>

</html>