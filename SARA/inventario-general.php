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
**  muestran todas las categorias para     **
**  poder modificarla, eliminarla o ver    **
**  sus activos                            **
**                                         **
*********************************************
********************************************/?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<?php require("Est/head.php"); ?>
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
 						<div class="titulo-gral">
 							<h1>Inventarios</h1>
 						</div>
 						<div class="row ">
 							<div class="col-12">
 								<div class="row">
 									<div class="col-2 colorH">
 										<a href="new_inventario.php" title="Nuevo inventario">
 											<div class="fa-2x">
 												<i class="fas fa-folder-plus"></i>
 											</div>
 											<span>Nueva categoria</span>
 										</a>
 									</div>

 								</div>
 							</div>

 							<?php
 							require('SQL/conexion.php');
 							$consulta=$base->prepare('SELECT * FROM categorias GROUP BY nombre');
 							$consulta->execute();
 							while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
 								$tabla=$registro['nombre'];
 								
 									$eliminar='
 									<a href="#"  class="color" onclick="eliminar('.$registro['id_categoria'].'); Cargar();">
 									<i class="fas fa-times colorEliminar" "></i>
 									</a>';
 								

 								
 									$modificar='
 									<button type="submit" name="Datos" value="'.$registro['nombre'].'" >
	 									<i class="fas fa-edit colorH-Inverse" ></i>
	 								</button>';
 								

 								echo '
 								<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 InventarioIndv">
 								
 								<form action="Modificar-categoria.php" method="POST">
 								<div class="espacio">
 								<a href="inventarios-individual.php?t='.$registro['nombre'].'" class="color" >'.$registro['nombre'].'
 								</a>
 								<input type="text" value="'.$registro['icono'].'" hidden name="Icono">
 								'.$modificar.'
 								'.$eliminar.'

 								</div>
 								</form>
 								
 								</div>

 								';
 							}
 							?>


 						</div>
 					</div>

 				</div>
 			</main>
 		</div>
 	</div>


 	<?php require("Est/script.php"); ?>
 	<?php require("Est/modales.php"); ?>

 	<script type="text/javascript">
 		function Modificar(){
 			document.forma.submit()
 		}
 
 		function eliminar(nombre){
 			var confirmacion = confirm("Deseas eliminar tabla de forma permanente?");
 			if(confirmacion){
 				location.href = "Modificar-categoria.php?e=s&id="+nombre+"";
 			} else {
 				location.href = "inventario-general.php";
 			}

 		}
 		function Cargar(){
 			document.getElementById('carga').style.display = 'Block';
 		}
 	</script>

 	<style type="text/css">

 	.carga{
 		position: fixed;
 		z-index: 1;
 		background: #fff;
 		width: 100%;
 		height: 150%;
 		opacity: 0.7;

 	} 
 	.color{
 		color: #5d809f;
 	}
 	button{
 		background: transparent;
 		border: none;
 		color: #5d809f;
 	}

 	button:focus { outline: none; } 


 	.enlace a{
 		text-decoration: none;
 		color:black;
 	}
 	.enlace a:hover{
 		text-decoration: none;
 		color:#fff;
 	}
 	.InventarioIndv{
 		margin-top: 1%;
 		color: #fff;
 		cursor: pointer;
 	}

 	.espacio{
 		background: transparent;
 		cursor: pointer;

 		font-family: 'Brandon Grotesque';
 		font-weight: medium;
 		font-style: normal;
 		font-size: 18px;
 		line-height: 35px;
 		letter-spacing: 0px;
 		color: #5d809f;

 		display: inline-block;
 		padding:10px;
 		width: 100%;
 		border: 3px solid #5d809f;
 		border-radius: 10px;
 		transition: all .3s ease;
 		outline:none;
 		text-decoration: none;
 		margin-top: 3%;
 		background:#f2f2f2;


 	}


 	.espacio:hover{
 		background: #b2bfcc;
 		color: #5d809f;
 		font-weight:bold;
 		font-size: 20px;
 	}

 	.colorEliminar a{
 		text-decoration: none;
 		color: #000;
 	}
 	.colorEliminar:hover{
 		color: #ff0000;
 		cursor: pointer;
 		text-decoration: none;
 	}

 	.colorH-Inverse a{
 		text-decoration: none;
 		color: #5d809f;
 	}
 	.colorH-Inverse:hover{
 		color: #f7d59e;
 		cursor: pointer;
 		text-decoration: none;
 	}
 </style>

</body>
</html>