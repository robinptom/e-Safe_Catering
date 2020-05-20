

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login</title>

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/lib/unix.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#"><span></span></a>
                        </div>
                        <div class="login-form">
                            <h4>Login</h4>
                            <form action="<?php echo base_url(); ?>Login/login" method="post" id="validateForm">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" >
                                    <span><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                                    <span><?php echo form_error('pass'); ?></span>
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Log in</button>  
                                <span class="text-danger"><?php echo $this->session->flashdata('error');  ?></span>              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script>
    $(document).ready(function(){
        $("#validateForm").validate({
            rules:{
                email:{
                    required:true,
                },
                pass:{
                    required:true,
                    minlength:8,
                    mypassword:true,
                }
            },
            messages:{
               email:{
                    required:"Enter the valid Email",
                },
                pass:{
                    required:"Enter the valid Password",
                } 
            }
        });
$.validator.addMethod('mypassword',function(value,element){
    return this.optional(element)||value.match(/[a-zA-Z]/)&&value.match(/[0-9]/) });
$.validator.messages.mypassword = 'Enter alphanumeric charecters';
});
</script>    -->
</body>

</html>