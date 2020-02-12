<?php
//BD

include("db.php");

//SI ESXITE "ID" POR MEDIO DE "GET" EJECUTA LO SIGUIENTE...
//PARA MOSTRAR LA INFORMACION QUE SE DEBE EDITAR

if(isset($_GET['id'])){

	$id= $_GET['id'];
	$query="SELECT * FROM task WHERE id=$id";

	$result= mysqli_query($conn,$query);

	//1- GUARDA EN FILAS LA NFORMACION DE LA CONSULTA "RESULT"
	//2- SI LAS FILAS SON = A 1 ENTONCES...
	
	if(mysqli_num_rows($result)==1){

		$row=mysqli_fetch_array($result);
		$title= $row['title'];
		$description= $row['description'];

	}
}
//SI EXISTE "UPDATE" POR MEDIO DE POST...
 //RECIBIR DEL FORMULARIO y actualizar datos en la bd

if(isset($_POST['update'])){
	$id= $_GET['id'];
	$title=$_POST['title'];
	$description=$_POST['description'];

	$query="UPDATE task SET title='$title', description= '$description' WHERE id=$id";
	mysqli_query($conn,$query);

	$_SESSION['message']= "Tarea guardada correctamente";
	$_SESSION['message_type']="primary";

	header("location:index.php");
}

?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
					
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $title; ?>"
						class="form-control" placeholder="Actualiza el tiitulo">			
					</div>

					<div class="form-group">
						<textarea name="description" rows="2" class="form-control" placeholder="Actualiza la descripcion"><?php echo $description; ?></textarea>
					</div>

					<button class="btn btn-success" name="update">Actualizar</button>
				</form>
			</div>
			
		</div>
	</div>
</div>



<?php include("includes/footer.php"); ?>