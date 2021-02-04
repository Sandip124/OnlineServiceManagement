<!--Start Header Area -->
<?php 
    define('TITLE','Change Password');
    define('PAGE','changepass');

    include_once("includes/header.php");
    include_once("../dbConnection.php");

    session_start();
    if(isset($_SESSION['is_adminlogin']))
    {
        $aEmail = $_SESSION['aEmail'];
    }
    else
    {
        echo "<script>location.href = 'login.php'</script>";
    }

    if(isset($_REQUEST['passupdate']))
    {
        if($_REQUEST['aPassword'] == "" || $_REQUEST['aoldPassword'] == "")
        {
            $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Please Fill All The Fields.</div>';       
        }
        else
        {
            $aPass =$_REQUEST['aPassword'];
            $aoldPass = $_REQUEST['aoldPassword'];
            $sql1 = "Select * From adminlogin_tb Where a_email = '$aEmail'";
            $result = $conn->query($sql1);
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();
                if($aoldPass == $row['a_password'])
                {
                    $sql = "Update adminlogin_tb Set a_password = '$aPass' Where a_email = '$aEmail'";
                    if($conn->query($sql) == true)
                    {
                        $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Password Updated Successfully.</div>';
                        echo "<script>location.href = 'adminlogoutredirect.php'</script>";       
                    }
                    else
                    {
                        $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Unable To Update Password.</div>';       
                    }
                }
                else
                {
                    $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Your Old Password Did Not Matched.</div>';       
                }
            }
            
        }   
    }
    
?>

<div class="col-sm-9 col-md-10"> <!--Start 2nd column Change password-->
    <form class="mt-5 mx-5" action="" method="POST" autocomplete="off">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" value="<?php echo  $aEmail ; ?>" readonly>
            </div>
        </div>
        <div class="form-row">    
            <div class="form-group col-md-6">
                <label for="inputoldpassword">Old Password</label>
                <input type="password" class="form-control" id="inputoldpassword" name="aoldPassword" palceholder="Old Password">
            </div>
        </div>
        <div class="form-row">    
            <div class="form-group col-md-6">
                <label for="inputnewpassword">New Password</label>
                <input type="password" class="form-control" id="inputnewpassword" name="aPassword" palceholder="New Password">
            </div>
        </div>

            <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            <?php if(isset($msg)){ echo $msg; }?>

    </form>
</div>   <!--Start 2nd column Change password-->






<!--Start Footer Area -->
<?php
    include_once("includes/footer.php");
?>
<!--End Footer Area --> 