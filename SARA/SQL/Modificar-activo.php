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
**  Modificar un activo de una categoria   **
**                                         **
*********************************************
********************************************/?>


<?php
require('conexion.php');
$tabla=$_POST['tabla'];
$cam=$_POST['campo'];


// if($tabla=='Plan_Telcel' || $tabla=='Lineas_Telcel'){
// 	if ($tabla=='Plan_Telcel' ) {

// 		$campos=$base->prepare('Select * from categorias where nombre="Plan_Telcel"');
// 		$campos->execute();
// 		$num_campos=0;
// 		while ($row_campos=$campos->fetch(PDO::FETCH_ASSOC)) {
// 			$caja[$num_campos]=$row_campos['campo']; 
// 			$num_campos++;
// 		}

// 		$sql='UPDATE `plan_telcel` SET 
// 						';
// 			for ($i=0; $i <$num_campos ; $i++) { 
// 				if($i==0){
// 					$sql=$sql.' `'.$caja[$i].'`="'.$_POST[$caja[$i]].'"';
// 				}else{
// 					$sql=$sql.', `'.$caja[$i].'`="'.$_POST[$caja[$i]].'"';
// 				}
				
// 			}
// 			$sql=$sql.' WHERE id_Plan_Telcel='.$cam.' ;';


// 		// $sql=' UPDATE `plan_telcel` SET 
// 		// 				`Nombre`="'.$_POST['Nombre'].'", 
// 		// 				`Tipo_consumo`="'.$_POST['Tipo_consumo'].'", 
// 		// 				`Costo`="'.$_POST['Costo'].'" ,
// 		// 				`MINUTOS_INCLUIDOS_MEXICO,_EU_Y_CANADA`="'.$_POST['MINUTOS_INCLUIDOS_MEXICO,_EU_Y_CANADA'].'",
// 		// 				`SMS_INCLUIDOS_MEXICO,_EU_Y_CANADA`="'.$_POST['SMS_INCLUIDOS_MEXICO,_EU_Y_CANADA'].'",
// 		// 				`GB_INCLUIDOS_MEXICO,_EU_Y_CANADA`="'.$_POST['GB_INCLUIDOS_MEXICO,_EU_Y_CANADA'].'",
// 		// 				`SERVICIO_WHATSAPP_MEXICO,_EU_Y_CANADA`="'.$_POST['SERVICIO_WHATSAPP_MEXICO,_EU_Y_CANADA'].'",
// 		// 				`REDES_SOCIALES_(FACEBOOK_Y_TWITTER)_ILIMITADAS_EN_MÉXICO`="'.$_POST['REDES_SOCIALES_(FACEBOOK_Y_TWITTER)_ILIMITADAS_EN_MÉXICO'].'",
// 		// 				`Límite_de_crédito_con_IVA`="'.$_POST['Límite_de_crédito_con_IVA'].'"
// 		// 				 WHERE id_Plan_Telcel='.$cam.' ;';
						 
// 	}else{
// 		$costo='select * from Plan_Telcel where id_Plan_Telcel='.$_POST['Plan_Telcel'].'';
// 		$dato=$base->prepare($costo);
// 		$dato->execute();
// 		while($row=$dato->fetch(PDO::FETCH_ASSOC)){ $mensual=$row['Costo']; }
// 		$meses=($_POST['Duracion']*12);
// 		$total=$mensual*$meses;

// 		$duracion=$_POST['Duracion'];
// 		$Fecha_Compra=$_POST['Fecha_Compra'];
// 		$nuevafecha = strtotime ( '+'.$duracion.' year' , strtotime ( $Fecha_Compra ) ) ;
// 		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

// 		// $carpeta = $_POST['Numero_Celular'];
// 		// $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/TwinDolphin/TwinDolphin/Facturas/';

// 		// if (!file_exists($carpeta_destino.$carpeta)) {
// 		//     mkdir($carpeta_destino.$carpeta, 0777, true);
// 		// }

