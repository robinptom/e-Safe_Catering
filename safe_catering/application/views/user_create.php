
    <!-- /# sidebar -->
<script type="text/javascript">
    function ShowHideDiv() {
        var selector = document.getElementById("selector_id");
        var vendor = document.getElementById("vendor_unique_id");
        vendor.style.display = selector.value == "3" ? "block" : "none";
        if (selector.value=="3") {
        $('#firstname').html('');
        $('#lastname').html('');
        $('#firstname').html('Organization Name:');
        $('#lastname').html('Name of Authorised Person');
        $('#auditordiv').show();
    }else{
        $('#firstname').html('');
        $('#lastname').html('');
        $('#firstname').html('First Name:');
        $('#lastname').html('Last Name');
        $('#auditordiv').hide();
    }
    }
</script>
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
            <strong>Error! </strong><?php  echo $this->session->flashdata('error'); ?>
           </div>
          <?php  }   ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-primary alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Success!</strong>  <?php  echo $this->session->flashdata('success'); ?>
                </div> <?php
            }   ?>

        <form action="<?php echo base_url(); ?>Admin/role_insert_validation" method="post">
      <div class="form-group">
    <label>Select User:</label>
    <select name="role" id = "selector_id" class="form-control" onchange = "ShowHideDiv()">
        <option value="">Select User</option>
        <option value="1">Admin</option>
        <option value="2">Auditor</option>
        <option value="3">Vendor</option>
    </select>
    <span><i><?php echo form_error('role'); ?></i></span>  
  </div>
    <div class="form-group" id="auditordiv" style="display: none;">
    <label>Select Auditor:</label>
    <select name="auditors" id = "auditors;" class="form-control" >
        <option value="">Select Auditor</option>
        <?php foreach ($auditor as $key => $value) { ?>
           <option value="<?php echo  $auditor[$key]->user_id; ?>"><?php echo  $auditor[$key]->user_name; ?></option>
       <?php } ?>
    </select>
    <span><i><?php echo form_error('role'); ?></i></span>  
  </div>
  
   <div id="vendor_unique_id"  style="display: none"  class="form-group" required>
    <label>Vendor Licence Number</label>
    <input type="text" class="form-control" id="unique_id_vendor" onblur="validateliscence();" name="unique_id_vendor" >
    <div id="errorlisting"></div>
</div>

<div class="form-group">
    <label>Email ID:</label>
    <input type="email" class="form-control" name="ud_email">
    <span><i><?php echo form_error('ud_email'); ?></i></span>
  </div>
            <div class="form-group">
    <label id="firstname">First Name:</label>
    <input type="text" class="form-control" name="ud_fname">  
    <span><i><?php echo form_error('ud_fname'); ?></i></span>    
  </div>
            <div class="form-group">
    <label id="lastname">Last Name:</label>
    <input type="text" class="form-control" name="ud_lname">
    <span><i><?php echo form_error('ud_lname'); ?></i></span>
  </div>
   <div class="form-group">
    <label>Address:</label>
    <input type="text" class="form-control" name="ud_address">
    <span><i><?php echo form_error('ud_address'); ?></span>
  </div>    
            <div class="form-group">
    <label>Phone Number:</label>
    <input type="text" class="form-control"  name="ud_phone">
    <span><i><?php echo form_error('ud_phone'); ?></i></span>
  </div>
      

 
  <input type="hidden" value="<?php echo $this->session->userdata('user_id');  ?>" name="hidden_id">
  <div>
   <input type="submit" class="btn btn-success" value="CREATE ROLE"> </div>
        </form>
        <br>
    </div>      
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/lib/jquery.min.js"></script>
    <!-- jquery vendor -->
    <script src="<?php echo base_url(); ?>assets/js/lib/bootstrap.min.js"></script>
        <script>
        function validateliscence() {
          $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Common/check_vendor_liscenece",
      /*dataType: "json",*/
      dataType: "text",
      /*contentType: 'application/json',*/
      data: {
        liscence: $("#unique_id_vendor").val(),

      },
      success: function(data, status, xhr) {
        if (data=="EXIST") {
             $("#vendor_unique_id").val('');
             $("#errorlistingr").html(' ');
             $("#errorlistingr").html('<span style="color:red;">Liscenece number already exist!</span>');
        }else{
           $("#errorlistingr").html(' ');
        }
      },
      error: function(data) {
        alert('error');
      }
    });
        }
        
    </script>
    <script src="<?php echo base_url(); ?>assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="<?php echo base_url(); ?>assets/js/lib/menubar/sidebar.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
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