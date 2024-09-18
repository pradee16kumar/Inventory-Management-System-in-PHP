<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Products</title>
    <script>
        function confirmDelete(id) {
            var result = confirm("Are you sure you want to delete this product?");
            if (result) {
                
                window.location.href = 'delete_product.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <h1>All Products</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['price']}</td>
                    <td>
                        <a href='update_product.php?id={$row['id']}'>Edit</a> |
                        <a href='#' onclick='confirmDelete({$row['id']})'>Delete</a>
                       
                    </td>
                </tr>";
            }
       } 
       
       else {
            echo "<tr><td colspan='5'>No products found</td></tr>";
        }
        ?>

    </table>
</body>
</html>
