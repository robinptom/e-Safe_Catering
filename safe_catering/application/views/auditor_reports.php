<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> 
<script> 
$( document ).ready(function() {     
$("#from_date").datepicker({          
format: 'dd-mm-yyyy' //can also use format: 'dd-mm-yyyy'     
});      
});  
</script> 
<script> 
$( document ).ready(function() {     
$("#to_date").datepicker({          
format: 'dd-mm-yyyy' //can also use format: 'dd-mm-yyyy'     
});      
});  
</script> 
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
                                <h1>Auditor reports</h1>
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

                <!-- /# row -->
                <div id="container">
                    <div class="row">
                          
                   
    <form action="<?php echo base_url(); ?>Auditor/sc_reports" method="post" style="height: 500px;max-height: 100%;">

      
    <label>Select SC Form</label>
    <select name="sc_form_type"  required id="sc_form_type">
        <option value="">Select SC Forms</option>
        <option value="1" <?php if ($formtype=="1"): ?>
            selected="selected"
        <?php endif ?>>SC Form 1</option>
        <option value="2" <?php if ($formtype=="2"): ?>
            selected="selected"
        <?php endif ?>>SC Form 2</option>
        <option value="3" <?php if ($formtype=="3"): ?>
            selected="selected"
        <?php endif ?>>SC Form 3</option>
        <option value="4" <?php if ($formtype=="4"): ?>
            selected="selected"
        <?php endif ?>>SC Form 4</option>
    </select> 

    <label>Vendors</label>
    <select name="sc_vendor_type"  id="sc_vendor_type" required>    
        <option value="">Select Vendors</option>
        <?php foreach($vendors as $row){ ?>
           <option value="<?php echo $row->user_id; ?>" <?php if ($vendor_id==$row->user_id): ?>
               selected="selected"
           <?php endif ?>><?php echo $this->encrypt->decode($row->ud_fname) . '( '.$row->user_vendor_id .' )'; ?></option>
        <?php } ?>
       
    </select> 
      
    <label>From Date</label>
    <input type="text"  name="from_date" id="from_date" autocomplete="off" value="<?php echo $from_date; ?>" required>  
    
  
    <label>To Date</label>
    <input type="text"  name="to_date" id="to_date" autocomplete="off" value="<?php echo $to_date; ?>" required>  
    
  


   <input type="submit" name="submit" class="btn btn-primary" value="VIEW REPORT">

<br/>
<br/>
   
