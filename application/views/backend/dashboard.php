    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url();?>Admin/dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3" >
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
          
                </div>
                <div class="mr-5">No. of pilots</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" style="background:grey;" href="#">
                <span class="float-left"><?php echo $pilots; ?></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
           
                </div>
                <div class="mr-5">No. of Flights</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" style="background:grey;" href="#">
                <span class="float-left"><?php echo $flights; ?></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
     
                </div>
                <div class="mr-5">No. of Passengers</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" style="background:grey;" href="#">
                <span class="float-left"><?php echo $passenger; ?></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        
          </div>
        </div>
       
      <!-- /.container-fluid -->

     