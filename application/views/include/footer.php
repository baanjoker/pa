<footer>
	<div class="container">
		<!-- <div class="row _auto-960"> -->
    <div class="row">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
				<div class="row">
					<div class="col-xs-2 col-sm-2 pr0">
              <img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/denr-emb-logo.gif')) ?>">
          </div>
          <div class="col-xs-10 col-sm-8">
            <div class="footer-content">
              <?php echo $setting->copyright_text; ?>
              <hr>
              <p>Republic of the Philippines</p>
              <h5><?php echo $setting->meta_tag; ?></h5>
              <h4><?php echo $setting->meta_keyword; ?></h4>
              <p><?php echo $setting->address; ?></p>               						
              <p>Tel No.: <?php echo $setting->phone; ?></p> 
              <p>Email address:<?php echo $setting->email; ?> </p> 
            </div>
          </div>                		
				</div>
			</div>

			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
        <h5 class="site">Site Directory</h5>
          <hr>
          <ul>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>office">View Offices</a></li>                          
	         <li><a href="<?php echo base_url(); ?>faq">FAQ</a></li>
          </ul>  
      </div>
		</div>
	</div>
</footer>