<?php
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

$stmt = mysqli_stmt_init($con);

if ($user_type === 'instructor') {

    $sql1 = "SELECT instructor_id FROM instructor WHERE user_id = '$user_id'";
    $instructor_id_sql = mysqli_query($con, $sql1);
    while ($row = mysqli_fetch_array($instructor_id_sql)) {
        $instructor_id = $row['instructor_id'];
    }
    $sql = "SELECT * FROM `course` WHERE `instructor_id` = '$instructor_id'";
} else {
    $sql = 'SELECT * FROM `course`';
}

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<div table container>
    <h1>Courselist:</h1>
    <table class="courseviewtable">
        <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Title</th>
                <th scope="col">Links</th>
                <?php
                if ($user_type === 'student') {
                    echo "
                        <th scope='col'>Certificate</th>
                        <th scope='col'>Completion</th>
                        <th scope='col'>Enrolled</th>
                    </tr>";
                } else {
                    echo "</tr>";
                }
                ?>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                    $instructor_id = $row['instructor_id'];


                    if ($user_type === 'student') {
                        // Get status on enrollment for students only
                        $stmtTemp = mysqli_stmt_init($con);

                        $sqlTemp = "SELECT * FROM `student` WHERE `user_id` = ?";
                        mysqli_stmt_prepare($stmtTemp, $sqlTemp);
                        mysqli_stmt_bind_param($stmtTemp, "i", $user_id);
                        mysqli_stmt_execute($stmtTemp);
                        $resultTemp = mysqli_stmt_get_result($stmtTemp);
                        $rowTemp = mysqli_fetch_array($resultTemp);
                        $student_id = $rowTemp['student_id'];

                        $sqlTemp = "SELECT * FROM `enrollment` WHERE student_id = ? AND course_id = ?";
                        mysqli_stmt_prepare($stmtTemp, $sqlTemp);
                        mysqli_stmt_bind_param($stmtTemp, "ii", $student_id, $course_id);
                        mysqli_stmt_execute($stmtTemp);
                        $resultTemp = mysqli_stmt_get_result($stmtTemp);

                        if (mysqli_num_rows($resultTemp) === 1) {
                            $enrolled = 'enrolled';
                        } else {
                            $enrolled = 'not enrolled';
                        }

                        $sqlTemp = "SELECT * FROM `certificate` WHERE student_id = ? AND course_id = ?";
                        mysqli_stmt_prepare($stmtTemp, $sqlTemp);
                        mysqli_stmt_bind_param($stmtTemp, "ii", $student_id, $course_id);
                        mysqli_stmt_execute($stmtTemp);
                        $resultTemp = mysqli_stmt_get_result($stmtTemp);
                        $rowTemp = mysqli_fetch_array($resultTemp);

                        if (mysqli_num_rows($resultTemp) === 1 && $rowTemp['completion'] === 'complete') {
                            $completion = $rowTemp['completion'];
                        } else {
                            $completion = 'N/A';
                        }

                        mysqli_stmt_close($stmtTemp);
                    }

                    // display record to table
                    echo "<tr> 
                            <th scope='row'>$course_id</th>
                            <td>$course_name</td>
                            <td><a href='coursedetail.php?course_id=$course_id'>more details</a></td>
                            ";
                    if ($user_type === 'student') {
                        echo "
                            <td>";
                        if ($completion === 'complete') { // display redirect to certificate page if complete
                            echo "<a href='courseview_certificate.php?course_id=$course_id&student_id=$student_id&course_name=$course_name&instructor_id=$instructor_id'>
                                certificate</a>";
                        } else {
                            echo "<a href='#'>certificate</a>";
                        }
                        echo "
                            </td>
                            <td>$completion</td>
                            <td>$enrolled</td>
                                      </tr>";
                    } else {
                        echo "</tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>