<?php 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 22/03/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Interfaz donde se  **
**  agrega un campo extra a las categorias **
**  de los inventarios                     **
**                                         **
*********************************************
********************************************/?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php require("Est/head.php"); ?>

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
			<?php require("Est/nav.php"); ?>

			<main class="main col">
				<a href="Modificar-categoria.php?n=<?php echo $_GET['n']; ?>&i=<?php echo $_GET['i']; ?>"><i class="fas fa-arrow-left"></i></a>
				<div class="row">
					<div class="columna col-lg-12">
						<div class="container" >
							<div id="dynamicDiv">
								<form action="SQL/Add_campo.php" method="POST" name="form_categoria" onsubmit="Cargar()">
									<div class="row">
										<h2>Agregar Campo</h2>
										<div class="input-group input-group-icon">
											<input type="text" style="display:none;"  />
										</div>
										<?php 
										error_reporting(E_ALL ^ E_NOTICE);
										require('SQL/conexion.php');
										$Nombre=$_GET['n'];
										$icono=$_GET['i'];

										echo'

										<div class="input-group input-group-icon detalles_inv">
										Nombre Inventario:<input class="nombreIn" type="text" value="'.$Nombre.'" name="nombre_categoria" Readonly> 
										</div>
										<div class="input-group input-group-icon detalles_inv icon">
										Icono:  &nbsp <p><i class="'.$icono.'" style="color:red"></i></p>
										<input type="text" value="'.$icono.'" name="icono" hidden> 
										</div>
										<div class="input-group input-group-icon  campos" style="border:1px solid #f2f2f2">
										<p> <i>Id_'.$Nombre.'&nbsp;&nbsp;</i>
										';

										$campos_registrados='Select campo from Categorias where nombre="'.$Nombre.'"';

										$resultado=$base->prepare($campos_registrados);
										$resultado->execute();
										while ($campos=$resultado->fetch(PDO::FETCH_ASSOC)) {
											echo'

											<i>'.$campos['campo'].'</i>&nbsp;&nbsp;
											';
										}
										echo "</p></div> ";

										?>
										
										<h4><br>Campo</h4>
										<div class="input-group input-group-icon">
										</div>
										<p>Nombre del campo</p>
										<div class="input-group input-group-icon">
											<input type="text" placeholder="Nombre del campo" name="nombre_campo" 
											onkeyup="this.value=NumText(this.value)" required />
										</div>
										<p>Tipo de dato</p>
										<div class="input-group input-group-icon">
											<select name="tipo" required>
												<option value="" disabled selected> ... </option>
												<option>Varchar</option>
												<option>Int</option>
												<option>Float</option>
												<option>Date</option>
											</select>
										</div>
										<p>Longitud</p>
										<div class="input-group input-group-icon">
											<input type="number" name="longitud" min="0" max="255" value="11" />
										</div>

										<p>Null</p>
										<div class="input-group input-group-icon">
											<select name="null">
												<option value="Not Null">No</option>
												<option value="Null">Si</option>
											</select>
										</div>	
									</div>
									<div style="margin-top: 2%;"><center>
										<input type="submit" value="Nuevo Campo" name="nuevo">
										<a href="<?php echo 'Modificar-categoria.php?n='.$Nombre.'&i='.$icono.'' ?>" name="terminar"> Regresar</a></center>
									</div>
								</form>

							</div>
						    <!-- <div class="input-group input-group-icon">
								<a  id="addInput" href="javascript:void(0)">
								<div class="fa-1x colorH">
										
								  	<span class="fa-layers fa-fw">
								  		<i class="fas fa-plus colorH"></i>
								  	</span>Otro campo
								</div></a>
							</div> -->



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
		.campos{
			margin-top: -2%;
			margin-left: 3%;
			margin-bottom: 2%;
		}

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