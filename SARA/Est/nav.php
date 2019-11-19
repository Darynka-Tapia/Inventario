<?php 
    ob_start();
    @session_start(); 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 01/04/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: menú que todas las **
**  paginas usan                           **
**                                         **
*********************************************
********************************************/?>

<?php
 require 'SQL/conexion.php';
// '.$_SESSION['acceso'].'
 $sql=$base->prepare('Select * from accesos where usuario="'.$_SESSION['acceso'].'"');
 $sql->execute();
 $Super_Admin='';
 while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
 	$Super_Admin=$row['Acceso'];
 }


	if(!isset($_SESSION['acceso'])){
		echo '
		<script> window.onload = function(){
			window.location = "login.php";
		}</script>';
         echo 'No hay sesion iniciada ';
       }else {
       	echo '

	

			<div class="barra-lateral col-12 col-sm-auto">
			<a href="Est/ManualUsuario/Manual_usuario.pdf" target="_blanc" style="color:#000"><i class="far fa-question-circle" style="margin-left:5%;"></i></a>		
								
		
				<div class="logo">
				<center><img src="img/LOGO3.png" alt=""></center>					
				</div>
				<nav class="menu d-flex d-sm-block justify-content-center flex-wrap ">
					
				';

			if($Super_Admin=='Admin'){
				echo '

				<a href="index.php" title="Inventario"><i class="fas fa-table"></i><span> Dashboard</span></a>
					<a href="inventario-general.php" title="Inventario"><i class="fas fa-th"></i> <span>Inventario</span></a>
					
					<a href="salidas.php" title="salidas"><i class="fas fa-tags"></i> <span>Salidas </span></a>
					<a href="cambios.php" title="Cambios"><i class="far fa-calendar-times"></i> <span>Cambios </span></a>
					
					<a href="reportes.php" title="Reportes"><i class="fas fa-book"></i> <span>Reportes</span></a>
				<a href="Registrar_usuarios.php" title="Accesos"><i class="fas fa-unlock-alt"></i> <span>Accesos</span></a>';
			}else{
				$Super_Admin='';

				echo '
					
					<a href="salidas.php" title="salidas"><i class="fas fa-tags"></i> <span>Salidas </span></a>
					

					
				';
			}

		echo '
		<a href="#" data-toggle="modal" data-target="#miModal" title="Cerrar sesion"><i class="fas fa-sign-out-alt"></i> <span>Cerrar sesion</span></a>
				</nav>
				<img src="img/help.png" alt="">
			</div>';

		}
// <a href="historial.php" title="Historial"><i class="fas fa-newspaper"></i> <span>Historial</span></a>
		ob_end_flush();
?>