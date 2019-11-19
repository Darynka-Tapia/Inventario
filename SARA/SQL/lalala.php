<form action="../asignacion.php" method="POST" enctype="multipart/form-data">
								<div class="row">
									<h2><i class="fas fa-upload"></i> Guardar resguardos firmados de * *</h2>
									<div class="input-group input-group-icon">
										<input type="text" style="display:none;"  />
									</div>
									<br>

									<input type="text" name="nombre"   value="" hidden/>
									<input type="text" name="id"   value="" hidden/>

									<h4>Resguardo general</h4>
									<div class="input-group input-group-icon">
										<input type="file" name="General" id="fname" onchange="comprueba_extension()" required/>
										<div class="input-icon"><i class="fas fa-file-signature"></i></div>
									</div>
									
									<h4>Resguardo de linea telcel y celular</h4>
									<div class="input-group input-group-icon">
										<input type="file" name="Celular" id="fname2" onchange="comprueba_extension2()" />
										<div class="input-icon"><i class="fas fa-file-signature"></i></div>
									</div>
								</div>
								<center><input type="submit" value="enviar"></center>
							</form>
