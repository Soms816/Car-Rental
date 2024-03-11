<?php
// Establish database connection
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Thank you for contacting us!";
} else {
    $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: contact.php");
exit();
?>