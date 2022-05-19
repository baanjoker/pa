<div class="row">
	<div id="exTab1" class="container">
		<?php echo form_open('pasu/report/testpdf/printpdf','id="pareportform" enctype="multipart/form-data" class="form-style-7" autocomplete="off" target="_blank"') ?>
			<div class="col-xs-12 col-lg-12 ">
                <div class="card">
                	<fieldset>
                        <center><h5 style="color: red;font-style: italic">Note! Check if you want to show on generated report.</h5></center>
                        <legend>Protected Area PDF Generated</legend>                        
                        <div class="col-xs-12">                            
                            <div class="col-lg-6 col-sm-6">
                                <ul><li>
                                    <?php echo form_label('Select Protected Area').form_dropdown('paid',$paList,'','id="paid"') ?>
                                </li></ul>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <button type="submit" class="btn btn-success" style="height: 50px">GENERATE PDF</button>
                            </div>
                        </div>  
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <div class="col-xs-12 col-lg-12 col-md-12">                           
                                <a type="button" class="btn btn-primary collapsibles">GENERAL INFORMATION »</a>
                                <div class="content_proce"><br>
                                    <fieldset>
                                        <legend style="background: transparent;color: #000"><input type="checkbox" name="chk-allgeninfo" value="1" id="chk-allgeninfo" checked="checked" onclick="checkAllGenInfo();"> <label id="labelgeninfo" for="chk-allgeninfo">Uncheck All</label></legend>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-pasu" value="1" id="chk-pasu" checked="checked"> <label for="chk-pasu">Protected Area Superintendent/Assistant Protected Area Superintendent</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                                        <input type="checkbox" name="chk-catid" value="1" id="chk-catid" checked="checked"> <label for="chk-catid">PA Category</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-paarea" value="1" id="chk-paarea" checked="checked"> <label for="chk-paarea">PA Area(Terrestrial and Marine Area)</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-bgz" value="1" id="chk-bgz" checked="checked"> <label for="chk-bgz">Biogeographic Region</label>
                                    </div>        
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-loc" value="1" id="chk-loc" checked="checked"> <label for="chk-loc">Administrative Location</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-legal" value="1" id="chk-legal" checked="checked"> <label for="chk-legal">Legal Status</label>
                                    </div>                                    
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-geoloc" value="1" id="chk-geoloc" checked="checked"> <label for="chk-geoloc">Geographic Location</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-bound" value="1" id="chk-bound" checked="checked"> <label for="chk-bound">Boundary</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-ir" value="1" id="chk-ir" checked="checked"> <label for="chk-ir">International Recognition</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-accessibility" value="1" id="chk-accessibility" checked="checked"> <label for="chk-accessibility">Accessibility</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <input type="checkbox" name="chk-wdpa" value="1" id="chk-wdpa" checked="checked"> <label for="chk-wdpa">World Database Protected Area</label>
                                    </div>  

                                    <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                                        <input type="checkbox" name="chk-bzarea" value="1" id="chk-bzarea" checked="checked"> <label for="chk-bzarea">Buffer Zone(Terrestrial and Marine Area)</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 col-md-12 hidden">
                                        <input type="checkbox" name="chk-kba" value="1" id="chk-kba" checked="checked"> <label for="chk-kba">Key Biodiversity Area</label>
                                    </div>  
                                    </fieldset>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        
                                    </div>
                                                                      
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">BIOLOGICAL FEATURES »</a>
                                <div class="content_proce">                                    
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <fieldset>
                                            <legend>Habitats and Ecosystem</legend>
                                            <div class="col-xs-12 col-lg-12 col-md-12">
                                                <input type="checkbox" name="chk-habeco" value="1" id="chk-habeco" checked="checked" onclick="checkAllhabitatEcosystem();"> <label id="labelhabeco" for="chk-habeco">Uncheck All</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-3 col-md-12">
                                               <input type="checkbox" name="chk-forfor" value="1" id="chk-forfor" checked="checked"> <label for="chk-forfor">Forest Formation</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-3 col-md-12">
                                               <input type="checkbox" name="chk-vegetative" value="1" id="chk-vegetative" checked="checked"> <label for="chk-vegetative">Vegetative Cover</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-3 col-md-12">
                                               <input type="checkbox" name="chk-inwet" value="1" id="chk-inwet" checked="checked"> <label for="chk-inwet">Inland Wetland</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-3 col-md-12">
                                               <input type="checkbox" name="chk-caves" value="1" id="chk-caves" checked="checked"> <label for="chk-caves">Caves</label>
                                            </div>
                                            <fieldset>
                                                <legend style="background-color: transparent; color:#000;font-weight: 700">Coastal/Marine</legend>
                                                <div class="col-xs-12 col-lg-12 col-md-12">
                                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                                       <input type="checkbox" name="chk-coral" value="1" id="chk-coral" checked="checked"> <label for="chk-coral">Coral Reef</label>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                                       <input type="checkbox" name="chk-seagrass" value="1" id="chk-seagrass" checked="checked"> <label for="chk-seagrass">Seagrass</label>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                                       <input type="checkbox" name="chk-mangrove" value="1" id="chk-mangrove" checked="checked"> <label for="chk-mangrove">Mangrove</label>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                                       <input type="checkbox" name="chk-fish" value="1" id="chk-fish" checked="checked"> <label for="chk-fish">Fish</label>
                                                    </div>
                                                </div>
                                            </fieldset>                                   
                                        </fieldset>
                                    </div>
                                    <fieldset>
                                        <legend>FLORA AND FAUNA</legend>
                                            <div class="col-xs-12 col-lg-12 col-md-12">
                                                <ul><li>
                                                    <?= form_label('Select no of display','','for="countbiodisplay"').form_dropdown('countbiodisplay',$countbio,'','id="countbiodisplay"') ?>
                                                </li></ul>
                                            </div>
                                    </fieldset>                                    
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <fieldset>
                                            <legend style="background-color: transparent; color:#000;font-weight: 700">IUCN</legend>
                                            <div class="col-xs-12 col-lg-12 col-md-12">
                                                <input type="checkbox" name="" value="1" id="chk-iucn" checked="checked" onclick="checkAllIUCN();"> <label id="labeliucn" for="chk-iucn">Uncheck All</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-bcr" value="1" id="chk-bcr" checked="checked"> <label for="chk-bcr">Critically Endangered </label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-bdd" value="1" id="chk-bdd" checked="checked"> <label for="chk-bdd">Data Defecient</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-ben" value="1" id="chk-ben" checked="checked"> <label for="chk-ben">Endangered </label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-ew" value="1" id="chk-ew" checked="checked"> <label for="chk-ew">Extinct in the Wild </label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-ex" value="1" id="chk-ex" checked="checked"> <label for="chk-ex">Extinct </label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-lc" value="1" id="chk-lc" checked="checked"> <label for="chk-lc">Least Concern </label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-ne" value="1" id="chk-ne" checked="checked"> <label for="chk-ne">Not Evaluated</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-nt" value="1" id="chk-nt" checked="checked"> <label for="chk-nt">Near Threatened</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-vu" value="1" id="chk-vu" checked="checked"> <label for="chk-vu">Vulnerable</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-4 col-md-12">
                                                <input type="checkbox" name="chk-ots" value="1" id="chk-ots" checked="checked"> <label for="chk-ots">Other Threatened</label>
                                            </div>
                                        </fieldset> 
                                        <hr>                                           
                                    </div>
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">PHYSICAL FEATURES »</a>
                                <div class="content_proce">
                                    <fieldset>
                                        <legend style="background: transparent;color: #000"><input type="checkbox" name="chk-phyfeat" value="1" id="chk-phyfeat" checked="checked" onclick="checkAllPhyFeat();"> <label id="labelphyfeat" for="chk-phyfeat">Uncheck All</label></legend>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-elevation" value="1" id="chk-elevation" checked="checked"> <label for="chk-elevation">Elevation</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                           <input type="checkbox" name="chk-toposlope" value="1" id="chk-toposlope" checked="checked"> <label for="chk-toposlope">Topography and Slope</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                           <input type="checkbox" name="chk-geology" value="1" id="chk-geology" checked="checked"> <label for="chk-geology">Geology</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                           <input type="checkbox" name="chk-soil" value="1" id="chk-soil" checked="checked"> <label for="chk-soil">Soil</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                           <input type="checkbox" name="chk-climate" value="1" id="chk-climate" checked="checked"> <label for="chk-climate">Climate</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                           <input type="checkbox" name="chk-hydrology" value="1" id="chk-hydrology" checked="checked"> <label for="chk-hydrology">Hydrology</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                           <input type="checkbox" name="chk-existinglanduse" value="1" id="chk-existinglanduse" checked="checked"> <label for="chk-existinglanduse">Existing Landuse</label>
                                        </div>   
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                           <input type="checkbox" name="chk-basin" value="1" id="chk-basin" checked="checked"> <label for="chk-basin">River Basin and Watershed</label>
                                        </div>      
                                        <div class="col-xs-12 col-lg-4 col-md-12 hidden">
                                           <input type="checkbox" name="chk-urbaneco" value="1" id="chk-urbaneco" checked="checked"> <label for="chk-urbaneco">Urban Ecosystem</label>
                                        </div>                             
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <fieldset><legend style="background-color: transparent; color:#000;font-weight: 700">Geohazard Feature</legend>
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-landslide" value="1" id="chk-landslide" checked="checked"> <label for="chk-landslide">Landslide</label>
                                                </div>
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-flooding" value="1" id="chk-flooding" checked="checked"> <label for="chk-flooding">Flooding</label>
                                                </div>
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-slr" value="1" id="chk-slr" checked="checked"> <label for="chk-slr">Sea level rise</label>
                                                </div>
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-surge" value="1" id="chk-surge" checked="checked"> <label for="chk-surge">Storm Surge</label>
                                                </div>
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-faultline" value="1" id="chk-faultline" checked="checked"> <label for="chk-faultline">Fault Line</label>
                                                </div>
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-othegeohazard" value="1" id="chk-othegeohazard" checked="checked"> <label for="chk-othegeohazard">Other Geohazard</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </fieldset>
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">SOCIO-ECONOMIC AND CULTURAL FEATURES »</a>
                                <div class="content_proce">
                                    <fieldset>
                                        <legend style="background: transparent;color: #000"><input type="checkbox" name="" value="1" id="chk-socieco" checked="checked" onclick="checkAllSocioEco();"> <label id="labelsocioeco" for="chk-socieco">Uncheck All</label></legend>
                                        <fieldset>
                                            <legend style="background-color: transparent; color:#000;font-weight: 700">Socio Economic</legend>
                                            <div class="col-xs-12 col-lg-12 col-md-12">
                                            
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <input type="checkbox" name="chk-demographic" value="1" id="chk-demographic" checked="checked"> <label for="chk-demographic">Demographic Summary</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <input type="checkbox" name="chk-bdfe" value="1" id="chk-bdfe" checked="checked"> <label for="chk-bdfe">Biodiversity-friendly enterprise</label>
                                            </div>
                                        </fieldset>
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <div class="col-xs-12 col-lg-6 col-md-12">
                                                <input type="checkbox" name="chk-cultural" value="1" id="chk-cultural" checked="checked"> <label for="chk-cultural">Cultural Profile</label>
                                            </div>
                                            <div class="col-xs-12 col-lg-6 col-md-12 hide">
                                                <input type="checkbox" name="chk-institutional" value="1" id="chk-institutional" checked="checked"> <label for="chk-institutional">Intitutional Profile</label>
                                            </div>
                                        </div>
                                    </fieldset>                                   
                                          
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">MANAGEMENT PLANNING »</a>
                                <div class="content_proce">
                                    <fieldset>
                                        <legend style="background: transparent;color: #000"><input type="checkbox" name="" value="1" id="chk-mgmtplanning" checked="checked" onclick="checkAllmgmtPlanning();"> <label id="labelmgmtplanning" for="chk-mgmtplanning">Uncheck All</label></legend>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-strict" value="1" id="chk-strict" checked="checked"> <label for="chk-strict">Strict Protection Zone</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-multiple" value="1" id="chk-multiple" checked="checked"> <label for="chk-multiple">Management Zone</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-mgmtplan" value="1" id="chk-mgmtplan" checked="checked"> <label for="chk-mgmtplan">Management Plan</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-ecoplan" value="1" id="chk-ecoplan" checked="checked"> <label for="chk-ecoplan">Ecotourism Plan</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-wetplan" value="1" id="chk-wetplan" checked="checked"> <label for="chk-wetplan">Wetland Plan</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-caveplan" value="1" id="chk-caveplan" checked="checked"> <label for="chk-caveplan">Cave Plan</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-thematic" value="1" id="chk-thematic" checked="checked"> <label for="chk-thematic">Other Plan</label>
                                        </div>
                                    </fieldset>  
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">ECOTOURISM »</a>
                                <div class="content_proce">
                                    <fieldset>
                                        <legend style="background: transparent;color: #000"><input type="checkbox" name="" value="1" id="chk-ecotour" checked="checked" onclick="checkAllecoTour();"> <label id="labelecotour" for="chk-ecotour">Uncheck All</label></legend>
                                        <div class="col-xs-12 col-lg-2 col-md-12">
                                            <input type="checkbox" name="chk-attraction" value="1" id="chk-attraction" checked="checked"> <label for="chk-attraction">Attraction</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-2 col-md-12">
                                            <input type="checkbox" name="chk-facility" value="1" id="chk-facility" checked="checked"> <label for="chk-facility">Facilities</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-2 col-md-12 hide">
                                            <input type="checkbox" name="chk-activity" value="1" id="chk-activity" checked="checked"> <label for="chk-activity">Activities</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-2 col-md-12">
                                            <input type="checkbox" name="chk-products" value="1" id="chk-products" checked="checked"> <label for="chk-products">Products</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-3 col-md-12">
                                            <input type="checkbox" name="chk-enterprise" value="1" id="chk-enterprise" checked="checked"> <label for="chk-enterprise">Enterprises</label>
                                        </div>
                                    </fieldset> 
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">TENURIAL INSTRUMENT »</a>
                                <div class="content_proce">
                                    <fieldset>
                                        <legend style="background: transparent;color: #000"><input type="checkbox" name="" value="1" id="chk-tenure" checked="checked" onclick="checkAllTenured();"> <label id="labeltenure" for="chk-tenure">Uncheck All</label></legend>
                                        <div class="col-xs-12 col-lg-3 col-md-12">
                                            <input type="checkbox" name="chk-sapa" value="1" id="chk-sapa" checked="checked"> <label for="chk-sapa">SAPA</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-3 col-md-12">
                                            <input type="checkbox" name="chk-moa" value="1" id="chk-moa" checked="checked"> <label for="chk-moa">MOA</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-3 col-md-12">
                                            <input type="checkbox" name="chk-pacbrma" value="1" id="chk-pacbrma" checked="checked"> <label for="chk-pacbrma">PACBRMA</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-3 col-md-12">
                                            <input type="checkbox" name="chk-othertenure" value="1" id="chk-othertenure" checked="checked"> <label for="chk-othertenure">Other Tenurial Instrument</label>
                                        </div>
                                    </fieldset>                                    
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">PROGRAMS, PROJECTS, AND RESEARCHES »</a>
                                <div class="content_proce">
                                    <fieldset>
                                        <legend style="background: transparent;color: #000"><input type="checkbox" name="" value="1" id="chk-programprojre" checked="checked" onclick="checkAllProgProjRea();"> <label id="labelprogramprojre" for="chk-programprojre">Uncheck All</label></legend>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-project" value="1" id="chk-project" checked="checked"> <label for="chk-project">Project</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-4 col-md-12">
                                            <input type="checkbox" name="chk-research" value="1" id="chk-research" checked="checked"> <label for="chk-research">Research</label>
                                        </div>
                                        <div class="col-xs-12 col-lg-12 col-md-12">
                                            <fieldset>
                                                <legend><input type="checkbox" name="chk-program" value="1" id="chk-program" onclick="checkAllPrograms();" checked="checked"> Program</legend>                                            
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-programActivity" value="1" id="chk-programActivity" checked="checked"> <label for="chk-programActivity">Program activity</label>
                                                </div>
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-programProject" value="1" id="chk-programProject" checked="checked"> <label for="chk-programProject">Program project</label>
                                                </div>
                                                <div class="col-xs-12 col-lg-4 col-md-12">
                                                    <input type="checkbox" name="chk-programResearch" value="1" id="chk-programResearch" checked="checked"> <label for="chk-programResearch">Program research</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </fieldset>
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">THREATS »</a>
                                <div class="content_proce">
                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                        <input type="checkbox" name="chk-threats" value="1" id="chk-threats" checked="checked"> <label for="chk-threats">Threats</label>
                                    </div>
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">MANAGEMENT BOARD »</a>
                                <div class="content_proce"><br>
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <ul><li>
                                            <?= form_label('Select no of display members','','for="countmemberdisplay"').form_dropdown('countmemberdisplay',$countbio,'','id="countmemberdisplay"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                        <input type="checkbox" name="chk-member" value="1" id="chk-member" checked="checked"> <label for="chk-member">Members</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                        <input type="checkbox" name="chk-issuance" value="1" id="chk-issuance" checked="checked"> <label for="chk-issuance">Issuances</label>
                                    </div>
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">PROTECTED AREA MANAGEMENT OFFICE »</a>
                                <div class="content_proce">
                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                        <input type="checkbox" name="chk-pamomember" value="1" id="chk-pamomember" checked="checked"> <label for="chk-pamomember">Members</label>
                                    </div>
                                </div>
                                <a type="button" class="btn btn-primary collapsibles">REFERENCES »</a>
                                <div class="content_proce">     
                                    <div class="col-xs-12 col-lg-4 col-md-12">
                                        <input type="checkbox" name="chk-reference" value="1" id="chk-reference" checked="checked"> <label for="chk-reference">References</label>
                                    </div>                               
                                </div>
                            </div>
                        </div>                        
                    </fieldset>
                </div>    
            </div>   
		 <?php echo form_close(); ?>
	</div>
</div>
<script>
var coll = document.getElementsByClassName("collapsibles");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("actived");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>