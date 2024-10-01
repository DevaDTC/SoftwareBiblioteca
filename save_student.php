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
$nameStudent = $_POST['nameStudent'];
$registrationStudent = $_POST['registrationStudent'];
$speciality = $_POST['speciality'];
$emailStudent = $_POST['emailStudent'];
$school_ID = 1; // Assuming school_ID is 1 for now

// Prepare and execute SQL query to insert data
$sql = "INSERT INTO STUDENT (registrationStudent, nameStudent, statusStudent, emailStudent, school_ID) 
        VALUES ('$registrationStudent', '$nameStudent', 'Activo', '$emailStudent', '$school_ID')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>