<?php 
    define('TITLE','Requesters');
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
?>

<?php
if(isset($_REQUEST['add']))
{
    if($_REQUEST['requester_name']=="" || $_REQUEST['requester_email']=="" || $_REQUEST['requester_password']=="")
    {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Fill All The Fields.</div>';
    }
    else
    {
        $rname = $_REQUEST['requester_name'];
        $remail = $_REQUEST['requester_email'];
        $rpassword = $_REQUEST['requester_password'];
    
        $sql = "Insert Into requesterlogin_tb (r_name, r_email, r_password) Values ('$rname', '$remail', '$rpassword') ";
        $result = $conn->query($sql);
        if($result)
        {
            $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Requester Added.</div>';
        }
        else
        {
            $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Failed To Add Requester.</div>';
        }
    }
    
}
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Requesters</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label>Requester Name</label>
            <input type="text" class="form-control" name="requester_name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="requester_email">
        </div>
        <div>
            <label>Password</label>
            <input type="password" class="form-control" name="requester_password">
        </div>
        <div class="mt-3">
            <button class="btn btn-success mr-3" type="submit" name="add">Add</button>
            <a href="requester.php" class="btn btn-secondary">Back</a>
        </div>
        <?php if(isset($msg)){ echo $msg ; } ?>
    </form>    
</div>
<!--end 2nd Column-->



<!--Start Footer Area -->
<?php
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        