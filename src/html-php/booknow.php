<?php
include 'connection.php';
error_reporting(0);


$checkindatebn= $_GET['indate'];
//$dtchkin= date_create($checkindatebn);
$checkoutdatebn = $_GET['outdate'];
$avaliablebn = $_GET['avl'];
$accomodationnamebn = $_GET['accname'];
$accomodationtypebn = $_GET['acctype'];
$rate = $_GET['rate'];
$days = $_GET['days'];
if($accomodationtypebn == "Meeting"){
    $avaliablebn = 1; 
} //bn for booknow
?>
<!DOCTYP
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .container{
            border: 3px solid black;
            padding: 1%;
            background-color: whitesmoke;
        }
    </style>
    <title>Booking Page</title>
  </head>
  <body>
    <!--booking form part-->
    <div class="container-fluid bg-secondary">
        <h1 style="text-align:center;">Booking Form</h1>
        <div class="container mx-auto bg-light" style="width: 50%" >
            <form action="booknow.php" method="POST" class="mx-auto">
                    <div class="row m-3">
                        <label for="Checkin"  class="form-label"><b>Check-in Date:</b></label>
                        <input class="form-control" type="date" name="checkin" placholder="yyyy-mm-dd" value="<?php echo $checkindatebn; ?>" readonly>
                    </div>
                    <div class="row m-3">
                        <label for="Checkout" class="form-label"><b>Check-out Date:</b></label>
                        <input class="form-control" name="checkout"type="date" placholder="yyyy-mm-dd" value="<?php echo $checkoutdatebn; ?>" readonly>
                    </div>
                    <div class="row m-3">
                        <label for="Accomodation" class="form-label"><b>Accomodation Name:</b></label>
                        <input class="form-control" name= "accomodationnamebn"type="text" placeholder="Accomodation Name" value="<?php echo $accomodationnamebn; ?>" readonly>
                    </div>
                    <div class="row m-3">
                        <label for="type" class="form-label"><b>Accomodation Type</b></label>
                        <input class="form-control" type="text" name="accomodationtypebn" placeholder="Accomodation Type" value="<?php echo $accomodationtypebn; ?>" readonly>
                    </div>
                    <div class="row m-3">
                        <label for="AccomodationNumber" class="form-label"><b>Required Accomodation Number:</b></label>
                        <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="<?php echo $avaliablebn; ?>" step="1" value="1" onchange="mult(this.value);">
                    </div>
                    <script>
                        function mult(value){
                            var datediff = '<?=$days?>';
                            var rate = '<?=$rate?>';
                            var x =rate * value * datediff;
                            document.getElementById('bill').value= x;
                        }
                    </script>
                    <div class="row m-3">
                        <label for="type" class="form-label"><b>Total Bill:</b></label>
                        <input class="form-control" type="text" id="bill" name="bill" value="<?php echo $rate*$days; ?>" readonly> <!-- compiled --> 
                    </div>
                    <div class="row m-3">
                        <h3 style="text-align:center;">Customer Information</h3> 
                    </div>
                    <div class="row m-3">
                        <label for="name" class="form-label"><b>Name:</b></label>
                        <input class="form-control" type="text" name="name" placeholder="" required>
                    </div>
                    <div class="row m-3">
                        <label for="mail" class="form-label"><b>Email:</b></label>
                        <input class="form-control" type="email" name="email" placeholder="" required>
                    </div>
                    <div class="row m-3">
                        <label for="phone" class="form-label"><b>Phone Number:</b></label>
                        <input class="form-control" type="text" name="phoneno" placeholder="" required>
                    </div>
                    <div class="row mx-auto m-3" style="width: 25%">
                    <input type="submit" name="submit" class="btn btn-outline-dark" value="Confirm Booking">
                    </div>

                    <div class="row mx-auto m-3" style="width: 25%" >
                    <a href= "../html-php/booking.php" role="button" class="btn btn-outline-danger">Cancel</a>
                    </div>    
            </form>
        </div>
    <br>
        <?php 
        include 'connection.php';
        if($_POST['submit']){
            $checkindatebnw= $_POST["checkin"];
            $dtchkin= date_create($checkindatebnw);
            $checkoutdatebnw= $_POST["checkout"];
            $dtchkout= date_create($checkoutdatebnw);

            $accomodationtypebn= $_POST["accomodationtypebn"];
            $accomodationnamebn= $_POST["accomodationnamebn"];
            $accomodationnumber= $_POST['quantity']; // how many to book now
            $bill= $_POST["bill"];
            $nameofUser= $_POST['name'];
            $email= $_POST['email'] ;
            $phonenumber=$_POST['phoneno'];
            // for updating rooms/villas/meeting table
            //$reserved= ;
            $queryinsert= "INSERT INTO `bookingtemp`(`username`, `email`, `phonenumber`, `checkindate`, 
            `checkoutdate`, `accomodationtype`, `accomodationname`, `accomodationnumber`, `bookingstatus`, `bill`) 
            VALUES ('$nameofUser','$email','$phonenumber','$checkindatebnw','$checkoutdatebnw','$accomodationtypebn',
            '$accomodationnamebn','$accomodationnumber','Reserved',
            '$bill')";

            $insert= mysqli_query($con, $queryinsert);

            if($insert){ 
                ?>  <script>
                     
                     window.location.href="SSLCOMMERZ/checkout.php?amount=<?php echo $bill?>";
                    
                    </script> <?php
                                
                    //header("Location: https://www.tutorialrepublic.com/faq/how-to-make-a-redirect-in-php.php");
                    //header don't work here
            }else{
                ?>  <script>
                alert("Error 4040404");
                </script> <?php
            }


            
            
        }//post method if condition
        
        ?>



    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>