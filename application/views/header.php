<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SyGVIB | Système de Gestion des Vehicules Immatriculés au Bénin</title>

    <!-- Favicon-->
    <link rel="icon" href="<?php echo img_url('favicon.ico') ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo assets('plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo assets('plugins/node-waves/waves.css'); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo assets('plugins/animate-css/animate.css'); ?>" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="<?php echo assets('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css'); ?>" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?php echo assets('plugins/dropzone/dropzone.css'); ?>" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?php echo assets('plugins/multi-select/css/multi-select.css'); ?>" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="<?php echo assets('plugins/jquery-spinner/css/bootstrap-spinner.css'); ?>" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="<?php echo assets('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo assets('plugins/bootstrap-select/css/bootstrap-select.css'); ?>" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="<?php echo assets('plugins/nouislider/nouislider.min.css'); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo css_url('style');?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo css_url('themes/all-themes');?>" rel="stylesheet" />
</head>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Chargement en cours...</p>
        </div>
    </div>

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Recherche rapide">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar" style="background-color: green;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="../../index.html">République du BENIN - SyGVIB </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!--DRAPEAU DU BENIN-->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            
            <?php
                include('userInfo.php');
                include('menu.php');
            ?>
            <!-- Footer -->
            <div class="legal">
                <div class="version">
                    <img src="<?php echo img_url('benin.png');?>" style='width: 20%;'>
                    <span style="margin-left: 20px; font-weight: bold;"><b>Rébublique du BENIN</b></span><br>
                </div>
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-4" style="background-color: green; height: 3px;"></div>                        
                        <div class="col-md-4" style="background-color: yellow; height: 3px;"></div>                        
                        <div class="col-md-4" style="background-color: red; height: 3px;"></div>                        
                    </div>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
