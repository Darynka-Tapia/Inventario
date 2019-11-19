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
**  modifican los activos en cada          **
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



	$modificar=$_POST['Datos'];
	$eliminar=$_GET['e'];
	$campo=$_GET['c'];
	$nombre=$_GET['t'];

	$nombre='select nombre from categorias where id_categoria='.$nombre.'';
	$nombre_tabla=$base->prepare($nombre);
	$nombre_tabla->execute();
	while($registro=$nombre_tabla->fetch(PDO::FETCH_ASSOC)){

		$codigo_campo=$base->prepare('Select * from '.$registro['nombre'].' where id_'.$registro['nombre'].'='.$campo);
		$codigo_campo->execute();
		while($row=$codigo_campo->fetch(PDO::FETCH_ASSOC)){
				$codigo=$row['Codigo'];
		}

		


		$nom=$registro['nombre'];

			
		if($eliminar=='s'){
			
				$campo ='delete from '.$nom.' where id_'.$nom.'='.$campo.'';
				// echo '------------------------------------------------'.$campo;
				$Eliminar_campo=$base->prepare($campo);
				$Eliminar_campo->execute();

				echo '
				<script> window.onload = function(){
					alert("Elimine el campo...");
					window.location = "inventarios-individual.php?t='.$nom.'";
				}</script>';
			

			
			

		}else if($eliminar=='m'){

			?> 

			<link href="css/formularios.css" rel="stylesheet">
		</head>
		<body>
			<div class="container-fluid">
				<div class="row">
					<?php require("Est/nav.php"); ?>

					<main class="main col">
						<a href="inventarios-individual.php?t=<?php echo $nom; ?>"><i class="fas fa-arrow-left"></i></a>
						<div class="row">
							<div class="columna col-lg-12">
								<div class="container">
									<form action="SQL/Modificar-activo.php" method="POST" enctype="multipart/form-data">
										<div class="row">
											<h2>Registrar en inventario de: <?php echo $nom; ?></h2>
											<div class="input-group input-group-icon">
												<input type="text" style="display:none;"  />
											</div>
											<?php
											$query='SELECT * FROM categorias WHERE nombre="'.$nom.'" ';
											$consulta=$base->prepare($query);
											$consulta->execute();
											echo'<input type="text" value="'.$nom.'" name="tabla" hidden>';
											echo'<input type="text" value="'.$campo.'" name="campo" hidden>';

											while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
												$row='Select * from '.$nom.' where id_'.$nom.'='.$campo.' ';
												$row_Result=$base->prepare($row);
												$row_Result->execute();
												while($result=$row_Result->fetch(PDO::FETCH_ASSOC)){

													if($registro['nulo']=='Not Null'){
														$requerido='required';
														$aterisco='<label style="color:#ff0000;">*</label>';
													}else{
														$requerido='';
														$aterisco='';
													}


													if($registro['campo']=='Plan_Telcel'){
														$telcel='SELECT * FROM Plan_Telcel';
														$Resultado=$base->prepare($telcel);
														$Resultado->execute();
														echo '
														<h4>'.$registro['campo'].' '.$aterisco.'</h4>
														<div class="input-group input-group-icon">
														<select name="Plan_Telcel" required>
														';
														while($row=$Resultado->fetch(PDO::FETCH_ASSOC)){
															if($result['Plan_Telcel']==$row['id_Plan_Telcel']){
																echo '
																<option value="'.$row['id_Plan_Telcel'].'" selected>'.$row['Nombre'].' '.$row['Tipo_consumo'].' $'.$row['Costo'].'</option>
																';
															}else{
																echo '
																<option value="'.$row['id_Plan_Telcel'].'">'.$row['Nombre'].' '.$row['Tipo_consumo'].' $'.$row['Costo'].'</option>
																';
															}

														}
														echo '</select>
														<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
														</div>';

													}else{

														if($registro['tipo']=='Varchar'){
															if($registro['campo']=='Codigo'){
																echo '<input type="text" 
															name="'.$registro['campo'].'_respaldo" 
															
															value="'.$result[$registro['campo']].'" hidden
															/>';
															}

															echo '<br>
															<h4>'.$registro['campo'].' '.$aterisco.'</h4>
															<div class="input-group input-group-icon">
															<input type="text" 
															name="'.$registro['campo'].'" 
															placeholder="Escribe el dato aqui..." 
															maxlength="'.$registro['longitud'].'"  
															'.$requerido.'
															value="'.$result[$registro['campo']].'"
															/>
															<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
															</div>
															';
																



														}else if($registro['tipo']=='Int'){

															echo '
															<h4>'.$registro['campo'].' '.$aterisco.'</h4>
															<div class="input-group input-group-icon">
															<input type="text"
															name="'.$registro['campo'].'"  
															placeholder="Solo numeros enteros" 
															pattern="\d*"
															min="0" 
															maxlength="'.$registro['longitud'].'"
															'.$requerido.'
															value="'.$result[$registro['campo']].'"
															/>
															<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
															</div>
															';

														}else if($registro['tipo']=='Float'){
															if($registro['campo']=='Costo' && $registro['nombre']=='Lineas_Telcel'){
																echo '¡El costo se agrega automaticamente deacuerdo a la mensuaidad del plan y la duracion del mismo!<br><br>';
															}else{
																echo '
																<h4>'.$registro['campo'].' '.$aterisco.'</h4>
																<div class="input-group input-group-icon">
																<input type="number" 
																name="'.$registro['campo'].'"  
																min="0" 
																maxlength="'.$registro['longitud'].'" 
																placeholder="Solo numeros con o sin decimales" 
																step="any" 
																'.$requerido.' 
																pattern="\d*" 
																value="'.$result[$registro['campo']].'"
																/>
																<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
																</div>
																';
															}

														}else if($registro['tipo']=='Date'){
															if($registro['campo']=='Fecha_Cambio'){

															}else {
																echo '
																<h4>'.$registro['campo'].' '.$aterisco.'</h4>
																<div class="input-group input-group-icon">
																<input type="date" 
																name="'.$registro['campo'].'"  
																'.$requerido.' 
																value="'.$result[$registro['campo']].'"
																/>
																<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
																</div>
																';
															}
														}
													}
												}
											}

											?>









										</div>


										<center><input type="submit" value="enviar"></center>
									</form>
								</div>

							</div>

						</div>
					</main>
				</div>
			</div>



			<?php require("Est/script.php"); ?>
			<?php require("Est/modales.php"); ?>


			<script type="text/javascript">
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

		</body>


	<?php	}
}

?>
</html>