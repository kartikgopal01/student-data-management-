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
    </header>
    <hr>
    <nav>
        <a href="home.php">HOME</a>
        <a href="student.php">STUDENT</a>
        <a href="teacher.php">TEACHER</a>
    </nav>
    <main>
        <div class="heading">
        <h1 class="white" id="main-heading">FACULTY DETAILS</h1>
        </div>
            <div class="row">
                <div class="hod">
                    <div class="portfolio-item">
                        <a href="https://pestrust.edu.in/pesitm/facultyDetails/168">
                            <span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="https://pestrust.edu.in/pesitm/documents/files/faculty/thumbnail/thumbnail_1699351036_b4e4c02a133944984e26.jpg"
                                        class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-action">
                                        <span class="thumb-info-action-icon bg-dark opacity-8"><i
                                                class="fas fa-plus"></i></span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <span class="po">
                            <p class="text-center textt-3">Dr. Pramod</p>
                            <p class="text-center">Associate Professor and Head of Department </p>
                        </span>
                    </div>
                </div>
                <div class="fac1">
                    <div class="portfolio-item">
                        <a href="https://pestrust.edu.in/pesitm/facultyDetails/169">
                            <span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="https://pestrust.edu.in/pesitm/documents/files/faculty/thumbnail/thumbnail_1699351181_b415e8fcf1793ef4eee8.jpg"
                                        class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-action">
                                        <span class="thumb-info-action-icon bg-dark opacity-8"><i
                                                class="fas fa-plus"></i></span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <span class="thumb-info-title">
                            <p class="text-center textt-3">Mrs. Ayisha Khanum</p>
                            <p class="text-center">Assistant Professor</p>
                        </span>
                    </div>
                </div>
                <div class="fac2">
                    <div class="portfolio-item">
                        <a href="https://pestrust.edu.in/pesitm/facultyDetails/170">
                            <span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="https://pestrust.edu.in/pesitm/documents/files/faculty/thumbnail/thumbnail_1699351308_91e29f908cdbe7ed790c.jpg"
                                        class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-action">
                                        <span class="thumb-info-action-icon bg-dark opacity-8"><i
                                                class="fas fa-plus"></i></span>
                                    </span>
                                </span>
                            </span>
                        </a>
                        <span class="thumb-info-title">
                            <p class="text-center textt-3">Ms. Preethi .S. Gowda</p>
                            <p class="text-center">Assistant Professor</p>
                        </span>
                    </div>
                </div>
            </div>
        </h1>
        <br>
        <br>

    </main>
</body>
<?php
$servername = "localhost:3305";
$username = "root";
$password = "Kartik@123";
$dbname = "csd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name,sem_3_marks FROM students ORDER BY  sem_3_marks DESC LIMIT 5"; 

$result = $conn->query($sql);
echo"<div class='heading'>";
echo"<h1 class='white' id='main-heading'>CLASS TOPPERS</h1>";
echo"</div>";

echo "<div class='container'>";

if ($result->num_rows > 0) {
    echo"<br>";
    echo "<ol>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<li> " . $row["name"] . " <hr>Total Marks: " . $row["sem_3_marks"] . "</li>";
    }
    echo "</ol>";
} else {
    echo "No toppers found";
}
echo "</div>";

$conn->close();

?>

</html>