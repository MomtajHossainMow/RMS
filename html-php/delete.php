<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "rms";

$con = mysqli_connect($server,$username,$password,$database);
error_reporting(0);
$idq = $_GET['idno'];
$query = "delete from admin where id ='$idq'";
$data = mysqli_query($con, $query);
if($data)
{
    echo "<script> alert('Record deleted from database')</script>";
    ?>
    <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/admin-list.php">
    <?php
}
else{
    echo "<script> alert('Failed to delete record from database')</script>";
}
?>