<!DOCTYPE html>
<?php
    
?>
<html>
<head>
	<title>Admin Dashbord - Dormitory Tracker</title>
</head>
<body>
	<div id="wrapper">
		<?php include 'header.php'; ?>
		<!-- <div class="clearfix"></div> -->
  		<div class="content-wrapper animated fadeIn">
		    <div class="container-fluid">

          <!-- dashboard content start -->
          <!-- row start -->
          <div class="row mt-3">
             <div class="col-12 col-lg-6 col-xl-3">
               <div class="card gradient-deepblue">
                 <div class="card-body">
                    <h5 class="text-white mb-0">
                      <?php
                      if (isset($total_hostels)) 
                      {
                        echo $total_hostels;
                      }
                      ?>
                      <span class="float-right">
                        <i class="fa fa-building-o"></i>
                      </span>
                    </h5>
                    <h3 class="mb-0 text-white small-font">Total Number of Hostels <span class="float-right"></span></h3>
                  </div>
               </div> 
             </div>
             <div class="col-12 col-lg-6 col-xl-3">
               <div class="card gradient-orange">
                 <div class="card-body">
                    <h5 class="text-white mb-0">
                      <?php 
                      if (isset($total_pg)) 
                      {
                        echo $total_pg;
                      }
                      ?>
                      <span class="float-right">
                        <i class="fa fa-home"></i>
                      </span>
                    </h5>
                    <h3 class="mb-0 text-white small-font">Total Number of PGs<span class="float-right"></span></h3>
                  </div>
               </div>
             </div>
             <div class="col-12 col-lg-6 col-xl-3">
               <div class="card gradient-ohhappiness">
                  <div class="card-body">
                    <h5 class="text-white mb-0">
                    <?php
                    if (isset($total_users)) 
                      {
                        echo $total_users;
                      }
                    ?> 
                      <span class="float-right">
                        <i class="fa fa-group"></i>
                      </span>
                    </h5>
                    <h3 class="mb-0 text-white small-font">Total Number of Users<span class="float-right"></span></h3>
                  </div>
               </div>
             </div>
             <div class="col-12 col-lg-6 col-xl-3">
               <div class="card gradient-ibiza">
                  <div class="card-body">
                    <h5 class="text-white mb-0">
                      <?php
                      if (isset($total_owners)) 
                      {
                        echo $total_owners;
                      }
                      ?>
                      <span class="float-right">
                        <i class="icon-user"></i>
                      </span>
                    </h5>
                    <h3 class="mb-0 text-white small-font">Total Number of Owners<span class="float-right"></span></h3>
                  </div>
               </div>
             </div>
          </div>
          <!-- end row -->
		      
          <!-- Breadcrumb-->
		     	<div class="row pt-2 pb-2">
		        	<div class="col-sm-9">
				    	<h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-accounts-alt"></i>&nbsp;Total number of Admins</h4>
				    	<ol class="breadcrumb">
		            	<li class="breadcrumb-item"><a href="<?php echo site_url(); ?>/admin/admin_panel">Home</a></li>
		            	<li class="breadcrumb-item"><a href="#"></a></li>
                  <?php 
                      // if (isset($_COOKIE['username'])) 
                      // {
                      //     echo $_COOKIE['username'];
                      // }
                  ?>
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
              <div class="card-header text-primary text-uppercase">Admin Details</div>
              <div class="card-header">
                <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#mymodal"><i class="zmdi zmdi-account-add"></i>&nbsp;Add New Admin</button>
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
                <div class="alert alert-danger alert-dismissible animated bounceIn" role="alert" id="alertdel" >
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
                      <th>Admin No</th>
                      <th>Admin Profile</th>
                      <th>Admin Username</th>
                      <th>Admin Type</th>
                      <th>Admin Status</th>
                      <th>Actions</th>    
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                        if (isset($dataall)) {
                          $c = 0;
                          foreach ($dataall as $res) {
                            $c++;
                       ?>
                       <tr>
                         <td><?php echo $c; ?></td>
                         <td>
                            
                            <div style="height: 100px;width: 100px;position: relative;">
                              <a href="<?php echo base_url(); ?>images/admin_profile/<?php echo $res->admin_profile; ?>" data-fancybox="images" data-caption="Admin Profile">
                                    <img src="<?php echo base_url(); ?>images/admin_profile/<?php echo $res->admin_profile; ?>" alt="no image" class="lightbox-thumb img-thumbnail" style="position: relative;height: 100px;width: auto;">
                              </a>
                            </div>
                         </td>
                         <td><?php echo $res->admin_username; ?></td>
                         <td><?php echo $res->admin_type; ?></td>
                         <td><?php echo $res->admin_status; ?></td>
                         <td>
                          <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a href="javaScript:void();" class="dropdown-item e_admin" id="<?php echo $res->admin_id; ?>" data-toggle="modal" data-target="#adminedit"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                      <a href="javaScript:void();" class="dropdown-item d_admin" id="<?php echo $res->admin_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                      <a href="javaScript:void();" class="dropdown-item viewadmin" data-toggle="modal" data-target="#viewAdmin" id="<?php echo $res->admin_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

                      </div>
                         </td>
                       </tr>
                     <?php }} ?>
                  </tbody>
              </table>
              </div>
              </div>
            </div>
          </div>
        </div><!-- End Row-->

    </div>

    <!-- Admin Add Modal -->
      <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addAdminLabel"><span class="ti-plus"></span>&nbsp;Add New Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/admin_panel/AddNewAdmin" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="admin_username">Admin's Username</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="text" id="username" name="admin_username" class="form-control" placeholder="Username">
                  </div>
                  <input type="hidden" id="a_id" name="a_id">
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Admin's Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="passwd" name="admin_passwd" class="form-control" placeholder="Password">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="type">Admin's Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <select name="admin_type" id="type" class="form-control">
                        <optgroup label="Admin's Type">Admin's Type</optgroup>
                        <option value="super_admin">Super Admin</option>
                        <option value="hostel_admin">Hostel's Admin</option>
                        <option value="pg_admin">PG's Admin</option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Admin's Profile</label>
                  <div class="input-group">
                      <input type="file" id="profile" name="admin_profile" class="form-control">
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
      </div><!-- End Add admin modal-->

    <!-- Admin edit Modal -->
      <div class="modal fade" id="adminedit" tabindex="-1" role="dialog" aria-labelledby="editAdminLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="editAdminLabel"><span class="ti-pencil-alt"></span>&nbsp;Edit Admin Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/admin_panel/update_admin" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="admin_username">Admin's Username</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="text" id="edit_username" name="admin_username" class="form-control" placeholder="Username">
                  </div>
                  <input type="hidden" id="edit_a_id" name="admin_id">
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Admin's Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="edit_passwd" name="admin_passwd" class="form-control" placeholder="Password">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="type">Admin's Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <select name="admin_type" id="edit_type" class="form-control">
                        <optgroup label="Admin's Type">Admin's Type</optgroup>
                        <option value="super_admin">Super Admin</option>
                        <option value="hostel_admin">Hostel's Admin</option>
                        <option value="pg_admin">PG's Admin</option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Admin's Profile</label>
                  <div class="input-group">
                      <input type="hidden" id="old_admin_profile" name="old_admin_profile">
                      <div id="admin_profile"> </div>
                      <input type="file" id="edit_profile" name="admin_profile" class="form-control">
                  </div>  
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="Edit"><i class="fa fa-check-square-o"></i>&nbsp;SAVE CHANGES</button>
              </div>
            </form>
          </div>
        </div>
      </div>

  <!-- View Modal -->
<div class="modal fade" id="viewAdmin" tabindex="-1" role="dialog" aria-labelledby="viewAdmin" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
              <h5 class="text-warning" id="viewAdmin"><span class="ti-user"></span>&nbsp;Admin's Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
      <div class="modal-body">
        <form method="post" action="#" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="admin_username">Admin's Username</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                        </div>
                    <input type="text" id="view_username" name="admin_username" class="form-control" placeholder="Username" disabled="">
                  </div>
                  <input type="hidden" id="view_a_id" name="a_id">
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Admin's Password</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                        </div>
                    <input type="password" id="view_passwd" name="admin_passwd" class="form-control" placeholder="Password" disabled="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="type">Admin's Type</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <select name="admin_type" id="view_type" class="form-control" disabled="">
                        <optgroup label="Admin's Type">Admin's Type</optgroup>
                        <option value="super_admin">Super Admin</option>
                        <option value="hostel_admin">Hostel's Admin</option>
                        <option value="pg_admin">PG's Admin</option>
                    </select>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="admin_passwd">Admin's Profile</label>
                  <div id="view_profile">
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

</body>
</html>

