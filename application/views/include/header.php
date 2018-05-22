<?= $this->load->helper('url'); ?>
<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-default well">
			<div class="container">
				<div class="navbar-header">					
					<img src="<?= base_url('bmb_assets2/img/HeaderAnnexCGovWebsite.png') ?>" class="img-responsive logo">
					 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                             <span class="sr-only">Toggle navigation</span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                        </button>           
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo base_url('home'); ?>"> HOME</a>
						</li>
						<li>
							<a href=""> ABOUT</a>
						</li>
						<li>
							<a href=""> CONTACT US</a>
						</li>

						<li>
							<a href="<?php echo base_url(); ?>login"> LOGIN</a>
						</li>
					</ul>					
				</div>

			</div>
		</nav>
	</div>
</div>