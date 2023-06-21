<?php
    include 'config/connect.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Student Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <img id="pagebckground" src="images/v915-wit-011.jpg">
    <div id="profile-container">
        <!-- add profilenav.php to profilestudent.php -->
        <?php include 'nav.php'; ?>
        <div class="grid-container">
            <div class="grid">
                <!-- add profilegrid.php to profilestudent.php -->
                <?php include 'profilegrid.php'; ?>
            </div>
        </div>
    </div>


</body>

</html>