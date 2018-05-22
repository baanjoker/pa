<div id="loader"></div>
<section class="content">  
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><img src="<?php echo base_url('bmb_assets2/img/dashboard/caves.png') ?>" class="img-circle"></span>

        <div class="info-box-content">
          <span class="info-box-text">Caves Registered</span>
          <h5 class="info-box-number text-center">
           <?php echo $cave->total; ?>
          </h5>
          <a href="<?php echo base_url ('main_server/cave') ?>"><span class="pull-right">View</span></a>
        </div>       
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ion ion-bug"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Species Genus</span>
          <h5 class="info-box-number text-center">
           <?php echo $family->total; ?>
          </h5>
          <a href="<?php echo base_url ('main_server/wildlife/species') ?>"><span class="pull-right">View</span></a>
        </div>       
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->  
    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><img src="<?php echo base_url('bmb_assets2/img/dashboard/lock-icon.png') ?>" class="img-circle"></span>

            <div class="info-box-content">
              <span class="info-box-text">Protected Area</span>
              <h5 class="info-box-number text-center">
               <?php echo $count_pamain->total; ?>
              </h5>
              <a href="<?php echo base_url ('main_server/pamain') ?>"><span class="pull-right">View</span></a>
            </div>       
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->  

  </div>
</section>
