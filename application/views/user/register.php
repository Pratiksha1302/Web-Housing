<!DOCTYPE html>
<html>
<head>
    <title>Register - Dormitory Tracker</title>
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
                <div class="col-sm-12 col-md-12 col-lg-6 mx-auto mb-4">
                    <div class="card">
                        <div class="card-header" style="background-color: white;border-bottom: white">
                            <h2 class="text-danger text-center text-uppercase" style="font-weight:500">Register Here</h2>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <?php 
                                    if($this->session->flashdata('success_reg'))
                                    {
                                 ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('success_reg'); ?>
                                </div>
                            <?php } ?>
                            <?php 
                                    if($this->session->flashdata('success_reg_e'))
                                    {
                                 ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $this->session->flashdata('success_reg_e'); ?>
                                </div>
                            <?php } ?>
                                <form method="post" action="<?php echo site_url(); ?>/user/register/insert_data" enctype="multipart/form-data">
                                     <div class="form-row">
                                        <div class="form-group col-md-6
										">
                                            <label>Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Name" style="box-shadow: none" name="reg_name" id="reg_name">
                                            </div>
                                            <span id="msgname" style="color: red"></span>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Email Address</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="far fa-envelope-open"></i></span>
                                                </div>
                                                <input type="email" class="form-control" placeholder="example@abc.com" style="box-shadow: none" name="reg_email" id="reg_email">
                                            </div>
                                            <span id="msgemail" style="color: red"></span>
                                        </div>
                                      </div>

                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-unlock-alt"></i></span>
                                                </div>
                                                <input type="password" class="form-control" placeholder="Password" style="box-shadow: none" name="reg_passwd" id="reg_passwd">
                                            </div>
                                            <span id="msgpasswd" style="color: red"></span>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Confrim Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-unlock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" placeholder="Confirm Password" style="box-shadow: none" id="reg_con_pass"> 
                                            </div>
                                            <span id="msgconpasswd" style="color: red"></span>
                                        </div>
                                      </div>

                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Gender</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" style="box-shadow: none" id="reg_gender" name="reg_gender">
                                                    <optgroup label="Gender"></optgroup>
                                                    <option value="-1">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <span id="msggen" style="color: red"></span>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Birthdate</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-birthday-cake"></i></span>
                                                </div>
                                                <input type="date" class="form-control" placeholder="" style="box-shadow: none" name="reg_dob" id="reg_dob">
                                            </div>
                                            <span id="msgdob" style="color: red"></span>
                                        </div>
                                      </div>

                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Profile Photo</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="reg_profile" name="reg_profile">
                                                    <label class="custom-file-label" for="reg_profile" style="box-shadow: none;">Choose Profile</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>City</label>
                                            <select class="form-control" style="box-shadow: none" name="reg_city" id="reg_city">
                                                <optgroup label="City"></optgroup>
                                                <option value="-1">Please Select Your city</option>
                                                <?php 
                                                    if(isset($city))
                                                    {
                                                        foreach ($city as $res) {
                                                ?>
                                                <option value="<?php echo $res->city_id; ?>"><?php echo $res->city_name; ?></option>
                                            <?php }} ?>
                                            </select>
                                            <span id="msgcity" style="color: red"></span>
                                        </div>
                                        
                                      </div>

                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Blood Group</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" style="box-shadow: none" name="reg_bld_grp" id="reg_bld_grp">
                                                    <optgroup label="Blood Groups"></optgroup>
                                                    <option value="-1">Select Blood Group</option>
                                                    <option value="A+">A+</option>
                                                    <option value="B+">B+</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B-">B-</option>
                                                </select>
                                            </div>
                                            <span id="msgbloodgrp" style="color: red"></span>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>I am</label>
                                            <div class="input-group mb-3">
                                                <select class="form-control" style="box-shadow: none;" name="reg_type" id="reg_type">
                                                    <optgroup label="I am"></optgroup>
                                                    <option value="-1">Select This</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Employed">Employed</option>
                                                </select>
                                            </div>
                                            <span id="msgtype" style="color: red"></span>
                                        </div>
                                      </div>

                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Mobile Number</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-phone-square"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Mobile Number" style="box-shadow: none" name="reg_mobile" id="reg_mobile">
                                                </div>
                                                <span id="msgmobile" style="color: red"></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>ID Proof</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="reg_id_proof" name="reg_id_proof">
                                                    <label class="custom-file-label" for="reg_id_proof" style="box-shadow: none;">ID Proof</label>
                                                </div>
                                            </div>
                                            <span id="msgidproof" style="color: red"></span>
                                        </div>
                                      </div>
                                    
                                      <div class="form-group">
                                        <label for="address">Address</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <textarea placeholder="Address" class="form-control" style="box-shadow: none;" rows="" cols="4" name="reg_add" id="reg_add"></textarea>
                                            
                                        </div>
                                        <span id="msgadd" style="color: red"></span>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="reg_agree" name="reg_agree" checked>
                                        <label class="custom-control-label" for="reg_agree">I agree with your&nbsp;<a href="<?php echo site_url(); ?>/user/signin/terms">Terms &amp; Conditions</a></label>
                                    </div>
                                    <span id="msgagree" style="color: red"></span>
                                  </div>
                                  <button type="submit" class="btn btn-outline-primary btn-block" id="register" name="register"><i class="far fa-check-circle"></i>&nbsp;Register Me</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- page banner end -->
        
    </div> <!-- main wrapper end -->
    <?php include "footer.php"; ?>
    <?php include "scripts.php" ?>

    <script type="text/javascript">
        $("document").ready(function(){

            $("#register").click(function(){
              //alert("hello12");
                var reg_name,reg_email,reg_passwd,reg_con_pass,reg_gender,reg_dob,reg_city,reg_bld_grp,reg_type,reg_mobile,reg_id_proof,reg_add;
              
                reg_name = test_name("#reg_name","#msgname");
                
                reg_email = test_email("#reg_email","#msgemail");

                reg_passwd = test_match("#reg_passwd","#reg_con_pass","#msgpasswd","#msgconpasswd");

                reg_gender = test_drop("#reg_gender","#msggen");
        
                reg_dob = test_e("#reg_dob","#msgdob");
            
                reg_city = test_drop("#reg_city","#msgcity");

                reg_bld_grp = test_drop("#reg_bld_grp","#msgbloodgrp");

                reg_type = test_drop("#reg_type","#msgtype");

                reg_mobile = test_no("#reg_mobile","#msgmobile");    
                
                reg_id_proof = test_file("#reg_id_proof","#msgidproof");

                reg_add = test_e("#reg_add","#msgadd");
    
                 if(reg_name == true && reg_email == true && reg_passwd == true && reg_con_passwd == true && reg_gender == true && reg_dob == true && reg_city == true && reg_bld_grp == true && reg_type == true && reg_mobile == true && reg_id_proof == true && reg_add == true)
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
</body>
</html>
