<!DOCTYPE html>
<html>
<head>
	<title>Home - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<div id="main-wrapper">
	 	<?php include "header.php"; ?>

	 	<!--Hero Section start-->
    <div class="hero-section section position-relative">
       
        <!--Hero Slider start-->
        <div class="hero-slider section">

            <!--Hero Item start-->
            <div class="hero-item" style="background-image: url(<?php echo base_url(); ?>images/hero-1.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <!--Hero Content start-->
                            <div class="hero-property-content text-center">

                                <h1 class="title"><a href="#">FIND BEST HOSTELS HERE!</a></h1>
                                <span class="location"><img src="<?php echo base_url(); ?>images/hero-marker.png" alt="">AT YOUR NEAREST LOCATION.</span>
                                <div class="type-wrap">
                                    <span class="price">AT CHEAPEST RENTS.</span>
                                </div>
                                <ul class="property-feature">
                                    <li>
                                        <span><i class="fas fa-check-circle"></i>&nbsp;EASY CANCELLATIONS.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;CITY WISE SEARCH.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;EASY PAYMENTS.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;ONLINE APPOINTMENTS.</span>
                                    </li>
                                </ul>
                                

                            </div>
                            <!--Hero Content end-->

                        </div>
                    </div>
                </div>
            </div>
            <!--Hero Item end-->

            <!--Hero Item start-->
            <div class="hero-item" style="background-image: url(<?php echo base_url(); ?>images/bg.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <!--Hero Content start-->
                            <div class="hero-property-content text-center">

                                <h1 class="title"><a href="#">FIND BEST RENTAL ROOMS!</a></h1>
                                <span class="location"><img src="<?php echo basE_url(); ?>images/hero-marker.png" alt="">AT YOUR NEAREST LOCATION.</span>
                                <div class="type-wrap">
                                    
                                    <span class="price">AT CHEAPEST RENTS.</span>
                                </div>
                                 <ul class="property-feature">
                                    <li>
                                        <span><i class="fas fa-check-circle"></i>&nbsp;EASY CANCELLATIONS.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;CITY WISE SEARCH.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;EASY PAYMENTS.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;ONLINE APPOINTMENTS.</span>
                                    </li>
                                </ul>
                            </div>
                            <!--Hero Content end-->

                        </div>
                    </div>
                </div>
            </div>
            <!--Hero Item end-->
            
 <!--Hero Item start-->
 <div class="hero-item" style="background-image: url(<?php echo base_url(); ?>images/bg2.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <!--Hero Content start-->
                            <div class="hero-property-content text-center">

                                <h1 class="title"><a href="#">FIND BEST RENTAL ROOMS!</a></h1>
                                <span class="location"><img src="<?php echo basE_url(); ?>images/hero-marker.png" alt="">AT YOUR NEAREST LOCATION.</span>
                                <div class="type-wrap">
                                    
                                    <span class="price">AT CHEAPEST RENTS.</span>
                                </div>
                                 <ul class="property-feature">
                                    <li>
                                        <span><i class="fas fa-check-circle"></i>&nbsp;EASY CANCELLATIONS.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;CITY WISE SEARCH.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;EASY PAYMENTS.</span>
                                    </li>
                                    <li>
                                         <span><i class="fas fa-check-circle"></i>&nbsp;ONLINE APPOINTMENTS.</span>
                                    </li>
                                </ul>
                            </div>
                            <!--Hero Content end-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Hero Slider end-->
        
    </div>
    <!--Hero Section end-->

    <!--Search Section section start-->
    <div class="search-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
            <div class="col-md-4 text-white text-center" style="background-image: linear-gradient(to left bottom, #051937, #004d7a, #008793);">
                <div class="">
                    <div class="card-body">
                        <img class="mb-4" src="<?php echo base_url(); ?>images/findhome.png" style="width:40%;border-radius: 50%">
                        <h2 class="" style="color: white"><b>FIND YOUR HOSTELS &amp; PGs</b></h2>
                        <p>Looking For New Hostels or looking for rental rooms ??&nbsp;HERE YOU CAN FIND</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 p-5 border">
                <form method="post" action="<?php echo site_url(); ?>/user/user_site/find">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <select class="form-control" style="box-shadow: none;" id="state" name="state">
                              <option value="-1">Select State</option>
                              <?php if (isset($state))
                                 {
                                    foreach ($state as $s)
                                    {     
                             ?>
                              <option value="<?php echo $s->state_id; ?>"><?php echo $s->state_name; ?></option>
                          <?php }} ?>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <select class="form-control" style="box-shadow: none;" id="city" name="city">
                              <option value="-1">Please Select City</option>
                          </select>
                        </div>
                      </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select class="form-control" style="box-shadow: none;" id="type" name="type">
                                <option value="-1">Select Type</option>
                                <option value="Hostel">Hostels</option>
                                <option value="PG">PGs</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            
                            <input type="text" class="form-control" placeholder="Maximum Price" aria-label="rupee" aria-describedby="basic-addon1" style="box-shadow: none;" id="price" name="price" required>
                        </div>    
                        </div>
                        <button type="submit" class="btn btn-outline-info btn-block btn-lg" name="find" id="find"><i class="fas fa-search"></i>&nbsp;Search</button>     
                    </div>
                    
                    <div class="form-row">
                        
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!--Search Section section end-->

    <!--Feature property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-color: #eee;">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 class="text-danger">RECENTLY ADDED PGs</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            <div class="row">
                <!--Property Slider start-->
                <div class="property-carousel section">
                    <!--Property start-->
                    <?php 
                        if (isset($data2)) 
                        {
                            foreach ($data2 as $res) 
                            {
                     ?>
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <a href="#"><img src="<?php echo base_url(); ?>images/pg_photos/<?php echo $res->pg_photo; ?>" alt="" style="height: 225px"></a>
                            </div>

                            <div class="content">
                                <div class="left">
                                    
                                    <h3 class="title text-uppercase text-success"><a href="#"><?php echo $res->landlord_name; ?></a></h3>
                                    
                                    <span class="location"><?php echo $res->pg_details; ?></span>
                                    <span>
                                        <a href="<?php echo site_url(); ?>/user/booktiffin" class="text-info text-uppercase"><b>For Tiffin Service</b></a>
                                    </span>

                            </div>
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price"><i class="fas fa-rupee-sign"></i>&nbsp;Price<span>M</span></span>
                                        <span class="type"><?php echo $res->pg_rent; ?></span>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <div>
                            <?php 
                                if(isset($_SESSION['user']) && $_SESSION['user']!=""){
                                     ?>
                            <a href="<?php echo site_url(); ?>/user/user_site/bookpg?pg_id=<?php echo base64_encode($res->pg_id); ?>" class="btn btn-outline-danger btn-lg btn-block mt-3"><i class="far fa-check-circle"></i>&nbsp;Book Now</a>
                                <?php } ?>  
                        </div>
                    </div>

                    <!--Property end-->
                    <?php 
                            }
                        }
                    ?>
                </div>
                <!--Property Slider end-->    
            </div>
        </div>
    </div>
    <!--Feature property section end-->

     <!--Feature property section start-->
    <div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-color: #eee;">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 class="text-danger">RECENTLY ADDED HOSTELS</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
               
                <!--Property Slider start-->
                <div class="property-carousel section">

                    <!--Property start-->
                    <?php 
                        if (isset($data1)) 
                        {
                            foreach ($data1 as $res) 
                            {
                     ?>
                    <div class="property-item col">
                        <div class="property-inner">
                            <div class="image">
                                <img src="<?php echo base_url(); ?>images/hostel_image/<?php echo $res->hostel_image; ?>" alt="hostel photo" style="height: 225px;">
                            </div>

                            <div class="content">
                                <div class="left">
                                    <h3 class="title text-success text-uppercase"><a href="#"><?php echo $res->hostel_name; ?></a></h3>
                                    <span class="location text-danger"><?php echo $res->hostel_address; ?></span>
                                </div>
                                
                                <div class="right">
                                    <div class="type-wrap">
                                        <span class="price"><i class="fas fa-rupee-sign"></i>&nbsp;Price<span>M</span></span>
                                        <span class="type"><?php echo $res->hostel_rent; ?></span>
                                    </div>
                                </div>
                                <span class=""><?php echo $res->hostel_details; ?></span>
                                <?php 
                                        if(isset($_SESSION['user']) && $_SESSION['user']!=""){
                                     ?>
                                    <a href="<?php echo site_url(); ?>/user/user_site/booknow?hostel_id=<?php echo base64_encode($res->hostel_id); ?>" class="btn btn-outline-danger btn-lg btn-block mt-3"><i class="far fa-check-circle"></i>&nbsp;Book Now</a>
                                <?php } ?>
                            </div>

                        </div>

                    </div>
                    <!--Property end-->
                    <?php 
                            }
                        }
                    ?>
                </div>
                <!--Property Slider end-->    
            </div>
        </div>
    </div>
    <!--Feature property section end-->

    <div class="feature-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50" style="background-color: white">
        <div class="container">
            
            <div class="feature-wrap row row-25">

                <!--Feature start-->
                <div class="col-lg-4 col-sm-6 col-12 mb-50">
                    <div class="feature">
                        <div class="icon text-danger"><i class="fas fa-piggy-bank"></i></i></div>
                        <div class="content">
                            <h4 class="text-danger">Low Cost</h4>
                            <p class="text-primary">There is no agent facility, so the actual costs are there fixed by owners.</p>
                        </div>
                    </div>
                </div>
                <!--Feature end-->

                <!--Feature start-->
                <div class="col-lg-4 col-sm-6 col-12 mb-50">
                    <div class="feature">
                        <div class="icon"><i class="fas fa-map-pin text-danger"></i></div>
                        <div class="content">
                            <h4 class="text-danger">Easy to Find</h4>
                            <p class="text-primary">Easy to find hostels &amp; PGs nearest you.</p>
                        </div>
                    </div>
                </div>
                <!--Feature end-->

                <!--Feature start-->
                <div class="col-lg-4 col-sm-6 col-12 mb-50">
                    <div class="feature">
                        <div class="icon"><i class="fas fa-shield-alt text-danger"></i></div>
                        <div class="content">
                            <h4 class="text-danger">Reliable</h4>
                            <p class="text-primary">All hostels &amp; PGs are well verified by the users.</p>
                        </div>
                    </div>
                </div>
                <!--Feature end-->

            </div>
            
        </div>
    </div>

 <!--Services section start-->
    <div class="service-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20" style="background-color: #eee;">
        <div class="container">
        
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1 class="text-danger">OUR SERVICES</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row row-30 align-items-center">
                <div class="col-lg-5 col-12 mb-30">
                    <div class="property-slider-2">
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="#" class="image"><img src="<?php echo base_url(); ?>images/hostel_1.jpg" alt=""></a>
                               
                            </div>
                        </div>
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="#" class="image"><img src="<?php echo base_url(); ?>images/room.jpg" alt=""></a>
                                
                            </div>
                        </div>
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="#" class="image"><img src="<?php echo base_url(); ?>images/r3.jpg" alt=""></a>
                                <!-- <div class="content">
                                    <h4 class="title"><a href="#">Rental Rooms</a></h4>
                                    <span class="location">Location</span>
                                    <h4 class="type">Rent <span>Rs <span>Month</span></span></h4>
                                    
                                </div> -->
                            </div>
                        </div>
                        
                        <div class="property-2">
                            <div class="property-inner">
                                <a href="#" class="image"><img src="<?php echo base_url(); ?>images/r1.jpg" alt=""style="width: 100%;" </style>></a>
                                <!-- <div class="content">
                                    <h4 class="title"><a href="#">Rental Rooms</a></h4>
                                    <span class="location">Location</span>
                                    <h4 class="type">Rent <span>Rs <span>Month</span></span></h4>
                                    
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="row row-20">

                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="<?php echo base_url(); ?>images/service-1.png" alt=""></div>
                                        <h4 class="text-danger">BOOK HOSTELS &amp; PGs</h4>
                                    </div>
                                    <div class="content">
                                        <p class="text-primary">BOOK YOUR FAVOURITE HOSTELS &amp; RENTAL ROOMS HERE.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->

                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="<?php echo base_url(); ?>images/service-2.png" alt=""></div>
                                        <h4 class="text-danger">ROOMS ON RENT</h4>
                                    </div>
                                    <div class="content">
                                        <p class="text-primary">OWNERS ARE PROVIDING RENTAL ROOMS FOR STUDENTS AS WELL AS EMPLOYEES.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->

                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="<?php echo base_url(); ?>images/service-3.png" alt=""></div>
                                        <h4 class="text-danger">IDENTIFICATION</h4>
                                    </div>
                                    <div class="content">
                                        <p class="text-primary">ALL THE PROPERTIES ARE WELL BEING IDENTIFIED.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->

                        <!--Service start-->
                        <div class="col-md-6 col-12 mb-30">
                            <div class="service">
                                <div class="service-inner">
                                    <div class="head">
                                        <div class="icon"><img src="<?php echo base_url(); ?>images/service-4.png" alt=""></div>
                                        <h4 class="text-danger">EXTERNAL TIFFIN SOURCE</h4>
                                    </div>
                                    <div class="content">
                                        <p class="text-primary">WE ARE ALSO PROVIDING TIFFIN SOURCES FOR RENTAL ROOMS.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service end-->

                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!--Services section end-->

    <?php include "footer.php"; ?>
	</div>
	<?php include "scripts.php" ?>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#city").attr("disabled", true);
            $(document).on('change','#state',function()
            {
                var s_id = $(this).val();
                // alert(s_id);
                if(s_id=="-1")
                {
                    alert("Please Select Your State");
                     $("#city").attr("disabled", true);
                }
                else
                {
                    $.ajax({
                        url:"<?php echo site_url(); ?>/user/user_site/selectcity",
                        type:"post",
                        data:{s_id:s_id},
                        success:function(result){
                            // alert(result);
                            $("#city").html(result);
                            $("#city").attr("disabled", false);
                        }
                    });
                }
            });
            $(document).on('change','#city',function()
            {
                var c_id = $(this).val();
                // alert(s_id);
                if(c_id=="-1")
                {
                    alert("Please Select Your City");
                }
            });
        });
    </script>
</body>
</html>