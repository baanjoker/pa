<?php $form_reference = array(
	'name'	=>	'reference',
	'class'	=>	'form-control',
	'placeholder'	=>	'Details');
?>
<div class="tab-pane" id="reference">
  	<div class="row">
      	<div class="col-md-12">			
        	<div class="panel panel-info">
          		<div class="panel-heading"><div class="panel-title"><i class="fa fa-info"></i> REFERENCES</div></div>
          		<div class="panel-body">          			
		          	<div class="col-md-12">
		          		<?php echo form_textarea($form_reference,$pamain->reference)?>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>
</div>