<div id="gallery" class="tab-pane">
    <div class="form-style-6">
        <h2>Communication Education and Public Awareness</h2>
    </div>
    <div class="tab">
        <a class="tablinkcepa active" onclick="tabcepa(event, 'cepa')">CEPA</a>
        <a class="tablinkcepa" id="loadactivity" onclick="tabcepa(event, 'galleries')">Photo Galleries</a>
    </div>
    <div id="cepa" class="tabcontentcepa" style="display: block">        
        <div class="tab-second">
            <!-- <a class="tablinkcepalist active" onclick="tabcepalist(event, 'iecmat')">IEC Materials/Collaterals Produced</a> -->
            <a class="tablinkcepalist active" onclick="tabcepalist(event, 'activitylist')">CEPA Activity Report</a>
            <a class="tablinkcepalist" onclick="tabcepalist(event, 'kaplist')">KAP Survey Conducted</a>
            <a class="tablinkcepalist" onclick="tabcepalist(event, 'eventlist')">Special Events</a>
            <a class="tablinkcepalist" onclick="tabcepalist(event, 'paevent')" id="paeventid">Protected Area Events</a>
        </div>
        <div id="paevent" class="tabcontentcepalist" style="display: none">
            <?php echo form_input('eventcodes','','id="eventcodes" class="hidden"'); ?>
            <fieldset>
                <legend>Protected Area Events</legend>
                <div class="col-xs-12 col-lg-8">
                    <div id="calendar"></div>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                        <legend>Date</legend>
                        <div class="col-xs-6 col-lg-6">
                           <ul><li>
                               <label>Start</label><input type="text" name="dateeventfrom" id="dateeventfrom" class="form_datetime">
                           </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                           <ul><li>
                               <label>End</label><input type="text" name="dateeventto" id="dateeventto" class="form_datetime">
                           </li></ul>
                        </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Title of event').form_input('events_title','','id="events_title"'); ?>
                            <span class="tooltiptext">Input title of event</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Event Description/Purpose').form_textarea('events_description','','id="events_description"'); ?>
                            <span class="tooltiptext">Input description</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Participants').form_input('events_participant','','id="events_participant"'); ?>
                            <span class="tooltiptext">Input Participant</span>
                            </li></ul>
                        </div>
                    </div>                    
                    <div class="col-xs-12">
                        <a type="text" class="btn btn-warning" id="addeventparticipant">Add participant</a>                               
                    </div>
                    <div class="col-xs-12">
                        <table id="tableeventparticipant" class="content-table">
                            <tr>
                                <td>Participants</td>
                                <td>Action</td>
                            </tr>
                            <tbody id="tbodyeventparticipant"></tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 col-lg-12" style="margin-top:20px;">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Conducted').form_input('events_conducted','','id="events_conducted"'); ?>
                            <span class="tooltiptext">Input event conducted</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a type="text" class="btn btn-primary" id="addpaevents">Add event</a>                               
                    </div>                    
                </div>
                <div class="col-xs-12">
                    <table id="tblpaevent" class="content-table">
                        <thead>                            
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Participant</th>
                                <th>Conducted</th>
                                <th colspan="2">Date</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <td colspan="4" rowspan="2"></td>
                                <td>Start</td>
                                <td>End</td>
                            </tr>                    
                        </thead>
                        <tbody id="tbodypaevent">                                             
                        </tbody>
                    </table>
                </div> 
            </fieldset>
        </div>
        <div id="iecmat" class="tabcontentcepalist" style="display: block">
            
        </div>
        <div id="activitylist" class="tabcontentcepalist" style="display: block">
            <fieldset>
                <legend>CEPA Activity Report</legend>
                <input type="text" name="CEPAGenCode" class="hidden" id="CEPAGenCode">
                <div class="col-xs-12">
                    <div class="col-xs-12 col-md-12 tooltip">
                        <ul><li>
                            <?= form_label('Activity').form_input('cepa_activity','','id="cepa_activity" placeholder="Name of event, theme, if any"'); ?>
                            <span class="tooltiptext">Input name of activity</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('Date conducted','','for="date_cepa_month"').form_dropdown('date_cepa_month',$monthList,'','id="date_cepa_month"') ?>  
                            </li></ul>
                        </div> 
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('&nbsp;','','for="date_cepa_day"').form_dropdown('date_cepa_day',$dayList,'','id="date_cepa_day"') ?>  
                            </li></ul>
                        </div>   
                        <div class="col-xs-12 col-lg-4">
                            <ul><li>
                                <?php echo form_label('&nbsp;','','for="date_cepa_year"').form_dropdown('date_cepa_year',$yearList,'','id="date_cepa_year"') ?>  
                            </li></ul>
                        </div> 
                        <span class="tooltiptext">Select date conducted</span>  
                    </div>
                </div>
                <div class="col-xs-12 tooltip">
                    <ul><li>
                        <?= form_label('Venue').form_input('cepa_venue','','id="cepa_venue"'); ?>
                        <span class="tooltiptext">Input activity venue</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 tooltip">
                    <ul><li>
                        <?= form_label('Objective/s').form_textarea('cepa_objective','','id="cepa_objective"') ?>
                        <span class="tooltiptext">Input activity objective(s)</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 tooltip">
                    <ul><li>
                        <?= form_label('Highlights').form_textarea('cepa_summary','','id="cepa_summary"') ?>
                        <span class="tooltiptext">Input summary of activity</span>
                    </li></ul>
                </div>
            </fieldset>
                <fieldset>
                    <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Audience</legend>
                    <div class="col-xs-12">
                        <div class="col-xs-4 col-md-4 tooltip">
                            <ul><li>
                                <?= form_label('Male').form_input('cepa_male','','id="cepa_male" onchange="calculatecepasex()" onkeydown="run(this)"'); ?>
                                ,<span class="tooltiptext">Input total number of male</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-md-4 tooltip">
                            <ul><li>
                                <?= form_label('Female').form_input('cepa_female','','id="cepa_female" onchange="calculatecepasex()" onkeydown="run(this)"'); ?>
                                ,<span class="tooltiptext">Input total number of female</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-md-4 tooltip">
                            <ul><li>
                                <?= form_label('Total No.').form_input('cepa_total','','id="cepa_total"'); ?>
                                ,<span class="tooltiptext">Auto generate total number of audience</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 tooltip hidden">
                        <ul><li>
                            <?= form_label('Audience Type').form_dropdown('cepa_audience_type',$cepa_activity,'','id="cepa_audience_type"') ?>
                            ,<span class="tooltiptext">Select audience type</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <fieldset>
                            <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Audience type</legend>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a1" id="chk_a1"><label for="chk_a1">Pre School</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a2" id="chk_a2"><label for="chk_a2">Elementary School</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a3" id="chk_a3"><label for="chk_a3">Junior High School</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a4" id="chk_a4"><label for="chk_a4">Sr. High School</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a5" id="chk_a5"><label for="chk_a5">Academe</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a6" id="chk_a6"><label for="chk_a6">Media</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a7" id="chk_a7"><label for="chk_a7">Policy Makers</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a8" id="chk_a8"><label for="chk_a8">Brgy LGU</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a9" id="chk_a9"><label for="chk_a9">City LGU</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a10" id="chk_a10"><label for="chk_a10">Municipal LGU</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a11" id="chk_a11"><label for="chk_a11">Provincial LGU</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a12" id="chk_a12"><label for="chk_a12">Religious group</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a13" id="chk_a13"><label for="chk_a13">Peoples Organization</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a14" id="chk_a14"><label for="chk_a14">OGAs</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a15" id="chk_a15"><label for="chk_a15">NGOs</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a16" id="chk_a16"><label for="chk_a16">Local Communities</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a17" id="chk_a17"><label for="chk_a17">Private sector</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a19" id="chk_a19"><label for="chk_a19">ICCs/IPs</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_a18" id="chk_a18"><label for="chk_a18">Others</label>
                               <ul><li>
                                    <input type="text" placeholder="Please, specify others." name="chk_a1_others" id="chk_a1_others">
                                </li></ul>
                            </div>                                                        
                        </fieldset>
                        <span class="tooltiptext">Select audience</span>
                    </div>
                    <div class="col-xs-12 col-md-8 tooltip" id="cepaotheraudiencediv" style="display: none">
                        <ul><li>
                            <?= form_label('Specify others').form_input('cepa_audience_type_others','','id="cepa_audience_type_others"') ?>
                            ,<span class="tooltiptext">Specify other audience type</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <ul><li>
                            <?= form_label('Evaluation (Provide brief evaluation of the activity based on pre and post test)').form_textarea('cepa_details','','id="cepa_details"') ?>
                            <span class="tooltiptext">Input details/remarks</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <fieldset>
                            <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Strategy</legend>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="chk_s1" id="chk_s1"><label for="chk_s1">Lecture</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s2" id="chk_s2"><label for="chk_s2">Game/Competition</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s3" id="chk_s3"><label for="chk_s3">Theater</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s4" id="chk_s4"><label for="chk_s4">Educational Tour</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s5" id="chk_s5"><label for="chk_s5">Campaign</label> 
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s6" id="chk_s6"><label for="chk_s6">Research</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s7" id="chk_s7"><label for="chk_s7">Exhibit/Fair</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s8" id="chk_s8"><label for="chk_s8">Fun run/Walk-a-thon</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s9" id="chk_s9"><label for="chk_s9">Mass media</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s10" id="chk_s10"><label for="chk_s10">Printed Materials</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s11" id="chk_s11"><label for="chk_s11">Forum/Dialogue/Symposium</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s12" id="chk_s12"><label for="chk_s12">Interview/Focus Group Discussion</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                <input type="checkbox" name="chk_s13" id="chk_s13"><label for="chk_s13">Others :</label>
                                <ul><li>
                                    <input type="text" placeholder="Please, specify others." name="chk_s_others" id="chk_s_others">
                                </li></ul>
                            </div>
                        </fieldset>
                        <span class="tooltiptext">Check all strategy that conducted</span>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <fieldset>
                            <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Methods and IEC Materials Used</legend>
                            <div class="hidden">
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm1" id="chk_mm1"><label for="chk_mm1">Powerpoint Presentation</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm2" id="chk_mm2"><label for="chk_mm2">Handouts</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm3" id="chk_mm3"><label for="chk_mm3">Film/AVP</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm4" id="chk_mm4"><label for="chk_mm4">Demo</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm5" id="chk_mm5"><label for="chk_mm5">Hands-on Exercise</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm6" id="chk_mm6"><label for="chk_mm6">Flipcharts,posters,brochures,etc</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm7" id="chk_mm7"><label for="chk_mm7">Storybooks,comics,etc</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm8" id="chk_mm8"><label for="chk_mm8">Pictures and drawings</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm9" id="chk_mm9"><label for="chk_mm9">Sounds, music, etc.</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm10" id="chk_mm10"><label for="chk_mm10">Puppet</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm11" id="chk_mm11"><label for="chk_mm11">Board game</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm12" id="chk_mm12"><label for="chk_mm12">Activity Booklets</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm13" id="chk_mm13"><label for="chk_mm13">Perception Survey</label>
                                </div>
                                <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                                   <input type="checkbox" name="chk_mm14" id="chk_mm14"><label for="chk_mm14">Others :</label>
                                   <ul><li>
                                        <input type="text" placeholder="Please, specify others." name="chk_mm_others" id="chk_mm_others">
                                    </li></ul>
                                </div>
                            </div>
                        <!-- <span class="tooltiptext">Check all methods and materials used</span> -->
                        <div class="tab-third" id="tabhabecosub">
                            <a class="tablinkiecmaterials active" onclick="tabiecmaterials(event, 'iec1')">Print</a>
                            <a class="tablinkiecmaterials" onclick="tabiecmaterials(event, 'iec2')">Multimedia</a>
                            <a class="tablinkiecmaterials" onclick="tabiecmaterials(event, 'iec3')">Social Media</a>
                            <a class="tablinkiecmaterials" onclick="tabiecmaterials(event, 'iec4')">Broadcast Station</a>
                            <a class="tablinkiecmaterials" onclick="tabiecmaterials(event, 'iec5')">Souvenir Item</a>
                        </div>
                        <div id="iec1" class="tabcontentiecmaterials" style="display: block;">
                            <fieldset>
                                <legend>Print</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <ul><li>
                                            <?php echo form_label('').form_dropdown('print_materials',$cepa_print_materials,'','id="print_materials"'); ?>
                                            <span class="tooltiptext">Select print name</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 tooltip" id="cepaprintother" style="display: none">
                                        <ul><li>
                                            <?php echo form_label('Specify others').form_input('print_materials_other','','id="print_materials_other"'); ?>
                                            <span class="tooltiptext">Input other</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Title').form_input('print_materials_title','','id="print_materials_title"'); ?>
                                            <span class="tooltiptext">Input title</span>
                                        </li></ul>    
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Year produced').form_dropdown('print_materials_produced',$yearListed,'',' id="print_materials_produced"') ?>                            
                                            <span class="tooltiptext">Select year produced</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip" id="divvolume1" style="display: none;">
                                        <ul><li>
                                            <?php echo form_label('Volume/Issue number').form_input('print_materials_volume','','id="print_materials_volume"'); ?>
                                            <span class="tooltiptext">Input volume/issued number of newspaper</span>
                                        </li></ul>    
                                    </div>
                                    <div class="col-xs-12 col-lg-12"> 
                                        <fieldset>
                                            <label>Upload digital file/sample file<i>(*.png, *.jpeg, *.jpg, *.pdf)</i></label>
                                            <input type='file' name="print_file_materials" id="print_file_materials" onchange="readURLcepamaterialsprint(this);"  />
                                            <input type="hidden" id="print_file_materials_span" name="print_file_materials_span" />
                                            <div id="uploadprint_file_materials"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12">
                                        <a type="text" class="btn btn-success" id="addiecmat">Add to list</a>                               
                                    </div>
                                    <div class="col-xs-12">
                                        <table id="data_tableiecmaterials" class="content-table">
                                            <thead>
                                                <tr>
                                                    <th>Print</th>
                                                    <th>Title</th>
                                                    <th>Year produced</th>
                                                    <th>Digital/Sample Files</th>
                                                    <th>Action</th>
                                                </tr>                     
                                            </thead>
                                            <tbody id="tbody_iecmaterials">                                             
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </fieldset>
                        </div>
                        <div id="iec2" class="tabcontentiecmaterials" style="display: none;">
                            <fieldset>
                                <legend>Multimedia</legend>
                                <div class="col-xs-12">
                                    <div class="col-lg-12 tooltip">
                                        <ul><li>
                                            <?php echo form_label('').form_dropdown('multimedia',$multimedia,'','id="multimedia"'); ?>
                                            <span class="tooltiptext">Select multimedia</span>
                                        </li></ul>
                                    </div>
                                    <div id="mmlinksdiv5" style="display: none" class="col-lg-12 col-xs-12 tooltip">
                                        <ul><li>
                                            <?= form_label('Specify others').form_input('other_multimedia','','id="other_multimedia"'); ?>
                                            <span class="tooltiptext">Specify others</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Title','','id="mtitle"').form_input('multimedia_title','','id="multimedia_title"'); ?>
                                            <span class="tooltiptext">Input title</span>
                                        </li></ul>    
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Year produced').form_dropdown('multimedia_year',$yearListed,'',' id="multimedia_year"') ?>                            
                                            <span class="tooltiptext">Select year produced</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" id="mmlinksdiv2">
                                        <fieldset>
                                            <?= form_label('File attached<i>(*.avi, *.mp4, *.mov, *.mpg, *.mpeg, *.ppt, *.pptx, maximum of 100MB file size)</i>','','for="cepa_multimedia"')?>
                                            <input type='file' name="cepa_multimedia" id="cepa_multimedia" onchange="readURLcepamultimedia(this);"/>
                                            <input type="hidden" name="old_cepa_multimedia" id="old_cepa_multimedia">
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <ul><li>
                                            <?= form_label('URL/Link').form_input('cepa_multimedia_link','','id="cepa_multimedia_link"'); ?>
                                        <span class="tooltiptext">Input URL/link of the video/presentation</span>
                                        </li></ul>
                                    </div>
                                    
                                    <div class="col-xs-12" style="margin-top: 10px">
                                        <a type="text" class="btn btn-success" id="addmultimedia">Add to list</a>                                
                                    </div>
                                    <div class="col-xs-12">
                                        <table id="data_tablemultimedia" class="content-table">
                                            <thead>
                                                <tr>
                                                    <th>Multimedia</th>
                                                    <th>Title</th>
                                                    <th>Year produced</th>
                                                    <th>Files/Links</th>
                                                    <th>Action</th>
                                                </tr>                     
                                            </thead>
                                            <tbody id="tbody_multimedia">                                             
                                            </tbody>
                                        </table><hr> 
                                    </div> 
                                </div>
                            </fieldset>
                        </div>
                        <div id="iec3" class="tabcontentiecmaterials" style="display: none;">
                            <fieldset>
                                <legend>Social Media</legend>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-lg-12 tooltip">
                                        <ul><li>
                                            <?php echo form_label('').form_dropdown('multimedia2',$multimedia2,'','id="multimedia2"'); ?>
                                            <span class="tooltiptext">Select multimedia</span>
                                        </li></ul>
                                    </div>
                                    <div id="mmlinksdiv4" style="display:none" class="col-lg-12 col-xs-12 tooltip">
                                        <ul><li>
                                            <?= form_label('Film Name','','id="smtitle"').form_input('filmname','','id="filmname"'); ?>
                                            <span class="tooltiptext">Input film name</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip" id="mmlinksdivyear" style="display:none">
                                        <ul><li>
                                            <?php echo form_label('Year produced').form_dropdown('multimedia_social_year',$yearListed,'',' id="multimedia_social_year"') ?>                            
                                            <span class="tooltiptext">Select year produced</span>
                                        </li></ul>
                                    </div>
                                    <div id="mmlinksdiv52" style="display: none" class="col-lg-12 col-xs-12 tooltip">
                                        <ul><li>
                                            <?= form_label('Specify others').form_input('other_multimedia2','','id="other_multimedia2"'); ?>
                                            <span class="tooltiptext">Specify others</span>
                                        </li></ul>
                                    </div>
                                    <div id="mmlinksdiv" style="display:none" class="col-lg-12 col-xs-12 tooltip">
                                        <ul><li>
                                            <?= form_label('URL/Link').form_input('mmlink','','id="mmlink"'); ?>
                                            <span class="tooltiptext">Input url/link</span>
                                        </li></ul>
                                    </div>                    
                                    <div id="mmlinksdiv22" style="display: none">
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset>
                                                <?= form_label('File attached<i>(*.avi, *.mp4, *.mov, *.mpg, *.mpeg, *.ppt, *.pptx, maximum of 100MB file size)</i>','','for="cepa_multimedia2"')?>
                                                <input type='file' name="cepa_multimedia2" id="cepa_multimedia2" onchange="readURLcepamultimedia2(this);"/>
                                                <input type="hidden" name="old_cepa_multimedia2" id="old_cepa_multimedia2">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                            <ul><li>
                                                <?= form_label('URL/Link').form_input('cepa_multimedia_link2','','id="cepa_multimedia_link2"'); ?>
                                                <span class="tooltiptext">Input URL/link of the video/presentation</span>
                                            </li></ul>
                                        </div>
                                    </div>                    
                                    <div class="col-xs-12" style="margin-top: 10px">
                                        <a type="text" class="btn btn-success" id="addsocialmedia">Add to list</a>                                
                                        <!-- <a type="text" class="btn btn-primary" id="addsocialmedia" onclick="insertcepamultimedia2()">Add to table</a>                                 -->
                                    </div>
                                    <div class="col-xs-12">
                                        <table id="data_tablesocialmedia" class="content-table">
                                            <thead>
                                                <tr>
                                                    <th>Social Media</th>
                                                    <th>Details</th>
                                                    <th>Action</th>
                                                </tr>                     
                                            </thead>
                                            <tbody id="tbody_socialmedia">                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="iec4" class="tabcontentiecmaterials" style="display: none;">
                            <fieldset>
                                <legend>Broadcast Station</legend>
                                <div id="mmlinksdiv3" class="col-lg-12 col-xs-12 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Station').form_dropdown('stationname',$multimedia4,'','id="stationname"'); ?>
                                        <span class="tooltiptext">Input Radio station</span>
                                    </li></ul>
                                </div>
                                <div class="col-lg-12 col-xs-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Name','','id="broadtitle"').form_input('broadname','','id="broadname"'); ?>
                                        <span class="tooltiptext">Input radio/tv station/programs</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('URL/Link').form_input('broadlinks','','id="broadlinks"'); ?>
                                        <span class="tooltiptext">Input URL/link of the station</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px">
                                    <a type="text" class="btn btn-success" id="addradiostation">Add to list</a>                                
                                    <!-- <a type="text" class="btn btn-primary" id="addradiostation" onclick="insertceparadiostation()">Add to table</a>                                 -->
                                </div>
                                <div class="col-xs-12">
                                    <table id="data_tableradiostation" class="content-table">
                                        <thead>
                                            <tr>
                                                <th>Station</th>
                                                <th>Details</th>
                                                <th>Action</th>
                                            </tr>                     
                                        </thead>
                                        <tbody id="tbody_radiostation">                                             
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                        <div id="iec5" class="tabcontentiecmaterials" style="display: none;">
                            <fieldset>
                                <legend>Souvenir Item</legend>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?php echo form_label('').form_dropdown('souvenir_item',$cepasouvenir,'','id="souvenir_item"'); ?>
                                        <span class="tooltiptext">Select Souvenir item</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip" id="othersouvenir" style="display: none">
                                    <ul><li>
                                        <?php echo form_label('Specify Others').form_input('other_souvenir','','id="other_souvenir"'); ?>
                                        <span class="tooltiptext">Select Souvenir item</span>
                                    </li></ul>
                                </div>
                                <div class="col-lg-12 col-xs-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Event Name','','id="souvernirtitle"').form_input('eventname','','id="eventname"'); ?>
                                        <span class="tooltiptext">Input event name</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Year produced').form_dropdown('eventyears',$yearListed,'',' id="eventyears"') ?>                            
                                        <span class="tooltiptext">Select year produced</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                        <ul><li>
                                            <label>Upload souvenir item images(<i>*.png,*.jpg,*.jpeg format only</i>)</label>
                                            <input type='file' name="souvenir_img" id="souvenir_img" />
                                            <input type="hidden" name="souvenir_img_span" id="souvenir_img_span">
                                            <div id="upload_souvenir_img"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 20px">
                                        <a type="text" class="btn btn-success" id="addsouveniritem">Add to list</a>                               
                                    </div>
                                    <div class="col-xs-12">
                                        <table id="data_tablesouvenir" class="content-table">
                                            <thead>
                                                <tr>
                                                    <th>Souvenir Item</th>
                                                    <th>Event Name</th>
                                                    <th>Event Year</th>
                                                    <th>Image/Files</th>
                                                    <th>Action</th>
                                                </tr>                     
                                            </thead>
                                            <tbody id="tbody_souvenir">                                             
                                            </tbody>
                                        </table><hr> 
                                    </div> 
                                </div>
                            </fieldset>
                        </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12"> 
                        <fieldset>
                            <label>Upload multiple images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="cepa_activity_img" id="cepa_activity_img" onchange="readURLcepaactivity(this);"  />
                            <span id="cepa_activity_img_span" class="cepa_activity_img_span hidden"></span>
                            <div id="uploadcepa_activity_img"></div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <a type="text" class="btn btn-primary" id="add_cepa_activity">Add to table</a> 
                        </div>
                    </div>
                    <div class="col-xs-12"><br>
                        <table id="data_tablecepaactivityreport" class="content-table">
                            <thead>
                                <tr>
                                    <th>CEPA Activity Report</th>
                                </tr>                     
                            </thead>
                            <tbody id="tbody_cepaactivityreport">                                             
                            </tbody>
                        </table><hr> 
                    </div> 
                </fieldset>
            </div>                
            <div id="kaplist" class="tabcontentcepalist" style="display: none">
                <fieldset>
                    <legend>Knowledge, Attitude and Practices (KAP) Survey Conducted</legend>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <div class="col-xs-6 col-lg-4 ">
                            <ul><li>
                                <?php echo form_label('Date conducted','','for="date_kap_month"').form_dropdown('date_kap_month',$monthList,'','id="date_kap_month"') ?>  
                            </li></ul>
                        </div> 
                        <div class="col-xs-6 col-lg-4 ">
                            <ul><li>
                                <?php echo form_label('&nbsp;','','for="date_kap_day"').form_dropdown('date_kap_day',$dayList,'','id="date_kap_day"') ?>  
                            </li></ul>
                        </div>   
                        <div class="col-xs-6 col-lg-4 ">
                            <ul><li>
                                <?php echo form_label('&nbsp;','','for="date_kap_year"').form_dropdown('date_kap_year',$yearList,'','id="date_kap_year"') ?>  
                            </li></ul>
                        </div>
                        <span class="tooltiptext">Select date conducted</span>   
                    </div>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <ul><li>
                            <?php echo form_label('Respondents','','for="kap_respondents"').form_textarea('kap_respondents','','id="kap_respondents"') ?>  
                            <span class="tooltiptext">Input KAP respondents</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <ul><li>
                            <?php echo form_label('No. of Respondents','','for="kap_norespondents"').form_input('kap_norespondents','','id="kap_norespondents" class="number-separator"') ?>  
                            <span class="tooltiptext">Input KAP number of respondents</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <ul><li>
                            <?php echo form_label('Name of Proponent','','for="kap_nameproponent"').form_input('kap_nameproponent','','id="kap_nameproponent"') ?>  
                            <span class="tooltiptext">Input KAP name of proponent</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-md-12 tooltip">
                        <ul><li>
                            <?php echo form_label('Remarks','','for="kap_remarks"').form_textarea('kap_remarks','','id="kap_remarks"') ?>  
                            <span class="tooltiptext">Input other remarks</span>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-6"> 
                        <label>Upload Surveyed Report <i>(*.pdf format, maximum size of 50MB)</i></label>
                        <input type='file' name="surveyed_report" id="surveyed_report" onchange="readURLsurveyedreport(this);"  />
                        <input type="hidden" id="surveyed_report_span" name="surveyed_report_span" />
                        <div id="uploadsurveyed_report"></div>
                    </div>
                    <div class="col-xs-12 col-lg-6"> 
                        <label>Upload Summary of Surveyed Report <i>(*.pdf format, maximum size of 50MB)</i></label>
                        <input type='file' name="summarysurveyed_report" id="summarysurveyed_report" onchange="readURLsummarysurveyedreport(this);"  />
                        <input type="hidden" id="summarysurveyed_report_span" name="summarysurveyed_report_span" />
                        <div id="uploadsummarysurveyed_report"></div>
                    </div>
                    <div class="col-xs-12" style="margin-top: 20px">
                        <div class="col-xs-12 col-lg-12 ">
                            <a type="text" class="btn btn-primary" id="add_kap">Add to table</a>
                        </div>
                    </div>
                    <div class="col-xs-12"><br>
                        <table id="table_kapsurvey" class="content-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Respondents</th>
                                    <th>No. of Respondents</th>
                                    <th>Name of Proponent</th>
                                    <th>File upload</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>                     
                            </thead>
                            <tbody id="tbody_kapsurvey">                                             
                            </tbody>
                        </table>
                    </div> 
                </fieldset>
            </div>
        <div id="eventlist" class="tabcontentcepalist" style="display: none">
            <fieldset>
                <legend>Special Events</legend>
                <div class="col-xs-12 col-md-12 tooltip">
                    <div class="col-xs-6 col-lg-12">
                        <ul><li>
                            <?php echo form_label('Environmental Event','','for="cepa_event"').form_dropdown('cepa_event',$cepa_event,'','id="cepa_event"') ?>  
                            <span class="tooltiptext">Environmental Event</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 tooltip" id="enviothers" style="display: none">
                    <div class="col-xs-6 col-lg-12">
                        <ul><li>
                            <?php echo form_label('Specify others','','for="cepa_event_other"').form_input('cepa_event_other','','id="cepa_event_other"') ?>  
                            <span class="tooltiptext">Input others</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 tooltip">
                    <div class="col-xs-6 col-lg-4 ">
                        <ul><li>
                            <?php echo form_label('Date conducted','','for="date_event_month"').form_dropdown('date_event_month',$monthList,'','id="date_event_month"') ?>  
                        </li></ul>
                    </div> 
                    <div class="col-xs-6 col-lg-4 ">
                        <ul><li>
                            <?php echo form_label('&nbsp;','','for="date_event_day"').form_dropdown('date_event_day',$dayList,'','id="date_event_day"') ?>  
                        </li></ul>
                    </div>   
                    <div class="col-xs-6 col-lg-4 ">
                        <ul><li>
                            <?php echo form_label('&nbsp;','','for="date_event_year"').form_dropdown('date_event_year',$yearList,'','id="date_event_year"') ?>  
                        </li></ul>
                    </div>
                    <span class="tooltiptext">Select date conducted</span>   
                </div>
                <div class="col-xs-12 col-md-12 tooltip">
                    <div class="col-xs-6 col-lg-12">
                        <ul><li>
                            <?php echo form_label('Remarks','','for="cepa_event_remarks"').form_textarea('cepa_event_remarks','','id="cepa_event_remarks"') ?>  
                            <span class="tooltiptext">Input remarks/brief description</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6"> 
                    <label>Upload Activity Report <i>(*.pdf format, maximum size of 50MB)</i></label>
                    <input type='file' name="event_report" id="event_report" onchange="readURLeventreport(this);"  />
                    <input type="hidden" id="event_report_span" name="event_report_span" />
                    <div id="uploadevent_report"></div>
                </div>
                <div class="col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-12 col-lg-12 ">
                        <a type="text" class="btn btn-primary" id="add_cepa_event">Add to table</a> 
                    </div>
                </div>
                <div class="col-xs-12">
                    <table id="tablecepaevent" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="5">Special Event</th>
                            </tr> 
                            <tr>
                                <th>Date conducted</th>
                                <th>Events</th>
                                <th>File upload</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>                      
                        </thead>
                        <tbody id="tbody_cepaevent">                                             
                        </tbody>
                    </table><hr> 
                </div> 
            </fieldset>
        </div>
    </div>
    <div id="galleries" class="tabcontentcepa" style="display: none">
        <div class="form-style-6">
            <h2>Photo Galleries</h2>
        </div>
        <fieldset>
            <legend>Documents</legend>
            <div class="col-xs-12">                        
                <div class="tab">
                    <a class="tablinkfolder active" onclick="tabfolder(event, 'pf')">Physical Feature</a>
                    <a class="tablinkfolder" id="loadbdfegall" onclick="tabfolder(event, 'bdfez')">Livelihood/Enterprise(BDFE)</a>
                    <!-- <a class="tablinkfolder" id="loadActionment" onclick="tabfolder(event, 'mz')">Management Zone</a> -->
                    <a class="tablinkfolder" id="loadecotourism" onclick="tabfolder(event, 'eco')">Ecotourism</a>
                    <a class="tablinkfolder" id="loadthreatgal" onclick="tabfolder(event, 'th')">Threats</a>
                    <a class="tablinkfolder" id="loadmaps" onclick="tabfolder(event, 'mi')">Map Image</a>
                    <a class="tablinkfolder" id="loadotherga" onclick="tabfolder(event, 'oi')">Other Image</a>
                </div>
                <div id="pf" class="tabcontentfolder" style="display: block">
                    <fieldset>
                        <legend>Physical Feature</legend>
                        <div id="fetchPfTopo"></div>
                        <div id="fetchPfRock"></div>
                        <div id="fetchPfsoil"></div>
                        <div id="fetchPfclimate"></div>
                        <div id="fetchPfhydrology"></div>
                        <div id="fetchPfexland"></div>
                        <div id="fetchPflandslide"></div>
                        <div id="fetchPfflooding"></div>
                        <div id="fetchPfothergeohazard"></div>
                    </fieldset>
                </div>
                <div id="bdfez" class="tabcontentfolder">
                    <fieldset>
                        <legend>Livelihood/Enterprise(BDFE)</legend>
                        <div class="col-xs-12 col-lg-12"><div id="fetchdbfeimg"></div></div>                               
                        <div class="col-xs-12 col-lg-12"><div id="fetchdbfeimgprod"></div></div>
                    </fieldset>
                </div>
                <div id="mz" class="tabcontentfolder">
                    <fieldset>
                        <legend>Management Zone</legend>
                        <div id="fetchmz"></div>                                
                    </fieldset>
                </div>
                <div id="eco" class="tabcontentfolder">
                    <fieldset>
                        <legend>Ecotourism</legend>
                        <div id="fetchattraction"></div>   
                        <div id="fetchfacility"></div>   
                        <div id="fetchactivity"></div>   
                    </fieldset>
                </div>
                <div id="th" class="tabcontentfolder">
                    <fieldset>
                        <legend>Threats</legend>
                        <div id="fetchthreat"></div>
                    </fieldset>
                </div>
                <div id="mi" class="tabcontentfolder">
                    <fieldset>
                        <legend>Map Image</legend>
                            <div id="fetchmaps"></div>
                    </fieldset>
                </div>
                <div id="oi" class="tabcontentfolder">
                    <fieldset>
                        <legend>Other Images</legend>
                        <!-- <div class="col-xs-12  field inner-addon left-addon">
                            <input type="file" name="files" id="files" multiple />
                        </div> -->
                        <!-- <div style="clear:both"></div>
                         <br />
                         <br /> -->
                        <div id="fetch_images"></div>
                        <div id="uploaded_images"></div>

                         <fieldset>
                            <label>Upload images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="otherimagesgallery" id="otherimagesgallery" /><br>
                            <input type="hidden" name="imagegallery_txt" id="imagegallery_txt" /> 
                        </fieldset>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Image description','','for="galleryotherimage_desc"').form_textarea('galleryotherimage_desc','','placeholder="Brief description" id="galleryotherimage_desc" style="height:250px;"');?>
                                <span class="tooltiptext">Information of the image which includes but not limited to title, summary/description, author, source and date modified</span>
                            </li></ul>
                        </div>                       

                        <div class="col-xs-12">
                            <a type="text" id="addimagegalleryothers" class="btn btn-primary">Add data</a>
                        </div>
                        <div class="col-xs-12 ">   
                            <div class="table-responsive large-tables"><br>
                                <table id="tableimagegalleries" class="content-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="text-align: center; font-size: 24px">Other Image</th>
                                        </tr>                           
                                    </thead>
                                    <tbody id="tbodyimagegalleries">
                                    </tbody>
                                </table>                   
                            </div>                            
                        </div> 
                    </fieldset>
                </div>
            </div>
        </fieldset>
    </div>
