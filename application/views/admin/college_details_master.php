<!DOCTYPE html>
<html>
<head>
	<title>College Details Master | Dormitory Tracker</title>
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
      				    	<h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-graduation-cap"></i>&nbsp; All College details</h4>
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
            <div class="card-header text-uppercase text-primary">Total number of Colleges</div>
            <div class="card-header">
            	  <button type="button" class="btn btn-outline-danger waves-effect m-l-auto" data-toggle="modal" data-target="#AddCollege"><i class="fa fa fa-plus"></i>
            	 	  <span>Add New College</span>
            	  </button>
            </div>
           
            <div class="card-body">
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
              <div class="alert alert-danger alert-dismissible animated bounceIn" role="alert" id="alertdel">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div class="alert-icon contrast-alert">
                    <i class="fa fa-bell"></i>
                </div>
                <div class="alert-message">
                  <span><?php echo $this->session->flashdata('del'); ?></span>
                </div>
              </div>
          <?php } ?>
        		  <div class="table-responsive">
                <table class="table table-bordered" id="tableEx">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">College Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Pincode</th>
                      <th scope="col">City</th>
                      <th scope="col">Phone no.</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                        if(isset($data))
                        {
                            $c = 0;
                            foreach ($data as $rsl) {
                              $c++;
                            ?>
                            <tr>
                                <th><?php echo $c; ?></th>
                                <td><?php echo $rsl->clg_name; ?></td>
                                <td><?php echo $rsl->clg_address; ?></td>
                                <td><?php echo $rsl->clg_pincode; ?></td>
                                <td><?php echo $rsl->city_name; ?></td>
                                <td><?php echo $rsl->clg_phone; ?></td>
                                <td>
                                  <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                                  </button>
                                    <div class="dropdown-menu">
                                      <a href="javaScript:void();" class="dropdown-item e_clg" id="<?php echo $rsl->clg_id; ?>" data-toggle="modal" data-target="#clgedit"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                      <a href="javaScript:void();" class="dropdown-item d_clg" id="<?php echo $rsl->clg_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                      <a href="javaScript:void();" class="dropdown-item viewclg" data-toggle="modal" data-target="#viewclg" id="<?php echo $rsl->clg_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    ?>
                  </tbody>
                </table>
              </div>
             </div>
          </div>
        </div>
      </div><!--End Row-->
    </div>
    <!-- add model -->
    <div class="modal fade" id="AddCollege" tabindex="-1" role="dialog" aria-labelledby="AddCollege" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="AddCollege"><span class="ti-plus"></span>&nbsp;Add New College</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/College_master/insert">
              <div class="modal-body">
                <div class="form-group">
                  <label for="clg_name">College Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-graduation-cap"></i></i></span>
                        </div>
                      <input type="text" id="clg_name" name="clg_name" class="form-control" placeholder="College name">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="clg_address">College Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <textarea name="clg_address" id="clg_address" placeholder="Collge Address" class="form-control" style="resize: none;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_pincode">College Pincode</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-pin2"></span></span>
                        </div>
                    <input type="text" name="clg_pincode" placeholder="College pincode" class="form-control" id="clg_pincode" maxlength="6">
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_state">College state</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <select name="clg_state" id="state" class="form-control">
                        <option value="-1">Select State</option>
                        <?php
                            if (isset($state)) {
                                foreach ($state as $key) {
                        ?>
                        <option value="<?php echo $key->state_id; ?>"><?php echo $key->state_name; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_city">College City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <select name="clg_city" id="city" class="form-control">
                        <option value="-1">Select City</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_phone">College Phone number</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-mobile-phone"></i></span>
                        </div>
                    <input type="text" name="clg_phone" placeholder="College Phone number" class="form-control" id="clg_phone" maxlength="10">
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="AddCollege" id="AddCollege" value="Add"><i class="fa fa-check-square-o"></i>&nbsp;SAVE</button>
              </div>
            </form>
          </div>
        </div>
    </div>
    <!-- edit modal -->
      <div class="modal fade" id="clgedit" tabindex="-1" role="dialog" aria-labelledby="clgedit" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="clgedit"><span class="ti-pencil-alt"></span>&nbsp;Edit College Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/College_master/update">
              <div class="modal-body">
                  <div class="form-group">
                  <label for="clg_name">College Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-graduation-cap"></i></i></span>
                        </div>
                      <input type="hidden" id="colg_id" name="clg_id">
                      <input type="text" id="colg_name" name="clg_name" class="form-control" placeholder="College name">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="clg_address">College Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <textarea name="clg_address" id="colg_address" placeholder="Collge Address" class="form-control" style="resize: none;"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_pincode">College Pincode</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-pin2"></span></span>
                        </div>
                    <input type="text" name="clg_pincode" placeholder="College pincode" class="form-control" id="colg_pincode" maxlength="6">
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_state">College state</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <select name="clg_state" id="edit_state" class="form-control">
                        <option value="-1">Select State</option>
                        <?php
                            if (isset($state)) {
                                foreach ($state as $key) {
                        ?>
                        <option value="<?php echo $key->state_id; ?>"><?php echo $key->state_name; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_city">College City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <select name="clg_city" id="edit_city" class="form-control">
                        <option value="-1">Select City</option>
                        <?php
                            if (isset($city)) {
                                foreach ($city as $key) {
                        ?>
                        <option value="<?php echo $key->city_id; ?>"><?php echo $key->city_name; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_phone">College Phone number</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-mobile-phone"></i></span>
                        </div>
                    <input type="text" name="clg_phone" placeholder="College Phone number" class="form-control" id="colg_phone" maxlength="10">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="clgedit" id="clgedit" value="Edit"><i class="fa fa-check-square-o"></i>&nbsp;Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div> <!-- finish modal -->

      <!-- view -->
        <div class="modal fade" id="viewclg" tabindex="-1" role="dialog" aria-labelledby="viewclg" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="viewclg"><i class="zmdi zmdi-graduation-cap"></i>&nbsp;View College's Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#">
              <div class="modal-body">
                  <div class="form-group">
                  <label for="clg_name">College Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-graduation-cap"></i></i></span>
                        </div>
                      <input type="text" id="cllg_name" name="clg_name" class="form-control" placeholder="College name" readonly="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="clg_address">College Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <textarea name="clg_address" id="cllg_address" placeholder="Collge Address" class="form-control" style="resize: none;" readonly=""></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_pincode">College Pincode</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-pin2"></span></span>
                        </div>
                    <input type="text" name="clg_pincode" placeholder="College pincode" class="form-control" id="cllg_pincode" maxlength="6" readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_state">College state</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <select name="clg_state" id="view_state" class="form-control" readonly="">
                        <option value="-1">Select State</option>
                        <?php
                            if (isset($state)) {
                                foreach ($state as $key) {
                        ?>
                        <option value="<?php echo $key->state_id; ?>"><?php echo $key->state_name; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_city">College City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                    <select name="clg_city" id="view_city" class="form-control" readonly="">
                        <option value="-1">Select City</option>
                        <?php
                            if (isset($city)) {
                                foreach ($city as $key) {
                        ?>
                        <option value="<?php echo $key->city_id; ?>"><?php echo $key->city_name; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clg_phone">College Phone number</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-mobile-phone"></i></span>
                        </div>
                    <input type="text" name="clg_phone" placeholder="College Phone number" class="form-control" id="cllg_phone" maxlength="10" readonly="">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- finish view -->

    <!-- End container-fluid-->
    </div>
<!--End content-wrapper-->
</body>
</html>