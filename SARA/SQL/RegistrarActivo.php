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
**  registrar un nuevo activo en una       **
**  categoria de inventarios               **
**                                         **
*********************************************
********************************************/?>

<?php
error_reporting(E_ALL ^ E_NOTICE);
require('conexion.php');
$tabla=$_POST['tabla'];
$asignar=$_POST['asignar'];

	$query='SELECT * FROM categorias WHERE nombre="'.$tabla.'" ';

	$consulta=$base->prepare($query);
	$consulta->execute();
	$cont=0;
	while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
		if($registro['campo']=='Fecha_Cambio'){
		}else{
			$id_tabla=$registro['id_categoria'];
			$campo[$cont]=$registro['campo'];
			$dato[$cont]=$_POST[$registro['campo']];
			$cont++;

			if($registro['campo']=="Codigo"){
				$codigo=$_POST[$registro['campo']];
			}
		}		
	}

	$duracion=$_POST['Duracion'];
	$Fecha_Compra=$_POST['Fecha_Compra'];


	$query='INSERT INTO '.$tabla.'(';

	for ($i=0; $i <$cont ; $i++) { 

		if ($i==0) {
			$query=$query.' '.$campo[$i].' ';
		}else{
			$query=$query.', '.$campo[$i].' ';
		}

		if($campo[$i]=="Licencia"){
			$Licencia=$_POST['Licencia'];
		}


		
	}

	$query=$query.', Fecha_Cambio) VALUES (';

	for ($i=0; $i <$cont ; $i++) { 
		if ($i==0) {
			if($campo[$i]=='Licencia'){
				$query=$query.' upper("'.$dato[$i].'") ';
			}else{
				$query=$query.' "'.$dato[$i].'" ';
			}
			
		}else{
			if($campo[$i]=='Licencia'){
				$query=$query.', upper("'.$dato[$i].'") ';
			}else{
				$query=$query.', "'.$dato[$i].'" ';
			}
			
		}

		
	}


	$nuevafecha = strtotime ( '+'.$duracion.' year' , strtotime ( $Fecha_Compra ) ) ;
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
	

	$query=$query.', "'.$nuevafecha.'");';
	 // echo '<br>'.$query.'<br>';

	$consulta=$base->prepare($query);
	$consulta->execute();

	$activo='SELECT MAX(id_'.$tabla.') as id FROM '.$tabla.'';
	$consulta=$base->prepare($activo);
	$consulta->execute();
	while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
		$activo_registrado=$registro['id'];
	}

	// $rest = $tabla[0].$tabla[1].$tabla[2];
	
	// $codigo=strtoupper($rest).$activo_registrado.date('is');



		// $sql=('update '.$tabla.' SET Codigo=upper("'.$codigo.'") where id_'.$tabla.'= '.$activo_registrado.'');
		// $realizar=$base->prepare($sql)->execute();
	

		$cod='insert into codigos (Codigo, Tabla) values (upper("'.$codigo.'"), "'.$tabla.'")';
		$realizar=$base->prepare($cod)->execute();

		for ($i=0; $i <$cont ; $i++) { 
			if($campo[$i]=='Nombre'){
				$gene[0]=$dato[$i];
			}else if($campo[$i]=='Costo'){
				$gene[1]=$dato[$i];
			}else if($campo[$i]=='Cantidad'){
				$gene[2]=$dato[$i];
			}
			
		}
		$sql_general='insert into Generales (Codigo, descripcion, precio, cantidad, tabla) values ("'.$codigo.'","'.$gene[0].'", '.$gene[1].', '.$gene[2].', "'.$tabla.'")';
		$realizar=$base->prepare($sql_general)->execute();

		// echo '
		// <div style="margin-top:10%;">
		// <center>
		// <img src="../Librerias/barcode.php?text='.$codigo.'&size=20&codetype=code128" /><br>
		// '.$codigo.'
		// </center>
		// <script>window.print();</script>
		// </div>
		// ';
	


/*******************************/


if($asignar!=''){
	$asig='si';
}else{
	$asig='no';
}


// echo '
// 		<script> window.onload = function(){
// 			alert("Se han realizado los cambios");
// 			window.location = "../inventarios-individual.php?t='.$tabla.'";
// 		}
// 		</script>
// 		';

    echo '
    <script> window.onload = function(){
      window.location = "../inventarios-individual.php?t='.$tabla.'";
    }</script>';


	// echo '<center><a href="../inventarios-individual.php?t='.$tabla.'" class="oculto-impresion">Terminar</a></center>';	



// if($tabla=='Software' || $tabla=='Plan_Telcel' || $tabla=='Lineas_Telcel'){
// 	if($asignar!=''){
// 		echo '
// 		<script> window.onload = function(){
// 			alert("Se han realizado los cambios");
// 			window.location = "../asignacion.php?a='.$activo_registrado.'&t='.$tabla.'";
// 			}
// 		</script>
// 			';

// 	}else{
// 		echo '
// 		<script> window.onload = function(){
// 			alert("Se han realizado los cambios");
// 			window.location = "../inventarios-individual.php?t='.$tabla.'";
// 			}
// 		</script>
// 			';

// 	}
// }else{
// 	if($asignar!=''){
// 		echo '<center><a href="../asignacion.php?a='.$activo_registrado.'&t='.$tabla.'" class="oculto-impresion">Terminar</a></center>';

// 	}else{
// 		echo '<center><a href="../Garantia.php?t='.$tabla.'&a='.$activo_registrado.'" class="oculto-impresion">Terminar</a></center>';	
// 	}
// }





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



