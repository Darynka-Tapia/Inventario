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
							<h1>Ventas</h1>
						</div>
						<div class="row acc">
							<div class="col-1 "><center>
								<div class="fa-2x colorH">
									<span class="fa-layers fa-fw">				  
									</span>	
								</div></center>
							</div>
							
							
							<div class="col-8"></div>
						</div>

					  
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" name="table" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>id_salidas</th>
											<th>Codigo</th>
											<th>Descripcion</th>
											<th>Cantidad</th>
											<th>Total</th>
											<th>Fecha_compra</th>
											<th>Operación</th>
											
										</tr>
									</thead>
									<tbody >
										<?php
											$sql=$base->prepare('select * from salidas');
											$sql->execute();

											while ($row=$sql->fetch(PDO::FETCH_ASSOC)){
												$tabla=$base->prepare('SELECT Tabla from codigos where Codigo="'.$row['codigo'].'"');
												$tabla->execute();
												while ($row3=$tabla->fetch(PDO::FETCH_ASSOC)) {
													$descripcion=$base->prepare('SELECT descripcion from Generales where Codigo="'.$row['codigo'].'" and tabla="'.$row3['Tabla'].'"');
													$descripcion->execute();
													while ($row2=$descripcion->fetch(PDO::FETCH_ASSOC)) {
														echo '<tr>';
														echo '<td>'.$row['id_salidas'].'</td>';
														echo '<td>'.$row['codigo'].'</td>';
														echo '<td>'.$row2['descripcion'].'</td>';
														echo '<td>'.$row['cantidad'].'</td>';
														echo '<td>'.$row['total'].'</td>';
														echo '<td>'.$row['fecha'].'</td>';

														echo '
														<td  nowrap><center>

 
														


														<a href="#" onclick="eliminar('.$row['id_salidas'].')"><i class="fas fa-times colorEliminar" title="Eliminar"></i></a>

														&nbsp;&nbsp;

														';					
														echo '</tr>';





													} 
												}
											}
										
										?>
									</tbody>
								</table>
							</div>

						

						<script>
						

							function eliminar(campo){
								var confirmacion = confirm("Deseas eliminar esta venta");
								if(confirmacion){
									location.href = "SQL/eliminar_venta.php?c="+campo+"";
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