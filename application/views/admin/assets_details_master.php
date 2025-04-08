<!DOCTYPE html>
<html>
<head>
  <title>Assets Details | Admin Dashbord</title>
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
              <h4 class="page-title text-danger text-uppercase"><i aria-hidden="true" class="fa fa-cart-plus"></i>&nbsp;Total number of Assets</h4>
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
            <div class="card-header text-primary text-uppercase">Assets Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addasset"><span class="ti-plus"></span>&nbsp;Add New Asset</button>
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
                    <th>Assets No</th>
                    <th>Assets Name</th>
                    <th>Assets Quantity</th>
                    <th>Price (Per Quantity)</th>
                    <th>Total Price</th>
                    <th>Hostel Name</th>   
                    <th>Actions</th> 
                  </tr>
                </thead>
                <tbody>
                    <?php
                        if (isset($data)) 
                        {
                            foreach ($data as $a) 
                            {
                    ?>
                    <tr>
                        <td><?php echo $a->assets_id; ?></td>
                        <td><?php echo $a->assets_name; ?></td>
                        <td><?php echo $a->assets_qty; ?></td>
                        <td><?php echo $a->price_per_qty; ?></td>
                        <td><?php echo $a->total_price; ?></td>
                        <td><?php echo $a->hostel_name; ?></td>
                        <td>
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a href="javaScript:void();" class="dropdown-item e_asset" id="<?php echo $a->assets_id; ?>" data-toggle="modal" data-target="#editasset"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                          <a href="javaScript:void();" class="dropdown-item d_asset" id="<?php echo $a->assets_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                          <a href="javaScript:void();" class="dropdown-item viewasset" data-toggle="modal" data-target="#viewasset" id="<?php echo $a->assets_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>
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
      <div class="modal fade" id="addasset" tabindex="-1" role="dialog" aria-labelledby="addassets" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addasset"><span class="ti-plus"></span>&nbsp;Add New Asset</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_assets_master/insert">
              <div class="modal-body">
                <div class="form-group">
                  <label for="asset_name">Asset Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                    <input type="text" id="asset_name" name="asset_name" class="form-control" placeholder="Asset Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="asset_qty">Asset Quantity</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-card-giftcard"></i></span>
                        </div>
                    <input type="number" id="asset_qty" name="asset_qty" class="form-control" placeholder="Total Quantity">
                  </div>  
                </div>
                 <div class="form-group">
                  <label for="asset_mrp">Quantity Price (MRP)</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                        </div>
                    <input type="text" id="asset_mrp" name="asset_mrp" class="form-control" placeholder="MRP of Asset">
                  </div>  
                </div>

                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                    <select class="form-control" id="hostel_name" name="hostel_name">
                      <option value="-1">Select Hostel Name</option>
                      <?php 
                          if (isset($hostel)) 
                          {
                              foreach ($hostel as $h) 
                              {
                      ?>
                      <option value="<?php echo $h->hostel_id; ?>"><?php echo $h->hostel_name; ?></option>
                      <?php
                              }
                          }
                      ?>

                    </select>
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

    <!-- Edit Modal -->
      <div class="modal fade" id="editasset" tabindex="-1" role="dialog" aria-labelledby="addassets" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="editasset"><span class="ti-pencil-alt"></span>&nbsp;Edit Assets details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_assets_master/update">
               <div class="modal-body">
                <div class="form-group">
                  <label for="asset_name">Asset Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                    <input type="hidden" id="edit_asset_id" name="asset_id">
                    <input type="text" id="edit_asset_name" name="asset_name" class="form-control" placeholder="Asset Name" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="asset_qty">Asset Quantity</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-card-giftcard"></i></span>
                        </div>
                    <input type="number" id="edit_asset_qty" name="asset_qty" class="form-control" placeholder="Total Quantity" >
                  </div>  
                </div>
                <div class="form-group">
                  <label for="asset_mrp">Quantity Price (MRP)</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                        </div>
                    <input type="text" id="edit_asset_mrp" name="asset_mrp" class="form-control" placeholder="MRP of Asset" >
                  </div>  
                </div>

                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                    <select class="form-control" id="edit_hostel_name" name="hostel_name" >
                      <option value="-1">Select Hostel Name</option>
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

              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="Edit"><i class="fa fa-check-square-o"></i>&nbsp;SAVE</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End container-fluid--> 

      <!-- Add Modal -->
      <div class="modal fade" id="viewasset" tabindex="-1" role="dialog" aria-labelledby="addassets" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="viewasset"><span class="ti-plus"></span>&nbsp;View Assets Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_assets_master/insert">
              <div class="modal-body">
                <div class="form-group">
                  <label for="asset_name">Asset Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                    <input type="text" id="view_asset_name" name="asset_name" class="form-control" placeholder="Asset Name" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="asset_qty">Asset Quantity</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-card-giftcard"></i></span>
                        </div>
                    <input type="number" id="view_asset_qty" name="asset_qty" class="form-control" placeholder="Total Quantity" disabled>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="asset_mrp">Quantity Price (MRP)</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                        </div>
                    <input type="text" id="view_asset_mrp" name="asset_mrp" class="form-control" placeholder="MRP of Asset" disabled>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="asset_mrp">Quantity Price (MRP)</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-inr"></i></span>
                        </div>
                    <input type="text" id="view_asset_total_price" name="asset_total_price" class="form-control" placeholder="MRP of Asset" disabled>
                  </div>  
                </div>

                <div class="form-group">
                  <label for="hostel_name">Hostel Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-balance"></i></span>
                        </div>
                    <select class="form-control" id="view_hostel_name" name="hostel_name" disabled>
                      <option value="-1">Select Hostel Name</option>
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

              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End container-fluid-->

    </div><!--End wrapper-->

  </div>
</body>
</html>

