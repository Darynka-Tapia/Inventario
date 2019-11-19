<?php 
/********************************************
*********************************************
**                                         **
**  Autor: Darynka Tapia                   **
**  Proyecto: Inventarios Twin Dolphin     **
**  Lugar: Los Cabos, BCS.                 **
**  Fecha ultima modificacion: 02/04/2019  **
**                                         **
** * * * * * * * * * * * * * * * * * * * * **
**                                         **
**  Descripcion codigo: Login              **
**                                         **
*********************************************
********************************************/
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php 
	error_reporting(E_ALL ^ E_NOTICE);
	require("Est/head.php"); 
	require 'SQL/conexion.php';
	$id=$_GET['id'];
	$user=$_GET['user'];
	$tipo=$_GET['tipo'];
	$eliminar=$_GET['e'];
	if($eliminar=='s'){
		$sql_eliminar=$base->prepare('DELETE FROM Accesos where id_acceso='.$id)->execute();
	}
	?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php require("Est/nav.php"); ?>

			<main class="main col">
				<div class="row">
					<div class="row acc">
						<div class="col-1 "><center>
							<div class="colorH">
								<span class="fa-layers fa-fw">
									<i class="fas fa-chevron-circle-down colorH" onclick="mostrar_usuarios()" id="icono"></i></a>
									<i class="fas fa-chevron-circle-up colorH" onclick="ocultar_usuarios()" id="icono2" style="display: none"></i>			  
								</span>	
							</div></center>
						</div>
						<div class="col-8"></div>
					</div>
				</div>
				<div class="row">
					<div class="col" id="datos_usuarios" style="display: none">
						<table border="1" width="100%">
							<tr>
								<th width="30%">Usuario</th>
								<th width="40%">Contraseña</th>
								<th width="15%">Acesso</th>
								<th width="15%">Acciones</th>
							</tr>
							<?php
							$sql=$base->prepare('Select * from accesos');
							$sql->execute();
							while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
								if($row['usuario']=='Darynka Tapia'){

								}else{
									echo '<tr>
									<td width="30%">'.$row['usuario'].'</td>
									<td width="40%">'.$row['contraseña'].'</td>
									<td width="15%">'.$row['Acceso'].'</td>
									<td width="15%"><center>
										<a href="Registrar_usuarios.php?id='.$row['id_acceso'].'&user='.$row['usuario'].'&tipo='.$row['Acceso'].'"><i class="fas fa-user-edit"></i></a> 
										<a href="Registrar_usuarios.php?id='.$row['id_acceso'].'&e=s"><i class="fas fa-user-times"></i></a>
									</center></td></tr>';
								}
								
							}
							?>
						</table>
						
					</div>
				</div>
				
					<div class="row">
						<div class="columna col-lg-12 Formulario" >
							<div class="container">

								<?php
									if($id!='' && $user!=''){
								?>

									<form action="Registrar_usuarios.php" method="POST">
										<div class="row">
											<h2>Registrar nuevo acceso</h2>
											<div class="input-group input-group-icon">
												<input type="text" style="display:none;"  value="<?php echo $id; ?>"  name="id" />
											</div>
											<h4>Usuario <label style="color:#ff0000;">*</label> </h4>
											<div class="input-group input-group-icon">
												<input type="text" name="usuario" maxlength="50" required value="<?php echo $user; ?>" />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
											</div>
											<h4> Contraseña <label style="color:#ff0000;">*</label> </h4>
											<div class="input-group input-group-icon">
												<input type="password" name="pass"  maxlength="50" required />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
											</div>
											<h4> Repetir contraseña <label style="color:#ff0000;">*</label>  </h4>
											<div class="input-group input-group-icon">
												<input type="password" name="ppass" maxlength="50" required />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
											</div>
											<h4>Tipo de usuario</h4>
											<div class="input-group input-group-icon">
												<select name="tipo">
													<?php
														if($tipo==''){
															echo '<option value="" selected> ... </option>
															<option>Admin</option>';
														}else{
															echo '<option value="" > ... </option>
															<option selected>Admin</option>';
														}
													?>
													
												</select>
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
											</div>
										</div>
										<center><input type="submit" value="Modificar" name="Modificar"></center>
									</form>

								<?php
									}else{


								?>
									<form action="Registrar_usuarios.php" method="POST">
										<div class="row">
											<h2>Registrar nuevo acceso</h2>
											<div class="input-group input-group-icon">
												<input type="text" style="display:none;" />
											</div>
											<h4>Usuario <label style="color:#ff0000;">*</label> </h4>
											<div class="input-group input-group-icon">
												<input type="text" name="usuario" maxlength="50" required />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
											</div>
											<h4> Contraseña <label style="color:#ff0000;">*</label> </h4>
											<div class="input-group input-group-icon">
												<input type="password" name="pass"  maxlength="50" required />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
											</div>
											<h4> Repetir contraseña <label style="color:#ff0000;">*</label>  </h4>
											<div class="input-group input-group-icon">
												<input type="password" name="ppass" maxlength="50" required />
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
											</div>
											<h4>Tipo de usuario</h4>
											<div class="input-group input-group-icon">
												<select name="tipo">
													<option value="" selected> ... </option>
													<option>Admin</option>
												</select>
												<div class="input-icon"><i class="fas fa-pencil-alt"></i></div>
											</div>
										</div>
										<center><input type="submit" value="Registrar" name="Registrar"></center>
									</form>

								<?php

									}
								?>
								
							</div>
						</div>


						
					</div>
				</div>


			</main>
		</div>
	</div>

	
	<?php require("Est/script.php"); ?>
	<?php require("Est/modales.php"); ?>


	<?php
		if(isset($_POST['Registrar'])){
			$user=$_POST['usuario'];
			$contra=$_POST['pass'];
			$contra2=$_POST['ppass'];
			$tipo=$_POST['tipo'];
			$hashed_password = password_hash($contra, PASSWORD_DEFAULT);

			if($contra==$contra2){
				$sql=$base->prepare('Select * from accesos where usuario="'.$user.'"');
				$sql->execute();
				$cuenta=$sql->rowCount();
				if($cuenta>0){
					echo '<script> alert("No puede haber dos usuarios iguales"); </script>';
				}else{
					$sql_insert=$base->prepare('Insert into accesos (usuario, contraseña, Acceso ) values("'.$user.'", "'.$hashed_password.'", "'.$tipo.'")');
					$sql_insert->execute();
					echo '
					<script> window.onload = function(){
						window.location = "Registrar_usuarios.php";
					}</script>';
				}
				
			}else{
				echo '<script> alert("Las contraseñas deben ser iguales, vuelve a intentarlo"); </script>';

			}

		}else if(isset($_POST['Modificar'])){
			$id=$_POST['id'];
			$user=$_POST['usuario'];
			$contra=$_POST['pass'];
			$contra2=$_POST['ppass'];
			$tipo=$_POST['tipo'];
			$hashed_password = password_hash($contra, PASSWORD_DEFAULT);
			if($contra==$contra2){
				$sql=$base->prepare('Select * from accesos where usuario="'.$user.'" and id_acceso<>'.$id);
				$sql->execute();
				$cuenta=$sql->rowCount();
				if($cuenta>0){
					echo '<script> alert("No puede haber dos usuarios iguales"); </script>';
				}else{

					echo 'Update accesos SET usuario="'.$user.'", contraseña="'.$hashed_password.'", Acceso="'.$tipo.'" where id_acceso='.$id;
					$sql_insert=$base->prepare('Update accesos SET usuario="'.$user.'", contraseña="'.$hashed_password.'", Acceso="'.$tipo.'" where id_acceso='.$id);
					$sql_insert->execute();
					echo '
					<script> window.onload = function(){
						window.location = "Registrar_usuarios.php";
					}</script>';
				}
			}else{
				echo '<script> alert("Las contraseñas deben ser iguales, vuelve a intentarlo"); </script>';
			}	
			
		}

	?>

