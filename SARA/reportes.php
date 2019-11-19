<?php 
/********************************************
*********************************************
**										   **
**	Autor: Darynka Tapia				   **
**	Proyecto: Inventarios Twin Dolphin     **
**	Lugar: Los Cabos, BCS.				   **
**	Fecha ultima modificacion: 10/04/2019  **
**										   **
** * * * * * * * * * * * * * * * * * * * * **
**										   **
**	Descripcion codigo: Interfaz para      **
**	la creacion de reportes 			   **
**										   **
*********************************************
********************************************/
?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<?php require("Est/head.php"); ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php require("Est/nav.php"); ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-12">
						<div class="titulo-gral">
							<h1>Creación de reportes</h1>
						</div>
						
						<h3>Ventas </h3>
						<div class="row ">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 InventarioIndv">
								<a href="PDF/dia.php" target="_blank"><div class="espacio"><center>Día</center></div></a>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 InventarioIndv">
								<a href="PDF/mes.php" target="_blank"><div class="espacio"><center>Mes</center></div></a>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 InventarioIndv">
								<div class="espacio" onclick="ocultar_mostrar()" ><center>Año</center></div>
								<form action="PDF/ans.php" target="_blank" method="POST" id="formulario" style="display:'block'">
									<select name="ans">
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										<option value="2028">2028</option>
										<option value="2029">2029</option>
										<option value="2030">2030</option>
									</select>
									<input type="submit" value="enviar">
								</form>
							</div>
						</div>
						<br>
						<h3>Personalizado </h3>
						<div class="row ">
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 InventarioIndv">
								<form action="PDF/personalizado.php" target="_blank" method="POST" class="formulario2">
									<input class="espacio" type="date" required name="inicio">
									<input class="espacio" type="date" required name="fin"><br>
									<center><input type="submit" value="enviar"></center>
								</form>
							</div>
						</div>


						
					</div>
				</div>
			</main>
		</div>
	</div>

	
	<?php require("Est/script.php"); ?>
	<?php require("Est/modales.php"); ?>

<script>
	document.getElementById('formulario').style.display = 'none';
	var pos=1;
	function ocultar_mostrar(){
		if(pos==1){
			document.getElementById('formulario').style.display = 'block';
			pos=0;
		}else{
			document.getElementById('formulario').style.display = 'none';
			pos=1;
		}
	}	

</script>

	<style type="text/css">
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
			background: #5d809f;
			color: #f2f2f2;
		}



		h3{
			margin-top: 2%;
		}

		.formulario2{
			padding: 3%;
			border: 3px solid #5d809f;
			border-radius: 10px;
		}
	</style>


</body>
</html>