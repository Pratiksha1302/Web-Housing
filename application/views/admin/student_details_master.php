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
              <h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-accounts-alt"></i>&nbsp;Total number of Students</h4>
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
            <div class="card-header text-primary text-uppercase">Student Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#studadd"><i class="zmdi zmdi-account-add"></i>&nbsp;Add New Student</button>
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
                    <th>Student No</th>
                    <th>Student Name</th>
                    <th>Student City</th>
                    <th>Student Profile</th>
                    <th>Student's Government ID</th>    
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if (isset($data)) {
                      $c = 1;
                        foreach ($data as $s) {
                    ?>
                    <tr>
                        <td> <?php echo $c; ?> </td>
                        <td> <?php echo $s->reg_name; ?> </td>
                        <td> <?php echo $s->city_name; ?> </td>
                        <td>
                          <div style="height: 110px;width: 110px;">
                            <a href="<?php echo base_url(); ?>images/reg_profile/<?php echo $s->reg_stud_profile; ?>" data-fancybox="images" data-caption="Student's / Employee's Profile">
                                  <img src="<?php echo base_url(); ?>images/reg_profile/<?php echo $s->reg_stud_profile; ?>" alt="no image" class="lightbox-thumb img-thumbnail">
                            </a>
                          </div>
                        </td>
                        <td>
                          <div style="height: 110px;width: 110px;">
                            <a href="<?php echo base_url(); ?>images/reg_gov_proof/<?php echo $s->reg_gov_proof; ?>" data-fancybox="images" data-caption="Government Proof of Student / Employee">
                                  <img src="<?php echo base_url(); ?>images/reg_gov_proof/<?php echo $s->reg_gov_proof; ?>" alt="no image" class="lightbox-thumb img-thumbnail">
                            </a>
                          </div>
                        </td>
                        <td>
                          <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                    <a href="javaScript:void();" class="dropdown-item e_reg" id="<?php echo $s->reg_id; ?>" data-toggle="modal" data-target="#editreg"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                    <a href="javaScript:void();" class="dropdown-item d_reg" id="<?php echo $s->reg_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                    <a href="javaScript:void();" class="dropdown-item viewreg" data-toggle="modal" data-target="#viewreg" id="<?php echo $s->reg_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

                                  </div>    
                        </td>
                    </tr>
                    <?php
                        $c++;
                        }
                    } ?>
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
        </div><!-- End Row-->
      </div>

    <!-- Add Modal -->
      <div class="modal fade" id="studadd" tabindex="-1" role="dialog" aria-labelledby="studadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addAdminLabel"><span class="ti-plus"></span>&nbsp;Add New Student</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Student_master/insert" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="reg_name">Student Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <!-- <input type="hidden" id="reg_id" name="reg_id" > -->
                    <input type="text" id="reg_name" name="reg_name" class="form-control" placeholder="Student Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_email">Student Email</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="email" id="reg_email" name="reg_email" class="form-control" placeholder="Student Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_passwd">Student Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="reg_passwd" name="reg_passwd" class="form-control" placeholder="Enter Password">
                  </div>  
                </div>
                <div>
                  <label for="admin_gender">Student Gender</label>
                </div>
               <div class="form-group">
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="reg_gender1" name="reg_gender" value="Male">
                    <label for="reg_gender1">Male</label>
                  </div>
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="reg_gender2" name="reg_gender" value="Female">
                    <label for="reg_gender2">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_dob">Student Birthdate</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-birthday-cake"></i></span>
                        </div>
                    <input type="date" id="reg_dob" name="reg_dob" class="form-control" placeholder="">
                  </div>  
                </div>
                <div>
                  <label>Student Profile</label>
                </div>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="reg_stud_profile" id="reg_stud_profile">
                    <label class="custom-file-label" for="reg_profile">Choose Student Profile</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_blood_grp">Student Blood group</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-medkit"></i></span>
                        </div>
                    <input type="text" id="reg_blood_grp" name="reg_blood_grp" class="form-control" placeholder="Student Blood Group">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_type">Registration Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-accounts"></i></span>
                        </div>
                      <select class="form-control" name="reg_type" id="reg_type">
                          <option value="-1">Select Your Type</option>
                          <option value="Student">Student</option>
                          <option value="Employee">Employee</option>
                          <option value="Teacher">Teacher</option>
                      </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_mobile">Student Mobile Number</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-phone"></i></span>
                        </div>
                    <input type="text" id="reg_mobile" name="reg_mobile" class="form-control" placeholder="Student Mobile Number">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_address">Student Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                        </div>
                      <textarea class="form-control" id="reg_address" name="reg_address" placeholder="Student Address" style="resize: none"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="city">City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-graduation-cap"></i></span>
                        </div>
                    <select name="city_id" id="city" class="form-control">
                        <option value="-1">Select City</option>
                        <?php
                            if (isset($city)) {
                                foreach ($city as $city) {
                        ?>
                        <option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name; ?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                  </div>  
                </div>
                <div>
                  <label>Student Government Proof</label>
                </div>
                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="reg_gov_proof" id="reg_gov_proof">
                    <label class="custom-file-label" for="reg_gov_proof">Choose Government Proof</label>
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
      </div><!-- End Adding modal-->

    <!-- Edit Modal -->
      <div class="modal fade" id="editreg" tabindex="-1" role="dialog" aria-labelledby="studadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="editregLabel"><span class="ti-plus"></span>&nbsp;Edit Student Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Student_master/update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="reg_name">Student Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="hidden" id="reg_id_stud" name="reg_id">
                    <input type="text" id="edit_reg_name" name="reg_name" class="form-control" placeholder="Student Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_email">Student Email</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="email" id="edit_reg_email" name="reg_email" class="form-control" placeholder="Student Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_passwd">Student Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="edit_reg_passwd" name="reg_passwd" class="form-control" placeholder="Enter Password">
                  </div>  
                </div>
                <div>
                  <label for="admin_gender">Student Gender</label>
                </div>
               <div class="form-group">
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="edit_reg_gender1" name="reg_gender" value="Male">
                    <label for="reg_gender1">Male</label>
                  </div>
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="edit_reg_gender2" name="reg_gender" value="Female">
                    <label for="reg_gender2">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_dob">Student Birthdate</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-birthday-cake"></i></span>
                        </div>
                    <input type="date" id="edit_reg_dob" name="reg_dob" class="form-control" placeholder="">
                  </div>  
                </div>
                <div>
                  <label>Student Profile</label>
                </div>
                <div class="">
                    <input type="hidden" name="reg_profile_stud" id="reg_profile_stud">
                    <div id="old_reg_profile_stud"></div>
                </div>
                <div class="form-group">
                  <div class="">
                    <input type="file" class="" name="reg_stud_profile" id="edit_reg_stud_profile">
                    
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_blood_grp">Student Blood group</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-medkit"></i></span>
                        </div>
                    <input type="text" id="edit_reg_blood_grp" name="reg_blood_grp" class="form-control" placeholder="Student Blood Group">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_type">Registration Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-accounts"></i></span>
                        </div>
                      <select class="form-control" name="reg_type" id="edit_reg_type">
                          <option value="-1">Select Your Type</option>
                          <option value="Student">Student</option>
                          <option value="Employee">Employee</option>
                          <option value="Teacher">Teacher</option>
                      </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_mobile">Student Mobile Number</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-phone"></i></span>
                        </div>
                    <input type="text" id="edit_reg_mobile" name="reg_mobile" class="form-control" placeholder="Student Mobile Number">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_address">Student Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                        </div>
                      <textarea class="form-control" id="edit_reg_address" name="reg_address" placeholder="Student Address" style="resize: none"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="edit_city">City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-graduation-cap"></i></span>
                        </div>
                    <select name="city_id" id="edit_city" class="form-control">
                        <option value="-1">Select City</option>
                        <?php
                            if (isset($city2)) {
                                foreach ($city2 as $c) {
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
                  <label>Student Government Proof</label>
                </div>
                <div class="">
                    <div id="old_reg_gov_proof"></div>
                    <input type="hidden" name="old_reg_proof_gov" id="reg_gov_proof_stud">
                    <div id="old_reg_gov_proof_stud"></div>
                </div>
                <div class="form-group">
                  <div class="">
                    <input type="file" class="" name="reg_gov_proof" id="edit_reg_gov_proof">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" id="edit" name="edit" value="Edit"><i class="fa fa-check-square-o"></i>&nbsp;Save Changes
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End Editing modal-->

        <!-- View Modal -->
      <div class="modal fade" id="viewreg" tabindex="-1" role="dialog" aria-labelledby="studadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="viewregLabel"><span class="ti-plus"></span>&nbsp;Student Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Student_master/update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="reg_name">Student Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <!-- <input type="hidden" id="view_reg_id" name="reg_id" > -->
                    <input type="text" id="view_reg_name" name="reg_name" class="form-control" disabled="" placeholder="Student Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_email">Student Email</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="email" id="view_reg_email" name="reg_email" class="form-control" disabled="" placeholder="Student Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_passwd">Student Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="view_reg_passwd" name="reg_passwd" class="form-control" disabled="" placeholder="Enter Password">
                  </div>  
                </div>
                <div>
                  <label for="admin_gender">Student Gender</label>
                </div>
               <div class="form-group">
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="view_reg_gender1" name="reg_gender" value="Male" disabled="">
                    <label for="reg_gender1">Male</label>
                  </div>
                  <div class="icheck-material-primary icheck-inline">
                    <input type="radio" id="view_reg_gender2" name="reg_gender" value="Female" disabled="">
                    <label for="reg_gender2">Female</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="reg_dob">Student Birthdate</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-birthday-cake"></i></span>
                        </div>
                    <input type="date" id="view_reg_dob" name="reg_dob" class="form-control" disabled="" placeholder="">
                  </div>  
                </div>
                <div>
                  <label>Student Profile</label>
                </div>
                <div class="">
                    <div id="view_reg_stud_profile"></div>
                </div>
                <div class="form-group">
                  <label for="reg_blood_grp">Student Blood group</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-medkit"></i></span>
                        </div>
                    <input type="text" id="view_reg_blood_grp" name="reg_blood_grp" class="form-control" disabled="" placeholder="Student Blood Group">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_type">Registration Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-accounts"></i></span>
                        </div>
                      <select class="form-control" name="reg_type" id="view_reg_type" disabled="">
                          <option value="-1">Select Your Type</option>
                          <option value="Student">Student</option>
                          <option value="Employee">Employee</option>
                          <option value="Teacher">Teacher</option>
                      </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_mobile">Student Mobile Number</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-phone"></i></span>
                        </div>
                    <input type="text" id="view_reg_mobile" name="reg_mobile" class="form-control" placeholder="Student Mobile Number" disabled="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="reg_address">Student Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-map-marker"></i></span>
                        </div>
                      <textarea class="form-control" id="view_reg_address" name="reg_address" placeholder="Student Address" style="resize: none" disabled=""></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="edit_city">City</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-graduation-cap"></i></span>
                        </div>
                    <select name="city_id" id="view_city" class="form-control" disabled="">
                        <option value="-1">Select City</option>
                        <?php
                            if (isset($city2)) {
                                foreach ($city2 as $s) {
                        ?>
                        <option value="<?php echo $s->city_id; ?>"><?php echo $s->city_name; ?></option>
                        <?php
                                }
                            }
                        ?>
                        
                    </select>
                  </div>  
                </div>
                <div>
                  <label>Student Government Proof</label>
                </div>
                <div class="">
                    <div id="view_reg_gov_proof"></div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End View modal-->
    </div><!--End content-wrapper-->
    </div><!--End wrapper-->
  </div>
</body>
</html>

