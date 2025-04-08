<!DOCTYPE html>
<html>
<head>
    <title>Find PGs- Dormitory Tracker</title>
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
                    <h1 class="page-banner-title text-uppercase">Find PGs</h1>
                    <ul class="page-breadcrumb">
                        <li class="text-uppercase"><a href="<?php echo site_url(); ?>/user/user_site">Home</a></li>
                        <li class="active text-uppercase">Find PGs</li>
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
                            // echo "<pre>";
                            // print_r($data); 
                            foreach ($data as $res)
                            {
                         ?>
                        <div class="property-item list card p-3 col-md-6 col-12 mb-40">
                            <div class="property-inner">
                                <div class="image" style="height: 500px;">
                                    <input type="hidden" name="pg_id" value="<?php echo $res->pg_id; ?>">
                                    <a href="#"><img src="<?php echo base_url(); ?>images/pg_photos/<?php echo $res->pg_photo; ?>" alt=""></a>
                                </div>

                                <div class="content">
                                    <div class="float-right">
                                        <h3 class="title text-uppercase text-info" style="font-weight: 550">
                                            <img class="img-thumbnail" src="<?php echo base_url(); ?>images/landlord_profile/<?php echo $res->landlord_profile; ?>" style="width:100px;">
                                            <?php echo $res->landlord_name; ?>
                                        </h3> 

                                        <span class="location text-uppercase text-success" style="font-weight: 550"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<?php echo $res->pg_address; ?></span> <br>
                                        <span class="text-muted"><?php echo $res->pg_details; ?></span> <br>
                                       
                                        <span class="location text-danger" style="font-weight: 550">&nbsp;<i class="fas fa-envelope-open-text"></i>&nbsp;&nbsp;<?php echo $res->landlord_email; ?></span> 
                                    </div>
                                    <div class="">
                                        <div class="mt-2">
                                            <span class="price text-info" style="font-size: 20px;font-weight: 550"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $res->pg_rent; ?></span>
                                            
                                        </div>
                                    </div>

                                    <div>
                                        <div class="mt-2 col-12 col-md-12">
                                            <span>
                                                <a href="<?php echo site_url(); ?>/user/booktiffin" class="text-info text-uppercase"><b>For Tiffin Service</b></a>
                                            </span>

                                        </div>
                                    </div>
                            
                                    <div class="desc">
                                        <p></p>
                                        <span class="text-success" style="font-weight: 550;font-size: 18px;"><i class="fas fa-headset"></i>&nbsp;
                                            <?php echo $res->landlord_mobile; ?>
                                        </span>
                                    </div>
                                    <?php 
                                        if(isset($_SESSION['user']) && $_SESSION['user']!=""){
                                     ?>
                                    <a href="<?php echo site_url(); ?>/user/user_site/bookpg?pg_id=<?php echo base64_encode($res->pg_id); ?>" class="btn btn-outline-danger btn-lg btn-block"><i class="far fa-check-circle"></i>&nbsp;Book Now</a>
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