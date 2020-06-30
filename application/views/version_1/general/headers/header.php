<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Campus Management System</title>

    <!-- Favicon-->
    <link rel="icon" href="<?php echo $general_class->ben_image('general/school.png') ?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/css/materials.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- Bootstrap Core Css -->

    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/css/themes/all-themes.css" rel="stylesheet" />

    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- JQuery Nestable Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/nestable/jquery-nestable.css" rel="stylesheet" />
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
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2><?php echo $general_class->page_title ?></h2>
        </div>