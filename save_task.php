<?php
include("db.php");


if (isset($_POST['save_task'])) {
	$title= $_POST['title'];
	$description= $_POST['description'];

$query="INSERT INTO task(title, description) VALUES ('$title','$description')";

//La variable $conn se toma del include "db.php"
$result= mysqli_query($conn,$query);

if(!$result){
	die("Error al agregar");
}

$_SESSION['message']='Tarea guardada';
$_SESSION['message_type']='success';

header("Location: index.php");
}
?>