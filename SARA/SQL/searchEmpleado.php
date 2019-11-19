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
**  buscar los empleados para seleccionar  **
**  al que se le va a asignar el activo    **
**                                         **
*********************************************
********************************************/?>


<?php
include('conexion.php');
if($_POST)
{

	// searchEmpleado.php


$q=$_POST['palabra'];//se recibe la cadena que queremos buscar
$sql_res=$base->prepare("SELECT * from Generales where Codigo like '%$q%' or Generales.descripcion like '%$q%'");
$sql_res->execute();
while($row=$sql_res->fetch(PDO::FETCH_ASSOC))
{

	$tabla=$row['tabla'];
	
	$sql_res=$base->prepare("SELECT * from ".$tabla." inner join Generales on ".$tabla.".Codigo=Generales.Codigo where Generales.Codigo like '%$q%' or Generales.descripcion like '%$q%'");
	$sql_res->execute();
	while($row2=$sql_res->fetch(PDO::FETCH_ASSOC))
	{

	
$id_codigo=$row2['id_generales'];
$Codigo=$row2['Codigo'];
$nombre=$row2['Nombre'];
$precio=$row2['Costo'];
$Cantidad=$row2['Cantidad'];
if($Cantidad>0){
	

?>

<a href="Javascript: select('<?php echo $nombre; ?>', '<?php echo $precio; ?>', '<?php echo $Cantidad; ?>', '<?php echo $Codigo; ?>', '<?php echo $id_codigo; ?>');" style="text-decoration:none;" >
<?php }?>
<div class="display_box" align="left">
	<?php
	if($Cantidad==0){
		echo '<div style="margin-right:6px;" class="text-danger"><b>'. $Codigo.' '. $nombre.' $'.$precio.'  Disponibles:'.$Cantidad.' </b></div>';
	}else if($Cantidad>0 && $Cantidad<=5){
		echo '<div style="margin-right:6px;" class="text-warning"><b>'. $Codigo.' '.$nombre.' $'.$precio.'  Disponibles:'.$Cantidad.' </b></div>';
	}else if($Cantidad>=6){
		echo '<div style="margin-right:6px;" ><b>'. $Codigo.' '.$nombre.' $'.$precio.'  Disponibles:'.$Cantidad.' </b></div>';
	}
	?>

</a>

<?php
}
}

}
else
{

}


?>

