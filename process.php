<?php

//CONNECT TO DB
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));



//BOTÃO SAVE
if (isset($_POST['save'])){
    $name = $_POST['name'];
    $local = $_POST['location'];

    $mysqli->query("
        INSERT INTO data (name,location) 
        VALUES ('$name','$local')") or die($mysqli->error);
    echo "Registo adicionado!";
    Header('location:index.php');
}

//BOTÃO DELETE
if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $mysqli->query("
    DELETE FROM data WHERE id=$id
") or die($mysqli->error);

echo "Registo eliminado!";
}


