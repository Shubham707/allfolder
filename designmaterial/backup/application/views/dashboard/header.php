    <!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from modularcode.io/modular-admin-html/forms.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Feb 2018 07:31:04 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Paycrypt Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.html">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>vendor/image/paycrypt-favicon.png"/>
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/css/vendor.css">
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/css/set1.css">
        <!-- Theme initialization -->
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/css/app.css">
        <link rel="stylesheet" href="<?php echo base_url();?>vendor/css/lightbox.css">
    </head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                  <div class="header-block header-block-collapse d-lg-none d-xl-none">
                      <button class="collapse-btn" id="sidebar-collapse-btn">
                          <i class="fa fa-bars"></i>
                      </button>
                  </div>
                    <div class="header-block header-block-search">

                    </div>

                    <div class="header-block header-block-nav">
                      <ul>
                          <li>
                              <a href="#"><?php echo $this->session->userdata('userFirstName'); ?></a>
                          </li>
                          <li>
                              <a href="<?php echo base_url();?>logout">Logout <i class="fa fa-sign-out"></i></a>


                          </li>
                      </ul>

                    </div>



                </header>
                <aside class="sidebar">
                  <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <img src="<?php echo base_url();?>vendor/assets/img/paycrypt-Logo.png">
                                <hr ></hr>
                            </div>
                        </div>
