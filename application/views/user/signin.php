<!DOCTYPE html>
<html>
<head>
	<title>Sing in - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<!-- main wrapper -->
	<div id="main-wrapper">
		<?php include "header.php"; ?>

    <!--baner-->
    <div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10 mt-4" style="background-image: linear-gradient(to right,#0052D4,#65C7F7,#9CECF8);">
    	
        <div class="container">
    		<div class="row">
      			<div class="col-sm-9 col-md-7 col-lg-4 mx-auto">

        			<div class="card">
        				<div style="display: block;margin-left: auto;margin-right: auto;width:25%" class="mb-3 mt-3">
							<img src="<?php echo base_url(); ?>images/logo_favicon.png">
						</div>
						
        				<div class="card-header" style="background-color: white;border-bottom:none;">
        					<h2 class="text-danger text-center text-uppercase" style="font-weight:500">Login Here</h2>
        				</div>
          				<div class="card-body">


          					<form method="post" action="<?php echo site_url(); ?>/user/signin/login_user" enctype="multipart/form-data">
	          					<div class="form-group">
	          						<?php 
	          							if ($this->session->flashdata('fail_login')) 
	          							{
	          						 ?>
	          							<div class="alert alert-danger fade show" role="alert">
									  		<?php echo $this->session->flashdata('fail_login'); ?>
										</div>
									<?php } ?>
									<?php 
	          							if ($this->session->flashdata('err')) 
	          							{
	          						 ?>
	          							<div class="alert alert-danger fade show" role="alert">
									  		<?php echo $this->session->flashdata('err'); ?>
										</div>
									<?php } ?>
									<?php 
	          							if ($this->session->flashdata('success_reg')) 
	          							{
	          						 ?>
	          							<div class="alert alert-success fade show" role="alert">
									  		<?php echo $this->session->flashdata('success_reg'); ?>
										</div>
									<?php } ?>
									<?php 
	          							if ($this->session->flashdata('success_reg_e')) 
	          							{
	          						 ?>
	          							<div class="alert alert-success fade show" role="alert">
									  		<?php echo $this->session->flashdata('success_reg_e'); ?>
										</div>
									<?php } ?>
									<?php 
	          							if ($this->session->flashdata('login')) 
	          							{
	          						 ?>
	          							<div class="alert alert-danger fade show" role="alert">
									  		<?php echo $this->session->flashdata('login'); ?>
										</div>
									<?php } ?>
									<?php 
	          							if ($this->session->flashdata('change')) 
	          							{
	          						 ?>
	          							<div class="alert alert-success fade show" role="alert">
									  		<?php echo $this->session->flashdata('change'); ?>
										</div>
									<?php } ?>
									<div class="input-group">
										<div class="input-group-prepend">
										    <span class="input-group-text" style="background-color: white"> <i class="far fa-envelope-open"></i> </span>
										 </div>
										<input name="u_email" class="form-control" placeholder="Email Address" type="email" style="box-shadow: none" id="u_email" required value="<?php if(isset($_COOKIE['useremail']) && $_COOKIE['useremail']!=""){echo $_COOKIE['useremail'];} ?>">
									</div>
									<span id="msgemail" style="color: red"></span>
								</div>
								
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-prepend">
										    <span class="input-group-text" style="background-color: white"><i class="fas fa-user-lock"></i></span>
										 </div>
									    <input class="form-control" id="u_passwd" name="u_passwd" placeholder="Password" type="password" style="box-shadow: none" required value="<?php if(isset($_COOKIE['userpassword']) && $_COOKIE['userpassword']!=""){echo $_COOKIE['userpassword'];} ?>">
									</div>
									<span id="msgpasswd" style="color: red"></span>
								</div>

								<div class="custom-control custom-checkbox">
									  <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme" value="check" <?php if(isset($_COOKIE['rememberme']) && $_COOKIE['rememberme']!=""){echo "checked";} ?> checked>
									  <label class="custom-control-label" for="rememberme">Remember Me</label>
								</div>

								<div class="form-group mt-3">
									<button type="submit" class="btn btn-outline-info btn-block" id="login" name="login"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</button>
								</div>

								<div class="card-footer" style="border-top: 1px solid;border: none;background-color:white">
									
									<p class="text-danger float-left"><a href="<?php echo site_url(); ?>/user/forgotpassword" style=
										"text-decoration: none;">Forgot my password?</a></p>
									<p class="text-success float-left">New user?<a href="<?php echo site_url(); ?>/user/register" style="text-decoration: none;">&nbsp;REGISTER HERE</a></p>

								</div>
							</form>
          				</div>
        			</div>
      			</div>
    		</div>
  		</div>
    </div> <!-- page banner end -->
	<?php include "footer.php"; ?>
	</div> <!-- main wrapper end -->
	<?php include "scripts.php"; ?>

	   <!-- validation -->
    <script>    
        $("document").ready(function(){
         
            $("#login").click(function(){
              
              //alert("hello12");
                var u_email,u_passwd;
              
                u_email = test_email("#u_email","#msgemail");
                
                u_passwd = test_e("#u_passwd","#msgpasswd");

                if(u_email == true && u_passwd == true )
                {
                     return true;
                    
                }
                else
                 {
                     
                     return false;
                 }            
            });
        });
    </script> <!-- over validation -->
</body>
</html>