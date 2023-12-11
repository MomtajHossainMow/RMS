<?php
include 'connection.php';
error_reporting(0);
$idq = $_GET['idno'];

$query= "select * from booking where bookingid='$idq'";
$res = mysqli_query($con, $query);
$num = mysqli_num_rows($res);
if($num==1){
    while($row = mysqli_fetch_array($res)){
    $acname= $row['accomodationname'];
    $number= $row['accomodationnumber'];

        //rooms part
        $queryselectfromdb= "select * from villas where type= '$acname'";
        $res2= mysqli_query($con, $queryselectfromdb);
        $num2= mysqli_num_rows($res2);
        if($num2==1){
            while($row= mysqli_fetch_array($res2)){
            $reservednumberfromdbtoupdate= $row['Reserved'];
            $availablenumberfromdbtoupdate= $row['Available'];

            $updatableavailable= $availablenumberfromdbtoupdate + $number;
            $updatablereserved= $reservednumberfromdbtoupdate - $number;

            $queryupdate= "UPDATE `rooms` SET `Available`= '$updatableavailable', `Reserved`='$updatablereserved' 
            WHERE type= '$acname'";
            }
        } //rooms part partially ends here
        $updation= mysqli_query($con, $queryupdate);
        $querydelete = "delete from booking where bookingid ='$idq'";
        $datadelete = mysqli_query($con, $querydelete);
        if($datadelete && $updation){
            echo "<script> alert('Record updated & deleted from database')</script>";
            ?>
            <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/reservedvillas.php">
            <?php
        }else{
            echo "<script> alert('Failed to delete record from database')</script>";
        }
    }
}
?>