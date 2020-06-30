<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Campus Management System</title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->

    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/css/themes/all-themes.css" rel="stylesheet" />

    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery Nestable Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/plugins/nestable/jquery-nestable.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo $general_class->ben_resources('sms'); ?>/css/themes/all-themes.css" rel="stylesheet" />
    <style type="text/css">
        .drag_disabled{
            pointer-events: none;
        }
    </style>
</head>
<?php echo $general_class->ben_resources('sms'); ?>/plugins/flot-charts/jquery.flot.time.js
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
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html" style="top: -10px;position: relative;"><img style="height: 41px;display: inline;" src="http://stepsmandaluyong.com/brainee/resources/version_1/images/general/school.png"><p style="
    display: inline;
    top: -7px;
    position: relative;
">St. Therese Private School</p><p style="
    display: block;
    top: -24px;
    position: relative;
    left: 55px;
    font-size: 12px;
">Campus Management System</p></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo $general_class->ben_resources('sms'); ?>/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Liza Soberano</div>
                    <div class="email">liza.soberano@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Handled Subjects</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">security</i>Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="http://stepsmandaluyong.com/brainee/index.php/version_1/general/login/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.html">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Registrar</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="http://stepsmandaluyong.com/brainee/index.php/version_1/general/dashboard/admission">Admission</a>
                            </li>
                            <li>
                                <a href="/brainee/index.php/version_1/sms/grading/form_138">Form 138</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Enrollment</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Grades / Report Card Reporting</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Form 138</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Student Evaluation</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Tagging of Graduates</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Student Profile</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Parent Profile</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Transport Routes</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Human Resource</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Staff 201 file</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Staff Attendance</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Leave Management</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Faculty Board</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Staff & Teachers Evaluation</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Applicant list / Process</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Employees Loans</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Employees Benefits / Records</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">attach_money</i>
                            <span>Accounting</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Attendance Record</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Time Keeping</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Payroll System</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Employee's Loans / Benefits</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Cashiering</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Inventories</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Enrollment</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Employees Benefits / Records</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">face</i>
                            <span>Academic</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Campus Learning</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Grading System</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Student Attendance & ID System</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Class Schedule</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Library</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>eBook</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Enrollment</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Cashiering</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html"></a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 - 2019 <a href="javascript:void(0);">Powered By Click Innovation</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 2.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div> 
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Form 138</h2>
            </div>
            
            <!-- Default Example -->
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Form 138
                                <small>View or Print student's Form 138</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="clearfix m-b-20">
                                <div class="dd" id="student_tree">
                                    <ol class="dd-list">
                                        <?php foreach($general_class->data['filtered_students'] as $filtered_students_key=>$filtered_students_value): ?>
                                            <li class="dd-item dd-collapsed" data-id="2">
                                                <div class="dd-handle drag_disabled">Grade <?php echo $filtered_students_key ?></div>
                                                <ol class="dd-list">
                                                    <?php foreach($filtered_students_value as $section_key=>$section_value): ?>
                                                        <a href="<?php echo $general_class->ben_link('sms/grading/view_section/'); ?>2018-2019/2/<?php echo $filtered_students_key ?>/<?php echo $section_key ?>">
                                                            <li class="dd-item dd-collapsed" data-id="5">
                                                                <div class="dd-handle drag_disabled"><?php echo $section_key ?></div>
                                                            </li>
                                                        </a>
                                                    <?php endforeach;?>
                                                </ol>
                                            </li>
                                        <?php endforeach;?>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Jquery Core Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/node-waves/waves.js"></script>

    <!-- Jquery Nestable -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/nestable/jquery.nestable.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/js/admin.js"></script>
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/js/pages/ui/sortable-nestable.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/js/demo.js"></script>
    <script type="text/javascript">
        $("#student_tree").nestable({
            collapsedClass:'dd-collapsed',
        }).nestable('collapseAll');
    </script>
</body>

</html>
