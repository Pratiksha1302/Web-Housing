<!DOCTYPE html>
<html>
<head>
	<title>Employee Details | Dormitory Tracker</title>
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
              <h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-accounts-alt"></i>&nbsp;Total number of Employees</h4>
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
            <div class="card-header text-primary text-uppercase">Employee Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addemp"><i class="zmdi zmdi-account-add"></i>&nbsp;Add New Employee</button>
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
                    <th>Employee No</th>
                    <th>Block name</th>
                    <th>Full Name</th>
                    <th>Joindate</th>
                    <th>Designition</th>
                    <th>Profile</th>   
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
                                <td><?php echo $rsl->emp_id; ?></td>
                                <td><?php echo $rsl->block_name; ?></td>
                                <td><?php echo $rsl->emp_name; ?></td>
                                <td><?php echo $rsl->emp_doj; ?></td>
                                <td><?php echo $rsl->emp_desig; ?></td>
                                <td><a href="<?php echo base_url(); ?>images/emp_profile/<?php echo $rsl->emp_profile; ?>" data-fancybox="images" data-caption="<?php echo $rsl->emp_name; ?>'s Profile photo" style="max-height: 80px;">
                                  <img src="<?php echo base_url(); ?>images/emp_profile/<?php echo $rsl->emp_profile; ?>" alt="lightbox" class="lightbox-thumb img-thumbnail" style="position: relative;height: 100px;width: auto;">
                                </a></td>
                                <td>
                                  <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a href="javaScript:void();" class="dropdown-item e_emp" id="<?php echo $rsl->emp_id; ?>" data-toggle="modal" data-target="#editemp"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                    <a href="javaScript:void();" class="dropdown-item d_emp" id="<?php echo $rsl->emp_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                    <a href="javaScript:void();" class="dropdown-item viewemp" data-toggle="modal" data-target="#viewemp" id="<?php echo $rsl->emp_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

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

    <!-- Employee's Add Modal -->
      <div class="modal fade" id="addemp" tabindex="-1" role="dialog" aria-labelledby="addemp" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addemp"><span class="ti-plus"></span>&nbsp;Add New Employee</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Employee_master/insert" enctype="multipart/form-data">               
                <div class="modal-body">
                    <div class="form-row form-group">
                      <div class="col-md-12">
                        <label for="emp_name">Employee Name</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <input type="text" id="emp_name" name="emp_name" class="form-control" placeholder="Employee name" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="hostel">Employee's Hostel Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                          </div>
                          <select class="form-control" id="hostel" name="hostel_id" required>
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
                          <select class="form-control" id="block" name="block_id" required>
                            <optgroup label="Block Name">Blocks Name</optgroup>
                            <option value="-1">Select Block</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="e_email">Employee Email</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                              </div>
                          <input type="email" id="emp_email" name="emp_email" class="form-control" placeholder="Employee Email" required>
                        </div>      
                      </div>
                      <div class="col-md-6 col-12">
                        <div>
                          <label>Employee Gender</label>
                        </div>
                        <select name="emp_gender" id="emp_gender" class="form-control" required>
                          <optgroup label="Gender">Gender</optgroup>
                          <option value="-1">Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option> 
                        </select>              
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="e_dob">Employee Birthdate</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-cake"></i></span>
                              </div>
                          <input type="date" id="emp_dob" name="emp_dob" class="form-control" placeholder="" required>
                        </div>      
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="e_doj">Employee Joindate</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-accounts-list"></i></span>
                              </div>
                          <input type="date" id="emp_doj" name="emp_doj" class="form-control" placeholder="" required>
                        </div>      
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="emp_desig">Employee Designition</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i aria-hidden="true" class="fa fa-id-card-o"></i></span>
                              </div>
                          <input type="text" id="emp_desig" name="emp_desig" class="form-control" placeholder="Employee Designition" required>
                        </div>  
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group  col-md-12">
                        <label for="e_add">Employee Address</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><span class="ti-map-alt"></span></span>
                              </div>
                          <textarea class="form-control" id="emp_address" name="emp_address" placeholder="Employee Address" style="resize: none;"></textarea>
                        </div>  
                      </div>      
                    </div> 
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="emp_sal">Employee Salary</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                            </div>
                            <input type="text" id="emp_salary" name="emp_salary" class="form-control" placeholder="Employee Salary" required>
                        </div>      
                      </div>
                      <div class="col-md-6 col-12">
                          <div>
                            <label>Employee Profile</label>
                          </div>
                          <div class="">
                            <input type="file" class="" id="emp_profile" name="emp_profile" required>
                          </div>        
                      </div>
                    </div> 
                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" id="add" name="add" value="Add"><i class="fa fa-check-square-o"></i>&nbsp;Save
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End container-fluid-->

    <!-- Edit Employee Modal -->
      <div class="modal fade" id="editemp" tabindex="-1" role="dialog" aria-labelledby="addemp" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="editemp"><span class="ti-pencil-alt"></span>&nbsp;Edit Employee Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Employee_master/update" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row form-group">
                      <div class="col-md-12">
                        <label for="emp_name">Employee Name</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <input type="hidden" id="edit_emp_id" name="emp_id">
                          <input type="text" id="edit_emp_name" name="emp_name" class="form-control" placeholder="Employee name">
                        </div>
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="hostel">Employee's Hostel Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-home"></i></span>
                          </div>
                          <select class="form-control" id="edit_hostel" name="hostel_id">
                            <optgroup label="Hostels Name">Select Hostel</optgroup>
                            <option value="-1">Select Hostel</option>
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
                          <select class="form-control" id="edit_block" name="block_id">
                            <optgroup label="Block Name">Blocks Name</optgroup>
                            <option value="-1">Select Block</option>
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
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="e_email">Employee Email</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                              </div>
                          <input type="email" id="edit_emp_email" name="emp_email" class="form-control" placeholder="Employee Email">
                        </div>      
                      </div>
                      <div class="col-md-6 col-12">
                        <div>
                          <label>Employee Gender</label>
                        </div>
                        <select name="emp_gender" id="edit_emp_gender" class="form-control">
                          <optgroup label="Gender">Gender</optgroup>
                          <option value="-1">Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option> 
                        </select>              
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="e_dob">Employee Birthdate</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-cake"></i></span>
                              </div>
                          <input type="date" id="edit_emp_dob" name="emp_dob" class="form-control" placeholder="">
                        </div>      
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="e_doj">Employee Joindate</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-accounts-list"></i></span>
                              </div>
                          <input type="date" id="edit_emp_doj" name="emp_doj" class="form-control" placeholder="">
                        </div>      
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="emp_desig">Employee Designition</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i aria-hidden="true" class="fa fa-id-card-o"></i></span>
                              </div>
                          <input type="text" id="edit_emp_desig" name="emp_desig" class="form-control" placeholder="Employee Designition">
                        </div>  
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group  col-md-12">
                        <label for="e_add">Employee Address</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><span class="ti-map-alt"></span></span>
                              </div>
                          <textarea class="form-control" id="edit_emp_address" name="emp_address" placeholder="Employee Address" style="resize: none;"></textarea>
                        </div>  
                      </div>      
                    </div> 
                    <div class="">
                      <div class="form-group">
                        <label for="emp_sal">Employee Salary</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                            </div>
                            <input type="text" id="edit_emp_salary" name="emp_salary" class="form-control" placeholder="Employee Salary">
                        </div>      
                      </div>
                    </div>
                      <div class="form-group">
                          <div>
                            <label>Employee Profile</label>
                          </div>
                            <div id="show_emp_profile"></div>
                          <div class="input-group">
                            <input type="hidden" class="" id="old_emp_profile" name="old_emp_profile">
                            <input type="file" class="" id="edit_emp_profile" name="emp_profile">
                          </div>        
                      </div>
             
                </div>              
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" id="edit" name="edit" value="edit"><i class="fa fa-check-square-o"></i>&nbsp;Save Changes
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End container-fluid-->

    <!-- View employee Modal -->
      <div class="modal fade" id="viewemp" tabindex="-1" role="dialog" aria-labelledby="addemp" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="viewemp"><span class="ti-user"></span>&nbsp; Employee Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row form-group">
                      <div class="col-md-12">
                        <label for="emp_name">Employee Name</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-account-o"></i></span>
                              </div>
                          <input type="text" id="view_emp_name" name="emp_name" class="form-control" placeholder="Employee name" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="hostel">Employee's Hostel Name</label>
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
                        <label for="block">Employee's Block Name</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="zmdi zmdi-border-all"></i></span>
                          </div>
                          <select class="form-control" id="view_block" name="block_id" disabled>
                            <optgroup label="Block Name">Blocks Name</optgroup>
                            <option value="-1">Select hostel</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="e_email">Employee Email</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                              </div>
                          <input type="email" id="view_emp_email" name="emp_email" class="form-control" placeholder="Employee Email" disabled>
                        </div>      
                      </div>
                      <div class="col-md-6 col-12">
                        <div>
                          <label>Employee Gender</label>
                        </div>
                        <select name="emp_gender" id="view_emp_gender" class="form-control" disabled>
                          <optgroup label="Gender">Gender</optgroup>
                          <option value="-1">Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option> 
                        </select>              
                      </div>
                    </div>
                    <div class="form-row form-group">
                      <div class="col-md-6 col-12">
                        <label for="e_dob">Employee Birthdate</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-cake"></i></span>
                              </div>
                          <input type="date" id="view_emp_dob" name="emp_dob" class="form-control" placeholder="" disabled>
                        </div>      
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="e_doj">Employee Joindate</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="zmdi zmdi-accounts-list"></i></span>
                              </div>
                          <input type="date" id="view_emp_doj" name="emp_doj" class="form-control" placeholder="" disabled>
                        </div>      
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="emp_desig">Employee Designition</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i aria-hidden="true" class="fa fa-id-card-o"></i></span>
                              </div>
                          <input type="text" id="view_emp_desig" name="emp_desig" class="form-control" placeholder="Employee Designition" disabled>
                        </div>  
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group  col-md-12">
                        <label for="e_add">Employee Address</label>
                        <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><span class="ti-map-alt"></span></span>
                              </div>
                          <textarea class="form-control" id="view_emp_address" name="emp_address" placeholder="Employee Address" style="resize: none;" disabled></textarea>
                        </div>  
                      </div>      
                    </div> 
                    <div class="">
                      <div class="form-group">
                        <label for="emp_sal">Employee Salary</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                            </div>
                            <input type="text" id="view_emp_salary" name="emp_salary" class="form-control" placeholder="Employee Salary" disabled>
                        </div>      
                      </div>
                      <div class="form-group">
                          <div>
                            <label>Employee Profile</label>
                          </div>
                          <div id="view_emp_profile"></div>        
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
      </div><!-- End container-fluid-->

    </div><!--End content-wrapper-->
    </div><!--End wrapper-->
  </div>
</body>
</html>