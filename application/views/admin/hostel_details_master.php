  <!DOCTYPE html>
<html>
<head>
	<title>Hostel Details Master | Dormitory Tracker</title>
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
				    	<h4 class="page-title text-uppercase text-danger"><i aria-hidden="true" class="fa fa-building-o"></i>&nbsp;All Hostel Details</h4>
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
            <div class="card-header text-uppercase text-primary">Total number of Hostels</div>
            <div class="card-header">
                <button type="button" class="btn btn-outline-danger waves-effect m-l-auto" data-toggle="modal" data-target="#addhostel"><i class="fa fa fa-plus"></i>
                  <span>Add New Hostel</span>
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
                      <th>No</th>
                      <th>Hostel Name</th>
                      <th>Pincode</th>
                      <th>Phone no.</th>
                      <th>City</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                        if(isset($data))
                        {
                            foreach ($data as $rsl) {
                            ?>
                            <tr>
                                <th><?php echo $rsl->hostel_id; ?></th>
                                <td><?php echo $rsl->hostel_name; ?></td>
                                
                                <td><?php echo $rsl->hostel_pincode; ?></td>
                                <td><?php echo $rsl->hostel_phone; ?></td>
                                <td><?php echo $rsl->city_name; ?></td>
                                <td>
                                  <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a href="javaScript:void();" class="dropdown-item e_hostel" id="<?php echo $rsl->hostel_id; ?>" data-toggle="modal" data-target="#hosteledit"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                    <a href="javaScript:void();" class="dropdown-item d_hostel" id="<?php echo $rsl->hostel_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                    <a href="javaScript:void();" class="dropdown-item viewhostel" data-toggle="modal" data-target="#viewhostel" id="<?php echo $rsl->hostel_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

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
    </div><!-- End container-fluid-->

     <!-- add hostel -->
      <div class="modal fade" id="addhostel" tabindex="-1" role="dialog" aria-labelledby="addhostel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addhostel"><span class="ti-plus"></span>&nbsp;Add New Hostel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_master/insert" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                      <input type="text" id="hostel_name" name="hostel_name" class="form-control" placeholder="Hostel Name" required>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Hostel Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                   <textarea class="form-control" placeholder="Hostel Address" name="hostel_address" id="hostel_address" style="resize: none;"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6 col-12">
                      <label for="clg_pincode">Hostel Pincode</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="ti-pin2"></span></span>
                            </div>
                        <input type="text" name="hostel_pincode" placeholder="Hostel Pincode" class="form-control" id="hostel_pincode" maxlength="6" required>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <label for="clg_phone">Hostel Phone number</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-mobile-phone"></i></span>
                            </div>
                        <input type="text" name="hostel_phone" placeholder="Hostel Phone Number" class="form-control" id="hostel_phone" maxlength="10" required>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6 col-12">
                      <label for="state">Hostel state</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                            </div>
                        <select id="state" class="form-control" name="hostel_state" required>
                          <option value="-1">Select State</option>
                          <?php  
                              if (isset($state)) {
                                foreach ($state as $s) {
                          ?>
                          <option value="<?php echo $s->state_id; ?>"><?php echo $s->state_name; ?></option>  
                          <?php       
                                }
                              }
                          ?>
                        </select>
                      </div>    
                    </div>
                    <div class="col-md-6 col-12">
                      <label for="city">Hostel City</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                            </div>
                        <select id="city" class="form-control" name="hostel_city" required>
                          <option value="-1">Select City</option>
                          <?php  
                              if (isset($city)) {
                                foreach ($city as $c) {
                          ?>
                          <option value="<?php echo $c->city_id; ?>"><?php echo $c->city_name; ?></option>  
                          <?php       
                                }
                              }
                          ?>
                        </select>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6 col-12">
                      <label for="hostel_rent">Hostel Rent</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="ti-pin2"></span></span>
                            </div>
                        <input type="text" name="hostel_rent" placeholder="Hostel Rent" class="form-control" id="hostel_rent" required>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <label for="hostel_photo">Hostel Images</label>
                      <div class="">
                        <input type="file" name="hostel_photo[]" class="" id="hostel_photo" multiple required>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close</button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="add" id="add" value="Add"><i class="fa fa-check-square-o"></i>&nbsp;SAVE</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end add hostel -->

      <!-- edit hostel -->
      <div class="modal fade" id="hosteledit" tabindex="-1" role="dialog" aria-labelledby="hosteledit" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="hosteledit"><span class="ti-pencil-alt"></span>&nbsp;Edit Hostel Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_master/update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                      <input type="hidden" id="edit_hostel_id" name="hostel_id">
                      <input type="text" id="edit_hostel_name" name="hostel_name" class="form-control" placeholder="Hostel Name">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Hostel Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                   <textarea class="form-control" placeholder="Hostel Address" name="hostel_address" id="edit_hostel_address" style="resize: none;"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6 col-12">
                      <label for="clg_pincode">Hostel Pincode</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="ti-pin2"></span></span>
                            </div>
                        <input type="text" name="hostel_pincode" placeholder="Hostel Pincode" class="form-control" id="edit_hostel_pincode" maxlength="6">
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <label for="clg_phone">Hostel Phone number</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-mobile-phone"></i></span>
                            </div>
                        <input type="text" name="hostel_phone" placeholder="Hostel Phone Number" class="form-control" id="edit_hostel_phone" maxlength="10">
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6 col-12">
                      <label for="state">Hostel state</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                            </div>
                        <select id="edit_state" class="form-control" name="hostel_state">
                          <option value="-1">Select State</option>
                          <?php  
                              if (isset($state)) {
                                foreach ($state as $s) {
                          ?>
                          <option value="<?php echo $s->state_id; ?>"><?php echo $s->state_name; ?></option>  
                          <?php       
                                }
                              }
                          ?>
                        </select>
                      </div>    
                    </div>
                    <div class="col-md-6 col-12">
                      <label for="city">Hostel City</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                            </div>
                        <select id="edit_city" class="form-control" name="hostel_city">
                          <option value="-1">Select City</option>
                          <?php  
                              if (isset($city)) {
                                foreach ($city as $c) {
                          ?>
                          <option value="<?php echo $c->city_id; ?>"><?php echo $c->city_name; ?></option>  
                          <?php       
                                }
                              }
                          ?>
                        </select>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-12 col-12">
                      <label for="hostel_rent">Hostel Rent</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="ti-pin2"></span></span>
                            </div>
                        <input type="text" name="hostel_rent" placeholder="Hostel Rent" class="form-control" id="edit_hostel_rent">
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12 col-12 ">
                      <label for="hostel_photo" class="mt-3">Hostel Images</label>
                      <div class="input-group">
                        <input type="hidden" name="old_hostel_photos" id="old_hostel_photos">
                        <input type="file" name="hostel_photo" class="" id="edit_hostel_photo">
                      </div>
                      <div id="old_view_hostel_photos"></div>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal" onclick="window.location.reload();"><i class="fa fa-times"></i>&nbsp;Close</button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="edit"><i class="fa fa-check-square-o"></i>&nbsp;Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end edit -->

      <!-- view -->
      <div class="modal fade" id="viewhostel" tabindex="-1" role="dialog" aria-labelledby="viewhostel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="viewhostel"><span class="ti-user"></span>&nbsp;View Hostel Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#">
              <div class="modal-body">
                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                      <input type="text" id="view_hostel_name" name="hostel_name" class="form-control" placeholder="Hostel Name" readonly="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Hostel Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                   <textarea class="form-control" placeholder="Hostel Address" name="hostel_address" id="view_hostel_address" style="resize: none;"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6 col-12">
                      <label for="clg_pincode">Hostel Pincode</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="ti-pin2"></span></span>
                            </div>
                        <input type="text" name="hostel_pincode" placeholder="Hostel Pincode" class="form-control" id="view_hostel_pincode" maxlength="6">
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <label for="clg_phone">Hostel Phone number</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-mobile-phone"></i></span>
                            </div>
                        <input type="text" name="hostel_phone" placeholder="Hostel Phone Number" class="form-control" id="view_hostel_phone" maxlength="10">
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-row">
                    <div class="col-md-6 col-12">
                      <label for="state">Hostel state</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                            </div>
                        <select id="view_state" class="form-control" name="hostel_state">
                          <option value="-1">Select State</option>
                          <?php  
                              if (isset($state)) {
                                foreach ($state as $s) {
                          ?>
                          <option value="<?php echo $s->state_id; ?>"><?php echo $s->state_name; ?></option>  
                          <?php       
                                }
                              }
                          ?>
                        </select>
                      </div>    
                    </div>
                    <div class="col-md-6 col-12">
                      <label for="city">Hostel City</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                            </div>
                        <select id="view_city" class="form-control" name="hostel_city">
                          <option value="-1">Select City</option>
                          <?php  
                              if (isset($city)) {
                                foreach ($city as $c) {
                          ?>
                          <option value="<?php echo $c->city_id; ?>"><?php echo $c->city_name; ?></option>  
                          <?php       
                                }
                              }
                          ?>
                        </select>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="form-group">
                  <div class="">
                    <div class="">
                      <label for="hostel_rent">Hostel Rent</label>
                      <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><span class="fa fa-rupee-sign"></span></span>
                            </div>
                        <input type="text" name="hostel_rent" placeholder="Hostel Rent" class="form-control" id="view_hostel_rent">
                      </div>
                    </div>
                    <div class="">
                      <label for="hostel_photo">Hostel Images</label>
                      <div class="" id="view_hostel_photo">
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal" onclick="window.location.reload();"><i class="fa fa-times"></i>&nbsp;Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- end view -->
    </div><!--End content-wrapper-->
</body>
</html>