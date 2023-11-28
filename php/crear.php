<?php
require('../database/bd.php');


if(isset($_POST['send'])){

     
    $price = $_POST['price'];
    $product = $_POST['product'];
    $stock = $_POST['stock'];
    $numCarrito = $_POST['numCarrito'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    //obtengo el nombre de la imagen
    $nameImagen = $_FILES['image']['name'];

    //obtengo su ruta temporal
    $urlImagen = $_FILES['image']['tmp_name'];

    //creo como se llamara el nuevo archivo(foto)
    $newPath = "imagen_time".time()."_$nameImagen";

    //guardo la imagen en la carperta con su nuevo nombre
    move_uploaded_file($urlImagen,"../upload/$newPath");


    $location = "./upload/".$newPath;


    $sql = "INSERT INTO `datos`
    (`id`, `url_image`, `price`, `product`, `stock`, `num_carrito`, `description`, `category`) 
    VALUES (NULL, '$location', '$price', '$product', '$stock', '$numCarrito', '$description', '$category')";

    try{
        mysqli_query($conn , $sql);
    }catch(Exception $e){
        echo("Error al insertar");
    }




        

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card" style="width: 18rem;">
    <img src=".<?=$location?>" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title"><?=$product?></h5>
        <p class="card-text">El producto <?=$product?> se inserto correctamente...</p>
        <a href="../panel.php" class="btn btn-primary">volver</a>
    </div>
    </div>
    
</body>
</html>
