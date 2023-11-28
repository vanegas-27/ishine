<?php
require('./database/bd.php');

if(isset($_POST['filtrar'])){

    $termino = $_POST['termino'];

    $filtro = $_POST['filtro'];

    if($filtro == "id" or $filtro == "price"){
        $sql = "SELECT * FROM datos WHERE $filtro = '$termino'";
    }else{
        $sql = "SELECT * FROM datos WHERE $filtro like '$termino%'";
    }

}else{

    $sql = "SELECT * FROM datos";
}

$query = mysqli_query($conn,$sql);

$nodos = "";


while($row=mysqli_fetch_array($query)){
    $nodos .="
    <article class='col-12 col-sm-6 col-xl-4 container-article scale-up-br'>

        <div>
            <span>Sale</span>
            <img src='".$row["url_image"]."' alt='Foto de producto' class='img-fluid'>
        </div>

        <div class='container-parrafo'>

            <p class='price'><del>$".$row['price'] * 1.45."</del><strong>".$row["price"]."</strong></p>
            <h5>".$row["product"]."</h5>

            <div>
                <!-- Button trigger modal -->
                <a href='./producto.php?id=".$row["id"]."' class='btn btn-outline-success'>Add To Cart</a>
            </div>
        </div>
    </article>\n";
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ishine | los mejores cosmeticos y accesorios baratos y de buena calidad</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    
    <header class="container-fluid row container-header">
        <div class="col-12 col-md-5">
            <img src="./img/logo-ishine.svg" alt="Logo de la empresa">
        </div>

        <nav class="col-12 col-md-7">
            <ul class="d-flex justify-content-evenly">
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Book Appointment</a></li>
            </ul>
        </nav>
    </header>

    <aside class="container-fluid">
        <form method="post">
            <select name="filtro">   
                <option >id</option>
                <option >product</option>
                <option >description</option>
                <option >price</option>
                <option >category</option>
            </select>
            <input type="text" name="termino">
            <input type="submit" value="filtrar" name="filtrar" class="btn btn-outline-success">
        </form>
    </aside>

    <main class="row container-fluid main justify-content-center">

        <section class="row row-cols-4">

            <?php if(empty($nodos)):?>
                <h2 class="col-12 col-md-6">Lo sentimos, no se encontraron resultados... 😴</h2>
                <figure class="col-12 col-md-6">
                    <img src="./img/pato.gif" alt="Foto de producto" class="img-fluid">
                </figure>
            <?php else: ?>
                <?=$nodos;?>
            <?php endif; ?>

        </section>

    </main>
</body>
</html>