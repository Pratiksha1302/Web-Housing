<!DOCTYPE html>
<html>
<head>
	<title>Admin Login | Dormitory Tracker</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- bootstrap links -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="icon" href="<?php echo base_url(); ?>images/projectlogo.webp">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- Font awesome & google font -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- external css & js -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style_login.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/js.js"></script>

	<!-- animate css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

	<!--Switchery-->
  	<link href="<?php echo base_url(); ?>plugins/switchery/css/switchery.min.css" rel="stylesheet" />

  	<link href="<?php echo base_url(); ?>plugins/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
	
	<!-- notifications css -->

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 animated fadeIn slower">
				<form class="login100-form" method="post" action="<?php echo site_url(); ?>/Forget_pwd/send_otp">
					<img src="<?php echo base_url(); ?>images/projectlogo.webp" class="img-fluid mx-auto d-block logo p-3">
					<p class="login100-form-title text-uppercase" style="color: rgb(0,128,236);text-transform: uppercase;">
						F<span style="color: rgb(0,0,0);font-size: 25px;">orget</span> 
						P<span style="color: rgb(0,0,0);font-size: 25px;">assword</span>
					</p>
					<?php  
					if ($this->session->flashdata('error')) 
					{	
					?>
						<div class="alert alert-danger alert-dismissible mt-3" role="alert">
						   	<button type="button" class="close" data-dismiss="alert"><i class="fas fa-times-circle"></i></button>
							<div class="alert-message">
								<span><strong><?php echo $this->session->flashdata('error'); ?></strong></span>
							</div>
						 </div>
					<?php
					}elseif (form_error('email')) 
					{	
					?>
						<div class="alert alert-danger alert-dismissible mt-3" role="alert">
						   	<button type="button" class="close" data-dismiss="alert"><i class="fas fa-times-circle"></i></button>
							<div class="alert-message">
								<span><strong><?php echo form_error('email'); ?></strong></span>
							</div>
						 </div>
					<?php
					}
					?> 
					<div class="wrap-input100">
						<input class="input100" type="text" name="email" id="email" placeholder="Email Address"
							<?php
								if($this->session->flashdata('email'))
								{
							?>
							value="<?php echo $this->session->flashdata('email'); ?>"
							<?php
								}
							?>
						>
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="send_otp" id="send_otp" value="otp" class="login100-form-btn">Send OTP</button>
						</div>
					</div>
					<br>
					<div class="text-center p-t-115">
						<span class="txt1 text-center">GET BACK TO SIGNUP PAGE?</span>
						<a class="txt2 text-center" href="<?php echo site_url(); ?>/login_master">Click Here</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>