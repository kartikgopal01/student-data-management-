<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h1>STUDENT LOGIN</h1>
        <form action="" method="post">
            <input type="text" name="usn" required placeholder="USN">
            <input type="password" name="password" placeholder="PASSWORD" required>
            <button type="submit">LOGIN</button>
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


function authenticateStudent($conn, $usn, $password) {
    $sql = "SELECT * FROM students WHERE usn='$usn' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        session_start();
        $_SESSION['usn'] = $usn;
        header("Location: sHome.php"); 
        exit();
    } else {
       
        echo "<p style='color:white'>Incorrect USN or Password</p>";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['usn']) && isset($_POST['password'])) {
        $usn = $_POST['usn'];
        $password = $_POST['password'];
        authenticateStudent($conn, $usn, $password);
    }
}


$conn->close();
?>
</div>
</body>
</html>