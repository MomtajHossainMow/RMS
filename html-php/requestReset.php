<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

if(isset($_POST['email'])){
  //now a query should be checked first that the given input email is in the admin table or not.
  // if not in the admin table, email to reset password should not be sent.

    $emailto= $_POST['email'];
    $code= uniqid(true);    
    $queryA= "insert into resetp(code, email) values ('$code', '$emailto')";
    
    if(!$queryA){
        exit("Error message will be shown here");
    }
    $query= mysqli_query($con, $queryA);
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
        $url= "http://" .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/resetPassword.php?code=" .$code ;
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your password reset link';
        $mail->Body    = "<h1> You requested a password reset </h1> Click <a href= '$url'> This link </a> to do so";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Reset password link has been sent to your email address';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    } 
    exit();
}
?>


<!--template for bootstrap 5-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Reset Password</title>
  </head>
  <body>
      <div class="container-fluid">
          <div class="container mx-auto m-5 bg-secondary" style="width: 50%">
            <form method="POST">
                <br>
                <div class="row mt-2">
                    <h4 style="text-align: center;">Reset Password</h4>
                </div>
                <div class="row mx-auto" style="width: 75%">
                <input type="text" name="email" placeholder="email address" autocomplete="off">
                </div>
                <div class="row mx-auto m-2" style="width: 30%">
                <input type="submit" name="submit" value="Reset code to email">
                </div>
                <br>
            </form>
          </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>