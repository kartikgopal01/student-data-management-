<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
    <div class="container">
    <h1>TEACHER LOGIN</h1>
        <form action="" method="post">
            <input type="text" name="name" placeholder="NAME" required>
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


function authenticateTeacher($conn, $name, $password) {
    $sql = "SELECT * FROM teachers WHERE name='$name' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        
        session_start();
        $_SESSION['name']=$name;
        header("Location: tHome.php");
        exit();
    } else {
               echo "<p style='color:white'>Incorrect Name or Password<p>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['name']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        authenticateTeacher($conn, $name, $password);
    }
}

$conn->close();

?>
    </div>
</body>
</html>
