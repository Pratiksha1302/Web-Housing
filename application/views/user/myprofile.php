<!DOCTYPE html>
<html>
<head>
	<title>My Profile - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<!-- wrapper start -->
	<div id="main-wrapper">
		<?php include "header.php"; ?>
 <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(http://localhost/WebHousing/images/find_1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title text-uppercase">My Profile</h1>
                    <ul class="page-breadcrumb">
                        <li class="text-uppercase"><a href="<?php echo site_url(); ?>/user/user_site">Home</a></li>
                        <li class="active text-uppercase">My Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
    
     <!--profile Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20 mt-4" style="background-color:white">
        <div class="container">
            <!-- profile Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20" >
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12 col-lg-12 col-12">
                    
                    <div class="tab-content">
                        <div id="profile-tab" class="tab-pane show active">
                            <form action="<?php echo site_url(); ?>/user/myprofile/update_data" method="post" enctype="multipart/form-data">
                                <?php 
                                    if($this->session->flashdata('up')){
                                 ?>
                                 <div class="alert alert-success">
                                     <?php echo $this->session->flashdata('up'); ?>
                                 </div>
                             <?php } ?>
                             <?php 
                                    if($this->session->flashdata('err')){
                                 ?>
                                 <div class="alert alert-success">
                                     <?php echo $this->session->flashdata('err'); ?>
                                 </div>
                             <?php } ?>
                               <?php 
                                    foreach ($data as $s)
                                    {
                                ?>
                                 <input type="hidden" name="reg_id" value="<?php echo $s->reg_id;  ?>">
                                <div class="row">
                                    <div class="col-12 mb-30"><h3 class="mb-0 text-danger text-uppercase text-center" style="font-weight: 550">Personal Profile</h3>
                                    </div>
                                    <div class="col-md-12 col-12 mb-30">
                                        <img src="<?php echo base_url(); ?>images/reg_profile/<?php echo $s->reg_stud_profile; ?>" style="display: block;margin-left: auto;margin-right: auto;width:30%;border-radius: 50%"> <br>
                                        <div class="custom-file">
										    <input type="file" class="custom-file-input" id="profile" name="reg_profile">
                                            <input type="hidden" name="reg_profile_old" value="<?php echo $s->reg_stud_profile; ?>">
											<label class="custom-file-label" for="profile" style="box-shadow: none;">Choose Profile</label>
										</div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-30">
                                    	<label for="f_name">Name</label>
                                    	<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <span class="input-group-text" id="basic-addon1" style="background-color: white">
											    	<i class="fas fa-user-tie"></i>
											    </span>
											  </div>
											  <input type="text" name="reg_name" class="form-control" placeholder="Name" style="box-shadow: none" value="<?php echo $s->reg_name; ?>">
										</div>
                                    </div>

                                    <div class="col-md-6 col-12 mb-30">
                                    	<label for="f_name">Email</label>
                                    	<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <span class="input-group-text" id="basic-addon1" style="background-color: white">
											    	<i class="far fa-envelope-open"></i>
											    </span>
											  </div>
											  <input type="email" class="form-control" name="reg_email" id="reg_email" placeholder="Email" value="<?php echo $s->reg_email; ?>" style="box-shadow: none">
										</div>
                                        <span id="msgemail" style="color: red;"></span>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-30">
                                            	<label for="f_name">Password</label>
                                    			<div class="input-group mb-3">
											  		<div class="input-group-prepend">
											    		<span class="input-group-text" id="basic-addon1" style="background-color: white">
											    			<i class="fas fa-unlock-alt"></i>
											    		</span>
											 		 </div>
											  		<input type="password" name="reg_passwd" class="form-control" placeholder="Password" value="<?php echo $s->reg_passwd; ?>" style="box-shadow: none">
												</div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-30">
                                            	<label for="personal_number">Gender</label>
                                            	<select class="form-control" style="box-shadow: none" name="reg_gender" id="reg_gender">
                                            		<optgroup label="Gender"></optgroup>
                                            		<option value="Male"<?php if($s->reg_gender=="Male"){echo "selected";} ?>>Male</option>
                                            		<option value="Female" <?php if($s->reg_gender=="Female"){echo "selected";} ?>>Female</option>
                                            	</select>
                                            </div>

                                            <div class="col-md-6 col-12 mb-30">
                                            	<label for="personal_email">Birthdate</label>
                                            	<div class="input-group mb-3">
											  		<div class="input-group-prepend">
											    		<span class="input-group-text" id="basic-addon1" style="background-color: white">
											    			<i class="fas fa-birthday-cake"></i>
											    		</span>
											 		 </div>
											  		<input type="date" id="reg_dob" class="form-control" value="<?php echo $s->reg_dob; ?>" style="box-shadow: none" name="reg_dob">
												</div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-30">
		                                    	<label for="f_name">ID Proof</label>
		                                    	<img src="<?php echo base_url(); ?>images/reg_gov_proof/<?php echo $s->reg_gov_proof; ?>" style="width:25%">
                                                <input type="hidden" name="reg_gov_proof" value="<?php echo $s->reg_gov_proof ?>">
		                                    </div>

                                            <div class="col-md-6 col-12 mb-30">
                                            	<label for="personal_company">I am</label>
                                            	<select class="form-control" style="box-shadow: none" name="reg_type">
                                            		<optgroup label="I am"></optgroup>
                                            		<option value="Student" <?php if($s->reg_type=="Student"){echo "selected";} ?>>Student / On a gap year</option>
                                            		<option value="Employed" <?php if($s->reg_type=="Employed"){echo "selected";} ?>>Employed</option>
                                            	</select>
                                            </div>

                                            <div class="col-md-6 col-12 mb-30">
                                            	<label for="personal_agency">Blood Group</label>
                                            	<div class="input-group mb-3">
											  		<div class="input-group-prepend">
											    		<span class="input-group-text" id="basic-addon1" style="background-color: white">
											    			<i class="fas fa-hospital-alt"></i>
											    		</span>
											 		 </div>
											  		<input type="text" class="form-control" name="reg_blood_grp" placeholder="Blood Group" style="box-shadow: none" value="<?php echo $s->reg_blood_grp; ?>" readonly>
												</div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-30">
                                            	<label for="personal_agency">Mobile Number</label>
                                            	<div class="input-group mb-3">
											  		<div class="input-group-prepend">
											    		<span class="input-group-text" id="basic-addon1" style="background-color: white">
											    			<i class="fas fa-phone-square"></i>
											    		</span>
											 		 </div>
											  		<input type="text" name="reg_mobile" class="form-control" placeholder="Mobile Number" style="box-shadow: none" value="<?php echo $s->reg_mobile; ?>">
												</div>
                                            </div>

                                            <div class="col-md-6 col-12 mb-30">
                                                <label for="personal_agency">Registration ID</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="background-color: white">
                                                            <i class="fas fa-id-card-alt"></i>
                                                        </span>
                                                     </div>
                                                    <input type="text" name="reg_uniq_id" class="form-control" placeholder="Registration ID" style="box-shadow: none" value="<?php echo $s->reg_uniq_id; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12 mb-30">
                                            	<label for="personal_agency">Address</label>
                                            	<div class="input-group mb-3">
											  		<div class="input-group-prepend">
											    		<span class="input-group-text" id="basic-addon1" style="background-color: white">
											    			<i class="fas fa-address-book"></i>
											    		</span>
											 		 </div>
											  		<textarea placeholder="Address" name="reg_address" id="reg_address" class="form-control" style="box-shadow: none" rows="5"><?php echo $s->reg_address; ?></textarea>
												</div>
                                            </div>

                                            <div class="col-md-12 col-12 mb-30">
                                                <label for="personal_agency">City</label>
                                                <select id="reg_city" name="reg_city" class="form-control" style="box-shadow: none">
                                                    <optgroup label="City">City</optgroup>
                                                    <option value="-1">Select Your city</option>
                                                        <?php 
                                                              foreach ($city as $r)
                                                              {  
                                                         ?>
                                                         <option value="<?php echo $r->city_id; ?>" <?php if($s->city_id==$r->city_id){echo "selected";} ?>><?php echo $r->city_name; ?></option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-30">
                                    	<button type="submit" class="btn btn-primary btn-lg btn-block" name="change" id="change"><i class="fas fa-check-circle"></i>&nbsp;Save Changes</button>
                                    </div>
                                </div>
                            <?php } ?>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--Login & Register Section end-->
        </div>
    </div>
    <!--Login & Register Section end-->

		<?php include "footer.php"; ?>
	</div> <!-- wrapper end -->
	<?php include "scripts.php"; ?>
        <!-- eamil exist -->
        <script type="text/javascript">
                    $("#reg_email").bind("input propertychange",function(){
                    var reg_email = $('#reg_email').val();
                    // alert(c_id);
                    $.ajax({
                        method:"post",
                        url:"<?php echo site_url(); ?>/user/myprofile/check_email",
                        data:{reg_email:reg_email},
                        success:function(data)
                        {
                            // alert(data);
                            var jsonobj=$.parseJSON(data);
                          
                            if(jsonobj.id==0)
                            {
                                $("#change").attr("disabled", true);
                                $('#msgemail').html(jsonobj.msg);
                            }
                            else if(jsonobj.id==1)
                            {
                                $("#change").attr("disabled", false);
                                $('#msgemail').html(jsonobj.msg);
                            }
                        }
                    }); 
                });
        </script>
        <!-- over email -->
</body>
</html>