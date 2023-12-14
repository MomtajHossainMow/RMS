<?php
$username = "root";
$password = "test";
$server = "db";
$database = "rms";

$con = mysqli_connect($server,$username,$password,$database);
error_reporting(0);

$type = $_GET["name"];
$availability = $_GET["avl"];
$capacity = $_GET["cap"];
$rate = $_GET["rate"];
$details= $_GET["det"];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Updating Meeting Room Details</title>
    <link rel="stylesheet" type="text/css" href= "">
<style>

*{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
}
body{
    background-color: blueviolet;
}

.loginform{
    width:370px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    position: absolute;
    color: white;
}
.loginform h1{
    font-size: 40px;
    text-align: centre;
    text-transform: uppercase;
    margin: 40px 0;
}
.loginform p{
    font-size: 25px;
    margin: 15 px 0;
    color: whitesmoke;

}
.loginform input{
    font-size: 16px;
    width: 250px;
    height: 30px;
    padding: 15 px ;
    border: 0;
    outline: none;
    border-radius: 5 px;

}
.loginform button{
    font-size: 18px;
    color: black;
    background-color: yellowgreen;
    margin: 20px 0;
    padding: 10px 15px;
    width: 50%;
    border-radius: 5 px;
    border: 0;
}


</style>
</head>
<body>
<div class ="loginform">
    <h2 style="color: black ;"><u> Updating Meeting Room/ Hall Details</u></h2><br>
    <form action="update_meeting.php" method="post">
        <p> Name </p>
        <textarea name="type" readonly rows="1" cols="52.5" ><?php echo $type ?></textarea>

        <p> Availability </p>
        <textarea name="availability" rows="1" cols="52.5" ><?php echo $availability ?></textarea>

        <p> Capacity </p>
        <textarea name="capacity" rows="1" cols="52.5" ><?php echo $capacity ?></textarea>

        <p> Rate </p>
        <textarea name="rate" rows="1" cols="52.5" ><?php echo $rate ?></textarea>

        <p> Details </p>
        <textarea name="details" rows="4" cols="52.5" ><?php echo $details ?></textarea>


        <button type="submit" name="submit"> Update </button>
    </form>
</div>
</body>
</html>
<?php

        include 'connection.php';
        if($con){
            if(isset($_POST["submit"]))
            {
                $type = $_POST["type"];
                $availability = $_POST["availability"];
                $capacity = $_POST["capacity"];
                $rate = $_POST["rate"];
                $details = $_POST["details"];
    
            $queryupdate= "UPDATE meeting SET available= '$availability', capacity= '$capacity', 
            rate= '$rate', detail= '$details' WHERE name = '$type'";
            //echo $queryupdate;
            $dataa= mysqli_query($con, $queryupdate);

            if($dataa){
                echo "<script> alert('Record Updated') </script>";
                ?> <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost../html-php/admin-meeting.php">  <?php
               
            }else{
                
                echo "<script> alert('Failed to update') </script>";
                ?> <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost../html-php/admin-meeting.php"> <?php
                
            }
            } 
            }
?>