<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendor Report </title>
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
format: 'yyyy-mm-dd' //can also use format: 'dd-mm-yyyy'     
});      
});  
</script> 
<script> 
$( document ).ready(function() {     
$("#to_date").datepicker({          
format: 'yyyy-mm-dd' //can also use format: 'dd-mm-yyyy'     
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
                                <h1>SC2 - REFRIGERATION</h1>
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
<form action="<?php echo base_url(); ?>Vendor/reports" method="post">

      
      
    <label>Select SC Form</label>
    <select name="sc_form_type" id="sc_form_type">
        <option value="2"><?php echo $dropdown; ?></option>
        <option value="1">SC Form 1</option>
        <option value="3">SC Form 3</option>
        <option value="4">SC Form 4</option>
    </select> 
      
    <label>From Date</label>
    <input type="text"  name="from_date" id="from_date" value="<?php echo (isset($_POST['from_date']) ? $_POST['from_date'] : date('m/d/Y')); ?>">  
    
  
    <label>To Date</label>
    <input type="text"  name="to_date" id="to_date" value="<?php echo (isset($_POST['to_date']) ? $_POST['to_date'] : date('m/d/Y')); ?>">  
    

   
   <button type="submit" name="submit" value="view_report" class="btn btn-primary">VIEW REPORT</button> <br/><br/>


   <button type="button" id="button_1"  value="sc1_repport" class="btn btn-success"><i class="glyphicon glyphicon-download-alt"></i>Download Records</button>


   
</form>
<br/>
 <table class="table table-striped table-bordered">
                    <tr>
                        <th>Date</th>
                        <th>Refrigerator Unit of Cold Storage</th>
                        <th>Temperature</th>
                       
                    </tr>
                    <?php
                    foreach($data as $row)
                    { 
                        $date = $row->sc2_date; 
                         $temperature_date =  date('yy-m-d',strtotime($date)); 

                        echo '
                        <tr>
                            <td>'.$temperature_date.'</td>
                            <td>'.$row->sc2_unit.'</td>
                            <td>'.$this->encrypt->decode($row->sc2_temperature).'</td>
                           
                        
                        ';

                    }
                    ?>
                </table>


                        
        </div>
    </div>

<script>

$(document).ready(function() {
  $("#button_1").click(function() {
    alert ("ffdgd");
   /* e.preventDefault();*/
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Vendor/ajax_function",
      data: {
        id: $("#button_1").val(),
        from_date: $("#from_date").val(),
        to_date: $("#to_date").val(),
        sc_form_type: $("#sc_form_type").val(),

      },
      success: function(result) {
        alert('ok');
      },
      error: function(result) {
        alert('error');
      }
    });
  });

</script>

 <!--   <script src="<?php echo base_url(); ?>assets/js/lib/jquery.min.js"></script>
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