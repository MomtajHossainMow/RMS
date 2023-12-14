<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "rms";

    $con = mysqli_connect($server,$username,$password,$database);

    $deletequery = "DELETE FROM `bookingtemp` WHERE 1";
	$delete = mysqli_query($con, $deletequery);
	if($delete){
				?>  
                <script>
		            alert("Fail to book!");
					window.location.href="http://localhost../html-php/home.php";
		
				</script> 
                <?php
				}
?>				
					