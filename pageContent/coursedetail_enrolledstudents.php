<?php
$course_id = $_GET['course_id'];
?>

<div class="table container">
    <h1>Student List:</h1>
        <table class="courseviewtable">
            <thead>
                <tr>
                    <th scope="col">Student id</th>
                    <th scope="col">Student name</th>
                    <th scope="col">Set Completion</th>
                    <th scope="col">Completion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmtTemp = mysqli_stmt_init($con);
                $sqlTemp = "SELECT * FROM `enrollment` WHERE `course_id` = ?";
                mysqli_stmt_prepare($stmtTemp, $sqlTemp);
                mysqli_stmt_bind_param($stmtTemp, "i", $course_id);
                mysqli_stmt_execute($stmtTemp);
                $resultTemp = mysqli_stmt_get_result($stmtTemp);

                while ($row = mysqli_fetch_array($resultTemp)) {
                    $student_id = $row['student_id'];

                    $stmtTemp2 = mysqli_stmt_init($con);
                    $sqlTemp2 = "SELECT * FROM `student` WHERE `student_id` = ?";
                    mysqli_stmt_prepare($stmtTemp2, $sqlTemp2);
                    mysqli_stmt_bind_param($stmtTemp2, "i", $student_id);
                    mysqli_stmt_execute($stmtTemp2);
                    $resultTemp2 = mysqli_stmt_get_result($stmtTemp2);

                    if ($row2 = mysqli_fetch_array($resultTemp2)) {
                        $student_user_id = $row2['user_id'];

                        $stmtTemp3 = mysqli_stmt_init($con);
                        $sqlTemp3 = "SELECT * FROM `users` WHERE `user_id` = ?";
                        mysqli_stmt_prepare($stmtTemp3, $sqlTemp3);
                        mysqli_stmt_bind_param($stmtTemp3, "i", $student_user_id);
                        mysqli_stmt_execute($stmtTemp3);
                        $resultTemp3 = mysqli_stmt_get_result($stmtTemp3);

                        if ($row3 = mysqli_fetch_array($resultTemp3)) {
                            $student_fname = $row3['first_name'];
                            $student_lname = $row3['last_name'];

                            $stmtTemp4 = mysqli_stmt_init($con);
                            $sqlTemp4 = "SELECT * FROM `certificate` WHERE `course_id` = ? AND `student_id` = ?";
                            mysqli_stmt_prepare($stmtTemp4, $sqlTemp4);
                            mysqli_stmt_bind_param($stmtTemp4, "ii", $course_id, $student_id);
                            mysqli_stmt_execute($stmtTemp4);
                            $resultTemp4 = mysqli_stmt_get_result($stmtTemp4);

                            if ($row4 = mysqli_fetch_array($resultTemp4)) {
                                $completion = $row4['completion'];
                            } else {
                                $completion = 'Not Completed';
                            }

                            echo '<tr>';
                            echo '<td>' . $student_id . '</td>';
                            echo '<td>' . $student_fname . ' ' . $student_lname . '</td>';
                            echo '<td><a href="pageContent/coursedetail_complete_enrolledstudents.php?course_id=' . $course_id . '&student_id='.$student_id.'">Complete</a></td>';
                            echo '<td>' . $completion . '</td>';
                            echo '</tr>';
                        }
                    }
                }
                ?>
            </tbody>
        </table>
</div>
