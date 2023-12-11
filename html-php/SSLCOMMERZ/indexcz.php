<!--template for bootstrap 5-->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
    <title>SSLCommerz Payment</title>
  </head>
  <body>
      <div class="container-fluid">
          <div class="container mx-auto m-5 bg-secondary" style="width: 50%">
            <form method="POST">
                <br>
                <div class="row mt-2">
                    <h4 style="text-align: center;">SSLCommerz Payment</h4>
                </div>
                <div class="row mx-auto" style="width: 75%">
                <input type="text" name="amount" placeholder="amount in taka" autocomplete="off">
                </div>
                <div class="row mx-auto m-2" style="width: 30%">
                  <br/>
                
                 <input type="submit" name="submit" class="btn btn-outline-dark" value="Pay Now">
                </div>
                <br>
            </form>
          </div>
    <?php 
    
    if(isset(($_POST['submit']))){
      $amountintaka= $_POST['amount'];
      ?>  <script>
                     
                    // alert("Hey there! Your input stored & updated!");
                    window.location.href="checkout.php?amount=<?php echo $amountintaka?>";
                    
          </script> <?php
    }
    ?>
      </div>
    
 
    <!-- Optional JavaScript; choose one of the two! -->
 
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>




    <a href="checkout.php?amount=<?php echo $amountintaka?>" class="btn btn-dark btn-sm">Pay Now</a> 





    -->
  </body>
</html>