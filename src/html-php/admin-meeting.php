<?php
session_start();
    if($_SESSION['UserName']){
        //echo "Welcome admin, ".$_SESSION['UserName'];
    }else{
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> <!-- -->
    <link rel = "stylesheet" href="../css/style_admin.css">
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

        .rightalign {
        float: right;
        text-align:center;
        background-color: rgb(192,192,192);
        width: 210px;
        height: 38px;
        font-size: medium;
        font-style: bold;
        color: black;
        }

    </style> 
</head>
<body>

    <nav>
    <div class="logo"><a href="../html-php/home.php">Tusti Resort</a></div>
        <ul>
            <li><a href="../html-php/admin.php">Admin Page</a></li>
                <ul>
                    <li><a href="../html-php/admin-list.php">Admins List</a></li>
                </ul>
            </li>
            <li><a href="#">Accomodations</a>
                <ul>
                    <li><a href="../html-php/admin_room.php">Rooms</a></li>
                    <li><a href="../html-php/admin-villa.php">Villas</a></li>
                    <li><a href="../html-php/admin-meeting.php">Meeting Rooms & Halls</a></li>
                </ul>
            </li>
            <li><a href="#">Reservations</a>
                <ul>
                    <li><a href="../html-php/reservedrooms.php">Reserved Rooms</a></li>
                    <li><a href="../html-php/available_rooms.php">Available Rooms</a></li>
                    <li><a href="../html-php/reservedvillas.php">Reserved Villas</a></li>
                    <li><a href="../html-php/available_villas.php">Available Villas</a></li>
                    <li><a href="../html-php/reservedmeeting.php">Reserved Meeting Rooms & Halls</a></li>
                    <li><a href="../html-php/available_meeting_rooms.php">Available Meeting Rooms & Halls</a></li>
                </ul>
            </li>
            <li><a href="../html-php/logout.php">Log Out</a></li>
        </ul>
    </nav>
    


<!--https://youtu.be/1NC8G_zWDJY-->



<div class="list">
<div > 
    <!--<h1>Meeting & Hall Details</h1>--> 
    
         <h1>Meeting & Hall Details <button  style=" font-family: times;" class="rightalign" input type=button onClick="location.href='add_meeting.php'"
 value='click here'><b>Add Meeting Room/ Hall</b></button> </h1> 
         
</div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Available</th>
                <th>Capacity</th>
                <th>Rate</th>         
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $username = "root";
        $password = "test";
        $server = "db";
        $database = "rms";
    
        $con = mysqli_connect($server,$username,$password,$database);

        $selectquery = " select * from meeting";
        $query = mysqli_query($con,$selectquery);
        $num = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query))echo"
        <tr>
        <td>".$res['Name']."</td>
        <td>".$res['Available']."</td>
        <td>".$res['Capacity']."</td>
        <td>".$res['Rate']."</td>
        <td> <a href='update_meeting.php?name=$res[Name]&avl=$res[Available]&cap=$res[Capacity]&rate=$res[Rate]&det=$res[detail]' > Update </td>
         <td> <a href='delete_meeting.php?meetingname=$res[Name]'  onclick= 'return checkdelete()'> Delete </td>

        </tr>
     "
        ?>
        </tbody>
    </table>
    </div>

</body>
</html>


