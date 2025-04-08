<!DOCTYPE html>
<html>
<head>
	<title>Book Appointment - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<!-- main wrapper -->
	<div id="main-wrapper">
		<?php include "header.php"; ?>
			 <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(<?php echo base_url(); ?>images/book.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title text-uppercase">Book Appointment</h1>
                    <ul class="page-breadcrumb">
                        <li class="text-uppercase"><a href="<?php echo site_url(); ?>/user/user_site">Home</a></li>
                        <li class="active text-uppercase">Book Appointment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

     <!-- booking Section start-->
    <div class="login-register-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-color:white">
    <section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 text-white text-center" style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72);">
                <div class=" ">
                    <div class="card-body">
                        <img src="<?php echo base_url(); ?>images/booknow.jpg" style="width:40%;border-radius: 50%">
                        <h2 class="py-3" style="color: white"><b>BOOK APPOINTMENT</b></h2>
                        <p>Want to visit hostel students? or Want to inquiry about the hostel?, Yes Possible here with <span class="text-warning">ONLINE APPOINTMENT.</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4"><strong>Please fill with your details</strong></h4>
                
                <form method="post" action="<?php echo site_url(); ?>/user/Bookappointment/insert_data">
                    <?php 
                        if($this->session->flashdata('success'))
                        {
                    ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php 
                        }
                     ?>

                     <?php 
                        if($this->session->flashdata('success_e'))
                        {
                    ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success_e'); ?>
                        </div>
                    <?php 
                        }
                     ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Name" style="box-shadow: none;" id="ap_name" name="ap_name"> 
                            </div>
                            <span id="msgname" style="color: red"></span>
                        </div>

                        <div class="form-group col-md-6">
                          <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-home"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Relation (Ex Father)" style="box-shadow: none;" id="ap_relation" name="ap_relation">
                            </div>
                            <span id="msgrelation" style="color: red;"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="ap_mobile" placeholder="Mobile Number" class="form-control" style="box-shadow: none;" maxlength="10" id="ap_mobile">
                            </div>
                            <span id="msgmobile" style="color: red"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="far fa-envelope-open"></i></span>
                                </div>
                                 <input type="email" name="ap_email" placeholder="Email Address" class="form-control" style="box-shadow: none;" id="ap_email">
                            </div>
                           <span id="msgemail" style="color: red"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-table"></i></span>
                                </div>
                                <input type="date" class="form-control" placeholder="" style="box-shadow: none;" id="ap_date" name="ap_date"> 
                            </div>
                            <span id="msgdate" style="color: red"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <select class="form-control" style="box-shadow: none" name="ap_time" id="ap_time">
                                    <option value="-1">Select Time</option>
                                    <option value="10:00">10:00AM</option>
                                    <option value="11:00">11:00AM</option>
                                    <option value="12:00">12:00PM</option>
                                    <option value="1:00">1:00PM</option>
                                    <option value="2:00">2:00PM</option>
                                    <option value="3:00">3:00PM</option>
                                    <option value="4:00">4:00PM</option>
                                </select>
                            </div>
                            <span id="msgtime" style="color: red;"></span>
                        </div>
                      </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-bookmark"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Subject" style="box-shadow: none;" id="ap_subject" name="ap_subject"> 
                            </div>
                            <span id="msgsub" style="color: red"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-id-card"></i></span>
                                </div>
                                <?php 
                                if(isset($_SESSION['user']) && $_SESSION['user']!="")
                                {
                                    foreach ($data as $s)
                                    {
                                 ?>
                                <input type="text" class="form-control" placeholder="Registration ID" style="box-shadow: none;" id="ap_reg_id" name="ap_reg_id" value="<?php echo $s->reg_uniq_id; ?>"> 
                            <?php }} 
                                else
                                {
                            ?>
                            <input type="text" class="form-control" placeholder="Registration ID" style="box-shadow: none;" id="ap_reg_id" name="ap_reg_id" value=""> 
                        <?php } ?>
                            </div>
                            <span id="msgregid" style="color: red"></span>
                        </div>

                    </div>

                        <div class="form-row mb-3">
                            <div class="form-group col-md-12">
                                <select id="ap_hostel" name="ap_hostel" class="form-control" style="box-shadow: none;">
                                    <option value="-1">Select Hostel</option>
                                  <?php 
                                        if (isset($hostel)) 
                                        {
                                            foreach ($hostel as $res)
                                            {
                                   ?>
                                   <option value="<?php echo $res->hostel_id; ?>"><?php echo $res->hostel_name; ?></option>
                                   <?php 
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <span style="color: red" id="msghostel"></span>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="far fa-comments"></i></span>
                                    </div>
                                    <textarea id="ap_comments" name="ap_comments" cols="40" rows="5" class="form-control" placeholder="Comments" style="box-shadow: none;"></textarea>
                                </div>
                                <span id="msgcomment" style="color: red"></span>
                            </div> 
                        </div>

                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-check">
                                    <small class="text-danger">*&nbsp;<b>Confirmation will be sent you in given email address.</b>
                                    </small>
                                </div>
                              </div>
                          </div>
                    </div>
                    
                    <div class="form-row">
                       <button type="submit" name="booknow" id="booknow" class="btn btn-outline-info btn-block btn-lg"><i class="fas fa-check-circle"></i>&nbsp;Book Now</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
    </div>
    <!--booking Section end-->

		<?php include "footer.php"; ?>	
	</div> <!-- end main wrapper -->

	<?php include "scripts.php"; ?>
    <script>    
      $("document").ready(function(){
            ///alert();
            $("#ap_reg_id").bind("input propertychange",function(){
                    var reg_id = $('#ap_reg_id').val();

                    $.ajax({
                        method:"post",
                        url:"<?php echo site_url(); ?>/user/Bookappointment/check_id",
                        data:{reg_uniq_id:reg_id},
                        success:function(data)
                        {
                           // alert(data);
                            var jsonobj=$.parseJSON(data);
                          
                            if(jsonobj.id==0)
                            {
                                $("#booknow").attr("disabled", true);
                                $('#msgregid').html(jsonobj.msg);
                            }
                            else if(jsonobj.id==1)
                            {
                                $("#booknow").attr("disabled", false);
                                $('#msgregid').html(jsonobj.msg);
                            }
                        }
                    });
                });

        });
    </script>
    <script type="text/javascript">
        $("document").ready(function(){

            $("#booknow").click(function(){
              
              //alert("hello12");
                var ap_name,ap_relation,ap_mobile,ap_email,ap_date,ap_time,ap_subject,ap_reg_id,ap_hostel,ap_comments;
              
                ap_name = test_name("#ap_name","#msgname");
                
                ap_relation = test_e("#ap_relation","#msgrelation");

                ap_mobile = test_no('#ap_mobile','#msgmobile');

                ap_email = test_email('#ap_email','#msgemail');

                ap_date = test_e('#ap_date','#msgdate');

                ap_time = test_drop('#ap_time','#msgtime');

                ap_subject = test_e('#ap_subject','#msgsub');

                ap_reg_id = test_e('#ap_reg_id','#msgregid');

                ap_hostel = test_drop('#ap_hostel','#msghostel');

                ap_comments = test_e('#ap_comments','#msgcomment');

                if(ap_name == true && ap_relation == true && ap_mobile == true && ap_email == true && ap_date == true && ap_time == true && ap_subject == true && ap_reg_id == true && ap_hostel == true && ap_comments == true)
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