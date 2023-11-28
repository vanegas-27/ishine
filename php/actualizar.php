<?php

require('../database/bd.php');

$id = $_POST['id'];
$price = $_POST['precio'];
$product = $_POST['producto'];
$stock = $_POST['cantidad'];
$numCarrito = $_POST['numero'];
$description = $_POST['descripcion'];
$category = $_POST['categoria'];


$sql = "UPDATE datos SET `price`='$price', `product`='$product', `stock`='$stock', `num_carrito`='$numCarrito', `description`='$description', `category`='$category' WHERE id = $id";

try{
    mysqli_query($conn,$sql);
}catch(Exception $e){
    echo $e;
}


