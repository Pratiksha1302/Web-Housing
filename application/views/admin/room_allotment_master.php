<!DOCTYPE html>
<html>
<head>
	<title>hostel users Details | Dormitory Tracker </title>
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
              <h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-accounts-alt"></i>&nbsp;Room Allotment Master</h4>
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
        
        <div class="col-md-12">
          <div class="card">
            <div class="card-header text-primary text-uppercase">Room Allotment</div>
            <div class="card-body">
          <form method="post" action="<?php echo site_url(); ?>/admin/room_allotment_master/room_allotment" enctype="multipart/form-data">               
                <div>
                    <div class="form-row form-group">
                      <div class="col-md-12">
                        <label for="hostel">Select Hostel Name</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <select name="hostel_id" id="room_allocation_hostel" class="form-control">
                              <optgroup label="Hostel Names">Hostel Names</optgroup>
                              <option value="-1">Select Hostel</option>
                              <?php if (isset($hostel)) 
                              {
                                  foreach ($hostel as $key) 
                                  {
                              ?>
                              <option value="<?php echo $key->hostel_id; ?>"><?php echo $key->hostel_name; ?></option>
                              <?php
                                  }
                              } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-row form-group">
                      <div class="col-md-12">
                        <label for="block">Select Block Name</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <select name="block_id" id="room_allocation_block" class="form-control">
                              <optgroup label="Block Names">Block Names</optgroup>
                              <option value="-1">Select Block</option>
                              
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-row form-group">
                      <div class="col-md-12">
                        <label for="room">Select room no</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <select name="room_id" id="room_allocation_room" class="form-control">
                              <optgroup label="room Number">Room Numbers</optgroup>
                              <option value="-1">Select Room</option>
                              
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-row form-group">
                      <div class="col-md-6">
                        <label for="room_type">Room Type</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <input type="text" name="room_type" id="room_type" class="form-control" placeholder="Room type">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="total_no_of_stud">Max no. of students</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <input type="text" name="total_no_of_stud" id="total_no_of_stud" class="form-control" placeholder="Count of Maximum stud">
                        </div>
                      </div>
                    </div>

                    <div class="form-row form-group">
                      <div class="col-md-12">
                        <label for="reg_id">Select Student</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <select name="reg_id[]" class="form-control stud" id="room_allocation_stud" multiple="multiple">
                              <optgroup label="reg_id">All Students</optgroup>
                              <option value="-1">Select Student data</option>
                              <?php if (isset($reg)) 
                              {
                                  foreach ($reg as $key) 
                                  {
                              ?>
                              <option value="<?php echo $key->reg_id; ?>"><?php echo $key->reg_name; ?></option>
                              <?php
                                  }
                              } ?>
                          </select>
                        </div>
                      </div>
                    </div>                   
                </div>
              <div class="">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" id="add" name="add" value="Add"><i class="fa fa-check-square-o"></i>&nbsp;Save
                  </button>
              </div>
            </form>    
            </div>
          </div>
        </div>  
        </div><!-- End Row-->

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-primary text-uppercase">Full rooms Details.</div>
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
                      <th>No</th>
                      <th>Hostel Name</th>
                      <th>Room ID</th>
                      <th>Total Students</th>   
                      <th>Actions</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($allocated_room_data)) 
                    {
                      $c = 0;
                      foreach ($allocated_room_data as $room) 
                      {
                        $c++;
                    ?>
                    <tr>
                      <td><?php echo $c; ?></td>
                      <td><?php echo $room->hostel_name; ?></td>
                      <td><?php echo $room->room_id; ?></td>
                      <td><?php 
                            $a = explode(',', $room->reg_id);
                            echo $b = count($a);
                          ?>
                      </td>   
                      <td><a href="<?php echo site_url(); ?>admin/Room_allotment_master/delete?del=<?php echo $room->allotment_id; ?>&room=<?php echo $room->room_id; ?>" class="btn btn-outline-primary" id="<?php echo $room->allotment_id; ?>">Delete</a></td> 
                    </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Hostel Name</th>
                      <th>Room ID</th>
                      <th>Student name</th>
                      <th>Actions</th> 
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            
          </div>
        </div>
        

      </div>

    </div><!--End content-wrapper-->
    </div><!--End wrapper-->
  </div>
</body>
</html>