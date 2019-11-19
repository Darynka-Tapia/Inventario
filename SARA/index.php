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
**  Descripcion codigo: Inicio/Dashboard   **
**                                         **
*********************************************
********************************************/?>

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
				<?php 

				require("cont-index.php");?>
			</main>
		</div>
	</div>

	
	<?php require("Est/script.php"); ?>
	<?php require("Est/modales.php"); ?>

</body>
</html>