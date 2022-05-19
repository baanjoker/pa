<div class="container">
	<div class="row">		
		<div class="col-md-9">
			<div class="header-contact">			
				<h1>Information Graphics</h1>
			</div>
				<img src="<?php echo base_url('bmb_assets2/img/infographics.png') ?>" style="width: 100%">				

		</div>
		<div class="col-md-3">
			<div class="ribbonHead">
				<h1>Projects</h1>
				<?php foreach ($webproject as $proj): ?>
				<p><a href="#"><?php echo $proj->title; ?></a></p>
				<?php endforeach; ?>						
			</div>		
			<div class="ribbonHead">
				<h1>Information Graphics </h1>
				<a href="<?= base_url('infographic') ?>"><img src="<?php echo base_url('bmb_assets2/img/infographics.png') ?>" class="ribbonImage"></a>		
			</div>
			<div class="ribbonHead">
					<h1>Quick Links </h1>
					<a href="<?= base_url('login') ?>" target="_blank"><img src="<?php echo base_url('bmb_assets2/img/padis.png') ?>" class="ribbonImage"></a>		
				</div>
		</div>
	</div>
</div>