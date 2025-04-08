<!DOCTYPE html>
<html>
<head>
  <title>Event Details | Admin Dashbord</title>
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
              <h4 class="page-title text-danger text-uppercase"><i aria-hidden="true" class="fa fa-calendar"></i>&nbsp;All Event Details</h4>
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
            <div class="card-header text-primary text-uppercase">Event Details</div>
            <div class="card-header">
              <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#addevent"><span class="ti-plus"></span>&nbsp;Add New Event</button>
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
                    <th>Event No</th>
                    <th>Event Name</th>
                    <th>Event Description</th>
                    <th>Event Photos</th>
                    <th>Event Date</th>
                    <th>Event Time</th>    
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        if (isset($data)) {
                          $c = 0;
                            foreach ($data as $e) {
                              $c++;
                    ?>
                    <tr>
                        <td><?php echo $c; ?></td>
                        <td><?php echo $e->event_name; ?></td>
                        <td><?php echo $e->event_description; ?></td>
                        <td>
                          <?php 
                              $photo = explode(",",$e->event_photos); 
                              //print_r($photo);
                              $c = count($photo);
                              for ($i=0; $i < $c-1 ; $i++) {
                          ?>
                          <div style="height: 110px;width: 110px;display: inline-flex;position: relative;">
                            <a href="<?php echo base_url(); ?>images/event_images/<?php echo $photo[$i]; ?>" data-fancybox="images" data-caption="This image has a caption">
                              <img src="<?php echo base_url(); ?>images/event_images/<?php echo $photo[$i]; ?>" alt="lightbox" class="lightbox-thumb img-thumbnail" height="10px" width="10px">
                            </a>
                          </div>
                          <?php
                              }
                          ?>
                        </td>
                        <td><?php echo $e->event_date; ?></td>
                        <td><?php echo $e->event_time; ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i aria-hidden="true" class="fa fa-bars"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a href="javaScript:void();" class="dropdown-item e_event" id="<?php echo $e->event_id; ?>" data-toggle="modal" data-target="#editevent"><span class="ti-pencil-alt"></span>&nbsp;Edit</a>

                              <a href="javaScript:void();" class="dropdown-item d_event" id="<?php echo $e->event_id; ?>"><span class="ti-trash"></span>&nbsp;Delete</a>

                              <a href="javaScript:void();" class="dropdown-item viewevent" data-toggle="modal" data-target="#viewevent" id="<?php echo $e->event_id; ?>"><i aria-hidden="true" class="fa fa-user-circle" ></i>&nbsp;View</a>
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
      <div class="modal fade" id="addevent" tabindex="-1" role="dialog" aria-labelledby="addeventdeven" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addevent"><span class="ti-plus"></span>&nbsp;Add New Event</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_event_master/insert" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="event_name">Event Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-address-card-o"></i></span>
                        </div>
                    <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Event Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="event_detail">Event Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                    <textarea class="form-control" name="event_detail" id="event_detail" placeholder="Event Description" style="resize: none;"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="event_date">Event Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar"></i></span>
                        </div>
                      <input type="date" id="event_date" name="event_date" class="form-control" placeholder="Event Date">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="event_time">Event Time</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-hourglass-half"></i></span>
                        </div>
                        <input type="time" name="event_time" id="event_time" class="form-control">
                  </div>  
                </div>
                 <div>
                  <label>Event Photos</label>
                </div>
                <div class="form-group">
                  <div class="">
                    <input type="file" class="" name="event_photos[]" id="event_photos" multiple>
                    
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-round waves-effect waves-light" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close
                  </button>
                  <button type="submit" class="btn btn-outline-success btn-round waves-effect waves-light" name="add" id="add" value="Add"><i class="fa fa-check-square-o"></i>&nbsp;Save</button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- Add Event Modal-->

      <div class="modal fade" id="editevent" tabindex="-1" role="dialog" aria-labelledby="addeventdeven" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="addevent"><span class="ti-plus"></span>&nbsp;Add New Event</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="<?php echo site_url(); ?>/admin/Hostel_event_master/update" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="event_name">Event Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-address-card-o"></i></span>
                        </div>
                    <input type="text" id="edit_event_id" name="event_id" >
                    <input type="text" id="edit_event_name" name="event_name" class="form-control" placeholder="Event Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="event_detail">Event Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                    <textarea class="form-control" name="event_detail" id="edit_event_detail" placeholder="Event Description" style="resize: none;"></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="event_date">Event Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar"></i></span>
                        </div>
                      <input type="date" id="e_event_date" name="event_date" class="form-control" placeholder="Event Date">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="event_time">Event Time</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-hourglass-half"></i></span>
                        </div>
                        <input type="time" name="event_time" id="e_event_time" class="form-control">
                  </div>  
                </div>
                 <div>
                  <label>Event Photos</label>
                </div>
                <div class="">
                  <div class="">
                    <input type="file" class="" id="edit_event_photos" multiple="">
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
      </div><!-- Add Event Modal-->

      <div class="modal fade" id="viewevent" tabindex="-1" role="dialog" aria-labelledby="vieweventdeven" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="text-primary" id="viewevent"><span class="ti-plus"></span>&nbsp;Add New Event</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           <form method="post" action="#" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="view_event_name">Event Name</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-address-card-o"></i></span>
                        </div>
                    <input type="text" id="view_event_name" name="event_name" class="form-control" placeholder="Event Name" readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="view_event_detail">Event Details</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-tag"></i></span>
                        </div>
                    <textarea class="form-control" name="event_detail" id="view_event_detail" placeholder="Event Description" style="resize: none;" readonly=""></textarea>
                  </div>  
                </div>
                <div class="form-group">
                  <label for="view_event_date">Event Date</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-calendar"></i></span>
                        </div>
                      <input type="date" id="view_event_date" name="event_date" class="form-control" placeholder="Event Date" readonly="">
                  </div>  
                </div>
                <div class="form-group">
                  <label for="view_event_time">Event Time</label>
                  <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i aria-hidden="true" class="fa fa-hourglass-half"></i></span>
                        </div>
                        <input type="time" name="event_time" id="view_event_time" class="form-control" readonly="">
                  </div>  
                </div>
                 <div>
                  <label>Event Photos</label>
                </div>
                <div class="">
                  <div id="view_event_photos">
                     
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
      </div><!-- Add Event Modal-->
    </div><!--End wrapper-->
  </div>
</body>
</html>

