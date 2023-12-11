<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/RMS/css/style.css">
    <link rel="stylesheet" href="/RMS/css/styleform.css">
    <link rel="stylesheet" href="/RMS/css/style_home.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Customer Reviews</title>


    
<style>


*{
    padding: 0;
    margin: 0;
    font-family: times;
}
body{
    background-color: whitesmoke;
}
.review-box-container {
  background-color: lightblue;
}
.review-heading{
    background-color: lightblue;
    text-align: center;
}

</style>

</head>
<body>
<br/><br/>
<nav>
    <div class="logo"><a href="/RMS/html-php/home.php">Tusti Resort</a></div>
    
    <ul>
            <li><a href="/RMS/html-php/home.php">Home</a></li>
            <li><a href="/RMS/html-php/rooms.php">Rooms</a></li>
            <li><a href="/RMS/html-php/villas.php">Villas</a></li>
            <li><a href="/RMS/html-php/meeting.php">Meeting</a></li>
            <li><a href="/RMS/html-php/dining.php">Dining</a></li>
            <li><a href="/RMS/html-php/offers.php">Special Offers</a></li>
            <li><a href="/RMS/html-php/booking.php">Book Now</a></li>
            <li><a href="/RMS/html-php/review.php">Reviews</a></li>
        </ul>
        
</nav>

 
<br/>
<div class="mx-auto container-fluid mt-5 bg-secondary" style="width: 50%;">
    <h2 style="text-align: center;">Give A Review</h2>
    <div id="form-conent">
        <form action= "review.php" method="POST">
            <div>
                <div class="form-group>
                <label for="name"><b>Name:</b></label><br>
                <input type="text" class= "form-control" id="name" name="Name" placeholder="Mr. " required><br>
                </div>

                <div class="form-group>
                <label for="email"><b>Email:</b></label><br>
                <input type="email" class= "form-control" id="email" name="email"  placeholder="someone@yahoo.com" required><br>
                    
                </div>

                <div class="form-group>
                    
                <label for="reviews"><b>Comment:</b></label><br>
                <textarea name="comment" class= "form-control" rows="4" cols="50"  placeholder="Your Comment About Our Resort" required ></textarea><br>
                     
                </div>

                <div class="form-group">
                    
                <label for="quantity" ><b>Give Rating(out of 5):</b></label><br>
                <input type="number" class= "form-control" id="quantity" name="quantity" min="0" max="5" step="0.5" value="1" required><br>
                      
                </div>

            </div>
            
            <input class="btn btn-dark m-2" type="submit" name="submitbutton" value="Submit">
        </form>
    </div>
</div>

    <?php
        $username = "root";
        $password = "";
        $server = "localhost";
        $database = "rms";
    
        $con = mysqli_connect($server,$username,$password,$database);
        if($con){
                if(isset($_POST["button"]))
                {
                    $name = $_POST["Name"];
                    $mail = $_POST["email"];
                    $review = $_REQUEST["comment"];
                    $rating = $_POST["quantity"];

                     $insertquery = " INSERT INTO `customer_review` (`Name`, `Email`, `Review`, `Rating`)
                         VALUES ('$name','$mail','$review','$rating')";
                    $res = mysqli_query($con,$insertquery);

                        if($res){
                            ?>
                            <script>
                                alert("Thanks for your review!");
                            </script>
                            <?php
                            header("Location:/RMS/html-php/review.php");
                            }
                        else{
                                ?>
                                <script>
                                    alert("Sorry! data not inserted");
                                </script>
                                <?php
                                 header("Location:/RMS/html-php/home.php");
                            }
                        
                }
            }
        ?>
   
    <hr>
    <!--Customer Review-->
        <!--review-heading-->
        <div class="review-heading"> <h1>Customer Reviews</h1> </div>
        <!--php fetch data-->
        <?php
            $selectquery = " select * from customer_review";
            $query = mysqli_query($con,$selectquery);
            $num = mysqli_num_rows($query);
            while($res = mysqli_fetch_array($query)){
        ?>
        <section id="review">
        <!--Review-box-container--->
        <div class="review-box-container" >
            <!--Box-1-->
            <div class="review-box">
                <!--top-->
                <div class="box-top">
                    <!--profile-->
                    <div class="profile">
                        <!--image-->
                        <div class="profile-img">
                            <img src="/RMS/img/villa1.jpg">
                        </div>

                        <!--name-and-email-->
                        <div class="name-email">
                            <strong><?php echo $res['Name'];?></strong>
                            <span><?php echo $res['Email'];?></span>

                        </div>
                    </div>
                    <!--reviews-->
                    <div class="reviews">
                        <?php
                         $a = $res['Rating'];
                         for($i = 0; $i <5 ; $i++)
                         {
                            if($a>=1){
                           ?>
                              <i class="fa fa-star"></i>
                           <?php 
                           $a--;   
                            }
                            else if($a == 0.5)
                           {
                           ?>
                                <i class="fa fa-star-half-o"></i>
                            <?php
                            $a = $a - 0.5;
                            }
                            else 
                            {
                                ?>
                                <i class="fa fa-star-o"></i>
                            <?php   
                            }
                        }
                        ?>
                    </div>
                </div>

                <!--Comments-->
                <div class="comment">
                    <p><?php echo $res['Review'];?></p>
                </div>
            </div>
        </div>
    </section>
    <?php
     }
    ?>

    <!--footer-->
    <div class="footer">
        <p style="font-size: 60px;"><b>Tusti Resort</b></p><br>
        <p style="font-size: 20px;">59/A,Mouchak,Gazipur,Dhaka</p><br>
        <p style="font-size: 15px;">Contact Us: +880 01712577638, Hotline:  +880 1617005522</p>
    </div>

    

</body>
</html>