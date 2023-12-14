<?php 


if( isset($_POST['submit'])){
	$file= $_FILES['file'];
	$name= $_POST['name'];
	$details = $_POST['details'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];



	$fileExt= explode('.', $fileName);
	$fileActualExt= strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if(in_array($fileActualExt, $allowed)){
		if($fileError===0){
			if($fileSize < 10500000){
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination= 'uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				//
				?>
				<script>
				//alert("Upload successful");
				</script>
				<?php	
							
		$query= "INSERT INTO `offer`(`imageaddress`, `offername`, `offerdetails`) VALUES ('$fileNameNew', '$name' , '$details')";
		echo $query;
		
		include 'connection.php';
		mysqli_query($con, $query);
				//header("Location: admin-offer.php?uploadsuccess");
				
				$selectquery = " select imageaddress from offer where imageaddress = '$fileNameNew' ";
				$queryimgadrs = mysqli_query($con,$selectquery);
				$num = mysqli_num_rows($queryimgadrs);
				while($res = mysqli_fetch_array($queryimgadrs)){
				
				echo"
				<a href='imageshow.php?imgname=$res[imageaddress]' >Show The Image</a>
				
			 ";
				}
		
		}else{
				echo "Your file is too big! Image size should be less than 10 MB";
			}
		}else{
			echo "There was an error uploading your file";
		}
	}else{
		echo "You can't upload file of this type";
	}
}


 ?>