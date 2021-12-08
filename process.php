<?php

//COMEÇAR SESSÃO
session_start();

//CONNECT TO DB
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));

$name = '';
$location = '';
$update = false;
$id = 0;

//BOTÃO SAVE
if (isset($_POST['save'])){
    $name = $_POST['name'];
    $local = $_POST['location'];


    $mysqli->query("
        INSERT INTO data (name,location) 
        VALUES ('$name','$local')") or die($mysqli->error);

    $_SESSION['message']="Record saved with success!";
    $_SESSION['msg_type']="success";
   
    Header('location: index.php');
};

//BOTÃO DELETE
if(isset($_GET['delete'])){
    $id=$_GET['delete'];

   
    $mysqli->query("
    DELETE FROM data WHERE id=$id
") or die($mysqli->error);

    $_SESSION['message']="Record has been deleted!";
    $_SESSION['msg_type']="danger";
    
    Header('location: index.php');
}


//BOTÃO EDIT
if (isset($_GET['edit'])) {
    $id =  $_GET['edit'];
    $que = "SELECT * FROM data WHERE id = $id";

    $result = $mysqli->query($que) or die($mysqli->error);

    if ($result->num_rows == 1) {  //verificar se existe na BD
        $row = $result->fetch_array();
        $name = $row['name'];
        $location= $row['location'];
        $update = true;
    }
}

//BOTÃO UPDATE
if(isset($_POST['update'])){
    $id= $_POST['id'];
    $name= $_POST['name'];
    $location= $_POST['location'];
    $que = "UPDATE data SET name = '$name', location = '$location' WHERE id=$id"; 
    

    $mysqli->query($que) or die($mysqli->error);

    $_SESSION['message'] = 'Record Updated!';
    $_SESSION['msg_type'] = 'warning';

    Header('location:index.php');
}
