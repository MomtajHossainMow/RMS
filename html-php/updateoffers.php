<?php
include 'connection.php';
error_reporting(0);
$idq = $_GET['idno'];
$nameq = $_GET['nm'];
$details = $_GET['det'];

    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers Adding</title>
    <link rel="stylesheet" type="text/css" href= "">

     
<style>

*{
    padding: 0;
    margin: 0;
    font-family: times;
}
body{
    background-color: rgb(101,67,33);
}

.loginform{
    width:367.99px;
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
    width: 368px;
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
    width: 40%;
    border-radius: 5 px;
    border: 0;
}

</style>

</head>
<body>
    
<div class ="loginform">
    <h2 style="color: black ;"><u> Update Offer Description</u></h2><br>
    <form action="updateoffers.php" method="POST" enctype="multipart/form-data">
        <p> Offer ID</p>
        <textarea name="offerid" readonly rows="2" cols="52.5" ><?php echo $idq ?></textarea>

        <p> Offer Name </p>
        <textarea name="name" required rows="2" cols="52.5" ><?php echo $nameq ?></textarea>

        <p> Offer Details </p>
        <textarea name="details" required rows="2" cols="52.5" ><?php echo $details ?></textarea>

        <br/><br/>
        <button type="submit" name="submit">Update OFFER</button>
        <button style="float: right" type="submit" name="cancel" onclick="history.back()">CANCEL</button>
       
    </form>
           
</div>

<!-- Now the updating part -->
<?php     
            if($con)
            {
                if(isset($_POST["submit"]))
                {
                    $name = $_POST["name"];
                    $details = $_POST["details"];
                    $iddd= $_POST["offerid"];
        
                $queryupdate= "UPDATE offer SET offername = '$name', offerdetails= '$details'
                WHERE id= '$iddd'";
                //echo $queryupdate;
                $dataa= mysqli_query($con, $queryupdate);

                if($dataa){
                    echo "<script> alert('Record Updated') </script>";
                    ?> <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/updateoffersoffering.php">  <?php
                   
                }else{
                    
                    echo "<script> alert('Failed to update') </script>";
                    ?> <META HTTP-EQUIV = "REFRESH" CONTENT = "1; URL=http://localhost/RMS/html-php/updateoffersoffering.php"> <?php
                    
                }
                } 
            }    
        
    ?>


</body>
<!-- <textarea name="name" required rows="2" cols="50" ></textarea> -->
</html>

