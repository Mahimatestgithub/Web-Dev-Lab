<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "@Karan23";
$dbname = "phplogin";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
    // Retrieve form data
    $name = $_POST["name"];
    $rollNumber = $_POST["rollNumber"];
    $email = $_POST["email"];
    $course = $_POST["course"];

    // Use prepared statement to prevent SQL injection
    $sql ="INSERT INTO phplogin.login_table VALUES ('$name','$rollNumber','$email','$course')";


    if ($conn->query($sql) === true) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

// Close the database connection
$conn->close();
?>
