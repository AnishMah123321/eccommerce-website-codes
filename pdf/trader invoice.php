<?php

//index.php

$message = '';
			
           



$connect = new PDO("mysql:host=localhost;dbname=hash", "root", "");

	$i = 0;
	$count = -1;
	$trader = array();
	$name = array();
	$email = array();
		


function fetch_customer_data($connect)
{	
global $i;
global $trader;

			
	
	$totalprice=0;
	$query = "SELECT * FROM `sold` WHERE `TID` LIKE $trader[$i]";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '
 
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="logo.png" style="width:70%; max-width:70px;">
                            </td>
                            
                            <td>
                                Invoice #: 123<br>
                                Created: January 1, 2015<br>
                                Due: February 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Sparksuite, Inc.<br>
                                12345 Sunny Road<br>
                                Sunnyville, CA 12345
                            </td>
                            
                            <td>
                                Acme Corp.<br>
                                John Doe<br>
                                john@example.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            
   

	';
	foreach($result as $row)
	{
		$output .= '


		<tr class="item">
                <td>
                    '.$row["PNAME"].'

                </td>
                
                <td>
                   '.$row["TOTAL"].'
                </td>
            </tr>
			
		';


		$totalprice=$totalprice+$row["TOTAL"];
	}

	$output .= '
 <tr class="total">
                <td></td>
                
                <td>
                   Total: '.$totalprice.'
                </td>
            </tr>

	';

	$output .= '

		</table>
	</div>

	';
	return $output;
	


}

if(isset($_POST["action"]))
{
	include('pdf.php');
	$i=0;
	global $name;
global $email;
	        $query2 = "select * from trader";
	        $statement2 = $connect->prepare($query2);
	        $statement2->execute();
	        $result2 = $statement2->fetchAll();
	
			foreach($result2 as $row2){

			$trader[]=$row2["TID"];
			$name[]=$row2["name"];
			$email[]=$row2["email"];
		
			//echo $trader[$count];
			$count=$count+1;
			//echo$count;
			}
	

WHILE($i<=$count){

	$file_name = md5(rand()) . '.pdf';
	$html_code = '<head><link rel="stylesheet" href="bootstrap.mi9+n.css">';
	$html_code .= fetch_customer_data($connect);
	$pdf = new Pdf();
	$pdf->load_html($html_code);
	$pdf->render();
	$file = $pdf->output();
	file_put_contents($file_name, $file);
	
if (!class_exists('PHPMailer', false)) {
    require_once('class/class.phpmailer.php');
}

	
	
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
	$mail->AddAddress($email[$i], $name[$i]);		//Adds a "To" address
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
	$i=$i+1;
}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create Dynamic PDF Send As Attachment with Email in PHP</title>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<script src="bootstrap.min.js"></script>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neu', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

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
			$i=0;
	        $query2 = "select TID from trader";
	        $statement2 = $connect->prepare($query2);
	        $statement2->execute();
	        $result2 = $statement2->fetchAll();
	
			foreach($result2 as $row2){

			$trader[]=$row2["TID"];
		
			//echo $trader[$count];
			$count=$count+1;
			//echo$count;
			}

	WHILE($i<=$count){
			echo fetch_customer_data($connect);	
			echo "<br><br><br>";

	$i=$i+1;
			}
			?>			
		</div>
		<br />
		<br />
	</body>
</html>





