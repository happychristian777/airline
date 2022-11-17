<div id="content-wrapper">
<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Admin</a>
    </li>
    <li class="breadcrumb-item active">Manage Bookings</li>
  </ol>
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      View/Cancel Bookings</div>
    <div class="card-body">
  <!--<div class="card-body1">-->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
           <!-- <th>passserial</th>-->
              <th>Passenger Details</th>
              <th>Flight Details</th>
              <th>Cancel Booking</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>Passenger Details</th>
              <th>Flight Details</th>
              <th>Cancel Booking</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach($booking as $row){ ?>
            <tr>
              <td><?php echo $row->pasnum; ?></td>
              <td><?php echo $row->flightnum; ?></td>
              <td><a href="<?php echo base_url();?>Admin/delBook?id=<?php echo $row->bookid;?>">CANCEL</a></td>
    
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<!-- Sticky Footer -->
</div>