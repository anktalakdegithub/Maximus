<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
    <?php 
      $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
    <link rel="canonical" href="<?=$actual_link;?>"  />
    <meta property="og:type" content="Maximus Securities Limited" />

    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>" />
    <meta property="og:site_name" content="Maximus Securities Limited" />
    <meta property="og:url" content="<?php echo htmlspecialchars($actual_link); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>" />
    <meta property="og:image" content="https://www.maximussecurities.com/images/msllog.png" />
    <meta property="og:image:secure_url" content="https://www.maximussecurities.com/images/msllog.png" />
    <link rel="icon" type="image/png" href="images/msllog.png">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">

    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="bg-top navbar-light d-flex flex-column-reverse">
        <div class="container py-2">
            <div class="row no-gutters d-flex align-items-center align-items-stretch">
                <div class="col-md-5 d-flex align-items-center">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/msll.png" class="mslimg" alt="msl">
                    </a>
                    <!-- <a class="navbar-brand" href="index.html">MSL <span>Consulting Agency</span></a> -->
                </div>
                <div class="col-md-7 d-block">
                    <div class="row d-flex">
                        <nav class="navbar navbar-expand-lg" id="ftco-navbar">
                            <div class="container d-flex align-items-center">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="oi oi-menu"></span>
                                </button>
                                <!-- <form action="#" class="searchform order-lg-last">
							  <div class="form-group d-flex">
								<input type="text" class="form-control pl-3" placeholder="Search">
								<button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
							  </div>
							</form> -->
                                <ul class="navbar-nav order-lg-last">
                                    <!-- <li class="nav-item dropdown">
									<a class="dropdown-toggle btn btn-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
										Login
									</a>
									<div class="dropdown-menu" style="width: max-content;" aria-labelledby="navbarDropdown">
									 
									  <div class="dropdown-divider"></div>
									  <form class="dropdown-item">
										  <h5>Login Here</h5>
										<div class="form-group">
										
										  <input type="email" class="form-control form-control-sm" placeholder="Username" id="exampleInputEmail1" aria-describedby="emailHelp">
										   </div>
										<div class="form-group">
										
										  <input type="password" class="form-control form-control-sm" placeholder="Password" id="exampleInputPassword1">
										</div>
										<button type="submit" class="btn btn-primary btn-block">Login</button>
										<small style="margin-top: 2px;margin-bottom: 2px;">Forgot Your Password</small>
									  </form>
									</div>
								  </li> -->
                                    <li class="nav-item dropdown">
                                        <a class=" dropdown-toggle btn btn-secondary" href="#"
                                            id="navbarDropdownMenuLinkbtn" role="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Login
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkbtn">
                                            <li><a class="dropdown-item" href="https://customer.maximussecurities.com/">Demat Login</a></li>
                                            <li><a class="dropdown-item" href="https://customer.maximussecurities.com/">Trading Login</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="collapse navbar-collapse" id="ftco-nav">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Research Report
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                 <li><a class="dropdown-item" href="daily.php">Daily Report</a></li>
                                                <li><a class="dropdown-item" href="blog.php">Research Report</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="download.php" class="nav-link">Download</a></li>
                                        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                                        <!-- <li class="nav-item"><a href="news.php" class="nav-link">News</a></li> -->
                                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                                        <!-- <li class="nav-item p-2"> <a href="POLICIES/KYC_annexure J_for individual.pdf" class="btn btn-outline-primary d-flex" download><span class="ion-ios-cloud-download mx-1"></span> KYC</a></li> -->

                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-social-menu py-1 bg-primary text-white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="social mb-0">
                            <!-- <a class="text-white" href="#"><i class="ion-logo-facebook"></i><span class="sr-only">Facebook</span></a> -->
                            <!-- <a class="text-white" href="#"><i class="ion-logo-twitter"></i><span class="sr-only">Twitter</span></a> -->
                            <!-- <a class="text-white" href="#"><i class="ion-logo-googleplus"></i><span class="sr-only">Googleplus</span></a> -->
                        </p>
                    </div>
                    <div class="col text-right">
                        <!-- <a href="#" class="btn-link text-white">Request A Quote</a> -->
                        <span>
                            <i class="icon icon-envelope"></i>
                            msl@maximussecurities.com
                        </span>
                        <span>
                            <i class="icon icon-phone pl-2">
                            </i> Tel – 022-61418700

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
          </div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">About</a></li>
	        	-- <li class="nav-item"><a href="team.html" class="nav-link">Serives</a></li> --
	        	<li class="nav-item"><a href="#" class="nav-link">Report</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">Services</a></li>
	        	<li class="nav-item"><a href="#" class="nav-link">News</a></li>
	          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    -- END nav -->