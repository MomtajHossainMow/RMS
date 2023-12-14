<?php
include 'connection.php';
$val= $_GET['selectvalue'];

$framework1= array('Room', 'Symfony');
$framework2= array('Swing', 'fx');
$framework3= array('Django', 'Numpy');
$framework4= array('Spring', 'React');

switch($val){
    case 'Room': 
        $selectquery = " select * from rooms";
        $query = mysqli_query($con,$selectquery);
        $num = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        echo " <option> ".$res['Type']." </option> ";
        }
        break;
    case 'Villa': 
        $selectquery = " select * from villas";
        $query = mysqli_query($con,$selectquery);
        $num = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        echo " <option> ".$res['Type']." </option> ";
        }
        break; 
    case 'Meeting': 
        $selectquery = " select * from meeting";
        $query = mysqli_query($con,$selectquery);
        $num = mysqli_num_rows($query);
        while($res = mysqli_fetch_array($query)){
        echo " <option> ".$res['Name']." </option> ";
        }
        break; 
    default:
        echo "No data has been selected!";

    }

?>