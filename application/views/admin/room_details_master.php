<!DOCTYPE html>
<html>
<head>
  <title>Web Housing | Admin Dashbord</title>
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
              <h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-hotel"></i>&nbsp;Hostel Room Details</h4>
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
            <div class="card-header text-primary text-uppercase">Room information</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addroom"><i class="fa fa fa-plus"></i>&nbsp;Add New Room</button>
            </div>
           
            <div class="card-body">
               <?php 
              if ($this->session->flashdata('success')) 
              {
            ?>
              <div class="alert alert-success alert-dismissible" role="alert">
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
             <div class="alert alert-info alert-dismissible" role="alert">
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
              <div class="alert alert-danger alert-dismissible" role="alert" id="alertdel">
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
                    <th>Room No</th>
                    <th>Block name</th>
                    <th>Total Bed</th>
                    <th>Room type</th>
                    <th>Room Details</th>
                    <th>Room status</th>
                    <th>Actions</th>    
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        if (isset($data)) {
                            foreach ($data as $r) {
                    ?>
                    <tr>
                        <td><?php echo $r->room_id; ?></td>
                        <td><?php echo $r->block_name; ?></td>
                        <td><?php echo $r->room_beds; ?></td>
                        <td><?php echo $r->room_type; ?></td>
                        <td><?php echo $r->room_details; ?></td>
                        <td><?php echo $r->room_status; ?></td>
                        <td>
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a href="javaScript:void();" class="dropdown-item e_room" id="<?php echo $r->room_id; ?>" data-toggle="modal" data-target="#editroom"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                          <a href="javaScript:void();" class="dropdown-item d_room" id="<?php echo $r->room_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                          <a href="javaScript:void();" class="dropdown-item viewroom" data-toggle="modal" data-target="#viewroom" id="<?php echo $r->room_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>
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
      <div class="modal fade" id="addroom" tabindex="-1" role="dialog" aria-labelledby="addroom" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addroom"><span class="ti-plus"></span>&nbsp;Add New Room Info.</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_room_master/insert">
              <div class="modal-body">
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="hostel"> Hostel Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                          </div>
                          <select class="form-control" id="hostel" name="hostel_id">
                            <optgroup label="Hostels Name">Select Hostel</optgroup>
                            <option value="-1">Select hostel</option>
                            <?php
                              if (isset($hostel)) {
                                foreach ($hostel as $h) {
                            ?>
                            <option value="<?php echo $h->hostel_id; ?>"><?php echo $h->hostel_name; ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="block">Block Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-border-all"></i></span>
                          </div>
                          <select class="form-control" id="block" name="b_name">
                            <optgroup label="Block Name">Blocks Name</optgroup>
                            <option value="-1">Select block</option>
                          </select>
                        </div>
                      </div>
                    </div>
                <div class="form-group">
                  <label for="r_beds">Total Beds</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-hotel"></i></span>
                        </div>
                    <input type="text" id="r_beds" name="r_beds" class="form-control" placeholder="Total Beds">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="r_type">Room Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-window-restore"></i></span>
                        </div>
                    <select name="r_type" id="r_type" class="form-control">
                      <optgroup label="Room Type">Room Type</optgroup>
                      <option>Select Room Type</option>
                      <option value="A/c">A/c Room</option>
                      <option value="non-A/c">Non - A/c Room</option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="r_detail">Room Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-sticky-note"></i></span>
                        </div>
                      <textarea class="form-control" name="r_detail" id="r_detail" style="resize: none;" placeholder="Room Details"></textarea>
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

    <!-- edit Modal -->
      <div class="modal fade" id="editroom" tabindex="-1" role="dialog" aria-labelledby="editAdminLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="editroom"><span class="ti-pencil-alt"></span>&nbsp;Edit Admin Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_room_master/update">
                <div class="modal-body">
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="hostel">Employee's Hostel Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                          </div>
                          <input type="hidden" name="room_id" id="edit_room_id">
                          <select class="form-control" id="edit_hostel" name="hostel_id">
                            <optgroup label="Hostels Name">Select Hostel</optgroup>
                            <option value="-1">Select hostel</option>
                            <?php
                              if (isset($hostel)) {
                                foreach ($hostel as $h) {
                            ?>
                            <option value="<?php echo $h->hostel_id; ?>"><?php echo $h->hostel_name; ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="block">Employee's Block Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-border-all"></i></span>
                          </div>
                          <select class="form-control" id="edit_block" name="b_name">
                            <optgroup label="Block Name">Blocks Name</optgroup>
                            <option value="-1">Select hostel</option>
                            <?php
                              if (isset($block)) {
                                foreach ($block as $h) {
                            ?>
                            <option value="<?php echo $h->block_id; ?>"><?php echo $h->block_name; ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                <div class="form-group">
                  <label for="r_beds">Total Beds</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-hotel"></i></span>
                        </div>
                    <input type="text" id="edit_room_beds" name="r_beds" class="form-control" placeholder="Total Beds">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="r_type">Room Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-window-restore"></i></span>
                        </div>
                    <select name="r_type" id="edit_room_type" class="form-control">
                      <optgroup label="Room Type">Room Type</optgroup>
                      <option>Select Room Type</option>
                      <option value="A/c">A/c Room</option>
                      <option value="non-A/c">Non - A/c Room</option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="r_detail">Room Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-sticky-note"></i></span>
                        </div>
                      <textarea class="form-control" name="r_detail" id="edit_room_detail" style="resize: none;" placeholder="Room Details"></textarea>
                  </div>  
                </div>
                
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="Edit"><i class="fa fa-check-square-o"></i>&nbsp;SAVE</button>
              </div>  
            </form>
          </div>
        </div>
      </div>
      
      <!-- View Modal -->
<div class="modal fade" id="viewroom" tabindex="-1" role="dialog" aria-labelledby="viewAdmin" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
              <h5 class="text-warning" id="viewroom"><span class="ti-user"></span>&nbsp;Room's Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      <div class="modal-body">
        <form method="post" action="#">
                <div class="modal-body">
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="hostel">Hostel Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                          </div>
                          <select class="form-control" id="view_hostel" name="hostel_id" disabled>
                            <optgroup label="Hostels Name">Select Hostel</optgroup>
                            <option value="-1">Select hostel</option>
                            <?php
                              if (isset($hostel)) {
                                foreach ($hostel as $h) {
                            ?>
                            <option value="<?php echo $h->hostel_id; ?>"><?php echo $h->hostel_name; ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="block">Block Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-border-all"></i></span>
                          </div>
                          <select class="form-control" id="view_block" name="b_name" disabled>
                            <optgroup label="Block Name">Blocks Name</optgroup>
                            <option value="-1">Select hostel</option>
                            <?php
                              if (isset($block)) {
                                foreach ($block as $h) {
                            ?>
                            <option value="<?php echo $h->block_id; ?>"><?php echo $h->block_name; ?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                <div class="form-group">
                  <label for="view_room_beds">Total Beds</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-hotel"></i></span>
                        </div>
                    <input type="text" id="view_room_beds" name="r_beds" class="form-control" placeholder="Total Beds" disabled>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="view_room_type">Room Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-window-restore"></i></span>
                        </div>
                    <select name="r_type" id="view_room_type" class="form-control" disabled>
                      <optgroup label="Room Type">Room Type</optgroup>
                      <option>Select Room Type</option>
                      <option value="A/c">A/c Room</option>
                      <option value="non-A/c">Non - A/c Room</option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="view_room_detail">Room Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-sticky-note"></i></span>
                        </div>
                      <textarea class="form-control" name="r_detail" id="view_room_detail" style="resize: none;" placeholder="Room Details" disabled></textarea>
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

