
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>City Details Master | Web Housing</title>
  
</head>
<body>

<!-- Start wrapper-->
<div id="wrapper">

<!--Start topbar header-->
  <?php include 'header.php'; ?>
<!--End topbar header-->

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">
                <!-- Breadcrumb-->
                  <div class="row pt-2 pb-2">
                      <div class="col-sm-9">
                      <h4 class="page-title">Cities</h4>
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
<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-uppercase">All Citys Details :</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addCity"><i class="fa fa-plus"></i> Add New city</button>
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
                      <th>City No</th>
                      <th>City name</th>
                      <th>State name</th>
                      <th>Actions</th>    
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                        if (isset($city)) {
                          foreach ($city as $res) {
                       ?>
                       <tr>
                          <td><?php echo $res->city_id; ?></td>
                          <td><?php echo $res->city_name; ?></td>
                          <td><?php echo $res->state_name; ?></td>
                          <td>
                              <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a href="javaScript:void();" class="dropdown-item fetch_city" data-toggle="modal" data-target="#editCity" id="<?php echo $res->city_id; ?>" ><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                    <a href="javaScript:void();" class="dropdown-item del_city" id="<?php echo $res->city_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                    <a href="javaScript:void();" class="dropdown-item v_city" data-toggle="modal" data-target="#viewCity" id="<?php echo $res->city_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

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
    
    <!-- city Add Modal -->
      <div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="addCityLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="addCityLabel">Add New City Here</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/city_master/insert_into_city_master">
              <div class="modal-body">
                <div class="form-group">
                  <label for="country_id">Select country :</label>
                  <select id="country_id" name="country_id" class="form-control">
                      <option value="-1">---&nbsp;Select Country&nbsp;---</option>
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
                  <label for="state_id">Select State :</label>
                  <select id="state_id" name="state_id" class="form-control">
                      <option value="-1">---&nbsp;Select State&nbsp;---</option>
                      <?php
                        if(isset($state))
                        {
                            foreach ($state as $key) {
                                ?>
                      <option value="<?php echo $key->state_id; ?>">
                          <?php echo $key->state_name; ?>
                      </option>
                                <?php
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="state_name">City name :</label>
                  <input type="hidden" id="city_id" name="city_id">
                  <input type="text" id="city_name" name="city_name" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" id="submit" name="submit" value="save">
              </div>
            </form>
          </div>
        </div>
      </div><!--end add model-->

      <!-- Admin Add Modal -->
      <div class="modal fade" id="editCity" tabindex="-1" role="dialog" aria-labelledby="addCityLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="addCityLabel">Edit City</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/city_master/update_city">
              <div class="modal-body">
                <div class="form-group">
                  <label for="country_id">Select country :</label>
                  <select id="edit_country_id" name="country_id" class="form-control">
                      <option value="-1">---&nbsp;Select Country&nbsp;---</option>
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
                  <label for="state_id">Select State :</label>
                  <select id="edit_state_id" name="state_id" class="form-control">
                      <option value="-1">---&nbsp;Select State&nbsp;---</option>
                      <?php
                        if(isset($state))
                        {
                            foreach ($state as $key) {
                                ?>
                      <option value="<?php echo $key->state_id; ?>">
                          <?php echo $key->state_name; ?>
                      </option>
                                <?php
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="state_name">City name :</label>
                  <input type="hidden" id="edit_city_id" name="city_id">
                  <input type="text" id="edit_city_name" name="city_name" class="form-control">
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" id="submit" name="submit" value="save">
              </div>
            </form>
          </div>
        </div>
      </div><!--end edit model-->

      <!-- Admin Add Modal -->
      <div class="modal fade" id="viewCity" tabindex="-1" role="dialog" aria-labelledby="addCityLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger" id="addCityLabel">View City</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/city_master/insert_into_city_master">
              <div class="modal-body">
                <div class="form-group">
                  <label for="country_id">Select country :</label>
                  <select id="view_country_id" name="country_id" class="form-control" readonly>
                      <option value="-1">---&nbsp;Select Country&nbsp;---</option>
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
                  <label for="state_id">Select State :</label>
                  <select id="view_state_id" name="state_id" class="form-control" readonly>
                      <option value="-1">---&nbsp;Select State&nbsp;---</option>
                      <?php
                        if(isset($state))
                        {
                            foreach ($state as $key) {
                                ?>
                      <option value="<?php echo $key->state_id; ?>">
                          <?php echo $key->state_name; ?>
                      </option>
                                <?php
                            }
                        }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="state_name">City name :</label>
                  <input type="hidden" id="view_city_id" name="city_id">
                  <input type="text" id="view_city_name" name="city_name" class="form-control" readonly>
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div><!--end edit model-->

    </div><!--End content-wrapper-->
  </div><!--End wrapper-->

</div>
   <!--End sidebar-wrapper-->
  
</body>
</html>
