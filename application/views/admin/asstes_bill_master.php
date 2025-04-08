<!DOCTYPE html>
<html>
<head>
	<title>Assets Bills | Dormitory Tracker</title>
</head>
<body>
<div id="wrapper">
		<?php include 'header.php'; ?>
		<!-- <div class="clearfix"></div> -->
  		<div class="content-wrapper animated fadeIn">
		    <div class="container-fluid">
		      <!-- Breadcrumb-->
		     	<div class="row pt-2 pb-2">
		        	<div class="col-sm-9">
				    	<h4 class="page-title">Manage Assets Bill</h4>
				    	<ol class="breadcrumb">
		            	<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin_panel/admin_master">Home</a></li>
		            	<li class="breadcrumb-item"><a href="#"></a></li>
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
            <div class="card-header text-uppercase">Manage Asstes Bill</div>
          
             <div class="card-body">
        		<form method="post" action="#">
        			<div class="row">
        				<div class="col-md-6 col-12">
        					<div class="form-group">
        						<label>Invoice Date</label>
        						<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="zmdi zmdi-calendar-check"></i></span>
								  </div>
								  <input type="date" class="form-control" name="bill_date" id="bill_date">
								</div>
        					</div>
        				</div>

        				<div class="col-md-6 col-12">
        					<div class="form-group">
        						<label>Due Date</label>
        						<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i class="zmdi zmdi-calendar-check"></i></span>
								  </div>
								  <input type="date" class="form-control" name="bill_due_date" id="bill_due_date">
								</div>
        					</div>
        				</div>
        			</div>

        			<div class="row">
        				<div class="col-md-6 col-12">
        					<div class="form-group">
        						<label>Sender Address</label>
        						<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i aria-hidden="true" class="fa fa-address-card"></i></span>
								  </div>
								  <textarea id="bill_sender_add" name="bill_sender_add" placeholder="Sender Address" class="form-control"></textarea>
								</div>
        					</div>
        				</div>

        				<div class="col-md-6 col-12">
        					<div class="form-group">
        						<label>Reciever Address</label>
        						<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text" id="basic-addon1"><i aria-hidden="true" class="fa fa-address-book-o"></i></span>
								  </div>
								  <textarea id="bill_reciever_add" name="bill_reciever_add" placeholder="Reciever Address" class="form-control"></textarea>
								</div>
        					</div>
        				</div>
        			</div>

        			<div class="row">
        				<div class="col-md-6 col-12">
        					<div class="form-group">
        						<label>Reciever Name</label>
        						<div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i aria-hidden="true" class="fa fa-user-circle-o"></i></span>
                                  </div>
                                 <input type="text" name="bill_re_name" id="bill_re_name" class="form-control" placeholder="Reciever Name">
                                </div>
        					</div>
                             <div class="form-group">
                                <label>Your Logo</label>
                                <input type="file" name="bill_logo" id="bill_logo">
                            </div>
        				</div>
                        
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Reciever Email</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="zmdi zmdi-email"></i></span>
                                  </div>
                                 <input type="email" name="bill_re_email" id="bill_re_email" class="form-control" placeholder="Reciever Email">
                                </div>
                            </div>
                        </div>

        			</div>

        			<table class="table table-bordered table-responsive">  
                        <thead>  
                            <th>No</th>  
                            <th>Product Name</th>  
                            <th>Quantity</th>  
                            <th>Price</th>  
                            <th>Discount</th>  
                            <th>Amount</th>  
                            <th><input type="button" name="addRow" value="Add Row" id="addRow" class="btn btn-primary"></th>  
                        </thead>  
                        <tbody class="detailRow">  
                            <tr>  
                                <td class="no">1</td>  
                                <td><input type="text" class="form-control" id="productname" name="productname[]"></td>  
                                <td><input type="text" class="form-control" id="quantity" name="quantity[]"></td>  
                                <td><input type="text" class="form-control" id="price" name="price[]"></td>  
                                <td><input type="text" class="form-control" id="discount" name="discount[]"></td>  
                                <td><input type="text" class="form-control" id="amount" name="amount[]"></td>  
                                <td><a href="#" class="remove btn btn-danger" id="removeRow">Remove Row</td>  
							</tr>  
						</tbody>  
								
						<tfoot class="text-uppercase">  
							<th>No</th>  
							<th>Product Name</th>  
							<th>Quantity</th>  
							<th>Price</th>  
							<th>Discount</th>  
							<th>Amount</th>  
						</tfoot>  
					</table>
					<div class="mt-3">
						<input type="submit" name="addAssetsBill" id="addAssetsBill" class="btn btn-outline-primary" value="Generate Bill">

						<input type="button" name="printBill" onclick="window.print();" id="printBill" class="btn btn-outline-danger" value="Print Bill">

					</div> 

					<div>
					</div> 
        		</form>	
            </div>

             </div>
          </div>
        </div>
      </div><!--End Row-->
    </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <!--End Back To Top Button-->
  </div><!--End wrapper-->
	</div>
</body>
</html>