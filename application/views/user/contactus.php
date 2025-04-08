<!DOCTYPE html>
<html>
<head>
	<title>Contact us - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<!-- main wrapper -->
	<div id="main-wrapper">
		<?php include "header.php"; ?>
		 	 <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(<?php echo base_url(); ?>images/contactus.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title text-uppercase">Contact us</h1>
                    <ul class="page-breadcrumb">
                        <li class="text-uppercase"><a href="<?php echo site_url(); ?>/user/user_site">Home</a></li>
                        <li class="active text-uppercase">Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

     <!--New property section start-->
    <div class="contact-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        
                        <div class="contact-info col-md-4 col-12 mb-30" data-aos="fade-up">
                            <i class="fas fa-map-pin"></i>
                            <h4 class="text-danger">Address</h4>
                            <p class="text-primary">Pimpri Chinchwad , Pune</p>
                        </div>
                        
                        <div class="contact-info col-md-4 col-12 mb-30" data-aos="fade-up">
                            <i class="fas fa-phone"></i>
                            <h4 class="text-danger">Phone</h4>
                            <p class="text-primary"><a href="#">+91 9834939003</a><a href="#">0261 2255889</a></p>
                        </div>
                        
                        <div class="contact-info col-md-4 col-12 mb-30" data-aos="fade-up">
                            <i class="fas fa-globe-americas"></i>
                            <h4 class="text-danger">Website</h4>
                            <p class="text-primary"><a href="#">dormitorytracker@info.com</a><a href="#">www.dormitorytracker.com</a></p>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--New property section end-->

     <!--New property section start-->
    <div class="contact-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
           <section class="testimonial" id="testimonial" data-aos="flip-down">
            <div class="container">
            <div class="row ">
                <div class="col-md-4 text-white text-center" style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72);">
                    <div class=" ">
                        <div class="card-body">
                            <img src="<?php echo base_url(); ?>images/inquiry.png" style="width:70%;">
                            <h2 class="py-3" style="color: white"><b>ANY QUESTIONS?</b></h2>
                            <p>Want to meet us? or Have any questions? Then You Can<span class="text-warning"> CONTACT US</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 py-5 border">
                    <h4 class="pb-4"><strong>Please fill with your details</strong></h4>
                    <?php 
                        if($this->session->flashdata('success_complaint'))
                        {
                     ?>
                    <div class="alert alert-success" role="alert">
                      <?php echo $this->session->flashdata('success_complaint'); ?>
                    </div>
                <?php } ?>
                    <form method="post" action="<?php echo site_url(); ?>/user/contactus/insert_data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-user"></i></span>
                                    </div>
                                    <?php 
                                        if(isset($_SESSION['user']))
                                        {
                                            foreach ($data as $s)
                                            {
                                           
                                     ?>
                                    <input type="text" name="c_name" class="form-control" placeholder="Name" style="box-shadow: none;" id="c_name" value="<?php echo $s->reg_name; ?>"> 
                                <?php }} 
                                    else
                                    {
                                ?>
                                <input type="text" name="c_name" class="form-control" placeholder="Name" style="box-shadow: none;" id="c_name"> 
                            <?php } ?>
                                </div>
                                <span id="msgname" style="color: red"></span>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="far fa-envelope-open"></i></span>
                                    </div>
                                     <?php 
                                        if(isset($_SESSION['user']))
                                        {
                                            foreach ($data as $s)
                                            {
                                           
                                     ?>
                                    <input type="email" name="c_email" class="form-control" placeholder="Email Address" style="box-shadow: none;" id="c_email" value="<?php echo $s->reg_email; ?>">
                                <?php }} 
                                else
                                {
                                ?>
                                 <input type="email" name="c_email" class="form-control" placeholder="Email Address" style="box-shadow: none;" id="c_email" value="">
                             <?php } ?>
                                </div>
                                <span id="msgemail" style="color: red"></span>
                            </div>
                        </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-phone"></i></span>
                                </div>
                                <?php 
                                        if(isset($_SESSION['user']))
                                        {
                                            foreach ($data as $s)
                                            {
                                           
                                     ?>
                                <input type="text" name="c_mobile" placeholder="Mobile Number" class="form-control" style="box-shadow: none;" maxlength="10" id="c_mobile" value="<?php echo $s->reg_mobile; ?>">
                            <?php }}
                            else
                            {
                             ?>
                             <input type="text" name="c_mobile" placeholder="Mobile Number" class="form-control" style="box-shadow: none;" maxlength="10" id="c_mobile" value="">
                         <?php } ?>
                            </div>
                            <span id="msgmobile" style="color: red"></span>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="fas fa-book-open"></i></span>
                                </div>
                                 <input type="text" name="c_subject" placeholder="Subject" class="form-control" style="box-shadow: none;" id="c_subject">
                            </div>
                            <span id="msgsub" style="color: red"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color: white"><i class="far fa-comments"></i></span>
                                </div>
                                <textarea id="c_msg" name="c_msg" cols="40" rows="5" class="form-control" placeholder="Message" style="box-shadow: none;"></textarea>
                            </div>
                            <span id="msgcmt" style="color: red"></span>
                        </div> 
                    </div>
                    
                    <div class="form-row">
                        <button type="submit" class="btn btn-outline-info btn-block btn-lg" name="send" id="send"><i class="fas fa-check-circle"></i>&nbsp;Send Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
        </div>
    </div>
    <!--New property section end-->

		<?php include "footer.php"; ?>
	</div> <!-- main wrapper over -->
<?php include "scripts.php"; ?>
 <!-- validation -->
    <script>    
        $("document").ready(function(){
         
            $("#send").click(function(){
              
              //alert("hello12");
                var c_name,c_email,c_comment,c_subject,c_mobile;
              
                c_name = test_name("#c_name","#msgname");
                
                c_email = test_email("#c_email","#msgemail");

                c_comment = test_e("#c_msg","#msgcmt");

                c_subject = test_e("#c_subject","#msgsub");

                c_mobile = test_no("#c_mobile","#msgmobile");

                 if(c_name == true && c_email == true && c_comment == true && c_subject == true && c_mobile == true)
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