<?php

include 'db.php';


$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET product_name = '$name', quantity = '$quantity', price = '$price' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
       
        header('Location: view_products.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>
<body>
    <h1>Updated Product</h1>
    <form method="POST" action="">
        <label for="name">Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required><br>

        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo $product['price']; ?>" required><br>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>
