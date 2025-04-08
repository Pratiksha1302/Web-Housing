<!DOCTYPE html>
<html>
<head>
  <title>Owner Details | Admin Dashbord</title>
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
              <h4 class="page-title text-danger text-uppercase"><i aria-hidden="true" class="fa fa-id-badge"></i>&nbsp;Total number of Owners</h4>
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
            <div class="card-header text-primary text-uppercase">Owner Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addowner"><span class="ti-plus"></span>&nbsp;Add New Owner</button>
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
              <table id="tableEx" class="table table-bordered">
                <thead>
                  <tr>
                    <th>Owner No</th>
                    <th>Owner Name</th>
                    <th>Owner Mobile Number</th>
                    <th>Owner City</th>
                    <th>Owner Lightbill Proof</th>
                    <th>Owner Profile</th>
                    <th>Actions</th>    
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        if (isset($data)) 
                        {
                            foreach ($data as $owner)
                            {
                    ?>
                    <tr>
                        <td><?php echo $owner->landlord_id; ?></td>
                        <td><?php echo $owner->landlord_name; ?></td>
                        <td><?php echo $owner->landlord_mobile; ?></td>
                        <td><?php echo $owner->city_name; ?></td>
                        <td>
                          <div style="height: 110px;width: 110px;position: relative;">
                            <a href="<?php echo base_url(); ?>images/landlord_bill_proof/<?php echo $owner->landlord_bill_proof; ?>" data-fancybox="images" data-caption="Owner's Residance Proof">
                                  <img src="<?php echo base_url(); ?>images/landlord_bill_proof/<?php echo $owner->landlord_bill_proof; ?>" alt="no image" class="lightbox-thumb img-thumbnail" style="position: relative;height: 100px;width: auto;">
                            </a>
                          </div>
                        </td>
                        <td>
                          <div style="height: 110px;width: 110px;">
                            <a href="<?php echo base_url(); ?>images/landlord_profile/<?php echo $owner->landlord_profile; ?>" data-fancybox="images" data-caption="Owner's Profile">
                                  <img src="<?php echo base_url(); ?>images/landlord_profile/<?php echo $owner->landlord_profile; ?>" alt="no image" class="lightbox-thumb img-thumbnail" style="position: relative;height: 100px;width: auto;">
                            </a>
                          </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a href="javaScript:void();" class="dropdown-item e_owner" id="<?php echo $owner->landlord_id; ?>" data-toggle="modal" data-target="#editowner"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                              <a href="javaScript:void();" class="dropdown-item d_owner" id="<?php echo $owner->landlord_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                              <a href="javaScript:void();" class="dropdown-item v_owner" data-toggle="modal" data-target="#viewowner" id="<?php echo $owner->landlord_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

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
        </div><!-- End Row-->
      </div>

    <!-- Add Modal -->
      <div class="modal fade" id="addowner" tabindex="-1" role="dialog" aria-labelledby="addowner" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addowner"><span class="ti-plus"></span>&nbsp;Add New Owner</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>admin/PG_owner_master/insert" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="view_name">Owner Name</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                  </div>
                              <input type="text" id="owner_name" name="owner_name" class="form-control" placeholder="Owner Name" required>
                            </div>
                          </div>    
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="view_email">Owner Email</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                  </div>
                              <input type="email" id="owner_email" name="owner_email" class="form-control" placeholder="Owner Email Address" required>
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_pass">Owner Password</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                  </div>
                              <input type="password" id="owner_pass" name="owner_pass" class="form-control" placeholder="Owner Password" required>
                            </div>  
                          </div>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_mno">Owner Mobile Number</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                  </div>
                              <input type="text" id="owner_mno" name="owner_mno" class="form-control" placeholder="Owner Mobile Number" required>
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 col-12">
                          <div class="form-group">
                            <label for="owner_add">Owner Address</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i aria-hidden="true" class="fa fa-map"></i></span>
                                  </div>
                                  <textarea class="form-control" id="owner_add" name="owner_add" class="owner_add" placeholder="Owner Address" style="resize: none;"></textarea>
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="view_state">Owner State</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                                  </div>
                                <select id="state" name="owner_state" class="form-control">
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
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="view_city">Owner City</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                                  </div>
                                <select id="city" name="owner_city" class="form-control">
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
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div>
                            <label>Owner Lightbill Proof</label>
                          </div>
                          <div class="">
                            <div class="custom-file">
                               <input type="file" name="owner_lightbill" class="custom-file-input" id="owner_lightbill">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>      
                      </div>

                      <div class="col-md-6 col-12">
                             <div>
                            <label>Owner Profile</label>
                          </div>
                          <div class="">
                            <div class="custom-file">
                               <input type="file" name="owner_profile" class="custom-file-input" id="owner_profile">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>   
                      </div>
                  </div>   
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="add" id="add" value="Add"><i class="fa fa-check-square-o"></i>&nbsp;Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End AddOwner Modal -->

    <!-- edit Modal -->
      <div class="modal fade" id="editowner" tabindex="-1" role="dialog" aria-labelledby="addowner" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addowner"><span class="ti-pencil-alt"></span>&nbsp;Edit Owner's Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>admin/PG_owner_master/update" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_name">Owner Name</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                  </div>
                              <input type="hidden" id="edit_owner_id" name="landlord_id">
                              <input type="text" id="edit_owner_name" name="owner_name" class="form-control" placeholder="Owner Name">
                            </div>
                          </div>    
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_email">Owner Email</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                  </div>
                              <input type="email" id="edit_owner_email" name="owner_email" class="form-control" placeholder="Owner Email Address">
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_pass">Owner Password</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                  </div>
                              <input type="password" id="edit_owner_pass" name="owner_pass" class="form-control" placeholder="Owner Password">
                            </div>  
                          </div>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_mno">Owner Mobile Number</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                  </div>
                              <input type="text" id="edit_owner_mno" name="owner_mno" class="form-control" placeholder="Owner Mobile Number">
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 col-12">
                          <div class="form-group">
                            <label for="owner_add">Owner Address</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i aria-hidden="true" class="fa fa-map"></i></span>
                                  </div>
                                  <textarea class="form-control" id="edit_owner_add" name="owner_add" class="owner_add" placeholder="Owner Address" style="resize: none;"></textarea>
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_state">Owner State</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                                  </div>
                                <select id="edit_state" name="owner_state" class="form-control">
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
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_city">Owner City</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                                  </div>
                                <select id="edit_city" name="owner_city" class="form-control">
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
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div>
                            <label>Owner Lightbill Proof</label>
                          </div>
                          <div class="">
                            <div id="old_landlord_bill_proof"></div>
                            <input type="hidden" name="landlord_bill_proof" id="landlord_bill_proof_old">
                            <div class="">
                              <input type="file" class="" name="owner_lightbill" id="edit_owner_lightbill">
                            </div>
                          </div>      
                      </div>
                      <div class="col-md-6 col-12">
                          <div> <br>
                            <label>Owner Profile</label>
                          </div>
                          <div class="">
                            <div id="old_landlord_profile"></div>
                            <input type="hidden" name="landlord_profile" id="landlord_profile_old">
                            <div class="">
                              <input type="file" class="" name="owner_profile" id="edit_owner_profile">
                            </div>
                          </div>      
                      </div>
                  </div>  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="Edit"><i class="fa fa-check-square-o"></i>&nbsp;Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End AddOwner Modal -->

    <!-- vievieww Modal -->
      <div class="modal fade" id="viewowner" tabindex="-1" role="dialog" aria-labelledby="addowner" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addowner"><span class="zmdi zmdi-account-circle"></span>&nbsp;View PG Owner</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="#">
              <div class="modal-body">
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="view_name">Owner Name</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                                  </div>
                              <input type="hidden" id="view_owner_id" name="landlord_id">
                              <input type="text" id="view_owner_name" name="owner_name" class="form-control" placeholder="Owner Name" disabled>
                            </div>
                          </div>    
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="view_email">Owner Email</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                  </div>
                              <input type="email" id="view_owner_email" name="owner_email" class="form-control" placeholder="Owner Email Address" disabled>
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_pass">Owner Password</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                  </div>
                              <input type="password" id="view_owner_pass" name="owner_pass" class="form-control" placeholder="Owner Password" disabled>
                            </div>  
                          </div>
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="owner_mno">Owner Mobile Number</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                  </div>
                              <input type="text" id="view_owner_mno" name="owner_mno" class="form-control" placeholder="Owner Mobile Number" disabled>
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 col-12">
                          <div class="form-group">
                            <label for="owner_add">Owner Address</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i aria-hidden="true" class="fa fa-map"></i></span>
                                  </div>
                                  <textarea class="form-control" id="view_owner_add" name="owner_add" class="owner_add" placeholder="Owner Address" style="resize: none;" disabled></textarea>
                            </div>  
                          </div>      
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="view_state">Owner State</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                                  </div>
                                <select id="view_state" name="owner_state" class="form-control" disabled>
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
                      </div>
                      <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="view_city">Owner City</label>
                            <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                                  </div>
                                <select id="view_city" name="owner_city" class="form-control" disabled>
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
                  <div class="form-row">
                      <div class="col-md-6 col-12">
                          <div>
                            <label>Owner Lightbill Proof</label>
                          </div>
                          <div class="">
                            <div id="view_landlord_bill_proof"></div>
                          </div>      
                      </div>
                      <div class="col-md-6 col-12">
                          <div> <br>
                            <label>Owner Profile</label>
                          </div>
                          <div class="">
                            <div id="view_landlord_profile"></div>
                          </div>      
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
      </div><!-- End ViewOwner Modal -->   
  </div><!--End wrapper-->
</body>
</html>

<script type="text/javascript">  

</script>

