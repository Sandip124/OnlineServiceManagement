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

    // Deleting Data 
    if(isset($_REQUEST['delete']))
    {
        $sql = "Delete From assignwork_tb Where request_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        if($result == true)
        {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }
    }
?>
<div class="col-sm-9 col-md-10 mt-5"><!--Start 2nd Column-->
<?php 
    $sql = "Select * From assignwork_tb";
    $result= $conn->query($sql);
    if($result->num_rows > 0)
    {
        echo '<table class="table">';
            echo '<thead>';
                echo '<tr>';
                echo '<th scope = "col">Request ID</th>';
                echo '<th scope = "col">Request Info</th>';
                echo '<th scope = "col">Name</th>';
                echo '<th scope = "col">Address</th>';
                echo '<th scope = "col">City</th>';
                echo '<th scope = "col">Mobile</th>';
                echo '<th scope = "col">Technician</th>';
                echo '<th scope = "col">Assigned Date</th>';
                echo '<th scope = "col">Action</th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            while($row = $result->fetch_assoc())
            {
                echo '<tr>';
                    echo '<td>'.$row['request_id'].'</td>';
                    echo '<td>'.$row['request_info'].'</td>';
                    echo '<td>'.$row['requester_name'].'</td>';
                    echo '<td>'.$row['requester_add2'].'</td>';
                    echo '<td>'.$row['requester_city'].'</td>';
                    echo '<td>'.$row['requester_mobile'].'</td>';
                    echo '<td>'.$row['assign_tech'].'</td>';
                    echo '<td>'.$row['assign_date'].'</td>';
                    echo '<td>';
                        echo '<form class="d-inline mr-2" action="viewassignwork.php" method="POST">';
                            echo '<input type="hidden" name="id" value='.$row['request_id'].'><button type="submit" class="btn btn-warning" name="view" value="View"><i class="far fa-eye"></i></button>';
                        echo '</form>';
                        echo '<form class="d-inline" action="" method="POST">';
                            echo '<input type="hidden" name="id" value='.$row['request_id'].'><button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button>';
                        echo '</form>';

                    echo '</td>';

                echo '</tr>';
            }
                
            echo '</tbody>';
        echo '</table>';
    }
    else
    {
        echo "0 Work Order.";
    }
?>
</div>  <!--End 2nd Column-->







<!--Start Footer Area -->
<?php 
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        