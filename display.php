<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Student Data</title>
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
    <h2>Fetch Student Data</h2>
    <form action="" method="post">
        <label for="usn">Enter USN:</label>
        <input type="text" id="usn" name="usn" required>
        <input type="submit" value="Fetch Data" name="submit">
    </form>

<?php
$servername = "localhost:3305";
$username = "root";
$password = "Kartik@123";
$dbname = "csd";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function fetchStudentData($conn, $usn) {
    $stmt = $conn->prepare("SELECT * FROM students WHERE usn = ?");
    $stmt->bind_param("s", $usn);
    $stmt->execute();
    $result = $stmt->get_result();
    echo"<div class='white'>";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
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
    echo"</div>";
    $stmt->close();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['usn'])) {
        $usn = $_POST['usn'];
        fetchStudentData($conn, $usn);
    }
}
$conn->close();

?>
</body>
</html>
