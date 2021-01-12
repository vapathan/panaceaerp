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
    <link href="<?= base_url('vendors/iconic-fonts/font-awesome/css/all.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('vendors/iconic-fonts/flat-icons/flaticon.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/iconic-fonts/cryptocoins/cryptocoins.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css'); ?>">
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="<?= base_url('assets/css/jquery-ui.min.css'); ?>" rel="stylesheet">
    <!-- styles -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/panacea_logo.png'); ?>">

</head>
<body>
<div class="mx-auto border p-4 shadow-sm" style="margin-top: 10%; width: 400px;">
    <form class="needs-validation" novalidate="" method="POST" action="<?= base_url('login'); ?>">
        <div class="text-center">
            <img class="img-fluid w-50" src="<?= base_url('assets/img/panacea_logo.png'); ?>">
        </div>

        <h3 class="text-center">Login</h3>
        <?php if($this->session->flashdata('error')):?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif;?>

        <div class="mb-3">
            <label for="mobile">User Id/ Mobile</label>
            <div class="input-group">
                <input type="text" class="form-control" id="mobile"
                       placeholder="Mobile" name="mobile"
                       required="">
                <div class="invalid-feedback">
                    Please provide a valid mobile number.
                </div>
            </div>
        </div>
        <div class="mb-2">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Password"
                       required="">
                <div class="invalid-feedback">
                    Please provide a password.
                </div>
            </div>
        </div>

        <button class="btn btn-primary mt-4 d-block w-100" type="submit">Sign In</button>
    </form>
</div>

</body>
<html>
