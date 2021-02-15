<?php
require('fpdf/fpdf.php');
include "connection.php";
include "session.php";

if(isset($_GET['id']))
{
	$slot = $_GET['id'];
}

class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial','B',15);
		
		//dummy cell to put logo
		//$this->Cell(12,0,'',0,0);
		//is equivalent to:
		$this->Cell(12);
		
		//put logo
		$this->Image('web.png',10,10,10);
		
		$this->Cell(100,10,'Clerk Hedder',0,1);
		
		//dummy cell to give line spacing
		//$this->Cell(0,5,'',0,1);
		//is equivalent to:
		$this->Ln(5);
		
		$this->SetFont('Arial','B',11);
		
		$this->SetFillColor(180,180,255);
		$this->SetDrawColor(180,180,255);
		$this->Cell(35,5,'PRODUCT NAME',1,0,'',true);
		$this->Cell(35,5,'PRODUCT QTY',1,0,'',true);
		$this->Cell(20,5,'AMOUNT',1,1,'',true);
		
	}
	function Footer(){
		//add table's bottom line
		$this->Cell(190,0,'','T',1,'',true);
		
		//Go to 1.5 cm from bottom
		$this->SetY(-15);
				
		$this->SetFont('Arial','',8);
		
		//width = 0 means the cell is extended up to the right margin
		$this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');
	}
}


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF('P','mm','A4'); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',9);
$pdf->SetDrawColor(180,180,255);
$TOT=0;

$query=oci_parse($conn,"select * from payment5 where CID='$ifak'");
oci_execute($query);
while($data=oci_fetch_assoc($query)){
 	$pdf->Cell(35,5,$data['PNAME'],'LR',0);
 	$pdf->Cell(35,5,$data['PQTY'],'LR',0);
    $pdf->Cell(20,5,$data['TOTAL'],'LR',1);
	 $TOT=$TOT+$data['TOTAL'];
 	}
 	$pdf->Cell(35,5,'','LR',0);
	$pdf->Cell(35,5,'','LR',0);
 	$pdf->Cell(35,5,'','LR',0);
 	$pdf->Cell(35,5,'','LR',0);
 	$pdf->Cell(35,5,'','LR',0);
    $pdf->Cell(20,5,'','LR',1);
	
 	$pdf->Cell(175,5,'TOTAL','LR',0);
	 $pdf->Cell(20,5,$TOT,'LR',1);
	  	$pdf->Cell(175,5,'slots','LR',0);
 	$pdf->Cell(20,5,$slot,'LR',1);
 	$pdf->Output( 'D', 'uploads/INVOICE.PDF' );
?>
