<?php

//CONNECT TO DB
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){//verifica se botão save foi accionado
    $name = $_POST['name'];
    $local = $_POST['location'];

    $mysqli->query("
        INSERT INTO data (name,location) 
        VALUES ('$name','$local')") or die($mysqli->error);
}