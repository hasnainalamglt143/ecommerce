<?php

include 'db_connect.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $search_query="select * from users where username='$username' and password='$password'";
    $result=$conn->query($search_query);
    if ($result->num_rows > 0) {
     
    
        header('Location: index.php'); 
        
    }
    else{
        header('Location: login.html');
        echo "<div  style='padding: 10px;margin-bottom: 10px;border-radius: 5px;font-weight: bold;
        background-color: #f8d7da;border: 1px solid #f5c6cb;color: #721c24;'>Failed to login user. pl try again</div>";
    }
}
    ?>