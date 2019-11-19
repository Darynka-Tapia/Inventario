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
**  Descripcion codigo: Interfaz donde se  **
**  realiza la asignasion de los activos   **
**  con los empleados                      **
**                                         **
*********************************************
********************************************/?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php require("Est/head.php"); 
	error_reporting(E_ALL ^ E_NOTICE);
	?>
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<body onLoad="document.forms['codbar'].cbarras.focus();">
	<div class="container-fluid">
		<div class="row">
			<?php require("Est/nav.php"); ?>

			<main class="main col">
				<div class="row">
					<div class="columna col-lg-12">
						<div class="titulo-gral">
							<h1>Salida de productos</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-8"></div>
					<div class="col-2"><h3><input type="hidden" value="$0.00" id="Total"></h3></div>
					<div class="col-2"><input type="submit" onclick="formulario()" name="btn" value="Realizar"> </div>
				</div>
				<br>

				<div class="row">
					<div class="col-8">
						
						<div class="input-group buscar">
							<span class="input-group-addon" id="basic-addon1"><i class="fas fa-search"></i></span>
							
							<input  type="text" class="busca form-control texto" id="caja_busqueda" name="clave"  id="search2" aria-describedby="basic-addon1" required placeholder="Código del producto">

						</div>
						<div id="display" ></div>

						<div class="detallesEmpleado" id="detallesEmpleado" style="display: none">
							<!-- <input type="number" id="numero" value="1"> -->
							<!-- <div class="row" >
								<div class="col-md-6 col-sm-6 "><strong>Nombre: </strong><input type="text" class="sinBorder" id="NombreR" readonly></div>
							</div> -->

						</div>


					</div>
				</div>
			
				<form action="SQL/salida.php" name="form1" method="post">
					<input type="hidden" id="contador" name="contador">
						<div id="dynamicDiv">
						</div>
				</form>
			</main>
		</div>
		</div>


		<?php require("Est/script.php"); ?>
		<?php require("Est/modales.php"); ?>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
		</script>
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/indexCo.js"></script>

		<script type="text/javascript">

			function getKey(e){
				if(!e)
					e=window.event;
				if(e.keyCode)
					code=e.keyCode;
				else
					code=e.which;
				if(code===13){
					document.forms['codbar'].cbarras2.value=document.forms['codbar'].cbarras.value;
					document.forms['codbar'].cbarras.value='';
					document.forms['codbar'].cbarras.focus();
				}

			}

		$(document).ready(function(){

		$(".busca").keyup(function() //se crea la funcioin keyup
		{
		var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
		var dataString = 'palabra='+ texto;//se guarda en una variable nueva para posteriormente pasarla a search.php
		if(texto=='')//si no tiene ningun valor la caja de texto no realiza ninguna accion
		{
		}
		else
		{
		$.ajax({//metodo ajax
		type: "POST",//aqui puede  ser get o post
		url: "SQL/searchEmpleado.php",//la url adonde se va a mandar la cadena a buscar
		data: dataString,
		cache: false,
		success: function(html)//funcion que se activa al recibir un dato
		{
		$("#display").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
	}
});
	}return false;    
});
	});
		jQuery(function($){//funcion jquery que muestra el mensaje "Buscar amigos..." en la caja de texto
			$("#caja_busqueda").Watermark("Buscar amigos...");
		});

	</script>

	<script>
		num=1;
		ValTotal=0;
		function select(nombre, precio, Cantidad, codigo, id_codigo){
			var scntDiv = $('#dynamicDiv');
			$('<article>'+
							'<div class="row" >'+
								'<div class="col-12">'+
								'<table>'+
									'<tr>'+
									'	<td><input type="hidden" id="id_c'+num+'" name="id_c'+num+'"/>'+
									'	<td><input type="text" class="sinBorder" id="Codigo'+num+'" name="Codigo'+num+'" readonly></td>'+
									'	<td><input type="text" class="sinBorder" id="Nombre'+num+'" readonly></td>'+
									'	<td><strong>$ </strong><input type="text" class="sinBorder" id="precio'+num+'" size="5px" readonly></td>'+
									'	<td><input onchange="suma('+num+');" type="number" min="0" max="'+Cantidad+'" value="1" id="numero'+num+'" name="Cantidad'+num+'" size="5px"/></td>'+
									'	<td>$ <input type="text" id="Total'+num+'" name="Total'+num+'" class="sinBorder" size="5px"/></td>'+
									'	<td> - <input onchange="Descuento('+num+', this.value);" type="number" min="0" max="100" id="Desc'+num+'" name="Desc'+num+'" size="5px" value="0"> % </td>'+
									'	<td><strong>$ </strong><input type="text" class="sinBorder" id="TotalNeto'+num+'" name="TotalNeto'+num+'" readonly></td>'+
									'</tr>'+
								'</table>'+
								'</div>'+ 
							'</div>'+
							'</article>').appendTo(scntDiv);

			document.getElementById('detallesEmpleado').style.display='block';
			document.getElementById('id_c'+num).value=id_codigo;
			document.getElementById('Codigo'+num).value=codigo;
			document.getElementById('Nombre'+num).value=nombre;
			document.getElementById('precio'+num).value=precio;
			document.getElementById('Total'+num).value=precio;
			document.getElementById('TotalNeto'+num).value=precio;
			
			
			cantidad = document.getElementById('numero'+num).value;

			
			document.getElementById('display').style.display='none';
			document.getElementById('contador').value=num;
			
			num++
		}
		
		function suma(num){
			Precio=document.getElementById('precio'+num).value;			
			cantidad = document.getElementById('numero'+num).value;
			
			Total=parseFloat(Precio)*parseFloat(cantidad);
			document.getElementById('Total'+num).value=Total;
			document.getElementById('TotalNeto'+num).value=Total;
			total(Total);

			
		}

		function total(valor){
			var total=0;
			valor=parseFloat(valor);

			total=total+valor;
			// alert(total);
		}

		function Descuento(num, descuento){
			total = document.getElementById('Total'+num).value;
			resultado=total-((total*descuento) /100);
			
			document.getElementById('TotalNeto'+num).value=resultado;
			
		}
  
sum=0.0;
		function venta(){
			
			contador=document.getElementById('contador').value;
			for(var i=1; i<=contador; i++){
				alert(document.getElementById('Total'+contador).value);
			}
			// var confirmacion = confirm("El total de su compra es: $ ");
			// if(confirmacion){
			// 	// location.href = "inventario-individual-modificar.php?e=s&c="+campo+"&t="+tabla+"";
			// } else {
			// 	alert("Se continua agregando");
			// }

		}

		function formulario(){
			document.form1.submit();
		}
	</script>

</body>
</html>

<style>
.activos{
	margin-top: 2%;
}

.sinBorder{
	border: 0;
	background-color: #f2f2f2;
	cursor: default;
}

.sinBorder:focus{
	outline:0px;
}

#detallesEmpleado{
	cursor: default;
}

</style>





