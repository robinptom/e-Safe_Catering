<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New User</title>
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
                      <li>
                    <a href="<?php echo base_url(); ?>Auditor/index">Dashboard</a>
                </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Vendor Creation<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/vendor_auditor_add">Create New</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Vendor list<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                          <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/vendor_list">Vendor list</a></li>
                               <li><a href="<?php echo base_url(); ?>Auditor/yellow_offenders">Yellow Offenders</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/orange_offenders">Orange Offenders</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/red_offenders">Red Offenders</a></li>
                        </ul>
                    </li>
                   <!--  <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>SC Forms<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/auditor_sc1">SC 1</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/auditor_sc2">SC 2</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/auditor_sc3">SC 3</a></li>
                             <li><a href="<?php echo base_url(); ?>Auditor/auditor_sc4">SC 4</a></li>
                        </ul>
                    </li> -->
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Reports<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/sc_reports">View Reports</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('Login/logout');?>"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="pull-left">
            <div class="logo"><span>Safe Catering Auditor</span></div>
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
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>USER CREATION<span><a href="<?php echo base_url(); ?>Login/logout"></span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                  <div class="col-md-4">
  <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Error!</strong>  <?php  echo $this->session->flashdata('error'); ?>
           </div>
          <?php  }   ?>
            <?php if ($this->session->flashdata('mailerror')) { ?>
                <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Success!</strong>  <?php  echo $this->session->flashdata('mail'); ?>
                </div> <?php
            }   ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-primary alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Success!</strong>  <?php  echo $this->session->flashdata('success'); ?>
                </div> <?php
            }   ?>

        <form action="<?php echo base_url(); ?>Auditor/create_vendor" method="post">
            <div class="form-group">
    <label>Vendor License no:</label>
    <input type="text" class="form-control"  name="vendor_unique_id" required>
  </div>

<div class="form-group">
    <label>Email ID:</label>
    <input type="email" class="form-control" name="ud_email" required>
   
  </div>
            <div class="form-group">
    <label>Organization:</label>
    <input type="text" class="form-control" name="ud_fname" required>  
    
  </div>
            <div class="form-group">
    <label>Authorized Person Name:</label>
    <input type="text" class="form-control" name="ud_lname" required>
   
  </div>
   <div class="form-group">
    <label>Address:</label>
    <input type="text" class="form-control" name="ud_address" required>
   
  </div>    
            <div class="form-group">
    <label>Phone Number:</label>
    <input type="text" class="form-control"  name="ud_phone" required>
  </div>   



  <input type="hidden" value="3" name="role">
  <input type="hidden" value="<?php echo $this->session->userdata('user_id');  ?>" name="hidden_id">
   <input type="submit" class="btn btn-success" value="CREATE ROLE">
        </form>
        <br>
    </div>      
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/lib/jquery.min.js"></script>
    <!-- jquery vendor -->
    <script src="<?php echo base_url(); ?>assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="<?php echo base_url(); ?>assets/js/lib/menubar/sidebar.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="<?php echo base_url(); ?>assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url(); ?>assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/weather/weather-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/chartist/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/chartist/chartist-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
    
</body>

</html>