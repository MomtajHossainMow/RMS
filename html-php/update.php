<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "rms";

$con = mysqli_connect($server,$username,$password,$database);
error_reporting(0);
$idq = $_GET['idno'];
$nameq = $_GET['nm'];
$usernameq = $_GET['usr'];
$adressq = $_GET['adr'];
$emailq = $_GET['em'];
$cnq = $_GET['cn'];

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/RMS/css/style.css">
    <link rel="stylesheet" href="/RMS/css/styleform.css">
    <style>
        ::placeholder{
            color:whitesmoke;
            font-weight: bold;
            opacity: 1;
        }
        body{
            background-color: #465371;
        }
        .background{
            background-image: url(/RMS/img/home2.jpg);
            height:670px;
        }
    </style>
    <title>Update user information</title>
</head>
<body>

    <div class="background">
        <div class="form">
            <form action="update.php" method="POST">

                <h1 style="color:whitesmoke;">Admin Info </h1>

                <div class="textbox" >
                    <label for="idlabel" style="color: greenyellow ">Admin ID: </label>
                    <input type="text" required placeholder="ID" name="iddd" id= "idlabel" value="<?php echo $idq ?>"readonly>
                </div>

                <div class="textbox">
                <label for="namelabel" style="color: greenyellow "> Name: </label>
                    <input type="text" required placeholder="Name" name="name" id='namelabel' value="<?php echo $nameq ?>">
                </div>

                <div class="textbox">
                <label for="usernamelabel" style="color: greenyellow"> Username: </label>
                    <input type="text" required placeholder="Username" name="username" id= 'usernamelabel' value="<?php echo $usernameq ?>">
                </div>

                <div class="textbox">
                <label for="addresslabel" style="color: greenyellow ">Address: </label>
                    <input type="text" required placeholder="Address" name="address" id= 'addresslabel' value="<?php echo $adressq ?>">
                </div>

                <div class="textbox">
                <label for="emaillabel" style="color: greenyellow ">Email Address: </label>
                    <input type="email" required placeholder="Email" name="email" id= 'emaillable' value="<?php echo $emailq ?>">
                </div>

                <div class="textbox">
                <label for="phonenumber" style="color: greenyellow ">Contact Number: </label>
                    <input type="text" required placeholder="Contact No" name="contact" id= 'phonenumber' value="<?php echo $cnq ?>">
                </div>

                <input class="button" type="submit" name="button" value="Update" style="color: whitesmoke;">
            </form>
        </div>
    </div>

    <?php     
            if($con)
            {
                
                if(isset($_POST["button"]))
                {
                    $iddd = $_POST["iddd"];
                    $name = $_POST["name"];
                    $uname = $_POST["username"];
                    $address = $_POST["address"];
                    $mail = $_POST["email"];
                    $contact = $_POST["contact"];
        
                $queryupdate= "UPDATE admin SET name = '$name', username= '$uname', address= '$address', 
                email= '$mail', phone= '$contact'
                WHERE id= '$iddd'";
                //echo $queryupdate;
                $dataa= mysqli_query($con, $queryupdate);

                if($dataa){
                    echo "<script> alert('Record Updated') </script>";
                    ?> <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/admin-list.php">  <?php
                   
                }else{
                    
                    echo "<script> alert('Failed to update') </script>";
                    ?> <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/admin-list.php"> <?php
                    
                }
                } 
            }    
        
    ?>
</body>
</html>