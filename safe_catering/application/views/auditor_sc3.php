<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auditor SC3 Form</title>
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
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Vendor Creation<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/vendor_auditor_add">Create New</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Vendor list<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Auditor/vendor_list">Created Vendor list</a></li>
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
                                <h1>SC3 - REHEATING </h1>
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
                        <br>
                 <a href="<?php echo base_url(); ?>Auditor/sc3_dwld_pdf" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i> Download Records</a>
                 <br> <br>
                  <table class="table table-striped table-bordered">
                    <tr>
                        <th>Date</th>
                        <th>Food</th>
                        <th>Time Started Cooking</th>
                        <th>Time Finished Cooking</th>
                        <th>Core Temp</th>
                        <th>Signed</th>
                        <th>Time into Fridge Blast Chiller</th>
                        <th>Signed</th>
                        <th>Comments/Action</th>
                    
                        <th>Created By</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php
                    foreach($data as $row)
                    {

                        echo '
                        <tr>
                            <td>'.$row->sc3_date.'</td>
                            <td>'.$this->encrypt->decode($row->sc3_food).'</td>
                            <td>'.$row->sc3_time_started_cooking.'</td>
                            <td>'.$row->sc3_time_finished_cooking.'</td>
                            <td>'.$this->encrypt->decode($row->sc3_core_temp).'</td>
                            <td>'.$this->encrypt->decode($row->sc3_sign).'</td>
                            <td>'.$row->sc3_time_into_fridge_bchiller.'</td>
                            <td>'.$this->encrypt->decode($row->sc3_bchiller_sign).'</td>
                            <td>'.$this->encrypt->decode($row->sc3_comments_action).'</td>
                           
                            <td>'.$this->encrypt->decode($row->ud_fname).'</td>
                            <td><a href="'.base_url().'Auditor/auditor_sc3_view/'.$row->sc3_id.'" class="btn btn-primary" ><i class="glyphicon glyphicon-th-list" ></i></a></td>

                            <td><a href="'.base_url().'Auditor/pdf_sc3/'.$row->sc3_id.'" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i></a></td>
                        </tr>
                    
                        ';

                    }
                    ?>
                </table>
   
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