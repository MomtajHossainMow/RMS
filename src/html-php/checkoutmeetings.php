<?php
// for passing the data from reserved room to checkin table in background
include 'connection.php';
error_reporting(0);
$idq = $_GET['idno'];

$query= "select * from checkin where bookingid='$idq'";
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

        $queryupdate= "UPDATE `meeting` SET `Available`= 'Yes' WHERE name= '$acname'";

        $queryinsert= "INSERT INTO `checkout`(`bookingid`, `username`, `email`, `phonenumber`, `checkindate`, `checkoutdate`, 
        `accomodationtype`, `accomodationname`, `accomodationnumber`, `bookingstatus`, `bill`) VALUES 
        ('$bookingidd','$usrnm','$maill','$contact',' $chkindt','$chkoutdt','$actype','$acname','$acnumbr',
        'CheckedOut','$bill')";

        $querydelete= "Delete from checkin where bookingid= '$bookingidd'";
        
        $dataupdate= mysqli_query($con, $queryupdate);
        $datainsert= mysqli_query($con, $queryinsert);
        $datadelete= mysqli_query($con, $querydelete);
        
        if($datainsert && $datadelete &&$dataupdate){
            echo "<script> alert('Record inserted, updated & deleted!')</script>";
            ?>
            <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost../html-php/checkinshowmeetings.php">
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