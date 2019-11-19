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
**  Descripcion codigo: Logica para        **
**  reimprimir el BarCode del activo       **
**                                         **
*********************************************
********************************************/?>


<?php
require('conexion.php');
$codigo=$_GET['c'];
$tabla=$_GET['t'];

echo'
<div style="margin-top:8%;">
<center>
<img src="../Librerias/barcode.php?text='.$codigo.'&size=30&codetype=code39" /><br>
'.$codigo.'

</center>
<script>window.print();</script>
</div>
';

$sql='select * from categorias where id_categoria='.$tabla.'';
$respuesta=$base->prepare($sql);
$respuesta->execute();

while($row=$respuesta->fetch(PDO::FETCH_ASSOC)){
	$tabla=$row['nombre'];
}

echo '<center><a href="../inventarios-individual.php?t='.$tabla.'" class="oculto-impresion">Terminar</a></center>';


?>

<style>

@media print{
	.oculto-impresion, .oculto-impresion *{
		display: none !important;
	}
	.center{
		align-items:center;
	}
}

</style>