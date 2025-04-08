<!DOCTYPE html>
<html>
<head>
	<title>Country Details | Dormitory Tracker</title>
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
				          	<h4 class="page-title">Country Details</h4>
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
              <div class="card-header text-primary">All Country Details</div>
              <div class="card-header">
                <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addCountrymodal"><i class="fa fa-plus"></i> Add New Country</button>
              </div>
              <?php 
                if ($this->session->flashdata('success')) 
                {
              ?>
              <div class="card-body">
                <div class="alert alert-outline-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                    <div class="alert-icon">
                      <i class="fa fa-check"></i>
                    </div>
                    <div class="alert-message">
                      <span><?php echo $this->session->flashdata('success'); ?></span>
                    </div>
                </div>
              </div>
            <?php } ?>
            <?php 
                if ($this->session->flashdata('edit')) 
                {
              ?>
              <div class="card-body">
                <div class="alert alert-outline-info alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                    <div class="alert-icon">
                      <i class="fa fa-check"></i>
                    </div>
                    <div class="alert-message">
                      <span><?php echo $this->session->flashdata('edit'); ?></span>
                    </div>
                </div>
              </div>
            <?php } ?>
            <?php 
                if($this->session->flashdata('del')) 
                {
              ?>
              <div class="card-body">
                <div class="alert alert-outline-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <div class="alert-icon">
                    <i class="fa fa-times"></i>
                  </div>
                  <div class="alert-message">
                    <span><?php echo $this->session->flashdata('del'); ?></span>
                  </div>
                </div>
              </div>
            <?php } ?>
              <div class="card-body">
                <div class="table-responsive">
                <table id="tableEx" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Country No</th>
                      <th>Country name</th>
                      <th>Actions</th>    
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                        if (isset($dataall)) {
                          foreach ($dataall as $res) {
                       ?>
                       <tr>
                          <td><?php echo $res->country_id; ?></td>
                          <td><?php echo $res->country_name; ?></td>
                          <td>
                                  <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a href="javaScript:void();" class="dropdown-item e_country" id="<?php echo $res->country_id; ?>" data-toggle="modal" data-target="#editCountrymodal"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                    <a href="javaScript:void();" class="dropdown-item del_country" id="<?php echo $res->country_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                    <a href="javaScript:void();" class="dropdown-item v_country" data-toggle="modal" data-target="#viewCountrymodal" id="<?php echo $res->country_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

                                    </div>
                          </td>
                       </tr>
                     <?php }} ?>
                  </tbody>
                  <tfoot>
                      <tr>
                      <th>Country No</th>
                      <th>Country name</th>
                      <th>Actions</th>
                      </tr>
                  </tfoot>
              </table>
              </div>
              </div>
            </div>
          </div>
      </div><!-- End Row-->
    </div>

    <!-- Add Modal -->
      <div class="modal fade" id="addCountrymodal" tabindex="-1" role="dialog" aria-labelledby="addCountryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="addCountryLabel">Add New Country Here</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/Country_master/insert_country">
              <div class="modal-body">
                <div class="form-group">
                  <label for="admin_username">New Country name :</label>
                  <input type="text" name="c_name" id="c_name" class="form-control" required>
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="add_country" value="Add">
              </div>
            </form>
          </div>
        </div>
      </div><!-- End container-fluid-->

      <!-- edit modal -->
      <div class="modal fade" id="editCountrymodal" tabindex="-1" role="dialog" aria-labelledby="editCountryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="addCountryLabel">Edit Country Here</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/Country_master/update_country">
              <div class="modal-body">
                <div class="form-group">
                  <label for="admin_username">Country name :</label>
                  <input type="text" name="country_name" id="country_name" class="form-control">
                  <input type="hidden" name="country_id" id="country_id" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" id="edit_country" name="edit_country" value="edit">
              </div>
            </form>
          </div>
        </div>
      </div><!-- End container-fluid-->

      <!-- edit modal -->
      <div class="modal fade" id="viewCountrymodal" tabindex="-1" role="dialog" aria-labelledby="editCountryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="viewCountryLabel">View Country</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="#">
              <div class="modal-body">
                <div class="form-group">
                  <label for="admin_username">Country name :</label>
                  <input type="text" name="country_name" id="view_country_name" class="form-control" readonly>
                  <input type="hidden" name="country_id" id="view_country_id" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End container-fluid-->

  </div><!--End wrapper-->
</body>
</html>