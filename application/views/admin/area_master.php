<!DOCTYPE html>
<html>
<head>
	<title>Area Details | Dormitory Tracker</title>
</head>
<body>
<div id="wrapper">
		<?php include 'header.php'; ?>
		<div class="clearfix"></div>
  		<div class="content-wrapper animated fadeIn">
		    <div class="container-fluid">
		      <!-- Breadcrumb-->
		     	<div class="row pt-2 pb-2">
		        	<div class="col-sm-9">
				    	<h4 class="page-title">Area Details</h4>
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
            <div class="card-header text-uppercase">Total number of Admins :</div>
            <div class="card-header">
            	 <button type="button" class="btn btn-outline-danger waves-effect m-l-auto"><i class="fa fa fa-plus"></i>
            	 	<span>Add Admin</span>
            	 </button>
            </div>
           
             <div class="card-body">
        		<div class="table-responsive">
              <table class="table table-bordered">

                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Admin Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><a href="javascript:void()" class="btn-social btn-outline-google-plus btn-social-circle waves-effect waves-light m-1"><i class="fa fa fa-trash"></i></a>&nbsp;|&nbsp;<a href="javascript:void()" class="btn-social btn-outline-facebook btn-social-circle waves-effect waves-light m-1"><i class="fa fa fa-edit"></i></a>&nbsp;</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
             </div>
          </div>
        </div>
      </div><!--End Row-->
    </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->
  </div><!--End wrapper-->
	</div>
</body>
</html>