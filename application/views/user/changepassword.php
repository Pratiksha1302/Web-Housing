<!DOCTYPE html>
<html>
<head>
	<title>Change Password - Dormitory Tracker</title>
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
									<h1 class="text-center text-primary" style="font-size: 58px;"><i class="fas fa-unlock"></i></h1>
									<h2 class="text-center text-primary">Change Your Password</h2>
									<p class="text-center text-secondary">
										Set your new password here.
									</p>
								<?php 
          							if($this->session->flashdata('change'))
          							{
          						 ?>
          							<div class="alert alert-success alert-dismissible fade show" role="alert">
										<?php echo $this->session->flashdata('change'); ?>
									</div>
								<?php } ?>
									<?php 
										if($this->session->flashdata("fail"))
										{
									 ?>
									 <div class="alert alert-warning">
									 	<?php echo $this->session->flashdata("fail"); ?>
									 </div>
									 <?php } ?>

									<form method="post" action="<?php echo site_url(); ?>/user/changepassword/updatePass">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
										    		<span class="input-group-text" style="background-color: white"><i class="fas fa-key"></i></span>
										 		</div>
									    		<input class="form-control" placeholder="Old Password" type="password" style="box-shadow: none" required id="oldpass" name="oldpass">
											</div>
											<span id="msgoldpasswd" style="color: red;"></span>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
										    		<span class="input-group-text" style="background-color: white"><i class="fas fa-key"></i></span>
										 		</div>
									    		<input class="form-control" placeholder="New Password" type="password" style="box-shadow: none" required id="newpass" name="newpass">
											</div>
											<span id="msgpasswd" style="color: red;"></span>
										</div>

										<div class="form-group">
											<div class="input-group">
												<div class="input-group-prepend">
										    		<span class="input-group-text" style="background-color: white"><i class="fas fa-key"></i></span>
										 		</div>
									    		<input class="form-control" placeholder="Confirm Password" type="password" style="box-shadow: none" required id="conpass" name="conpass">
											</div>
											<span id="msgconpasswd" style="color: red;"></span>
										</div>	

										<div>
											<input type="submit" name="change_pass" id="change_pass" class="btn btn-outline-primary" value="Change Password">
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
	<script type="text/javascript">
		 $("document").ready(function(){

         	$("#change_pass").click(function(){
              //alert("hello12");
                var passwd;
                            
                passwd = test_match("#newpass","#conpass","#msgpasswd","#msgconpasswd");                
	
                 if(passwd == true)
                 {
                     return true;
                    
                 }
                 else
                 {
                     
                     return false;
                 }            
            });
        });
	</script>
	<script type="text/javascript">
                    $("#oldpass").bind("input propertychange",function(){
                    var oldpass = $('#oldpass').val();
                    // alert(oldpass);
                    $.ajax({
                        method:"post",
                        url:"<?php echo site_url(); ?>/user/Changepassword/check_pass",
                        data:{oldpass:oldpass},
                        success:function(data)
                        {
                           	// alert(data);
                            var jsonobj=$.parseJSON(data);
                          	
                            if(jsonobj.id==0)
                            {
                                $("#change_pass").attr("disabled", true);
                                $('#msgoldpasswd').html(jsonobj.msg);
                            }
                            else if(jsonobj.id==1)
                            {
                                $("#change_pass").attr("disabled", false);
                                $('#msgoldpasswd').html(jsonobj.msg);
                            }
                        }
                    }); 
                });
	    </script>
</body>
</html>