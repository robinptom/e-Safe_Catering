
        <style type="text/css">
        .progress-sm {
    height: 30px;
}
    </style>
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
                                <h1>Hello, <span>Welcome to Auditor Panel</span></h1>
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
                            <div class="card p-0">
                                <div class="media">
                                    <div class="p-20 bg-success media-left media-middle" style="background-color: #fbfb26;">
                                         <i class="ti-user f-s-48 color-white"></i>
                                    </div>
                                    <div class="p-20 media-body" style="background-color: #fbfb26;">
                                        <h4 class="color-success" style="color: #484848;">Yellow Offenders</h4>
                                        <h5 style="color: #484848;"><?php echo $yellowcount; ?></h5>
                                        <div>
                                           <center><a href="<?php echo base_url(); ?>Auditor/yellow_offenders" ><button type="button" class="btn btn-info m-b-10 m-l-5" > View list</button></a></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-0">
                                <div class="media">
                                    <div class="p-20 bg-warning media-left media-middle">
                                       <i class="ti-user f-s-48 color-white"></i>
                                    </div>
                                    <div class="p-20 media-body bg-warning">
                                        <h4 class="color-warning" style="color: #484848;">Orange Offenders</h4>
                                        <h5 style="color: #484848;"><?php echo $orangecount; ?></h5>
                                        <div>
                                             <center><a href="<?php echo base_url(); ?>Auditor/orange_offenders" ><button type="button" class="btn btn-info m-b-10 m-l-5"> View list</button></a></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-md-4">
                            <div class="card p-0">
                                <div class="media">
                                    <div class="p-20 bg-danger media-left media-middle">
                                         <i class="ti-user f-s-48 color-white"></i>
                                    </div>
                                    <div class="p-20 media-body bg-danger">
                                        <h4 class="color-danger" style="color: #484848;">Red Offenders</h4>
                                        <h5 style="color: #484848;"><?php echo $redcount; ?></h5>
                                        <div>
                                            <center><a href="<?php echo base_url(); ?>Auditor/red_offenders" ><button type="button" class="btn btn-info m-b-10 m-l-5" > View list</button></a></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- /# row -->
                <div id="container">
                    <div class="row">
                           <!--main sent success message-->
                         <?php if($error = $this->session->flashdata('msg')){ ?>
       <p style="color: blue;"><strong>Success!</strong> <?php echo  $error; ?><p>
                        <?php } ?>

       <!--//main sent success message-->    
                        
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