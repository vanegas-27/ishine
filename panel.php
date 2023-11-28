<?php
require('./database/bd.php');

$query = mysqli_query($conn,$sqlDefault);

$nodos = "";
while($row = mysqli_fetch_array($query)){
    $nodos .= "
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['product']."</td>
        <td>".$row['price']."</td>
        <td>".$row['stock']."</td>
        <td>".$row['category']."</td>
        <td>".$row['num_carrito']."</td>
        <td>".$row['description']."</td>
        <td> <img src='".$row['url_image']."'></td>
    </tr>\n
";


}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/formulario.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        
    <script>
        $(() => {

            let id;

            $('.lista tr').click(function(){

                //find() busca algo expecifico
                id = $(this).find('td').eq(0).html();
                let product = $(this).find('td').eq(1).html();
                let price = $(this).find('td').eq(2).html();
                let stock = $(this).find('td').eq(3).html();
                let category = $(this).find('td').eq(4).html();
                let numCarrito = $(this).find('td').eq(5).html();
                let description = $(this).find('td').eq(6).html();
                let getImg = $(this).find('td img').attr('src');

                $('#product').val(product);
                // $('#image').attr('src',getImg);
                $('#price').val(price);
                $('#Stock').val(stock);
                $('#category').val(category);
                $('#NumCar').val(numCarrito);
                $('#Description').val(description);


            })



            //funcion ajax actualizar
            $('a').click(function(){

                if(id == null){
                    alert("seleccione un registro");
                    return;
                }

                //obtengo el valor de quien llamo
                let valor = $(this).html();

                //obtengo los valores en los inputs
                let product = $('#product').val();
                // let img = $('#image').attr('src');
                // console.log(img);
                let price = $('#price').val();
                let stock = $('#Stock').val();
                let category = $('#category').val();
                let numcar = $('#NumCar').val();
                let description = $('#Description').val();


                $.ajax({

                    url: `./php/${valor}.php`, //archivo a donde mandas los valores

                    type: 'POST', //tipo de peticion post o get
                    
                    async : true, //opcional
                    
                    data: {
                        'id' : id,
                        'producto': product,
                        'precio' : price,
                        'cantidad' : stock,
                        'categoria' : category,
                        'numero' : numcar,
                        'descripcion' : description
                    }, //opcion para enviar informacion adicional
                

                    //se ejecuta antes de completarse
                    beforeSend : function(){
                        console.log('procesando...');
                    },
                    

                    //captura la info cuando todo se realiza
                    success: function(data){
                        data == 1? console.log(data) : new Error('Error: ocurrio algo inesperado '+data);
                    },


                    //ejecuta cuando todo termine
                    complete : function(){
                        console.log('completada.')
                        location.reload();
                    },


                    //para capturar el error
                    error : function(data){
                        aler('Error...');
                        console.log(data);
                    }


                });

            });

    
        })
    </script>

</head>
<body>
    
<form action="./php/crear.php" method="post" enctype="multipart/form-data" class="row slide-bck-left">

    <div class="form-floating mb-3 col-5">
        <input type="text" name="product" class="form-control" id="product"  placeholder="Product" required></input>
        <label for="product">Product</label>
    </div>

    <div class="form-floating mb-3 col-3">
        <input type="text" class="form-control" id="price" name="price" placeholder="price" required>
        <label for="price">Price</label>
    </div>

    <div class="form-floating mb-3 col-2">
        <input type="number" name="stock" class="form-control" id="Stock"  placeholder="Stock" required></input>
        <label for="Stock">Stock</label>
    </div>
    
    <div class="form-floating mb-3 col-2">
        <input type="number" name="numCarrito" class="form-control" id="NumCar"  placeholder="add to car" required>
        <label for="NumCar">numCar</label>
    </div>


    
    <div class="form-floating mb-3 col-6">
        <input name="category" class="form-control" id="category"  placeholder="category" required></input>
        <label for="category">category</label>
    </div>

    
    <div class="form-floating mb-3 col-6">
        <input type="file" name="image" class="form-control" id="image" required>
        <label for="image">Archivo</label>
    </div>

    <div class="form-floating mb-3 col-12">
        <textarea name="description" class="form-control" id="Description" placeholder="description" style="min-height:100px" required></textarea>
        <label for="Description">Descriprion</label>
    </div>

        <button type="submit" name="send" class="btn btn-outline-success col-4">send</button>
        <a class="actualizar btn btn-outline-success col-3">actualizar</a>
        <a class="eliminar btn btn-outline-success col-3">eliminar</a>

</form>
<br><hr>
<table class="table lista">
    <thead >
        <th scope="col">Id</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Stock</th>
        <th scope="col">Category</th>
        <th scope="col">NumCarrito</th> 
        <th scope="col">description</th>
        <th scope="col">imagen</th>
    </thead>
    <tbody>
        <?= $nodos?>
    </tbody>
</table>

</body>
</html>