<!DOCTYPE html>
<html>
<head>
    <title>New Meeting Room Adding</title>
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
    width: 45%;
    border-radius: 5 px;
    border: 0;
}


</style>
</head>
<body>
<div class ="loginform">
    <h2 style="color: black ;"><u> Adding New Meeting Room/ Hall </u></h2><br>
    <form action="add_meeting.php" method="post" enctype="multipart/form-data">
        <p> Name </p>
        <textarea name="name" required rows="2" cols="52.5" ></textarea>

        <p> Capacity </p>
        <textarea name="capacity" required rows="2" cols="52.5" ></textarea>

        <p> Rate </p>
        <textarea name="rate" required rows="2" cols="52.5" ></textarea>

        <p> Image </p>
        <input type="file" required name="file">

        <p> Details </p>
        <textarea name="detail" id="" cols="52.5" rows="5" required></textarea>


        <button type="submit" name="submit"> Add </button>
        <button style="float: right" type="submit" name="cancel" onclick="history.back()">CANCEL</button>
    </form>
</div>
</body>
</html>
<?php
        $username = "root";
        $password = "test";
        $server = "db";
        $database = "rms";
    
        $con = mysqli_connect($server,$username,$password,$database);
        
        if($con){
                if(isset($_POST["submit"])){
                    $name = $_POST["name"];
                    $capacity = $_POST["capacity"];
                    $rate = $_POST["rate"];
                    $file= $_FILES['file'];
	                $details = $_POST['detail'];

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
				
                    $sql= "INSERT INTO `meeting`(`Name`, `Available`, `Capacity`, `Rate`, `image`, `detail`) VALUES ('$name','Yes','$capacity','$rate', '$fileNameNew' , '$details')";
                    $res = mysqli_query($con,$sql) or die(mysqli_error($con));
                    if($res){
                        ?>
                                        <script>
                                            alert("New information added");
                                        </script>
                                        <?php
                                        header("Location: ../html-php/admin-meeting.php");
                    }
                    else{
                        ?>
                                            <script>
                                                alert("Failed to add information");
                                            </script>
                                        <?php
                    }
                }
            }
        }
    }
}
?>


<?php
//some important code portions

// header("Location: ../html-php/admin-meeting.php");

// window.location.href="home.php"; // for javascript, use script tags



?>