<div id="loadmboards" class="tab-pane">
                <div class="form-style-6">
                    <h2>Management Board</h2>
                </div>
                <div class="tab">
                    <a class="tablinkpprs active" onclick="tabpprms(event, 'mngmtmember')">Members</a>
                    <a class="tablinkpprs" id="loadminutes" onclick="tabpprms(event, 'issuanceboard')">Minutes/Resolutions</a>
                </div>
                <div id="mngmtmember" class="tabcontentpprs" style="display:block">
                <?php echo form_input('pambcodes','','id="pambcodes" class="hidden"'); ?>
                    <div class="col-xs-12">                        
                       <!--  <fieldset>
                            <legend>Date Organized</legend> -->
                            <div class="col-xs-12 tooltip">
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Date organized').form_dropdown('pamb_month',$monthList,$pamain->pamb_month,' id="dateMonthPAMB"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('pamb_day',$dayList,$pamain->pamb_day,' id="dateDayPAMB"') ?>
                                    </li></ul>                                         
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('pamb_year',$yearListed,$pamain->pamb_year,' id="dateYearPAMB"') ?>
                                    </li></ul>
                                </div>
                                <span class="tooltiptext">Select date organized</span>
                            </div>  
                        <!-- </fieldset>                     -->
                        <fieldset>
                            <legend>Personal Information</legend>
                            <div class="col-xs-12 ">                               
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('First Name','','for="fname"').form_input('fname','','id="fname" placeholder="ex. John, Jane" required');?>
                                        <span class="tooltiptext">Input first name</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('Middle Name','','for="mname"').form_input('mname','','id="mname" placeholder="ex. A., dela Cruz" required');?>
                                        <span class="tooltiptext">Input middle name</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('Last Name','','for="lname"').form_input('lname','','id="lname" placeholder="ex. Rodriguez, Espino" required');?>
                                        <span class="tooltiptext">Input last name</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('Suffix','','for="pamb_suffix"').form_input('pamb_suffix','','id="pamb_suffix" placeholder="ex. I,II,III,IV, Sr., Jr., etc." required');?>
                                        <span class="tooltiptext">Input Suffix</span>
                                    </li></ul>
                                </div>
                            </div>  
                            <div class="col-xs-12">                                                
                                <div class="col-xs-6 col-lg-4 tooltip">
                                    <ul><li>                                    
                                        <?= form_label('Landline no.','','for="pamo_landline"').form_input('pamo_landline','','data-inputmask="&quot;mask&quot;: &quot;(99) 999-9999&quot;" data-mask="" id="pamo_landline"') ?>
                                        <span class="tooltiptext">Input landline number</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-4 tooltip">
                                    <ul><li>
                                        <?= form_label('Mobile no.','','for="pamo_mobile"').form_input('pamo_mobile','','data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" data-mask="" id="pamo_mobile"') ?>
                                        <span class="tooltiptext">Input mobile number</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-4 tooltip">
                                    <ul><li>
                                        <?= form_label('Sex','','for="pamo_mobile"').form_dropdown('sex',$sexList,'',' id="sex" required');?>
                                        <span class="tooltiptext">Select sex</span>
                                    </li></ul>
                                </div>
                            </div> 
                            <div class="col-xs-12 ">

                                
                                <div class="col-xs-6 col-lg-4 hidden">
                                    <ul><li>
                                        <?= form_dropdown('maritalstatus',$maritalStatus,'',' id="maritalstatus" required');?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Office Address','','for="address"').form_input('address','','placeholder="Lot no., Block no, Street name, Barangay, Municipal City"  id="address"');?>
                                        <span class="tooltiptext">Input residential address</span>
                                    </li></ul>
                                </div>                                    
                            </div>
                       
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Designation/Position','','').form_input('position','','placeholder="ex. Chairman, Vice Chairman, Member" id="position" required');?>
                                        <span class="tooltiptext">Select designation/position</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">                            
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Office/Company Name','','').form_input('office','','placeholder="Office/Company Name" id="office" required');?>
                                        <span class="tooltiptext">Input office/company name</span>
                                    </li></ul>
                                </div>
                            </div>                                
                        </fieldset>
                        <fieldset>
                            <legend>Status of appointment</legend>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?= form_label('Appointment type','','').form_dropdown('appointment',$appointment,'',' id="appointment" required');?>
                                    <span class="tooltiptext">Select status of appointment</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?= form_label('Designation','','').form_dropdown('appointmentsub','','',' id="appointmentsub" required');?>
                                    <span class="tooltiptext">Select sub status of appointment</span>
                                    </li></ul>
                                </div>
                            </div>
                                                       
                            <div class="col-xs-12" id="exofficiotab" style="display: none">
                                <div class="col-xs-12 col-lg-12" style="margin-left: 10px;">
                                    <?php echo form_checkbox('appointchkcochair','','','id="appointchkcochair" onclick="mychkcochair();"').form_label('Co-Chairman','','for="appointchkcochair"') ?>                                
                                </div> 
                                <div class="col-xs-12" id="cochairdiv" style="display: none">
                                    <fieldset>
                                        <legend>Co-Chairman</legend>
                                        <div class="col-xs-12 col-lg-12">
                                            <div class="col-xs-12 col-lg-3">
                                                <ul><li>
                                                    <?= form_label('First name').form_input('cofname','','id="cofname"') ?>
                                                </li></ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <div class="col-xs-12 col-lg-3">
                                                <ul><li>
                                                    <?= form_label('Middle name').form_input('comname','','id="comname"') ?>
                                                </li></ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <div class="col-xs-12 col-lg-3">
                                                <ul><li>
                                                    <?= form_label('Last name').form_input('colname','','id="colname"') ?>
                                                </li></ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <div class="col-xs-12 col-lg-3">
                                                <ul><li>
                                                    <?= form_label('Suffix').form_input('cosname','','id="cosname"') ?>
                                                </li></ul>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <fieldset>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                        <?= form_label('Name of alternate representative','','for="alternateofficials"').form_input('alternateofficials','','placeholder="Name of altenate representative" id="alternateofficials"');?>
                                        <span class="tooltiptext">Input name of alternate official</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                        <?= form_label('Position/Designation','','for="aoposition"').form_input('aoposition','','placeholder="Name of altenate representative" id="aoposition"');?>
                                        <span class="tooltiptext">Input position/designation of alternate official</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 tooltip">
                                        <ul><li>
                                            <?= form_label('Sex','','for="aosex"').form_dropdown('aosex',$sexList,'',' id="aosex" required');?>
                                            <span class="tooltiptext">Select sex</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-9 tooltip hide">
                                        <div class="col-xs-4 col-lg-4 tooltip">
                                            <ul><li>
                                                <?php echo form_label('Date of appointment').form_dropdown('aoamonth',$monthList,'',' id="aoamonth"') ?>
                                                <span class="tooltiptext"></span>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4 tooltip">
                                            <ul><li>
                                                <?php echo form_label('&nbsp;').form_dropdown('aoaday',$dayList,'',' id="aoaday"') ?>
                                                <span class="tooltiptext"></span>
                                            </li></ul>                                         
                                        </div>
                                        <div class="col-xs-4 col-lg-4 tooltip">
                                            <ul><li>
                                                <?php echo form_label('&nbsp;').form_dropdown('aoayear',$yearListed,'',' id="aoayear"') ?>
                                                <span class="tooltiptext"></span>
                                            </li></ul>
                                        </div>
                                        <span class="tooltiptext">Select date of appointment</span>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?php echo form_label('Status').form_dropdown('appointment_status',$appointment_status,'',' id="appointment_status" required') ?>
                                    <span class="tooltiptext">Select status of appointment</span>
                                    </li></ul>
                                </div>
                            </div> 
                            <div class="col-xs-12 tooltip" id="statusappintmentdiv" style="display: none;">                            
                                <div class="col-xs-12 col-lg-4 ">
                                    <ul><li>
                                    <?php echo form_label('Date of appointment').form_dropdown('appointment_m',$monthList,'',' id="appointmentmonth" required') ?>
                                    </li></ul>
                                </div>                                    
                                <div class="col-xs-12 col-lg-4 ">
                                    <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('appointment_d',$dayList,'',' id="appointmentday"') ?>
                                    </li></ul>
                                </div>                                    
                                <div class="col-xs-12 col-lg-4 ">
                                    <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('appointment_y',$yearListed,'',' id="appointmentyear" required') ?>
                                    </li></ul>
                                </div>       
                                <span class="tooltiptext">Select date of appointmnet</span>                                               
                            </div>                     
                        </fieldset>
                        <fieldset>
                            <legend>Membership</legend>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-4 col-lg-4">
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <?php echo form_checkbox('twgchck','','','id="twgchck" onclick="mychktwg();"').form_label('Member of Technical Working Group','','for="twgchck"') ?>
                                        <span class="tooltiptext">The PAMB en banc, through the issuance of a resolution, by a majority vote of members may create Technical Working Committees, as may be necessary, to effectively implement the Management Plan</span>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 tooltip" id="twghideme" style="margin-top: 10px;display: none">
                                        <ul><li>
                                            <?php echo form_label('Specify name of TWG').form_input('twgname','','id="twgname"') ?>
                                            <span class="tooltiptext">Specify name of Technical Working group</span>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <?php echo form_checkbox('techcomchck','','','id="techcomchck" onclick="mychktechcom();"').form_label('Member of Technical Committee','','for="techcomchck"') ?>
                                        <span class="tooltiptext">Check if member of Technical Committee</span>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" id="techcomhideme" style="margin-top: 10px;display: none">
                                        <div class="tooltip">
                                            <ul><li>
                                                <?php echo form_label('Select Technical Committee').form_dropdown('techcomname',$techcomm,'','id="techcomname"') ?>
                                                <span class="tooltiptext">Select Technical Committee</span>
                                            </li></ul>
                                        </div>
                                    <div class="col-xs-12 col-lg-12 tooltip" id="techcomdiv" style="display:none">
                                        <ul><li>
                                            <?= form_label('Specify others','','').form_input('othertechcom','','placeholder="" id="othertechcom" required');?>
                                            <span class="tooltiptext">Specify other technical committee</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 ">
                                        <a type="text" class="btn btn-warning" id="add_pambtechcomm">Add to list</a>
                                    </div>
                                    <div class="col-xs-12">
                                        <br><table id="tblpambtechcomm" class="content-table">                                        
                                            <tbody id="tbodytechcomm"></tbody>
                                        </table>  
                                    </div>
                                    </div>
                                </div>                                
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <?php echo form_checkbox('execomchck','','','id="execomchck"').form_label('Member of Executive Committee','','for="execomchck"') ?>
                                    <span class="tooltiptext">Check if member of Executive Committee</span>
                                </div>
                            </div>
                        </fieldset>
                    </div>  
                    <fieldset>
                        <legend>Upload PAMB Appointment file <i>(*.pdf format, maximum size of 50MB)</i></legend>
                        <input type='file' name="pambfile_appt" id="pambfile_appt" onchange="readURLpambfileappt(this);"  />
                        <input type="hidden" id="pambfile_appt_span" name="pambfile_appt_span" />
                        <div id="pambapptdivloading"></div>
                    </fieldset>  
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <fieldset>
                            <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Upload Manual of Operations <i>(*.pdf format, maximum size of 50MB)</i></legend>
                            <div class="col-xs-12 col-lg-6"> 
                                <input type='file' name="manualoperationpamo" id="manualoperationpamo" onchange="readURLPAMOManualOperation(this);"  />
                                <span id="manualoperationpamo_span" class="manualoperationpamo_span hidden"></span><br>
                                <div id="uploadmanualoperationpamo_file"></div>
                            </div>
                        </fieldset>
                        <span class="tooltiptext">PAMB Manual of Operation serves as reference and guides for the members of the PA Management Board in the performance and execution of their official duties and responsibilities, thereby promote transparency and accountability. <b>[BMB-TB No. 2017-04]</b></span>
                    </div> 
                    <br>
                    <div class="col-xs-12  ">
                        <a type="text" id="addpamb" class="btn btn-primary">Add data</a>
                    </div>
                    <div class="col-xs-12 col-lg-12 ">
                        <div class="table-responsive large-tables">
                            <!-- <h3>PAMB Members</h3> -->
                            <table id="tablePAMBmember" class="content-table">
                                <thead>
                                    <tr>
                                        <th colspan="6" style="text-align: center; font-size: 24px">Management Board(s)</th>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <th>Sex</th>
                                        <th>Organization/Offices</th>
                                        <th>Position & Status</th>
                                        <th>Date of Appointment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodypamb"></tbody>
                            </table>  
                        </div>
                    </div>  
                </div> 
                <div id="issuanceboard" class="tabcontentpprs" style="display: none">
                    <input type="text" name="pambresoCode" class="hidden" id="pambresoCode">
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                    <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Minutes of Meeting</legend>                                    
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                        <?= form_label('Date conducted','','for="minutes_bmb_month"').form_dropdown('minutes_bmb_month',$monthList,'','id="minutes_bmb_month" ') ?>
                                        <span class="tooltiptext">Select date conducted</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="minutes_bmb_day"').form_dropdown('minutes_bmb_day',$dayList,'','id="minutes_bmb_day" ') ?>
                                        <span class="tooltiptext">Select date conducted</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="minutes_bmb_year"').form_dropdown('minutes_bmb_year',$yearList,'','id="minutes_bmb_year" ') ?>
                                        <span class="tooltiptext">Select date conducted</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Title of minutes of meeting of PAMB ExeCom/PAMB en banc','','for="title_minutes"').form_input('title_minutes','','id="title_minutes" ') ?>
                                        ,<span class="tooltiptext">Input title of minutes of meeting</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Remarks','','for="remarks_minutes"').form_textarea('remarks_minutes','','id="remarks_minutes" ') ?>
                                        ,<span class="tooltiptext">Remarks (if any)</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12"> 
                                    <fieldset>
                                        <label>Upload approved minutes of meeting PAMB ExeCom/PAMB en banc<i>(*.pdf minimum size of 50MB)*</i></label>
                                        <input type='file' name="minutesfile" id="minutesfile" onchange="readURLminutesFile(this);" />
                                        <input type="hidden" id="minutesfile_span" name="minutesfile_span" />
                                        <div id="uploadminutesfile_file"></div>
                                    </fieldset>
                                </div>

                                <div class="col-xs-12 col-lg-12"> 
                                    <fieldset>
                                        <label>Upload approved Technical Committee/Technical Working Group(TWG) minutes of meeting<i>(*.pdf minimum size of 50MB)</i></label>
                                        <input type='file' name="minutesfiletwg" id="minutesfiletwg" onchange="readURLminutesFiletwg(this);"/>
                                        <input type="hidden" id="minutesfiletwg_span" name="minutesfiletwg_span" />
                                        <div id="uploadminutesfiletwg_file"></div>
                                    </fieldset>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <a type="text" class="btn btn-primary" id="addpambresominutesofmeeting">Add to table</a>                                
                        </div>    
                        <div class="col-xs-12 ">                                
                            <div class="table-responsive" style="overflow-x:auto;"><br>
                                <table id="tblminutesofmeetingfile" class="content-table">
                                    <thead>
                                        <tr>
                                            <th colspan="5" style="text-align: center; font-size: 24px">Minutes of meeting</th>
                                        </tr>
                                        <tr>
                                            <td>Date conducted</td>
                                            <td>Title</td>
                                            <td>File attached</td>
                                            <td>PAMB Resolution</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyminutesofmeetingfile"></tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>
                </div>
