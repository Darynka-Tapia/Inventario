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
**  el registro de la garantia del activo  **
**                                         **
*********************************************
********************************************/?>

<?php
require 'conexion.php';

if($_GET['m']=='s'){
	$tabla=$_POST['tabla'];
	$codigo=$_POST['codigo'];
	$expiracion=$_POST['expiracion'];
	$proveedor=$_POST['proveedor'];

	$consulta=$base->prepare('select * from garantia where codigo="'.$codigo.'"');
	$consulta->execute();
	$filas=$consulta->rowCount();
	if($filas>0){
		$sql=$base->prepare('update garantia set expiracion="'.$expiracion.'", proveedor="'.$proveedor.'" where codigo="'.$codigo.'"')->execute();
	}else{
		$sql=$base->prepare('insert into garantia (codigo, expiracion, proveedor) values ("'.$codigo.'", "'.$expiracion.'","'.$proveedor.'")')->execute();
	}

	echo '
		<script> window.onload = function(){
			alert("Se han realizado los cambios");
			window.location = "../inventarios-individual.php?t='.$tabla.'";
		}
		</script>
		';

}else{
	
	$activo_registrado=$_POST['activo'];
	$tabla=$_POST['tabla'];
	$asignar=$_POST['asignar'];
	$codigo=$_POST['codigo'];

	$fecha=$_POST['expiracion'];
	$proveedor=$_POST['proveedor'];

	if($fecha!='' and $proveedor!=''){
		$sql=$base->prepare('insert into garantia (codigo, expiracion, proveedor) values ("'.$codigo.'", "'.$fecha.'","'.$proveedor.'")')->execute();
	}else{

	}


	// echo $tabla.' '.$codigo.' '.$asignar;


	if($asignar=='si'){
		echo '
		<script> window.onload = function(){
			alert("Se han realizado los cambios");
			window.location = "../asignacion.php?a='.$activo_registrado.'&t='.$tabla.'";
		}
		</script>
		';
		
	}else{
		echo '
		<script> window.onload = function(){
			alert("Se han realizado los cambios");
			window.location = "../inventarios-individual.php?t='.$tabla.'";
		}
		</script>
		';
		
	}
}




?>