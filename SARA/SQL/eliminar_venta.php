<?php
require('conexion.php');
$recibo=$_GET['c'];

	// echo $recibo;


$sql=$base->prepare('select * from salidas where id_salidas='.$recibo);
$sql->execute();

while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
	$sql4=$base->prepare('select * from codigos where codigo="'.$row['codigo'].'"');
	$sql4->execute();

	while ($row4=$sql4->fetch(PDO::FETCH_ASSOC)) {
		$sql23=$base->prepare('select * from '. $row4['Tabla'].' where Codigo="'.$row['codigo'].'"');
		$sql23->execute();
		while ($row23=$sql23->fetch(PDO::FETCH_ASSOC)) {
			$cantidad=$row['cantidad']+$row23['Cantidad'];

			$sql2=$base->prepare('update '. $row4['Tabla'].' set cantidad='.$cantidad.' where Codigo="'.$row['codigo'].'"');
			$sql2->execute();
		}
	}


	



	
}

$sql3=$base->prepare('delete from salidas where id_salidas='.$recibo);
$sql3->execute();

echo '
<script> window.onload = function(){
	alert("Se ha eliminado la venta");
	window.location = "../cambios.php";
}</script>';





?> 