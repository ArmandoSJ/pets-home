<?php

require('../fpdf153/fpdf.php');
include_once("./Utilerias/database_utilerias.php");
class PDF extends FPDF
{
var $widths;
var $aligns;
    
 function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=5*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border
		
		$this->Rect($x,$y,$w,$h);

		$this->MultiCell($w,5,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

 function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
    $nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}
    
function Header()
{
    //Logo
    $this->Image('./img/ini.jpg',50,5,90);
    //Arial bold 15
    $this->SetFont('Arial','',11);
	$this->Text(47,40,utf8_decode('"REPORTE DE ADOPCION DE LA MASCOTA"'),0,'C', 0);
	$this->SetFont('Arial','',10);
	$this->Text(10,73,utf8_decode('Requisito:Ir a la sucursar que se la indica a entregar este archivo con firma.'),0,'C', 0);
    $this->Ln(27);
    
	
	$this->Ln(27);
}
    
    //Pie de página
function Footer()
{ 
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


  $idp = isset($_REQUEST['idm'])?$_REQUEST['idm']:1;
  $idu = isset($_REQUEST['idu'])?$_REQUEST['idu']:1;
  $res=consultaAdop($idp,$idu);  

  $nom=$res->fields['NomMascota'];
  $nou=$res->fields['NomUsuario'];
  $dom=$res->fields['Domicilio'];
  $telm=$res->fields['TelefonoMovil'];
  $cur=$res->fields['CURP'];

    $pdf=new PDF('P','mm','A4');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(55);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'Informacion de Adopcion:',0,1);
	$pdf->Ln(20);
	
	$pdf->SetFont('Arial','',11);
	$pdf->MultiCell(177,6, utf8_decode('El que suscribe, Encargado(a) del Departamento de Adopcion de la sucursal de  celaya . Hace constar que el (a) C. '.utf8_decode($nou=$res->fields['NomUsuario']).', con Domicilio ').utf8_decode($dom=$res->fields['Domicilio']). utf8_decode(' Decea adoptar a la mascota:   ' ).utf8_decode($nom=$res->fields['NomMascota']).', Con el sigueinte Numero telefonico '.utf8_decode($telm=$res->fields['TelefonoMovil']). utf8_decode(' Y con  La siguiente CURP ').utf8_decode($cur=$res->fields['CURP']) ,0,'J');
	
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $pdf->Ln(8);
	
	$pdf->MultiCell(177,6,utf8_decode('A petición del interesado, se expide la presente en la H. ciudad de Celaya Guanajuato . A los '." ".date('d')." dias del mes de ".$meses[date('n')-1]. " de ".date('Y')."." ),0,'J');
    $pdf->Ln(50);
	
	$pdf->SetFont('Arial','',11);
    $pdf->SetFillColor(255); 
    
	$pdf->SetXY(20, 205);
    $pdf->Cell(70, 15, 'ELABORO:', 0, 0, 'C', 1);
	
	$pdf->SetXY(20, 230);
    $pdf->Cell(70, 5, '______________________', 0, 0, 'C', 1);     
    
	$pdf->SetXY(145, 205);
    $pdf->Cell(10, 15, 'Vo. Bo.', 0, 0, 'C', 1);
	
	$pdf->SetXY(145, 230);
    $pdf->Cell(10, 5, '_______________________________________', 0, 0, 'C', 1);
	
	$pdf->SetXY(20, 235);
    $pdf->Cell(70, 5, 'Nombre del Encargado', 0, 0, 'C', 1);     
	
	$pdf->SetXY(110, 235);
    $pdf->Cell(80, 5, 'Nombre del Direc', 0, 0, 'C', 1);
	
	$pdf->SetXY(20, 240);
    $pdf->Cell(70, 5, 'Encargado del Departamento..', 0, 0, 'C', 1);  
	
	$pdf->SetXY(110, 240);
    $pdf->Cell(80, 5, 'Director de Sucursarl', 0, 0, 'C', 1);             
    $y      =   130;
    
	$pdf->Ln(40);
	//$pdf->Image('imagenes/banerinferior_cecyte.jpg' , 2 ,273, 206 , 23,'JPG');

$pdf->Output();
?> 