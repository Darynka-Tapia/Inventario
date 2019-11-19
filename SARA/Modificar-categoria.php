<?php 
/********************************************
*********************************************
**										   **
**	Autor: Darynka Tapia				   **
**	Proyecto: Inventarios Twin Dolphin     **
**	Lugar: Los Cabos, BCS.				   **
**	Fecha ultima modificacion: 27/03/2019  **
**										   **
** * * * * * * * * * * * * * * * * * * * * **
**										   **
**	Descripcion codigo: Interfaz y logica  **
**	la modificacion de una categoria de    **
**	inventarios							   **
**										   **
*********************************************
********************************************/?>


<?PHP
error_reporting(E_ALL ^ E_NOTICE);

$modificar=$_POST['Datos'];
$eliminar=$_GET['e'];
$id=$_GET['id'];


$name1=$_POST['Datos'];
$Icono1=$_POST['Icono'];



$name2=$_GET['n'];
$Icono2=$_GET['i'];
		//echo $name;


if($name1!='' && $Icono1!=''){

	$name=$name1;
	$Icono=$Icono1;
}else{
	$name=$name2;
	$Icono=$Icono2;
}

if($eliminar=='s'){
	require('SQL/conexion.php');


	$consulta='SELECT * FROM categorias WHERE id_categoria='.$id.' GROUP BY nombre';
	$resultado=$base->prepare($consulta);
	$resultado->execute();
	while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
		
			$q1='DROP TABLE '.$registro['nombre'].'';
			//echo $query1;
			$query=$base->prepare($q1);
			$query->execute();

			$q2='Delete from categorias where nombre="'.$registro['nombre'].'"';
			$query2=$base->prepare($q2);
			$query2->execute();

		// $q3='alter table colaboradores drop '.$registro['nombre'].';';
		// $query3=$base->prepare($q3);
		// $query3->execute();
		// echo $q3;

			// $sql4=$base->prepare('DELETE FROM codigos WHERE Tabla = "'.$registro['nombre'].'"');
			// //Actualizar el campo eliminado a si 
			// $sql4->execute();

			echo '
			<script> window.onload = function(){
				alert("Elimine la tabla ...");
				window.location = "inventario-general.php";
			}</script>';
		


		
	}
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
	<?php require("Est/head.php"); ?>

	<link href="css/formularioCategoria.css" rel="stylesheet">
