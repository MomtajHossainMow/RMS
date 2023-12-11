<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/RMS/css/style.css">
    <link rel="stylesheet" href="/RMS/css/style_home.css">
    <link rel="stylesheet" href="/RMS/css/styleform.css">
    <style>
        body{
            background-color: #000C1D;
        }
        ::placeholder{
            color:white;
            opacity: 1;
        }
    </style>
    <title>Login Page</title>
</head>
<body>
<br/><br/><br/>
<nav>
    <div class="logo"><a href="/RMS/html-php/home.php">Tusti Resort</a></div>
    
         <ul>
            <li><a href="/RMS/html-php/home.php">Home</a></li>
            <li><a href="#">Log In</a></li>
            <li><a href="/RMS/html-php/singup.php">Sign Up</a></li>
        </ul>
    </nav>

    <div class="background">
        <div class="form">
            <form action="login.php" method="POST">
                <h1>Login</h1>

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" required placeholder="Username" name="username" value="">
                </div>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" required placeholder="Password" name="password" value="">
                </div>

                <a href="requestReset.php" style="color: #52b050;font-size:18px;">Forget Password?</a>

                <input class="button" type="submit" name="submit" value="Sign In">

                <p style="color:white;font-size:18px;">
                    Don't have an account?
                    <a href="/RMS/html-php/singup.php" style="color: #52b050;">Sign Up</a>
                </p>
            </form>
        </div>
    </div>

    <?php
        $username = "root";
        $password = "";
        $server = "localhost";
        $database = "rms";
    
        $con = mysqli_connect($server,$username,$password,$database);
        //session_start();
        if($con){
                if(isset($_POST["submit"])){
                    $uname = $_POST["username"];
                    $pass = $_POST["password"];
                    $sql= "select * from admin where username = '$uname' and password= '$pass'";
                    $res = mysqli_query($con,$sql) or die(mysqli_error($con));
                    $count = mysqli_num_rows($res);
           
                    if($count==1)
                        {
                            $row = mysqli_fetch_assoc($res);
                            $password = $row['password'];
                                if($password == $pass )
                                    {
                                        ?>
                                        <script>
                                            alert("Loggged in Successfully");
                                        </script>
                                        <?php
                                        $_SESSION['UserName']= $uname;
                                        header("Location: /RMS/html-php/admin.php");
                                    }
                                else{
                                        ?>
                                            <script>
                                                alert("Wrong Username or Password");
                                            </script>
                                        <?php
                                    }
                        }
                    else
                        {
                            ?>
                                <script>
                                alert("Incorrect Username or Password");
                                </script>
                            <?php
                        }
                }  
        }
        else{
            die("No connection.." . mysqli_connect_error());
        }
    ?>
    
</body>
</html>