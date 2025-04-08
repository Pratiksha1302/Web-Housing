<!DOCTYPE html>
<html>
<head>
	<title>Student Fees | Dormitory Tracker</title>
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
				    	<h4 class="page-title text-uppercase">Student Bills</h4>
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
<?php 
              if ($this->session->flashdata('success')) 
              {
            ?>
              <div class="alert alert-success alert-dismissible animated bounceIn" role="alert">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <div class="alert-icon contrast-alert">
                    <i class="fa fa-check"></i>
                  </div>
                <div class="alert-message">
                  <span><?php echo $this->session->flashdata('success'); ?></span>
                </div>
              </div>
          <?php } ?>
          <?php 
              if ($this->session->flashdata('edit')) 
              {
            ?>
             <div class="alert alert-info alert-dismissible animated bounceIn" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon contrast-alert">
                  <i class="fa fa-bell"></i>
                </div>
                <div class="alert-message">
                  <span><?php echo $this->session->flashdata('edit'); ?></span>
                </div>
            </div>
          <?php } ?>
          <?php 
              if ($this->session->flashdata('del')) 
              {
            ?>
              <div class="alert alert-danger alert-dismissible animated bounceIn" role="alert" id="alertdel" >
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon contrast-alert">
                    <i class="fa fa-bell"></i>
                </div>
                <div class="alert-message">
                  <span><?php echo $this->session->flashdata('del'); ?></span>
                </div>
              </div>
          <?php } ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header text-uppercase">Manage Student Bills</div>

                 <div class="card-body">
            		    <form method="post" action="<?php echo site_url(); ?>/admin/Student_fees_master/insert_bill" enctype="multipart/form-data">
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
                              <label>Hostel Name</label>
                              <select class="form-control" name="hostel_id" id="hostel_id">
                                <option value="-1">Select Hostel </option>
                                  <?php  
                                          if (isset($hostel_data)) 
                                          {
                                            foreach ($hostel_data as $h) 
                                            {
                                        ?>
                                        <option value="<?php echo $h->hostel_id; ?>"><?php echo $h->hostel_name; ?></option>
                                        <?php
                                            }
                                          }
                                        ?>
                              </select>
                            </div>
                        </div>
                  
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label>Student Name</label>
                            <select class="form-control stud" name="reg_id" id="reg_id">
                                <option value="-1">Select Student Name</option>
                            </select>
                          </div>      
                        </div>
                      </div> 
                      <div class="row">
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label>Student Email</label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="zmdi zmdi-email"></i></span>
                              </div>
                              <input type="email" name="reg_email" id="reg_email" class="form-control" placeholder="Student Email" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label>Your Logo</label>
                            <div class="input-group mb-3">
                              <input type="file" name="bill_logo" id="bill_logo">
                            </div>
                          </div>
                        </div>
                      </div>
                    <table class="table table-bordered">
                        <thead class="text-uppercase">
                            <th>No</th>
                            <th>Reciept No</th>
                            <th>Booking Date</th>
                            <th>Bill Details</th>
                            <th>Total Payment</th>
                            
                        </thead>

                        <tbody>
                            <tr>
                              <td>1</td>
                              <td>
                                <?php $bill_no = "WH".rand(1,9999); ?>
                                <input type="text" name="bill_no" id="bill_no" class="form-control" value="<?php echo $bill_no; ?>" readonly>
                              </td>
                              <td><input type="text" name="bill_booking_date" id="bill_booking_date" class="form-control" readonly></td>
                              <td><input type="text" name="bill_details" id="bill_details" class="form-control"></td>
                              <td><input type="text" name="bill_amount" id="bill_amount" class="form-control" readonly></td>
                            </tr>
                        </tbody>
                    </table>

                    <div>
                        <input type="submit" name="bill_gen" id="bill_gen" value="Generate Bill" class="btn btn-outline-danger mt-3">
                        <!-- <button type="submit" name="bill_sent_mail" id="bill_sent_mail" class="btn btn-outline-primary mt-3">Send in Mail</button> -->
                    </div>
                    </form>
                 </div>
              </div>
            </div>
          </div><!--End Row-->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header text-uppercase">Students Bills</div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="tableEx">
                    <thead>
                      <tr>
                        <th>Reciept No</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Hostel name</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>View</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if (isset($bills)) 
                        {
                          foreach ($bills as $key) 
                          {
                      ?>
                      <tr>
                        <td><?php echo $key->bill_no;?></td>
                        <td><?php echo $key->bill_date;?></td>
                        <td><?php echo $key->reg_name;?></td>
                        <td><?php echo $key->hostel_name;?></td>
                        <td><?php echo $key->bill_amount;?></td>
                        <td><?php echo $key->bill_due_date;?></td>
                        <td>
                          <a href="<?php echo site_url(); ?>/admin/student_bill?id=<?php echo $key->bill_no; ?>" class="btn btn-outline-primary">View</a>
                        </td>
                      </tr>
                      <?php
                          }
                        }
                      ?>
                    </tbody>
                    <thead>
                      <tr>
                        <th>Reciept No</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Hostel name</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>View</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
          </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->

   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
</body>
</html>