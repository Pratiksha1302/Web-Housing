<!DOCTYPE html>
<html>
<head>
  <title>Rent Details | Dormitory Tracker</title>
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
              <h4 class="page-title text-danger text-uppercase"><i aria-hidden="true" class="fa fa-inr"></i>&nbsp;Total Rents</h4>
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
            <div class="card-header text-primary text-uppercase">Rent Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#mymodal"><span class="ti-plus"></span>&nbsp;Add New Rent Package</button>
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
                    <th>Rent No</th>
                    <th>Rent Amount</th>
                    <th>Owner Name</th>
                  </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            </div>
            </div>
          </div>
        </div>
        </div><!-- End Row-->
      </div>

    <!-- Add Modal -->
      <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="rentadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="rentadd"><i aria-hidden="true" class="fa fa-inr"></i>&nbsp;Add New Rent Package</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#">
              <div class="modal-body">
                <div class="form-group">
                  <label for="rent_amt">Rent Amount</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                        </div>
                    <input type="text" id="rent_amt" name="rent_amt" class="form-control" placeholder="Rent Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="rent_owner_name">Owner Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="text" id="rent_owner_name" name="rent_owner_name" class="form-control" placeholder="PG Owner Name">
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal">Close
                  </button>
                  <input type="submit" name="add" id="submit" class="btn btn-outline-success btn-round waves-effect waves-light" value="Add">
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

