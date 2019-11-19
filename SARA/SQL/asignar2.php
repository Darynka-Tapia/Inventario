<?php 
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
**  Descripcion codigo: Logica para        **
**  la asignacion de los activos a los     **
**  colaboradores                          **
**                                         **
*********************************************
********************************************/?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
require('conexion.php');

date_default_timezone_set('America/Chihuahua');
$fecha = date("Y/m/d");
// echo $fecha.'---';


$cont= $_POST['contador'];
$id_colaborador=$_POST['id_colaborador'];
$hay=0;




for ($i=0; $i <=$cont ; $i++) {

	if($_POST['repetir'.$i]!=''){
		$comprueba_tabla=$base->prepare('Select * from exepciones where codigo="'.$_POST['dato'.$i].'"');
		$comprueba_tabla->execute();
		$hay_registro=$comprueba_tabla->rowCount();
		// echo '<br>Hay '.$hay_registro.' registros de el codigo marcado';

		if($hay_registro>0){
			// echo '<br>Ya existe, no se registro, no hago nada';
		}else{
			$sql=$base->prepare('insert into exepciones (Codigo) values("'.$_POST['dato'.$i].'")')->execute();
		}		
	}
}


	// echo 'Entre aqui';

	/**************************************************************************************************************************************************
	***************************************************************************************************************************************************
	**********************************                                                                            *************************************
	**********************************     A partir de aqui se realiza la asignación normal sin exepciones!!!     *************************************
	**********************************                                                                            *************************************
	***************************************************************************************************************************************************
	**************************************************************************************************************************************************/

	
	$sql='select * from colaboradores where id_colaborador='.$id_colaborador.'';
	$result=$base->prepare($sql);
	$result->execute();
	$dispo=True;
	$celular=False;
	$m=0;
	$redireccionar="";
	$x=0;
	while($row=$result->fetch(PDO::FETCH_ASSOC)){
		$Nom_Colaborador=$row['nombre'];
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<a href="guardar_resguardos.php?nom=<?php echo $Nom_Colaborador; ?>&id=<?php echo $id_colaborador; ?>" class='' style="margin-left: 5%;"><i class="fas fa-arrow-left"></i></a></center>
</body>
</html>


<?php

	$iguales=False;
	$registros_colaborador=0;
	$registros_repetidos=0;
	$Datos_Falsos=0;
	$realizar_registro='No';
	$Cel=1;
	$Lin=1;
	$Otr=1;

	for ($i=0; $i <=$cont ; $i++) { 

		if($_POST['dato'.$i]!=''){
			$sql='select * from codigos where codigo="'.$_POST['dato'.$i].'"';
			$result=$base->prepare($sql);
			$result->execute();
			$cuenta = $result->rowCount();
			if($cuenta==0){		
				$dispo=False;
				$Datos_Falsos++;
				
			}else{
				while($row=$result->fetch(PDO::FETCH_ASSOC)){

				 	$query2='SELECT c.Tabla, ca.codigo as colaborador, c.Codigo as Codigos FROM colaboradores_activo ca RIGHT JOIN codigos c ON ca.codigo= c.Codigo where c.Codigo="'.$row['Codigo'].'"';
				 	// echo $query2;
					
				 	$result=$base->prepare($query2);
				 	$result->execute();
				 	while ($row2 = $result->fetch(PDO::FETCH_ASSOC)) {
				 		if($row2['colaborador']==''){
				 			 for ($z=0; $z <=$cont ; $z++) { 
				 				if($i==$z){
				 				}else{
				 					if($_POST['dato'.$i]==$_POST['dato'.$z]){
				 						// echo $_POST['dato'.$i].'=='.$_POST['dato'.$z];
										
					 					$dispo=False;
					 					// $iguales=True;
					 					$Datos_Falsos++;
					 					$codigos[$m]=$_POST['dato'.$i];
					 					// echo '----'.$codigos[$m].'----<br>';
						 			}else{
						 				$codigos[$m]=$_POST['dato'.$i];
										 // echo '----'.$codigos[$m].'----<br>';
						 			 }
				 				 }
				 			 }
						$m++;	
							if($row2['Tabla']=='Lineas_Telcel'){
								$celular=True;
							}else if ($row2['Tabla']=='Celulares') {
								$celular=True;
							}else if($row2['Tabla']=='Computadoras'){
								echo '
								<form action="guardar_resguardos.php?nom='.$Nom_Colaborador.'.&id='.$id_colaborador.'&DNC=yes&cod='.$row2['Codigos'].'" method="POST">
								<br>Registra la DeviceNamingConvention del codigo '.$row2['Codigos'].': <br><input type="text" name="DNC"><br>
								<input type="submit">
								</form>
								';
							}
				 		}else{
				 			$dispo=False;
				 			$Datos_Falsos++;
				 		}

				 		$sql_exepciones=$base->prepare('Select * from exepciones where Codigo="'.$row['Codigo'].'"');
				 		$sql_exepciones->execute();
				 		$hay_exepciones=$sql_exepciones->rowCount();
				 		if($hay_exepciones){
				 			$dispo=true;
				 			$Datos_Falsos=0;
				 		}
				 	}
				}	
			}
		}
	}

	$phone="no";
	$line="no";
	$otro="no";
	if($Datos_Falsos==0){

		for ($i=0; $i <=$cont ; $i++) {
			$tabla=$base->prepare('select * from codigos where codigo="'.$_POST['dato'.$i].'"');
			$tabla->execute();
			
			while ($row=$tabla->fetch(PDO::FETCH_ASSOC)) {
				$codigos[$i]=$_POST['dato'.$i];
				$Tabla[$i]=$row['Tabla'];
				
				$numero=$i;
			}
		}

		

		// echo "Funciona.... Realizo registro";
		$consulta='SELECT * FROM colaboradores_activo where id_colaborador='.$id_colaborador.'';
		$sql=$base->prepare($consulta);
		$sql->execute();
		while($row=$sql->fetch(PDO::FETCH_ASSOC)){
			$registros_colaborador++;
			
		}
		
		if($registros_colaborador>0){
			// echo '<br>comprobar en datos ya registrados con los datos del front';
			$Buscar_codigo_tabla=$base->prepare('select * from colaboradores_activo ca inner join codigos co on ca.codigo=co.Codigo where  ca.id_colaborador='.$id_colaborador.'');
			// echo 'select * from colaboradores_activo ca inner join codigos co on ca.codigo=co.Codigo where  ca.id_colaborador='.$id_colaborador.' <br>';
			$Buscar_codigo_tabla->execute();
			while ($row=$Buscar_codigo_tabla->fetch(PDO::FETCH_ASSOC)) {
	 			if($row['Tabla']=='Celulares'){
	 				$phone='si';
	 				$vieux_phone=$row['codigo'];
	 			}else if($row['Tabla']=='Lineas_Telcel'){
	 				$line='si';
	 				$vieux_line=$row['codigo'];
	 			}else{
	 				$otro="si";
	 			}
			}

			if($phone=="si"){
				
				for ($i=0; $i <=$cont; $i++) { 
					
					$tabla_front=$base->prepare('Select * from codigos where codigo="'.$codigos[$i].'"');
					$tabla_front->execute();
					
					while ($row2=$tabla_front->fetch(PDO::FETCH_ASSOC)) {
						if($row2['Tabla']=='Celulares'){
							// echo "Actualizo el registro ya existente de celular";
							if($Cel==1){
								// echo '<br>'.$Cel.'<br>';
								if($codigos[$i]==''){
								}else{
									
									$regist='UPDATE colaboradores_activo SET codigo="'.$codigos[$i].'" WHERE codigo="'.$vieux_phone.'" and id_colaborador='.$id_colaborador.'';
									$base->prepare($regist)->execute();
								// echo '<br>INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")<br>';
									$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute();
									$Cel++;
								}
							}
						}	
					}
				}

			}else{
				// echo "Hago un registro nuevo de celular";
				for ($i=0; $i <=$cont; $i++) { 
					if($Cel==1){
						if($Tabla[$i]=='Celulares'){
							if($codigos[$i]==''){
							}else{
								$registro=$base->prepare('INSERT INTO colaboradores_activo (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'")')->execute();
								$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute();
							}
						}	
					}
				}
			}




			if($line=="si"){
				
				for ($i=0; $i <=$cont; $i++) { 
					$tabla_front=$base->prepare('Select * from codigos where codigo="'.$codigos[$i].'"');
					$tabla_front->execute();
					while ($row2=$tabla_front->fetch(PDO::FETCH_ASSOC)) {
						if($row2['Tabla']=='Lineas_Telcel'){
							if($Lin==1){
								if($codigos[$i]==''){
								}else{
								
									$regist='UPDATE colaboradores_activo SET codigo="'.$codigos[$i].'" WHERE codigo="'.$vieux_line.'" and id_colaborador='.$id_colaborador.'';
									$base->prepare($regist)->execute();
									$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute();
									$Lin++;
								}
							}
						}	
					}
				}

			}else{
				// echo "Hago un registro nuevo de Linea telcel";
				for ($i=0; $i <=$cont; $i++) { 
					if($Lin==1){
						if($Tabla[$i]=='Lineas_Telcel'){
							if($codigos[$i]==''){
							}else{
							
								$registro=$base->prepare('INSERT INTO colaboradores_activo (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'")')->execute();
								$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute(); 
							}

						}	
					}
				}
			}


			if($otro=='si'){
				
				for ($i=0; $i <=$cont; $i++) {
				 //echo '<br>registro el dato que no es ni celular ni linea '.$Tabla[$i].'<br>';
					if($Otr==1){
						$Otr++;
					}else{
						if($Tabla[$i]=='Celulares' || $Tabla[$i]=='Lineas_Telcel'){
							
						}else{
							if($codigos[$i]==''){
							}else{
								$registro=$base->prepare('INSERT INTO colaboradores_activo (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'")')->execute();
								$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute(); 
							}
							
						}
						
					}
					// if($Otr==1){
						
					// 	$Otr++;
					// }else{
					// 	$Otr=1;
					// }
					
				}
			}


			
			

		}else{
			// echo '<br>'.$row['Tabla'];
			// echo 'Registro normal sin busqueda ';
			for ($i=0; $i <=$cont ; $i++) { 
				// echo "----".$i.$_POST['dato'.$i];
				if($_POST['dato'.$i]==''){

				}else{
					 $registro=$base->prepare('INSERT INTO colaboradores_activo (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$_POST['dato'.$i].'")')->execute();
					 $registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$_POST['dato'.$i].'", "'.$fecha.'")')->execute();
				}
				
			}
			
		}

	}else{
		// echo "Debo regresar, hay datos que no puedo registrar";
	}




	// $sql=$base->prepare('SELECT MAX(resguardo_general) AS id FROM num_serie');
	// $sql->execute();
	// while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
	// 	$serie=$row['id']+1;	
	// }
	// $sql=$base->prepare('UPDATE `num_serie` SET `resguardo_general`='.$serie);
	// $sql->execute();
			

	echo '
		<form action="../PDF/Resguardo_general.php" method="post" name="general" target="_blank">
		<input type="text" value="'.$id_colaborador.'" name="colaborador" hidden>
	';

	for ($i=0; $i <$m ; $i++) { 
		$redireccionar=$redireccionar.'&cod'.$i.'='.$codigos[$i].'';
		echo '<br><input type="text" value="'.$codigos[$i].'" name="dato'.$i.'" hidden>';
		
	}
	echo '<br><input type="text" value="'.$m.'" name="cont" hidden>';
	echo ' <center>
	<a href="javascript:resguardoGeneral();" class="btn btn-primary">Resguardo General</a></center> <br><br>
		</form>
	';

	echo "<script language='javascript'>
				function resguardoGeneral(){
					document.general.submit();
				}
			</script>";

	// echo $redireccionar.'<br>';
	if($dispo==False){

		if($iguales==True){
			$text='Hay codigos repetidos, elimine el repetido y vuelva a enviar!';
		}else{
			$text='Se borraron los no disponibles, vuelve a dar click en enviar';
		}
		echo '
		<script> window.onload = function(){
			alert("'.$text.'");
			window.location = "../asignacion.php?id='.$id_colaborador.'&cont='.$m.$redireccionar.'";
		}
		</script>
		';
	}else{
		// echo "<br><br> Se hace el registro<br>";

		// echo "se genera el pdf <br>";

		if($celular==True){
			$sql=$base->prepare('SELECT MAX(resguardo_celular) AS id FROM num_serie');
			$sql->execute();
			while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
				$serie=$row['id']+1;	
			}
			$sql=$base->prepare('UPDATE `num_serie` SET `resguardo_celular`='.$serie);
			$sql->execute();


			echo '<form action="../PDF/resguardo_celular.php" method="post" name="EnviarNum" target="_blank">
				
				<input type="text" value="'.$id_colaborador.'" name="colaborador" hidden>
			';

			for ($i=0; $i <$m ; $i++) { 
				echo '<br><input type="text" value="'.$codigos[$i].'" name="dato'.$i.'" hidden>';
				
			}

			echo '
				<br><input type="text" value="'.$m.'" name="cont" hidden>
				</form>
				<center>
				<a href="javascript:resguardoCelular();" class="btn btn-primary">Resguardo Celular</a></center>
			';

			echo "<script language='javascript'>
				function resguardoCelular(){
					document.EnviarNum.submit();
				}
			</script>";

			echo '';

		}
	}




?>

<style type="text/css">
	body{
		background:#f2f2f2;
		
		background-image: url("../img/fondo.png");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: right;
	}

</style>


