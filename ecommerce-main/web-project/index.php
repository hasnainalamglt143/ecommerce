<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Website</title>
    <script src="https://kit.fontawesome.com/81874f1d71.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="./index.js" defer></script>
</head>
<body>
    <nav>
        <img src="images/logo.jpg" alt="Logo" class="logo">
        <ul>
            <li><a href="./login.html">Sign In</a></li>
            <li><a href="./about-us.html">About Us</a></li>
            <li><a href="./contact-us.html">Contact Us</a></li>
            <li><a href="./cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul>
    </nav>
    <div class="container">
        <?php
        include 'db_connect.php';
        
        $categories = ["Home", "Gaming", "Phones", "Cameras", "Computers and laptops", "Telivision and videos"];
        
        foreach ($categories as $category) {
            $sql = "SELECT name, price, image_url,product_id FROM products WHERE catagory = '$category'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<div class='category'>";
                echo "<h2>$category</h2>";
                echo "<div class='products'>";
                
                while($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='".$row["image_url"]."' alt='".$row["name"]."'>";
                    echo "<h3>".$row["name"]."</h3>";
                    echo "<p class='price'>$".$row["price"]."</p>";
                    echo "<label for='quantity'>Quantity:</label>";
                    echo "<input type='number' id='quantity' name='quantity' min='1' max='10' value='1'>";
                    echo "<button data-id='".$row["product_id"]."'>Add to Cart</button>";
                    echo "</div>";
                }
                
                echo "</div>";
                echo "</div>";
            }
        }

        $conn->close();
        ?>
    </div>
    <footer>
        <p>&copy; 2024 Homeshopping. All rights reserved.</p>
    </footer>
</body>
</html>
