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

// SQL query to fetch loan data with student information only
$sql = "SELECT l.loan_ID, s.registrationStudent, 
               l.loanDate, l.loanHour, l.expirationDate, l.booksQuantity, l.renovationNumber
        FROM LOAN l
        JOIN STUDENT s ON l.user_ID = s.student_ID"; 

$result = $conn->query($sql);

if ($result) { 
    if ($result->num_rows > 0) {
        // Output data in a styled table
        echo "<table class='styled-table'>";
        echo "<thead><tr><th>ID</th><th>Matrícula del Estudiante</th><th>Fecha del Préstamo</th><th>Hora del Préstamo</th><th>Fecha de Devolución</th><th>Cantidad de Libros</th><th>Renovaciones</th></tr></thead>";
        echo "<tbody>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["loan_ID"]. "</td>";
            echo "<td>" . $row["registrationStudent"]. "</td>";
            echo "<td>" . $row["loanDate"]. "</td>";
            echo "<td>" . $row["loanHour"]. "</td>";
            echo "<td>" . $row["expirationDate"]. "</td>";
            echo "<td>" . $row["booksQuantity"]. "</td>";
            echo "<td>" . $row["renovationNumber"]. "</td>";
            // You can add more columns or actions here if needed (e.g., edit/delete buttons)
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No se encontraron préstamos.";
    }
} else {
    // Handle query error
    echo "Error in fetching loan data: " . $conn->error;
}

$conn->close();
?>