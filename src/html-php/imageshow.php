<?php
include 'connection.php';
error_reporting(0);
$nameofimage = $_GET['imgname'];
?>
    
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Tusti Resort</title>
    <style>
        .middle{
    width:100%;
    height: 400px;
    
    background-size: -50% -50%;
    background-repeat: no-repeat;
    background-attachment: scroll;
    text-align: center;
    font-size: 25px;
    margin-bottom: 10px;
    animation: slider 12s infinite linear;
    }
.middle h1{
    font-size: 75px;
    font-style: oblique;
    color: rgb(34, 2, 2);
    
}
    </style>
</head>
<body>
   <?php
    $sourceimage= "../html-php/uploads/$nameofimage";
    
    ?>
   <div>
   
       <img src= <?php echo $sourceimage ?>>; <!-- At last--> 
    
   </div>
   
</body>
