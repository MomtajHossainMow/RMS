<?php
// for passing the data from reserved room to checkin table in background
include 'connection.php';
error_reporting(0);
$idq = $_GET['idno'];

$query= "select * from booking where bookingid='$idq'";
$res = mysqli_query($con, $query);
$num = mysqli_num_rows($res);
if($num==1){
    while($row = mysqli_fetch_array($res)){
        $bookingidd= $row['bookingid'];
        $usrnm= $row['username'];
        $maill= $row['email'];
        $contact= $row['phonenumber'];
        $chkindt= $row['checkindate'];
        $chkoutdt= $row['checkoutdate'];
        $actype= $row['accomodationtype'];
        $acname= $row['accomodationname'];
        $acnumbr= $row['accomodationnumber'];
        $bill= $row['bill'];

        $queryinsert= "INSERT INTO `checkin`(`bookingid`, `username`, `email`, `phonenumber`, `checkindate`, `checkoutdate`, 
        `accomodationtype`, `accomodationname`, `accomodationnumber`, `bookingstatus`, `bill`) VALUES 
        ('$bookingidd','$usrnm','$maill','$contact',' $chkindt','$chkoutdt','$actype','$acname','$acnumbr',
        'CheckedIn','$bill')";

        $querydelete= "Delete from booking where bookingid= '$bookingidd'";
        
        $datainsert= mysqli_query($con, $queryinsert);
        $datadelete= mysqli_query($con, $querydelete);
        
        if($datainsert && $datadelete){
            echo "<script> alert('Record updated!')</script>";
            ?>
            <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/reservedrooms.php">
            <?php
        }else{
            echo "<script> alert('Failed to update record in database')</script>";
        }
    }

}
/*
INSERT INTO `booking`(`bookingid`, `username`, `email`, `phonenumber`, `checkindate`,
 `checkoutdate`, `accomodationtype`, `accomodationname`, `accomodationnumber`, `bookingstatus`, `bill`)


*/
?>