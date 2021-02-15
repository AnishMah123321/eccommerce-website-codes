<?php
include ('connection2.php');
include "session.php";
  include('pdf.php');
$idc = $ifak;

include "connection.php";



date_default_timezone_set("Asia/Kathmandu");
if(isset($_GET['amt']))
{
  $amt = $_GET['amt'];
}
if(isset($_POST["submit"]))
{
  $month = date('M');
  $statment44 = "select * from payment5 where CID='$idc'";
  $query44 = oci_parse($conn,$statment44);
  $execute44 = oci_execute($query44);

  while($row50=oci_fetch_assoc($query44))
  {
    $name = $row50['PNAME'];
    $quantity = $row50['PQTY'];
 
    $statment4 = "insert into PRODUCTDESC values('','$name','$quantity','$month')";
    $query4 = oci_parse($conn,$statment4);
    $execute4 = oci_execute($query4);

  }
}


$dateTime = new DateTime();
$a =0;

?>

<?php


//index.php

$message = '';





$totalprice=0;


function fetch_customer_data($connect)
{ 
  global $totalprice;
  $totalprice=0;

global $idc;

  
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
                                Clerk Hedder<br>
                                12345 Sunny Road<br>
                                Sunnyville, CA 12345
                            </td>
                            ';
                            
        $query4=oci_parse($connect,"select * from CUSTOMER WHERE CID='$idc'");
        oci_execute($query4);

  while($row4=oci_fetch_array($query4))
  {
    $output .= '
                            <td>
                                Acme Corp.<br>

                                '.$row4["USERNAME"].'<br>
                                john@example.com
                            </td>
                            ';
                          }
                                $output .= '

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
        $query=oci_parse($connect,"select * from PAYMENT5");
        oci_execute($query);

  while($row=oci_fetch_array($query))
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



if(isset($_POST["submit"]))
{
  
  $day = $_POST['day'];
  $time = $_POST['time'];

  $delivery = $day." ".$time;
  $dayshop = date('l');

  $file_name = md5(rand()) . '.pdf';
  $html_code = '<head><link rel="stylesheet" href="bootstrap.min.css">';
  
  $html_code .= fetch_customer_data($connect);
  $pdf = new Pdf();
  $pdf->load_html($html_code);
  $pdf->render();
  $file = $pdf->output();
  file_put_contents($file_name, $file);
  
    

     
   file_put_contents('uploads/'.$file_name, $file);
   $statment55 = "insert into ORDER_DETAIL values (ODER2.nextval,'http://localhost/project%20management/uploads/$file_name','$idc','$dayshop','$totalprice','$delivery') ";
   $qury = oci_parse($connect,$statment55);
   $execute=oci_execute($qury);


  
  




  
  require 'class/class.phpmailer.php';
  $mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP'
  $mail->Host = 'smtp.gmail.com';   //Sets the SMTP hosts of your Email hosting, this for Godaddy
  $mail->Port = '465' ;               //Sets the default SMTP server port
  $mail->SMTPAuth = true;             //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'clerkhedder@gmail.com';          //Sets SMTP username
  $mail->Password = 'zxc123890';          //Sets SMTP password
  $mail->SMTPSecure = 'ssl';              //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = 'clerkhedder@gmail.com';      //Sets the From email address for the message
  $mail->FromName = 'ClerKhudder';      //Sets the From name of the message

  $query5=oci_parse($connect,"select EMAIL from CUSTOMER WHERE CID = 300011");
        oci_execute($query5);

  while($row5=oci_fetch_array($query5)){
  $mail->AddAddress($row5["EMAIL"], 'Name');   //Adds a "To" address
}

  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML       
  $mail->AddAttachment($file_name);             //Adds an attachment from a path on the filesystem
  $mail->Subject = 'Invoice';     //Sets the Subject of the message
  $mail->Body = 'Please Find Customer details in attach PDF File.';       //An HTML or plain text message body
  if($mail->Send())               //Send an Email. Return true on success or false on error
  {
    $message = '<label class="text-success">Customer Details has been send successfully...</label>';
  }
  unlink($file_name);
}

?>



<?php

//index.php

$totalprice=0;

  $i = 0;
  $count = -1;
  $TRADER = array();
  $name = array();
  $email = array();
  


function fetch_customer_data2($connect)
{ 
global $i;
global $TRADER;
global $totalprice;

      

  $totalprice=0;

        $query=oci_parse($connect,"SELECT * FROM PAYMENT5 WHERE TID='$TRADER[$i]'");
        oci_execute($query);
       

  if($query){
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
                                trader<br>
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
    while($row=oci_fetch_array($query))
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
  
  


}

if(isset($_POST["submit"]))
{
  $day = $_POST['day'];
  $time = $_POST['time'];
  $delivery = $day." ".$time;
  $dayshop = date('l');
  $count=-1;
  $k='';
  $i=0;
  global $name;
global $email;
 $query2=oci_parse($connect,"select * from TRADER");
        oci_execute($query2);
            
    
            while($row2=oci_fetch_array($query2))
            {
            $k=$row2["TID"];

            $query20=oci_parse($connect,"select * from PAYMENT5 WHERE TID='$k' AND CID='$idc'");
            oci_execute($query20);
            $data = "";
            while($row20 = oci_fetch_array($query20))
            {
              $data = $row20['PNAME'];
            }
            if($data=="" OR $data=="")
            {

            }
            else
            {
                  if ($query20)
                  {
                $TRADER[]=$k;
                $name[]=$row2["USERNAME"];
                $email[]=$row2["EMAIL"];
            
                //echo $trader[$count];
                $count=$count+1;
                //echo$count;
                  } 
            }
            
          }
      



WHILE($i<=$count){

  $file_name = md5(rand()) . '.pdf';
  $html_code = '<head><link rel="stylesheet" href="bootstrap.mi9+n.css">';
  $html_code .= fetch_customer_data2($connect);
  $pdf = new Pdf();
  $pdf->load_html($html_code);
  $pdf->render();
  $file = $pdf->output();
  file_put_contents($file_name, $file);
     file_put_contents('uploads/'.$file_name, $file);

$statment55 = "insert into TRADER_ORDER values (ODER.nextval,'http://localhost/project%20management/uploads/$file_name','$TRADER[$i]','$idc','$dayshop','$delivery','$totalprice') ";
$qury = oci_parse($connect,$statment55);
$execute=oci_execute($qury);
    
if (!class_exists('PHPMailer', false)) {
    require_once('class/class.phpmailer.php');
}

  
  
  $mail = new PHPMailer;
  $mail->IsSMTP();                //Sets Mailer to send message using SMTP'
  $mail->Host = 'smtp.gmail.com';   //Sets the SMTP hosts of your Email hosting, this for Godaddy
  $mail->Port = '465' ;               //Sets the default SMTP server port
  $mail->SMTPAuth = true;             //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'clerkhedder@gmail.com';          //Sets SMTP username
  $mail->Password = 'zxc123890';          //Sets SMTP password
  $mail->SMTPSecure = 'ssl';              //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = 'clerkhedder@gmail.com';      //Sets the From email address for the message
  $mail->FromName = 'Anish';      //Sets the From name of the message
  $mail->AddAddress($email[$i], $name[$i]);   //Adds a "To" address
  $mail->WordWrap = 50;             //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);              //Sets message type to HTML       
  $mail->AddAttachment($file_name);             //Adds an attachment from a path on the filesystem
  $mail->Subject = 'Invoice';     //Sets the Subject of the message
  $mail->Body = 'Please Find Customer details in attach PDF File.';       //An HTML or plain text message body
  if($mail->Send())               //Send an Email. Return true on success or false on error
  {
    $message = '<label class="text-success">Customer Details has been send successfully...</label>';
  }
  unlink($file_name);
  $i=$i+1;
}

$stm = "delete from payment5 where CID='$idc'";
$qr = oci_parse($connect,$stm);
$ex = oci_execute($qr);
if($qr)
{
  header("Location:index2.php");
}

}


?>




<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <style>
 .col-4{
   background:black;
   color:white;
   text-align:center;
   padding:10px;
   margin:180px auto;
   width:400px;
   height:350px;
 }
 form select{
   color:black;
 }
 </style>
  </head>
  <body>


  <div class="row">
        <div class="col-4">
                                                <div >
                                                    <h3 ><b>Grand Total </b></h3>
                                                  
                                                    <h5 >Select your suitable time</h5 style="text-align:center;">
                                                    <br>
                                                    
                                                    <form action="" method="post" style="">
                                                        <select name="day" class="right">
                                                            

                                                              
                                                                <?php

                                                                  $dateTime = new DateTime();
                                                                $dateTime->format('Y-m-d H:i:s');
                                                  
                                                                
                                                              
                                                             if ($dateTime->format('D') == 'Wed')
                                                                { 
                                                                  if($hour < 10) 
                                                                  {
                                                                    echo "<option value='thu'>Thursday</option>";
                                                                    echo "<option value='fri'>Friday</option>";
                                                                    echo "<option value='next wed'> Next Wednesday</option>";

                                                                  }
                                                                  
                                                                   
                                                                }
                                                              
                                                            elseif ($dateTime->format('D')== 'Thu')
                                                                {  
                                                                   echo " <option value='fri'>Friday</option>";
                                                                   echo " <option value='next wed'>Next wednesday</option>";
                                                                    echo "<option value='next thu'>Next Thursday</option>";
                                                                        
                                                                }
                                                              elseif ($dateTime->format('D')== 'Fri')
                                                                {  
                                                                  echo "  <option value='next wed'>Next Wednesday</option>";
                                                                  echo "   <option value='next thu'>Next Thursday</option>";
                                                                  echo "  <option value='next fri'>Next Friday</option>"; 
                                                       
                                                                }
                                                              
                                                             else                                                              {  
                                                                   echo "  <option value='wed'>Wednesday</option>";
                                                                 echo "   <option value='thu'>Thursday</option>";
                                                                 echo "  <option value='fri'>Friday</option>";                                                                        
                                                                }

                                                              ?>

                                                                  
                                                              


                                                              
                                                               
                                                        </select>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <select name="time" class="right">
                                                        <?php
                                                        $startDate = time();
                                                        $starttime = date('H', strtotime('+1 day', $startDate));
                                                        if($starttime < 15 )
                                                        {
                                                          echo "<option value='10AM - 1PM'>10AM - 1PM</option>
                                                          <option value='1PM - 4PM'>1PM - 4PM</option>
                                                          <option value='4PM - 7PM' selected>4PM - 7PM</option>";
                                                        }
                                                        else if(($starttime > 15) AND ($starttime < 19) )
                                                        {
                                                          echo "<option value='10AM - 1PM' disabled>10AM - 1PM</option>
                                                          <option value='1PM - 4PM'>1PM - 4PM</option>
                                                          <option value='4PM - 7PM' selected>4PM - 7PM</option>";
                                                        }
                                                        else if(($starttime > 19) AND ($starttime < 22))
                                                        {
                                                          echo "<option value='10AM - 1PM' disabled>10AM - 1PM</option>
                                                          <option value='1PM - 4PM' disabled>1PM - 4PM</option>
                                                          <option value='4PM - 7PM' selected>4PM - 7PM</option>";
                                                        }
                                                        else {
                                                          echo "<option value='10AM - 1PM'>10AM - 1PM</option>
                                                          <option value='1PM - 4PM'>1PM - 4PM</option>
                                                          <option value='4PM - 7PM'>4PM - 7PM</option>";
                                                        }
                                                        ?>
                                                        
                                                                  
                                                        </select>
                                                        <br>
                                                        <br>
                                                        <h5 >Your slot timing must be after 24 hours only. </h5>

                                                    <input type="submit" name="submit" value="slot" class="btn btn-primary">
                                                        
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                        </div>
  </body>
  </html>