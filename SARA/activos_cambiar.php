<?php 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 23/03/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Interfaz donde se  **
**  se visualizan los activos que ya expi- **
**  rarón y los que estan pronto a expirar **
**                                         **
*********************************************
********************************************/?>

<!DOCTYPE html>
<html lang="es">
<head>

	<?php 
	require("Est/head.php"); 
	require ('SQL/conexion.php');
	date_default_timezone_set('America/Chihuahua');
	$fecha_actual=date("Y/m/d");
	?>
	
</head>
<body onLoad="document.forms['codbar'].cbarras2.focus();">
	<div class="container-fluid">
		<div class="row">
			<?php require("Est/nav.php"); ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-12">
						<div class="titulo-gral">
							
							<h1>Activos expirados</h1>
								
						</div>

						<div>
							<?php
								$consulta=$base->prepare('SELECT * FROM categorias GROUP BY nombre');
								$consulta->execute();
								echo '<table >';
								echo '
										<tr>
											<th COLSPAN="2"></th>
											<th><center>Fecha de compra</center></th>
											<th><center>Fecha de expiración </center></th>
											<th> </th>
										</tr>';
								while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
									
									if($registro['nombre']=="Plan_Telcel"){

									}else{
										echo '
										<tr class="th">
										<th COLSPAN="6">'.$registro['nombre'].' ↓ </th>
										</tr>
										';
									 

											// echo ' - '.$registro2['campo'].' - ';
											$alerta=$base->prepare('select * from '.$registro['nombre'].' where fecha_cambio<="'.$fecha_actual.'"');
											$alerta->execute();
											
											while ($row=$alerta->fetch(PDO::FETCH_ASSOC)) {

												echo '<tr>';
												$date1 = new DateTime($row['Fecha_Cambio']);
													$date2 = new DateTime($fecha_actual);
													$diff = $date1->diff($date2);

												if($registro['nombre']=='Software'){

													echo '<td>'.$row['Licencia'].'</td><td>'.$row['Nombre'].'</td><td><center>'.$row['Fecha_Compra'].'</center></td><td>'.$row['Fecha_Cambio'].'</td>';
												}else if($registro['nombre']=='Lineas_Telcel'){

													echo '<td>'.$row['Numero_Cuenta'].'</td><td>'.$row['Numero_Celular'].'</td><td><center>'.$row['Fecha_Compra'].'</center></td><td><center>'.$row['Fecha_Cambio'].'</center></td>';
												}else if($registro['nombre']=='Tablet'){
													echo '<td>'.$row['Codigo'].'</td><td>'.$row['Hostname'].'</td><td><center>'.$row['Fecha_Compra'].'</center></td><td><center>'.$row['Fecha_Cambio'].'</center></td>';
												}else{
													
													
													echo '<td>'.$row['Codigo'].'</td><td>'.$row['Marca'].'</td><td><center>'.$row['Fecha_Compra'].'</center></td><td><center>'.$row['Fecha_Cambio'].'</center></td>';
													
																							
												}

												if($diff->days>0){
														echo '<td><center><span class="badge badge-danger"> Expiro hace: '.$diff->days.' días </span></center></td>';
													}else if($diff->days==0){
														echo '<td><center><span class="badge badge-warning">Expira hoy</span></center></td>';
													}	
												echo '
													<td><center>
														<a href="SQL/Fechas_Garantia.php?id='.$row['id_'.$registro['nombre']].'&t='.$registro['nombre'].'"><i class="fas fa-redo"></i><a>
														&nbsp;
														<a href="#" onclick="eliminar('.$row['id_'.$registro['nombre']].', '.$registro['id_categoria'].')">
			 											<i class="fas fa-times colorEliminar" title="Eliminar"></i>
			 											</a>
													</center></td>
												</tr>';
											}



											$alerta=$base->prepare('select * from '.$registro['nombre'].' where fecha_cambio>"'.$fecha_actual.'" && fecha_cambio<="2019/04/20"');
											$alerta->execute();
											while ($row=$alerta->fetch(PDO::FETCH_ASSOC)) {
												echo '<tr>';

												$date1 = new DateTime($row['Fecha_Cambio']);
												$date2 = new DateTime($fecha_actual);
												$diff = $date1->diff($date2);

												if($registro['nombre']=='Software'){

													echo '<td>'.$row['Licencia'].'</td><td>'.$row['Nombre'].'</td><td><center>'.$row['Fecha_Compra'].'</center></td><td><center>'.$row['Fecha_Cambio'].'</center></td>';
												}else if($registro['nombre']=='Lineas_Telcel'){

													echo '<td>'.$row['Numero_Cuenta'].'</td><td>'.$row['Numero_Celular'].'</td><td><center>'.$row['Fecha_Compra'].'</center></td><td><center>'.$row['Fecha_Cambio'].'</center></td>';
												}else if($registro['nombre']=='Tablet'){
													echo '<td>'.$row['Codigo'].'</td><td>'.$row['Hostname'].'</td><td><center>'.$row['Fecha_Compra'].'</center></td><td><center>'.$row['Fecha_Cambio'].'</center></td>';
												}else{
													echo '<td>'.$row['Codigo'].'</td><td>'.$row['Marca'].'</td><td><center>'.$row['Fecha_Compra'].'</center></td><td><center>'.$row['Fecha_Cambio'].'</center></td>';
													
																								
												}

												if($diff->days>0){
														echo '<td><center><span class="badge badge-success"> Expira en '.$diff->days.' días</span></center></td>';
													}

												echo '
													<td><center><a href="SQL/Fechas_Garantia.php?id='.$row['id_'.$registro['nombre']].'&t='.$registro['nombre'].'"><i class="fas fa-redo"></i></a>
														&nbsp;
													<i class="fas fa-times"></i></center></td>
												</tr>';
											}
										
										
										
										
									}
								}
							?>
						</div>

 							<style>
 							.selected{
 								background-color: #c4d19c;
 								}/*f7d59e*/

 								.acc{
 									margin-bottom: 2%;
 								}

 								.sinBorder{
 									border: 0;
 									background-color: #f2f2f2;
 									cursor: default;
 								}

 								.sinBorder:focus{
 									outline:0px;
 								}

 								#detallesEmpleado{
 									cursor: default;
 									margin-bottom: 2%;
 								}


 								input[type="submit"]{
 									background: transparent;
 									cursor: pointer;

 									font-family: 'Brandon Grotesque';
 									font-weight: medium;
 									font-style: normal;
 									font-size: 18px;
 									line-height: 35px;
 									letter-spacing: 0px;
 									color: #5d809f;/*Azul*/;

 									display: inline-block;
 									padding:10px;
 									width: 200px;
 									border: 3px solid #5d809f;/*Azul*/;
 									border-radius: 10px;
 									transition: all .3s ease;
 									outline:none;
 									text-decoration: none;
 									margin-bottom: 2%;
 								}

 								input[type="submit"]:hover{
 									background: #5d809f;/*Azul*/;
 									color: #f2f2f2;

 								}

 								input[type=checkbox] {
								  transform: scale(1.5);
								}

								.th{
									background: #5d809f;
									color: #fff;
								}
								td{
									background: #f4f4f4;
								}
								th, td{
									border-bottom: double #000;
									width: 18%; /*Aquí va el ancho de la Celda*/
									
								}



 							</style>
 						</div>

 					</div>
 				</main>
 			</div>
 		</div>





	<script>
		function eliminar(campo, tabla){
 								var confirmacion = confirm("Deseas eliminar el campo "+campo+" de la tabla "+tabla+"de forma permanente?");
 								if(confirmacion){
 									location.href = "inventario-individual-modificar.php?e=s&c="+campo+"&t="+tabla+"";
 								} else {
 									alert("Has pulsado cancelar");
 								}

 							}
	</script>

 		<?php require("Est/script.php"); ?>
 		<?php require("Est/modales.php"); ?>
 		<!-- <script type="text/javascript" src="js/index_Software.js"></script>	 -->

 	</body>
 	</html>