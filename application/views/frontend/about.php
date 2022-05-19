<div class="container">	
	<div class="row">		
		<div class="col-md-12">
			<div class="header-about">
				<center><h1>ABOUT</h1></center><br>		
			</div>
		
		<div class="card-content">
		 	<div class="row">            
                	<div class="left-vertical-tabs center-tabs">
						<ul class="nav nav-stacked" role="tablist">
							<?php 
                            $num = 1;
                            if (!empty($about)):
                                foreach ($about as $value):
                            ?>
							<li class="<?= (($num++ == 1)?'active':null) ?>">
								<a href="<?= $value->tag ?>" role="tab" data-toggle="tab" aria-expanded="true"><?= $value->title ?></a>
							</li>
							  <?php
                                endforeach;
                            endif;
                            ?> 
						</ul>
					</div>
					 
					<div class="right-text-tabs">
						<div class="tab-content">
							<?php 
					        $num = 1;
					        if (!empty($about)):
					            foreach ($about as $value):
					        ?>
							<div class="tab-pane <?= (($num++ == 1)?'active':null) ?>" id="<?= $str = ltrim($value->tag, '#'); ?>">
								<div class="content">											
						            <div class="row justify-left">						            	
						            	<h2><?= $value->title ?></h2>
                                        <p><?= $value->description ?></p>
						            </div>
						        </div>
						    </div>
						    <?php
	                            endforeach;
	                        endif;
	                        ?> 
						</div>
					</div>
					
             
        	</div>	
		</div>
		</div>
	</div>
</div>