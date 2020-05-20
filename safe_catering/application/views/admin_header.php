<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auditor View</title>
    <!-- Styles -->
    <link href="<?php echo base_url(); ?>assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/unix.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li class="label">MENU</li>
                    <li><a href="<?php echo base_url(); ?>Admin/index">Home</a></li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>User Creation <span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>

                        <ul>
                            <li><a href="<?php echo base_url(); ?>Admin/create_user">Create New</a></li>
                            
                        </ul>
                    </li>
                       <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>View User<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Admin/admin_view">Admin</a></li>
                            <li><a href="<?php echo base_url(); ?>Admin/auditor_view">Auditor</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/vendor_view">Vendor</a></li>
                        </ul>
                    </li>
                 <!--    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Supplier<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Admin/supplier_add">Add Supplier</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/supplier_view">View Supplier</a></li>
                        </ul>
                    </li>
                     <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>SC Forms<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Admin/safe_catering_1">SC 1</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/safe_catering_2">SC 2</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/safe_catering_3">SC 3</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/safe_catering_4">SC 4</a></li>
                        </ul>
                    </li>  -->
                    <li><a href="<?php echo base_url();?>login/logout"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->
    <div class="header">
        <div class="pull-left">
            <div class="logo"><span>Safe Catering Admin</span></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>
                <li class="header-icon dib"><img class="avatar-img" src="<?php echo base_url(); ?>assets/images/avatar/1.jpg" alt="" /> <span class="user-avatar"><?php echo $this->session->userdata('email'); ?> <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                        <div class="dropdown-content-heading">   
                            <p class="trial-day">Log out</p>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>Login/logout"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>