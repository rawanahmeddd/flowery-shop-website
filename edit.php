<?php
include "server1.php"; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $qry1 = mysqli_query($db, "SELECT * FROM product WHERE id='$id'");
    $data = mysqli_fetch_array($qry1);
} else {
    echo "No ID found";
    exit();
}

if (isset($_POST['update'])) {

    $productname = $_POST['productname'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    $sql = "UPDATE product 
            SET productname='$productname', color='$color', price='$price' 
            WHERE id='$id'";

    $edit = mysqli_query($db, $sql);

    if ($edit) {
        mysqli_close($db);
        header("Location: products.php");
        exit();
    } else {
        echo mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<h3>Update Data</h3>

<form method="POST">
    <input type="text" name="productname" 
           value="<?php echo $data['productname']; ?>" 
           placeholder="Enter Product Name" required><br><br>

    <input type="text" name="color" 
           value="<?php echo $data['color']; ?>" 
           placeholder="Enter Color" required><br><br>

    <input type="text" name="price" 
           value="<?php echo $data['price']; ?>" 
           placeholder="Enter Price" required><br><br>

    <input type="submit" name="update" value="Update">
</form>

</body>
</html>