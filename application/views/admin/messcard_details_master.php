<!DOCTYPE html>
<html>
<head>
  <title>Messcard Details | Admin Dashbord</title>
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
              <h4 class="page-title text-danger text-uppercase"><i aria-hidden="true" class="fa fa-calendar-check-o"></i>&nbsp;Messcard Details</h4>
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
            <div class="card-header text-primary text-uppercase">Messcard Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#messcardadd"><span class="ti-plus"></span>&nbsp;Add New Detail</button>
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
                    <th>Messcard No</th>
                    <th>Student Name</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($data)) {
                          foreach ($data as $mess) {
                    ?>
                    <tr>
                        <td><?php echo $mess->mess_card_id; ?></td>
                        <td><?php echo $mess->reg_name; ?></td>
                        <td><?php echo $mess->mess_start_date; ?></td>
                        <td><?php echo $mess->mess_end_date; ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="javaScript:void();" class="dropdown-item e_mess" id="<?php echo $mess->mess_card_id; ?>" data-toggle="modal" data-target="#editmesscard"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                <a href="javaScript:void();" class="dropdown-item d_mess" id="<?php echo $mess->mess_card_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                <a href="javaScript:void();" class="dropdown-item viewmess" data-toggle="modal" data-target="#viewmesscard" id="<?php echo $mess->mess_card_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

                            </div>
                        </td>
                    </tr>
                    <?php
                          }
                        } else {
                          # code...
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
        <div class="modal fade" id="messcardadd" tabindex="-1" role="dialog" aria-labelledby="messcardadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="messcardadd"><span class="ti-plus"></span>&nbsp;Add New Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Messcard_master/insert">
              <div class="modal-body">
                <div class="form-group">
                  <label for="mess_stud">Student Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <!-- <input type="text" id="mess_stud" name="mess_stud" class="form-control" placeholder="Student Name"> -->
                    <select id="reg_id" name="reg_id" class="form-control">
                        <option value="-1"> Select Student's name</option>
                        <?php 
                            if (isset($stud)) 
                            {
                                foreach ($stud as $key) {
                        ?>
                        <option value="<?php echo $key->reg_id; ?>"><?php echo $key->reg_name; ?></option>
                        <?php
                                 } 
                            }
                            
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mess_start_date">Starting Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar-plus-o"></i></span>
                        </div>
                    <input type="date" id="mess_start_date" name="mess_start_date" class="form-control" placeholder="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="mess_end_date">Ending Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar-times-o"></i></span>
                        </div>
                    <input type="date" id="mess_end_date" name="mess_end_date" class="form-control" placeholder="">
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
    <!-- End Add model-->

    <!-- Edit Modal -->
        <div class="modal fade" id="editmesscard" tabindex="-1" role="dialog" aria-labelledby="messcardadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="messcard"><span class="ti-plus"></span>&nbsp;Edit Messcard Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Messcard_master/update">
              <div class="modal-body">
                <div class="form-group">
                  <label for="edit_mess_stud">Student Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="hidden" id="mess_id" name="mess_id">
                    <select id="edit_mess_stud" name="mess_stud" class="form-control">
                        <option value="-1">Select Student</option>
                        <?php 

                            if (isset($stud)) {
                              foreach ($stud as $key) {
                        ?>
                        <option value="<?php echo $key->reg_id; ?>"><?php echo $key->reg_name; ?></option>
                        <?php
                              }
                            }
                         ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="edit_mess_start_date">Starting Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar-plus-o"></i></span>
                        </div>
                    <input type="date" id="edit_mess_start_date" name="mess_start_date" class="form-control" placeholder="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="edit_mess_end_date">Ending Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar-times-o"></i></span>
                        </div>
                    <input type="date" id="edit_mess_end_date" name="mess_end_date" class="form-control" placeholder="">
                  </div>  
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="edit"><i class="fa fa-check-square-o"></i>&nbsp;Save Changes</button>
              </div>
            </form>
          </div>
        </div>
        </div>
    <!-- End edit model-->

      <!-- view Modal -->
        <div class="modal fade" id="viewmesscard" tabindex="-1" role="dialog" aria-labelledby="messcardadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="messcardadd"><i aria-hidden="true" class="fa fa-calendar-check-o"></i>&nbsp;MessCard Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#">
              <div class="modal-body">
                <div class="form-group">
                  <label for="view_mess_stud">Student Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="text" id="view_mess_stud" name="mess_stud" class="form-control" placeholder="Student Name" disabled="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="view_mess_start_date">Starting Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar-plus-o"></i></span>
                        </div>
                    <input type="date" id="view_mess_start_date" name="mess_start_date" class="form-control" placeholder="" disabled="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="view_mess_end_date">Ending Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar-times-o"></i></span>
                        </div>
                    <input type="date" id="view_mess_end_date" name="mess_end_date" class="form-control" placeholder="" disabled="">
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
    <!-- End view model-->

    </div><!--End content-wrapper-->
</body>
</html>

