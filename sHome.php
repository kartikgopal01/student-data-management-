<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="student.css">
</head>

<body>
    <header>
        <p class="text-with-bg">PESITM CSD</p>
        <hr>
    </header>

    <nav>
        <a href="sHome.php">HOME</a>
        <a href="reset.php">RESET</a>
        <a href="home.php">LOGOUT</a>
    </nav>
<div>

<?php
session_start();
if (!isset($_SESSION['usn'])) {
    header("Location:student.php");
    exit();
}

$usn = $_SESSION['usn'];
$servername = "localhost:3305";
$username = "root";
$password = "Kartik@123";
$dbname = "csd";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM students WHERE usn='$usn'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<div class='box'";
    echo "<h2>Welcome, " . $row["name"] . "</h2>";
    echo "<p><strong>USN:</strong> " . $row["usn"] . "</p>";
    echo "Semester 1 Marks: " . $row["sem_1_marks"] . "/800" . "<br>";
    echo "Semester 2 Marks: " . $row["sem_2_marks"] . '/800' . "<br>";
    echo "Semester 3 Marks: " . $row["sem_3_marks"] . '/900' . "<br>";
    echo "Semester 4 Marks: " . $row["sem_4_marks"] . "<br>";
    echo "Semester 5 Marks: " . $row["sem_5_marks"] . "<br>";
    echo "Semester 6 Marks: " . $row["sem_6_marks"] . "<br>";
    echo "Semester 7 Marks: " . $row["sem_7_marks"] . "<br>";
    echo "Semester 8 Marks: " . $row["sem_8_marks"] . "<br>";
} else {
    echo "Student details not found";
}
echo "</div>";
$conn->close();
?>

</body>

</html>