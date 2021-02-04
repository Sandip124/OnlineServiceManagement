<?php
define("TITLE","Requester Profile");
define("PAGE","RequesterProfile");

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

$sql = "Select r_name From requesterlogin_tb Where r_email='$rEmail'";
$result = $conn->query($sql);
if($result)
{
    $row = $result->fetch_assoc();
    $rName = $row['r_name'];
}

if(isset($_REQUEST['nameupdate']))
{
    if($_REQUEST['rName'] == "")
    {
        $passmsg = '<div class="alert alert-warning mt-2" role="alert">Please Specify The Name.</div>';       
    }
    else
    {
        $rName = $_REQUEST['rName'];
        $sql = "Update requesterlogin_tb Set r_name ='$rName' Where r_email = '$rEmail'";
        if($conn->query($sql) == true)
        {
            $passmsg = '<div class="alert alert-success mt-2" role="alert">Updated Successfully.</div>';       
        }
        else
        {
            $passmsg = '<div class="alert alert-danger mt-2" role="alert">Unable To Updated.</div>';       
        }
    }
}
?>
<!--Header Area-->
<?php include_once("includes/header.php"); ?>

    <div class="col-sm-6 mt-5">  <!--Start 2nd column Profile Area-->
        <form action="" method="POST" class="mx-5" >
            <div class="form-group">
                <label for="rEmail">Email</label>
                <input type="email" class="form-control" name="rEmail" id="rEmail" value="<?php echo $_SESSION['rEmail']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="rName">Name</label>
                <input type="text" class="form-control" name="rName" id="rName" value="<?php echo $rName; ?>">
            </div>

            <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>    
            <?php if(isset($passmsg)){ echo $passmsg; }?>
        </form>
    </div>  <!--end 2nd column Profile Area-->
        
<!--Footer Area-->
<?php include_once("includes/footer.php"); ?>