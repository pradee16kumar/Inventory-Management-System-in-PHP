<?php
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (product_name, quantity, price) VALUES ('$name', '$quantity', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form method="POST" action="">
        <label for="name">Product Name:</label>
        <input type="text" name="product_name" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>