<div class="tab-pane" id="economic">
  	<div class="form-style-6">
      	<h2>SOCIO-ECONOMIC AND CULTURAL FEATURES</h2>
  	</div>
  	<div class="col-xs-12">
      	<div class="tab">
      	  	<a class="tablinksocio active" onclick="tabsocio(event, 'sociocultural')" id="defaultOpen">Socio-Economic</a>
      	  	<a class="tablinksocio" id="loadeconomic" onclick="tabsocio(event, 'economicprof')">Cultural Profile</a>
            <!-- <a class="tablinksocio" id="" onclick="tabsocio(event, 'seamstab')">SEAMS</a> -->
      	</div>
  	</div>
    <div id="seamstab" class="tabcontentsocio" style="display: none">
        <fieldset>
            <legend>Economic Profile</legend>                            
                <div class="tab">
                    <a style="font-size: 11px;" class="tabrev active" onclick="tabrev(event, 'RevEcotourism')" id="defaultOpen">Ecotourism</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'FisherySalt')" id="seamsFishSalt">Fisheries<br>(Salt water)</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'FisheryFresh')" id="seamsFishFresh">Fisheries<br>(Fresh water)</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'TPM')" id="seamsTPM">Trading/<br>Processing/<br>Mfg.</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'Agri')" id="seamsagri">Agriculture</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'livestockpoultry')" id="seamsgrazing">Livestock<br>and<br>Poultry</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'forestrynontimber')" id="seamsnontimber">Forestry<br>(Non-Timber Products)</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'forestrytimber')"  id="seamstimber">Forestry<br>(Timber Products)</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'resourcewildlife')" id="seamsrwc">Resource and<br>Wildlife</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'miningqurrying')" id="seamsmining">Mining and<br>Quarrying</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'otherindustries')" id="seamsindustry">Other Industries</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'servicebased')" id="seamssevice">Service-based<br>Industry</a>
                    <a style="font-size: 11px;" class="tabrev" onclick="tabrev(event, 'othersources')" id="seamssource">Other<br>Sources</a>
                </div>
                <div id="RevEcotourism" class="tabcontentRevenue">                                    
                    <div class="tab">
                        <a class="tabecoprof active" onclick="tabecoprof(event, 'revEco')" id="defaultOpen">Revenue</a>
                        <a class="tabecoprof" onclick="tabecoprof(event, 'CostIncurred')" id="ecorevenue">Cost Incurred</a>
                    </div>
                    <div class="col-xs-12 ">                                    
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="hh_id"').form_dropdown('hh_id',$householdid,'','class="select-css" id="hh_id"')?>
                            </li></ul>
                        </div>                                           
                    </div>
                    <div id="revEco" class="tabcontntecoprof">
                    <fieldset>
                        <legend>Revenue from Ecotourism</legend>                                            
                        <div class="col-xs-12 ">   
                        <fieldset>         
                            <legend>Tour guiding</legend>                                                               
                                <div class="col-xs-3 col-lg-3 ">
                                    <ul><li>
                                    <?= form_label('Avarage Annual Income','','for="tour_income"').form_input('tour_income','','placeholder=" " onkeyup="run(this)" id="tour_income"')?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-9 col-lg-9 ">
                                    <ul><li>
                                    <?= form_label('Location where activity is conducted','','for="tour_location"').form_input('tour_location','','placeholder=" " id="tour_location"')?>
                                    </li></ul>
                                </div>
                        </fieldset> 
                        <fieldset>         
                            <legend>Ecolodge operation</legend>                                                               
                                <div class="col-xs-3 col-lg-3 ">
                                    <ul><li>
                                    <?= form_label('Avarage Annual Income','','for="ecolodge_income"').form_input('ecolodge_income','','placeholder=" " onkeyup="run(this)" id="ecolodge_income"')?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-9 col-lg-9 ">
                                    <ul><li>
                                    <?= form_label('Location where activity is conducted','','for="ecolodge_location"').form_input('ecolodge_location','','placeholder=" " id="ecolodge_location"')?>
                                    </li></ul>
                                </div>
                        </fieldset> 
                        <fieldset>         
                            <legend>Kiosk operation</legend>                                                               
                                <div class="col-xs-3 col-lg-3 ">
                                    <ul><li>
                                        <?= form_label('Avarage Annual Income','','for="kiosk_income"').form_input('kiosk_income','','placeholder=" " onkeyup="run(this)" id="kiosk_income"')?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-9 col-lg-9 ">
                                    <ul><li>
                                    <?= form_label('Location where activity is conducted','','for="kiosk_location"').form_input('kiosk_location','','placeholder=" " id="kiosk_location"')?>
                                    </li></ul>
                                </div>
                        </fieldset>
                                            <fieldset>         
                                            <legend>Boat/Kayak operation</legend>                                                               
                                                <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Avarage Annual Income','','for="boat_income"').form_input('boat_income','','placeholder=" " onkeyup="run(this)" id="boat_income"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-9 col-lg-9 ">
                                                    <ul><li>
                                                    <?= form_label('Location where activity is conducted','','for="boat_location"').form_input('boat_location','','placeholder=" " id="boat_location"')?>
                                                    </li></ul>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                            <legend>Porterage operation</legend>                                                               
                                                <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Avarage Annual Income','','for="porterage_income"').form_input('porterage_income','','placeholder=" " onkeyup="run(this)" id="porterage_income"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-9 col-lg-9 ">
                                                    <ul><li>
                                                    <?= form_label('Location where activity is conducted','','for="porterage_location"').form_input('porterage_location','','placeholder=" " id="porterage_location"')?>
                                                    </li></ul>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend> Transport services (specify)</legend>
                                                <div class="col-xs-4 col-lg-4">
                                                        <div id="ca1">
                                                            <button id="add_transport"  type="button" class="btn btn-info">Add transport service (specify)</button>        
                                                        </div><br>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                            <legend> Catering/restaurant operations</legend>                                                               
                                                <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Avarage Annual Income','','for="catering_income"').form_input('catering_income','','placeholder=" " onkeyup="run(this)" id="catering_income"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-9 col-lg-9 ">
                                                    <ul><li>
                                                    <?= form_label('Location where activity is conducted','','for="catering_location"').form_input('catering_location','','placeholder=" " id="catering_location"')?>
                                                    </li></ul>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                            <legend> Trekking</legend>                                                               
                                                <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Avarage Annual Income','','for="trekking_income"').form_input('trekking_income','','placeholder=" " onkeyup="run(this)" id="trekking_income"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-9 col-lg-9 ">
                                                    <ul><li>
                                                    <?= form_label('Location where activity is conducted','','for="trekking_location"').form_input('trekking_location','','placeholder=" " id="trekking_location"')?>
                                                    </li></ul>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                            <legend> Caving</legend>                                                               
                                                <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Avarage Annual Income','','for="caving_income"').form_input('caving_income','','placeholder=" " onkeyup="run(this)" id="caving_income"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-9 col-lg-9 ">
                                                    <ul><li>
                                                    <?= form_label('Location where activity is conducted','','for="caving_location"').form_input('caving_location','','placeholder=" " id="caving_location"')?>
                                                    </li></ul>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend> Others (specify)</legend>
                                                <div class="col-xs-4 col-lg-4">
                                                    <div id="ca2">
                                                        <button id="add_other_ecotourism"  type="button" class="btn btn-info">Add other revenue from ecotourism (specify)</button>        
                                                    </div><br>
                                                </div>
                                            </fieldset>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamssiEco">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                            <div class="table-responsive">
                                                <table id="tblseamssiEco" class="table table-bordered tglobal">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" style="text-align: center; font-size: 24px">Revenue from Ecotourism</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Household Member Name</th> 
                                                            <th>Sex</th>
                                                            <th>Option</th>
                                                        </tr>                                                   
                                                    </thead>
                                                    <tbody id="tbodyseamssiEco"></tbody>
                                                </table>
                                                <table id="tblseamssiEco_sample" class="table table-bordered tglobal">
                                                    <tbody id="tbodyseamssiEco_sample"></tbody>
                                                </table>                                            
                                            </div>
                                        </div>
                                        </fieldset>
                                    </div>
                                    <div id="CostIncurred" class="tabcontntecoprof" style="display: none">
                                        <fieldset>
                                            <legend>Costs incurred in ecotourim-based income source</legend>
                                            <div class="col-xs-12">
                                                <fieldset>
                                                    <legend>Materials</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-ecotourism-1a"').form_input('seams-ecotourism-1','','placeholder=" " id="seams-ecotourism-1a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-ecotourism-2a"').form_input('seams-ecotourism-2a','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-2a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-ecotourism-3a"').form_input('seams-ecotourism-3a','','placeholder=" " id="seams-ecotourism-3a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-ecotourism-4a"').form_input('seams-ecotourism-4a','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-4a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-ecotourism-5a"').form_input('seams-ecotourism-5a','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-5a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-ecotourism-6a"').form_input('seams-ecotourism-6a','','placeholder=" " id="seams-ecotourism-6a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsEcoCostMaterial">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsEcoCostMaterial" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsEcoCostMaterial"></tbody>
                                                            </table>
                                                            <table id="tblseamsEcoCostMaterial_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsEcoCostMaterial_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Equipment</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-ecotourism-1b"').form_input('seams-ecotourism-1b','','placeholder=" " id="seams-ecotourism-1b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-ecotourism-2b"').form_input('seams-ecotourism-2b','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-2b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-ecotourism-3b"').form_input('seams-ecotourism-3b','','placeholder=" " id="seams-ecotourism-3b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-ecotourism-4b"').form_input('seams-ecotourism-4b','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-4b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-ecotourism-5b"').form_input('seams-ecotourism-5b','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-5b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-ecotourism-6b"').form_input('seams-ecotourism-6b','','placeholder=" " id="seams-ecotourism-6b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsEcoCostEquipment">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsEcoCostEquipment" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsEcoCostEquipment"></tbody>
                                                            </table>
                                                            <table id="tblseamsEcoCostEquipment_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsEcoCostEquipment_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Labor</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-ecotourism-1c"').form_input('seams-ecotourism-1c','','placeholder=" " id="seams-ecotourism-1c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-ecotourism-2c"').form_input('seams-ecotourism-2c','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-2c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-ecotourism-3c"').form_input('seams-ecotourism-3c','','placeholder=" " id="seams-ecotourism-3c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-ecotourism-4c"').form_input('seams-ecotourism-4c','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-4c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-ecotourism-5c"').form_input('seams-ecotourism-5c','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-5c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-ecotourism-6c"').form_input('seams-ecotourism-6c','','placeholder=" " id="seams-ecotourism-6c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsEcoCostLabor">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsEcoCostLabor" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsEcoCostLabor"></tbody>
                                                            </table>
                                                            <table id="tblseamsEcoCostLabor_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsEcoCostLabor_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Others</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-ecotourism-1d"').form_input('seams-ecotourism-1d','','placeholder=" " id="seams-ecotourism-1d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-ecotourism-2d"').form_input('seams-ecotourism-2d','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-2d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-ecotourism-3d"').form_input('seams-ecotourism-3d','','placeholder=" " id="seams-ecotourism-3d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-ecotourism-4d"').form_input('seams-ecotourism-4d','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-4d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-ecotourism-5d"').form_input('seams-ecotourism-5d','','placeholder=" " onkeyup="run(this)" id="seams-ecotourism-5d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-ecotourism-6d"').form_input('seams-ecotourism-6d','','placeholder=" " id="seams-ecotourism-6d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsEcoCostOther">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsEcoCostOther" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsEcoCostOther"></tbody>
                                                            </table>
                                                            <table id="tblseamsEcoCostOther_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsEcoCostOther_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </fieldset>
                                    </div>                                    
                                </div> 
                                <div id="FisherySalt" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofFishSalt active" onclick="tabecoprofFishSalt(event, 'revFishSalt')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofFishSalt" onclick="tabecoprofFishSalt(event, 'CostIncurredFishSalt')" id="ecorevenueFishSalt">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="fs_id"').form_dropdown('fs_id',$householdid,'','class="select-css" id="fs_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revFishSalt" class="tabcontntecoproffishSalt">                                    
                                        <fieldset>
                                            <legend>Income source from Fisheries (Salt water)</legend>                                        
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Type of fishing method','','for="fs1"').form_input('fs1','','placeholder=" " id="fs1"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Species','','for="fs2"').form_input('fs2','','placeholder=" " id="fs2"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>   
                                            <div class="col-xs-12 ">                                             
                                                <div class="col-xs-4 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Unit of measure','','for="fs3"').form_input('fs3','','placeholder=" " id="fs3"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume sold per year','','for="fs4"').form_input('fs4','','onkeyup="run(this)" placeholder=" " id="fs4"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume consumed per year','','for="fs5"').form_input('fs5','','onkeyup="run(this)" placeholder=" " id="fs5"')?>
                                                    </li></ul>
                                                </div>   
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Price per unit','','for="fs6"').form_input('fs6','','onkeyup="run(this)" placeholder=" " id="fs6"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Value','','for="fs7"').form_input('fs7','','onkeyup="run(this)" placeholder=" " id="fs7"')?>
                                                    </li></ul>
                                                </div>                      
                                            </div>
                                            <div class="col-xs-12 "> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of gears used per fishing method','','for="fs8"').form_input('fs8','','placeholder=" " id="fs8"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Total number of fishing hours per year','','for="fs9"').form_input('fs9','','onkeyup="run(this)" placeholder=" " id="fs9"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Number of season or period in a year','','for="fs10"').form_input('fs10','','onkeyup="run(this)" placeholder=" " id="fs10"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Season or period of fishing (month)','','for="fs11"').form_dropdown('fs11',$monthList,'','class="select-css" id="fs11"')?><br>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('location or landmarks where fishing activity is conducted','','for="fs12"').form_input('fs12','','placeholder=" " id="fs12"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('No of people & household members involved in the activity','','for="fs13"').form_input('fs13','','onkeyup="run(this)" placeholder=" " id="fs13"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">                                            
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing agents','','for="fs14"').form_input('fs14','','placeholder=" " id="fs14"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing location','','for="fs15"').form_input('fs15','','placeholder=" " id="fs15"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of payment','','for="fs16"').form_input('fs16','','placeholder=" " id="fs16"')?>
                                                    </li></ul>
                                                </div>  
                                            </div>
                                            <div class="col-xs-12 ">   
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="fs17"').form_textarea('fs17','','placeholder=" " id="fs17"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsfishsalt">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsfishsalt" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Fisheries (Salt Water) Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsfishsalt"></tbody>
                                                    </table>
                                                    <table id="tblseamsfishsalt_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsfishsalt_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div id="CostIncurredFishSalt" class="tabcontntecoproffishSalt" style="display: none">     
                                        <fieldset>
                                            <legend>Costs incurred from fishery-based income source </legend>
                                            <div class="col-xs-12">
                                                <fieldset>
                                                    <legend>Materials</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-fishsalt-1a"').form_input('seams-fishsalt-1','','placeholder=" " id="seams-fishsalt-1a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-fishsalt-2a"').form_input('seams-fishsalt-2a','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-2a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-fishsalt-3a"').form_input('seams-fishsalt-3a','','placeholder=" " id="seams-fishsalt-3a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-fishsalt-4a"').form_input('seams-fishsalt-4a','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-4a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-fishsalt-5a"').form_input('seams-fishsalt-5a','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-5a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-fishsalt-6a"').form_input('seams-fishsalt-6a','','placeholder=" " id="seams-fishsalt-6a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsMaterial-2">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsMaterial-2" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsMaterial-2"></tbody>
                                                            </table>
                                                            <table id="tblseamsMaterial-2_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsMaterial-2_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Equipment</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-fishsalt-1b"').form_input('seams-fishsalt-1b','','placeholder=" " id="seams-fishsalt-1b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-fishsalt-2b"').form_input('seams-fishsalt-2b','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-2b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-fishsalt-3b"').form_input('seams-fishsalt-3b','','placeholder=" " id="seams-fishsalt-3b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-fishsalt-4b"').form_input('seams-fishsalt-4b','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-4b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-fishsalt-5b"').form_input('seams-fishsalt-5b','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-5b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-fishsalt-6b"').form_input('seams-fishsalt-6b','','placeholder=" " id="seams-fishsalt-6b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsEquipment-2">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsEquipment-2" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsEquipment-2"></tbody>
                                                            </table>
                                                            <table id="tblseamsEquipment-2_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsEquipment-2_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Labor</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-fishsalt-1c"').form_input('seams-fishsalt-1c','','placeholder=" " id="seams-fishsalt-1c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-fishsalt-2c"').form_input('seams-fishsalt-2c','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-2c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-fishsalt-3c"').form_input('seams-fishsalt-3c','','placeholder=" " id="seams-fishsalt-3c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-fishsalt-4c"').form_input('seams-fishsalt-4c','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-4c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-fishsalt-5c"').form_input('seams-fishsalt-5c','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-5c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-fishsalt-6c"').form_input('seams-fishsalt-6c','','placeholder=" " id="seams-fishsalt-6c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsLabor-2">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsLabor-2" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsLabor-2"></tbody>
                                                            </table>
                                                            <table id="tblseamsLabor-2_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsLabor-2_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Others</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-fishsalt-1d"').form_input('seams-fishsalt-1d','','placeholder=" " id="seams-fishsalt-1d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-fishsalt-2d"').form_input('seams-fishsalt-2d','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-2d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-fishsalt-3d"').form_input('seams-fishsalt-3d','','placeholder=" " id="seams-fishsalt-3d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-fishsalt-4d"').form_input('seams-fishsalt-4d','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-4d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-fishsalt-5d"').form_input('seams-fishsalt-5d','','placeholder=" " onkeyup="run(this)" id="seams-fishsalt-5d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-fishsalt-6d"').form_input('seams-fishsalt-6d','','placeholder=" " id="seams-fishsalt-6d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsOther-2">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsOther-2" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsOther-2"></tbody>
                                                            </table>
                                                            <table id="tblseamsOther-2_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsOther-2_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </fieldset>                            
                                    </div>
                                </div>  
                                <div id="FisheryFresh" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofFishfresh active" onclick="tabecoprofFishfresh(event, 'revFishfresh')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofFishfresh" onclick="tabecoprofFishfresh(event, 'CostIncurredFishfresh')" id="ecorevenueFishFresh">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="ffs_id"').form_dropdown('ffs_id',$householdid,'','class="select-css" id="ffs_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revFishfresh" class="tabcontntecoproffishfresh">
                                        <fieldset>
                                            <legend>Income source from Fisheries (Fresh water)</legend>
                                            
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Type of fishing method','','for="ffs1"').form_input('ffs1','','placeholder=" " id="ffs1"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Species','','for="ffs2"').form_input('ffs2','','placeholder=" " id="ffs2"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>   
                                            <div class="col-xs-12 ">                                             
                                                <div class="col-xs-4 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Unit of measure','','for="ffs3"').form_input('ffs3','','placeholder=" " id="ffs3"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume sold per year','','for="ffs4"').form_input('ffs4','','onkeyup="run(this)" placeholder=" " id="ffs4"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume consumed per year','','for="ffs5"').form_input('ffs5','','onkeyup="run(this)" placeholder=" " id="ffs5"')?>
                                                    </li></ul>
                                                </div>   
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Price per unit','','for="ffs6"').form_input('ffs6','','onkeyup="run(this)" placeholder=" " id="ffs6"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Value','','for="ffs7"').form_input('ffs7','','onkeyup="run(this)" placeholder=" " id="ffs7"')?>
                                                    </li></ul>
                                                </div>                      
                                            </div>
                                            <div class="col-xs-12 "> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of gears used per fishing method','','for="ffs8"').form_input('ffs8','','placeholder=" " id="ffs8"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Total number of fishing hours per year','','for="ffs9"').form_input('ffs9','','onkeyup="run(this)" placeholder=" " id="ffs9"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Number of season or period in a year','','for="ffs10"').form_input('ffs10','','onkeyup="run(this)" placeholder=" " id="ffs10"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Season or period of fishing (month)','','for="ffs11"').form_dropdown('ffs11',$monthList,'','class="select-css" id="ffs11"')?><br>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('location or landmarks where fishing activity is conducted','','for="ffs12"').form_input('ffs12','','placeholder=" " id="ffs12"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('No of people & household members involved in the activity','','for="ffs13"').form_input('ffs13','','onkeyup="run(this)" placeholder=" " id="ffs13"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">                                            
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing agents','','for="ffs14"').form_input('ffs14','','placeholder=" " id="ffs14"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing location','','for="ffs15"').form_input('ffs15','','placeholder=" " id="ffs15"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of payment','','for="ffs16"').form_input('ffs16','','placeholder=" " id="ffs16"')?>
                                                    </li></ul>
                                                </div>  
                                            </div>
                                            <div class="col-xs-12 ">   
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="ffs17"').form_textarea('ffs17','','placeholder=" " id="ffs17"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsfishfresh">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsfishfresh" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Fisheries (Fresh Water) Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsfishfresh"></tbody>
                                                    </table>
                                                    <table id="tblseamsfishfresh_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsfishfresh_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div id="CostIncurredFishfresh" class="tabcontntecoproffishfresh" style="display: none">
                                        <fieldset>
                                            <legend>Costs incurred from fishery-based income source </legend>
                                            <div class="col-xs-12">
                                                <fieldset>
                                                    <legend>Materials</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-fishfresh-1a"').form_input('seams-fishfresh-1','','placeholder=" " id="seams-fishfresh-1a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-fishfresh-2a"').form_input('seams-fishfresh-2a','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-2a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-fishfresh-3a"').form_input('seams-fishfresh-3a','','placeholder=" " id="seams-fishfresh-3a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-fishfresh-4a"').form_input('seams-fishfresh-4a','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-4a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-fishfresh-5a"').form_input('seams-fishfresh-5a','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-5a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-fishfresh-6a"').form_input('seams-fishfresh-6a','','placeholder=" " id="seams-fishfresh-6a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsMaterial-3">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsMaterial-3" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsMaterial-3"></tbody>
                                                            </table>
                                                            <table id="tblseamsMaterial-3_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsMaterial-3_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Equipment</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-fishfresh-1b"').form_input('seams-fishfresh-1b','','placeholder=" " id="seams-fishfresh-1b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-fishfresh-2b"').form_input('seams-fishfresh-2b','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-2b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-fishfresh-3b"').form_input('seams-fishfresh-3b','','placeholder=" " id="seams-fishfresh-3b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-fishfresh-4b"').form_input('seams-fishfresh-4b','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-4b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-fishfresh-5b"').form_input('seams-fishfresh-5b','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-5b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-fishfresh-6b"').form_input('seams-fishfresh-6b','','placeholder=" " id="seams-fishfresh-6b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsEquipment-3">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsEquipment-3" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsEquipment-3"></tbody>
                                                            </table>
                                                            <table id="tblseamsEquipment-3_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsEquipment-3_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Labor</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-fishfresh-1c"').form_input('seams-fishfresh-1c','','placeholder=" " id="seams-fishfresh-1c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-fishfresh-2c"').form_input('seams-fishfresh-2c','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-2c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-fishfresh-3c"').form_input('seams-fishfresh-3c','','placeholder=" " id="seams-fishfresh-3c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-fishfresh-4c"').form_input('seams-fishfresh-4c','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-4c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-fishfresh-5c"').form_input('seams-fishfresh-5c','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-5c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-fishfresh-6c"').form_input('seams-fishfresh-6c','','placeholder=" " id="seams-fishfresh-6c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsLabor-3">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsLabor-3" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsLabor-3"></tbody>
                                                            </table>
                                                            <table id="tblseamsLabor-3_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsLabor-3_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Others</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-fishfresh-1d"').form_input('seams-fishfresh-1d','','placeholder=" " id="seams-fishfresh-1d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-fishfresh-2d"').form_input('seams-fishfresh-2d','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-2d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-fishfresh-3d"').form_input('seams-fishfresh-3d','','placeholder=" " id="seams-fishfresh-3d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-fishfresh-4d"').form_input('seams-fishfresh-4d','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-4d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-fishfresh-5d"').form_input('seams-fishfresh-5d','','placeholder=" " onkeyup="run(this)" id="seams-fishfresh-5d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-fishfresh-6d"').form_input('seams-fishfresh-6d','','placeholder=" " id="seams-fishfresh-6d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsOther-3">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsOther-3" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsOther-3"></tbody>
                                                            </table>
                                                            <table id="tblseamsOther-3_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsOther-3_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </fieldset> 
                                    </div>
                                </div> 
                                <div id="TPM" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoproftpm active" onclick="tabecoproftpm(event, 'revtpm')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoproftpm" onclick="tabecoproftpm(event, 'CostIncurredtpm')" id="CostIncurred-tpm">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="tpm_id"').form_dropdown('tpm_id',$householdid,'','class="select-css" id="tpm_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revtpm" class="tabcontntecoproftpm">                                    
                                        <fieldset>
                                            <legend> Income source from Trading, Processing, and Manufacturing</legend>                                        
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Type of trading activity','','for="tpm1"').form_input('tpm1','','placeholder=" " id="tpm1"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Species','','for="tpm2"').form_input('tpm2','','placeholder=" " id="tpm2"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>   
                                            <div class="col-xs-12 ">                                             
                                                <div class="col-xs-4 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Unit of measure','','for="tpm3"').form_input('tpm3','','placeholder=" " id="tpm3"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume sold per year','','for="tpm4"').form_input('tpm4','','onkeyup="run(this)" placeholder=" " id="tpm4"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume consumed per year','','for="tpm5"').form_input('tpm5','','onkeyup="run(this)" placeholder=" " id="tpm5"')?>
                                                    </li></ul>
                                                </div>   
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Price per unit','','for="tpm6"').form_input('tpm6','','onkeyup="run(this)" placeholder=" " id="tpm6"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Value','','for="tpm7"').form_input('tpm7','','onkeyup="run(this)" placeholder=" " id="tpm7"')?>
                                                    </li></ul>
                                                </div>                      
                                            </div>                                        
                                            <div class="col-xs-12 ">
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Specific site/ location/landmarks where trading activity is conducted','','for="tpm8"').form_input('tpm8','','placeholder=" " id="tpm8"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Season/ period of trading (month)','','for="tpm9"').form_dropdown('tpm9',$monthList,'','class="select-css" id="tpm9"')?><br>
                                                    </li></ul>
                                                </div>                                             
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('No of people & household members involved in the activity','','for="tpm10"').form_input('tpm10','','onkeyup="run(this)" placeholder=" " id="tpm10"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">                                            
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing agents','','for="tpm11"').form_input('tpm11','','placeholder=" " id="tpm11"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing location','','for="tpm12"').form_input('tpm12','','placeholder=" " id="tpm12"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of payment','','for="tpm13"').form_input('tpm13','','placeholder=" " id="tpm13"')?>
                                                    </li></ul>
                                                </div>  
                                            </div>
                                            <div class="col-xs-12 ">   
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="tpm14"').form_textarea('tpm14','','placeholder=" " id="tpm14"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamstpm">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamstpm" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Trading, Processing, and Manufacturing Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamstpm"></tbody>
                                                    </table>
                                                    <table id="tblseamstpm_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamstpm_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div id="CostIncurredtpm" class="tabcontntecoproftpm" style="display: none">                                    
                                        <fieldset>
                                            <legend>Costs incurred from Trading, Processing, and Manufacturing </legend>
                                            <div class="col-xs-12">
                                                <fieldset>
                                                    <legend>Materials</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-tpm-1a"').form_input('seams-tpm-1','','placeholder=" " id="seams-tpm-1a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-tpm-2a"').form_input('seams-tpm-2a','','placeholder=" " onkeyup="run(this)" id="seams-tpm-2a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-tpm-3a"').form_input('seams-tpm-3a','','placeholder=" " id="seams-tpm-3a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-tpm-4a"').form_input('seams-tpm-4a','','placeholder=" " onkeyup="run(this)" id="seams-tpm-4a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-tpm-5a"').form_input('seams-tpm-5a','','placeholder=" " onkeyup="run(this)" id="seams-tpm-5a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-tpm-6a"').form_input('seams-tpm-6a','','placeholder=" " id="seams-tpm-6a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsMaterial-4">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsMaterial-4" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsMaterial-4"></tbody>
                                                            </table>
                                                            <table id="tblseamsMaterial-4_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsMaterial-4_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Equipment</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-tpm-1b"').form_input('seams-tpm-1b','','placeholder=" " id="seams-tpm-1b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-tpm-2b"').form_input('seams-tpm-2b','','placeholder=" " onkeyup="run(this)" id="seams-tpm-2b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-tpm-3b"').form_input('seams-tpm-3b','','placeholder=" " id="seams-tpm-3b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-tpm-4b"').form_input('seams-tpm-4b','','placeholder=" " onkeyup="run(this)" id="seams-tpm-4b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-tpm-5b"').form_input('seams-tpm-5b','','placeholder=" " onkeyup="run(this)" id="seams-tpm-5b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-tpm-6b"').form_input('seams-tpm-6b','','placeholder=" " id="seams-tpm-6b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsEquipment-4">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsEquipment-4" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsEquipment-4"></tbody>
                                                            </table>
                                                            <table id="tblseamsEquipment-4_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsEquipment-4_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Labor</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-tpm-1c"').form_input('seams-tpm-1c','','placeholder=" " id="seams-tpm-1c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-tpm-2c"').form_input('seams-tpm-2c','','placeholder=" " onkeyup="run(this)" id="seams-tpm-2c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-tpm-3c"').form_input('seams-tpm-3c','','placeholder=" " id="seams-tpm-3c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-tpm-4c"').form_input('seams-tpm-4c','','placeholder=" " onkeyup="run(this)" id="seams-tpm-4c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-tpm-5c"').form_input('seams-tpm-5c','','placeholder=" " onkeyup="run(this)" id="seams-tpm-5c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-tpm-6c"').form_input('seams-tpm-6c','','placeholder=" " id="seams-tpm-6c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsLabor-4">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsLabor-4" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsLabor-4"></tbody>
                                                            </table>
                                                            <table id="tblseamsLabor-4_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsLabor-4_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Others</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-tpm-1d"').form_input('seams-tpm-1d','','placeholder=" " id="seams-tpm-1d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-tpm-2d"').form_input('seams-tpm-2d','','placeholder=" " onkeyup="run(this)" id="seams-tpm-2d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-tpm-3d"').form_input('seams-tpm-3d','','placeholder=" " id="seams-tpm-3d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-tpm-4d"').form_input('seams-tpm-4d','','placeholder=" " onkeyup="run(this)" id="seams-tpm-4d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-tpm-5d"').form_input('seams-tpm-5d','','placeholder=" " onkeyup="run(this)" id="seams-tpm-5d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-tpm-6d"').form_input('seams-tpm-6d','','placeholder=" " id="seams-tpm-6d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsOther-4">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsOther-4" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsOther-4"></tbody>
                                                            </table>
                                                            <table id="tblseamsOther-4_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsOther-4_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </fieldset> 
                                    </div>
                                </div>    
                                <div id="Agri" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofagri active" onclick="tabecoprofagri(event, 'revagri')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofagri" onclick="tabecoprofagri(event, 'CostIncurredagri')" id="CostIncurred-agri">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="agri_id"').form_dropdown('agri_id',$householdid,'','class="select-css" id="agri_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revagri" class="tabcontntecoprofagri">   
                                        <fieldset>
                                            <legend> Revenue from Agriculture</legend>
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of agricultural activity','','for="agri1"').form_input('agri1','','placeholder=" " id="agri1"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Species','','for="agri2"').form_input('agri2','','placeholder=" " id="agri2"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Area','','for="agri3"').form_input('agri3','','onkeyup="run(this)" placeholder=" " id="agri3"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>   
                                            <div class="col-xs-12 ">                                             
                                                <div class="col-xs-4 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Unit of measure','','for="agri4"').form_input('agri4','','placeholder=" " id="agri4"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume sold per year','','for="agri5"').form_input('agri5','','onkeyup="run(this)" placeholder=" " id="agri5"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume consumed per year','','for="agri6"').form_input('agri6','','onkeyup="run(this)" placeholder=" " id="agri6"')?>
                                                    </li></ul>
                                                </div>   
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Price per unit','','for="agri7"').form_input('agri7','','onkeyup="run(this)" placeholder=" " id="agri7"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Value','','for="agri8"').form_input('agri8','','onkeyup="run(this)" placeholder=" " id="agri8"')?>
                                                    </li></ul>
                                                </div>                      
                                            </div> 
                                            <div class="col-xs-12">
                                                <ul><li>
                                                <?= form_label('Describe/ enumerate specific activities conducted in the production process','','for="agri9"').form_textarea('agri9','','placeholder=" " id="agri9"')?>    
                                                </li></ul>                                        
                                            </div>                                       
                                            <div class="col-xs-12 ">
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Specific site/ location/landmarks','','for="agri10"').form_input('agri10','','placeholder=" " id="agri10"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Season of production (month)','','for="agri11"').form_dropdown('agri11',$monthList,'','class="select-css" id="agri11"')?><br>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Number of production period per year','','for="agri12"').form_input('agri12','','onkeyup="run(this)" placeholder=" " id="agri12"')?>
                                                    </li></ul>
                                                </div>                                             
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('No of people & household members involved in the activity','','for="agri13"').form_input('agri13','','onkeyup="run(this)" placeholder=" " id="agri13"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">                                            
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing agents','','for="agri14"').form_input('agri14','','placeholder=" " id="agri14"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing location','','for="agri15"').form_input('agri15','','placeholder=" " id="agri15"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of payment','','for="agri16"').form_input('agri16','','placeholder=" " id="agri16"')?>
                                                    </li></ul>
                                                </div>  
                                            </div>
                                            <div class="col-xs-12 ">   
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="agri17"').form_textarea('agri17','','placeholder=" " id="agri17"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsagri">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsagri" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from Agriculture Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsagri"></tbody>
                                                    </table>
                                                    <table id="tblseamsagri_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsagri_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div id="CostIncurredagri" class="tabcontntecoprofagri" style="display: none">   
                                        <fieldset>
                                            <legend>Costs incurred from agriculture-based income source </legend>
                                            <div class="col-xs-12">
                                                <fieldset>
                                                    <legend>Materials</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-agri-1a"').form_input('seams-agri-1','','placeholder=" " id="seams-agri-1a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-agri-2a"').form_input('seams-agri-2a','','placeholder=" " onkeyup="run(this)" id="seams-agri-2a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-agri-3a"').form_input('seams-agri-3a','','placeholder=" " id="seams-agri-3a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-agri-4a"').form_input('seams-agri-4a','','placeholder=" " onkeyup="run(this)" id="seams-agri-4a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-agri-5a"').form_input('seams-agri-5a','','placeholder=" " onkeyup="run(this)" id="seams-agri-5a"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-agri-6a"').form_input('seams-agri-6a','','placeholder=" " id="seams-agri-6a"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsMaterial-5">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsMaterial-5" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsMaterial-5"></tbody>
                                                            </table>
                                                            <table id="tblseamsMaterial-5_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsMaterial-5_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Equipment</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-agri-1b"').form_input('seams-agri-1b','','placeholder=" " id="seams-agri-1b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-agri-2b"').form_input('seams-agri-2b','','placeholder=" " onkeyup="run(this)" id="seams-agri-2b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-agri-3b"').form_input('seams-agri-3b','','placeholder=" " id="seams-agri-3b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-agri-4b"').form_input('seams-agri-4b','','placeholder=" " onkeyup="run(this)" id="seams-agri-4b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-agri-5b"').form_input('seams-agri-5b','','placeholder=" " onkeyup="run(this)" id="seams-agri-5b"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-agri-6b"').form_input('seams-agri-6b','','placeholder=" " id="seams-agri-6b"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsEquipment-5">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsEquipment-5" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsEquipment-5"></tbody>
                                                            </table>
                                                            <table id="tblseamsEquipment-5_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsEquipment-5_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Labor</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-agri-1c"').form_input('seams-agri-1c','','placeholder=" " id="seams-agri-1c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-agri-2c"').form_input('seams-agri-2c','','placeholder=" " onkeyup="run(this)" id="seams-agri-2c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-agri-3c"').form_input('seams-agri-3c','','placeholder=" " id="seams-agri-3c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-agri-4c"').form_input('seams-agri-4c','','placeholder=" " onkeyup="run(this)" id="seams-agri-4c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-agri-5c"').form_input('seams-agri-5c','','placeholder=" " onkeyup="run(this)" id="seams-agri-5c"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-agri-6c"').form_input('seams-agri-6c','','placeholder=" " id="seams-agri-6c"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsLabor-5">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsLabor-5" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsLabor-5"></tbody>
                                                            </table>
                                                            <table id="tblseamsLabor-5_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsLabor-5_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Others</legend>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Items','','for="seams-agri-1d"').form_input('seams-agri-1d','','placeholder=" " id="seams-agri-1d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Total Annual Cost','','for="seams-agri-2d"').form_input('seams-agri-2d','','placeholder=" " onkeyup="run(this)" id="seams-agri-2d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Unit','','for="seams-agri-3d"').form_input('seams-agri-3d','','placeholder=" " id="seams-agri-3d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Average price per unit','','for="seams-agri-4d"').form_input('seams-agri-4d','','placeholder=" " onkeyup="run(this)" id="seams-agri-4d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('No. of times cost is incurred in a year','','for="seams-agri-5d"').form_input('seams-agri-5d','','placeholder=" " onkeyup="run(this)" id="seams-agri-5d"')?>
                                                                </li></ul>
                                                            </div>
                                                            <div class="col-xs-4 col-lg-4">
                                                                <ul><li>
                                                                <?= form_label('Cost incurred during what stage?','','for="seams-agri-6d"').form_input('seams-agri-6d','','placeholder=" " id="seams-agri-6d"')?>
                                                                </li></ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-12">
                                                        <div class="col-xs-12 ">
                                                            <a type="text" class="btn btn-primary" id="addseamsOther-5">Add data</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 ">
                                                        <div class="table-responsive">
                                                            <table id="tblseamsOther-5" class="table table-bordered tglobal">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Household Member Name</th> 
                                                                        <th>Items</th>
                                                                        <th>Total Annual Cost</th>
                                                                        <th>Unit</th>
                                                                        <th>Avg. price per unit</th>
                                                                        <th>No. of times cost</th>
                                                                        <th>Cost incurred during what stage?</th>
                                                                        <th>Option</th>
                                                                    </tr>                                                   
                                                                </thead>
                                                                <tbody id="tbodyseamsOther-5"></tbody>
                                                            </table>
                                                            <table id="tblseamsOther-5_sample" class="table table-bordered tglobal">
                                                                <tbody id="tbodyseamsOther-5_sample"></tbody>
                                                            </table>                                            
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                    </div>
                                </div>     
                                <div id="livestockpoultry" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoproflivestock active" onclick="tabecoproflivestock(event, 'revlivestock')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoproflivestock" onclick="tabecoproflivestock(event, 'CostIncurredlivestock')" id="CostIncurred-livestock">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="ls_id"').form_dropdown('ls_id',$householdid,'','class="select-css" id="ls_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revlivestock" class="tabcontntecoproflivestock"> 
                                        <fieldset>
                                            <legend> Revenue from livestock and poultry</legend>
                                            
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type or kind of livestock (species)','','for="ls-1"').form_input('ls-1','','placeholder=" " id="ls-1"')?>                                                    
                                                    </li></ul>
                                                </div>
                                                 <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Grazing area (has)','','for="ls-2"').form_input('ls-2','','onkeyup="run(this)" placeholder=" " id="ls-2"')?>
                                                    </li></ul>
                                                </div>  
                                                 <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Unit of measure','','for="ls-3"').form_input('ls-3','','placeholder=" " id="ls-3"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12"> 
                                                <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume sold per year','','for="ls-4"').form_input('ls-4','','onkeyup="run(this)" placeholder=" " id="ls-4"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume consumed per year','','for="ls-5"').form_input('ls-5','','onkeyup="run(this)" placeholder=" " id="ls-5"')?>
                                                    </li></ul>
                                                </div> 
                                                 <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Price per unit','','for="ls-6"').form_input('ls-6','','onkeyup="run(this)" placeholder=" " id="ls-6"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-3 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Value','','for="ls-7"').form_input('ls-7','','onkeyup="run(this)" placeholder=" " id="ls-7"')?>
                                                    </li></ul>
                                                </div>                                   
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                    <?= form_label('Specific site/ location /landmarks of grazing areas','','for="ls-8"').form_input('ls-8','','placeholder=" " id="ls-8"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12">
                                                <ul><li>
                                                <?= form_label('Specific activities conducted in the livelihood','','for="ls-9"').form_textarea('ls-9','','placeholder=" " id="ls-9"')?>    
                                                </li></ul>                                        
                                            </div> 
                                            <div class="col-xs-12">
                                                 <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Season/period of livelihood (month)','','for="ls-10"').form_dropdown('ls-10',$monthList,'','class="select-css" id="ls-10"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('No of people & household members involved in the activity','','for="ls-11"').form_input('ls-11','','onkeyup="run(this)" placeholder=" " id="ls-11"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">                                            
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing agents','','for="ls-12"').form_input('ls-12','','placeholder=" " id="ls-12"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing location','','for="ls-13"').form_input('ls-13','','placeholder=" " id="ls-13"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of payment','','for="ls-14"').form_input('ls-14','','placeholder=" " id="ls-14"')?>
                                                    </li></ul>
                                                </div>  
                                            </div>
                                            <div class="col-xs-12 ">   
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="ls-15"').form_textarea('ls-15','','placeholder=" " id="ls-15"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsgrazing">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsls" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from Livestock and Poultry Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsls"></tbody>
                                                    </table>
                                                    <table id="tblseamsls_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsls_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div id="CostIncurredlivestock" class="tabcontntecoproflivestock" style="display: none"> 
                                        <fieldset>
                                            <legend>Materials</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Items','','for="seams-livestock-1a"').form_input('seams-livestock-1','','placeholder=" " id="seams-livestock-1a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Total Annual Cost','','for="seams-livestock-2a"').form_input('seams-livestock-2a','','placeholder=" " onkeyup="run(this)" id="seams-livestock-2a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Unit','','for="seams-livestock-3a"').form_input('seams-livestock-3a','','placeholder=" " id="seams-livestock-3a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Average price per unit','','for="seams-livestock-4a"').form_input('seams-livestock-4a','','placeholder=" " onkeyup="run(this)" id="seams-livestock-4a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('No. of times cost is incurred in a year','','for="seams-livestock-5a"').form_input('seams-livestock-5a','','placeholder=" " onkeyup="run(this)" id="seams-livestock-5a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Cost incurred during what stage?','','for="seams-livestock-6a"').form_input('seams-livestock-6a','','placeholder=" " id="seams-livestock-6a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsMaterial-6">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsMaterial-6" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsMaterial-6"></tbody>
                                                    </table>
                                                    <table id="tblseamsMaterial-6_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsMaterial-6_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Equipment</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-livestock-1b"').form_input('seams-livestock-1b','','placeholder=" " id="seams-livestock-1b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-livestock-2b"').form_input('seams-livestock-2b','','placeholder=" " onkeyup="run(this)" id="seams-livestock-2b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-livestock-3b"').form_input('seams-livestock-3b','','placeholder=" " id="seams-livestock-3b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-livestock-4b"').form_input('seams-livestock-4b','','placeholder=" " onkeyup="run(this)" id="seams-livestock-4b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-livestock-5b"').form_input('seams-livestock-5b','','placeholder=" " onkeyup="run(this)" id="seams-livestock-5b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-livestock-6b"').form_input('seams-livestock-6b','','placeholder=" " id="seams-livestock-6b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsEquipment-6">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsEquipment-6" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsEquipment-6"></tbody>
                                                        </table>
                                                        <table id="tblseamsEquipment-6_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsEquipment-6_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Labor</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-livestock-1c"').form_input('seams-livestock-1c','','placeholder=" " id="seams-livestock-1c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-livestock-2c"').form_input('seams-livestock-2c','','placeholder=" " onkeyup="run(this)" id="seams-livestock-2c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-livestock-3c"').form_input('seams-livestock-3c','','placeholder=" " id="seams-livestock-3c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-livestock-4c"').form_input('seams-livestock-4c','','placeholder=" " onkeyup="run(this)" id="seams-livestock-4c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-livestock-5c"').form_input('seams-livestock-5c','','placeholder=" " onkeyup="run(this)" id="seams-livestock-5c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-livestock-6c"').form_input('seams-livestock-6c','','placeholder=" " id="seams-livestock-6c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsLabor-6">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsLabor-6" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsLabor-6"></tbody>
                                                        </table>
                                                        <table id="tblseamsLabor-6_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsLabor-6_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Others</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-livestock-1d"').form_input('seams-livestock-1d','','placeholder=" " id="seams-livestock-1d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-livestock-2d"').form_input('seams-livestock-2d','','placeholder=" " onkeyup="run(this)" id="seams-livestock-2d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-livestock-3d"').form_input('seams-livestock-3d','','placeholder=" " id="seams-livestock-3d"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-livestock-4d"').form_input('seams-livestock-4d','','placeholder=" " onkeyup="run(this)" id="seams-livestock-4d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-livestock-5d"').form_input('seams-livestock-5d','','placeholder=" " onkeyup="run(this)" id="seams-livestock-5d"')?>
                                                        </li></ul>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <ul><li>
                                                        <?= form_label('Cost incurred during what stage?','','for="seams-livestock-6d"').form_input('seams-livestock-6d','','placeholder=" " id="seams-livestock-6d"')?>
                                                        </li></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsOther-6">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsOther-6" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsOther-6"></tbody>
                                                    </table>
                                                    <table id="tblseamsOther-6_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsOther-6_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>  
                                <div id="forestrynontimber" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofnontimber active" onclick="tabecoprofnontimber(event, 'revnontimber')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofnontimber" onclick="tabecoprofnontimber(event, 'CostIncurrednontimber')" id="CostIncurred-nontimber">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="nntim_id"').form_dropdown('nntim_id',$householdid,'','class="select-css" id="nntim_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revnontimber" class="tabcontntecoprofnontimber">                                     
                                        <fieldset>
                                            <legend>Revenue from Forestry (Non-timber product)</legend>                                        
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of non-timber products','','for="nntim-1"').form_input('nntim-1','','placeholder=" " id="nntim-1"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Species','','for="nntim-2"').form_input('nntim-2','','placeholder=" " id="nntim-2"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Area (has)','','for="nntim-3"').form_input('nntim-3','','onkeyup="run(this)" placeholder=" " id="nntim-3"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>   
                                            <div class="col-xs-12 ">                                             
                                                <div class="col-xs-4 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Unit of measure','','for="nntim-4"').form_input('nntim-4','','placeholder=" " id="nntim-4"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume sold per year','','for="nntim-5"').form_input('nntim-5','','onkeyup="run(this)" placeholder=" " id="nntim-5"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume consumed per year','','for="nntim-6"').form_input('nntim-6','','onkeyup="run(this)" placeholder=" " id="nntim-6"')?>
                                                    </li></ul>
                                                </div>   
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Price per unit','','for="nntim-7"').form_input('nntim-7','','onkeyup="run(this)" placeholder=" " id="nntim-7"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Value','','for="nntim-8"').form_input('nntim-8','','onkeyup="run(this)" placeholder=" " id="nntim-8"')?>
                                                    </li></ul>
                                                </div>                      
                                            </div> 
                                            <div class="col-xs-12">
                                                <ul><li>
                                                <?= form_label('Gathering/harvesting/collection/planting/production method/ activity','','for="nntim-10"').form_textarea('nntim-10','','placeholder=" " id="nntim-10"')?>    
                                                </li></ul>                                        
                                            </div>                                       
                                            <div class="col-xs-12 ">
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Specific site/ location/landmarks','','for="nntim-9"').form_input('nntim-9','','placeholder=" " id="nntim-9"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Season/ period of gathering/harvesting/collection/ planting (month)','','for="nntim-11"').form_dropdown('nntim-11',$monthList,'','class="select-css" id="nntim-11"')?><br>
                                                    </li></ul>
                                                </div>                                                                                       
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('No of people & household members involved in the activity','','for="nntim-12"').form_input('nntim-12','','onkeyup="run(this)" placeholder=" " id="nntim-12"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">                                            
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing agents','','for="nntim-13"').form_input('nntim-13','','placeholder=" " id="nntim-13"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing location','','for="nntim-14"').form_input('nntim-14','','placeholder=" " id="nntim-14"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of payment','','for="nntim-15"').form_input('nntim-15','','placeholder=" " id="nntim-15"')?>
                                                    </li></ul>
                                                </div>  
                                            </div>
                                            <div class="col-xs-12 ">   
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="nntim-16"').form_textarea('nntim-16','','placeholder=" " id="nntim-16"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsnntim">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsnntim" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from Forestry (Non-timber forest product) Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsnntim"></tbody>
                                                    </table>
                                                    <table id="tblseamsnntim_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsnntim_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div id="CostIncurrednontimber" class="tabcontntecoprofnontimber" style="display: none;">  
                                        <fieldset>
                                            <legend>Materials</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Items','','for="seams-nontimber-1a"').form_input('seams-nontimber-1','','placeholder=" " id="seams-nontimber-1a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Total Annual Cost','','for="seams-nontimber-2a"').form_input('seams-nontimber-2a','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-2a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Unit','','for="seams-nontimber-3a"').form_input('seams-nontimber-3a','','placeholder=" " id="seams-nontimber-3a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Average price per unit','','for="seams-nontimber-4a"').form_input('seams-nontimber-4a','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-4a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('No. of times cost is incurred in a year','','for="seams-nontimber-5a"').form_input('seams-nontimber-5a','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-5a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Cost incurred during what stage?','','for="seams-nontimber-6a"').form_input('seams-nontimber-6a','','placeholder=" " id="seams-nontimber-6a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsMaterial-7">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsMaterial-7" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsMaterial-7"></tbody>
                                                    </table>
                                                    <table id="tblseamsMaterial-7_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsMaterial-7_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Equipment</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-nontimber-1b"').form_input('seams-nontimber-1b','','placeholder=" " id="seams-nontimber-1b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-nontimber-2b"').form_input('seams-nontimber-2b','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-2b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-nontimber-3b"').form_input('seams-nontimber-3b','','placeholder=" " id="seams-nontimber-3b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-nontimber-4b"').form_input('seams-nontimber-4b','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-4b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-nontimber-5b"').form_input('seams-nontimber-5b','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-5b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-nontimber-6b"').form_input('seams-nontimber-6b','','placeholder=" " id="seams-nontimber-6b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsEquipment-7">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsEquipment-7" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsEquipment-7"></tbody>
                                                        </table>
                                                        <table id="tblseamsEquipment-7_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsEquipment-7_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Labor</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-nontimber-1c"').form_input('seams-nontimber-1c','','placeholder=" " id="seams-nontimber-1c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-nontimber-2c"').form_input('seams-nontimber-2c','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-2c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-nontimber-3c"').form_input('seams-nontimber-3c','','placeholder=" " id="seams-nontimber-3c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-nontimber-4c"').form_input('seams-nontimber-4c','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-4c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-nontimber-5c"').form_input('seams-nontimber-5c','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-5c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-nontimber-6c"').form_input('seams-nontimber-6c','','placeholder=" " id="seams-nontimber-6c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsLabor-7">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsLabor-7" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsLabor-7"></tbody>
                                                        </table>
                                                        <table id="tblseamsLabor-7_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsLabor-7_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Others</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-nontimber-1d"').form_input('seams-nontimber-1d','','placeholder=" " id="seams-nontimber-1d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-nontimber-2d"').form_input('seams-nontimber-2d','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-2d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-nontimber-3d"').form_input('seams-nontimber-3d','','placeholder=" " id="seams-nontimber-3d"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-nontimber-4d"').form_input('seams-nontimber-4d','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-4d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-nontimber-5d"').form_input('seams-nontimber-5d','','placeholder=" " onkeyup="run(this)" id="seams-nontimber-5d"')?>
                                                        </li></ul>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <ul><li>
                                                        <?= form_label('Cost incurred during what stage?','','for="seams-nontimber-6d"').form_input('seams-nontimber-6d','','placeholder=" " id="seams-nontimber-6d"')?>
                                                        </li></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsOther-7">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsOther-7" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsOther-7"></tbody>
                                                    </table>
                                                    <table id="tblseamsOther-7_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsOther-7_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>                                   
                                </div>  
                                <div id="forestrytimber" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoproftimber active" onclick="tabecoproftimber(event, 'revtimber')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoproftimber" onclick="tabecoproftimber(event, 'CostIncurredtimber')" id="CostIncurred-timber">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="tim_id"').form_dropdown('tim_id',$householdid,'','class="select-css" id="tim_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revtimber" class="tabcontntecoproftimber"> 
                                        <fieldset>
                                            <legend>Revenue from Forestry (Timber product)</legend>                                        
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of timber products','','for="tim-1"').form_input('tim-1','','placeholder=" " id="tim-1"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Species','','for="tim-2"').form_input('tim-2','','placeholder=" " id="tim-2"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Area (has)','','for="tim-3"').form_input('tim-3','','onkeyup="run(this)" placeholder=" " id="tim-3"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>   
                                            <div class="col-xs-12 ">                                             
                                                <div class="col-xs-4 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Unit of measure','','for="tim-4"').form_input('tim-4','','placeholder=" " id="tim-4"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume sold per year','','for="tim-5"').form_input('tim-5','','onkeyup="run(this)" placeholder=" " id="tim-5"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume consumed per year','','for="tim-6"').form_input('tim-6','','onkeyup="run(this)" placeholder=" " id="tim-6"')?>
                                                    </li></ul>
                                                </div>   
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Price per unit','','for="tim-7"').form_input('tim-7','','onkeyup="run(this)" placeholder=" " id="tim-7"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Value','','for="tim-8"').form_input('tim-8','','onkeyup="run(this)" placeholder=" " id="tim-8"')?>
                                                    </li></ul>
                                                </div>                      
                                            </div> 
                                            <div class="col-xs-12">
                                                <ul><li>
                                                <?= form_label('Gathering/harvesting/collection/planting/production method/ activity','','for="tim-10"').form_textarea('tim-10','','placeholder=" " id="tim-10"')?>    
                                                </li></ul>                                        
                                            </div>                                       
                                            <div class="col-xs-12 ">
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Specific site/location/landmarks','','for="tim-9"').form_input('tim-9','','placeholder=" " id="tim-9"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Season/ period of gathering/harvesting/collection/ planting (month)','','for="tim-11"').form_dropdown('tim-11',$monthList,'','class="select-css" id="tim-11"')?><br>
                                                    </li></ul>
                                                </div>                                                                                       
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('No of people & household members involved in the activity','','for="tim-12"').form_input('tim-12','','onkeyup="run(this)" placeholder=" " id="tim-12"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">                                            
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing agents','','for="tim-13"').form_input('tim-13','','placeholder=" " id="tim-13"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing location','','for="tim-14"').form_input('tim-14','','placeholder=" " id="tim-14"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of payment','','for="tim-15"').form_input('tim-15','','placeholder=" " id="tim-15"')?>
                                                    </li></ul>
                                                </div>  
                                            </div>
                                            <div class="col-xs-12 ">   
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="tim-16"').form_textarea('tim-16','','placeholder=" " id="tim-16"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamstim">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamstim" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from Forestry (Timber forest product) Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamstim"></tbody>
                                                    </table>
                                                    <table id="tblseamstim_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamstim_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div id="CostIncurredtimber" class="tabcontntecoproftimber" style="display: none">  
                                        <fieldset>
                                            <legend>Materials</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Items','','for="seams-timber-1a"').form_input('seams-timber-1','','placeholder=" " id="seams-timber-1a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Total Annual Cost','','for="seams-timber-2a"').form_input('seams-timber-2a','','placeholder=" " onkeyup="run(this)" id="seams-timber-2a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Unit','','for="seams-timber-3a"').form_input('seams-timber-3a','','placeholder=" " id="seams-timber-3a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Average price per unit','','for="seams-timber-4a"').form_input('seams-timber-4a','','placeholder=" " onkeyup="run(this)" id="seams-timber-4a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('No. of times cost is incurred in a year','','for="seams-timber-5a"').form_input('seams-timber-5a','','placeholder=" " onkeyup="run(this)" id="seams-timber-5a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Cost incurred during what stage?','','for="seams-timber-6a"').form_input('seams-timber-6a','','placeholder=" " id="seams-timber-6a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsMaterial-8">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsMaterial-8" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsMaterial-8"></tbody>
                                                    </table>
                                                    <table id="tblseamsMaterial-8_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsMaterial-8_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Equipment</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-timber-1b"').form_input('seams-timber-1b','','placeholder=" " id="seams-timber-1b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-timber-2b"').form_input('seams-timber-2b','','placeholder=" " onkeyup="run(this)" id="seams-timber-2b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-timber-3b"').form_input('seams-timber-3b','','placeholder=" " id="seams-timber-3b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-timber-4b"').form_input('seams-timber-4b','','placeholder=" " onkeyup="run(this)" id="seams-timber-4b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-timber-5b"').form_input('seams-timber-5b','','placeholder=" " onkeyup="run(this)" id="seams-timber-5b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-timber-6b"').form_input('seams-timber-6b','','placeholder=" " id="seams-timber-6b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsEquipment-8">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsEquipment-8" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsEquipment-8"></tbody>
                                                        </table>
                                                        <table id="tblseamsEquipment-8_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsEquipment-8_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Labor</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-timber-1c"').form_input('seams-timber-1c','','placeholder=" " id="seams-timber-1c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-timber-2c"').form_input('seams-timber-2c','','placeholder=" " onkeyup="run(this)" id="seams-timber-2c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-timber-3c"').form_input('seams-timber-3c','','placeholder=" " id="seams-timber-3c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-timber-4c"').form_input('seams-timber-4c','','placeholder=" " onkeyup="run(this)" id="seams-timber-4c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-timber-5c"').form_input('seams-timber-5c','','placeholder=" " onkeyup="run(this)" id="seams-timber-5c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-timber-6c"').form_input('seams-timber-6c','','placeholder=" " id="seams-timber-6c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsLabor-8">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsLabor-8" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsLabor-8"></tbody>
                                                        </table>
                                                        <table id="tblseamsLabor-8_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsLabor-8_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Others</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-timber-1d"').form_input('seams-timber-1d','','placeholder=" " id="seams-timber-1d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-timber-2d"').form_input('seams-timber-2d','','placeholder=" " onkeyup="run(this)" id="seams-timber-2d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-timber-3d"').form_input('seams-timber-3d','','placeholder=" " id="seams-timber-3d"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-timber-4d"').form_input('seams-timber-4d','','placeholder=" " onkeyup="run(this)" id="seams-timber-4d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-timber-5d"').form_input('seams-timber-5d','','placeholder=" " onkeyup="run(this)" id="seams-timber-5d"')?>
                                                        </li></ul>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <ul><li>
                                                        <?= form_label('Cost incurred during what stage?','','for="seams-timber-6d"').form_input('seams-timber-6d','','placeholder=" " id="seams-timber-6d"')?>
                                                        </li></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsOther-8">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsOther-8" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsOther-8"></tbody>
                                                    </table>
                                                    <table id="tblseamsOther-8_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsOther-8_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>  
                                <div id="resourcewildlife" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofwildlife active" onclick="tabecoprofwildlife(event, 'revwildlife')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofwildlife" onclick="tabecoprofwildlife(event, 'CostIncurredwildlife')" id="CostIncurred-wildlife">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="rwc_id"').form_dropdown('rwc_id',$householdid,'','class="select-css" id="rwc_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revwildlife" class="tabcontntecoprofwildlife">
                                        <fieldset>
                                            <legend>Revenue from Resource and Wildlife Collection and Use</legend>                                        
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of revenue source from resource use and wildlife collection','','for="rwc-1"').form_input('rwc-1','','placeholder=" " id="rwc-1"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Species','','for="rwc-2"').form_input('rwc-2','','placeholder=" " id="rwc-2"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Area (has)','','for="rwc-3"').form_input('rwc-3','','onkeyup="run(this)" placeholder=" " id="rwc-3"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>   
                                            <div class="col-xs-12 ">                                             
                                                <div class="col-xs-4 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Unit of measure','','for="rwc-4"').form_input('rwc-4','','placeholder=" " id="rwc-4"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume sold per year','','for="rwc-5"').form_input('rwc-5','','onkeyup="run(this)" placeholder=" " id="rwc-5"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-3 ">
                                                    <ul><li>
                                                    <?= form_label('Volume consumed per year','','for="rwc-6"').form_input('rwc-6','','onkeyup="run(this)" placeholder=" " id="rwc-6"')?>
                                                    </li></ul>
                                                </div>   
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Price per unit','','for="rwc-7"').form_input('rwc-7','','onkeyup="run(this)" placeholder=" " id="rwc-7"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-6 col-lg-2 ">
                                                    <ul><li>
                                                    <?= form_label('Value','','for="rwc-8"').form_input('rwc-8','','onkeyup="run(this)" placeholder=" " id="rwc-8"')?>
                                                    </li></ul>
                                                </div>                      
                                            </div> 
                                            <div class="col-xs-12">
                                                <ul><li>
                                                <?= form_label('Gathering/harvesting/collection/planting/production method/ activity','','for="rwc-10"').form_textarea('rwc-10','','placeholder=" " id="rwc-10"')?>    
                                                </li></ul>                                        
                                            </div>                                       
                                            <div class="col-xs-12 ">
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Specific site/location/landmarks','','for="rwc-9"').form_textarea('rwc-9','','placeholder=" " id="rwc-9"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Season/ period of gathering/harvesting/collection/ planting (month)','','for="rwc-11"').form_dropdown('rwc-11',$monthList,'','class="select-css" id="rwc-11"')?><br>
                                                    </li></ul>
                                                </div>                                                                                       
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('No of people & household members involved in the activity','','for="rwc-12"').form_input('rwc-12','','onkeyup="run(this)" placeholder=" " id="rwc-12"')?>
                                                    </li></ul>
                                                </div> 
                                            </div>
                                            <div class="col-xs-12 ">                                            
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing agents','','for="rwc-13"').form_input('rwc-13','','placeholder=" " id="rwc-13"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Marketing location','','for="rwc-14"').form_input('rwc-14','','placeholder=" " id="rwc-14"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of payment','','for="rwc-15"').form_input('rwc-15','','placeholder=" " id="rwc-15"')?>
                                                    </li></ul>
                                                </div>  
                                            </div>
                                            <div class="col-xs-12 ">   
                                                <div class="col-xs-12 col-lg-12 ">
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="rwc-16"').form_textarea('rwc-16','','placeholder=" " id="rwc-16"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsrwc">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsrwc" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from Resource and Wildlife Collection and Use Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsrwc"></tbody>
                                                    </table>
                                                    <table id="tblseamsrwc_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsrwc_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>    
                                    </div>
                                    <div id="CostIncurredwildlife" class="tabcontntecoprofwildlife" style="display: none">  
                                        <fieldset>
                                            <legend>Materials</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Items','','for="seams-wildlife-1a"').form_input('seams-wildlife-1','','placeholder=" " id="seams-wildlife-1a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Total Annual Cost','','for="seams-wildlife-2a"').form_input('seams-wildlife-2a','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-2a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Unit','','for="seams-wildlife-3a"').form_input('seams-wildlife-3a','','placeholder=" " id="seams-wildlife-3a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Average price per unit','','for="seams-wildlife-4a"').form_input('seams-wildlife-4a','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-4a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('No. of times cost is incurred in a year','','for="seams-wildlife-5a"').form_input('seams-wildlife-5a','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-5a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Cost incurred during what stage?','','for="seams-wildlife-6a"').form_input('seams-wildlife-6a','','placeholder=" " id="seams-wildlife-6a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsMaterial-9">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsMaterial-9" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsMaterial-9"></tbody>
                                                    </table>
                                                    <table id="tblseamsMaterial-9_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsMaterial-9_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Equipment</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-wildlife-1b"').form_input('seams-wildlife-1b','','placeholder=" " id="seams-wildlife-1b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-wildlife-2b"').form_input('seams-wildlife-2b','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-2b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-wildlife-3b"').form_input('seams-wildlife-3b','','placeholder=" " id="seams-wildlife-3b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-wildlife-4b"').form_input('seams-wildlife-4b','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-4b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-wildlife-5b"').form_input('seams-wildlife-5b','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-5b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-wildlife-6b"').form_input('seams-wildlife-6b','','placeholder=" " id="seams-wildlife-6b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsEquipment-9">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsEquipment-9" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsEquipment-9"></tbody>
                                                        </table>
                                                        <table id="tblseamsEquipment-9_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsEquipment-9_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Labor</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-wildlife-1c"').form_input('seams-wildlife-1c','','placeholder=" " id="seams-wildlife-1c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-wildlife-2c"').form_input('seams-wildlife-2c','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-2c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-wildlife-3c"').form_input('seams-wildlife-3c','','placeholder=" " id="seams-wildlife-3c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-wildlife-4c"').form_input('seams-wildlife-4c','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-4c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-wildlife-5c"').form_input('seams-wildlife-5c','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-5c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-wildlife-6c"').form_input('seams-wildlife-6c','','placeholder=" " id="seams-wildlife-6c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsLabor-9">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsLabor-9" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsLabor-9"></tbody>
                                                        </table>
                                                        <table id="tblseamsLabor-9_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsLabor-9_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Others</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-wildlife-1d"').form_input('seams-wildlife-1d','','placeholder=" " id="seams-wildlife-1d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-wildlife-2d"').form_input('seams-wildlife-2d','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-2d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-wildlife-3d"').form_input('seams-wildlife-3d','','placeholder=" " id="seams-wildlife-3d"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-wildlife-4d"').form_input('seams-wildlife-4d','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-4d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-wildlife-5d"').form_input('seams-wildlife-5d','','placeholder=" " onkeyup="run(this)" id="seams-wildlife-5d"')?>
                                                        </li></ul>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <ul><li>
                                                        <?= form_label('Cost incurred during what stage?','','for="seams-wildlife-6d"').form_input('seams-wildlife-6d','','placeholder=" " id="seams-wildlife-6d"')?>
                                                        </li></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsOther-9">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsOther-9" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsOther-9"></tbody>
                                                    </table>
                                                    <table id="tblseamsOther-9_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsOther-9_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>           
                                </div>  
                                <div id="miningqurrying" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofmining active" onclick="tabecoprofmining(event, 'revmining')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofmining" onclick="tabecoprofmining(event, 'CostIncurredmining')" id="CostIncurred-mining">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="mining_id"').form_dropdown('mining_id',$householdid,'','class="select-css" id="mining_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revmining" class="tabcontntecoprofmining">
                                        <fieldset>
                                            <legend>Revenue from Mining and Quarrying Industry</legend>                                            
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of revenue source from mining and quarrying industry','','for="mining-1"').form_input('mining-1','','placeholder=" " id="mining-1"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Revenue in a month','','for="mining-2"').form_input('mining-2','','onkeyup="run(this)" placeholder=" " id="mining-2"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Number of times in a year','','for="mining-3"').form_input('mining-3','','onkeyup="run(this)" placeholder=" " id="mining-3"')?>
                                                    </li></ul>
                                                </div>                                          
                                            </div>  
                                            <div class="col-xs-12">
                                                <div class="col-xs-6 col-lg-6 ">                                            
                                                    <ul><li>
                                                        <?= form_label('Source of extraction','','for="mining-4"').form_textarea('mining-4','','placeholder=" " id="mining-4"')?>    
                                                    </li></ul>     
                                                </div>      
                                                <div class="col-xs-6 col-lg-6 ">  
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="mining-5"').form_textarea('mining-5','','placeholder=" " id="mining-5"')?>
                                                    </li></ul>                                          
                                                </div>                             
                                            </div> 
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsmining">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsmining" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from Resource and Wildlife Collection and Use Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsmining"></tbody>
                                                    </table>
                                                    <table id="tblseamsmining_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsmining_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>         
                                    </div>
                                    <div id="CostIncurredmining" class="tabcontntecoprofmining" style="display: none"> 
                                    <fieldset>
                                            <legend>Materials</legend>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Items','','for="seams-mining-1a"').form_input('seams-mining-1','','placeholder=" " id="seams-mining-1a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Total Annual Cost','','for="seams-mining-2a"').form_input('seams-mining-2a','','placeholder=" " onkeyup="run(this)" id="seams-mining-2a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Unit','','for="seams-mining-3a"').form_input('seams-mining-3a','','placeholder=" " id="seams-mining-3a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Average price per unit','','for="seams-mining-4a"').form_input('seams-mining-4a','','placeholder=" " onkeyup="run(this)" id="seams-mining-4a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('No. of times cost is incurred in a year','','for="seams-mining-5a"').form_input('seams-mining-5a','','placeholder=" " onkeyup="run(this)" id="seams-mining-5a"')?>
                                                    </li></ul>
                                                </div>
                                                <div class="col-xs-4 col-lg-4">
                                                    <ul><li>
                                                    <?= form_label('Cost incurred during what stage?','','for="seams-mining-6a"').form_input('seams-mining-6a','','placeholder=" " id="seams-mining-6a"')?>
                                                    </li></ul>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsMaterial-10">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsMaterial-10" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Materials Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsMaterial-10"></tbody>
                                                    </table>
                                                    <table id="tblseamsMaterial-10_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsMaterial-10_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Equipment</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-mining-1b"').form_input('seams-mining-1b','','placeholder=" " id="seams-mining-1b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-mining-2b"').form_input('seams-mining-2b','','placeholder=" " onkeyup="run(this)" id="seams-mining-2b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-mining-3b"').form_input('seams-mining-3b','','placeholder=" " id="seams-mining-3b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-mining-4b"').form_input('seams-mining-4b','','placeholder=" " onkeyup="run(this)" id="seams-mining-4b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-mining-5b"').form_input('seams-mining-5b','','placeholder=" " onkeyup="run(this)" id="seams-mining-5b"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-mining-6b"').form_input('seams-mining-6b','','placeholder=" " id="seams-mining-6b"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsEquipment-10">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsEquipment-10" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Equipment Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsEquipment-10"></tbody>
                                                        </table>
                                                        <table id="tblseamsEquipment-10_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsEquipment-10_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Labor</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-mining-1c"').form_input('seams-mining-1c','','placeholder=" " id="seams-mining-1c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-mining-2c"').form_input('seams-mining-2c','','placeholder=" " onkeyup="run(this)" id="seams-mining-2c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-mining-3c"').form_input('seams-mining-3c','','placeholder=" " id="seams-mining-3c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-mining-4c"').form_input('seams-mining-4c','','placeholder=" " onkeyup="run(this)" id="seams-mining-4c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-mining-5c"').form_input('seams-mining-5c','','placeholder=" " onkeyup="run(this)" id="seams-mining-5c"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Cost incurred during what stage?','','for="seams-mining-6c"').form_input('seams-mining-6c','','placeholder=" " id="seams-mining-6c"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="col-xs-12 ">
                                                        <a type="text" class="btn btn-primary" id="addseamsLabor-10">Add data</a>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 ">
                                                    <div class="table-responsive">
                                                        <table id="tblseamsLabor-10" class="table table-bordered tglobal">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="8" style="text-align: center; font-size: 24px">Labor Information</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Household Member Name</th> 
                                                                    <th>Items</th>
                                                                    <th>Total Annual Cost</th>
                                                                    <th>Unit</th>
                                                                    <th>Avg. price per unit</th>
                                                                    <th>No. of times cost</th>
                                                                    <th>Cost incurred during what stage?</th>
                                                                    <th>Option</th>
                                                                </tr>                                                   
                                                            </thead>
                                                            <tbody id="tbodyseamsLabor-10"></tbody>
                                                        </table>
                                                        <table id="tblseamsLabor-10_sample" class="table table-bordered tglobal">
                                                            <tbody id="tbodyseamsLabor-10_sample"></tbody>
                                                        </table>                                            
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Others</legend>
                                                <div class="col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Items','','for="seams-mining-1d"').form_input('seams-mining-1d','','placeholder=" " id="seams-mining-1d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Total Annual Cost','','for="seams-mining-2d"').form_input('seams-mining-2d','','placeholder=" " onkeyup="run(this)" id="seams-mining-2d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Unit','','for="seams-mining-3d"').form_input('seams-mining-3d','','placeholder=" " id="seams-mining-3d"')?>
                                                            </li></ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('Average price per unit','','for="seams-mining-4d"').form_input('seams-mining-4d','','placeholder=" " onkeyup="run(this)" id="seams-mining-4d"')?>
                                                            </li></ul>
                                                        </div>
                                                        <div class="col-xs-4 col-lg-4">
                                                            <ul><li>
                                                            <?= form_label('No. of times cost is incurred in a year','','for="seams-mining-5d"').form_input('seams-mining-5d','','placeholder=" " onkeyup="run(this)" id="seams-mining-5d"')?>
                                                        </li></ul>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <ul><li>
                                                        <?= form_label('Cost incurred during what stage?','','for="seams-mining-6d"').form_input('seams-mining-6d','','placeholder=" " id="seams-mining-6d"')?>
                                                        </li></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-lg-12">
                                                <div class="col-xs-12 ">
                                                    <a type="text" class="btn btn-primary" id="addseamsOther-10">Add data</a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsOther-10" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="8" style="text-align: center; font-size: 24px">Other Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Household Member Name</th> 
                                                                <th>Items</th>
                                                                <th>Total Annual Cost</th>
                                                                <th>Unit</th>
                                                                <th>Avg. price per unit</th>
                                                                <th>No. of times cost</th>
                                                                <th>Cost incurred during what stage?</th>
                                                                <th>Option</th>
                                                            </tr>                                                   
                                                        </thead>
                                                        <tbody id="tbodyseamsOther-10"></tbody>
                                                    </table>
                                                    <table id="tblseamsOther-10_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsOther-10_sample"></tbody>
                                                    </table>                                            
                                                </div>
                                            </div>
                                        </fieldset> 
                                    </div>
                                </div> 
                                <div id="otherindustries" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofindustry active" onclick="tabecoprofindustry(event, 'revindustry')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofindustry" onclick="tabecoprofindustry(event, 'CostIncurredindustry')" id="CostIncurred-industry">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="industry_id"').form_dropdown('industry_id',$householdid,'','class="select-css" id="industry_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revindustry" class="tabcontntecoprofindustry"> 
                                        <fieldset>
                                            <legend>Revenue from other Industry</legend>                                            
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of industries','','for="industry-1"').form_input('industry-1','','placeholder=" " id="industry-1"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Revenue in a month','','for="industry-2"').form_input('industry-2','','onkeyup="run(this)" placeholder=" " id="industry-2"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Number of times in a year','','for="industry-3"').form_input('industry-3','','onkeyup="run(this)" placeholder=" " id="industry-3"')?>
                                                    </li></ul>
                                                </div>                                          
                                            </div>  
                                            <div class="col-xs-12">                                            
                                                <div class="col-xs-12 col-lg-12 ">  
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="industry-4"').form_textarea('industry-4','','placeholder=" " id="industry-4"')?>
                                                    </li></ul>                                          
                                                </div>                             
                                            </div> 
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsindustry">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsindustry" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from other Industries Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsindustry"></tbody>
                                                    </table>
                                                    <table id="tblseamsindustry_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsindustry_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>  
                                    </div>
                                    <div id="CostIncurredindustry" class="tabcontntecoprofindustry" style="display: none"> 
                                        <fieldset>
                                            <legend>Costs incurred in other industries</legend>                                            
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Total monthly expenditure in Industry-based source of revenue','','for="seams-industry-1"').form_input('seams-industry-1','','placeholder=" " onkeyup="run(this)" id="seams-industry-1"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Number of times expenditure is incurred in a year','','for="seams-industry-2"').form_input('seams-industry-2','','onkeyup="run(this)" placeholder=" " id="seams-industry-2"')?>
                                                    </li></ul>
                                                </div>                     
                                            </div>  
                                            <div class="col-xs-12">                                            
                                                <div class="col-xs-12 col-lg-12 ">  
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="seams-industry-3"').form_textarea('seams-industry-3','','placeholder=" " id="seams-industry-3"')?>
                                                    </li></ul>                                          
                                                </div>                             
                                            </div> 
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsindustry-11">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsindustry-11" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="5" style="text-align: center; font-size: 24px">Costs incurred in other industries Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Total monthly expenditure</th>
                                                                <th>Number of times expenditure per year</th>
                                                                <th>Remarks</th>
                                                                <th>Remove</th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsindustry-11"></tbody>
                                                    </table>
                                                    <table id="tblseamsindustry-11_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsindustry-11_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset> 
                                    </div>
                                </div>   
                                <div id="servicebased" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofsbindustry active" onclick="tabecoprofsbindustry(event, 'revsbindustry')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofsbindustry" onclick="tabecoprofsbindustry(event, 'CostIncurredsbindustry')" id="CostIncurred-sbindustry">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="service_id"').form_dropdown('service_id',$householdid,'','class="select-css" id="service_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revsbindustry" class="tabcontntecoprofsbindustry"> 
                                        <fieldset>
                                            <legend>Revenue from service-based Industry</legend>                                        
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Type of services','','for="service-1"').form_input('service-1','','placeholder=" " id="service-1"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Revenue in a month','','for="service-2"').form_input('service-2','','onkeyup="run(this)" placeholder=" " id="service-2"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Number of times in a year','','for="service-3"').form_input('service-3','','onkeyup="run(this)" placeholder=" " id="service-3"')?>
                                                    </li></ul>
                                                </div>                                          
                                            </div>  
                                            <div class="col-xs-12">                                            
                                                <div class="col-xs-12 col-lg-12 ">  
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="service-4"').form_textarea('service-4','','placeholder=" " id="service-4"')?>
                                                    </li></ul>                                          
                                                </div>                             
                                            </div> 
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsservice">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsservice" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from service-based industry Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsservice"></tbody>
                                                    </table>
                                                    <table id="tblseamsservice_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsservice_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>   
                                    </div>   
                                    <div id="CostIncurredsbindustry" class="tabcontntecoprofsbindustry" style="display: none">
                                        <fieldset>
                                            <legend>Costs incurred in service-based industry</legend>                                            
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Total monthly expenditure from service-based sources of revenue','','for="seams-sbindustry-1"').form_input('seams-sbindustry-1','','placeholder=" " onkeyup="run(this)" id="seams-sbindustry-1"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Number of times expenditure is incurred in a year','','for="seams-sbindustry-2"').form_input('seams-sbindustry-2','','onkeyup="run(this)" placeholder=" " id="seams-sbindustry-2"')?>
                                                    </li></ul>
                                                </div>                     
                                            </div>  
                                            <div class="col-xs-12">                                            
                                                <div class="col-xs-12 col-lg-12 ">  
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="seams-sbindustry-3"').form_textarea('seams-sbindustry-3','','placeholder=" " id="seams-sbindustry-3"')?>
                                                    </li></ul>                                          
                                                </div>                             
                                            </div> 
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamssbindustry-12">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamssbindustry-12" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="5" style="text-align: center; font-size: 24px">Costs incurred in service-based industries Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Total monthly expenditure</th>
                                                                <th>Number of times expenditure per year</th>
                                                                <th>Remarks</th>
                                                                <th>Remove</th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamssbindustry-12"></tbody>
                                                    </table>
                                                    <table id="tblseamssbindustry-12_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamssbindustry-12_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>  
                                    </div>         
                                </div>
                                <div id="othersources" class="tabcontentRevenue" style="display: none">
                                    <div class="tab">
                                        <a class="tabecoprofothersource active" onclick="tabecoprofothersource(event, 'revothersource')" id="defaultOpen">Revenue</a>
                                        <a class="tabecoprofothersource" onclick="tabecoprofothersource(event, 'CostIncurredothersource')" id="CostIncurred-othersource">Cost Incurred</a>
                                    </div>
                                    <div class="col-xs-12 ">                                    
                                        <div class="col-xs-12 col-lg-12 ">
                                            <ul><li>
                                            <?= form_label('Household member name','','for="sources_id"').form_dropdown('sources_id',$householdid,'','class="select-css" id="sources_id"')?>
                                            </li></ul>
                                        </div>                                           
                                    </div>
                                    <div id="revothersource" class="tabcontntecoprofothersource"> 
                                        <fieldset>
                                            <legend>Revenue from other sources</legend>
                                            
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Other revenue sources','','for="sources-1"').form_input('sources-1','','placeholder=" " id="sources-1"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Revenue in a month','','for="sources-2"').form_input('sources-2','','onkeyup="run(this)" placeholder=" " id="sources-2"')?>
                                                    </li></ul>
                                                </div>  
                                                <div class="col-xs-4 col-lg-4 ">
                                                    <ul><li>
                                                    <?= form_label('Number of times in a year','','for="sources-3"').form_input('sources-3','','onkeyup="run(this)" placeholder=" " id="sources-3"')?>
                                                    </li></ul>
                                                </div>                                          
                                            </div>  
                                            <div class="col-xs-12">                                            
                                                <div class="col-xs-12 col-lg-12 ">  
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="sources-4"').form_textarea('sources-4','','placeholder=" " id="sources-4"')?>
                                                    </li></ul>                                          
                                                </div>                             
                                            </div> 
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamssources">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamssources" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="3" style="text-align: center; font-size: 24px">Revenue from other sources Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Details</th>
                                                                <th></th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamssources"></tbody>
                                                    </table>
                                                    <table id="tblseamssources_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamssources_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>    
                                    </div>  
                                    <div id="CostIncurredothersource" class="tabcontntecoprofothersource" style="display: none">
                                        <fieldset>
                                            <legend>Costs incurred from other revenue sources </legend>                                            
                                            <div class="col-xs-12 ">                                    
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Total monthly expenditure from service-based sources of revenue','','for="seams-othersource-1"').form_input('seams-othersource-1','','placeholder=" " onkeyup="run(this)" id="seams-othersource-1"')?>
                                                    </li></ul>
                                                </div> 
                                                <div class="col-xs-6 col-lg-6 ">
                                                    <ul><li>
                                                    <?= form_label('Number of times expenditure is incurred in a year','','for="seams-othersource-2"').form_input('seams-othersource-2','','onkeyup="run(this)" placeholder=" " id="seams-othersource-2"')?>
                                                    </li></ul>
                                                </div>                     
                                            </div>  
                                            <div class="col-xs-12">                                            
                                                <div class="col-xs-12 col-lg-12 ">  
                                                    <ul><li>
                                                        <?= form_label('Remarks','','for="seams-othersource-3"').form_textarea('seams-othersource-3','','placeholder=" " id="seams-othersource-3"')?>
                                                    </li></ul>                                          
                                                </div>                             
                                            </div> 
                                            <div class="col-xs-12 ">
                                                <a type="text" class="btn btn-primary" id="addseamsothersource-13">Add data</a>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="table-responsive">
                                                    <table id="tblseamsothersource-13" class="table table-bordered tglobal">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="5" style="text-align: center; font-size: 24px">Costs incurred in service-based industries Information</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Household head</th>                                                            
                                                                <th>Total monthly expenditure</th>
                                                                <th>Number of times expenditure per year</th>
                                                                <th>Remarks</th>
                                                                <th>Remove</th>
                                                            </tr>                                                        
                                                        </thead>
                                                        <tbody id="tbodyseamsothersource-13"></tbody>
                                                    </table>
                                                    <table id="tblseamsothersource-13_sample" class="table table-bordered tglobal">
                                                        <tbody id="tbodyseamsothersource-13_sample"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </fieldset>  
                                    </div>         
                                </div>
                            </fieldset>  
                        </div>                                           

  	<div id="sociocultural" class="tabcontentsocio" style="display: block;">
  		<div class="tab-second" id="tabhabecosub">
            <a class="tabrevfirst active" onclick="tabrevfirst(event, 'demoid')" id="defaultOpen">Demographic Information (SRPAO)</a>
            <a class="tabrevfirst" onclick="tabrevfirst(event, 'livelihooid')" id="livelihoodid" >Biodiversity-friendly enterprise (BDFE)</a>
        </div>
        <div id="demoid" class="tabcontentRevenuefirst">  
       	<fieldset>
            <legend>Demographic Information</legend> 
                <fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Location</legend>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-lg-3 tooltip">
                            <ul><li>
                                <?php echo form_label('Region','','for="regids_demo"').form_dropdown('region_ids',$region_demoList,'',' id="regids_demo"') ?>    
                                <div class="prov_errors"></div>
                                <span class="tooltiptext">Select region</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-3 tooltip">
                            <ul><li>
                                <?php echo form_label('Province','','for="provids_demo"').form_dropdown('province_ids','','',' id="provids_demo"') ?>
                                <div class="municipal_errors"></div>
                                <span class="tooltiptext">Select provinces</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-3 tooltip">
                            <ul><li>
                                <?php echo form_label('Municipality','','for="munids_demo"').form_dropdown('municipal_ids','','',' id="munids_demo"') ?>
                                <div class="barangay_errors"></div>
                                <span class="tooltiptext">Select municipalities</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-3 tooltip">
                            <ul><li>
                                <?php echo form_label('Barangay','','for="barids_demo"').form_dropdown('barangay_ids','','',' id="barids_demo"') ?>
                                <span class="tooltiptext">Select barangays</span>
                            </li></ul>
                        </div> 
                    </div>
                </fieldset>                            
                <div class="col-xs-12">
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                        <?php echo form_label('Name of Household Head','','for="seams_name_head"').form_input('seams_name_head','',' id="seams_name_head"') ?> 
                        <span class="tooltiptext">The head of the household is an adult person, male or female, who is responsible for the organization and care of the household, or who is regarded as such by the members of the household.</span>
                        </li></ul>                                            
                    </div>
                    <div class="col-xs-6 col-lg-6 tooltip">
                        <ul><li>
                            <?= form_label('Sex','','for="seams_sex"').form_dropdown('seams_sex',$sexList,'',' id="seams_sex"');?>
                            <span class="tooltiptext">Select sex</span>
                        </li></ul>
                    </div>
                </div>
                <div class="col-xs-12">
                    <fieldset>
                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Total Household Member (Including household head)</legend>
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?php echo form_label('Male','','for="seams_male"').form_input('seams_male','','placeholder="Total Male" id="seams_male" class="number-separator"') ?> 
                                <span class="tooltiptext">Total number of male individual or aggregate of persons, generally but not necessarily bound by ties of kinship, who reside in the same dwelling unit and have common arrangements for the preparation and consumption of food.</span>
                            </li></ul>                                            
                        </div>
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Female','','for="seams_female"').form_input('seams_female','','placeholder="Total Female" id="seams_female" class="number-separator"');?>
                                <span class="tooltiptext">Total number of female individual or aggregate of persons, generally but not necessarily bound by ties of kinship, who reside in the same dwelling unit and have common arrangements for the preparation and consumption of food.</span>
                            </li></ul>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 tooltip">
                    <ul><li>
                        <?= form_label('Indigenous Cultural Community/Indigenous People','','id="select_iccsips"').form_dropdown('select_iccsips',$tribelist,'',' id="select_iccsips"') ?>
                        <span class="tooltiptext">A group of people sharing common bonds of language, customs, traditions, and other distinctive cultural traits, and who have, since time immemorial  occupied, possessed and utilized a territory</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <div class="col-xs-12 col-lg-3 tooltip">
                            <?= form_checkbox('tenure_migrantyns','','','id="tenure_migrantyns"').form_label('Tenured Migrant','','for="tenure_migrantyns"') ?>
                            <span class="tooltiptext">Protected area occupants who have been actually, continuously and presently occupying a portion of the protected area for five (5) years before the proclamation or law establishing the same as protected area, and are solely dependent therein for subsistence</span>
                        </div>
                        <div class="col-xs-12 col-lg-3 tooltip">
                            <?= form_checkbox('ip_recognize','','','id="ip_recognize"').form_label('IP is recognized by NCIP','','for="ip_recognize"') ?>
                        </div>     
                        <div class="col-xs-12 col-lg-3 tooltip">
                            <?= form_checkbox('ip_inside_pa','','','id="ip_inside_pa"').form_label('Inside Protected Area','','for="ip_inside_pa"') ?>
                        </div>   
                        <div class="col-xs-12 col-lg-3 tooltip">
                            <?= form_checkbox('ip_outside_pa','','','id="ip_outside_pa"').form_label('Outside Protected Area','','for="ip_outside_pa"') ?>
                        </div> 
                    </fieldset>                 
                </div>                
                <div class="col-xs-12">                                    
                	<fieldset>
                    <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Total Area</legend>
                    <div class="col-xs-6 col-lg-3 tooltip">                        
                        <ul><li>
                            <?php echo form_label('Farmlot (has)','','for="seams_farmlot"').form_input('seams_farmlot','',' onkeyup="Calculatedemograph()" class="number-separator" id="seams_farmlot"') ?> 
                            <span class="tooltiptext">a parcel of land of the protected area wholly or partly cultivated for the production of food, crops, forage, fuel wood or other purposes
</span>
                        </li></ul>                                            
                    </div>
                    <div class="col-xs-6 col-lg-3 tooltip">
                        <ul><li>
                            <?php echo form_label('Homelot (has)','','for="seams_homelot"').form_input('seams_homelot','',' onkeyup="Calculatedemograph()" class="number-separator" id="seams_homelot"') ?> 
                            <span class="tooltiptext">a parcel of land of the PA where the residence or house of the occupant is located</span>
                        </li></ul>                                            
                    </div>
                    <div class="col-xs-6 col-lg-3 tooltip">
                        <ul><li>
                            <?php echo form_label('Other Uses (has)','','for="seams_otheruses"').form_input('seams_otheruses','','onkeyup="Calculatedemograph()" class="number-separator" id="seams_otheruses"') ?> 
                            <span class="tooltiptext">parcel of land of the PA used by the occupants other than farmlot or homelot</span>
                        </li></ul>                                            
                    </div>
                    <div class="col-xs-6 col-lg-3 tooltip">
                        <ul><li>
                            <?php echo form_label('Total area occupied (has)','','for="seams_occupied"').form_input('seams_occupied','','class="number-separator" id="seams_occupied" readonly') ?> 
                            <span class="tooltiptext">sum of the area occupied and used by the PA Occupants (Farmlot+Homelot+Other Uses)</span>
                        </li></ul>                                            
                    </div>
                    <div class="col-xs-12 col-lg-3 ">
                        <?= form_checkbox('whf','','','id="whf"').form_label('Homelot within Farmlot','','for="whf"') ?>
                    </div>
                    </fieldset>
            	</div>
                <fieldset>
                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Coordinates (point location)</legend>
                <div class="col-xs-12">
                    <div class="col-xs-12 col-lg-12">
                        <table class="content-table">                                          
                            <tbody>
                                <tr>
                                    <td>Longitude</td>
                                    <td width="">
                                        <table class="content-table">
                                            <tbody>
                                                <tr><td>Decimal Degree</td><td colspan="2"><ul><li><?php echo form_input('ddlongoutputdemo','','id="ddlongoutputdemo"') ?></li></ul></td>
                                                    <td class="hidden"><?php echo form_button('en','Enable/Disable','class="endis_demo"') ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <ul><li>                                                            
                                                            <?= form_label('Direction','for=""').form_dropdown('longitude_dms_direction',$direct_long,'',' id="longitude_dms_direction"'); ?>
                                                        </li></ul>
                                                        </td>
                                                    <td>
                                                        <ul><li>
                                                            <?= form_label('Degree (°)','for="longitude_dms_degrees"').form_input('longitude_dms_degrees','','id="longitude_dms_degrees" class="dmstodd" onkeyup="run(this);"') ?>
                                                        </li></ul>
                                                    </td>
                                                    <td>
                                                        <ul><li>
                                                            <?= form_label('Minute (ˈ)','for="longitude_dms_minutes"').form_input('longitude_dms_minutes','','id="longitude_dms_minutes" class="dmstodd" onkeyup="run(this);"') ?>
                                                        </li></ul>
                                                    </td>
                                                    <td>
                                                        <ul><li>
                                                            <?= form_label('Second (")','for="longitude_dms_seconds"').form_input('longitude_dms_seconds','','id="longitude_dms_seconds" class="dmstodd" onkeyup="run(this);"') ?>
                                                        </li></ul>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td width="">
                                        <table class="content-table">
                                            <tbody>
                                                <tr><td>Decimal Degree</td><td colspan="2"><ul><li><?php echo form_input('ddlatoutputdemo','','id="ddlatoutputdemo"') ?></li></ul></td>
                                                    <td class="hidden"><?php echo form_button('en','Enable/Disable','class="endis_demos"') ?></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <ul><li>
                                                           <?= form_label('Direction','for=""').form_dropdown('latitude_dms_direction',$direct_lat,'',' id="latitude_dms_direction"'); ?>
                                                        </li></ul>
                                                        </td>
                                                    <td>
                                                        <ul><li>
                                                            <?= form_label('Degree (°)','for="latitude_dms_degrees"').form_input('latitude_dms_degrees','','id="latitude_dms_degrees" class="dmstodd" onkeyup="run(this);"') ?>
                                                        </li></ul>
                                                    </td>
                                                    <td>
                                                        <ul><li>
                                                            <?= form_label('Minute (ˈ)','for="latitude_dms_minutes"').form_input('latitude_dms_minutes','','id="latitude_dms_minutes" class="dmstodd" onkeyup="run(this);"') ?>
                                                        </li></ul>
                                                    </td>
                                                    <td>
                                                        <ul><li>
                                                            <?= form_label('Second (")','for="latitude_dms_seconds"').form_input('latitude_dms_seconds','','id="latitude_dms_seconds" class="dmstodd" onkeyup="run(this);"') ?>
                                                        </li></ul>
                                                    </td>
                                                </tr>                                                
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>                                                
                            </tbody>
                        </table>
                    </div>                                    
                </div>
            </fieldset>
                <div class="col-xs-12 col-lg-12">                                        
                    <div id="loadingspinsrpaoshpfile"></div>
                </div>
                <div class="col-xs-12 col-lg-12 tooltip"> 
                    <fieldset>
                        <label>Upload Shapefile <i>(note: zip and rar file; and maximum of 200mb only)</i></label>
                        <input type='file' name="zip_shpfile_demo" id="zip_shpfile_demo" />
                        <input name="demoshpfiletxt" id="demoshpfiletxt" class="hidden"></input>
                        <span class="tooltiptext">Upload shapefile <i>(note: zip and rar file; and maximum of 200mb only)</i></span>
                    </fieldset>
                </div>
                <div class="col-xs-12">                                    
                    <fieldset>
                        <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Occupancy Date</legend>
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?php echo form_label('Month','','for=""').form_dropdown('seams_date_months',$monthList,'',' id="seams_date_month"') ?>
                                <span class="tooltiptext">Select month occupied</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?php echo form_label('Year','','for=""').form_dropdown('seams_date_years',$yearListed,'',' id="seams_date_year"') ?>
                                <span class="tooltiptext">Select year occupied</span>
                            </li></ul>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 tooltip">
                    <ul><li>
                        <?= form_label('Remarks','', 'for="seams_remarks"').form_textarea('seams_remarks','','placeholder="Remarks" id="seams_remarks"');?>
                        <span class="tooltiptext">Input remarks/brief description</span>
                    </li></ul>
                </div>
                <div class="col-xs-12 ">
                    <a type="text" class="btn btn-primary" id="addseamsdemo">Add data</a>
                </div>
                <div class="col-xs-12 ">
                    <div class="table-responsive"><br>
                        <table id="tblseamsdemo" class="content-table">
                            <thead>
                                <tr>
                                    <th colspan="11" style="text-align: center; font-size: 24px">Demographic Information</th>
                                </tr>
                                <tr>
                                    <th rowspan="2">Name of Household head</th>
                                    <th rowspan="2">Sex</th>
                                    <th colspan="3">Total Household Member<br>(Including household head)</th>
                                    <th colspan="4">Total Area (has)</th>
                                    <th rowspan="2">Date of Occupancy</th>
                                    <th rowspan="2"></th>
                                </tr>
                                <tr>
                                    <td>Male</td>
                                    <td>Female</td>
                                    <td>Total</td>
                                    <td>Farmlot</td>
                                    <td>Houselot</td>
                                    <td>Other uses</td>
                                    <td>Occupied</td>
                                </tr>
                            </thead>
                            <tbody id="tbodyseamsdemo"></tbody>
                        </table>
                        <table id="tblseamsdemo_sample" class="content-table">
                            <tbody id="tbodyseamsdemo_sample"></tbody>
                        </table>
                    </div>
                </div>
            </fieldset>      
        </div> 
        <div id="livelihooid" class="tabcontentRevenuefirst" style="display: none">
        <input type="hidden" name="bdfe-gencode" id="bdfe-gencode" value="<?php echo generateRandomStringBDFE(); ?>">
        <input type="text" name="bdfecodesgen" class="hidden" value="<?php echo $pamain->generatedcode; ?>" id="bdfecodesgen">        
        <div class="col-xs-12 tooltip">
            <div class="col-xs-12 col-lg-12">
                <div id="uploaded_images_bdfe"></div>
            </div> 
            <div class="col-xs-12 col-lg-12 col-md-12">
                <fieldset>
                    <legend style="background-color: transparent;color: black;font-weight: 700">Upload map image (map showing point location of the Enterprises within the PA)<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></legend>
                    <input type="file" name="files_bdfe_image" id="files_bdfe_image" />
                    <input type="text" name="files_bdfe_imagetext" id="files_bdfe_imagetext" class="hidden" />
                    <span class="tooltiptext">Map showing point location of the Enterprises within the PA</span>
                </fieldset>
            </div>
        </div>
        <div class="col-xs-12 tooltip">
            <fieldset>
                <legend style="background-color: transparent;color: black;font-weight: 700">Upload shapefile - spatial data in shapefile<i>(note: zip and rar file; and maximum of 200mb only)</i></legend>
                <input type='file' name="zip_shpfile_bdferesource" id="zip_shpfile_bdferesource" onchange="readURLshapefilebdferesources(this);"  />
                <input type="hidden" name="zip_shpfile_bdferesource_text" id="zip_shpfile_bdferesource_text">
                <div id="zip_shpfile_bdferesource_div"></div>
                <span class="tooltiptext">Spatial data in shapefile</span>
            </fieldset>
        </div>
        <div class="col-xs-12 col-lg-12">
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?php echo form_label('Name of Enterprise','','for="lhName"').form_input('lhName','','id="lhName"'); ?>
                    <span class="tooltiptext">Enterprises are  the economic activities that add value to existing product or service, are innovative and have the potential for semi-commercial or commercial operation</span>
                </li></ul>
            </div> 
        </div>
                       
            <div class="col-xs-12">  
                <div class="col-xs-12 col-lg-4 tooltip">    
                    <ul><li>                              
                        <?php echo form_label('Date of Registration').form_dropdown('dateregismonth',$monthList,'',' id="dateregismonth" ') ?>
                        <span class="tooltiptext">Select month of registration</span>
                    </li></ul>  
                </div>                                    
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('dateregisday',$dayList,'',' id="dateregisday"') ?>
                        <span class="tooltiptext">Select day of registration</span>
                    </li></ul>
                </div>                                    
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('dateregisyear',$yearListed,'',' id="dateregisyear" ') ?>
                        <span class="tooltiptext">Select year of registration</span>
                    </li></ul>
                </div>                                                      
            </div>                     
            <div class="col-xs-12 ">  
                <div class="col-xs-12 col-lg-4 tooltip"> 
                    <ul><li>                                   
                        <?php echo form_label('Type of Registration').form_dropdown('typeregis',$bdfetyperegistration,'',' id="typeregis" ') ?>
                        <span class="tooltiptext">Registration classification of subject Peoples Organization as issued by different government agencies</span>
                    </li></ul>
                </div>                                        
                <div class="col-xs-12 col-lg-4 tooltip" id="registrationdiv" style="display: none">                                    
                    <ul><li>                                   
                        <?php echo form_label('Specify others').form_input('typeregis_others','','id="typeregis_others" ') ?>
                        <span class="tooltiptext">Specify other type of registration</span>
                    </li></ul>
                </div>                                        
            </div>                          
        <fieldset>
            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Types of Enterprise</legend>
            <div class="col-xs-12 col-lg-6 tooltip">
                <ul><li>
                    <?php echo form_label('&nbsp;','for="liveproducts"').form_dropdown('liveproducts',$lh_products,'','id="liveproducts" ') ?>
                    <span class="tooltiptext">Specifications on the nature of business under manufacturing, processing, or distribution including types of products </span>
                </li></ul>
            </div>
             <div class="col-xs-12 col-lg-6 tooltip">
                <ul><li>
                    <?php echo form_label('&nbsp;','for="lh_type"').form_dropdown('lh_type','','','id="lh_type" ') ?>
                    <span class="tooltiptext">Select sub type of enterprises</span>
                </li></ul>
            </div>      
            <div class="col-xs-12 col-lg-12 tooltip" id="lhcatother" style="display: none">
                <ul><li>
                    <?php echo form_label('Specify Others','for="lh_cat_others"').form_input('lh_cat_others','','id="lh_cat_others"') ?>
                    <span class="tooltiptext">Specify other type of enterprises</span>
                </li></ul>
            </div>             
        </fieldset>  
        <fieldset>
            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Location of PO office</legend>
            <div class="col-xs-12 col-lg-3 tooltip">
                <ul><li>
                    <?php echo form_label('Region','','for="lh_reg_office"').form_dropdown('lh_reg_office',$region_demoList,'',' id="lh_reg_office"') ?> 
                    <span class="tooltiptext">Select region</span>   
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-3 tooltip">
                <ul><li>
                    <?php echo form_label('Province','','for="lh_prov_office"').form_dropdown('lh_prov_office','','',' id="lh_prov_office"') ?>
                    <span class="tooltiptext">Select province</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-3 tooltip">
                <ul><li>
                    <?php echo form_label('Municipality','','for="lh_mun_office"').form_dropdown('lh_mun_office','','',' id="lh_mun_office"') ?>
                    <span class="tooltiptext">Select municipality</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-3 tooltip">
                <ul><li>
                    <?php echo form_label('Barangay','','for="lh_barangay_office"').form_dropdown('lh_barangay_office','','',' id="lh_barangay_office"') ?>
                    <span class="tooltiptext">Select barangay</span>
                </li></ul>
            </div>
            <div class="col-xs-12 col-lg-12">
                <table class="content-table">                                          
                    <tbody>
                        <tr>
                            <td>Longitude</td>
                            <td width="">
                                <table class="content-table">
                                    <tbody>
                                        <tr>
                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('lh_dmstodd_indi','','id="lh_dmstodd_indi" class="number-separator"')?></li></ul></td>
                                            <td class="hidden"><?php echo form_button('en','Enable/Disable','class="lh_longd_indi"') ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <ul><li>                                                            
                                                    <?php echo form_label('Direction','for="lh_long_direction_indi"').form_dropdown('lh_long_direction_indi',$direct_long,'',' id="lh_long_direction_indi"'); ?>
                                                </li></ul>
                                            </td>
                                            <td>
                                                <ul><li>
                                                    <?php echo form_label('Degree (°)','for="lh_long_deg_indi"').form_input('lh_long_deg_indi','','id="lh_long_deg_indi" class="number-separator" class="edmstodd"') ?>
                                                </li></ul>
                                            </td>
                                            <td>
                                                <ul><li>
                                                    <?php echo form_label('Minute (ˈ)','for="lh_long_min_indi"').form_input('lh_long_min_indi','','id="lh_long_min_indi" class="number-separator" class="edmstodd"') ?>
                                                </li></ul>
                                            </td>
                                            <td>
                                                <ul><li>
                                                    <?php echo form_label('Second (")','for="lh_long_sec_indi"').form_input('lh_long_sec_indi','','id="lh_long_sec_indi" class="number-separator" class="edmstodd"') ?>
                                                </li></ul>
                                            </td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Latitude</td>
                                <td width="">
                                <table class="content-table">
                                    <tbody>
                                    <tr>
                                        <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('lh_dmstodd2_indi','','id="lh_dmstodd2_indi" class="number-separator"') ?></li></ul></td>
                                        <td class="hidden"><?php echo form_button('en','Enable/Disable','class="lh_latd_indi"') ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul><li>
                                                <?= form_label('Direction','for="lh_lat_direction_indi"').form_dropdown('lh_lat_direction_indi',$direct_lat,'',' id="lh_lat_direction_indi"'); ?>
                                            </li></ul>
                                            </td>
                                        <td>
                                            <ul><li>
                                                <?= form_label('Degree (°)','for="lh_lat_deg_indi"').form_input('lh_lat_deg_indi','','id="lh_lat_deg_indi" class="number-separator" class="edmstodd"') ?>
                                            </li></ul>
                                        </td>
                                        <td>
                                            <ul><li>
                                                <?= form_label('Minute (ˈ)','for="lh_lat_min_indi"').form_input('lh_lat_min_indi','','id="lh_lat_min_indi" class="number-separator" class="edmstodd" ') ?>
                                            </li></ul>
                                        </td>
                                        <td>
                                            <ul><li>
                                                <?= form_label('Second (")','for="lh_lat_sec_indi"').form_input('lh_lat_sec_indi','','id="lh_lat_sec_indi" class="number-separator" class="edmstodd"') ?>
                                            </li></ul>
                                        </td>
                                    </tr>                                    
                                </tbody>
                            </table>
                            </td>
                        </tr>                                                
                    </tbody>
                </table>
            </div>
        </fieldset>
        <div class="col-xs-12">
           <!--  <div class="col-xs-12 col-lg-12 tooltip">  
                <ul><li>            
                    <?php echo form_label('Total area used (has)','','for="lh_area"').form_input('lh_area','','id="lh_area" class="number-separator"') ?>
                    <span class="tooltiptext">Input total area used (hectares)</span>
                </li></ul>              
            </div>  --> 
             <div class="col-xs-12 col-lg-12">  
                <div class="col-xs-12 col-lg-4 tooltip"> 
                    <ul><li>                                  
                        <?php echo form_label('Date of inclusion to PO inventory').form_dropdown('lh_month_inclusion',$monthList,'',' id="lh_month_inclusion" ') ?>
                        <span class="tooltiptext">Select month of inclusion</span>
                    </li></ul> 
                </div>                                    
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('lh_day_inclusion',$dayList,'',' id="lh_day_inclusion"') ?>
                        <span class="tooltiptext">Select day of inclusion</span>
                    </li></ul>
                </div>                                    
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('lh_year_inclusion',$yearListed,'',' id="lh_year_inclusion" ') ?>
                        <span class="tooltiptext">Select year of inclusion</span>
                    </li></ul>
                </div>                                                      
            </div>          
        </div>  
        <div class="col-xs-12">         
            <div class="col-xs-12 col-lg-12">  
                <div class="col-xs-12 col-lg-4 tooltip"> 
                    <ul><li>                                  
                        <?php echo form_label('Date of Rapid Assessment').form_dropdown('lh_month_rapassess',$monthList,'',' id="lh_month_rapassess" ') ?>
                        <span class="tooltiptext">Select month of Rapid Assessment</span>
                    </li></ul> 
                </div>                                    
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('lh_day_rapassess',$dayList,'',' id="lh_day_rapassess"') ?>
                        <span class="tooltiptext">Select day of Rapid Assessment</span>
                    </li></ul>
                </div>                                    
                <div class="col-xs-12 col-lg-4 tooltip">
                    <ul><li>
                        <?php echo form_label('&nbsp;').form_dropdown('lh_year_rapassess',$yearListed,'',' id="lh_year_rapassess" ') ?>
                        <span class="tooltiptext">Select year of Rapid Assessment</span>
                    </li></ul>
                </div>                                                      
            </div>          
        </div>  
        <div class="col-xs-12 col-lg-12">
            <ul><li>
                <?php echo form_label("Score (Numerical number)",'for="lh_score"').form_input('lh_score','','id="lh_score" class="number-separator"') ?>
            </li></ul>
        </div>     
        <div class="col-xs-12 col-lg-12">
            <ul><li>
                <?php echo form_label('Description','for="lh_type_desc"').form_textarea('lh_type_desc','','id="lh_type_desc"') ?>
            </li></ul>
        </div>
        <div class="col-xs-12 ">
            <a type="text" class="btn btn-primary" id="addbdfe">Add data</a>
        </div>
        <div class="col-xs-12 ">
            <div class="table-responsive">                   
                    <table id="tblbdfe" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="4" style="text-align: center; font-size: 24px">Biodiversity-friendly enterprise (BDFE)</th>
                            </tr>
                            <tr>
                                <th>Map Image</th>
                                <th>BDFE Information</th>
                                <th>Add/View</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbodybdfe"></tbody>
                    </table>                                                                       
                </div>
            </div>        
        </div>                        
  	</div><!-- END OF SOCIO-ECONOMIC TAB -->
  	<div id="economicprof" class="tabcontentsocio">
    <hr>
        <div class="col-xs-12 ">                                    
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                <?= form_label('Ethnicity','','for="ethinicity"').form_textarea('ethinicity',$pamain->ethinicity,'placeholder="Brief description" id="ethinicity"') ?>
                <span class="tooltiptext">Ethnicity is a primary sense of belonging to an ethnic group (e.g. Hiligaynon, Ilocano, Visaya, Tagalog)</span>
                </li></ul>
            </div>  
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                <?= form_label('Archeology','','for="archeology"').form_textarea('archeology',$pamain->archeology,'placeholder="Brief description" id="archeology"')  ?>
                <span class="tooltiptext">Archaeology is study of the ancient and recent human past through material remains. It analyzes the physical remains of the past in pursuit of a broad and comprehensive understanding of human culture. (source: https://www.saa.org/about-archaeology/what-is-archaeology).<br>Provide/discuss what are the acheological evidences/values found the PA.</span>
                </li></ul>
            </div>                                                                       
        </div>         
        <div class="col-xs-12">
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                	<?= form_label('Cultural Resources','','for="culturalresource"').form_textarea('culturalresource',$pamain->cultural_resource,'placeholder="Brief description" id="culturalresource"')  ?>
                    <span class="tooltiptext">Cultural resources are any prehistoric or historic remains or indicators of past human activities, including artifacts, sites, structures, landscapes, and objects of importance to a culture or community for scientific, traditional, religious, or other reasons. </span>
           		</li></ul>
       		</div>
       		<div class="col-xs-12 col-lg-12 tooltip">
       		    <ul><li>
       		    <?= form_label('Customs and Beliefs','','for="belief"').form_textarea('belief',$pamain->belief,'placeholder="Brief description" id="belief"')  ?>
                <span class="tooltiptext">A custom is defined as a cultural idea that describes a regular, patterned behavior that is considered characteristic of life in a social system.<br>
                Beliefs are the tenets or convictions that people hold to be true. Individuals in a society have specific beliefs.<br>Discuss what are the customs and beliefs existing/ found in the communities within the PA.</span>
       		    </li></ul>
       		</div>                       
   		</div>
        <div class="col-xs-12">
            <div class="col-xs-12 col-lg-12 tooltip">
                <ul><li>
                    <?= form_label('Local/Indigenous Knowledge Practices','','for="likp"').form_textarea('likp',$pamain->local_inter_knowledge_practices,'placeholder="Brief description" id="likp"')  ?>
                <span class="tooltiptext">Indigenous Knowledge Systems and Practices (IKSPs) are local knowledge developed over centuries of experimentation by our ancestors and are passed orally from generation to generation.<br>Discuss what are the existng IKSPs in the PAs</span>
                </li></ul>
            </div>
        </div>
        <div class="col-xs-12 col-lg-12">
            <div class="col-xs-4 col-lg-4 t-Region-buttons-left hidden">
                <button type="button" class="btn btn-primary  btn-flat btn-xs" id="submitfrmcultural">Apply changes</button>
            </div>
        </div>
   	</div><!-- END OF CULTURAL PROFILE-->
   	<div id="institutionalprof" class="tabcontentsocio">
        <fieldset>
            <legend>Institutional Profile</legend>
            <div class="col-xs-12 col-lg-12">
                <ul><li>
                    <?= form_label('','', 'for="institutional_profile"').form_textarea('institutional_profile',$pamain->institutional_profile,'placeholder="Brief description" id="institutional_profile"');?>
                </li></ul>
            </div>
        </fieldset>
    </div><!-- END OF INSTITUTIONAL PROFILE -->
    <div id="usesarea" class="tabcontentsocio">                       
        <fieldset>
            <legend>Uses of the Area</legend>
                <div class="col-xs-12 col-lg-12">
                    <ul><li>
                        <?= form_label('Tourism Purposes','','for="tourism"').form_textarea('tourism',$pamain->tourism,'placeholder="Brief description" id="tourism"');?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <ul><li>
                        <?= form_label('Facility Purposes','','for="facility"').form_textarea('facility',$pamain->facilities,'placeholder="Brief description" id="facility"');?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <ul><li>
                        <?= form_label('Science and Research Purposes','','for="research"').form_textarea('research',$pamain->science_research,'placeholder="Brief description" id="research"');?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <ul><li>
                        <?= form_label('Educational Purposes','','for="educational"').form_textarea('educational',$pamain->educational,'placeholder="Brief description" id="educational"');?>
                    </li></ul>
                </div>
        </fieldset>
    </div>
    <div id="sociooccupants" class="tabcontentsocio">                        
        <div class="col-xs-6 "> 
            <fieldset>
                <legend>Total number of PA occupants</legend>
                <div class="col-xs-12 col-lg-4">
                    <ul><li>
                    <?= form_label('Male','','for="occupants_male"').form_input('occupants_male',$pamain->no_occupant_male,'id="occupants_male" onchange="calc_occupant()" onkeyup=run(this) placeholder=" "');?>
                    </li></ul>
                </div> 
                <div class="col-xs-12 col-lg-4">
                    <ul><li>
                    <?= form_label('Female','','for="occupants_female"').form_input('occupants_female',$pamain->no_occupant_female,'id="occupants_female" onchange="calc_occupant()" onkeyup=run(this) placeholder=" "');?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <ul><li>
                    <?= form_label('Total','','for="occupants"').form_input('occupants',$pamain->no_occupants,'id="occupants" placeholder=" " readonly="readonly"');?>
                    </li></ul>
                </div> 
                 <!-- <?= form_label('Male','','for="total_occupants_male"').form_input('total_occupants_male','','id="total_occupants_male" placeholder=" "');?>  -->
                 <!-- <?= form_label('Female','','for="total_occupants_female"').form_input('total_occupants_female','','id="total_occupants_female" placeholder=" "');?>  -->
            </fieldset>
        </div>
        <div class="col-xs-6 ">
            <fieldset>
                <legend>Total number of Tenured Migrant</legend>
                <div class="col-xs-12 col-lg-4">
                    <ul><li>
                    <?= form_label('Male','','for="migrant_male"').form_input('migrant_male',$pamain->no_migrant_male,'id="migrant_male" onchange="calc_migrant()" onkeyup=run(this) placeholder=" "');?>
                    </li></ul>
                </div> 
                <div class="col-xs-12 col-lg-4">
                    <ul><li>
                    <?= form_label('Female','','for="migrant_female"').form_input('migrant_female',$pamain->no_migrant_female,'id="migrant_female" onchange="calc_migrant()" onkeyup=run(this) placeholder=" "');?>
                    </li></ul>
                </div>
                <div class="col-xs-12 col-lg-4">
                    <ul><li>
                    <?= form_label('Total','','for="migrant"').form_input('migrant',$pamain->no_tenured_migrant,'placeholder=" " id="migrant" onkeyup=run(this) readonly="readonly"');?>
                    </li></ul>
                </div>
            </fieldset>
        </div>
        <div class="col-xs-12">
        <fieldset>
            <legend>Indigenous Cultural Community/Indigenous People</legend>
            <div class="col-xs-12 ">                            
                <fieldset>
                    <div class="col-xs-12 col-lg-2 ">
                        <?= form_label('ICCs/IPs Community','','style="margin:20px"')?>
                    </div>
                    <div class="col-xs-12 col-lg-4 ">
                        <?= form_dropdown('iccsips',$tribelist,'',' id="iccsips" style="margin-top:20px;"') ?>
                    </div>                                       
                    <div class="col-xs-12 col-lg-3">
                        <ul><li>
                            <?= form_label('Male','','for="iccip_male"').form_input('iccip_male','','placeholder=" " id="iccip_male" onkeyup=run(this)');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-3">
                        <ul><li>
                            <?= form_label('Female','','for="iccip_female"').form_input('iccip_female','','placeholder=" " id="iccip_female" onkeyup=run(this)');?>
                        </li></ul>
                    </div>
                </fieldset>  
            </div>
        	<div class="col-xs-12 ">
        	    <a type="text" class="btn btn-primary" id="saveips">Add data</a>
        	</div>
        	<div class="col-xs-12 ">
        	    <div class="table-responsive large-tables">
        	        <table id="tblip" class="content-table">
        	            <thead>
        	                <tr>
        	                    <th>ICCs/IPs</th>
        	                    <th>No. of Male</th>
        	                    <th>No. of Female</th>
        	                    <th>Total</th>
        	                    <th></th>
        	                </tr>
        	            </thead>
        	            <tbody id="tbodyiccip"></tbody>
        	        </table>
        	        <table id="tblip_sample" class="content-table">
        	            <tbody id="tbodyiccip_sample"></tbody>
        	        </table>
        	    </div>
        	</div>
        </fieldset>     
        </div>                                   
        <div class="col-xs-12 hidden">
	        <fieldset>
		       	<legend>Supporting Documents</legend>                            
		       	<div class="col-xs-12">
		       	    <div class="col-xs-12">
		       	        <div class="col-xs-12 col-lg-12 ">
		       	            <p>Upload Socio-Economic Assessment and Monitoring System (SEAMS) form with data in <span style="color:red">PDF format</span>.</p>
		       	                <li>Form 3 : Summary per Municipality</li>
		       	                <li>Form 5 : Official Tenured Migrants</li>
		       	                <li>Form 6 : Questionnaire Form for Indigenous People (IP)</li>
		       	            <hr>                            
		       	        </div>
		       	    </div>
		       	    <div class="col-xs-12 ">                                    
		       	        <div class="col-xs-12 col-lg-6">
		       	            <ul><li>
		       	            <?= form_label('Filename','','for="econdesc"').form_input('econdesc','','placeholder=" " id="econdesc"') ?>
		       	            </li></ul>
		       	        </div>                                                              
		       	        <div class="col-xs-12 col-lg-6">
		       	            <ul><li>                                    
		       	            <input type='file' name="economicfile" id="economicfile" style="margin:20px;" /><br>
		       	            <input type="hidden" name="old_picture" value="nophoto.jpg" />
		       	            </li></ul> 
		       	        </div>
		       	    </div>                                
		       	    <div class="col-xs-12 ">                                
		       	        <div class="col-xs-12 col-lg-6">
		       	            <a type="text" class="btn btn-primary" id="addimage" onclick="inserteconprof()">Add data</a>
		       	        </div>
		       	    </div>
		       	    <div class="col-xs-12 ">
		       	        <div class="table-responsive large-tables"><br>
		       	            <table id="tblecon" class="table  table-bordered tglobal">
		       	                <thead>
		       	                    <tr>
		       	                        <th>PDF</th>                                                        
		       	                        <th>Filename</th> 
		       	                        <th><span class="glyphicon glyphicon-trash"></span></th>
		       	                    </tr>
		       	                </thead>
		       	                <tbody id="tbodyeconprof"></tbody>
		       	            </table>
		       	        </div>
		       	    </div>
		       	</div>
	        </fieldset>
    	</div>
    </div>
</div>

<form method="post" action="" id="EditBDFEForms" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfeform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Biodiversity-friendly enterprise Information</h4>
                </div>
                <input type="hidden" id="bdfeform-id" name="bdfeform-id" value="" />
                <input type="hidden" id="bdfeform-gencode" name="bdfeform-gencode" value="" />
                <input type="hidden" id="bdfeform-gencode2" name="bdfeform-gencode2" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div class="col-xs-12">
                            <fieldset>                
                                <div class="col-xs-12 col-lg-12">
                                    <div id="edit-uploaded_images_bdfe"></div>
                                </div>
                                <div class="col-xs-12 col-lg-12 col-md-12">
                                    <label>Upload map images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type="file" name="edit-files_bdfe_image" id="edit-files_bdfe_image" />
                                    <input type="text" name="edit-files_bdfe_imagetext" id="edit-files_bdfe_imagetext" class="hidden" />
                                    <input type="text" name="edit-files_bdfe_imagetext_old" id="edit-files_bdfe_imagetext_old" class="hidden" />
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 tooltip">
                            <fieldset>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile <i>(note: zip and rar file; and maximum of 200mb only)</i></legend>
                                <input type='file' name="edit-zip_shpfile_bdferesource" id="edit-zip_shpfile_bdferesource" onchange="readURLshapefilebdferesourcesEdit(this);"  />
                                <input type="hidden" name="edit-zip_shpfile_bdferesource_text" id="edit-zip_shpfile_bdferesource_text">
                                <input type="hidden" name="edit-zip_shpfile_bdferesource_old" id="edit-zip_shpfile_bdferesource_old">
                                <div id="edit-zip_shpfile_bdferesource_div"></div>
                                <span class="tooltiptext">Spatial data in shapefile</span>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?php echo form_label('Name of Enterprise','','for="edit-lhName"').form_input('edit-lhName','','id="edit-lhName"'); ?>
                                    <span class="tooltiptext">Input name of enterprise</span>
                                </li></ul>
                            </div>                             
                        </div> 
                        <div class="col-xs-12 col-lg-12"> 
                            <fieldset> <legend>People Organization</legend>    
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Name of PO','','for="edit-lh_po_assisted"').form_input('edit-lh_po_assisted','','id="edit-lh_po_assisted"'); ?>
                                        <span class="tooltiptext">Input name of people organization</span>
                                    </li></ul>
                                </div> 
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>                                    
                                        <?= form_label('Contact Number','','for="edit-lh_mobile"').form_input('edit-lh_mobile','','id="edit-lh_mobile"'); ?>
                                        <span class="tooltiptext">Input contact number (if any)</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-1 col-lg-1">
                                    <a type="text" class="btn btn-warning" id="addbdfeponamesEdit">Add PO</a>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div id="ponamedivs"></div>
                                </div>            
                            </fieldset>   
                            </div> 
                            <div class="col-xs-12">  
                                <div class="col-xs-12 col-lg-4 tooltip">    
                                    <ul><li>                              
                                        <?php echo form_label('Date of Registration').form_dropdown('edit-dateregismonth',$monthList,'',' id="edit-dateregismonth" ') ?>
                                        <span class="tooltiptext">Select month of registration</span>
                                    </li></ul>  
                                </div>                                    
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('edit-dateregisday',$dayList,'',' id="edit-dateregisday"') ?>
                                        <span class="tooltiptext">Select day of registration</span>
                                    </li></ul>
                                </div>                                    
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('edit-dateregisyear',$yearListed,'',' id="edit-dateregisyear" ') ?>
                                        <span class="tooltiptext">Select year of registration</span>
                                    </li></ul>
                                </div>                                                      
                            </div>                     
                            <div class="col-xs-12 ">  
                                <div class="col-xs-12 col-lg-4 tooltip"> 
                                    <ul><li>                                   
                                        <?php echo form_label('Type of Registration').form_dropdown('edit-typeregis',$bdfetyperegistration,'',' id="edit-typeregis" ') ?>
                                        <span class="tooltiptext">Select type of registration</span>
                                    </li></ul>
                                </div>                                        
                                <div class="col-xs-12 col-lg-4 tooltip" id="edit-registrationdiv" style="display: none">
                                    <ul><li>                                   
                                        <?php echo form_label('Specify others').form_input('edit-typeregis_others','','id="edit-typeregis_others" ') ?>
                                        <span class="tooltiptext">Specify other type of registration</span>
                                    </li></ul>
                                </div>                                        
                            </div>                          
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Types of Enterprise</legend>
                            <div class="col-xs-12 col-lg-6 tooltip">
                                <ul><li>
                                    <?php echo form_label('&nbsp;','for="edit-liveproducts"').form_dropdown('edit-liveproducts',$lh_products,'','id="edit-liveproducts" ') ?>
                                    <span class="tooltiptext">Select type of enterprises</span>
                                </li></ul>
                            </div>
                             <div class="col-xs-12 col-lg-6 tooltip">
                                <ul><li>
                                    <?php echo form_label('&nbsp;','for="edit-lh_type"').form_dropdown('edit-lh_type','','','id="edit-lh_type" ') ?>
                                    <span class="tooltiptext">Select sub type of enterprises</span>
                                </li></ul>
                            </div>      
                            <div class="col-xs-12 col-lg-12 tooltip" id="edit-lhcatother" style="display: none">
                                <ul><li>
                                    <?php echo form_label('Specify Others','for="edit-lh_cat_others"').form_input('edit-lh_cat_others','','id="edit-lh_cat_others"') ?>
                                    <span class="tooltiptext">Specify other type of enterprises</span>
                                </li></ul>
                            </div>             
                        </fieldset>  
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Location of PO office</legend>
                            <div class="col-xs-12 col-lg-3 tooltip">
                                <ul><li>
                                    <?php echo form_label('Region','','for="edit-lh_reg_office"').form_dropdown('edit-lh_reg_office',$region_demoList,'',' id="edit-lh_reg_office" class="regid"') ?> 
                                    <span class="tooltiptext">Select region</span>   
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3 tooltip">
                                <ul><li>
                                    <?php echo form_label('Province','','for="edit-lh_prov_office"').form_dropdown('edit-lh_prov_office','','',' id="edit-lh_prov_office" class="provid"') ?>
                                    <span class="tooltiptext">Select province</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3 tooltip">
                                <ul><li>
                                    <?php echo form_label('Municipality','','for="edit-lh_mun_office"').form_dropdown('edit-lh_mun_office','','',' id="edit-lh_mun_office" class="munid"') ?>
                                    <span class="tooltiptext">Select municipality</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-3 tooltip">
                                <ul><li>
                                    <?php echo form_label('Barangay','','for="edit-lh_barangay_office"').form_dropdown('edit-lh_barangay_office','','',' id="edit-lh_barangay_office" class="barid"') ?>
                                    <span class="tooltiptext">Select barangay</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <table class="content-table">                                          
                                    <tbody>
                                        <tr>
                                            <td>Longitude</td>
                                            <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-lh_dmstodd_indi','','id="edit-lh_dmstodd_indi" class="number-separator"')?></li></ul></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul><li>                                                            
                                                                    <?php echo form_label('Direction','for="edit-lh_long_direction_indi"').form_dropdown('edit-lh_long_direction_indi',$direct_long,'',' id="edit-lh_long_direction_indi"'); ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?php echo form_label('Degree (°)','for="edit-lh_long_deg_indi"').form_input('edit-lh_long_deg_indi','','id="edit-lh_long_deg_indi" class="number-separator edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?php echo form_label('Minute (ˈ)','for="edit-lh_long_min_indi"').form_input('edit-lh_long_min_indi','','id="edit-lh_long_min_indi" class="number-separator edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                            <td>
                                                                <ul><li>
                                                                    <?php echo form_label('Second (")','for="edit-lh_long_sec_indi"').form_input('edit-lh_long_sec_indi','','id="edit-lh_long_sec_indi" class="number-separator edmstodd"') ?>
                                                                </li></ul>
                                                            </td>
                                                        </tr>                                        
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Latitude</td>
                                                <td width="">
                                                <table class="content-table">
                                                    <tbody>
                                                    <tr>
                                                        <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('edit-lh_dmstodd2_indi','','id="edit-lh_dmstodd2_indi" class="number-separator"') ?></li></ul></td>
                                                        <td class="hidden"><?php echo form_button('en','Enable/Disable','class="lh_latd_indi"') ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Direction','for="edit-lh_lat_direction_indi"').form_dropdown('edit-lh_lat_direction_indi',$direct_lat,'',' id="edit-lh_lat_direction_indi"'); ?>
                                                            </li></ul>
                                                            </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Degree (°)','for="edit-lh_lat_deg_indi"').form_input('edit-lh_lat_deg_indi','','id="edit-lh_lat_deg_indi" class="number-separator edmstodd"') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Minute (ˈ)','for="edit-lh_lat_min_indi"').form_input('edit-lh_lat_min_indi','','id="edit-lh_lat_min_indi" class="number-separator edmstodd" ') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Second (")','for="edit-lh_lat_sec_indi"').form_input('edit-lh_lat_sec_indi','','id="edit-lh_lat_sec_indi" class="number-separator edmstodd"') ?>
                                                            </li></ul>
                                                        </td>
                                                    </tr>                                    
                                                </tbody>
                                            </table>
                                            </td>
                                        </tr>                                                
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                        <div class="col-xs-12">
                           <!--  <div class="col-xs-12 col-lg-12 tooltip">  
                                <ul><li>            
                                    <?php echo form_label('Total area used (has)','','for="edit-lh_area"').form_input('edit-lh_area','','id="edit-lh_area" class="number-separator"') ?>
                                    <span class="tooltiptext">Input total area used (hectares)</span>
                                </li></ul>              
                            </div>  --> 
                             <div class="col-xs-12 col-lg-12">  
                                <div class="col-xs-12 col-lg-4 tooltip"> 
                                    <ul><li>                                  
                                        <?php echo form_label('Date of inclusion to PO inventory').form_dropdown('edit-lh_month_inclusion',$monthList,'',' id="edit-lh_month_inclusion" ') ?>
                                        <span class="tooltiptext">Select month of inclusion</span>
                                    </li></ul> 
                                </div>                                    
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('edit-lh_day_inclusion',$dayList,'',' id="edit-lh_day_inclusion"') ?>
                                        <span class="tooltiptext">Select day of inclusion</span>
                                    </li></ul>
                                </div>                                    
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('edit-lh_year_inclusion',$yearListed,'',' id="edit-lh_year_inclusion" ') ?>
                                        <span class="tooltiptext">Select year of inclusion</span>
                                    </li></ul>
                                </div>                                                      
                            </div>          
                        </div>   
                        <div class="col-xs-12">         
                            <div class="col-xs-12 col-lg-12">  
                                <div class="col-xs-12 col-lg-4 tooltip"> 
                                    <ul><li>                                  
                                        <?php echo form_label('Date of Rapid Assessment').form_dropdown('edit-lh_month_rapassess',$monthList,'',' id="edit-lh_month_rapassess" ') ?>
                                        <span class="tooltiptext">Select month of Rapid Assessment</span>
                                    </li></ul> 
                                </div>                                    
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('edit-lh_day_rapassess',$dayList,'',' id="edit-lh_day_rapassess"') ?>
                                        <span class="tooltiptext">Select day of Rapid Assessment</span>
                                    </li></ul>
                                </div>                                    
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('edit-lh_year_rapassess',$yearListed,'',' id="edit-lh_year_rapassess" ') ?>
                                        <span class="tooltiptext">Select year of Rapid Assessment</span>
                                    </li></ul>
                                </div>                                                      
                            </div>          
                        </div>   
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label("Score (Numerical number)",'for="edit-lh_score"').form_input('edit-lh_score','','id="edit-lh_score" class="number-separator"') ?>
                            </li></ul>
                        </div>    
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Description','for="edit-lh_type_desc"').form_textarea('edit-lh_type_desc','','id="edit-lh_type_desc"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 " style="margin-top:10px">
                            <div class="col-xs-12 ">
                                <div class="modal-footer">                                    
                                    <button class="btn btn-info" type="button" onclick="updatebdfeinfor();" />Update
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="demoForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-demo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Demographic Information</h4>
                </div>
                <input type="hidden" id="demo-id" name="demo-id" value="" />
                <input type="hidden" id="demo-gencode" name="demo-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-9 ">
                            <ul><li>
                                <?php echo form_label('Name of Household Head','','for="edit_seams_name_head"').form_input('edit_seams_name_head','','placeholder="Fullname of household head" id="edit_seams_name_head"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-3 ">
                            <ul><li>
                                <?= form_label('Sex','','for="edit_seams_sex"').form_dropdown('edit_seams_sex',$sexList,'',' id="edit_seams_sex" required');?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Total Household Member (Including household head)</legend>
                            <div class="col-xs-6 col-lg-6 ">
                                <ul><li>
                                    <?php echo form_label('Male','','for="edit_seams_male"').form_input('edit_seams_male','','placeholder="Total Male" id="edit_seams_male" class="number-separator"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 ">
                                <ul><li>
                                    <?= form_label('Female','','for="edit_seams_female"').form_input('edit_seams_female','','placeholder="Total Female" id="edit_seams_female" class="number-separator"');?>
                                </li></ul>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12">
                        <ul><li>
                            <?= form_label('Indigenous Cultural Community/Indigenous People','','id="edit-select_iccsips"').form_dropdown('edit-select_iccsips',$tribelist,'',' id="edit-select_iccsips"') ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_checkbox('edit-tenure_migrantyns','','','id="edit-tenure_migrantyns"').form_label('Tenured Migrant','','for="edit-tenure_migrantyns"') ?>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_checkbox('edit-ip_recognize','','','id="edit-ip_recognize"').form_label('IP is recognized by NCIP','','for="edit-ip_recognize"') ?>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_checkbox('edit-ip_inside_pa','','','id="edit-ip_inside_pa"').form_label('Inside Protected Area','','for="edit-ip_inside_pa"') ?>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_checkbox('edit-ip_outside_pa','','','id="edit-ip_outside_pa"').form_label('Outside Protected Area','','for="edit-ip_outside_pa"') ?>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12">
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Total Area</legend>
                            <div class="col-xs-6 col-lg-3 ">
                                <ul><li>
                                    <?php echo form_label('Farmlot (has)','','for="edit_seams_farmlot"').form_input('edit_seams_farmlot','','placeholder="Total area farmlot" class="number-separator" onkeyup="CalculatedemographEdit()"  id="edit_seams_farmlot"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-3 ">
                                <ul><li>
                                    <?php echo form_label('Homelot (has)','','for="edit_seams_homelot"').form_input('edit_seams_homelot','','placeholder="Total area homelot" class="number-separator" onkeyup="CalculatedemographEdit()"  id="edit_seams_homelot"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-3 ">
                                <ul><li>
                                    <?php echo form_label('Other Uses (has)','','for="edit_seams_otheruses"').form_input('edit_seams_otheruses','','placeholder="Total area other uses" onkeyup="CalculatedemographEdit()"  id="edit_seams_otheruses" class="number-separator"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-3 ">
                                <ul><li>
                                    <?php echo form_label('Occupied (has)','','for="edit_seams_occupied"').form_input('edit_seams_occupied','','placeholder="Total area occupied"  id="edit_seams_occupied" readonly') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <?= form_checkbox('edit_whf','','','id="edit_whf"').form_label('Homelot within Farmlot','','for="edit_whf"') ?>
                            </div>
                        </fieldset>
                    </div>
                    <!-- <div class="col-xs-12"> -->
                        <fieldset>
                                <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Coordinates (point location)</legend>
                                <!-- <div class="col-xs-12"> -->
                                    <!-- <div class="col-xs-12 col-lg-12"> -->
                                        <table class="content-table">
                                            <tbody>
                                                <tr>
                                                    <td>Longitude</td>
                                                    <td width="">
                                                        <table class="content-table">
                                                            <tbody>
                                                                <tr><td>Decimal Degree</td><td colspan="3"><ul><li><?= form_input('edit-ddlongoutputdemo','','id="edit-ddlongoutputdemo"') ?></li></ul></td></tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Direction','for=""').form_dropdown('edit-longitude_dms_direction',$direct_long,'',' id="edit-longitude_dms_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="edit-longitude_dms_degrees"').form_input('edit-longitude_dms_degrees','','id="edit-longitude_dms_degrees" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="edit-longitude_dms_minutes"').form_input('edit-longitude_dms_minutes','','id="edit-longitude_dms_minutes" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="edit-longitude_dms_seconds"').form_input('edit-longitude_dms_seconds','','id="edit-longitude_dms_seconds" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Latitude</td>
                                                    <td width="">
                                                        <table class="content-table">
                                                            <tbody>
                                                                <tr><td>Decimal Degree</td><td colspan="3"><ul><li><?= form_input('edit-ddlatoutputdemo','','id="edit-ddlatoutputdemo"') ?></li></ul></td></tr>
                                                                <tr>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Direction','for=""').form_dropdown('edit-latitude_dms_direction',$direct_lat,'',' id="edit-latitude_dms_direction"'); ?>
                                                                        </li></ul>
                                                                        </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Degree (°)','for="edit-latitude_dms_degrees"').form_input('edit-latitude_dms_degrees','','id="edit-latitude_dms_degrees" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Minute (ˈ)','for="edit-latitude_dms_minutes"').form_input('edit-latitude_dms_minutes','','id="edit-latitude_dms_minutes" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                    <td>
                                                                        <ul><li>
                                                                            <?= form_label('Second (")','for="edit-latitude_dms_seconds"').form_input('edit-latitude_dms_seconds','','id="edit-latitude_dms_seconds" class="edmstodd"') ?>
                                                                        </li></ul>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <!-- </div>                                     -->
                                <!-- </div> -->
                            </fieldset>
                    <!-- </div> -->
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Current file attached','','for="zip_shp_file_demo"')?>
                                <a href="" id="zip_shp_file_demo" target="_blank"></a>

                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('File attached','','for="edit-zipSHPdemo"')?>
                                <input type='file' name="edit-zipSHPdemo" id="edit-zipSHPdemo" style="margin:20px;" /><br>
                                <input  name="edit-old_zipSHPdemo" id="edit-old_zipSHPdemo" type="hidden">
                                <span>Upload file</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Date Occupancy</legend>
                            <div class="col-xs-6 col-lg-6 ">
                                <ul><li>
                                    <?php echo form_label('Month','','for=""').form_dropdown('edit_seams_date_month',$monthList,'',' id="edit_seams_date_month"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 ">
                                <ul><li>
                                    <?php echo form_label('Year','','for=""').form_dropdown('edit_seams_date_year',$yearListed,'',' id="edit_seams_date_year"') ?>
                                </li></ul>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12">
                        <ul><li>
                            <?= form_label('Remarks','', 'for="seams_remarks"').form_textarea('edit_seams_remarks','','placeholder="Remarks" id="edit_seams_remarks"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateContri" onclick="Updatedemo();" /> -->
                                <button class="btn btn-info" type="button" onclick="Updatedemo();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<form method="post" action="" id="AddBDFEenhancement" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfeenhancement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add BDFE Enhancement</h4>
                </div>
                <input type="hidden" id="enhancement-id" name="enhancement-id" value="" />
                <input type="hidden" id="enhancement-gencode" name="enhancement-gencode" value="" />
                <input type="hidden" id="enhancement-gencode2" name="enhancement-gencode2" value="" />
                <input type="hidden" id="enhancement-gencode3" name="enhancement-gencode3" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12">
                        <div class="tab">
                            <a class="tablinktechnicalassistance active" onclick="tabtechnical(event, 'tabsta')" id="defaultOpen">Technical Assistance</a>
                            <a class="tablinktechnicalassistance" id="loadeconomic" onclick="tabtechnical(event, 'tabsfa')">Financial Assistance</a>
                            <a class="tablinktechnicalassistance" id="loadeconomic" onclick="tabtechnical(event, 'tabsoss')">Other Source of Assistance</a>
                        </div>
                    </div>
                    <div id="tabsta" class="tabcontenttechnicalassistance">
                    <!-- <fieldset> -->
                        <div id="poenterprisename7"></div>
                        <div id="techassisdiv">
                            <div class="col-lg-12">
                                <fieldset>
                                <div class="col-lg-12 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Assisting Organization').form_input('ta_ao_txt','','id="ta_ao_txt"'); ?>
                                        <span class="tooltiptext">Assistance provided by different entities in terms of technical/operational aspects of the enterprise</span>
                                    </li></ul>
                                </div>
                                <fieldset>
                                    <legend>Sex Disaggregated Data</legend>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="col-xs-6 col-lg-6">
                                            <?= form_label('Male').form_input('ta_male','','id="ta_male" class="number-separator"') ?>
                                        </div>
                                        <div class="col-xs-6 col-lg-6">
                                            <?= form_label('Female').form_input('ta_female','','id="ta_female" class="number-separator"') ?>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="col-lg-12">
                                    <fieldset><legend>Multiple entry</legend>
                                        <div class="col-lg-12">
                                            <ul><li>
                                                <?php echo form_label('Type of Assistance').form_input('ta_type_assistance','','id="ta_type_assistance"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <a type="text" class="btn btn-warning" id="ta_add_type_assistance">Add type of assistance</a>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <table id="tbbdfeTA_typeassistance" class="content-table">
                                                <thead>
                                                    <tr style="background-color: #000">
                                                        <th colspan="2">Type of assistance list</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodybdfeTA_typeassistance"></tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <ul><li>
                                        <?php echo form_label('Duration').form_input('ta_duration','','id="ta_duration" class="number-separator"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('Date').form_dropdown('ta_date_month',$monthList,'','id="ta_date_month"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('ta_date_year',$yearList,'','id="ta_date_year"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <a type="text" class="btn btn-primary" id="ta_add_tech_assist">Add technical assistance</a>
                                </div>
                                <div class="col-xs-12 ">
                                    <table id="tbbdfeTA_tech_assist" class="content-table">
                                        <thead>
                                            <tr>
                                                <th colspan="3">Technical Assistance</th>
                                            </tr>
                                            <tr>
                                                <td>Details</td>
                                                <td>Type of Assistance</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodybdfeTA_tech_assist"></tbody>
                                    </table>
                                </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div id="tabsfa" class="tabcontenttechnicalassistance" style="display: none">
                        <div class="col-lg-12">
                            <fieldset>
                            <div class="col-lg-12 tooltip">
                                <ul><li>
                                    <?php echo form_label('Assisting Organization').form_input('fa_ao_txt','','id="fa_ao_txt"'); ?>
                                    <span class="tooltiptext">Assistance provided by different entities in terms of technical/operational aspects of the enterprise</span>
                                </li></ul>
                            </div>
                            <div class="col-lg-12">
                                <fieldset><legend>Multiple entry</legend>
                                    <div class="col-lg-12">
                                        <ul><li>
                                            <?php echo form_label('Type of Assistance').form_input('fa_type_assistance','','id="fa_type_assistance"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-lg-12">
                                        <ul><li>
                                            <?php echo form_label('Specify Amount (Php)').form_input('fa_amount','','id="fa_amount" class="number-separator"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <a type="text" class="btn btn-warning" id="fa_add_type_assistance">Add type of assistance</a>
                                    </div>
                                    <div class="col-xs-12 ">
                                        <table id="tbbdfeFA_typeassistance" class="content-table">
                                            <thead>
                                                <tr style="background-color: #000">
                                                    <th colspan="2">Type of assistance list</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodybdfeFA_typeassistance"></tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Duration').form_input('fa_duration','','id="fa_duration" class="number-separator"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-lg-6">
                                <ul><li>
                                    <?php echo form_label('Date').form_dropdown('fa_date_month',$monthList,'','id="fa_date_month"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-lg-6">
                                <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('fa_date_year',$yearList,'','id="fa_date_year"'); ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                    <label>Upload Proposal file <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="efaproposal" id="efaproposal" onchange="readURLefaproposalfileupload(this);"  />
                                    <input type="hidden" id="efaproposal_span" name="efaproposal_span">
                                <div id="fefaproposaluploadfile"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                    <label>Upload Approved Work and Financial Plan (WFP) file <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="efawfpfile" id="efawfpfile" onchange="readURLefawfpfileupload(this);"  />
                                    <input type="hidden" id="efawfpfile_span" name="efawfpfile_span">
                                <div id="efawfpfileuploadfile"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12" style="margin-top:20px">
                                    <a type="text" class="btn btn-primary" id="fa_add_tech_assist">Add financial assistance</a>
                                </div>
                                <div class="col-xs-12 ">
                                    <table id="tbbdfeFA_tech_assist" class="content-table">
                                        <thead>
                                            <tr>
                                                <th colspan="4">Financial Assistance</th>
                                            </tr>
                                            <tr>
                                                <td>Details</td>
                                                <td>Type of Assistance and Amount(Php)</td>
                                                <td>File attached</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodybdfeFA_tech_assist"></tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div id="tabsoss" class="tabcontenttechnicalassistance" style="display: none">
                        <div class="col-lg-12">
                            <fieldset>
                                <div class="col-lg-12 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Assisting Organization').form_input('oss_ao_txt','','id="oss_ao_txt"'); ?>
                                        <span class="tooltiptext">Assistance provided by different entities in terms of other relevant aspect of the enterprise</span>
                                    </li></ul>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset><legend>Multiple entry</legend>
                                        <div class="col-lg-12">
                                            <ul><li>
                                                <?php echo form_label('Type of Assistance').form_input('oss_type_assistance','','id="oss_type_assistance"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul><li>
                                                <?php echo form_label('Monetary Value (if any)').form_input('oss_amount','','id="oss_amount"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <a type="text" class="btn btn-warning" id="oss_add_type_assistance">Add type of assistance</a>
                                        </div>
                                        <div class="col-xs-12 ">
                                            <table id="tbbdfeoss_typeassistance" class="content-table">
                                                <thead>
                                                    <tr style="background-color: #000">
                                                        <th colspan="2">Type of assistance list</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodybdfeoss_typeassistance"></tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <ul><li>
                                        <?php echo form_label('Duration').form_input('oss_duration','','id="oss_duration" class="number-separator"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('Date').form_dropdown('oss_date_month',$monthList,'','id="oss_date_month"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('oss_date_year',$yearList,'','id="oss_date_year"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <a type="text" class="btn btn-primary" id="oss_add_tech_assist">Add Other source of assistance</a>
                                </div>
                                <div class="col-xs-12 ">
                                    <table id="tbbdfeoss_tech_assist" class="content-table">
                                        <thead>
                                            <tr>
                                                <th colspan="3">Other Source of Assistance</th>
                                            </tr>
                                            <tr>
                                                <td>Details</td>
                                                <td>Type of Assistance and Monetary value</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodybdfeoss_tech_assist"></tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!-- </fieldset> -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="AddBDFEPONAME" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfeponame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add BDFE Peoples Organization</h4>
                </div>
                <input type="hidden" id="bdfeponame-id" name="bdfeponame-id" value="" />
                <input type="hidden" id="bdfeponame-gencode" name="bdfeponame-gencode" value="" />
                <input type="hidden" id="bdfeponame-gencode2" name="bdfeponame-gencode2" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 col-lg-12"> 
                        <input type="text" name="bdfepocodesgen" class="hidden" id="bdfepocodesgen">
                        <fieldset> <legend>People Organization</legend>    
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?php echo form_label('Name of PO','','for="lh_po_assisted"').form_input('lh_po_assisted','','id="lh_po_assisted"'); ?>
                                    <span class="tooltiptext">A group of people, which may be an association, cooperative, federation, or other legal entity, established by the community to undertake collective action to address community concerns and need, and mutually share the benefits from the endeavor.</span>
                                </li></ul>
                            </div> 
                            <fieldset>
                                <legend>Contact details</legend>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>                                    
                                        <?= form_label('Contact Number','','for="lh_mobile"').form_input('lh_mobile','','id="lh_mobile"'); ?>
                                        <span class="tooltiptext">Input contact number (if any)</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>                                    
                                        <?= form_label('Email Address','','for="lh_emailaddress"').form_input('lh_emailaddress','','id="lh_emailaddress"'); ?>
                                        <span class="tooltiptext">Input email address (if any)</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>                                    
                                        <?= form_label('Social Media','','for="lh_socialmedia"').form_input('lh_socialmedia','','id="lh_socialmedia"'); ?>
                                        <span class="tooltiptext">Input Social Media (if any)</span>
                                    </li></ul>
                                </div>
                            </fieldset>
                            
                            <div class="col-xs-12 col-lg-12 tooltip">
                               <fieldset><legend style="background-color:#e6b3ff">History of status</legend>
                                    <div class="col-xs-12 col-lg-4 tooltip">    
                                        <ul><li>                              
                                            <?php echo form_label('Status').form_dropdown('lh_po_status',$lhpostatus,'',' id="lh_po_status" ') ?>
                                            <span class="tooltiptext">Select Status</span>
                                        </li></ul>  
                                    </div>
                                    <div class="col-xs-12 col-lg-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('As of (year)').form_input('lh_po_asyear','','id="lh_po_asyear" ') ?>                    
                                        </li></ul>  
                                    </div>
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Remarks').form_textarea('lh_pos_remarks','','id="lh_pos_remarks" ') ?>                    
                                        </li></ul>  
                                    </div>
                                    <div class="col-xs-1 col-lg-1">
                                        <a type="text" class="btn btn-warning" style="background-color: #e6b3ff !important;" id="addbdfeponameshistory">Add history of status</a>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="table-responsive large-tables">
                                            <table id="tblbdfeponamehistory" class="content-table table-line-border">        
                                                <tbody id="tbodybdfeponamehistory"></tbody>
                                            </table>
                                        </div>
                                    </div>  
                                </fieldset>
                            </div>
                            <div class="col-xs-1 col-lg-1">
                                <a type="text" class="btn btn-warning" style="background-color: #43D1AF !important;" id="addbdfeponames">Add PO</a>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <div class="table-responsive large-tables">
                                    <table id="tblbdfeponame" class="content-table table-line-border">                        
                                        <thead><tr><th>Name of PO</th><th>Contact No.</th><th>Status</th><th>Action</th></tr></thead>
                                        <tbody id="tbodybdfeponame"></tbody>
                                    </table>
                                </div>              
                            </div>            
                        </fieldset>   
                    </div> 
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="editBDFEPONAME" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-editbdfeponame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit BDFE Peoples Organization</h4>
                </div>
                <input type="hidden" id="editbdfeponame-id" name="editbdfeponame-id" value="" />
                <input type="hidden" id="editbdfeponame-gencode" name="editbdfeponame-gencode" value="" />
                <input type="hidden" id="editbdfeponame-gencode2" name="editbdfeponame-gencode2" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 col-lg-12"> 
                        <input type="text" name="editbdfepocodesgen" class="hidden" id="editbdfepocodesgen">
                        <fieldset> <legend>People Organization</legend>    
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>
                                    <?php echo form_label('Name of PO','','for="edit-lh_po_assisteds"').form_input('edit-lh_po_assisteds','','id="edit-lh_po_assisteds"'); ?>
                                    <span class="tooltiptext">A group of people, which may be an association, cooperative, federation, or other legal entity, established by the community to undertake collective action to address community concerns and need, and mutually share the benefits from the endeavor.</span>
                                </li></ul>
                            </div> 
                            <div class="col-xs-12 col-lg-12 tooltip">
                                <ul><li>                                    
                                    <?= form_label('Contact Number','','for="edit-lh_mobiles"').form_input('edit-lh_mobiles','','id="edit-lh_mobiles"'); ?>
                                    <span class="tooltiptext">Input contact number (if any)</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>                                    
                                        <?= form_label('Email Address','','for="edit-lh_emailaddress"').form_input('edit-lh_emailaddress','','id="edit-lh_emailaddress"'); ?>
                                        <span class="tooltiptext">Input email address (if any)</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12 tooltip">
                                    <ul><li>                                    
                                        <?= form_label('Social Media','','for="edit-lh_socialmedia"').form_input('edit-lh_socialmedia','','id="edit-lh_socialmedia"'); ?>
                                        <span class="tooltiptext">Input Social Media (if any)</span>
                                    </li></ul>
                                </div>
                            <div class="col-xs-12 col-lg-12 tooltip">
                               <fieldset><legend style="background-color:#e6b3ff">History of status</legend>
                                    <div class="col-xs-12 col-lg-4 tooltip">    
                                        <ul><li>                              
                                            <?php echo form_label('Status').form_dropdown('edit-lh_po_status',$lhpostatus,'',' id="edit-lh_po_status" ') ?>
                                            <span class="tooltiptext">Select Status</span>
                                        </li></ul>  
                                    </div>
                                    <div class="col-xs-12 col-lg-4 tooltip">
                                        <ul><li>
                                            <?php echo form_label('As of (year)').form_input('edit-lh_po_asyear','','id="edit-lh_po_asyear" ') ?>                    
                                        </li></ul>  
                                    </div>
                                    <div class="col-xs-12 col-lg-12 tooltip">
                                        <ul><li>
                                            <?php echo form_label('Remarks').form_textarea('edit-lh_pos_remarks','','id="edit-lh_pos_remarks" ') ?>                    
                                        </li></ul>  
                                    </div>
                                    <div class="col-xs-1 col-lg-1">
                                        <a type="text" class="btn btn-warning" style="background-color: #e6b3ff !important;" id="addeditbdfeponameshistory">Add history of status</a>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div id="ponamehistorydiv"></div>  
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12" style="margin-top: 10px">
                                <button class="btn btn-info" style="background-color: #43D1AF !important;" type="button" onclick="Updatebdfeponames();" />Update
                            </div>                                 
                        </fieldset>   
                    </div> 
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="AddBDFEPOsupportingmatForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfesupportingmat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add BDFE Supporting Materials</h4>
                </div>
                <input type="hidden" id="supportingmat-id" name="supportingmat-id" value="" />
                <input type="hidden" id="supportingmat-gencode" name="supportingmat-gencode" value="" />
                <input type="hidden" id="supportingmat-gencode2" name="supportingmat-gencode2" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div id="poenterprisename6"></div>
                        <div class="col-xs-12 col-lg-12">
                            <label>Upload images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="supportmaterialphotodoc" id="supportmaterialphotodoc" onchange="readURLsupportmatphotodoc(this);" />
                            <input type="hidden" id="supportmaterialphotodoc_span" name="supportmaterialphotodoc_span"><br>
                            <div id="upload_supportmaterialphotodoc"></div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="col-xs-12 col-lg-12">
                            <fieldset>
                                <label>Upload Video documentation file <i>(*.avi, *.mp4, *.mov, *.mpg, *.mpeg format, maximum size of 200MB)</i></label>
                                <input type='file' name="uploadbdfevideodocs" id="uploadbdfevideodocs" onchange="readURLUploadvideodocs(this);"  />
                                <input type="hidden" id="uploadbdfevideodocs_spam" name="uploadbdfevideodocs_spam">
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Video documentation (add link of video documentation)').form_input('videodocs','','id="videodocs"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <a type="text" class="btn btn-warning" id="addvideolinks">Add Video documentation</a>
                        </div>
                        <div id="uploadbdfevideodocsdivs"></div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="AddBDFEPOrecognitionForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdferecognition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit BDFE Recognitions</h4>
                </div>
                <input type="hidden" id="bdferecognition-id" name="bdferecognition-id" value="" />
                <input type="hidden" id="bdferecognition-gencode" name="bdferecognition-gencode" value="" />
                <input type="hidden" id="bdferecognition-gencode2" name="bdferecognition-gencode2" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div id="poenterprisename5"></div>
                        <div class="col-xs-12 col-lg-12 hidden">
                            <?php echo form_checkbox('chk_recognitions','','','id="chk_recognitions" onclick="mychkrecognitions();"').form_label('Recognition','','for="chk_recognitions"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12" id="recogYesdiv" style="margin-top: 10px">
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Date of Endorsement').form_dropdown('date_recog_endorsement_month',$monthList,'',' id="date_recog_endorsement_month" ') ?>
                                    <span class="tooltiptext">Select date of endorsement</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('date_recog_endorsement_day',$dayList,'',' id="date_recog_endorsement_day"') ?>
                                    <span class="tooltiptext">Select date of endorsement</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('date_recog_endorsement_year',$yearListed,'',' id="date_recog_endorsement_year" ') ?>
                                    <span class="tooltiptext">Select date of endorsement</span>
                                </li></ul>
                            </div>                            
                            <div class="col-xs-12 col-lg-12">
                                <?php echo form_checkbox('chk_recognitions_validation','','','id="chk_recognitions_validation" onclick="mychkrecognitionsvalidation();"').form_label('Recognize <i>(note: check if Passed)</i>','','for="chk_recognitions_validation"') ?>
                            </div>
                            <div class="col-xs-12 col-lg-12" id="resultvalidationdiv" style="margin-top: 10px;">
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Date of Issuance of COR').form_dropdown('dateCOR_month',$monthList,'',' id="dateCOR_month" ') ?>
                                    <span class="tooltiptext">Select date of issuance of certificate of recognition</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('dateCOR_day',$dayList,'',' id="dateCOR_day"') ?>
                                    <span class="tooltiptext">Select date of issuance of certificate of recognition</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('dateCOR_year',$yearListed,'',' id="dateCOR_year" ') ?>
                                    <span class="tooltiptext">Select date of issuance of certificate of recognition</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <label>Upload copy of certificate of recognition <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="recognitionfileuploadcor" id="recognitionfileuploadcor" onchange="readURLrecognitionfileuploadcor(this);"  />
                                    <input type="hidden" id="recognitionfileuploadcor_span" name="recognitionfileuploadcor_span">
                                    <div id="findinguploadfilecor"></div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12" style="margin-top:20px">
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('Date of Validation').form_dropdown('date_recog_validation_month',$monthList,'',' id="date_recog_validation_month" ') ?>
                                        <span class="tooltiptext">Select date of validaton</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('date_recog_validation_day',$dayList,'',' id="date_recog_validation_day"') ?>
                                        <span class="tooltiptext">Select date of validaton</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 tooltip">
                                    <ul><li>
                                        <?php echo form_label('&nbsp;').form_dropdown('date_recog_validation_year',$yearListed,'',' id="date_recog_validation_year" ') ?>
                                        <span class="tooltiptext">Select date of validaton</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                    <label>Upload file result of validation <i>(*.pdf format, maximum size of 50MB)</i></label>
                                    <input type='file' name="recognitionfileupload" id="recognitionfileupload" onchange="readURLrecognitionfileupload(this);"  />
                                    <input type="hidden" id="recognitionfileupload_span" name="recognitionfileupload_span">
                                <div id="findinguploadfile"></div>
                            </div>
                        </div>
                         <div class="col-xs-12 col-lg-12" style="margin-top: 10px">
                            <button class="btn btn-info" type="button" onclick="Updatebdferecognitions();" />Update
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="BDFEappraisalForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfeappraisal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">BDFE Appraisal</h4>
                </div>
                <input type="hidden" id="bdfeappraisal-id" name="bdfeappraisal-id" value="" />
                <input type="hidden" id="bdfeappraisal-code" name="bdfeappraisal-code" value="" />
                <input type="hidden" id="bdfeappraisal-gencode" name="bdfeappraisal-gencode" value="" />
                <input type="hidden" id="bdfeappraisal-gencode2" name="bdfeappraisal-gencode2" value="" />
                <input type="hidden" id="bdfeappraisal-gencode3" name="bdfeappraisal-gencode3" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div id="poenterprisename4"></div>
                        <legend>Appraisal</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                <?php echo form_label('Date of last PO appraisal').form_dropdown('date_appraisal_month',$monthList,'',' id="date_appraisal_month" ') ?>
                                <span class="tooltiptext">Select month of last PO appraisal</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                <?php echo form_label('&nbsp;').form_dropdown('date_appraisal_day',$dayList,'',' id="date_appraisal_day"') ?>
                                <span class="tooltiptext">Select day of last PO appraisal</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                <?php echo form_label('&nbsp;').form_dropdown('date_appraisal_year',$yearListed,'',' id="date_appraisal_year" ') ?>
                                <span class="tooltiptext">Select year of last PO appraisal</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?php echo form_label('BDFE Level','','for="bdfe_level"').form_dropdown('bdfe_level',$bdfe_level,'',' id="bdfe_level"') ?>
                                <span class="tooltiptext">BDFE involves the utilization of resources leaning towards sustainability and further enhancement of resources in which the community will have an increased appreciation of biodiversity through its ecosystem services</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12" id="strengthenddiv">
                            <fieldset>
                                <legend style="background-color:#ff99bb">Strengthened File <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>Business Plan</legend>
                                        <input type='file' name="businessplan" id="businessplan" onchange="readURLstrengthenedbusinessplan(this);"  />
                                        <input type="hidden" name="businessplan_span" id="businessplan_span" class="businessplan_span" />
                                    <div id="bploadingfile"></div>
                                    </fieldset>
                                       
                                </div>
                                <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                    <fieldset>
                                        <legend>SEAMS Report</legend>                                    
                                        <div class="col-xs-12 col-lg-12">                                       
                                            <input type='file' name="seamsresult" id="seamsresult" onchange="readURLappraisaSeams(this);"  />
                                            <input type="hidden"  name="seamsresult_span" id="seamsresult_span" class="seamsresult_span" />
                                            <div id="seamsloadingfile"></div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                            <ul><li>
                                                <?= form_label('Name of File','','for="bdfeseams_filename"').form_input('bdfeseams_filename','','placeholder=" "  id="bdfeseams_filename"');?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Date conducted').form_dropdown('bdfeseams_date_month',$monthList,'',' id="bdfeseams_date_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('&nbsp;').form_dropdown('bdfeseams_date_year',$yearListed,'',' id="bdfeseams_date_year"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <ul><li>
                                                <?= form_label('Status','','for="bdfeseams_status"').form_dropdown('bdfeseams_status',$tenurestatus,'','id="bdfeseams_status"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">   
                                            <ul><li>
                                                <label>Upload SEAMS Automated Utility Tool <i>(*.pdf format, maximum size of 200MB)</i></label>                                    
                                                <input type='file' name="seamsuat" id="seamsuat" onchange="readURLappraisaSeamsUAT(this);"  />
                                                <input type="hidden"  name="seamsuat_span" id="seamsuat_span" class="seamsuat_span" />
                                                <div id="seamsuatloadingfile"></div>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <ul><li>
                                                <?= form_label('Remarks').form_textarea('bdfeseams_remarks','','id="bdfeseams_remarks"') ?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-12 ">
                                            <a type="text" class="btn btn-warning" id="addseamsuatresult">Add SEAMS Report</a>
                                        </div>
                                        <div class="col-xs-12 "><br>
                                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                                <table id="tblaseamsbdferesult" class="content-table" style="z-index: 100">                                            
                                                    <tbody id="tbodyseamsbdferesult1"></tbody>
                                                </table>                                                
                                            </div>
                                        </div> 
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                    <fieldset><legend>BAMS Report</legend>
                                        <div class="col-xs-12 col-lg-12">
                                            <input type='file' name="bamsresult" id="bamsresult" onchange="readURLstrengthenedbams(this);"  />
                                            <input type="hidden" id="bamsresult_span" name="bamsresult_span" class="bamsresult_span" />
                                        <div id="sfloadingfile"></div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                        <ul><li>
                                            <?= form_label('Name of File','','for="bdfebams_filename"').form_input('bdfebams_filename','','placeholder=" "  id="bdfebams_filename"');?>                                
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Date conducted').form_dropdown('bdfebams_date_month',$monthList,'',' id="bdfebams_date_month"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('&nbsp;').form_dropdown('bdfebams_date_year',$yearListed,'',' id="bdfebams_date_year"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 col-md-6">
                                        <ul><li>
                                            <?= form_label('Status','','for="bdfebams_status"').form_dropdown('bdfebams_status',$tenurestatus,'','id="bdfebams_status"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <ul><li>
                                            <?= form_label('Remarks').form_textarea('bdfebams_remarks','','id="bdfebams_remarks"') ?>
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-12 ">
                                        <a type="text" class="btn btn-warning" id="addbamsresultbdfe1">Add BAMS Results</a>
                                    </div>
                                    <div class="col-xs-12 "><br>
                                        <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                            <table id="tblabamsresults1" class="content-table" style="z-index: 100">
                                                <tbody id="tbodybamsresultsbdfe"></tbody>
                                            </table>                                                
                                        </div>
                                    </div> 
                                    </fieldset>                                     
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12" id="establishdiv">
                            <fieldset>
                                <legend style="background-color:#ff99bb">Established File <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-12">
                                    <!-- <ul><li> -->
                                        <label>Rapid Habitat Assessment</label>
                                        <input type='file' name="rapidhabitatassess" id="rapidhabitatassess" onchange="readURLappraisalRHA(this);"  />
                                        <input type="hidden" name="rapidhabitatassess_span" id="rapidhabitatassess_span" class="rapidhabitatassess_span" />
                                    <!-- </li></ul> -->
                                    <div id="rhaloadingfile"></div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <!-- <ul><li> -->
                                        <label>Copy of Business Permit</label>
                                        <input type='file' name="businesspermit" id="businesspermit" onchange="readURLappraisalBP(this);"  />
                                        <input type="hidden" name="businesspermit_span" id="businesspermit_span" class="businesspermit_span" />
                                    <!-- </li></ul> -->
                                    <div id="cbploadingfile"></div>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <!-- <ul><li> -->
                                        <label>PO Inventory</label>
                                        <input type='file' name="poinventory" id="poinventory" onchange="readURLappraisaPOI(this);"  />
                                        <input type="hidden" name="poinventory_span" id="poinventory_span" class="poinventory_span" />
                                    <!-- </li></ul> -->
                                    <div id="poiloadingfile"></div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12" id="developeddiv">
                            <fieldset>
                                <legend style="background-color:#ff99bb">Developed File <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset>
                                        <legend>BAMS Report</legend>
                                        <input type='file' name="bamsresultdeveloped" id="bamsresultdeveloped" onchange="readURLdevelopedbams(this);"  />
                                        <input type="hidden" name="bamsresultdeveloped_span" id="bamsresultdeveloped_span" class="bamsresultdeveloped_span" />
                                        <div id="bams2loadingfile"></div>
                                        <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                            <ul><li>
                                                <?= form_label('Name of File','','for="bdfedevbams_filename"').form_input('bdfedevbams_filename','','placeholder=" "  id="bdfedevbams_filename"');?>                                
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Date conducted').form_dropdown('bdfedevbams_date_month',$monthList,'',' id="bdfedevbams_date_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('&nbsp;').form_dropdown('bdfedevbams_date_year',$yearListed,'',' id="bdfedevbams_date_year"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-3 col-md-6">
                                            <ul><li>
                                                <?= form_label('Status','','for="bdfedevbams_status"').form_dropdown('bdfedevbams_status',$tenurestatus,'','id="bdfedevbams_status"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <ul><li>
                                                <?= form_label('Remarks').form_textarea('bdfedevbams_remarks','','id="bdfedevbams_remarks"') ?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-12 ">
                                            <a type="text" class="btn btn-warning" id="addbamsdevresultbdfe1">Add BAMS Results</a>
                                        </div>
                                        <div class="col-xs-12 "><br>
                                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                                <table id="tblabamsdevresults1" class="content-table" style="z-index: 100">
                                                    <tbody id="tbodybamsdevresultsbdfe"></tbody>
                                                </table>                                                
                                            </div>
                                        </div> 
                                    </fieldset>                                        
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>Updated Business Plan</legend>
                                        <input type='file' name="updatebusinessplan" id="updatebusinessplan" onchange="readURLdevelopedBP(this);"  />
                                        <input type="hidden" name="updatebusinessplan_span" id="updatebusinessplan_span" class="updatebusinessplan_span" />
                                        <div id="devfileloadingfile"></div>
                                    </fieldset>                                        
                                </div>                                
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>Copy of Business Permit</legend>
                                        <input type='file' name="businesspermitdeveloped" id="businesspermitdeveloped" onchange="readURLdevelopedbusinesspermit(this);"  />
                                        <input type="hidden" name="businesspermitdeveloped_span" id="businesspermitdeveloped_span" class="businesspermitdeveloped_span" />
                                        <div id="cbp2loadingfile"></div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>PPP Agreement</legend>                                    
                                        <input type='file' name="pppagreementdeveloped" id="pppagreementdeveloped" onchange="readURLdevelopedppp(this);"  />
                                        <input type="hidden" name="pppagreementdeveloped_span" id="pppagreementdeveloped_span" class="pppagreementdeveloped_span" />
                                        <div id="pppaloadingfile"></div>
                                    </fieldset>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12" id="sustaineddiv">
                            <fieldset>
                                <legend style="background-color:#ff99bb">Sustained File <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset>
                                        <legend>LGU resolution</legend>
                                        <input type='file' name="lguresolution" id="lguresolution" onchange="readURLsustainedLGU(this);"  />
                                        <input type="hidden" id="lguresolution_span" name="lguresolution_span" />
                                        <div id="lgurloadingfile"></div>
                                    </fieldset>                                    
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset>
                                        <legend>BAMS Report</legend>
                                        <input type='file' name="bamsresultsustained" id="bamsresultsustained" onchange="readURLsustainedBAMS(this);"  />
                                        <input type="hidden" id="bamsresultsustained_span" name="bamsresultsustained_span" />
                                        <div id="bams3loadingfile"></div>
                                        <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                            <ul><li>
                                                <?= form_label('Name of File','','for="bdfesustainedbams_filename"').form_input('bdfesustainedbams_filename','','placeholder=" "  id="bdfesustainedbams_filename"');?>                                
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Date conducted').form_dropdown('bdfesustainedbams_date_month',$monthList,'',' id="bdfesustainedbams_date_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('&nbsp;').form_dropdown('bdfesustainedbams_date_year',$yearListed,'',' id="bdfesustainedbams_date_year"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-6 col-lg-3 col-md-6">
                                            <ul><li>
                                                <?= form_label('Status','','for="bdfesustainedbams_status"').form_dropdown('bdfesustainedbams_status',$tenurestatus,'','id="bdfesustainedbams_status"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <ul><li>
                                                <?= form_label('Remarks').form_textarea('bdfesustainedbams_remarks','','id="bdfesustainedbams_remarks"') ?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-12 ">
                                            <a type="text" class="btn btn-warning" id="addbamssustainedresultbdfe1">Add BAMS Results</a>
                                        </div>
                                        <div class="col-xs-12 "><br>
                                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                                <table id="tblabamssustainedresults1" class="content-table" style="z-index: 100">
                                                    <tbody id="tbodybamssustainedresultsbdfe"></tbody>
                                                </table>                                                
                                            </div>
                                        </div> 
                                    </fieldset>
                                    
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset>
                                        <legend>SEAMS Report</legend>
                                        <input type='file' name="seamsresultsustained" id="seamsresultsustained" onchange="readURLsustainedSEAMS(this);"  />
                                        <input type="hidden" id="seamsresultsustained_span" name="seamsresultsustained_span" />
                                        <div id="seams3loadingfile"></div>
                                        <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                            <ul><li>
                                                <?= form_label('Name of File','','for="bdfesustainedseams_filename"').form_input('bdfesustainedseams_filename','','placeholder=" "  id="bdfesustainedseams_filename"');?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Date conducted').form_dropdown('bdfesustainedseams_date_month',$monthList,'',' id="bdfesustainedseams_date_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('&nbsp;').form_dropdown('bdfesustainedseams_date_year',$yearListed,'',' id="bdfesustainedseams_date_year"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <ul><li>
                                                <?= form_label('Status','','for="bdfesustainedseams_status"').form_dropdown('bdfesustainedseams_status',$tenurestatus,'','id="bdfesustainedseams_status"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">   
                                            <ul><li>
                                                <label>Upload SEAMS Automated Utility Tool <i>(*.pdf format, maximum size of 200MB)</i></label>                                    
                                                <input type='file' name="bdfesustainedseamsuat" id="bdfesustainedseamsuat" onchange="readURLappraisaSeamsSustainedUAT(this);"  />
                                                <input type="hidden"  name="bdfesustainedseamsuat_span" id="bdfesustainedseamsuat_span" class="bdfesustainedseamsuat_span" />
                                                <div id="seamssustaineduatloadingfile"></div>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <ul><li>
                                                <?= form_label('Remarks').form_textarea('bdfesustainedseams_remarks','','id="bdfesustainedseams_remarks"') ?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-12 ">
                                            <a type="text" class="btn btn-warning" id="addseamsustainedsuatresult">Add SEAMS Report</a>
                                        </div>
                                        <div class="col-xs-12 "><br>
                                            <div class="table-responsive text-nowrap" style="overflow-x:auto;">
                                                <table id="tblaseamsbdfesustainedresult" class="content-table" style="z-index: 100">                                            
                                                    <tbody id="tbodyseamsbdfesustainedresult1"></tbody>
                                                </table>                                                
                                            </div>
                                        </div> 
                                    </fieldset>                                    
                                </div>
                            </fieldset>                            
                        </div>
                        <fieldset>
                            <legend style="background-color:#ff99bb">Submission of Appraisal Document <i>(*.pdf format, maximum size of 50MB)</i></legend>
                            <div class="col-xs-12 col-lg-12">
                                <!-- <ul><li> -->
                                    <input type='file' name="submissionappraisalpdf" id="submissionappraisalpdf" onchange="readURLsubmissionPDF(this);"  />
                                    <input type="hidden" id="submissionappraisalpdf_span" name="submissionappraisalpdf_span" />
                                <!-- </li></ul> -->
                                <div id="sadloadingfile"></div>
                            </div>
                        </fieldset>
                        <div class="col-xs-12 col-lg-12 hidden">
                            <button class="btn btn-info" type="button" onclick="Updatebdfeappraisal();" />Update
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <br><a type="text" class="btn btn-primary" id="addappraisals">Add BDFE Appraisal</a>
                        </div>
                        <div class="col-xs-12 ">
                            <table id="tbpoappraisal" class="content-table">
                                <thead>
                                    <tr>
                                        <th>Date of last PO appraisal</th>
                                        <th>BDFE Level</th>
                                        <th>File Attached</th>
                                        <th>Appraisal Document</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodypoappraisal"></tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="BDFEappraisalEditForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfeappraisaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">BDFE Appraisal</h4>
                </div>
                <input type="hidden" id="editbdfeappraisal-id" name="editbdfeappraisal-id" value="" />
                <input type="hidden" id="editbdfeappraisal-code" name="editbdfeappraisal-code" value="" />
                <input type="hidden" id="editbdfeappraisal-gencode" name="editbdfeappraisal-gencode" value="" />
                <input type="hidden" id="editbdfeappraisal-gencode3" name="editbdfeappraisal-gencode3" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <legend>Appraisal</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                <?php echo form_label('Date of last PO appraisal').form_dropdown('edit-date_appraisal_month',$monthList,'',' id="edit-date_appraisal_month" ') ?>
                                <span class="tooltiptext">Select month of last PO appraisal</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                <?php echo form_label('&nbsp;').form_dropdown('edit-date_appraisal_day',$dayList,'',' id="edit-date_appraisal_day"') ?>
                                <span class="tooltiptext">Select day of last PO appraisal</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                <?php echo form_label('&nbsp;').form_dropdown('edit-date_appraisal_year',$yearListed,'',' id="edit-date_appraisal_year" ') ?>
                                <span class="tooltiptext">Select year of last PO appraisal</span>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?php echo form_label('BDFE Level','','for="edit-bdfe_level"').form_dropdown('edit-bdfe_level',$bdfe_level,'',' id="edit-bdfe_level"') ?>
                                <span class="tooltiptext">Select BDFE level</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12" id="edit-strengthenddiv">
                            <fieldset>
                                <legend style="background-color:#ff99bb">Strengthened File <i>(*.pdf format, maximum size of 50MB)</i></legend>                               
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>Business Plan</legend>                                    
                                        <input type='file' name="edit-businessplan" id="edit-businessplan" onchange="readURLstrengthenedbusinessplanEdit(this);"  />
                                        <input type="hidden" name="edit-businessplan_old" id="edit-businessplan_old" class="edit-businessplan_old" />
                                        <input type="hidden" name="edit-businessplan_span" id="edit-businessplan_span" class="edit-businessplan_span" />
                                        <div id="edit-bploadingfile"></div>
                                    </fieldset>
                                </div>                             
                                <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                    <fieldset>
                                        <legend>SEAMS Report</legend>                                    
                                        <div class="col-xs-12 col-lg-12">                                       
                                            <input type='file' name="edit-bdfestrseamsresult" id="edit-bdfestrseamsresult" onchange="readURLappraisaSeamsSTREdit(this);"  />
                                            <input type="hidden"  name="edit-bdfestrseamsresult_span" id="edit-bdfestrseamsresult_span" class="edit-bdfestrseamsresult_span" />
                                            <input type="hidden"  name="edit-bdfestrseamsresult_old" id="edit-seamsresult_old" class="edit-bdfestrseamsresult_old" />
                                            <div id="edit-bdfestrseamsloadingfile"></div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                            <ul><li>
                                                <?= form_label('Name of File','','for="edit-bdfeseams_filename"').form_input('edit-bdfeseams_filename','','placeholder=" "  id="edit-bdfeseams_filename"');?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Date conducted').form_dropdown('edit-bdfeseams_date_month',$monthList,'',' id="edit-bdfeseams_date_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('&nbsp;').form_dropdown('edit-bdfeseams_date_year',$yearListed,'',' id="edit-bdfeseams_date_year"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <ul><li>
                                                <?= form_label('Status','','for="edit-bdfebams_status"').form_dropdown('edit-bdfeseams_status',$tenurestatus,'','id="edit-bdfeseams_status"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">   
                                            <fieldset><legend>Upload SEAMS Automated Utility Tool <i>(*.pdf format, maximum size of 200MB)</i></legend>
                                                <input type='file' name="edit-bdfestrseamsuat" id="edit-bdfestrseamsuat" onchange="readURLappraisaBDFEStrSeamsUAT(this);"  />
                                                <input type="hidden"  name="edit-bdfestrseamsuat_span" id="edit-bdfestrseamsuat_span" class="edit-bdfestrseamsuat_span" />
                                                <div id="edit-bdfestrseamsuatloadingfile"></div>
                                            </fieldset>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <ul><li>
                                                <?= form_label('Remarks').form_textarea('edit-bdfeseams_remarks','','id="edit-bdfeseams_remarks"') ?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-12 ">
                                            <a type="text" class="btn btn-warning" id="edit-addbdfestrseamsuatresult">Add SEAMS Report</a>
                                        </div>
                                        <div class="col-xs-12 "><br>
                                            <div id="strseamreportedit"></div>
                                        </div> 
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                    <fieldset><legend>BAMS Report</legend>
                                        <div class="col-xs-12 col-lg-12">
                                            <input type='file' name="edit-bamsstrresult" id="edit-bamsstrresult" onchange="readURLstrengthenedbamsedit(this);"  />
                                            <input type="hidden" id="edit-bamsstrresult_span" name="edit-bamsstrresult_span" class="edit-bamsstrresult_span" />
                                            <input type="hidden" id="edit-bamsstrresult_old" name="edit-bamsstrresult_old" class="edit-bamsstrresult_old" />
                                        <div id="edit-bdfestrsfloadingfile"></div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                        <ul><li>
                                            <?= form_label('Name of File','','for="edit-bdfebams_filename"').form_input('edit-bdfebams_filename','','placeholder=" "  id="edit-bdfebams_filename"');?>                                
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Date conducted').form_dropdown('edit-bdfebams_date_month',$monthList,'',' id="edit-bdfebams_date_month"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('&nbsp;').form_dropdown('edit-bdfebams_date_year',$yearListed,'',' id="edit-bdfebams_date_year"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 col-md-6">
                                        <ul><li>
                                            <?= form_label('Status','','for="edit-bdfebams_status"').form_dropdown('edit-bdfebams_status',$tenurestatus,'','id="edit-bdfebams_status"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <ul><li>
                                            <?= form_label('Remarks').form_textarea('edit-bdfebams_remarks','','id="edit-bdfebams_remarks"') ?>
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-12 ">
                                        <a type="text" class="btn btn-warning" id="edit-addbamsresultbdfe1">Add BAMS Results</a>
                                    </div>
                                    <div class="col-xs-12"><br>
                                        <div id="strbamsreportedit"></div>
                                    </div> 
                                    </fieldset>                                     
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12" id="edit-establishdiv">
                            <fieldset>
                                <legend style="background-color:#ff99bb">Established File <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>Rapid Habitat Assessment</legend>                                    
                                        <input type='file' name="edit-rapidhabitatassess" id="edit-rapidhabitatassess" onchange="readURLappraisalRHAEdit(this);"  />
                                        <input type="hidden" name="edit-rapidhabitatassess_old" id="edit-rapidhabitatassess_old" class="edit-rapidhabitatassess_old" />
                                        <input type="hidden" name="edit-rapidhabitatassess_span" id="edit-rapidhabitatassess_span" class="edit-rapidhabitatassess_span" />
                                        <div id="edit-rhaloadingfile"></div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>Copy of Business Permit</legend>                                    
                                        <input type='file' name="edit-businesspermit" id="edit-businesspermit" onchange="readURLappraisalBPEdit(this);"  />
                                        <input type="hidden" name="edit-businesspermit_old" id="edit-businesspermit_old" class="edit-businesspermit_old" />
                                        <input type="hidden" name="edit-businesspermit_span" id="edit-businesspermit_span" class="edit-businesspermit_span" />
                                        <div id="edit-cbploadingfile"></div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>PO Inventory</legend>                                    
                                        <input type='file' name="edit-poinventory" id="edit-poinventory" onchange="readURLappraisaPOIEdit(this);"  />
                                        <input type="hidden" name="edit-poinventory_old" id="edit-poinventory_old" class="edit-poinventory_old" />
                                        <input type="hidden" name="edit-poinventory_span" id="edit-poinventory_span" class="edit-poinventory_span" />
                                        <div id="edit-poiloadingfile"></div>
                                    </fieldset>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12" id="edit-developeddiv">
                            <fieldset>
                                <legend style="background-color:#ff99bb">Developed File <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>Updated Business Plan</legend>                                    
                                        <input type='file' name="edit-updatebusinessplan" id="edit-updatebusinessplan" onchange="readURLdevelopedBPEdit(this);"  />
                                        <input type="hidden" name="edit-updatebusinessplan_old" id="edit-updatebusinessplan_old" class="edit-updatebusinessplan_old" />
                                        <input type="hidden" name="edit-updatebusinessplan_span" id="edit-updatebusinessplan_span" class="edit-updatebusinessplan_span" />
                                        <div id="edit-devfileloadingfile"></div>
                                    </fieldset>
                                </div>
                               
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>BAMS Report</legend>
                                        <div class="col-xs-12 col-lg-12">
                                            <input type='file' name="edit-bamsresultdeveloped" id="edit-bamsresultdeveloped" onchange="readURLdevelopedbamsEdit(this);"  />
                                            <input type="hidden" id="edit-bamsresultdeveloped_old" name="edit-bamsresultdeveloped_old" class="edit-bamsresultdeveloped_old" />
                                            <input type="hidden" id="edit-bamsresultdeveloped_span" name="edit-bamsresultdeveloped_span" class="edit-bamsresultdeveloped_span" />
                                        <div id="edit-bams2loadingfile"></div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                        <ul><li>
                                            <?= form_label('Name of File','','for="edit-bdfebamsdev_filename"').form_input('edit-bdfebamsdev_filename','','placeholder=" "  id="edit-bdfebamsdev_filename"');?>                                
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Date conducted').form_dropdown('edit-bdfebamsdev_date_month',$monthList,'',' id="edit-bdfebamsdev_date_month"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('&nbsp;').form_dropdown('edit-bdfebamsdev_date_year',$yearListed,'',' id="edit-bdfebamsdev_date_year"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 col-md-6">
                                        <ul><li>
                                            <?= form_label('Status','','for="edit-bdfebamsdev_status"').form_dropdown('edit-bdfebamsdev_status',$tenurestatus,'','id="edit-bdfebamsdev_status"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <ul><li>
                                            <?= form_label('Remarks').form_textarea('edit-bdfebamsdev_remarks','','id="edit-bdfebamsdev_remarks"') ?>
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-12 ">
                                        <a type="text" class="btn btn-warning" id="edit-addbamsdevresultbdfe1">Add BAMS Results</a>
                                    </div>
                                    <div class="col-xs-12"><br>
                                        <div id="devbamsreportedit"></div>
                                    </div> 
                                    </fieldset>                                     
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>Copy of Business Permit</legend>                                    
                                        <input type='file' name="edit-businesspermitdeveloped" id="edit-businesspermitdeveloped" onchange="readURLdevelopedbusinesspermitEdit(this);"  />
                                        <input type="hidden" name="edit-businesspermitdeveloped_old" id="edit-businesspermitdeveloped_old" class="edit-businesspermitdeveloped_old" />
                                        <input type="hidden" name="edit-businesspermitdeveloped_span" id="edit-businesspermitdeveloped_span" class="edit-businesspermitdeveloped_span" />
                                        <div id="edit-cbp2loadingfile"></div>
                                    </fieldset>
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>PPP Agreement</legend>                                    
                                        <input type='file' name="edit-pppagreementdeveloped" id="edit-pppagreementdeveloped" onchange="readURLdevelopedpppEdit(this);"  />
                                        <input type="hidden" name="edit-pppagreementdeveloped_old" id="edit-pppagreementdeveloped_old" class="edit-pppagreementdeveloped_old" />
                                        <input type="hidden" name="edit-pppagreementdeveloped_span" id="edit-pppagreementdeveloped_span" class="edit-pppagreementdeveloped_span" />
                                        <div id="edit-pppaloadingfile"></div>
                                    </fieldset>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12" id="edit-sustaineddiv">
                            <fieldset>
                                <legend style="background-color:#ff99bb">Sustained File <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                <div class="col-xs-12 col-lg-12">
                                    <fieldset><legend>LGU resolution</legend>                                    
                                        <input type='file' name="edit-lguresolution" id="edit-lguresolution" onchange="readURLsustainedLGUEdit(this);"  />
                                        <input type="hidden" id="edit-lguresolution_old" name="edit-lguresolution_old" />
                                        <input type="hidden" id="edit-lguresolution_span" name="edit-lguresolution_span" />
                                        <div id="edit-lgurloadingfile"></div>
                                    </fieldset>
                                </div>
                                <fieldset><legend>BAMS Report</legend>
                                        <div class="col-xs-12 col-lg-12">
                                            <input type='file' name="edit-bamsresultsustained" id="edit-bamsresultsustained" onchange="readURLsustainedBAMSEdit(this);"  />
                                            <input type="hidden" id="edit-bamsresultsustained_old" name="edit-bamsresultsustained_old" class="edit-bamsresultsustained_old" />
                                            <input type="hidden" id="edit-bamsresultsustained_span" name="edit-bamsresultsustained_span" class="edit-bamsresultsustained_span" />
                                        <div id="edit-bams3loadingfile"></div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                        <ul><li>
                                            <?= form_label('Name of File','','for="edit-bdfesusbams_filename"').form_input('edit-bdfesusbams_filename','','placeholder=" "  id="edit-bdfesusbams_filename"');?>                                
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('Date conducted').form_dropdown('edit-bdfesusbams_date_month',$monthList,'',' id="edit-bdfesusbams_date_month"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <ul><li>
                                            <?php echo form_label('&nbsp;').form_dropdown('edit-bdfesusbams_date_year',$yearListed,'',' id="edit-bdfesusbams_date_year"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 col-md-6">
                                        <ul><li>
                                            <?= form_label('Status','','for="edit-bdfesusbams_status"').form_dropdown('edit-bdfesusbams_status',$tenurestatus,'','id="edit-bdfesusbams_status"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <ul><li>
                                            <?= form_label('Remarks').form_textarea('edit-bdfesusbams_remarks','','id="edit-bdfesusbams_remarks"') ?>
                                        </li></ul>
                                    </div> 
                                    <div class="col-xs-12 ">
                                        <a type="text" class="btn btn-warning" id="edit-addbamsSusresultbdfe1">Add BAMS Results</a>
                                    </div>
                                    <div class="col-xs-12"><br>
                                        <div id="susbamsreportedit"></div>
                                    </div> 
                                    </fieldset>
                                <!-- <div class="col-xs-12 col-lg-12">
                                        <label>SEAMS Report</label>
                                        <input type='file' name="edit-seamsresultsustained" id="edit-seamsresultsustained" onchange="readURLsustainedSEAMSEdit(this);"  />
                                        <input type="hidden" id="edit-seamsresultsustained_old" name="edit-seamsresultsustained_old" />
                                        <input type="hidden" id="edit-seamsresultsustained_span" name="edit-seamsresultsustained_span" />
                                    <div id="edit-seams3loadingfile"></div>
                                </div> -->
                                <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                    <fieldset>
                                        <legend>SEAMS Report</legend>                                    
                                        <div class="col-xs-12 col-lg-12">                                       
                                            <input type='file' name="edit-seamsresultsustained" id="edit-seamsresultsustained" onchange="readURLsustainedSEAMSEdit(this);"  />
                                            <input type="hidden"  name="edit-seamsresultsustained_old" id="edit-seamsresultsustained_old" class="edit-seamsresultsustained_old" />
                                            <input type="hidden"  name="edit-seamsresultsustained_span" id="edit-seamsresultsustained_span" class="edit-seamsresultsustained_span" />
                                            <div id="edit-seamsloadingfile"></div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12" style="margin-top: 10px;">
                                            <ul><li>
                                                <?= form_label('Name of File','','for="edit-bdfesusseams_filename"').form_input('edit-bdfesusseams_filename','','placeholder=" "  id="edit-bdfesusseams_filename"');?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('Date conducted').form_dropdown('edit-bdfesusseams_date_month',$monthList,'',' id="edit-bdfesusseams_date_month"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-4 col-lg-4">
                                            <ul><li>
                                                <?php echo form_label('&nbsp;').form_dropdown('edit-bdfesusseams_date_year',$yearListed,'',' id="edit-bdfesusseams_date_year"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <ul><li>
                                                <?= form_label('Status','','for="edit-bdfesusbams_status"').form_dropdown('edit-bdfesusseams_status',$tenurestatus,'','id="edit-bdfesusseams_status"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">   
                                            <ul><li>
                                                <label>Upload SEAMS Automated Utility Tool <i>(*.pdf format, maximum size of 200MB)</i></label>                                    
                                                <input type='file' name="edit-bdfesusseamsuat" id="edit-bdfesusseamsuat" onchange="readURLappraisaSeamsUAT(this);"  />
                                                <input type="hidden"  name="edit-bdfesusseamsuat_span" id="edit-bdfesusseamsuat_span" class="edit-bdfesusseamsuat_span" />
                                                <div id="edit-susseamsuatloadingfile"></div>
                                            </li></ul>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <ul><li>
                                                <?= form_label('Remarks').form_textarea('edit-bdfesusseams_remarks','','id="edit-bdfesusseams_remarks"') ?>
                                            </li></ul>
                                        </div> 
                                        <div class="col-xs-12 ">
                                            <a type="text" class="btn btn-warning" id="edit-addsusseamsuatresult">Add SEAMS Report</a>
                                        </div>
                                        <div class="col-xs-12 "><br>
                                            <div id="susseamreportedit"></div>
                                        </div> 
                                    </fieldset>
                                </div>
                            </fieldset>                            
                        </div>
                        <fieldset>
                            <legend>Submission of Appraisal Document <i>(*.pdf format, maximum size of 50MB)</i></legend>
                            <div class="col-xs-12 col-lg-12">
                                <!-- <ul><li> -->
                                    <input type='file' name="edit-submissionappraisalpdf" id="edit-submissionappraisalpdf" onchange="readURLsubmissionPDFEdit(this);"  />
                                    <input type="hidden" id="edit-submissionappraisalpdf_old" name="edit-submissionappraisalpdf_old" />
                                    <input type="hidden" id="edit-submissionappraisalpdf_span" name="edit-submissionappraisalpdf_span" />
                                <!-- </li></ul> -->
                                <div id="edit-sadloadingfile"></div>
                            </div>
                        </fieldset>
                        <div class="col-xs-12 col-lg-12">
                            <button class="btn btn-info" type="button" onclick="Updatebdfeappraisal();" />Update
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="BDFEprofilingForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfeprofiling" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">BDFE Profiling</h4>
                </div>
                <input type="hidden" id="bdfeprofiling-id" name="bdfeprofiling-id" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div id="poenterprisename3"></div>
                        <legend>Profiling</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Date Profiled').form_dropdown('date_profile_month',$monthList,'',' id="date_profile_month" ') ?>
                                    <span class="tooltiptext">Select month profiling</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('date_profile_day',$dayList,'',' id="date_profile_day"') ?>
                                    <span class="tooltiptext">Select day profiling</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('&nbsp;').form_dropdown('date_profile_year',$yearListed,'',' id="date_profile_year" ') ?>
                                    <span class="tooltiptext">Select year profiling</span>
                                </li></ul>
                            </div>
                        </div>
                        <fieldset>
                            <legend style="background-color: transparent;color: #000; font-weight: 700;font-size: 14px;">Number of PO Members</legend>
                            <div class="col-xs-4 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Male','form="no_male_lh"').form_input('no_male_lh','','id="no_male_lh" class="number-separator" onkeyup="Calculatebdfemalefemale();"') ?>
                                    <span class="tooltiptext">Total number of male members of a People's Organization</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Female','form="no_female_lh"').form_input('no_female_lh','','id="no_female_lh" class="number-separator" onkeyup="Calculatebdfemalefemale();"') ?>
                                    <span class="tooltiptext">Total number of female members of a People's Organization</span>
                                </li></ul>
                            </div>
                            <div class="col-xs-4 col-lg-4 tooltip">
                                <ul><li>
                                    <?php echo form_label('Total','form="total_no_po_lh"').form_input('total_no_po_lh','','id="total_no_po_lh"') ?>
                                    <span class="tooltiptext">Auto generate total no. of PO members</span>
                                </li></ul>
                            </div>
                        </fieldset>
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Size of Enterprises','','for="size_enterprise"').form_dropdown('size_enterprise',$sizeenterprise,'',' id="size_enterprise"') ?>
                                <span class="tooltiptext">Micro Small Medium Enterproses (MSMEs) refers to any business activity or enterprise engaged in industry, agribusiness and/or services, whether single proprietorship, cooperative, partnership or corporation whose total assets, inclusive of those arising from loans but exclusive of the land on which the particular business entity’s office, plant and equipment are situated, must have value falling under the following categories:<br>
                                MICRO - not more than P3,000,000;<br>
                                SMALL - P3,000,001 –  15,000,000;<br> 
                                MEDIUM - P15,000,001 –  P1000,000,000</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-8 tooltip" id="sizeenterpriseother">
                            <ul><li>
                                <?php echo form_label('Specify Others','for="lh_enteprise_other"').form_input('lh_enteprise_other','','id="lh_enteprise_other"') ?>
                                <span class="tooltiptext">Specify other size of enterprises</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('PO asset value(Php)','for="poassetval"').form_input('poassetval','','id="poassetval" class="number-separator"') ?>
                                <span class="tooltiptext">Current monetary value of resource with economic value that the PO owns or controls with the expectation that it will provide a future benefit.</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?php echo form_label('Average net monthly income(Php)','for="avgnetmonthincome"').form_input('avgnetmonthincome','','id="avgnetmonthincome" class="number-separator"') ?>
                                <span class="tooltiptext">Input net monthly income(Php)</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <button class="btn btn-info" type="button" onclick="Updatebdfeprofilings();" />Update
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="AddBDFEPOProductsForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfepoproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add BDFE PO Products</h4>
                </div>
                <input type="hidden" id="bdfepoproduct-id" name="bdfepoproduct-id" value="" />
                <input type="hidden" id="bdfepoproduct-gencode" name="bdfepoproduct-gencode" value="" />
                <input type="hidden" id="bdfepoproduct-gencode2" name="bdfepoproduct-gencode2" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div id="poenterprisename"></div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?php echo form_label('PO Product').form_input('lhproductsname','','id="lhproductsname"'); ?>
                                <span class="tooltiptext">Specifications, Description of finished products or services by POs</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12">
                                <div id="fetch_images_po_product"></div>
                                <label>Upload PO product image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type='file' name="img_po_product" id="img_po_product"/>
                                <input type="hidden" name="img_po_product_span" id="img_po_product_span">
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <br><a type="text" class="btn btn-primary" id="addpoproducts">Add PO Product list</a>
                        </div>
                        <div class="col-xs-12 ">
                            <table id="tbpoproducts" class="content-table">
                                <thead>
                                    <tr>
                                        <th>BDFE PO Product list</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodypoproducts"></tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="AddBDFEPOResourceForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfeporesourceloc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add BDFE PO Resource Location</h4>
                </div>
                <input type="hidden" id="bdfeporesourceloc-id" name="bdfeporesourceloc-id" value="" />
                <input type="hidden" id="bdfeporesourceloc-gencode" name="bdfeporesourceloc-gencode" value="" />
                <input type="hidden" id="bdfeporesourceloc-gencode2" name="bdfeporesourceloc-gencode2" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <div id="poenterprisename2"></div>
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?php echo form_label('Product Source').form_input('lhproductsource','','id="lhproductsource"'); ?>
                                <span class="tooltiptext">Exact location of natural resources where POs source their raw materials/products for sale</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <table class="content-table">
                                <tbody>
                                    <tr>
                                        <td>Longitude</td>
                                        <td width="">
                                            <table class="content-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('lh_dmstodd','','id="lh_dmstodd" class="number-separator"')?></li></ul></td>
                                                        <td class="hidden"><?php echo form_button('en','Enable/Disable','class="lh_longd"') ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <ul><li>
                                                                <?php echo form_label('Direction','for="lh_long_direction"').form_dropdown('lh_long_direction',$direct_long,'',' id="lh_long_direction"'); ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?php echo form_label('Degree (°)','for="lh_long_deg"').form_input('lh_long_deg','','id="lh_long_deg" class="number-separator dmstodd"') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?php echo form_label('Minute (ˈ)','for="lh_long_min"').form_input('lh_long_min','','id="lh_long_min" class="number-separator dmstodd"') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?php echo form_label('Second (")','for="lh_long_sec"').form_input('lh_long_sec','','id="lh_long_sec" class="number-separator dmstodd"') ?>
                                                            </li></ul>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                            <table class="content-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Decimal Degree</td><td colspan="2"><ul><li><?= form_input('lh_dmstodd2','','id="lh_dmstodd2" class="number-separator"') ?></li></ul></td>
                                                        <td class="hidden"><?php echo form_button('en','Enable/Disable','class="lh_latd"') ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Direction','for="lh_lat_direction"').form_dropdown('lh_lat_direction',$direct_lat,'',' id="lh_lat_direction"'); ?>
                                                            </li></ul>
                                                            </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Degree (°)','for="lh_lat_deg"').form_input('lh_lat_deg','','id="lh_lat_deg" class="number-separator dmstodd"') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Minute (ˈ)','for="lh_lat_min"').form_input('lh_lat_min','','id="lh_lat_min" class="number-separator dmstodd"') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Second (")','for="lh_lat_sec"').form_input('lh_lat_sec','','id="lh_lat_sec" class="number-separator dmstodd"') ?>
                                                            </li></ul>
                                                        </td>
                                                    </tr>                                                
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                        
                        <div class="col-xs-12 col-lg-12 tooltip" style="margin-top: 20px;">
                            <ul><li>
                                <?php echo form_label('Total area used (has)','','for="lh_area"').form_input('lh_area','','id="lh_area" class="number-separator"') ?>
                                <span class="tooltiptext">Input total area used (hectares)</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <br><a type="text" class="btn btn-warning" id="addpolocation">Add PO Product Source List</a>
                        </div>
                        <div class="col-xs-12 ">
                            <table id="tbpolocations" class="content-table">
                                <thead>
                                    <tr>
                                        <th>Product Source</th>
                                        <th>Coordinates</th>
                                        <th>Area (has)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodypolocations"></tbody>
                            </table>
                        </div>
                    </fieldset>
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="EditBDFEPOResourceForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-bdfeporesourcelocEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit PO Resource Location</h4>
                </div>
                <input type="hidden" id="edit-bdfeporesourceloc-id" name="edit-bdfeporesourceloc-id" value="" />
                <input type="hidden" id="edit-bdfeporesourceloc-gencode" name="edit-bdfeporesourceloc-gencode" value="" />
                <input type="hidden" id="edit-bdfeporesourceloc-gencode2" name="edit-bdfeporesourceloc-gencode2" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <!-- <div id="poenterprisename2"></div> -->
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?php echo form_label('Product Source').form_input('edit-lhproductsource','','id="edit-lhproductsource"'); ?>
                                <span class="tooltiptext">Specifications, Description of finished products or services by POs</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <table class="content-table">
                                <tbody>
                                    <tr>
                                        <td>Longitude</td>
                                        <td width="">
                                            <table class="content-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Convert</td><td colspan="2"><?= form_input('edit-lh_dmstodd','','id="edit-lh_dmstodd" class="number-separator"')?></td>
                                                        <td class="hidden"><?php echo form_button('en','Enable/Disable','class="edit-lh_longd"') ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <ul><li>
                                                                <?php echo form_label('Direction','for="edit-lh_long_direction"').form_dropdown('edit-lh_long_direction',$direct_long,'',' id="edit-lh_long_direction"'); ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?php echo form_label('Degree (°)','for="edit-lh_long_deg"').form_input('edit-lh_long_deg','','id="edit-lh_long_deg" class="number-separator" onkeyup="CalculatebdfelocEdit()"') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?php echo form_label('Minute (ˈ)','for="edit-lh_long_min"').form_input('edit-lh_long_min','','id="edit-lh_long_min" class="number-separator" onkeyup="CalculatebdfelocEdit()"') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?php echo form_label('Second (")','for="edit-lh_long_sec"').form_input('edit-lh_long_sec','','id="edit-lh_long_sec" class="number-separator" onkeyup="CalculatebdfelocEdit()"') ?>
                                                            </li></ul>
                                                        </td>
                                                    </tr>                                                    
                                                </tbody>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Latitude</td>
                                            <td width="">
                                            <table class="content-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Convert</td><td colspan="2"><?= form_input('edit-lh_dmstodd2','','id="edit-lh_dmstodd2" class="number-separator"') ?></td>
                                                        <td class="hidden"><?php echo form_button('en','Enable/Disable','class="edit-lh_latd"') ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Direction','for="edit-lh_lat_direction"').form_dropdown('edit-lh_lat_direction',$direct_lat,'',' id="edit-lh_lat_direction"'); ?>
                                                            </li></ul>
                                                            </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Degree (°)','for="edit-lh_lat_deg"').form_input('edit-lh_lat_deg','','id="edit-lh_lat_deg" class="number-separator" onkeyup="Calculatebdfeloc2Edit();"') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Minute (ˈ)','for="edit-lh_lat_min"').form_input('edit-lh_lat_min','','id="edit-lh_lat_min" class="number-separator" onkeyup="Calculatebdfeloc2Edit();" ') ?>
                                                            </li></ul>
                                                        </td>
                                                        <td>
                                                            <ul><li>
                                                                <?= form_label('Second (")','for="edit-lh_lat_sec"').form_input('edit-lh_lat_sec','','id="edit-lh_lat_sec" class="number-separator" onkeyup="Calculatebdfeloc2Edit();"') ?>
                                                            </li></ul>
                                                        </td>
                                                    </tr>                                                
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-lg-12 tooltip" style="margin-top: 20px;">
                            <ul><li>
                                <?php echo form_label('Total area used (has)','','for="edit-lh_area"').form_input('edit-lh_area','','id="edit-lh_area" class="number-separator"') ?>
                                <span class="tooltiptext">Input total area used (hectares)</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <button class="btn btn-info" type="button" onclick="Updatebdferesloc();" />Update
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
