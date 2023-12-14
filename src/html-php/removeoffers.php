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
    <link rel = "stylesheet" href="../css/style_admin.css">
    <title>Tusti Resort</title>

    <!-- styles for the table and header with background-->
<!-- #898a74
rgb(137,138,116)
Rusty celadon
--> 
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
    <div class="logo"><a href="../html-php/home.php">Tusti Resort</a></div>
        <ul>
            <li><a href="../html-php/admin.php">Admin Page</a></li>
            <li><a href="#">Manage Admins</a>
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
                    <li><a href="#">Reserved Villas</a></li>
                    <li><a href="../html-php/available_villas.php">Available Villas</a></li>
                    <li><a href="#">Reserved Meeting Rooms & Halls</a></li>
                    <li><a href="../html-php/available_meeting_rooms.php">Available Meeting Rooms & Halls</a></li>
                </ul>
            </li>
            
            <li><a href="#">Offers</a>
                <ul>
                <li><a href="../html-php/admin-offer.php">Add Offers</a></li>
                    <li><a href="../html-php/updateoffersoffering.php">Update Offers</a></li> 
                    <li><a href="../html-php/removeoffers.php">Remove Offers</a></li> 
                </ul>
        
            </li>
            <li><a href="../html-php/logout.php">Log Out</a></li>
        </ul>
    </nav>
    



<div class="list">
<div>
    <h1>Offers Lists</h1>
</div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Offer Name</th>
                <th>Offer Details</th>
                <th colspan="1">Operation</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $username = "root";
        $password = "test";
        $server = "db";
        $database = "rms";
    
        $con = mysqli_connect($server,$username,$password,$database);

        $selectquery = " select * from offer";
        $query = mysqli_query($con,$selectquery);
        $num = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query))
        echo"
           <tr>
            <td>".$res['id']."</td>
            <td>".$res['offername']."</td>
            <td>".$res['offerdetails']."</td>
            <td> <a href='deleteoffer.php?idno=$res[id]'  onclick= 'return checkdelete()'> Delete </td>
           
           </tr>
           
    ";
        
        
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


<!-- 
     <td> <a href='update.php?idno=$res[id]&nm=$res[name]&usr=$res[username]&adr=$res[address]&em=$res[email]&cn=$res[phone]' > Update </td>
            <td> <a href='delete.php?idno=$res[id]'  onclick= 'return checkdelete()'> Delete </td>

--> 