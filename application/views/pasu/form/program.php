<div class="form-style-6">
     <h2>PROGRAMS, PROJECTS, RESEARCH</h2>                            
</div> 
<div class="tab">
     <a class="tablinkppr active" id="loadprogs" onclick="tabpprm(event, 'programtab')">Program</a>
     <a class="tablinkppr" id="loadproj" onclick="tabpprm(event, 'projecttab')">Project</a>
     <a class="tablinkppr" id="loadresearch" onclick="tabpprm(event, 'researchtab')">Research</a>
</div>
<div id="programtab" class="tabcontentppr" style="display:block">
     <fieldset>
     <legend>Program</legend>
          <div class="col-xs-12">
               <div class="col-xs-12 ">
                    <div class="col-xs-12 col-lg-6 col-md-12">                                    
                         <ul><li>
                              <?= form_label('Sector','','for="programsector"').form_dropdown('programsector',$programsector,'',' id="programsector"');?>
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-6 col-md-12 tooltip">                                    
                         <ul><li>
                              <?= form_label('Program','','for="programsectorlist"').form_dropdown('programsectorlist','','',' id="programsectorlist"');?>
                              <span class="tooltiptext">A program is a cohesive grouping of activities and projects that contributes to a particular outcome of an agency. Following are the major programs under Enhanced Biodiversity Conservation and Scaling-up Coastal and Marine Ecosystem</span>
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip" id="prognamediv" style="display:none">
                         <ul><li>
                              <?= form_label('Specify other program','','for="program_name"').form_input('program_name','','placeholder=" " id="program_name"');?>
                              <span class="tooltiptext">Input Program title</span>
                         </li></ul>
                    </div>     
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Proponent/Implementing Partner','','for="program_partner"').form_input('program_partner','','placeholder=" " id="program_partner"');?>
                              <span class="tooltiptext">Short description on program</span>
                         </li></ul>
                    </div>                              
               </div>
               <div class="col-xs-12 ">
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Description','','for="program_details"').form_textarea('program_details','','placeholder=" " id="program_details"');?>
                              <span class="tooltiptext">Define main and specific objective/s of the program. Define the expected outcome/s.</span>
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">  
                         <fieldset>
                              <legend>Duration</legend>
                              <div class="col-xs-6 col-lg-3">
                                   <ul><li>
                                        <?= form_label('From','','for="prog_duration_from_month"').form_dropdown('prog_duration_from_month',$monthListed,'',' id="prog_duration_from_month"');?>
                                        <!-- <span class="tooltiptext">Select date duration</span> -->
                                   </li></ul>
                              </div>
                              <div class="col-xs-6 col-lg-3">
                                   <ul><li>
                                        <?= form_label('&nbsp;','','for="prog_duration_from_year"').form_dropdown('prog_duration_from_year',$yearListed,'',' id="prog_duration_from_year"');?>
                                        <!-- <span class="tooltiptext">Select date duration</span> -->
                                   </li></ul>
                              </div>
                              <div class="col-xs-6 col-lg-3">
                                   <ul><li>
                                        <?= form_label('To','','for="prog_duration_to_month"').form_dropdown('prog_duration_to_month',$monthListed,'',' id="prog_duration_to_month"');?>
                                        <!-- <span class="tooltiptext">Select date duration</span> -->
                                   </li></ul>
                              </div>
                              <div class="col-xs-6 col-lg-3">
                                   <ul><li>
                                        <?= form_label('&nbsp;','','for="prog_duration_to_year"').form_dropdown('prog_duration_to_year',$yearduration,'',' id="prog_duration_to_year"');?>
                                        <!-- <span class="tooltiptext">Select date duration</span> -->
                                   </li></ul>
                              </div>
                              <span class="tooltiptext">Date of Implementation</span>
                         </fieldset>
                    </div>    
               </div>                                       
               <div class="col-xs-12 ">
                    <div class="col-xs-12 col-lg-12 ">                                                
                         <a type="text" id="addprograms" class="btn btn-primary">Add data</a>
                    </div> 
               </div><br>  
               <div class="col-xs-12 col-lg-12 ">
                    <div class="table-responsive large-tables">
                         <table id="tablePAPrograms_sample" class="content-table">                                   
                              <tbody id="tbodyprograms_sample"></tbody>                              
                         </table><hr>
                         <table id="tablePAPrograms" class="content-table">
                         <thead>
                              <tr>
                                   <th colspan="6" style="text-align: center; font-size: 24px">Programs</th>
                              </tr>
                              <tr>
                                   <th>Sector</th>
                                   <th>Title</th>
                                   <th>Details</th>
                                   <th>Proponent/Implementing Partner</th>
                                   <th>Add/View</th>
                                   <th></th>
                             </tr>
                         </thead>
                         <tbody id="tbodyprograms"></tbody>                               
                         </table>                            
                     
                    </div>  
              </div>     
          </div>   
     </fieldset>  
