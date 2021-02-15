<?php
$message = '';

require('fpdf/fpdf.php');
$connect=mysqli_connect('localhost','root','');
mysqli_select_db($connect,'hash');


class PDFR extends FPDF {
	function Header(){
		$this->SetFont('Arial','B',15);
		
		//dummy cell to put logo
		//$this->Cell(12,0,'',0,0);
		//is equivalent to:
		$this->Cell(12);
		
		//put logo
		//$this->Image('logo.png',10,10,10);
		
		$this->Cell(100,10,'Clerk Hedder',0,1);
		
		//dummy cell to give line spacing
		//$this->Cell(0,5,'',0,1);
		//is equivalent to:
		$this->Ln(5);
		
		$this->SetFont('Arial','B',11);
		
		$this->SetFillColor(180,180,255);
		$this->SetDrawColor(180,180,255);
		$this->Cell(35,5,'PRODUCT ID',1,0,'',true);
		$this->Cell(35,5,'CUSTOMER ID',1,0,'',true);
		$this->Cell(35,5,'PRODUCT NAME',1,0,'',true);
		$this->Cell(35,5,'PRODUCT QTY',1,0,'',true);
		$this->Cell(35,5,'TRADER ID',1,0,'',true);

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

$pdf = new PDFR('P','mm','A4'); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',9);
$pdf->SetDrawColor(180,180,255);
$TOT=0;

$query=mysqli_query($connect,"select * from SOLD");
while($data=mysqli_fetch_array($query)){
	$pdf->Cell(35,5,$data['PID'],'LR',0);
	$pdf->Cell(35,5,$data['CID'],'LR',0);
	$pdf->Cell(35,5,$data['PNAME'],'LR',0);
	$pdf->Cell(35,5,$data['PQTY'],'LR',0);
	$pdf->Cell(35,5,$data['TID'],'LR',0);

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
     

$pdf->Output( 'F', 'INVOICE.PDF' );

if(isset($_POST["action"]))
{
	include('pdf.php');
	$file_name = md5(rand()) . '.pdf';
	//$html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
	//$html_code .= fetch_customer_data($connect);
	//$pdf = new Pdf();
	//$pdf->load_html($html_code);
	//$pdf->render();
	$file = $pdf->output();
	file_put_contents($file_name, $pdf);

	$tempname=$_FILES['invoice']['tmp_name'];
	//$name=$_FILES['invoice'][$file_name];
	$size=$_FILES['invoice']['size'];
	$type=$_FILES['invoice']['type'];


	 if($qry){
    //making the folder if  not exist in script executions path
  $dir="uploads/";
  if (!file_exists($dir)&& !is_dir($dir)) {
    mkdir($dir);  }
      //making upload path and file name
  $uploadfull="$dir/$file_name";

  //uploaded folder
  $upload=move_uploaded_file($tempname, $uploadfull);

  //checking the file is uploaded or not

  
  }


	
	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP'
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '465' ;								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'clerkhedder@gmail.com';					//Sets SMTP username
	$mail->Password = 'zxc123890';					//Sets SMTP password
	$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'clerkhedder@gmail.com';			//Sets the From email address for the message
	$mail->FromName = 'Anish';			//Sets the From name of the message
	$mail->AddAddress('maharjan.anish.yt@gmail.com', 'Name');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML				
	$mail->AddAttachment($file_name);     				//Adds an attachment from a path on the filesystem
	$mail->Subject = 'Invoice';			//Sets the Subject of the message
	$mail->Body = 'Please Find Customer details in attach PDF File.';				//An HTML or plain text message body
	if($mail->Send())								//Send an Email. Return true on success or false on error
	{
		$message = '<label class="text-success">Customer Details has been send successfully...</label>';
	}
	unlink($file_name);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Dynamic PDF Send As Attachment with Email in PHP</title>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<script src="bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h3 align="center">Create Dynamic PDF Send As Attachment with Email in PHP</h3>
			<br />
			<form method="post">
				<input type="submit" name="action" class="btn btn-danger" value="PDF Send" /><?php echo $message; ?>
			</form>
			<br />
			<?php
			
			?>			
		</div>
		<br />
		<br />
	</body>
</html>


?>
