<?php
define("TITLE","Change Password");
define("PAGE","Requesterchangepass");

//Start Header Area
include_once("includes/header.php");
//End Header Area

//Creating Connection
include_once("../dbConnection.php");

session_start();
if($_SESSION['is_login'])
{
    $rEmail = $_SESSION['rEmail'];
}
else
{
    echo "<script>location.href = 'RequesterLogin.php'</script>";
}

if(isset($_REQUEST['passupdate']))
{
    if($_REQUEST['rPassword'] == "" || $_REQUEST['roldPassword'] == "")
    {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Please Enter New Password.</div>';       
    }
    else
    {
        $rPass =$_REQUEST['rPassword'];
        $roldPass = $_REQUEST['roldPassword'];
        $sql1 = "Select * From requesterlogin_tb Where r_email = '$rEmail'";
        $result = $conn->query($sql1);
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            if($roldPass == $row['r_password'])
            {
                $sql = "Update requesterlogin_tb Set r_password = '$rPass' Where r_email = '$rEmail'";
                if($conn->query($sql) == true)
                {
                    $msg = '<div class="alert alert-Success col-sm-6 mt-2 ml-5" role="alert">Password Updated Successfully.</div>';
                    echo "<script>location.href = '../logoutredirect.php'</script>";       
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
                <input type="email" class="form-control" id="inputEmail" value="<?php echo  $rEmail ; ?>" readonly>
            </div>
        </div>
        <div class="form-row">    
            <div class="form-group col-md-6">
                <label for="inputoldpassword">Old Password</label>
                <input type="password" class="form-control" id="inputoldpassword" name="roldPassword" palceholder="Old Password">
            </div>
        </div>
        <div class="form-row">    
            <div class="form-group col-md-6">
                <label for="inputnewpassword">New Password</label>
                <input type="password" class="form-control" id="inputnewpassword" name="rPassword" palceholder="New Password">
            </div>
        </div>

            <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
            <button type="reset" class="btn btn-secondary mt-4">Reset</button>
            <?php if(isset($msg)){ echo $msg; }?>

    </form>
</div>   <!--Start 2nd column Change password-->











<!--Start Footer Area-->
<?php 
include_once("includes/footer.php");
?> <!--End Footer Area-->
