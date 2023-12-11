<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/RMS/css/style.css">
    <link rel="stylesheet" href="/RMS/css/style_home.css">
    <title>Special Offers</title>
    <style>
        .middle{
    width:100%;
    height: 400px;
    background-image: url("/RMS/img/home1.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-attachment: scroll;
    text-align: center;
    font-size: 25px;
    margin-bottom: 10px;
    animation: slider 12s infinite linear;
    }
    @keyframes slider{
    0%{
        background-image: url("/RMS/img/home1.jpg");
    }
    35%{
        background-image: url("/RMS/img/home2.jpg");
    }
    75%{
        background-image: url("/RMS/img/home3.jpg");
    }
    }
.middle h1{
    font-size: 75px;
    font-style: oblique;
    color: rgb(34, 2, 2);  
}
    </style>
</head>
<body>
<br/><br/><br/>
<nav>
    <div class="logo"><a href="/RMS/html-php/home.php">Tusti Resort</a></div>
    
    <ul>
            <li><a href="/RMS/html-php/home.php">Home</a></li>
            <li><a href="/RMS/html-php/rooms.php">Rooms</a></li>
            <li><a href="/RMS/html-php/villas.php">Villas</a></li>
            <li><a href="/RMS/html-php/meeting.php">Meeting</a></li>
            <li><a href="/RMS/html-php/dining.php">Dining</a></li>
            <li><a href="/RMS/html-php/offers.php">Special Offers</a></li>
            <li><a href="/RMS/html-php/booking.php">Book Now</a></li>
            <li><a href="/RMS/html-php/review.php">Reviews</a></li>
        </ul>
        
</nav>

<?php
    include 'connection.php';
    $queryh = "select * from offer";
    $res= mysqli_query($con,$queryh);
    $i= 1;
    while($row= mysqli_fetch_array($res)){
        $name = $row['offername'];
        $details = $row['offerdetails'];
        $filenameh = $row['imageaddress'];

        if($i % 2==0){
            ?>
            <div class="headerl">
            <h1 style="color: black">
                <?php echo "$name"; ?>
            </h1>
            <?php $sourceimage= "/RMS/html-php/uploads/$filenameh"; ?>
            <a href="/RMS/html-php/booking.php"><img src= <?php echo $sourceimage ?> alt="Offer"></a>
            <p style="font-size: 25px;text-align: left; padding: 0;margin: 0;"><b>Offer Includes:</b></p>
                <p style="font-size: 25px;"> <?php echo $details ?> </p> <br/>
            <p><a href="/RMS/html-php/booking.php">Book Now</a><p>
            
            </div>   
            
            <?php
        }else{
            ?>
            <div class="header2"> 
            <h1 style="color: rgb(181,101,29)">
                <?php echo "$name"; ?>
            </h1>
            <?php $sourceimage= "/RMS/html-php/uploads/$filenameh"; ?>
            <a href="/RMS/html-php/booking.php"><img src= <?php echo $sourceimage ?> alt="Offer"></a>
            <p style="font-size: 25px;text-align: left; padding: 0;margin: 0;"><b>Offer Includes:</b></p>
                <p style="font-size: 25px;"> <?php echo $details ?> </p> <br/>
            <p><a href="/RMS/html-php/booking.php">Book Now</a><p>
            
            </div>   
            
            <?php
        }
        $i++;
    }
?>
    <div class="footer">
        <p style="font-size: 60px;"><b>Tusti Resort</b></p><br>
        <p style="font-size: 20px;">59/A,Mouchak,Gazipur,Dhaka</p><br>
        <p style="font-size: 15px;">Contact Us: +880 01712577638, Hotline:  +880 1617005522</p>
    </div>
</body>
</html>