</div>

<form method="post" action="" id="AddPAMResolutionForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" id="modal-edit-mompambresolu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add PAMB Resolution</h4>
                </div>
                <input type="hidden" id="mompambreso-id" name="mompambreso-id" value="" />
                <input type="hidden" id="mompambreso-gencode" name="mompambreso-gencode" value="" />
                <input type="hidden" id="mompambreso-gencode2" name="mompambreso-gencode2" value="" />
                <input type="hidden" id="mompambreso-gencode3" name="mompambreso-gencode3" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">PAMB Resolution</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                        <?= form_label('Resolution Number','','for="resono"').form_input('resono','','id="resono" placeholder=" "') ?>
                                    <span class="tooltiptext">Input Resolution number</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-8 tooltip">
                                <ul><li>
                                        <?= form_label('Title of Resolution','','for="resotitle"').form_input('resotitle','','id="resotitle" placeholder=" "') ?>
                                    <span class="tooltiptext">Input title of resolution</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-6 tooltip">
                                <fieldset>
                                    <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Date Approved by PAMB</legend>
                                <div class="col-xs-6 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="date_approve_chair_month"').form_dropdown('date_approve_chair_month',$monthList,'','id="date_approve_chair_month" ') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="date_approve_chair_year"').form_dropdown('date_approve_chair_year',$yearList,'','id="date_approve_chair_year" ') ?>

                                    </li></ul>
                                </div>
                                <span class="tooltiptext">Select date approved</span>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-6 tooltip hidden">
                                <fieldset>
                                    <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Date Affirmed by the Secretary</legend>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="date_affirmed_sec_month"').form_dropdown('date_affirmed_sec_month',$monthList,'','id="date_affirmed_sec_month" ') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="date_affirmed_sec_year"').form_dropdown('date_affirmed_sec_year',$yearList,'','id="date_affirmed_sec_year" ') ?>
                                    </li></ul>
                                </div>
                                <span class="tooltiptext">Select date affirmed by the Secretary</span>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <?= form_label('Attached PAMB Resolution<i>(*.pdf format, maximum size of 50MB)</i>','','for="resofile"')?>
                            <input type='file' name="resofile" id="resofile" onchange="readURLresofile(this);" />
                            <input type="hidden" name="old_file_reso" id="old_file_reso" />
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <div id="pambresouploaddiv"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" style="margin-top: 20px;">
                            <ul><li>
                                <?= form_label('Action Taken/Status of Implementation','','for="pambstatus"').form_dropdown('pambstatus',$pabstatus,'','id="pambstatus" ') ?>
                                <span class="tooltiptext">Select status of implementation</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Date submitted to BMB</legend>
                                <div class="col-xs-6 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="date_submitted_bmb_month"').form_dropdown('date_submitted_bmb_month',$monthList,'','id="date_submitted_bmb_month" ') ?>
                                        <span class="tooltiptext">Select date submitted to BMB</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('&nbsp;','','for="date_submitted_bmb_year"').form_dropdown('date_submitted_bmb_year',$yearList,'','id="date_submitted_bmb_year" ') ?>
                                        <span class="tooltiptext">Select date submitted to BMB</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 hidden">
                                    <label>Attached file resolution<i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="transmittalfile" id="transmittalfile" onchange="readURLtransmittalFile(this);"  />
                                    <input type="hidden" id="transmittalfile_span" name="transmittalfile_span" />
                                    <div id="uploadtransmittalfile_file"></div>
                                </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <a type="text" class="btn btn-primary" id="addpambresolu">Add data</a>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="table-responsive" style="overflow-x:auto;"><br>
                                <table id="tblresofile" class="table tglobal">
                                    <thead>
                                        <tr>
                                            <th colspan="4" style="text-align: center; font-size: 24px">PAMB Resolution</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyresofile"></tbody>
                                </table>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="ResoForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" id="modal-edit-resofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Minutes/Resolutions</h4>
                </div>
                <input type="hidden" id="resofile-id" name="resofile-id" value="" />
                <input type="hidden" id="resofile-gencode" name="resofile-gencode" value="" />
                <input type="hidden" name="resofile-pambresoCode" id="resofile-pambresoCode">
                <input type="hidden" name="resofile-transmitcode" id="resofile-transmitcode">
                <div class="modal-body" >
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Resolution Number','','for="resono"').form_input('edit-resono','','id="edit-resono" placeholder=" "') ?>
                                <span class="tooltiptext">Input Resolution number here</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-8 col-lg-8 tooltip">
                            <ul><li>
                                <?= form_label('Title of Resolution','','for="resotitle"').form_input('edit-resotitle','','id="edit-resotitle" placeholder=" "') ?>
                                <span class="tooltiptext">Input title of resolution here</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-6 tooltip">
                            <fieldset>
                                <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Date Approved by PAMB</legend>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-date_approve_chair_month"').form_dropdown('edit-date_approve_chair_month',$monthList,'','id="edit-date_approve_chair_month" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-date_approve_chair_year"').form_dropdown('edit-date_approve_chair_year',$yearList,'','id="edit-date_approve_chair_year" ') ?>
                                </li></ul>
                            </div>
                            <span class="tooltiptext">Select date approved by PAMB</span>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-6 tooltip hidden">
                            <fieldset>
                                <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Date Affirmed by the Secretary</legend>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-date_affirmed_sec_month"').form_dropdown('edit-date_affirmed_sec_month',$monthList,'','id="edit-date_affirmed_sec_month" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-date_affirmed_sec_year"').form_dropdown('edit-date_affirmed_sec_year',$yearList,'','id="edit-date_affirmed_sec_year" ') ?>
                                </li></ul>
                            </div>
                            <span class="tooltiptext">Select date affirmed by the Secretary</span>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <?= form_label('Upload PAMB Resolution <i>(*.pdf minimum size of 50MB)</i>','','for="file_reso"')?>
                        <input type='file' name="edit-resofile" id="edit-resofile" onchange="readURLresofileEdit(this);"/>
                        <input  name="edit-old_file_reso" id="edit-old_file_reso" type="hidden">
                        <input  name="edit-pambresotxt" id="edit-pambresotxt" type="hidden">
                    </div>
                    <div id="pambresouploaddivEdit"></div>
                    <div class="col-xs-12 col-lg-12" style="margin-top: 20px">
                        <ul><li>
                            <?= form_label('Current file attached','','for="file_reso"')?>
                            <a href="" id="linkss" target="_blank"></a>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                        <ul><li>
                            <?= form_label('Action Taken/Status of Implementation','','for="edit-pambstatus"').form_dropdown('edit-pambstatus',$pabstatus,'','id="edit-pambstatus" ') ?>
                            <span class="tooltiptext">Select status of PAMB Resolution</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Date submitted to BMB <i>(with uploading of signed transmittal)</i></legend>
                            <div class="col-xs-6 col-lg-6 tooltip">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-date_submitted_bmb_month"').form_dropdown('edit-date_submitted_bmb_month',$monthList,'','id="edit-date_submitted_bmb_month" ') ?>
                                    <span class="tooltiptext">Select date submitted to BMB</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 tooltip">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-date_submitted_bmb_year"').form_dropdown('edit-date_submitted_bmb_year',$yearList,'','id="edit-date_submitted_bmb_year" ') ?>
                                    <span class="tooltiptext">Select date submitted to BMB</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                            <input type='file' name="edit-transmittalfile" id="edit-transmittalfile" onchange="readURLtransmittalFileEdit(this);"  />
                            <span id="edit-transmittalfile_span" class="edit-transmittalfile_span hidden"></span><br>
                            <div id="edit-uploadtransmittalfile_file"></div>
                        </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="Update" onclick="UpdateResoFile();" >Update</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<!-- MODAL FOR EDITTING A PAMB MEMBER -->
