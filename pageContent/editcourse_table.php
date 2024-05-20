<?php
// Handle delete operation
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];

    // Perform the database deletion
    $delete_stmt = mysqli_prepare($con, 'DELETE FROM `course` WHERE `course_id` = ?');
    mysqli_stmt_bind_param($delete_stmt, 'i', $delete_id);
    mysqli_stmt_execute($delete_stmt);
    
    // Redirect back to the same page to reflect the changes
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Handle edit operation
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["edit_id"])) {
    $edit_id = $_GET["edit_id"];
    
    // Retrieve the course data to pre-fill the form for editing
    $edit_stmt = mysqli_prepare($con, 'SELECT * FROM `course` WHERE `course_id` = ?');
    mysqli_stmt_bind_param($edit_stmt, 'i', $edit_id);
    mysqli_stmt_execute($edit_stmt);
    $edit_result = mysqli_stmt_get_result($edit_stmt);
    $edit_data = mysqli_fetch_assoc($edit_result);
}

// Handle insert/update operation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $course_credit = $_POST['course_credit'];
    $course_length = $_POST['course_length'];
    $instructor_id = $_POST['instructor_id'];

    // Determine if it's an insert or update operation based on the presence of an edit_id
    if (isset($_POST["edit_id"])) {
        $edit_id = $_POST["edit_id"];

        // Perform the database update
        $update_stmt = mysqli_prepare($con, 'UPDATE `course` SET `course_name` = ?, `course_description` = ?, `course_credit` = ?, `course_length` = ?, `instructor_id` = ? WHERE `course_id` = ?');
        mysqli_stmt_bind_param($update_stmt, 'sssisi', $course_name, $course_description, $course_credit, $course_length, $instructor_id, $edit_id);
        mysqli_stmt_execute($update_stmt);
    } else {
        // Perform the database insertion
        $insert_stmt = mysqli_prepare($con, 'INSERT INTO `course` (`course_name`, `course_description`, `course_credit`, `course_length`, `instructor_id`) VALUES (?, ?, ?, ?, ?)');
        mysqli_stmt_bind_param($insert_stmt, 'sssii', $course_name, $course_description, $course_credit, $course_length, $instructor_id);
        mysqli_stmt_execute($insert_stmt);
    }

    // Redirect back to the same page to reflect the changes
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Fetch the course list
$stmt = mysqli_stmt_init($con);
$sql = 'SELECT * FROM `course`';
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
?>

<div table container>
    <h1>Courselist: </h1>
    <table class="courseviewtable">
        <thead>
            <tr>
                <th scope="col">Course id</th>
                <th scope="col">Course name</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];

                    echo "<tr>
                            <th scope='row'>$course_id</th>
                            <td>$course_name</td>
                            <td><a href='?delete_id=$course_id'>Delete</a></td>
                            <td><a href='?edit_id=$course_id'>Edit</a></td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <div id="profile-container">
        <div class="grid-container">
            <div class="table container">

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <?php if (isset($edit_data)) { ?>
                    <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                    <?php } ?>
                    <label for="course_name">Course Name:</label>
                    <input type="text" id="course_name" name="course_name"
                        value="<?php echo isset($edit_data) ? $edit_data['course_name'] : ''; ?>" required><br><br>

                    <label for="course_description">Course Description:</label><br>
                    <textarea id="course_description" name="course_description" rows="4" cols="50"
                        required><?php echo isset($edit_data) ? $edit_data['course_description'] : ''; ?></textarea><br><br>

                    <label for="course_credit">Course Credit:</label>
                    <input type="number" id="course_credit" name="course_credit"
                        value="<?php echo isset($edit_data) ? $edit_data['course_credit'] : ''; ?>" required><br><br>

                    <label for="course_length">Course Length:</label>
                    <input type="text" id="course_length" name="course_length"
                        value="<?php echo isset($edit_data) ? $edit_data['course_length'] : ''; ?>" required><br><br>

                    <label for="instructor_id">Instructor ID:</label>
                    <input type="text" id="instructor_id" name="instructor_id"
                        value="<?php echo isset($edit_data) ? $edit_data['instructor_id'] : ''; ?>" required><br><br>

                    <input type="submit" value="<?php echo isset($edit_data) ? 'Update' : 'Submit'; ?>">
                </form>
            </div>
        </div>
    </div>