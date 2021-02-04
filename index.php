<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <title>NEWOSMS</title>
</head>
<body>
    <!-- Start of navigation-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top"> 
        <a href="index.php" class="navbar-brand">OSMS</a>
        <span class="navbar-text">Customer's Happiness is our aim</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>            
        </button>
        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav pl-5 custom-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li> 

            </ul>

        </div>
    
    </nav> <!-- End of navigation-->

    <!--Start Header jumbotron-->
    <header class="jumbotron back-image" style="background-image:url(images/banner1.jpg);">

    <div class="myClass mainHeading">
        <h1 class="text-danger font-weight-bold">Welcome To OSMS</h1>
        <p class="text-danger font-italic ">Customer's Happiness is Our Aim</p>
        <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
        <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>

    </div>
    </header> <!--End Header jumbotron-->


    <!--Start introduction container-->
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">OSMS Services</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Maxime libero quidem accusamus nobis velit beatae aspernatur deserunt quia error? 
                Neque ut esse nam.
                Eveniet rem itaque odio ea, expedita dicta?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Maxime libero quidem accusamus nobis velit beatae aspernatur deserunt quia error? 
                Neque ut esse nam.
                Eveniet rem itaque odio ea, expedita dicta?
            </p>
        </div>
    </div> <!--End introduction container-->

    <!--Start service Section container-->
    <div class="container text-center border-bottom" id="Services">
        <h2>Our Services</h2>
        <div class="row mt-4">
            <div class="col-sm-4 mb-4">
                <a href=""> <i class="fas fa-tv fa-8x text-success"></i> </a>
                <h4 class="mt-4">Electronic Appliance</h4>
            </div>

            <div class="col-sm-4 mb-4">
                <a href=""> <i class="fas fa-sliders-h fa-8x text-primary"></i> </a>
                <h4 class="mt-4">Preventive Maintainance</h4>
            </div>

            <div class="col-sm-4 mb-4">
                <a href=""> <i class="fas fa-cogs fa-8x text-info"></i> </a>
                <h4 class="mt-4">Fault Repair</h4>
            </div>
        </div>
    </div>  <!--End service Section container-->

    <!--Start Registration Form Container-->
    <?php include_once("UserRegistration.php"); ?>
    <!--End Registration Form Container-->


    <!--Start happy customer jumbotron-->
    <div class="jumbotron bg-danger">
        <div class="container">
            <h2 class="text-center text-white">Happy Customer</h2>
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-6"> <!--start column 1-->
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/avatar1.jpg" class="img-fluid" alt="avt1" style="border-radius:100px;">
                            <h4 class="card-title">Rinku Devi</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. 
                                Alias rem quas quis saepe.
                                Animi, necessitatibus eveniet, odit dolorum.
                            
                            </p>
                        </div>
                    </div>
                </div>  <!--End column 1-->

                <div class="col-lg-3 col-sm-6"> <!--start column 2-->
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/avatar2.jpg" class="img-fluid" alt="avt2" style="border-radius:100px;">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. 
                                Alias rem quas quis saepe.
                                Animi, necessitatibus eveniet, odit dolorum.
                            
                            </p>
                        </div>
                    </div>
                </div>  <!--End column 2-->
                
                <div class="col-lg-3 col-sm-6"> <!--start column 3-->
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/avatar3.jpg" class="img-fluid" alt="avt3" style="border-radius:100px;">
                            <h4 class="card-title">Hari Sharma</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. 
                                Alias rem quas quis saepe.
                                Animi, necessitatibus eveniet, odit dolorum.
                            
                            </p>
                        </div>
                    </div>
                </div>  <!--End column 3-->
                
                <div class="col-lg-3 col-sm-6"> <!--start column 4-->
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/avatar4.jpg" class="img-fluid" alt="avt4" style="border-radius:100px;">
                            <h4 class="card-title">Pawan Khatiwada</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. 
                                Alias rem quas quis saepe.
                                Animi, necessitatibus eveniet, odit dolorum.
                            
                            </p>
                        </div>
                    </div>
                </div>  <!--End column 4-->

            </div>
        </div>

    </div>

    <!--Start Contact Us Container-->
    <div class="container" id="Contact">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
            <!--Start 1st column-->
            <?php include_once("contactform.php"); ?>
            <!--End 1st column-->

            <div class="col-md-4 text-center">  <!--start 2nd column-->
                <strong>Headquarter</strong><br>
                OSMS Pvt.Ltd,<br>
                Kankai Municipality,<br>
                Province 1, Jhapa, Nepal,<br>
                Phone: +977 9807914589 <br>
                <a href="#" target="_blank">www.OSMS.com</a><br>
                <br><br>
                <strong>Branch</strong><br>
                OSMS Pvt.Ltd,<br>
                Kankai Municipality,<br>
                Province 1, Jhapa, Nepal,<br>
                Phone: +977 9807914589 <br>
                <a href="#" target="_blank">www.OSMS.com</a><br>

            </div>  <!--End 2nd Column-->
        </div>
    </div>  <!--End Contact Us Container-->

    <!--Start Footer-->
    <footer class="container-fluid bg-dark mt-5 text-white">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6">  <!--start 1st Column-->
                    <span class="pr-2">Follow Us: </span>
                    <a href="#" target="_blank" class="pr-2 fi-color f1"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color f1"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color f1"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color f1"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color f1"><i class="fas fa-rss"></i></a>

                </div>  <!--End 1st Column-->

                <div class="col-md-6 text-right">  <!--Start 2nd Column-->
                    <small>Designed By Dilli Ram Baral &copy; 2020</small>
                    <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
                </div>  <!--End 2nd Column-->
            </div>
        </div>
    </footer>

<!--JavaScript-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- <script src="js/jquery.js"></script> -->
<!-- <script src="js/popper.min.js"></script> -->
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="js/all.min.js"></script>
</body>
</html>