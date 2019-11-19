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
**  registran los activos en cada          **
**  categoria                              **
**                                         **
*********************************************
********************************************/?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php require("Est/head.php"); 
	require('SQL/conexion.php');
	error_reporting(E_ALL ^ E_NOTICE);
	$tabla=$_GET['t'];
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
				<a href="inventarios-individual.php?t=<?php echo $tabla; ?>"><i class="fas fa-arrow-left"></i></a>
				<div class="row">
					<div class="columna col-lg-12">
						<div class="container">
							<form action="SQL/RegistrarActivo.php" method="POST" onsubmit="Cargar()" enctype="multipart/form-data">
								<div class="row">
									<h2>Registrar en inventario de: <?php echo $tabla; ?></h2>
									<div class="input-group input-group-icon">
										<input type="text" style="display:none;"  />
									</div>
									<?php
									$query='SELECT * FROM categorias WHERE nombre="'.$tabla.'" ';
									
									$consulta=$base->prepare($query);
									$consulta->execute();
									echo'<input type="text" value="'.$tabla.'" name="tabla" hidden>';


									while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
										if($registro['nulo']=='Not Null'){
											$requerido='required';
											$aterisco='<label style="color:#ff0000;">*</label>';
										}else{
											$requerido='';
											$aterisco='';
										}


										
										if($registro['campo']=='Codigo'){

											echo '<br>
												<h4>'.$registro['campo'].' '.$aterisco.'</h4>
												<div class="input-group input-group-icon">
												<input type="text" name="'.$registro['campo'].'" placeholder="Escribe el dato aqui..." maxlength="'.$registro['longitud'].'"  '.$requerido.'/>
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
												</div>
												';
										}else {}
									}

									$query2='SELECT * FROM categorias WHERE nombre="'.$tabla.'" ';
									
									$consulta2=$base->prepare($query2);
									$consulta2->execute();
									
									while($registro=$consulta2->fetch(PDO::FETCH_ASSOC)){
										if($registro['nulo']=='Not Null'){
											$requerido='required';
											$aterisco='<label style="color:#ff0000;">*</label>';
										}else{
											$requerido='';
											$aterisco='';
										}


										
										if($registro['campo']=='Codigo'){

										
										}else{
										
											if($registro['tipo']=='Varchar'){

												echo '<br>
												<h4>'.$registro['campo'].' '.$aterisco.'</h4>
												<div class="input-group input-group-icon">
												<input type="text" name="'.$registro['campo'].'" placeholder="Escribe el dato aqui..." maxlength="'.$registro['longitud'].'"  '.$requerido.'/>
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
												</div>
												';

											}else if($registro['tipo']=='Int'){
												echo '<h4>'.$registro['campo'].' '.$aterisco.'</h4>';
												echo '
												<div class="input-group input-group-icon">
												<input type="text" name="'.$registro['campo'].'"  placeholder="Solo numeros enteros" pattern="\d*" min="0" maxlength="'.$registro['longitud'].'" />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
												</div>
												';
											}else if($registro['tipo']=='Float'){
												
												echo '
												<h4>'.$registro['campo'].' '.$aterisco.'</h4>
												<div class="input-group input-group-icon">
												<input type="number" name="'.$registro['campo'].'"  min="0" maxlength="'.$registro['longitud'].'" placeholder="Solo numeros con o sin decimales" step="any" '.$requerido.' pattern="\d*" />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
												</div>
												';
											}else if($registro['tipo']=='Date'){
												
												echo '
												<h4>'.$registro['campo'].''.$aterisco.'</h4>
												<div class="input-group input-group-icon">
												<input type="date" name="'.$registro['campo'].'" step="any" '.$requerido.' />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
												</div>
												';
											}
										}
										
									}

									?>
									

									
									
									




								</div>

								
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