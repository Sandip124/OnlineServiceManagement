<!--Start Header Area -->
<?php 
    define('TITLE','Work Reports');
    define('PAGE','workreport');
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
<!--End Header Area -->

<div class="col-sm-9 col-md-10 mt-5 text-center">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-2 mr-3">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div> <span> to </span>
            <div class="form-group col-md-2 ml-3">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary ml-3" name="searchsubmit" value="search">
            </div>
        </div>
    </form>
    <?php
    if(isset($_REQUEST['searchsubmit']))
    {
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];
        $sql = "Select * From assignwork_tb Where assign_date Between '$startdate' And '$enddate' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
?>
            <p class="bg-dark text-white mt-4 p-2">Details</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Request ID</th>
                        <th scope="col">Request Info</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Technician</th>
                        <th scope="col">Assigned Date</th>
                    </tr>
                </thead>
                <tbody>
<?php               while($row = $result->fetch_assoc())          
                    {
?>                        
                        <tr>
                            <td><?php echo $row['request_id']; ?></td>
                            <td><?php echo $row['request_info']; ?></td>
                            <td><?php echo $row['requester_name']; ?></td>
                            <td><?php echo $row['requester_add2']; ?></td>
                            <td><?php echo $row['requester_city']; ?></td>
                            <td><?php echo $row['requester_mobile']; ?></td>
                            <td><?php echo $row['assign_tech']; ?></td>
                            <td><?php echo $row['assign_date']; ?></td>
                        </tr>
<?php               } ?>
                        <tr class=" d-print-none">
                            <td>
                                <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
                            </td>
                        </tr>
                </tbody>
            </table>            
<?php   }
else
{
    echo '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">0 Records Found!</div>';
} 
    }
    ?>
</div>
<!--Start Footer Area -->
<?php 
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        