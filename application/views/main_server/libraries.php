<?php 
$user_role = $this->session->userdata('user_role');
$user_region = $this->session->userdata('region');
	if ($user_role == 1 && $user_region == 0) {?>
<div class="col-lg-12">
	<div class="col-lg-3 col-xs-12">
        <div class="small-box bg-aqua">
            <div class="inner">
            	<h2>Definition of Terms</h2>
            </div>
            <div class="icon">
              <i class="fa fa-question"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/defterm') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12">
        <div class="small-box bg-aqua">
            <div class="inner">
            	<h2>CITE Status</h2>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/cite') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
     <div class="col-lg-3 col-xs-12">
        <div class="small-box bg-aqua">
            <div class="inner">
            	<h2>CMS Status</h2>
            </div>
            <div class="icon">
              <i class="fa fa-bookmark"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/cms') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
      <div class="col-lg-3 col-xs-12">
        <div class="small-box bg-aqua">
            <div class="inner">
            	<h2>Marital Status</h2>
            </div>
            <div class="icon">
              <i class="fa fa-venus-mars"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/marital') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="col-lg-12">
	<div class="col-lg-3 col-xs-12">
        <div class="small-box bg-green">
            <div class="inner">
            	<h2>PA Classification</h2>
            </div>
            <div class="icon">
              <i class="fa fa-check-square-o"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/classification') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12">
        <div class="small-box bg-green">
            <div class="inner">
            	<h2>PA Category</h2>
            </div>
            <div class="icon">
              <i class="fa fa-bug"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/category') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12">
        <div class="small-box bg-green">
            <div class="inner">
            	<h2>PA Legislation</h2>
            </div>
            <div class="icon">
              <i class="fa fa-gavel"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/legislation') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12">
        <div class="small-box bg-green">
            <div class="inner">
            	<h2>PA Conservation</h2>
            </div>
            <div class="icon">
              <i class="fa fa-area-chart"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/conservation') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="col-lg-3 col-xs-12">
        <div class="small-box bg-green">
            <div class="inner">
            	<h2>PA Ecosystem</h2>
            </div>
            <div class="icon">
              <i class="fa fa-pagelines"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/ecosystem') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-12">
        <div class="small-box bg-green">
            <div class="inner">
            	<h2>PA Biogeolocation</h2>
            </div>
            <div class="icon">
              <i class="fa fa-globe"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/biogeolocation') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>    
</div>
<div class="col-lg-12">   
    <div class="col-lg-6 col-xs-12">
        <div class="small-box bg-yellow">
            <div class="inner">
            	<h2>Type of Wetlands</h2>
            </div>
            <div class="icon">
              <i class="fa fa-cloud"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/wltype') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-6 col-xs-12">
        <div class="small-box bg-yellow">
            <div class="inner">
            	<h2>Wetlands Description</h2>
            </div>
            <div class="icon">
              <i class="fa fa-cloud"></i>
            </div>
            <a href="<?php echo base_url ('main_server/library/wldesc') ?>" class="small-box-footer">List of records <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<?php } ?>