<?php
ob_start();
session_start();
?>
</html>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_home.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleform.css">
    <!-- style part here, before title part--> 
    <style>
        .container{
            border: 3px solid black;
            padding: 1%;
            background-color: whitesmoke;
        }
    </style>
    <title>Book Now</title>
  </head>

  <body>
  <br/><br/><br/>
    <div>
        <nav>
    <div class="logo"><a href="../html-php/home.php">Tusti Resort</a></div>
    
        <ul>
            <li><a href="../html-php/home.php">Home</a></li>
            <li><a href="../html-php/info.php">Info</a></li>
            <li><a href="../html-php/CheckBookingStatus.php">Check Booking Status</a></li>
            <li><a href="../html-php/review.php">Reviews</a></li>
        </ul>
        
    </nav>
    </div>

    <div class="mx-auto container mt-5 bg-secondary" style="width: 50%;">
        <h2 style="text-align: center;">Check Availability</h2>
        <div id="form-conent">
        <form action= "booking.php" method="POST">

            <div class="row">
                <div class="col m-2">
                <label for="checkin"><b>Check-In Date:</b></label><br>
                <input type="date" id="check-in" name="check-in" placeholder="yyyy-mm-dd" min="<?php 
                date_default_timezone_set("Asia/Dhaka"); echo date("Y-m-d") ?>" value="<?php  echo date("Y-m-d") ?>"><br>
                </div>

                <div class="col m-2">
                <label for="checkout"><b>Check-Out Date:</b></label><br>
                <input type="date" id="check-out" name="check-out"placeholder="yyyy-mm-dd" min="<?php 
                $date= date_create(date("Y-m-d"));
                $date_checkout= date_add($date, date_interval_create_from_date_string("1 days"));
                date_default_timezone_set("Asia/Dhaka"); echo date_format($date_checkout, "Y-m-d"); ?>"
                value="<?php  echo date_format($date_checkout, "Y-m-d"); ?>"><br>
                </div>
            </div>
            
            <label class="m-1"for="accomodate"><b> Accomodation:</b></label><br>
            <select class="form-control m-2" aria-describedby="basic-addon1" data-toggle="tooltip"
                title="Accomodation" name="nameofaccomodation" onchange="mylang(this.value)">
                <option>---Accomodation---</option>
                <option>Room</option>
                <option>Villa</option>
                <option>Meeting</option>
            </select>
            <label class="ml-2" for="typeacc"><b> Type:</b></label><br>
            <select class="form-control m-2" id="frameworklist" aria-describedby="basic-addon1" data-toggle="tooltip"
                title="Type" name="typeofaccomodation">
                <option>---Type---</option>
            </select>
            <!--<button type="button" name="checkbutton222222" class="btn btn-dark m-2">Check Availability</button>
