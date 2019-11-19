<?php 
/********************************************
*********************************************
**										   **
**	Autor: Darynka Tapia				   **
**	Proyecto: Inventarios Twin Dolphin     **
**	Lugar: Los Cabos, BCS.				   **
**	Fecha ultima modificacion: 22/03/2019  **
**										   **
** * * * * * * * * * * * * * * * * * * * * **
**										   **
**	Descripcion codigo: Interfaz para      **
**	la creacion de una nueva categoria de  **
**	inventarios							   **
**										   **
*********************************************
********************************************/?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php require("Est/head.php"); //mando traer el head?>

	<link href="css/formulario-newI.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<div style="display:none" id="carga" class="carga">
		<center><img src="img/Carga.gif" alt="" ></center>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php require("Est/nav.php"); //mando traer el menu ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-12">
						<div class="container" >
							<div id="dynamicDiv">
								<form action="SQL/registro_categoria.php" method="POST" name="form_categoria" onsubmit="Cargar()">
									<div class="row">
										<h3>Nuevo Inventario</h3>
										<div class="input-group input-group-icon">
											<input type="text" style="display:none;"  />
										</div>
										<?php
										error_reporting(E_ALL ^ E_NOTICE);
										require('SQL/conexion.php');

											$Nombre=$_GET['c'];//obtengo el nombre de la tabla a traves de la URL
											$icono=$_GET['i'];//obtengo el nombre del a traves de la URL
											if($_GET['i'] && $_GET['c']) { //si los lo obtengo realizo lo siguiente
												$campos_registrados='Select campo from categorias where nombre="'.$Nombre.'"';
												$resultado=$base->prepare($campos_registrados);
												$resultado->execute();

												

												echo'
												<div class="input-group input-group-icon detalles_inv">
												Nombre Inventario:<input class="nombreIn" type="text" value="'.$Nombre.'" name="nombre_categoria" Readonly> 
												</div>
												<div class="input-group input-group-icon detalles_inv icon">
												Icono:  &nbsp <p><i class="'.$icono.'" style="color:red"></i></p>
												<input type="text" value="'.$icono.'" name="icono" hidden> 
												</div> 
												<div class="input-group input-group-icon " style="border:1px solid #f2f2f2">
												<p> <i>Codigo&nbsp;&nbsp; Costo&nbsp;&nbsp; Fecha_Compra&nbsp;&nbsp Duracion&nbsp;&nbsp Fecha_Cambio&nbsp;&nbspCantidad&nbsp;&nbsp</i>
												';
												while ($campos=$resultado->fetch(PDO::FETCH_ASSOC)) {
													echo'
													
													<i>'.$campos['campo'].'</i>&nbsp;&nbsp;
													
													';
												}

												echo "</p></div> ";





											} else {// si no los obtengo muestro lo siguiente 
												
												echo '

												<div class="input-group input-group-icon">
												<input type="text" placeholder="Nombre completo" value="" name="nombre_categoria" 
												onkeyup="this.value=NumText(this.value)" required 
												/> 
												</div>
												<h4>Icono</h4>
												<div class="input-group ">
												
												<input type="radio" id="icono1" name="icono" value="fas fa-laptop"checked>
												<label for="icono1"><i class="fas fa-anchor"></i></label>

												<input type="radio" id="icono2" name="icono" value="fas fa-desktop">
												<label for="icono2"><i class="fas fa-ship"></i></label>

												<input type="radio" id="icono4" name="icono" value="fas fa-phone">
												<label for="icono4"><i class="fas fa-dharmachakra"></i></i></label>

												<input type="radio" id="icono5" name="icono" value="fas fa-tablet-alt">
												<label for="icono5"><i class="far fa-star"></i></label>

												<input type="radio" id="icono3" name="icono" value="fas fa-tv">
												<label for="icono3"><i class="fas fa-cube"></i></label>

												<input type="radio" id="icono6" name="icono" value="fas fa-mobile-alt">
												<label for="icono6"><i class="fab fa-canadian-maple-leaf"></i></label>

												</div>
												';
											}
											?>

											<h4>Campo 1</h4>
											<div class="input-group input-group-icon">
											</div>
											<p>Nombre del campo</p>
											<div class="input-group input-group-icon">
												<input type="text" placeholder="Nombre del campo" name="nombre_campo" 
												onkeyup="this.value=NumText(this.value)" required value="Nombre" readonly/>
											</div>
											<p>Tipo de dato</p>
											<div class="input-group input-group-icon">
												<select name="tipo" required readonly>
													<option value="" disabled > ... </option>
													<option selected>Varchar</option>
													<option>Int</option>
													<option>Float</option>
													<option>Date</option>
												</select>
											</div>
											<p>Longitud</p>
											<div class="input-group input-group-icon">
												<input type="number" name="longitud" min="0" max="255" value="150" readonly/>
											</div>

											<p>Null</p>
											<div class="input-group input-group-icon">
												<select name="null" readonly>
													<option value="Not Null">No</option>
													<option value="Null">Si</option>
												</select>
											</div>	
										</div>
										<div style="margin-top: 2%;"><center>
											<!-- <input type="submit" value="Agregar Campo" name="nuevo"> -->
											<input type="submit" value="Terminar Categoria" name="terminar"></center>
										</div>
									</form>

								</div>


							</div>
							
						</div>

					</div>
				</main>
			</div>
		</div>

		<script>
			function controlEspacio(){
				var evento_key = window.event.keyCode;
		if (evento_key == '32' ) //comparo tecla space
			alert('No se puede insertar espacios')
	}

	/*Funcion para evitar que los textos se registren con espacios*/
		function NumText(string){//solo letras y numeros
			var out = '';
		    //Se añaden las letras validas
		    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890-_';//Caracteres validos

		    for (var i=0; i<string.length; i++)
		    	if (filtro.indexOf(string.charAt(i)) != -1) 
		    		out += string.charAt(i);
		    	return out;
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

		article{
			width: 100%;
		}

		.detalles_inv{
			margin-top: 2%;
			margin-left: 3%;
		}
		.campos{
			margin-top: -2%;
			margin-left: 3%;
			margin-bottom: 2%;
		}

		.icon{
		}

		.nombreIn{
			border: none;
			background-color: #fff;
			color: red;
			width:50%;
			transition: 0;
		}

	</style>

</body>
</html>