<?php
include 'connection.php';
error_reporting(0);

$checkindatebn= $_GET['indate'];
$checkoutdatebn = $_GET['outdate'];
$avaliablebn = $_GET['avl'];
$accomodationnamebn = $_GET['accname'];
$accomodationtypebn = $_GET['acctype']; //bn for booknow

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleform.css">
    <title>Book Now</title>
</head>
<body>
    Hello

    <div class="background">
        <div class="form">
            <form action="booknow.php" method="POST">

                <h1 style="color:whitesmoke;">Book Now</h1>

                <div class="textbox" >
                    <label for="checkindatelabel" style="color: greenyellow ">Check In Date: </label>
                    <input type="date" required placeholder="Y-m-d" name="iddd" id= "checkindatelabel" value="<?php echo $checkindatebn; ?>"readonly>
                </div>

                <div class="textbox" >
                    <label for="checkoutdatelabel" style="color: greenyellow ">Check Out Date: </label>
                    <input type="date" required placeholder="Y-m-d" name="iddd" id= "checkoutdatelabel" value="<?php echo $checkoutdatebn; ?>"readonly>
                </div>

                <div class="textbox" >
                    <label for="accomodatename" style="color: greenyellow ">Accomodation Name: </label>
                    <input type="text" required placeholder="Accomodate type" name="iddd" id= "accomodatename" value="<?php echo $accomodationnamebn; ?>"readonly>
                </div>

                <div class="textbox" >
                    <label for="accomodatetype" style="color: greenyellow ">Accomodation Type:</label>
                    <input type="text" required placeholder="Accomodate type" name="iddd" id= "accomodatetype" value="<?php echo $accomodationtypebn; ?>"readonly>
                </div>

                <div class="textbox">
                <label for="availableff" style="color: greenyellow ">Required Accomodation: </label>
                <input type="number" id="quantity" name="quantity" min="0" max="<?php echo $avaliablebn; ?>" step="1" value="1">
                </div>

               


                <input class="button" type="submit" name="button" value="Update" style="color: whitesmoke;">
            </form>
        </div>
    </div>
</body>
</html>