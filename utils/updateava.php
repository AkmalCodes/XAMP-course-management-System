<?php
include '../utils/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (isset($_POST["add"])) {

        // Button 1 was clicked
        // echo "Button 1 was clicked.";

        $course_id = $_POST["course_id"];
        $instructor_id = $_POST["instructor_id"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $day_of_week = $_POST["day_of_week"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];

        // Prepare the SQL statement
        $sql = "INSERT INTO course_schedule (course_id, instructor_id, start_time, end_time, day_of_week, start_date, end_date) 
            VALUES ('$course_id', '$instructor_id', '$start_time', '$end_time', '$day_of_week', '$start_date', '$end_date')";

        $result = mysqli_query($con, $sql); // connection variable and query variable
        if ($result) {
            $success_message_add = "New schedule added successfully.";
            echo "<script>alert('$success_message_add'); window.location.href = '../courseschedule_instructor.php';</script>";
            exit();

        } else {
            echo die(mysqli_error($con));
        }


    } elseif (isset($_POST["delete"])) {

        // Button 2 was clicked
        // echo "Button 2 was clicked.";

        // Any existing schedule selected
        if (isset($_POST['counter'])) {

            // echo "Selected";

            $counter = $_POST['counter'];
            $innercounter = 1;

            $instructor_id = $_POST["instructor_id"];

            $sql = "SELECT * FROM course_schedule WHERE instructor_id = $instructor_id";
            $result = mysqli_query($con, $sql);

            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($innercounter == $counter) {
                        $course_id = $row['course_id'];
                        $instructor_id = $row['instructor_id'];
                        $start_time = $row['start_time'];
                        $end_time = $row['end_time'];
                        $day_of_week = $row['day_of_week'];
                        $start_date = $row['start_date'];
                        $end_date = $row['end_date'];

                        $sql1 = "DELETE FROM course_schedule WHERE course_id = '$course_id' AND instructor_id = '$instructor_id' AND start_time = '$start_time' AND end_time = '$end_time' AND day_of_week = '$day_of_week' AND `start_date` = '$start_date' AND end_date = '$end_date'";

                        $result1 = mysqli_query($con, $sql1); // connection variable and query variable

                        // stud
                        if ($result1) {
                            $success_message_delete = "Selected schedule deleted successfully.";
                            echo "<script>alert('$success_message_delete'); window.location.href = '../courseschedule_instructor.php';</script>";
                            exit();
                        } else {
                            echo die(mysqli_error($con));
                        }



                    }
                    $innercounter += 1;
                }
            }

        }
        // Not selecting any schedule
        else {
            echo "<script>alert('Please select a schedule to be deleted.'); window.location.href = '../courseschedule_instructor.php';</script>";
            exit();

        }
        // 


    } else {
        // No button was clicked
        echo "No button was clicked.";
    }
}
?>