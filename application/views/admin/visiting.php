<!DOCTYPE html>
<html>
<head>
	<title>Appointments | Dormitory Tracker</title>
</head>
<body>
<div id="wrapper">
		<?php include 'header.php'; ?>
		<div class="clearfix"></div>
  		<div class="content-wrapper animated fadeIn">
		    <div class="container-fluid">
		      <!-- Breadcrumb-->
		     	<div class="row pt-2 pb-2">
		        	<div class="col-sm-9">
				    	<h4 class="page-title text-danger">Appointment Details</h4>
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
            <div class="card-header text-uppercase">Total number of Appointments :</div>
             <div class="card-body">
               <?php 
                  if($this->session->flashdata("del"))
                  {
               ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <div class="alert-icon">
                   <i class="fa fa-check"></i>
                  </div>
                  <div class="alert-message">
                        <?php echo $this->session->flashdata("del"); ?>
                  </div>
              </div>
            <?php } ?>
        		<div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Visitor Name</th>
                    <th scope="col">Visitor Relation</th>
                    <th scope="col">Visitor Date</th>
                    <th scope="col">Visitor Time</th>
                    <th scope="col">Visitor Number</th>
                    <th scope="col">Hostel Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $c=1;
                      foreach ($hostel as $s)
                      {
                   ?>
                  <tr>
                      <td><?php echo $c++; ?></td>
                      <td><?php echo $s->visitor_name; ?></td>
                      <td><?php echo $s->visitor_relation; ?></td>
                      <td><?php echo $s->visitor_date; ?></td>
                      <td><?php echo $s->visitor_time; ?></td>
                      <td><?php echo $s->visitor_unique_no; ?></td>
                      <td><?php echo $s->hostel_name;  ?></td>
                      <td>
                         <a href="<?php echo site_url(); ?>/admin/visiting/deleteVisit?id=<?php echo $s->visitor_id; ?>" class="btn btn-outline-primary">Delete</a>
                      </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
             </div>
          </div>
        </div>
      </div><!--End Row-->
    </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->
  </div><!--End wrapper-->
	</div>
</body>
</html>