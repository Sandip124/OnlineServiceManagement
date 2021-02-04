<!-- Start Header Area-->
<?php
define("TITLE","Service Status");
define("PAGE","CheckStatus");
include_once("includes/header.php");
include_once("../dbConnection.php");


session_start();
if($_SESSION['is_login'])
{
    $rEmail = $_SESSION['rEmail'];
}
else
{
    echo "<script>location.href = 'RequesterLogin.php'</script>";
}
?>

<!--Start 2nd Column-->
<div class="col-sm-6 mt-5 mx-3">
    <form action="" class="form-inline d-print-none" method="POST">
        <div class="form-group mr-3">
            <label for="checkid">Enter Request Id: </label>
            <input type="text" class="form-control ml-2" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
        </div>
        <button type="submit" class="btn btn-danger" name="search">Search</button>
    </form>

    <?php
    if(isset($_REQUEST['checkid']))
    {   
        if($_REQUEST['checkid']=="")
        {
            echo '<div class="alert alert-warning mt-4">Empty Field.</div>';
        }
        else
        {
            $sql1 = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql1);
            if($result->num_rows > 0)
            {
                echo '<div class="alert alert-warning mt-4">Your Request Is Still Pending.</div>';
            }
            else
            {
                $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
                $result = $conn->query($sql);
                if($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    if($_REQUEST['checkid'] == $row['request_id'])
                    {              
        ?>
                        <h3 class="text-center mt-5">Assigned Work Details</h3>
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
                                <tr>
                                    <td>Request Zip</td>
                                    <td><?php if(isset($row['requester_zip'])){ echo $row['requester_zip']; } ?></td>
                                </tr>
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
                            <form action="" class="mb-3 d-print-none">
                                <input type="submit" class="btn btn-primary" value="Print" onClick="window.print()">
                                <input type="submit" class="btn btn-secondary" value="Close">
    
                            </form>
                        </div>
          <?php     } 
                   
                }
                else
                {
                    echo '<div class="alert alert-warning mt-4">Wrong Input.</div>';
                }
            
            }
        }
    }
    ?>
</div> <!--end 2nd Column-->

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


<!--Start Footer Area-->
<?php 
include_once("includes/footer.php");
?> <!--End Footer Area-->
