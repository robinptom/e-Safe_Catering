

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendor SC1 Form</title>
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
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Supplier<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Vendor/supplier_add">Add Supplier</a></li>
                             <li><a href="<?php echo base_url(); ?>Vendor/vendor_supplier_view">View Supplier</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>SC Forms<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                             <li><a href="<?php echo base_url(); ?>Vendor/vendor_sc1">SC 1</a></li>
                             <li><a href="<?php echo base_url(); ?>Vendor/vendor_sc2">SC 2</a></li>
                             <li><a href="<?php echo base_url(); ?>Vendor/vendor_sc3">SC 3</a></li>
                             <li><a href="<?php echo base_url(); ?>Vendor/vendor_sc4">SC 4</a></li>
                        </ul>
                    </li>   
                    <li><a class="sidebar-sub-toggle"><i class="ti-pencil-alt"></i>Reports<span class="badge badge-primary"></span><span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Vendor/reports">View reports</a></li>
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
            <div class="logo"><span>Safe Catering Vendor</span></div>
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
                                <h1>ADD SC1 - FOOD DELIVERY</h1>
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
            <strong>Error!</strong><?php  echo $this->session->flashdata('error'); ?>
           </div>
          <?php  }   ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-primary alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Success!</strong>  <?php  echo $this->session->flashdata('success'); ?>
                </div> <?php
            }   ?>

    <form action="<?php echo base_url(); ?>Vendor/sc1_insert" method="post" id="scform">  
    
<div class="form-group">
    <label>Food Item:</label>
    <input type="text" class="form-control" name="food_item" required>     
  </div>
<div class="form-group">
    <label>Batch Code:</label>
    <input type="text" class="form-control" name="batch_code" required>
  </div>
   <div class="form-group">
    <label>Supplied By</label>
    <!-- <input type="text" class="form-control" name="supp_by" required> -->
    <select name="supp_by" id="supp_by" class="form-control">
        <option>Select Supplier</option>
        <?php  foreach ($supplierdata as $key => $value) { ?>
          <option value="<?php echo $this->encrypt->decode($supplierdata[$key]->sup_name);?>"><?php echo $this->encrypt->decode($supplierdata[$key]->sup_name); ?></option>
      <?php   } ?>
    </select>
  </div>    
<div class="form-group">
    <label>Use By Date</label>
    <input type="date" class="form-control"  name="use_date" required>
  </div>
  <div class="form-group">
    <label>Temperature(&#X00B0;C)</label>
    <input type="number" class="form-control"  name="temp" required>
  </div>
  <div class="form-group">
    <label>Delivery Vehicle Check</label>
    <input type="text" class="form-control"  name="del_chk" required>
  </div>
  <div class="form-group">
    <label>Comments/Action</label>
    <input type="text" class="form-control"  name="comment" required>
  </div>
<!-- <input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" name="created_by"> -->
<input type="submit" class="btn btn-success" value="CREATE SC1 FORM">
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
    <script>
        

$('#scform').submit(function() {
    var c = confirm("Are you sure to submit? Click OK to continue.");
    return c; //you can just return c because it will be true or false
});


    </script>
    
</body>

</html>