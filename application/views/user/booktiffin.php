<!DOCTYPE html>
<html>
<head>
	<title>Book Tiffin - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<div id="main-wrapper">
		<?php include "header.php"; ?>
			<!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url(<?php echo base_url(); ?>images/food.jpg);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title text-uppercase">Tiffin services</h1>
                    <ul class="page-breadcrumb">
                        <li class="text-uppercase"><a href="<?php echo site_url(); ?>/user/user_site">Home</a></li>
                        <li class="active text-uppercase">tifiin services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <div class="service-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
     	<div class="container">
     		<div class="row">
     			<div class="col-12 col-md-12 col-lg-12">
     				<div class="card border-primary">
						<div class="card-header text-uppercase text-center bg-transparent text-danger" style="font-size: 20px;">How are Meal Tiffins priced?</div>
					  	
					  	<div class="card-body">
					    	<p>
					    		Lunches are priced to be extremely affordable for their quality and quantity, because we know they are your daily meals :<br>
					    		<div class="table-responsive">
						    		<table class="table table-bordered text-uppercase text-center mb-2" style="border-radius: 5px;width: 50%;margin: 0px auto;float: none;">
						    			<thead>
						    				<th>Type</th>
						    				<th>Price</th>
						    			</thead>

						    			<tbody>
						    				<tr>
						    					<td>Veg</td>
						    					<td><i class="fas fa-rupee-sign"></i> 80</td>
						    				</tr>	
						    				<tr>
						    					<td>Non-Veg</td>
						    					<td><i class="fas fa-rupee-sign"></i> 90</td>
						    				</tr>		
						    			</tbody>

						    			<tfoot>
						    				<th>Type</th>
						    				<th>Price</th>
						    			</tfoot>
						    		</table>
						    	</div>
					    		The total price of your meal plan (not inclusive of delivery charges) is indicated below each icon in Red. We calculate this on a weekly basis taking into account public holidays, etc. so that you always pay for exactly how many tiffins you get and you can always calculate this at any time.
					    	</p>
					 	</div>
					</div> <!-- card over -->
     			</div> <!-- col over -->
     		</div> <!-- row over -->

     		<div class="row mt-3">
     			<div class="col-12 col-md-12">
     				<div class="card border-primary">
						<div class="card-header text-uppercase text-center bg-transparent text-danger" style="font-size: 20px;">How much is the delivery charge?</div>
					  	
					  	<div class="card-body">
					    	<p>
					    		We relies on the fail-safe Association to deliver its lunch tiffins, for which customers pay the standard delivery fee. This fee is additional to the cost of the us! Meals and will be added to your bill so you just have to make one payment- Convenient! <br>
					    		<div class="table-responsive">
									<table class="table text-center table-bordered text-uppercase" style="border-radius: 5px;width: 50%;margin: 0px auto;float: none;">
										<thead>
											<th>Duration</th>
											<th>Days</th>
											<th>Amount</th>
										</thead>

										<tbody>
											<tr>
												<td>1 Week</td>
												<td>5 Days</td>
												<td><i class="fas fa-rupee-sign"></i> &nbsp;150</td>
											</tr>
											<tr>
												<td>1 Week</td>
												<td>6 Days</td>
												<td><i class="fas fa-rupee-sign"></i> &nbsp;180</td>
											</tr>
											<tr>
												<td>1 Month</td>
												<td>5 Days</td>
												<td><i class="fas fa-rupee-sign"></i> &nbsp;600</td>
											</tr>
											<tr>
												<td>1 Month</td>
												<td>6 Days</td>
												<td><i class="fas fa-rupee-sign"></i> &nbsp;720</td>
											</tr>
											<tr>
												<td>3 Month</td>
												<td>5 Days</td>
												<td><i class="fas fa-rupee-sign"></i> &nbsp;1800</td>
											</tr>
											<tr>
												<td>3 Month</td>
												<td>6 Days</td>
												<td><i class="fas fa-rupee-sign"></i> &nbsp;2160</td>
											</tr>	
										</tbody>

										<tfoot>
											<th>Duration</th>
											<th>Days</th>
											<th>Amount</th>
										</tfoot>
									</table>
								</div>
					    	</p>
					 	</div>
					</div> <!-- card over -->
     			</div> <!-- col over -->
     		</div> <!-- row over -->

     		<div class="row mt-3">
     			<div class="col-12 col-md-12 col-lg-12">
     				<div class="card border-primary">
						<div class="card-header text-uppercase text-center bg-transparent text-danger" style="font-size: 20px;">What are order placing and cancellation timings?</div>
					  	
					  	<div class="card-body">
					  		<div class="table-responsive">
						    	<table class="table table-bordered col-md-6" style="border-radius: 5px;width: 50%;margin: 0px auto;float: none;">
						    		<thead class="text-uppercase text-center">
						    			<th>Meal Type</th>
						    			<th>Order Time</th>
						    			<th>Cancellation Time</th>
						    		</thead>

						    		<tbody class="text-uppercase text-center">
						    			<tr>
						    				<td>Lunch</td>
						    				<td>One day before by 8 PM</td>
						    				<td>One day before by 8 PM</td>
						    			</tr>

						    			<tr>
						    				<td>Dinner</td>
						    				<td>Same day before by 10 AM</td>
						    				<td>Same day before by 10 AM</td>
						    			</tr>
						    		</tbody>

						    		<tfoot class="text-center text-uppercase">
						    			<th>Meal Type</th>
						    			<th>Order Time</th>
						    			<th>Cancellation Time</th>
						    		</tfoot>
						    	</table>
						    </div>
					 	</div>
					</div> <!-- card over -->
     			</div> <!-- col over -->
     		</div> <!-- row over -->
     	</div>
    </div>

    <?php 
     	if(isset($_SESSION['user']) && $_SESSION['user'])
        {
    ?>
    <div class="search-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            <div class="row">
            <div class="col-md-4 text-white text-center" style="background-image: linear-gradient(to left bottom, #051937, #004d7a, #008793);">
                <div class="">
                    <div class="card-body">
                        <img class="mb-4" src="http://localhost/WebHousing/images/food1.png" style="width:40%;">
                        <h2 class="" style="color: white"><b>FIND YOUR BEST MEALS HERE</b></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-8 p-5 border">
            	<?php 
						if($this->session->flashdata("fail")){
					 ?> 
					 <div class="alert alert-success col-md-12 col-12 text-uppercase text-center">  
					 	<?php echo $this->session->flashdata("fail"); ?>
					 </div>
					<?php } ?>
                <form method="post" action="<?php echo site_url(); ?>/user/booktiffin/find">
                	<?php 
						if($this->session->flashdata("tiffin")){
					 ?> 
					 <div class="alert alert-success col-md-12 col-12 text-uppercase text-center">  
					 	<?php echo $this->session->flashdata("tiffin"); ?>
					 </div>
					<?php } ?>
                    <div class="form-row">
                        <div class="input-group mb-3 col-md-6">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
						  	</div>
						  	<?php 
						  		if(isset($reg))
						  		{
						  			foreach ($reg as $s)
						  			{
						  	 ?>
						  	<input type="text" value="<?php echo $s->reg_name; ?>" class="form-control" name="cust_name" placeholder="Name" style="box-shadow: none" required>
						  <?php }} ?>
						</div>
                        <div class="form-group col-md-6">
                         	<select name="meal_time" class="form-control" style="box-shadow: none" id="meal_time">
                         		<option value="-1">Select Meal time</option>
                         		<option value="Lunch">Lunch</option>
                         		<option value="Dinner">Dinner</option>
                         		<option value="Both">Both</option>
                         	</select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select name="meal_type" class="form-control" style="box-shadow: none" id="meal_type">
                         		<option value="-1">Select Meal type</option>
                         		<option value="Veg">Veg</option>
                         		<option value="Non-veg">Non-veg</option>
                         	</select>
                        </div>
                        
                        <div class="form-group col-md-6">
                           <select name="meal_duration" class="form-control" style="box-shadow: none" id="meal_duration">
                         		<option value="-1">Select Meal duration</option>
                         		<option value="3 days">3 days</option>
                         		<option value="1 week">1 week</option>
                         		<option value="1 month">1 month</option>
                         		<option value="3 month">3 month</option>
                         	</select>
                        </div>    
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select name="meal_week" class="form-control" style="box-shadow: none" id="meal_week">
                         		<option value="-1">Select Meals per week</option>
                         		<option value="5">Mon-Fri</option>
                         		<option value="6">Mon-Sat</option>
                         	</select>
                        </div>
                        
                        <div class="form-group col-md-6">
                           <select name="meal_qty" class="form-control" style="box-shadow: none" id="meal_qty">
                         		<option value="-1">Select Meal Quantity</option>
                         		<option value="1">1</option>
                         		<option value="2">2</option>
                         		<option value="3">3</option>
                         		<option value="4">4</option>
                         	</select>
                        </div>    
                    </div>

                    <div class="form-row">
                        <div class="input-group mb-3 col-md-6">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-week"></i></span>
						  	</div>
						  	<input type="date" class="form-control" name="meal_date" style="box-shadow: none" required id="meal_date">
						</div>

						<div class="input-group mb-3 col-md-6">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text" id="basic-addon1"><i class="fas fa-rupee-sign"></i></span>
						  	</div>
						  	<input type="text" class="form-control" name="meal_rate" placeholder="Total Meal Amount" style="box-shadow: none" readonly id="meal_rate">
						</div>
						<p class="mb-2 text-muted">NOTE : Total amount has included with all texes + Delivery charges extra.</p>
                    </div>
                    <?php 
                    	if(isset($reg))
                    	{
                    		foreach ($reg as $s)
                    		{
                     ?>
                        <button type="submit" name="booktiffin" class="btn btn-primary btn-block btn-lg">Book Now</button>
                      <?php }} ?>
                    </form>
               </div>
               <?php } ?> 
            </div>
        </div>
        </div>
	<?php include "footer.php" ?> 
	</div> <!-- wrapper over -->
	<?php include "scripts.php"; ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('change','#meal_qty',function()
            {
                var meal_qty = $(this).val();
                if(meal_qty == "-1")
                {
                	alert('please provide all required fileds value');
                }
                else
                {
                	var meal_time = $('#meal_time').val();
                	var meal_type = $('#meal_type').val();
                	var meal_duration = $('#meal_duration').val();
                	var meal_week = $('#meal_week').val();

                	if (meal_time == "-1" && meal_type == "-1" && meal_duration == "-1" && meal_week == "-1") 
                	{
                		alert('please provide all required fileds value');
                	}
                	else
                	{
                		var both = 2;
                		var veg = 80;
                		var nonveg = 90;
                		var day_3 = 3;
                		var week_1 = 1; 
                		var month_1 = 4;
                		var month_3 = 12;
                		if( meal_type == "Veg")
                		{
                			if((meal_time == "Lunch"|| meal_time == "Dinner")  && meal_duration == "3 days")
                			{
                				$('#meal_rate').val(veg * meal_qty * day_3);	
                			}
                			else if((meal_time == "Lunch"|| meal_time == "Dinner") && meal_duration == "1 week")
                			{
                				$('#meal_rate').val(veg * meal_qty * meal_week);	
                			}
                			else if((meal_time == "Lunch"|| meal_time == "Dinner") && meal_duration == "1 month")
                			{
                				$('#meal_rate').val(veg * meal_qty * meal_week * month_1);	
                			}
                			else if((meal_time == "Lunch"|| meal_time == "Dinner") && meal_duration == "3 month")
                			{
                				$('#meal_rate').val(both * veg * meal_qty * meal_week * month_3);	
                			}
                			else if(meal_time == "Both" && meal_duration == "3 days")
                			{
                				$('#meal_rate').val(both * veg * meal_qty * day_3);	
                			}
                			else if(meal_time == "Both" && meal_duration == "1 week")
                			{
                				$('#meal_rate').val(both * veg * meal_qty * meal_week);	
                			}
                			else if(meal_time == "Both" && meal_duration == "1 month")
                			{
                				$('#meal_rate').val(both * veg * meal_qty * meal_week * month_1);	
                			}
                			else if(meal_time == "Both" && meal_duration == "3 month")
                			{
                				$('#meal_rate').val(both * veg * meal_qty * meal_week * month_3);	
                			}
                			// $('#meal_rate').val(veg * meal_qty);
                		}
                		else
                		{
	                		if( meal_type == "Non-veg")
	                		{
	                			if((meal_time == "Lunch"|| meal_time == "Dinner")  && meal_duration == "3 days")
	                			{
	                				$('#meal_rate').val(nonveg * meal_qty * day_3);	
	                			}
	                			else if((meal_time == "Lunch"|| meal_time == "Dinner") && meal_duration == "1 week")
	                			{
	                				$('#meal_rate').val(nonveg * meal_qty * meal_week);	
	                			}
	                			else if((meal_time == "Lunch"|| meal_time == "Dinner") && meal_duration == "1 month")
	                			{
	                				$('#meal_rate').val(nonveg * meal_qty * meal_week * month_1);	
	                			}
	                			else if((meal_time == "Lunch"|| meal_time == "Dinner") && meal_duration == "3 month")
	                			{
	                				$('#meal_rate').val(both * nonveg * meal_qty * meal_week * month_3);	
	                			}
	                			else if(meal_time == "Both" && meal_duration == "3 days")
	                			{
	                				$('#meal_rate').val(both * nonveg * meal_qty * day_3);	
	                			}
	                			else if(meal_time == "Both" && meal_duration == "1 week")
	                			{
	                				$('#meal_rate').val(both * nonveg * meal_qty * meal_week);	
	                			}
	                			else if(meal_time == "Both" && meal_duration == "1 month")
	                			{
	                				$('#meal_rate').val(both * nonveg * meal_qty * meal_week * month_1);	
	                			}
	                			else if(meal_time == "Both" && meal_duration == "3 month")
	                			{
	                				$('#meal_rate').val(both * nonveg * meal_qty * meal_week * month_3);	
	                			}
	                		}	
                		}
                	}
                }
            });

		});
	</script>
</body>
</html>