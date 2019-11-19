<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<a href="guardar_resguardos.php" class='' style="margin-left: 5%;"><i class="fas fa-arrow-left"></i></a></center>
</body>
</html>


<?php
error_reporting(E_ALL ^ E_NOTICE);
require('conexion.php');


$cont= $_POST['contador'];
$id_colaborador=$_POST['id_colaborador'];

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

$iguales=False;
$registros_colaborador=0;
$registros_repetidos=0;
$Datos_Falsos=0;
$realizar_registro='No';
$Cel=1;
$Lin=1;

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
				
			 	$result=$base->prepare($query2);
			 	$result->execute();
			 	while ($row2 = $result->fetch(PDO::FETCH_ASSOC)) {
			 		if($row2['colaborador']==''){
			 			 for ($z=0; $z <=$cont ; $z++) { 
			 				if($i==$z){
			 				}else{
			 					if($_POST['dato'.$i]==$_POST['dato'.$z]){
									
				 					$dispo=False;
				 					$iguales=True;
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
						}
			 		}else{
			 			$dispo=False;
			 			$Datos_Falsos++;
			 		}	
			 	}
			}	
		}
	}
}

// echo $Datos_Falsos.'<br><br>';

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
			echo $row['Tabla'].'<br>';
			if($row['Tabla']=='Celulares' || $row['Tabla']=='Lineas_Telcel'){
				for ($i=0; $i <=$cont; $i++) { 

					if($row['Tabla']=='Celulares'){
						
						$tabla_front=$base->prepare('Select * from codigos where codigo="'.$codigos[$i].'"');
						$tabla_front->execute();
						while ($row2=$tabla_front->fetch(PDO::FETCH_ASSOC)) {
							if($row2['Tabla']=='Celulares'){
								if($Cel==1){
									echo "aquiiii";
									// $regist='UPDATE colaboradores_activo SET codigo="'.$codigos[$i].'" WHERE codigo="'.$row['codigo'].'" and id_colaborador='.$id_colaborador.'';
									// $base->prepare($regist)->execute();
									// echo '<br><br>'.$regist.'<br>
									// 	  INSERT INTO colaboradores_activo_historial (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'")<br><br>';
									echo '<br>INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'"<br>';

									// $registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute();
									$Cel++;
								}
							}
						}
					}else if($row['Tabla']!='Celulares'){
						if($Cel==1){
							if($Tabla[$i]=='Celulares'){
							// echo 'Realizo un insert del celular por que todavia no tiene uno asignado';
								$registro=$base->prepare('INSERT INTO colaboradores_activo (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'")')->execute();
								$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute();
							}
						
						}
					}

					if($row['Tabla']=='Lineas_Telcel'){
						
						$tabla_front=$base->prepare('Select * from codigos where codigo="'.$codigos[$i].'"');
						$tabla_front->execute();
						while ($row2=$tabla_front->fetch(PDO::FETCH_ASSOC)) {
							if($row2['Tabla']=='Lineas_Telcel'){
								if($Lin==1){
									$regist='UPDATE colaboradores_activo SET codigo="'.$codigos[$i].'" WHERE codigo="'.$row['codigo'].'" and id_colaborador='.$id_colaborador.'';
									$base->prepare($regist)->execute();
									// echo '<br><br>'.$regist.'<br>
									// 		  INSERT INTO colaboradores_activo_historial (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'")<br><br>';
									$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute();
									$Lin++;
									echo "Entro aqui";
								}
							}
						}
					}else if($row['Tabla']!='Lineas_Telcel'){
						if($Lin==1){
							if($Tabla[$i]=='Lineas_Telcel'){
								// echo 'Realizo un insert de la linea telcel por que todavia no tiene uno asignado';
								$registro=$base->prepare('INSERT INTO colaboradores_activo (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'")')->execute();
								$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$i].'", "'.$fecha.'")')->execute();
								echo "No debo estar aqui";
							}
						}
					}
				}
			}else{
				// echo '<br>Hay otro activo diferente a celular o linea<br>';
				for ($z=0; $z<=$numero ; $z++) {
					if($Tabla[$z]=='Celulares' || $Tabla[$z]=='Lineas_Telcel'){
					}else if($Tabla[$z]==''){
					}else{
						if($x<=$cont){
							echo '<br>Registro un '.$Tabla[$z].', con codigo:'.$codigos[$z].'<br>';
							$registro=$base->prepare('INSERT INTO colaboradores_activo (id_colaborador, codigo) VALUES ("'.$id_colaborador.'","'.$codigos[$z].'")')->execute();
							$registro=$base->prepare('INSERT INTO colaboradores_activo_historial (id_colaborador, codigo, fecha_asignacion) VALUES ("'.$id_colaborador.'","'.$codigos[$z].'", "'.$fecha.'")')->execute();

						}else{
						}
						$x++;
					}
				}
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

		// echo "<script language='javascript'>
		// var numPHP=prompt('Ingrese el resguardo del celular: ','');
		// </script> ";

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


