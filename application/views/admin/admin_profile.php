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
		      <!-- Breadcrumb-->
		     	<div class="row pt-2 pb-2">
		        	<div class="col-sm-9">
				    	<h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-accounts-alt"></i>&nbsp;Total number of Admins</h4>
				    	<ol class="breadcrumb">
		            	<li class="breadcrumb-item"><a href="<?php echo site_url(); ?>/admin/admin_panel">Home</a></li>
		            	<li class="breadcrumb-item"><a href="<?php echo site_url(); ?>/admin/admin_profile">Profile</a></li>
		         	</ol>
				</div>
				<div class="col-sm-3">
			       <div class="btn-group float-sm-right">
			       </div>
			    </div>
			   	</div>
			   </div>
		    <!-- End Breadcrumb-->
         <div class="row m-2">
          <?php
            if (isset($data)) 
            {
              foreach ($data as $a) 
              {
          ?>
            <div class="col-lg-4">
              <div class="card profile-card-2">
                <div class="card-img-block">
                  <img class="img-fluid p-1 img-thumbnail" src="<?php echo base_url(); ?>images/admin_profile/<?php echo $a->admin_profile; ?>" alt="Card image cap">
                </div>
                <div class="card-body pt-3">
                  <!-- <img src="<?php echo base_url(); ?>images/logo_favicon.png" alt="profile-image" class="profile"> -->
                  <h5 class="card-title" style="font-size: 22px"><?php echo $a->admin_username; ?></h5>
                  <p class="card-text" style="font-size: 22px;font-weight: bold;color:rgb(0,128,236)">
                      <?php
                          if ($a->admin_type == "super_admin") 
                          {
                              echo "S<font style='font-size:14px;text-transform:uppercase;color:black'>uper</font> A<font style='font-size:14px;text-transform:uppercase;color:black'>dmin</font>";
                          }
                          elseif ($a->admin_type == "hostel_admin") 
                          {
                              echo "H<font style='font-size:14px;text-transform:uppercase;color:black'>ostel's</font> A<font style='font-size:14px;text-transform:uppercase;color:black'>dmin</font>";
                          }
                          elseif ($a->admin_type == "pg_admin") 
                          {
                              echo "P<font style='font-size:14px;text-transform:uppercase;color:black'>g's</font> A<font style='font-size:14px;text-transform:uppercase;color:black'>dmin</font>";
                          } 
                      ?>
                  </p>
                </div>
              </div>
            </div>
          <?php  
              }
            }
          ?>
          

        <div class="col-lg-8">
          <div class="card">
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
              <div class="">
                  <div class="card-body">
                      <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                          <li class="nav-item">
                              <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link active show"><i class="icon-note"></i> <span class="hidden-xs">Edit Profile</span></a>
                          </li>
                      </ul>
                      <div class="tab-content p-3">
                          <div class="tab-pane active show" id="edit">
                              <form action="<?php echo site_url(); ?>/admin/admin_profile/update_profile" method="post" enctype="multipart/form-data">
                                <?php
                                    if (isset($data)) 
                                    {
                                        foreach ($data as $a) 
                                        {
                                ?>
                                <div class="form-group row">
                                      <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                      <div class="col-lg-9">
                                          <input class="form-control" type="hidden" name="id" value="<?php echo $a->admin_id; ?>">
                                          <input class="form-control" type="email" name="email" value="<?php echo $a->admin_username; ?>">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                      <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                      <div class="col-lg-9">
                                          <input class="form-control" type="password" name="passwd" value="<?php echo $a->admin_passwd; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                      <div class="col-lg-9">
                                          <input class="form-control" type="password" name="con_passwd" value="<?php echo $a->admin_passwd; ?>">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-3 col-form-label form-control-label">Admin's Type</label>
                                      <div class="col-lg-9">
                                          <select name="type" id="type" class="form-control" disabled="">
                                              <optgroup label="Admin's Type">Admin's Type</optgroup>
                                              <option value="super_admin"
                                              <?php if ($a->admin_type == "super_admin") 
                                                    {
                                                        echo "selected";
                                                    } 
                                              ?>
                                              >Super Admin</option>
                                              <option value="hostel_admin"
                                              <?php if ($a->admin_type == "hostel_admin") 
                                                    {
                                                        echo "selected";
                                                    } 
                                              ?>
                                              >Hostel's Admin</option>
                                              <option value="pg_admin"
                                              <?php if ($a->admin_type == "pg_admin") 
                                                    {
                                                        echo "selected";
                                                    } 
                                              ?>
                                              >PG's Admin</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                                      <div class="col-lg-9">
                                          <input class="form-control" type="hidden" name="old_profile" value="<?php echo $a->admin_type; ?>">
                                          <input class="form-control" type="file" name="profile">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label class="col-lg-3 col-form-label form-control-label"></label>
                                      <div class="col-lg-9">
                                          <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" 
                                          onclick="window.location.href = '<?php echo site_url(); ?>/admin/admin_profile'"><i class="fa fa-redo"></i>&nbsp;Reset
                                          </button>
                                          <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="Edit"><i class="fa fa-check-square-o"></i>&nbsp;SAVE CHANGES</button>
                                      </div>
                                  </div>
                                <?php
                                        }
                                    }
                                ?>
                                  
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        </div><!-- End Row-->
      </div>
    </div><!--End wrapper-->
	</div>

</body>
</html>

