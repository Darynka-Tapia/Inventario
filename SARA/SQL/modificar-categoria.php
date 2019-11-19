<?php 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 13/04/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Logica para        **
**  Modificar una categoria de inventario  **
**                                         **
*********************************************
********************************************/?>

<?php
error_reporting(E_ALL ^ E_NOTICE);
require('conexion.php');

$num=$_POST['numero'];


for ($i=0; $i <$num-4 ; $i++) { 
// echo 'Topo0'.$_POST['tipo0'].'<br>';
// echo 'Topo1'.$_POST['tipo1'].'<br>';
 // echo ''.$_POST['Tabla'].' '.$_POST['campo'.$i.'R'].' '.$_POST['campo'.$i].' '.$_POST['tipo'.$i].' *** '.$i.' *** <br><br>';
}




$sql_tabla=$base->prepare('Select * from categorias where nombre="'.$_POST['Tabla'].'"');
$sql_tabla->execute();
$filas=$sql_tabla->rowCount();

while ($row=$sql_tabla->fetch(PDO::FETCH_ASSOC)) {
	if($row['nombre']==$_POST['TablaR']){
		$filas=0;
	}
}

if($filas>0){
	echo '
	<script> window.onload = function(){
		alert("Intenta otro nombre de la BD, ese ya existe. Vuelve a intentarlo");
		window.location = "../inventario-general.php";
	}</script>';
}else{

	$se_puede=0;//se utiliza para comprobar si se puede registrar el dato o no (para evitar datos duplicados)
	for ($i=0; $i <$num ; $i++) { //para verificar el dato 1
		for ($r=0; $r <$num ; $r++) {//con el dato1, dato2, dato3 y no halla duplicado
			//echo $r.' '.$i.'<br>';
			if($r==$i){//si el dato 1 == dato1 significa que esta comparando con su mismo nombre
				
			}else{//en caso contrario 
				if($_POST['campo'.$r]=='' && $_POST['campo'.$i]==''){

				}else{
					// echo $_POST['campo'.$r].'=='.$_POST['campo'.$i].'<br>';
					if($_POST['campo'.$r]==$_POST['campo'.$i]){//compruebo que dato1 no sea igual con dato2 o dato3 
						
						 $se_puede=1;//si es verdadero, cambio el valor de la variable 
					}else{}//si no, el valor de la variable queda igual como al inicio 
				}

				
				


			}
		}
	}
	if($se_puede==1){ //si el valor de la variable es igual a  
				//mando mensaje avisando que hay un dato repetido 
		echo '
		<script> window.onload = function(){
			alert("Revise sus campos, No pueden haber repetidos!!!");
			window.location = "../modificar-categoria.php?n='.$_POST['TablaR'].'&i='.$_POST['Icono'].'";
		}</script>';
	}else{
				// de lo contrario, se puede realizar el registro";

				//el num es la cantidad de registros que se estan realizando
				//el -1 es el registro del campo costo
		for ($i=0; $i <$num ; $i++) { 
			// echo '****'.$i.' de '.$num.'****<br>';
					//compruebo si el tipo de datos es date para omitirle el valor de la longitud 
			if($_POST['tipo'.$i]=='Date'){
				$valor='';
			}else{
				$valor='('.$_POST['longitud'.$i].')';
			}

			if($_POST['tipo'.$i]=='Float'){
				$valor='';
			}else{
				$valor='('.$_POST['longitud'.$i].')';
			}



					//compruebo si el valor de $i es igual a 0 para ejecutar los registros que solo se deberan ejecutar una vez 
			if ($i==0){
			

						//modificar el nombre de la tabla
				$sql_Cambio_Nombre_Tabla='ALTER TABLE '.$_POST['TablaR'].' RENAME '.$_POST['Tabla'].';';
						//Modificar el nombre del campo de la tabla colaboradores 
				//$sql_A_Colaboradores='ALTER TABLE colaboradores CHANGE '.$_POST['TablaR'].' '.$_POST['Tabla'].' int(11) Null;';
						//cambiar el nombre de la tabla al campo costo
				$sql_Cambio_Costo='UPDATE categorias SET nombre="'.$_POST['Tabla'].'" WHERE nombre="'.$_POST['TablaR'].'" and campo="Costo";';

				// $sql_Cambio_Costo2='UPDATE categorias SET nombre="'.$_POST['Tabla'].'" WHERE nombre="'.$_POST['TablaR'].'" and campo="Fecha_Compra";';
				// $sql_Cambio_Costo3='UPDATE categorias SET nombre="'.$_POST['Tabla'].'" WHERE nombre="'.$_POST['TablaR'].'" and campo="Fecha_Cambio";';
				// $sql_Cambio_Costo4='UPDATE categorias SET nombre="'.$_POST['Tabla'].'" WHERE nombre="'.$_POST['TablaR'].'" and campo="Duracion";';
				$sql_Cambio_Costo5='UPDATE categorias SET nombre="'.$_POST['Tabla'].'" WHERE nombre="'.$_POST['TablaR'].'" and campo="Cantidad";';





						//cambiar el id_tabla por el id_tabla_nueva
				$sql_Cambio_Id='ALTER TABLE '.$_POST['Tabla'].' CHANGE id_'. $_POST['TablaR'].' id_'.$_POST['Tabla'].' int(11) Not Null AUTO_INCREMENT;';
				// echo $sql_Cambio_Nombre_Tabla.'<br>';
				// echo $sql_A_Colaboradores.'<br>';
				// echo $sql_Cambio_Costo.'<br>';
				// echo $sql_Cambio_Id.'<br>';

				//ejecuto los querys 

if($_POST['campo'.$i]=='Fecha_Compra'){
				// echo 'Muestro un registro de compra :v <br><br>';
			}

				// $sql2=$base->prepare($sql_A_Colaboradores);
				// $sql2->execute();

				$sql3=$base->prepare($sql_Cambio_Nombre_Tabla);
				$sql3->execute();

				$sql5=$base->prepare($sql_Cambio_Costo);
				$sql5->execute();
				// $sql52=$base->prepare($sql_Cambio_Costo2);
				// $sql52->execute();
				// $sql53=$base->prepare($sql_Cambio_Costo3);
				// $sql53->execute();
				// $sql54=$base->prepare($sql_Cambio_Costo4);
				// $sql54->execute();
				$sql54=$base->prepare($sql_Cambio_Costo5);
				$sql54->execute();




				$sql6=$base->prepare($sql_Cambio_Id);
				$sql6->execute();

			}

					//si el checkbox esta deseleccionado agrego la palabra null al registro
			if($_POST['nulo'.$i]==''){
				$sql=('Update categorias Set 
					nombre="'.$_POST['Tabla'].'",
					campo="'.$_POST['campo'.$i].'", 
					tipo="'.$_POST['tipo'.$i].'", 
					longitud="'.$_POST['longitud'.$i].'", 
					nulo="Null" 
								Where id_categoria='.$_POST['id'.$i].';');//1

				$sql_campos_newTabla='ALTER TABLE '.$_POST['Tabla'].' CHANGE 
																'.$_POST['campo'.$i.'R'].' '.$_POST['campo'.$i].' '.$_POST['tipo'.$i].''.$valor.' Null;';//4
			}else{//de lo contrario, hago el registro normal
				$sql=('Update categorias Set 
					nombre="'.$_POST['Tabla'].'",
					campo="'.$_POST['campo'.$i].'", 
					tipo="'.$_POST['tipo'.$i].'", 
					longitud="'.$_POST['longitud'.$i].'", 
					nulo="Not Null" 
								Where id_categoria='.$_POST['id'.$i].';');//3

				$sql_campos_newTabla='ALTER TABLE '.$_POST['Tabla'].' CHANGE 
																'.$_POST['campo'.$i.'R'].' '.$_POST['campo'.$i].' '.$_POST['tipo'.$i].''.$valor.' Not Null;';//4
															}





				$sql_generales="update Generales set tabla='".$_POST['Tabla']."' where tabla='".$_POST['TablaR']."'";
				$sql_g=$base->prepare($sql_generales);
				$sql_g->execute();

				$sql_codigos="update Codigos set Tabla='".$_POST['Tabla']."' where Tabla='".$_POST['TablaR']."'";
				$sql_c=$base->prepare($sql_codigos);
				$sql_c->execute();


				// echo ''.$_POST['Tabla'].' '.$_POST['campo'.$i.'R'].' '.$_POST['campo'.$i].' '.$_POST['tipo'.$i].''.$valor.' Not Null;<br>';

			// echo $sql.'<br>';
			// echo $sql_campos_newTabla.' --- '.$_POST['tipo'.$i].' *** '.$i.' *** <br>';
					//ejecuto los querys

			// echo ''.$_POST['Tabla'].' '.$_POST['campo'.$i.'R'].' '.$_POST['campo'.$i].' '.$_POST['tipo'.$i].' *** '.$i.' *** <br><br>';
															$sql1=$base->prepare($sql);
															$sql1->execute();
															// echo $sql_campos_newTabla.'<br>';
															// echo $sql_campos_newTabla.'<br>';
															$sql4=$base->prepare($sql_campos_newTabla);
															$sql4->execute();

															echo '
															<script> window.onload = function(){
																alert("Se han realizado los cambios");
																window.location = "../inventario-general.php";
															}</script>';
														}
													}

												}	
												?>