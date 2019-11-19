<?php 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 15/04/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Interfaz donde se  **
**  muestran los campos y registros de     **
**  cada categoria de inventarios          **
**                                         **
*********************************************
********************************************/?>


<!DOCTYPE html>
<html lang="es">
<head>
	<?php require("Est/head.php"); 
	require ('SQL/conexion.php');
	$tabla=$_GET['t'];
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body onLoad="document.forms['codbar'].cbarras2.focus();">
	<div class="container-fluid">
		<div class="row">
			<?php require("Est/nav.php"); ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-12">
						<div class="titulo-gral">
							<h1>Inventario <?php echo $tabla; ?></h1>
						</div>
						<div class="row acc">
							<div class="col-1 "><center>
								<div class="fa-2x colorH">
									<span class="fa-layers fa-fw">
										<a href="inventario-registro.php?t=<?php echo $tabla; ?>"><i class="far fa-plus-square"></i></a>				  
									</span>	
								</div></center>
							</div>
							
							
							<div class="col-8"></div>
						</div>

					  
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" name="table" width="100%" cellspacing="0">
									<thead>
										<tr>
											<?php 	
											$campos='SELECT * FROM categorias WHERE Nombre="'.$tabla.'"';
											$resultado=$base->prepare($campos);
											$resultado->execute();
											$cont=0;
												echo '<th>Codigo</th>';
											while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
												if($registro['campo']=='Codigo'){				
												}else{
													echo '<th>'.$registro['campo'].'</th>';
													$campo[$cont]=$registro['campo'];
													$cont++;
													$id_tabla=$registro['id_categoria'];
												}
											}

											?>
											<th>Operación</th>
											
										</tr>
									</thead>
									<tbody >
										<?php
										
											$datos='SELECT * from '.$tabla.'';
										
										
										$resultado=$base->prepare($datos);
										$resultado->execute();
										while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
											if($registro['Cantidad']>=1 && $registro['Cantidad']<=5){
												$color='class="alert alert-warning"';
											}else if($registro['Cantidad']==0){
												$color='class="alert alert-danger"';
											}else if($registro['Cantidad']>5){
												$color='';
											}
											echo '<tr '.$color.'>';
										
												echo '<td><center>
												<img src="Librerias/barcode.php?text='.$registro['Codigo'].'&size=40&codetype=code39"  />
												<br>
												'.$registro['Codigo'].'
												</center>
												</td>';
												
											for ($i=0; $i <$cont; $i++) { 
												if($campo[$i]=='Costo'){
													echo '<td nowrap >$'.$registro[$campo[$i]].' </td>';
												}else if($campo[$i]=='Duracion'){
													if($registro[$campo[$i]]==''){
														echo '<td nowrap ></td>';
													}else{
														echo '<td nowrap >'.$registro[$campo[$i]].' años</td>';
													}
													
												}else if($campo[$i]=='Cantidad'){

															echo '
															<td nowrap><center> 
															'.$registro[$campo[$i]].'
															</center></td>';
												}else{
													echo '<td nowrap >'.$registro[$campo[$i]].' </td>';
												}

											}
											echo '
											<td  nowrap><center>

											<a href="inventario-individual-modificar.php?e=m&c='.$registro['id_'.$tabla].'&t='.$id_tabla.'" title="Modificar">
											<i class="fas fa-pencil-alt"></i>
											</a>&nbsp;&nbsp;

											<a href="#" onclick="eliminar('.$registro['id_'.$tabla].', '.$id_tabla.')">
											<i class="fas fa-times colorEliminar" title="Eliminar"></i>
											</a>
											&nbsp;&nbsp;

											';
												// echo '
												
												// &nbsp;&nbsp;
												// <a href="SQL/ReimprimirCodigo.php?c='.$registro['Codigo'].'&t='.$id_tabla.'"><i class="fas fa-barcode" title="Reimprimir codigo de barras"></i></a>  
												// ';
					
											echo '</tr>';
										}
										?>
									</tbody>
								</table>
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


							function getKey(e){
								if(!e)
									e=window.event;
								if(e.keyCode)
									code=e.keyCode;
								else
									code=e.which;
								if(code===13){
									document.forms['codbar'].cbarras2.value=document.forms['codbar'].cbarras.value;
									document.forms['codbar'].cbarras.value='';
									document.forms['codbar'].cbarras.focus();
								}

							}

						</script>

						<style>
						.selected{
							background-color: #c4d19c;
							}/*f7d59e*/

							.acc{
								margin-bottom: 2%;
							}
						</style>
					</div>

				</div>
			</main>
		</div>
	</div>



	<?php require("Est/script.php"); ?>
	<?php require("Est/modales.php"); ?>

</body>
</html>