</head>
<body>
	<div style="display:none" id="carga" class="carga">
		<center><img src="img/Carga.gif" alt="" ></center>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php require("Est/nav.php"); ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-12">
						<div class="container">

							<div class="row">

								<form action="SQL/modificar-categoria.php" method="POST" name="formulario" onsubmit="Cargar()">
									<?php 
									// echo '<a href="Add_campo.php?n='.$name.'&i='.$Icono.'"><i class="fas fa-plus-square"></i></a>';?>
									<h2>Modificar nombre de la categoria </h2>
									<?php 

									if($name=='Computadoras' || $name=='Software' || $name=='Celulares'){
	 									$eliminar='<b>'.$name.'</b> 
	 									<input type="text" name="Tabla" value="'.$name.'" hidden>';
	 								}else{
	 									$eliminar='
	 									<input type="text" name="Tabla" value="'.$name.'" onkeyup="this.value=NumText(this.value)"> ';
	 								}

									echo $eliminar.'<br>';
									// <input type="text" name="Icono" value="'.$Icono.'" >
									?>

									<table  width="100%">
										<tr>
											<th width="24%"></th>
											<th width="19%"></th>
											<th width="19%"></th>
											<th width="19%"></th>
											<th width="19%"></th>
										</tr>
										<?php
										require('SQL/conexion.php');
										$campos=$base->prepare('SELECT * FROM categorias where nombre="'.$name.'" and (campo<>"Fecha_Compra" and campo<>"Fecha_Cambio" and campo<>"Cantidad" and campo<>"Duracion" and campo<>"Costo")');
										$campos->execute();
										$num_campo=0;
										$id=0;
										while($registro=$campos->fetch(PDO::FETCH_ASSOC)){
											$id=$registro['id_categoria'];

											echo '
											<input type="text" name="id'.$num_campo.'" value="'.$registro['id_categoria'].'" hidden>
											<input type="text" name="TablaR" value="'.$name.'" hidden>
											<input type="text" name="campo'.$num_campo.'R" value="'.$registro['campo'].'" hidden>
											<input type="text" name="tipo'.$num_campo.'R" value="'.$registro['tipo'].'" hidden>
											<input type="text" name="longitud'.$num_campo.'R" value="'.$registro['longitud'].'" hidden>
											<input type="text" name="nulo'.$num_campo.'R" value="'.$registro['nulo'].'" hidden>
											';

											if($registro['tipo']=='Varchar'){
												$tipo ='
												<select name="tipo'.$num_campo.'" required hidden>
												<option selected>Varchar</option>
												<option>Int</option>
												<option>Float</option>
												<option>Date</option>
												</select>
												';
											}else if($registro['tipo']=='Int'){
												$tipo ='
												<select name="tipo'.$num_campo.'" required hidden>
												<option >Varchar</option>
												<option selected>Int</option>
												<option>Float</option>
												<option>Date</option>
												</select>
												';
											}else if($registro['tipo']=='Float'){
												$tipo ='
												<select name="tipo'.$num_campo.'" required hidden>
												<option >Varchar</option>
												<option >Int</option>
												<option selected>Float</option>
												<option>Date</option>
												</select>
												';
											}else if($registro['tipo']=='Date'){
												$tipo ='
												<select name="tipo'.$num_campo.'" required hidden>
												<option >Varchar</option>
												<option >Int</option>
												<option>Float</option>
												<option selected>Date</option>
												</select>
												';
											}



											if ($registro['nulo'] == "Not Null" or $registro['nulo'] == "NOT NULL"){
												$nulo= '<input name="nulo'.$num_campo.'" type="checkbox" checked value="Not Null" hidden>';
											}else {
												$nulo= '<input name="nulo'.$num_campo.'" type="checkbox" value="Null" hidden>';
											}
												echo '
												<tr>
												<td>
												<input type="text" name="campo'.$num_campo.'" id="campo" value="'.$registro['campo'].'" onkeyup="this.value=NumText(this.value)" hidden>
												</td>
												<td>
												'.$tipo.'
												</td>
												<td>
												<input type="number" name="longitud'.$num_campo.'" min="0" max="255" value="'.$registro['longitud'].'" hidden>
												</td>
												<td>
												'.$nulo.'
												</td>
												<td> 
												<center>
												




												</center>
												</td>
												</tr>
												';
											// }
												// <a href="#" onclick="eliminar('.$id.')"  >
												
												// <i class="fas fa-times colorH-Inverse" ></i>
												// </a>
											$num_campo++;



											
										}
										

										
										?>

									</table><input type="text" name="numero" value="<?php echo $num_campo ?>" hidden>
									<center><input type="submit" value="Modificar" ></center>
								</form>
							</div>

						</div>


					</div>
					
				</div>
			</main>
		</div>
	</div>

	<script type="text/javascript">
		function NumText(string){//solo letras y numeros
			var out = '';
		    //Se añaden las letras validas
		    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890-_';//Caracteres validos

		    for (var i=0; i<string.length; i++)
		    	if (filtro.indexOf(string.charAt(i)) != -1) 
		    		out += string.charAt(i);
		    	return out;
		    }

		    function eliminar(id){

		    	var confirmacion = confirm("Deseas eliminar "+id+" de forma permanente?");
		    	if(confirmacion){
		    		location.href = "SQL/Eliminar_categoria.php?r="+id+"";
		    	} else {
		    		alert("Has pulsado cancelar");
		    	}

		    }


		    function Cargar(){
		    	document.getElementById('carga').style.display = 'Block';
		    }

		</script>

		<?php require("Est/script.php"); ?>
		<?php require("Est/modales.php"); ?>

		<style type="text/css">
		.carga{
			position: fixed;
			z-index: 1;
			background: #fff;
			width: 100%;
			height: 150%;
			opacity: 0.7;

		}

	</style>

</body>
</html>



