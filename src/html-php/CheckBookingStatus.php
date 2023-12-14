<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleform.css">
    <link rel="stylesheet" href="../css/style_home.css">

    <style>
        .container
        {
            border: 3px solid black;
            padding: 1%;
            background-color: whitesmoke;
        }
    </style>
    <title>Check Booking Status</title>
</head>
<body>
<br/><br/><br/><br/>
<nav>
    <div class="logo"><a href="../html-php/home.php">Tusti Resort</a></div>
    
        <ul>
            <li><a href="../html-php/home.php">Home</a></li>
            <li><a href="../html-php/info.php">Info</a></li>
            <li><a href="../html-php/CheckBookingStatus.php">Check Booking Status</a></li>
            <li><a href="../html-php/review.php">Reviews</a></li>
        </ul>
        
    </nav>

    
    <div class="container-fluid bg-light">
    <div class="container mx-auto bg-secondary" style="width: 50%" >
            <form action="CheckBookingStatus.php" method="POST" class="mx-auto">
                    <div class="row mb-3">
                        <h1 style="text-align:center;">Check Booking Status</h1> 
                    </div>
                    
                    <div class="row m-3">
                        <label for="mail" class="form-label"><b>Email:</b></label>
                        <input class="form-control" type="email" name="email" placeholder="" required>
                    </div>
                    <div class="row m-3">
                        <label for="id" class="form-label"><b>Booking ID:</b></label>
                        <input class="form-control" type="text" name="id" placeholder="" required>
                    </div>
                    <div class="row mx-auto m-3" style="width: 25%">
                        <input type="submit" name="submit" class="btn btn-light btn-outline-dark" value="Check Status">
                    </div>      
            </form><br/>
    </div>
    </div>
    <?php
        include 'connection.php';
        if(isset($_POST["submit"])){
            $email= $_POST['email'];
            $id = $_POST['id'];
            $query= "select * from booking where bookingid='$id' and email='$email'";
            $queryB= "select * from checkin where bookingid='$id' and email='$email'";
                // a query to check data from the checkin table also
            $res2 = mysqli_query($con, $queryB);
            $num2 = mysqli_num_rows($res2);
            // a query to check data from the checkin table also
            $res = mysqli_query($con, $query);
            $num = mysqli_num_rows($res);
            if($num==1){
                while($row = mysqli_fetch_array($res))
                {
                    $bookingId = $row['bookingid'];
                    $mail =$row['email'];
                    $checkin = $row['checkindate'];
                    $checkout = $row['checkoutdate'];
                    $name = $row['username'];
                    $type = $row['accomodationtype'];
                    $acname= $row['accomodationname'];
                    $number = $row['accomodationnumber'];
                    $bill = $row['bill'];
                    $status = $row['bookingstatus'];
                    ?>
                    <div class="container m-5 mx-auto">
                    <div class="row mb-3">
                        <h1 style="text-align:center;">Booking Deatils</h1> 
                    </div>
                    <form action="CheckBookingStatus.php" method="POST">
                    <div class="row">
                        <div class="col-3">
                            <label for="id" class="form-label"><b>Booking ID:</b></label>
                            <input class="form-control" type="text" name="idfromdetailsform" placeholder="<?php echo $bookingId?>" readonly>

                            <label for="mail" class="form-label"><b>Mail Address:</b></label>
                             <input class="form-control" type="mail" name="mailfromdetailsform" placeholder="<?php echo $mail?>" readonly>

                             <label for="status" class="form-label"><b>Booking Status:</b></label>
                             
                             <input class="form-control"  type="text" name="bookingstatus" placeholder="<?php echo $status?>" readonly>
                             
                        </div>
                        <div class="col-6">
                            <p><b>User Name: </b><?php echo $name?></p>
                            <p><b>Checkin Date: </b><?php echo $checkin?></p>
                            <p><b>Checkout Date: </b><?php echo $checkout?></p>
                            <p><b>Accomodation Type: </b><?php echo $type?></p>
                            <p><b>Accomodation Name: </b><?php echo $acname?></p>
                            <p><b>Booked Accomodation Number: </b><?php echo $number?></p>
                            <p><b>Total Bill: </b><?php echo $bill?></p>
                        </div>
                        <div class="col-3 mx-auto m-3" style="width: 25%">
                       
                        <?php $reference= "cancellationconfirm.php?id=".$bookingId."&MAIL=".$mail?>
                        <a type="input" class="btn btn-outline-danger" href="<?php echo $reference //don't forget to echo?>">Cancel Booking</a> 

                        </div>
                    </div>
                    </form>

                    </div><?php
                }
            }else if($num2==1){// here write the code portion
                    while($row = mysqli_fetch_array($res2))
                    {
                        $bookingId = $row['bookingid'];
                        $mail =$row['email'];
                        $checkin = $row['checkindate'];
                        $checkout = $row['checkoutdate'];
                        $name = $row['username'];
                        $type = $row['accomodationtype'];
                        $acname= $row['accomodationname'];
                        $number = $row['accomodationnumber'];
                        $bill = $row['bill'];
                        $status = $row['bookingstatus'];
                        ?>
                        <div class="container m-5 mx-auto">
                        <div class="row mb-3">
                            <h1 style="text-align:center;">Booking Deatils</h1> 
                        </div>
                        <form action="CheckBookingStatus.php" method="POST">
                        <div class="row">
                            <div class="col-3">
                                <label for="id" class="form-label"><b>Booking ID:</b></label>
                                <input class="form-control" type="text" name="idfromdetailsform" placeholder="<?php echo $bookingId?>" readonly>
    
                                <label for="mail" class="form-label"><b>Mail Address:</b></label>
                                 <input class="form-control" type="mail" name="mailfromdetailsform" placeholder="<?php echo $mail?>" readonly>
    
                                 <label for="status" class="form-label"><b>Booking Status:</b></label>
                                 
                                 <input class="form-control"  type="text" name="bookingstatus" placeholder="<?php echo $status?>" readonly>
                                 
                            </div>
                            <div class="col-6">
                                <p><b>User Name: </b><?php echo $name?></p>
                                <p><b>Checkin Date: </b><?php echo $checkin?></p>
                                <p><b>Checkout Date: </b><?php echo $checkout?></p>
                                <p><b>Accomodation Type: </b><?php echo $type?></p>
                                <p><b>Accomodation Name: </b><?php echo $acname?></p>
                                <p><b>Booked Accomodation Number: </b><?php echo $number?></p>
                                <p><b>Total Bill: </b><?php echo $bill?></p>
                            </div>
                            <div class="col-3 mx-auto m-3" style="width: 25%">
                            
                            </div>
                        </div>
                        </form>
    
                        </div><?php
                    }
                
            }else{ ?>
                <script>
                    alert("Please enter correct booking id and mail");
                </script><?php
            }
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>