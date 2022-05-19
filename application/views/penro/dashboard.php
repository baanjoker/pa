<div class="card">
	<div class="card-content">
		<div class="table-responsive">
			<?php foreach ($pamain as $datas): ?>
			<table class="table table-bordered table-bordered">
				<thead>
					<tr>
						<th colspan="2" style="font-weight: bold; font-size: 24px;text-transform: uppercase;"><?php echo $datas->pa_name ?></th>
	            	</tr>
	            </thead>
	            <tbody>
	            	<tr>
	              		<td>Category</td>
	              		<td><?php echo $datas->categoryName?></td>
	            	</tr>
	            	<tr>
	            	  	<td>Classification</td>
	            	  	<td><?php echo  $datas->nipDesc?></td>
	            	</tr>
	            	<tr>
	            	  	<td>Conservation Area</td>
	            	  	<td><?php echo  $datas->CPABIdesc?></td>
	            	</tr>
	            	<tr>
	            	  	<td>Terrestrial Area</td>
	            	  	<td><?php echo  $datas->terrestrial?></td>
	            	</tr>
	            	<tr>
	            	  	<td>Marine Area</td>
	            	  	<td><?php echo  $datas->marine_area?></td>
	            	</tr>
	            	<tr>
	            	  	<td>Total Area</td>
	            	  	<td><?php echo  $datas->marine_area + $datas->terrestrial?></td>
	            	</tr>
	            	<tr>                  
	              		<td colspan="2">
                    		<a type='button' class='btn btn-flat btn-warning' href='./report/printpdf/pdffilepa/<?php echo $datas->generatedcode ?>' target='_blank' title='PDF' data-id="<?php echo $datas->generatedcode ?>"><i class='ti-file'></i></a>
                  		</td>                  
                	</tr>
            	</tbody>
        	</table>
        	<?php endforeach ?>
    	</div> 
	</div>
</div>