<?php

require('./database/bd.php');

if(isset($_GET['id'])){

    $producto = $_GET['id'];

    $sql = "SELECT * FROM datos WHERE id = '$producto'";

    $query = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($query)){
        $nodo = "
        <article class='col-12 col-md-6 container-article'>
                <div>
                    <span>Sale</span>
                    <figure>
                        <img src='".$row['url_image']."' alt='Foto de producto' class='img-fluid scale-up-br'>
                    </figure>
                </div>
            </article>

            <article class='col-12 col-md-6 container-parrafo d-flex flex-column justify-content-evenly'>
                <h2>".$row['product']."</h2>
                <span class='price'><del>$".$row['price'] * 1.45."</del><strong>".$row['price']."</strong></span>
                <p>".$row['description']."</p>
                <span>".$row['stock']." in stock</span>
                <div>
                    <input type='number' value='1'>

                    <!-- Button trigger modal -->
                    <button type='button' class='btn btn-outline-success'>
                    Add To Cart
                    </button>
                </div>
                <span>SKU: SES1233 Category: ".$row['category']."</span>
            </article>";
    }
}

$queryPre = mysqli_query($conn,$sqlDefault);

$nodos = "";

$cont = 0;

while($row = mysqli_fetch_array($queryPre)){

    $nodos .= "<img src='".$row['url_image']."' alt='foto de cafe' class='img-fluid scale-up-br' loading='lazy'>\n";
    $cont++;
    if($cont == 5){
        break;
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ishine | los mejores cosmeticos y accesorios baratos y de buena calidad</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <link rel="stylesheet" href="./css/producto.css">
    <script defer src="./js/index.js"></script>
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

    <main class="row container-fluid main justify-content-center">

        <section class="row">
            <?php if(empty($nodo)):?>
                <article class="col-12 col-md-6 container-article scale-up-br">
                    <div>
                        <span>Sale</span>
                        <figure>
                            <img src="./img/pato.gif" alt="Foto de producto" class="img-fluid scale-up-br">
                        </figure>
                    </div>
                </article>

                <article class="col-12 col-md-6 container-parrafo d-flex flex-column justify-content-evenly">
                    <span class="price"><del>$120</del><strong>$100</strong></span>
                    <p>
                        Texto por default para no romper la pagina antes que hagan el evento click en los botones de productos... 👍
                    </p>
                    <span>100 in stock</span>
                    <div>
                        <input type="number" value="1">
                        <button class="btn btn-outline-success" >
                        Add To Cart
                        </button>
                    </div>
                    <span>SKU: SES1233 Category: Dryness</span>
                </article>
            <?php else:?>
                    <?= $nodo?>
            <?php endif; ?>
            
        </section>

        <section class="container ">
            <div class="container-images-product">
                <?= $nodos?>
            </div>
        </section>

        <section class="container info-adicional">
            <div class="container-description">
                <ul class="d-flex desgen">
                    <li class="des1 activ" data-tab="tab1" >Description</li>
                    <li class="des2" data-tab="tab2">Additional informattion</li>
                </ul>
                <div class="tab-gen tab1">
                    <h3>Description</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam iste esse sapiente consequuntur dolor quo vitae dolorem reprehenderit odit? Ab aliquam eaque soluta laboriosam quo nostrum cumque porro molestias quas.</p>
                </div>
                <div class="tab-gen tab2"> <!--  <- inactive -->
                    <h3>Additional informattion</h3>
                    <p>Lorem ipsum  2 dolor sit, amet consectetur adipisicing elit. Ullam iste esse sapiente consequuntur dolor quo vitae dolorem reprehenderit odit? Ab aliquam eaque soluta laboriosam quo nostrum cumque porro molestias quas.</p>
                </div>
            </div>
        </section>
        
    </main>

    <footer class="row container-fluid container-footer d-flex">
        <div class="col-12 col-md-4">
            <h3>Locations</h3>
            <p>
                Hollywood<br>
                2205b Hollywood Blv, Hollywood<br>
                Fl 33020
            </p>
            <h4>Call us: 3053002122</h4>
        </div>
        <div class="col-12 col-md-4">
            <span><img src="./img/producto.png" alt="cera" class="img-fluid"></span>
            <ul>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Book Appointment</a></li>
            </ul>
        </div>
        <div class="col-12 col-md-3">
            <ul>
                <li><i class="bi bi-whatsapp"></i> @ishineclinic</li>
                <li><i class="bi bi-instagram"></i> @jen_shyumd</li>
                <li><i class="bi bi-facebook"></i> @beatrizlam.np</li>
            </ul>
        </div>
    </footer>
</body>
</html>