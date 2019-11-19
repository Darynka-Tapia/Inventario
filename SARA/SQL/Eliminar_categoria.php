<?php
	require('conexion.php');
	$recibo=$_GET['r'];
	
	// echo $recibo;
	$d1='SELECT * FROM categorias WHERE id_categoria='.$recibo.';';
	
	$d3='Delete from categorias where id_categoria='.$recibo.';';


	$sql1=$base->prepare($d1);
	$sql1->execute();
	while($registro=$sql1->fetch(PDO::FETCH_ASSOC)){

		$d2='ALTER TABLE '.$registro['nombre'].' DROP '.$registro['campo'].';';
		$sql2=$base->prepare($d2);
		$sql2->execute();
		$nombre=$registro['nombre'];
		$icono=$registro['icono'];
	}

	$sql3=$base->prepare($d3);
	$sql3->execute();

			echo '
						<script> window.onload = function(){
							alert("Se ha eliminado el campo");
						    window.location = "../Modificar-categoria.php?n='.$nombre.'&i='.$icono.'";
						}</script>';

		
	 
	
?>