<?php
$username = "root";
$password = "test";
$server = "db";
$database = "rms";

$con = mysqli_connect($server,$username,$password,$database);
error_reporting(0);
$rtype = $_GET['roomtype'];
$query = "delete from rooms where type ='$rtype'";
$data = mysqli_query($con, $query);
if($data)
{
    echo "<script> alert('Record deleted from database')</script>";
    ?>
    <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost../html-php/admin_room.php">
    <?php
}
else{
    echo "<script> alert('Failed to delete record from database')</script>";
}
?>