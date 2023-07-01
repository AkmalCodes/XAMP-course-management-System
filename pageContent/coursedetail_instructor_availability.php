<?php
$stmt = mysqli_stmt_init($con);
$sql = "SELECT * FROM course_schedule WHERE instructor_id = ? AND course_id = ? 
        ORDER BY FIELD(day_of_week, 'monday', 'tuesday', 'wednesday', 'thursday' ,'friday', 'saturday','sunday')";
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "ii", $instructor_id, $course_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
// $days_of_week = ["monday","tuesday","wednesday","thursday","friday","saturday","sunday"];
while ($row = mysqli_fetch_array($result)) {
    $day = $row['day_of_week'];
    $start_time = $row['start_time'];
    $end_time = $row['end_time'];
    echo "
         <tr>
         <td>$day</td>
         <td>$start_time - $end_time</td>
         <td><a href='#'>link<a></td>
         </tr>
         ";
}
?>