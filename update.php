<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <p class="text-with-bg">PESITM CSD</p>
        <hr>
    </header>
    <nav>
    <a href="tHome.php">HOME</a>
        <a href="set.php">SET STUDENT DETAILS</a>
        <a href="display.php">FETCH STUDENT DETAILS</a>
        <a href="update.php">UPDATE STUDENT DETAILS</a>
        <a href="resetteach.php">RESET PASSWORD</a>
        <a href="home.php">LOGOUT</a>
    </nav>
    <h2>Update Student Data</h2>
    <form action="" method="post">
        <label for="usn">Enter USN:</label>
        <input type="text" id="usn" name="usn" required><br><br>
        <select name="column_name" id="column_name">
            <option value="name">Name</option>
            <option value="sem_1_marks">sem_1_marks</option>
            <option value="sem_2_marks">sem_2_marks</option>
            <option value="sem_3_marks">sem_3_marks</option>
            <option value="sem_4_marks">sem_4_marks</option>
            <option value="sem_5_marks">sem_5_marks</option>
            <option value="sem_6_marks">sem_6_marks</option>
            <option value="sem_7_marks">sem_7_marks</option>
            <option value="sem_8_marks">sem_8_marks</option>
        </select>
        <label for="new_value">New Value:</label>
        <input type="text" id="new_value" name="new_value" required><br><br>
        <input type="submit" value="Update Data" name="submit">
    </form>
</body>
</html>

<?php

// Database connection details
$servername = "localhost:3305";
$username = "root";
$password = "Kartik@123";
$dbname = "csd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function updateStudentData($conn, $usn, $columnName, $newValue) {
    $stmt = $conn->prepare("UPDATE students SET $columnName = ? WHERE usn = ?");
    $stmt->bind_param("ss", $newValue, $usn);
    $stmt->execute();
    echo"<div class='white'>";
    if ($stmt->affected_rows > 0) {
        echo "Data updated successfully<br>";
    } else {
        echo "Error updating data: " . $conn->error . "<br>";
    }
    echo "</div>";
    $stmt->close();
}
function fetchStudentData($conn, $usn) {
    $stmt = $conn->prepare("SELECT * FROM students WHERE usn = ?");
    $stmt->bind_param("s", $usn);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo"<div class='white'>";
        echo "USN: " . $row["usn"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Semester 1 Marks: " . $row["sem_1_marks"] ."/800". "<br>";
        echo "Semester 2 Marks: " . $row["sem_2_marks"] . '/800'."<br>";
        echo "Semester 3 Marks: " . $row["sem_3_marks"] . '/900'."<br>";
        echo "Semester 4 Marks: " . $row["sem_4_marks"] . "<br>";
        echo "Semester 5 Marks: " . $row["sem_5_marks"] . "<br>";
        echo "Semester 6 Marks: " . $row["sem_6_marks"] . "<br>";
        echo "Semester 7 Marks: " . $row["sem_7_marks"] . "<br>";
        echo "Semester 8 Marks: " . $row["sem_8_marks"] . "<br>";
    } else {
        echo "Student not found";
    }
    echo"'</div>'";
    $stmt->close();
}

// Process form submission for fetching or updating student data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['usn'])) {
        $usn = $_POST['usn'];
        // Fetch student data
        fetchStudentData($conn, $usn);

        // Check if update form is submitted
        if(isset($_POST['column_name']) && isset($_POST['new_value'])) {
            $columnName = $_POST['column_name'];
            $newValue = $_POST['new_value'];
            // Update student data
            updateStudentData($conn, $usn, $columnName, $newValue);
        }
    }
}

// Close connection
$conn->close();

?>
