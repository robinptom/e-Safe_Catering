<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SC 1 Admin View</title>
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
                     <li><a href="<?php echo base_url(); ?>Admin">Home</a></li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>User Creation <span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>

                        <ul>
                            <li><a href="<?php echo base_url(); ?>Admin/create_user">Create New</a></li>
                            
                        </ul>
                    </li>
                       <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>View User<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Admin/auditor_view">Auditor</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/vendor_view">Vendor</a></li>
                        </ul>
                    </li>
                    <!-- <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Supplier<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Admin/supplier_add">Add Supplier</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/supplier_view">View Supplier</a></li>
                        </ul>
                    </li> -->
                   <!--  <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>SC Forms<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Admin/safe_catering_1">SC 1</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/safe_catering_2">SC 2</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/safe_catering_3">SC 3</a></li>
                             <li><a href="<?php echo base_url(); ?>Admin/safe_catering_4">SC 4</a></li>
                        </ul>
                    </li> -->
                    <li><a href="<?php echo base_url();?>Login/logout"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->


    <div class="header">
        <div class="pull-left">
            <div class="logo">Safe Catering Admin</span></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>
                <li class="header-icon dib"><img class="avatar-img" src="<?php echo base_url(); ?>assets/images/avatar/1.jpg" alt="" /> <span class="user-avatar"><?php echo $this->session->userdata('email'); ?><i class="ti-angle-down f-s-10"></i></span>
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
                                <h1>SC 1 VIEW- FOOD DELIVERY</h1>
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
                        <div class="col-md-3">
                 <a href="<?php echo base_url(); ?>Admin/safe_catering_1" class="btn btn-success">Back</a>
                 <br> <br>
   <table class="table table-striped table-bordered">
                    
                    <?php
                    foreach($sc1_data as $row)
                    {

                        echo '
                        <tr>
                            <th>Date</th>
                            <td>'.$row->sc1_date.'</td>
                        </tr>
                        <tr>
                            <th>Food Item</th>
                            <td>'.$this->encrypt->decode($row->sc1_food_item).'</td>
                        </tr>
                        <tr>
                            <th>Batch Code</th>
                            <td>'.$this->encrypt->decode($row->sc1_batch_code).'</td>
                        </tr>
                        <tr>
                            <th>Supplied By</th>
                            <td>'.$this->encrypt->decode($row->sc1_supplied_by).'</td>
                        </tr>
                        <tr>
                            <th>Use By Date</th>
                            <td>'.$row->sc1_use_by_date.'</td>
                        </tr>
                        <tr>
                            <th>Temperature</th>
                            <td>'.$this->encrypt->decode($row->sc1_temp).'</td>
                        </tr>
                        <tr>
                            <th>Vehicle Check</th>
                            <td>'.$this->encrypt->decode($row->sc1_del_vehicle_check).'</td>
                        </tr>
                        <tr>
                            <th>Comments</th>
                            <td>'.$this->encrypt->decode($row->sc1_comment_action).'</td>
                        </tr>
                        <tr>
                            <th>Sign</th>
                            <td>'.$this->encrypt->decode($row->sc1_sign).'</td>
                        </tr>
                        <tr>
                            <th>Manager Check</th>
                            <td>'.$row->sc1_mgr_supvsr_chk.'</td>  
                        </tr>
                        <tr> 
                            <th>Manager Sign</th>
                            <td>'.$this->encrypt->decode($row->sc1_mgr_sign).'</td>
                        </tr>
                        
                        ';
                    }
                    ?>
                </table>
                </div>
            
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