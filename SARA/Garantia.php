<?php 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 27/03/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Interfaz donde se  **
**  registra la garantia del activo        **
**                                         **
*********************************************
********************************************/?>


<!DOCTYPE html>
<html lang="es">
<head>
	<?php require("Est/head.php"); 
	require('SQL/conexion.php');
	error_reporting(E_ALL ^ E_NOTICE);

	if($_GET['m']=='s'){
		$codigo=$_GET['c'];
		$tabla=$_GET['t'];
		$sql=$base->prepare('Select * from garantia where codigo="'.$codigo.'"');
		$sql->execute();
		
		while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
			$expiracion=$row['Expiracion'];
			$proveedor=$row['Proveedor'];
			
		}
		$m='s';
	}else{

		$tabla=$_GET['t'];
		$activo=$_GET['a'];
		$asignar=$_GET['as'];
		$sql=$base->prepare('Select * from '.$tabla.' where id_'.$tabla.'='.$activo.' ');
		$sql->execute();

		while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
			if($tabla=='Software'){
				$codigo=$row['Licencia'];
			}else if($tabla=='Lineas_Telcel'){
				$codigo=$row['Numero_Celular'];
			}else{
				$codigo=$row['Codigo'];
			}

		}
		$m='n';
	}

	?>

	<link href="css/formularios.css" rel="stylesheet">
</head>
<body> 
	<div style="display:none" id="carga" class="carga">
		<center><img src="img/Carga.gif" alt="" ></center>
	</div>
	<div class="container-fluid">
		<div class="row">

			<?php require("Est/nav.php"); ?>

			<main class="main col">
				<?php
					if($asignar=='si'){
						echo '<a href="asignacion.php?a='.$activo.'&t='.$tabla.'"><i class="fas fa-arrow-left"></i></a>';
					}else{
						echo '<a href="inventarios-individual.php?t='.$tabla.'"><i class="fas fa-arrow-left"></i></a>';
					}
				?>
				
				<div class="row">
					<div class="columna col-lg-12">
						<div class="container">
							<form action="SQL/Garantia.php?m=<?php echo $m; ?>" method="POST" onsubmit="Cargar()" enctype="multipart/form-data">
								<input type="text" value="<?php echo $codigo; ?>" name="codigo" hidden>
								<?php
								if($_GET['m']=='s'){
									echo '

									<input type="text" value="'.$tabla.'" name="tabla" hidden>
									<input type="text" value="no" name="asignar" hidden>

									<div class="row">
									<h2>Garantia del activo: '.$codigo.' de la tabla: '.$tabla.'</h2>
									<div class="input-group input-group-icon">
									<input type="text" style="display:none;"/>
									</div>
									<h4>Fecha de expiración</h4>
									<div class="input-group input-group-icon">
									<input type="date" name="expiracion" step="any" value="'.$expiracion.'"/>
									<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
									</div>
									<h4>Proveedor</h4>
									<div class="input-group input-group-icon">
									<input type="text" name="proveedor" placeholder="Escribe el dato aqui..." value="'.$proveedor.'" maxlength="150" />
									<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
									</div>			

									</div>

									';
								}else{
									?>

									<input type="text" value="<?php echo $tabla; ?>" name="tabla" hidden>
									<input type="text" value="<?php echo $asignar; ?>" name="asignar" hidden>
									<input type="text" value="<?php echo $activo; ?>" name="activo" hidden>

									<div class="row">
										<h2>Garantia del activo: <?php echo $codigo.' de la tabla: '.$tabla; ?></h2>
										<div class="input-group input-group-icon">
											<input type="text" style="display:none;"/>
										</div>
										<h4>Fecha de expiración</h4>
										<div class="input-group input-group-icon">
											<input type="date" name="expiracion" step="any" />
											<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
										</div>
										<h4>Proveedor</h4>
										<div class="input-group input-group-icon">
											<input type="text" name="proveedor" placeholder="Escribe el dato aqui..." maxlength="150" />
											<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
										</div>			

									</div>

								<?php }?>
								<center><input type="submit" value="Registrar"></center>
							</form>
						</div>

					</div>

				</div>
			</main>
		</div>
	</div>

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

<script type="text/javascript">
	function Cargar(){
		document.getElementById('carga').style.display = 'Block';
	}

	function comprueba_extension() { 
		var cadena= document.getElementById('fname').value;

		extencion=cadena.substr(-3); 

		if(extencion=="pdf"){

		}else{
			alert('No se puede agregar un archivo que no sea PDF ');
			document.getElementById('fname').value='';
		}
	}
</script>


<?php require("Est/script.php"); ?>
<?php require("Est/modales.php"); ?>

</body>
</html>