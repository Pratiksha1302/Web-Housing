<!DOCTYPE html>
<html>
<head>
	<title>View - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<!-- main wrapper -->
	<div id="main-wrapper">
		<?php include "header.php"; ?>
	<!--Page Banner Section start-->
    	<div class="page-banner-section section" style="background-image: url(<?php echo base_url(); ?>images/room_1.jpg)">
        	<div class="container">
            	<div class="row">
                	<div class="col">
                    	<h1 class="page-banner-title text-uppercase">Single View</h1>
                    	<ul class="page-breadcrumb">
                        	<li class="text-uppercase"><a href="<?php echo site_url(); ?>/user/user_site">Home</a></li>
                        	<li class="active text-uppercase">Single view</li>
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
            
                <div class="col-lg-12 col-12 order-1 order-lg-2 mb-sm-50 mb-xs-50">
                    <div class="row">

                        <!--Property start-->
                        <div class="single-property col-12 mb-50">
                            <div class="property-inner">
                                <div class="img-fluid">
                                    <a href="#"><img src="<?php echo base_url(); ?>images/h1.jpg" alt="img" style="display: block;margin-left: auto;margin-right: auto;width:100%" class="img-thumbnail mb-3 mt-3"></a>
                                 </div>

                                <div class="head">
                                    <div class="left">
                                        <h1 class="title">Hostel Name</h1>
                                        <span class="location"><img src="<?php echo base_url(); ?>images/marker.png" alt="">Address</span>
                                        <span class="price"><i class="fas fa-rupee-sign"></i>&nbsp;12500</span>
                                    </div>
                                    <div class="right">
                                        <div class="type-wrap">
                                            
                                         
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="image mb-30">
                                    <img src="assets/images/property/single-property-1.jpg" alt="">
                                </div>
                                
                                <div class="content">
                                    
                                    <h3>Description</h3>
                                    
                                    <p>about hostel</p>
                                    
                                    
                                    
                                       
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <!--Property end-->
                        
                      

                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!--New property section end-->

	</div>	<!-- end main wrapper -->
	<?php include "footer.php"; ?>
	<?php include "scripts.php"; ?>
</body>
</html>