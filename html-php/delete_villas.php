<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "rms";

$con = mysqli_connect($server,$username,$password,$database);
error_reporting(0);
$rtype = $_GET['villatype'];
$query = "delete from villas where type ='$rtype'";
$data = mysqli_query($con, $query);
if($data)
{
    echo "<script> alert('Record deleted from database')</script>";
    ?>
    <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/admin-villa.php">
    <?php
}
else{
    echo "<script> alert('Failed to delete record from database')</script>";
}
?>