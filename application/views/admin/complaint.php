<!DOCTYPE html>
<html>
<head>
	<title>Complaints | Dormitory Tracker</title>
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
				    	<h4 class="page-title text-danger">Complaint Details</h4>
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
            <div class="card-header text-uppercase">Total number of Complaints :</div>
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
                    <th scope="col">Complainter Name</th>
                    <th scope="col">Complaint Subject</th>
                    <th scope="col">Complaint Details</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      $c=0;
                      foreach ($complaint as $s)
                      {
                   ?>
                  <tr>
                      <td><?php echo $c+1; ?></td>
                      <td><?php echo $s->complaint_name; ?></td>
                      <td><?php echo $s->complaint_subject; ?></td>
                      <td><?php echo $s->complaint_details; ?></td>
                      <td>
                         <a href="<?php echo site_url(); ?>/admin/complaint/deleteComplaint?id=<?php echo $s->complaint_id; ?>" class="btn btn-outline-primary">Delete</a>
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