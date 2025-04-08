                                        <!--Header section start-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">

    <header class="header header-sticky">
        <div class="header-bottom menu-center">
            <div class="container">
                <div class="row justify-content-between">
                    
                    <!--Logo start-->
                    <div class="col mt-10 mb-10">
                        <div class="logo">
                            <a href="<?php echo site_url(); ?>/user/user_site"><img src="<?php echo base_url(); ?>images/weblogo.png" alt="logo"></a>
                        </div>
                    </div>
                    <!--Logo end-->
                    
                    <!--Menu start-->
                    <div class="navbar col d-none d-lg-flex" style="font-family: 'Abril Fatface', cursive;">
                        <nav class="main-menu">
                            <ul>
                                <li><a href="<?php echo site_url(); ?>/user/user_site">HOME</a></li>

                                <li><a href="<?php echo site_url(); ?>/user/aboutus">ABOUT US</a></li>

                                <li class="has-dropdown"><a href="#">BOOK NOW</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo site_url(); ?>/user/bookappointment">APPOINTMENT</a></li>
                                        
                                    </ul>
                                </li>

                                <li><a href="<?php echo site_url(); ?>/user/contactus">CONTACT US</a></li>
                                
                                <li class="has-dropdown"><a href="#">MANAGE ACCOUNT</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo site_url(); ?>/user/myprofile">MY PROFILE</a></li>
                                        <li><a href="<?php echo site_url(); ?>/user/mybookings">MY BOOKINGS</a></li>
                                        <li><a href="<?php echo site_url(); ?>/user/changepassword">CHANGE PASSWORD</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--Menu end-->
                    <?php 
                        if(isset($_SESSION['user']) && $_SESSION['user']!="")
                        {
                     ?>
                        <!--User start-->
                        <div class="col mr-sm-50 mr-xs-50">
                            <div class="header-user">
                                <a href="<?php echo site_url(); ?>/user/signin/logout" class="user-toggle"><i class="fas fa-sign-out-alt"></i><span class="text-uppercase">Logout</span></a>
                            </div>
                        </div>
                        <!--User end-->
                    <?php }  
                        else
                        {
                     ?>
                     <!--User start-->
                        <div class="col mr-sm-50 mr-xs-50">
                            <div class="header-user">
                                <a href="<?php echo site_url(); ?>/user/signin" class="user-toggle"><i class="fas fa-user"></i><span class="text-uppercase">Login &amp; Register</span></a>
                            </div>
                        </div>
                        <!--User end-->
                 <?php } ?>
                </div>
                
                <!--Mobile Menu start-->
                <div class="row">
                    <div class="col-12 d-flex d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
                <!--Mobile Menu end-->
                
            </div>
        </div>
    </header>
    <!--Header section end-->