<form method="post" action="#" id="PambmEmberForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-service" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit PAMB Member</h4>
                    <input type="hidden" id="ser-id" name="ser-id" value="" />
                    <input type="hidden" id="ser-gencode" name="ser-gencode" value="" />
                    <input type="hidden" id="ser-gencode2" name="ser-gencode2" value="" />
                </div>
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <fieldset>
                            <legend>Information</legend>
                            <div class="col-xs-12 ">
                                <div class="col-xs-3 col-lg-3 ">
                                    <ul><li>
                                        <?= form_label('First Name','','for="edit-fname"').form_input('edit-fname','','id="edit-fname" step="1"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 ">
                                    <ul><li>
                                        <?= form_label('Middle Name','','for="edit-mname"').form_input('edit-mname','','id="edit-mname"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 ">
                                    <ul><li>
                                        <?= form_label('Last Name','','for="edit-lname"').form_input('edit-lname','','id="edit-lname"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('Suffix','','for="edit-pamb_suffix"').form_input('edit-pamb_suffix','','id="edit-pamb_suffix" placeholder="ex. I,II,III,IV, Sr., Jr., etc." required');?>
                                        <span class="tooltiptext">Input Suffix</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Landline no. : ','','for="edit_pamo_landline"').form_input('edit_pamo_landline','','data-inputmask="&quot;mask&quot;: &quot;(99) 999-9999&quot;" data-mask="" id="edit_pamo_landline"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Mobile no. : ','','for="edit_pamo_mobile"').form_input('edit_pamo_mobile','','data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" data-mask="" id="edit_pamo_mobile"') ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6 col-lg-6 ">
                                    <ul><li>
                                        <?= form_label('Sex','','for="edit-sex-pamb"').form_dropdown('edit-sex-pamb',$sexList,'','id="edit-sex-pamb"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6 hidden">
                                    <ul><li>
                                        <?=form_label('Marital Status','','for="edit-maritalstatus_s"').form_dropdown('edit-maritalstatus_s',$maritalStatus,'','id="edit-maritalstatus"');?>
                                    </li></ul>
                                </div>
                            </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12 ">
                                <ul><li>
                                    <?= form_label('Office Address','','for="edit-address_s"').form_input('edit-address_s','',' id="edit-address"');?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-6 col-lg-6 ">
                                <ul><li>
                                    <?= form_label('Designation/Position','','for="edit-position_s"').form_input('edit-position_s','',' id="edit-position"');?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 ">
                                <ul><li>
                                    <?=form_label('Office/Company Name','','for="edit-office_s"').form_input('edit-office_s','',' id="edit-office"');?>
                                </li></ul>
                            </div>
                        </div>
                        </fieldset>
                        <div class="col-xs-12 ">
                        <fieldset>
                            <legend>Status of Appointment</legend>
                            <div class="col-xs-12 col-lg-6 ">
                                <ul><li>
                                    <?= form_label('Appointment Type','','for="edit-appointment_s"').form_dropdown('edit-appointment_s',$appointment,'',' id="edit-appointment"');?><span class="edit-error_appointment"></span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-6 ">
                                <ul><li>
                                    <?= form_label('&nbsp;','','for="edit-subappointment"').form_dropdown('edit-subappointment',$appointmentsub,'',' id="edit-appointmentsub"');?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12" id="edit-exofficiotab" style="display: none">
                                <div class="col-xs-12 col-lg-6 ">
                                    <ul><li>
                                    <?= form_label('Name of alternate representative','','for="edit-alternateofficials"').form_input('edit-alternateofficials','','placeholder="Name of altenate representative" id="edit-alternateofficials"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 ">
                                    <ul><li>
                                    <?= form_label('Position','','for="edit-aoposition"').form_input('edit-aoposition','','placeholder="Name of altenate representative" id="edit-aoposition"');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-3">
                                    <ul><li>
                                        <?= form_label('Sex','','for="edit-aosex"').form_dropdown('edit-aosex',$sexList,'',' id="edit-aosex" required');?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-9">
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Date of appointment').form_dropdown('edit-aoamonth',$monthList,'',' id="edit-aoamonth"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('&nbsp;').form_dropdown('edit-aoaday',$dayList,'',' id="edit-aoaday"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('&nbsp;').form_dropdown('edit-aoayear',$yearListed,'',' id="edit-aoayear"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        </div>
                        <div class="col-xs-12">
                        <fieldset>
                            <legend>Membership</legend>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-4 col-lg-4">
                                    <div class="col-xs-12 col-lg-12">
                                        <?php echo form_checkbox('edit-twgchck','','','id="edit-twgchck" onclick="mychktwgEdit();"').form_label('Technical Working Group','','for="edit-twgchck"') ?>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" id="edit-twghideme" style="margin-top: 10px;display: none">
                                        <ul><li>
                                            <?php echo form_label('Specify name of TWG').form_input('edit-twgname','','id="edit-twgname"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <div class="col-xs-12 col-lg-12">
                                        <?php echo form_checkbox('edit-techcomchck','','','id="edit-techcomchck" onclick="mychktechcomEdit();"').form_label('Technical Committee','','for="edit-techcomchck"') ?>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" id="edit-techcomhideme" style="margin-top: 10px;display: none">
                                        <ul><li>
                                            <?php echo form_label('Select Technical Committee').form_dropdown('edit-techcomname',$techcomm,'','id="edit-techcomname"') ?>
                                        </li></ul>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-techcomdiv" style="display:none">
                                            <ul><li>
                                                <?= form_label('Specify others','','').form_input('edit-othertechcom','','placeholder="" id="edit-othertechcom" required');?>
                                                <span class="tooltiptext">Specify other technical committee</span>
                                            </li>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <a type="text" class="btn btn-warning" id="add_pambtechcommEdit">Add to list</a><br>
                                        </div>
                                        <div class="col-xs-12" style="margin-top:10px">
                                            <div id="divtechcomm"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-lg-4">
                                    <?php echo form_checkbox('edit-execomchck','','','id="edit-execomchck"').form_label('Executive Committee','','for="edit-execomchck"') ?>
                                </div>
                            </div>
                        </fieldset>
                        </div>
                        <div class="col-xs-12 ">
                            <fieldset><legend>Status of Appointment</legend>
                            <div class="col-xs-12 col-lg-6 ">
                                <ul><li>
                                    <?php echo form_dropdown('edit-appointment_status',$appointment_status,'','id="edit-status_pamb" required ') ?>
                                </li></ul>
                            </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 " id="edit-statusappintmentdiv" style="display: none">
                            <fieldset><legend>Appointment Date</legend>
                            <div class="col-xs-4 col-lg-4 ">
                                <ul><li>
                                    <?php echo form_label('','','for="edit-appointment_m"').''.form_dropdown('edit-appointment_m',$monthList,'',' id="edit-appointmentmonth" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4 ">
                                <ul><li>
                                    <?php echo form_label('','','for="edit-appointment_d"').''.form_dropdown('edit-appointment_d',$dayList,'',' id="edit-appointmentday" ') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4 ">
                                <ul><li>
                                    <?php echo form_label('','','for="edit-appointment_y"').''.form_dropdown('edit-appointment_y',$yearListed,'',' id="edit-appointmentyear" ') ?>
                                </li></ul>
                            </div>
                            </fieldset>
                        </div>                        
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <ul><li>
                                    <?= form_label('Current file attached','','for="pambfile_attached"')?>
                                    <a href="" id="pambfile_attached" target="_blank"></a>

                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend>Upload PAMB Appointment file <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <input type='file' name="edit-pambfile_appt" id="edit-pambfile_appt" onchange="readURLpambfileapptEdit(this);"  />
                                <input type="hidden" id="edit-pambfile_appt_old" name="edit-pambfile_appt_old" />
                                <input type="hidden" id="edit-pambfile_appt_span" name="edit-pambfile_appt_span" />
                                <div id="pambapptdivloadingedit"></div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset><legend>Date</legend>
                                <div class="col-xs-6 col-lg-6">
                                    <label>Created : </label>
                                    <span id="pambDateCreated"></span>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <label>Last Update : </label>
                                    <span id="pambDateupdate"></span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="UpdateMembers();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>