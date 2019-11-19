<?php 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 23/03/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Logica para        **
**  hacer algun cambio en los activos que  **
**  ya expiraron o estan por expirar       **
**                                         **
*********************************************
********************************************/?>


<?php
require('conexion.php');
$id=$_GET['id'];
$Tabla=$_GET['t'];
$sql=$base->prepare('Select * from '.$Tabla.' where id_'.$Tabla.'='.$id.' ');
$sql->execute();
while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
	if($Tabla=='Software'){
		$codigo=$row['Licencia'];
	}else if($Tabla=='Lineas_Telcel'){
		$codigo=$row['Numero_Celular'];
	}else{
		$codigo=$row['Codigo'];
	}
	

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="stylesheet" href="../css/formularios.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<div style="display:none" id="carga" class="carga">
		<center><img src="img/Carga.gif" alt="" ></center>
	</div>
	<div class="container-fluid">
		<div class="row">

			<main class="main col">
				<a href="../activos_cambiar.php" class='' style="margin-left: 5%;"><i class="fas fa-arrow-left"></i></a>
				
				<div class="row">
					<div class="columna col-lg-12">
						<div class="container">
							<form action="Fechas_Garantia.php?id=<?php echo $id;?>&t=<?php echo $Tabla;?>&y=y" method="POST" onsubmit="Cargar()" enctype="multipart/form-data">
								<div class="row">
									<h2>Actualizar fechas y factura del activo "<?php echo $codigo; ?>" </h2>
									<div class="input-group input-group-icon">
										<input type="text" style="display:none;"  />
									</div>
									<h4>Fecha de compra *</h4>
									<div class="input-group input-group-icon">
										<input type="date" name="Fecha_Compra" step="any"  />
										<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
									</div>
									<h4>Duracion (en años) *</h4>

									<div class="input-group input-group-icon">
										<input type="text" name="Duracion"  placeholder="Solo numeros enteros" pattern="\d*" min="0" maxlength="3" />
										<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
									</div>

									<h4>Factura * </h4>
									<div class="input-group input-group-icon">
										<input type="file" name="Factura" id="fname" onchange="comprueba_extension()"/>
										<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
									</div>
								</div>
								<center><input type="submit" value="Registrar" id="btnFG"></center>
							</form>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>


	<?php
	error_reporting(E_ALL ^ E_NOTICE);
	if ($_GET['y']=='y') {
		$duracion=$_POST['Duracion'];
		$Fecha_Compra=$_POST['Fecha_Compra'];
		$nuevafecha = strtotime ( '+'.$duracion.' year' , strtotime ( $Fecha_Compra ) ) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );


		$carpeta = $codigo;
		$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/TwinDolphin/TwinDolphin/Facturas/';

		foreach(glob('../Facturas/'.$carpeta . "/*") as $archivos_carpeta){             
			if (is_dir($archivos_carpeta)){
				rmDir_rf($archivos_carpeta);
			} else {
				unlink($archivos_carpeta);
			}
		}

		if (!file_exists($carpeta_destino.$carpeta)) {
			mkdir($carpeta_destino.$carpeta, 0777, true);
		}






		$nombre_imagen=$_FILES['Factura']['name'];
		$tipo_imagen=$_FILES['Factura']['type'];
		$tamano_imagen=$_FILES['Factura']['size'];
		move_uploaded_file($_FILES['Factura']['tmp_name'],$carpeta_destino.$carpeta.'/'.$nombre_imagen);















		
		if($Tabla=='Lineas_Telcel'){
			$sql='UPDATE `lineas_telcel` SET `Fecha_Compra`="'.$_POST['Fecha_Compra'].'", `Duracion`='.$_POST['Duracion'].', `Fecha_Cambio`="'.$nuevafecha.'", Factura="'.$carpeta.'/'.$nombre_imagen.'" WHERE id_Lineas_Telcel="'.$codigo.'";';
		}else if($Tabla=='Software'){
			$sql='UPDATE `Software` SET `Fecha_Compra`="'.$_POST['Fecha_Compra'].'", `Duracion`='.$_POST['Duracion'].', `Fecha_Cambio`="'.$nuevafecha.'", Factura="'.$carpeta.'/'.$nombre_imagen.'" WHERE Licencia="'.$codigo.'";';
		}else{
			$sql='UPDATE `'.$Tabla.'` SET `Fecha_Compra`="'.$_POST['Fecha_Compra'].'", `Duracion`='.$_POST['Duracion'].', `Fecha_Cambio`="'.$nuevafecha.'", Factura="'.$carpeta.'/'.$nombre_imagen.'" WHERE Codigo="'.$codigo.'";';
		}

		$base->prepare($sql)->execute();

		header("Location: ../activos_cambiar.php");
	}
	?>



</body>
</html>

<script type="text/javascript">
	function Cargar(){
		document.getElementById('carga').style.display = 'Block';
	}

	function comprueba_extension() { 
		var cadena= document.getElementById('fname').value;

		extencion=cadena.substr(-3); 

		if(extencion=="pdf"){

		}else{
			alert('No se puede agregar un archivo que no sea PDF ');
			document.getElementById('fname').value='';
		}
	}
</script>



<style type="text/css">

/* --- --- MEDIAQUERIS --- ---*/


@media screen and (min-width: 1350px){
	.main{
		margin-left: 0%;
		width: 60%;
		margin-right: 2%;
	}
}

@media screen and (max-width: 1350px){
	.barra-lateral{
		min-width: auto;
	}

	.barra-lateral .logo{
		display: none;
	}
	
	.barra-lateral .menu a span {
		display: none;
	}

	.barra-lateral .menu a i {
		margin:0px;
	}
	.main{
		margin-left: 7%;
		width: 60%;
		margin-right: 2%;

	}
}

@media screen and (max-width: 816px){
	.main{
		margin-left: 10%;
		width: 60%;
		margin-right: 2%;
	}
}

@media screen and (max-width: 575px){
	.barra-lateral{
		min-height: auto;
		z-index: 10;
	}
	.barra-lateral .menu a {
		display: inline-block;
		border-bottom: none;
	}
	.main .widget form button{
		width: 100%;
	}
	.main{
		margin-top: 10%;
		margin-left: 3%;
		width: 60%;
		margin-right: 2%;
	}
}

</style>