<script src="<?php echo base_url(); ?>assets/sweetalert_plugin/sweetalert.min.js"></script>
    <!-- /# sidebar -->
            <script>
                        swal({
                  title: "Please Change Your Temporary Password !",
                  icon: "warning",
                })
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
                                <h1 style="color:green">ADMIN PROFILE</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                    <div class="container">
                        <div class="row">
                             <div class="col-lg-6 col-lg-offset-3">         
   
        <form action="<?php echo base_url(); ?>Admin/change_admin_password" method="post" id="validateForm" align="center">

 <div class="form-group">
           <b style="color:blue">YOUR EMAIL ID:&nbsp;</b><br/></br>
           <b><?php echo $userdata['user_name'];  ?></b><br/><br/><br/>
        <label style="color:blue"><b>CHANGE YOUR PASSWORD:<b/></label>
        <input type="password" class="form-control"  name="admin_password" id="admin_password" placeholder="************" required="">
</div>
         <button type="submit" class="btn btn-success">UPDATE PASSWORD</button>  
        </form>

                    </div>
                         </div>
                            </div>
                                </div>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
 <script>
    $(document).ready(function(){
        $("#validateForm").validate({

            rules:{
                auditor_password:{
                    required:true,
                    minlength:8,
                    mypassword:true
                    
                }
            },
            messages:{
                auditor_password:{
                    required:"Enter the valid Password",
                } 
            }
        });
$.validator.addMethod('mypassword',function(value,element){
    return this.optional(element)||value.match(/[a-zA-Z]/)&&value.match(/[0-9]/) });
$.validator.messages.mypassword = 'Enter alphanumeric charecters';
});
    
</script> --> 

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