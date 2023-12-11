<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="/RMS/css/style.css">
    <link rel = "stylesheet" href="/RMS/css/style_admin.css">
    <title>Admin Panel</title>
    <style>
        *{
        padding: 0;
        margin: 0;
        font-family: times;
        }
        body{
            background-color: #465371;
        }
        .background{
            background-image: url(/RMS/img/home2.jpg);
            height:665px;
        }
        a{
            color: whitesmoke;
            text-decoration: none;
        }
        h2{
            color: whitesmoke;
        }
        
    </style>

    <title>Admin Page</title>
</head>
<body>
    <h1>Admin Page</h1>
    <div class= "background">
    <!--Navigation Bar-->
    <nav>
    <div class="logo"><a href="/RMS/html-php/home.php">Tusti Resort</a></div>
        <ul>
            <li><a href="/RMS/html-php/admin.php">Admin Page</a></li>
            <li><a href="#">Manage Admins</a>
                <ul>
                    <li><a href="/RMS/html-php/admin-list.php">Admins List</a></li>
                </ul>
            </li>
            <li><a href="#">Accomodations</a>
                <ul>
                    <li><a href="/RMS/html-php/admin_room.php">Rooms</a></li>
                    <li><a href="/RMS/html-php/admin-villa.php">Villas</a></li> 
                    <li><a href="/RMS/html-php/admin-meeting.php">Meeting Rooms & Halls</a></li>
                </ul>
            </li>
            <li><a href="#">Reservations</a>
                <ul>
                    <li><a href="/RMS/html-php/reservedrooms.php">Reserved Rooms</a></li>
                    <li><a href="/RMS/html-php/available_rooms.php">Available Rooms</a></li>
                    <li><a href="/RMS/html-php/reservedvillas.php">Reserved Villas</a></li>
                    <li><a href="/RMS/html-php/available_villas.php">Available Villas</a></li>
                    <li><a href="/RMS/html-php/reservedmeetings.php">Reserved Meeting Rooms & Halls</a></li>
                    <li><a href="/RMS/html-php/available_meeting_rooms.php">Available Meeting Rooms & Halls</a></li>
                </ul>
            </li>

            <li><a href="#">Offers</a>
                <ul>
                <li><a href="/RMS/html-php/admin-offer.php">Add Offers</a></li>
                    <li><a href="/RMS/html-php/updateoffersoffering.php">Update Offers</a></li> 
                    <li><a href="/RMS/html-php/removeoffers.php">Remove Offers</a></li> 
                </ul>
        
            </li>

            <li><a href="/RMS/html-php/logout.php">Log Out</a></li>
        </ul>
    </nav>

    <?php
    session_start();
    if($_SESSION['UserName']){
        //echo "Welcome admin, ".$_SESSION['UserName'];
    }else{
        header("location:login.php");
    }
    $user_name= $_SESSION['UserName'];

    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "rms";

    $con = mysqli_connect($server,$username,$password,$database);

    $sql= "select * from admin where username = '$user_name'";
    $res = mysqli_query($con,$sql) or die(mysqli_error($con));
    $count = mysqli_num_rows($res);
    
    $res1 = mysqli_fetch_array($res);

    if($count==1){
    echo"
    <p ><h2>ID Number: ".$res1['id']." </h2></p>
    <p ><h2>Full Name: ".$res1['name']." </h2></p>
    <p ><h2>Username: ".$res1['username']." </h2></p>
    <p ><h2>Address: ".$res1['address']." </h2></p>
    <p ><h2>Email Address: ".$res1['email']." </h2></p>
    <p ><h2>Contact Number: ".$res1['phone']." </h2></p>

    ";}

?>

    </div>

<!-- before body tag ends, paste this jquery cdn-->
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

   
</body>
</html>

<!-- http://localhost/RMS/html-php/admin.php -->



<!--   <p ><h1 style= "color: rgb(255,240,245)">Name: </h1></p>
    <p ><h1 style= "color: rgb(208,240,192)">Date of birth: </h1></p>
    <p ><h1 style= "color: rgb(118,255,122)">Id number: </h1></p>
    <p ><h1 style= "color: rgb(209,226,49)">Joining date: </h1></p>
    <p ><h1 style= "color: rgb(255,135,141)">Contact Number: </h1></p>
    <p ><h1 style= "color: rgb(255,145,164)">Address: </h1></p>
    <p ><h1 style= "color: rgb(60,208,112)">Country: </h1></p>
-->