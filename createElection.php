<?php
// Include the database connection file
require_once "conn.php";

// Check if form is submitted
if(isset($_POST['submit'])){
    // Get table name from form input
    $table_name = $_POST['table_name'];

    // SQL query to create table
    $sql = "CREATE TABLE $table_name (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        candidate_name VARCHAR(255) NOT NULL,
        votes INT(10) UNSIGNED
    )";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Table $table_name created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Create Table</title>
</head>
<body>
    <form method="post" action="createElection.php">
        Table Name: <input type="text" name="table_name"><br><br>
        <input type="submit" name="submit" value="Create Table">
    </form>
</body>
</html>