</div>
<div id="projecttab" class="tabcontentppr">
     <fieldset>
     <legend>Project</legend>
          <input type="text" name="projgencode" class="hidden" id="projgencode">
          <div class="col-xs-12">
               <div class="col-xs-12 ">
                    <div class="col-xs-12">
                         <div class="col-xs-12 col-lg-6 col-md-12">                                    
                              <ul><li>
                                   <?= form_label('Sector','','for="projsector"').form_dropdown('projsector',$programsector,'',' id="projsector"');?>
                              </li></ul>
                         </div>
                         <div class="col-xs-12 col-lg-6 col-md-12 tooltip">                                    
                              <ul><li>
                                   <?= form_label('Project','','for="projsectorlist"').form_dropdown('projsectorlist','','','id="projsectorlist"');?>
                                   <span class="tooltiptext">Project which is a special department or agency undertaking carried out within a definite time frame and intended to result in some pre-determined measure of goods and services</span>
                              </li></ul>
                         </div>
                         <div class="col-xs-12 col-lg-12 tooltip" id="projnamediv" style="display:none">
                              <ul><li>
                                   <?= form_label('Specify other project','','for="proj_name"').form_input('proj_name','','placeholder=" " id="proj_name"');?>
                                   <span class="tooltiptext">Input project name</span>
                              </li></ul>
                         </div>      
                         <div class="col-xs-12 col-lg-12 tooltip hidden">
                              <ul><li>
                                   <?= form_label('Proponent/Implementing Partner','','for="proj_partner"').form_input('proj_partner','','placeholder=" " id="proj_partner"');?>
                                   <span class="tooltiptext">Short description on program</span>
                              </li></ul>
                         </div>                              
                    </div>                                                      
               </div>

               <div class="col-xs-12 ">
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Description','','for="proj_details"').form_textarea('proj_details','','placeholder=" " id="proj_details"');?>
                              <span class="tooltiptext">Short description on project</span>
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Proponent/Implementing Partner','','for="proj_proponent"').form_input('proj_proponent','','placeholder=" " id="proj_proponent"');?>
                              <span class="tooltiptext">The entity in charge of the Project Implementation</span>
                         </li></ul>
                    </div>
               </div>
               <div class="col-xs-12 ">
                   <div class="col-xs-6">
                         <fieldset>
                              <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Duration From</legend>
                              <div class="col-xs-12 col-lg-12 tooltip">  
                                   <div class="col-xs-6 col-lg-6 tooltip">
                                        <ul><li>
                                             <?= form_label(' ','','for="proj_start_implement_month"').form_dropdown('proj_start_implement_month',$monthListed,'',' id="proj_start_implement_month"');?>
                                        </li></ul>
                                   </div>
                                   <div class="col-xs-6 col-lg-6">
                                        <ul><li>
                                             <?= form_label(' ','','for="proj_start_implement_year"').form_dropdown('proj_start_implement_year',$yearListed,'',' id="proj_start_implement_year"');?>
                                        </li></ul>
                                   </div>
                                   <span class="tooltiptext">Start of the project implementation</span>
                              </div>                                            
                         </fieldset>
                   </div>
                   <div class="col-xs-6">
                         <fieldset>
                              <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">To</legend>
                                   <div class="col-xs-12 col-lg-12 tooltip">  
                                        <div class="col-xs-6 col-lg-6">
                                             <ul><li>
                                                  <?= form_label(' ','','for="proj_end_implement_month"').form_dropdown('proj_end_implement_month',$monthListed,'',' id="proj_end_implement_month"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-6">
                                             <ul><li>
                                                  <?= form_label(' ','','for="proj_end_implement_year"').form_dropdown('proj_end_implement_year',$yearduration,'',' id="proj_end_implement_year"');?>
                                             </li></ul>
                                        </div>
                                        <span class="tooltiptext">Termination Date of the Project</span>
                                   </div>                                            
                         </fieldset>
                    </div>
               </div>
               <div class="col-xs-12">                            
                    <div class="col-xs-12 col-lg-3 tooltip">                                    
                         <ul><li>
                              <?= form_label('Source of fund','','for="source_fund2"').form_dropdown('source_fund2',$progsourceoffund,'',' id="source_fund2"');?>
                              <span class="tooltiptext">Funding source of the Project. The Project may be fully or partially supported by the Philippine Government or supported by a Foreign Institution/Body/Committee (Foreign-Assisted)</span>
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-3 tooltip" id="idtypeoffundprog" style="display:none">                                    
                         <ul><li>
                              <?= form_label('Type of fund','','for="progtypeoffund"').form_dropdown('progtypeoffund',$progtypeoffund,'',' id="progtypeoffund"');?>
                              <span class="tooltiptext">Select type of fund</span>
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-3 tooltip" id="idtextchangesource" style="display:none">                                    
                         <ul><li>
                              <?= form_label(' ','','for="progtextsource" id="textsourceproj"').form_input('progtextsource','',' id="progtextsource"');?>
                              <!-- <span class="tooltiptext">Select type of fund</span> -->
                         </li></ul>
                    </div>
               </div>
               <div class="col-lg-12 col-md-12 col-xs-12">
                    <fieldset>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                         <?php echo form_checkbox('chk_cofinancing','','','id="chk_cofinancing" onclick="cofinancingchk();"').form_label('Co-Financing','','for="chk_cofinancing"') ?>
                    </div>
                    <div id="cofinancingtypeofpaymentDiv" style="display:none">
                         <div class="col-xs-12 col-lg-6 col-md-12">
                              <ul><li>
                                   <?= form_label('Type of payment','','for="typeofpaymentcofinancing"').form_dropdown('typeofpaymentcofinancing',$progtypeofpayment,'',' id="typeofpaymentcofinancing"');?>
                              </li></ul>
                         </div>
                         <div class="col-xs-12 col-lg-6 col-md-12" id="moneydivproj" style="display:none">
                              <div class="col-xs-12 col-lg-6 col-md-12">                                    
                                   <ul><li>
                                        <?= form_label('Currency','','for="projcurrency"').form_dropdown('projcurrency',$projcurrency,'',' id="projcurrency"');?>
                                   </li></ul>
                              </div>
                              <div class="col-xs-12 col-lg-6 col-md-12">
                                   <ul><li>
                                        <?= form_label('Amount','','for="moneymonetarytext"').form_input('moneymonetarytext','',' id="moneymonetarytext" class="number-separator"');?>                                   
                                   </li></ul>
                              </div>
                         </div>
                         <div class="col-xs-12 col-lg-6 col-md-12" id="inkinddivproj" style="display:none">
                              <div class="col-xs-12 col-lg-6 col-md-12">
                                   <ul><li>
                                        <?= form_label('Activities/Materials','','for="activitymonetarytext"').form_input('activitymonetarytext','',' id="activitymonetarytext"');?>                                   
                                   </li></ul>
                              </div>
                              <div class="col-xs-12 col-lg-6 col-md-12">
                                   <ul><li>
                                        <?= form_label('Monetary Value','','for="inkindmonetarytext"').form_input('inkindmonetarytext','',' id="inkindmonetarytext"');?>                                   
                                   </li></ul>
                              </div>
                         </div>
                    </div>
                    </fieldset>
               </div>
               <div class="col-xs-12 hidden">
                    <div class="col-xs-12 col-lg-3 tooltip">
                         <ul><li>
                              <?= form_label('Project Cost','','for="proj_cost"').form_input('proj_cost','','placeholder="Amount" class="number-separator" id="proj_cost"');?>
                              <span class="tooltiptext">Funds of the Project, including co-financing</span>
                         </li></ul>
                    </div>
               </div> 
               <div class="col-xs-12 ">                                    
                   <div class="col-xs-12 col-lg-6 tooltip">
                         <ul><li>
                              <?= form_label('Location','','for="proj_location2"').form_input('proj_location2','','placeholder=" " id="proj_location2"');?>
                              <span class="tooltiptext">Indicate the barangay, municipality/city/province covered by the Project</span>
                         </li></ul>
                   </div>
                   <div class="col-xs-12 col-lg-6 tooltip">
                         <ul><li>
                              <?= form_label('Area(has)','','for="proj_area2"').form_input('proj_area2','','placeholder="Hectares" class="number-separator" id="proj_area2"');?>
                              <span class="tooltiptext">Area covered by the project in hectares</span>
                         </li></ul>
                   </div>
               </div> 
               <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12">
                         <div class="col-xs-6 col-lg-6 tooltip">
                              <ul><li>
                                   <?= form_label('Status','','for="proj_status"').form_dropdown('proj_status',$projstatus,'',' id="proj_status"');?>
                                   <span class="tooltiptext">Indicate if on-going (implementation stage) or completed</span>
                              </li></ul>
                         </div>
                    </div>
               </div>
               <div class="col-xs-12" id="projcompletionrepdiv" style="display:none">
               <fieldset>
                    <legend>Upload Completion Report <i>(*.pdf format, maximum size of 50MB)</i></legend>
                    <input type='file' name="projcompletionrepups" id="projcompletionrepups" onchange="readURLprojcompletionreps(this);"  />
                    <input type="hidden" id="projcompletionrepups_span" name="projcompletionrepups_span" />
                    <div id="projcompletionuploaddiv"></div>
               </fieldset> 
          </div>
          <div class="col-xs-12 ">
               <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                         <?= form_label('Partnership','','for="proj_partnerships"').form_input('proj_partnerships','','placeholder=" " id="proj_partnerships"');?>
                         <span class="tooltiptext">Project Implementers with partnership instrument (MOA, MOU, etc)</span>
                    </li></ul>
               </div>
          </div>
          <div class="col-xs-12 ">
               <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                         <?= form_label('Objectives','','for="proj_objectives"').form_textarea('proj_objectives','','id="proj_objectives"');?>
                         <span class="tooltiptext">Main and Specific Objective/s of the Project. Define the Expected Outcome, Outputs and Activities to be conducted (conducted if completed) by the Project</span>
                    </li></ul>
               </div>
          </div>
          <div class="col-xs-12 ">
               <div class="col-xs-12 col-lg-12 inner-addon left-addon tooltip">
                    <ul><li>
                         <?= form_label('Remarks','','for="proj_remarks"').form_textarea('proj_remarks','','placeholder="Brief description" id="proj_remarks" style="height:100px"');?>
                         <span class="tooltiptext">Other details not in the corresponding field</span>
                    </li></ul>
               </div>
          </div> 
          <div class="col-xs-12">
               <fieldset>
                    <label>Multi-upload Project Reports <i>(PDF format, maximum size of 50MB)</i></label>
                    <input type='file' name="projreport_file_demo" id="projreport_file_demo" onchange="readURLprojReportFile(this);"  />
                    <input type="hidden" id="projreport_file_span" name="projreport_file_span" />
                    <div id="uploadProjReportFile"></div>
                    <span class="tooltiptext">Upload the accomplishment report/progress report, terminal report and other reports that will serve as the proof of the accomplishment of the Project</span>
               </fieldset>
          </div>      
          <div class="col-xs-12 col-lg-12 col-md-12 hidden">
               <fieldset>
                    <?= form_label('Attached PAMB Clearance<i>(PDF format, maximum size of 50MB)</i>').form_upload('projectclearancefile','','id="projectclearancefile" onchange="readURLprojectclearancefile(this);" ');?>
                    <input type="hidden" id="projectclearancefile_span" name="projectclearancefile_span" />
                    <div id="projectclearancefileuploaddiv"></div>   
               </fieldset>
          </div>                      
          <div class="col-xs-12 ">
               <div class="col-xs-12 col-lg-12 ">                                                
                    <a type="text" id="addprojects" class="btn btn-primary">Add data</a>
               </div> 
          </div><br>  
          <div class="col-xs-12 col-lg-12 ">
               <div class="table-responsive large-tables">                  
                    <table id="tablePAProj" class="content-table">
                         <thead>
                              <tr>
                                   <th colspan="9" style="text-align: center; font-size: 24px">Projects</th>
                              </tr>
                              <tr>
                                   <th>Sector</th>
                                   <th>Project Name</th>
                                   <th>Proponent</th>
                                   <th>Year(Start-End)</th>
                                   <th>Source of Fund</th>
                                   <th>Area(has)</th>
                                   <th>Location</th>
                                   <th>Document attached</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody id="tbodyproj"></tbody>                               
                    </table>
               </div>  
          </div>     
     </div>   
     </fieldset>                    
</div>
<div id="researchtab" class="tabcontentppr">
     <input type="text" name="researchGenCode" class="hidden" id="researchGenCode">
     <fieldset>
          <legend>Researches</legend>
          <div class="col-xs-12 col-lg-12">
               <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                         <?= form_label('Research Title','','for="research_type"').form_input('research_type','','placeholder=" " id="research_type"');?>
                         <span class="tooltiptext">Input research title</span>
                    </li></ul>
               </div>    
               <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                         <?= form_label('Purpose','','for="research_purpose"').form_input('research_purpose','','placeholder=" " id="research_purpose"');?>
                         <span class="tooltiptext">Input purpose of research</span>
                    </li></ul>
               </div>   
          </div>    
          <div class="col-xs-12 col-lg-12">
               <div class="col-xs-12 col-lg-12 tooltip">  
                    <fieldset>
                         <legend>Duration</legend>
                         <div class="col-xs-6 col-lg-3">
                              <ul><li>
                                   <?= form_label('From','','for="research_month_froms"').form_dropdown('research_month_froms',$monthListed,'',' id="research_month_froms"');?>
                              </li></ul>
                         </div>
                         <div class="col-xs-6 col-lg-3">
                              <ul><li>
                                   <?= form_label('&nbsp;','','for="research_year_froms"').form_dropdown('research_year_froms',$yearListed,'',' id="research_year_froms"');?>
                              </li></ul>
                         </div>
                         <div class="col-xs-6 col-lg-3">
                              <ul><li>
                                   <?= form_label('To','','for="research_month_tos"').form_dropdown('research_month_tos',$monthListed,'',' id="research_month_tos"');?>
                              </li></ul>
                         </div>
                         <div class="col-xs-6 col-lg-3">
                              <ul><li>
                                   <?= form_label('&nbsp;','','for="research_year_tos"').form_dropdown('research_year_tos',$yearduration,'',' id="research_year_tos"');?>
                              </li></ul>
                         </div>
                    </fieldset>
                    <span class="tooltiptext">Select date duration of research</span>
               </div>  
               <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                         <?= form_label('Funding Agency','','for="research_funding"').form_input('research_funding','','placeholder=" " id="research_funding"');?>
                         <span class="tooltiptext">Input funding agency</span>
                    </li></ul>
               </div>
               <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                         <?= form_label('Name of Researcher','','for="research_name"').form_input('research_name','','placeholder=" " id="research_name"');?>
                         <span class="tooltiptext">Input name of researcher(s)</span>
                    </li></ul>
               </div>
               <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                         <?= form_label('Institution','','for="research_institution"').form_input('research_institution','','placeholder=" " id="research_institution"');?>
                         <span class="tooltiptext">Input institution</span>
                    </li></ul>
               </div>
          </div>
          <div class="col-xs-12 col-lg-12"> 
               <div class="col-xs-12 col-lg-4 tooltip"> 
                    <ul><li>
                         <?= form_label('Status','','for="research_status"').form_dropdown('research_status',$researchstatus,'','id="research_status"');?>
                         <span class="tooltiptext">Select status of research</span>
                    </li></ul>
               </div>
          </div>
          <div class="col-xs-12 col-lg-12"> 
               <div class="col-xs-12 col-lg-12 tooltip" id="reasonterminatedivmain" style="display: none"> 
                    <ul><li>
                         <?= form_label('Reason','','for="research_reason_terminates"').form_textarea('research_reason_terminates','','placeholder=" " id="research_reason_terminates"');?>
                         <span class="tooltiptext">Input reason of termination/pending status</span>
                    </li></ul>
               </div>
               <div class="col-xs-12 col-lg-12 tooltip" id="progyearextenddivmain" style="display: none"> 
                    <ul><li>
                         <?= form_label('Year to be extend','','for="yearextendfromprogsmain"').form_dropdown('yearextendfromprogsmain',$yearduration,'','id="yearextendfromprogsmain"');?>
                         <span class="tooltiptext">Select year to be extend</span>
                    </li></ul>
               </div>
          </div>
          <div class="col-xs-12 col-lg-12">
               <fieldset>
                    <legend>Permit</legend>
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Number','','for="research_permitno"').form_input('research_permitno','','placeholder=" " id="research_permitno"');?>
                              <span class="tooltiptext">Number of Gratuituous Permit or Permit Issued by the PA (Use of PA for Scientific Purpose Prior to the Issuance of Research Agreements)</span>
                         </li></ul>
                    </div>   
                    <div class="col-md-12 col-xs-12 col-lg-12"> 
                         <?= form_label('Attached permit<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('researchpermit','','id="researchpermit" onchange="readURLsearchpermitee(this);"');?>
                         <input type="" class="hide" name="researchpermit_txt" id="researchpermit_txt">
                    </div>
                    <div id="load_researchpermit"></div>
               </fieldset>  
          </div>
          <fieldset>
               <legend>PAMB Resolution</legend>
               <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-6 col-lg-6 tooltip">
                         <ul><li>
                              <?= form_label('Resolution Number','','for="research_pambreso"').form_input('research_pambreso','','placeholder=" " id="research_pambreso"');?>
                              <span class="tooltiptext">Input PAMB resolution number</span>
                         </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-6 tooltip">
                         <ul><li>
                              <?= form_label('Title of Resolution','','for="research_titlereso"').form_input('research_titlereso','','placeholder=" " id="research_titlereso"');?>
                              <span class="tooltiptext">Input title of PAMB Resolution</span>
                         </li></ul>
                    </div>  
               </div> 
               <fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of PAMB Resolution<i>(*.pdf format, maximum size of 50MB)</i></legend>
                    <input type='file' name="research_pambReso_files" id="research_pambReso_files" onchange="readURLresearchPAMBfileReport(this);"  />
                    <input type="hidden" name="research_pambReso_text" id="research_pambReso_text">
                    <div id="load_PAMBReso_File"></div>
                    <div class="col-xs-12 col-lg-12 ">  
                         <br><a type="text" id="addsearchpambresos" class="btn btn-warning">Add to list PAMB Resolution</a>
                    </div>
                    <div id="uploadresearch_PAMBReso_File"></div>
                    <div class="col-xs-12 ">   
                         <div class="table-responsive large-tables">                
                              <table id="tableRefResolution" class="table  table-bordered tglobal">                              
                                   <tbody id="tbodyrefResolution"></tbody>
                              </table><br>
                         </div>                             
                    </div> 
               </fieldset>     
          </fieldset>      
          <div class="col-xs-12 col-lg-12">
               <?= form_checkbox('chk_progres_approvemain','','','id="chk_progres_approvemain" onclick="research_chk_reso();"').form_label('Presented and adopted by the PAMB','','for="chk_progres_approvemain"');?>
          </div>
          <div class="col-xs-12 col-lg-12" id="approvemaindivs" style="display:none">  
               <fieldset>
                    <label>Upload copy of final result/report <i>(*.pdf format, maximum size of 50MB)</i></label>
                    <input type='file' name="research_add_file" id="research_add_file" onchange="readURLresearchfileReport(this);"  />
                    <span id="research_add_file_span" class="research_add_file_span hidden"></span>
                    <div id="uploadresearch_add_file"></div>
               </fieldset>
               <fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of resolution adopting report<i>(*.pdf format only)</i></legend>
                    <input type='file' name="research_reso_pamb" id="research_reso_pamb" onchange="readURLresearchfilePAMBResofiles(this);"  />
                    <input id="research_reso_pamb_old" type="hidden" name="research_reso_pamb_old">
                    <div id="uploadresearch_reso_pamb"></div>
               </fieldset>
          </div>
          <fieldset>
               <legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">References</legend>        
               <div class="col-xs-12 tooltip">
                    <div class="col-xs-12 col-lg-12">
                         <ul><li>
                              <?= form_label('Type of citation').form_dropdown('researchtype_citation',$citationlist,'','id="researchtype_citation"');?>
                         </li></ul>
                    </div>
                    <fieldset>
                         <legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">Date published</legend>
                         <div class="col-xs-6 col-lg-4">
                              <ul><li>
                                   <?= form_dropdown('research_ref_date_month',$monthListed,'','id="research_ref_date_month"');?>
                              </li></ul>
                         </div>
                         <div class="col-xs-6 col-lg-4">
                              <ul><li>
                                  <?= form_dropdown('research_ref_date_year',$yearListed,'','id="research_ref_date_year"');?>
                              </li></ul>
                         </div>
                    </fieldset>    
                    <span class="tooltiptext">Select date published</span>                                
               </div>
               <div class="col-xs-12">                                    
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Author <i>(Last name, First initial. Middle initial)</i>','','for="research_author"').form_input('research_author','','placeholder="Name of the author" id="research_author"');?>
                              <span class="tooltiptext">Input author</span>
                         </li></ul>
                    </div>
               </div>
               <div class="col-xs-12 col-lg-12" id="researchdivwebsiteRef" style="display:none">
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Web page title','','for="researchwebtitleRef"').form_input('researchwebtitleRef','','placeholder="eg. Better Call Saul’ last?" id="researchwebtitleRef"');?>       
                              <span class="tooltiptext">Input title of web page</span>                                 
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Name of website','','for="researchwebsiteRef"').form_input('researchwebsiteRef','','placeholder="eg. FiveThirtyEight" id="researchwebsiteRef"');?>       
                              <span class="tooltiptext">Input name of website</span>                                 
                         </li></ul>
                    </div>
               </div>
               <div class="col-xs-12 col-lg-12" id="researchdivbookRef" style="display:none">
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Title of work','','for="researchworktitleRef"').form_input('researchworktitleRef','','placeholder="eg. Big little lies." id="researchworktitleRef"');?>       
                              <span class="tooltiptext">Input title of work</span>                                 
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Publisher','','for="researchbookpublisherRefs"').form_input('researchbookpublisherRefs','','placeholder="eg. G. P. Putnam’s Sons." id="researchbookpublisherRefs"');?>       
                              <span class="tooltiptext">Input name of publisher</span>                                 
                         </li></ul>
                    </div>
               </div>                    
               <div class="col-xs-12" id="researchdivjournalRef" style="display:none">
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Article title','','for="researchjournaltitleRef"').form_input('researchjournaltitleRef','','placeholder="eg. The forum: The decline of war." id="researchjournaltitleRef"');?>       
                              <span class="tooltiptext">Input title of article</span>                                 
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Title of periodical','','for="researchperiodicalRef"').form_input('researchperiodicalRef','','placeholder="eg. The forum: The decline of war." id="researchperiodicalRef"');?>       
                              <span class="tooltiptext">Input title of periodical</span>                                 
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Volume(Issue)','','for="researchjournalVolRef"').form_input('researchjournalVolRef','','placeholder="eg. W. R. (2013)" id="researchjournalVolRef"');?>       
                              <span class="tooltiptext">Input volume of journal</span>                                 
                         </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Page range','','for="researchjournalpagerangeRef"').form_input('researchjournalpagerangeRef','','placeholder="15(3), 396-419.)" id="researchjournalpagerangeRef"');?>       
                              <span class="tooltiptext">Input page range</span>                                 
                         </li></ul>
                    </div>
               </div>
               <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('URL/Source','','for="research_links"').form_input('research_links','','placeholder="eg. http://socialmediatoday.com" id="research_links"');?>
                              <span class="tooltiptext">Input link URL/source</span>
                         </li></ul>
                    </div>
               </div>  
               <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 tooltip">
                         <ul><li>
                              <?= form_label('Description','','for="research_reference_desc"').form_textarea('research_reference_desc','','id="research_reference_desc"');?>
                              <span class="tooltiptext">Input short description</span>
                         </li></ul>
                    </div>
               </div>          
               <div class="col-xs-12 ">
                    <a type="text" id="addrefresearches" class="btn btn-warning">Add to list</a>
               </div>
               <div class="col-xs-12 ">   
                    <div class="table-responsive large-tables">                
                         <table id="tableRefResearch" class="table table-bordered tglobal">                              
                              <tbody id="tbodyrefResearch"></tbody>
                         </table><br>
                    </div>                             
               </div> 
          </fieldset>
          <div class="col-xs-12 col-lg-12 hidden">
               <fieldset>         
                    <div class="col-md-12 col-xs-12 col-lg-12"> 
                         <?= form_label('Attached PAMB Clearance<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('researpambclearance','','id="researpambclearance" onchange="readURLsearchpambclearace(this);"');?>
                         <input type="" class="hide" name="researpambclearance_txt" id="researpambclearance_txt">
                    </div>
                    <div id="load_researchpambclearance"></div>
               </fieldset>  
          </div>
          <div class="col-xs-12 col-lg-12">                            
               <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12 ">                                                
                         <a type="text" id="addresearchsmain" class="btn btn-primary">Add data</a>
                    </div> 
               </div>  
               <div class="col-xs-12 col-lg-12 ">
                    <div class="table-responsive large-tables">
                         <table id="tableSearch" class="content-table">
                              <thead>
                                   <tr>
                                        <th colspan="2" style="text-align: center; font-size: 24px">Research</th>
                                   </tr>   
                                   <tr>
                                        <th>Type</th>
                                        <th>Purpose</th>
                                   </tr>                       
                              </thead>
                              <tbody id="tbodyresearch"></tbody>                               
                         </table>     
                    </div>  
               </div>
          </div>
     </fieldset>
</div>                

<form method="post" action="" id="ResearchesForms1" enctype="multipart/form-data" role="form" class="form-style-7">
     <div class="modal fade" data-backdrop="static" id="modal-edit-search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Add Research</h4>
                    </div>
                         <input type="hidden" id="search-id" name="search-id" value="" />
                         <input type="hidden" id="search-gencode" name="search-gencode" value="" />
                         <input type="hidden" id="search-id_program" name="search-id_program" value="" />
                         <input type="hidden" id="search-searchcode" name="search-searchcode" value="" />
                    <div class="modal-body" >
                         <fieldset>
                        <div class="col-xs-12">
                              <div class="col-xs-12 ">
                                   <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Research Title','','for="add-search_type"').form_input('add-search_type','','placeholder=" " id="add-search_type"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Purpose','','for="add-search_purpose"').form_input('add-search_purpose','','placeholder=" " id="add-search_purpose"');?>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12">
                                        <fieldset><legend>Duration</legend>
                                             <div class="col-xs-6 col-lg-3">
                                                  <ul><li>
                                                       <?= form_label('From','','for="add-search_monthfrom"').form_dropdown('add-search_monthfrom',$monthListed,'',' id="add-search_monthfrom"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-xs-6 col-lg-3">
                                                  <ul><li>
                                                       <?= form_label('&nbsp;','','for="add-search_yearfrom"').form_dropdown('add-search_yearfrom',$yearListed,'',' id="add-search_yearfrom"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-xs-6 col-lg-3">
                                                  <ul><li>
                                                       <?= form_label('To','','for="add-search_monthto"').form_dropdown('add-search_monthto',$monthListed,'',' id="add-search_monthto"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-xs-6 col-lg-3">
                                                  <ul><li>
                                                       <?= form_label('&nbsp;','','for="add-search_yearto"').form_dropdown('add-search_yearto',$yearduration,'',' id="add-search_yearto"');?>
                                                  </li></ul>
                                             </div>
                                        </fieldset>
                                   </div>
                                   <fieldset><legend>Permit</legend>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Number','','for="add-search_permit"').form_input('add-search_permit','','placeholder=" " id="add-search_permit"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-lg-12">
                                            <?= form_label('Attached permit<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-searchpermit','','id="edit-searchpermit" onchange="readURLsearchpermit(this);"');?>
                                            <input type="" class="hide" name="edit-searchpermit_txt" id="edit-searchpermit_txt" />
                                            <div id="searchprogrampermitdiv"></div>
                                        </div>
                                   </fieldset>
                                   <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-4">
                                             <ul><li>
                                                  <?= form_label('Funding Agency','','for="add-search_funding"').form_input('add-search_funding','','placeholder=" " id="add-search_funding"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-4">
                                             <ul><li>
                                                  <?= form_label('Name of Researcher','','for="add-search_name"').form_input('add-search_name','','placeholder=" " id="add-search_name"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-4">
                                             <ul><li>
                                                  <?= form_label('Institution','','for="add-search_institution"').form_input('add-search_institution','','placeholder=" " id="add-search_institution"');?>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-4">
                                             <ul><li>
                                                  <?= form_label('Status','','for="research_fromprog_status"').form_dropdown('research_fromprog_status',$researchstatus,'','id="research_fromprog_status"');?>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12" id="progreasonterminatediv" style="display: none">
                                             <ul><li>
                                                  <?= form_label('Reason','','for="research_reason_terminatefromprog"').form_textarea('research_reason_terminatefromprog','','placeholder=" " id="research_reason_terminatefromprog"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12" id="progyearextenddiv" style="display: none">
                                             <ul><li>
                                                  <?= form_label('Year Extend','','for="add-yearextendfromprog"').form_dropdown('add-yearextendfromprog',$yearduration,'','id="add-yearextendfromprog"');?>
                                             </li></ul>
                                        </div>
                                   </div>
                              </div>
                              <fieldset><legend>PAMB Resolution</legend>
                                   <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-6 col-lg-6">
                                             <ul><li>
                                                  <?= form_label('Number','','for="add-search_pambresono"').form_input('add-search_pambresono','','placeholder=" " id="add-search_pambresono"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-6">
                                             <ul><li>
                                                  <?= form_label('Title of Resolution','','for="add-search_titlereso"').form_input('add-search_titlereso','','placeholder=" " id="add-search_titlereso"');?>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <fieldset><legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of PAMB Resolution <i>(*.pdf format only)</i></legend>
                                        <input type='file' name="add_modal-pambreso" id="add_modal-pambreso" onchange="readURLModalresearchPAMBRESO(this);"  />
                                        <span id="add_modal-pambreso_span" class="add_modal-pambreso_span hidden"></span><br>
                                        <div id="add_modal-pambreso_file"></div>
                                   </fieldset>  
                                   <div class="hidden">                           
                                        <?= form_label('Attached PAMB Resolution<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('add-researchreso','','id="add-researchreso" onchange="readURLsearchpambreso(this);"');?>
                                   </div>  
                              </fieldset> 
                              
                              <div class="col-xs-12 col-lg-12">
                                   <?= form_checkbox('add-chk_progres_approve','','','id="add-chk_progres_approve" onclick="research_chk_reso();"').form_label('Adopted by the PAMB','','for="add-chk_progres_approve"');?>
                              </div>
                              <div class="col-xs-12 col-lg-12" id="edit-chk_progres_approve" style="display: none;">
                                   <fieldset class=""><legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of final result/report <i>(*.pdf format only)</i></legend>
                                        <input type='file' name="modal_research_file" id="modal_research_file" onchange="readURLModalresearchfileReport(this);"  />
                                        <input id="modal_research_file_old" class="modal_research_file_old hidden" name="modal_research_file_old" />
                                        <span id="modal_research_file_span" class="modal_research_file_span hidden"></span>
                                        <div id="uploadmodal_research_file"></div>
                                   </fieldset>
                                   <fieldset><legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of resolution adopting report<i>(*.pdf format only)</i></legend>
                                        <input type='file' name="modal_research_reso" id="modal_research_reso" onchange="readURLModalresearchfilePAMBReso(this);"  />
                                        <input id="modal_research_reso_old" type="hidden" name="modal_research_reso_old">
                                        <div id="uploadmodal_research_reso"></div>
                                   </fieldset>
                              </div>
                              <fieldset><legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">References</legend>                            
                                   <div class="col-xs-12 tooltip">
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Type of citation').form_dropdown('add-researchtype_citation',$citationlist,'','id="add-researchtype_citation"');?>
                                             </li></ul>
                                        </div>
                                        <fieldset><legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">Date published</legend>
                                             <div class="col-xs-6 col-lg-4">
                                                  <ul><li>
                                                       <?= form_dropdown('add-research_ref_date_month',$monthListed,'','id="add-research_ref_date_month"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-xs-6 col-lg-4">
                                                  <ul><li>
                                                       <?= form_dropdown('add-research_ref_date_year',$yearListed,'','id="add-research_ref_date_year"');?>
                                                  </li></ul>
                                             </div>
                                        </fieldset>    
                                        <span class="tooltiptext">Select date published</span>                                
                                   </div>
                                   <div class="col-xs-12">                                    
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Author <i>(Last name, First initial. Middle initial)</i>','','for="add-research_author"').form_input('add-research_author','','placeholder="Name of the author" id="add-research_author"');?>
                                                  <span class="tooltiptext">Input author</span>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12" id="add-researchdivwebsiteRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Web page title','','for="add-researchwebtitleRef"').form_input('add-researchwebtitleRef','','placeholder="eg. Better Call Saul’ last?" id="add-researchwebtitleRef"');?>       
                                                  <span class="tooltiptext">Input title of web page</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Name of website','','for="add-researchwebsiteRef"').form_input('add-researchwebsiteRef','','placeholder="eg. FiveThirtyEight" id="add-researchwebsiteRef"');?>       
                                                  <span class="tooltiptext">Input name of website</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12" id="add-researchdivbookRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Title of work','','for="add-researchworktitleRef"').form_input('add-researchworktitleRef','','placeholder="eg. Big little lies." id="add-researchworktitleRef"');?>       
                                                  <span class="tooltiptext">Input title of work</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Publisher','','for="add-researchbookpublisherRefs"').form_input('add-researchbookpublisherRefs','','placeholder="eg. G. P. Putnam’s Sons." id="add-researchbookpublisherRefs"');?>       
                                                  <span class="tooltiptext">Input name of publisher</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>                    
                                   <div class="col-xs-12" id="add-researchdivjournalRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Article title','','for="add-researchjournaltitleRef"').form_input('add-researchjournaltitleRef','','placeholder="eg. The forum: The decline of war." id="add-researchjournaltitleRef"');?>       
                                                  <span class="tooltiptext">Input title of article</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Title of periodical','','for="add-researchperiodicalRef"').form_input('add-researchperiodicalRef','','placeholder="eg. The forum: The decline of war." id="add-researchperiodicalRef"');?>       
                                                  <span class="tooltiptext">Input title of periodical</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Volume(Issue)','','for="add-researchjournalVolRef"').form_input('add-researchjournalVolRef','','placeholder="eg. W. R. (2013)" id="add-researchjournalVolRef"');?>       
                                                  <span class="tooltiptext">Input volume of journal</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Page range','','for="add-researchjournalpagerangeRef"').form_input('add-researchjournalpagerangeRef','','placeholder="15(3), 396-419.)" id="add-researchjournalpagerangeRef"');?>       
                                                  <span class="tooltiptext">Input page range</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('URL/Source','','for="add-research_links"').form_input('add-research_links','','placeholder="eg. http://socialmediatoday.com" id="add-research_links"');?>
                                                  <span class="tooltiptext">Input link URL/source</span>
                                             </li></ul>
                                        </div>
                                   </div>  
                                   <div class="col-xs-12">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Description','','for="add-research_reference_desc"').form_textarea('add-research_reference_desc','','id="add-research_reference_desc"');?>
                                                  <span class="tooltiptext">Input short description</span>
                                             </li></ul>
                                        </div>
                                   </div> 
                                   <div class="col-xs-12 ">
                                        <a type="text" id="addrefresearchEditformformProgram" class="btn btn-warning">Add to list</a>
                                   </div>
                                   <div class="col-xs-12 ">   
                                        <div class="table-responsive large-tables">                
                                             <table id="tableRefResearchProgram" class="table table-bordered tglobal">                              
                                                  <tbody id="tbodyrefResearchProgram"></tbody>
                                             </table><br>
                                        </div>                             
                                   </div>                         
                              </fieldset>
                              <div class="col-xs-12" style="margin-top:30px;">
                                   <div class="col-xs-12 col-lg-12 ">
                                        <button class="btn btn-info" type="button" onclick="UpdateProgResearchs();" />Add research
                                   </div>
                              </div>
                         </div>
                    </fieldset>
                    <div class="col-xs-12 col-lg-12 ">
                         <div class="table-responsive large-tables">
                              <table id="tablePAresearchs" class="table  table-bordered tglobal">
                                   <thead>
                                        <tr>
                                             <th colspan="3" style="text-align: center; font-size: 24px">Research</th>
                                        </tr>
                                        <tr>
                                             <th>Type of Research</th>
                                             <th>Purpose</th>
                                             <th></th>
                                        </tr>
                                   </thead>
                                   <tbody id="tbodyresearchs"></tbody>
                              </table>
                         </div>
                    </div>
               </div>
               </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
</form>

<form method="post" action="#" id="ResearchForm" role="form" class="form-style-7">
     <div class="modal fade" data-backdrop="static" id="modal-edit-research2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Edit Researchers</h4>
                    </div>
                         <input type="hidden" id="research2-id" name="research2-id" value="" />
                         <input type="hidden" id="research2-gencode" name="research2-gencode" value="" />
                         <input type="text" name="research2-researchGenCode" class="hidden" id="research2-researchGenCode">
                    <div class="modal-body" >
                         <fieldset>
                              <div class="col-xs-12">
                                   <div class="col-xs-12 ">
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Research Title','','for="edit-editsearch_type"').form_input('edit-editsearch_type','','placeholder=" " id="edit-editsearch_type"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Purpose','','for="edit-editsearch_purpose"').form_input('edit-editsearch_purpose','','placeholder=" " id="edit-editsearch_purpose"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <fieldset><legend>Duration</legend>
                                                  <div class="col-xs-6 col-lg-3">
                                                       <ul><li>
                                                            <?= form_label('From','','for="edit-research_month_froms"').form_dropdown('edit-research_month_froms',$monthListed,'',' id="edit-research_month_froms"');?>
                                                       </li></ul>
                                                  </div>
                                                  <div class="col-xs-6 col-lg-3">
                                                       <ul><li>
                                                            <?= form_label('&nbsp;','','for="edit-research_year_froms"').form_dropdown('edit-research_year_froms',$yearListed,'',' id="edit-research_year_froms"');?>
                                                       </li></ul>
                                                  </div>
                                                  <div class="col-xs-6 col-lg-3">
                                                       <ul><li>
                                                            <?= form_label('To','','for="edit-research_month_tos"').form_dropdown('edit-research_month_tos',$monthListed,'',' id="edit-research_month_tos"');?>
                                                       </li></ul>
                                                  </div>
                                                  <div class="col-xs-6 col-lg-3">
                                                       <ul><li>
                                                            <?= form_label('&nbsp;','','for="edit-research_year_tos"').form_dropdown('edit-research_year_tos',$yearduration,'',' id="edit-research_year_tos"');?>
                                                       </li></ul>
                                                  </div>
                                             </fieldset>
                                        </div>
                                        <fieldset><legend>Permit</legend>
                                             <div class="col-xs-12 col-lg-12">
                                                  <ul><li>
                                                       <?= form_label('Number','','for="edit-editsearch_permit"').form_input('edit-editsearch_permit','','placeholder=" " id="edit-editsearch_permit"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-md-12 col-xs-12 col-lg-12">
                                                  <?= form_label('Attached permit<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-editsearchpermite','','id="edit-editsearchpermite" onchange="readURLsearchpermiteEdit(this);"');?>
                                                  <input type="hidden" name="edit-editsearchpermit_txte" id="edit-editsearchpermit_txte">
                                                  <input type="hidden" id="edit-editsearchpermit_spane" name="edit-editsearchpermit_spane" />
                                                  <div id="edit-load_researchpermit"></div>
                                             </div>
                                             <div class="col-md-12 col-xs-12 col-lg-12">
                                                  <?= form_label('Current file attached : ','','for="editexisting_research_permit"')?>
                                                  <a href="" id="editexisting_research_permit" target="_blank"></a>
                                             </div>
                                        </fieldset>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Funding Agency','','for="edit-editsearch_funding"').form_input('edit-editsearch_funding','','placeholder=" " id="edit-editsearch_funding"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Name of Researcher','','for="edit-editsearch_name"').form_input('edit-editsearch_name','','placeholder=" " id="edit-editsearch_name"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Institution','','for="edit-editsearch_institution"').form_input('edit-editsearch_institution','','placeholder=" " id="edit-editsearch_institution"');?>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Status','','for="edit-research_status"').form_dropdown('edit-research_status',$researchstatus,'','id="edit-research_status"');?>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-12 col-lg-12" id="reasonterminatedivEdit" style="display: none">
                                             <ul><li>
                                                  <?= form_label('Reason','','for="edit-research_reason_terminate"').form_textarea('edit-research_reason_terminate','','placeholder=" " id="edit-research_reason_terminate"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12" id="progyearextenddivmainEdit" style="display: none">
                                             <ul><li>
                                                  <?= form_label('Year to be extend','','for="edit-yearextendfromprogsmain"').form_dropdown('edit-yearextendfromprogsmain',$yearduration,'','id="edit-yearextendfromprogsmain"');?>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <fieldset><legend>PAMB Resolution</legend>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Number','','for="edit-editsearch_pambreso"').form_input('edit-editsearch_pambreso','','placeholder=" " id="edit-editsearch_pambreso"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Title of Resolution','','for="edit-editsearch_titlereso"').form_input('edit-editsearch_titlereso','','placeholder=" " id="edit-editsearch_titlereso"');?>
                                             </li></ul>
                                        </div>
                                        <fieldset><legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of PAMB Resolution <i>(*.pdf format only)</i></legend>
                                             <input type='file' name="edit-research_pambReso_files" id="edit-research_pambReso_files" onchange="readURLresearchPAMBfileReportEdit(this);"  />
                                             <input type="hidden" id="edit-researchreso_span" name="edit-researchreso_span" />
                                             <div id="edit-load_PAMBReso_File"></div>
                                             <div class="col-xs-12 col-lg-12 ">
                                                  <br><a type="text" id="addsearchpambresosEdit" class="btn btn-warning">Add to list PAMB Resolution</a>
                                             </div>
                                             <div id="edit-uploadresearch_PAMBReso_File"></div>
                                        </fieldset>
                                   </fieldset>
                                   <div class="col-xs-12 col-lg-12">
                                        <?= form_checkbox('edit-chk_progres_approvemain','','','id="edit-chk_progres_approvemain" onclick="research_chk_reso();"').form_label('Presented and adopted by the PAMB','','for="edit-chk_progres_approvemain"');?>
                                   </div>
                                   <div class="col-xs-12 col-lg-12" id="edit-approvemaindivs" style="display:none">  
                                        <fieldset><legend>Upload copy of final result/report <i>(*.pdf format only)</i></legend>
                                             <input type='file' name="edit-research_add_file" id="edit-research_add_file" onchange="readURLresearchfileReport_forEdit(this);"  />
                                             <span id="edit-research_add_file_span" class="edit-research_add_file_span hidden"></span>
                                             <div id="edit-uploadresearch_add_file"></div>
                                        </fieldset>
                                        <fieldset><legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of resolution adopting report<i>(*.pdf format only)</i></legend>
                                             <input type='file' name="edit-research_reso_pamb" id="edit-research_reso_pamb" onchange="readURLresearchfilePAMBResofilesEdit(this);"  />
                                             <input id="edit-research_reso_pamb_old" type="hidden" name="edit-research_reso_pamb_old">
                                             <input id="edit-research_reso_pamb_new" type="hidden" name="edit-research_reso_pamb_new">
                                             <div id="edit-uploadresearch_reso_pamb"></div>
                                        </fieldset>
                                   </div>
                                   <div class="col-xs-12 col-lg-12 hidden">
                                        <fieldset>
                                             <div class="col-md-12 col-xs-12 col-lg-12">
                                                  <?= form_label('Attached PAMB Clearance<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-researpambclearance','','id="edit-researpambclearance" onchange="readURLsearchpambclearaceEdit(this);"');?>
                                                  <input type="" class="hide" name="edit-researpambclearance_span" id="edit-researpambclearance_span">
                                                  <input type="" class="hide" name="edit-researpambclearance_txt" id="edit-researpambclearance_txt">
                                             </div>
                                             <div id="edit-load_researchpambclearance"></div>
                                        </fieldset>
                                        <div class="col-md-12 col-xs-12 col-lg-12">
                                             <?= form_label('Current file attached : ','','for="research_pambclearance_edit"')?>
                                             <a href="" id="research_pambclearance_edit" target="_blank"></a>
                                        </div>
                                   </div>
                              <fieldset><legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">References</legend>                            
                                   <div class="col-xs-12 tooltip">
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Type of citation').form_dropdown('edit-researchtype_citation',$citationlist,'','id="edit-researchtype_citation"');?>
                                             </li></ul>
                                        </div>
                                        <fieldset><legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">Date published</legend>
                                             <div class="col-xs-6 col-lg-4">
                                                  <ul><li>
                                                       <?= form_dropdown('edit-research_ref_date_month',$monthListed,'','id="edit-research_ref_date_month"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-xs-6 col-lg-4">
                                                  <ul><li>
                                                       <?= form_dropdown('edit-research_ref_date_year',$yearListed,'','id="edit-research_ref_date_year"');?>
                                                  </li></ul>
                                             </div>
                                        </fieldset>    
                                        <span class="tooltiptext">Select date published</span>                                
                                   </div>
                                   <div class="col-xs-12">                                    
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Author <i>(Last name, First initial. Middle initial)</i>','','for="edit-research_author"').form_input('edit-research_author','','placeholder="Name of the author" id="edit-research_author"');?>
                                                  <span class="tooltiptext">Input author</span>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12" id="edit-researchdivwebsiteRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Web page title','','for="edit-researchwebtitleRef"').form_input('edit-researchwebtitleRef','','placeholder="eg. Better Call Saul’ last?" id="edit-researchwebtitleRef"');?>       
                                                  <span class="tooltiptext">Input title of web page</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Name of website','','for="edit-researchwebsiteRef"').form_input('edit-researchwebsiteRef','','placeholder="eg. FiveThirtyEight" id="edit-researchwebsiteRef"');?>       
                                                  <span class="tooltiptext">Input name of website</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12" id="edit-researchdivbookRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Title of work','','for="edit-researchworktitleRef"').form_input('edit-researchworktitleRef','','placeholder="eg. Big little lies." id="edit-researchworktitleRef"');?>       
                                                  <span class="tooltiptext">Input title of work</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Publisher','','for="edit-researchbookpublisherRef"').form_input('edit-researchbookpublisherRef','','placeholder="eg. G. P. Putnam’s Sons." id="edit-researchbookpublisherRef"');?>       
                                                  <span class="tooltiptext">Input name of publisher</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>                    
                                   <div class="col-xs-12" id="edit-researchdivjournalRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Article title','','for="edit-researchjournaltitleRef"').form_input('edit-researchjournaltitleRef','','placeholder="eg. The forum: The decline of war." id="edit-researchjournaltitleRef"');?>       
                                                  <span class="tooltiptext">Input title of article</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Title of periodical','','for="edit-researchperiodicalRef"').form_input('edit-researchperiodicalRef','','placeholder="eg. The forum: The decline of war." id="edit-researchperiodicalRef"');?>       
                                                <span class="tooltiptext">Input title of periodical</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Volume(Issue)','','for="edit-researchjournalVolRef"').form_input('edit-researchjournalVolRef','','placeholder="eg. W. R. (2013)" id="edit-researchjournalVolRef"');?>       
                                                  <span class="tooltiptext">Input volume of journal</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Page range','','for="edit-researchjournalpagerangeRef"').form_input('edit-researchjournalpagerangeRef','','placeholder="15(3), 396-419.)" id="edit-researchjournalpagerangeRef"');?>       
                                                  <span class="tooltiptext">Input page range</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('URL/Source','','for="edit-research_links"').form_input('edit-research_links','','placeholder="eg. http://socialmediatoday.com" id="edit-research_links"');?>
                                                  <span class="tooltiptext">Input link URL/source</span>
                                             </li></ul>
                                        </div>
                                   </div>  
                                   <div class="col-xs-12">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Description','','for="edit-research_reference_desc"').form_textarea('edit-research_reference_desc','','id="edit-research_reference_desc"');?>
                                                  <span class="tooltiptext">Input short description</span>
                                             </li></ul>
                                        </div>
                                   </div>     
                                   <div class="col-xs-12 ">
                                        <a type="text" id="addrefresearchEditformform" class="btn btn-warning">Add to list</a>
                                   </div>
                                   <div class="col-xs-12"><div id="divresearchreferencesdata"></div></div> 
                              </fieldset>
                              <div class="col-xs-12 ">
                                   <div class="modal-footer">
                                        <button class="btn btn-info" type="button" onclick="UpdateResearchersedit();" />Update
                                   </div>
                              </div>
                         </div>
                    </fieldset>
                    </div>
               </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
</form>

<form method="post" action="" id="ResearchesEditForm" enctype="multipart/form-data" role="form" class="form-style-7">
     <div class="modal fade" data-backdrop="static" id="modal-edit-searche" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Edit Research</h4>
                    </div>
                    <input type="hidden" id="searche-id" name="searche-id" value="" />
                    <input type="hidden" id="searche-gencode" name="searche-gencode" value="" />
                    <input type="hidden" id="searche-id_program" name="searche-id_program" value="" />
                    <input type="hidden" id="searche-searchcode" name="searche-searchcode" value="" />
                    <div class="modal-body" >
                         <fieldset>
                              <div class="col-xs-12">
                                   <div class="col-xs-12 ">
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Research Title','','for="edit-search_type"').form_input('edit-search_type','','placeholder=" " id="edit-search_type"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Purpose','','for="edit-search_purpose"').form_input('edit-search_purpose','','placeholder=" " id="edit-search_purpose"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <fieldset><legend>Duration</legend>
                                                  <div class="col-xs-6 col-lg-3">
                                                       <ul><li>
                                                            <?= form_label('From','','for="edit-search_monthfrom"').form_dropdown('edit-search_monthfrom',$monthListed,'',' id="edit-search_monthfrom"');?>
                                                       </li></ul>
                                                  </div>
                                                  <div class="col-xs-6 col-lg-3">
                                                       <ul><li>
                                                            <?= form_label('&nbsp;','','for="edit-search_yearfrom"').form_dropdown('edit-search_yearfrom',$yearListed,'',' id="edit-search_yearfrom"');?>
                                                       </li></ul>
                                                  </div>
                                                  <div class="col-xs-6 col-lg-3">
                                                       <ul><li>
                                                            <?= form_label('To','','for="edit-search_monthto"').form_dropdown('edit-search_monthto',$monthListed,'',' id="edit-search_monthto"');?>
                                                       </li></ul>
                                                  </div>
                                                  <div class="col-xs-6 col-lg-3">
                                                       <ul><li>
                                                            <?= form_label('&nbsp;','','for="edit-search_yearto"').form_dropdown('edit-search_yearto',$yearduration,'',' id="edit-search_yearto"');?>
                                                       </li></ul>
                                                  </div>
                                             </fieldset>
                                        </div>
                                        <fieldset><legend>Permit</legend>
                                             <div class="col-xs-12 col-lg-12">
                                                  <ul><li>
                                                       <?= form_label('Number','','for="edit-search_permit"').form_input('edit-search_permit','','placeholder=" " id="edit-search_permit"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-md-12 col-xs-12 col-lg-12">
                                                  <?= form_label('Attached permit<i>(*.pdf format, maximum size of 50MB)</i>').form_upload('edit-searchpermite','','id="edit-searchpermite" onchange="readURLsearchpermite(this);"');?>
                                                  <input type="" class="hide" name="edit-searchpermit_txte" id="edit-searchpermit_txte">
                                                  <input type="" class="hide" name="edit-searchpermit_txte_old" id="edit-searchpermit_txte_old">
                                                  <div id="researchprogrampermitdivupload"></div>
                                              </div>                                  
                                        </fieldset>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Funding Agency','','for="edit-search_funding"').form_input('edit-search_funding','','placeholder=" " id="edit-search_funding"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Name of Researcher','','for="edit-search_name"').form_input('edit-search_name','','placeholder=" " id="edit-search_name"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Institution','','for="edit-search_institution"').form_input('edit-search_institution','','placeholder=" " id="edit-search_institution"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <div class="col-xs-12 col-lg-4">
                                                  <ul><li>
                                                       <?= form_label('Status','','for="edit-research_fromprog_status"').form_dropdown('edit-research_fromprog_status',$researchstatus,'','id="edit-research_fromprog_status"');?>
                                                  </li></ul>
                                             </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <div class="col-xs-12 col-lg-12" id="progreasonterminatedivEdit" style="display: none">
                                                  <ul><li>
                                                       <?= form_label('Reason','','for="edit-research_reason_terminatefromprog"').form_textarea('edit-research_reason_terminatefromprog','','placeholder=" " id="edit-research_reason_terminatefromprog"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-xs-12 col-lg-12" id="progyearextenddivEdit" style="display: none">
                                                  <ul><li>
                                                       <?= form_label('Year','','for="edit-yearextendfromprog"').form_dropdown('edit-yearextendfromprog',$yearduration,'','id="edit-yearextendfromprog"');?>
                                                  </li></ul>
                                             </div>
                                        </div>
                                   </div>
                                   <fieldset><legend>PAMB Resolution</legend>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Number','','for="edit-search_pambreso"').form_input('edit-search_pambreso','','placeholder=" " id="edit-search_pambreso"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Title of Resolution','','for="edit-search_titlereso"').form_input('edit-search_titlereso','','placeholder=" " id="edit-search_titlereso"');?>
                                             </li></ul>
                                        </div>
                                        <fieldset>
                                             <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of PAMB Resolution <i>(*.pdf format only)</i></legend>
                                             <input type='file' name="edit_modal-pambreso" id="edit_modal-pambreso" onchange="readURLModalresearchPAMBRESOEdit(this);"  />
                                             <span id="edit_modal-pambreso_span" class="edit_modal-pambreso_span hidden"></span><br>
                                             <div id="edit_modal-pambreso_file"></div>
                                        </fieldset>
                                   </fieldset>
                                   <div class="col-xs-12 col-lg-12">
                                        <?= form_checkbox('edit-chk_progres_approves','','','id="edit-chk_progres_approves" onclick="research_chk_reso();"').form_label('Adopted by the PAMB','','for="edit-chk_progres_approves"');?>
                                   </div>
                                
                              <div class="col-xs-12 col-lg-12" id="edit-chk_progres_approvebox" style="display: none;">
                                   <fieldset>
                                        <legend>Upload copy of final result/report <i>(*.pdf format only)</i></legend>
                                        <input type='file' name="edit-modal_research_file" id="edit-modal_research_file" onchange="readURLModalresearchfileReportEdit(this);"  />
                                        <span id="edit-modal_research_file_span" class="edit-modal_research_file_span hidden"></span>
                                        <div id="edit-uploadmodal_research_file"></div>
                                   </fieldset>
                                   <fieldset>
                                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Upload copy of resolution adopting report<i>(*.pdf format only)</i></legend>
                                        <input type='file' name="edit-modal_research_reso" id="edit-modal_research_reso" onchange="readURLModalresearchfilePAMBResoEdit(this);"  />
                                        <input id="edit-modal_research_reso_old" type="hidden" name="edit-modal_research_reso_old">
                                        <input id="edit-modal_research_reso_new" type="hidden" name="edit-modal_research_reso_new">
                                        <div id="edit-uploadmodal_research_reso"></div>
                                   </fieldset>
                              </div>
                              <fieldset><legend>References</legend>
                                   <div class="col-xs-12 tooltip">
                                        <div class="col-xs-12 col-lg-12">
                                             <ul><li>
                                                  <?= form_label('Type of citation').form_dropdown('editprog-researchtype_citation',$citationlist,'','id="editprog-researchtype_citation"');?>
                                             </li></ul>
                                        </div>
                                        <fieldset><legend style="background-color:#fafafa; color: #444;font-size: 14px;font-weight: 700;">Date published</legend>
                                             <div class="col-xs-6 col-lg-4">
                                                  <ul><li>
                                                       <?= form_dropdown('editprog-research_ref_date_month',$monthListed,'','id="editprog-research_ref_date_month"');?>
                                                  </li></ul>
                                             </div>
                                             <div class="col-xs-6 col-lg-4">
                                                  <ul><li>
                                                       <?= form_dropdown('editprog-research_ref_date_year',$yearListed,'','id="editprog-research_ref_date_year"');?>
                                                  </li></ul>
                                             </div>
                                        </fieldset>    
                                        <span class="tooltiptext">Select date published</span>                                
                                   </div>
                                   <div class="col-xs-12">                                    
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Author <i>(Last name, First initial. Middle initial)</i>','','for="editprog-research_author"').form_input('editprog-research_author','','placeholder="Name of the author" id="editprog-research_author"');?>
                                                  <span class="tooltiptext">Input author</span>
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12" id="editprog-researchdivwebsiteRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Web page title','','for="editprog-researchwebtitleRef"').form_input('editprog-researchwebtitleRef','','placeholder="eg. Better Call Saul’ last?" id="editprog-researchwebtitleRef"');?>       
                                                  <span class="tooltiptext">Input title of web page</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Name of website','','for="editprog-researchwebsiteRef"').form_input('editprog-researchwebsiteRef','','placeholder="eg. FiveThirtyEight" id="editprog-researchwebsiteRef"');?>       
                                                  <span class="tooltiptext">Input name of website</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>
                                   <div class="col-xs-12 col-lg-12" id="editprog-researchdivbookRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Title of work','','for="editprog-researchworktitleRef"').form_input('editprog-researchworktitleRef','','placeholder="eg. Big little lies." id="editprog-researchworktitleRef"');?>       
                                                  <span class="tooltiptext">Input title of work</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Publisher','','for="editprog-researchbookpublisherRefs"').form_input('editprog-researchbookpublisherRefs','','placeholder="eg. G. P. Putnam’s Sons." id="editprog-researchbookpublisherRefs"');?>       
                                                  <span class="tooltiptext">Input name of publisher</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>                    
                                   <div class="col-xs-12" id="editprog-researchdivjournalRef" style="display:none">
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Article title','','for="editprog-researchjournaltitleRef"').form_input('editprog-researchjournaltitleRef','','placeholder="eg. The forum: The decline of war." id="editprog-researchjournaltitleRef"');?>       
                                                  <span class="tooltiptext">Input title of article</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Title of periodical','','for="editprog-researchperiodicalRef"').form_input('editprog-researchperiodicalRef','','placeholder="eg. The forum: The decline of war." id="editprog-researchperiodicalRef"');?>       
                                                  <span class="tooltiptext">Input title of periodical</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Volume(Issue)','','for="editprog-researchjournalVolRef"').form_input('editprog-researchjournalVolRef','','placeholder="eg. W. R. (2013)" id="editprog-researchjournalVolRef"');?>       
                                                  <span class="tooltiptext">Input volume of journal</span>                                 
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                             <ul><li>
                                                  <?= form_label('Page range','','for="editprog-researchjournalpagerangeRef"').form_input('editprog-researchjournalpagerangeRef','','placeholder="15(3), 396-419.)" id="editprog-researchjournalpagerangeRef"');?>       
                                                  <span class="tooltiptext">Input page range</span>                                 
                                             </li></ul>
                                        </div>
                                   </div>
                                  <div class="col-xs-12">
                                      <div class="col-xs-12 col-lg-12 tooltip">
                                          <ul><li>
                                              <?= form_label('URL/Source','','for="editprog-research_links"').form_input('editprog-research_links','','placeholder="eg. http://socialmediatoday.com" id="editprog-research_links"');?>
                                              <span class="tooltiptext">Input link URL/source</span>
                                          </li></ul>
                                      </div>
                                  </div>  
                                  <div class="col-xs-12">
                                      <div class="col-xs-12 col-lg-12 tooltip">
                                          <ul><li>
                                              <?= form_label('Description','','for="editprog-research_reference_desc"').form_textarea('editprog-research_reference_desc','','id="editprog-research_reference_desc"');?>
                                              <span class="tooltiptext">Input short description</span>
                                          </li></ul>
                                      </div>
                                  </div> 
                                   <div class="col-xs-12 ">
                                        <a type="text" id="editrefresearchEditformformProgram" class="btn btn-warning">Add to list</a>
                                   </div>
                                   <div class="col-xs-12 ">   
                                        <div id="edituploadreferencesprograms"></div>                             
                                   </div>              
                              </fieldset>
                              <div class="col-xs-12 ">
                                   <div class="modal-footer">
                                        <button class="btn btn-info" type="button" onclick="UpdateResearchers();" />Update
                                   </div>
                              </div>
                         </div>
                    </fieldset>
                    </div>
               </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
</form>

<form method="post" action="#" id="ProjFormNotUnderProgram" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-projs1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Projects</h4>
                </div>
                <input type="hidden" id="proj-id1" name="proj-id1" value="" />
                <input type="hidden" id="proj-id_program1" name="proj-id_program1" value="" />
                <input type="hidden" id="proj-gencode1" name="proj-gencode1" value="" />
                <input type="text" name="proj-projgencode" class="hidden" id="proj-projgencode">

                <div class="modal-body" >
                    <fieldset>
                    <legend>Project</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 ">
                              <div class="col-xs-12 col-lg-6 col-md-12">                                    
                                   <ul><li>
                                        <?= form_label('Sector','','for="edit-projsector"').form_dropdown('edit-projsector',$programsector,'',' id="edit-projsector"');?>
                                   </li></ul>
                              </div>
                              <div class="col-xs-12 col-lg-6 col-md-12 tooltip">                                    
                                   <ul><li>
                                        <?= form_label('Project','','for="edit-projsectorlist"').form_dropdown('edit-projsectorlist','','','id="edit-projsectorlist"');?>
                                        <span class="">Project which is a special department or agency undertaking carried out within a definite time frame and intended to result in some pre-determined measure of goods and services</span>
                                   </li></ul>
                              </div>
                              <div class="col-xs-12 col-lg-12 tooltip" id="edit-projnamediv" style="display:none">
                                   <ul><li>
                                        <?= form_label('Specify other project','','for="edit-proj-name1"').form_input('edit-proj-name1','','placeholder=" " id="edit-proj-name1"');?>
                                        <span class="tooltiptext">Input project name</span>
                                   </li></ul>
                              </div>                              
                            </div>
                            <div class="col-xs-12 ">
                              <div class="col-xs-12 col-lg-12 tooltip">
                                   <ul><li>
                                        <?= form_label('Description','','for="edit-proj_details"').form_textarea('edit-proj_details','','placeholder=" " id="edit-proj_details"');?>
                                        <span class="tooltiptext">Short description on project</span>
                                   </li></ul>
                              </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Proponent/Implementing Partner','','for="edit-proponent-proj1"').form_input('edit-proponent-proj1','','placeholder=" " id="edit-proponent-proj1"');?>
                                        <span class="tooltiptext">The entity in charge of the Project Implementation</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6 tooltip">
                                   <span class="tooltiptext">Start of the project implementation</span>
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Duration From</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('edit-proj_start_implement_month1',$monthListed,'',' id="edit-proj_start_implement_month1"').form_label(' ','','for="edit-proj_start_implement_month1"');?></li></ul>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('edit-proj_start_implement_year1',$yearListed,'',' id="edit-proj_start_implement_year1"').form_label(' ','','for="edit-proj_start_implement_year1"');?></li></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-6 tooltip">
                                   <span class="tooltiptext">Termination Date of the Project</span>
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">To</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('edit-proj_end_implement_month1',$monthListed,'',' id="edit-proj_end_implement_month1"').form_label(' ','','for="edit-proj_end_implement_month1"');?></li></ul>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('edit-proj_end_implement_year1',$yearduration,'',' id="edit-proj_end_implement_year1"').form_label(' ','','for="edit-proj_end_implement_year1"');?></li></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>                            
                            <div class="col-xs-12">                            
                                <div class="col-xs-12 col-lg-4 tooltip">                                    
                                     <ul><li>
                                          <?= form_label('Source of fund','','for="edit-source_fund22e1"').form_dropdown('edit-source_fund22e1',$progsourceoffund,'',' id="edit-source_fund22e1"');?>
                                          <span class="tooltiptext">Funding source of the Project. The Project may be fully or partially supported by the Philippine Government or supported by a Foreign Institution/Body/Committee (Foreign-Assisted)</span>
                                     </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip" id="edit-idtypeoffundprog" style="display:none">                                    
                                     <ul><li>
                                          <?= form_label('Type of fund','','for="edit-progtypeoffund"').form_dropdown('edit-progtypeoffund',$progtypeoffund,'',' id="edit-progtypeoffund"');?>
                                          <span class="tooltiptext">Select type of fund</span>
                                     </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip" id="edit-idtextchangesource" style="display:none">                                    
                                     <ul><li>
                                          <?= form_label(' ','','for="edit-progtextsource" id="edit-textsourceproj"').form_input('edit-progtextsource','',' id="edit-progtextsource"');?>
                                          <!-- <span class="tooltiptext">Select type of fund</span> -->
                                     </li></ul>
                                </div>
                           </div>
                           <div class="col-lg-12 col-md-12 col-xs-12">
                                <fieldset>
                                <div class="col-xs-12 col-lg-12 col-md-12">
                                     <?php echo form_checkbox('edit-chk_cofinancing','','','id="edit-chk_cofinancing" onclick="cofinancingchkE();"').form_label('Co-Financing','','for="edit-chk_cofinancing"') ?>
                                </div>
                                <div id="edit-cofinancingtypeofpaymentDiv" style="display:none">
                                     <div class="col-xs-12 col-lg-6 col-md-12">
                                          <ul><li>
                                               <?= form_label('Type of payment','','for="edit-typeofpaymentcofinancing"').form_dropdown('edit-typeofpaymentcofinancing',$progtypeofpayment,'',' id="edit-typeofpaymentcofinancing"');?>
                                          </li></ul>
                                     </div>
                                     <div class="col-xs-12 col-lg-6 col-md-12" id="edit-moneydivproj" style="display:none">
                                          <div class="col-xs-12 col-lg-6 col-md-12">                                    
                                               <ul><li>
                                                    <?= form_label('Currency','','for="edit-projcurrency"').form_dropdown('edit-projcurrency',$projcurrency,'',' id="edit-projcurrency"');?>
                                               </li></ul>
                                          </div>
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Amount','','for="edit-moneymonetarytext"').form_input('edit-moneymonetarytext','',' id="edit-moneymonetarytext" class="number-separator"');?>                                   
                                               </li></ul>
                                          </div>
                                     </div>
                                     <div class="col-xs-12 col-lg-6 col-md-12" id="edit-inkinddivproj" style="display:none">
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Activities/Materials','','for="edit-activitymonetarytext"').form_input('edit-activitymonetarytext','',' id="edit-activitymonetarytext"');?>                                   
                                               </li></ul>
                                          </div>
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Monetary Value','','for="edit-inkindmonetarytext"').form_input('edit-inkindmonetarytext','',' id="edit-inkindmonetarytext"');?>                                   
                                               </li></ul>
                                          </div>
                                     </div>
                                </div>
                                </fieldset>
                           </div>
                           <div class="col-xs-12 col-lg-6 hidden">
                                    <ul><li>
                                    <?= form_label('Project Cost','','for="edit-proj_cost1"').form_input('edit-proj_cost1','','placeholder="Amount" class="number-separator"  id="edit-proj_cost1"');?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?= form_label('Location','','for="edit-proj-location1"').form_input('edit-proj-location1','','id="edit-proj-location1"');?>
                                    <span class="tooltiptext">Indicate the barangay, municipality/city/province covered by the Project</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?= form_label('Area(has)','','for="edit-proj-area1"').form_input('edit-proj-area1','','placeholder=" " id="edit-proj-area1" class="number-separator"');?>
                                    <span class="tooltiptext">Area covered by the project in hectares</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-6 col-lg-6 tooltip">
                                        <ul><li>
                                             <?= form_label('Status','','for="edit-proj_status"').form_dropdown('edit-proj_status',$projstatus,'',' id="edit-proj_status"');?>
                                             <span class="tooltiptext">Indicate if on-going (implementation stage) or completed</span>
                                        </li></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12" id="projcompletionrepdivEdit" style="display:none">
                                <fieldset>
                                    <legend>Upload Completion Report <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                    <input type='file' name="edit-projcompletionrepups" id="edit-projcompletionrepups" onchange="readURLprojcompletionrepsEdit(this);"  />
                                    <input type="hidden" id="edit-projcompletionrepups_span_old" name="edit-projcompletionrepups_span_old" />
                                    <input type="hidden" id="edit-projcompletionrepups_span" name="edit-projcompletionrepups_span" />
                                    <div id="projcompletionuploaddivEdit"></div>
                                </fieldset> 
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                    <?= form_label('Partnership','','for="edit-proj_partnerships"').form_input('edit-proj_partnerships','','placeholder=" " id="edit-proj_partnerships"');?>
                                    <span class="tooltiptext">Project Implementers with partnership instrument (MOA, MOU, etc)</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                    <?= form_label('Objectives','','for="edit-proj_objectives"').form_textarea('edit-proj_objectives','','id="edit-proj_objectives"');?>
                                    <span class="tooltiptext">Main and Specific Objective/s of the Project. Define the Expected Outcome, Outputs and Activities to be conducted (conducted if completed) by the Project</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 tooltip">
                                 <fieldset>
                                     <legend>Upload Project Reports</legend>
                                     <input type='file' name="edit-projreport_file_demo" id="edit-projreport_file_demo" onchange="readURLprojReportFileEdits(this);"  />
                                     <input name="edit-projreport_file" id="edit-projreport_file" class="edit-projreport_file hidden"></input>
                                     <input name="edit-projreport_file_old" id="edit-projreport_file_old" class="edit-projreport_file_old hidden"></input>
                                     <span id="edit-projreport_file_span" class="edit-projreport_file_span hidden"></span>
                                     <div id="edit-uploadProjReportFile"></div>
                                 </fieldset>
                                 <span class="tooltiptext">Upload the accomplishment report/progress report, terminal report and other reports that will serve as the proof of the accomplishment of the Project</span>
                              </div>   
                            <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                                <fieldset>
                                    <?= form_label('Attached PAMB Clearance<i>(PDF format, maximum size of 50MB)</i>').form_upload('edit-projectclearancefile','','id="edit-projectclearancefile" onchange="readURLprojectclearancefileEdit(this);" ');?>
                                    <input type="hidden" id="edit-projectclearancefile_span" name="edit-projectclearancefile_span" />
                                    <input type="hidden" id="edit-projectclearancefile_text" name="edit-projectclearancefile_text" />
                                    <div id="projectclearancefileuploaddivEdit"></div>
                                    <div class="col-lg-12 col-xs-12">
                                        <?= form_label('Current file attached : ','','for="projclearancefile_display"')?>
                                        <a href="" id="projclearancefile_display" target="_blank"></a>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 inner-addon left-addon tooltip">
                                    <ul><li>
                                    <?= form_label('Remarks','','for="edit-proj-remarks1"').form_textarea('edit-proj-remarks1','','placeholder="Brief description" id="edit-proj-remarks1" style="height:100px"');?>
                                    <span class="tooltiptext">Other details not in the corresponding field</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12" style="margin-top:10px">
                                <div class="col-xs-12">
                                    <div class="modal-footer">
                                        <button class="btn btn-info" type="button" onclick="updateProjtileNonProgram();" />Update
                                    </div>
                                </div>
                            </div>
                         </fieldset>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
</form>

<form method="post" action="" id="ProjectsForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-projects" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Projects</h4>
                </div>
                <input type="hidden" id="projects-id" name="projects-id" value="" />
                <input type="hidden" id="projects-gencode" name="projects-gencode" value="" />
                <input type="hidden" id="projects-id_program" name="projects-id_program" value="" />
                <input type="hidden" id="projects-proj_codes" name="projects-proj_codes" value="" />
                <div class="modal-body" >
                    <fieldset>
                    <legend>Project</legend>
                        <div class="col-xs-12">                           
                            <div class="col-xs-12 ">
                                   <div class="col-xs-12">
                                        <div class="col-xs-12 col-lg-6 col-md-12">                                    
                                             <ul><li>
                                                  <?= form_label('Sector','','for="progprojsector"').form_dropdown('progprojsector',$programsector,'',' id="progprojsector"');?>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-6 col-md-12 tooltip">                                    
                                             <ul><li>
                                                  <?= form_label('Project','','for="progprojsectorlist"').form_dropdown('progprojsectorlist','','','id="progprojsectorlist"');?>
                                                  <span class="tooltiptext">Project which is a special department or agency undertaking carried out within a definite time frame and intended to result in some pre-determined measure of goods and services</span>
                                             </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip" id="progprojnamediv" style="display:none">
                                             <ul><li>
                                                  <?= form_label('Specify other project','','for="proj_nameedit"').form_input('proj_nameedit','','placeholder=" " id="proj_nameedit"');?>
                                                  <span class="tooltiptext">Input project name</span>
                                             </li></ul>
                                        </div>                     
                                   </div>                                                      
                              </div>

                              <div class="col-xs-12 ">
                                   <div class="col-xs-12 col-lg-12 tooltip">
                                        <ul><li>
                                             <?= form_label('Description','','for="progproj_details"').form_textarea('progproj_details','','placeholder=" " id="progproj_details"');?>
                                             <span class="tooltiptext">Short description on project</span>
                                        </li></ul>
                                   </div>
                                   <div class="col-xs-12 col-lg-12 tooltip">
                                        <ul><li>
                                                  <?= form_label('Proponent/Implementing Partner','','for="progproj_proponent"').form_input('progproj_proponent','','placeholder=" " id="progproj_proponent"');?>
                                             <span class="tooltiptext">The entity in charge of the Project Implementation</span>
                                        </li></ul>
                                   </div>
                              </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6 tooltip">
                                   <span class="tooltiptext">Start of the project implementation</span>
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Duration From</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('proj_start_implement_month',$monthListed,'',' id="proj_start_implement_month"').form_label(' ','','for="proj_start_implement_month"');?></li></ul>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('proj_start_implement_year',$yearListed,'',' id="proj_start_implement_year"').form_label(' ','','for="proj_start_implement_year"');?></li></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-6 tooltip">
                                   <span class="tooltiptext">Termination Date of the Project</span>
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">To</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('proj_end_implement_month',$monthListed,'',' id="proj_end_implement_month"').form_label(' ','','for="proj_end_implement_month"');?></li></ul>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('proj_end_implement_year',$yearduration,'',' id="proj_end_implement_year"').form_label(' ','','for="proj_end_implement_year"');?></li></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xs-12">                            
                                <div class="col-xs-12 col-lg-4 tooltip">                                    
                                     <ul><li>
                                          <?= form_label('Source of fund','','for="prog_source_fund2"').form_dropdown('prog_source_fund2',$progsourceoffund,'',' id="prog_source_fund2"');?>
                                          <span class="tooltiptext">Funding source of the Project. The Project may be fully or partially supported by the Philippine Government or supported by a Foreign Institution/Body/Committee (Foreign-Assisted)</span>
                                     </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip" id="prog_idtypeoffundprog" style="display:none">                                    
                                     <ul><li>
                                          <?= form_label('Type of fund','','for="prog_progtypeoffund"').form_dropdown('prog_progtypeoffund',$progtypeoffund,'',' id="prog_progtypeoffund"');?>
                                          <span class="tooltiptext">Select type of fund</span>
                                     </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip" id="prog_idtextchangesource" style="display:none">                                    
                                     <ul><li>
                                          <?= form_label(' ','','for="prog_progtextsource" id="prog_textsourceproj"').form_input('prog_progtextsource','',' id="prog_progtextsource"');?>
                                          <!-- <span class="tooltiptext">Select type of fund</span> -->
                                     </li></ul>
                                </div>
                           </div>
                           <div class="col-lg-12 col-md-12 col-xs-12">
                                <fieldset>
                                <div class="col-xs-12 col-lg-12 col-md-12">
                                     <?php echo form_checkbox('prog_chk_cofinancing','','','id="prog_chk_cofinancing" onclick="cofinancingchkA();"').form_label('Co-Financing','','for="prog_chk_cofinancing"') ?>
                                </div>
                                <div id="prog_cofinancingtypeofpaymentDiv" style="display:none">
                                     <div class="col-xs-12 col-lg-4 col-md-12">
                                          <ul><li>
                                               <?= form_label('Type of payment','','for="prog_typeofpaymentcofinancing"').form_dropdown('prog_typeofpaymentcofinancing',$progtypeofpayment,'',' id="prog_typeofpaymentcofinancing"');?>
                                          </li></ul>
                                     </div>
                                     <div class="col-xs-12 col-lg-8 col-md-12" id="prog_moneydivproj" style="display:none">
                                          <div class="col-xs-12 col-lg-6 col-md-12">                                    
                                               <ul><li>
                                                    <?= form_label('Currency','','for="prog_projcurrency"').form_dropdown('prog_projcurrency',$projcurrency,'',' id="prog_projcurrency"');?>
                                               </li></ul>
                                          </div>
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Amount','','for="prog_moneymonetarytext"').form_input('prog_moneymonetarytext','',' id="prog_moneymonetarytext" class="number-separator"');?>                                   
                                               </li></ul>
                                          </div>
                                     </div>
                                     <div class="col-xs-12 col-lg-6 col-md-12" id="prog_inkinddivproj" style="display:none">
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Activities/Materials','','for="prog_activitymonetarytext"').form_input('prog_activitymonetarytext','',' id="prog_activitymonetarytext"');?>                                   
                                               </li></ul>
                                          </div>
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Monetary Value','','for="prog_inkindmonetarytext"').form_input('prog_inkindmonetarytext','',' id="prog_inkindmonetarytext"');?>                                   
                                               </li></ul>
                                          </div>
                                     </div>
                                </div>
                                </fieldset>
                           </div>
                           <div class="col-xs-12 hidden">
                                <div class="col-xs-12 col-lg-3 tooltip">
                                     <ul><li>
                                          <?= form_label('Project Cost','','for="proj_cost_prog"').form_input('proj_cost_prog','','placeholder="Amount" class="number-separator" id="proj_cost_prog"');?>
                                          <span class="tooltiptext">Funds of the Project, including co-financing</span>
                                     </li></ul>
                                </div>
                           </div> 
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?= form_label('Location','','for="proj_location2"').form_input('proj_location2','','placeholder=" " id="proj_location2"');?>
                                    <span class="tooltiptext">Indicate the barangay, municipality/city/province covered by the Project</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?= form_label('Area(has)','','for="proj_area2edit"').form_input('proj_area2edit','','placeholder="Hectares" class="number-separator"  id="proj_area2edit"');?>
                                    <span class="tooltiptext">Area covered by the project in hectares</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                   <div class="col-xs-6 col-lg-6 tooltip">
                                       <ul><li>
                                           <?= form_label('Status','','for="proj_status2"').form_dropdown('proj_status2',$projstatus,'',' id="proj_status2"');?>
                                           <span class="tooltiptext">Indicate if on-going (implementation stage) or completed</span>
                                       </li></ul>
                                   </div>
                            </div>
                            <div class="col-xs-12" id="progprojcompletionrepdiv" style="display:none">
                                <fieldset>
                                    <legend>Upload Completion Report <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                    <input type='file' name="progprojcompletionrepups" id="progprojcompletionrepups" onchange="readURLprogprojcompletionreps(this);"  />
                                    <input type="hidden" id="progprojcompletionrepups_span" name="progprojcompletionrepups_span" />
                                    <div id="progprojcompletionuploaddiv"></div>
                                </fieldset> 
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                    <?= form_label('Partnership','','for="proj_partnerships2"').form_input('proj_partnerships2','','placeholder=" " id="proj_partnerships2"');?>
                                    <span class="tooltiptext">Project Implementers with partnership instrument (MOA, MOU, etc)</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                    <?= form_label('Objectives','','for="proj_objectives2"').form_textarea('proj_objectives2','','id="proj_objectives2"');?>
                                    <span class="tooltiptext">Main and Specific Objective/s of the Project. Define the Expected Outcome, Outputs and Activities to be conducted (conducted if completed) by the Project</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 tooltip">
                                 <fieldset>
                                     <legend>Upload Project Reports</legend>
                                     <input type='file' name="edit-prog_projreport_file" id="edit-prog_projreport_file" onchange="readURLAddProgprojReportFile(this);"  />
                                     <span id="edit-prog_projreport_file_span" class="edit-prog_projreport_file_span hidden"></span><br>
                                     <div id="edit-uploadAddProgramProjReportFile"></div>
                                 </fieldset>
                                 <span class="tooltiptext">Upload the accomplishment report/progress report, terminal report and other reports that will serve as the proof of the accomplishment of the Project</span>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 inner-addon left-addon tooltip">
                                    <ul><li>
                                    <?= form_label('Remarks','','for="proj_remarks"').form_textarea('proj_remarks','','placeholder="Brief description" id="proj_remarks" style="height:100px"');?>
                                    <span class="tooltiptext">Other details not in the corresponding field</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 ">
                                        <a type="text" id="addprojectsa" class="btn btn-primary">Add data</a>
                                    </div>
                            </div><br>
                            <div class="col-xs-12 col-lg-12 ">
                                <div class="table-responsive large-tables">
                                    <table id="tablePAProjs" class="content-table">
                                        <thead>
                                            <tr>
                                                <th colspan="8" style="text-align: center; font-size: 24px">Projects</th>
                                            </tr>
                                            <tr>
                                                <th>Sector</th>
                                                <th>Project Name</th>
                                                <th>Proponent</th>
                                                <th>Year(Start-End)</th>
                                                <th>Source of Fund</th>
                                                <th>Area(has)</th>
                                                <th>Location</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyprojprog"></tbody>
                                    </table>
                                    <table id="tablePAProj_samples" class="table  table-bordered tglobal">
                                        <tbody id="tbodyproj_samples"></tbody>
                                    </table><hr>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="#" id="ProjForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-projs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Projects</h4>
                </div>
                <input type="hidden" id="proj-id" name="proj-id" value="" />
                <input type="hidden" id="proj-id_program" name="proj-id_program" value="" />
                <input type="hidden" id="proj-gencode" name="proj-gencode" value="" />
                <input type="hidden" id="projects-proj_codesE" name="projects-proj_codesE" value="" />
                <div class="modal-body" >
                    <fieldset>
                    <legend>Project</legend>
                        <div class="col-xs-12">                            
                            <div class="col-xs-12 ">
                              <div class="col-xs-12 col-lg-6 col-md-12">                                    
                                   <ul><li>
                                        <?= form_label('Sector','','for="edit-progprojsector"').form_dropdown('edit-progprojsector',$programsector,'',' id="edit-progprojsector"');?>
                                   </li></ul>
                              </div>
                              <div class="col-xs-12 col-lg-6 col-md-12 tooltip">                                    
                                   <ul><li>
                                        <?= form_label('Project','','for="edit-progprojsectorlist"').form_dropdown('edit-progprojsectorlist','','','id="edit-progprojsectorlist"');?>
                                        <span class="tooltiptext">Project which is a special department or agency undertaking carried out within a definite time frame and intended to result in some pre-determined measure of goods and services</span>
                                   </li></ul>
                              </div>
                              <div class="col-xs-12 col-lg-12 tooltip" id="edit-progprojnamediv" style="display:none">
                                   <ul><li>
                                        <?= form_label('Specify other project','','for="edit-proj-name"').form_input('edit-proj-name','','placeholder=" " id="edit-proj-name"');?>
                                        <span class="tooltiptext">Input project name</span>
                                   </li></ul>
                              </div>                              
                            </div>
                            <div class="col-xs-12 ">
                              <div class="col-xs-12 col-lg-12 tooltip">
                                   <ul><li>
                                        <?= form_label('Description','','for="edit-progproj_details"').form_textarea('edit-progproj_details','','placeholder=" " id="edit-progproj_details"');?>
                                        <span class="tooltiptext">Short description on project</span>
                                   </li></ul>
                              </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Proponent/Implementing Partner','','for="edit-proponent-proj"').form_input('edit-proponent-proj','','placeholder=" " id="edit-proponent-proj"');?>
                                        <span class="tooltiptext">The entity in charge of the Project Implementation</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6 tooltip">
                                   <span class="tooltiptext">Start of the project implementation</span>
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">Duration From</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('edit-proj_start_implement_month',$monthListed,'',' id="edit-proj_start_implement_month"').form_label(' ','','for="edit-proj_start_implement_month"');?></li></ul>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('edit-proj_start_implement_year',$yearListed,'',' id="edit-proj_start_implement_year"').form_label(' ','','for="edit-proj_start_implement_year"');?></li></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-6 tooltip">
                                   <span class="tooltiptext">Termination Date of the Project</span>
                                    <fieldset>
                                        <legend style="background-color: transparent;color:#000;font-weight: 700;font-size: 14px">To</legend>
                                        <div class="col-xs-12">
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('edit-proj_end_implement_month',$monthListed,'',' id="edit-proj_end_implement_month"').form_label(' ','','for="edit-proj_end_implement_month"');?></li></ul>
                                                </div>
                                                 <div class="col-xs-6 col-lg-6">
                                                    <ul><li><?= form_dropdown('edit-proj_end_implement_year',$yearduration,'',' id="edit-proj_end_implement_year"').form_label(' ','','for="edit-proj_end_implement_year"');?></li></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>                            
                            <div class="col-xs-12 col-lg-6 hidden">
                                <ul><li>
                                <?= form_label('Project Cost','','for="edit-proj_cost"').form_input('edit-proj_cost','','placeholder="Amount" class="number-separator"  id="edit-proj_cost"');?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12">                            
                                <div class="col-xs-12 col-lg-4 tooltip">                                    
                                     <ul><li>
                                          <?= form_label('Source of fund','','for="edit-prog_source_fund2"').form_dropdown('edit-prog_source_fund2',$progsourceoffund,'','id="edit-prog_source_fund2"');?>
                                          <span class="tooltiptext">Funding source of the Project. The Project may be fully or partially supported by the Philippine Government or supported by a Foreign Institution/Body/Committee (Foreign-Assisted)</span>
                                     </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip" id="edit-prog_idtypeoffundprog" style="display:none">                                    
                                     <ul><li>
                                          <?= form_label('Type of fund','','for="edit-prog_progtypeoffund"').form_dropdown('edit-prog_progtypeoffund',$progtypeoffund,'','id="edit-prog_progtypeoffund"');?>
                                          <span class="tooltiptext">Select type of fund</span>
                                     </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip" id="edit-prog_idtextchangesource" style="display:none">                                    
                                     <ul><li>
                                          <?= form_label(' ','','for="edit-prog_progtextsource" id="edit-prog_textsourceproj"').form_input('edit-prog_progtextsource','','id="edit-prog_progtextsource"');?>
                                          <!-- <span class="tooltiptext">Select type of fund</span> -->
                                     </li></ul>
                                </div>
                           </div>
                           <div class="col-lg-12 col-md-12 col-xs-12">
                                <fieldset>
                                <div class="col-xs-12 col-lg-12 col-md-12">
                                     <?php echo form_checkbox('edit-prog_chk_cofinancing','','','id="edit-prog_chk_cofinancing" onclick="cofinancingchkAE();"').form_label('Co-Financing','','for="edit-prog_chk_cofinancing"') ?>
                                </div>
                                <div id="edit-prog_cofinancingtypeofpaymentDiv" style="display:none">
                                     <div class="col-xs-12 col-lg-4 col-md-12">
                                          <ul><li>
                                               <?= form_label('Type of payment','','for="edit-prog_typeofpaymentcofinancing"').form_dropdown('edit-prog_typeofpaymentcofinancing',$progtypeofpayment,'',' id="edit-prog_typeofpaymentcofinancing"');?>
                                          </li></ul>
                                     </div>
                                     <div class="col-xs-12 col-lg-8 col-md-12" id="edit-prog_moneydivproj" style="display:none">
                                          <div class="col-xs-12 col-lg-6 col-md-12">                                    
                                               <ul><li>
                                                    <?= form_label('Currency','','for="edit-prog_projcurrency"').form_dropdown('edit-prog_projcurrency',$projcurrency,'',' id="edit-prog_projcurrency"');?>
                                               </li></ul>
                                          </div>
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Amount','','for="edit-prog_moneymonetarytext"').form_input('edit-prog_moneymonetarytext','',' id="edit-prog_moneymonetarytext" class="number-separator"');?>                                   
                                               </li></ul>
                                          </div>
                                     </div>
                                     <div class="col-xs-12 col-lg-6 col-md-12" id="edit-prog_inkinddivproj" style="display:none">
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Activities/Materials','','for="edit-prog_activitymonetarytext"').form_input('edit-prog_activitymonetarytext','',' id="edit-prog_activitymonetarytext"');?>                                   
                                               </li></ul>
                                          </div>
                                          <div class="col-xs-12 col-lg-6 col-md-12">
                                               <ul><li>
                                                    <?= form_label('Monetary Value','','for="edit-prog_inkindmonetarytext"').form_input('edit-prog_inkindmonetarytext','',' id="edit-prog_inkindmonetarytext"');?>                                   
                                               </li></ul>
                                          </div>
                                     </div>
                                </div>
                                </fieldset>
                           </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?= form_label('Location','','for="edit-proj-location"').form_input('edit-proj-location','','  id="edit-proj-location"');?>
                                    <span class="tooltiptext">Indicate the barangay, municipality/city/province covered by the Project</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                    <?= form_label('Area(has)','','for="edit-proj-area"').form_input('edit-proj-area','',' placeholder="Hectares" class="number-separator" id="edit-proj-area"');?>
                                    <span class="tooltiptext">Area covered by the project in hectares</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-xs-6 col-lg-6 tooltip">
                                        <ul><li>
                                            <?= form_label('Status','','for="edit-proj_status2"').form_dropdown('edit-proj_status2',$projstatus,'',' id="edit-proj_status2"');?>
                                            <span class="tooltiptext">Indicate if on-going (implementation stage) or completed</span>
                                        </li></ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12" id="progprojcompletionrepdivEdit" style="display:none">
                                <fieldset>
                                    <legend>Upload Completion Report <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                    <input type='file' name="edit-progprojcompletionrepups" id="edit-progprojcompletionrepups" onchange="readURLprogprojcompletionrepsEdit(this);"  />
                                    <input type="hidden" id="edit-progprojcompletionrepups_old" name="edit-progprojcompletionrepups_old" />
                                    <input type="hidden" id="edit-progprojcompletionrepups_span" name="edit-progprojcompletionrepups_span" />
                                    <div id="edit-progprojcompletionuploaddiv"></div>
                                </fieldset> 
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                    <?= form_label('Partnership','','for="edit-proj_partnerships2"').form_input('edit-proj_partnerships2','','placeholder=" " id="edit-proj_partnerships2"');?>
                                    <span class="tooltiptext">Project Implementers with partnership instrument (MOA, MOU, etc)</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                    <?= form_label('Objectives','','for="edit-proj_objectives2"').form_textarea('edit-proj_objectives2','','id="edit-proj_objectives2"');?>
                                    <span class="tooltiptext">Main and Specific Objective/s of the Project. Define the Expected Outcome, Outputs and Activities to be conducted (conducted if completed) by the Project</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 tooltip">
                                 <fieldset>
                                     <legend>Upload Project Reports</legend>
                                     <input type='file' name="edit-prog_projReport_file_Edit" id="edit-prog_projReport_file_Edit" onchange="readURLProgprojReportFileEdit(this);"  />
                                     <span id="edit-prog_projReport_file_Edit_span" class="edit-projreport_file_span hidden"></span><br>
                                     <div id="edit-uploadprog_projReport_file_Edit"></div>
                                 </fieldset>
                                 <span class="tooltiptext">Upload the accomplishment report/progress report, terminal report and other reports that will serve as the proof of the accomplishment of the Project</span>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 col-lg-12 inner-addon left-addon tooltip">
                                    <ul><li>
                                    <?= form_label('Remarks','','for="edit-proj-remarks"').form_textarea('edit-proj-remarks','','placeholder="Brief description" id="edit-proj-remarks" style="height:100px"');?>
                                    <span class="tooltiptext">Other details not in the corresponding field</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12" style="margin-top:10px">
                                <div class="col-xs-12">
                                    <div class="modal-footer">
                                        <button class="btn btn-info" type="button" onclick="updateProjtile();" />Update
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL EDITING FOR PROGRAMS -->
<form method="post" action="#" id="ProgramForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-program" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Programs</h4>
                </div>
                <input type="hidden" id="program-id" name="program-id" value="" />
                <input type="hidden" id="program-gencode" name="program-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-6 col-md-12">                                    
                             <ul><li>
                                  <?= form_label('Sector','','for="edit-programsector"').form_dropdown('edit-programsector',$programsector,'',' id="edit-programsector"');?>
                             </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-6 col-md-12 tooltip">                                    
                             <ul><li>
                                  <?= form_label('Program','','for="edit-programsectorlist"').form_dropdown('edit-programsectorlist','','',' id="edit-programsectorlist"');?>
                                  <span class="tooltiptext">A program is a cohesive grouping of activities and projects that contributes to a particular outcome of an agency. Following are the major programs under Enhanced Biodiversity Conservation and Scaling-up Coastal and Marine Ecosystem</span>
                             </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" id="edit-prognamediv" style="display:none">
                             <ul><li>
                                  <?= form_label('Specify other program','','for="edit-program_name"').form_input('edit-program_name','','placeholder=" " id="edit-program_name"');?>
                                  <span class="tooltiptext">Input Program title</span>
                             </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                              <ul><li>
                                   <?= form_label('Proponent/Implementing Partner','','for="edit-program_partner"').form_input('edit-program_partner','','placeholder=" " id="edit-program_partner"');?>
                                   <span class="tooltiptext">The entity in charge of the Program Implementation</span>
                              </li></ul>
                         </div>  
                    </div>
                    <div class="col-xs-12 tooltip">
                        <ul><li>
                            <?php echo form_label('Program Details').form_textarea('edit-program_details','','id="edit-program_details"'); ?>
                            <span class="tooltiptext">Define main and specific objective/s of the program. Define the expected outcome/s.</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                          <legend>Duration</legend>
                          <div class="col-xs-6 col-lg-3">
                            <ul><li>
                              <?= form_label('From','','for="edit-prog_duration_from_month"').form_dropdown('edit-prog_duration_from_month',$monthListed,'',' id="edit-prog_duration_from_month"');?>
                              </li></ul>
                          </div>
                           <div class="col-xs-6 col-lg-3">
                            <ul><li>
                              <?= form_label('&nbsp;','','for="edit-prog_duration_from_year"').form_dropdown('edit-prog_duration_from_year',$yearListed,'',' id="edit-prog_duration_from_year"');?>
                              </li></ul>
                          </div>
                          <div class="col-xs-6 col-lg-3">
                            <ul><li>
                              <?= form_label('To','','for="edit-prog_duration_to_month"').form_dropdown('edit-prog_duration_to_month',$monthListed,'',' id="edit-prog_duration_to_month"');?>
                              </li></ul>
                          </div>
                           <div class="col-xs-6 col-lg-3">
                            <ul><li>
                              <?= form_label('&nbsp;','','for="edit-prog_duration_to_year"').form_dropdown('edit-prog_duration_to_year',$yearListed,'',' id="edit-prog_duration_to_year"');?>
                              </li></ul>
                          </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">                            
                            <div class="modal-footer">
                                 <button class="btn btn-info" type="button" onclick="updateprogramss();" />Update
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>