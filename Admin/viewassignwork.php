<!--Start Header Area -->
<?php 
    define('TITLE','Work Orders');
    define('PAGE','work');
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

<!--Start 2nd Column-->
<div class="col-sm-6 mt-3 mb-3 mx-5">
    <h3 class="text-center mt-5">Assigned Work Details</h3>
    <?php
        if(isset($_REQUEST['view']))
        {
            $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        ?>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Request ID</td>
                        <td><?php if(isset($row['request_id'])){ echo $row['request_id'];} ?></td>
                    </tr>
                    <tr>
                        <td>Request Info</td>
                        <td><?php if(isset($row['request_info'])){ echo $row['request_info']; } ?></td>
                    </tr>
                    <tr>
                        <td>Request Desc</td>
                        <td><?php if(isset($row['request_desc'])){ echo $row['request_desc']; } ?></td>
                    </tr>
                    <tr>
                        <td>Requester Name</td>
                        <td><?php if(isset($row['requester_name'])){ echo $row['requester_name']; } ?></td>
                    </tr>
                    <tr>
                        <td>Requester Address 1</td>
                        <td><?php if(isset($row['requester_add1'])){ echo $row['requester_add2']; } ?></td>
                    </tr>
                    <tr>
                        <td>Request Address 2</td>
                        <td><?php if(isset($row['requester_add2'])){ echo $row['requester_add2']; } ?></td>
                    </tr>
                    <tr>
                        <td>Requester City</td>
                        <td><?php if(isset($row['requester_city'])){ echo $row['requester_city']; } ?></td>
                    </tr>
                    <tr>
                        <td>Requester state</td>
                        <td><?php if(isset($row['requester_state'])){ echo $row['requester_state']; } ?></td>
                    </tr>
                    <!-- <tr>
                        <td>Request Zip</td>
                        <td><?php if(isset($row['requester_zip'])){ echo $row['requester_zip']; } ?></td>
                    </tr> -->
                    <tr>
                        <td>Requester Email</td>
                        <td><?php if(isset($row['requester_email'])){ echo $row['requester_email']; } ?></td>
                    </tr>
                    <tr>
                        <td>Requester mobile</td>
                        <td><?php if(isset($row['requester_mobile'])){ echo $row['requester_mobile']; } ?></td>
                    </tr>
                    <tr>
                        <td>Technician's Name</td>
                        <td><?php if(isset($row['assign_tech'])){ echo $row['assign_tech']; } ?></td>
                    </tr>
                    <tr>
                        <td>Customer's Sign</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Technician's Sign</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="text-center">
                <form action="" class="mb-5 d-print-none d-inline">
                    <input type="submit" class="btn btn-primary" value="Print" onClick="window.print()">
                </form> 
                <form action="work.php" class="mb-5 ml-3 d-print-none d-inline">
                    <input type="submit" class="btn btn-secondary" value="Close">    
                </form>
            </div>
    
<?php   } ?>

</div>
<!--End 2nd Column-->





<!--Start Footer Area -->
<?php 
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        