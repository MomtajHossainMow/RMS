<?php
$username = "root";
$password = "test";
$server = "db";
$database = "rms";

$con = mysqli_connect($server,$username,$password,$database);
error_reporting(0);
$rtype = $_GET['meetingname'];
$query = "delete from meeting where name ='$rtype'";
$data = mysqli_query($con, $query);
if($data)
{
    echo "<script> alert('Record deleted from database')</script>";
    ?>
    <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost../html-php/admin-meeting.php">
    <?php
}
else{
    echo "<script> alert('Failed to delete record from database')</script>";
}
?>