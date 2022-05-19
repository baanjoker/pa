<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-default well">
			<div class="container">
				<div class="navbar-header">
					<img src="<?php echo (!empty($webSetting->logo)?base_url('bmb_assets2/img/website/logo/'.$webSetting->logo):base_url('bmb_assets2/img/website/logo/no-img.png/')) ?>">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
				        	<i class="fa fa-bars"></i>
				        </button>     
				</div>

				<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<li <?php if($this->uri->segment(1) == "" || $this->uri->segment(1) == "home"){echo 'class="active"';}?>>
							<a href="<?php echo base_url(); ?>home"> Home</a>
						</li>
						<li <?php if($this->uri->segment(1) == "about"){echo 'class="active"';}?>>
							<a href="<?php echo base_url(); ?>about"> About</a>
						</li>
						
						<li <?php if($this->uri->segment(1) == "statistics"){echo 'class="active"';}?>>
							<a href="<?php echo base_url(); ?>statistics"> Statistics</a>
						</li>
						
						<li <?php if($this->uri->segment(1) == "contact"){echo 'class="active"';}?>>
							<a href="<?php echo base_url(); ?>contact"> Contact Us</a>
						</li>
						<li <?php if($this->uri->segment(1) == "login"){echo 'class="active"';}?>>
							<a href="<?php echo base_url(); ?>login"> Login</a>
						</li>
					</ul>					
				</div>
				
			</div>
		</nav>
	</div>
</div>