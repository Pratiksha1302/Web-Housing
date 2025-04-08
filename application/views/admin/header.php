<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8"/>
	 <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	 <meta name="description" content=""/>
	 <meta name="author" content=""/>
	 <!-- font awesome -->
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/all.css">
	 <!--favicon-->
	 <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>images/projectlogo.webp"/>
	 <!-- Vector CSS -->
	 <link href="<?php echo base_url(); ?>plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	 <!-- simplebar CSS-->
	 <link href="<?php echo base_url(); ?>plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
	 <!-- Bootstrap core CSS-->
	 <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet"/>
     <!--Select Plugins-->
    <link href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css" rel="stylesheet"/>
    <!--inputtags-->
    <link href="<?php echo base_url(); ?>plugins/inputtags/css/bootstrap-tagsinput.css" rel="stylesheet" />
	 <!--multi select-->
  	 <link href="<?php echo base_url(); ?>plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
  
    <link href="<?php echo base_url(); ?>plugins/fancybox/css/jquery.fancybox.min.css" rel="stylesheet" type="text/css"/>
   <!--Data Tables -->
     <!--Bootstrap Datepicker-->
  <link href="<?php echo base_url(); ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
  
  <link href="<?php echo base_url(); ?>plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	 <!-- animate CSS-->
	 <link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet" type="text/css"/>
	 <!-- Icons CSS-->
	 <link href="<?php echo base_url(); ?>css/icons.css" rel="stylesheet" type="text/css"/>
	 <!-- Sidebar CSS-->
	 <link href="<?php echo base_url(); ?>css/sidebar-menu.css" rel="stylesheet"/>
	 <!-- Custom Style-->
	 <link href="<?php echo base_url(); ?>css/app-style.css" rel="stylesheet"/>
   <!-- notifications css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/lobibox.min.css"/>
</head>
<body>
   <!-- Start wrapper-->
 <div id="wrapper">
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" class="bg-theme" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo" style="display: flex; align-items: center; padding: 8px; gap: 8px;">
     <a href="#" style="display: flex; align-items: center; text-decoration: none; gap: 8px;">
      <img src="<?php echo base_url(); ?>images/projectlogo.webp" class="logo-icon" 
           alt="logo icon" style="width: 28px; height: 28px;">
      <h5 class="logo-text" style="font-size: 14px; font-weight: 600; color: white; margin: 0; line-height: 1;">
        <span style="color: rgb(0,128,236); text-shadow: 0 0 2px cyan;">D</span>ormitory 
        <span style="color: rgb(0,128,236); text-shadow: 0 0 2px cyan;">T</span>racker
      </h5>   </a>
         
   </div>
   <div class="user-details">
    <div class="media align-items-center user-pointer collapsed" data-toggle="collapse" data-target="#user-dropdown">
      <div class="avatar">
        <img class="mr-3 side-user-img" src="<?php echo base_url(); ?>images/admin_profile/<?php echo $_SESSION['logged_in']['admin_profile']; ?>" alt="Profile">
      </div>
       <div class="media-body">
       <h6 class="side-user-name">Admin Profile</h6>
      </div>
       </div>
     <div id="user-dropdown" class="collapse">
      <ul class="user-setting-menu">
            <li><a href="<?php echo site_url(); ?>/admin/admin_profile"><i class="icon-user"></i>My Profile</a></li>
            <li><a href="<?php echo site_url(); ?>/Login_master/logout"><i class="icon-power"></i>Logout</a></li>
      </ul>
     </div>
      </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">Menu</li>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='admin_master')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="<?php echo site_url(); ?>/admin/admin_panel" class="waves-effect">
           <i class="fa fa-dashboard"></i>
           <span>Dashboard</span>
        </a>
      </li>
