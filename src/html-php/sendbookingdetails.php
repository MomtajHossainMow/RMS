<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';


    if(1){
        $queryA= "select * from booking where bookingid= (select MAX(bookingid) from booking)";
        $query= mysqli_query($con, $queryA);
        if(!$query){
            exit("Error message will be shown here");
        }
        
        while($row = mysqli_fetch_array($query)){
        $id= $row['bookingid'];
        $name= $row['username'];
        $emailto= $row['email'];
        $phone= $row['phonenumber'];
        $checkin= $row['checkindate'];
        $checkout= $row['checkoutdate'];
        $type= $row['accomodationtype'];
        $acname= $row['accomodationname'];
        $number= $row['accomodationnumber'];
        $bill= $row['bill'];
        }
        $mail = new PHPMailer(true);
        try {
            //Server settings                    //Enable verbose debug output
            $phpmailer = new PHPMailer();
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                           //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '940278b18579ff';                     //SMTP username
            $mail->Password   = '9c80770156d894';                               //SMTP password
            $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;           //Enable implicit TLS encryption
            $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('abuyousufsiam7249@gmail.com', 'A.y. Siam');
            $mail->addAddress("$emailto");     //Add a recipient
            $mail->addReplyTo('no-reply@example.com', 'No reply');

            //Content
            //$url= "http://" .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/resetPassword.php?code=" .$code ;
            $detailsTR= "<p>Booking ID: " .$id. "</p><p>Name: " .$name. " </p><p>Phone Number:  ".$phone."</p><p>Check-In Date: ".$checkin.
            "</p><p>Check-Out Date: ".$checkout."</p><p>Accomodation Type: ".$type."</p><p>Accomodation Name: ".$acname.
            "</p><p>Accomodation Number: ".$number."</p><p>Bill Total: ".$bill."</p>";

        
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Booking Details';
            $mail->Body    = "<h1> Details </h1> $detailsTR ";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            //echo 'Your booking details has been sent to your email address. Check your email.';
            ?>  <script>
                alert("Your booking details has been sent to your email address. Check your email.");
            window.location.href="home.php";
            </script> <?php
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        } 
        exit();
    }

?>