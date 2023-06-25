<?php
include 'config/session_start.php';
?>

<head>
    <script src="js/navbar.js" async></script>
</head>

<div id="nav" class="navbar">
    <div id="closenavdiv">
        <button id="closenav" cursor="pointer"><img id="closenavimg" src='images/menu.png'></button>
    </div>
    <ul>
        <li class="list" id="li-img">
            <img id="navimg" src="images/profile.png">
            <h3><a href="profilepage.php"><?php echo $_SESSION['user_name'] ?></a></h3>
        </li>
        <li class="list"><a href="#">HOME</a></li>
        <li class="list"><a href="courseview.php"> COURSES</a></li>
        <li id="profiledropdown" class="list"><a href="profilepage.php"> PROFILE</a></li>
        <li class="list"><a href="#"> SCHEDULE</a></li>
        <li class="list"><a href="utils/logout.php"> LOGOUT</a></li>
    </ul>
</div>