<?php
    include 'utils/connect.php';
    include 'utils/session_start.php';
    include 'utils/sessionnull.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/eskills_logo_only.svg" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'pageContent/header.html'; ?>
    <main>
        <?php include 'pageContent/nav.php'; ?>
        <section class="main-content">
            <div class="table container">
                <?php include 'pageContent/courseview_certificate.php'; ?>
            </div>
        </section>
    </main>
    <?php include 'pageContent/footer.html'; ?>
</body>

</html>