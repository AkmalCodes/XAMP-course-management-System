<?php
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

$sql1 = "SELECT instructor_id FROM instructor WHERE user_id = '$user_id'";
$instructor_id_sql = mysqli_query($con, $sql1);
while ($row = mysqli_fetch_array($instructor_id_sql)) {
    $instructor_id = $row['instructor_id'];
}

// $sql = "SELECT * FROM course WHERE instructor_id = $instructor_id";
// $result = mysqli_query($con, $sql);

$sql = "SELECT * FROM course_schedule WHERE instructor_id = $instructor_id";
$result = mysqli_query($con, $sql);

$sql2 = "SELECT course_id FROM course WHERE instructor_id = $instructor_id";
$result2 = mysqli_query($con, $sql2);

$options = array();
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $options[] = $row['course_id'];
    }
}

?>

<div table container>
    <h1>Assigned Courselist Schedule: </h1>
    <form method="post" action="utils/updateava.php">

        <?php
        echo "<input type='hidden' name='instructor_id' value='$instructor_id'>"
            ?>

        <table class="courseviewtable">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">List</th>
                    <th scope="col">Course id</th>
                    <th scope="col">Course instructor</th>
                    <th scope="col">Start time</th>
                    <th scope="col">End time</th>
                    <th scope="col">Days</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $counter = 1;

                if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                        $course_id = $row['course_id'];
                        $start_time = $row['start_time'];
                        $end_time = $row['end_time'];
                        $day_of_week = $row['day_of_week'];
                        $start_date = $row['start_date'];
                        $end_date = $row['end_date'];

                        echo "<tr>
                            <td><input type='radio' name='counter' value='$counter'></input></td>
                            <td>$counter</td>
                            <th scope='row'>$course_id</th>
                            <td>$instructor_id</td>
                            <td>$start_time</td>
                            <td>$end_time</td>
                            <td>$day_of_week</a></td>
                            <td>$start_date</td>
                            <td>$end_date</td>
                            </tr>";
                        $counter += 1;
                    }
                }
                ?>
            </tbody>
        </table>
        <br>
        <button type="submit" id="delete" name="delete" value="delete">Delete selected schedule</button>
    </form>

    <br>
    <br>

    <form method="post" action="utils/updateava.php">

        <?php
        echo "<input type='hidden' name='instructor_id' value='$instructor_id'>"
            ?>

        <table class="courseviewtable">
            <thead>
                <tr>
                    <th scope="col">Course id</th>
                    <!-- <th scope="col">Course instructor</th> -->
                    <th scope="col">Start time</th>
                    <th scope="col">End time</th>
                    <th scope="col">Days</th>
                    <th scope="col">Start date</th>
                    <th scope="col">End date</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>
                        <select id="course_id" name="course_id">

                            <?php

                            // Output the retrieved data as options in the select dropdown
                            foreach ($options as $option) {
                                echo "<option value='$option'>$option</option>";
                            }

                            ?>
                        </select>
                    </td>

                    <!-- <td><input name='start_time' style='text-align: center' type='text' pattern='[0-9]{2}:[0-9]{2}:[0-9]{2}'
                            title='Please enter a four-digit number in the format of 00:00' placeholder='Format = 00:00:00'
                            required></td>
                    <td><input name='end_time' style='text-align: center' type='text' pattern='[0-9]{2}:[0-9]{2}:[0-9]{2}'
                            title='Please enter a four-digit number in the format of 00:00' placeholder='Format = 00:00:00'
                            required></td> -->

                    <td><input name='start_time' style='text-align: center' type='time' required></td>
                    <td><input name='end_time' style='text-align: center' type='time' required></td>

                    <td>
                        <select id="day_of_week" name="day_of_week">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                    </td>

                    <td><input name='start_date' style='text-align: center' type='date' required></td>
                    <td><input name='end_date' style='text-align: center' type='date' required></td>

                </tr>

            </tbody>
        </table>
        <br>
        <button type="submit" id="add" name="add" value="add">Add a new schedule</button>
    </form>


    <style>

    </style>