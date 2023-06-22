<?php
include 'config/connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Course view</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/profile.js" async></script>
</head>

<body>
    <img id="pagebckground" src="images/v915-wit-011.jpg">
    <div id="profile-container">
        <?php include 'nav.php'; ?>
        <div class="grid-container">
            <div class="table container">
            <?php include 'coursedetail_content.php'; ?>
            </div>
        </div>
    </div>


</body>

</html>