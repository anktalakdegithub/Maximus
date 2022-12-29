<?php
session_start();
include("config.php");
// $con=mysqli_connect('localhost','root','','maximusdb');
 $error="";

if(isset($_POST["login"]))
{
// Getting Post Vlaues
$email=$_POST['email'];
$password=md5($_POST['password']); // MD5 password encryption
// $password=$_POST['password']; // MD5 password encryption/
// print_r($password);die();
$sql =mysqli_query($con,"Select * from user_data where email ='$email' and password_login ='$password'");
// $sql =mysqli_query($con,"Select * from user_data where email ='$email'");

// print_r($sql);die();
$row = mysqli_fetch_assoc($sql);
if($row){
	   $_SESSION["id"]= $row["user_id"];
       $_SESSION["name"] = $row['user_name'];
       $_SESSION["email"] = $row['email'];
    
	// if remember me clicked . Values will be stored in $_COOKIE  array
if(!empty($_POST["remember"])){
//COOKIES for username
setcookie ("email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));

} else {
if(isset($_COOKIE["email"])) {
setcookie ("email","");
if(isset($_COOKIE["password"])) {
setcookie ("password","");
				}
			}
          }
        //   $error="valid";
                header("Location:daily_report.php");
	
}
  else {
		$error = "Invalid Login";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../images/msllog.png">
    <link rel="icon" type="image/png" href="../images/msllog.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Maximus</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        <?php
                                                              if(!empty($_GET['message'])) {
                                            $msg= $_GET['message'];
                                            echo '<p class="message"> '.$msg.'</p>';
                                            }?>
                                    </div>
                                    <form class="user" action="" method="post" id="login">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="password" name="password"
                                                value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div><input type="checkbox" name="remember" id="remember"
                                                    <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?> />
                                                <label for="remember-me">Remember me</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" name="login"
                                                value="Submit" /><br />

                                            <?php echo $error; ?>
                                        </div>
                                </div>


                                </form>
                                <hr>
                                <div class="text-center">
                                    <!-- <a class="font-weight-bold small" href="forgot _password.php">Forgot Password</a> -->
                                </div>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    </div>
</body>

</html>