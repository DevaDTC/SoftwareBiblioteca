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

$sql = "SELECT * FROM STUDENT";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='styled-table'>";
    echo "<thead><tr><th>Matrícula</th><th>Nombre</th><th>Correo</th></tr></thead>";
    echo "<tbody>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<table class='styled-table'>";
        echo "<td>" . $row["registrationStudent"]. "</td>";
        echo "<td>" . $row["nameStudent"]. "</td>";
        echo "<td>" . $row["emailStudent"]. "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>