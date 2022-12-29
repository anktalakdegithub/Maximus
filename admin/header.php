<?php
include_once 'config.php';
session_start();

$result = mysqli_query($con,"SELECT * FROM user_data WHERE user_id ='" .  $_SESSION["id"] . "'");
$row= mysqli_fetch_array($result);

$login_session=$row['email'];
if(!isset($login_session))
{
 header("Location: login.php");
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../images/msllog.png">
    <link rel="icon" type="image/png" href="../images/msllog.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Maximus</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
         
            <div class="sidebar-wrapper">
                <div class="logo">
                  <img src="../images/msll.png"  alt="Maximus Logo" width="220px">
                </div>
                <ul class="nav">
                  
                    <!-- <li>
                        <a class="nav-link" href="slider.php">
                        <i class='fas fa-angle-double-up' style='font-size:26px'></i>

                            <p>Slider</p>
                        </a>
                    </li> -->

                    <li>
                        <a class="nav-link" href="daily_report.php">
                        <!-- <i class='fas fa-angle-left' style='font-size:36px'></i><i class='fas fa-angle-right' style='font-size:36px'></i> -->
                        <i class="fa fa-book" style="font-size:22px"></i>

                            <p>Daily Report</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="research_report.php">
                        <!-- <i class='fas fa-angle-left' style='font-size:36px'></i><i class='fas fa-angle-right' style='font-size:36px'></i> -->
                        
                        <i class="fa fa-bookmark" style="font-size:22px" aria-hidden="true"></i>

                            <p>Research Report</p>
                        </a>
                    </li>

                    <li>
                        <a class="nav-link" href="news.php">
                        <!-- <i class='fas fa-angle-left' style='font-size:36px'></i><i class='fas fa-angle-right' style='font-size:36px'></i> -->
              
                        <i class="fa fa-newspaper-o" style="font-size:22px" aria-hidden="true"></i>
                            <p>News</p>
                        </a>
                    </li>
                   
                </ul>
                
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo">  </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                   
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                           
                            
                        </ul>
                        <ul class="navbar-nav ml-auto">
                          
                           
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
       