// 		// move_uploaded_file($_FILES['Factura']['tmp_name'],$carpeta_destino.$carpeta.'/'.$nombre_imagen); 


		 
// 		$sql='UPDATE `lineas_telcel` SET `Numero_Cuenta`="'.$_POST['Numero_Cuenta'].'", `Numero_Celular`="'.$_POST['Numero_Celular'].'", `Plan_Telcel`="'.$_POST['Plan_Telcel'].'", `Fecha_Compra`="'.$_POST['Fecha_Compra'].'", `Duracion`='.$_POST['Duracion'].', `Fecha_Cambio`="'.$nuevafecha.'", `Costo`="'.$total.'" WHERE id_Lineas_Telcel="'.$cam.'";';
// 		// echo $sql;
// 	}

// 	$base->prepare($sql)->execute();
// }else {

	// $sql=$base->prepare('Select * from '.$tabla.' where id_'.$tabla.' = '.$cam.'');
	// $sql->execute();
	// while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
	// 	if($tabla=='Software'){
	// 		$codigo=$row['Licencia'];
	// 	}else{
	// 		$codigo=$row['Codigo'];
	// 	}
		
	// }

	
	// 	$carpeta = $codigo;
	// 	$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/TwinDolphin/TwinDolphin/Facturas/';

	// 	if (!file_exists($carpeta_destino.$carpeta)) {
	// 	    mkdir($carpeta_destino.$carpeta, 0777, true);
	// 	}

	// 	move_uploaded_file($_FILES['Factura']['tmp_name'],$carpeta_destino.$carpeta.'/'.$nombre_imagen); 




	$query='SELECT * FROM categorias WHERE nombre="'.$tabla.'" ';

	$consulta=$base->prepare($query);
	$consulta->execute();
	$cont=0;
	while($registro=$consulta->fetch(PDO::FETCH_ASSOC)){
		// if($registro['campo']=='Fecha_Cambio'){

		// }else{
			$campo[$cont]=$registro['campo'];
			$dato[$cont]=$_POST[$registro['campo']];
			$cont++;
		// }

		
	}


	$duracion=$_POST['Duracion'];
	$Fecha_Compra=$_POST['Fecha_Compra'];


	$sql='UPDATE '.$tabla.' SET';

	for ($i=0; $i <$cont ; $i++) { 
		if($campo[$i]=='Fecha_Cambio'){

		}else{
			if($i==0){
				$sql=$sql.' '.$campo[$i].'=';
			}else{
				$sql=$sql.', '.$campo[$i].'=';
			}
			for ($m=0; $m <$cont ; $m++) { 
				if($i==$m){
					$sql=$sql.' "'.$dato[$m].'"';
				}

			}
		}
		
	}

	$nuevafecha = strtotime ( '+'.$duracion.' year' , strtotime ( $Fecha_Compra ) ) ;
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );





	$sql=$sql.', Fecha_Cambio="'.$nuevafecha.'" where id_'.$tabla.' = '.$cam.';';
	echo $sql;
	echo '<br>'.$cam;
	// echo '<br>'.$cam.' '.$codigo;


	$consulta=$base->prepare($sql);
	$consulta->execute();


	for ($i=0; $i <$cont ; $i++) { 
		if($campo[$i]=='Nombre'){
			$gene[0]=$dato[$i];
		}else if($campo[$i]=='Costo'){
			$gene[1]=$dato[$i];
		}else if($campo[$i]=='Cantidad'){
			$gene[2]=$dato[$i];
		}else if($campo[$i]=='Codigo'){
			$gene[3]=$dato[$i];
		}

	}
	$sql_cod='select * from '.$tabla.' where id_'.$tabla.' = '.$cam.';';
	$realizar=$base->prepare($sql_cod);
	$realizar->execute();
	while ($row=$realizar->fetch(PDO::FETCH_ASSOC)){
		$sql_general='UPDATE Generales SET Codigo="'.$gene[3].'", descripcion="'.$gene[0].'", precio='.$gene[1].', cantidad='.$gene[2].' WHERE Codigo="'.$_POST['Codigo_respaldo'].'"';
		$inse=$base->prepare($sql_general)->execute();


		$sql_general2='UPDATE Codigos SET Codigo="'.$gene[3].'" WHERE Codigo="'.$_POST['Codigo_respaldo'].'"';
		$inse2=$base->prepare($sql_general2)->execute();
	}


	


// }


echo '
    <script> window.onload = function(){
      window.location = "../inventarios-individual.php?t='.$tabla.'";
    }</script>';
 // header('Location: ../inventarios-individual.php?t='.$tabla.'');

?>

