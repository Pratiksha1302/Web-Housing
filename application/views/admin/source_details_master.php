<!DOCTYPE html>
<html>
<head>
  <title>Tiffin Source Details | Dormitory Tracker</title>
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
              <h4 class="page-title text-danger text-uppercase"><i class="zmdi zmdi-assignment-returned"></i>&nbsp;Total number of Sources</h4>
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
            <div class="card-header text-primary text-uppercase">Source Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#Addsource"><span class="ti-plus"></span>&nbsp;Add New Source</button>
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
                    <th>Source No</th>
                    <th>Source Name</th>
                    <th>Source Address</th>
                    <th>Source Phone Number</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 

                        if (isset($data)) {
                            $c = 0;
                            foreach ($data as $source) {
                              $c++;
                    ?>
                    <tr>
                        <td><?php echo $c; ?></td>
                        <td><?php echo $source->tifin_source_name; ?></td>
                        <td><?php echo $source->tifin_source_address; ?></td>
                        <td><?php echo $source->tifin_source_phone; ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="javaScript:void();" class="dropdown-item e_source" id="<?php echo $source->tifin_source_id; ?>" data-toggle="modal" data-target="#editsource"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                                <a href="javaScript:void();" class="dropdown-item d_source" id="<?php echo $source->tifin_source_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                                <a href="javaScript:void();" class="dropdown-item v_source" data-toggle="modal" data-target="#viewsource" id="<?php echo $source->tifin_source_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>

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
    </div><!--End content-wrapper-->
    <!-- Add Modal -->
      <div class="modal fade" id="Addsource" tabindex="-1" role="dialog" aria-labelledby="sourceadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="sourceadd"><span class="ti-plus"></span>&nbsp;Add New Source</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Tifin_source_master/insert">
              <div class="modal-body">
                <div class="form-group">
                  <label for="source_name">Source Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="text" id="source_name" name="tifin_source_name" class="form-control" placeholder="Source Name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="source_add">Source Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="source_add" name="tifin_source_address" placeholder="Source Address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="source_mno">Source Contact</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-phone"></i></span>
                        </div>
                      <input type="text" name="tifin_source_phone" id="source_phone" class="form-control" placeholder="Source Contact Number">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <<button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="add" id="add" value="Add"><i class="fa fa-check-square-o"></i>&nbsp;SAVE</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End Add Modal-->

    <!-- Edit Modal -->
      <div class="modal fade" id="editsource" tabindex="-1" role="dialog" aria-labelledby="sourceadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="sourceadd"><span class="ti-plus"></span>&nbsp;Add New Source</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Tifin_source_master/update">
              <div class="modal-body">
                <div class="form-group">
                  <label for="edit_source_name">Source Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="hidden" id="edit_source_id" name="tifin_source_id">
                    <input type="text" id="edit_source_name" name="tifin_source_name" class="form-control" placeholder="Source Name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="edit_source_add">Source Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="edit_source_address" name="tifin_source_address" placeholder="Source Address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="edit_source_mno">Source Contact</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-phone"></i></span>
                        </div>
                      <input type="text" name="tifin_source_phone" id="edit_source_phone" class="form-control" placeholder="Source Contact Number">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <<button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="edit" id="edit" value="Edit"><i class="fa fa-check-square-o"></i>&nbsp;SAVE</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- End Edit Modal-->

      <!-- View Modal -->
      <div class="modal fade" id="viewsource" tabindex="-1" role="dialog" aria-labelledby="sourceadd" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="viewsource"><span class="ti-plus"></span>&nbsp;Source</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#">
              <div class="modal-body">
                <div class="form-group">
                  <label for="view_source_name">Source Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-account"></i></span>
                        </div>
                    <input type="text" id="view_source_name" name="tifin_source_name" class="form-control" placeholder="Source Name" disabled="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="view_source_add">Source Address</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="zmdi zmdi-navigation"></i></span>
                        </div>
                      <textarea class="form-control" style="resize: none;" id="view_source_address" name="tifin_source_address" placeholder="Source Address" disabled=""></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="view_source_mno">Source Contact</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-phone"></i></span>
                        </div>
                      <input type="text" name="tifin_source_phone" id="view_source_phone" class="form-control" placeholder="Source Contact Number" disabled="">
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
      </div><!-- End View Modal-->    
    </div><!--End wrapper-->
  </div>
</body>
</html>

