<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendor Dashboard</title>
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

  </head>

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
                                <h1>Vendor Reports</h1>
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
<form action="<?php echo base_url(); ?>Vendor/reports" method="post" style="height: 500px;">
    <label>Select SC Form</label>
    <select name="sc_form_type"  id="sc_form_type"  required>
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
      
    <label>From Date</label>
    <input type="text"  name="from_date" id="from_date" autocomplete="off" value="<?php echo (isset($_POST['from_date']) ? $_POST['from_date']: ('')); ?>" required>  
    
  
    <label>To Date</label>
    <input type="text"  name="to_date" id="to_date" autocomplete="off" value="<?php echo (isset($_POST['to_date']) ? $_POST['to_date'] : ('')); ?>" required>  
    
  


   <input type="submit" name="submit" class="btn btn-primary" value="VIEW REPORT">

      



<br/>
<?php if ($formtype=="1") { 
if ($data!='') { ?>
    <button type="button" id="button_1" onclick="download_pdf()" name="sc_form"  class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button>

 <table class="table table-striped table-bordered" id="table" >
                    <tr>
                        <th>Date</th>
                        <th>Food Item</th>
                        <th>Batch Code</th>
                        <th>Supplied By</th>
                        <th>Use By Date (dd-mm-yyyy)</th>
                        <th>Temperature (&#X00B0;C)</th>
                        <th>Delivery Vehicle Check</th>
                        <th>Comments/Action</th>
                        
                    </tr>
                    <?php
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
                            <td style="text-align:left;">'.$this->encrypt->decode($row->sc1_del_vehicle_check).'</td>
                            <td style="text-align:left;">'.$this->encrypt->decode($row->sc1_comment_action).'</td>
                           
                                    
                        </tr>
                        ';
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
            <?php }elseif ($formtype=="2" ) { 
            if ($data!='') { ?>
                <button type="button" id="button_1" onclick="download_pdf()" name="sc_form"  class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button>

 <table class="table table-striped table-bordered">
                    <tr>
                        <th>Date</th>
                        <th>Refrigerator Unit of Cold Storage</th>
                        <th>Temperature (&#X00B0;C)</th>
                        <th>Comments/Action</th>
                       
                    </tr>
                    <?php
                    foreach($data as $row)
                    { 
                        echo '
                        <tr>
                            <td>'.date("d-m-Y h:i A",strtotime($row->sc2_date)).'</td>
                            <td>'.$row->sc2_unit.'</td>
                            <td>'.$this->encrypt->decode($row->sc2_temperature).'&#X00B0;C</td>
                            <td style="text-align:left;">'.$this->encrypt->decode($row->sc2_comments_action).'</td>
                           
                        
                        ';

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

<?php }elseif ($formtype == '3') { 
               if ($data!='') { ?>
                <button type="button" id="button_1" onclick="download_pdf()" name="sc_form"  class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button>

  <table class="table table-striped table-bordered">
                    <tr>
                        <th>Date</th>
                        <th>Food</th>
                        <th>Time Started Cooking</th>
                        <th>Time Finished Cooking</th>
                        <th>Core Temperature (&#X00B0;C)</th>
                       <!--  <th>Signed</th> -->
                        <th>Time into Fridge Blast Chiller</th>
                        <th>Comments/action</th>
                       <!--  <th>Signed</th>
                         -->
                       
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
                            
                            <td  style="text-align:left;">'.$row->sc3_time_into_fridge_bchiller.'</td>
                            <td style="text-align:left;">'.$this->encrypt->decode($row->sc3_comments_action).'</td>
                           </tr>
                        ';
                        /*<td>'.$this->encrypt->decode($row->sc3_sign).'</td>
 <td>'.$this->encrypt->decode($row->sc3_bchiller_sign).'</td>*/

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

<?php }elseif ($formtype =='4') {
             if ($data!='') { ?>
                <button type="button" id="button_1" onclick="download_pdf()" name="sc_form"  class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button>

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
                        /**/

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
<?php }?>


</form>

                    </div>
                </div>
                        
        </div>
    </div>
</div>

<script>
function download_pdf(){

     var url = "<?php echo base_url(); ?>Vendor/SCformReport?sc_form_type=" + encodeURIComponent($("#sc_form_type").val()) + "&from_date=" + encodeURIComponent($("#from_date").val())+ "&to_date=" + encodeURIComponent($("#to_date").val());
         /*   window.location.href = url;*/
            window.open(url);
      /*$.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Vendor/ajax_function",
      data: {
        id: $("#button_1").val(),
        from_date: $("#from_date").val(),
        to_date: $("#to_date").val(),
        sc_form_type: $("#sc_form_type").val(),

      },
      success: function(result) {
      },
      error: function(result) {
        alert('error');
      }
    });*/
} 

</script>


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