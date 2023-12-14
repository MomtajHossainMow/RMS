<?php
include 'connection.php';
error_reporting(0);
$idd = $_GET['idno'];
$query = "delete from offer where id ='$idd'";
$data = mysqli_query($con, $query);
if($data)
{
    echo "<script> alert('Record deleted from database')</script>";
    ?>
    <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost../html-php/removeoffers.php">
    <?php
}
else{
    echo "<script> alert('Failed to delete record from database')</script>";
}
?>