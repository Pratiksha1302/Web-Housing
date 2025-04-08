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
				<form class="login100-form" method="post" action="<?php echo site_url(); ?>/Login_master/login_validation">
					<img src="<?php echo base_url(); ?>images/projectlogo.webp" class="img-fluid mx-auto d-block logo p-3">
					<p class="login100-form-title text-uppercase" style="color: rgb(0,128,236);text-transform: uppercase;">
						A<span style="color: rgb(0,0,0);font-size: 25px;">dmin</span> 
						L<span style="color: rgb(0,0,0);font-size: 25px;">ogin</span>
					</p>
					<?php  
					if ($this->session->flashdata('success')) 
					{	
					?>
						<div class="alert alert-success alert-dismissible mt-3" role="alert">
						   	<button type="button" class="close" data-dismiss="alert"><i class="fas fa-times-circle"></i></button>
							<div class="alert-message">
								<span><strong><?php echo $this->session->flashdata('success'); ?></strong></span>
							</div>
						 </div>
					<?php
					}
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
					}
					if (form_error('passwd') && form_error('email') && form_error('type')) 
					{	
					?>
						<div class="alert alert-danger alert-dismissible mt-3" role="alert">
						   	<button type="button" class="close" data-dismiss="alert"><i class="fas fa-times-circle"></i></button>
							<div class="alert-message">
								<span><strong><?php echo "all Fields are Required"; ?></strong></span>
							</div>
						 </div>
					<?php
					}if (form_error('passwd') && form_error('email')) 
					{	
					?>
						<div class="alert alert-danger alert-dismissible mt-3" role="alert">
						   	<button type="button" class="close" data-dismiss="alert"><i class="fas fa-times-circle"></i></button>
							<div class="alert-message">
								<span><strong><?php echo "Username & password is required"; ?></strong></span>
							</div>
						 </div>
					<?php
					}elseif (form_error('passwd')) 
					{	
					?>
						<div class="alert alert-danger alert-dismissible mt-3" role="alert">
						   	<button type="button" class="close" data-dismiss="alert"><i class="fas fa-times-circle"></i></button>
							<div class="alert-message">
								<span><strong><?php echo form_error('passwd'); ?></strong></span>
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
					}elseif (form_error('type')) 
					{	
					?>
						<div class="alert alert-danger alert-dismissible mt-3" role="alert">
						   	<button type="button" class="close" data-dismiss="alert"><i class="fas fa-times-circle"></i></button>
							<div class="alert-message">
								<span><strong><?php echo form_error('type'); ?></strong></span>
							</div>
						 </div>
					<?php
					}
					?> 
					<div class="wrap-input100">
						<input class="input100" type="text" name="email" id="email" placeholder="Username / Email"
							<?php
								if($this->session->flashdata('uname'))
								{
							?>
							value="<?php echo $this->session->flashdata('uname'); ?>"
							<?php
								}
								elseif (isset($_COOKIE['username'])) 
								{
							?>
							value="<?php echo $_COOKIE['username']; ?>"
							<?php		
								}
							?>
						
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100">
						<span class="btn-show-pass">
							<i class="fas fa-eye"></i>
						</span>
						<input class="input100" type="password" name="passwd" id="passwd"  placeholder="Password"
							<?php
								if($this->session->flashdata('passwd'))
								{
							?>
							value="<?php echo $this->session->flashdata('passwd'); ?>"
							<?php
								}
								elseif (isset($_COOKIE['password'])) 
								{
							?>
							value="<?php echo $_COOKIE['password']; ?>"
							<?php		
								}
							?>
						>
						<span class="focus-input100 text-danger"></span>
					</div>
					<div class="wrap-input100">
						<select name="type" id="type" class="input100" style="outline: none;border:none;">
							<optgroup label="Admin's Type" value="-1">Admin's Type</optgroup>
							<option value="super_admin"
							<?php
								if (isset($_COOKIE['type']) && $_COOKIE['type'] == "super_admin") 
								{
									echo "selected";
								}
							?>
							>Super Admin</option>
	                        
	                        <option value="hostel_admin"
							<?php
								if (isset($_COOKIE['type']) && $_COOKIE['type'] == "hostel_admin") 
								{
									echo "selected";
								}
							?>
							>Hostel's Admin</option>
	                        
	                        <option value="pg_admin"
							<?php
								if (isset($_COOKIE['type']) && $_COOKIE['type'] == "pg_admin") 
								{
									echo "selected";
								}
							?>
							>PG's Admin</option>
						
						</select>
						<span class="focus-input100 text-danger"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="login" id="login" class="login100-form-btn">Login</button>
						</div>
					</div>
					<br>
					<div class="text-center p-t-115">
						<span class="txt1">FORGOT YOUR PASSWORD?</span>
						<a class="txt2" href="<?php echo site_url(); ?>/Forget_pwd">Click Here</a>
					</div>
				</form>
			</div>
		</div>
	</div>

 
  <!--Switchery Js-->
    <script src="<?php echo base_url(); ?>plugins/switchery/js/switchery.min.js"></script>
    <script>
      var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
      $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());
       });
    </script>

    <!--Bootstrap Switch Buttons-->
    <script src="<?php echo base_url(); ?>plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
    <script>
    $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });
    </script>

</body>

</html>