</body>
</html>


<script>
	
	function mostrar_usuarios(){
		document.getElementById('datos_usuarios').style.display="Block";
		document.getElementById('icono').style.display="none";
		document.getElementById('icono2').style.display="Block";
	}
	function ocultar_usuarios(){
		document.getElementById('datos_usuarios').style.display="None";
		document.getElementById('icono').style.display="Block";
		document.getElementById('icono2').style.display="None";
	}

</script>


<style type="text/css">


	
	.Formulario{
		margin-top: 2%;
	}
input,
select option,
select {
  width: 100%;
  padding: 1em;
  line-height: 1.4;
  background-color: #f9f9f9;/*Gris*/;
  border: 1px solid #e5e5e5;/*Gris*/;
  border-radius: 3px;
  -webkit-transition: 0.35s ease-in-out;
  -moz-transition: 0.35s ease-in-out;
  -o-transition: 0.35s ease-in-out;
  transition: 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}

input:focus {
  outline: 0;
  border-color: #5d809f;/*Azul*/;
}
input:focus + .input-icon i {
  color: #5d809f;/*Azul*/;
}
input:focus + .input-icon:after {
  border-right-color: #5d809f;/*Azul*/;
}

select {
  display: inline-block;
  width: 100%;
  text-align: center;
  float: left;
  border-radius: 0;
  padding-left: 11%;
}

