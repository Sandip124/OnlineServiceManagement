<?php 
    define('TITLE','Assets');
    define('PAGE','assets');
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
    if($_REQUEST['p_name']=="" || $_REQUEST['p_dop']=="" || $_REQUEST['p_available']=="" || $_REQUEST['p_total']=="" || $_REQUEST['p_costprice']=="" || $_REQUEST['p_sellingprice']=="")
    {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Fill All The Fields.</div>';
    }
    else
    {
        $pname = $_REQUEST['p_name'];
        $pdop = $_REQUEST['p_dop'];
        $pavailable = $_REQUEST['p_available'];
        $ptotal = $_REQUEST['p_total'];
        $pcostprice = $_REQUEST['p_costprice'];
        $psellingprice = $_REQUEST['p_sellingprice'];

        $sql = "Insert Into assets_tb (p_name, p_dop, p_available, p_total, p_costprice, p_sellingprice) Values ('$pname', '$pdop', '$pavailable', '$ptotal', '$pcostprice', '$psellingprice') ";
        $result = $conn->query($sql);
        if($result)
        {
            $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Product Added Successfully.</div>';
        }
        else
        {
            $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Failed To Add Products.</div>';
        }
    }
    
}
?>
<div class="col-sm-6 mt-5 mx-5 jumbotron">
    <h3 class="text-center">Add New Products</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="p_name">
        </div>
        <div class="form-group">
            <label>Date Of Purchase</label>
            <input type="date" class="form-control" name="p_dop">
        </div>
        <div class="form-group">
            <label>Available Product</label>
            <input type="text" class="form-control" name="p_available" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label>Total Product</label>
            <input type="text" class="form-control" name="p_total" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label>Cost Price</label>
            <input type="text" class="form-control" name="p_costprice" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label>Selling Price</label>
            <input type="text" class="form-control" name="p_sellingprice" onkeypress="isInputNumber(event)">
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-success mr-3" type="submit" name="add">Add</button>
            <a href="assets.php" class="btn btn-secondary">Back</a>
        </div>
        <?php if(isset($msg)){ echo $msg ; } ?>
    </form>    
</div>
<!--end 2nd Column-->
<script>
    function isInputNumber(evt)
    {
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch)))
        {
            evt.preventDefault();
        }
    }
</script>



<!--Start Footer Area -->
<?php
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        