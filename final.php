<?php
session_start();

// Include database connection
include 'conn.php';

// Retrieve form data
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];

// Query database for user with the provided email
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // Verify password
    if (password_verify($password, $user['password'])) {
        // Password is correct, set session variables and redirect to dashboard
        // $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['user'] = $_POST['user'];
        header("Location: ./dashboard.php");
        exit();
    } else {
        // Password is incorrect
        echo "Invalid email or password. Please try again.";
    }
} else {
    // User with provided email not found
    echo "User not found. Please register.";
}
?>
