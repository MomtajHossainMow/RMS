<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_home.css">
    <title>Tusti Resort</title>
    <style>
        
        .middle{
    width:100%;
    height: 400px;
    background-image: url("../img/home1.jpg");
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
        background-image: url("../img/home1.jpg");
    }
    35%{
        background-image: url("../img/home2.jpg");
    }
    75%{
        background-image: url("../img/home3.jpg");
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

    <!--navigation bar-->
    <br/><br/><br/>
<div>
    <nav>
    <div class="logo"><a href="../html-php/home.php">Tusti Resort</a></div>
    
        <ul>
            <li><a href="../html-php/home.php">Home</a></li>
            <li><a href="../html-php/rooms.php">Rooms</a></li>
            <li><a href="../html-php/villas.php">Villas</a></li>
            <li><a href="../html-php/meeting.php">Meeting</a></li>
            <li><a href="../html-php/dining.php">Dining</a></li>
            <li><a href="../html-php/offers.php">Special Offers</a></li>
            <li><a href="../html-php/review.php">Reviews</a></li>
            <li><a href="../html-php/booking.php">Book Now</a></li>
            <li><a href="../html-php/info.php">Info</a></li>
            <li><a href="../html-php/login.php">Log In</a></li>
            
        </ul>
        
    </nav>
</div>

   <div class="middle">
       <h1>Tusti Resort</h1>
       <p style = "color: rgb(250, 248, 248);">"Discover a resort that defines a new dimension of luxury."</p>
   </div>

   <div class="div1">
        <div class="left">
            <h3>Feel luxury and peace in</h3> <br>
            <h3>"TUSTI RESORT"</h3>
        </div> 
        <div class="right">
            <h4>ADDED ATTRACTIONS!!!</h4>
            <ul>
                <li><i class="fa fa-coffee" style="font-size:36px;color:rgb(250, 248, 248);"></i> Complementary Breakfast  </li><br>
                <li><i class="fa fa-wifi" style="font-size:36px; color:rgb(250, 248, 248); "></i> Free Wifi </li><br>
                <li><i class="fa fa-heartbeat" style="font-size:36px;color:rgb(250, 248, 248);"></i>  Gym  </li><br>
            </ul>
        </div>
    </div>


    <div class="header2">
        <h1>
            ROOMS
        </h1>
        <a href="../html-php/rooms.php"><img src="../img/room1.jpg" alt="rooms"></a>
        <p>
            <b>Room Capacity:</b>2 Adults/ Rooms<br>
            <b>Rates:</b>(starts from)12000++/ Night<br>
        </p>
        <p><a href="../html-php/rooms.php">See More</a><p>
    </div>

    <div class="headerl">
        <h1>
            VILLAS
        </h1>
        <a href="../html-php/villas.php"><img src="../img/villa1.jpg" alt="villas"></a>
        <p>
            <b>Room Capacity:</b>2 Adults/ Rooms(Total 4-6)<br>
            <b>Rates:</b>(starts from)16000++/ Night<br>
        </p>
        <p><a href="../html-php/villas.php">See More</a><p>
    </div>

    <div class="info">
        <h1>Resort Information</h1>
        <ul>
            <li>Our Check-in Time is 02:00 PM.</li>
            <li>Our Check-out Time is 12:00 PM.</li>
            <li>Late Check-out is subject to availability of rooms.</li>
            <li>Early Check-in is subject to availability of rooms.
                 Resort only guarantees room availability upon arrival after 02:00 PM.</li>
            <li>If a Guest is expecting to arrive prior to our Check-in time of 02:00 PM,
                 we suggest that you book the room from the previous night.</li>
            <li>For individual, Guest must bring his/her valid National ID Card/Passport/Driving License/Company photo ID card
                 to be presented upon check-in.</li>
        </ul>
        <br>
        <h1>Resort Features</h1>
        <ul>
            <li>WI-FI Internet.</li>
            <li>Complimentary Breakfast.</li>
            <li> Welcome Drink on arrival.</li>
            <li>Tea/Coffee Making Facility.</li>
            <li>Electronic Safety Deposit Box.</li>
            <li>Fruit Basket in room on arrival day.</li>
            <li>Usage of Swimming pool & Jacuzzi.</li>
            <li>Wall-mounted LCD TV with cable connection.</li>
            <li>Two Bottles (500 ml) of Mineral Water per room per day.</li>
            <li>Complimentary Breakfast for any children between 1 to 5 years.</li>
            <li>Child up to 5 years free.</li>
            <li>Children Play is free of charges.</li>
            <li>Child above 10 years Full Charge.</li>
            <li> Children Game Room is chargeable.</li>
            <li>Child above 5 to 10 years 50% of Regular Charge.</li>
            <li> Extra Bed for children or Baby Cot for infant is chargeable.</li>
            <li>Guests under Twelve (12) years of age are defined as Children.</li>
            <li>Children Swimming Pool 01 is complimentary for In-House Guests. Suitable for children of 03– 05 years of age.</li>
            <li>Children Swimming Pool 02 is complimentary for In-House Guests. Suitable for children above 05 – 12 years of age.</li>
        </ul>
    </div>

    <div class="footer">
        <p style="font-size: 50px;"><b>Tusti Resort</b></p><br>
        <p style="font-size: 20px;">59/A,Mouchak,Gazipur,Dhaka</p><br>
        <p style="font-size: 15px;">Contact Us: +880 01712577638, Hotline:  +880 1617005522</p>
    </div>
</body>
</html>
