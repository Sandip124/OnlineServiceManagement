<!--Start Header Area -->
<?php 
    define('TITLE','Update Requester');
    define('PAGE','requesters');
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

    // Updating Requester
    if(isset($_REQUEST['update']))
    {
        if($_REQUEST['requester_name']=="" || $_REQUEST['requester_email']=="")
        {
            $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Please Fill All The Fields.</div>';
        }
        else
        {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['requester_name'];
            $email = $_REQUEST['requester_email'];

            $sql = "Update requesterlogin_tb Set r_name = '$name', r_email = '$email' Where r_login_id ='$id' ";
            $result = $conn->query($sql);
            if($result)
            {
                $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Requester Updated.</div>';
            }
            else
            {
                $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Unable To Update.</div>';
            }
        }
    }
?>

<!--Start 2nd Column-->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
<h3 class="text-center">Update Requesters Details</h3>
<?php
if(isset($_REQUEST['edit']))
{
    $sql = "Select * From requesterlogin_tb Where r_login_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
    <form action="" method="POST">
        <div class="form-group">
            <label>Request ID</label>
            <input type="text" class="form-control" name="request_id" value="<?php if(isset($row['r_login_id'])){ echo $row['r_login_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label>Requester Name</label>
            <input type="text" class="form-control" name="requester_name" value="<?php if(isset($row['r_name'])){ echo $row['r_name']; } ?>">
        </div>
        <div class="form-group">
            <label>Requester Email</label>
            <input type="email" class="form-control" name="requester_email" value="<?php if(isset($row['r_email'])){ echo $row['r_email']; } ?>">
        </div>
        <button class="btn btn-info" type="submit" name="update"><input type="hidden" name="id" value="<?php echo $row['r_login_id'] ?>">Update</button>
        <a href="requester.php" class="btn btn-secondary">Back</a>
        <?php if(isset($msg)){ echo $msg ; } ?>
    </form>    
</div>
<!--end 2nd Column-->



<!--Start Footer Area -->
<?php
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        