<!--Start Header Area -->
<?php 
    define('TITLE','Update Technician');
    define('PAGE','technician');
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
        if($_REQUEST['technician_name']=="" || $_REQUEST['technician_city']==""|| $_REQUEST['technician_mobile']=="" || $_REQUEST['technician_email']=="")
        {
            $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Please Fill All The Fields.</div>';
        }
        else
        {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['technician_name'];
            $city = $_REQUEST['technician_city'];
            $mobile = $_REQUEST['technician_mobile'];
            $email = $_REQUEST['technician_email'];

            $sql = "Update technician_tb Set emp_name = '$name', emp_city = '$city', emp_mobile = '$mobile', emp_email = '$email' Where emp_id ='$id' ";
            $result = $conn->query($sql);
            if($result)
            {
                $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Technician Updated.</div>';
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
<h3 class="text-center">Update Technician Details</h3>
<?php
if(isset($_REQUEST['edit']))
{
    $sql = "Select * From technician_tb Where emp_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
    <form action="" method="POST">
        <div class="form-group">
            <label>Technician ID</label>
            <input type="text" class="form-control" name="emp_id" value="<?php if(isset($row['emp_id'])){ echo $row['emp_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label>Technician Name</label>
            <input type="text" class="form-control" name="technician_name" value="<?php if(isset($row['emp_name'])){ echo $row['emp_name']; } ?>">
        </div>
        <div class="form-group">
            <label>Technician City</label>
            <input type="text" class="form-control" name="technician_city" value="<?php if(isset($row['emp_city'])){ echo $row['emp_city']; } ?>">
        </div>
        <div class="form-group">
            <label>Technician Mobile</label>
            <input type="text" class="form-control" name="technician_mobile" value="<?php if(isset($row['emp_mobile'])){ echo $row['emp_mobile']; } ?>">
        </div>
        <div class="form-group">
            <label>Technician Email</label>
            <input type="email" class="form-control" name="technician_email" value="<?php if(isset($row['emp_email'])){ echo $row['emp_email']; } ?>">
        </div>
        <button class="btn btn-info" type="submit" name="update"><input type="hidden" name="id" value="<?php echo $row['emp_id'] ?>">Update</button>
        <a href="technician.php" class="btn btn-secondary">Back</a>
        <?php if(isset($msg)){ echo $msg ; } ?>
    </form>    
</div>
<!--end 2nd Column-->



<!--Start Footer Area -->
<?php
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        