<?php
    if($_SESSION['logged_in']['admin_type'] == "super_admin")
    {
?>     
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='hostel_details')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i aria-hidden="true" class="fa fa-building-o"></i>
          <span>Hostel Details</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <!--  -->
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='hostel_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/hostel_master"><i class="zmdi zmdi-balance"></i>Hostel Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='employee_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/employee_master"><i class="zmdi zmdi-assignment-account"></i>Employee Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='student_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/student_master"><i class="zmdi zmdi-accounts-outline"></i>Student Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='room_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/hostel_room_master"><i class="zmdi zmdi-hotel"></i>Room Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='block_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/hostel_block_master"><i class="zmdi zmdi-border-all"></i>Block Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='room_allotment')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/room_allotment_master"><i aria-hidden="true" class="fa fa-calendar-check-o"></i>Room allotment</a></li>
        </ul>
      </li>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='pg_details')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i aria-hidden="true" class="fa fa-home"></i>
          <span>PG Details</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='owner_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/PG_owner_master"><i aria-hidden="true" class="fa fa-id-badge"></i>Owner's Detail</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='pg_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/PG_detail_master"><i class="ti-home"></i>&nbsp;PG Details</a></li>
        </ul>
      </li>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='tifin_details')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i aria-hidden="true" class="fa fa-cutlery"></i>
           <span>Tiffin Details</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='source_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Tifin_source_master"><i class="zmdi zmdi-assignment-returned"></i>Source Details</a></li>
          
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='attendance_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Tifin_attendance_master"><i class="zmdi zmdi-assignment-o"></i>Daily Attendance</a></li>
        
        </ul>
       </li>
     <li class="<?php
                      if(isset($web_menu) && $web_menu=='hostel_bill')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-receipt"></i>
          <span>Hostel Bills</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='student_bill')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/student_fees_master"><i class="zmdi zmdi-collection-item-2"></i>Student Fees</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='messcard_bill')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/messcard_bill_master"><i class="zmdi zmdi-collection-item-4"></i>Messcard Bills</a></li>
        </ul>
      </li>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='pg_bill')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
           <i aria-hidden="true" class="fa fa-clone"></i>
           <span>PG Bills</span>
           <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='package_bill')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/client_bill_master"><i class="zmdi zmdi-collection-text"></i>Client Bills</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='tiffin_bill')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Tiffin_bill_master"><i class="zmdi zmdi-collection-text"></i>Tiffin Bills</a></li>
        </ul>
      </li>
   
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='extra')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
           <i aria-hidden="true" class="fa fa-map-marker"></i>
           <span>Manage Locations</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='country_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Country_master"><i class="zmdi zmdi-local-airport"></i>Country Details</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='state_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/State_master"><i class="zmdi zmdi-local-taxi"></i>State Details</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='city_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/City_master"><i class="zmdi zmdi-navigation"></i>City Details</a></li>
        </ul>
      </li>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='others')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
           <i aria-hidden="true" class="fa fa-envelope-open"></i>
           <span>Others</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='feedback')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Feedback"><i aria-hidden="true" class="fa fa-check-square"></i>Feedback</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='complaint')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Complaint"><i aria-hidden="true" class="fa fa-check-square"></i>Complaint</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='visiting')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/visiting"><i aria-hidden="true" class="fa fa-check-square"></i>Visiting Appointment</a></li>
        </ul>
      </li>
<?php      
    }
    elseif($_SESSION['logged_in']['admin_type'] == "hostel_admin")
    {
?>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='hostel_details')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i aria-hidden="true" class="fa fa-building-o"></i>
          <span>Hostel Details</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='hostel_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/hostel_master"><i class="zmdi zmdi-balance"></i>Hostel Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='employee_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/employee_master"><i class="zmdi zmdi-assignment-account"></i>Employee Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='student_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/student_master"><i class="zmdi zmdi-accounts-outline"></i>Student Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='room_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/hostel_room_master"><i class="zmdi zmdi-hotel"></i>Room Details</a></li>
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='block_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/hostel_block_master"><i class="zmdi zmdi-border-all"></i>Block Details</a></li>
        <!--  -->
        <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='room_allotment')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/room_allotment_master"><i aria-hidden="true" class="fa fa-calendar-check-o"></i>Room allotment</a></li>
   
        </ul>
      </li>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='hostel_bill')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-receipt"></i>
          <span>Hostel Bills</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='student_bill')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/student_fees_master"><i class="zmdi zmdi-collection-item-2"></i>Student Fees</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='messcard_bill')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/messcard_bill_master"><i class="zmdi zmdi-collection-item-4"></i>Messcard Bills</a></li>
        </ul>
      </li>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='others')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
           <i aria-hidden="true" class="fa fa-envelope-open"></i>
           <span>Others</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='feedback')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Feedback"><i aria-hidden="true" class="fa fa-check-square"></i>Feedback</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='complaint')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Complaint"><i aria-hidden="true" class="fa fa-check-square"></i>Complaint</a></li>
                  <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='visiting')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/visiting"><i aria-hidden="true" class="fa fa-check-square"></i>Visiting Appointment</a></li>
        </ul>
      </li>