<?php if ($formtype=="1") {
if ($data!='') { ?>

     <button type="button" name="screports" value="screports" onclick="download_pdf()" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button> 
<table class="table table-striped table-bordered" id="table">
                    <tr>
                        <th>Date</th>
                        <th>Food Item</th>
                        <th>Batch Code</th>
                        <th>Supplied By</th>
                        <th>Use By Date</th>
                        <th>Temperature (&#X00B0;C)</th>
                        <th>Delivery Vehicle Check</th>
                        <th>Comments/Action</th>
                    </tr><?php 
                    foreach($data as $row)
                    {

                        echo '
                        <tr>
                            <td>'.date("d-m-Y h:i A",strtotime($row->sc1_date)).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_food_item).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_batch_code).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_supplied_by).'</td>
                            <td>'.date("d-m-Y",strtotime($row->sc1_use_by_date)).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_temp).'&#X00B0;C</td>
                            <td  style="text-align:left;">'.$this->encrypt->decode($row->sc1_del_vehicle_check).'</td>
                            <td>'.$this->encrypt->decode($row->sc1_comment_action).'</td>           
                        </tr>
                        ';
                        /**/
                    }
                    ?>
                </table>
            <?php  }else{?>
            <table class="table table-striped table-bordered" id="table">
                <tr>
                    <td style="text-align:center;">No Reports are available on the selected date range</td>
                </tr>
            </table>
             <?php } ?>

<?php }else ?>
<?php if ($formtype=="2") { 
if ( $data!='') { ?>
     <button type="button" name="screports" value="screports" onclick="download_pdf()" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button> 
    <table class="table table-striped table-bordered">
                    <tr>
                        <th>Date</th>
                        <th>Refrigerator Unit of Cold Storage</th>
                        <th>Temperature&#X00B0;C</th>
                         <th>Comments/Action</th>
                       
                    </tr>
                    <?php
                    foreach($data as $row)
                    { 
                        

                        echo '
                        <tr>
                            <td>'.date("d-m-Y h:i A",strtotime($row->sc2_date)).'</td>
                            <td>'.$row->sc2_unit.'</td>
                            <td  style="text-align:left;">'.$this->encrypt->decode($row->sc2_temperature).'&#X00B0;C</td>
                            <td>'.$this->encrypt->decode($row->sc2_comments_action).'</td>  
                        
                        ';

                    }
                    ?>
                </table>
                  <?php  }else{?>
            <table class="table table-striped table-bordered" id="table">
                <tr>
                    <td style="text-align:center;">No Reports are available on the selected date range</td>
                </tr>
            </table>
             <?php } ?>
    <?php }else ?>
    <?php if ($formtype=="3") { 
    if ( $data!='') { ?>
         <button type="button" name="screports" value="screports" onclick="download_pdf()" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button> 
         <table class="table table-striped table-bordered">
                    <tr>
                        <th>Date</th>
                        <th>Food</th>
                        <th>Time Started Cooking</th>
                        <th>Time Finished Cooking</th>
                        <th>Core Temp (&#X00B0;C)</th>
                        <!-- <th>Signed</th> -->
                        <th>Time into Fridge Blast Chiller</th>
                        <!-- <th>Signed</th> -->
                        <th>Comments/Action</th>
                        
                    </tr>
                    <?php
                    foreach($data as $row)
                    {

                        echo '
                        <tr>
                            <td>'.date("d-m-Y h:i A",strtotime($row->sc3_date)).'</td>
                            <td>'.$this->encrypt->decode($row->sc3_food).'</td>
                            <td>'.$row->sc3_time_started_cooking.'</td>
                            <td>'.$row->sc3_time_finished_cooking.'</td>
                            <td>'.$this->encrypt->decode($row->sc3_core_temp).'&#X00B0;C</td>
                            <td>'.$row->sc3_time_into_fridge_bchiller.'</td>
                           <td>'.$this->encrypt->decode($row->sc3_comments_action).'</td>
                        </tr>
                        ';
                        /* <td>'.$this->encrypt->decode($row->sc3_sign).'</td>
 <td  style="text-align:left;">'.$this->encrypt->decode($row->sc3_bchiller_sign).'</td>*/
                        /* */

                    }
                    ?>
                </table>
                    <?php  }else{ ?>
            <table class="table table-striped table-bordered" id="table">
                <tr>
                    <td style="text-align:center;">No Reports are available on the selected date range</td>
                </tr>
            </table>
             <?php } ?>
    <?php }else ?>
    <?php if ($formtype=="4") { 
    if ( $data!='') { ?>
         <button type="button" name="screports" value="screports" onclick="download_pdf()" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button> 
        <table class="table table-striped table-bordered">
                    <tr>
                        <th>Date</th>
                        <th>Food</th>
                        <th>Time into Hot Hold</th>
                        <th>Core Temp(check 1) &#X00B0;C</th>
                        <th>Core Temp(check 2) &#X00B0;C</th>
                        <th>Core Temp(check 3) &#X00B0;C</th>
                        <th>Comments/Action</th>
                       
                    </tr>
                    <?php
                    foreach($data as $row)
                    {

                        echo '
                        <tr>
                            <td>'.date("d-m-Y h:i A",strtotime($row->sc4_date)).'</td>
                            <td>'.$this->encrypt->decode($row->sc4_food).'</td>
                            <td>'.$row->sc4_hot_hold_time.'</td>
                            <td>'.$this->encrypt->decode($row->sc4_core_temp_chk1).'&#X00B0;C</td>
                            <td>'.$this->encrypt->decode($row->sc4_core_temp_chk2).'&#X00B0;C</td>
                            <td  style="text-align:left;">'.$this->encrypt->decode($row->sc4_core_temp_chk3).'&#X00B0;C</td>
                            <td style="text-align:left;">'.$this->encrypt->decode($row->sc4_comments_action).'</td>
                            </tr>
                        ';
                        /*  */

                    }
                    ?>
                </table>
                 <?php  }else{?>
            <table class="table table-striped table-bordered" id="table">
                <tr>
                    <td style="text-align:center;">No Reports are available on the selected date range</td>
                </tr>
            </table>
             <?php } ?>
    <?php }else ?>

</form>



</div>
</div>
        
        

   <!-- <script src="<?php echo base_url(); ?>assets/js/lib/jquery.min.js"></script>   -->
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
function download_pdf(){

     var url = "<?php echo base_url(); ?>Auditor/SCformReport?sc_form_type=" + encodeURIComponent($("#sc_form_type").val()) + "&from_date=" + encodeURIComponent($("#from_date").val())+ "&to_date=" + encodeURIComponent($("#to_date").val())+ "&scvendor=" + encodeURIComponent($("#sc_vendor_type").val());
            window.open(url);
} 

</script>

</body>

</html>