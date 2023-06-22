<?php
include 'config/connect.php';

$sql = 'SELECT * FROM `course`';
$result = mysqli_query($con, $sql);

?>

<div table container>
    <h1>Im the TITLE!!</h1>
    <table class="courseviewtable">
        <thead>
            <tr>
                <th scope="col">Course id</th>
                <th scope="col">Course name</th>
                <th scope="col">Course links</th>
                <th scope="col">Certificates</th>
                <th scope="col">Enrolled</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                    $user_id = $_SESSION['user_id'];
                    
                    $sqltemp = "SELECT * FROM `student` WHERE `user_id` = '$user_id'";
                    $resulttemp = mysqli_query($con,$sqltemp);
                    $rowtemp = mysqli_fetch_array($resulttemp);
                    $student_id = $rowtemp['student_id'];

                    $sqltemp = "SELECT * FROM `enrollment` WHERE student_id = '$student_id'";
                    $resulttemp = mysqli_query($con,$sqltemp);
                    if(mysqli_num_rows($resulttemp) === 1){
                        $enrolled = 'enrolled';
                    }else{
                        $enrolled = 'not enrolled';
                    }

                    echo "<tr>
                            <th scope='row'>$course_id</th>
                            <td>$course_name</td>
                            <td><a href='coursedetail.php?course_id=$course_id'>more details</a></td>
                            <td><a href='#'>certificate</a></td>
                            <td> $enrolled </td>
                        </tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <style>

    </style>