
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
                                <h1>EDIT VENDOR<span><a href="<?php echo base_url(); ?>login/logout"></span></h1>
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
             <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Error! </strong><?php  echo $this->session->flashdata('error'); ?>
           </div>
          <?php  }   ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-primary alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Success!</strong>  <?php  echo $this->session->flashdata('success'); ?>
                </div> <?php
            }   ?>
     <?php /*echo "<pre>"; print_r($data);
     die();*/
            foreach($data as $key => $row)
            {
            ?>
    
        <form action="<?php echo base_url(); ?>admin/vendor_edit" method="post">
            <span><i><?php echo form_error('role'); ?></i></span>
             <div class="form-group">
    <label>Email ID:</label>
    <input type="email" class="form-control" name="ud_email" value="<?php echo $row->user_name; ?>">
    <span><i><?php echo form_error('ud_email'); ?></i></span>
  </div>
            <div class="form-group" id="auditordiv">
    <label>Select Auditor:</label>
    <select name="auditors" id = "auditors;" class="form-control" >
        <option value="">Select Auditor</option>
        <?php foreach ($auditor as $key2 => $value) { ?>
           <option value="<?php echo  $auditor[$key2]->user_id; ?>" <?php if ($auditor[$key2]->user_id==$data[$key]->user_created_by) { ?> selected="selected" <?php } ?> ><?php echo  $auditor[$key2]->user_name; ?></option>
       <?php } ?>
    </select>
      
  </div>

    <div class="form-group">
        <label>Organization:</label>
        <input type="text" class="form-control" name="ud_fname" value="<?php echo $this->encrypt->decode($data[$key]->ud_fname); ?>">      
    </div>
    <div class="form-group">
        <label>Authorized Person Name:</label>
        <input type="text" class="form-control" name="ud_lname" value="<?php echo $this->encrypt->decode($data[$key]->ud_lname); ?>">
    </div>
    <div class="form-group">
        <label>Address:</label>
        <input type="text" class="form-control" name="ud_address" value="<?php echo $this->encrypt->decode($data[$key]->ud_address); ?>">
    </div>    
    <div class="form-group">
        <label>Phone NUmber:</label>
        <input type="number" class="form-control"  name="ud_phone" value="<?php echo $this->encrypt->decode($data[$key]->ud_ph_no); ?>">
    </div>
        <input type="hidden" name="hidden_id" value="<?php echo $data[$key]->user_id; ?>" />
        <input type="submit" name="insert" class="btn btn-success" value="UPDATE" />
    </form>
         <?php
            }
            ?>
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