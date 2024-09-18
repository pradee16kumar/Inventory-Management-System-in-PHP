<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header('Location: view_products.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
