
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleform.css">
    <style>
        ::placeholder{
            color:white;
            opacity: 50%;
        }
    </style>
    <title>Forgot Password</title>
</head>
<body>
    <!--Navigation Bar-->
    <div class="bar">
        <ul>
            <li><a href="../html-php/home.php">Home</a></li>
            <li><a href="../html-php/login.php">Log In</a></li>
            <li><a href="../html-php/singup.php">Sign Up</a></li>
        </ul>
    </div>

    <div class="background">
        <div class="form">
            <form action="forgotpassword.php" method="POST">
                <h1>Reset Passkey</h1>

                <div class="textbox">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" required placeholder="email" name="username" value="">
                </div>

                <input class="button" type="submit" name="submit" value="Send mail">

            </form>
        </div>
    </div>

</body>
</html>