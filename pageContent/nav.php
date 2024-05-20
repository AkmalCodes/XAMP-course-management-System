<aside id="nav" class="side-content">
    <ul>
        <li class="always-centered" id="li-img">
            <img id="navimg" src="images/profile.png">
            <h3>Hello, <?php echo $_SESSION['user_name'] ?>!</h3>
        </li>
        <a class="navbuttons" href="courseview.php">
            <li class="list">ALL COURSES</li>
        </a>
        <?php if ($_SESSION['user_type'] === 'instructor') {
            echo "
            <a class='navbuttons' href='courseschedule_instructor.php'>
            <li class='list'>MY SCHEDULE</li>
            </a>
            ";
        } 
        if ($_SESSION['user_type'] === 'trainer') {
            echo "
            <a class='navbuttons' href='editcourse.php'>
            <li class='list'>COURSE MANAGER</li>
            </a>
            ";
        } 
        ?>

        <a class="navbuttons" href="profilepage.php">
            <li class="list">MY PROFILE</li>
        </a>
        <a class="navbuttons" href="profile_update.php">
            <li class="list">CHANGE PASSWORD</li>
        </a>
    </ul>
</aside>