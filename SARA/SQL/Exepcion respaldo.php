	 // echo '<br>'.$_POST['dato'.$i];
	
	// echo $_POST['repetir'.$i].'**--**--**--**';
	if($_POST['repetir'.$i]!=''){
		if($Tabla_e[$i]=='Celulares'){
			$hay++;
			echo 'Mi exepcion es celular, comprobar si ya tiene o no';
		}else if($Tabla_e=='Lineas_Telcel'){
			$hay++;
		}else{
			$exepciones[$i]=$_POST['dato'.$i];
			$consulta=$base->prepare('Select * from exepciones where Codigo="'.$exepciones[$i].'"');
			$consulta->execute();
			$datos = $consulta->rowCount();
			if($datos>0){
			}else{
				$consulta2=$base->prepare('SELECT * FROM exepciones where Codigo="'.$exepciones[$i].'"');
				$consulta2->execute();
				$datos2 = $consulta2->rowCount();
				if($datos2>0){
				}else{
					$sql=$base->prepare('insert into exepciones (Codigo) values("'.$exepciones[$i].'")')->execute();
					$sql=$base->prepare('insert into colaboradores_activo (id_colaborador, Codigo) values('.$id_colaborador.', "'.$exepciones[$i].'")')->execute();
					$sql=$base->prepare('insert into colaboradores_activo_historial (id_colaborador, Codigo) values('.$id_colaborador.', "'.$exepciones[$i].'")')->execute();
				}
				
			}
		}
		
		
		$hay++; 
	}else{
			$consulta2=$base->prepare('SELECT * FROM exepciones where Codigo="'.$_POST['dato'.$i].'"');
			$consulta2->execute();
			$datos2 = $consulta2->rowCount();
			while ($row2=$consulta2->fetch(PDO::FETCH_ASSOC)) {
				$exepciones[$i]=$row2['Codigo'];
			}


		// if($Tabla_e[$i]=='Celulares'){
		// 	$hay++;
			// echo 'Mi exepcion es celular, comprobar si ya tiene o no';
			$sql_comprueba=$base->prepare('Select * from colaboradores_activo where id_colaborador="'.$id_colaborador.'"');
			$sql_comprueba->execute();
			$comprueba = $sql_comprueba->rowCount();
			if($comprueba>0){
				while ($row=$sql_comprueba->fetch(PDO::FETCH_ASSOC)) {
					$tabla_comprueba=$base->prepare('select c.Tabla from colaboradores_activo ca inner join codigos c ON ca.codigo=c.codigo where id_colaborador="'.$id_colaborador.'"');
					$tabla_comprueba->execute();
					while ($row2=$tabla_comprueba->fetch(PDO::FETCH_ASSOC)) {
						if($Tabla_e[$i]=='Celulares' && $row2['Tabla']=='Celulares'){
							echo '<br>'.$exepciones[$i].'Ya tiene celular, No se pueden registrar mas de dos celulares';
						}else if($Tabla_e[$i]=='Lineas_Telcel' && $row2['Tabla']=='Lineas_Telcel'){
							echo '<br>'.$exepciones[$i].'Ya tiene una liena telcel, No se pueden registrar mas de dos celulares';
						}else {
							
						}
					}
				}


				// if($Tabla_e[$i]=='Celulares'){
				// 	echo '<br>Comprobar si alguno de sus registros es celular';


				// }else if($Tabla_e[$i]=='Lineas_Telcel'){
				// 	echo '<br>Comprobar si alguno de sus registros es Linea Telcel';
				// }else{
				// 	echo '<br>'.$exepciones[$i].'No es celular ni linea';
				// }
				
			}else{
				echo '<br>El registro sera nuevo, no hay datos de ese colaborador';
			}
		$hay++;
			
		// }else if($Tabla_e=='Lineas_Telcel'){
		// 	$hay++;

		// }else{

		// 	echo '<br>SELECT * FROM exepciones where Codigo="'.$_POST['dato'.$i].'"';
			// $consulta2=$base->prepare('SELECT * FROM exepciones where Codigo="'.$_POST['dato'.$i].'"');
			// $consulta2->execute();
			// $datos2 = $consulta2->rowCount();
			// while ($row2=$consulta2->fetch(PDO::FETCH_ASSOC)) {
			// 	$exepciones[$i]=$row2['Codigo'];
			// }

		// 	if($datos2>0){
		// 		$hay++;
		// 		$sql=$base->prepare('insert into colaboradores_activo (id_colaborador, Codigo) values('.$id_colaborador.', "'.$exepciones[$i].'")')->execute();
		// 		$sql=$base->prepare('insert into colaboradores_activo_historial (id_colaborador, Codigo) values('.$id_colaborador.', "'.$exepciones[$i].'")')->execute();
		// 	}else{
		// 		echo 'Se hace el proceso normal de los que no tienen exepciones';
		// 	}

		// }
					
	}
echo $hay;
echo $repetir[$i];