
<?php 
define("TITLE","Success"); 
// Start Header Area
include_once("includes/header.php");
//End Header Area

//Creating Connection
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

$sql = "Select * From submitrequest_tb Where request_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
    echo"<div class='ml-5 mt-5'>
            <table class='table'>
                <tbody>
                    <tr>
                        <th>Request ID</th>
                        <td>".$row['request_id']."</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>".$row['requester_name']."</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>".$row['requester_email']."</td>
                    </tr>

                    <tr>
                        <th>Request Info</th>
                        <td>".$row['request_info']."</td>
                    </tr>

                    <tr>
                        <th>Requst Description</th>
                        <td>".$row['request_desc']."</td>
                    </tr>

                    <tr>
                        <td>
                            <form class='d-print-none'>
                                <input type='submit' class='btn btn-danger' value='print' onClick='window.print()'>
                            </form>
                        </td>
                    </tr>
                
                </tbody>
            </table>
         </div>
        ";
}
else
{
    echo "failed";
}
?>

<!--Start Footer Area-->
<?php 
include_once("includes/footer.php");
?> <!--End Footer Area-->
