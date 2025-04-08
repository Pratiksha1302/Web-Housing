<!DOCTYPE html>
<html>
<head>
	<title>State Details | Dormitory Tracker</title>
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
				    	<h4 class="page-title">State Details</h4>
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
            <div class="card-header text-uppercase">All States Details :</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addState"><i class="fa fa-plus"></i> Add New state</button>
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
          <?php } 
              if ($this->session->flashdata('edit')) 
              {
            ?>
            <div class="card-body">
              <div class="alert alert-outline-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <div class="alert-icon">
                    <i class="fa fa-check"></i>
                  </div>
                  <div class="alert-message">
                    <span><?php echo $this->session->flashdata('edit'); ?></span>
                  </div>
              </div>
            </div>
          <?php }
              if ($this->session->flashdata('del')) 
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
                      <th>State No</th>
                      <th>State name</th>
                      <th>Country name</th>
                      <th>Actions</th>    
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                        if (isset($state)) {
                          foreach ($state as $res) {
                       ?>
                       <tr>
                          <td><?php echo $res->state_id; ?></td>
                          <td><?php echo $res->state_name; ?></td>
                          <td><?php echo $res->country_name; ?></td>
                          <td>
                              <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a href="javaScript:void();" class="dropdown-item fetch_state" id="<?php echo $res->state_id; ?>" ><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                    <a href="javaScript:void();" class="dropdown-item del_state" id="<?php echo $res->state_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                    </div>
                          </td>
                       </tr>
                     <?php }} ?>
                  </tbody>
                  <tfoot>
                      <tr>
                      <th>State No</th>
                      <th>State name</th>
                      <th>Country name</th>
                      <th>Actions</th>    
                      </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
    </div>
    <!-- End container-fluid-->
    <!-- Admin Add Modal -->
      <div class="modal fade" id="addState" tabindex="-1" role="dialog" aria-labelledby="addStateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="addStateLabel">Add New State Here</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/state_master/insert_state">
              <div class="modal-body">
                <div class="form-group">
                  <label for="country_id">Select country :</label>
                  <select id="country_id" name="country_id" class="form-control sm_country_id">
                      <option value="-1">&nbsp;Select Country&nbsp;</option>
                      <?php
                        if(isset($country))
                        {
                            foreach ($country as $key) {
                                ?>
                      <option value="<?php echo $key->country_id; ?>">
                          <?php echo $key->country_name; ?>
                      </option>
                                <?php
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="state_name">State name :</label>
                  <input type="hidden" id="state_id" name="state_id">
                  <input type="text" id="state_name" name="state_name" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-outline-success btn-round waves-effect waves-light"  name="add_state" value="add">
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- edit -->
      <!-- Admin Add Modal -->
      <div class="modal fade" id="editState" tabindex="-1" role="dialog" aria-labelledby="editStateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="editStateLabel">Edit State Here</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/state_master/update_state">
              <div class="modal-body">
                <div class="form-group">
                  <label for="c_id">Country</label>
                  <select id="c_id" name="country_id" class="form-control sm_country_id">
                      <option value="-1">&nbsp;Select Country&nbsp;</option>
                      <?php
                        if(isset($country))
                        {
                            foreach ($country as $key) {
                                ?>
                      <option value="<?php echo $key->country_id; ?>">
                          <?php echo $key->country_name; ?>
                      </option>
                                <?php
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="s_name">State</label>
                  <input type="hidden" id="s_id" name="state_id">
                  <input type="text" id="s_name" name="state_name" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit_state" value="edit">
              </div>
            </form>
          </div>
        </div>
      </div>

    </div><!--End content-wrapper-->
  </div><!--End wrapper-->
	</div>
</body>
</html>
