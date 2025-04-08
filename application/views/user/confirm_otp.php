<!DOCTYPE html>
<html>
<head>
	<title>Confirm OTP - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<!-- main wrapper -->
	<div id="main-wrapper">
		<?php include "header.php"; ?>

			<div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10 mt-4" style="background-image: linear-gradient(to right,#0052D4,#65C7F7,#9CECF8);">
				<div class="container">
					<div class="row">
						<div class="col-sm-9 col-md-7 col-lg-4 mx-auto">
							<div class="card p-2">
								<!-- <div class="card-header" style="background-color: white">
									<h3 class="text-danger text-center">Forgot Password ?</h3>
								</div> -->

								<div class="card-body">
									<h1 class="text-center text-primary" style="font-size: 58px;"><i class="fas fa-check-circle"></i></h1>
									<h2 class="text-center text-primary">Confirm Your OTP</h2>
									<p class="text-center text-secondary">
										Verification Code is sent to your email address.
									</p>
									<?php 
										if($this->session->flashdata('mail_sent'))
										{
								 ?>
								 <div class="alert alert-success" id="msg_s">
								 	<?php echo $this->session->flashdata('mail_sent'); ?>
								 </div>
								<?php } ?>

								<?php 
										if($this->session->flashdata('mail_sent_of'))
										{
								 ?>
								 <div class="alert alert-success" id="msg_s">
								 	<?php echo $this->session->flashdata('mail_sent_of'); ?>
								 </div>
								<?php } ?>


								<?php 
										if($this->session->flashdata('not'))
										{
								 ?>
								 <div class="alert alert-success" id="msg_f">
								 	<?php echo $this->session->flashdata('not'); ?>
								 </div>
								<?php } ?>

									<form method="post" action="<?php echo site_url(); ?>/user/forgotpassword/check_otp">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
										    		<span class="input-group-text" style="background-color: white"><i class="fas fa-check-circle"></i></span>
										 		</div>
									    		<input class="form-control" placeholder="Confirm OTP" type="text" style="box-shadow: none" required name="u_otp" id="u_otp">
											</div>
										</div>

										<div>
											<input type="submit" name="check" id="check" class="btn btn-outline-primary mb-2" value="Confirm OTP">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php include "footer.php"; ?>
	</div>
	<!-- end main wrapper -->
	<?php include "scripts.php"; ?>
</body>
</html>