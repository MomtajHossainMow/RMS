<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "rms";

$con = mysqli_connect($server,$username,$password,$database);
error_reporting(0);

$type = $_GET["type"];
$total = $_GET["totalr"];
$availability = $_GET["avl"];
$reserved = $_GET["reserved"];
$capacity = $_GET["cap"];
$rate = $_GET["rate"];
$details= $_GET['det'];

?>


<!DOCTYPE html>
<html>
<head>
    <title>Updating Room Details</title>
    <link rel="stylesheet" type="text/css" href= "">
<style>

*{
    padding: 0;
    margin: 0;
    font-family: times;
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
    <h2 style="color: black ;"><u> Updating Room Details</u></h2><br>
    <form action="update_rooms.php" method="post">
        <p> Room Type </p>
        <textarea name="type" readonly rows="1" cols="52.5" ><?php echo $type ?></textarea>

        <p> Total Room </p>
        <textarea name="total" rows="1" cols="52.5" ><?php echo $total ?></textarea>
        
        <p> Availability </p>
        <textarea name="availability" rows="1" cols="52.5" ><?php echo $availability ?></textarea>

        <p> Reserved </p>
        <textarea name="reserved" rows="1" cols="52.5" ><?php echo $reserved ?></textarea>

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
<br/><br/><br/>
</html>
<?php
        $username = "root";
        $password = "";
        $server = "localhost";
        $database = "rms";
    
        $con = mysqli_connect($server,$username,$password,$database);
        
        if($con){
            if(isset($_POST["submit"]))
            {
                $type = $_POST["type"];
                $total = $_POST["total"];
                $availability = $_POST["availability"];
                $reserved = $_POST["reserved"];
                $capacity = $_POST["capacity"];
                $rate = $_POST["rate"];
                $details = $_POST["details"];
    
            $queryupdate= "UPDATE rooms SET total_rooms= '$total', available= '$availability',
             reserved= '$reserved', r_capacity= '$capacity', 
            rate= '$rate', detail= '$details' WHERE type = '$type'";
            //echo $queryupdate;
            $dataa= mysqli_query($con, $queryupdate);

            if($dataa){
                echo "<script> alert('Record Updated') </script>";
                ?> <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/admin_room.php">  <?php
               
            }else{
                
                echo "<script> alert('Failed to update') </script>";
                ?> <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/admin_room.php"> <?php
                
            }
            } 
            }
?>