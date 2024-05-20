<?php
$user_id = $_SESSION['user_id'];
if (isset($_POST['review-course'])) {
    $stmt = mysqli_stmt_init($con);
    $sql = "SELECT * FROM `student` WHERE user_id = ?";
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $student_id = $row['student_id'];

    $review_content = mysqli_real_escape_string($con, $_POST['review-content']);
    $rating = mysqli_real_escape_string($con, $_POST['rating']);

    $stmt = mysqli_stmt_init($con);
    $query = "INSERT INTO `course_review` (content, rating, student_id,course_id) VALUES (?,?,?,?)"; 

    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, 'siii', $review_content, $rating, $student_id,$course_id);

    $result = mysqli_stmt_execute($stmt);


    mysqli_stmt_close($stmt);
}
?>


<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<form class="course-review" method="post" action="">
    <h3>Rate this course!</h3>
    <div class="rating-container">
        <fieldset class="rating">
            <input type="radio" name="rating" id="star51" value="5"><label for="star51" class="full"></label>
            <input type="radio" name="rating" id="star41" value="4"><label for="star41" class="full"></label>
            <input type="radio" name="rating" id="star31" value="3"><label for="star31" class="full"></label>
            <input type="radio" name="rating" id="star21" value="2"><label for="star21" class="full"></label>
            <input type="radio" name="rating" id="star11" value="1"><label for="star11" class="full"></label>
        </fieldset>
    </div>
    <div class="review-content">
        <input type="text" name="review-content" placeholder="review">
    </div>
    <div class="review-submit">
    <input id="reviewbtn" type="submit" value="submit" name="review-course">
</div>
</form>
