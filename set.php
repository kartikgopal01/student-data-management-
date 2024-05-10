
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student Table</title>
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
    <div class="set">
        <h2>Create Student Table</h2>
        <form action="" method="post">
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" required><br><br>
            <label for="usn">USN:</label>
            <input type="text" id="usn" name="usn" required><br><br>
            <label for="sem_1_marks">Semester 1 Marks:</label>
            <input type="number" id="sem_1_marks" name="sem_1_marks" required><br><br>
            <label for="sem_2_marks">Semester 2 Marks:</label>
            <input type="number" id="sem_2_marks" name="sem_2_marks" required><br><br>
            <label for="sem_3_marks">Semester 3 Marks:</label>
            <input type="number" id="sem_3_marks" name="sem_3_marks" required><br><br>
            <label for="sem_4_marks">Semester 4 Marks:</label>
            <input type="number" id="sem_4_marks" name="sem_4_marks" ><br><br>
            <label for="sem_5_marks">Semester 5 Marks:</label>
            <input type="number" id="sem_5_marks" name="sem_5_marks" ><br><br>
            <label for="sem_6_marks">Semester 6 Marks:</label>
            <input type="number" id="sem_6_marks" name="sem_6_marks" ><br><br>
            <label for="sem_7_marks">Semester 7 Marks:</label>
            <input type="number" id="sem_7_marks" name="sem_7_marks" ><br><br>
            <label for="sem_8_marks">Semester 8 Marks:</label>
            <input type="number" id="sem_8_marks" name="sem_8_marks" ><br><br>
            <input type="submit" value="Create Table and Insert Data" name="submit">
        </form>
    </div>
</body>
</html>
<?php
$servername = "localhost:3305";
$username = "root";
$password = "Kartik@123";
$dbname = "csd";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function createStudentTable($conn, $tableName, $usn, $name, $marks1, $marks2, $marks3, $marks4, $marks5, $marks6, $marks7, $marks8) {
    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
        usn VARCHAR(20) PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        sem_1_marks INT,
        sem_2_marks INT,
        sem_3_marks INT,
        sem_4_marks INT,
        sem_5_marks INT,
        sem_6_marks INT,
        sem_7_marks INT,
        sem_8_marks INT
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table $tableName created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    $sql = "INSERT INTO $tableName (usn, name, sem_1_marks, sem_2_marks, sem_3_marks, sem_4_marks, sem_5_marks, sem_6_marks, sem_7_marks, sem_8_marks)
            VALUES ('$usn', '$name', '$marks1', '$marks2', '$marks3', ";
    
    $sql .= $marks4 === '' ? "NULL" : "'$marks4'";
    $sql .= ", " . ($marks5 === '' ? "NULL" : "'$marks5'");
    $sql .= ", " . ($marks6 === '' ? "NULL" : "'$marks6'");
    $sql .= ", " . ($marks7 === '' ? "NULL" : "'$marks7'");
    $sql .= ", " . ($marks8 === '' ? "NULL" : "'$marks8'");
    $sql .= ")";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully<br>";
    } else {
        echo "Error inserting data: " . $conn->error . "<br>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name= $_POST["student_name"];
    $usn = $_POST["usn"];
    $sem_1_marks = $_POST["sem_1_marks"];
    $sem_2_marks = $_POST["sem_2_marks"];
    $sem_3_marks = $_POST["sem_3_marks"];
    $sem_4_marks = $_POST["sem_4_marks"];
    $sem_5_marks = $_POST["sem_5_marks"];
    $sem_6_marks = $_POST["sem_6_marks"];
    $sem_7_marks = $_POST["sem_7_marks"];
    $sem_8_marks = $_POST["sem_8_marks"];
        $tableName = "students";
        createStudentTable($conn, $tableName, $usn, $student_name, $sem_1_marks,$sem_2_marks,$sem_3_marks,$sem_4_marks,$sem_5_marks,$sem_6_marks,$sem_7_marks,$sem_8_marks);
}
$conn->close();

?>
