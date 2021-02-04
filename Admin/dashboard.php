<?php
    session_start();
    define('TITLE','Dashboard');
    define('PAGE','dashboard');

    include_once("../dbConnection.php");
?>
<!--Start Header Area -->
<?php 
    include_once("includes/header.php");
?>
<?php 
if(isset($_SESSION['is_adminlogin']))
{
    $aEmail = $_SESSION['aEmail'];
}
else
{
    echo "<script>location.href = 'login.php'</script>";
}

// Showing the number of request received
$sql = "SELECT max(request_id) FROM submitrequest_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$submitrequest = $row[0];

// Showing the number of work assign
$sql = "SELECT max(request_id) FROM assignwork_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$assignwork = $row[0];

// Showing the number of technician
$sql = "SELECT * FROM technician_tb";
$result = $conn->query($sql);
$totaltech = $result->num_rows;
?>
<!--End Header Area -->

    <div class="col-sm-9 col-md-10">  <!--Start Dashboard 2nd column-->
        <div class="row text-center mx-5">  
            <div class="col-sm-4 mt-5">  <!-- Start 1st column Request Received -->
                <div class="card text-white bg-danger md-3" style="max-width:18rem; ">
                        <div class="card-header">Request Received</div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $submitrequest; ?></h4>
                            <a href="request.php" class="btn text-white">View</a>
                        </div>
                </div>
            </div> <!-- End 1st column Request Received -->

            <div class="col-sm-4 mt-5">  <!-- Start 2nd column Assigned Work -->
                <div class="card text-white bg-success md-3" style="max-width:18rem; ">
                    <div class="card-header">Assigned Work</div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $assignwork; ?></h4>
                        <a href="work.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>  <!-- End 2nd column Assigned Work -->

            <div class="col-sm-4 mt-5">  <!-- Start 3rd column Number of Technicians-->
                <div class="card text-white bg-info md-3" style="max-width:18rem; ">
                    <div class="card-header">No. Of Technician</div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $totaltech; ?></h4>
                        <a href="technician.php" class="btn text-white">View</a>
                    </div>
                </div>
            </div>  <!-- End 3rd column Number Of Technicain-->
        </div>

        <div class="mx-5 mt-5 text-center">
            <p class="bg-dark text-white p-2">List Of Requesters</p>
            <?php
                $sql = "Select * From requesterlogin_tb";
                $result = $conn->query($sql);
                if($result->num_rows > 0)
                {
                    echo '
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Requester ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>

                        <tbody>';
                        while($row = $result->fetch_assoc())
                        {
                            echo'<tr>';
                            echo'<td>'.$row["r_login_id"].'</td>';
                            echo'<td>'.$row["r_Name"].'</td>';
                            echo'<td>'.$row["r_Email"].'</td>';
                            echo'</tr>';
                        }

                        echo'</tbody>
                        </table>
                        ';
                }
                else
                {
                    echo '0 Requesters';
                }
                    
            ?>
        </div>
    </div>   <!--End Dashboard 2nd column-->
<!--Start Footer Area -->
<?php 
    include_once("includes/footer.php");
?>
<!--End Footer Area -->        