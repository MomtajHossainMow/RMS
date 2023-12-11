<?php 
        $username = "root";
        $password = "";
        $server = "localhost";
        $database = "rms";
    
        $con = mysqli_connect($server,$username,$password,$database);

		$selectquery = "SELECT * FROM bookingtemp";
        $query = mysqli_query($con,$selectquery);
        $num = mysqli_num_rows($query);
		if($num==1)
        {
			while($res = mysqli_fetch_array($query))
			{
					$checkindatebnw= $res['checkindate'];
           			$checkoutdatebnw= $res['checkoutdate'];
            		$accomodationtypebn= $res['accomodationtype'];
            		$accomodationnamebn= $res['accomodationname'];
            		$accomodationnumber= $res['accomodationnumber']; // how many to book now
            		$bill= $res['bill'];
            		$nameofUser= $res['username'];
            		$email= $res['email'] ;
            		$phonenumber=$res['phonenumber'];

					// for updating rooms/villas/meeting table
                    $queryinsert= "INSERT INTO `booking`(`username`, `email`, `phonenumber`, `checkindate`, 
                    `checkoutdate`, `accomodationtype`, `accomodationname`, `accomodationnumber`, `bookingstatus`, `bill`) 
                    VALUES ('$nameofUser','$email','$phonenumber','$checkindatebnw','$checkoutdatebnw','$accomodationtypebn',
                    '$accomodationnamebn','$accomodationnumber','Reserved',
                    '$bill')";

			if($accomodationtypebn== "Room"){
				$queryselectfromdb= "select * from rooms where type= '$accomodationnamebn'";
				$res= mysqli_query($con, $queryselectfromdb);
				$num= mysqli_num_rows($res);
				if($num==1){
					while($row= mysqli_fetch_array($res)){
						$reservednumberfromdbtoupdate= $row['Reserved'];
						$availablenumberfromdbtoupdate= $row['Available'];
					
						$updatableavailable= $availablenumberfromdbtoupdate-$accomodationnumber;
						$updatablereserved= $reservednumberfromdbtoupdate+ $accomodationnumber;
					
						$queryupdate= "UPDATE `rooms` SET `Available`= '$updatableavailable', `Reserved`='$updatablereserved' 
						WHERE type= '$accomodationnamebn'";
					}
				}
				}elseif($accomodationtypebn== "Villa"){
					$queryselectfromdb= "select * from villas where type= '$accomodationnamebn'";
					$res= mysqli_query($con, $queryselectfromdb);
					$num= mysqli_num_rows($res);
					if($num==1){
						while($row= mysqli_fetch_array($res)){
							$reservednumberfromdbtoupdate= $row['Reserved'];
							$availablenumberfromdbtoupdate= $row['Available'];
						
							$updatableavailable= $availablenumberfromdbtoupdate-$accomodationnumber;
							$updatablereserved= $reservednumberfromdbtoupdate+ $accomodationnumber;
						
							$queryupdate= "UPDATE `villas` SET `Available`= $updatableavailable, `Reserved`=$updatablereserved 
							WHERE type= '$accomodationnamebn'";
						}
					}
				}elseif($accomodationtypebn== "Meeting"){
					$queryselectfromdb= "select * from meeting where name= '$accomodationnamebn'";
					$res= mysqli_query($con, $queryselectfromdb);
					$num= mysqli_num_rows($res);
					if($num==1){
						while($row= mysqli_fetch_array($res)){
							$queryupdate= "UPDATE `meeting` SET `Available`= 'No' WHERE name= '$accomodationnamebn'";
						}
					}
				}

				$insert= mysqli_query($con, $queryinsert);

				$update= mysqli_query($con, $queryupdate);

			if($insert && $update){
				$deletequery = "DELETE FROM `bookingtemp` WHERE 1";
				$delete = mysqli_query($con, $deletequery);
				if($delete){
					?>  <script>
		 
					alert("Hey there! Your input stored & updated!");
					window.location.href="sendbookingdetails.php";
		
				</script> <?php
				}
				
					
		//header("Location: https://www.tutorialrepublic.com/faq/how-to-make-a-redirect-in-php.php");
		//header don't work here
			}else{
				?>  <script>
				alert("Error 4040404");
				</script> <?php
			}

}
		//post method if condition

}