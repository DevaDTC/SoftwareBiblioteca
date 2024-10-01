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


$sql = "SELECT * FROM BOOK";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='styled-table'>";
    echo "<thead><tr><th>Matrícula</th><th>Título</th><th>Autor</th><th>Condición</th></tr></thead>";
    echo "<tbody>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["registrationBook"]. "</td>";
        echo "<td>" . $row["nameBook"]. "</td>";
        echo "<td>" . $row["author"]. "</td>";
        echo "<td>" . $row["bookcondition"]. "</td>";
        // You can add more columns or actions here if needed (e.g., edit/delete buttons)
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No se encontraron libros.";
}

$conn->close();
?>