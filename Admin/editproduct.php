<!--Start Header Area -->
<?php 
    define('TITLE','Update Products');
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

    // Updating Requester
    if(isset($_REQUEST['update']))
    {
        if($_REQUEST['p_name']=="" || $_REQUEST['p_dop']=="" || $_REQUEST['p_available']=="" || $_REQUEST['p_total']=="" || $_REQUEST['p_costprice']=="" || $_REQUEST['p_sellingprice']=="")
        {
            $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Please Fill All The Fields.</div>';
        }
        else
        {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['p_name'];
            $dop = $_REQUEST['p_dop'];
            $available = $_REQUEST['p_available'];
            $total = $_REQUEST['p_total'];
            $costprice = $_REQUEST['p_costprice'];
            $sellingprice = $_REQUEST['p_sellingprice'];

            $sql = "Update assets_tb Set p_name = '$name', p_dop = '$dop', p_available = '$available', p_total = '$total', p_costprice = '$costprice', p_sellingprice = '$sellingprice' Where p_id ='$id' ";
            $result = $conn->query($sql);
            if($result)
            {
                $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Product Updated.</div>';
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
<h3 class="text-center">Update Product Details</h3>
<?php
if(isset($_REQUEST['editproduct']))
{
    $sql = "Select * From assets_tb Where p_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
    <form action="" method="POST">
        <div class="form-group">
            <label>Product ID</label>
            <input type="text" class="form-control" name="p_id" value="<?php if(isset($row['p_id'])){ echo $row['p_id']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="p_name" value="<?php if(isset($row['p_name'])){ echo $row['p_name']; } ?>">
        </div>
        <div class="form-group">
            <label>Date Of Purchase</label>
            <input type="date" class="form-control" name="p_dop" value="<?php if(isset($row['p_dop'])){ echo $row['p_dop']; } ?>">
        </div>
        <div class="form-group">
            <label>Available Product</label>
            <input type="text" class="form-control" name="p_available" value="<?php if(isset($row['p_available'])){ echo $row['p_available']; } ?>">
        </div>
        <div class="form-group">
            <label>Total Product</label>
            <input type="text" class="form-control" name="p_total" value="<?php if(isset($row['p_total'])){ echo $row['p_total']; } ?>">
        </div>
        <div class="form-group">
            <label>Cost Price</label>
            <input type="text" class="form-control" name="p_costprice" value="<?php if(isset($row['p_costprice'])){ echo $row['p_costprice']; } ?>">
        </div>
        <div class="form-group">
            <label>Selling Price</label>
            <input type="text" class="form-control" name="p_sellingprice" value="<?php if(isset($row['p_sellingprice'])){ echo $row['p_sellingprice']; } ?>">
        </div>
        
        <button class="btn btn-info" type="submit" name="update"><input type="hidden" name="id" value="<?php echo $row['p_id'] ?>">Update</button>
        <a href="assets.php" class="btn btn-secondary">Back</a>
        <?php if(isset($msg)){ echo $msg ; } ?>
    </form>    
</div>
<!--end 2nd Column-->





<!--Start Footer Area -->
<?php
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        