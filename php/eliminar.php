<?php

require('../database/bd.php');

$id = $_POST['id'];
$sql = "DELETE FROM datos WHERE id = $id";
try{
    mysqli_query($conn,$sql);
}catch(Exception $e){
    echo $e;
}

