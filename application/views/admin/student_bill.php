<!DOCTYPE html>
<html>
<head>
	<title>Student Bill | Dormitory Tracker</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/user/bootstrap2.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<?php 
					if (isset($data))
					{
						foreach ($data as $s)
						{
				 ?>
			</div>
			<img src="<?php echo base_url('images/bill_logo/logoforbill.png'); ?>" 
     style="display: block; margin-left: auto;">

		<?php }} ?>
		</div>

		  <div class="row">
		    <div class="col-xs-5">
		      <div class="panel panel-default">
		              <div class="panel-heading">
		                <h4>From : 
		                <a href="#">
		                	<?php 
		                		if(isset($hostel))
		                		{
		                			foreach ($hostel as $s)
		                			{
		                	 ?>	
		                	 <?php echo $s->hostel_name; ?>
		                </a>
		            </h4>
		        
		              </div>
		              <div class="panel-body">
		                <p>
		                 <?php echo $s->hostel_address; ?>
		                </p>
		                <p><?php echo $s->hostel_pincode; ?></p>
		              </div>
		            </div>
		            <?php }} ?>
		    </div>
		    <div class="col-xs-5 col-xs-offset-2 text-right">
		      <div class="panel panel-default">
		              <div class="panel-heading">
		                <h4>To : 
		                	<a href="#">
		                		<?php 
		                			if(isset($reg))
		                			{
		                				foreach ($reg as $s)
		                				{
		                				
		                		 ?>
		                	</a>
		                	<?php echo $s->reg_name; ?>
		                </h4>
		              </div>
		              <div class="panel-body">
		                <p>
		                 	<?php echo $s->reg_email; ?>
		                </p>
		                <p><?php echo $s->reg_mobile; ?></p>
		              </div>
		            </div>
		        <?php }} ?>
		    </div>
		  </div> <!-- / end client details section -->

		         <table class="table table-bordered">
        <thead>
          <tr>
            <th><h4>Bill No</h4></th>
            <th><h4>Description</h4></th>
            <th><h4>Bill Date</h4></th>
            <th><h4>Bill Due Date</h4></th>
            <th><h4>Bill Status</h4></th>
            <th><h4>Bill Amount</h4></th>
          </tr>
        </thead>
        <tbody>
        	<?php 
        	if(isset($data))
        	{
	        	foreach ($data as $s)
	        	{
        	?>
          	<tr>
          		<td><?php echo $s->bill_no; ?></td>	
          		<td><?php echo $s->bill_details; ?></td>
          		<td><?php echo $s->bill_date; ?></td>
          		<td><?php echo $s->bill_due_date; ?></td>
          		<td><?php echo $s->bill_status; ?></td>
          		<td><?php echo $s->bill_amount; ?></td>
          	</tr>
          <?php }} ?>
        </tbody>
      </table>

		
		<div class="row">
		  
		  <div class="col-xs-7">
		   <div class="span7">
			  <div class="panel panel-info">
			    <div class="panel-heading">
			      <h4>Contact Details</h4>
			    </div>
			    <div class="panel-body">
			      <p>
			        Email : dormitorytracker@gmail.com<br><br>
			        Mobile : +91 9834939003<br> <br>
			      </p>
			    </div>
			  </div>
			</div>
		  </div>
		  
		</div>
		<div>
		  	<button class="btn btn-primary" onclick="window.print();">Print</button>
		</div>
	</div>
</body>
</html>