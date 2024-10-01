<?php
// Database connection details 
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
$registrationStudent = $_POST['registrationStudent'];
$booksQuantity = $_POST['booksQuantity'];
$loanDate = $_POST['loanDate'];
$loanHour = $_POST['loanHour'];
$expirationDate = $_POST['expirationDate'];
$renovationNumber = $_POST['renovationNumber'];

// Handle loanSignature upload (You'll need to implement the actual file upload logic here)
// For now, let's assume you store the file path or binary data in $loanSignature

// Get the 'student_ID' based on the 'registrationStudent'
$stmt = $conn->prepare("SELECT student_ID FROM STUDENT WHERE registrationStudent = ?");
$stmt->bind_param("i", $registrationStudent); 
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$student_ID = $row['student_ID']; 
$stmt->close();

if (!$student_ID) {
    echo json_encode(array('success' => false, 'message' => 'Student not found.'));
    $conn->close();
    exit; 
}

// Prepare and execute SQL query to insert data into the LOAN table
$stmt = $conn->prepare("INSERT INTO LOAN (loanDate, loanHour, expirationDate, booksQuantity, loanSignature, renovationNumber, user_ID) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiisi", $loanDate, $loanHour, $expirationDate, $booksQuantity, $loanSignature, $renovationNumber, $student_ID);

if ($stmt->execute()) {
    echo json_encode(array('success' => true, 'message' => 'New loan registered successfully'));
} else {
    echo json_encode(array('success' => false, 'message' => 'Error registering loan: ' . $stmt->error));
}

$stmt->close();
$conn->close();
?>