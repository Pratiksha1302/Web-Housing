<!DOCTYPE html>
<html>
<head>
	<title>Find - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<!-- main wrapper -->
	<div id="main-wrapper">
		<?php include "header.php"; ?>
		 <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(<?php echo base_url(); ?>images/find_1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title text-uppercase">Find Hostels</h1>
                    <ul class="page-breadcrumb">
                        <li class="text-uppercase"><a href="<?php echo site_url(); ?>/user/user_site">Home</a></li>
                        <li class="active text-uppercase">Find Hostels</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
	
	<!--New property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
            
                <div class="col-lg-12 col-12 order-1 mb-sm-50 mb-xs-50">
                    <div class="row">

                        <!--Property start-->
                        <?php 
                            foreach ($data as $res)
                            {
                         ?>
                        <div class="card p-3 property-item list col-md-6 col-12 mb-40">
                            <div class="property-inner">
                                <div class="image">
                                    <input type="hidden" name="hostel_id" value="<?php echo $res->hostel_id; ?>">
                                    <a href="#"><img src="<?php echo base_url(); ?>images/hostel_image/<?php echo $res->hostel_image; ?>" alt=""></a>
                                </div>

                                <div class="content">
                                    <div class="left">
                                        <h3 class="title text-uppercase text-info" style="font-weight: 550"><?php echo $res->hostel_name; ?></h3>
                                        <span class="location text-uppercase text-success" style="font-weight: 550"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<?php echo $res->hostel_address; ?></span>
                                        <span class="text-danger"><?php echo $res->hostel_pincode; ?></span>
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <span class="price text-info" style="font-size: 20px;font-weight: 550"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $res->hostel_rent; ?></span>
                                            
                                        </div>
                                    </div>
                                    <div class="desc">
                                        <p><?php echo $res->hostel_details; ?></p>
                                        <span class="text-success" style="font-weight: 550"><i class="fas fa-headset"></i>&nbsp; <?php echo $res->hostel_phone; ?></span>
                                    </div>
                                    <?php 
                                        if(isset($_SESSION['user']) && $_SESSION['user']!=""){
                                     ?>
                                    <a href="<?php echo site_url(); ?>/user/user_site/booknow?hostel_id=<?php echo base64_encode($res->hostel_id); ?>" class="btn btn-outline-danger btn-lg btn-block"><i class="far fa-check-circle"></i>&nbsp;Book Now</a>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!--Property end-->
                    <?php } ?>
                    </div>
            </div>
        </div>
    </div>
    <!--New property section end-->
	</div> <!-- main wrapper over -->
	<?php include "footer.php"; ?>
	<?php include "scripts.php"; ?>
</body>
</html>