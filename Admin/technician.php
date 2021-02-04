<!--Start Header Area -->
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
    // Deleting Technicinas
    if(isset($_REQUEST['delete']))
    {
        $sql = "DELETE FROM technician_tb WHERE emp_id ={$_REQUEST['id']}";
        if($conn->query($sql) == true)
        {
            echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
        }
        else
        {
            echo "unable to delete";
        }
        
    }
?>
<!--End Header Area -->

<!--Start 2nd Column-->
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white p-2">List Of Technician</p>
    <?php 
        $sql = "Select * From technician_tb";
        $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
            echo '<table class="table">';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th scope="col">Technician ID</th>';
                        echo '<th scope="col">Technician Name</th>';
                        echo '<th scope="col">Technician City</th>';
                        echo '<th scope="col">Technician Mobile</th>';
                        echo '<th scope="col">technician Email</th>';
                        echo '<th scope="col">Action</th>';
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while($row = $result->fetch_assoc())
                {
                    echo '<tr>';
                        echo '<td>'.$row['emp_id'].'</td>';
                        echo '<td>'.$row['emp_name'].'</td>';
                        echo '<td>'.$row['emp_city'].'</td>';
                        echo '<td>'.$row['emp_mobile'].'</td>';
                        echo '<td>'.$row['emp_email'].'</td>';
                        echo '<td>';
                            echo '<form class="d-inline" action="edittechnician.php" method="POST">';
                                echo '<input type="hidden" name="id" value='.$row['emp_id'].'><button class="btn btn-warning mr-2" type="submit" name="edit"><i class="fas fa-pen"></i></button>'  ;  
                            echo '</form>';
                            echo '<form class="d-inline" action="" method="POST">';
                                echo '<input type="hidden" name="id" value='.$row['emp_id'].'><button class="btn btn-secondary mr-2" type="submit" name="delete"><i class="fas fa-trash-alt"></i></button>'  ;  
                            echo '</form>';
                        echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
            echo '</table>';
        }
        else
        {
            echo "0 Technicians";
        }
    
    ?>
</div>
<!--End 2nd Column-->






<!--Add New Yechnicians-->


</div>  <!--End row-->
<div class="float-right">
    <a href="inserttechnician.php" class="btn btn-success">
    <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
</div> <!--End Container-->


<!--Javascript-->
<script src="../js/jquery.js"></script> 
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>     
</body>
</html>       