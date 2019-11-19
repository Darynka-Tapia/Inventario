 <div class="row">
 	<div class="columna col-lg-9">
 		<div class="titulo-gral">
 			<h1>
 				<div class="row">
 					<div class="col-10">Informacion General</div>
 					<!-- <div class="col-2" align="right"><a href="Graficas_personalizadas.php"><i class="fas fa-chart-bar"></i></a></div> -->
 				</div> 
 			</h1>
 		</div>
 		<div class="row">

 			<?php
 			date_default_timezone_set('America/Chihuahua');
 			$fecha_actual=date("Y/m/d");
 			$cont_alerta=0;
 			require('SQL/conexion.php');
 			$consulta=$base->prepare('SELECT nombre, icono FROM categorias GROUP BY nombre');
 			$consulta->execute();
 			$totalActivos=0;
 			while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){

 				$resultado=$base->prepare("select SUM(Cantidad) as Cantidad, round(SUM(costo*Cantidad), 2) as costo  from ".$registro['nombre']." " );
 				$resultado->execute();

 				while($contados=$resultado->fetch(PDO::FETCH_ASSOC)){
 					echo'
 					<div class="col-md-4 col-sm-6 cajitas">
 					<div class="cont">
 					<div class="cont-header">
 					<div class="row pad-header">
 					<div class="col-4" style="margin-top:6%;">
 					<i class="'.$registro['icono'].' fa-4x" ></i>
 					</div>
 					<div class="col-8 detalles">
 					<div class="cantidad">'.$contados['Cantidad'].'</div>
 					<div class="costo">$'.number_format($contados['costo'], 2).'</div>
 					<div class="activo">'.$registro['nombre'].'</div>
 					</div>
 					</div>
 					</div>
 					<div class="cont-footer">

 					</div>
 					</div>
 					</div>

 					';

 						// echo '--------------------------------------------'.$contados['costo'].'*'.$contados['Cantidad'];
 					$totalActivos=$totalActivos+$contados['Cantidad'];
 				}
 				

 			}

 			?>



 		</div>

 	</div>


 	<div class="columna col-lg-3">
 		<div class="alertas">
 			<!-- <div class="rojo"><span class="badge badge-danger"><?php echo $cont_alerta; ?></span></div>
 			<div class="fa-2x">
 				<a href="activos_cambiar.php" class="aler"><i class="far fa-bell"></i></a>
 			</div> -->

 		</div>

 		<div class="widget estadisticas">
 			<h3 class="titulo">Estadisticas</h3>
 			<div class="contenedor d-flex flex-wrap">
 				<div class="caja">
 					<h3><?php echo $totalActivos; ?></h3>
 					<p>Productos</p>
 				</div>
 				<div class="caja">
 					<?php 
 					$fecha2 = date("Y/m/d");
 					$dia=$base->prepare('select SUM(Cantidad) as cantidad  from salidas where fecha="'.$fecha2.'"');
 					$dia->execute();
 					while($contados=$dia->fetch(PDO::FETCH_ASSOC)){
 						echo '<h3>'.$contados['cantidad'].'</h3>';
 					}

 					?>

 					<p>Ventas del día</p>
 				</div>

 				<div class="caja">
 					<p>Más vendidos</p>
 					<?php
 					$consulta=$base->prepare('SELECT SUM(Cantidad) AS numero, codigo FROM salidas GROUP BY codigo ORDER BY numero DESC');
 					$consulta->execute();
 					echo '<table border="1" style="width:100%">
 					<tr>
 					<th style="width:5%"><center>#</center></th>
 					<th style="width:25%"><center>codigo</center></th>
 					<th style="width:70%"><center>Descripción</center></th>
 					</tr>';
 					$num_registros=0;
 					while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
 						if($num_registros<5){
 							$tabla=$base->prepare('SELECT Tabla from codigos where Codigo="'.$registro['codigo'].'"');
 							$tabla->execute();
 							while ($row=$tabla->fetch(PDO::FETCH_ASSOC)) {
 								$descripcion=$base->prepare('SELECT descripcion from Generales where Codigo="'.$registro['codigo'].'" and tabla="'.$row['Tabla'].'"');
 								$descripcion->execute();
 								while ($row2=$descripcion->fetch(PDO::FETCH_ASSOC)) {
 									echo '
 									<tr>
 									<td style="width:5%">'.$registro['numero'].'</td>
 									<td style="width:25%">'.$registro['codigo'].'</td>
 									<td style="width:70%">'.$row2['descripcion'].'</td>
 									</tr>';
 								}	
 							}

 							
 						}
 						$num_registros++;
 						
 					}

 					echo '</table>'

 					?>

 					
 				</div>

 			</div>
 		</div>
 	</div>
 </div>


 <style>
 .alertas{
 	text-align:right;

 }
 .rojo{
 	float: right;
 }
 .aler{
 	text-decoration: none;
 	color: #000;
 }
 .aler:hover{
 	color: #5d809f;
 	cursor: pointer;
 	text-decoration: none;
 }
 .costo{
 	font-family: 'Brandon Grotesque';
 	font-weight: regular;
 	font-style: normal;
 	font-size: 15px;
 	line-height: 28px;
 	color: #f4f4f4;
 }

</style>