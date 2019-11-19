

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
	<a href="../salidas.php" style="margin-left: 5%;"><i class="fas fa-arrow-left"></i></a> <br>
	<!-- <a href="../PDF/Venta.php" class="btn btn-info"  style="margin-left: 5%;">Ticket</a> -->

	<form action="../PDF/Venta.php" target="_blank" method="POST">
	<?php
		date_default_timezone_set('America/Mexico_City');
		$fecha = date("Y/m/d");


		$sum=0;
		$num=$_POST['contador'];
// echo $num.'<br><br>';
		for ($i=1; $i <=$num; $i++) { 
			$valor[$i][0]=$_POST['TotalNeto'.$i];
			$valor[$i][1]=$_POST['Cantidad'.$i];
			$valor[$i][2]=$_POST['id_c'.$i];
			$valor[$i][3]=$_POST['Codigo'.$i];
			$valor[$i][4]=$_POST['Desc'.$i];
	// echo 'Tot: '.$valor[$i][0].' Cant:'.$valor[$i][1].' Id:'.$valor[$i][2].'<br>';
			$sum=$sum+$valor[$i][0];
		}
// echo '<br>---'.$sum;

		include('conexion.php');
		for ($i=1; $i <=$num; $i++) { 
			$sql=$base->prepare('Select * from codigos where id_codigos='.$valor[$i][2]);
			$sql->execute();
	// echo '<br><br>';
			while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {

				$sql2=$base->prepare('Select * from '.$row['Tabla'].' where Codigo="'.$row['Codigo'].'"');
				$sql2->execute();
				while ($row2=$sql2->fetch(PDO::FETCH_ASSOC)) {
					if($valor[$i][1]!=0){
						$Cantidad=$row2['Cantidad'];
						$new_cant=$Cantidad-$valor[$i][1];
						// echo $row['Codigo'].' '.$row['Tabla'].' -- '.$new_cant.'-- <br>' ;
						$sql3=$base->prepare('update '.$row['Tabla'].' set Cantidad='.$new_cant.' where Codigo="'.$row['Codigo'].'"')->execute();
						$sql3=$base->prepare('update Generales set Cantidad='.$new_cant.' where Codigo="'.$row['Codigo'].'" and tabla="'.$row['Tabla'].'"')->execute();
						$sql4=$base->prepare('insert into salidas (Codigo, cantidad, total, fecha) values ("'.$row['Codigo'].'",'.$valor[$i][1].','.$valor[$i][0].',"'.$fecha.'")')->execute();
					}
				}
			}
		}


		for ($i=1; $i <=$num ; $i++) { 
			echo '<input type="hidden" name="Total'.$i.'" value="'.$valor[$i][0].'"/>';
			echo '<input type="hidden" name="Cantidad'.$i.'" value="'.$valor[$i][1].'"/>';
			echo '<input type="hidden" name="Codigo'.$i.'" value="'.$valor[$i][3].'"/>';
			echo '<input type="hidden" name="id_c'.$i.'" value="'.$valor[$i][2].'"/>';
			echo '<input type="hidden" name="Desc'.$i.'" value="'.$valor[$i][4].'"/>';
			echo '<br>';
		}
		echo '<input type="hidden" value="'.$num.'" name="num"><br>';

		?>

		<input type="submit" class="btn btn-info" value="Ticket" style="margin-left: 5%;">
	</form>
</html>