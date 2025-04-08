<!DOCTYPE html>
<?php
    
?>
<html>
<head>
	<title>Admin Dashbord - Dormitory Tracker</title>
</head>
<body>
	<div id="wrapper">
		<?php include 'header.php'; ?>
		<!-- <div class="clearfix"></div> -->
  		<div class="content-wrapper animated fadeIn">
		    <div class="container-fluid">

          <!-- dashboard content start -->
          <!-- row start -->
          <div class="row mt-3">
             <div class="col-12 col-lg-6 col-xl-3">
               <div class="card gradient-deepblue">
                 <div class="card-body">
                    <h5 class="text-white mb-0">
                      <?php
                      if (isset($total_hostels)) 
                      {
                        echo $total_hostels;
                      }
                      ?>
                      <span class="float-right">
                        <i class="fa fa-building-o"></i>
                      </span>
                    </h5>
                    <h3 class="mb-0 text-white small-font">Total Number of Hostels <span class="float-right"></span></h3>
                  </div>
               </div> 
             </div>
             <div class="col-12 col-lg-6 col-xl-3">
               <div class="card gradient-orange">
                 <div class="card-body">
                    <h5 class="text-white mb-0">
                      <?php 
                      if (isset($total_emp)) 
                      {
                        echo $total_emp;
                      }
                      ?>
                      <span class="float-right">
                        <i class="icon-user"></i>
                      </span>
                    </h5>
                    <h3 class="mb-0 text-white small-font">Total Number of Employees<span class="float-right"></span></h3>
                  </div>
               </div>
             </div>
             <div class="col-12 col-lg-6 col-xl-3">
               <div class="card gradient-ohhappiness">
                  <div class="card-body">
                    <h5 class="text-white mb-0">
                    <?php
                    if (isset($total_users)) 
                      {
                        echo $total_users;
                      }
                    ?> 
                      <span class="float-right">
                        <i class="fa fa-group"></i>
                      </span>
                    </h5>
                    <h3 class="mb-0 text-white small-font">Total Number of Users<span class="float-right"></span></h3>
                  </div>
               </div>
             </div>
             <div class="col-12 col-lg-6 col-xl-3">
               <div class="card gradient-ibiza">
                  <div class="card-body">
                    <h5 class="text-white mb-0">
                      <?php
                      if (isset($total_rooms)) 
                      {
                        echo $total_rooms;
                      }
                      ?>
                      <span class="float-right">
                        <i class="fa fa-home"></i>
                      </span>
                    </h5>
                    <h3 class="mb-0 text-white small-font">Total Number of Rooms<span class="float-right"></span></h3>
                  </div>
               </div>
             </div>
          </div>
          <!-- end row -->
		      
          <!-- Breadcrumb-->
		     	<div class="row pt-2 pb-2">
		        	<div class="col-sm-9">
				    	<h4 class="page-title text-danger text-uppercase"><i class="fa fa-building-o"></i>&nbsp;All Hostel Bookings details</h4>
				    	<ol class="breadcrumb">
		            	<li class="breadcrumb-item"><a href="<?php echo site_url(); ?>/admin/admin_panel">Home</a></li>
		            	<li class="breadcrumb-item"><a href="#"></a></li>
                  <?php 
                      // if (isset($_COOKIE['username'])) 
                      // {
                      //     echo $_COOKIE['username'];
                      // }
                  ?>
		         	</ol>
				</div>
				<div class="col-sm-3">
			       <div class="btn-group float-sm-right">
			       </div>
			    </div>
			   	</div>
			   </div>
		    <!-- End Breadcrumb-->
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header text-primary text-uppercase">Admin Details</div>             
              <div class="card-body">
                <div class="table-responsive">
                <table id="tableEx" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>User name</th>
                      <th>Hostel name</th>
                      <th>Amount</th>
                      <th>Booking date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  if (isset($hostel_booking_data)) 
                  {
                    $c = 0;
                    foreach ($hostel_booking_data as $key) 
                    {
                      $c++;
                  ?>
                  <tr>
                    <td><?php echo $c; ?></td>
                    <td><?php echo $key->reg_name; ?></td>
                    <td><?php echo $key->hostel_name; ?></td>
                    <td><?php echo $key->hostel_amount; ?></td>
                    <td><?php echo $key->hostel_booking_date; ?></td>
                  </tr>
                  <?php
                    }
                  }
                  ?>
                  </tbody>
                  <thead>
                    <th>No</th>
                      <th>User name</th>
                      <th>Hostel name</th>
                      <th>Amount</th>
                      <th>Booking date</th>
                  </thead>
              </table>
              </div>
              </div>
            </div>
          </div>
        </div><!-- End Row-->

    </div>
  </div><!--End wrapper-->

</body>
</html>

