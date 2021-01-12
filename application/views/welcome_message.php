<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Panacea</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?=base_url('vendors/iconic-fonts/font-awesome/css/all.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('vendors/iconic-fonts/flat-icons/flaticon.css');?>">
    <link rel="stylesheet" href="<?=base_url('vendors/iconic-fonts/cryptocoins/cryptocoins.css');?>">
    <link rel="stylesheet" href="<?=base_url('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css');?>">
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="<?=base_url('assets/css/jquery-ui.min.css');?>" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="<?=base_url('assets/css/slick.css');?>" rel="stylesheet">
    <!-- Weedo styles -->
    <link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ">

<!-- Overlays -->
<div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>


<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
        <a class="pl-0 ml-0 text-center" href="index-2.html"> <img src="assets/img/dashboard/greendash-logo.png"
                                                                   alt="logo"> </a>
    </div>

    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#dashboard" aria-expanded="false"
               aria-controls="dashboard">
                <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
            </a>
            <ul id="dashboard" class="collapse" aria-labelledby="dashboard" data-parent="#side-nav-accordion">
                <li><a href="index-2.html">Weedo</a></li>
                <li><a href="pages/dashboard/web-analytics.html"> Web Analytics </a></li>
                <li><a href="pages/dashboard/social-media.html">Social Media</a></li>
                <li><a href="pages/dashboard/project-management.html">Project Management</a></li>
                <li><a href="pages/dashboard/client-management.html">Client Management</a></li>
            </ul>
        </li>
        <!-- /Dashboard -->
    </ul>


</aside>

<!-- Main Content -->
<main class="body-content">

    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar">

        <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
            <span class="ms-toggler-bar bg-primary"></span>
            <span class="ms-toggler-bar bg-primary"></span>
            <span class="ms-toggler-bar bg-primary"></span>
        </div>

        <div class="logo-sn logo-sm ms-d-block-sm">
            <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index-2.html"><img
                        src="assets/img/dashboard/greendash-logo-84x41.png" alt="logo"> </a>
        </div>

        <h2 class="text-white">Panacea Hospital</h2>

        <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
            <li class="ms-nav-item ms-nav-user dropdown">
                <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img
                            class="ms-user-img ms-img-round float-right" src="assets/img/dashboard/rakhan-potik-1.jpg"
                            alt="people"> </a>
                <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
                    <li class="dropdown-menu-header">
                        <h6 class="dropdown-header ms-inline m-0"><span
                                    class="text-disabled">Welcome, Anny Farisha</span></h6>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="ms-dropdown-list">
                        <a class="media fs-14 p-2" href="pages/prebuilt-pages/user-profile.html"> <span><i
                                        class="flaticon-user mr-2"></i> Profile</span> </a>
                        <a class="media fs-14 p-2" href="pages/apps/email.html"> <span><i
                                        class="flaticon-mail mr-2"></i> Inbox</span> <span
                                    class="badge badge-pill badge-info">3</span> </a>
                        <a class="media fs-14 p-2" href="pages/prebuilt-pages/user-profile.html"> <span><i
                                        class="flaticon-gear mr-2"></i> Account Settings</span> </a>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="dropdown-menu-footer">
                        <a class="media fs-14 p-2" href="pages/prebuilt-pages/lock-screen.html"> <span><i
                                        class="flaticon-security mr-2"></i> Lock</span> </a>
                    </li>
                    <li class="dropdown-menu-footer">
                        <a class="media fs-14 p-2" href="pages/prebuilt-pages/default-login.html"> <span><i
                                        class="flaticon-shut-down mr-2"></i> Logout</span> </a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>



</main>


<!-- SCRIPTS -->
<!-- Global Required Scripts Start -->
<script src="<?=base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
<script src="<?=base_url('assets/js/popper.min.js');?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?=base_url('assets/js/perfect-scrollbar.js');?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.min.js');?>"></script>
<!-- Global Required Scripts End -->

<!-- Page Specific Scripts End -->

<!--  core JavaScript -->
<script src="<?=base_url('assets/js/framework.js');?>"></script>

<!-- Settings -->
<script src="<?=base_url('assets/js/settings.js');?>"></script>

</body>


</html>

