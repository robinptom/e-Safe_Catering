
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
                                <h1>Orange Offenders List</h1>
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
                <table class="table table-striped table-bordered">
                    <tr>  <th>SL NO</th>
                         <th>ORGANIZATION</th>
                        <th>LICENSE NO</th>
                        <th>EMAIL</th>
                        <th>PHONE NUMBER</th>
                        <th>FORM TYPES</th>
                    </tr>
                   <?php
                   $count=0;
                   //echo "<pre>"; print_r($data); die(); 
                    foreach($data as $row){
                  if (($row->noentrycountsc1==2)||($row->noentrycountsc2==2)||($row->noentrycountsc3==2)||($row->noentrycountsc4==2)) {
                    if ($row->createddatecount==2 || $row->createddatecount>1) {
                    $count++;
                         echo '
                        <tr><td>'.$count.'</td>
                            <td>'.$this->encrypt->decode($row->ud_fname).'</br><span style="font-size:10px;">Athorized person: '.$this->encrypt->decode($row->ud_lname).'</span></td>
                            <td>'.$row->user_vendor_id.'</td>
                            <td>'.$row->user_name.'</td>
                            <td>'.$this->encrypt->decode($row->ud_ph_no).'</td>';
                              echo '<td style="text-align:left;">';
if($row->noentrycountsc1==2){echo "SC1-(".$row->noentrycountsc1." days),";}
if($row->noentrycountsc2==2){echo " SC2-(".$row->noentrycountsc2." days) ,";}
if($row->noentrycountsc3==2){echo " SC3-(".$row->noentrycountsc3." days) ,";}
if($row->noentrycountsc4==2){echo " SC4-(".$row->noentrycountsc4." days) ";}
                           echo '</td>             
                        </tr>
                        ';
                    }
                            }else{}
                    }
                    ?>

                </table>
              
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