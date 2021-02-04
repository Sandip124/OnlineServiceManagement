<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <title><?php echo TITLE ?></title>
</head>
<body>
    <!--Start Top Navbar-->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="RequesterProfile.php">OSMS
        </a>
    </nav>  <!--End Top Navbar-->

    <!--start Container-->
    <div class="container-fluid" style="margin-top:40px;">
        <div class="row">  <!--Start row-->
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none"> <!--Start 1st column Side Bar-->
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'RequesterProfile'){echo 'active';} ?>" href="RequesterProfile.php"><i class="fas fa-user"></i>&nbsp;Profile</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'SubmitRequest'){echo 'active';} ?>" href="SubmitRequest.php"><i class="fab fa-accessible-icon"></i>&nbsp;Submit Request</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'CheckStatus'){echo 'active';} ?>" href="CheckStatus.php"><i class="fas fa-align-center"></i>&nbsp;Sevice Status</a></li>
                        <li class="nav-item"><a class="nav-link <?php if(PAGE == 'Requesterchangepass'){echo 'active';} ?>" href="Requesterchangepass.php"><i class="fas fa-key"></i>&nbsp;Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>


                    </ul>
                </div>       
            </nav> <!--End 1st column Side Bar-->
            