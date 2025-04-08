<!DOCTYPE html>
<html>
<head>
  <title>Client Details | Admin Dashbord</title>
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
              <h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-accounts-alt"></i>&nbsp;Total number of Clients</h4>
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
            <div class="card-header text-primary text-uppercase">Client Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#mymodal"><i class="zmdi zmdi-account-add"></i>&nbsp;Add New Client</button>
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
                    <th>Client No</th>
                    <th>Client Name</th>
                    <th>Client Email</th>
                    <th>Client City</th>
                    <th>Profile</th> 
                    <th>Gov. Proof</th>
                    <th>Action</th>   
                  </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($data)) 
                        {
                          $c = 0;
                            foreach ($data as $key) 
                            {
                               $c++;
                    ?>
                    <tr>
                        <td><?php echo $c; ?></td>
                        <td><?php echo $key->client_name; ?></td>
                        <td><?php echo $key->client_email; ?></td>
                        <td><?php echo $key->city_name; ?></td>
                        <td>
                          <div style="height: 110px;width: 110px;position: relative;">
                            <a href="<?php echo base_url(); ?>images/client_profile/<?php echo $key->client_profile; ?>" data-fancybox="images" data-caption="PG User's Profile image">
                                  <img src="<?php echo base_url(); ?>images/client_profile/<?php echo $key->client_profile; ?>" alt="no image" class="lightbox-thumb img-thumbnail" style="position: relative;height: 100px;width: auto;">
                            </a>
                          </div>
                        </td>
                        <td>
                          <div style="height: 110px;width: 110px;position: relative;">
                            <a href="<?php echo base_url(); ?>images/client_gov_proof/<?php echo $key->client_gov_proof; ?>" data-fancybox="images" data-caption="PG User's Government proof">
                                  <img src="<?php echo base_url(); ?>images/client_gov_proof/<?php echo $key->client_gov_proof; ?>" alt="no image" class="lightbox-thumb img-thumbnail" style="position: relative;height: 100px;width: auto;">
                            </a>
                          </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a href="javaScript:void();" class="dropdown-item e_client" id="<?php echo $key->client_id; ?>" data-toggle="modal" data-target="#editclient"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                              <a href="javaScript:void();" class="dropdown-item d_client" id="<?php echo $key->client_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                              <a href="javaScript:void();" class="dropdown-item v_client" data-toggle="modal" data-target="#viewclient" id="<?php echo $key->client_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

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
      <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="addclient" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addclient"><span class="ti-plus"></span>&nbsp;Add New Client</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Client_master/insert" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="client_name">Client Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="text" id="client_name" name="client_name" class="form-control" placeholder="Client Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="client_email">Client Email Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="email" id="client_email" name="client_email" class="form-control" placeholder="Client Email">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="client_passwd">Client Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="client_passwd" name="client_password" class="form-control" placeholder="Client Password">
                  </div>  
                </div>
                <div>
                  <label for="client_gender">Client Gender</label>
                </div>
               <div class="form-group">
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="client_gender1" name="client_gender" value="Male">
                    <label for="client_gender1">Male</label>
                  </div>
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="client_gender2" name="client_gender" value="Female">
                    <label for="client_gender2">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="client_add">Client Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                      <textarea class="form-control" id="client_add" name="client_address" placeholder="Client Address" style="resize: none"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="state">Owner State</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <select id="state" name="client_state" class="form-control">
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
                <div class="form-group">
                  <label for="city">Owner City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <select id="city" name="client_city" class="form-control">
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
                <div>
                  <label>Client Profile</label>
                </div>
                <div class="">
                  <div class="">
                    <input type="file" class="" id="client_profile"  name="client_profile">
                  </div>
                </div>
                <div>
                  <label>Client Government Proof</label>
                </div>
                <div class="">
                  <div class="">
                    <input type="file" class="" id="client_gov_proof" name="client_gov_proof">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="add" id="add" value="Add"><i class="fa fa-check-square-o"></i>&nbsp;SAVE</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End Modal -->

      <!-- Edit Modal -->
      <div class="modal fade" id="editclient" tabindex="-1" role="dialog" aria-labelledby="addclient" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addclient"><span class="ti-plus"></span>&nbsp;Add New Client</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Client_master/update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="client_name">Client Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="hidden" id="edit_client_id" name="client_id">
                    <input type="text" id="edit_client_name" name="client_name" class="form-control" placeholder="Client Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="client_email">Client Email Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="email" id="edit_client_email" name="client_email" class="form-control" placeholder="Client Email">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="client_passwd">Client Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="edit_client_passwd" name="client_password" class="form-control" placeholder="Client Password">
                  </div>  
                </div>
                <div>
                  <label for="client_gender">Client Gender</label>
                </div>
               <div class="form-group">
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="edit_client_gender1" name="client_gender" value="Male">
                    <label for="client_gender1">Male</label>
                  </div>
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="edit_client_gender2" name="client_gender" value="Female">
                    <label for="client_gender2">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="client_add">Client Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                      <textarea class="form-control" id="edit_client_add" name="client_address" placeholder="Client Address" style="resize: none"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="state">Owner State</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <select id="edit_state" name="client_state" class="form-control">
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
                <div class="form-group">
                  <label for="city">Owner City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <select id="edit_city" name="client_city" class="form-control">
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
                <div>
                  <label>Client Profile</label>
                </div>
                <div class="">
                  <div class="">
                    <div id="profile"></div>
                    <input type="hidden" name="old_client_profile" id="old_client_profile">
                    <input type="file" class="" id="edit_client_profile"  name="client_profile">
                  </div>
                </div>
                <div>
                  <label>Client Government Proof</label>
                </div>
                <div class="">
                  <div class="">
                    <div id="gov_proof"></div>
                    <input type="hidden" name="old_client_gov_proof" id="old_client_gov_proof">
                    <input type="file" class="" id="edit_client_gov_proof" name="client_gov_proof">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="edit"><i class="fa fa-check-square-o"></i>&nbsp;SAVE CHANGES</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End Modal -->

      <!-- View Modal -->
      <div class="modal fade" id="viewclient" tabindex="-1" role="dialog" aria-labelledby="addclient" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addclient"><span class="ti-plus"></span>&nbsp;Add New Client</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="view_client_name">Client Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="text" id="view_client_name" name="client_name" class="form-control" placeholder="Client Name" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="client_email">Client Email Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="email" id="view_client_email" name="client_email" class="form-control" placeholder="Client Email" disabled="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="client_passwd">Client Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="view_client_passwd" name="client_password" class="form-control" placeholder="Client Password" disabled="">
                  </div>  
                </div>
                <div>
                  <label for="client_gender">Client Gender</label>
                </div>
               <div class="form-group">
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="view_client_gender1" name="client_gender" value="Male" disabled="">
                    <label for="client_gender1">Male</label>
                  </div>
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="view_client_gender2" name="client_gender" value="Female" disabled="">
                    <label for="client_gender2">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="client_add">Client Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><span class="ti-map-alt"></span></span>
                        </div>
                      <textarea class="form-control" id="view_client_add" name="client_address" placeholder="Client Address" style="resize: none" disabled=""></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="state">Owner State</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <select id="view_state" name="client_state" class="form-control" disabled="">
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
                <div class="form-group">
                  <label for="city">Owner City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <select id="view_city" name="client_city" class="form-control" disabled="">
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
                <div>
                  <label>Client Profile</label>
                </div>
                <div class="">
                  <div class="">
                    <div id="view_old_client_profile"></div>
                  </div>
                </div>
                <div>
                  <label>Client Government Proof</label>
                </div>
                <div class="">
                  <div class="">
                    <div id="view_old_client_gov_proof"></div>
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
      </div><!-- End Modal -->

    </div><!--End wrapper-->

  </div>
</body>
</html>

