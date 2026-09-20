<?php

include "../crud/db/funciones.php";
require_once "../crud/db/conexion.php";

$idUser = $_GET['id'];
$query = "SELECT * FROM crud WHERE id=".$idUser.";";
$resultado =mysqli_query($conex, $query);

foreach ($resultado as $data) {
    var_dump($data);
}

$state = ($resultado) ? 4 : 5;
header("location: ../../pag/users.php");
