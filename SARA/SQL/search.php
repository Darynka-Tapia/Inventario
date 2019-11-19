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
**  buscar los activos disponibles para su **
**  asignacion, asi como tambien muestra   **
**  si no esta disponible o si no existe   **
**                                         **
*********************************************
********************************************/?>


<?php 
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

function search()
{
	require ('conexion.php');
	
	$search=$_POST['search'];
	$disponible="No";
	$cuenta=0;

	if($search==""){

	}else {	  		
		$query2='SELECT ca.codigo as colaborador, c.Codigo as Codigos, c.Tabla as tabla  FROM colaboradores_activo ca RIGHT JOIN codigos c ON ca.codigo= c.Codigo where c.Codigo like "%'.$search.'%" ORDER BY ca.codigo';
		$result=$base->prepare($query2);
		$result->execute();
		$cuenta = $result->rowCount();
		echo '<table >';
		if($cuenta==0){
			echo '
			<tr>
			<td>'.$search.'</td> <td></td> <td> <span class="badge badge-danger">No existe en la BD</span> </td>
			</tr>
			';
		}else{
		}
		$z=0;
		$exeption='';
		while ($row2 = $result->fetch(PDO::FETCH_ASSOC)) {
			echo '<tr> <td>';
			$sql=$base->prepare('Select * from exepciones where codigo="'.$row2['Codigos'].'"');
			$sql->execute();
			$cuenta2 = $sql->rowCount();
			
			while ($row3 = $sql->fetch(PDO::FETCH_ASSOC)) {
				if($row2['Codigos']==$row3['Codigo']){
					$exeption=$row3['Codigo'];
					$z++;
				}	
			}
			if($row2['colaborador']!=''){
				if($cuenta2>0 && $z==1){
					echo '<i class="far fa-check-circle"></i>';
					echo ''.$row2['Codigos'].'</td><td> '.$row2['tabla'].'</td><td> <span class="badge badge-primary">Disponible</span></td>';
				}else{ 
					if($row2['Codigos']==$exeption){
					}else{
						echo ''.$row2['Codigos'].'</td><td> '.$row2['tabla'].'</td><td> <span class="badge badge-warning">No disponible</span></td>';
					}
				}
			}else{
				echo ''.$row2['Codigos'].'</td><td> '.$row2['tabla'].'</td><td> <span class="badge badge-primary">Disponible</span></td>';
			}
			echo '</tr>';
		}
		echo '</table>';
	}
}

search();
