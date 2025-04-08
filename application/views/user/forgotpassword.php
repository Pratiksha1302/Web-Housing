<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password - Dormitory Tracker</title>
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
								<div class="card-body">
									<h1 class="text-center text-primary" style="font-size: 58px;"><i class="fas fa-user-lock"></i></h1>
									<h2 class="text-center text-primary">Forgot Password?</h2>
									<p class="text-center text-secondary">
										You can reset your password here.
									</p>

								<?php 
										if($this->session->flashdata('fail'))
										{
								 ?>
								 <div class="alert alert-danger">
								 	<?php echo $this->session->flashdata('fail'); ?>
								 </div>
								<?php } ?>

									<form method="post" action="<?php echo site_url(); ?>/user/forgotpassword/check_email">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
										    		<span class="input-group-text" style="background-color: white"><i class="fas fa-envelope"></i></span>
										 		</div>
									    		<input class="form-control" placeholder="Email Address" type="email" style="box-shadow: none" name="u_email" id="u_email" required>
											</div>
										</div>

										<div>
											<input type="submit" name="sentotp" class="btn btn-outline-primary" value="Sent OTP">
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