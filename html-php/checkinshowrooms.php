<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="/RMS/css/style_admin.css">
    <title>Tusti Resort</title>

    <!-- styles for the table and header with background-->
    <style > /* type= "text/css" */
        body{
            background-color: rgb(137,138,116);
        }
        table{
            border-collapse: collapse;
            width: 100%;
            color: #5E5D59;
            font-family: times;
            font-size: 20px;
            text-align: center;
        }
        th{
            background-color: black;
            color: whitesmoke;
        }
        
       /* To make zebra stripes */
       tr:nth-child(even){
        background-color: #5E5D59;
        color: white;
       }
       tr:nth-child(odd){
        background-color: white;
        color: #5E5D59;
       }
       a{
            color: rgb(34, 2, 2);
            text-decoration: none;
        }
        a:hover{
            color: blue;
            text-decoration: none;
        }

    </style> 
</head>
<body>

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
            <li><a href="/RMS/html-php/logout.php">Log Out</a></li>
        </ul>
    </nav>
    


<!--https://youtu.be/1NC8G_zWDJY-->

<div class="list">
    <div>
        <h1>Checked In Rooms</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>B_ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Accomodation Name</th>
                <th>Number</th>
                <th>Bill</th>
                <th colspan="2">Operations</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include 'connection.php';
       
        $selectquery = "select * from checkin where accomodationtype= 'Room' and bookingstatus= 'CheckedIn'";
        $query = mysqli_query($con, $selectquery);
        $num = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        ?>
           <tr>
            <td><?php echo $res['bookingid'];?></td>
            <td><?php echo $res['username'];?></td>
            <td><?php echo $res['email'];?></td>
            <td><?php echo $res['phonenumber'];?></td>
            <td><?php echo $res['checkindate'];?></td>
            <td><?php echo $res['checkoutdate'];?></td>
            <td><?php echo $res['accomodationname'];?></td>
            <td><?php echo $res['accomodationnumber'];?></td>
            <td><?php echo $res['bill'];?></td>
            <td><a href='checkoutrooms.php?idno=<?php echo $res['bookingid']?>' onclick= 'return checkdelete()' >Check Out</a></td>
           </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <script>
        function checkdelete(){
            return Confirm("Are you sure you want to delete this record?");
            }
    </script>
    </div>

</body>
</html>