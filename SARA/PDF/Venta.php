<?php 
ob_start();
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
**  Descripcion codigo: PDF del            **
**  historial de cada activo individual    **
**  para saber que personas lo han usado   **
**                                         **
*********************************************
********************************************/?>

<?php
require('../SQL/conexion.php');
require('fpdf181/fpdf.php');
$numero=$_POST['num'];

for ($i=1; $i <=$numero ; $i++) { 
	$datos[$i][0]=$_POST['Total'.$i];
	$datos[$i][1]=$_POST['Cantidad'.$i];
	$datos[$i][2]=$_POST['Codigo'.$i];
	$datos[$i][3]=$_POST['id_c'.$i];
	$datos[$i][4]=$_POST['Desc'.$i];
}


date_default_timezone_set('America/Chihuahua');
$fecha = date("d/m/Y");


class PDF extends FPDF
{
// Cabecera de página
	function Header()
	{

		$this->Image('LOGO2.png',85,10,40);
		$this->Ln(27);
		
	}

// Pie de página
	function Footer()
	{
	// Posición: a 1,5 cm del final
		$this->SetY(-15);
	// Arial italic 8
		$this->SetFont('Arial','I',8);
	// Número de página
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial','',11);
$pdf->Cell(80);
$pdf->Cell(30,0,' V E N T A   D E   P R O D U C T O S ',.2,0,'C');// Título	
$pdf->Ln(10);


$pdf->Cell(9);
$pdf->Cell(176,7,utf8_decode('Fecha de impresión: '.$fecha),0,1,'R');



$pdf->SetXY(10, 65);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetFillColor(51,63,79);//Fondo verde de celda
		$pdf->SetTextColor(240, 255, 240); //Letra color blanco
		$pdf->Cell(9);

		$pdf->Cell(30,7, utf8_decode('Codigo'),1, 0 , 'L', true);
		$pdf->Cell(62,7, utf8_decode('Descripción'),1, 0 , 'L', true);
		$pdf->Cell(30,7, utf8_decode('Cantidad'),1, 0 , 'L', true);
		$pdf->Cell(10,7, utf8_decode('Dto.'),1, 0 , 'L', true);
		$pdf->Cell(40,7, utf8_decode('Total'),1, 0 , 'L', true);

		$pdf->SetXY(10,72);
		$pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(189, 215, 238); //Gris tenue de cada fila
		$pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
		$bandera = false; //Para alternar el relleno40

$suma=0.0;

for ($i=1; $i <=$numero ; $i++) {
 if($datos[$i][1]==0){

 }else{
 	$tabla=$base->prepare('SELECT Tabla from codigos where Codigo="'.$datos[$i][2].'"');
 	$tabla->execute();
 	while ($row=$tabla->fetch(PDO::FETCH_ASSOC)) {
 		$descripcion=$base->prepare('SELECT descripcion from Generales where Codigo="'.$datos[$i][2].'" and tabla="'.$row['Tabla'].'"');
 		$descripcion->execute();
 		while ($row2=$descripcion->fetch(PDO::FETCH_ASSOC)) {
 			$pdf->Cell(9);
 			$pdf->Cell(30,7, utf8_decode($datos[$i][2]),1, 0 , 'L', $bandera );
 			$pdf->Cell(62,7, utf8_decode($row2['descripcion']),1, 0 , 'L', $bandera );
 			$pdf->Cell(30,7, utf8_decode($datos[$i][1]),1, 0 , 'L', $bandera );
 			$pdf->Cell(10,7, utf8_decode($datos[$i][4].'%'),1, 0 , 'L', $bandera );
 			$pdf->Cell(40,7, utf8_decode('$ '.$datos[$i][0]),1, 0 , 'L', $bandera );
			$pdf->Ln();//Salto de línea para generar otra fila
			$bandera = !$bandera;//Alterna el valor de la bandera
			$suma=$suma+$datos[$i][0];
 			
 		}	
 	}	 

 }
	
}

$pdf->Ln(10);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(130);
$pdf->Cell(30,0,' T O T A L : $'.$suma,.2,0,'C');// Título	
$pdf->Ln(10);



		
$pdf->Ln(5);

$pdf->Output();


echo '
			<script> 
				
				window.onload = function(){
				alert("Se han realizado la venta");
				window.location = "../salidas.php";
			}
			</script>
			';

	
?>