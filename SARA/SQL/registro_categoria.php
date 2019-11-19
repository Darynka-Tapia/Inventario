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
**  registrar una categoria de inventarios **
**                                         **
*********************************************
********************************************/?>

<?php
ob_start();
error_reporting(E_ALL ^ E_NOTICE); //Evita que se muestre advertencia por falta de dato (Es solo por apariencia)
	
	//Obtengo los datos del formulario de New_Inventario.php
	$categoria=$_POST['nombre_categoria'];
	$icono=$_POST['icono'];
	$campo=$_POST['nombre_campo'];
	$tipo=$_POST['tipo'];
	$longitud=$_POST['longitud'];
	$nulo=$_POST['null'];

	//Mando a llamar el objeto de la conexion a la BD
	require('conexion.php');  

	//Comprueba si la tabla ya esta registrada
	$Comprobar_Tabla=$base->prepare("SELECT * FROM information_schema.tables WHERE table_schema = 'SARA' AND table_name = '".$categoria."'"); 
	$Comprobar_Tabla->execute();
	$num_tabla = $Comprobar_Tabla->rowCount();

	
	if($num_tabla>0){//Si ya hay una tabla con ese nombre, mand ana alerta y se regresa al mimo lugar
		echo '
			<script> window.onload = function(){
				alert("El Nombre de esta tabla ya existe, Pruebe con otro...");
			    window.location = "../new_inventario.php";
			}</script>';


	}else if ($num_tabla==0){//si no existe el nombre, paso a comprobar si el campo que intento registrar ya existe
		//Mando a llamar el objeto de la conexion a la BD
		require('conexion.php');

		//creo el Query para la consulta
		$inventario=$base->prepare('SELECT * FROM categorias WHERE nombre="'.$categoria.'" and campo="'.$campo.'"');
		//ejecuto el query
		$inventario->execute();

		//cuento cuantos registros exiten para comprobar si ya esta rgeistrado un campo con el mismo nombre 
		$num_campos = $inventario->rowCount();
		
		if($num_campos>0){//si hay un campo con el mismo nombre, mando mensaje de advertencia
			echo '
				<script> window.onload = function(){
					alert("Campo existente");
				    window.location = "../new_inventario.php?c='.$categoria.'&i='.$icono.'";
				}</script>';

		}else if ($num_campos==0){//si no hay campo con ense nombre realizo el registro

			if($_POST['nuevo']){//si el boton que precione en el formulario es *nuevo campo*|| $campo=='Fecha_Compra' || $campo=='Fecha_Cambio' || $campo=='Duracion' 
				
				if($campo=='Costo' || $campo=='Cantidad' || $campo=='Codigo'){
					echo '
					<script> window.onload = function(){
						alert("Campo existente");
					    window.location = "../new_inventario.php?c='.$categoria.'&i='.$icono.'";
					}</script>';
				}else {
				//mando los datos capturados a la funcion registrar
				registrar($categoria, $icono, $campo, $tipo, $longitud, $nulo);
				
				//mando mensaje avisando que que se registro el campo 
				echo '
					<script> window.onload = function(){
					    alert("Campo registrado");
					    window.location = "../new_inventario.php?c='.$categoria.'&i='.$icono.'";
					}</script>';
				}
				
					
			}else if($_POST['terminar']){//si el boton que precione en el formulario es *Terminar Categoria*|| $campo=='Fecha_Compra' || $campo=='Fecha_Cambio' || $campo=='Duracion'
				
				if($campo=='Costo'  || $campo=='Cantidad' || $campo=='Codigo'){
					echo '
					<script> window.onload = function(){
						alert("Campo existente");
					    window.location = "../new_inventario.php?c='.$categoria.'&i='.$icono.'";
					}</script>';
				}else {

					//mando los datos capturados a la funcion registrar
					registrar($categoria, $icono, $campo, $tipo, $longitud, $nulo);

					//Creo y ejecuto el Query para crear la tabla 
					//busco el nombre y los campos en la tabla categoria para agregarlos a la Nueva tabla de inventarios que se creara
					$inventario=$base->prepare('SELECT * FROM categorias WHERE nombre="'.$categoria.'"');
					$inventario->execute();
					
					//Contador es utilizado para solo utilizar el registro de Nombre=tabla 1 sola vez debido a que esta dentro de un while
					$cont=1;
					$SQL='CREATE TABLE ';//creo el inicio del Query
					while($registro=$inventario->fetch(PDO::FETCH_ASSOC)){
					 	$nombre=$registro['nombre']; //recibo el nombre de la tabla a travez de la consulta 
					 		if($cont==1){
					 			$SQL=$SQL.$nombre.' ( id_'.$nombre.' int Not Null AUTO_INCREMENT, Codigo Varchar(150) not null,'; //continuo creando el query (Concatenar)
					 		}

					 		//si el tipo de dato del campo recuperado en la consulta es Date realizo lo siguiente 
					 		if($registro['tipo']=='Date'){
					 			//omito agregar la longitud del dato
								$SQL=$SQL.' '.$registro['campo'].' '.$registro['tipo'].' '.$registro['nulo'].', ';
					 		}else{// si no es date 
					 			//agrego la longitud del dato 
					 			$SQL=$SQL.' '.$registro['campo'].' '.$registro['tipo'].'('.$registro['longitud'].') '.$registro['nulo'].', ';
					 		}
							
					 	$cont++;//cambio el valor del contador para que no me agrege mas el valor del nombre 
					}

					// termino el query para crear la tabla concatenando por ultimo el campo costo	
					$SQL=$SQL.'Fecha_Compra Date Null, Duracion Int Null, Fecha_Cambio Date Null, Costo Float(11) Null, Cantidad Int Null, PRIMARY KEY (id_'.$nombre.'));'; 
					
					//hago el registro del campo costo a la tabla categorias si este campo no existe en la tabla a crear 
					$inventario=$base->prepare('SELECT * FROM categorias WHERE nombre="'.$categoria.'" and campo="Costo"');
					$inventario->execute();
					$num_campos_costo = $inventario->rowCount();
					if($num_campos_costo==0){
						// registrar($categoria, $icono, "Fecha_Compra","Date","0","Null");
						// registrar($categoria, $icono, "Duracion","Int","11","Null");
						registrar($categoria, $icono, "Codigo","Varchar","150","Not Null");
						registrar($categoria, $icono, "Costo","Float","11","Null");
						registrar($categoria, $icono, "Cantidad","Int","11","Null");
					}

					//agrego el nombre de la tabla como un campo a la tabla colaboradores 
					$tabla=$base->prepare($SQL);
					$tabla->execute();
					// $nuevoCampo=$base->prepare('alter table colaboradores add '.$categoria.' int null;');
					// $nuevoCampo->execute();


					//envio mensaje de confirmacion de que la tabla se ha creado
					echo '
						<script> window.onload = function(){
				        alert("Se ha creado la tabla: '.$categoria.'");
				        window.location = "../inventario-general.php ";
						}</script>
					';


				}
			}
		}


	}

	
	
	

	function registrar($cat, $ico, $cam, $tip, $lon, $nul){
		require('conexion.php');

		//realizo el query para la insercion de datos 
		    $datos=$base->prepare('INSERT INTO categorias (nombre, icono, campo, tipo, longitud, nulo) 
								VALUES ("'.$cat.'", "'.$ico.'","'.$cam.'","'.$tip.'","'.$lon.'","'.$nul.'")');
			$datos->execute();

			
	}
ob_end_flush();

?>