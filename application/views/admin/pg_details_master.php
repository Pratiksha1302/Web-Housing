<!DOCTYPE html>
<html>
<head>
  <title>PG Details | Dormitory Tracker</title>
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
              <h4 class="page-title text-danger text-uppercase"><i class="ti-home"></i>&nbsp;Total number of PG</h4>
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
            <div class="card-header text-primary text-uppercase">PG Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#mymodal"><span class="ti-plus"></span>&nbsp;Add New PG</button>
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
                    <th>PG No</th>
                    <th>Owner Name</th>
                    <th>PG Photos</th>
                    <th>PG city</th>
                    <th>PG Rent</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      if (isset($data)) 
                      {
                          $c = 0;
                          foreach ($data as $p) 
                          {
                              $c++;
                    ?>
                    <tr>
                        <td><?php echo $c; ?></td>
                        <td><?php echo $p->landlord_name; ?></td>
                        <td>
                            
                            <div style="height: 200px;width: 200px;display: inline-flex;position: relative;">
                              <a href="<?php echo base_url(); ?>images/pg_photos/<?php echo $p->pg_photo; ?>" data-fancybox="images" data-caption="The Images of PG. It's owner name is <?php echo $p->landlord_name; ?>">
                                <img src="<?php echo base_url(); ?>images/pg_photos/<?php echo $p->pg_photo; ?>" alt="lightbox" class="lightbox-thumb img-thumbnail" height="10px" width="10px">
                              </a>
                            </div>
                            
                        </td>
                        <td><?php echo $p->city_name; ?></td>
                        <td><?php echo $p->pg_rent; ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a href="javaScript:void();" class="dropdown-item e_pg" id="<?php echo $p->pg_id; ?>" data-toggle="modal" data-target="#editpg"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                              <a href="javaScript:void();" class="dropdown-item d_pg" id="<?php echo $p->pg_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                              <a href="javaScript:void();" class="dropdown-item v_pg" data-toggle="modal" data-target="#viewpg" id="<?php echo $p->pg_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

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
      <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="pgadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="pgadd"><span class="ti-plus"></span>&nbsp;Add New PG</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/PG_detail_master/insert" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="pg_owner_name">Owner Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <select id="pg_owner_name" name="pg_owner_name" class="form-control">
                        <option value="-1">Select Landlord</option>
                        <?php 
                            if (isset($landlord)) {
                                foreach ($landlord as $s) {
                        ?>
                        <option value="<?php echo $s->landlord_id; ?>"><?php echo $s->landlord_name; ?></option>
                        <?php
                                   }   
                            }
                        ?>
                      </select>
                  </div>
                </div>
                <div>
                  <label>PG Photos</label>
                </div>
                <div class="">
                  <div class="">
                    <input type="file" class="" id="pg_photo" name="pg_photo" multiple>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pg_details">PG Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="pg_details" name="pg_details" placeholder="PG Details"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pg_add">PG Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="pg_add" name="pg_add" placeholder="PG Address"></textarea>
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
                      <select id="city" name="pg_city" class="form-control">
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
                <div class="form-group">
                  <label for="pg_rent">PG Rent</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                        </div>
                      <input type="text" name="pg_rent" id="pg_rent" class="form-control" placeholder="PG Rent">
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
      </div><!-- End Add Modal-->

    <!-- Edit Modal -->
      <div class="modal fade" id="editpg" tabindex="-1" role="dialog" aria-labelledby="pgadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="pgadd"><span class="ti-plus"></span>&nbsp;Add New PG</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="pg_owner_name">Owner Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="text" id="edit_pg_owner_name" name="pg_owner_name" class="form-control" placeholder="PG Owner Name">
                  </div>
                </div>
                <div>
                  <label>PG Photos</label>
                </div>
                <div class="">
                  <div class="">
                    <input type="file" class="" id="edit_pg_photo" name="pg_photo">
                    <div id="display_pg_photo"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pg_details">PG Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="edit_pg_details" name="pg_details" placeholder="PG Details"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pg_add">PG Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="edit_pg_add" name="pg_add" placeholder="PG Address"></textarea>
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
                <div class="form-group">
                  <label for="pg_rent">PG Rent</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                        </div>
                      <input type="text" name="pg_rent" id="edit_pg_rent" class="form-control" placeholder="PG Rent">
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
      </div><!-- End Edit Modal-->
   
       <!-- View Modal -->
      <div class="modal fade" id="viewpg" tabindex="-1" role="dialog" aria-labelledby="pgadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header"> 
              <h5 class="text-primary" id="pgadd"><span class="ti-plus"></span>&nbsp;PG Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="pg_owner_name">Owner Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="text" id="view_pg_owner_name" name="pg_owner_name" class="form-control" placeholder="PG Owner Name">
                  </div>
                </div>
                <div>
                  <label>PG Photos</label>
                </div>
                <div class="">
                  <div class="view_pg_photo" id="view_display_pg_photo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="pg_details">PG Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="view_pg_details" name="pg_details" placeholder="PG Details"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pg_add">PG Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="view_pg_add" name="pg_add" placeholder="PG Address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="state">Owner State</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <select id="view_state" name="pg_state" class="form-control">
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
                      <select id="view_city" name="pg_city" class="form-control">
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
                <div class="form-group">
                  <label for="pg_rent">PG Rent</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                        </div>
                      <input type="text" name="pg_rent" id="view_pg_rent" class="form-control" placeholder="PG Rent">
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
      </div><!-- End View Modal-->

    </div><!--End content-wrapper-->
    </div><!--End wrapper-->
  </div>
</body>
</html>

