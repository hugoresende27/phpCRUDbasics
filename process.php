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
}

//BOTÃO DELETE
if(isset($_GET['delete'])){
    $id=$_GET['delete'];

?>
    <h1>ELIMINAR ? </h1>
    <a href="confirma_delete.php"> SIM </a>
    <a href="index.php"> NÂO </a>
