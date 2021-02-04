<?php 
    if(session_id() == '')
    {
        session_start();
    }
    if(isset($_SESSION['is_adminlogin']))
    {
        $aEmail = $_SESSION['aEmail'];
    }

    else
    {
        echo "<script>location.href = 'login.php'</script>";
    }
    if(isset($_REQUEST['view']))
    {
        $sql = "SELECT * FROM submitrequest_tb WHERE request_id ={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();    
    }

    if(isset($_REQUEST['close']))
    {
        $sql = "DELETE FROM submitrequest_tb WHERE request_id ={$_REQUEST['id']}";
        if($conn->query($sql) == true)
        {
            echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
        }
        else
        {
            echo "unable to delete";
        }
        
    }

    if(isset($_REQUEST['assign']))
    {
        if($_REQUEST['requestid'] == "" || $_REQUEST['assigntech'] == "" || $_REQUEST['inputdate'] == "")
        {
            $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert">Please Fill All The Fields.</div>';       
        }
        else
        {
            $rid = $_REQUEST['requestid'];
            $rinfo = $_REQUEST['requestinfo'];
            $rdesc = $_REQUEST['requestdesc'];
            $rname = $_REQUEST['requestername'];
            $radd1 = $_REQUEST['address1'];
            $radd2 = $_REQUEST['address2'];
            $rcity = $_REQUEST['requestercity'];
            $rstate = $_REQUEST['requesterstate'];
           // $rzip = $_REQUEST['requesterzip'];
            $remail = $_REQUEST['requesteremail'];
            $rmobile = $_REQUEST['requestermobile'];
            $rassigntech = $_REQUEST['assigntech'];
            $rdate = $_REQUEST['inputdate'];


            $sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc,
            requester_name, requester_add1, requester_add2, requester_city, requester_state, 
             requester_email, requester_mobile, assign_tech, assign_date) VALUES 
            ('$rid', '$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', 
             '$remail', '$rmobile', '$rassigntech', '$rdate')";

            $result = $conn->query($sql);
            if($result)
            {
                $sql = "DELETE FROM submitrequest_tb WHERE request_id ={$_REQUEST['requestid']}";
                if($conn->query($sql) == true)
                {
                    echo '<meta http-equiv="refresh" content="0;URL=?closed" />';
                }
                $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Technician Assigned.</div>';
            }
            else
            {
                $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Failed Assign Technician.</div>';       
            }
        }
    }

?>

 <!--Start 3rd column Assigned Work Form-->
<div class="col-sm-5 mt-5 jumbotron"> 
    <form action="" method="POST">
        <h5 class="form-text text-center">Assign Work Order Request</h5>
        <div class="form-group">
            <label for="request_id">Request ID</label>
            <input type="text" class="form-control" id="requestid" name="requestid" value="<?php if(isset($row['request_id'])){echo $row['request_id'];}?>" readonly>
  
        </div>
        <div class="form-group">
            <label for="requestinfo">Request Info</label>
            <input type="text" class="form-control" id="requestinfo" name="requestinfo" value="<?php if(isset($row['request_info'])){echo $row['request_info'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="requestdesc">Description</label>
            <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['request_desc'])){echo $row['request_desc'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="requestername">Requester Name</label>
            <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['requester_name'])){echo $row['requester_name'];}?>" readonly>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address1">Address Line 1</label>
                <input type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['requester_add1'])){echo $row['requester_add1'];}?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="address2">Address Line 2</label>
                <input type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($row['requester_add2'])){echo $row['requester_add2'];}?>" readonly>
            </div>
        </div>
        <div class="form-row">    
            <div class="form-group col-md-6">
                <label for="requestercity">Requester City</label>
                <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if(isset($row['requester_city'])){echo $row['requester_city'];}?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="requesterstate">Requester State</label>
                <input type="text" class="form-control" id="requesterstate" name="requesterstate" value="<?php if(isset($row['requester_state'])){echo $row['requester_state'];}?>" readonly>
            </div>
            <!-- <div class="form-group col-md-4">
                <label for="requesterzip">Zip Code</label>
                <input type="text" class="form-control" id="requesterzip" name="requesterzip" value="<?php if(isset($row['requester_zip'])){echo $row['requester_zip'];}?>" onkeypress="isInputNumber(event)" readonly>
            </div>    -->
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="requesteremail">Email</label>
                <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['requester_email'])){echo $row['requester_email'];}?>" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="requestermobile">Mobile No.</label>
                <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if(isset($row['requester_mobile'])){echo $row['requester_mobile'];}?>" onkeypress="isInputNumber(event)" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="assigntech">Assign To Technician</label>
                  <!-- <input type="text" class="form-control" id="assigntech" name="assigntech">   -->
                    <select name="assigntech" id="assigntech" class="form-control">
                    <option value="">Select Technician</option>
                    <option value="Dilli Ram Baral">Dilli Ram Baral</option>
                    <option value="Sujan Thapa">Sujan Thapa</option>
                    <option value="Udhav Adhikari">Udhav Adhikari</option>
                    </select>
                  
           </div>
            <div class="form-group col-md-6">
                <label for="inputdate">Date</label>
                <input type="date" class="form-control" id="inputdate" name="inputdate">
            </div>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success" name="assign">Assign</button>
            <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
        </div>
    </form>
    <?php if(isset($msg)){ echo $msg ;} ?>
</div>  <!--End 3rd column Assigned Work Form-->


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