<?php
    include 'connection.php';
    $mail= $_GET['MAIL'];
    $idnumber= $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Cancellation</title>
    <!-- for preventing to come back to this page--> 
    <!--Comment--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js">
    </script>

</head>
<body>
 


<?php
    
        $query= "select * from booking where bookingid='$idnumber'";
        $res = mysqli_query($con, $query);
        $num = mysqli_num_rows($res);
        if($num==1){
            while($row = mysqli_fetch_array($res))
            {
            $acname= $row['accomodationname'];
            $number= $row['accomodationnumber'];
            $type= $row['accomodationtype'];
                
    if($type == "Room"){
    $queryselectfromdb= "select * from rooms where type= '$acname'";
    $res= mysqli_query($con, $queryselectfromdb);
    $num= mysqli_num_rows($res);
    if($num==1){
    while($row= mysqli_fetch_array($res)){
        $reservednumberfromdbtoupdate= $row['Reserved'];
        $availablenumberfromdbtoupdate= $row['Available'];

        $updatableavailable= $availablenumberfromdbtoupdate + $number;
        $updatablereserved= $reservednumberfromdbtoupdate - $number;

        $queryupdate= "UPDATE `rooms` SET `Available`= '$updatableavailable', `Reserved`='$updatablereserved' 
        WHERE type= '$acname'";
            }
        }
    }elseif($type== "Villa"){
    $queryselectfromdb= "select * from villas where type= '$acname'";
    $res= mysqli_query($con, $queryselectfromdb);
    $num= mysqli_num_rows($res);
    if($num==1){
        while($row= mysqli_fetch_array($res)){
            $reservednumberfromdbtoupdate= $row['Reserved'];
            $availablenumberfromdbtoupdate= $row['Available'];

            $updatableavailable= $availablenumberfromdbtoupdate + $number;
            $updatablereserved= $reservednumberfromdbtoupdate - $number;

            $queryupdate= "UPDATE `villas` SET `Available`= $updatableavailable, `Reserved`='$updatablereserved' 
            WHERE type= '$acname'";
            }
        }                       
    }                                               
    elseif($type== "Meeting"){
        $queryselectfromdb= "select * from meeting where name= '$acname'";
        $res= mysqli_query($con, $queryselectfromdb);
        $num= mysqli_num_rows($res);
        if($num==1){
            while($row= mysqli_fetch_array($res)){
                $queryupdate= "UPDATE `meeting` SET `Available`= 'Yes' WHERE name= '$acname'";
            }
        }
    }
    $deletequery = "DELETE FROM `booking` WHERE bookingid='$idnumber'";
    $update = mysqli_query($con,$queryupdate);
    $delete =mysqli_query($con, $deletequery);
 
    
    if($update && $delete)
    {
    ?>
        <script>
            alert("Your booking has been cancelled!"); //####################################################################################
        </script>

            <?php
            session_start();
            unset($_SESSION['UserName']);
            unset($_SESSION['password']);
            header("Location: home.php");
            exit;
            ?>
    <?php
    }
    else{
        ?>
        <script>
            alert("Error!")
        </script>
    <?php
        }
            }
        }
    ?>

       
</body>

</html>