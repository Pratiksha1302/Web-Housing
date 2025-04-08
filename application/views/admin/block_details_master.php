<!DOCTYPE html>
<html>
<head>
  <title>Block Details | Admin Dashbord</title>
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
              <h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-border-all"></i>&nbsp;Total number of Blocks</h4>
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
            <div class="card-header text-primary text-uppercase">Block Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addblock"><span class="ti-plus"></span>&nbsp;Add New Block</button>
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
                    <th>Block No</th>
                    <th>Block Name</th>
                    <th>Block Division</th>
                    <th>Block Status</th>
                    <th>Hostel Name</th>  
                    <th>Actions</th>  
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        if (isset($data)) {
                            foreach ($data as $r) {
                    ?>
                    <tr>
                        <td><?php echo $r->block_id; ?></td>
                        <td><?php echo $r->block_name; ?></td>
                        <td><?php echo $r->block_division; ?></td>
                        <td><?php echo $r->block_status; ?></td>
                        <td><?php echo $r->hostel_name; ?></td>
                        <td>
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a href="javaScript:void();" class="dropdown-item e_block" id="<?php echo $r->block_id; ?>" data-toggle="modal" data-target="#editblock"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                          <a href="javaScript:void();" class="dropdown-item d_block" id="<?php echo $r->block_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                          <a href="javaScript:void();" class="dropdown-item viewblock" data-toggle="modal" data-target="#viewblock" id="<?php echo $r->block_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>
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
      <div class="modal fade" id="addblock" tabindex="-1" role="dialog" aria-labelledby="addblock" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addblock"><span class="ti-plus"></span>&nbsp;Add New Block</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/hostel_block_master/insert">
              <div class="modal-body">
                <div class="form-group">
                  <label for="block_name">Block Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-border-all"></i></span>
                        </div>
                    <input type="text" id="block_name" name="block_name" class="form-control" placeholder="Block Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="block_division">Block Division</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-window-restore"></i></span>
                        </div>
                    <input type="text" id="block_division" name="block_division" class="form-control" placeholder="Block Division" required>
                  </div>  
                </div>
                 <div class="form-group">
                  <label for="block_status">Block Status</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-check-square-o"></i></span>
                        </div>
                    <input type="text" id="block_status" name="block_status" class="form-control" placeholder="Block Status" required>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                    <select class="form-control" id="hostel" name="hostel_name">
                      <optgroup label="Hostels name">Hostels Name</optgroup>
                      <option value="-1">Select Hostel</option>
                      <?php
                      if (isset($hostel)) 
                      {
                        foreach($hostel as $c)
                                    {
                        ?>
                                  <option value="<?php echo $c->hostel_id; ?>"><?php echo $c->hostel_name; ?></option>
                        <?php
                                    }
                      }
                      ?>
                    </select>
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
      </div><!-- End container-fluid-->

    <!-- Admin edit Modal -->
      <div class="modal fade" id="editblock" tabindex="-1" role="dialog" aria-labelledby="editAdminLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="editAdminLabel"><span class="ti-pencil-alt"></span>&nbsp;Edit Block Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/hostel_block_master/update">
              <div class="modal-body">
                <div class="form-group">
                  <label for="block_name">Block Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-border-all"></i></span>
                        </div>
                    <input type="hidden" id="edit_block_id" name="block_id">
                    <input type="text" id="edit_block_name" name="block_name" class="form-control" placeholder="Block Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="block_division">Block Division</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-window-restore"></i></span>
                        </div>
                    <input type="text" id="edit_block_division" name="block_division" class="form-control" placeholder="Block Division">
                  </div>  
                </div>
                 <div class="form-group">
                  <label for="block_status">Block Status</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-check-square-o"></i></span>
                        </div>
                    <input type="text" id="edit_block_status" name="block_status" class="form-control" placeholder="Block Status">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                    <select class="form-control" id="edit_hostel" name="hostel_name">
                      <optgroup label="Hostels name">Hostels Name</optgroup>
                      <option value="-1">Select Hostel</option>
                      <?php
                      if (isset($hostel)) 
                      {
                        foreach($hostel as $c)
                                    {
                        ?>
                                  <option value="<?php echo $c->hostel_id; ?>"><?php echo $c->hostel_name; ?></option>
                        <?php
                                    }
                      }
                      ?>
                    </select>
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
      </div>

  <!-- View Modal -->
<div class="modal fade" id="viewblock" tabindex="-1" role="dialog" aria-labelledby="viewAdmin" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
              <h5 class="text-warning" id="viewblock"><span class="ti-user"></span>&nbsp;Hostel Block's Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      <div class="modal-body">
          <form>
              <div class="modal-body">
                <div class="form-group">
                  <label for="block_name">Block Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-border-all"></i></span>
                        </div>
                    <input type="text" id="view_block_name" name="block_name" class="form-control" placeholder="Block Name" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="block_division">Block Division</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-window-restore"></i></span>
                        </div>
                    <input type="text" id="view_block_division" name="block_division" class="form-control" placeholder="Block Division" disabled>
                  </div>  
                </div>
                 <div class="form-group">
                  <label for="block_status">Block Status</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-check-square-o"></i></span>
                        </div>
                    <input type="text" id="view_block_status" name="bloc_status" class="form-control" placeholder="Block Status" disabled>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                    <select class="form-control" id="view_hostel" name="hostel_name" disabled>
                      <optgroup label="Hostels name">Hostels Name</optgroup>
                      <option value="-1">Select Hostel</option>
                      <?php
                      if (isset($hostel)) 
                      {
                        foreach($hostel as $c)
                                    {
                        ?>
                                  <option value="<?php echo $c->hostel_id; ?>"><?php echo $c->hostel_name; ?></option>
                        <?php
                                    }
                      }
                      ?>
                    </select>
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
</div>
    </div><!--End content-wrapper-->
    </div><!--End wrapper-->

  </div>
</body>
</html>

