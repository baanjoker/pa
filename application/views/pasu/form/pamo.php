<div id="pamom" class="tab-pane">
                <input type="text" name="pamoCode" class="hidden" id="pamoCode">
                <input type="text" name="apasucode" class="hidden" id="apasucode">
                <div class="form-style-6">
                    <h2>Protected Area Management Office</h2>
                </div>
                <div class="col-xs-12  ">                              
                    <fieldset>
                    <legend>Protected Area Superintendent <i class="cap-icon ci-address-card-alt" aria-hidden="true"></i><i> (Note: change information under account profile)</i></legend>
                    <?php if (!empty($pamain->id_main)): ?>
                    <div class="col-xs-12 ">                               
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('First Name','','for="pasu_fname"').form_input('pasu_fname',$pamain->firstname,'id="pasu_fname" placeholder="ex. John, Jane" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Middle Name','','for="pasu_mname"').form_input('pasu_mname',$pamain->middlename,'id="pasu_mname" placeholder="ex. A., dela Cruz" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Last Name','','for="pasu_lname"').form_input('pasu_lname',$pamain->lastname,'id="pasu_lname" placeholder="ex. Rodriguez, Espino" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>                    
                    <?php else: ?>
                    <div class="col-xs-12 ">                               
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('First Name','','for="pasu_fname"').form_input('pasu_fname',$read->firstname,'id="pasu_fname" placeholder="ex. John, Jane" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Middle Name','','for="pasu_mname"').form_input('pasu_mname',$read->middlename,'id="pasu_mname" placeholder="ex. A., dela Cruz" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Last Name','','for="pasu_lname"').form_input('pasu_lname',$read->lastname,'id="pasu_lname" placeholder="ex. Rodriguez, Espino" required readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if (!empty($pamain->id_main)): ?>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Position/Designation','','for="pasu_designation"').form_input('pasu_designation',$pamain->designation,'id="pasu_designation" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Sex','','for="pasu_sex"').form_input('pasu_sex',$pamain->sexdesc,'id="pasu_sex" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Age bracket','','for="pasu_age"').form_input('pasu_age',$pamain->age_bracket,'id="pasu_age" readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Mobile No.','','for="pasu_mobile"').form_input('pasu_mobile',$pamain->mobile,'id="pasu_mobile" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Landline No.','','for="pasu_landline"').form_input('pasu_landline',$pamain->landline,'id="pasu_landline" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Email Address','','for="pasu_email"').form_input('pasu_email',$pamain->email,'id="pasu_email" readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Sex','','for="pasu_sex"').form_input('pasu_sex',$read->sexdesc,'id="pasu_sex" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Designation','','for="pasu_designation"').form_input('pasu_designation',$read->designation,'id="pasu_designation" readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Mobile No.','','for="pasu_mobile"').form_input('pasu_mobile',$read->mobile,'id="pasu_mobile" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Landline No.','','for="pasu_landline"').form_input('pasu_landline',$read->landline,'id="pasu_landline" readonly="readonly"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <ul><li>
                                <?= form_label('Email Address','','for="pasu_email"').form_input('pasu_email',$read->email,'id="pasu_email" readonly="readonly"');?>
                            </li></ul>
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Upload Approved Special Order <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-6"> 
                                    <input type='file' name="pasuSOFile" id="pasuSOFile" onchange="readURLpasuSO(this);"  />
                                    <span id="pasuSOFile_span" class="pasuSOFile_span hidden"></span><br>
                                    <div id="uploadpasuSOFile_file"></div>
                                </div>
                        </fieldset>
                        </div> 
                    </div>     
                    </fieldset>
                    <fieldset> 
                    <legend>Assistant PASU</legend>
                    <div class="col-xs-12 ">                               
                        <div class="col-xs-3 col-lg-3 tooltip">
                            <ul><li>
                                <?= form_label('First Name','','for="apasu_fname"').form_input('apasu_fname','','id="apasu_fname" placeholder="ex. John, Jane" required');?>
                                <span class="tooltiptext">Input first name</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-3 col-lg-3 tooltip">
                            <ul><li>
                                <?= form_label('Middle Name','','for="apasu_mname"').form_input('apasu_mname','','id="apasu_mname" placeholder="ex. A., dela Cruz" required');?>
                                <span class="tooltiptext">Input middle name</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-3 col-lg-3 tooltip">
                            <ul><li>
                                <?= form_label('Last Name','','for="apasu_lname"').form_input('apasu_lname','','id="apasu_lname" placeholder="ex. Rodriguez, Espino" required');?>
                                <span class="tooltiptext">Input family name</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-3 col-lg-3 tooltip">
                            <ul><li>
                                <?= form_label('Suffix','','for="apasu_suffix"').form_input('apasu_suffix','','id="apasu_suffix placeholder="Sr., Jr., I, II, III"');?>
                                <span class="tooltiptext">Input Suffix</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Office Address','','for="apasu_officeAddress"').form_input('apasu_officeAddress','','placeholder="Lot no., Block no, Street name, Barangay, Municipal City"  id="apasu_officeAddress"');?>
                                <span class="tooltiptext">Input office address</span>
                            </li></ul>

                        </div>                                    
                    </div>
                    <div class="col-xs-12 ">
                        
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Position/Designation','','for="apasu_position"').form_input('apasu_position','','placeholder=" "  id="apasu_position"');?>                                
                                <span class="tooltiptext">Input position/designation</span>
                            </li></ul>
                        </div> 
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Sex','','for="apasu_sex"').form_dropdown('apasu_sex',$sexList,'','class="select-css" id="apasu_sex" required');?>
                                <span class="tooltiptext">Select sex</span>
                            </li></ul>
                        </div>                                   
                    </div>                           
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>                                    
                                <?= form_label('Mobile Number','','for="apasu_mobile"').form_input('apasu_mobile','','data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" placeholder="+(99) 999-9999-999" data-mask="" id="apasu_mobile"'); ?>
                                <span class="tooltiptext">Input mobile number (if any)</span>
                            </li></ul>
                        </div>    
                        <div class="col-xs-6 col-lg-6 tooltip"> 
                            <ul><li>                              
                                <?= form_label('Email Address','','for="apasu_email"').form_input('apasu_email','','type="email" placeholder="example@gmail.com, example@yahoo.com" id="apasu_email"'); ?>
                                <span class="tooltiptext">Input email address (if any)</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 hidden">
                        <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Upload Approved Special Order <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-6"> 
                                    <input type='file' name="apasuSOFile" id="apasuSOFile" onchange="readURLapasuSO(this);"  />
                                    <span id="apasuSOFile_span" class="apasuSOFile_span hidden"></span><br>
                                    <div id="uploadapasuSOFile_file"></div>
                                </div>
                        </fieldset>
                        </div> 
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                        <!-- <ul><li> -->
                            <label>Upload Approved Special Order <i>(*.pdf format, maximum size of 50MB)</i></label>
                            <input type="file" name="apasuspecialorder" id="apasuspecialorder" onchange="readURLapasuSo(this);" />
                            <input type="hidden" id="apasusofile" name="apasusofile">
                        <!-- </li></ul> -->
                        <div id="upload_so_apasu"></div>
                    </div>
                    <div class="col-xs-12" style="margin-top: 20px;">
                        <a type="text" class="btn btn-primary" id="addapasuinfo">Add data</a>
                    </div>
                    <div class="col-xs-12 "><br>
                        <table id="tblcaves_sample" class="table tglobal">
                            <tbody id="tbodycaves_sample" style="text-align: left;border: 0 none;"></tbody>
                        </table>
                        <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                            <table id="tblapasuinfo" class="content-table">
                                <thead>
                                    <tr>
                                        <th colspan="4" style="text-align: center; font-size: 24px">Assistant Protected Area Superintendent Officer</th>
                                    </tr>
                                    <tr class="text-nowrap">                                        
                                        <th>Fullname</th>
                                        <th>Sex</th>
                                        <th>Special Order</th>
                                        <th>Action</th>                                             
                                    </tr>                                              
                                </thead>
                               <tbody id="tbodyapasuinfo"></tbody>
                           </table>                                                
                       </div>
                   </div>    
                </fieldset>
                     
                <fieldset>
                    <legend>PAMO Staff</legend>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 ">                               
                            <div class="col-xs-3 col-lg-3 tooltip">
                                <ul><li>
                                    <?= form_label('First Name','','for="tfname"').form_input('tfname','','id="tfname" placeholder="ex. John, Jane" required');?>
                                    <span class="tooltiptext">Input First name</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-3 col-lg-3 tooltip">
                                <ul><li>
                                    <?= form_label('Middle Name','','for="tmname"').form_input('tmname','','id="tmname" placeholder="ex. A., dela Cruz" required');?>
                                    <span class="tooltiptext">Input Middle name</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-3 col-lg-3 tooltip">
                                <ul><li>
                                    <?= form_label('Last Name','','for="tlname"').form_input('tlname','','id="tlname" placeholder="ex. Rodriguez, Espino" required');?>
                                    <span class="tooltiptext">Input Family name</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-3 col-lg-3 tooltip">
                                <ul><li>
                                    <?= form_label('Suffix','','for="tsuffix"').form_input('tsuffix','','id="tsuffix placeholder="Sr., Jr., I, II, III"');?>
                                    <span class="tooltiptext">Input Suffix</span>
                                </li></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Sex','','for="tsex"').form_dropdown('tsex',$sexList,'','class="select-css" id="tsex" required');?>
                                <span class="tooltiptext">Select sex</span>
                            </li></ul>                                   
                        </div>
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Age','','for="tage"').form_input('tage','','id="tage" placeholder="Age" required');?>
                                <span class="tooltiptext">Input age</span>
                            </li></ul>
                        </div>   
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Position/Designation','','for="tposition"').form_input('tposition','','id="tposition" placeholder="example: Forester I,II,III / EMS I,II,III" required');?>
                                <span class="tooltiptext">Input position/designation</span>
                            </li></ul>
                        </div>                                
                    </div> 
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Status of Appointment','','for="tappointment"').form_dropdown('tappointment',$tappointment,'','class="select-css" id="tappointment" required');?>
                                <span class="tooltiptext">Select status of appointment</span>
                            </li></ul>
                        </div>                                    
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>                                        
                            <?= form_label('Date of Appointment').form_dropdown('pamb_date_month',$monthList,'','id="pamb_date_month" class="select-css"');?>
                            <span class="tooltiptext">Select date of appointment</span>
                            </li></ul>
                        </div>                                   
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>                                        
                            <?= form_label('&nbsp;').form_dropdown('pamb_date_year',$yearList,'','id="pamb_date_year" class="select-css"');?>
                            <span class="tooltiptext">Select date of appointment</span>
                            </li></ul>
                        </div>                                
                    </div> 
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Status of Employment','for="status_employment"').form_dropdown('status_employment',$status,'','id="status_employment" class="select-css"'); ?>
                                <span class="tooltiptext">Select status of employment</span>
                            </li></ul>
                        </div>
                    </div>       
                    <div class="col-xs-12 ">
                        <a type="text" id="addtechnical" class="btn btn-primary">Add data</a>
                    </div>
                    <div class="col-xs-12 ">   
                        <div class="table-responsive large-tables">
                            <table id="tblstaff" class="content-table">
                                <thead>
                                    <tr>
                                        <th colspan="5" style="text-align: center; font-size: 24px">PAMO Staff</th>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <th>Sex</th>
                                        <th>Status of appointment</th>
                                        <th>Position/Designation</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tbodytechnical">
                                </tbody>
                            </table>                            
                        </div>                            
                    </div> 
                </fieldset>
                </div>
            </div>