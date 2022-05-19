
<div class="row">
	<div class="col-md-3">
	</div>
	<div class="col-md-6">	
		<div class="col-md-12">
			<div class="panel panel-info">
	            <div class="panel-heading"><div class="panel-title"><i class="fa fa-newspaper-o"></i> NEWS AND EVENT FORM</div></div>
				<div class="panel-body">
					<div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                    	<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                    	<span id="message" style="color:#fff;"></span>
                  	</div>
                	<?php echo form_open('#','class="form-horizontal" id="uploadFormNews"'); ?>

                	<?php if (!empty($news->id_advisory)): 
                    echo form_hidden('id',$news->id_advisory);
                  	else: 
                    echo form_hidden('id');
                  	endif; ?>
                    <div class="col-xs-12 columns">
                        <div class="col-xs-12 col-sm-2">
                            <?php echo form_label('Category','','style="margin:10px;"') ?>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <?php
                            $cat = [
                                ''  => '',
                                '1' => 'News',
                                '2' => 'Events'                                                               
                            ];
                            ?>  
                        <?php if (!empty($news->id_advisory)):
                            echo form_dropdown('category',$cat,$news->category,'class="form-control" id="category"');
                        else:
                            echo form_dropdown('category',$cat,'','class="form-control" id="category"');
                        endif; ?>                                                     
                        </div>
                    </div>
                	<div class="col-xs-12 columns">
                		<div class="col-xs-12 col-sm-2">
                			<?php echo form_label('Subject/Title','','style="margin:10px;"') ?>                			
                		</div>
                		<div class="col-xs-12 col-sm-10">
                		<?php if (!empty($news->id_advisory)):
                			echo form_input('subject',$news->advisory_title,'class="form-control"');
                		else:
                			echo form_input('subject','','class="form-control"');
                		endif; ?>
                			
                		</div>
                	</div>
                	<div class="col-xs-12 columns">
                		<div class="col-xs-12 col-sm-2">
                			<?php echo form_label('Detials','','style="margin:10px;"') ?>                			
                		</div>
                		<div class="col-xs-12 col-sm-10">
                		<?php if (!empty($news->id_advisory)):?>
                			<textarea name="details" cols="30" rows="10" class="form-control" id="textarea_id" style="padding-bottom: 90px;"><?php echo $news->advisory_details ?></textarea>
 							<input name="images" type="file" id="upload" class="hidden form-control" onchange=""><br>
                		<?php else: ?>
                			<textarea name="details" cols="30" rows="10" class="form-control" id="textarea_id" style="padding-bottom: 90px;"></textarea>
 							<input name="images" type="file" id="upload" class="hidden form-control" onchange=""><br>
                		<?php endif; ?>                            
 						</div>
                	</div>
                	<div class="col-xs-12 columns">
                		<div class="col-xs-12 col-sm-2">
                			<?php echo form_label('Status','','style="margin:10px;"') ?>
                		</div>
                		<div class="col-xs-12 col-sm-4">
                			<?php
                			$stat = [
								''  => '',
								'1' => 'Active',
								'2' => 'Inactive'                                           	    	 		
							];
							?>  
						<?php if (!empty($news->id_advisory)):
                			echo form_dropdown('status',$stat,$news->advisory_status,'class="form-control" id="status"');
                		else:
                			echo form_dropdown('status',$stat,'','class="form-control" id="status"');
                		endif; ?>                                               	  
                        </div>
                	</div>
                    <div class="col-xs-12 columns">
                        <div class="col-xs-12 col-sm-2">
                            <?php echo form_label('Important','','style="margin:10px;"') ?>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <?php
                            $important = [
                                ''  => '',
                                '1' => 'Yes',
                                '2' => 'No'                                                               
                            ];
                            ?>  
                        <?php if (!empty($news->id_advisory)):
                            echo form_dropdown('important',$important,$news->important,'class="form-control" id="important"');
                        else:
                            echo form_dropdown('important',$important,'','class="form-control" id="important"');
                        endif; ?>                                                     
                        </div>
                    </div>
                	<div class="col-xs-12 columns">
                		<div class="col-xs-12 col-sm-2">
                			<?php echo form_label('Author','','style="margin:10px;"');?>                			
                		</div>
                		<div class="col-xs-12 col-sm-10">
                		<?php if (!empty($news->id_advisory)):
                			echo form_input('author',$news->advisory_author,'class="form-control"');
                		else:
                			echo form_input('author','','class="form-control"');
                		endif; ?>
                		</div>
                	</div>
                	<div class="col-xs-12 columns">
                		<div class="col-xs-12 col-sm-2">
                			<?php echo form_label('Image','','style="margin:10px;"'); ?>
                		</div>
                		<div class="col-xs-12 col-sm-10">  
                        <?php if (!empty($news->id_advisory)): ?>
                          <img width="360px" height="250px" id="blah" src="<?php echo (!empty($news->advisory_image)?base_url('bmb_assets2/upload/news_image/').$news->advisory_image :base_url("bmb_assets2/upload/news_image/nophoto.jpg")) ?>" alt="your image" /><br>
                          <input type='file' name="image" id="image" value="<?php echo $news->advisory_image ?>" onchange="readURL(this);" /><br>
                          <input type="" name="old_picture" value="<?php echo $news->advisory_image ?>" class="hide">                           
                        <?php else: ?>
                            <img width="360px" height="250px" id="blah"
                              src="<?php echo base_url("bmb_assets2/upload/news_image/nophoto.jpg") ?>"alt="your image" /><br>
                              <input type='file' name="image" id="image" onchange="readURL(this);" /><br>
                              <input type="hidden" name="old_picture" value="nophoto.jpg">
                        <?php endif; ?>
                		</div>
                	</div>
                	<div class="col-xs-12 columns">
                        <?php if (!empty($news->id_advisory)): ?>
                        <?php echo form_button(array('name' => 'save_news', 'id' =>'save_news' ,'type' => 'button', 'class' => 'btn btn-success', 'content' => '<i class="fa fa-save fa-fw"></i> Update')) ?>
                        <?php else: ?>
                        <?php echo form_button(array('name' => 'save_news', 'id' =>'save_news' ,'type' => 'button', 'class' => 'btn btn-success', 'content' => '<i class="fa fa-save fa-fw"></i> Add')) ?> 
                        <?php endif; ?>

                	</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
