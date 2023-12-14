<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_home.css">
    
    <title>Meetings</title>
    <style>
                .middle{
                width:100%;
                height: 500px;
                background-image: url("../img/conference-hall.jpg");
                background-size: 100% 100%;
                background-repeat: no-repeat;
                background-attachment: scroll;
                text-align: center;
                font-size: 25px;
                margin-bottom: 10px;
                border-bottom: 1px black;
                animation: slider 20s infinite linear;
            }

        @keyframes slider{
       0%{
            background-image: url("../img/conference-hall.jpg");
        }
        25%{
            background-image: url("../img/dining-hall.jpg");
        }
        50%{
            background-image: url("../img/large-meeting.jpg");
        }
        75%{
            background-image: url("../img/small-meeting.jpg");
        }
        100%{
            background-image: url("../img/lounge-room.jpg");
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
    <div class="logo"><a href="../html-php/home.php">Tusti Resort</a></div>
    
    <ul>
            <li><a href="../html-php/home.php">Home</a></li>
            <li><a href="../html-php/rooms.php">Rooms</a></li>
            <li><a href="../html-php/villas.php">Villas</a></li>
            <li><a href="../html-php/meeting.php">Meeting</a></li>
            <li><a href="../html-php/dining.php">Dining</a></li>
            <li><a href="../html-php/offers.php">Special Offers</a></li>
            <li><a href="../html-php/booking.php">Book Now</a></li>
            <li><a href="../html-php/review.php">Reviews</a></li>
        </ul>
        
    </nav>

    <div class="middle">
        <h1>Tusti Resort</h1>
        <p style = "color: rgb(250, 248, 248);">"Discover a resort that defines a new dimension of luxury."</p>
    </div>

    <div class="info">

        <h1>MEETING ROOMS & HALLS</h1>
        <br>
        <p style="font-size: 30px;">Features and facilities:</p>
        <ul>
                <li>A 120 seater main Conference Hall. (Theater Style seating)</li>
                <li>A 80 seater Dining Hall</li>
                <li>A Lounge Room</li>
                <li>A 19 seater large Meeting Room</li>
                <li>A 7 seater small Meeting Room</li>
                <li>20 rooms accommodating upto 60 persons</li>
                <li>Business Center</li>
                <li>Car Parking for 40 vehicles</li>
        </ul>
    </div>

    <?php
    include 'connection.php';
    $queryh = "select * from meeting";
    $res= mysqli_query($con,$queryh);
    $i= 1;
    while($row= mysqli_fetch_array($res))
    {
        //`Name`, `Available`, `Capacity`, `Rate`, `image`, `detail
        $name = $row['Name'];
        $capacity= $row['Capacity'];
        $rate = $row['Rate'];
        $filenameh = $row['image'];
        $detail = $row['detail'];
        $avail = $row['Available'];

        if($i % 2==0)
        {
            ?>
            <div class="headerl"> 
                <h1 style="text-align: center;"> <?php echo "$name"; ?></h1>
                <?php $sourceimage= "../html-php/uploads/$filenameh"; ?>
                <a href="../html-php/booking.php"><img src=<?php echo "$sourceimage";?> alt="villa"></a>
                <p>
                    <b>Capacity: </b><?php echo "$capacity"; ?> persons<br>
                    <b>Rates: </b><?php echo "$rate"; ?>++<br>
                    <b>Available: </b> <?php echo "$avail"; ?><br>
                </p>
                <p>
                    <?php echo "$detail"; ?>
                </p>
                <p><a href="../html-php/booking.php">Book Now</a></p>
            </div>   
    <?php
    }
    else{
            ?>
            <div class="header2"> 
                <h1 style="text-align: center;"> <?php echo "$name"; ?></h1>
                <?php $sourceimage= "../html-php/uploads/$filenameh"; ?>
                <a href="../html-php/booking.php"><img src=<?php echo "$sourceimage";?> alt="villa"></a>
                <p>
                    <b>Capacity: </b><?php echo "$capacity"; ?> persons<br>
                    <b>Rates: </b><?php echo "$rate"; ?>++<br>
                    <b>Available: </b> <?php echo "$avail"; ?><br>
                </p>
                <p>
                    <?php echo "$detail"; ?>
                </p>
                <p><a href="../html-php/booking.php">Book Now</a></p>
            </div>   
            
<?php
        }
        $i++;
    }
?>
    
    <!-- footer -->
    <div class="footer" style="margin-bottom:0px;">
        <p style="font-size: 60px;"><b>Tusti Resort</b></p><br>
        <p style="font-size: 20px;">59/A,Mouchak,Gazipur,Dhaka</p><br>
        <p style="font-size: 15px;">Contact Us: +880 01712577638, Hotline:  +880 1617005522</p>
    </div>

</body>
</html>