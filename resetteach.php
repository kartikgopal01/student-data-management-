<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <form action="" method="post">
        <br>
        <label for="pass">Enter New Password:</label>
        <input type="text" name="pass" placeholder="Change Password">
        <input type="submit" value="RESET" name="submit">
    </form>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:teacher.php");
    exit(); 
}

$name = $_SESSION['name'];
$servername = "localhost:3305";
$username = "root";
$password = "Kartik@123";
$dbname = "csd";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function reset_pass($conn,$pass,$name){
$stmt=$conn->prepare("UPDATE teachers SET password=? WHERE name=?");
$stmt->bind_param("ss",$pass,$name);
$stmt->execute();
echo"<div class='white'>";
if($stmt->affected_rows >0){
    echo"<p>password changed successfully</p>";
}
else{
    echo"<p>cannot change password</p>";
}
}
echo"</div>";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $pass=$_POST['pass'];
    reset_pass($conn,$pass,$name);

}
$conn->close();

?>