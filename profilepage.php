<?php
    include 'utils/connect.php';
    include 'utils/session_start.php';
    include 'utils/sessionnull.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/eskills_logo_only.svg" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'pageContent/header.html'; ?>
    <main>
        <!-- add profilenav.php to profilestudent.php -->
        <?php include 'pageContent/nav.php'; ?>
        <section class="main-content">
            <div class="grid">
                <!-- add profilegrid.php to profilestudent.php -->
                <?php include 'pageContent/profile_grid.php'; ?>
            </div>
        </section>
    </main>
    <?php include 'pageContent/footer.html'; ?>
</body>

</html>