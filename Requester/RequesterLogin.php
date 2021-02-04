<?php 
include("../dbConnection.php");
session_start();
if(!isset($_SESSION['is_login']))
{
    if(isset($_REQUEST["rEmail"]))
    {
        $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST["rEmail"]));
        $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST["rPassword"]));

        $sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE r_email='".$rEmail."' AND r_password='".$rPassword."' limit 1";            $result = $conn->query($sql);
        if($result->num_rows==1)
        {
            $_SESSION['is_login']=true;
            $_SESSION['rEmail']=$rEmail;

            echo "<script> location.href='RequesterProfile.php'; </script>"; 
            exit;
        }
        else
        {
            $msg= '<div class="alert alert-danger mt-2" role="alert">Login failed.</div>';       
        }
    }
}
else
{
    echo "<script> location.href='RequesterProfile.php'; </script>"; 
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
     <!--Font Awesome-->
     <link rel="stylesheet" href="../css/all.min.css">

    <title>Login</title>
</head>
<body>
<div class="mt-5 text-center" style="font-size:30px;">
    <i class="fas fa-stethoscope">&nbsp;</i>
    <span class="">Online Service Management System </span>
</div>
<p class="text-center" style="font-size:30px;"><i class="fas fa-user-secret text-danger"></i>&nbsp;Requester Area</p>

<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-6 col-md-4">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <label for="email" class="font-weight-bold pl-2">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="rEmail">
                    <small class="form-text">We'll never share your email with anyone.</small>
                </div>

                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="pass" class="font-weight-bold pl-2">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="rPassword">
                    
                </div>

                <button class="btn btn-outline-danger mt-4 font-weight-bold btn-block shadow-sm" type="submit">Login</button>
                <?php if(isset($msg)){echo $msg;} ?>
            </form>

            <div class="text-center">
                <a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">
                    Back To Home
                </a>
            </div>
        </div>
    </div>
</div>




<script src="../js/jquery.js"></script> 
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>    
</body>
</html>