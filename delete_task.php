<?php

//Borrar la tarea seleccionada
// 1-Desde el index se envia el "id" de la tarea seleccionda mediante el metodo GET
// 2-Se busca en la bd el regitro que sea igual al id enviado

include("db.php");

if(isset($_GET['id'])){

	$id=$_GET['id'];
	$query="DELETE FROM task WHERE id=$id";

	$result= mysqli_query($conn,$query);

	if(!$result){
		die("Operacion fallida");
	}


	$_SESSION['message']="Tarea eliminada exitosamente";
	$_SESSION['message_type']="danger";
	header("location:index.php");

}

?>