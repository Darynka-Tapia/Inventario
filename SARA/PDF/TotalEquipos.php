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
**  Descripcion codigo: PDF del            **
**  historial de cada activo individual    **
**  para saber que personas lo han usado   **
**                                         **
*********************************************
********************************************/?>

<?php
require('../SQL/conexion.php');
require('fpdf181/fpdf.php');

date_default_timezone_set('America/Chihuahua');
$fecha = date("d/m/Y");


class PDF extends FPDF
{
// Cabecera de página
	function Header()
	{
		$this->Image('logoTD.png',85,0,40);
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
$pdf->Cell(30,0,' T O T A L   D E   E Q U I P O S ',.2,0,'C');// Título	
$pdf->Ln(10);


$pdf->Cell(9);
$pdf->Cell(176,7,utf8_decode('Fecha de impresión: '.$fecha),0,1,'R');



$pdf->SetXY(10, 65);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetFillColor(51,63,79);//Fondo verde de celda
		$pdf->SetTextColor(240, 255, 240); //Letra color blanco
		$pdf->Cell(9);
		$pdf->Cell(86,7, utf8_decode('Descripción'),1, 0 , 'L', true);
		$pdf->Cell(43,7, utf8_decode('Cantidad'),1, 0 , 'L', true);
		$pdf->Cell(43,7, utf8_decode('Disponibles'),1, 0 , 'L', true);

		$pdf->SetXY(10,72);
		$pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(189, 215, 238); //Gris tenue de cada fila
		$pdf->SetTextColor(3, 3, 3); //Color del texto: Negro
		$bandera = false; //Para alternar el relleno40
$total_equipos[0][0]='';
$cont=0;
$sql=$base->prepare('Select * from categorias GROUP BY nombre');
$sql->execute();
while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
	if($row['nombre']=='Plan_Telcel'){}else{
		$total_equipos[$cont][0]=$row['nombre'];
		
		$sql2=$base->prepare('Select COUNT(*) as cantidad from '.$row['nombre']);
		$sql2->execute();
		while ($row2=$sql2->fetch(PDO::FETCH_ASSOC)) {
			$total_equipos[$cont][1]=$row2['cantidad'];
		}

		$sql3=$base->prepare('select count(*) as disponibles from codigos co left join colaboradores_activo ca on co.Codigo=ca.codigo where co.Tabla="'.$row['nombre'].'" and ca.codigo is null');
		$sql3->execute();
		while ($row3=$sql3->fetch(PDO::FETCH_ASSOC)) {
			$total_equipos[$cont][2]=$row3['disponibles'];
		}

		$cont++;
	}
	
}



for ($i=0; $i <$cont ; $i++) { 
		$pdf->Cell(9);
		$pdf->Cell(86,7, utf8_decode($total_equipos[$i][0]),1, 0 , 'L', $bandera );
		$pdf->Cell(43,7, utf8_decode($total_equipos[$i][1]),1, 0 , 'L', $bandera );
		$pdf->Cell(43,7, utf8_decode($total_equipos[$i][2]),1, 0 , 'L', $bandera );
		$pdf->Ln();//Salto de línea para generar otra fila
		$bandera = !$bandera;//Alterna el valor de la bandera
}




		

		
	$pdf->Ln(5);


$pdf->Output();

	
?>