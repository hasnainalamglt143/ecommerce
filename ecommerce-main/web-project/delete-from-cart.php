<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check and sanitize input data
    $product_id = $conn->real_escape_string($_POST['product_id']);

    $price = (float)$_POST['price'];
    $check_sql="SELECT * from cart where products_id='$product_id'"

    $check_sql = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        
        $delete_sql = "DELETE FROM cart WHERE products_id = '$product_id'";

        if ($conn->query($delete_sql) === TRUE) {
            echo "deleted successfully";
        } else {
            echo "Error: " . $update_sql . "<br>" . $conn->error;
        }