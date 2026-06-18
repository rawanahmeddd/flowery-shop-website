<?php include('server1.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Flowery Life</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
    <a href="homepage.html">Home</a>
    <a href="aboutus.html">About Us</a>
    <a href="products.php">Products</a>
    <?php if (isset($_SESSION['username'])): ?>
        <a href="server1.php?logout=1">Logout (<?php echo $_SESSION['username']; ?>)</a>
    <?php else: ?>
        <a href="register.php">Sign Up</a>
        <a href="login.php">Login</a>
    <?php endif; ?>
    <a href="contactus.html">Contact Us</a>
</nav>

<h1>Sign Up</h1>

<?php if (count($error) > 0): ?>
    <div style="color: red; padding: 10px; margin: 10px; background: #ffe6e6; border-radius: 5px;">
        <?php foreach ($error as $err): ?>
            <p><?php echo $err; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="register.php" method="post">
    
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="un" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="em" required>
    </div>

    <div>
        <label for="pass">Password</label>
        <input type="password" id="pass" name="psw1" required>
    </div>

    <div>
        <label for="pass_confirmation">Repeat Password</label>
        <input type="password" id="pass_confirmation" name="psw2" required>
    </div>

    <input type="submit" name="register" value="Sign Up">

</form>

</body>
</html>