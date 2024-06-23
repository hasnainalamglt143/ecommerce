<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        .cart {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .cart-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .product {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        .product img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .product-details {
            flex-grow: 1;
            margin-left: 20px;
        }
        .product-details h3 {
            margin: 0;
            font-size: 18px;
        }
        .product-details p {
            margin: 5px 0;
            color: #555;
        }
        .product-details span {
            display: inline-block;
            margin-right: 10px;
        }
        .product-controls {
            display: flex;
            align-items: center;
        }
        .delete-btn {
            background: none;
            border: none;
            color: #d9534f;
            font-size: 18px;
            cursor: pointer;
        }
        .total-price {
            text-align: right;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }
        .checkout-btn{
    display: block;
    width: 90%;
    text-align: center;
    margin:5px auto;
    padding: 10px 20px;
    background-color: #333333e2;
    color: white;
    border: 1px solid rgba(128, 128, 128, 0.103);
    border-radius: 8px;
    text-decoration: none;
    cursor: pointer;
}
        .checkout-btn:hover {
            background-color: #333333;
        }
    </style>
    <script src="./remove-from-cart.js" defer></script>
</head>
<body>

    <div class="cart">
        <div class="cart-header">
            <h2>Your Shopping Cart</h2>
        </div>
    
        <?php
include 'db_connect.php';

$total = 0;

$sql = "SELECT products_id, price, image_url, quantity, (price * quantity) AS total_price FROM cart";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['quantity'] > 0) {
            $total += $row['total_price'];
            echo "<div class='product' id='". $row['products_id'] . "'>";
            echo "<img src='" . $row['image_url'] . "' alt='Product'>";
            echo "<div class='product-details'>";
            // echo "<h3>" . $row['name'] . "</h3>";
            echo "<p>$" . $row['price'] . "</p>";
            echo "<span>Quantity: " . $row['quantity'] . "</span>";
            echo "</div>";
            echo "<div class='product-controls'>";
            echo "<button class='delete-btn' data-id='" . $row['products_id'] . "'><i class='fas fa-trash-alt'></i></button>";
            echo "</div>";
            echo "</div>";
        }
    }
}

else {
    echo "<p>Your cart is empty.</p>";
}

$conn->close();
?>

<div class="total-price">
    Total: $<?php echo number_format($total, 2); ?>
</div>

<a href="#" class="checkout-btn">Proceed to Checkout</a>
</div> 
    

</body>
</html>
