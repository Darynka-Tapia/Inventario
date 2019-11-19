<?php 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 27/03/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Logica para        **
**  agregar un nuevo campo a una categoria **
**  de los inventarios                     **
**                                         **
*********************************************
********************************************/?>

<?php

ob_start();

	//Obtengo los datos del formulario de Modificar-categoria.php
	$categoria=$_POST['nombre_categoria'];
	$icono=$_POST['icono'];
	$campo=$_POST['nombre_campo'];
	$tipo=$_POST['tipo'];
	$longitud=$_POST['longitud'];
	$nulo=$_POST['null'];

	if($campo=='Codigo'){
		echo '
		<script> window.onload = function(){
			alert("Campo existente");
			window.location = "../Add_campo.php?n='.$categoria.'&i='.$icono.'";
		}</script>';

	}else{

		require('conexion.php');
		//query para verificar que el campo no exista antes de registrarlo 
		$inventario=$base->prepare('SELECT * FROM categorias WHERE nombre="'.$categoria.'" and campo="'.$campo.'"');
		$inventario->execute();
		$num_campos = $inventario->rowCount();
		
		if($num_campos>0){ //si existe el ya un campo, mando un v¿mensaje advirtiendolo
			echo '
				<script> window.onload = function(){
					alert("Campo existente");
				    window.location = "../Add_campo.php?n='.$categoria.'&i='.$icono.'";
				}</script>';

		}else if ($num_campos==0){//si no existe un dato con el mismo nombre, se hace el registro

			if($_POST['nuevo']){ //si el boton al que le doy click es agregar campo
				//mando los datos a la funcion
				registrar($categoria, $icono, $campo, $tipo, $longitud, $nulo);
				echo '
					<script> window.onload = function(){
					    alert("Campo registrado");
					    window.location = "../Add_campo.php?n='.$categoria.'&i='.$icono.'";
					}</script>';
					
			}else if($_POST['terminar']){//si el que selecciono es terminar, me regreso a la pagina principal de modificacion

	   				 header('Location: ../Modificar-categoria.php?n='.$categoria.'&i='.$icono.'');	
			}
		}

	}

	function registrar($cat, $ico, $cam, $tip, $lon, $nul){
		require('conexion.php');

		//realizo y ejecuto los Querys para agregar un nuevo campo 
		
		$sql1=$base->prepare('Delete from categorias where campo="costo" and nombre="'.$cat.'"');
		$sql1->execute();

		$sql2=$base->prepare('INSERT INTO categorias (nombre, icono, campo, tipo, longitud, nulo) 
								VALUES ("'.$cat.'", "'.$ico.'","'.$cam.'","'.$tip.'","'.$lon.'","'.$nul.'")');
		$sql2->execute();

		$sql3=$base->prepare('INSERT INTO categorias (nombre, icono, campo, tipo, longitud, nulo) 
								VALUES ("'.$cat.'", "'.$ico.'","Costo","Float","11","Not Null")');
		$sql3->execute();

		if($tip=="Date"){
			$sql4=$base->prepare('ALTER TABLE '.$cat.' ADD '.$cam.' '.$tip.' '.$nul.' AFTER Costo;');
			$sql4->execute();
		}else{
			$sql4=$base->prepare('ALTER TABLE '.$cat.' ADD '.$cam.' '.$tip.'('.$lon.') '.$nul.';');
			$sql4->execute();
		}
		
			
	}
ob_end_flush();

?>

