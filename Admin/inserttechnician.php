<?php 
    define('TITLE','Technicians');
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
?>

<?php
if(isset($_REQUEST['add']))
{
    if($_REQUEST['technician_name']=="" || $_REQUEST['technician_city']=="" || $_REQUEST['technician_mobile']=="" || $_REQUEST['technician_email']=="")
    {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Fill All The Fields.</div>';
    }
    else
    {
        $tname = $_REQUEST['technician_name'];
        $tcity = $_REQUEST['technician_city'];
        $tmobile = $_REQUEST['technician_mobile'];
        $temail = $_REQUEST['technician_email'];
    
        $sql = "Insert Into technician_tb (emp_name, emp_city, emp_mobile, emp_email) Values ('$tname', '$tcity', '$tmobile', '$temail') ";
        $result = $conn->query($sql);
        if($result)
        {
            $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Technician Added Successfully.</div>';
        }
        else
        {
            $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Failed To Add Technician.</div>';
        }
    }
    
}
?>
<div class="col-sm-6 mt-5 mx-5 jumbotron">
    <h3 class="text-center">Add New Technician</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label>Technician Name</label>
            <input type="text" class="form-control" name="technician_name">
        </div>
        <div class="form-group">
            <label>Technician City</label>
            <input type="text" class="form-control" name="technician_city">
        </div>
        <div>
            <label>Technician Mobile</label>
            <input type="text" class="form-control" name="technician_mobile">
        </div>
        <div>
            <label>Technician Email</label>
            <input type="email" class="form-control" name="technician_email">
        </div>
        <div class="mt-3">
            <button class="btn btn-success mr-3" type="submit" name="add">Add</button>
            <a href="technician.php" class="btn btn-secondary">Back</a>
        </div>
        <?php if(isset($msg)){ echo $msg ; } ?>

    </form>    
</div>


<!--Start Footer Area -->
<?php
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        