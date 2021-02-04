<!--Start Header Area -->
<?php
define('TITLE', 'Sell Product');
define('PAGE', 'assets');
include_once("includes/header.php");
include_once("../dbConnection.php");
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script>location.href = 'login.php'</script>";
}

if (isset($_REQUEST['sellproduct'])) {
    if ($_REQUEST['p_name'] == "" || $_REQUEST['c_name'] == "" || $_REQUEST['c_address'] == "" || $_REQUEST['p_available'] == "" || $_REQUEST['p_quantity'] == "" || $_REQUEST['p_sellingprice'] == "" || $_REQUEST['p_totalprice'] == "" || $_REQUEST['p_selldate'] == "") {
        $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Fill All The Fields.</div>';
    } else {
        $pid = $_REQUEST['p_id'];
        $pname = $_REQUEST['p_name'];
        $cname = $_REQUEST['c_name'];
        $caddress = $_REQUEST['c_address'];
        $pavailable = $_REQUEST['p_available'] - $_REQUEST['p_quantity'];
        $pquantity = $_REQUEST['p_quantity'];
        $psellingprice = $_REQUEST['p_sellingprice'];
        $ptotalprice = $_REQUEST['p_totalprice'];
        $pselldate = $_REQUEST['p_selldate'];

        $sql = "INSERT INTO customer_tb(cust_name, cust_add, cpname, cpquantity, cpcostprice, cptotal, cpdate) VALUES ('$cname', '$caddress', '$pname', '$pquantity', '$psellingprice', '$ptotalprice', '$pselldate')";
        $result = $conn->query($sql);
        if ($result) {
            $genid = mysqli_insert_id($conn);
            $_SESSION['myid'] = $genid;
            echo "<script>location.href = 'productsellsuccess.php'</script>";
        }
        $sqlup = "Update assets_tb Set p_available = '$pavailable' Where p_id = '$pid' ";
        $conn->query($sqlup);
    }
}

?>

<!--Start 2nd Column-->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Bill Product</h3>
    <?php
    if (isset($_REQUEST['sell'])) {
        $sql = "Select * From assets_tb Where p_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="" method="POST">
        <div class="form-group">
            <label>Product ID</label>
            <input type="text" class="form-control" name="p_id" value="<?php if (isset($row['p_id'])) {
                                                                            echo $row['p_id'];
                                                                        } ?>" readonly>
        </div>
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="p_name" value="<?php if (isset($row['p_name'])) {
                                                                                echo $row['p_name'];
                                                                            } ?>" readonly>
        </div>
        <div class="form-group">
            <label>Customer Name</label>
            <input type="text" class="form-control" name="c_name">
        </div>
        <div class="form-group">
            <label>Customer Address</label>
            <input type="text" class="form-control" name="c_address">
        </div>
        <div class="form-group">
            <label>Available Product</label>
            <input type="text" class="form-control" name="p_available" value="<?php if (isset($row['p_available'])) {
                                                                                    echo $row['p_available'];
                                                                                } ?>" id="availableQuantity" readonly>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" class="form-control" name="p_quantity" id="qty" minlength="0" onkeyup="CalculateTotal()">
        </div>
        <div class="form-group">
            <label>Selling Price</label>
            <input type="text" class="form-control" name="p_sellingprice" id="sp" value="<?php if (isset($row['p_sellingprice'])) {
                                                                                                echo $row['p_sellingprice'];
                                                                                            } ?>" readonly>
        </div>
        <div class="form-group">
            <label>Total Price</label>
            <input type="number" class="form-control" name="p_totalprice" id=total_number readonly />
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" class="form-control" name="p_selldate">
        </div>
        <button class="btn btn-info" type="submit" name="sellproduct">Sell</button>
        <a href="assets.php" class="btn btn-secondary">Back</a>

        <?php if (isset($msg)) {
            echo $msg;
        } ?>
    </form>
</div>
<!--end 2nd Column-->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }

    function CalculateTotal() {

        let sp = $('#sp').val();
        let qty = $('#qty').val();

        let availableQuantity = parseInt($("#availableQuantity").val());

        if (parseInt(qty) < 0) {
            alert("Value cannot be negative.")
            $('#qty').val(0);
        } else if (parseInt(qty) > availableQuantity) {
            alert("Value cannot be greater than available quantity.")
            $('#qty').val(availableQuantity);
        }

        $('#total_number').val(parseFloat(sp) * parseFloat(qty));
    }
</script>




<!--Start Footer Area -->
<?php
include_once("includes/footer.php");
?>
<!--End Footer Area -->