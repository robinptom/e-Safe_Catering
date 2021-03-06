
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
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>EDIT ADMIN<span><a href="<?php echo base_url(); ?>Login/logout"></span></h1>
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
        <?php
            if(validation_errors() != '')
            {
                echo '
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    ' . validation_errors() .'
                </div>
                ';
            }
            ?> 
    <form action="<?php echo base_url(); ?>admin/admin_edit" method="post" id="validateForm">
     <?php

            foreach($data as $row)
            {
            ?>

    <div class="form-group">
    <label>Email ID:</label>
    <input type="email" class="form-control" name="ud_email" value="<?php echo $row->user_name; ?>">
    <span><i><?php echo form_error('ud_email'); ?></i></span>
  </div>
    <div class="form-group">
        <label>First Name:</label>
        <input type="text" id="ud_fname" class="form-control" name="ud_fname" value="<?php echo $this->encrypt->decode($row->ud_fname); ?>">
        <span><?php echo form_error('ud_fname'); ?></span>   
    </div>
    <div class="form-group">
        <label>Last Name:</label>
        <input type="text" class="form-control" id="ud_lname" name="ud_lname" value="<?php echo $this->encrypt->decode($row->ud_lname); ?>">
        <span><?php echo form_error('ud_lname'); ?></span>
    </div>
    <div class="form-group">
        <label>Address:</label>
        <input type="text" class="form-control" name="ud_address" value="<?php echo $this->encrypt->decode($row->ud_address); ?>">
        <span><?php echo form_error('ud_address'); ?></span>
    </div>    
    <div class="form-group">
        <label>Phone NUmber:</label>
        <input type="number" class="form-control"  name="ud_phone" value="<?php echo $this->encrypt->decode($row->ud_ph_no); ?>">
        <span><?php echo form_error('ud_phone'); ?></span>
    </div>
        <input type="hidden" name="hidden_id" value="<?php echo $row->user_id; ?>" />
        <input type="submit" name="edit" class="btn btn-success" value="UPDATE" />
    <?php
            }   
            ?>   
    </form>
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