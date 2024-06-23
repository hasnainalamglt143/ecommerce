<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check and sanitize input data
    $product_id = $conn->real_escape_string($_POST['product_id']);
    $quantity = $conn->real_escape_string($_POST['quantity']);
    $image_url = $conn->real_escape_string($_POST['image_url']);
    $price = (float)$_POST['price'];

    // Check if the product already exists in the cart
    $check_sql = "SELECT quantity FROM cart WHERE products_id = '$product_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Product exists, update the quantity
        $row = $check_result->fetch_assoc();
        $new_quantity =  $quantity;
        $update_sql = "UPDATE cart SET quantity = '$new_quantity' WHERE products_id = '$product_id'";

        if ($conn->query($update_sql) === TRUE) {
            echo "Quantity updated successfully";
        } else {
            echo "Error: " . $update_sql . "<br>" . $conn->error;
        }
    } else {
        // Product does not exist, insert new record
        $insert_sql = "INSERT INTO cart (products_id, quantity, price, image_url) VALUES ('$product_id', '$quantity', '$price', '$image_url')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Insertion successful";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Invalid request method";
}

$conn->close();
?>