-->         <input class="btn btn-dark m-2" type="submit" name="checkbutton" value="Check Availability">
        </form>

        </div>
    </div>
 
    <?php
    // checkbutton- codes here
    $username = "root";
    $password = "test";
    $server = "db";
    $database = "rms";
    
        $con = mysqli_connect($server,$username,$password,$database);
        if($con){
                if(isset($_POST["checkbutton"])){ // if the button pressed
                    $checkin = $_POST["check-in"];  // these information are collected from the webpage form
                    $checkout = $_POST["check-out"];
                    $typeaccomodation = $_POST["nameofaccomodation"];
                    // echo $typeaccomodation;
                    $nameaccomodation = $_POST["typeofaccomodation"];
                    // echo $nameaccomodation;
                    
                    $date1= date_create("$checkin");
                    $date2= date_create("$checkout");  // use double quotation
                    $diff= date_diff($date1, $date2);
                   // echo $diff->format("%r %a days");
                    if($diff->format("%r")== "-"){ // if the check out date is selected wrong
                        ?>
                        <script>
                            alert("Please select date carefully!");
                        </script>
                        <?php
                    }else{
                        $count= 0;
                        if($typeaccomodation== "Room"){
                            $querytype=" select * from rooms where type= '$nameaccomodation'";
                            $res = mysqli_query($con,$querytype) or die(mysqli_error($con));
                            $count = mysqli_num_rows($res);
                        }elseif($typeaccomodation== "Villa"){
                            $querytype=" select * from villas where type= '$nameaccomodation'";
                            $res = mysqli_query($con,$querytype) or die(mysqli_error($con));
                            $count = mysqli_num_rows($res);
                        }elseif($typeaccomodation== "Meeting"){
                            $querytype=" select * from meeting where name= '$nameaccomodation'";
                            $res = mysqli_query($con,$querytype) or die(mysqli_error($con));
                            $count = mysqli_num_rows($res);
                        }else{
                            ?>
                            <script>
                                alert("Please select input first!");
                                header("Location: ../html-php/booking.php");
                            </script>
                        <?php
                        }
               
                        if($count==1){
                           
                                $row = mysqli_fetch_assoc($res);
    
                                if($typeaccomodation== 'Room'){
                                    $availablecheck= $row['Available']; // case sensitive
                                    $src= $row['image'];
                                    $detail= $row['detail'];
                                    $rate = $row['Rate'];
                                }elseif($typeaccomodation== 'Villa'){
                                    $availablecheck= $row['Available']; // case sensitive
                                    $src= $row['image'];
                                    $detail= $row['detail'];
                                    $rate = $row['Rate'];
                                }elseif($typeaccomodation== 'Meeting'){
                                    $availablecheck= $row['Available']; // case sensitive
                                    $src= $row['image'];
                                    $detail= $row['detail'];
                                    $rate = $row['Rate'];
                                }else{
                                        ?>
                                            <script>
                                                alert("No data input found!");
                                                header("Location: ../html-php/booking.php");
                                            </script>
                                        <?php
                                }
                                $checkbookingq= "Select * from booking";
                                $queryqq = mysqli_query($con,$checkbookingq);
                                while($res = mysqli_fetch_array($queryqq)){
                                    $checkoutdatefromdb= $res['checkoutdate'];
                                    $accomodationnumberfromdb= $res['accomodationnumber'];
                                    //echo $accomodationnumberfromdb;
                                    $accomodationnamefromdb= $res['accomodationname'];
                                    $date3= date_create("$checkoutdatefromdb"); //double quotation for string-date
                                    $date4= date_create("$checkin"); //double quotation for string-date
                                    $diff2= date_diff($date3, $date4);   // newcheckin- oldcheckout
                                    // note, %R or %r takes 0 as positive, so be careful
                                    if($accomodationnamefromdb== $nameaccomodation && $diff2->format("%R")== "+" && $diff2->format("%a")!=0){ // R priors +ve, and r priors -ve
                                        if($typeaccomodation== "Room" || $typeaccomodation== "Villa" ){
                                            $availablecheck = $availablecheck + $accomodationnumberfromdb;
                                        }else if($typeaccomodation== "Meeting"){
                                            $availablecheck= "Yes";
                                        }
                                    }

                                }
                                    if($availablecheck >= 1 || $availablecheck >= 'Yes' ){
                                            ?><br/>

                                            <div class="container">
                                                <form action="booknow.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <?php $sourceimage= "../html-php/uploads/$src"; ?>
                                                            <img src=<?php echo "$sourceimage"; ?> class="rounded mx-auto d-block" alt="images" style="width:100%; height:auto;">
                                                        </div>
                                                        <div class="col-7">
                                                            <h1><?php echo $typeaccomodation;   ?> </h1>
                                                            <h3><?php echo $nameaccomodation;   ?> </h3>
                                                            <p><?php echo $detail;   ?> </p>
                                                        </div>
                                                        <div class="col-2">
                                                            <h6>Available:</h6><br>
                                                            <h1><?php echo $availablecheck;   ?></h1>
                                            
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $date1= date_create("$checkin");
                                                    $date2= date_create("$checkout");  // use double quotation
                                                    $diff= date_diff($date1, $date2);
                                                    $days = $diff->format("%a");
                                                    ?>
                                                    <div class="row mx-auto" style="width: 25%">
                                                       <!-- <input type="submit" name= "okbooknow" class="btn btn-outline-success" value="Book Now OLD"> -->
                                                        <?php $reference= "booknow.php?indate=".$checkin."&outdate=".$checkout."&avl=".$availablecheck."&accname=".$nameaccomodation."&acctype=".$typeaccomodation."&rate=".$rate."&days=".$days?>
                                                       <a type="input" class="btn btn-outline-success" href="<?php echo $reference //don't forget to echo?>">Book Now</a> 
                                                       
                                                    </div>
                                                </form>  
                                            </div><br/> 
                                            
                                            <?php
                                            
                                            //echo $availablecheck;
                                            // header("Location: ../html-php/home.php");
                                        }else{
                                            ?>
                                                <script>
                                                alert("Sorry, accomodation not available\nTry with another type or date");
                                                </script>
                                            <?php
                                        }
                            }
                        else
                            {
                                ?>
                                    <script>
                                   //alert("Incorrect Information");
                                    </script>
                                <?php
                            }
                    }
                }  
            if(isset($_POST["okbooknow"])){
                //$qqq= 'update.php?idno=$res[id]&nm=$res[name]&usr=$res[username]&adr=$res[address]&em=$res[email]&cn=$res[phone]';
                ?>
                <script>
                header("Location: ../html-php/bo.php");/////////////////////////////////////////////////////////////////////////////////////////////////
                alert("Hi there!");
                </script> 
                <?php
            }
        }
        else{
            die("No connection.." . mysqli_connect_error());
        }
    ?>

    <script>
        function mylang(data){
            const ajaxreq= new XMLHttpRequest();
            ajaxreq.open('GET', 'http://localhost../html-php/getdata.php?selectvalue=' +data, 'TRUE' );
            ajaxreq.send();

            ajaxreq.onreadystatechange= function(){
                if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
                    document.getElementById('frameworklist'). 
                    innerHTML= ajaxreq.responseText;
                }
            }
        }
    // $(document).ready(function(){
    //     $('[data-toggle= "tooltip"]').tooltip();
    // });
    </script>


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

<?php

// - book now clicking and then pass information
// - info----> (check in date, check out date ) from form, accomodation type , accomodation name, availability

?>