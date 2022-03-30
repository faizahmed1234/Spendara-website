<?php
$alert=false;
$error=false;
$pass_error=false;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include "db_connect.php";
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $re_password=$_POST['re_pass'];
    if($password==$re_password){
        if(($name!=null)and($email!=null)and($password!=null)and($re_password!=null)){
            $sql= "INSERT INTO `spendara`.`user-info` ( `Name`, `Email`, `Password`, `Date`) VALUES ( '$name', '$email', '$password', current_timestamp());";
            if ($con->query($sql) == true){
                $alert=true;
            }else{
                $error=true;
            }
        }else{
            $error=true;
        }
        
    }else{
        $pass_error=true;
    }
    

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spendara - Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="expense-tracker">
        <a class="navbar-brand" href="../index.html"><img src="../logo/signinlogo.png" alt="logo"></a>
    </div>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="signup.php" method="POST" class="register-form" id="register-form">
                        <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re_pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <?php
                                if($error){
                                    echo '<div class="alert alert-danger" role="alert" style="text-align:center">
                                    Your account could not be created
                                </div>';
                                }
                                if($pass_error){
                                    echo '<div class="alert alert-danger" role="alert" style="text-align:center">
                                    Passwords don\'t match
                                </div>';
                                }
                                if($alert){
                                    echo '<div class="alert alert-info" role="alert" style="text-align:center">
                                    Your account have been created
                                </div>';
                                }       
                            ?>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>   
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
