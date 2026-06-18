<?php
include "server1.php"; 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $query = "DELETE FROM product WHERE id = '$id'";

    $del = mysqli_query($db, $query);

    if ($del) {
        mysqli_close($db);
        header("Location: products.php");
        exit();
    } else {
        echo "Error deleting record";
    }

} else {
    echo "No ID provided";
}
?>