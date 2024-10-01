<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$registrationBook = $_POST['registrationBook'];
$nameBook = $_POST['nameBook'];
$author = $_POST['author'];
$condition = $_POST['condition'];

// Prepare and execute SQL query to insert data into the BOOK table
$sql = "INSERT INTO BOOK (registrationBook, author, nameBook, bookcondition) 
        VALUES ('$registrationBook', '$author', '$nameBook', '$condition')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
/*if ($conn->query($sql) === TRUE) {
    echo json_encode(array('success' => true, 'message' => 'New book added successfully'));
} else {
    echo json_encode(array('success' => false, 'message' => 'Error adding book: ' . $conn->error));
}*/

$conn->close();
?>