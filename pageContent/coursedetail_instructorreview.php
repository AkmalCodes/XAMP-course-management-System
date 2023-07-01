<?php
$user_id = $_SESSION['user_id'];
if (isset($_POST['review-instructor'])) {
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
    $query = "INSERT INTO `instructor_review` (content, rating, student_id,instructor_id) VALUES (?,?,?,?)"; 

    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, 'siii', $review_content, $rating, $student_id,$instructor_id);

    $result = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}
?>


<head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<form class="instructor-review" method="post" action="">
    <h3>Rate this Instructor!</h3>
    <div class="rating-container">
        <fieldset class="rating">
            <input type="radio" name="rating" id="star5" value="5"><label for="star5" class="full"></label>
            <input type="radio" name="rating" id="star4" value="4"><label for="star4" class="full"></label>
            <input type="radio" name="rating" id="star3" value="3"><label for="star3" class="full"></label>
            <input type="radio" name="rating" id="star2" value="2"><label for="star2" class="full"></label>
            <input type="radio" name="rating" id="star1" value="1"><label for="star1" class="full"></label>
        </fieldset>
    </div>
    <div class="review-content">
        <input type="text" name="review-content" placeholder="review">
    </div>
    <div class="review-submit">
    <input id="reviewbtn" type="submit" value="submit" name="review-instructor">
</div>
</form>