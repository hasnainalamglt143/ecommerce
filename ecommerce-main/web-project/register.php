<?php
include 'db_connect.php';

// Get input data directly
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$check_sql = "SELECT * FROM users WHERE email = '$email'";
    $check_result = $conn->query($check_sql);

    if (!$check_result->num_rows > 0) {
       
        // Product does not exist, insert new record
        $insert_sql = "INSERT INTO users (username,email,password) VALUES ('$username', '$email', '$password')";
        $conn->query($insert_sql);
        echo '<div style="display: none;padding: 10px;margin-bottom: 10px;border-radius: 5px;font-weight: bold background-color: #d4edda;border: 1px solid #c3e6cb;color: #155724;">User registered successfully!</div>';


    }
    else{
        echo'<div  style="padding: 10px;margin-bottom: 10px;border-radius: 5px;font-weight: bold;
            background-color: #f8d7da;border: 1px solid #f5c6cb;color: #721c24;
">Failed to register user. Please try again.</div>';
    }





$conn->close();

?>
