<!DOCTYPE html>
<html>
<head>
	<title>My Bookings - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<div id="main-wrapper">
		<?php include "header.php"; ?>
		<!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(<?php echo base_url(); ?>images/booking.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title text-uppercase">My Bookings</h1>
                    <ul class="page-breadcrumb">
                        <li class="text-uppercase"><a href="<?php echo site_url(); ?>/user/user_site">Home</a></li>
                        <li class="active text-uppercase">My Bookings</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->
			<div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
				<div class="container">
					<div class="row table-responsive-sm">
						<?php
							if (isset($hostel)) 
							{
								$c = 0;
								foreach ($hostel as $d) 
								{
									$c++;
								?>
						<table class="table table-bordered" style="border-bottom:2px solid #dee2e6">
							<?php 
						if($this->session->flashdata("cancel")){
					 ?> 
					 <div class="alert alert-success col-md-12 col-12 text-uppercase text-center">  
					 	<?php echo $this->session->flashdata("cancel"); ?>
					 </div>
					<?php } ?>
						<?php 
						if($this->session->flashdata("tiffin")){
					 ?> 
					 <div class="alert alert-success col-md-12 col-12 text-uppercase text-center">  
					 	<?php echo $this->session->flashdata("tiffin"); ?>
					 </div>
					<?php } ?>
								<thead>
									<tr>
										<th>Booking Number</th>
										<th>Name</th>
										<th>Hostel Name</th>
										<th>Amount</th>
										<th>Transaction ID</th>
										<th>Booking date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										
										<td><?php echo $c; ?></td>
										<td><?php echo $d->reg_name; ?></td>
										<?php 
											if(isset($hostel_name))
											{
												foreach ($hostel_name as $s)
												{
										 ?>
										<td><?php echo $s->hostel_name; ?></td>
									<?php }} ?>
										<td><?php echo $d->hostel_amount; ?></td>
										<td><?php echo $d->hostel_transaction_id; ?></td>
										<td><?php echo $d->hostel_booking_date; ?></td>
										<td>
											<a href="<?php echo site_url(); ?>/user/mybookings/cancel_hostel?id=<?php echo base64_encode($d->reg_id); ?>" class="btn btn-light">Cancel</a>
										</td>
										<?php		
												}
											}
											else
											{
										?>
										<div class="alert alert-danger">
											 There is no record of hostel booking.
										</div>
									<?php } ?>
								</tbody>
							</div>
						</table>
						<?php 
							if(isset($pg))
							{
								$c=0;
								foreach ($pg as $d) {
									$c++;
						 ?>
						<table class="table table-bordered">
							<thead>
								<th>Booking Number</th>
								<th>Name</th>
								<th>Owner Name</th>
								<th>Amount</th>
								<th>Transaction ID</th>
								<th>Booking date</th>
								<th>Action</th>
							</thead>

							<tbody>
								<td><?php echo $c; ?></td>
										<td><?php echo $d->reg_name; ?></td>
										<td><?php echo $d->landlord_name; ?></td>
										<td><?php echo $d->pg_amount; ?></td>
										<td><?php echo $d->pg_transaction_id; ?></td>
										<td><?php echo $d->pg_booking_date; ?></td>
										<td>
											<a href="<?php echo site_url(); ?>/user/mybookings/cancel_pg?id=<?php echo base64_encode($d->reg_id); ?>" class="btn btn-light">Cancel</a>
										</td>
									</tr>
									<?php		
												}
											}
											
										?>
							</tbody>
						</table>
						<?php  
							if (isset($tiffin)) 
							{
								$c=0;
								foreach ($tiffin as $r) 
								{	
									$c++;
						?>			
						<table class="table table-bordered" style="border-bottom:2px solid #dee2e6">
							<thead>
								<tr>
									<th>Tiffin No</th>
									<th>Meal Time</th>
									<th>Type</th>
									<th>Duration</th>
									<th>Days Of Week</th>
									<th>Tiffin Quntity</th>
									<th>Starting Date</th>
									<th>Total Amount</th>
									<th>Transection ID</th>
									<th>Action</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td><?php echo $c; ?></td>
									<td><?php echo $r->meal_time; ?></td>
									<td><?php echo $r->meal_type; ?></td>
									<td><?php echo $r->meal_duration; ?></td>
									<td><?php echo $r->meal_week; ?></td>
									<td><?php echo $r->meal_qty; ?></td>
									<td><?php echo $r->meal_date; ?></td>
									<td><?php echo $r->meal_amount; ?></td>
									<td><?php echo $r->meal_transaction_id; ?></td>
									<td>
										<a href="<?php echo site_url(); ?>/user/mybookings/cancel_tiffin?id=<?php echo base64_encode($r->reg_id); ?>" class="btn btn-light">Cancel</a>
									</td>
								</tr>
							</tbody>
						</table>
						<?php			
								}
							}	
						?>
					</div>
				</div>
			</div>
	</div> <!-- end main wrapper -->
	<?php include "footer.php"; ?>
	<?php include "scripts.php"; ?>
</body>
</html>