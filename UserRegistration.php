<?php
    // Creating Connection 
    include("dbConnection.php");
    //checking for empty fields
    if(isset($_REQUEST["rSignup"]))
        {
        if($_REQUEST["rName"] =="" || $_REQUEST["rEmail"] =="" || $_REQUEST["rPassword"] =="")
        {
            $regmsg= '<div class="alert alert-warning mt-2" role="alert">Please Fill all The Fields.</div>';
        }
        else
        {
            // checking for already existing email account
            $sql="SELECT r_Email FROM requesterlogin_tb WHERE r_Email=='".$_REQUEST['rEmail']."'";
            $result=$conn->query($sql);
            if($result)
            {
            $regmsg= '<div class="alert alert-warning mt-2" role="alert">Email already Registered.</div>';
            }
            else
            {
                // assigning data from the form to the variables
                $rName = $_REQUEST['rName'];
                $rEmail = $_REQUEST['rEmail'];
                $rPassword = $_REQUEST['rPassword'];

                // Inserting the data into the database
                $sql = "Insert Into requesterlogin_tb (r_Name, r_Email, r_Password) Values ('$rName','$rEmail','$rPassword')";
                if($conn->query($sql) == true)
                {
                $regmsg= '<div class="alert alert-success mt-2" role="alert">Account Created Successfully.</div>';
                }
                else
                {
                $regmsg= '<div class="alert alert-danger mt-2" role="alert">Unable To Created Account.</div>';
                }
            }
            
        }
    }
?>



<!--Start Registration Form Container-->
<div class="container pt-5" id="registration">
        <h2 class="text-center">Create an Account</h2>
        <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
                <form action="" class="shadow-lg p-4" method="POST" auto_Complete="off">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <label for="name" class="font-weight-bold pl-2">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="rName">
                    </div>

                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <label for="email" class="font-weight-bold pl-2">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="rEmail">
                    </div>
                    <small class="form-text">We'll never share your email with anyone.</small>
                    
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="pass" class="font-weight-bold pl-2">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="rPassword">
                    </div> 
                    
                    <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
                    <em style="font-size:13px;">Note: By Clicking the sign up, you agree to our terms, data policy and cookie policy.</em>
                    <?php if(isset($regmsg)){echo $regmsg;} ?>
                </form>
            </div>
        </div>
    </div>  <!--End Registration Form Container-->