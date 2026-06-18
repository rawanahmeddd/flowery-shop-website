<?php include('server1.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Flowery Life</title>
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

<h1>Login</h1>

<?php if (count($error) > 0): ?>
    <div style="color: red; padding: 10px; margin: 10px; background: #ffe6e6; border-radius: 5px;">
        <?php foreach ($error as $err): ?>
            <p><?php echo $err; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post" action="login.php">

    <div>
        <label>Username</label>
        <input type="text" name="un" required>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="psw1" required>
    </div>

    <div>
        <button type="submit" name="login">Sign in</button>
    </div>

    <p>
        Not yet a member?
        <a href="register.php">Sign up</a>
    </p>

</form>

</body>
</html>