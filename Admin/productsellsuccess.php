<?php 
    define('TITLE','Success');
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

    $sql = "SELECT * FROM customer_tb WHERE cust_id={$_SESSION['myid']}";
    $result=$conn->query($sql);
    if($result->num_rows==1)
    {
        $row = $result->fetch_assoc();
?>
        <div class="ml-5 mt-5">
    <h3 class="text-center">Customer Bill</h3>
    <table class="table">
        <tbody>
            <tr>
                <th>Customer ID</th>
                <td><?php echo $row['cust_id']; ?></td>
            </tr>
            <tr>
                <th>Customer Name</th>
                <td><?php echo $row['cust_name']; ?></td>
            </tr>
            <tr>
                <th>Customer Address</th>
                <td><?php echo $row['cust_add']; ?></td>
            </tr>
            <tr>
                <th>Product</th>
                <td><?php echo $row['cpname']; ?></td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><?php echo $row['cpquantity']; ?></td>
            </tr>
            <tr>
                <th>Price Per Unit</th>
                <td><?php echo $row['cpcostprice']; ?></td>
            </tr>
            <tr>
                <th>Total Amount</th>
                <td><?php echo $row['cptotal']; ?></td>
            </tr>
            <tr>
                <th>Date</th>
                <td><?php echo $row['cpdate']; ?></td>
            </tr>
            <tr>
                <td>
                    <form class="d-print-none"><input type="submit" class="btn btn-danger" value="Print" onClick="window.print()"></form>
                </td>
                <td>
                    <a href="assets.php" class="btn btn-secondary d-print-none">Close</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php }
    else
    {
        echo "0 Failed";
    }
?>

 







<!--Start Footer Area -->
<?php 
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        