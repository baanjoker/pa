<?php echo form_open_multipart('#','class="form-horizontal" id="MainForm" enctype="multipart/form-data"');
if (!empty($pamain->id_main)):
 echo form_hidden('id_main',$pamain->id_main);
else:
 echo form_hidden('id_main');
endif;

function generateRandomString($length = 11)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $charlength = strlen($char);
        $randomString = '';
        for ($i=0; $i < $length; $i++) {
            $randomString .= $char[mt_rand(0, $charlength -1)];
        }
        return $randomString;
    }

include 'file.php';
?>

<?php if (!empty($pamain->id_main)): ?>
  <input type="text" name="gencode" class="hide" value="<?php echo $pamain->generatedcode ?>" id="codegen">
<?php else: ?>
  <input type="text" name="gencode" class="hide" value="<?php echo generateRandomString() ?>" id="codegen">
<?php endif ?>

<section class="content">
  <div class="row">
    <div class="col-md-2">
      <div class="box box-primary">
        <li class="list-group-item" style="text-align: center"><b>MAIN BUTTON</b></li>
        <?php if (!empty($pamain->id_main)) {
              echo '<a type="button" name="btnmain" id="submitlocation" onclick="SaveMain()" class="btn btn-success  btn-flat btn-block"><i class="fa fa-save"> UPDATE</i></a>';
            } else {
              echo '<a type="button" name="btnmain" id="submitlocation" onclick="SaveMain()" class="btn btn-primary  btn-flat btn-block"><i class="fa fa-save"> SAVE</i></a>';
            }
         ?>
        <a href="<?php echo base_url('users/protectedarea/pamain') ?>" class="btn btn-warning btn-block"><b>BACK TO LIST</b></a><br>
      </div>
    </div>
    <div class="col-md-10">
      <div class="nav-tabs-custom">
        <div id="responseDivMain" class="alert text-center" style="display:none;">
          <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
          <span style="color:#fff" id="messagemain"></span>
        </div>
          <ul class="nav nav-tabs tabs">
            <li class="active" rel="geninfo">General Information</li>

            <?php if (!empty($pamain->id_main)): ?>
              <?php if ($pamain->pamb_approve == '1'): ?>
              <li rel="pambmember" id="pambmemberTabs">PAMB Member</li>
              <?php else: ?>
              <li rel="pambmember" id="pambmemberTab">PAMB Member</li>
              <?php endif ?> 
            <?php else: ?>
            <li rel="pambmember" id="pambmemberTab">PAMB Members</li>
            <?php endif ?>

            <li rel="location">Location</li>
            <li rel="proclamation">Proclamation</li>
            <li rel="biological">Biological Feature</a></li>
            <li rel="physical">Physical Feature</a></li>
            <li rel="antropology">Antropology</a></li>
            <li rel="economics">Socio-econimic</a></li>
            <li rel="uses">Landuses</a></li>
            <li rel="threats">Threats</a></li>
            <li rel="projects">Projects</a></li>
            <li rel="occupants">Occupants</a></li>
            <li rel="visitors">Visitors</a></li>
            <li rel="maps">Maps</a></li>
            <li rel="reference">Reference</a></li>
          </ul>
        <div class="tab-content tab_container">
          <h4 class="d_active tab_drawer_heading" rel="geninfo">General Information</h4>            
          <div class="tab-pane active tab_content" id="geninfo">            
            <div class="row">
              <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">  
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>General Information</label></div>
                  <td class="spaceRight" style="width: 100px;">Name</td>
                  <td><?php if (!empty($pamain->id_main)):
                       echo form_input('pa_name',$pamain->pa_name,'placeholder="Name of Protected Area" class="form-control"');
                      else:
                       echo form_input('pa_name','','placeholder="Name of Protected Area" class="form-control"');
                      endif;
                      ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">                           
                  <td class="spaceRight">Classification</td>
                  <td><?php if (!empty($pamain->id_main)):
                       echo form_dropdown('nip_id',$classList,$pamain->nip_id,'class="form-control"');
                      else:
                       echo form_dropdown('nip_id',$classList,'','class="form-control"');
                      endif;
                      ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">                           
                  <td class="spaceRight">Category</td>
                  <td><?php if (!empty($pamain->id_main)):
                       echo form_dropdown('pacategory_id',$categoryList,$pamain->pacategory_id,'class="form-control"');
                      else:
                       echo form_dropdown('pacategory_id',$categoryList,'','class="form-control"');
                      endif;
                      ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">                           
                  <td class="spaceRight">Conservation Area</td>
                  <td><?php if (!empty($pamain->id_main)):
                       echo form_dropdown('cpabi_id',$cpabiList,$pamain->cpabi_id,'class="form-control"');
                      else:
                       echo form_dropdown('cpabi_id',$cpabiList,'','class="form-control"');
                      endif;
                      ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">                           
                  <td class="spaceRight">Biogeographic Zone</td>
                  <td><?php if (!empty($pamain->id_main)):
                       echo form_dropdown('tbz_id',$zoneList,$pamain->tbz_id,'class="form-control"');
                      else:
                       echo form_dropdown('tbz_id',$zoneList,'','class="form-control"');
                      endif;
                      ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">                           
                  <td class="spaceRight">IUCN</td>
                  <td><?php if (!empty($pamain->id_main)):
                       echo form_dropdown('iucncode',$iucnList,$pamain->iucn_id,'class="form-control"');
                      else:
                       echo form_dropdown('iucncode',$iucnList,'','class="form-control"');
                      endif;
                      ?>
                  </td>
                </tr>
              </table>
              <div class="table-responsive">
                <table width="100%" border="1" class="table4">  
                  <thead>
                    <tr valign="top" class="spaceUnder spaceOver">
                      <th style="text-align:center">Approved PAMB</th>
                      <th style="text-align:center">IPAF Established</th>
                      <th style="text-align:center">World Heritage</th>
                      <th style="text-align:center">Transboundary</th>
                      <th style="text-align:center">Ramsar</th>                  
                    </tr>
                  </thead>
                  <tbody>
                    <tr valign="top" class="spaceUnder spaceOver">
                      <?php if (!empty($pamain->id_main)): ?>
                        <td style="text-align:center"><?= form_checkbox('pambcheck',$pamain->pamb_approve,set_value('pambcheck',$pamain->pamb_approve),'id="dateApprovePMB"') ?></td>
                        <td style="text-align:center"><?= form_checkbox('ipaf',$pamain->ipaf,set_value('ipaf',$pamain->ipaf)) ?></td>
                        <td style="text-align:center"><?= form_checkbox('whsites',$pamain->heritage,set_value('whsites',$pamain->heritage)) ?></td>
                        <td style="text-align:center"><?= form_checkbox('tbsites',$pamain->transboundary,set_value('tbsites',$pamain->transboundary)) ?></td>
                        <td style="text-align:center"><?= form_checkbox('ramsasites',$pamain->ramsar,set_value('ramsasites',$pamain->ramsar)) ?></td>                    
                      <?php else: ?>
                        <td style="text-align:center"><?= form_checkbox('pambcheck','',set_value('pambcheck'),'id="dateApprovePMB"') ?></td>
                        <td style="text-align:center"><?= form_checkbox('ipaf','',set_value('ipaf')) ?></td>
                        <td style="text-align:center"><?= form_checkbox('whsites','',set_value('whsites')) ?></td>
                        <td style="text-align:center"><?= form_checkbox('tbsites','',set_value('tbsites')) ?></td>
                        <td style="text-align:center"><?= form_checkbox('ramsasites','',set_value('ramsasites')) ?></td>
                      <?php endif; ?>                  
                    </tr>
                  </tbody>
                </table>
              </div>           
              <div class="checkbox">
              <?php if (!empty($pamain->id_main)): ?>
                <?php if ($pamain->pamb_approve == TRUE): ?>
                  <div id="dateOrganizeds">
                    <div class="form-group">
                      <label for="inputNIP" class="col-sm-2 col-xs-12 control-label">Date approved</label>
                      <div class="col-sm-2 col-xs-4">
                        <?php echo form_dropdown('date_monthPAMB',$monthList,$pamain->pamb_month,'class="form-control" id=""'); ?>
                      </div>
                      <div class="col-sm-2 col-xs-4">
                        <?php echo form_dropdown('date_dayPAMB',$dayList,$pamain->pamb_day,'class="form-control" id=""'); ?>
                      </div>
                      <div class="col-sm-2 col-xs-4">
                        <?php echo form_dropdown('date_yearPAMB',$yearList,$pamain->pamb_year,'class="form-control" id=""'); ?>
                      </div>
                    </div>
                    <div class="danger">
                      <p style="font-style: italic;color: red;background-color: #ffdddd;border-left: 6px solid #f44336;"><strong>Note!</strong> PAMB Members tab activated.</p>
                    </div>
                  </div>
                  <?php else: ?>
                    <div id="dateOrganized">
                      <div class="form-group">
                        <label for="inputNIP" class="col-sm-2 col-xs-12 control-label">Date approved</label>
                        <div class="col-sm-2 col-xs-4">
                          <?php echo form_dropdown('date_monthPAMB',$monthList,$pamain->pamb_month,'class="form-control" id=""'); ?>
                        </div>
                        <div class="col-sm-2 col-xs-4">
                          <?php echo form_dropdown('date_dayPAMB',$dayList,$pamain->pamb_day,'class="form-control" id=""'); ?>
                        </div>
                        <div class="col-sm-2 col-xs-4">
                          <?php echo form_dropdown('date_yearPAMB',$yearList,$pamain->pamb_year,'class="form-control" id=""'); ?>
                        </div>
                      </div>
                      <div class="danger">
                        <p style="font-style: italic;color: red;background-color: #ffdddd;border-left: 6px solid #f44336;"><strong>Note!</strong> PAMB Members tab activated.</p>
                      </div>
                    </div>
                  <?php endif ?>
                <?php else: ?>
                  <div id="dateOrganized">
                      <div class="form-group">
                        <label for="inputNIP" class="col-sm-2 col-xs-12 control-label">Date approved</label>
                        <div class="col-sm-2 col-xs-4">
                          <?php echo form_dropdown('date_monthPAMB',$monthList,'','class="form-control" id="dateMonthPAMB"'); ?>
                        </div>
                        <div class="col-sm-2 col-xs-4">
                          <?php echo form_dropdown('date_dayPAMB',$dayList,'','class="form-control" id="dateDayPAMB"'); ?>
                        </div>
                        <div class="col-sm-2 col-xs-4">
                          <?php echo form_dropdown('date_yearPAMB',$yearList,'','class="form-control" id="dateYearPAMB"'); ?>
                        </div>
                      </div>
                      <div class="danger">
                        <p style="font-style: italic;color: red;background-color: #ffdddd;border-left: 6px solid #f44336;"><strong>Note!</strong> PAMB Members tab activated.</p>
                      </div>
                    </div>
                <?php endif ?>
              </div>
              <div class="table-responsive">
                <table width="100%" border="1" class="table4"> 
                    <thead>
                      <tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3" class="_dxHide"><label>Status of NIPAS Implementation</label></div>
                        <th style="text-align:center">Compilation of Maps</th>
                        <th style="text-align:center">Resource Profile</th>
                        <th style="text-align:center">Initial PA Plan</th>
                        <th style="text-align:center">Regional Review</th>
                        <th style="text-align:center">National Review</th>
                        <th style="text-align:center">Presidential Proclamation</th>
                        <th style="text-align:center">Congressional Enactment</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php if (!empty($pamain->id_main)): ?>
                          <td style="text-align:center"><?= form_checkbox('compilemap',$pamain->nipas_compilemap,set_value('compilemap',$pamain->nipas_compilemap)) ?></td>
                          <td style="text-align:center"><?= form_checkbox('resourceprofile',$pamain->nipas_resourceprofile,set_value('resourceprofile',$pamain->nipas_resourceprofile),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('paplan',$pamain->nipas_paplan,set_value('paplan',$pamain->nipas_paplan),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('regionalreview',$pamain->nipas_regionalreview,set_value('regionalreview',$pamain->nipas_regionalreview),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('nationalreview',$pamain->nipas_nationalreview,set_value('nationalreview',$pamain->nipas_nationalreview),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('presproc',$pamain->nipas_presproc,set_value('presproc',$pamain->nipas_presproc),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('congressenact',$pamain->nipas_congress,set_value('congressenact',$pamain->nipas_congress),'id="dateApprovePMB"') ?></td>
                        <?php else: ?>
                          <td style="text-align:center"><?= form_checkbox('compilemap','',set_value('compilemap')) ?></td>
                          <td style="text-align:center"><?= form_checkbox('resourceprofile','',set_value('resourceprofile'),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('paplan','',set_value('paplan'),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('regionalreview','',set_value('regionalreview'),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('nationalreview','',set_value('nationalreview'),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('presproc','',set_value('presproc'),'id="dateApprovePMB"') ?></td>
                          <td style="text-align:center"><?= form_checkbox('congressenact','',set_value('congressenact'),'id="dateApprovePMB"') ?></td>
                        <?php endif; ?>
                      </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="location">Location</h4>
          <div class="tab-pane tab_content" id="location">
            <div class="row">
                <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                  <tr valign="top" class="spaceUnder spaceOver">
                    <div style="background-color: #ffd9b3" class="_dxHide"><label>Area Location</label></div>
                    <div id="responseDiv" class="alert text-center" style="display:none;">
                      <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                      <span style="color:#000" id="message"></span>
                    </div>
                    <td style="width: 100px">Region</td>
                    <td colspan="2"><?php echo form_dropdown('region_id',$regionList,'','class="form-control" id="regid"') ?></td><span class="prov_error"></span>
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Province</td>
                    <td colspan="2"><?php echo form_dropdown('province_id','','','class="form-control" id="provid"') ?></td><span class="municipal_error"></span>
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Municipality</td>
                    <td colspan="2"><?php echo form_dropdown('municipal_id','','','class="form-control action" id="municipal_id"') ?></td>
                    <span class="barangay_error"></span>
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Barangay</td>
                    <td><?php echo form_dropdown('barangay_id','','','class="form-control" id="bar_id"') ?></td>
                  </tr>
                </table><br>
                <button type="button" name="btnlocation" onclick="insert()" id="submitlocation" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
                <div class="table-responsive"><br>
                  <table id="tablelocation" name="location" border="1" class="table table-hover">
                    <thead>
                      <tr>
                        <th>Region</th>
                        <th>Province</th>
                        <th>Municipality</th>
                        <th>Barangay</th>
                        <th>Remove</th>
                      </tr>
                    </thead>
                    <tbody id="tbodylocation"></tbody>
                  </table>
                </div>  
                <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                  <tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3" class="_dxHide"><label>Geographic Location</label></div>
                    <td style="width: 100px">Longitude</td>
                    <?php if (!empty($pamain->id_main)): ?>
                      <td><?= form_input($data_long1,$pamain->geographic_long1); ?></td>
                      <td>-</td>
                      <td><?= form_input($data_long2,$pamain->geographic_long2); ?></td>
                      <?php else: ?>
                      <td><?= form_input($data_long1); ?></td>
                      <td>-</td>
                      <td><?= form_input($data_long2); ?></td>
                      <?php endif; ?>
                    </tr>
                    <tr valign="top" class="spaceUnder">
                      <td>Latitude</td>
                      <?php if (!empty($pamain->id_main)): ?>
                      <td><?= form_input($data_lat1,$pamain->geographic_lat1); ?></td>
                      <td>-</td>
                      <td><?= form_input($data_lat2,$pamain->geographic_lat2); ?></td>
                      <?php else: ?>
                      <td><?= form_input($data_lat1); ?></td>
                      <td>-</td>
                      <td><?= form_input($data_lat2); ?></td>
                      <?php endif; ?>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                    <tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3" class="_dxHide"><label>Other Area Information</label></div>
                      <?php if (!empty($pamain->id_main)): ?>
                      <td>Protected Area Boundary<?php echo form_textarea($data_boundary,$pamain->pa_boundary,'') ?></td>
                      <?php else: ?>
                      <td>Protected Area Boundary<?php echo form_textarea($data_boundary) ?></td>
                      <?php endif; ?>
                    </tr>
                    <tr valign="top" class="spaceUnder">
                      <?php if (!empty($pamain->id_main)): ?>
                      <td>Land Uses<?php echo form_textarea($data_landuses,$pamain->landuses,'') ?></td>
                      <?php else: ?>
                      <td>Land Uses<?php echo form_textarea($data_landuses) ?></td>
                      <?php endif; ?>              
                    </tr>
                    <tr valign="top" class="spaceUnder">
                      <?php if (!empty($pamain->id_main)): ?>
                      <td>Accessibility<?php echo form_textarea($data_accessibility,$pamain->accessibility,'') ?></td>
                      <?php else: ?>
                      <td>Accessibility<?php echo form_textarea($data_accessibility) ?></td>
                      <?php endif; ?>
                    </tr>
                  </table>       
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="proclamation">Proclamation</h4>
          <div class="tab-pane tab_content" id="proclamation">
            <div class="row">
              <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Other Proclamation</label></div>
                  <div id="responseDivLegis" class="alert text-center" style="display:none;">
                    <button type="button" class="close" id="clearMsgLegis"><span aria-hidden="true">&times;</span></button>
                    <span style="color:#000" id="messagelegis"></span>
                  </div>
                  <td style="width: 100px">Legislation</td>
                  <td colspan="3"><?php echo form_dropdown('legis_id',$procList,'','class="form-control" id="legis_id"') ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Legislation No.</td>
                  <td colspan="3"><?php echo form_input($data_legisno); ?></td></span>
                </tr> 
                <tr valign="top" class="spaceUnder">
                  <td>Dated</td>
                  <td><?php echo form_dropdown('date_month',$monthList,'','class="form-control"'); ?></td>
                  <td><?php echo form_dropdown('date_day',$dayList,'','class="form-control"'); ?></td>
                  <td><?php echo form_dropdown('date_year',$yearList,'','class="form-control"'); ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Area (hectare)</td>
                  <td colspan="3"><?php echo form_input($data_legisarea); ?></td>
              </tr>
              <tr valign="top" class="spaceUnder">
                <td>Buffer Zone (hectare)</td>
                <td colspan="3"><?php echo form_input($data_legisbuffer); ?></td>
              </tr>
              <tr valign="top" class="spaceUnder hide">
                <td>PDF File</td>
                <td colspan="3"><input type="file" name="picture" id="picture"><input type="hidden" name="old_file"></td>
              </tr>
              </table><br>
              <button type="button" name="btnlegislation" onclick="insert_legis2()" id="btnlegislation" class="btn btn-success btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
              <div class="table-responsive"><br>
                <table id="tableLegislation" border="1" class="table table-hover">
                  <thead>
                    <tr>
                      <th>LEGISLATION</th>
                      <th>DATED</th>
                      <th>AREA(ha.)</th>
                      <th>BUFFER ZONE(ha.)</th>
                      <!-- <th>FILE ATTACHED</th> -->
                      <th>Remove</th>
                    </tr>
                  </thead>
                  <tbody id="tbodylegis"></tbody>
                </table>
              </div>  
            </div>
          </div>

          <?php if (!empty($pamain->id_main)): ?>
            <?php if ($pamain->pamb_approve == '1'): ?>
            <h4 class="tab_drawer_heading pambmemberTabs" rel="pambmember">PAMB Members</h4>
            <?php else: ?>
            <h4 class="tab_drawer_heading pambmemberTab" rel="pambmember">PAMB Members</h4>
            <?php endif ?>
          <?php else: ?>
          <h4 class="tab_drawer_heading pambmemberTab" id="h4_hide" rel="pambmember">PAMB Members</h4>
          <?php endif ?>
          <div class="tab-pane tab_content" id="pambmember">
            <div class="row">
              <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Protected Area Management Board Members</label></div>
                  <div id="responseDivPAMB" class="alert text-center" style="display:none;">
                    <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                    <span style="color:#000" id="messagepamb"></span>               
                  </div>                  
                  <td class="spaceRight">First name<?php echo form_input($pambMember_fname); ?> </td>
                  <td class="spaceRight">Middle name<?php echo form_input($pambMember_mname); ?> </td>
                  <td>Family name<?php echo form_input($pambMember_lname); ?> </td>
                </tr>                  
                <tr valign="top" class="spaceUnder">
                  <td class="spaceRight">Gender<?php echo form_dropdown($pambMember_sex,$sexList,'') ?></td>
                  <td class="spaceRight">Marital Status<?php echo form_dropdown($pambMember_marital,$maritalStatus,'') ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td colspan="3">Permanent Address<?php echo form_textarea($pambMember_address,'','') ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td class="spaceRight">Organization/Offices<?php echo form_input($pambMember_organization,'','') ?></td>
                  <td class="spaceRight">Position<?php echo form_dropdown($pambMember_position,$organizationposition,'') ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td colspan="3">Office Address<?php echo form_input($pambMember_officeaddress,'','') ?></td>
                </tr>
              </table><br>
              <button type="button" name="btnlocation" onclick="insert_pamb()" id="submitlocation" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button><br>
              <div class="table-responsive"><br>
                <table id="tablePAMBmember" border="1" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Gender</th>
                      <th>Marital</th>
                      <th>Organization/Offices and Address</th>
                      <th>Postion</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody id="tbodypamb"></tbody>
                </table>
              </div>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="biological">Biological Features</h4>
          <div class="tab-pane tab_content" id="biological">
            <div class="row">
              <table width="100%" border="0" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Biological Features</label></div>
                  <?php echo form_hidden('id_pabiological'); ?>
                  <div id="responseDivBiological" class="alert text-center" style="display:none;">
                      <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                      <span style="color:#000" id="messagebiological"></span>
                  </div>
                  <td>Wildlife Common Name</td>
                  <td><?php echo form_dropdown($input_commonname,$commonnameList); ?></td>
              </table><br>
              <button type="button" name="btnbiological" onclick="insert_biological()" id="submitlocationbiological" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
              <div id="results"></div><br>
              <div class="table-responsive">
                <table id="tablePABiolofeature" border="1" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Class</th>
                      <th>Order</th>
                      <th>Family Name</th>
                      <th>Common Name</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody id="tbodybiological"></tbody>                  
                </table>
              </div>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="physical">Physical Features</h4>
          <div class="tab-pane tab_content" id="physical">
            <div class="row">
              <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
              <tr valign="top" class="spaceUnder spaceOver">
                <div style="background-color: #ffd9b3" class="_dxHide"><label>Physical Features</label></div>                
                <td style="width: 150px">Highest Elevation</td>
                <td>
                  <?php if (!empty($pamain->id_main)) {
                    echo form_input($data_highestelev,$pamain->elevation_highest);
                  } else {
                    echo form_input($data_highestelev); 
                  } ?>
                </td>
              </tr>      
              <tr valign="top" class="spaceUnder">
                <td>Lowest Elevation</td>
                <td>
                  <?php if (!empty($pamain->id_main)) {
                    echo form_input($data_lowestelev,$pamain->elevation_lowest); 
                  } else {
                    echo form_input($data_lowestelev); 
                  } ?>                    
                </td>
              </tr>          
              <tr valign="top" class="spaceUnder">
                <td colspan="2"><div style="background-color: #9fff80"><strong>Topography Elevation</strong></div>
                  <?php if (!empty($pamain->id_main)) {
                    echo form_textarea($data_topo,$pamain->topology); 
                  } else {
                    echo form_input($data_topo); 
                  } ?>
                </td>
              </tr>
              <tr valign="top" class="spaceUnder">
                <td colspan="2"><div style="background-color: #9fff80"><strong>Climate</strong></div>
                  <?php if (!empty($pamain->id_main)) {
                    echo form_textarea($data_climate,$pamain->climate); 
                  } else {
                    echo form_input($data_climate); 
                  } ?>                     
                </td>
              </tr>
              <tr valign="top" class="spaceUnder">
                <td colspan="2"><div style="background-color: #9fff80"><strong>Hydrology/River System</strong></div>
                  <?php if (!empty($pamain->id_main)) {
                    echo form_textarea($data_hydro,$pamain->hydrology); 
                  } else {
                    echo form_input($data_hydro); 
                  } ?>                    
                  </td>
              </tr>
              <tr valign="top" class="spaceUnder">
                <td colspan="2"><div style="background-color: #9fff80"><strong>Location</strong></div>
                  <?php if (!empty($pamain->id_main)) {
                    echo form_textarea($data_location,$pamain->location_details); 
                  } else {
                    echo form_input($data_location); 
                  } ?>                    
                </td>
              </tr>
              <tr valign="top" class="spaceUnder">
                <td colspan="2"><div style="background-color: #9fff80"><strong>Existing Land Use</strong></div>
                  <?php if (!empty($pamain->id_main)) {
                    echo form_textarea($data_landuse,$pamain->existing_landuse); 
                  } else {
                    echo form_input($data_landuse); 
                  } ?> 
                </td>
              </tr>
              <tr valign="top" class="spaceUnder">
                <td colspan="2"><div style="background-color: #9fff80"><strong>Soil</strong></div>
                  <?php if (!empty($pamain->id_main)) {
                    echo form_textarea($data_soil,$pamain->soil); 
                  } else {
                    echo form_input($data_soil); 
                  } ?> 
                </td>
              </tr>
            </table>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="antropology">Antropology</h4>
          <div class="tab-pane tab_content" id="antropology">
            <div class="row">
              <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Antropology</label></div>
                  <td><div style="background-color: #9fff80"><strong>Cultural Resource</strong></div>
                  <?php
                    if (!empty($pamain->id_main)) {
                      echo form_textarea($data_culturalresource,$pamain->cultural_resource);
                    } else {
                      echo form_textarea($data_culturalresource);
                    }                  
                  ?>                    
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td><div style="background-color: #9fff80"><strong>Politics</strong></div>
                  <?php
                    if (!empty($pamain->id_main)) {
                      echo form_textarea($data_politics,$pamain->politics);
                    } else {
                      echo form_textarea($data_politics);
                    }                  
                  ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td><div style="background-color: #9fff80"><strong>Custom Belief</strong></div>
                  <?php
                    if (!empty($pamain->id_main)) {
                      echo form_textarea($data_belief,$pamain->belief);
                    } else {
                      echo form_textarea($data_belief);
                    }                  
                  ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td><div style="background-color: #9fff80"><strong>Archeology</strong></div>
                  <?php
                    if (!empty($pamain->id_main)) {
                      echo form_textarea($data_archeology,$pamain->archeology);
                    } else {
                      echo form_textarea($data_archeology);
                    }                  
                  ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="economics">Socio-econimics</h4>
          <div class="tab-pane tab_content" id="economics">
            <div class="row">
              <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Socio-econimics</label></div>
                  <td><div style="background-color: #9fff80"><strong>Ethinicity</strong></div>
                    <?php
                      if (!empty($pamain->id_main)) {
                        echo form_textarea($data_ethnicity,$pamain->ethinicity);
                      } else {
                        echo form_textarea($data_ethnicity);
                      }                  
                    ?>   
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">                  
                  <td><div style="background-color: #9fff80"><strong>Demography</strong></div>
                    <?php
                      if (!empty($pamain->id_main)) {
                        echo form_textarea($data_demography,$pamain->demography);
                      } else {
                        echo form_textarea($data_demography);
                      }                  
                    ?>  
                  </td>               
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td><div style="background-color: #9fff80"><strong>Livelihood</strong></div>
                    <?php
                      if (!empty($pamain->id_main)) {
                        echo form_textarea($data_livelihood,$pamain->livelihood);
                      } else {
                        echo form_textarea($data_livelihood);
                      }                  
                    ?>                       
                  </td>               
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td><div style="background-color: #9fff80"><strong>Social Service</strong></div>
                    <?php
                      if (!empty($pamain->id_main)) {
                        echo form_textarea($data_socialservice,$pamain->social_service);
                      } else {
                        echo form_textarea($data_socialservice);
                      }                  
                    ?>                        
                  </td>              
                </tr>
            </table>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="uses">Landuses</h4>
          <div class="tab-pane tab_content" id="uses">
            <div class="row">
              <table width="100%" border="0" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Landuses</label></div>
                  <td><div style="background-color: #9fff80"><strong>Tourism</strong></div>
                    <?php
                      if (!empty($pamain->id_main)) {
                        echo form_textarea($data_tourism,$pamain->tourism);
                      } else {
                        echo form_textarea($data_tourism);
                      }                  
                    ?>
                  </td>                
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td><div style="background-color: #9fff80"><strong>Facilities</strong></div>
                    <?php
                      if (!empty($pamain->id_main)) {
                        echo form_textarea($data_facilities,$pamain->facilities);
                      } else {
                        echo form_textarea($data_facilities);
                      }                  
                    ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td><div style="background-color: #9fff80"><strong>Science and Research</strong></div>
                    <?php
                      if (!empty($pamain->id_main)) {
                        echo form_textarea($data_research,$pamain->science_research);
                      } else {
                        echo form_textarea($data_research);
                      }                  
                    ?>
                  </td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td><div style="background-color: #9fff80"><strong>Educational Purposes</strong></div>
                    <?php
                      if (!empty($pamain->id_main)) {
                        echo form_textarea($data_educational,$pamain->educational);
                      } else {
                        echo form_textarea($data_educational);
                      }                  
                    ?>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="projects">Projects</h4>
          <div class="tab-pane tab_content" id="projects">
            <div class="row">
              <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Projects</label></div>
                  <div id="responseDivProject" class="alert text-center" style="display:none;">
                    <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                    <span style="color:#000" id="messageproject"></span>
                  </div>
                  <td style="width: 100px">Project Name</td>
                  <td colspan="4"><?php echo form_input($project_name); ?></td>               
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td style="width: 100px">Year Implement</td>
                  <td style="width: 50px">From</td>
                  <td><?= form_dropdown($yearstart,$yearListed); ?></td>
                  <td style="text-align: center;width: 50px">To</td>
                  <td><?= form_dropdown($yearend,$yearListed); ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Source of Fund</td>
                  <td colspan="4"><?php echo form_input($funding); ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Project Amount</td>
                  <td colspan="4"><?php echo form_input($amount); ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Implementor</td>
                  <td colspan="4"><?php echo form_input($implementor); ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Remarks</td>
                  <td colspan="4"><?php echo form_textarea($remarks); ?></td>
                </tr>             
              </table><br>
              <button type="button" name="btnproject" onclick="insert_projects()" id="submitproject" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
              <div class="table-responsive"><br>
                <table id="tablePAProject" border="1" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Project Name</th>
                      <th>Year(Start-End)</th>
                      <th>Source of Fund</th>
                      <th>Amount</th>
                      <th>Implementor</th>
                      <th>Remarks</th>
                      <th>Remove? </th>
                    </tr>
                  </thead>
                  <tbody id="tbodyproject"></tbody>                 
                </table>
              </div>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="threats">Threats</h4>
          <div class="tab-pane tab_content" id="threats">
            <div class="row">
              <table width="100%" border="0" class="table4">
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Threats</label></div>
                  <td>
                  <?php if (!empty($pamain->id_main)): 
                    echo form_textarea($data_threat,$pamain->threats);
                  else: 
                    echo form_textarea($data_threat);
                  endif; ?>
                  </td>               
                </tr>
              </table>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="occupants">Occupants</h4>
          <div class="tab-pane tab_content" id="occupants">
            <div class="row">
              <table width="100%" border="0" class="table4">            
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Occupants</label></div>
                  <div id="responseDivTribe" class="alert text-center" style="display:none;">
                    <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                    <span style="color:#000" id="messagetribe"></span>
                  </div>
                  <td style="width: auto;">Household Tag No.</td>
                  <td colspan="3"><?= form_input($data_tag) ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td style="width: auto;">Date Occupied</td>
                  <td><?php echo form_dropdown('month_occupied',$monthList,'','class="form-control" id="month_occupied"'); ?></td>
                  <td><?php echo form_dropdown('day_occupied',$dayList,'','class="form-control" id="day_occupied"'); ?></td>
                  <td><?php echo form_dropdown('year_occupied',$yearList,'','class="form-control" id="year_occupied"'); ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Tribe</td>
                  <td colspan="3"><?= form_dropdown($data_tribe,$tribelist) ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Fullname</td>
                  <td><?= form_input($data_fname) ?></td>
                  <td><?= form_input($data_mname) ?></td>
                  <td><?= form_input($data_lname) ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Relationship</td>
                  <td colspan="3"><?php echo form_dropdown($data_relation,$triberelation); ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Gender</td>
                  <td colspan="3"><?php echo form_dropdown($data_gender,$sexList); ?></td>
                </tr>
                <tr valign="top" class="spaceUnder">
                  <td>Marital Status</td>
                  <td colspan="3"><?php echo form_dropdown($data_maritalstatus,$maritalStatus); ?></td>
                </tr>
              </table><br>
              <button type="button" name="btnproject" onclick="insert_tribes()" id="submitproject" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
              <div class="table-responsive">            
                <table id="tabletribe" class="table table-hover">
                  <thead>
                    <tr>
                        <th>TAG NO.</th>                           
                        <th>DATE OCCUPIED</th>
                        <th>TRIBE</th>
                        <th>FULLNAME</th>
                        <th>RELATIONSHIP</th>
                        <th>GENDER</th>
                        <th>REMOVE</th>
                    </tr>
                  </thead>
                  <tbody id="tbodytribe"></tbody>
                </table>
              </div>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="visitors">Visitors</h4>
          <div class="tab-pane tab_content" id="visitors">
            <div class="row">
              <?php echo form_hidden('id_rate'); ?>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                  <tr valign="top" class="spaceUnder spaceOver">
                    <div style="background-color: #ffd9b3" class="_dxHide"><label>Visitors Monitoring</label></div>
                    <td style="width: 100px">Date Monitoring : </td>
                    <td><?php echo form_dropdown($month_monitoring,$monthList,'','class="form-control" id="monitor_month"'); ?></td>
                    <td><?php echo form_dropdown($year_monitoring,$yearList,'','class="form-control" id="monitor_year"'); ?></td>
                  </tr>               
                </table>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                  <tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3" class="_dxHide"><label>Number of Visitors</label></div>                
                    <td style="width: 100px;">Local Male : </td>
                    <td><?php echo form_input($local_male); ?></td>                 
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Local Female : </td>
                    <td><?php echo form_input($local_female); ?></td>
                  </tr>               
                  <tr valign="top" class="spaceUnder">
                    <td>Foreign Male : </td>
                    <td><?php echo form_input($foreign_male); ?></td>
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Foreign Female : </td>
                    <td><?php echo form_input($foreign_female); ?></td>
                  </tr>               
                </table>
                <table width="100%" border="1" cellpadding="3" cellspacing="1" class="table4">
                  <tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3" class="_dxHide"><label>Total Visitors</label></div>
                    <td style="width: 120px">Total Local Visitors</td>
                    <td style="width: 200px"><div style="text-align: center;color:red;font-size: 15px;"> <span id="total_local"></span></div></td>
                    <td style="width: 120px">Total Male Visitors</td>
                    <td style="width: 200px"><div style="text-align: center;color:red;font-size: 15px;"> <span id="total_male"></span></div></td>
                  </tr>
                  <tr valign="top" class="spaceUnder spaceOver">
                    <td>Total Foreign Visitors</td>
                    <td><div style="text-align: center;color:red;font-size: 15px;"> <span id="total_foreign"></span></div></td>
                    <td>Total Female Visitors</td>
                    <td><div style="text-align: center;color:red;font-size: 15px;"> <span id="total_female"></span></div></td>
                  </tr>
                  <tr valign="top">
                    <td style="font-size: 24px;color: red;">GRAND TOTAL</td>
                    <td colspan="3"><div style="text-align: center;color:red;font-size: 24px;"> <span id="gtotal"></span></div></td>
                  </tr>
                </table>
                <br>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
                  <tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3" class="_dxHide"><label>Income Generated</label></div>
                    <td style="width: 100px">Entrance fee : </td>
                    <td><?php echo form_input($entrancefee); ?></td>  
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Parking fee : </td>
                    <td><?php echo form_input($parkingfee); ?></td>
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Rentals fee : </td>
                    <td><?php echo form_input($rentalsfee); ?></td>
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Other fee : </td>
                    <td><?php echo form_input($otherfee); ?></td>
                  </tr>
                </table>
                <table width="100%" border="1" cellpadding="3" cellspacing="1" class="table4">
                  <tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3" class="_dxHide"><label>Total Income Generated</label></div>
                    <td>Sub-IPAF : </td>
                    <td colspan="3"><div style="text-align: center;color:red;font-size: 15px;">P<span id="gtotal_sub"></span></div></td>
                  </tr>
                  <tr valign="top" class="spaceUnder">
                    <td>Central IPAF : </td>
                    <td colspan="3"><div style="text-align: center;color:red;font-size: 15px;">P<span id="gtotal_central"></span></div></td>
                  </tr>
                  <tr valign="top">
                    <td style="font-size: 24px;color: red;">GRAND TOTAL INCOME</td>
                    <td colspan="3"><div style="text-align: center;color:red;font-size: 24px;">P<span id="gtotal_income"></span></div></td>
                  </tr>
                </table>
                <br>
                <div id="incomeDiv" class="alert text-center" style="display:none;">
                  <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
                  <span style="color:#000" id="incomeMessage"></span>
                </div>
                <div>
                 <button type="button" name="btnbiological" onclick="insert_income()" id="id_rate" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
                </div>
                <br>
                <div class="table-responsive">
                  <table id="tablefee" class="table table-hover" style="border: 1px solid black;">
                  <thead>
                    <tr style="background-color:#ffd9b3;">
                      <th>Dated</th>
                      <th>Local Visitors</th>
                      <th>Foreign Visitors</th>
                      <th>Income</th>
                      <th>Total</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyfee"></tbody>
                </table>
              </div>
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="maps">Maps</h4>
          <div class="tab-pane tab_content" id="maps">
            <div class="row">                             
              <?= form_hidden('id_image'); ?>
              <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table4">                
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label>Map Images</label></div>
                  <div id="responseDivImage" class="alert text-center" style="display:none;">
                    <button type="button" class="close" id="clearMsgImage"><span aria-hidden="true">&times;</span></button>
                    <span style="color:#000" id="messageimage"></span>
                  </div> 
                  <td>
                    <img width="200px" height="180px" id="blah" src="<?php echo base_url("bmb_assets2/upload/map_image/nophoto.jpg") ?>" alt="your image" /><br>
                    <input type='file' name="picture2" id="picture2" onchange="readURL(this);" /><br>
                    <input type="hidden" name="old_picture" value="nophoto.jpg">                      
                  </td>                    
                </tr>
                <tr>
                  <td><?= form_textarea($form_reference) ?><br></td>
                </tr>
                <tr>
                  <td><br><button type="button" onclick="insert_image()" class="btn btn-success  btn-flat"><i class="fa fa-save"> Insert</i></button></td>
                </tr>
              </table>
              <div class="table-responsive">
                <table id="tableimage" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Details</th>
                      <th>Download</th>
                      <th>REMOVE</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyimage">
                  </tbody>
                </table>
              </div> 
            </div>
          </div>

          <h4 class="tab_drawer_heading" rel="reference">References</h4>
          <div class="tab-pane tab_content" id="reference">
            <div class="row">
              <table width="100%" border="0" class="table4">            
                <tr valign="top" class="spaceUnder spaceOver">
                  <div style="background-color: #ffd9b3" class="_dxHide"><label> References</label></div>                 
                  <td>
                    <?php if (!empty($pamain->id_main)) {
                      echo form_textarea($pamain_reference,$pamain->reference);
                    } else {
                      echo form_textarea($pamain_reference);
                    }
                    ?>                      
                    </td>
                </tr>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</section>
<?php echo form_close(); ?>
<script type="text/javascript" src="<?php echo base_url("jquery/user/pa/loadinfo.js") ?>"></script>
