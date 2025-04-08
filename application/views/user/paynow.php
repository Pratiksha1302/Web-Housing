<!DOCTYPE html>
<html>
<head>
	<title>Paynow - Dormitory Tracker</title>
	<?php include "links.php"; ?>
</head>
<body>
	<div id="main-wrapper">
		<?php include "header.php"; ?>
			<div class="property-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
				<div class="d-flex justify-content-center align-items-center container">
					<div class="row">
						<div class="col-lg-12 col-12 col-md-12 order-1 mb-sm-50 mb-xs-50 mt-3">
							<div class="card">
								<div class="card-header text-center" style="background-color: white">
									<h1 class="text-danger text-uppercase">Payment Details</h1>
								</div>
								<div class="card-body" style="font-size: 18px">
									<div class="table-responsive">
									<table class="table table-responsive">
										<tr>
											<td><label class="text-uppercase"><b>Your Name</b></label></td>
											<td class="text-uppercase"><label class="text-primary">
												<?php 
													if(isset($reg_data))
													{
														foreach ($reg_data as $r) {
												 ?>
												 <?php echo $r->reg_name; ?>
												</label>
											</td>
										</tr>
										<?php }} ?>

										<tr>
											<td><label class="text-uppercase"><b>Your Email</b></label></td>
											<td class="">
												<label class="text-primary">
													<?php 
													if (isset($reg_data)){
														foreach ($reg_data as $r){
												 	?>
												 	<?php echo $r->reg_email; ?>
												</label>
											</td>
										</tr>
										<?php }} ?>

										<tr>
											<td><label class="text-uppercase"><b>Whom you pay</b></label></td>
											<td>
												<label class="text-primary text-uppercase">
													<?php 
													if (isset($hostel_data)){
														foreach ($hostel_data as $r){
											 		?>
												 	<?php echo $r->hostel_name; ?>
												</label>
									
											</td>
										</tr>
										<?php }} ?>

										<tr>
											<td><label class="text-uppercase"><b>Total Amount</b></label></td>
											<td>
												<label class="text-primary"><i class="fas fa-rupee-sign"></i>
													<?php if (isset($hostel_data)) {
															foreach ($hostel_data as $r){
													?>
													<?php echo $r->hostel_rent; ?>
												</label>
												<?php }} ?>
											</td>
										</tr>
									</table>	
									</div>
									<?php if(isset($hostel_data)){
										foreach ($hostel_data as $r) {
									 ?>
									<div>
										<a href="<?php echo site_url(); ?>/user/user_site/hostelinsert?id=<?php echo $r->hostel_id; ?>"></a> <?php }} ?>
										<?php

	$MERCHANT_KEY = "gtKFFx";
	$SALT = "eCwWELxi";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
foreach ($reg_data as $r){
	$name=$r->reg_name;
	$email=$r->reg_email;
	$phone=$r->reg_mobile;
}

foreach ($hostel_data as $r){
	$hostel_name=$r->hostel_name;
	$rent=$r->hostel_rent;
}
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

$hash_string = $MERCHANT_KEY."|".$txnid."|".$rent."|".$hostel_name."|".$name."|".$email."|||||||||||".$SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = "https://test.payu.in/_payment";

?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

   
   
       <input type="hidden" name="amount" value="<?php echo $rent;?>" />
	   <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" />
		<input type="hidden" name="email" id="email" value="<?php echo $email;?>" />
		<input type="hidden" name="phone" value="<?php echo $phone; ?>" />
       
		<input type="hidden" name="productinfo" value="<?php echo $hostel_name; ?>" />
	  
   
   
   
   
	<input name="surl" type="hidden" value="<?php echo base_url();?>user/user_site/hostelinsert"  />	
	<input name="furl" type="hidden" value="<?php echo base_url();?>user/user_site"  />					
								
								
							
								
                         <input class="btn btn-success btn-lg" type="submit" name="PayNow" value="PayNow"> </form>
									</div> <!-- button over -->
								</div> <!-- body over -->
							</div> <!-- card div -->
						</div> <!-- col div -->
					</div> <!-- row div -->
				</div> <!-- iner div -->
			</div> <!-- main div -->
	</div>
<?php include "footer.php"; ?>
<?php include "scripts.php"; ?>
</body>
</html>