<?php
    }
    elseif($_SESSION['logged_in']['admin_type'] == "pg_admin")
    {
?>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='pg_details')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i aria-hidden="true" class="fa fa-home"></i>
          <span>PG Details</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='owner_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/PG_owner_master"><i aria-hidden="true" class="fa fa-id-badge"></i>Owner's Detail</a></li>
          
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='pg_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/PG_detail_master"><i class="ti-home"></i>&nbsp;PG Details</a></li>
          
        </ul>
      </li>
      <li class="<?php
                      if(isset($web_menu) && $web_menu=='tifin_details')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
          <i aria-hidden="true" class="fa fa-cutlery"></i>
           <span>Tiffin Details</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='source_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Tifin_source_master"><i class="zmdi zmdi-assignment-returned"></i>Source Details</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='customer_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/customer_master"><i class="zmdi zmdi-accounts-alt"></i>Customer's Detail</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='attendance_details')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Tifin_attendance_master"><i class="zmdi zmdi-assignment-o"></i>Daily Attendance</a></li>
          
        </ul>
       </li>
       <li class="<?php
                      if(isset($web_menu) && $web_menu=='pg_bill')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
           <i aria-hidden="true" class="fa fa-clone"></i>
           <span>PG Bills</span>
           <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='package_bill')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/client_bill_master"><i class="zmdi zmdi-collection-text"></i>Client Bills</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='tiffin_bill')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Tiffin_bill_master"><i class="zmdi zmdi-collection-text"></i>Tiffin Bills</a></li>
        </ul>


      </li>
     <li class="<?php
                      if(isset($web_menu) && $web_menu=='others')
                      {
                        echo 'active';
                      }
                  ?>">
        <a href="javaScript:void();" class="waves-effect">
           <i aria-hidden="true" class="fa fa-envelope-open"></i>
           <span>Others</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='feedback')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Feedback"><i aria-hidden="true" class="fa fa-check-square"></i>Feedback</a></li>
          <li class="<?php
                      if(isset($web_submenu) && $web_submenu=='complaint')
                      {
                        echo 'active';
                      }
                  ?>"><a href="<?php echo site_url(); ?>/admin/Complaint"><i aria-hidden="true" class="fa fa-check-square"></i>Complaint</a></li>
        </ul>
      </li>
<?php      
    }
?>
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <div id="member-timer"></div>
    </li>
   </ul>
</nav>
    <section>
      <a href="javascript:;" id="return-to-top" style="display: none;"><i class="fa fa-angle-double-up"></i></a>
    </section>
</header>
<!--End topbar header-->
 <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  
  <!-- simplebar js -->
  <script src="<?php echo base_url(); ?>plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="<?php echo base_url(); ?>js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="<?php echo base_url(); ?>js/app-script.js"></script>
  <!--Sweet Alerts -->
  <script src="<?php echo base_url(); ?>plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/alerts-boxes/js/sweet-alert-script.js"></script> 

  <!--Data Tables js-->
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/fancybox/js/jquery.fancybox.min.js"></script>
  <!--Bootstrap Datepicker Js-->
  <script src="<?php echo base_url(); ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <!--notification js -->
  <script src="<?php echo base_url(); ?>plugins/notifications/js/lobibox.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/notifications/js/notifications.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/notifications/js/notification-custom-script.js"></script>

    <!--Select Plugins Js-->
    <script src="<?php echo base_url(); ?>plugins/select2/js/select2.min.js"></script>
    <!--Inputtags Js-->
    <script src="<?php echo base_url(); ?>plugins/inputtags/js/bootstrap-tagsinput.js"></script>

    <!--Multi Select Js-->
    <script src="<?php echo base_url(); ?>plugins/jquery-multi-select/jquery.multi-select.js"></script>
    <script src="<?php echo base_url(); ?>plugins/jquery-multi-select/jquery.quicksearch.js"></script>
    <script>
     
      $('#default-datepicker').datepicker({
        todayHighlight: true
      });
      $('#autoclose-datepicker').datepicker({
        autoclose: true,
        todayHighlight: true
      });

      $('#inline-datepicker').datepicker({
         todayHighlight: true
      });

      $('#dateragne-picker .input-daterange').datepicker({
       });

    </script>

  <script>
     $(document).ready(function() {
      var tb=$('#tableEx').DataTable();

      $('.single-select').select2();
      
            $('.multiple-select').select2();

        //multiselect start

            $('#my_multi_select1').multiSelect();
            $('#my_multi_select2').multiSelect({
                selectableOptgroup: true
            });

            $('#my_multi_select3').multiSelect({
                selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                afterInit: function (ms) {
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function () {
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });

         $('.custom-header').multiSelect({
              selectableHeader: "<div class='custom-header'>Selectable items</div>",
              selectionHeader: "<div class='custom-header'>Selection items</div>",
              selectableFooter: "<div class='custom-header'>Selectable footer</div>",
              selectionFooter: "<div class='custom-header'>Selection footer</div>"
            });


    });
    </script>
  <!-- Index js -->
  <script src="<?php echo base_url(); ?>js/index.js"></script>