select:focus,
select:active {
  background-color: #f9f9f9;/*Gris*/;
  color: #000;
  border-color: #5d809f;/*Azul*/;
}

select {
  height: 3.4em;
  line-height: 2;
}
select:first-of-type {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
select:last-of-type {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
select:focus,
select:active {
  outline: 0;
}
select option {
  background-color: #f9f9f9;/*Gris*/;
  color: #000;
}
.input-group {
  margin-bottom: 1em;
  zoom: 1;
}
.input-group:before,
.input-group:after {
  content: "";
  display: table;
}
.input-group:after {
  clear: both;
}
.input-group-icon {
  position: relative;
}
.input-group-icon input {
  padding-left: 4.4em;
}
.input-group-icon .input-icon {
  position: absolute;
  top: 0;
  left: 0;
  width: 3.4em;
  height: 3.4em;
  line-height: 3.4em;
  text-align: center;
  pointer-events: none;
}
.input-group-icon .input-icon:after {
  position: absolute;
  top: 0.6em;
  bottom: 0.6em;
  left: 3.4em;
  display: block;
  border-right: 1px solid #e5e5e5;/*Gris*/;
  content: "";
  -webkit-transition: 0.35s ease-in-out;
  -moz-transition: 0.35s ease-in-out;
  -o-transition: 0.35s ease-in-out;
  transition: 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}
.input-group-icon .input-icon i {
  -webkit-transition: 0.35s ease-in-out;
  -moz-transition: 0.35s ease-in-out;
  -o-transition: 0.35s ease-in-out;
  transition: 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}
.container {
  max-width: 38em;
  padding: 1em 3em 2em 3em;
  margin: 0em auto;
  background-color: #fff;
  border-radius: 4.2px;
  box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
}
.row {
  zoom: 1;
}
.row:before,
.row:after {
  content: "";
  display: table;
}
.row:after {
  clear: both;
}
.col-half {
  padding-right: 10px;
  float: left;
  width: 50%;
}
.col-half:last-of-type {
  padding-right: 0;
}
.col-third {
  padding-right: 10px;
  float: left;
  width: 33.33333333%;
}
.col-third:last-of-type {
  padding-right: 0;
}
@media only screen and (max-width: 540px) {
  .col-half {
    width: 100%;
    padding-right: 0;
  }

  input[type="radio"] + label,
  select {
    padding-left: 20%;
  }
}

input[type="submit"]{
  background: transparent;
  cursor: pointer;
  
  font-family: 'Brandon Grotesque';
  font-weight: medium;
  font-style: normal;
  font-size: 18px;
  line-height: 35px;
  letter-spacing: 0px;
  color: #5d809f;/*Azul*/;
  
  display: inline-block;
  padding:10px;
  width: 200px;
  border: 3px solid #5d809f;/*Azul*/;
  border-radius: 10px;
  transition: all .3s ease;
  outline:none;
  text-decoration: none;
}

input[type="submit"]:hover{
  background: #5d809f;/*Azul*/;
  color: #f2f2f2;
  
}

</style>