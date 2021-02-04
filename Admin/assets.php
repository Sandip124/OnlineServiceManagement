<!--Start Header Area -->
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
    // Deleting requesters
    if(isset($_REQUEST['delete']))
    {
        $sql = "DELETE FROM assets_tb WHERE p_id ={$_REQUEST['id']}";
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
    <p class="bg-dark text-white p-2">List Of products</p>
    <?php 
        $sql = "Select * From assets_tb";
        $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
            echo '<table class="table">';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th scope="col">Product ID</th>';
                        echo '<th scope="col">Product Name</th>';
                        echo '<th scope="col">DOP</th>';
                        echo '<th scope="col">Available</th>';
                        echo '<th scope="col">Total</th>';
                        echo '<th scope="col">Cost Price</th>';
                        echo '<th scope="col">Selling Price</th>';
                        echo '<th scope="col">Action</th>';
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while($row = $result->fetch_assoc())
                {
                    echo '<tr>';
                        echo '<td>'.$row['p_id'].'</td>';
                        echo '<td>'.$row['p_name'].'</td>';
                        echo '<td>'.$row['p_dop'].'</td>';
                        echo '<td>'.$row['p_available'].'</td>';
                        echo '<td>'.$row['p_total'].'</td>';
                        echo '<td>'.$row['p_costprice'].'</td>';
                        echo '<td>'.$row['p_sellingprice'].'</td>';
                        echo '<td>';
                            echo '<form class="d-inline" action="editproduct.php" method="POST">';
                                echo '<input type="hidden" name="id" value='.$row['p_id'].'><button class="btn btn-warning mr-2" type="submit" name="editproduct"><i class="fas fa-pen"></i></button>'  ;  
                            echo '</form>';
                            echo '<form class="d-inline" action="" method="POST">';
                                echo '<input type="hidden" name="id" value='.$row['p_id'].'><button class="btn btn-secondary mr-2" type="submit" name="delete"><i class="fas fa-trash-alt"></i></button>'  ;  
                            echo '</form>';
                            echo '<form class="d-inline" action="sellproduct.php" method="POST">';
                                echo '<input type="hidden" name="id" value='.$row['p_id'].'><button class="btn btn-success mr-2" type="submit" name="sell"><i class="fas fa-handshake"></i></button>'  ;  
                            echo '</form>';
                        echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
            echo '</table>';
        }
        else
        {
            echo "0 Products";
        }
    
    ?>
</div>  <!--End 2nd Column-->
</div>  <!--End row-->
<!--Add New Products-->
<div class="float-right">
    <a href="insertproducts.php" class="btn btn-success">
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