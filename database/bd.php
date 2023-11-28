<?php


function connnectG(){

    try{
        $conn = mysqli_connect("127.0.0.1","root","");
        return $conn;
    }catch(Exception $e){
        echo "<h1 style='color:red'>Verifica que el mySql con apache esten corriendo...</h1> <br>".$e->getMessage();
    }

}


function createDb($conn){

    $sql = "CREATE DATABASE IF NOT EXISTS ishine";

    try{
        mysqli_query($conn, $sql);
        return mysqli_connect("127.0.0.1","root","","ishine");
    }catch(Exception $e){
        die("Error al crear la base de datos" . $e);
    }
    
    
    
}


function createTable($conn){

    $sql = "CREATE TABLE IF NOT EXISTS `datos` 
    (`id` INT NOT NULL AUTO_INCREMENT,
    `url_image` VARCHAR(400) NOT NULL,
    `price` FLOAT NOT NULL,
    `product` VARCHAR(60) NOT NULL,
    `stock` INT NOT NULL,
    `num_carrito` INT NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `category` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)) 
    ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_bin;";

    if(!mysqli_query($conn,$sql)){
        echo "Error to create table ";
    }

}

$conn = createDb(connnectG());
    
createTable($conn);


$sqlDefault = "SELECT * FROM datos";



    
