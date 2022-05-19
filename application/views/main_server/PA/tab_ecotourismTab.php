
<div class="tab-pane" id="ecotourism">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-hands"></i> ECO-TOURISM ACTIVITY</div></div>
				<div class="panel-body">
					<div id="responseDivImageeco" class="alert text-center" style="display:none;">
	                    <button type="button" class="close" id="clearMsgImage"><span aria-hidden="true">&times;</span></button>
	                      <span style="color:#000" id="messageimageeco"></span>
	                </div>
	                <?= form_hidden('eco_id'); ?>
					<table width="100%" border="0" class="table4">                
		                <tr valign="top" class="spaceUnder spaceOver">
		                	<td>Image</td>
		                    <td colspan="2">
			                    <img width="200px" height="180px" id="blah" src="<?php echo base_url("bmb_assets2/upload/map_image/nophoto.jpg") ?>" alt="your image" /><br>
			                    <input type='file' name="pic_eco" id="pic_eco" onchange="readURL(this);" /><br>
			                    <input type="hidden" name="old_picture" value="nophoto.jpg">                      
		                	</td>
		                </tr>
		                <tr valign="top" class="spaceUnder">
		                	<td style="width: 100px">Activity Name</td>
		                	<td><?= form_input('activities','','class="form-control"') ?></td>        	
		            	</tr>
		            	<tr valign="top" class="spaceUnder">
		            		<td style="width: 100px">Activity Description</td>
		                	<td><?= form_textarea('description','','class="form-control"') ?></td>
		            	</tr>		            	
		                <tr>
		                	<td colspan="2"><button type="button" onclick="insert_ecotourism()" class="btn btn-success  btn-flat"><i class="fa fa-save"> Insert</i></button> </td>
		                    </tr>
	                </table>			   
		        </div>
		    </div>
		</div>
		<div class="col-md-12 col-xs-12"> 
	      	<div class="table-responsive"><br>
		        <table id="tableimage" class="table table-hover">
			        <thead>
			            <tr>
			            	<th>Image</th>
			            	<th>Activities</th>
			            	<th>Descriptions</th>
			            	<th>REMOVE</th>
			            </tr>
			        </thead>
			        <tbody id="tbodyimageecotourism"></tbody>
		        </table>
	    	</div> 
	    </div>
	</div>
</div>