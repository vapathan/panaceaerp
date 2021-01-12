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
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@500&display=swap" rel="stylesheet">


    <link href="<?= base_url('vendors/iconic-fonts/font-awesome/css/all.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('vendors/iconic-fonts/flat-icons/flaticon.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/iconic-fonts/cryptocoins/cryptocoins.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css'); ?>">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="<?= base_url('assets/css/jquery-ui.min.css'); ?>" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="<?= base_url('assets/css/datatables.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/slick.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sweetalert2.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/easy-autocomplete.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/easy-autocomplete.themes.min.css'); ?>" rel="stylesheet">
    <!-- Weedo styles -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/panacea_logo.png'); ?>">

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ">

<!-- Overlays -->
<div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>


<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
        <img src="assets/img/panacea_logo.png"
             alt="logo">
    </div>

    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">

        <li class="menu-item">
            <a href="<?= base_url('dashboard'); ?>" class="">
                <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
            </a>

        </li>

        <!--Patients-->
        <li class="menu-item">
            <a href="<?= base_url('patients'); ?>" class="">
                <span><i class="material-icons fs-16">pregnant_woman</i>Patients</span>
            </a>
        </li>
        <!--Patients-->
        <!-- Purchase -->
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#purchase" aria-expanded="false"
               aria-controls="purchase">
                <span><i class="material-icons fs-16">add_shopping_cart</i>Purchase </span>
            </a>
            <ul id="purchase" class="collapse" aria-labelledby="purchase" data-parent="#side-nav-accordion">
                <li><a href="<?= base_url('purchase-entry'); ?>">Purchase Entry </a></li>
                <li><a href="<?= base_url('purchase-details'); ?>">Purchase Details</a></li>
            </ul>

        </li>
        <!-- /Purchase -->

        <!-- Purchase -->
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#sales" aria-expanded="false"
               aria-controls="sales">
                <span><i class="material-icons fs-16">remove_shopping_cart</i>Sales </span>
            </a>
            <ul id="sales" class="collapse" aria-labelledby="purchase" data-parent="#side-nav-accordion">
                <li><a href="<?= base_url('sales-entry'); ?>">Sales Entry </a></li>
                <li><a href="<?= base_url('sales-details'); ?>">Sales Details</a></li>
            </ul>

        </li>
        <!-- /Purchase -->
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
                        src="<?= base_url('assets/img/panacea_logo.png'); ?>" alt="logo"> </a>
        </div>

        <h2 class="text-white">Panacea Hospital</h2>

        <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
            <li class="ms-nav-item ms-nav-user dropdown">
                <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?=$this->session->name;?><img
                            class="ms-user-img ms-img-round float-right" src="<?= base_url('assets/img/user.png'); ?>"
                            alt="User"> </a>
                <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
                    <li class="dropdown-menu-footer">
                        <a class="media fs-14 p-2" href="<?= base_url('logout'); ?>"> <span><i
                                        class="flaticon-shut-down mr-2"></i> Logout</span> </a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>