</div>
<form method="post" action="" id="CepaActivityForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-cepaactivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit</h4>
                </div>
                <input type="hidden" id="cepaact-id" name="cepaact-id" value="" />
                <input type="hidden" id="cepaact-gencode" name="cepaact-gencode" value="" />
                <input type="text" name="edit-CEPAGenCode" class="hidden" id="edit-CEPAGenCode">
                <div class="modal-body" >
            <div class="col-xs-12">
                <div class="col-xs-12 col-md-6">
                    <ul><li>
                        <?= form_label('Activity').form_input('edit-cepa_activity','','id="edit-cepa_activity" placeholder="Name of event, theme, if any"'); ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="col-xs-6 col-lg-3 ">
                        <ul><li>
                            <?php echo form_label('Date','','for="edit-date_cepa_month"').form_dropdown('edit-date_cepa_month',$monthList,'',' id="edit-date_cepa_month"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-3 ">
                        <ul><li>
                            <?php echo form_label('&nbsp;','','for="edit-date_cepa_day"').form_dropdown('edit-date_cepa_day',$dayList,'',' id="edit-date_cepa_day"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-6 col-lg-3 ">
                        <ul><li>
                            <?php echo form_label('&nbsp;','','for="edit-date_cepa_year"').form_dropdown('edit-date_cepa_year',$yearList,'',' id="edit-date_cepa_year"') ?>
                        </li></ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <ul><li>
                    <?= form_label('Venue').form_input('edit-cepa_venue','','id="edit-cepa_venue"'); ?>
                </li></ul>
            </div>
            <div class="col-xs-12">
                <ul><li>
                    <?= form_label('Objective/s').form_textarea('edit-cepa_objective','','id="edit-cepa_objective"') ?>
                </li></ul>
            </div>
            <div class="col-xs-12">
                <ul><li>
                    <?= form_label('Highlights').form_textarea('edit-cepa_summary','','id="edit-cepa_summary"') ?>
                </li></ul>
            </div>
            <fieldset>
                <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Audience</legend>
                <div class="col-xs-12">
                    <div class="col-xs-4 col-md-4">
                        <ul><li>
                            <?= form_label('Male').form_input('edit-cepa_male','','id="edit-cepa_male" onchange="calculatecepasex()" onkeydown="run(this)"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <ul><li>
                            <?= form_label('Female').form_input('edit-cepa_female','','id="edit-cepa_female" onchange="calculatecepasex()" onkeydown="run(this)"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-md-4">
                        <ul><li>
                            <?= form_label('Total No.').form_input('edit-cepa_total','','id="edit-cepa_total"'); ?>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 hidden">
                    <ul><li>
                        <?= form_label('Audience Type').form_dropdown('edit-cepa_audience_type',$cepa_activity,'','id="edit-cepa_audience_type"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-md-8" id="cepaotheraudiencedivEdit" style="display: none">
                    <ul><li>
                        <?= form_label('Specify others').form_input('edit-cepa_audience_type_others','','id="edit-cepa_audience_type_others"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-md-12 tooltip">
                    <fieldset>
                        <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">audience type</legend>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au1" id="edit-chk_au1"><label for="edit-chk_au1">Pre School</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au2" id="edit-chk_au2"><label for="edit-chk_au2">Elementary School</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au3" id="edit-chk_au3"><label for="edit-chk_au3">Junior High School</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au4" id="edit-chk_au4"><label for="edit-chk_au4">Sr. High School</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au5" id="edit-chk_au5"><label for="edit-chk_au5">Academe</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au6" id="edit-chk_au6"><label for="edit-chk_au6">Media</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au7" id="edit-chk_au7"><label for="edit-chk_au7">Policy Makers</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au8" id="edit-chk_au8"><label for="edit-chk_au8">Brgy LGU</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au9" id="edit-chk_au9"><label for="edit-chk_au9">City LGU</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au10" id="edit-chk_au10"><label for="edit-chk_au10">Municipal LGU</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au11" id="edit-chk_au11"><label for="edit-chk_au11">Provincial LGU</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au12" id="edit-chk_au12"><label for="edit-chk_au12">Religious group</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au13" id="edit-chk_au13"><label for="edit-chk_au13">Peoples Organization</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au14" id="edit-chk_au14"><label for="edit-chk_au14">OGAs</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au15" id="edit-chk_au15"><label for="edit-chk_au15">NGOs</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au16" id="edit-chk_au16"><label for="edit-chk_au16">Local Communities</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au17" id="edit-chk_au17"><label for="edit-chk_au17">Private sector</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_au19" id="edit-chk_au19"><label for="chk_a19">ICCs/IPs</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_au18" id="edit-chk_au18"><label for="edit-chk_au18">Others</label>
                           <ul><li>
                                <input type="text" placeholder="Please, specify others." name="edit-chk_au1_others" id="edit-chk_au1_others">
                            </li></ul>
                        </div>
                    </fieldset>
                    <span class="tooltiptext">Select audience</span>
                </div>
                <div class="col-xs-12 col-md-12">
                    <ul><li>
                        <?= form_label('Evaluation (Provide brief evaluation of the activity based on pre and post test)').form_textarea('edit-cepa_details','','id="edit-cepa_details"') ?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-md-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Strategy</legend>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                           <input type="checkbox" name="edit-chk_s1" id="edit-chk_s1"><label for="edit-chk_s1">Lecture</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s2" id="edit-chk_s2"><label for="edit-chk_s2">Game/Competition</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s3" id="edit-chk_s3"><label for="edit-chk_s3">Theater</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s4" id="edit-chk_s4"><label for="edit-chk_s4">Educational Tour</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s5" id="edit-chk_s5"><label for="edit-chk_s5">Campaign</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s6" id="edit-chk_s6"><label for="edit-chk_s6">Research</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s7" id="edit-chk_s7"><label for="edit-chk_s7">Exhibit/Fair</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s8" id="edit-chk_s8"><label for="edit-chk_s8">Fun run/Walk-a-thon</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s9" id="edit-chk_s9"><label for="edit-chk_s9">Mass media</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s10" id="edit-chk_s10"><label for="edit-chk_s10">Printed Materials</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s11" id="edit-chk_s11"><label for="edit-chk_s11">Forum/Dialogue/Symposium</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s12" id="edit-chk_s12"><label for="edit-chk_s12">Interview/Focus Group Discussion</label>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                            <input type="checkbox" name="edit-chk_s13" id="edit-chk_s13"><label for="edit-chk_s13">Others :</label>
                            <ul><li>
                                <input type="text" placeholder="Please, specify others." name="edit-chk_s_others" id="edit-chk_s_others">
                            </li></ul>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-md-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Methods and Materials Used</legend>
                        <div class="hidden">
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm1" id="edit-chk_mm1"><label for="edit-chk_mm1">Powerpoint Presentation</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-edit-chk_mm2" id="edit-edit-chk_mm2"><label for="edit-edit-chk_mm2">Handouts</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm3" id="edit-chk_mm3"><label for="edit-chk_mm3">Film/AVP</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm4" id="edit-chk_mm4"><label for="edit-chk_mm4">Demo</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm5" id="edit-chk_mm5"><label for="edit-chk_mm5">Hands-on Exercise</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm6" id="edit-chk_mm6"><label for="edit-chk_mm6">Flipcharts,posters,brochures,etc</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm7" id="edit-chk_mm7"><label for="edit-chk_mm7">Storybooks,comics,etc</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm8" id="edit-chk_mm8"><label for="edit-chk_mm8">Pictures and drawings</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm9" id="edit-chk_mm9"><label for="edit-chk_mm9">Sounds, music, etc.</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm10" id="edit-chk_mm10"><label for="edit-chk_mm10">Puppet</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm11" id="edit-chk_mm11"><label for="edit-chk_mm11">Board game</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm12" id="edit-chk_mm12"><label for="edit-chk_mm12">Activity Booklets</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm13" id="edit-chk_mm13"><label for="edit-chk_mm13">Perception Survey</label>
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                               <input type="checkbox" name="edit-chk_mm14" id="edit-chk_mm14"><label for="edit-chk_mm14">Others :</label>
                               <ul><li>
                                    <input type="text" placeholder="Please, specify others." name="edit-chk_mm_others" id="edit-chk_mm_others">
                                </li></ul>
                            </div>
                        </div>
                        <div class="tab-third" id="tabhabecosub">
                            <a class="tablinkiecmaterialsEdit active" onclick="tabiecmaterialsEdit(event, 'iec1e')">Print</a>
                            <a class="tablinkiecmaterialsEdit" onclick="tabiecmaterialsEdit(event, 'iec2e')">Multimedia</a>
                            <a class="tablinkiecmaterialsEdit" onclick="tabiecmaterialsEdit(event, 'iec3e')">Social Media</a>
                            <a class="tablinkiecmaterialsEdit" onclick="tabiecmaterialsEdit(event, 'iec4e')">Broadcast Station</a>
                            <a class="tablinkiecmaterialsEdit" onclick="tabiecmaterialsEdit(event, 'iec5e')">Souvenir Item</a>
                        </div>
                        <div id="iec1e" class="tabcontentiecmaterialsEdit" style="display: block;">
                            <fieldset>
                                <legend>Print</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <ul><li>
                                            <?php echo form_label('').form_dropdown('edit-print_materials',$cepa_print_materials,'','id="edit-print_materials"'); ?>
                                            <span class="tooltiptext">Select print name</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 tooltip" id="edit-cepaprintother" style="display: none">
                                        <ul><li>
                                            <?php echo form_label('Specify others').form_input('edit-print_materials_other','','id="edit-print_materials_other"'); ?>
                                            <span class="tooltiptext">Input other</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Title').form_input('edit-print_materials_title','','id="edit-print_materials_title"'); ?>
                                            <span class="tooltiptext">Input title</span>
                                        </li></ul>    
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Year produced').form_dropdown('edit-print_materials_produced',$yearListed,'',' id="edit-print_materials_produced"') ?>                            
                                            <span class="tooltiptext">Select year produced</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip" id="edit-divvolume1" style="display: none;">
                                        <ul><li>
                                            <?php echo form_label('Volume/Issue number').form_input('edit-print_materials_volume','','id="edit-print_materials_volume"'); ?>
                                            <span class="tooltiptext">Input volume/issued number of newspaper</span>
                                        </li></ul>    
                                    </div>
                                    <div class="col-xs-12 col-lg-12"> 
                                        <fieldset>
                                            <label>Upload digital file/sample file<i>(*.png, *.jpeg, *.jpg, *.pdf)</i></label>
                                            <input type='file' name="edit-print_file_materials" id="edit-print_file_materials" onchange="readURLcepamaterialsprintEdit(this);"  />
                                            <input type="hidden" id="edit-print_file_materials_span" name="edit-print_file_materials_span" />
                                            <div id="edit-uploadprint_file_materials"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12">
                                        <a type="text" class="btn btn-success" id="addiecmatEdit">Add to list</a>                               
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-xs-12">
                                        <div id="cepaprintdivOutput"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="iec2e" class="tabcontentiecmaterialsEdit" style="display: none;">
                            <fieldset>
                                <legend>Multimedia</legend>
                                <div class="col-xs-12">
                                    <div class="col-lg-12 tooltip">
                                        <ul><li>
                                            <?php echo form_label('').form_dropdown('edit-multimedia',$multimedia,'','id="edit-multimedia"'); ?>
                                            <span class="tooltiptext">Select multimedia</span>
                                        </li></ul>
                                    </div>
                                    <div id="edit-mmlinksdiv5" style="display: none" class="col-lg-12 col-xs-12 tooltip">
                                        <ul><li>
                                            <?= form_label('Specify others').form_input('edit-other_multimedia','','id="edit-other_multimedia"'); ?>
                                            <span class="tooltiptext">Specify others</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Title','','id="edit-mtitle"').form_input('edit-multimedia_title','','id="edit-multimedia_title"'); ?>
                                            <span class="tooltiptext">Input title</span>
                                        </li></ul>    
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Year produced').form_dropdown('edit-multimedia_year',$yearListed,'',' id="edit-multimedia_year"') ?>                            
                                            <span class="tooltiptext">Select year produced</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" id="edit-mmlinksdiv2">
                                        <fieldset>
                                            <?= form_label('File attached<i>(*.avi, *.mp4, *.mov, *.mpg, *.mpeg, *.ppt, *.pptx, maximum of 100MB file size)</i>','','for="edit-cepa_multimedia"')?>
                                            <input type='file' name="edit-cepa_multimedia" id="edit-cepa_multimedia" onchange="readURLcepamultimediaEdit(this);"/>
                                            <input type="hidden" name="edit-old_cepa_multimedia" id="edit-old_cepa_multimedia">
                                        </fieldset>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <ul><li>
                                            <?= form_label('URL/Link').form_input('edit-cepa_multimedia_link','','id="edit-cepa_multimedia_link"'); ?>
                                        <span class="tooltiptext">Input URL/link of the video/presentation</span>
                                        </li></ul>
                                    </div>
                                    
                                    <div class="col-xs-12" style="margin-top: 10px">
                                        <a type="text" class="btn btn-primary" id="addmultimediasEdit">Add to list</a>                                
                                        <!-- <a type="text" class="btn btn-success" id="addiecmatEdit">Add to list</a>                                 -->
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-xs-12">
                                        <div id="cepamultimediadivOutput"></div>     
                                    </div>                               
                                </div>
                            </fieldset>
                        </div>
                        <div id="iec3e" class="tabcontentiecmaterialsEdit" style="display: none;">
                            <fieldset>
                                <legend>Social Media</legend>
                                <div class="col-xs-12 col-lg-12">
                                    <div class="col-lg-12 tooltip">
                                        <ul><li>
                                            <?php echo form_label('').form_dropdown('edit-multimedia2',$multimedia2,'','id="edit-multimedia2"'); ?>
                                            <span class="tooltiptext">Select multimedia</span>
                                        </li></ul>
                                    </div>
                                    <div id="edit-mmlinksdiv4" style="display:none" class="col-lg-12 col-xs-12 tooltip">
                                        <ul><li>
                                            <?= form_label('Film Name','','id="edit-smtitle"').form_input('edit-filmname','','id="edit-filmname"'); ?>
                                            <span class="tooltiptext">Input film name</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-6 tooltip" id="edit-mmlinksdivyear" style="display:none">
                                        <ul><li>
                                            <?php echo form_label('Year produced').form_dropdown('edit-multimedia_social_year',$yearListed,'',' id="edit-multimedia_social_year"') ?>                            
                                            <span class="tooltiptext">Select year produced</span>
                                        </li></ul>
                                    </div>
                                    <div id="edit-mmlinksdiv52" style="display: none" class="col-lg-12 col-xs-12 tooltip">
                                        <ul><li>
                                            <?= form_label('Specify others').form_input('edit-other_multimedia2','','id="edit-other_multimedia2"'); ?>
                                            <span class="tooltiptext">Specify others</span>
                                        </li></ul>
                                    </div>
                                    <div id="edit-mmlinksdiv" style="display:none" class="col-lg-12 col-xs-12 tooltip">
                                        <ul><li>
                                            <?= form_label('URL/Link').form_input('edit-mmlink','','id="edit-mmlink"'); ?>
                                            <span class="tooltiptext">Input url/link</span>
                                        </li></ul>
                                    </div>                    
                                    <div id="edit-mmlinksdiv22" style="display: none">
                                        <div class="col-xs-12 col-lg-12">
                                            <fieldset>
                                                <?= form_label('File attached<i>(*.avi, *.mp4, *.mov, *.mpg, *.mpeg, *.ppt, *.pptx, maximum of 100MB file size)</i>','','for="edit-cepa_multimedia2"')?>
                                                <input type='file' name="edit-cepa_multimedia2" id="edit-cepa_multimedia2" onchange="readURLcepamultimedia2Edit(this);"/>
                                                <input type="hidden" name="edit-old_cepa_multimedia2" id="edit-old_cepa_multimedia2">
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 tooltip">
                                            <ul><li>
                                                <?= form_label('URL/Link').form_input('edit-cepa_multimedia_link2','','id="edit-cepa_multimedia_link2"'); ?>
                                                <span class="tooltiptext">Input URL/link of the video/presentation</span>
                                            </li></ul>
                                        </div>
                                    </div>                    
                                    <div class="col-xs-12" style="margin-top: 10px">
                                        <a type="text" class="btn btn-success" id="addsocialmediaEdit">Add to list</a>                                
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-xs-12">
                                        <div id="cepasocialmediadivOutput"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="iec4e" class="tabcontentiecmaterialsEdit" style="display: none;">
                            <fieldset>
                                <legend>Broadcast Station</legend>
                                <div id="edit-mmlinksdiv3" class="col-lg-12 col-xs-12 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Station').form_dropdown('edit-stationname',$multimedia4,'','id="edit-stationname"'); ?>
                                        <span class="tooltiptext">Input Radio station</span>
                                    </li></ul>
                                </div>
                                <div class="col-lg-12 col-xs-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Name','','id="edit-broadtitle"').form_input('edit-broadname','','id="edit-broadname"'); ?>
                                        <span class="tooltiptext">Input radio/tv station/programs</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?= form_label('URL/Link').form_input('edit-broadlinks','','id="edit-broadlinks"'); ?>
                                        <span class="tooltiptext">Input URL/link of the station</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12" style="margin-top: 10px">
                                    <a type="text" class="btn btn-success" id="addradiostationEdit">Add to list</a>                                
                                    <!-- <a type="text" class="btn btn-primary" id="addradiostation" onclick="insertceparadiostation()">Add to table</a>                                 -->
                                </div>
                                <div class="col-sm-12 col-lg-12 col-xs-12">
                                    <div id="ceparadiodivOutput"></div>   
                                </div>                            
                            </fieldset>
                        </div>
                        <div id="iec5e" class="tabcontentiecmaterialsEdit" style="display: none;">
                            <fieldset>
                                <legend>Souvenir Item</legend>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?php echo form_label('').form_dropdown('edit-souvenir_item',$cepasouvenir,'','id="edit-souvenir_item"'); ?>
                                        <span class="tooltiptext">Select Souvenir item</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip" id="edit-othersouvenir" style="display: none">
                                    <ul><li>
                                        <?php echo form_label('Specify Others').form_input('edit-other_souvenir','','id="edit-other_souvenir"'); ?>
                                        <span class="tooltiptext">Select Souvenir item</span>
                                    </li></ul>
                                </div>
                                <div class="col-lg-12 col-xs-12 tooltip">
                                    <ul><li>
                                        <?= form_label('Event Name','','id="edit-souvernirtitle"').form_input('edit-eventname','','id="edit-eventname"'); ?>
                                        <span class="tooltiptext">Input event name</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-6 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Year produced').form_dropdown('edit-eventyears',$yearListed,'',' id="edit-eventyears"') ?>                            
                                        <span class="tooltiptext">Select year produced</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-12 col-lg-12">
                                        <ul><li>
                                            <label>Upload souvenir item images(<i>*.png,*.jpg,*.jpeg format only</i>)</label>
                                            <input type='file' name="edit-souvenir_img" id="edit-souvenir_img" />
                                            <input type="hidden" name="edit-souvenir_img_span" id="edit-souvenir_img_span">
                                            <div id="edit-upload_souvenir_img"></div>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 20px">
                                        <a type="text" class="btn btn-success" id="addsouveniritemEdit">Add to list</a>                               
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-xs-12">
                                        <div id="cepasouvenirdivOutput"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </fieldset>
                </div>
                 <div class="col-xs-12 col-lg-12">
                    <fieldset>
                    <legend style="background-color: transparent;color: #444; font-weight: 700;font-size: 14px;">Click and insert image to show highlight/s of the activity. Additional photos (maximum of 5) may be attached as Appedix.</legend>
                        <input type='file' name="edit-cepa_activity_img" id="edit-cepa_activity_img" onchange="readURLcepaactivityEdit(this);"  />
                        <span id="edit-cepa_activity_img_span" class="edit-cepa_activity_img_span hidden"></span><br>
                        <div id="edit-uploadcepa_activity_img"></div>
                    </fieldset>
                </div>

                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="updatecepareport();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>


<form method="post" action="#" id="PAEventForm" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-paevents" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Protected Area Event</h4>
                </div>
                <div class="modal-body" >
                    <input type="hidden" id="paevents-id" name="paevents-id" value="" />
                    <input type="hidden" id="paevents-gencode" name="paevents-gencode" value="" />
                    <input type="hidden" id="paevents-gencode2" name="paevents-gencode2" value="" />
                <div class="col-xs-12 col-lg-12">
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                        <legend>Date</legend>
                        <div class="col-xs-6 col-lg-6">
                           <ul><li>
                               <label>Start</label><input type="text" name="edit-dateeventfrom" id="edit-dateeventfrom" class="form_datetime">
                           </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                           <ul><li>
                               <label>End</label><input type="text" name="edit-dateeventto" id="edit-dateeventto" class="form_datetime">
                           </li></ul>
                        </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Title of event').form_input('edit-events_title','','id="edit-events_title"'); ?>
                            <span class="tooltiptext">Input title of event</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Event Description/Purpose').form_textarea('edit-events_description','','id="edit-events_description"'); ?>
                            <span class="tooltiptext">Input description</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Participants').form_input('edit-events_participant','','id="edit-events_participant"'); ?>
                            <span class="tooltiptext">Input Participant</span>
                            </li></ul>
                        </div>
                    </div>                    
                    <div class="col-xs-12">
                        <a type="text" class="btn btn-warning" id="addeventparticipantEdit">Add participant</a>                               
                    </div>
                    <div class="col-xs-12">
                        <div id="paeventpartdiv"></div>
                    </div>
                    <div class="col-xs-12 col-lg-12" style="margin-top:20px;">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Conducted').form_input('edit-events_conducted','','id="edit-events_conducted"'); ?>
                            <span class="tooltiptext">Input event conducted</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" name="submit" value="Update" onclick="updatepaeventsEdit();" >Update</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A STRICT PROTECTION ZONE -->

