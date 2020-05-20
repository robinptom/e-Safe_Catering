
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
                                <h1>Vendor List</h1>
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
                <div class="row">
                <div id="main-content">
                      <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Error!</strong> <?php  echo $this->session->flashdata('error'); ?>
           </div>
          <?php  }   ?>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-primary alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Success!</strong>  <?php  echo $this->session->flashdata('success'); ?>
                </div> <?php
            }   ?>
            <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <!-- <h4>Table Bordered </h4> -->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
            <table class="table table-striped table-bordered">
                    <tr>
                        <th>VENDOR ID</th>
                        <th>LICENSE NO</th>
                        <th>EMAIL</th>
                        <th>ORGANIZATION</th>
                        <th>AUTHORIZED PERSON NAME</th>
                        <th>ADDRESS</th>
                        <th>PHONE NUMBER</th>
                        <!-- <th colspan="3">ACTION</th> -->
                       
                    </tr>
                   <?php
                   //echo "<pre>"; print_r($data); die(); 
                   $count = 0;
                    foreach($data as $row)

                    { $count++;
                        echo '
                        <tr ';
                     /*   if ($row->alertcount>3) {
                         echo " style='background-color: #fda684;' ";
                        }elseif ($row->alertcount>1 and $row->alertcount2<3) {
                          echo " style='background-color: #f79459;' ";
                        }elseif ($row->alertcount>0 and $row->alertcount2<2) {
                          echo " style='background-color: #f9f178;' ";
                        }else{}*/
                        echo '>
                            <td>'.$row->user_id.'</td>
                            <td>'.$row->user_vendor_id.'</td>
                            <td>'.$row->user_name.'</td>
                            <td>'.$this->encrypt->decode($row->ud_fname).'</td>
                            <td>'.$this->encrypt->decode($row->ud_lname).'</td>
                            <td>'.$this->encrypt->decode($row->ud_address).'</td>
                            <td>'.$this->encrypt->decode($row->ud_ph_no).'</td>
                           
                           
                        </tr>

                        ';

                    }
                    ?>
                    <!--  <td><button class="btn btn-primary"><a href="'.base_url().'Auditor/edit_view_vendor/'.$row->user_id.'">Edit</a></button></td><td><button class="btn btn-primary"><a href="'.base_url().'Auditor/delete_vendor/'.$row->ud_id.'/'.$row->user_id.'">DELETE</a></button></td><td><button ';
                             if($row->user_active_status=="1") { 
                                 echo  ' class="btn btn-danger"   id="suspendbtn_'.$row->user_id.'" onclick="suspend_user('.$row->user_id.')">SUSPEND</button>';

                                }else{ echo  '<button style="display:none"  class="btn btn-danger"   id="suspendbtn_'.$row->user_id.'" onclick="suspend_user('.$row->user_id.')">SUSPEND</button>'; } 

                         echo ' <button';

                            if($row->user_active_status=="0") { 
                                echo  ' class="btn btn-success" id="activatedbtn_'.$row->user_id.'" onclick="make_active_user('.$row->user_id.')">MAKE ACTIVE</button>';

                                }else{ echo  '<button style="display:none" class="btn btn-success" id="activatedbtn_'.$row->user_id.'" onclick="make_active_user('.$row->user_id.')">MAKE ACTIVE</button>';} 
                            echo ' 

                           </td> -->

                </table>
              
                                    </div>
                                </div>
                            </div>
                        </div>
                
</div>      
</div>

            

<script src="<?php echo base_url(); ?>assets/js/lib/jquery.min.js"></script>
<script>
function suspend_user(userid){ 
    //alert(userid);

     $.ajax({
         type: "POST",
         url:"<?php echo base_url(); ?>Auditor/suspend_vendor", 
         data: {id:userid},
         dataType: "text",  
         async: false,
         success: function(response) {
 
    if(response) {

        // $("#make_active_'.$row->user_id.'").html(response);
        $("#suspendbtn_"+userid).hide();
         $("#activatedbtn_"+userid).show();

    }   
  }
          });// you have missed this bracket
   
}
 
</script>

<script>
function make_active_user(userid){ 

     $.ajax({
         type: "POST",
         url:"<?php echo base_url(); ?>Auditor/make_active", 
         data: {id:userid},
         dataType: "text",  
         async: false,
         success: function(response) {
 
    if(response) {
         $("#suspendbtn_"+userid).show();
         $("#activatedbtn_"+userid).hide();


    }   
  }
          });// you have missed this bracket
   
}
 
</script>
    <!-- jquery vendor -->
    <script src="<?php echo base_url(); ?>assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="<?php echo base_url(); ?>assets/js/lib/menubar/sidebar.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="<?php echo base_url(); ?>assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <!--<script src="<?php echo base_url(); ?>assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/weather/weather-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/chartist/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/chartist/chartist-init.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>  
    <script src="<?php echo base_url(); ?>assets/js/lib/sparklinechart/sparkline.init.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</body>

</html>