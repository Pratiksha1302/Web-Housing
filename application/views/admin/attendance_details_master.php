<!DOCTYPE html>
<html>
<head>
  <title>Attendance Details | Dormitory Tracker</title>
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
              <h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-assignment-o"></i>&nbsp;Total number of Attendance</h4>
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
            <div class="card-header text-primary text-uppercase">Attendance Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#mymodal"><span class="ti-plus"></span>&nbsp;Add Today's Attendance</button>
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
                    <th>No</th>
                    <th>Tiffin type</th>
                    <th>Client Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  if (isset($attendance_data)) 
                  {
                    $c = '0';
                    foreach ($attendance_data as $tiffin) 
                    {
                      $c++;
                  ?>
                  <tr>
                    <td><?php echo $c; ?></td>
                    <td><?php echo $tiffin->meal_type; ?></td>
                    <td><?php echo $tiffin->reg_name; ?></td>
                    <td><?php echo $tiffin->attendance_date; ?></td>
                    <td><a href="<?php echo site_url(); ?>admin/tifin_attendance_master/delete?del=<?php echo $tiffin->attendance_id; ?>" class="btn btn-outline-primary" id="<?php echo $tiffin->attendance_id; ?>">Delete</a></td>
                  </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tiffin type</th>
                    <th>Client Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
              </table>
            </div>
            </div>
          </div>
        </div>
        </div><!-- End Row-->
      </div>

    <!-- Add Moda -->
      <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="tifinattendance" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="tifinattendance"><span class="ti-plus"></span>&nbsp;Add Today's Attendance</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/tifin_attendance_master/insert_data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="stud_name">Student Name</label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                         <span class="input-group-text"><i class="zmdi zmdi-accounts-alt"></i></span>
                      </div>
                      <select name="reg_id" id="attendance_reg_id" class="form-control">
                        <optgroup label="Client's Name">Client's Name</optgroup>
                        <option value="-1">Select Client</option>
                        <?php
                        if (isset($reg_data)) 
                        {
                          foreach ($reg_data as $reg) 
                          {
                        ?>
                        <option value="<?php echo $reg->reg_id; ?>"><?php echo $reg->reg_name; ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="attendance_date">Date</label>
                  <div class="input-group">
                    <input type="hidden" name="tiffin_id" id="tiffin_id">
                    <input type="date" id="attendance_date" name="attendance_date" class="form-control" placeholder="Ex. Non-veg" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="a_meal_type">Meal Type</label>
                  <div class="input-group">
                    <input type="text" id="a_meal_type" name="meal_type" class="form-control" placeholder="Ex. Non-veg" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="a_meal_week">Delivery Duration</label>
                  <div class="input-group">
                    <select name="meal_week" id="a_meal_week" class="form-control" readonly>
                      <optgroup label="Delivery Duration">Delivery Duration</optgroup>
                      <option value="-1">Select Duration</option>
                      <option value="5">Mon To Fri</option>
                      <option value="6">Mon To Sat</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="a_meal_qty">Total Quantity</label>
                  <div class="input-group">
                    <input type="text" id="a_meal_qty" name="meal_qty" class="form-control" placeholder="Total Quantity" readonly>
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
      </div><!-- End Model -->

      <!-- EditModa -->
      <div class="modal fade" id="editmymodal" tabindex="-1" role="dialog" aria-labelledby="tifinattendance" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="tifinattendance"><span class="ti-plus"></span>&nbsp;Edit Attendance</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#">
              <div class="modal-body">
                <div class="form-group">
                  <label for="edit_tifin_name">Tifin Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-cutlery"></i></span>
                        </div>
                    <input type="text" id="edit_tifin_name" name="tifin_name" class="form-control" placeholder="Tiffin Name">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="edit_stud_name">Student Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-accounts-alt"></i></span>
                        </div>
                      <input type="text" name="stud_name" id="edit_stud_name" class="form-control" placeholder="Student Name">
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
      </div><!-- End  Edit Model -->

      <!-- View Moda -->
      <div class="modal fade" id="viewmymodal" tabindex="-1" role="dialog" aria-labelledby="tifinattendance" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="tifinattendance"><span class="ti-plus"></span>&nbsp;Today's Attendance</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#">
              <div class="modal-body">
                <div class="form-group">
                  <label for="view_tifin_name">Tifin Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-cutlery"></i></span>
                        </div>
                    <input type="text" id="view_tifin_name" name="tifin_name" class="form-control" placeholder="Tiffin Name">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="view_stud_name">Student Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-accounts-alt"></i></span>
                        </div>
                      <input type="text" name="stud_name" id="view_stud_name" class="form-control" placeholder="Student Name">
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
      </div><!-- End View Model -->
    </div><!--End content-wrapper-->
    </div><!--End wrapper-->

  </div>
</body>
</html>

