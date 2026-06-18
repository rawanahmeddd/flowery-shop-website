<?php include('server1.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products - Flowery Life</title>
    <link rel="stylesheet" href="productstyle.css">
    <style>
        .products-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: flex-start;
            margin-top: 20px;
        }
        .product-card {
            width: 23%;
            border: 1px solid #eee;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 3px;
        }
        .product-card h4 {
            margin: 8px 0;
            color: #333;
            font-size: 16px;
        }
        .product-card p {
            margin: 5px 0;
            font-size: 14px;
        }
        .product-card .price {
            color: #2E8B57;
            font-size: 18px;
            font-weight: bold;
        }
        .edit-btn {
            background-color: #3498DB;
            color: white;
            padding: 4px 8px;
            text-decoration: none;
            border-radius: 3px;
            display: inline-block;
            margin: 3px;
            font-size: 12px;
        }
        .delete-btn {
            background-color: #E74C3C;
            color: white;
            padding: 4px 8px;
            text-decoration: none;
            border-radius: 3px;
            display: inline-block;
            margin: 3px;
            font-size: 12px;
        }
        .banner {
            width: 100%;
            text-align: center;
            margin: 20px 0;
        }
        .banner img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header>
        <div class="banner">
            <img src="banner.jpeg" alt="Flower Banner">
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="homepage.html">Home</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <li><a href="products.php">Products</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="server1.php?logout=1">Logout (<?php echo $_SESSION['username']; ?>)</a></li>
            <?php else: ?>
                <li><a href="register.php">Sign Up</a></li>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
            <li><a href="contactus.html">Contact Us</a></li>
        </ul>
    </nav>

    <div style="clear: both;"></div>

    <div class="products-container">
        <?php
        $result = mysqli_query($db, "SELECT * FROM product");
        
        if (mysqli_num_rows($result) == 0) {
            echo "<p style='text-align:center;'>No products found. Please add products.</p>";
        }
        
        while ($product = mysqli_fetch_array($result)) {
        ?>
            <div class="product-card">
                <img src="<?php echo $product['image']; ?>" width="120px" alt="<?php echo $product['productname']; ?>">
                <h4><?php echo $product['productname']; ?></h4>
                <p>Color: <?php echo $product['color']; ?></p>
                <p class="price"><?php echo $product['price']; ?> EGP</p>
                <a href="edit.php?id=<?php echo $product['id']; ?>" class="edit-btn">Edit</a>
                <a href="delete.php?id=<?php echo $product['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure?');">Delete</a>
            </div>
        <?php
        }
        ?>
    </div>
</body>
</html>