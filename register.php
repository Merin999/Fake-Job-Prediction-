<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Fake Job Detection</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Rubic main styles -->
	<link rel="stylesheet" href="assets/css/rubic.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" href="#"><strong class="text-primary"></strong><span class="text-light"></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                   <!-- <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#review">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4" href="components.html">Log Out</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
	
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-md-7">
                    <div class="header-content">
                        <h3 class="header-title"><strong class="text-primary">FAKE JOB PREDICTION</strong><span></span></h3>
                        <h4 class="header-subtitle"></h4>
                        <p></p>
                        <!--<button class="btn btn-outline-light btn-flat">Download</button>-->
                    </div>  
                </div>
                <div class="col-md-5 d-none d-md-block">
                    <form class="header-form" method="POST" enctype="multipart/form-data">
                        <div class="head"><span class="text-primary"></span></div>
                        <div class="body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name*" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  name="email" placeholder="Email*" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password*" required>
                            </div>
                        </div>
                        <div class="footer">
							<button class="btn btn-primary btn-block" name="submit">Register</button>
							<a class="btn btn-primary btn-block" href="index.php">Already a user? Login</a>
                        </div>
                    </form> 
					
					<?php
						session_start();
						include ("connection.php");
						if(isset($_POST['submit']))
						{
							$name=$_POST['name'];
							$email=$_POST['email'];
							$pwd=$_POST['password'];
							
							$ins="insert into reg(name,email,password) values('$name','$email','$pwd')";
							mysqli_query($con,$ins);
							echo '<script>alert("Succesfully Registered!")</script>'; 
						}
					?>
					
					
                </div>
            </div>  
        </div>
    </header>
	
	<?php
	include("footer.php");
	?>
	
	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Rubic js -->
    <script src="assets/js/rubic.js"></script>

</body>
</html>
