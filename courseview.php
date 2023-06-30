<?php
    include 'utils/connect.php';
    include 'utils/session_start.php';
    include 'utils/sessionnull.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Course view</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div id="profile-container">
        <?php include 'pageContent/nav.php'; ?>
        <div class="grid-container">
            <div class="table container">
                <?php include 'pageContent/courseview_table.php'; ?>
            </div>
        </div>
    </div>


</body>

</html>