<form method="post" action="" id="FormVisitorLogs" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-visitorlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Visitor Logbook</h4>
                    <input type="hidden" id="visitorlog-id" name="visitorlog-id" value="" />
                    <input type="hidden" id="visitorlog-gencode" name="visitorlog-gencode" value="" />
                    <input type="hidden" id="visitorlog-gencodeindi" name="visitorlog-gencodeindi" value="" />
                    <input type="hidden" id="visitorlog-month" name="visitorlog-month" value="" />
                    <input type="hidden" id="visitorlog-day" name="visitorlog-day" value="" />
                    <input type="hidden" id="visitorlog-year" name="visitorlog-year" value="" />
                    <div class="modal-body" >
                        <fieldset>
                            <legend>VISITORS LOGBOOK</legend>
                            <div class="col-xs-12 col-lg-12">
                                <div class="col-xs-12 col-lg-12">
                                    <ul><li>
                                        <?php echo form_label('Visitors category').form_dropdown('edit-visit_cat',$visitcat,'','id="edit-visit_cat"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Visitors Name').form_input('edit-visitorsname','','id="edit-visitorsname"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Sex').form_dropdown('edit-visitorssex',$sexList,'','id="edit-visitorssex"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4">
                                    <ul><li>
                                        <?php echo form_label('Foreign/Local').form_dropdown('edit-visitorsforloc',$visitorsforloc,'','id="edit-visitorsforloc"'); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-12" id="visitornationalsdivEdit">
                                    <ul><li>
                                        <?php echo form_label('Nationality').form_input('edit-visitorsnationality','','id="edit-visitorsnationality"'); ?>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul><li>
                                    <?php echo form_label('Address').form_textarea('edit-visitorsaddress','','id="edit-visitorsaddress"'); ?>
                                </li></ul>
                            </div>
                            <fieldset class="hidden">
                                <legend>PAYMENT</legend>
                                    <div class="col-lg-12 col-xs-12">
                                        <div class="col-xs-6">
                                            <ul><li>
                                                <?php echo form_label('Types of Fee Paid').form_dropdown('edit-visitorsfeetype',$feetype,'','id="edit-visitorsfeetype"'); ?>
                                            </li></ul>
                                        </div>
                                        <div id="hidecontridivedit" style="display: none">
                                            <div class="col-xs-3 tooltip">
                                                <ul><li>
                                                    <?php echo form_label('Trust fund').form_dropdown('edit-visitorstrustfund',$vtrustfund,'','id="edit-visitorstrustfund"'); ?>
                                                    <span class="tooltiptext">Select type of trust fund</span>
                                                </li></ul>
                                            </div>
                                            <div class="col-xs-3 tooltip">
                                                <ul><li>
                                                    <?php echo form_label('Mode of payment').form_dropdown('edit-visitorsmodeofpayment',$vmodepayment,'','id="edit-visitorsmodeofpayment"'); ?>
                                                    <span class="tooltiptext">Select mode of payment</span>
                                                </li></ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <ul><li>
                                                <?php echo form_label('Amount').form_input('edit-visitorsfeeamount','','id="edit-visitorsfeeamount" class="number-separator"'); ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-lg-12 col-xs-12" id="edit-otherfeeid" style="display: none">
                                            <ul><li>
                                                <?php echo form_label('Specify other fee').form_input('edit-specify_otherfee','','id="edit-specify_otherfee"') ?>
                                            </li></ul>
                                        </div>
                                        <div class="col-lg-12 col-xs-12 tooltip" id="edit-penaltiesdiv" style="display: none">
                                            <ul><li>
                                                <?php echo form_label('Specify fines and penalties').form_input('edit-finespenalties','','id="edit-finespenalties"') ?>
                                                <span class="tooltiptext">Specify fines and penalties</span>
                                            </li></ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <a type="text" class="btn btn-primary" id="addvisitorspaymentsedit">Add to list</a>
                                    </div>
                                    <div class="col-xs-12 col-lg-4">
                                        <br><table id="tableVisitorspaymentedit" class="table-ola">
                                            <tbody style="text-align: left;" id="tbodyvisitorspaymentedit"></tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-12"><hr>
                                    <h2>Existing payment</h2>
                                        <div id="messagevisitpayment"></div>
                                    </div>

                            </fieldset>
                            <fieldset>
                                <legend>Purpose</legend>
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <ul><li>
                                        <?php echo form_label('').form_textarea('edit-visitorpurpose','','id="edit-visitorpurpose"'); ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </fieldset>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updateVisitorsLogs();" />Update
                        </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<form method="post" action="" id="SeamsIncomeForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-seams" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Demographic Information</h4>
                </div>
                <input type="hidden" id="seams-id" name="seams-id" value="" />
                <input type="hidden" id="seams-gencode" name="seams-gencode" value="" />
                <div class="modal-body" >
                    <fieldset>
                    <legend>Income Source Information</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-12 ">
                                <ul><li>
                                    <?php echo form_label('Name of Household Head','','for="edit_ecotourism_name_head"').form_input('edit_ecotourism_name_head','','placeholder="Fullname of household head" id="edit_ecotourism_name_head"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Ecotourism</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Type of revenue source','','for="edit_ecotourism_revenue"').form_input('edit_ecotourism_revenue','','placeholder="Eg. Sales, Rent revenue, Dividend revenue" id="edit_ecotourism_revenue"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source Location','','for="edit_ecotourism_source_location"').form_input('edit_ecotourism_source_location','','placeholder=" " id="edit_ecotourism_source_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-4 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from ecotourism','','for="edit_ecotourism_total_revenue"').form_input('edit_ecotourism_total_revenue','','placeholder=" "  id="edit_ecotourism_total_revenue"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from ecotourism','','for="edit_ecotourism_total_cost"').form_input('edit_ecotourism_total_cost','','placeholder=""  id="edit_ecotourism_total_cost"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from ecotourism','','for="edit_ecotourism_net_revenue"').form_input('edit_ecotourism_net_revenue','','placeholder=""  id="edit_ecotourism_net_revenue"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Fisheries (Saltwater)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Species caught','','for="edit_saltwater_species_caught"').form_input('edit_saltwater_species_caught','','placeholder=" " id="edit_saltwater_species_caught"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_saltwater_location"').form_input('edit_saltwater_location','','placeholder=" " id="edit_saltwater_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Average fishing hours spent','','for="edit_saltwater_average_fishing"').form_input('edit_saltwater_average_fishing','','placeholder=" " id="edit_saltwater_average_fishing"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from fishery','','for="edit_saltwater_revenue"').form_input('edit_saltwater_revenue','','placeholder=" "  id="edit_saltwater_revenue"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from fishery','','for="edit_saltwater_cost"').form_input('edit_saltwater_cost','','placeholder=" "  id="edit_saltwater_cost"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from fishery','','for="edit_saltwater_net_revenue"').form_input('edit_saltwater_net_revenue','','placeholder=" "  id="edit_saltwater_net_revenue"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Fisheries (Freshwater)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Species caught','','for="edit_freshwater_species_caught"').form_input('edit_freshwater_species_caught','','placeholder=" " id="edit_freshwater_species_caught"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_freshwater_location"').form_input('edit_freshwater_location','','placeholder=" " id="edit_freshwater_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                     <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Average fishing hours spent','','for="edit_freshwater_average_fishing"').form_input('edit_freshwater_average_fishing','','placeholder=" " id="edit_freshwater_average_fishing"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from fishery','','for="edit_freshwater_revenue"').form_input('edit_freshwater_revenue','','placeholder=" "  id="edit_freshwater_revenue"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from fishery','','for="edit_freshwater_cost"').form_input('edit_freshwater_cost','','placeholder=" "  id="edit_freshwater_cost"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from fishery','','for="edit_freshwater_net_revenue"').form_input('edit_freshwater_net_revenue','','placeholder=" "  id="edit_freshwater_net_revenue"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                         <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Trading, Processing and Manufacturing</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Species traded, processed, manufactured','','for="edit_ptm_species"').form_input('edit_ptm_species','','placeholder=" " id="edit_ptm_species"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_ptm_source_location"').form_input('edit_ptm_source_location','','placeholder=" " id="edit_ptm_source_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-4 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from trading, processing, and manufacturing of aquatic resources ','','for="edit_ptm_revenue"').form_input('edit_ptm_revenue','','placeholder=" "  id="edit_ptm_revenue"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from trading, processing, and manufacturing  of aquatic resources ','','for="edit_ptm_cost"').form_input('edit_ptm_cost','','placeholder=" "  id="edit_ptm_cost"') ?>
                                       </li></ul>
                                   </div>
                                   <div class="col-xs-4 col-lg-4 ">
                                       <ul><li>
                                           <?php echo form_label('Net revenue from trading, processing, and manufacturing  of aquatic resources ','','for="edit_ptm_net_revenue"').form_input('edit_ptm_net_revenue','','placeholder=" "  id="edit_ptm_net_revenue"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Agriculture</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Agriculture crops','','for="edit_agriculture_crops"').form_input('edit_agriculture_crops','','placeholder=" " id="edit_agriculture_crops"') ?>
                                        </li></ul>
                                    </div>
                                     <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_agriculture_source_location"').form_input('edit_agriculture_source_location','','placeholder=" " id="edit_agriculture_source_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-4 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total cultivated area (ha) from agriculture','','for="edit_agriculture_cultivated_area"').form_input('edit_agriculture_cultivated_area','','placeholder=" " id="edit_agriculture_cultivated_area" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from agriculture','','for="edit_agriculture_revenue"').form_input('edit_agriculture_revenue','','placeholder=" " id="edit_agriculture_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from agriculture','','for="edit_agriculture_cost"').form_input('edit_agriculture_cost','','placeholder=" " id="edit_agriculture_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from agriculture','','for="edit_agriculture_net_revenue"').form_input('edit_agriculture_net_revenue','','placeholder=" " id="edit_agriculture_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Livestock and Poultry</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Species','','for="edit_livestock_species"').form_input('edit_livestock_species','','placeholder=" " id="edit_livestock_species"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_livestock_source_location"').form_input('edit_livestock_source_location','','placeholder=" " id="edit_livestock_source_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total Grazing area (ha)','','for="edit_livestock_grazing_area"').form_input('edit_livestock_grazing_area','','placeholder=" " id="edit_livestock_grazing_area" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from livestock and poultry income source','','for="edit_livestock_revenue"').form_input('edit_livestock_revenue','','placeholder=" " id="edit_livestock_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from livestock and poultry income source','','for="edit_livestock_cost"').form_input('edit_livestock_cost','','placeholder=" " id="edit_livestock_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from livestock and poultry income source','','for="edit_livestock_net_revenue"').form_input('edit_livestock_net_revenue','','placeholder=" " id="edit_livestock_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Non-Timber Forest Products</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Species','','for="edit_nontimber_species"').form_input('edit_nontimber_species','','placeholder=" " id="edit_nontimber_species"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_nontimber_source_location"').form_input('edit_nontimber_source_location','','placeholder=" " id="edit_nontimber_source_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from non-timber forest products','','for="edit_nontimber_revenue"').form_input('edit_nontimber_revenue','','placeholder=" " id="edit_nontimber_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from non-timber forest products','','for="edit_nontimber_cost"').form_input('edit_nontimber_cost','','placeholder=" " id="edit_nontimber_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from non-timber forest products','','for="edit_nontimber_net_revenue"').form_input('edit_nontimber_net_revenue','','placeholder=" " id="edit_nontimber_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Timber Forest Products</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Species','','for="edit_timber_species"').form_input('edit_timber_species','','placeholder=" " id="edit_timber_species"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_timber_source_location"').form_input('edit_timber_source_location','','placeholder=" " id="edit_timber_source_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                     <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total volume from timber forest products','','for="edit_timber_volume"').form_input('edit_timber_volume','','placeholder=" " id="edit_timber_volume" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from timber forest products','','for="edit_timber_revenue"').form_input('edit_timber_revenue','','placeholder=" " id="edit_timber_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from timber forest products','','for="edit_timber_cost"').form_input('edit_timber_cost','','placeholder=" " id="edit_timber_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-3 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from timber forest products','','for="edit_timber_net_revenue"').form_input('edit_timber_net_revenue','','placeholder=" " id="edit_timber_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Resource Use and/or Wildlife Collection</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Species being collected/gathered','','for="edit_wildlife_species"').form_input('edit_wildlife_species','','placeholder=" " id="edit_wildlife_species"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_wildlife_source_location"').form_input('edit_wildlife_source_location','','placeholder=" " id="edit_wildlife_source_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from resource use and wildlife collection','','for="edit_wildlife_revenue"').form_input('edit_wildlife_revenue','','placeholder=" " id="edit_wildlife_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from resource use and wildlife collection','','for="edit_wildlife_cost"').form_input('edit_wildlife_cost','','placeholder=" " id="edit_wildlife_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from resource use and wildlife collection','','for="edit_wildlife_net_revenue"').form_input('edit_wildlife_net_revenue','','placeholder=" " id="edit_wildlife_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Mining and Quarrying Industry</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Type of revenue source','','for="edit_mining_revenue_source"').form_input('edit_mining_revenue_source','','placeholder=" " id="edit_mining_revenue_source"') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 ">
                                        <ul><li>
                                            <?php echo form_label('Source location','','for="edit_mining_source_location"').form_input('edit_mining_source_location','','placeholder=" " id="edit_mining_source_location"') ?>
                                        </li></ul>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from mining and quarrying','','for="edit_mining_revenue"').form_input('edit_mining_revenue','','placeholder=" " id="edit_mining_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from mining and quarrying','','for="edit_mining_cost"').form_input('edit_mining_cost','','placeholder=" " id="edit_mining_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from mining and quarrying','','for="edit_mining_net_revenue"').form_input('edit_mining_net_revenue','','placeholder=" " id="edit_mining_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Other Industries</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from other industries','','for="edit_industry_revenue"').form_input('edit_industry_revenue','','placeholder=" " id="edit_industry_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from other industries','','for="edit_industry_cost"').form_input('edit_industry_cost','','placeholder=" " id="edit_industry_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from other industries','','for="edit_industry_net_revenue"').form_input('edit_industry_net_revenue','','placeholder=" " id="edit_industry_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Services</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from services','','for="edit_services_revenue"').form_input('edit_services_revenue','','placeholder=" " id="edit_services_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from services','','for="edit_services_cost"').form_input('edit_services_cost','','placeholder=" " id="edit_services_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from services','','for="edit_services_net_revenue"').form_input('edit_services_net_revenue','','placeholder=" " id="edit_services_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12">
                            <fieldset>
                                <legend style="background-color: #0066ff;">Other revenue services (i.e. remittance)</legend>
                                <div class="col-xs-12">
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total revenue from other revenue sources','','for="edit_other_revenue_revenue"').form_input('edit_other_revenue_revenue','','placeholder=" " id="edit_other_revenue_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Total cost from other revenue sources','','for="edit_other_revenue_cost"').form_input('edit_other_revenue_cost','','placeholder=" " id="edit_other_revenue_cost" ') ?>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-6 col-lg-4 ">
                                        <ul><li>
                                            <?php echo form_label('Net revenue from other revenue sources','','for="edit_other_revenue_net_revenue"').form_input('edit_other_revenue_net_revenue','','placeholder="" id="edit_other_revenue_net_revenue" ') ?>
                                        </li></ul>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 " style="margin-top:10px">
                            <div class="col-xs-12 ">
                                <div class="modal-footer">
                                    <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateContri" onclick="Updateseamsincome();" />
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="ProgramActivityForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-progactivity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Activity</h4>
                </div>
                <input type="hidden" id="progactivity-id" name="progactivity-id" value="" />
                <input type="hidden" id="progactivity-gencode" name="progactivity-gencode" value="" />
                <input type="hidden" id="progactivity-id_program" name="progactivity-id_program" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <legend>Program Activity</legend>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <ul><li>
                                <?= form_label('Activity Details').form_textarea('programactivity','','id="programactivity"') ?>
                            </li></ul>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <ul><li>
                                    <?= form_label('Area (has)').form_input('programactivitydevt','','id="programactivitydevt" class="number-separator"') ?>
                                </li></ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <ul><li>
                                    <?= form_label('Cost').form_input('programactivitycost','','id="programactivitycost" class="number-separator"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <fieldset>
                                <legend>Date conducted</legend>
                                <div class="col-lg-6 col-md-6 col-xs-6">
                                    <ul><li>
                                        <?= form_label('Month').form_dropdown('programactivitymonth',$monthListed,'','id="programactivitymonth"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-6">
                                    <ul><li>
                                        <?= form_label('Year').form_dropdown('programactivityyear',$yearListed,'','id="programactivityyear"') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <ul><li>
                                <?= form_label('Output').form_textarea('programactivityoutput','','id="programactivityoutput"') ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12 ">
                                <a type="text" id="addprogramactivity" class="btn btn-primary">Add data</a>
                            </div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 col-lg-12 ">
                        <div class="table-responsive large-tables">
                            <table id="tableProgramActivity" class="table  table-bordered tglobal">
                                <thead>
                                    <tr>
                                        <th colspan="2" style="text-align: center; font-size: 24px">Activity</th>
                                    </tr>
                                    <tr>
                                        <th>Details</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyProgramActivity"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="ProgramActivityEditForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-progactivitye" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Activity</h4>
                </div>
                <input type="hidden" id="progactivitye-id" name="progactivitye-id" value="" />
                <input type="hidden" id="progactivitye-gencode" name="progactivitye-gencode" value="" />
                <input type="hidden" id="progactivitye-id_program" name="progactivitye-id_program" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <legend>Program Activity</legend>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <ul><li>
                                <?= form_label('Activity Details').form_textarea('edit-programactivity','','id="edit-programactivity"') ?>
                            </li></ul>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <ul><li>
                                    <?= form_label('Area (has)').form_input('edit-programactivitydevt','','id="edit-programactivitydevt" class="number-separator"') ?>
                                </li></ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <ul><li>
                                    <?= form_label('Cost').form_input('edit-programactivitycost','','id="edit-programactivitycost" class="number-separator"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <fieldset>
                                <legend>Date conducted</legend>
                                <div class="col-lg-6 col-md-6 col-xs-6">
                                    <ul><li>
                                        <?= form_label('Month').form_dropdown('edit-programactivitymonth',$monthListed,'','id="edit-programactivitymonth"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-6">
                                    <ul><li>
                                        <?= form_label('Year').form_dropdown('edit-programactivityyear',$yearListed,'','id="edit-programactivityyear"') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <ul><li>
                                <?= form_label('Output').form_textarea('edit-programactivityoutput','','id="edit-programactivityoutput"') ?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updateprogramactivity();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<!-- MODAL FOR EDITTING A THREATS -->
<form method="post" action="#" id="IpafForm" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-ipafs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit IPAF</h4>
                </div>
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">
                            <input type="hidden" id="ipafs-id" name="ipafs-id" value="" />
                            <input type="hidden" id="ipafs-gencode" name="ipafs-gencode" value="" />
                            <?= form_label('Month').' '.form_dropdown('edit-month_monitoring',$monthListed,'',' id="edit-monitor_months"');?>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_label('Year').' '.form_dropdown('edit-year_monitoring',$yearListed,'',' id="edit-monitor_years"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <legend>&nbsp;</legend>
                        <legend>Visitors Monitoring</legend>
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_label('No. of Visitors','',' for="edit-no_visitors"').''.form_input('edit-no_visitors','','  id="edit-no_visitors"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <legend>&nbsp;</legend>
                        <legend>Monthly Income</legend>
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_label('Visitors','',' for="edit-visitors"').''.form_input('edit-visitors','','  id="edit-visitors"');?>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_label('Parking Area','',' for="edit-parking"').''.form_input('edit-parking','','  id="edit-parking"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_label('Facilities','',' for="edit-facilities"').''.form_input('edit-facilities','','  id="edit-facilities"');?>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_label('Recreational Activity','',' for="edit-recreational"').''.form_input('edit-recreational','','  id="edit-recreational"');?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">
                            <?= form_label('Watersports or other water Activity','',' for="edit-water"').''.form_input('edit-water','','  id="edit-water"');?><br>
                        </div>
                    </div>

                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateIpaf" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A STRICT PROTECTION ZONE -->



<form method="post" action="#" id="ApasuInfoForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-apasu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Assistant Protected Area Superintendent</h4>
                </div>
                <input type="hidden" id="apasuinfo-id" name="apasuinfo-id" value="" />
                <input type="hidden" id="apasuinfo-gencode" name="apasuinfo-gencode" value="" />
                <input type="hidden" id="apasuinfo-gencode2" name="apasuinfo-gencode2" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-3 col-lg-3 tooltip">
                            <ul><li>
                                <?= form_label('First Name','','for="edit-apasu_fname"').form_input('edit-apasu_fname','','id="edit-apasu_fname" placeholder="ex. John, Jane" required');?>
                                <span class="tooltiptext">Input first name</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-3 col-lg-3 tooltip">
                            <ul><li>
                                <?= form_label('Middle Name','','for="edit-apasu_mname"').form_input('edit-apasu_mname','','id="edit-apasu_mname" placeholder="ex. A., dela Cruz" required');?>
                                <span class="tooltiptext">Input middle name</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-3 col-lg-3 tooltip">
                            <ul><li>
                                <?= form_label('Last Name','','for="edit-apasu_lname"').form_input('edit-apasu_lname','','id="edit-apasu_lname" placeholder="ex. Rodriguez, Espino" required');?>
                                <span class="tooltiptext">Input family name</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-3 col-lg-3 tooltip">
                            <ul><li>
                                <?= form_label('Suffix','','for="edit-apasu_suffix"').form_input('edit-apasu_suffix','','id="edit-apasu_suffix" placeholder="Sr., Jr., I, II, III"');?>
                                <span class="tooltiptext">Input Suffix</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 tooltip">
                            <ul><li>
                                <?= form_label('Office Address','','for="edit-apasu_officeAddress"').form_input('edit-apasu_officeAddress','','placeholder="Lot no., Block no, Street name, Barangay, Municipal City"  id="edit-apasu_officeAddress"');?>
                                <span class="tooltiptext">Input office address</span>
                            </li></ul>

                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Sex','','for="edit-apasu_sex"').form_dropdown('edit-apasu_sex',$sexList,'','class="select-css" id="edit-apasu_sex" required');?>
                                <span class="tooltiptext">Select sex</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-4 tooltip">
                            <ul><li>
                                <?= form_label('Position/Designtion','','for="edit-apasu_position"').form_input('edit-apasu_position','','placeholder=" "  id="edit-apasu_position"');?>
                                <span class="tooltiptext">Input position/designation</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Mobile Number','','for="edit-apasu_mobile"').form_input('edit-apasu_mobiles','','data-inputmask="&quot;mask&quot;: &quot;+(99) 999-9999-999&quot;" placeholder="+(99) 999-9999-999" data-mask="" id="edit-apasu_mobile"'); ?>
                                <span class="tooltiptext">Input mobile number</span>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 tooltip">
                            <ul><li>
                                <?= form_label('Email Address','','for="edit-apasu_email"').form_input('edit-apasu_email','','type="email" placeholder="example@gmail.com, example@yahoo.com" id="edit-apasu_email"'); ?>
                                <span class="tooltiptext">Input email address</span>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12">
                            <label>Upload Approved Special Order <i>(*.pdf format, maximum size of 50MB)</i></label>
                            <input type="file" name="edit-apasuspecialorder" id="edit-apasuspecialorder" onchange="readURLapasuSoEdit(this);" />
                            <input type="hidden" id="apasusofile_text" name="apasusofile_text">
                            <input type="hidden" id="apasusofile_span" name="apasusofile_span">
                        <div id="uploadapasuSOfiles"></div>
                        <div class="col-xs-12 col-lg-12" style="margin-top: 20px">
                            <fieldset>
                                <label>Current file attached</label>
                                <div id="displayapasuso"></div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="updatepasuinfos();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A PAMB MEMBER -->
<!-- MODAL FOR EDITTING A STRICT PROTECTION ZONE -->
<form method="post" action="#" id="strictProtect" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-protection" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Strict Protection Zone</h4>
                </div>
                <input type="hidden" id="strict-id" name="strict-id" value="" />
                <input type="hidden" id="strict-gencode" name="strict-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <ul><li>
                            <?= form_label('Category').form_dropdown('edit-splcat',$splcategory,'','id="edit-splcat" class="form-control border-input select-css"') ?>
                        </li></ul>
                        <ul><li>
                            <?= form_label('Area(has)','','for="edit-stricthas"').form_input('edit-stricthas','','placeholder=" " id="edit-stricthas" class="number-separator"');?>
                        </li></ul>
                        <ul><li>
                            <?= form_label('Archipelagic Sea Lanes','','for="edit-strictarchisea"').form_dropdown('edit-strictarchisea',$kba,'','id="edit-strictarchisea"');?>
                        </li></ul>
                        <ul><li>
                            <?= form_label('Brief description','','for="edit-descs"').form_textarea('edit-descs','','placeholder="Brief description" id="edit-descs"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="UpdateStrict();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A STRICT PROTECTION ZONE -->

<!-- MODAL FOR EDITTING A STRICT PROTECTION ZONE -->
<form method="post" action="#" id="MultipleUsed" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-multiple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Multiple Use Zone</h4>
                </div>
                <input type="hidden" id="multiple-id" name="multiple-id" value="" />
                <input type="hidden" id="multiple-gencode" name="multiple-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <ul><li>
                            <?= form_label('Category').form_dropdown('edit-mcat',$splcategory,'','id="edit-mcat" class="form-control border-input select-css"') ?>
                        </li></ul>
                        <ul><li>
                            <?= form_label('Area(has)','','for="edit-stricthas-multiple"').form_input('edit-stricthas-multiple','','placeholder=" " id="edit-stricthas-multiple" class="number-separator"');?>
                        </li></ul>
                        <ul><li>
                            <?= form_label('Archipelagic Sea Lanes','','for="edit-marchisea"').form_dropdown('edit-marchisea',$kba,'','id="edit-marchisea"');?>
                        </li></ul>
                        <ul><li>
                            <?= form_label('Brief description','','for="edit-descs-multiple"').form_textarea('edit-descs-multiple','','placeholder="Brief description" id="edit-descs-multiple"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="UpdateMultiple();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A STRICT PROTECTION ZONE -->





<!-- END OF MODAL FOR EDITTING A THREATS -->
<!-- MODAL FOR EDITTING A PROJECTS -->
<form method="post" action="#" id="ProjectForm" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-edit-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Tenurial Instrument</h4>
                </div>
                <input type="hidden" id="project-id" name="project-id" value="" />
                <input type="hidden" id="project-gencode" name="project-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-3 ">
                            <?php echo form_label('Name of proponent','',''); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9 ">
                            <?php echo form_input('edit-project-name','',' id="edit-project-name"'); ?>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                         <div class="col-xs-12 col-lg-3 ">
                            <?php echo form_label('Tenurial Instrument','',''); ?>
                        </div>
                        <div class="col-xs-12 col-lg-9 ">
                            <select id="edit-issuance"  name="edit-issuance" >
                                <option value="" disabled default selected style="display:none;"></option>
                                <option value="sapa">Special Use Agreement in Protected Areas (SAPA)</option>
                                <option value="moa">Memorandum of Agreement (MOA)</option>
                                <option value="pacbrma">Protected Area Community Based Resources Management Agreement (PACBRMA)</option>
                            </select>
                        </div>
                    </div>
                    <!-- SAPA -->
                    <div id="edit-sapa" class="">
                        <div class="col-xs-12 " id="sapa">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('SAPA No.','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-sapa_no','',' id="edit-sapa_no"');?><br>
                            </div>
                        </div>
                    </div>
                    <!-- END OF SAPA -->
                    <!-- MOA -->
                    <div id="edit-moa" class="">
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('Date of signing','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_month',$monthListed,'',' id="edit-moa_month"');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_day',$dayList,'',' id="edit-moa_day"');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_year',$yearListed,'',' id="edit-moa_year"');?><br>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('Date of Expiration','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_exp_month',$monthListed,'',' id="edit-moa_exp_month"');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_exp_day',$dayList,'',' id="edit-moa_exp_day"');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_dropdown('edit-moa_exp_year',$yearduration,'',' id="edit-moa_exp_year"');?><br>
                            </div>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('Second Party','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-second_party','',' id="edit-second_party"');?><br>
                            </div>
                        </div>
                    </div>
                    <div id="edit-pacbrma" class="">
                        <div class="col-xs-12 " id="sapa">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('PACBRMA No.','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-pacbrma_no','',' id="edit-pacbrma_no" placeholder="Region-Acronym of PA-Year issuence-Agreement no. issued for the PA"');?><br>
                            </div>
                        </div>
                        <div class="col-xs-12 " id="sapa">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('People Organization','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-po','',' id="edit-po" placeholder="People Organization"');?><br>
                            </div>
                        </div>
                    </div>
                    <!-- END OF MOA -->
                    <div id="edit-other_duration">
                        <div class="col-xs-6 col-lg-3 ">
                           <?= form_label('Duration','','style="margin:8px 0 0 0; "')?>
                        </div>
                        <div class="col-xs-6 col-lg-3 ">
                            <?= form_dropdown('edit-yearstart',$yearListed,'',' id="edit-yearstart"');?>
                        </div>
                        <div class="col-xs-6 col-lg-1 ">
                            <?= form_label('to','','style="margin:8px 0 0 20px;"');?>
                        </div>
                         <div class="col-xs-6 col-lg-3 ">
                            <?= form_dropdown('edit-yearend',$yearduration,'',' id="edit-yearend"');?><br>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-3 ">
                                <?= form_label('Nature of Development','','style="margin:8px 0 0 0; "');?><br>
                            </div>
                            <div class="col-xs-12 col-lg-9 ">
                                <?= form_input('edit-nature_development','',' id="edit-nature_development"');?><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-3 ">
                            <?= form_label('Location','','style="margin:8px 0 0 0; "');?>
                        </div>
                        <div class="col-xs-6 col-lg-9 ">
                            <?= form_input('edit-proj_location','',' id="edit-proj_location" placeholder=""');?><br>
                        </div>
                    </div>
                     <div class="col-xs-12 ">
                         <div class="col-xs-6 col-lg-3 ">
                            <?= form_label('Area (has)','','style="margin:8px 0 0 0; "');?>
                        </div>
                        <div class="col-xs-6 col-lg-9 ">
                            <?= form_input('edit-area','',' id="edit-area" ');?><br>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                         <div class="col-xs-6 col-lg-3 ">
                            <?= form_label('Tenured Cost','','style="margin:8px 0 0 0; "');?>
                        </div>
                        <div class="col-xs-6 col-lg-9 ">
                            <?= form_input('edit-amount_fund','','  id="edit-amount_fund"');?><br>
                        </div>
                    </div>

                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-3 ">
                            <?= form_label('Remarks','','style="margin:8px 0 0 0; "');?><br>
                        </div>
                        <div class="col-xs-12 col-lg-9 ">
                            <?= form_textarea('edit-remarks','',' id="edit-remarks"');?><br>
                        </div>
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateProject" />

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A PROJECTS -->





<!-- MODAL FOR EDITTING A LGU -->
<form method="post" action="#" id="LGUform" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-edit-lgu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit LGU Representatives</h4>
                </div>
                <input type="hidden" id="lgu-id" name="lgu-id" value="" />
                <input type="hidden" id="lgu-gencode" name="lgu-gencode" value="" />
                <div class="modal-body" >
                     <div class="col-xs-12">
                         <div class="col-xs-6 col-lg-3">
                            <?= form_label('Name of LGU','','style="margin:8px 0 0 0; "');?>
                        </div>
                        <div class="col-xs-6 col-lg-9">
                            <?= form_input('edit-lgu','',' id="edit-lgu"');?><br>
                        </div>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="Updatelgu" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<!-- END OF MODAL FOR EDITTING A LGU -->

 <form method="post" action="#" id="StaffForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-staff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Staff</h4>
                </div>
                <input type="hidden" id="staff-id" name="staff-id" value="" />
                <input type="hidden" id="staff-gencode" name="staff-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <fieldset>
                        <legend>Technical Staff</legend>
                            <div class="col-xs-12 ">
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('First Name','','for="edit-tfname"').form_input('edit-tfname','','id="edit-tfname" placeholder="ex. John, Jane"');?>
                                        <span class="tooltiptext">Input first name</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('Middle Name','','for="edit-tmname"').form_input('edit-tmname','','id="edit-tmname" placeholder="ex. A., dela Cruz"');?>
                                        <span class="tooltiptext">Input middle name</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('Last Name','','for="edit-ttlname"').form_input('edit-ttlname','','id="edit-ttlname" placeholder="ex. Rodriguez, Espino"');?>
                                        <span class="tooltiptext">Input family name</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-3 col-lg-3 tooltip">
                                    <ul><li>
                                        <?= form_label('Suffix','','for="edit-tsuffix"').form_input('edit-tsuffix','','id="edit-tsuffix" placeholder="Sr., Jr., I, II, III"');?>
                                        <span class="tooltiptext">Input Suffix</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6 col-lg-4 tooltip">
                                    <ul><li>
                                        <?= form_label('Sex','','for="edit-tsex"').form_dropdown('edit-tsex',$sexList,'',' id="edit-tsex"');?>
                                        <span class="tooltiptext">Select sex</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-4 tooltip">
                                    <ul><li>
                                        <?= form_label('Age','','for="edit-tage"').form_input('edit-tage','','id="edit-tage" placeholder="Age"');?>
                                        <span class="tooltiptext">Input age</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6 col-lg-4 tooltip">
                                    <ul><li>
                                        <?= form_label('Status of Appointment','','for="edit-tappointment"').form_dropdown('edit-tappointment',$tappointment,'',' id="edit-tappointment"');?>
                                        <span class="tooltiptext">Select status of appointment</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6 tooltip">
                                    <ul><li>
                                        <?= form_label('Position/Designation','','for="tposition"').form_input('edit-tposition','','id="edit-tposition" placeholder="example: Forester I,II,III / EMS I,II,III"');?>
                                        <span class="tooltiptext">Input position/designation</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                    <?= form_label('Status of Employment','for="edit-status_employment"').form_dropdown('edit-status_employment',$status,'','id="edit-status_employment" '); ?>
                                    <span class="tooltiptext">Select status of employment</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                    <?= form_label('Date of Appointment').form_dropdown('edit-pamb_date_month',$monthList,'','id="edit-pamb_date_month" ');?>
                                    <span class="tooltiptext">Select date of appointment</span>
                                    </li></ul>
                                </div>
                                <div class="col-xs-4 col-lg-4 tooltip">
                                    <ul><li>
                                    <?= form_label('&nbsp;').form_dropdown('edit-pamb_date_year',$yearList,'','id="edit-pamb_date_year" ');?>
                                    <span class="tooltiptext">Select date of appointment</span>
                                    </li></ul>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <fieldset><legend>Date</legend>
                                    <div class="col-xs-6 col-lg-6">
                                        <label>Created : </label>
                                        <span id="staffDateCreated"></span>
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <label>Last Update : </label>
                                        <span id="staffDateupdate"></span>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="modal-footer">
                                    <button class="btn btn-info" type="button" onclick="UpdateStaff();" />Update
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="" id="AttractionForm" enctype="multipart/form-data" role="form" class="form-style-7" >
    <div class="modal fade" data-backdrop="static" id="modal-edit-attraction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Attraction</h4>
                </div>
                <input type="hidden" id="attraction-id" name="attraction-id" value="" />
                <input type="hidden" id="attraction-gencode" name="attraction-gencode" value="" />
                <input type="hidden" id="attraction-gencode2" name="attraction-gencode2" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <div id="ecotouruploadimages"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <label>Upload individual Geotagged photos with UTM or WGS  <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="edit-pic_attraction" id="edit-pic_attraction"  /><br>
                            <input type="hidden" name="edit-old_picture_attraction" id="edit-old_picture_attraction">
                            <input type="hidden" name="ecotourismnewimages" id="ecotourismnewimages">
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <ul><li>
                        <?= form_label('Source of the photo','','for="edit-source_photo"').form_input('edit-source_photo','',' id="edit-source_photo"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                            <?= form_label('Title','','').form_input('edit-attraction-title','',' id="edit-attraction-title" placeholder=" "');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12 hidden">
                            <ul><li>
                            <?= form_label('Activities','','for="edit-eco_activities"').form_dropdown('edit-eco_activities',$ecotourism_activity,'',' id="edit-eco_activities"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="col-lg-12 col-md-4 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity1','','','id="edit-chk_activity1" onclick="edit_ecochk_1();"').form_label('Hiking/Trekking/Mountaineering','','for="edit-chk_activity1"') ?>
                                    </div>
                                    <div id="edit-activity1" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_1" id="edit-attraction_img_file_1" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity1"></div>
                                        </div>
                                    </div>
                                </div>                               
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity2','','','id="edit-chk_activity2" onclick="edit_ecochk_1();"').form_label('Caving/Spelunking','','for="edit-chk_activity2"') ?>
                                    </div>
                                    <div id="edit-activity2" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_2" id="edit-attraction_img_file_2" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity3','','','id="edit-chk_activity3" onclick="edit_ecochk_1();"').form_label('Scuba diving','','for="edit-chk_activity3"') ?>
                                    </div>
                                    <div id="edit-activity3" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_3" id="edit-attraction_img_file_3" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity3"></div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity4','','','id="edit-chk_activity4" onclick="edit_ecochk_1();"').form_label('Snorkeling','','for="edit-chk_activity4"') ?>
                                    </div>
                                    <div id="edit-activity4" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_4" id="edit-attraction_img_file_4" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity4"></div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity5','','','id="edit-chk_activity5" onclick="edit_ecochk_1();"').form_label('Swimming','','for="edit-chk_activity5"') ?>
                                    </div>
                                    <div id="edit-activity5" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_5" id="edit-attraction_img_file_5" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity5"></div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity6','','','id="edit-chk_activity6" onclick="edit_ecochk_1();"').form_label('Kayaking','','for="edit-chk_activity6"') ?>
                                    </div>
                                    <div id="edit-activity6" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_6" id="edit-attraction_img_file_6" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity6"></div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity7','','','id="edit-chk_activity7" onclick="edit_ecochk_1();"').form_label('Surfing','','for="edit-chk_activity7"') ?>
                                    </div>
                                    <div id="edit-activity7" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_7" id="edit-attraction_img_file_7" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity7"></div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity8','','','id="edit-chk_activity8" onclick="edit_ecochk_1();"').form_label('Wildlife watching','','for="edit-chk_activity8"') ?>
                                    </div>
                                    <div id="edit-activity8" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_8" id="edit-attraction_img_file_8" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity8"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity9','','','id="edit-chk_activity9" onclick="edit_ecochk_1();"').form_label('Bird watching','','for="edit-chk_activity9"') ?>
                                    </div>
                                    <div id="edit-activity9" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_9" id="edit-attraction_img_file_9" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity9"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity10','','','id="edit-chk_activity10" onclick="edit_ecochk_1();"').form_label('Village tour','','for="edit-chk_activity10"') ?>
                                    </div>
                                    <div id="edit-activity10" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_10" id="edit-attraction_img_file_10" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity10"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity11','','','id="edit-chk_activity11" onclick="edit_ecochk_1();"').form_label('Mangrove tours','','for="edit-chk_activity11"') ?>
                                    </div>
                                    <div id="edit-activity11" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_11" id="edit-attraction_img_file_11" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity11"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity12','','','id="edit-chk_activity12" onclick="edit_ecochk_1();"').form_label('Science Museum tours','','for="edit-chk_activity12"') ?>
                                    </div>
                                    <div id="edit-activity12" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_12" id="edit-attraction_img_file_12" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity12"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity13','','','id="edit-chk_activity13" onclick="edit_ecochk_1();"').form_label('Biking','','for="edit-chk_activity13"') ?>
                                    </div>
                                    <div id="edit-activity13" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_13" id="edit-attraction_img_file_13" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity13"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity14','','','id="edit-chk_activity14" onclick="edit_ecochk_1();"').form_label('Nature photography','','for="edit-chk_activity14"') ?>
                                    </div>
                                    <div id="edit-activity14" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_14" id="edit-attraction_img_file_14" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity14"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xs-6">
                                    <div class="col-xs-12 col-lg-12 col-md-12">
                                        <?php echo form_checkbox('edit-chk_activity15','','','id="edit-chk_activity15" onchange="mychkEcoe();"  onclick="edit_ecochk_1();"').form_label('Others','','for="edit-chk_activity15" ') ?>
                                    </div>
                                    <div id="edit-activity15" style="display:none">
                                        <div class="col-xs-12 col-lg-6 col-md-12">
                                            <ul><li>
                                                <label></label>
                                                <input type="file" name="edit-attraction_img_file_15" id="edit-attraction_img_file_15" multiple />
                                            </li></ul>
                                            <div id="upload_img_activity15"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-xs-12 col-lg-12" id="otherecoactivitydivEdit">
                            <ul><li>
                                <?= form_label('Specify Other Activities','','for="edit-otherecoactivity"').form_input('edit-otherecoactivity','',' id="edit-otherecoactivity"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12" style="margin-top:10px">
                            <ul><li>
                            <?php echo form_label('Description','','').''.form_textarea('edit-attraction-desc','',' id="edit-attraction-desc"') ?>
                            </li></ul>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdatAttraction" onclick="UpdateEditAttraction();" />    -->
                                <button class="btn btn-info" type="button" onclick="UpdateEditAttraction();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="FacilityForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-facility" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Facility</h4>
                </div>
                <input type="hidden" id="facility-id" name="facility-id" value="" />
                <input type="hidden" id="facility-gencode" name="facility-gencode" value="" />
                <input type="hidden" id="facility-gencode2" name="facility-gencode2" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <fieldset>
                            <div class="col-xs-12 col-lg-12 ">
                                <div id="facilitiesimageupload"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <ul><li>
                                    <label>Upload individual Geotagged photos facility with UTM or WGS  <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                    <input type='file' name="edit-pic_facility" id="edit-pic_facility" /><br>
                                    <input type="hidden" name="edit-old_picture_facility" id="edit-old_picture_facility">
                                    <input type="hidden" id="edit-img_facilitiesoutput" name="edit-img_facilitiesoutput"></input>
                                </li></ul>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?= form_label('Title','','').form_dropdown('edit-facility-title',$facilityList,'',' id="edit-facility-title" placeholder=" "');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12" id="facilityotherdivEdit">
                            <ul><li>
                                <?= form_label('Specify other facilities','','for="edit-ecofacilityother"').form_input('edit-ecofacilityother','','placeholder=" " id="edit-ecofacilityother"'); ?>

                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <ul><li>
                            <?= form_label('Condition','','for="edit-facility_condition"').form_dropdown('edit-facility_condition',$fcondition,'','id="edit-facility_condition"'); ?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?=  form_label('Date Build','','for="edit-facilities_month"').form_dropdown('edit-facilities_month',$monthList,'','id="edit-facilities_month" class="form-control border-input select-css"');?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <ul><li>
                                <?=  form_label('&nbsp;','','for="edit-facilities_year"').form_dropdown('edit-facilities_year',$yearList,'','id="edit-facilities_year" class="form-control border-input select-css"');?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <ul><li>
                            <?=  form_label('# of People Accomodate','','for="edit-nopeopleaccom"').form_input('edit-nopeopleaccom','','placeholder="" id="edit-nopeopleaccom"');?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <ul><li>
                            <?php echo form_label('Description','','').''.form_textarea('edit-facility-desc','',' id="edit-facility-desc"') ?>
                        </li></ul>
                    </div>
                    <fieldset>                       
                        <div class="col-xs-12 col-lg-12">                               
                            <ul><li>
                                <label>Upload multiple facility image<i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type="file" name="edit-facility_img_files" id="edit-facility_img_files" multiple />
                            </li></ul>
                        </div>
                         <div class="col-xs-12 col-lg-6 ">   
                            <div id="edit-fetch_images_attraction"></div>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <!-- <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdatAttraction" onclick="UpdateEditFacility();" />     -->
                                <button class="btn btn-info" type="button" onclick="UpdateEditFacility();" />Update

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="ActivityForm" enctype="multipart/form-data" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-edit-activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Activity</h4>
                </div>
                <input type="hidden" id="activity-id" name="activity-id" value="" />
                <input type="hidden" id="activity-gencode" name="activity-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-activity" src="<?php echo base_url("bmb_assets2/upload/facilities_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_activity" id="edit-pic_activity" onchange="readURLsActivityedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_activity" id="edit-old_picture_activity">
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12">
                            <?= form_label('Title','','').form_input('edit-activity-title','',' id="edit-activity-title" placeholder=" "');?>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <?php echo form_label('Description','','').''.form_textarea('edit-activity-desc','',' id="edit-activity-desc"') ?>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdatAttraction" onclick="UpdateEditActivity();" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="ProductForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-product" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <input type="hidden" id="product-id" name="product-id" value="" />
                <input type="hidden" id="product-gencode" name="product-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                          <div id="productimageuploads"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <label>Upload point location map image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="edit-pic_product" id="edit-pic_product" /><br>
                            <input type="hidden" name="edit-old_picture_product" id="edit-old_picture_product">
                            <input type="hidden" id="edit-img_outputproduct" name="edit-img_outputproduct"></input>
                        </div>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                                <?php echo form_label('Description','','').''.form_textarea('edit-product-desc','',' id="edit-product-desc"') ?>
                            </li></ul>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="UpdateEditProduct();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="EnterpriseForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-enterprise" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Enterprises</h4>
                </div>
                <input type="hidden" id="enterprise-id" name="enterprise-id" value="" />
                <input type="hidden" id="enterprise-gencode" name="enterprise-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <div id="prodenterprisedivupload"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <label>Upload image <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="edit-pic_enterprise" id="edit-pic_enterprise" /><br>
                            <input type="hidden" name="edit-old_picture_enterprise" id="edit-old_picture_enterprise">
                            <input type="hidden" id="edit-img_outputenterpriseimage" name="edit-img_outputenterpriseimage"></input>
                        </div>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12">
                        <ul><li>
                            <?php echo form_label('Description','','').''.form_textarea('edit-enterprise-desc','',' id="edit-enterprise-desc"') ?>
                        </li></ul>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="UpdateEditEnterprise();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="AgroForm" enctype="multipart/form-data" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-edit-agro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Agroforestry</h4>
                </div>
                <input type="hidden" id="agro-id" name="agro-id" value="" />
                <input type="hidden" id="agro-gencode" name="agro-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <img width="200px" height="180px" id="edit-agro" src="<?php echo base_url("bmb_assets2/upload/agroforestry_img/nophoto.jpg") ?>" alt="your image" /><br>
                            <input type='file' name="edit-pic_agro" id="edit-pic_agro" onchange="readURLsAgroedit(this);"  /><br>
                            <input type="hidden" name="edit-old_picture_agro" id="edit-old_picture_agro">
                            <span id="edit-img_output" class="edit-img_output"></span>
                        </div>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12">
                            <?= form_label('Title','','').form_input('edit-agro-title','',' id="edit-agro-title" placeholder=" "');?>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <?php echo form_label('Description','','').''.form_textarea('edit-agro-desc','',' id="edit-agro-desc"') ?>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <?= form_label('Area(has)','','').form_input('edit-agro-area','',' onkeyup="run(this);" id="edit-agro-area" placeholder=" "');?>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdatAttraction" onclick="UpdateEditAgro();" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="MapForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Map Image</h4>
                </div>
                <input type="hidden" id="map-id" name="map-id" value="" />
                <input type="hidden" id="map-gencode" name="map-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <div id="mapimageuploadidv"></div>
                        </div>
                        <div class="col-xs-12 col-lg-12 ">
                            <label>Upload images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                            <input type='file' name="edit-pic_map" id="edit-pic_map" />
                            <input type="hidden" name="edit-old_picture_map" id="edit-old_picture_map">
                            <input type="hidden" id="edit-img_outputspan" name="edit-img_outputspan">
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12">
                        <fieldset>
                            <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                            <input type='file' name="edit-shp_othermap" id="edit-shp_othermap" onchange="readURLshapefileothermapEdit(this);" />
                            <input type="hidden" name="edit-shp_othermap_txt" id="edit-shp_othermap_txt">
                            <input type="hidden" name="edit-shp_othermap_old" id="edit-shp_othermap_old">
                            <div id="edit-fetch_othermap_shpfile"></div>
                        </fieldset> 
                    </div>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?php echo form_label('Remarks','','').''.form_textarea('edit-map-desc','',' id="edit-map-desc"') ?>
                            </li></ul>
                        </div>
                    </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" name="submit" value="Update" id="UpdateThreats" onclick="UpdateMaps();">Update</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="IncomeForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-income" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Monitoring of Income Generated within Protected Area</h4>
                </div>
                <input type="hidden" id="income-id" name="income-id" value="" />
                <input type="hidden" id="income-gencode" name="income-gencode" value="" />
                <div class="modal-body" >
                <fieldset>
                    <legend>Period Covered</legend>
                    <div class="col-xs-4 col-lg-4 ">
                        <?= form_input('edit-monitor_months-inv','','id="edit-monitor_months-inv"'); ?>
                    </div>
                    <div class="col-xs-4 col-lg-4">
                        <?= form_input('edit-monitor_days-inv','','id="edit-monitor_days-inv"'); ?>

                    </div>
                    <div class="col-xs-4 col-lg-4 ">
                        <?= form_input('edit-monitor_years-inv','','id="edit-monitor_years-inv"'); ?>
                    </div>
                </fieldset>
                   <fieldset>
                        <legend>Income Generated (Peso)</legend>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                            <?= form_label('Entrance Fee','','for="edit-entrancefee"').form_input('edit-entrancefee','','placeholder="Amount (Peso)" id="edit-entrancefee" onchange="calculator_ipaf()" '); ?>
                        </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                            <?= form_label('Facilities User Fee','','for="edit-income_facilities"').form_input('edit-income_facilities','','placeholder="Amount (Peso)" id="edit-income_facilities" onchange="calculator_ipaf()" ') ?>
                        </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                            <?= form_label('Resource User Fee','','for="edit-resource"').form_input('edit-resource','','placeholder="Amount (Peso)" id="edit-resource" onchange="calculator_ipaf()" '); ?>
                        </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-12">
                            <ul><li>
                            <?= form_label('Concession Fee','','for="edit-concession"').form_input('edit-concession','','placeholder="Amount (Peso)" id="edit-concession" onchange="calculator_ipaf()" '); ?>
                        </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Certificate of Deposit</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-6">
                                <ul><li>
                                    <?= form_label('Certificate of 25% Deposit','','for="edit-proofdeposit"'); ?>
                                    <input type = "file" name = "edit-proofdeposit" id="edit-proofdeposit" />
                                    <input type="hidden" name="old-proofdeposit" id="old-proofdeposit" />
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <?= form_label('Current file attached','','for="certofdeposit"')?>
                                <a href="" id="certofdeposit" target="_blank"></a>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Bank certification for depository bank'</legend>
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-lg-6">
                                <ul><li>
                                    <?= form_label('Bank certification for depository bank','','for="resource"'); ?>
                                    <input type = "file" name = "edit-bankdeposit" id="edit-bankdeposit" />
                                    <input type="hidden" name="old-bankdeposit" id="old-bankdeposit" />
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 ">
                                <?= form_label('Current file attached','','for="bankdepositfile"')?>
                                <a href="" id="bankdepositfile" target="_blank"></a>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Other income</legend>
                        <div id="editincomediv"></div>
                        <div id="incomedivadd">
                            <button id="add_other_income_edit"  type="button" class="btn btn-info">Add other income</button>
                        </div><br>
                    </fieldset>
                    <fieldset>
                        <legend>Contribution/Donation</legend>
                        <div class="col-xs-12 col-lg-12">
                        <div id="messagecontri"></div>
                        </div>
                        <div id="contridivedit">
                            <button id="add_contribution_donationedit"  type="button" class="btn btn-info">Add Contribution/Donation</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Development Fees</legend>
                        <div id="messagedevelopment"></div>
                        <div id="developmentdivedit">
                            <button id="add_development_donationedit"  type="button" class="btn btn-info">Add Development Fees</button>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Fines and Penalties</legend>
                        <div id="messagepenalty"></div>
                        <div id="penaltydivedit">
                            <button id="add_penalty_donationedit"  type="button" class="btn btn-info">Add Fines and  Penalties</button>
                        </div>
                    </fieldset>
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="UpdateIncome();" />Update
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="VisitorsForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-visitors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Monitoring of Protected Area Visitors</h4>
                </div>
                <input type="hidden" id="visitors-id" name="visitors-id" value="" />
                <input type="hidden" id="visitors-gencode" name="visitors-gencode" value="" />
                <div class="modal-body" >
                    <fieldset>
                        <legend>Period Covered</legend>
                        <div class="col-xs-4 col-lg-4 ">
                            <span id=visitorsperiod></span>
                        </div>
                    </fieldset>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <fieldset>
                            <legend>Local Adults</legend>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Male','','for="edit-no_male_local"').form_input('edit-no_male_local','','placeholder="Total no. of male" id="edit-no_male_local" '); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Female','','for="edit-no_female_local"').form_input('edit-no_female_local','','placeholder="Total no. of female" id="edit-no_female_local" ') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-6">
                            <fieldset>
                            <legend>Local Students</legend>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Male','','for="edit-no_male_local_student"').form_input('edit-no_male_local_student','','placeholder="Total no. of male" id="edit-no_male_local_student" '); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Female','','for="edit-no_female_local_student"').form_input('edit-no_female_local_student','','placeholder="Total no. of female" id="edit-no_female_local_student" ') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-6">
                            <fieldset>
                            <legend>Local Person with Disability</legend>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Male','','for="edit-no_male_local_pwd"').form_input('edit-no_male_local_pwd','','placeholder="Total no. of male" id="edit-no_male_local_pwd" '); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Female','','for="edit-no_female_local_pwd"').form_input('edit-no_female_local_pwd','','placeholder="Total no. of female" id="edit-no_female_local_pwd" ') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-6">
                            <fieldset>
                            <legend>Local Senior Citizen</legend>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Male','','for="edit-no_male_local_sc"').form_input('edit-no_male_local_sc','','placeholder="Total no. of male" id="edit-no_male_local_sc" '); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Female','','for="edit-no_female_local_sc"').form_input('edit-no_female_local_sc','','placeholder="Total no. of female" id="edit-no_female_local_sc" ') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-6">
                            <fieldset>
                            <legend>Local Children below 7y/o.</legend>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Male','','for="edit-no_male_local_children"').form_input('edit-no_male_local_children','','placeholder="Total no. of male" id="edit-no_male_local_children" '); ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <ul><li>
                                        <?= form_label('Female','','for="edit-no_female_local_children"').form_input('edit-no_female_local_children','','placeholder="Total no. of female" id="edit-no_female_local_children" ') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <fieldset>
                                <legend>Foreign</legend>
                                <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Male','','for="edit-no_male_foreign"').form_input('edit-no_male_foreign','','placeholder="Total no. of male" id="edit-no_male_foreign" '); ?>
                                </li></ul>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                <ul><li>
                                    <?= form_label('Female','','for="edit-no_female_foreign"').form_input('edit-no_female_foreign','','placeholder="Total no. of female" id="edit-no_female_foreign" ') ?>
                                </li></ul>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                   <!--  <div class="col-xs-12">

                    </div> -->
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <button class="btn btn-info" type="button" onclick="UpdateVisitor();" />Update

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<form method="post" action="" id="ContriForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-contri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Contribution/Donation</h4>
                </div>
                <input type="hidden" id="contri-id" name="contri-id" value="" />
                <input type="hidden" id="contri-gencode" name="contri-gencode" value="" />
                <div class="modal-body" style="display:block">
                    <fieldset>
                        <legend>Period Covered</legend>
                        <div class="col-xs-4 col-lg-4">
                            <?= form_dropdown('edit-monitor_months-contri',$monthListed,'','class="form-control border-input select-css" id="edit-monitor_months-contri"'); ?>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <?= form_dropdown('edit-monitor_day-contri',$dayList,'','class="form-control border-input select-css" id="edit-monitor_day-contri"'); ?>
                        </div>
                        <div class="col-xs-4 col-lg-4">
                            <?= form_dropdown('edit-monitor_years-contri',$yearListed,'','class="form-control border-input select-css" id="edit-monitor_years-contri"'); ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateContri" onclick="UpdateContris();" />
                        </div>
                    </fieldset>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="OtherTenureForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-othertenure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Other Tenurial Instruments/Agreement</h4>
                </div>
                <input type="hidden" id="othertenure-id" name="othertenure-id" value="" />
                <input type="hidden" id="othertenure-gencode" name="othertenure-gencode" value="" />
                <div class="modal-body" style="display:block">
                    <fieldset>
                        <div class="col-xs-12 col-lg-12 col-sm-12">
                            <div class="col-xs-12 col-lg-12">
                                <div id="fetch_other_map_images"></div>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <label>Upload images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                                <input type='file' name="edit-pic_otother" id="edit-pic_otother" /><br>
                                <input type="hidden" name="edit-old_otother" id="edit-old_otother" />
                                <input type="hidden" name="edit-othermapimage_text" id="edit-othermapimage_text" />
                            </div>
                            <fieldset>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Upload Shapefile <i>(note: *.zip, *.rar file, maximum file of 200MB)</i></legend>
                                <div class="col-xs-12">
                                    <input type='file' name="edit-zip_shpfile_otherinstrument" id="edit-zip_shpfile_otherinstrument"  />
                                    <input type="hidden" name="edit-old_shpfileotherinstrument" id="edit-old_shpfileotherinstrument" />
                                    <input type="hidden" id="edit-shpzip_otherinstrument" name="edit-shpzip_otherinstrument" />
                                </div>
                                <div class="col-xs-12 col-lg-12">
                                    <div id="loadingothertenureshpfileEdit"></div>
                                </div>
                                <div class="col-xs-12 col-lg-12 ">
                                    <?= form_label('Current file attached : ','','for="zip_shp_file_othertenure"')?>
                                    <a href="" id="zip_shp_file_othertenure" target="_blank"></a>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <div class="col-xs-6 col-lg-6 col-md-6">
                                <ul><li>
                                    <?= form_label('Types of Instrument/Agreement','','for="edit-typesinstrument"').form_dropdown('edit-typesinstrument',$tenurelist,'','id="edit-typesinstrument"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6" id="edit-chk-typeinstrument" style="display: none">
                                <ul><li>
                                    <?= form_label('Title No','','for="edit-titledinstrument"').form_input('edit-titledinstrument','','id="edit-titledinstrument"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-6 col-lg-6 col-md-6" id="edit-chk-othertenure" style="display: none">
                                <ul><li>
                                    <?= form_label('Specify Others','','for="edit-othertenure"').form_input('edit-othertenure','','id="edit-othertenure"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <ul><li>
                                    <?= form_label('Tenure holder/proponent name','','for="edit-holderinstrument"').form_input('edit-holderinstrument','','id="edit-holderinstrument"') ?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <ul><li>
                                    <?= form_label('Nature of development/purpose','','for="edit-purposeinstrument"').form_input('edit-purposeinstrument','','id="edit-purposeinstrument"') ?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <ul><li>
                                    <?= form_label('Location','','edit-otlocation').form_input('edit-otlocation','','id="edit-otlocation"');?>
                                </li></ul>
                            </div>
                            <div class="col-xs-12 col-lg-12 col-md-12">
                                <ul><li>
                                    <?= form_label('Area (has)','','edit-otarea').form_input('edit-otarea','','id="edit-otarea" class="number-separator"');?>
                                </li></ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <fieldset>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Duration</legend>
                                <div class="col-xs-12 col-lg-4 col-md-6">
                                    <ul><li>
                                        <?= form_label('Date Approve','','for="edit-otyearstart"').form_dropdown('edit-otyearstart',$yearListed,'','id="edit-otyearstart"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 col-md-6">
                                    <ul><li>
                                        <?= form_label('Date Expiry','','for="edit-otyearend"').form_dropdown('edit-otyearend',$yearduration,'','id="edit-otyearend"') ?>
                                    </li></ul>
                                </div>
                                <div class="col-xs-12 col-lg-4 col-md-6">
                                    <ul><li>
                                        <?= form_label('Status','','for="edit-otstatus"').form_dropdown('edit-otstatus',$status_mngmtplan,'','id="edit-otstatus"') ?>
                                    </li></ul>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-xs-12 col-lg-12 col-md-12">
                            <fieldset>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Attached approved documents <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                    <div class="col-xs-12">

                                    </div>
                                    <div class="col-xs-12 col-lg-12 ">
                                        <input type='file' name="edit-zip_shpfile_otherinstrumentfile" id="edit-zip_shpfile_otherinstrumentfile" onchange="readURLotherInstrumentfileSHPedit(this);"  />
                                        <input type="hidden" name="edit-old_shpfileotherinstrumentfile" id="edit-old_shpfileotherinstrumentfile" />
                                        <input type="hidden" id="edit-shpzip_otherinstrumentfile_text" class="edit-shpzip_otherinstrumentfile_text" />
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div id="loadingothertenureapprovedocsEdit"></div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 ">
                                        <?= form_label('Current file attached : ','','for="zip_file_othertenure"')?>
                                        <a href="" id="zip_file_othertenure" target="_blank"></a>
                                    </div>
                            </fieldset>
                            <div class="hidden">
                            <fieldset>
                                <legend style="background-color: transparent;color: black;font-weight: 700">Attached PAMB Clearance <i>(*.pdf format, maximum size of 50MB)</i></legend>
                                    <div class="col-xs-12">

                                    </div>
                                    <div class="col-xs-12 col-lg-12 ">
                                        <input type='file' name="edit-otherpambclearancefile" id="edit-otherpambclearancefile" onchange="readURLotherspambclearancefileEdit(this);"  />
                                        <input type="hidden" name="edit-otherpambclearancefile_span" id="edit-otherpambclearancefile_span" />
                                        <input type="hidden" id="edit-shpzip_otherpambclearancefile_text" class="edit-shpzip_otherpambclearancefile_text" />
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div id="loadingothertenureapambclearanceEdit"></div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12 ">
                                        <?= form_label('Current file attached : ','','for="pambclearance_file_othertenure"')?>
                                        <a href="" id="pambclearance_file_othertenure" target="_blank"></a>
                                    </div>
                            </fieldset>
                            </div>
                        </div>
                    </fieldset>
                    <div class="modal-footer">
                        <button class="btn btn-info" type="button" onclick="Updateothertenureedit();" />Update
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>


<form method="post" action="" id="InlandForm" enctype="multipart/form-data" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-edit-inland" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Inland</h4>
                </div>
                <input type="hidden" id="inland-id" name="inland-id" value="" />
                <input type="hidden" id="inland-gencode" name="inland-gencode" value="" />
                <div class="modal-body" >

                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12 field">
                                <?= form_label('Description','',' for="edit-inland_desc"').''.form_textarea('edit-inland_desc','',' placeholder="Brief description" id="edit-inland_desc"');?>
                            </div>
                            <div class="col-xs-12 col-lg-12 field">
                                    <?php echo form_label('Inland Area(has)','','for="edit-inland_area"').form_input('edit-inland_area','','  id="edit-inland_area" placeholder=" "') ?>
                            </div>
                        </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateContri" onclick="UpdateInland();" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="WetlandForm" enctype="multipart/form-data" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-edit-wetland" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Wetland</h4>
                </div>
                <input type="hidden" id="wetland-id" name="wetland-id" value="" />
                <input type="hidden" id="wetland-gencode" name="wetland-gencode" value="" />
                <div class="modal-body" >

                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12 field">
                                <?= form_label('Description','',' for="edit-wetland_desc"').''.form_textarea('edit-wetland_desc','',' placeholder="Brief description" id="edit-wetland_desc"');?>
                            </div>
                            <div class="col-xs-12 col-lg-12 field">
                                    <?php echo form_label('Wetland area(has)','','for="edit-wetland_area"').form_input('edit-wetland_area','','  id="edit-wetland_area" placeholder=" "') ?>
                            </div>
                        </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateContri" onclick="UpdateWetland();" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="tribeForm" enctype="multipart/form-data" role="form">
    <div class="modal fade" data-backdrop="static" id="modal-edit-iccip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit ICCIPs</h4>
                </div>
                <input type="hidden" id="iccip-id" name="iccip-id" value="" />
                <input type="hidden" id="iccip-gencode" name="iccip-gencode" value="" />
                <div class="modal-body" >

                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-2 ">
                                <?= form_label('ICCs/IPs Community','','style="margin:20px"')?>
                            </div>
                            <div class="col-xs-12 col-lg-4 ">
                                <?= form_dropdown('edit-iccsipss',$tribelist,'',' id="edit-iccsipss" style="margin-top:20px;"') ?>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <?= form_label('Male','','for="edit-iccip_male"').form_input('edit-iccip_male','','placeholder=" "  id="edit-iccip_male" onkeyup=run(this)');?>
                            </div>
                            <div class="col-xs-12 col-lg-3">
                                <?= form_label('Female','','for="edit-iccip_female"').form_input('edit-iccip_female','','placeholder=" "  id="edit-iccip_female" onkeyup=run(this)');?>
                            </div>
                        </div>

                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 ">
                            <div class="modal-footer">
                                <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateContri" onclick="Updateiccip();" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>


<form method="post" action="#" id="developmentForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-dev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Development fees</h4>
                </div>
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">
                            <input type="hidden" id="dev-id" name="dev-id" value="" />
                            <input type="hidden" id="dev-gencode" name="dev-gencode" value="" />
                        </div>
                    </div>
                    <fieldset>
                        <legend>Period Covered</legend>
                        <div class="col-xs-6 col-lg-6">
                            <?= form_dropdown('edit-monitor_months-dev',$monthListed,'','class="form-control border-input select-css" id="edit-monitor_months-dev"'); ?>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <?= form_dropdown('edit-monitor_years-dev',$yearListed,'','class="form-control border-input select-css" id="edit-monitor_years-dev"'); ?>
                        </div>
                    </fieldset>
                   <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-6">
                            <ul><li>
                            <?= form_label('Devt Fee/ Royalty','','for="edit-developments"').form_input('edit-developments','','placeholder="Amount" id="edit-developments"  style="height: 100px;"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <ul><li>
                            <?= form_label('Remarks','','for="edit-dev_remarks"').form_textarea('edit-dev_remarks','','placeholder="Details" id="edit-dev_remarks" style="height:100px"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="Updatedev" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="#" id="penaltyForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-penalty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Fines and Penalties</h4>
                </div>
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">
                            <input type="hidden" id="penalty-id" name="penalty-id" value="" />
                            <input type="hidden" id="penalty-gencode" name="penalty-gencode" value="" />
                        </div>
                    </div>
                    <fieldset>
                        <legend>Period Covered</legend>
                        <div class="col-xs-6 col-lg-6">
                            <?= form_dropdown('edit-monitor_months-penalty',$monthListed,'','class="form-control border-input select-css" id="edit-monitor_months-penalty"'); ?>
                        </div>
                        <div class="col-xs-6 col-lg-6">
                            <?= form_dropdown('edit-monitor_years-penalty',$yearListed,'','class="form-control border-input select-css" id="edit-monitor_years-penalty"'); ?>
                        </div>
                    </fieldset>
                   <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-6">
                            <ul><li>
                                <?= form_label('Fines and Penalties','','for="edit-finespenalty"').form_input('edit-finespenalty','','placeholder="Amount" id="edit-finespenalty"  style="height: 100px;"'); ?>
                            </li></ul>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-penalty_remarks"').form_textarea('edit-penalty_remarks','','placeholder="Details" id="edit-penalty_remarks" style="height:100px"') ?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="Updatepenalty" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>



<form method="post" action="#" id="ecotourismForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-seamseco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from Ecotourism</h4>
                </div>
                <div class="modal-body" >
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-12 col-lg-12 ">
                            <input type="hidden" id="seamseco-id" name="seamseco-id" value="" />
                            <input type="hidden" id="seamseco-gencode" name="seamseco-gencode" value="" />
                        </div>
                    </div>
                    <fieldset>
                        <legend> Transport services (specify)</legend>
                        <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12 ">
                                <ul><li>
                                <?= form_label('Household member name','','for="edit-hh_id"').form_dropdown('edit-hh_id',$householdid,'','class="form-control border-input select-css" id="edit-hh_id"')?>
                                </li></ul>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Tour guiding</legend>
                        <div class="col-xs-5 col-lg-5 ">
                            <ul><li>
                            <?= form_label('Avarage Annual Income','','for="edit-tour_income"').form_input('edit-tour_income','','placeholder=" "  id="edit-tour_income"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-7 col-lg-7 ">
                            <ul><li>
                            <?= form_label('Location where activity is conducted','','for="edit-tour_location"').form_input('edit-tour_location','','placeholder=" " id="edit-tour_location"')?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Ecolodge operation</legend>
                        <div class="col-xs-5 col-lg-5 ">
                            <ul><li>
                            <?= form_label('Avarage Annual Income','','for="edit-ecolodge_income"').form_input('edit-ecolodge_income','','placeholder=" "  id="edit-ecolodge_income"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-7 col-lg-7 ">
                            <ul><li>
                            <?= form_label('Location where activity is conducted','','for="edit-ecolodge_location"').form_input('edit-ecolodge_location','','placeholder=" " id="edit-ecolodge_location"')?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Kiosk operation</legend>
                        <div class="col-xs-5 col-lg-5 ">
                            <ul><li>
                            <?= form_label('Avarage Annual Income','','for="edit-kiosk_income"').form_input('edit-kiosk_income','','placeholder=" "  id="edit-kiosk_income"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-7 col-lg-7 ">
                            <ul><li>
                            <?= form_label('Location where activity is conducted','','for="edit-kiosk_location"').form_input('edit-kiosk_location','','placeholder=" " id="edit-kiosk_location"')?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Boat/Kayak operation</legend>
                        <div class="col-xs-5 col-lg-5 ">
                            <ul><li>
                            <?= form_label('Avarage Annual Income','','for="edit-boat_income"').form_input('edit-boat_income','','placeholder=" "  id="edit-boat_income"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-97 col-lg-7 ">
                            <ul><li>
                            <?= form_label('Location where activity is conducted','','for="edit-boat_location"').form_input('edit-boat_location','','placeholder=" " id="edit-boat_location"')?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Porterage operation</legend>
                        <div class="col-xs-5 col-lg-5 ">
                            <ul><li>
                            <?= form_label('Avarage Annual Income','','for="edit-porterage_income"').form_input('edit-porterage_income','','placeholder=" "  id="edit-porterage_income"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-7 col-lg-7 ">
                            <ul><li>
                            <?= form_label('Location where activity is conducted','','for="edit-porterage_location"').form_input('edit-porterage_location','','placeholder=" " id="edit-porterage_location"')?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                    <legend> Transport services (specify)</legend>
                        <div class="col-xs-12 col-lg-12">
                            <div id="sample_insert"></div>
                            <div id="ca1e">
                                <button id="edit-add_transport"  type="button" class="btn btn-info">Add transport service (specify)</button>
                            </div><br>
                        </div>
                    </fieldset>
                    <fieldset>
                    <legend> Catering/restaurant operations</legend>
                        <div class="col-xs-3 col-lg-5 ">
                            <ul><li>
                            <?= form_label('Avarage Annual Income','','for="edit-catering_income"').form_input('edit-catering_income','','placeholder=" "  id="edit-catering_income"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-9 col-lg-7 ">
                            <ul><li>
                            <?= form_label('Location where activity is conducted','','for="edit-catering_location"').form_input('edit-catering_location','','placeholder=" " id="edit-catering_location"')?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                    <legend> Trekking</legend>
                        <div class="col-xs-5 col-lg-5 ">
                            <ul><li>
                            <?= form_label('Avarage Annual Income','','for="edit-trekking_income"').form_input('edit-trekking_income','','placeholder=" "  id="edit-trekking_income"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-7 col-lg-7 ">
                            <ul><li>
                            <?= form_label('Location where activity is conducted','','for="edit-trekking_location"').form_input('edit-trekking_location','','placeholder=" " id="edit-trekking_location"')?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                    <legend> Caving</legend>
                        <div class="col-xs-5 col-lg-5 ">
                            <ul><li>
                            <?= form_label('Avarage Annual Income','','for="edit-caving_income"').form_input('edit-caving_income','','placeholder=" "  id="edit-caving_income"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-7 col-lg-7 ">
                            <ul><li>
                            <?= form_label('Location where activity is conducted','','for="edit-caving_location"').form_input('edit-caving_location','','placeholder=" " id="edit-caving_location"')?>
                            </li></ul>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend> Others (specify)</legend>
                        <div class="col-xs-12 col-lg-12">
                            <div id="sample_insertOthers"></div>
                            <div id="ca2e">
                                <button id="edit-add_other_ecotourism"  type="button" class="btn btn-info">Add other revenue from ecotourism (specify)</button>
                            </div><br>
                        </div>
                    </fieldset>
                    <div id="messagecorrect1"></div>
                    <div id="messagecorrect2"></div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsEcotourism" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsFishSaltForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-fishsalt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Income source from Fisheries (Salt water)</h4>
                </div>
                <input type="hidden" id="fishsalt-id" name="fishsalt-id" value="" />
                <input type="hidden" id="fishsalt-gencode" name="fishsalt-gencode" value="" />
                <div class="modal-body" >
                   <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-fs_id"').form_dropdown('edit-fs_id',$householdid,'',' id="edit-fs_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                            <?= form_label('Type of fishing method','','for="edit-fs1"').form_input('edit-fs1','','placeholder=" " id="edit-fs1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                            <?= form_label('Species','','for="edit-fs2"').form_input('edit-fs2','','placeholder=" " id="edit-fs2"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Unit of measure','','for="edit-fs3"').form_input('edit-fs3','','placeholder=" " id="edit-fs3"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume sold per year','','for="edit-fs4"').form_input('edit-fs4','',' placeholder=" " id="edit-fs4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume consumed per year','','for="edit-fs5"').form_input('edit-fs5','',' placeholder=" " id="edit-fs5"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Price per unit','','for="edit-fs6"').form_input('edit-fs6','',' placeholder=" " id="edit-fs6"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Value','','for="edit-fs7"').form_input('edit-fs7','',' placeholder=" " id="edit-fs7"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of gears used per fishing method','','for="edit-fs8"').form_input('edit-fs8','','placeholder=" " id="edit-fs8"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Total number of fishing hours per year','','for="edit-fs9"').form_input('edit-fs9','',' placeholder=" " id="edit-fs9"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Number of season or period in a year','','for="edit-fs10"').form_input('edit-fs10','',' placeholder=" " id="edit-fs10"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Season or period of fishing (month)','','for="edit-fs11"').form_dropdown('edit-fs11',$monthList,'',' id="edit-fs11"')?><br>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('location or landmarks where fishing activity is conducted','','for="edit-fs12"').form_input('edit-fs12','','placeholder=" " id="edit-fs12"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('No of people & household members involved in the activity','','for="edit-fs13"').form_input('edit-fs13','',' placeholder=" " id="edit-fs13"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing agents','','for="edit-fs14"').form_input('edit-fs14','','placeholder=" " id="edit-fs14"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing location','','for="edit-fs15"').form_input('edit-fs15','','placeholder=" " id="edit-fs15"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of payment','','for="edit-fs16"').form_input('edit-fs16','','placeholder=" " id="edit-fs16"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-fs17"').form_textarea('edit-fs17','','placeholder=" " id="edit-fs17"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsFishSalt" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsFishFreshForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-fishfresh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Income source from Fisheries (Fresh water)</h4>
                </div>
                <input type="hidden" id="fishfresh-id" name="fishfresh-id" value="" />
                <input type="hidden" id="fishfresh-gencode" name="fishfresh-gencode" value="" />
                <div class="modal-body" >
                   <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-ffs_id"').form_dropdown('edit-ffs_id',$householdid,'',' id="edit-ffs_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                            <?= form_label('Type of fishing method','','for="edit-ffs1"').form_input('edit-ffs1','','placeholder=" " id="edit-ffs1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                            <?= form_label('Species','','for="edit-ffs2"').form_input('edit-ffs2','','placeholder=" " id="edit-ffs2"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Unit of measure','','for="edit-ffs3"').form_input('edit-ffs3','','placeholder=" " id="edit-ffs3"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume sold per year','','for="edit-ffs4"').form_input('edit-ffs4','',' placeholder=" " id="edit-ffs4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume consumed per year','','for="edit-ffs5"').form_input('edit-ffs5','',' placeholder=" " id="edit-ffs5"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Price per unit','','for="edit-ffs6"').form_input('edit-ffs6','',' placeholder=" " id="edit-ffs6"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Value','','for="edit-ffs7"').form_input('edit-ffs7','',' placeholder=" " id="edit-ffs7"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of gears used per fishing method','','for="edit-ffs8"').form_input('edit-ffs8','','placeholder=" " id="edit-ffs8"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Total number of fishing hours per year','','for="edit-ffs9"').form_input('edit-ffs9','',' placeholder=" " id="edit-ffs9"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Number of season or period in a year','','for="edit-ffs10"').form_input('edit-ffs10','',' placeholder=" " id="edit-ffs10"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Season or period of fishing (month)','','for="edit-ffs11"').form_dropdown('edit-ffs11',$monthList,'',' id="edit-ffs11"')?><br>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('location or landmarks where fishing activity is conducted','','for="edit-ffs12"').form_input('edit-ffs12','','placeholder=" " id="edit-ffs12"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('No of people & household members involved in the activity','','for="edit-ffs13"').form_input('edit-ffs13','',' placeholder=" " id="edit-ffs13"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing agents','','for="edit-ffs14"').form_input('edit-ffs14','','placeholder=" " id="edit-ffs14"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing location','','for="edit-ffs15"').form_input('edit-ffs15','','placeholder=" " id="edit-ffs15"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of payment','','for="edit-ffs16"').form_input('edit-ffs16','','placeholder=" " id="edit-ffs16"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-ffs17"').form_textarea('edit-ffs17','','placeholder=" " id="edit-ffs17"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsFishFresh" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamstpmForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-tpm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Income source from Fisheries (Fresh water)</h4>
                </div>
                <input type="hidden" id="tpm-id" name="tpm-id" value="" />
                <input type="hidden" id="tpm-gencode" name="tpm-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-tpm_id"').form_dropdown('edit-tpm_id',$householdid,'',' id="edit-tpm_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                            <?= form_label('Type of trading activity','','for="edit-tpm1"').form_input('edit-tpm1','','placeholder=" " id="edit-tpm1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                            <?= form_label('Species','','for="edit-tpm2"').form_input('edit-tpm2','','placeholder=" " id="edit-tpm2"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Unit of measure','','for="edit-tpm3"').form_input('edit-tpm3','','placeholder=" " id="edit-tpm3"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume sold per year','','for="edit-tpm4"').form_input('edit-tpm4','',' placeholder=" " id="edit-tpm4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume consumed per year','','for="edit-tpm5"').form_input('edit-tpm5','',' placeholder=" " id="edit-tpm5"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Price per unit','','for="edit-tpm6"').form_input('edit-tpm6','',' placeholder=" " id="edit-tpm6"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Value','','for="edit-tpm7"').form_input('edit-tpm7','',' placeholder=" " id="edit-tpm7"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Specific site/ location/landmarks where trading activity is conducted','','for="edit-tpm8"').form_input('edit-tpm8','','placeholder=" " id="edit-tpm8"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Season/ period of trading (month)','','for="edit-tpm9"').form_dropdown('edit-tpm9',$monthList,'',' id="edit-tpm9"')?><br>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('No of people & household members involved in the activity','','for="edit-tpm10"').form_input('edit-tpm10','',' placeholder=" " id="edit-tpm10"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing agents','','for="edit-tpm11"').form_input('edit-tpm11','','placeholder=" " id="edit-tpm11"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing location','','for="edit-tpm12"').form_input('edit-tpm12','','placeholder=" " id="edit-tpm12"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of payment','','for="edit-tpm13"').form_input('edit-tpm13','','placeholder=" " id="edit-tpm13"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-tpm14"').form_textarea('edit-tpm14','','placeholder=" " id="edit-tpm14"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamstpm" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsagriForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-agri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from Agriculture</h4>
                </div>
                <input type="hidden" id="agri-id" name="agri-id" value="" />
                <input type="hidden" id="agri-gencode" name="agri-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-agri_id"').form_dropdown('edit-agri_id',$householdid,'',' id="edit-agri_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of agricultural activity','','for="edit-agri1"').form_input('edit-agri1','','placeholder=" " id="edit-agri1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Species','','for="edit-agri2"').form_input('edit-agri2','','placeholder=" " id="edit-agri2"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Area','','for="edit-agri3"').form_input('edit-agri3','',' placeholder=" " id="edit-agri3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Unit of measure','','for="edit-agri4"').form_input('edit-agri4','','placeholder=" " id="edit-agri4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume sold per year','','for="edit-agri5"').form_input('edit-agri5','',' placeholder=" " id="edit-agri5"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume consumed per year','','for="edit-agri6"').form_input('edit-agri6','',' placeholder=" " id="edit-agri6"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Price per unit','','for="edit-agri7"').form_input('edit-agri7','',' placeholder=" " id="edit-agri7"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Value','','for="edit-agri8"').form_input('edit-agri8','',' placeholder=" " id="edit-agri8"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <ul><li>
                        <?= form_label('Describe/ enumerate specific activities conducted in the production process','','for="edit-agri9"').form_textarea('edit-agri9','','placeholder=" " id="edit-agri9"')?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Specific site/ location/landmarks','','for="edit-agri10"').form_input('edit-agri10','','placeholder=" " id="edit-agri10"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Season of production (month)','','for="edit-agri11"').form_dropdown('edit-agri11',$monthList,'',' id="edit-agri11"')?><br>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Number of production period per year','','for="edit-agri12"').form_input('edit-agri12','',' placeholder=" " id="edit-agri12"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('No of people & household members involved in the activity','','for="edit-agri13"').form_input('edit-agri13','',' placeholder=" " id="edit-agri13"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing agents','','for="edit-agri14"').form_input('edit-agri14','','placeholder=" " id="edit-agri14"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing location','','for="edit-agri15"').form_input('edit-agri15','','placeholder=" " id="edit-agri15"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of payment','','for="edit-agri16"').form_input('edit-agri16','','placeholder=" " id="edit-agri16"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-agri17"').form_textarea('edit-agri17','','placeholder=" " id="edit-agri17"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsagri" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsgrazingForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-ls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from Agriculture</h4>
                </div>
                <input type="hidden" id="ls-id" name="ls-id" value="" />
                <input type="hidden" id="ls-gencode" name="ls-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-ls_id"').form_dropdown('edit-ls_id',$householdid,'',' id="edit-ls_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type or kind of livestock (species)','','for="edit-ls-1"').form_input('edit-ls-1','','placeholder=" " id="edit-ls-1"')?>
                            </li></ul>
                        </div>
                         <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Grazing area (has)','','for="edit-ls-2"').form_input('edit-ls-2','',' placeholder=" " id="edit-ls-2"')?>
                            </li></ul>
                        </div>
                         <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Unit of measure','','for="edit-ls-3"').form_input('edit-ls-3','','placeholder=" " id="edit-ls-3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-3 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume sold per year','','for="edit-ls-4"').form_input('edit-ls-4','',' placeholder=" " id="edit-ls-4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-3 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume consumed per year','','for="edit-ls-5"').form_input('edit-ls-5','',' placeholder=" " id="edit-ls-5"')?>
                            </li></ul>
                        </div>
                         <div class="col-xs-3 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Price per unit','','for="edit-ls-6"').form_input('edit-ls-6','',' placeholder=" " id="edit-ls-6"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-3 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Value','','for="edit-ls-7"').form_input('edit-ls-7','',' placeholder=" " id="edit-ls-7"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Specific site/ location /landmarks of grazing areas','','for="edit-ls-8"').form_input('edit-ls-8','','placeholder=" " id="edit-ls-8"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <ul><li>
                        <?= form_label('Specific activities conducted in the livelihood','','for="edit-ls-9"').form_textarea('edit-ls-9','','placeholder=" " id="edit-ls-9"')?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12">
                         <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                            <?= form_label('Season/period of livelihood (month)','','for="edit-ls-10"').form_dropdown('edit-ls-10',$monthList,'',' id="edit-ls-10"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                            <?= form_label('No of people & household members involved in the activity','','for="edit-ls-11"').form_input('edit-ls-11','',' placeholder=" " id="edit-ls-11"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing agents','','for="edit-ls-12"').form_input('edit-ls-12','','placeholder=" " id="edit-ls-12"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing location','','for="edit-ls-13"').form_input('edit-ls-13','','placeholder=" " id="edit-ls-13"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of payment','','for="edit-ls-14"').form_input('edit-ls-14','','placeholder=" " id="edit-ls-14"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-ls-15"').form_textarea('edit-ls-15','','placeholder=" " id="edit-ls-15"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsgrazing" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsnontimberForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-nntim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from Forestry (Non-timber product)</h4>
                </div>
                <input type="hidden" id="nntim-id" name="nntim-id" value="" />
                <input type="hidden" id="nntim-gencode" name="nntim-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-nntim_id"').form_dropdown('edit-nntim_id',$householdid,'',' id="edit-nntim_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of non-timber products','','for="edit-nntim-1"').form_input('edit-nntim-1','','placeholder=" " id="edit-nntim-1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Species','','for="edit-nntim-2"').form_input('edit-nntim-2','','placeholder=" " id="edit-nntim-2"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Area (has)','','for="edit-nntim-3"').form_input('edit-nntim-3','',' placeholder=" " id="edit-nntim-3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Unit of measure','','for="edit-nntim-4"').form_input('edit-nntim-4','','placeholder=" " id="edit-nntim-4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume sold per year','','for="edit-nntim-5"').form_input('edit-nntim-5','',' placeholder=" " id="edit-nntim-5"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume consumed per year','','for="edit-nntim-6"').form_input('edit-nntim-6','',' placeholder=" " id="edit-nntim-6"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Price per unit','','for="edit-nntim-7"').form_input('edit-nntim-7','',' placeholder=" " id="edit-nntim-7"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Value','','for="edit-nntim-8"').form_input('edit-nntim-8','',' placeholder=" " id="edit-nntim-8"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <ul><li>
                        <?= form_label('Gathering/harvesting/collection/planting/production method/ activity','','for="edit-nntim-10"').form_textarea('edit-nntim-10','','placeholder=" " id="edit-nntim-10"')?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                    <div class="col-xs-4 col-lg-4 ">
                        <ul><li>
                        <?= form_label('Specific site/ location/landmarks','','for="edit-nntim-9"').form_input('edit-nntim-9','','placeholder=" " id="edit-nntim-9"')?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-4 ">
                        <ul><li>
                        <?= form_label('Season/ period of gathering/harvesting/collection/ planting (month)','','for="edit-nntim-11"').form_dropdown('edit-nntim-11',$monthList,'',' id="edit-nntim-11"')?><br>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('No of people & household members involved in the activity','','for="edit-nntim-12"').form_input('edit-nntim-12','',' placeholder=" " id="edit-nntim-12"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing agents','','for="edit-nntim-13"').form_input('edit-nntim-13','','placeholder=" " id="edit-nntim-13"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing location','','for="edit-nntim-14"').form_input('edit-nntim-14','','placeholder=" " id="edit-nntim-14"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of payment','','for="edit-nntim-15"').form_input('edit-nntim-15','','placeholder=" " id="edit-nntim-15"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-nntim-16"').form_textarea('edit-nntim-16','','placeholder=" " id="edit-nntim-16"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsnontimber" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamstimberForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-tim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from Forestry (Timber product)</h4>
                </div>
                <input type="hidden" id="tim-id" name="tim-id" value="" />
                <input type="hidden" id="tim-gencode" name="tim-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-tim_id"').form_dropdown('edit-tim_id',$householdid,'',' id="edit-tim_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of timber products','','for="edit-tim-1"').form_input('edit-tim-1','','placeholder=" " id="edit-tim-1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Species','','for="edit-tim-2"').form_input('edit-tim-2','','placeholder=" " id="edit-tim-2"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Area (has)','','for="edit-tim-3"').form_input('edit-tim-3','',' placeholder=" " id="edit-tim-3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Unit of measure','','for="edit-tim-4"').form_input('edit-tim-4','','placeholder=" " id="edit-tim-4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume sold per year','','for="edit-tim-5"').form_input('edit-tim-5','',' placeholder=" " id="edit-tim-5"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume consumed per year','','for="edit-tim-6"').form_input('edit-tim-6','',' placeholder=" " id="edit-tim-6"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Price per unit','','for="edit-tim-7"').form_input('edit-tim-7','',' placeholder=" " id="edit-tim-7"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Value','','for="edit-tim-8"').form_input('edit-tim-8','',' placeholder=" " id="edit-tim-8"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <ul><li>
                        <?= form_label('Gathering/harvesting/collection/planting/production method/ activity','','for="edit-tim-10"').form_textarea('edit-tim-10','','placeholder=" " id="edit-tim-10"')?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                    <div class="col-xs-4 col-lg-4 ">
                        <ul><li>
                        <?= form_label('Specific site/ location/landmarks','','for="edit-tim-9"').form_input('edit-tim-9','','placeholder=" " id="edit-tim-9"')?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-4 ">
                        <ul><li>
                        <?= form_label('Season/ period of gathering/harvesting/collection/ planting (month)','','for="edit-tim-11"').form_dropdown('edit-tim-11',$monthList,'',' id="edit-tim-11"')?><br>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('No of people & household members involved in the activity','','for="edit-tim-12"').form_input('edit-tim-12','',' placeholder=" " id="edit-tim-12"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing agents','','for="edit-tim-13"').form_input('edit-tim-13','','placeholder=" " id="edit-tim-13"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing location','','for="edit-tim-14"').form_input('edit-tim-14','','placeholder=" " id="edit-tim-14"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of payment','','for="edit-tim-15"').form_input('edit-tim-15','','placeholder=" " id="edit-tim-15"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-tim-16"').form_textarea('edit-tim-16','','placeholder=" " id="edit-tim-16"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamstimber" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsrwcForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-rwc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from Resource and Wildlife Collection and Use</h4>
                </div>
                <input type="hidden" id="rwc-id" name="rwc-id" value="" />
                <input type="hidden" id="rwc-gencode" name="rwc-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-rwc_id"').form_dropdown('edit-rwc_id',$householdid,'',' id="edit-rwc_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of revenue source from resource use and wildlife collection','','for="edit-rwc-1"').form_input('edit-rwc-1','','placeholder=" " id="edit-rwc-1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Species','','for="edit-rwc-2"').form_input('edit-rwc-2','','placeholder=" " id="edit-rwc-2"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Area (has)','','for="edit-rwc-3"').form_input('edit-rwc-3','',' placeholder=" " id="edit-rwc-3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Unit of measure','','for="edit-rwc-4"').form_input('edit-rwc-4','','placeholder=" " id="edit-rwc-4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume sold per year','','for="edit-rwc-5"').form_input('edit-rwc-5','',' placeholder=" " id="edit-rwc-5"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-3 ">
                            <ul><li>
                            <?= form_label('Volume consumed per year','','for="edit-rwc-6"').form_input('edit-rwc-6','',' placeholder=" " id="edit-rwc-6"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Price per unit','','for="edit-rwc-7"').form_input('edit-rwc-7','',' placeholder=" " id="edit-rwc-7"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-2 ">
                            <ul><li>
                            <?= form_label('Value','','for="edit-rwc-8"').form_input('edit-rwc-8','',' placeholder=" " id="edit-rwc-8"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <ul><li>
                        <?= form_label('Gathering/harvesting/collection/planting/production method/ activity','','for="edit-rwc-10"').form_textarea('edit-rwc-10','','placeholder=" " id="edit-rwc-10"')?>
                        </li></ul>
                    </div>
                    <div class="col-xs-12 ">
                    <div class="col-xs-4 col-lg-4 ">
                        <ul><li>
                        <?= form_label('Specific site/ location/landmarks','','for="edit-rwc-9"').form_input('edit-rwc-9','','placeholder=" " id="edit-rwc-9"')?>
                        </li></ul>
                    </div>
                    <div class="col-xs-4 col-lg-4 ">
                        <ul><li>
                        <?= form_label('Season/ period of gathering/harvesting/collection/ planting (month)','','for="edit-rwc-11"').form_dropdown('edit-rwc-11',$monthList,'',' id="edit-rwc-11"')?><br>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('No of people & household members involved in the activity','','for="edit-rwc-12"').form_input('edit-rwc-12','',' placeholder=" " id="edit-rwc-12"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing agents','','for="edit-rwc-13"').form_input('edit-rwc-13','','placeholder=" " id="edit-rwc-13"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Marketing location','','for="edit-rwc-14"').form_input('edit-rwc-14','','placeholder=" " id="edit-rwc-14"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of payment','','for="edit-rwc-15"').form_input('edit-rwc-15','','placeholder=" " id="edit-rwc-15"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-rwc-16"').form_textarea('edit-rwc-16','','placeholder=" " id="edit-rwc-16"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsrwc" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsminingForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-mining" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from Mining and Quarrying Industry</h4>
                </div>
                <input type="hidden" id="mining-id" name="mining-id" value="" />
                <input type="hidden" id="mining-gencode" name="mining-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-mining_id"').form_dropdown('edit-mining_id',$householdid,'',' id="edit-mining_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of revenue source from mining and quarrying industry','','for="edit-mining-1"').form_input('edit-mining-1','','placeholder=" " id="edit-mining-1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Revenue in a month','','for="edit-mining-2"').form_input('edit-mining-2','',' placeholder=" " id="edit-mining-2"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Number of times in a year','','for="edit-mining-3"').form_input('edit-mining-3','',' placeholder=" " id="edit-mining-3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                                <?= form_label('Source of extraction','','for="edit-mining-4"').form_textarea('edit-mining-4','','placeholder=" " id="edit-mining-4"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-6 col-lg-6 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-mining-5"').form_textarea('edit-mining-5','','placeholder=" " id="edit-mining-5"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsmining" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsindustryForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-industry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from other Industry</h4>
                </div>
                <input type="hidden" id="industry-id" name="industry-id" value="" />
                <input type="hidden" id="industry-gencode" name="industry-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-industry_id"').form_dropdown('edit-industry_id',$householdid,'',' id="edit-industry_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of industries','','for="edit-industry-1"').form_input('edit-industry-1','','placeholder=" " id="edit-industry-1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Revenue in a month','','for="edit-industry-2"').form_input('edit-industry-2','',' placeholder=" " id="edit-industry-2"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Number of times in a year','','for="edit-industry-3"').form_input('edit-industry-3','',' placeholder=" " id="edit-industry-3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-industry-4"').form_textarea('edit-industry-4','','placeholder=" " id="edit-industry-4"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsindustry" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamsserviceForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-servicebased" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from service-based service</h4>
                </div>
                <input type="hidden" id="service-id" name="service-id" value="" />
                <input type="hidden" id="service-gencode" name="service-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-service_id"').form_dropdown('edit-service_id',$householdid,'',' id="edit-service_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of service-based industry','','for="edit-service-1"').form_input('edit-service-1','','placeholder=" " id="edit-service-1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Revenue in a month','','for="edit-service-2"').form_input('edit-service-2','',' placeholder=" " id="edit-service-2"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Number of times in a year','','for="edit-service-3"').form_input('edit-service-3','',' placeholder=" " id="edit-service-3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-service-4"').form_textarea('edit-service-4','','placeholder=" " id="edit-service-4"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamsservice" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>

<form method="post" action="" id="SeamssourceForm" enctype="multipart/form-data" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-sourcebased" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Revenue from source-based source</h4>
                </div>
                <input type="hidden" id="source-id" name="source-id" value="" />
                <input type="hidden" id="source-gencode" name="source-gencode" value="" />
                <div class="modal-body" >
                    <div class="col-xs-12 ">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                            <?= form_label('Household member name','','for="edit-source_id"').form_dropdown('edit-source_id',$householdid,'',' id="edit-source_id"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Type of source-based industry','','for="edit-source-1"').form_input('edit-source-1','','placeholder=" " id="edit-source-1"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Revenue in a month','','for="edit-source-2"').form_input('edit-source-2','',' placeholder=" " id="edit-source-2"')?>
                            </li></ul>
                        </div>
                        <div class="col-xs-4 col-lg-4 ">
                            <ul><li>
                            <?= form_label('Number of times in a year','','for="edit-source-3"').form_input('edit-source-3','',' placeholder=" " id="edit-source-3"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-12 col-lg-12 ">
                            <ul><li>
                                <?= form_label('Remarks','','for="edit-source-4"').form_textarea('edit-source-4','','placeholder=" " id="edit-source-4"')?>
                            </li></ul>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <input class="btn btn-info" type="submit" name="submit" value="Update" id="UpdateSeamssource" />
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>




<form method="post" action="#" id="incomeBTRForm" role="form" class="form-style-7">
    <div class="modal fade" data-backdrop="static" id="modal-edit-btrform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Upload BTR/Bank certificates</h4>
                </div>
                <div class="modal-body" style="display:grid">
                    <div class="col-xs-12 " style="margin-top:10px">
                        <div class="col-xs-6 col-lg-6 ">
                            <input type="hidden" id="btrs-gencode" name="btrs-gencode" value="" />
                            <input type="hidden" id="btrs-gencode2" name="btrs-gencode2" value="" />
                            <input type="hidden" id="btrs-datemonth" name="btrs-datemonth" value="" />
                            <input type="hidden" id="btrs-dateday" name="btrs-dateday" value="" />
                            <input type="hidden" id="btrs-dateyear" name="btrs-dateyear" value="" />
                            <div id="btrs-cocode" class="hidden"></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                       <div class="col-xs-12 ">
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                     <div class="col-xs-4 col-lg-4 tooltip">
                                        <ul><li>
                                        <?= form_dropdown('ipafmonthbtr',$monthListed,'','class="border-input " id="ipafmonthbtr"'); ?>
                                        <span class="tooltiptext">Select date period covered</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4 tooltip">
                                        <ul><li>
                                        <?= form_dropdown('ipafdaybtr',$dayList,'','class="border-input " id="ipafdaybtr"'); ?>
                                        <span class="tooltiptext">Select date period covered</span>
                                        </li></ul>
                                    </div>
                                    <div class="col-xs-4 col-lg-4 tooltip">
                                        <ul><li>
                                        <?= form_dropdown('ipafyearbtr',$yearListed,'','class="border-input " id="ipafyearbtr"'); ?>
                                        <span class="tooltiptext">Select date period covered</span>
                                        </li></ul>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <?= form_label('BTR Certificate for the 25%','','for="resource"'); ?>
                                    <input type = "file" name = "add-proofdeposit" id="add-proofdeposit" onchange="readURLproofdeposit(this);" />
                                    <input type = "text" name = "add-proofdeposit_span" id="add-proofdeposit_span" class="hidden" />
                                    <div id="brt25loading"></div>
                                    <div id="oldbtrtext" class="hidden"></div>
                                    <div id="displaybtrfile"></div>
                                </fieldset>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <fieldset>
                                    <?= form_label('Bank Certification for depository bank','','for="resource"'); ?>
                                    <input type = "file" name = "add-bankdeposit" id="add-bankdeposit" onchange="readURLbankdeposit(this);" />
                                    <input type = "text" name = "add-bankdeposit_span" id="add-bankdeposit_span" class="hidden" />
                                    <div id="bankcertloading"></div>
                                    <div id="oldbancerttext" class="hidden"></div>
                                    <div id="displaybankdep"></div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <p><i>(*.doc, *.docx, *.xls, *.xlsx, *.ppt, *.pptx, *.csv, *.pdf format, maximum size of 50MB)</i></p>
                    <div class="col-xs-12 ">
                        <div class="modal-footer">
                            <button class="btn btn-info" type="button" onclick="addbtrcertificationipaf();" />Update
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>


<script type="text/javascript">

    $("#add_contribution_donationedit").click(function(){
  var rctr=1;
  rtemp = rctr;
  rctr+=1;
    $('<div id="divcontridonationedit' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvdonationcontributionedit">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<label>Trust Fund</label>'+
                    '<select class="form-control" id="edit-contribution" name="edit-contribution[]">'+
                        '<option value="0">Select</option>'+
                        '<option value="1">Donation</option>'+
                        '<option value="2">Grants</option>'+
                        '<option value="3">Endowment</option>'+
                    '</select>'+
                '</ul></li>'+
                '<ul><li>'+
                    '<label>Mode of Payment</label>'+
                    '<select class="form-control" id="edit-mode_donation" name="edit-mode_donation[]">'+
                        '<option value="0">Select</option>'+
                        '<option value="1">In-kind</option>'+
                        '<option value="2">Cash</option>'+
                    '</select>'+
                '</ul></li>'+
                '<ul><li>'+
                    '<label>Estimated Monitary Value</label>'+
                    '<input id="edit-financial_amount' + rctr + '" name="edit-financial_amount[]" placeholder=" " class="form-control" onchange="calculator_ipaf()" /><br>'+
                '</ul></li>'+
                '<ul><li>'+
                    '<label>Remarks</label>'+
                    '<textarea id="edit-financial_details' + rctr + '" name="edit-financial_details[]" placeholder=" " class="form-control"/><br>'+
                '</li></ul>'+
        '</div>').insertAfter("#contridivedit");
});

$(document).on("click",".rmvdonationcontributionedit",function() {
    var rcb = $(this).parent().attr("id");
    $('#' + rcb).remove();
});

$("#add_development_donationedit").click(function(){
  var rctr=1;
  rtemp = rctr;
  rctr+=1;
    $('<div id="divdevelopmentdonationedit' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvdonationdevbutionedit">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<label>Devt Fee/Royalty</label>'+
                    '<input id="edit-development_amount' + rctr + '" name="edit-development_amount[]" placeholder=" " class="form-control" onchange="calculator_ipaf()" /><br>'+
                '</ul></li>'+
                '<ul><li>'+
                    '<label>Remarks</label>'+
                    '<textarea id="edit-development_details' + rctr + '" name="edit-development_details[]" placeholder=" " class="form-control"/><br>'+
                '</li></ul>'+
        '</div>').insertAfter("#developmentdivedit");
});

$(document).on("click",".rmvdonationdevbutionedit",function() {
    var rcb = $(this).parent().attr("id");
    $('#' + rcb).remove();
});

$("#add_penalty_donationedit").click(function(){
  var rctr=1;
  rtemp = rctr;
  rctr+=1;
    $('<div id="divpenaltydonationedit' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvdonationpenaltyedit">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<label>Fines and Penalties</label>'+
                    '<input id="edit-penalty_amount' + rctr + '" name="edit-penalty_amount[]" placeholder=" " class="form-control" onchange="calculator_ipaf()" /><br>'+
                '</ul></li>'+
                '<ul><li>'+
                    '<label>Remarks</label>'+
                    '<textarea id="edit-penalty_details' + rctr + '" name="edit-penalty_details[]" placeholder=" " class="form-control"/><br>'+
                '</li></ul>'+
        '</div>').insertAfter("#penaltydivedit");
});

$(document).on("click",".rmvdonationpenaltyedit",function() {
    var rcb = $(this).parent().attr("id");
    $('#' + rcb).remove();
});

$("#add_other_income_edit").click(function(){
  var rctr=1;
  rtemp = rctr;
  rctr+=1;
    $('<div id="divincomepostedit' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvincomeedit">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<br><label>Others (specify)</label>'+
                    '<input id="others_income_edit' + rctr + '" name="others_income_edit[]" placeholder=" " class="form-control"/><br>'+
                    '<label>Amount</label>'+
                    '<input id="others_amount_edit' + rctr + '" name="others_amount_edit[]" placeholder=" " class="form-control number-separator" /><br>'+
                '</li></ul>'+
        '</div>').insertAfter("#incomedivadd");
});

$(document).on("click",".rmvincomeedit",function() {
    var rcb = $(this).parent().attr("id");
    $('#' + rcb).remove();
});

$("#add_other_disbursement_edit").click(function(){
  var rctr=1;
  rtemp = rctr;
  rctr+=1;
    $('<div id="divdisburseedit' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvdisburseedit">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<br><label>Amount</label>'+
                    '<input id="disbursement_amount_edit' + rctr + '" name="disbursement_amount_edit[]" placeholder=" " class="form-control" /><br>'+
                    '<label>Remarks</label>'+
                    '<input id="disbursement_remarks_edit' + rctr + '" name="disbursement_remarks_edit[]" placeholder=" " class="form-control"/><br>'+
                '</li></ul>'+
        '</div>').insertAfter("#disbursedivadd");
});

$(document).on("click",".rmvdisburseedit",function() {
    var rcb = $(this).parent().attr("id");
    $('#' + rcb).remove();
});

    var mylinkCoralReef = document.getElementById('Updatecoralreef');
    mylinkCoralReef.onclick = function()
    {

    var table_coral_reef_location = [];
    var table_coral_reef_species = [];
    var table_coral_reef_species_composition = [];
    var table_coral_reef_monitoring_site = [];
    var table_coral_reef_kmlkmz = [];

    $("#edit_tblreefaf_sample tr").each(function(row,tr){
        var push = {
            "codegen"   : $(tr).find("td:eq(0)").text(),
            "Ccodegen"   : $(tr).find("td:eq(1)").text(),
            "speciescompo_img" : $(tr).find("td:eq(2)").text(),
            "species_name"   : $(tr).find("td:eq(3)").text(),
        };
        table_coral_reef_species_composition.push(push);
    });

    $("#edit_tblcoralspecies_sample tr").each(function(row,tr){
        var push = {
            "codegen"   : $(tr).find("td:eq(1)").text(),
            "Ccodegen"   : $(tr).find("td:eq(2)").text(),
            "coralspecies_id" : $(tr).find("td:eq(0)").text(),
        };
        table_coral_reef_species.push(push);
    });

    $("#edit_tblcorallo_sample tr").each(function(row,tr){
        var push = {
            "codegen"   : $(tr).find("td:eq(2)").text(),
            "Ccodegen"   : $(tr).find("td:eq(3)").text(),
            "coral_municipal" : $(tr).find("td:eq(0)").text(),
            "coral_barangay" : $(tr).find("td:eq(1)").text(),

        };
        table_coral_reef_location.push(push);
    });

    $("#tblmonitoringsite_edit_sample tr").each(function(row,tr){
        var push = {
            "codegen"   : $(tr).find("td:eq(0)").text(),
            "Ccodegen"   : $(tr).find("td:eq(1)").text(),
            "monitoring_site_point" : $(tr).find("td:eq(2)").text(),
        };
        table_coral_reef_monitoring_site.push(push);
    });

    $("#tblcoralkmlkmz_edit_sample tr").each(function(row,tr){
    var push = {
        "codegen"   : $(tr).find("td:eq(0)").text(),
        "Ccodegen"   : $(tr).find("td:eq(1)").text(),
        "kmlkmz" : $(tr).find("td:eq(2)").text(),
    };
    table_coral_reef_kmlkmz.push(push);
});


    var sample_data = $('#FormCoralReefedit').serialize() + '&' + $.param({"table_coral_reef_species_composition" : table_coral_reef_species_composition,
                                                                           "table_coral_reef_species" : table_coral_reef_species,
                                                                           "table_coral_reef_location" : table_coral_reef_location,
                                                                           "table_coral_reef_monitoring_site" : table_coral_reef_monitoring_site,
                                                                           "table_coral_reef_kmlkmz" : table_coral_reef_kmlkmz});



       $.ajax({
        url : BASE_URL+'pasu/pamain/update_coralReef',
        type: "POST",

        data : sample_data,
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcosource = document.getElementById('UpdateSeamssource');
mylinkSeamsEcosource.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamssource',
        type: "POST",
        data: $('#SeamssourceForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcoservice = document.getElementById('UpdateSeamsservice');
mylinkSeamsEcoservice.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamsservice',
        type: "POST",
        data: $('#SeamsserviceForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcoindustry = document.getElementById('UpdateSeamsindustry');
mylinkSeamsEcoindustry.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamsindustry',
        type: "POST",
        data: $('#SeamsindustryForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcomining = document.getElementById('UpdateSeamsmining');
mylinkSeamsEcomining.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamsmining',
        type: "POST",
        data: $('#SeamsminingForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcorwc = document.getElementById('UpdateSeamsrwc');
mylinkSeamsEcorwc.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamsrwc',
        type: "POST",
        data: $('#SeamsrwcForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcotimber = document.getElementById('UpdateSeamstimber');
mylinkSeamsEcotimber.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamstimber',
        type: "POST",
        data: $('#SeamstimberForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEconontimber = document.getElementById('UpdateSeamsnontimber');
mylinkSeamsEconontimber.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamsnontimber',
        type: "POST",
        data: $('#SeamsnontimberForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }


var mylinkSeamsEcograzing = document.getElementById('UpdateSeamsgrazing');
mylinkSeamsEcograzing.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamsgrazing',
        type: "POST",
        data: $('#SeamsgrazingForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcoagri = document.getElementById('UpdateSeamsagri');
mylinkSeamsEcoagri.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamsagri',
        type: "POST",
        data: $('#SeamsagriForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcotpm = document.getElementById('UpdateSeamstpm');
mylinkSeamsEcotpm.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_Seamstpm',
        type: "POST",
        data: $('#SeamstpmForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcoFresh = document.getElementById('UpdateSeamsFishFresh');
mylinkSeamsEcoFresh.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_SeamsFishFresh',
        type: "POST",
        data: $('#SeamsFishFreshForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var mylinkSeamsEcoSalt = document.getElementById('UpdateSeamsFishSalt');
mylinkSeamsEcoSalt.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_SeamsFishSalt',
        type: "POST",
        data: $('#SeamsFishSaltForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

$(document).ready(function(){
    $("#edit-add_transport").click(function(){
        var rctr=1;
        rtemp = rctr;
        rctr+=1;
        $('<div id="ebca' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvcaE">'+
            '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
            '<ul><li>'+
                '<br><label>Specific transport service</label>'+
                '<input id="ests' + rctr + '" name="ests[]" placeholder=" " class="form-control"/><br>'+
                '<label>Avarage Annual Income</label>'+
                '<input id="eaai' + rctr + '" name="eaai[]" placeholder=" " class="form-control"/><br>'+
                '<label>Location where activity is conducted</label>'+
                '<input id="elac' + rctr + '" name="elac[]" placeholder=" " class="form-control"/><br>'+
            '</li></ul>'+
        '</div>').insertAfter("#ca1e");
    });

    $("#edit-add_other_ecotourism").click(function(){
        var rctr=1;
        rtemp = rctr;
        rctr+=1;
        $('<div id="ebcb' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvcbE">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<br><label>Others (specify)</label>'+
                    '<input id="eothers_ecotourism' + rctr + '" name="eothers_ecotourism[]" placeholder=" " class="form-control"/><br>'+
                    '<label>Avarage Annual Income</label>'+
                    '<input id="eother_aai' + rctr + '" name="eother_aai[]" placeholder=" " class="form-control"/><br>'+
                    '<label>Location where activity is conducted</label>'+
                    '<input id="eother_lac' + rctr + '" name="eother_lac[]" placeholder=" " class="form-control"/><br>'+
                '</li></ul>'+
        '</div>').insertAfter("#ca2e");
    });

    $(document).on("click",".rmvcaE",function() {
        var rca = $(this).parent().attr("id");
        $('#' + rca).remove();
    });

    $(document).on("click",".rmvcbE",function() {
        var rca = $(this).parent().attr("id");
        $('#' + rca).remove();
    });
});

function UpdateResoFile()
{
   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_reso_file',
    type: "POST",
    data: $('#ResoForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-resofile').modal('hide');
            document.getElementById('pambresouploaddivEdit').innerHTML="";
            getResoFile();
        }
   });
}

var mylinkSeamsEco = document.getElementById('UpdateSeamsEcotourism');
mylinkSeamsEco.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_SeamsEcotourismS',
        type: "POST",
        data: $('#ecotourismForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

function UpdateStaff(){
   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_staff',
    type: 'POST',
    data: $('#StaffForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: response.result+"\n"+"Successfully Update!",
              text: "Thank you for filling-out some field.",
              type: "success",
              showConfirmButton: true,
              confirmButtonText: 'Close',
              confirmButtonColor: '#DD6B55',
           });
           $('#modal-edit-staff').modal('hide');
            getStaff();
        }
   });
}

function UpdateMultiple(){
   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_Multiple',
    type: 'POST',
    data: $('#MultipleUsed').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-multiple').modal('hide');
            getTables_multiple();
        }
   });
}

function updatepasuinfos()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_pasusinformations',
    type: "POST",
    data: $('#ApasuInfoForm').serialize(),
    dataType: "JSON",
    success:function(response){
        swal({
            title: "Successful Update!",
            text: "Your data has been updated.",
            type: "success",
            showConfirmButton: true,
        });
        $('#modal-edit-apasu').modal('hide');
        document.getElementById('uploadapasuSOfiles').innerHTML="";
        fetchapasuinfodetails();
        }
   });
}

function UpdateStrict(){

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_sProt',
    type: 'POST',
    data: $('#strictProtect').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-protection').modal('hide');
            getTableStrict();
        }
   });
}

function UpdateMembers(input){
   // var formdata = new FormData();
   //  formdata.append('edit-pambfile_appt', document.getElementById('edit-pambfile_appt').files[0]);
   //  var other_data = $('#PambmEmberForm').serializeArray();
   //  $.each(other_data,function(key,input){
   //      formdata.append(input.name,input.value);
   //  });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_pambs',
    type: 'POST',
    data: $('#PambmEmberForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-service').modal('hide');
            document.getElementById('pambapptdivloadingedit').innerHTML="";
            document.getElementById('ser-gencode2').value = makeidpambs(8);
            getTabPAMB();
        }
   });
}

function updateThreaten()
{
    var formdata = new FormData();
    formdata.append('edit-pic_threat', document.getElementById('edit-pic_threat').files[0]);

    var other_data = $('#ThreatsForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_threat',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-threats').modal('hide');
            getThreatFetch();
            fetchthreatmap();
        }
   });
}

$("#edit-threats_cat").change(function(){
    var error = $('.edit-error_cat');
    var output = $('#edit-threats_cat_sub');

    $.ajax({
        url : BASE_URL+'/pasu/pamain/subThreatCat',
        type : 'POST',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          subcat : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);
              error.html('');
            } else if (data.status == false) {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            } else {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            }
          },
          error : function()
          {
            alert('failed');
          }
    });
});

function UpdateMaps()
{
   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_map',
    type: 'POST',
    data: $('#MapForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-map').modal('hide');
            getTabImage();
        }
   });
}

function UpdateIncome()
{
    var formdata = new FormData();
      formdata.append('edit-proofdeposit', document.getElementById('edit-proofdeposit').files[0]);
      formdata.append('edit-bankdeposit', document.getElementById('edit-bankdeposit').files[0]);

      var other_data = $('#IncomeForm').serializeArray();
      $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

    $.ajax({
        url : BASE_URL + '/pasu/pamain/update_income',
        method: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        data: formdata,
        dataType: "JSON",
    // url : BASE_URL+'pasu/pamain/update_income',
    // type: "POST",
    // data: $('#IncomeForm').serialize(),
    // dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-income').modal('hide');
            fetchipafs();
        }
   });
}

function UpdateVisitor()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_visitors',
    type: "POST",
    data: $('#VisitorsForm').serialize(),
    dataType: "JSON",
    success:function(response){
             swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-visitors').modal('hide');
           fetchVisitors();
        }
   });
}

function UpdateContris()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_contri',
    type: "POST",
    data: $('#ContriForm').serialize(),
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
             }
        }
   });
}


function UpdateFform()
{

   $.ajax({
        url : BASE_URL+'pasu/pamain/update_fform',
        type: "POST",
        data: $('#ForestFormForm').serialize(),
        dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-threats').modal('hide');
           fetchffDetails();
        }
   });
}

function UpdateInland()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_inland',
    type: "POST",
    data: $('#InlandForm').serialize(),
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
             }
        }
   });
}

function UpdateWetland()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_wetland',
    type: "POST",
    data: $('#WetlandForm').serialize(),
    dataType: "JSON",
    success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
             }
        }
   });
}

function Updatecaves()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_caves',
    type: "POST",
    data: $('#cavesForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-caves').modal('hide');
            fetchcavesDetails();
            var files = $('#edit-files_caves')[0].files;
                          var error = '';
                          var form_data = new FormData();

                            var other_data = $('#cavesForm').serializeArray();
                            $.each(other_data,function(key,input){
                                form_data.append(input.name,input.value);
                            });

                          for(var count = 0; count<files.length; count++)
                          {
                           var name = files[count].name;
                           var extension = name.split('.').pop().toLowerCase();
                           if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                           {
                            error += "Invalid " + count + " Image File"
                           }
                           else
                           {
                            form_data.append("edit-files_caves[]", files[count]);
                           }
                          }
                          if(error == '')
                          {
                           $.ajax({
                            url:BASE_URL+'pasu/pamain/insertcavesimageEdit',
                            method:"POST",
                            data:form_data,
                            contentType:false,
                            cache:false,
                            processData:false,
                            success:function(data)
                            {
                             $('#edit-files_caves').val('');
                             fetchcavesDetails();
                             fetchcaveimages();
                            $('#modal-edit-caves').modal('hide');

                            }
                           })
                          }
                          else
                          {
                           alert(error);
                          }
        }
   });
}

function Updateiw()
{
    var formdata = new FormData();
    formdata.append('edit-pic_inlandimg', document.getElementById('edit-pic_inlandimg').files[0]);
    formdata.append('edit-zip_shpfile_inland', document.getElementById('edit-zip_shpfile_inland').files[0]);
    var other_data = $('#iwForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_iw',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-iw').modal('hide');
            fetchiw();
        }
   });
}

function Updatehiw()
{
    var formdata = new FormData();
    formdata.append('edit-pic_hinlandimg', document.getElementById('edit-pic_hinlandimg').files[0]);
    formdata.append('edit-zip_shpfile_hinland', document.getElementById('edit-zip_shpfile_hinland').files[0]);
    var other_data = $('#hiwForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_hiw',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-hiw').modal('hide');
            fetchhiw();
        }
   });
}

function UpdateEditTopo()
{
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_topo',
    type: "POST",
    data: $('#TopoForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-topo').modal('hide');
            getTabImageTopo();
        }
   });
}


// function UpdateEditTopo()
// {
//    $.ajax({
//     url : BASE_URL+'pasu/pamain/update_topo',
//     type: "POST",
//     data: $('#TopoForm').serialize(),
//     dataType: "JSON",
//     success:function(response){
//                 if(response.error){

//             }else{
//              alert('Successful Update');
//              var res = response.result;
//              }
//         }
//    });
// }

function UpdateEditClimate()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_climate',
    type: "POST",
    data: $('#ClimateForm').serialize(),
    dataType: "JSON",
   success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-climate').modal('hide');
            getTabImageClimateDetails();
        }
   });
}



function UpdateEditLand()
{

   $.ajax({
    url : BASE_URL+'pasu/pamain/update_exland',
    type: "POST",
    data: $('#LandForm').serialize(),
    dataType: "JSON",
   success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-land').modal('hide');
            getTabImageLanduseDetails();
        }
   });
}

function UpdateEditVege()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_vegetative',
    type: "POST",
    data: $('#VegatativeForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-vegetative').modal('hide');
            getTabImageVegetativeDetails();
        }
   });
}

function UpdateEditLandslide()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_landslide',
    type: "POST",
    data: $('#LandslideForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            // $('#modal-edit-vegetative').modal('hide');
            getTabImageLandslideDetails();
        }
   });
}

function UpdateEditFlooding()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_flooding',
    type: "POST",
    data: $('#FloodingForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            // $('#modal-edit-vegetative').modal('hide');
            getTabImageFloodingDetails();
        }
   });

}

$(document).ready(function(){
    $('#edit-chk_forest').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_inland').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_cave').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_coral').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_seagrass').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mangrove').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
});
function updateBioFeature()
{
   var codegen = document.getElementById('ffb-gencode').value;
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_biological_faunaflora',
    type: "POST",
    data: $('#FloraFaunaForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-ffb').modal('hide');
            getTabBiological();
            var files = $('#files_speciesedit')[0].files;
                          var error = '';
                          var form_data = new FormData();

                            var other_data = $('#FloraFaunaForm').serializeArray();
                            $.each(other_data,function(key,input){
                                form_data.append(input.name,input.value);
                            });

                          for(var count = 0; count<files.length; count++)
                          {
                           var name = files[count].name;
                           var extension = name.split('.').pop().toLowerCase();
                           if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                           {
                            error += "Invalid " + count + " Image File"
                           }
                           else
                           {
                            form_data.append("files_speciesedit[]", files[count]);
                           }
                          }
                          if(error == '')
                          {
                           $.ajax({
                            url:BASE_URL+'pasu/pamain/insertspeciesimageEdit',
                            method:"POST",
                            data:form_data,
                            contentType:false,
                            cache:false,
                            processData:false,
                            success:function(data)
                            {
                             // $('#uploaded_images').html(data);
                             $('#files_speciesedit').val('');
                              // document.getElementById("getcommonid").value='';
                              var codegen = $('#ffb-gencode-species').val();
                              $.ajax({
                                  type: 'POST',
                                  data : {codegens:codegen},
                                  url: BASE_URL + 'pasu/pamain/fetchspeciesimagelocal',
                                  success:function(data){
                                    $('#uploadimagespecies').html(data);
                                    getTabBiological();
                                    getTabBiologicalflora();
                                  }
                              });
                            }
                           })
                          }
                          else
                          {
                           alert(error);
                          }
        }
   });
}






function UpdateEditAttraction()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_attraction',
    type: "POST",
    data: $('#AttractionForm').serialize(),
    dataType: "JSON",
    success:function(response){
        swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
            });
            // $('#modal-edit-attraction').modal('hide');
            if (document.getElementById('edit-attraction_img_file_1').value !== "") {editactivitysave1();}
            if (document.getElementById('edit-attraction_img_file_2').value !== "") {editactivitysave2();}
            if (document.getElementById('edit-attraction_img_file_3').value !== "") {editactivitysave3();}
            if (document.getElementById('edit-attraction_img_file_4').value !== "") {editactivitysave4();}
            if (document.getElementById('edit-attraction_img_file_5').value !== "") {editactivitysave5();}
            if (document.getElementById('edit-attraction_img_file_6').value !== "") {editactivitysave6();}
            if (document.getElementById('edit-attraction_img_file_7').value !== "") {editactivitysave7();}
            if (document.getElementById('edit-attraction_img_file_8').value !== "") {editactivitysave8();}
            if (document.getElementById('edit-attraction_img_file_9').value !== "") {editactivitysave9();}
            if (document.getElementById('edit-attraction_img_file_10').value !== "") {editactivitysave10();}
            if (document.getElementById('edit-attraction_img_file_11').value !== "") {editactivitysave11();}
            if (document.getElementById('edit-attraction_img_file_12').value !== "") {editactivitysave12();}
            if (document.getElementById('edit-attraction_img_file_13').value !== "") {editactivitysave13();}
            if (document.getElementById('edit-attraction_img_file_14').value !== "") {editactivitysave14();}
            if (document.getElementById('edit-attraction_img_file_15').value !== "") {editactivitysave15();}

            document.getElementById('edit-activity1').style.display = "none;"
            document.getElementById('edit-activity2').style.display = "none;"
            document.getElementById('edit-activity3').style.display = "none;"
            document.getElementById('edit-activity4').style.display = "none;"
            document.getElementById('edit-activity5').style.display = "none;"
            document.getElementById('edit-activity6').style.display = "none;"
            document.getElementById('edit-activity7').style.display = "none;"
            document.getElementById('edit-activity8').style.display = "none;"
            document.getElementById('edit-activity9').style.display = "none;"
            document.getElementById('edit-activity10').style.display =" none";
            document.getElementById('edit-activity11').style.display =" none";
            document.getElementById('edit-activity12').style.display =" none";
            document.getElementById('edit-activity13').style.display =" none";
            document.getElementById('edit-activity14').style.display =" none";
            document.getElementById('edit-activity15').style.display =" none";
            document.getElementById('edit-attraction_img_file_1').value = "";
            document.getElementById('edit-attraction_img_file_2').value = "";
            document.getElementById('edit-attraction_img_file_3').value = "";
            document.getElementById('edit-attraction_img_file_4').value = "";
            document.getElementById('edit-attraction_img_file_5').value = "";
            document.getElementById('edit-attraction_img_file_6').value = "";
            document.getElementById('edit-attraction_img_file_7').value = "";
            document.getElementById('edit-attraction_img_file_8').value = "";
            document.getElementById('edit-attraction_img_file_9').value = "";
            document.getElementById('edit-attraction_img_file_10').value = "";
            document.getElementById('edit-attraction_img_file_11').value = "";
            document.getElementById('edit-attraction_img_file_12').value = "";
            document.getElementById('edit-attraction_img_file_13').value = "";
            document.getElementById('edit-attraction_img_file_14').value = "";
            document.getElementById('edit-attraction_img_file_15').value = "";
            getTabImageAttr();
             var codegen = $('#attraction-gencode').val();
             var codegenx = $('#attraction-gencode2').val();
            $.ajax({
                type: 'POST',
                data : {codegens:codegen},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr',
                success:function(response){
                    $('#tbodyimageattraction').html(response);
                }
            });
            $.ajax({
                type: 'POST',
                data : {codegens:codegenx},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr1',
                success:function(data){
                    $('#upload_img_activity1').html(data);
                }
            });
            $.ajax({
                type: 'POST',
                data : {codegens:codegenx},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr2',
                success:function(data){
                    $('#upload_img_activity2').html(data);
                }
            });
            $.ajax({
                type: 'POST',
                data : {codegens:codegenx},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr3',
                success:function(data){
                    $('#upload_img_activity3').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                data : {codegens:codegenx},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr4',
                success:function(data){
                    $('#upload_img_activity4').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                data : {codegens:codegenx},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr5',
                success:function(data){
                    $('#upload_img_activity5').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                data : {codegens:codegenx},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr6',
                success:function(data){
                    $('#upload_img_activity6').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                data : {codegens:codegenx},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr7',
                success:function(data){
                    $('#upload_img_activity7').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                data : {codegens:codegenx},
                url: BASE_URL + 'pasu/pamain/fetchImageAttr8',
                success:function(data){
                    $('#upload_img_activity8').html(data);
                }
            });
        }
   });
}

$('#edit-pic_attraction').change(function(){
  var files = $('#edit-pic_attraction')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#AttractionForm').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-pic_attraction[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-pic_attraction").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('edit-pic_attraction').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-pic_attraction').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/ecoattractionimguploadEdit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      document.getElementById('ecotouruploadimages').style.display = "block";
     $('#ecotouruploadimages').html("<div id='loaders_iw' class='loader'></div>");
    },
    success:function(response)
    {
      $('#ecotouruploadimages').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/attraction_img/'+response+'" class="img-responsive img-thumbnail img-gallery" /></div>');
      document.getElementById("ecotourismnewimages").value = response;
    }
   })
  }
 });

document.getElementById("otherecoactivitydivEdit").style.display = "none"
$(document).on('change', '#edit-eco_activities', function(e) {
    if(this.options[e.target.selectedIndex].text == "Others"){
        document.getElementById("otherecoactivitydivEdit").style.display = "block"

        $('#edit-otherecoactivity').val('');
    }else{
      document.getElementById("otherecoactivitydivEdit").style.display = "none"
        $('#edit-otherecoactivity').val('');

    }
    });

function UpdateEditwatershed()
{
   var formdata = new FormData();
    formdata.append('edit-pic_watershedimg', document.getElementById('edit-pic_watershedimg').files[0]);
    var other_data = $('#WatershedForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_watershed',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-watershed').modal('hide');
            getTabImageWatershed();
        }
   });
}

document.getElementById("facilityotherdivEdit").style.display = "none"
$(document).on('change', '#edit-facility-title', function(e) {
    if(this.options[e.target.selectedIndex].text == "Others"){
        document.getElementById("facilityotherdivEdit").style.display = "block"

        $('#edit-ecofacilityother').val('');
    }else{
      document.getElementById("facilityotherdivEdit").style.display = "none"
        $('#edit-ecofacilityother').val('');

    }
    });

function UpdateEditFacility()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_facility',
    type: "POST",
    data: $('#FacilityForm').serialize(),
    dataType: "JSON",
    success:function(response){
        swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            editsaveMultiImgFacility();
           $('#modal-edit-facility').modal('hide');
           getTabImageFacility();
        }
   });
}

function UpdateEditActivity()
{
    var formdata = new FormData();
    formdata.append('edit-pic_activity', document.getElementById('edit-pic_activity').files[0]);

    var other_data = $('#ActivityForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_activity',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}

function UpdateEditProduct()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_product',
    type: "POST",
    data: $('#ProductForm').serialize(),
    dataType: "JSON",
    success:function(response){
    swal({
          title: "Successful Update!",
          text: "Your data has been updated.",
          type: "success",
          showConfirmButton: true,
    });
    $('#modal-edit-product').modal('hide');
    getTabImageProducts();
    }
   });
}

function UpdateEditEnterprise()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_enterprise',
    type: "POST",
    data: $('#EnterpriseForm').serialize(),
    dataType: "JSON",
    success:function(response){
    swal({
          title: "Successful Update!",
          text: "Your data has been updated.",
          type: "success",
          showConfirmButton: true,
    });
    $('#modal-edit-enterprise').modal('hide');
    getTabImageEnterprise();
    }
   });

}


function UpdateEditAgro()
{
    var formdata = new FormData();
    formdata.append('edit-pic_agro', document.getElementById('edit-pic_agro').files[0]);

    var other_data = $('#AgroForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_agro',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
                if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
   });
}



function updateEditBDFE()
{
    // var formdata = new FormData();
    // formdata.append('edit-bdfe_image', document.getElementById('edit-bdfe_image').files[0]);

    // var other_data = $('#BDFEform').serializeArray();
    // $.each(other_data,function(key,input){
    //     formdata.append(input.name,input.value);
    // });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_bdfe',
    method: 'POST',
    data: $('#BDFEform').serializeArray(),
    dataType: "JSON",
    success:function(response){
            swal({
                title: "Successful Update!",
                text: "Your data has been updated.",
                type: "success",
                showConfirmButton: true,
            });
            var files = $('#editfiles_bdfe_image')[0].files;
            var error = '';
            var form_data = new FormData();

              var other_data = $('#BDFEform').serializeArray();
              $.each(other_data,function(key,input){
                  form_data.append(input.name,input.value);
              });

            for(var count = 0; count<files.length; count++)
            {
             var name = files[count].name;
             var extension = name.split('.').pop().toLowerCase();
             if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
             {
              error += "Invalid " + count + " Image File"
             }
             else
             {
              form_data.append("editfiles_bdfe_image[]", files[count]);
             }
            }
            if(error == '')
            {
             $.ajax({
              url:BASE_URL+'pasu/pamain/insertbdfeimagesEdit',
              method:"POST",
              data:form_data,
              contentType:false,
              cache:false,
              processData:false,
              success:function(data)
              {
               $('#editfiles_bdfe_image').val('');
               uploadbdfeimages();
                  fetchbdfefile();
              }
             })
            }
            else
            {
             alert(error);
            }
           // $('#modal-edit-sapa').modal('hide');
            fetchbdfefile();
        }
   });
}

function UpdateEditRock()
{
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_rock',
    type: "POST",
    data: $('#RockForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-soil').modal('hide');
            getTabImageRockDetails();
        }
   });
}

// function UpdateEditRock()
// {
//    $.ajax({
//     url : BASE_URL+'pasu/pamain/update_rock',
//     type: "POST",
//     data: $('#RockForm').serialize(),
//     dataType: "JSON",
//     success:function(response){
//                 if(response.error){

//             }else{
//              alert('Successful Update');
//              var res = response.result;
//              }
//         }
//    });
// }

function Updateiccip()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_iccip',
    type: "POST",
    data: $('#tribeForm').serialize(),
    dataType: "JSON",
    success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
             }
        }
   });
}



var myLinkipaf = document.getElementById('UpdateIpaf');
myLinkipaf.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_ipaf',
        type: "POST",
        data: $('#IpafForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

// var myLinkipaf = document.getElementById('Updaterecog');
// myLinkipaf.onclick = function()
//     {
//        $.ajax({
//         url : BASE_URL+'pasu/pamain/update_recog',
//         type: "POST",
//         data: $('#recognitionForm').serialize(),
//         dataType: "JSON",
//         success:function(response){
//             if(response.error){

//             }else{
//              alert('Successful Update');
//              var res = response.result;
//             }
//         }
//         });

//     }
function addbtrcertificationipaf()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/insertPAipafcertificates',
    type: "POST",
    data: $('#incomeBTRForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-btrform').modal('hide');
            var code    =   document.getElementById("codegen").value;
            var monthselect = document.getElementById('sqmonthIncome').value;
            var yearselect =  document.getElementById('sqyearIncome').value;
            if (monthselect!="" && yearselect!="") {
                $.ajax({
                    type: 'POST',
                    data : {code:code,yearselect:yearselect,monthselect:monthselect},
                    url: BASE_URL + 'pasu/pamain/fetchIncomeGenbyMonthYear',
                    success:function(response){
                        $('#tbodyincomegenerated').html(response);
                    }
                });
            }else{
            fetchIpafsfromVisitor();
            }
        }
   });
}

function Updateminuteofmeeting()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_minutesofmeeting',
    type: "POST",
    data: $('#MinutesofMeetingForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-minutes').modal('hide');
            document.getElementById('edit-uploadminutesfile_file').innerHTML="";
            getallminutesofmeeting();
        }
   });
}

function Updaterecog()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_recog',
    type: "POST",
    data: $('#recognitionForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-recog').modal('hide');
            var codegen = $('#codegen').val();
                $.ajax({
                    type: 'POST',
                    data : {codegens:codegen},
                    url: BASE_URL + 'pasu/pamain/fetchRecog',
                    success:function(response){
                        $('#tbody_recognition').html(response);
                    }
                });
        }
   });
}

var myLinkipaf = document.getElementById('Updatedev');
myLinkipaf.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_dev',
        type: "POST",
        data: $('#developmentForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var myLinkipaf = document.getElementById('Updatepenalty');
myLinkipaf.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_penalty',
        type: "POST",
        data: $('#penaltyForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var myLinkipaf = document.getElementById('UpdateProject');
myLinkipaf.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/update_project',
        type: "POST",
        data: $('#ProjectForm').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

var myLinkipaf = document.getElementById('Updatelgu');
myLinkipaf.onclick = function()
    {
       $.ajax({
        url : BASE_URL+'pasu/pamain/Updatelgu',
        type: "POST",
        data: $('#LGUform').serialize(),
        dataType: "JSON",
        success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
            }
        }
        });

    }

function Updatedemo()
{
    var formdata = new FormData();
    formdata.append('edit-zipSHPdemo', document.getElementById('edit-zipSHPdemo').files[0]);

    var other_data = $('#demoForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_demo',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-demo').modal('hide');
            fetchdemo();
        }
   });
}

function Updateseamsincome()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_seamsincome',
    type: "POST",
    data: $('#SeamsIncomeForm').serialize(),
    dataType: "JSON",
    success:function(response){
            if(response.error){

            }else{
             alert('Successful Update');
             var res = response.result;
             }
        }
   });
}

$('#edit-monitor_months-inv').attr("readonly", "true");
$('#edit-monitor_years-inv').attr("readonly", "true");
// $('#edit-monitor_months-visitors').attr("disabled", "disabled");
// $('#edit-monitor_years-visitors').attr("disabled", "disabled");
$('#edit-monitor_months-contri').attr("disabled", "disabled");
$('#edit-monitor_day-contri').attr("disabled", "disabled");
$('#edit-monitor_years-contri').attr("disabled", "disabled");
$('#edit-monitor_months-dev').attr("disabled", "disabled");
$('#edit-monitor_years-dev').attr("disabled", "disabled");
$('#edit-monitor_months-penalty').prop("disabled", "disabled");
$('#edit-monitor_years-penalty').prop("disabled", "disabled");
// $('#edit-monitor_day-visitors').prop("disabled", "disabled");
$('#edit-monitor_days-inv').prop("readonly", "true");
// $('#edit-hh_id').attr("disabled", "disabled");

// $(document).ready(function(){

// Internation Recognition
// var t = document.getElementById("edit-recognition");
// var selectedText = t.options[t.selectedIndex].text;
//
// if(selectedText == "Others"){
//     $('#chck-inscribeds').show();
// }else{
//     $('#chck-inscribeds').hide();
// }
// });

// $(document).on('change', '#edit-recognition', function(e) {
//     if(this.options[e.target.selectedIndex].text == "Others"){
//         $('#chck-inscribeds').show();
//         $('#edit-inscribe').val('');

//     }
//     else{
//         $('#chck-inscribeds').hide();
//         $('#edit-inscribe').val('');

//     }
//     });

$("#edit-caveprovid").change(function(){
    var error = $("#edit-cavemunicipal_error");
    var output_municipal = $("#edit-cavemunid");
    var output_barangay = $("#edit-cavebarid");
    $.ajax({
        url : BASE_URL+'pasu/pamain/getCaveProv/',
        type : 'post',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
            provid : $(this).val()},
            success : function(data)
            {
              if (data.status == true) {
                output_municipal.html(data.message);
                output_barangay.html('');
              } else if (data.status == false) {
                output_barangay.html('');
                output_municipal.html('');
                // output.html(data.message).addClass('text-danger').removeClass('text-success');

              } else {
                output_municipal.html('');
                output_barangay.html('');
                // output.html(data.message).addClass('text-danger').removeClass('text-success');

              }
            },
            error : function()
            {
              alert('failed');
            }
    });
});

$("#edit-iwprovid").change(function(){
    var error = $("#edit-iwmunicipal_error");
    var output_municipal = $("#edit-iwmunid");
    $.ajax({
        url : BASE_URL+'pasu/pamain/getCaveProv/',
        type : 'post',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
            provid : $(this).val()},
            success : function(data)
            {
              if (data.status == true) {
                output_municipal.html(data.message);
              } else if (data.status == false) {
                output_municipal.html('');
              } else {
                output_municipal.html('');
              }
            },
            error : function()
            {
              alert('failed');
            }
    });
});

$("#edit-iwmunid").change(function(){
    var selValue = document.getElementById("edit-iwmunid").value;
        //METHOD 2
    var selObj = document.getElementById("edit-iwmunid");
    var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
    document.getElementById("indepiw").value = selValue;
})

$("#edit-hiwmunid").change(function(){
    var selValue = document.getElementById("edit-hiwmunid").value;
        //METHOD 2
    var selObj = document.getElementById("edit-hiwmunid");
    var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
    document.getElementById("hindepiw").value = selValue;
})

$("#edit-cavemunid").change(function(){
    var output_barangay = $("#edit-cavebarid");
    $.ajax({
        url : BASE_URL+'pasu/pamain/getCaveMunicipal/',
        type : 'post',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
            munid : $(this).val()},
            success : function(data)
            {
              if (data.status == true) {
                output_barangay.html(data.message);
              } else if (data.status == false) {
                output_barangay.html('');
                // output.html(data.message).addClass('text-danger').removeClass('text-success');

              } else {
                output_barangay.html('');
                // output.html(data.message).addClass('text-danger').removeClass('text-success');

              }
            },
            error : function()
            {
              alert('failed');
            }
    });
});

$("#edit-cavebarid").change(function(){
    // var output_barangay = $("#edit-cavebarid");
    // var e = document.getElementById("edit-cavebarid");
    // var strUser = e.options[e.selectedIndex].text;

    var selValue = document.getElementById("edit-cavebarid").value;

        //METHOD 2
    var selObj = document.getElementById("edit-cavebarid");
    var selValue = selObj.options[selObj.selectedIndex].value;

        //Setting Value
    document.getElementById("indep").value = selValue;
})

var div1 = document.getElementById('getMe'),
    div2 = document.getElementById('getMe2'),
    clickme = document.getElementById('clickmepls');
    var e = document.getElementById("clickmepls"); //Get the element

function switchVisible() {
  if(!div1) return;
  if (getComputedStyle(div1).display == 'block') {
    div1.style.display = 'none';
    div2.style.display = 'block';
    document.getElementById("clickmepls").value = "Back to previous";

  } else {
    div1.style.display = 'block';
    div2.style.display = 'none';
    document.getElementById("clickmepls").value = "Change";

  }
}
document.getElementById('clickmepls').addEventListener('click', switchVisible);


var div11 = document.getElementById('iwdiv1'),
    div22 = document.getElementById('iwdiv2'),
    clickmee = document.getElementById('clickmeplsiw');
    var ee = document.getElementById("clickmeplsiw"); //Get the element

function switchVisible2() {
  if(!div11) return;
  if (getComputedStyle(div11).display == 'block') {
    div11.style.display = 'none';
    div22.style.display = 'block';
    document.getElementById("clickmeplsiw").value = "Back to previous";

  } else {
    div11.style.display = 'block';
    div22.style.display = 'none';
    $("#edit-iwprovid")[0].selectedIndex = 0;
    $("#edit-iwmunid")[0].selectedIndex = 0;
    document.getElementById("indepiw").value='';
    document.getElementById("clickmeplsiw").value = "Change";

  }
}
document.getElementById('clickmeplsiw').addEventListener('click', switchVisible2);


var div111 = document.getElementById('hiwdiv1'),
    div222 = document.getElementById('hiwdiv2'),
    clickmee = document.getElementById('clickmeplshiw');
    var ee = document.getElementById("clickmeplshiw"); //Get the element

function switchVisible22() {
  if(!div111) return;
  if (getComputedStyle(div111).display == 'block') {
    div111.style.display = 'none';
    div222.style.display = 'block';
    document.getElementById("clickmeplshiw").value = "Back to previous";

  } else {
    div111.style.display = 'block';
    div222.style.display = 'none';
    $("#edit-hiwprovid")[0].selectedIndex = 0;
    $("#edit-hiwmunid")[0].selectedIndex = 0;
    document.getElementById("hindepiw").value='';
    document.getElementById("clickmeplshiw").value = "Change";

  }
}
document.getElementById('clickmeplshiw').addEventListener('click', switchVisible22);

$('#edit-hiw1').hide();
$('#edit-hide_me').hide();
$('#edit-hide_me2').hide();
$('#edit-hide_me3').hide();
$('#edit-hide_me4').hide();
function myFunctionModal() {
  // Get the checkbox
  var checkBox = document.getElementById("l_1");
  var checkBox2 = document.getElementById("m_1");
  var checkBox3 = document.getElementById("n_1");
  var checkBox4 = document.getElementById("o_1");
  var checkboxiw = document.getElementById("hiw_1");
  // Get the output text
  var text = document.getElementById("edit-hide_me");
  var text2 = document.getElementById("edit-hide_me2");
  var text3 = document.getElementById("edit-hide_me3");
  var text4 = document.getElementById("edit-hide_me4");

  // If the checkbox is checked, display the output text

  if (checkboxiw.checked == true){
    $('#edit-hiw1').show();
  } else {
    $('#edit-hiw1').hide();
    $('#edit-iwpdf').val('');
  }

  if (checkBox.checked == true){
    $('#edit-hide_me').show();
  } else {
    $('#edit-hide_me').hide();
    $('#edit-vandal_text').val('');
  }

  if (checkBox2.checked == true){
    $('#edit-hide_me2').show();
  } else {
    $('#edit-hide_me2').hide();
    $('#edit-exploited_text').val('');
  }
  if (checkBox3.checked == true){
    $('#edit-hide_me3').show();
  } else {
    $('#edit-hide_me3').hide();
    $('#edit-claimant_text').val('');
  }
  if (checkBox4.checked == true){
    $('#edit-hide_me4').show();
  } else {
    $('#edit-hide_me4').hide();
    $('#edit-other_status_text').val('');
  }
}



$(document).ready(function(){
    $("#h_1").change(function() {
        if(this.checked){
            $('#h_1').val('1');
            // $('#usince').prop('disabled',false);
        }
        else{
            $('#h_1').val('0');
            // $('#usince').prop('disabled',true);
        }
    });

});

document.getElementById("edit-caveProv").readOnly = true;
document.getElementById("edit-caveMunicipal").readOnly = true;
document.getElementById("edit-caveBarangay").readOnly = true;
document.getElementById("edit-iwProvText").readOnly = true;
document.getElementById("edit-iwMunicipalText").readOnly = true;

document.getElementById("edit_hccoutput").readOnly = true;

function readURLReefshpEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit_shpfilecoral', document.getElementById('edit_shpfilecoral').files[0]);
      // reader.onload = function (e) {
      // $('#imagereef').attr('src', e.target.result);
      // }
        reader.readAsDataURL(input.files[0]);
      }

      $.ajax({
            url : BASE_URL + 'pasu/pamain/editreefshpData',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            success:function(response){
                // response.status;
                $("#edit_img_reefshpspan").html(response.status);
                }
           });
  }

  $("#edit_coral_municipal").change(function(){
    var output_barangay = $("#edit_coral_barangay");
    $.ajax({
        url : BASE_URL+'pasu/pamain/getCaveMunicipal/',
        type : 'post',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
            munid : $(this).val()},
            success : function(data)
            {
              if (data.status == true) {
                output_barangay.html(data.message);
              } else if (data.status == false) {
                output_barangay.html('');
                // output.html(data.message).addClass('text-danger').removeClass('text-success');

              } else {
                output_barangay.html('');
                // output.html(data.message).addClass('text-danger').removeClass('text-success');

              }
            },
            error : function()
            {
              alert('failed');
            }
    });
});

$(function(){
    var addedlocation = [];
  $("#addcorallocEdit").click(function(){
    var municipal   = document.getElementById("edit_coral_municipal");
    var barangay     = document.getElementById("edit_coral_barangay");
    var code    =   document.getElementById("edit_codegen").value;
    var codeCoral    =   document.getElementById("edit_genCoral").value;

    var strMunicipal = municipal.options[municipal.selectedIndex].text;
    var strbarangay    = barangay.options[barangay.selectedIndex].text;

    var idMunicipal   = $("#edit_coral_municipal").val();
    var idBarangay   = $("#edit_coral_barangay").val();

    var words = idMunicipal + idBarangay;
    var index = $.inArray(words, addedlocation);

    if ($("#edit_coral_municipal")[0].selectedIndex <= 0 || $("#edit_coral_barangay")[0].selectedIndex <= 0) {
        swal("Select Location",'','warning');
          return
    }else{
        if (index >= 0) {
            swal("Location already added");
        }else{
            addedlocation.push(words);
              $("#edit_tblcorallo_sample tbody:last-child").append(
                "<tr style='text-align:center;background-color:#ffff66;'>"+
                "<td class='hide'>"+idMunicipal+"</td>"+
                "<td class='hide'>"+idBarangay+"</td>"+
                "<td class='hide'>"+code+"</td>"+
                "<td class='hide'>"+codeCoral+"</td>"+
                "<td>"+strMunicipal+"</td>"+
                "<td>"+strbarangay+"</td>"+
                "<td><button type='button' name='remove' data-row='row' class='btn btn-danger btn-xs remove' onclick='deleteRow(this)'>-</button></td>"+
              "</tr>"
              );
        }
    }

    $("#edit_coral_municipal")[0].selectedIndex = 0;
    $("#edit_coral_barangay")[0].selectedIndex = 0;
    });
});

function readURLReefEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit_img_reef', document.getElementById('edit_img_reef').files[0]);
      reader.onload = function (e) {
      $('#edit_imagereef').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }

      $.ajax({
            url : BASE_URL + 'pasu/pamain/reefDataEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            success:function(response){
                // response.status;
                $("#edit_img_reefspan").html(response.status);
                }
           });
  }

$(function(){
  $("#addreefafEdit").click(function(){
    var txtInput   = $("#edit_speciesName").val();
    var code    =   document.getElementById("edit_codegen").value;
    var codereef    =   document.getElementById("edit_genCoral").value;
    var filenamepic = $('#edit_img_reefspan').html();

    if (txtInput == "") {
      swal("Please fill out all fields",'','warning');
          return

    }else{
    $("#edit_tblreefaf_sample tbody:last-child").append(
      "<tr style='text-align: center;background-color:#ffff66;'>"+
        "<td class='hide'>"+code+"</td>"+
        "<td class='hide'>"+codereef+"</td>"+
        "<td class='hide'>"+filenamepic+"</td>"+
        "<td>"+txtInput+"</td>"+
        "<td class=''>"+'<img src="'+BASE_URL+'bmb_assets2/upload/coralreef/reef_photo/'+filenamepic+'" style="width:100px;height:100px"></img>'+"</td>"+
        "<td><button type='button' name='remove' data-row='row' class='btn btn-danger btn-xs remove' onclick='deleteRowThreat(this)'>-</button></td>"+
      "</tr>"
    );
    }

    document.getElementById("edit_speciesName").value='';
    document.getElementById('edit_imagereef').src = BASE_URL + 'bmb_assets2/upload/coralreef/reef_photo/nophoto.jpg';
    document.getElementById("edit_img_reef").value = "";

  });
});

$(function(){
  var addedSpecies = [];
  $("#addcoralspeciesEdit").click(function(){
    var species   = document.getElementById("edit_idcoralspecies");
    var code    =   document.getElementById("edit_codegen").value;
    var codeCoral    =   document.getElementById("edit_genCoral").value;
    var strSpecies = species.options[species.selectedIndex].text;
    var idSpecies   = $("#edit_idcoralspecies").val();

    var words = idSpecies;
    var index = $.inArray(words, addedSpecies);

    if ($("#edit_idcoralspecies")[0].selectedIndex <= 0) {
        swal("Select Coral Species",'','warning');
          return
    }else{
        if (index >= 0) {
            swal("You already added this species");
        }else{
            addedSpecies.push(idSpecies);
            $("#edit_tblcoralspecies_sample tbody:last-child").append(
              "<tr style='text-align:center;background-color:#ffff66;'>"+
              "<td class='hide'>"+idSpecies+"</td>"+
              "<td class='hide'>"+code+"</td>"+
              "<td class='hide'>"+codeCoral+"</td>"+
              "<td>"+strSpecies+"</td>"+
              "<td><button type='button' name='remove' data-row='row' class='btn btn-danger btn-xs remove' onclick='deleteRow(this)'>-</button></td>"+
            "</tr>"
            );
        }
    }

    $("#edit_idcoralspecies")[0].selectedIndex = 0;
    });
});

$(function(){
  $("#addmonitoringsiteedit").click(function(){
    var txtInput   = $("#edit_coral_monitoring_points").val();
    var code    =   document.getElementById("edit_codegen").value;
    var codereef    =   document.getElementById("edit_genCoral").value;

    if (txtInput == "") {
      swal("Input point location",'','warning');
          return

    }else{
    $("#tblmonitoringsite_edit_sample tbody:last-child").append(
      "<tr style='text-align: center'>"+
        "<td class='hide'>"+code+"</td>"+
        "<td class='hide'>"+codereef+"</td>"+
        "<td>"+txtInput+"</td>"+
        "<td><button type='button' name='remove' data-row='row' class='btn btn-danger btn-xs remove' onclick='deleteRowThreat(this)'>-</button></td>"+
      "</tr>"
    );
    }

    document.getElementById("edit_coral_monitoring_points").value='';
  });
});

$(function(){
    $("#edit_hccid").change(function(){
        var id = $("#edit_hccid").val();
        var inputd   = document.getElementById("edit_hccoutput");
        var inputme = $("#edit_hccoutput").val();
        $.ajax({
        url : BASE_URL+'pasu/pamain/gethcccondition/',
        type : 'post',
        dataType : 'JSON',
        data : {id:id},
            success : function(data)
            {
              if (data.status == true) {
                // inputme.html(data.message);
                $('input[name="edit_hccoutput"]').val(data.message)
              // } else if (data.status == false) {
              //   output_barangay.html('');
                // output.html(data.message).addClass('text-danger').removeClass('text-success');

              } else {
                // output_barangay.html('');
                // output.html(data.message).addClass('text-danger').removeClass('text-success');

              }
            },
            error : function()
            {
              alert('failed');
            }
    });
    });
});
document.getElementById("edit_hccoutput").readOnly = true;
document.getElementById("edit-cave_landstat_others").readOnly = true;

$(function(){
  $("#addcoralkmlkmzedit").click(function(){
    var code    =   document.getElementById("edit_codegen").value;
    var codereef    =   document.getElementById("edit_genCoral").value;
    var filenamepic = $('#edit_img_reefshpspan').html();

    if (filenamepic == "") {
      swal("Insert kml/kmz file",'','warning');
          return

    }else{
    $("#tblcoralkmlkmz_edit_sample tbody:last-child").append(
      "<tr style='text-align: center;background-color:#ffff66;'>"+
        "<td class='hide'>"+code+"</td>"+
        "<td class='hide'>"+codereef+"</td>"+
        "<td>"+filenamepic+"</td>"+
        "<td><button type='button' name='remove' data-row='row' class='btn btn-danger btn-xs remove' onclick='deleteRowThreat(this)'>-</button></td>"+
      "</tr>"
    );
    }

    document.getElementById("edit_shpfilecoral").value = "";

  });
});

// $("#edit-nipid").change(function(){
//     var id = $('#edit-nipid');
//     var output = $('.nip_error');
//     var nip_item = $('#edit-nipsub_id');
//     $.ajax({
//         url  : BASE_URL+'/pasu/pamain/getnipsubedit/',
//         type : 'post',
//         dataType : 'JSON',
//         data : {
//           '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
//           id : $(this).val()},
//           success : function(data)
//           {
//              if (data.status == true) {
//               nip_item.html(data.message);
//             }
//           },
//           error : function()
//           {
//             alert('failed');
//           }
//         });
// });

// $("#edit-nipid").change(function(){
//     var output = $('#edit-pacategory_id');
//     $.ajax({
//         url  : BASE_URL+'/pasu/pamain/getpacategory/',
//         type : 'post',
//         dataType : 'JSON',
//         data : {
//           '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
//           regids : $(this).val()},
//           success : function(data)
//           {
//             if (data.status == true) {
//               output.html(data.message);

//             } else if (data.status == false) {
//             output.html(data.message);
//               // output.html(data.message).addClass('text-danger').removeClass('text-success');
//             } else {
//               output.html(data.message).addClass('text-danger').removeClass('text-success');
//             }
//           },
//           error : function()
//           {
//             alert('failed');
//           }
//         });
// });

// $(document).on('change', '#edit-nipid', function(e) {
//     if(this.options[e.target.selectedIndex].text == "Legislated"){
//         $('#edit-chck-02').show();
//     }
//     else if(this.options[e.target.selectedIndex].text == "Proclaimed"){
//         $('#edit-chck-02').show();
//     }

//     else if(this.options[e.target.selectedIndex].text == "Initial Component of NIPAS"){
//         $('#edit-chck-02').hide();
//     }
//     });



function updatelegalstat()
{

   $.ajax({
        url : BASE_URL+'pasu/pamain/update_Legal',
        type: "POST",
        data: $('#LegisForm').serialize(),
        dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-threats').modal('hide');
           getTables();
        }
   });
}

function uploadmangementplan(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-mngmtplanfile', document.getElementById('edit-mngmtplanfile').files[0]);
      }
      var file_details    =   document.getElementById("edit-mngmtplanfile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-mngmtplanfile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-mngmtplanfile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/Editmanagementplanupload',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#divmanagementupload').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('old_mngmtplanfile_span').value =  response.status;
                $('#divmanagementupload').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/management_plan/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

function updatemgmtpln()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_mgmtplant',
    type: "POST",
    data: $('#MgmtPlanForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-mgmtplan').modal('hide');
            fetchmngmtplan();
            $('#divmanagementupload').html('');
        }
   });
}

function updateecotourismmgmtpln()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_ecotourismmgmtplant',
    type: "POST",
    data: $('#EcoTourMgmtPlanForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-ecotourmgmtplan').modal('hide');
            fetchecotourismmngmtplan();
            $('#edit-uploadecotourmngtmplans').html('');
        }
   });
}

$("#edit-appointment").change(function(){
    var output = $('.edit-error_appointment');
    var sub = $('#edit-appointmentsub');

    $.ajax({
        url  : BASE_URL+'/pasu/pamain/subAppointment/',
        type : 'post',
        dataType : 'JSON',
        data : {
          subapt : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              sub.html(data.message);
              output.html('');
            } else if (data.status == false) {
              sub.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
            } else {
              sub.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});
$("#edit-threats_cat_rank").change(function(){
    var x = document.getElementById("edit-rank_qualify");
    var text = document.getElementById("edit-qualifiers");
    if($('#edit-threats_cat_rank').val()=='3' || $('#edit-threats_cat_rank').val()=='4' || $('#edit-threats_cat_rank').val()=='5'){
        x.style.display = "block";
    }else{
        x.style.display = "none";
        text.value="";

    }
});



$(".elh_longd").click(function(){
    if ($('#edit-lh_dmstodd').prop('readonly', true)){
        $('#edit-lh_dmstodd').prop('readonly', false);
        $('#edit-lh_dmstodd').focus();
    }else if ($('#edit-lh_dmstodd').prop('readonly', false)){
        $('#edit-lh_dmstodd').prop('readonly', true);
    }
});

$(".elh_latd").click(function(){
    if ($('#edit-lh_dmstodd2').prop('readonly', true)){
        $('#edit-lh_dmstodd2').prop('readonly', false);
        $('#edit-lh_dmstodd2').focus();
    }else if ($('#edit-lh_dmstodd2').prop('readonly', false)){
        $('#edit-lh_dmstodd2').prop('readonly', true);
    }
});


function ecalc_nopomem(){
    var arr = document.getElementsByClassName('edit-nopomem');
    var total = 0;
    for(var i=0; i<arr.length; i++){
        if (parseInt(arr[i].value))
            total += parseInt(arr[i].value);
    }
    var results = document.getElementById('edit-total_no_po_lh');
    results.value = total;
}

function ecalc_rate(){
    var arr = document.getElementsByClassName('edit-qty');
    var total = 0;
    for(var i=0; i<arr.length; i++){
        if (parseFloat(arr[i].value))
            total += parseFloat(arr[i].value);
    }
    var results = document.getElementById('edit-total_rate');
    results.value = total.toFixed(3);
}

$("#edit-lh_reg").change(function(){
    var output = $('.edit-lh_prov_errors');
    var prov_list_item = $('#edit-lh_prov');
    var municipal_list_item = $('#edit-lh_mun');
    var barangay_list_item = $('#edit-lh_barangay');
    var clear1 = $('.edit-lh_municipal_errors');
    var clear2 = $('.edit-lh_barangay_errors');

    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getProvs/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          regids : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              prov_list_item.html(data.message);
              output.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              clear1.html('');
              clear2.html('');
            } else if (data.status == false) {
              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              clear1.html('');
              clear2.html('');
            } else {
              prov_list_item.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              output.html(data.message).addClass('text-danger').removeClass('text-success');
              clear1.html('');
              clear2.html('');
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});

$("#edit-lh_prov").change(function(){
  var output = $('.edit-lh_municipal_errors');
  var prov_list_item = $('#edit-lh_prov');
  var municipal_list_item = $('#edit-lh_mun');
  var barangay_list_item = $('#edit-lh_barangay');
  var clear2 = $('.edit-lh_barangay_errors');
  $.ajax({
    url  : BASE_URL+'/pasu/pamain/getMunicipals/',
    // '<?= base_url('index.php/main_server/cave/getMunicipal/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      regids : $(this).val(),
      provids : $(this).val()
    },
    success : function(data)
    {
      if (data.status == true) {
        municipal_list_item.html(data.message);
        barangay_list_item.html('');
        output.html('');
        clear2.html('');
      } else if (data.status == false) {
        municipal_list_item.html('');
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success')
        clear2.html('');
      } else {
        municipal_list_item.html('');

        output.html(data.message).addClass('text-danger').removeClass('text-success');
        clear2.html('');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

$("#edit-lh_mun").change(function(){
  var output = $('.edit-lh_barangay_errors');
  var municipal_list_item = $('#edit-lh_mun');
  var barangay_list_item = $('#edit-lh_barangay');
  $.ajax({
    url  :  BASE_URL+'/pasu/pamain/getbarangays/',
    // '<?= base_url('index.php/main_server/cave/getbarangay/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      munids : $(this).val()
    },
    success : function(data)
    {
      if (data.status == true) {
        barangay_list_item.html(data.message);
        output.html('');
      } else if (data.status == false) {
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      } else {
        barangay_list_item.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    },
    error : function()
    {
      alert('failed');
    }
  });
});

function updatetenuresapa()
{

   $.ajax({
    url : BASE_URL+'pasu/pamain/update_sapa',
    type: "POST",
    data: $('#SAPAForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-sapa').modal('hide');
            document.getElementById('editsapafileuploaddiv').innerHTML ="";
            document.getElementById('editsapamngmtfileuploaddiv').innerHTML ="";
            document.getElementById('editsapacdmpfileuploaddiv').innerHTML ="";
            document.getElementById('editsapapambfileuploaddiv').innerHTML ="";
            document.getElementById('sapapambclearancefileuploaddivEdit').innerHTML ="";
            document.getElementById('edit-sapamonitoringuploadDivNew').innerHTML="";
            gettenuresapa();
        }
   });
}

function readURLsapafileedit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-sapafile', document.getElementById('edit-sapafile').files[0]);
      }
      var file_details    =   document.getElementById("edit-sapafile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-sapafile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-sapafile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/sapafilescannededit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#editsapafileuploaddiv').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                $('#editsapafileuploaddiv').html('<div class="col-md-12"><a target="_blank" href="'+BASE_URL+'bmb_assets2/upload/tenure_sapa_monitoringreport/'+response.status+'">'+response.status+'</a></div>');
                document.getElementById('edit-sapafile_span').value =  response.status;
                }
           });
      }
  }


function updatetenuremoa()
{
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_moa',
    type: "POST",
    data: $('#MOAForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-moa').modal('hide');
            gettenuremoa();
            document.getElementById('moadocapproveduploadedit').innerHTML="";
            document.getElementById('moamgmntplanuploadedit').innerHTML="";
            document.getElementById('moapambapproveuploadedit').innerHTML="";
            document.getElementById('moapambresouploadedit').innerHTML="";
            document.getElementById('moapambclearancefileuploaddivEdit').innerHTML="";
        }
   });
}

function updateProjtile()
{
    var d2 = document.getElementById('proj-id_program').value;
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_proj',
    type: "POST",
    data: $('#ProjForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-sapa').modal('hide');
          $.ajax({
          type: 'POST',
          data : {ids:d2},
          url: BASE_URL + 'pasu/pamain/fetchProj',
          success:function(response){
              $('#tbodyprojprog').html(response);
            }
        });
        }
   });
}



function updatetenurecrmpactivity()
{
   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_crmpactivity',
    type: "POST",
    data: $('#CMRPActivityForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
            });
            $('#modal-edit-crmpactivity').modal('hide');
            document.getElementById('crmpfileuploadfileEdit').innerHTML="";
               var d2 = $("#crmp-id").val();
                $.ajax({
                type: 'POST',
                data : {ids:d2},
                url: BASE_URL + 'pasu/pamain/fetchcrmpactivity',
                success:function(response){
                    $('#tbodyactivitycrmp').html(response);
                }
            });
        }
   });
}


function updatetenurepcbrma()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_pacbrma',
    type: "POST",
    data: $('#PACBRMAForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            document.getElementById('pacbrmapambclearancefileuploaddivEdit').innerHTML = "";
            document.getElementById('pacbrmaapprovedocsuploadfileEdit').innerHTML = "";
            document.getElementById('edit-pcbrmamember_file').innerHTML = "";
           // $('#modal-edit-sapa').modal('hide');
            gettenurepacbrma();
        }
   });
}

function UpdateResearchers()
{
    var formdata = new FormData();
    formdata.append('edit-searchpermite', document.getElementById('edit-searchpermite').files[0]);
    // formdata.append('edit-pambresoe', document.getElementById('edit-pambresoe').files[0]);


    var other_data = $('#ResearchesEditForm').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_researchers',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-sapa').modal('hide');
            // gettenurepacbrma();
            // $('#modal-edit-searche').modal('hide');

            var d2 = $("#searche-id_program").val();
              $.ajax({
              type: 'POST',
              data : {ids:d2},
              url: BASE_URL + 'pasu/pamain/fetchresearches',
              success:function(response){
                  $('#tbodyresearchs').html(response);
                }
            });
        }
   });
}

function UpdateResearchersedit()
{
   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_researchersEdit',
    type: "POST",
    data: $('#ResearchForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            // $('#modal-edit-research2').modal('hide');
            getResearchFetch();
            document.getElementById('edit-load_researchpermit').innerHTML="";
            document.getElementById('edit-load_researchpambclearance').innerHTML="";
            // var d2 = $("#searche-id_program").val();
            //   $.ajax({
            //   type: 'POST',
            //   data : {ids:d2},
            //   url: BASE_URL + 'pasu/pamain/fetchresearches',
            //   success:function(response){
            //       $('#tbodyresearchs').html(response);
            //     }
            // });
        }
   });
}

function updateprogramactivity()
{
    var d2 = document.getElementById('progactivitye-id_program').value;
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_programctivity',
    type: "POST",
    data: $('#ProgramActivityEditForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-sapa').modal('hide');
            // gettenuremoa();
              $.ajax({
              type: 'POST',
              data : {ids:d2},
              url: BASE_URL + 'pasu/pamain/fetchProgramActivity',
              success:function(response){
                  $('#tbodyProgramActivity').html(response);
                }
            });
        }
   });
}

// var myLinkPrograms = document.getElementById('UpdateProgram');
// myLinkPrograms.onclick = function()
//     {
//        $.ajax({
//         url : BASE_URL+'pasu/pamain/update_program',
//         type: "POST",
//         data: $('#ProgramForm').serialize(),
//         dataType: "JSON",
//         success:function(response){
//             swal({
//               title: "Successful Update!",
//               text: "Your data has been updated.",
//               type: "success",
//               showConfirmButton: true,
//            });
//         getPrograms();
//         }
//         });

//     }

function readURLtenurecdmpfile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('crmpfile', document.getElementById('crmpfile').files[0]);
      }
      var file_details    =   document.getElementById("crmpfile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('crmpfile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('crmpfile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/tenurecrmpdocs',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#crmpfileuploadfile').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                $('#crmpfileuploadfile').html('<div class="col-md-12"><a target="_blank" href="'+BASE_URL+'bmb_assets2/upload/crmp_file/'+response.status+'">'+response.status+'</a></div>');
                document.getElementById('old_crmpfile').value =  response.status;
                }
           });
      }
  }

  function readURLtenurecdmpfileEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-crmpfile', document.getElementById('edit-crmpfile').files[0]);
      }
      var file_details    =   document.getElementById("edit-crmpfile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-crmpfile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-crmpfile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/tenurecrmpdocsEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#crmpfileuploadfileEdit').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                $('#crmpfileuploadfileEdit').html('<div class="col-md-12"><a target="_blank" href="'+BASE_URL+'bmb_assets2/upload/crmp_file/'+response.status+'">'+response.status+'</a></div>');
                document.getElementById('edit-newcrmpfileupload').value =  response.status;
                }
           });
      }
  }

function readURLtenurefileedit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-approvedocs', document.getElementById('edit-approvedocs').files[0]);
      }
      var file_details    =   document.getElementById("edit-approvedocs").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-approvedocs').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-approvedocs').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/tenuredocsDataEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#pacbrmamemberuploadfileEdit').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                $('#pacbrmamemberuploadfileEdit').html('<div class="col-md-12"><a target="_blank" href="'+BASE_URL+'bmb_assets2/upload/tenure_docs_pacbrma/'+response.status+'">'+response.status+'</a></div>');
                document.getElementById('edit-approveodcs_span').value =  response.status;
                }
           });
      }
  }

  function readURLpcbrmamemberedit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-pcbrmamember', document.getElementById('edit-pcbrmamember').files[0]);
      }
      var file_details    =   document.getElementById("edit-pcbrmamember").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["xls", "xlsx" ,"csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-pcbrmamember').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.xls, *.xlsx, *.csv, *.pdf)','','warning');
        document.getElementById('edit-pcbrmamember').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/tenuredocsmemberDataEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#pacbrmaapprovedocsuploadfileEdit').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                $('#pacbrmaapprovedocsuploadfileEdit').html('<div class="col-md-12"><a target="_blank" href="'+BASE_URL+'bmb_assets2/upload/tenure_docs_pcbrma_member/'+response.status+'">'+response.status+'</a></div>');
                document.getElementById('edit-pcbrmamember_span').value =  response.status;
                }
           });
      }
  }

// function readURLsearchpermit(input) {
//     if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       var formdata = new FormData();
//       formdata.append('edit-searchpermit', document.getElementById('edit-searchpermit').files[0]);
//         reader.readAsDataURL(input.files[0]);
//       }

//       $.ajax({
//             url : BASE_URL + 'pasu/pamain/searchpermitupload',
//             method: 'POST',
//             contentType: false,
//             cache: false,
//             processData: false,
//             data: formdata,
//             dataType: "JSON",
//             success:function(response){
//                 // response.status;
//                 $("#edit-searchpermit_span").html(response.status);
//                 document.getElementById('edit-searchpermit_txt').value =  response.status;

//                 }
//            });
//   }

function readURLsearchpermit(input) {
      if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-searchpermit', document.getElementById('edit-searchpermit').files[0]);
      }
      var file_details    =   document.getElementById("edit-searchpermit").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-searchpermit').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.pdf)','','warning');
        document.getElementById('edit-searchpermit').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/searchpermitupload',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#searchprogrampermitdiv').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-searchpermit_txt').value =  response.status;
                $('#searchprogrampermitdiv').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/tenure_docs_research_permit/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLsearchpambreso(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-pambreso', document.getElementById('edit-pambreso').files[0]);
      // reader.onload = function (e) {
      // $('#blahsattr').attr('src', e.target.result);
      // }
        reader.readAsDataURL(input.files[0]);
      }

      $.ajax({
            url : BASE_URL + 'pasu/pamain/searchpambresoupload',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            success:function(response){
                // response.status;
                $("#edit-pambreso_span").html(response.status);
                }
           });
  }

  // function readURLsearchpermite(input) {
  //   if (input.files && input.files[0]) {
  //     var reader = new FileReader();
  //     var formdata = new FormData();
  //     formdata.append('edit-searchpermite', document.getElementById('edit-searchpermite').files[0]);
  //     // reader.onload = function (e) {
  //     // $('#blahsattr').attr('src', e.target.result);
  //     // }
  //       reader.readAsDataURL(input.files[0]);
  //     }

  //     $.ajax({
  //           url : BASE_URL + 'pasu/pamain/searchpermituploade',
  //           method: 'POST',
  //           contentType: false,
  //           cache: false,
  //           processData: false,
  //           data: formdata,
  //           dataType: "JSON",
  //           success:function(response){
  //               // response.status;
  //               $("#edit-searchpermit_spane").html(response.status);
  //               }
  //          });
  // }

  function readURLsearchpermite(input) {
      if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-searchpermite', document.getElementById('edit-searchpermite').files[0]);
      }
      var file_details    =   document.getElementById("edit-searchpermite").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-searchpermite').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.pdf)','','warning');
        document.getElementById('edit-searchpermite').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/searchpermituploade',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#researchprogrampermitdivupload').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-searchpermit_txte').value =  response.status;
                $('#researchprogrampermitdivupload').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/tenure_docs_research_permit/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLsearchpambresoe(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-pambresoe', document.getElementById('edit-pambresoe').files[0]);
      // reader.onload = function (e) {
      // $('#blahsattr').attr('src', e.target.result);
      // }
        reader.readAsDataURL(input.files[0]);
      }

      $.ajax({
            url : BASE_URL + 'pasu/pamain/searchpambresouploade',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            success:function(response){
                // response.status;
                $("#edit-pambreso_spane").html(response.status);
                }
           });
  }



$("#edit-liveproducts").change(function(){
    var output = $('.edit-error_livelihood_products');
    var lh_type = $('#edit-lh_type');
    var clear1 = $('.edit-error_livelihood_products');

    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getlhproducts/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          lhtype : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
                lh_type.html(data.message);
                output.html('');
                clear1.html('');
                document.getElementById('edit-lh_cat_others').value = "";
                document.getElementById('edit-lhcatother').style.display = "none";
            } else if (data.status == false) {
                lh_type.html('');
                output.html(data.message).addClass('text-danger').removeClass('text-success');
                clear1.html('');
                document.getElementById('edit-lh_cat_others').value = "";
                document.getElementById('edit-lhcatother').style.display = "none";
            } else {
                lh_type.html('');
                output.html(data.message).addClass('text-danger').removeClass('text-success');
                clear1.html('');
                document.getElementById('edit-lh_cat_others').value = "";
                document.getElementById('edit-lhcatother').style.display = "none";
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});

$('#edit-lh_type').on('change',function(){
  document.getElementById('edit-lh_cat_others').value = "";
});

function readURLattribbdfeEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-bdfe_image', document.getElementById('edit-bdfe_image').files[0]);
      reader.onload = function (e) {
      $('#edit-blahsbdfe').attr('src', e.target.result);
      }
        reader.readAsDataURL(input.files[0]);
      }

      $.ajax({
            url : BASE_URL + 'pasu/pamain/bdfe_img_Edit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            success:function(response){
                $("#edit-img_bdfespan").html(response.status);
                }
           });
  }

  function updatecoralreefnew()
{
   $.ajax({
    url : BASE_URL+'/pasu/pamain/update_coralreefnew',
    type : 'POST',
    dataType : 'JSON',
    data: $('#FormCoralReefeditNew').serializeArray(),
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-coralReefNew').modal('hide');
            fetchcoralreefs();
        }
   });
}

function updateseagrassessnew()
{
   $.ajax({
    url : BASE_URL+'/pasu/pamain/update_seagrassessnew',
    type : 'POST',
    dataType : 'JSON',
    data: $('#FormSeagrasseditNew').serializeArray(),
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-seagrassNew').modal('hide');
            fetchseagrass();
        }
   });
}

function updateMangrovesnew()
{
   $.ajax({
    url : BASE_URL+'/pasu/pamain/update_Mangrovenew',
    type : 'POST',
    dataType : 'JSON',
    data: $('#FormMangroveeditNew').serializeArray(),
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            // $('#modal-edit-MangroveNew').modal('hide');
            fetchmangrove();
        }
   });
}

function updateFishdetails()
{
   $.ajax({
    url : BASE_URL+'/pasu/pamain/update_fishdetails',
    type : 'POST',
    dataType : 'JSON',
    data: $('#FormFishDetails').serializeArray(),
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            // $('#modal-edit-MangroveNew').modal('hide');
            fetchFishdetails();
        }
   });
}

function Updateothertenureedit()
{
    // var formdata = new FormData();
    // formdata.append('edit-pic_otother', document.getElementById('edit-pic_otother').files[0]);
    // formdata.append('edit-zip_shpfile_otherinstrument', document.getElementById('edit-zip_shpfile_otherinstrument').files[0]);
    // formdata.append('edit-zip_shpfile_otherinstrumentfile', document.getElementById('edit-zip_shpfile_otherinstrumentfile').files[0]);

    // var other_data = $('#OtherTenureForm').serializeArray();
    // $.each(other_data,function(key,input){
    //     formdata.append(input.name,input.value);
    // });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_othertenure',
    type : 'POST',
    dataType : 'JSON',
    data: $('#OtherTenureForm').serializeArray(),
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-othertenure').modal('hide');
            fetchothertenure();
            document.getElementById('loadingothertenureshpfileEdit').innerHTML="";
            document.getElementById('loadingothertenureapprovedocsEdit').innerHTML="";
            document.getElementById('loadingothertenureapambclearanceEdit').innerHTML="";
        }
   });
}

$("#edit-nature_threats").change(function(){
    var error = $('.edit-error_Threats_nature');
    var output = $('#edit-nature_threats_sub');

    $.ajax({
        url : BASE_URL+'/pasu/pamain/subnatureThreats',
        type : 'POST',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          subcat : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);
              error.html('');
            } else if (data.status == false) {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            } else {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            }
          },
          error : function()
          {
            alert('failed');
          }
    });
});


    $('#edit-chk_s1').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s2').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s3').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s4').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s5').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s6').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s7').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#chk_s8').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s9').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s10').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s11').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s12').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_s13').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();


    $('#edit-chk_mm1').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm2').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm3').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm4').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm5').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm6').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm7').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm8').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm9').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm10').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm11').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm12').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm13').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_mm14').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();

    $('#edit-chk_au1').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au2').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au3').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au4').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au5').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au6').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au7').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au8').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au9').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au10').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au11').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au12').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au13').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au14').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au15').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au16').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au17').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_au18').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();


    function updatecepareport()
{
   var codegen = document.getElementById('cepaact-gencode').value;
   $.ajax({
    url : BASE_URL+'pasu/pamain/update_cepareportactivity',
    type: "POST",
    data: $('#CepaActivityForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-cepaactivity').modal('hide');
            getTableCepaReport();
        }
   });
}



$("#edit-land-legend").change(function(){
    var output = $('#edit-sub_existing_landuse');
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getexistlanduse/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          regids : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);

            } else if (data.status == false) {
              output.html(data.message).addClass('text-danger').removeClass('text-success');
            } else {
              output.html(data.message).addClass('text-danger').removeClass('text-success');
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});

$("#edit-inlandwaterbodyclass").change(function(){
  var output = $('#edit-inlandwaterbodyclass');
  var displays = $('#edit-inlandwaterbodyclassSub');
  $.ajax({
    url  : BASE_URL+'/pasu/pamain/getWaterClassSub/',
    // '<?= base_url('index.php/main_server/cave/getMunicipal/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      ids : $(this).val(),
    },
    success : function(data)
    {
      if (data.status == true) {
        displays.html(data.message);
        // output.html('');
      } else if (data.status == false) {
        displays.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success')
      } else {
        displays.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

function updateurbaneco()
{
    var formdata = new FormData();
    formdata.append('edit-lguresolutions', document.getElementById('edit-lguresolutions').files[0]);

    var other_data = $('#FormUrbanEco').serializeArray();
    $.each(other_data,function(key,input){
        formdata.append(input.name,input.value);
    });

   $.ajax({
    url : BASE_URL + 'pasu/pamain/update_urbaneco',
    method: 'POST',
    contentType: false,
    cache: false,
    processData: false,
    data: formdata,
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-urbaneco').modal('hide');
            getAllUrbanEco();
        }
   });
}

$("#edit-riverbasinname").change(function(){
  var output = $('#edit-riverbasinname');
  var displays = $('#edit-watershedname');
  $.ajax({
    url  : BASE_URL+'/pasu/pamain/getWatershedname/',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      ids : $(this).val(),
    },
    success : function(data)
    {
      if (data.status == true) {
        displays.html(data.message);
        // output.html('');
      } else if (data.status == false) {
        displays.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success')
      } else {
        displays.html('');
        output.html(data.message).addClass('text-danger').removeClass('text-success');
      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

function updatewetlandmgmtpln()
{
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_wetlandmgmtplant',
    type: "POST",
    data: $('#WetlandMgmtPlanForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-wetlandmgmtplan').modal('hide');
            fetchwetlandmgmtplan();
            $('#edit-uploadwetlandmngtmplans').html('');

        }
   });
}

function updatecavemgmtpln()
{

   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_cavemgmtplant',
    type: "POST",
    data: $('#CavesMgmtPlanForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           // $('#modal-edit-cavemgmtplan').modal('hide');
            fetchcavemgmtplan();
            $('#edit-uploadcavemngtmplans').html('');
        }
   });
}

function updateothermgmtpln()
{
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_othermgmtplant',
    type: "POST",
    data: $('#OthersMgmtPlanForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-othermgmtplan').modal('hide');
            fetchothermgmtplan();
            $('#edit-otherplanfileloadings').html('');
        }
   });
}

function updateDisbursement()
{
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_disbursements',
    type: "POST",
    data: $('#DisbursementForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-disbursement').modal('hide');
            fetchdisbursementincome();
        }
   });
}

$('#edit-visitorsfeetype').change(function(e){
  // if (this.options[e.target.selectedIndex].text=="Others") {
  //   document.getElementById('edit-otherfeeid').style.display="block";
  // }else{
  //   document.getElementById('edit-otherfeeid').style.display="none";
  // }

  // if (this.options[e.target.selectedIndex].text=="Contribution/Donation") {
  //   document.getElementById('hidecontridivedit').style.display="block";
  // }else{
  //   document.getElementById('hidecontridivedit').style.display="none";
  // }
  if (this.options[e.target.selectedIndex].text=="Others") {
    document.getElementById('edit-otherfeeid').style.display="block";
    document.getElementById('edit-penaltiesdiv').style.display="none";
    document.getElementById('hidecontridivedit').style.display="none";
  }else if (this.options[e.target.selectedIndex].text=="Contribution/Donation") {
    document.getElementById('hidecontridivedit').style.display="block";
    document.getElementById('edit-penaltiesdiv').style.display="none";
    document.getElementById('edit-otherfeeid').style.display="none";
  }else if (this.options[e.target.selectedIndex].text=="Fines and Penalties") {
    document.getElementById('edit-penaltiesdiv').style.display="block";
    document.getElementById('hidecontridivedit').style.display="none";
    document.getElementById('edit-otherfeeid').style.display="none";
  }else{
    document.getElementById('edit-otherfeeid').style.display="none";
    document.getElementById('edit-penaltiesdiv').style.display="none";
    document.getElementById('hidecontridivedit').style.display="none";
  }

});

$(function(){
    $("#addvisitorspaymentsedit").click(function(){

      var code      =   document.getElementById("visitorlog-gencode").value;
      var fee       =   document.getElementById("edit-visitorsfeetype");
      var strfee    =   fee.options[fee.selectedIndex].text;
      var idfee     =   $("#edit-visitorsfeetype").val();
      var fs1       =   document.getElementById("edit-visitorsfeeamount").value;
      var fs2       =   document.getElementById("edit-specify_otherfee").value;
      var idMonth   =   $("#visitorlog-month").val();
      var idDay     =   $("#visitorlog-day").val();
      var idYear    =   $("#visitorlog-year").val();
      var vcode     =   $("#visitorlog-gencodeindi").val();

      var trust = document.getElementById("edit-visitorstrustfund");
      var strtrust = trust.options[trust.selectedIndex].text;
      var idtrust      = $("#edit-visitorstrustfund").val();

      var mode = document.getElementById("edit-visitorsmodeofpayment");
      var strmode = mode.options[mode.selectedIndex].text;
      var idmode      = $("#edit-visitorsmodeofpayment").val();

      var finespenal      = $("#edit-finespenalties").val();

      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = yyyy + '-' + mm + '-' + dd;
      if (document.getElementById('edit-visitorsfeetype').value=="6") {
        var display = strfee+"<br> Type of trust fund: "+strtrust+"<br> Mode of payment: "+strmode;
      }else if (document.getElementById('visitorsfeetype').value=="7") {
        var display = strfee+"<br>Description: "+finespenal;
      }else if (document.getElementById('edit-visitorsfeetype').value=="8") {
        var display = strfee+" ("+fs2+")";
      }else{
        var display = strfee;

      }
      if ($("#edit-visitorsfeetype")[0].selectedIndex <= 0) {
        swal("Select type of fee",'','warning');
            return
      }else if(fs1==""){
        swal("Input amount of fee",'','warning');
            return
      }else{

        $("#tableVisitorspaymentedit tbody:last-child").append(
        "<tr>"+
          "<td class='hide'>"+code+"</td>"+
          "<td class='hide'>"+vcode+"</td>"+
          "<td class='hide'>"+idMonth+"</td>"+
          "<td class='hide'>"+idDay+"</td>"+
          "<td class='hide'>"+idYear+"</td>"+
          "<td class='hide'>"+idfee+"</td>"+
          "<td class='hide'>"+fs2+"</td>"+
          "<td class='hide'>"+fs1+"</td>"+
          "<td class='hide'>"+today+"</td>"+
          "<td class='hide'>"+idtrust+"</td>"+
          "<td class='hide'>"+idmode+"</td>"+
          "<td style='text-align: left'><b><i style='color:red'>New</i></b><br>Type of fee paid : "+display+"<br> Amount : "+fs1+"<br><button type='button' name='remove' data-row='row' class='btn btn-danger btn-xs remove' onclick='deleteRowThreat(this)'>Remove</button>"+"</td>"+
          "</tr>"
      );
      }
      document.getElementById("edit-visitorsfeeamount").value='';
      document.getElementById("edit-specify_otherfee").value='';

    });
  });

function updateVisitorsLogs()
{
    var tablevisitorslogfeeEdits = [];
    $("#tableVisitorspaymentedit tr").each(function(row,tr){
        var push = {
          "generatedcode" : $(tr).find("td:eq(0)").text(),
          "visitors_gencode" : $(tr).find("td:eq(1)").text(),
          "visitorlogs_month" : $(tr).find("td:eq(2)").text(),
          "visitorlogs_day" : $(tr).find("td:eq(3)").text(),
          "visitorlogs_year" : $(tr).find("td:eq(4)").text(),
          "types_of_payment" : $(tr).find("td:eq(5)").text(),
          "other_payments" : $(tr).find("td:eq(6)").text(),
          "amount_payment" : $(tr).find("td:eq(7)").text(),
          "date_created" : $(tr).find("td:eq(8)").text(),
          "trust_fund" : $(tr).find("td:eq(9)").text(),
          "mode_payment" : $(tr).find("td:eq(10)").text(),
          "penalty_desc" : $(tr).find("td:eq(11)").text(),
        }
        tablevisitorslogfeeEdits.push(push);
    });
    sample_data = $('#FormVisitorLogs').serialize() + '&' + $.param({"tablevisitorslogfeeEdits" : tablevisitorslogfeeEdits});

   $.ajax({
    url : BASE_URL+'pasu/pamain/update_visitorsLogs',
    type: "POST",
    data: sample_data,
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
            $('#modal-edit-visitorlog').modal('hide');
            $("#tbodyvisitorspaymentedit tr").remove();

            fetchvisitorslogs();
            var v1 = $(".rmvpaymentvisitors").parent().attr("id");
            $('#' + v1).remove();

        }
   });
}

// $(document).on('change', '#edit-lh_type', function(e) {
//     if(this.options[e.target.selectedIndex].text == "Other Goods"){
//     document.getElementById('lhcatotherEdit').style.display = "block";
//     $("#edit-lh_cat_others").val('');
//       }else{
//     document.getElementById('lhcatotherEdit').style.display = "none";
//     $("#edit-lh_cat_others").val('');

//       }
//   });

$(document).on('change', '#edit-lh_type', function(e) {
    if(this.options[e.target.selectedIndex].text == "Other"){
    document.getElementById('edit-lhcatother').style.display = "block";
    $("#edit-lh_cat_others").val('');
      }else{
    document.getElementById('edit-lhcatother').style.display = "none";
    $("#edit-lh_cat_others").val('');

      }
  });
$("#edit-addtechast").click(function(){
  var rctr=1;
  rtemp = rctr;
  rctr+=1;
    $('<div id="divtechassispostEdit' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvdistechassEdit">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<input id="edit-techassitancetxt' + rctr + '" name="edit-techassitancetxt[]" placeholder="Input Technical Assistance" class="form-control"/>'+
                '</li></ul>'+
        '</div>').insertAfter("#addtechastdivEdit");
});
$(document).on("click",".rmvdistechassEdit",function() {
    var rcb = $(this).parent().attr("id");
    $('#' + rcb).remove();
});

$("#edit-addtypeassistance").click(function(){
  var rctr=1;
  rtemp = rctr;
  rctr+=1;
    $('<div id="divtypeassistpostEdit' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvdistypeassistEdit">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<input id="edit-typeofassistance' + rctr + '" name="edit-typeofassistance[]" placeholder="Input Type of Assistance" class="form-control"/>'+
                '</li></ul>'+
        '</div>').insertAfter("#addtypeassistdivEdit");
});
$(document).on("click",".rmvdistypeassistEdit",function() {
    var rcb = $(this).parent().attr("id");
    $('#' + rcb).remove();
});


function readURLeditotherPlanFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-otherplanfile', document.getElementById('edit-otherplanfile').files[0]);
      }
      var file_details    =   document.getElementById("edit-otherplanfile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-otherplanfile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-otherplanfile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/otherplanfilessEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-otherplanfileloadings').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-current_otherplanfile').value =  response.status;
                $('#edit-otherplanfileloadings').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/other_management_plan_file/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  $("#add_edit_payment_visitor").click(function(){
  var rctr=1;
  rtemp = rctr;
  rctr+=1;
    $('<div id="divvisitorpaymentedit' + rctr +'" style="position:relative; margin-top:5px;">'+
            '<button type="button" style="right:0;width:20px;height:20px;text-align:center;" class="btn btn-danger rmvpaymentvisitors">'+
                '<span class="glyphicon glyphicon-remove" style="position:absolute;top:4px;left:7px;"></span>'+
            '</button>'+
                '<ul><li>'+
                    '<br><label>Types of fee paid</label>'+
                    '<select class="form-control" id="edit-type_visitor_payment" name="edit-type_visitor_payment[]">'+
                        '<option value="0">Select</option>'+
                        '<option value="1">Entrance fee</option>'+
                        '<option value="2">Facilities user fee</option>'+
                        '<option value="3">Resource user fee</option>'+
                        '<option value="4">Concession fee</option>'+
                        '<option value="5">Development fee</option>'+
                        '<option value="6">Contribution/Donation</option>'+
                        '<option value="7">Fine and Penalties</option>'+
                    '</select>'+
                    '<br><label>Amount</label>'+
                    '<input id="edit-amount_visitor_payment' + rctr + '" name="edit-amount_visitor_payment[]" placeholder="(₱)" class="form-control"/><br>'+
                '</li></ul>'+
        '</div>').insertAfter("#paymentdivadd");
});

$(document).on("click",".rmvpaymentvisitors",function() {
    var rcb = $(this).parent().attr("id");
    $('#' + rcb).remove();
});

$("#edit_whf").change(function(){
    var myBox1 = document.getElementById('edit_seams_farmlot').value;
    var myBox2 = document.getElementById('edit_seams_homelot').value;
    var myBox3 = document.getElementById('edit_seams_otheruses').value;
    var result = document.getElementById('edit_seams_occupied');

     var a, b, c;
        a = parseFloat(document.getElementById("edit_seams_farmlot").value.replace(/,/g, ""));
        if (isNaN(a) == true) {
        a = 0;
      }
      var b = parseFloat(document.getElementById("edit_seams_homelot").value.replace(/,/g, ""));
        if (isNaN(b) == true) {
          b = 0;
      }

      var c = parseFloat(document.getElementById("edit_seams_otheruses").value.replace(/,/g, ""));
        if (isNaN(b) == true) {
          c = 0;
      }
      if (document.getElementById("edit_whf").checked == true) {
        document.getElementById("edit_seams_occupied").value = numberWithCommas(parseFloat(a + b).toFixed(3));
      } else if (document.getElementById("edit_whf").checked == false){
        document.getElementById("edit_seams_occupied").value = numberWithCommas(parseFloat(a + b + c).toFixed(3));
      }
});

$("#addpolocatione").click(function(){
  $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/insertbdfelocationsEdit',
    type: "POST",
    data: $('#BDFEform').serialize(),
    dataType: "JSON",
    success:function(response){
      if (response.message == "Add") {
        swal('','Successfully added',"success");
        $("#edit-lh_reg")[0].selectedIndex = 0;
        $("#edit-lh_prov")[0].selectedIndex = 0;
        $("#edit-lh_mun")[0].selectedIndex = 0;
        $("#edit-lh_barangay")[0].selectedIndex = 0;
        $("#edit-lh_long_direction")[0].selectedIndex = 0;
        $("#edit-lh_lat_direction")[0].selectedIndex = 0;
        document.getElementById("edit-lhproductsource").value='';
        document.getElementById("edit-lh_long_deg").value='';
        document.getElementById("edit-lh_long_min").value='';
        document.getElementById("edit-lh_long_sec").value='';
        document.getElementById("edit-lh_dmstodd").value='';
        document.getElementById("edit-lh_lat_deg").value='';
        document.getElementById("edit-lh_lat_min").value='';
        document.getElementById("edit-lh_lat_sec").value='';
        document.getElementById("edit-lh_dmstodd2").value='';
      }else if(response.error){
        swal('',response.statusError,"error");
      }
     bdfelocationupdate();
    }
 });
});


// function Updatedemo()
// {
//     var formdata = new FormData();
//     formdata.append('edit-zipSHPdemo', document.getElementById('edit-zipSHPdemo').files[0]);

//     var other_data = $('#demoForm').serializeArray();
//     $.each(other_data,function(key,input){
//         formdata.append(input.name,input.value);
//     });

//    $.ajax({
//     url : BASE_URL + 'pasu/pamain/update_demo',
//     method: 'POST',
//     contentType: false,
//     cache: false,
//     processData: false,
//     data: formdata,
//     dataType: "JSON",
//     success:function(response){
//             swal({
//               title: "Successful Update!",
//               text: "Your data has been updated.",
//               type: "success",
//               showConfirmButton: true,
//            });
//            // $('#modal-edit-demo').modal('hide');
//             fetchdemo();
//         }
//    });
// }
function UpdateProgResearchs(){
    type = $("#search_type").val();
    purpose = $("#search_purpose").val();
    if(type == ""){
        swal("Please filled-up type of research",'','warning');
            return
    }else if(purpose == ""){
        swal("Please filled-up purpose",'','warning');
            return
    }else{
        var tablerefres = [];
        $("#tableRefResearchProgram tr").each(function(row,tr){
          var push = {
            "generatedcode" : $(tr).find("td:eq(0)").text(),
            "research_code" : $(tr).find("td:eq(1)").text(),
            "ref_date_month" : $(tr).find("td:eq(2)").text(),
            "ref_date_year" : $(tr).find("td:eq(3)").text(),
            "type_citation" : $(tr).find("td:eq(4)").text(),
            "author" : $(tr).find("td:eq(5)").text(),
            "webtitleRef" : $(tr).find("td:eq(6)").text(),
            "websiteRef" : $(tr).find("td:eq(7)").text(),
            "worktitleRef" : $(tr).find("td:eq(8)").text(),
            "bookpublisherRef" : $(tr).find("td:eq(9)").text(),
            "journaltitleRef" : $(tr).find("td:eq(10)").text(),
            "periodicalRef" : $(tr).find("td:eq(11)").text(),
            "journalVolRef" : $(tr).find("td:eq(12)").text(),
            "journalpagerangeRef" : $(tr).find("td:eq(13)").text(),
            "link" : $(tr).find("td:eq(14)").text(),
            "ref_desc" : $(tr).find("td:eq(15)").text(),
            "id_program" : $(tr).find("td:eq(16)").text(),           
          }
          tablerefres.push(push);
        });

            var sample_data = $('#ResearchesForms1').serialize() + '&' + $.param({"tablerefres" : tablerefres});
            $.ajax({
            url : BASE_URL + '/pasu/pamain/insertresearchs',
            type : "POST",
            data : sample_data,
            dataType : "JSON",

            // $.ajax({
            //     url : BASE_URL + 'index.php/pasu/pamain/insertresearchs',
            //     type: "POST",
            //     data: $('#ResearchesForms1').serialize(),
            //     dataType: "JSON",
              success:function(response){
                  if (response.message == "Add") {
                      swal('','Successfully added',"success");
                      document.getElementById('search-searchcode').value = makeResearchid(8);
                      $('#add-search_type').val('');
                      $('#add-search_purpose').val('');
                      $('#add-search_permit').val('');
                      $('#add-search_funding').val('');
                      $('#add-search_name').val('');
                      $('#add-search_institution').val('');
                      $('#add-search_pambresono').val('');
                      $('#add-search_titlereso').val('');
                      $('#add_modal-pambreso').val('');
                      $('#modal_research_file').val('');
                      $('#modal_research_reso').val('');
                      $('#modal_research_reso_old').val('');
                      $('#edit-searchpermit_txt').val('');
                      $('#uploadmodal_research_reso').empty();
                        $("#add-search_monthfrom")[0].selectedIndex = 0;
                        $("#add-search_yearfrom")[0].selectedIndex = 0;
                        $("#add-search_monthto")[0].selectedIndex = 0;
                        $("#add-search_yearto")[0].selectedIndex = 0;
                      $('#tableRefResearchProgram').empty();
                      document.getElementById('add-chk_progres_approve').checked =false;
                      var node = document.getElementById('add_modal-pambreso_file');
                      var node2 = document.getElementById('uploadmodal_research_file');
                      node.innerHTML = "";
                      node2.innerHTML = "";
                        getPrograms();
                  }else if(response.error){
                      swal('',response.statusError,"error");
                  }
                  var d2 = $("#search-id_program").val();
                  $.ajax({
                  type: 'POST',
                  data : {ids:d2},
                  url: BASE_URL + 'pasu/pamain/fetchresearches',
                  success:function(response){
                      $('#tbodyresearchs').html(response);
                    }
                });
              }
          });
        }
};
$('#add-chk_progres_approve').on('change', function(){
   this.value = this.checked ? 1 : 0;
}).change();

$('#edit-chk_progres_approve').on('change', function(){
   this.value = this.checked ? 1 : 0;
}).change();

$(".regid").change(function(){
    var output = $('.prov_error');
    var prov_list_item = $('.provid');
    var municipal_list_item = $('.munid');
    var barangay_list_item = $('.barid');
    var clear1 = $('.municipal_error');
    var clear2 = $('.barangay_error');

    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getProv/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          regid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              prov_list_item.html(data.message);
              output.html('');
              municipal_list_item.html('');
              barangay_list_item.html('');
              clear1.html('');
              clear2.html('');
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});

$(".provid").change(function(){
  var output = $('.municipal_error');
  var prov_list_item = $('.provid');
  var municipal_list_item = $('.munid');
  var barangay_list_item = $('.barid');
  var clear2 = $('.barangay_error');
  $.ajax({
    url  : BASE_URL+'/pasu/pamain/getMunicipal/',
    // '<?= base_url('index.php/main_server/cave/getMunicipal/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      regid : $(this).val(),
      provid : $(this).val()
    },
    success : function(data)
    {
      if (data.status == true) {
        municipal_list_item.html(data.message);
        barangay_list_item.html('');
        output.html('');
        clear2.html('');

      }
    },
    error : function()
    {
      alert('failed me');
    }
  });
});

$(".munid").change(function(){
  var output = $('.barangay_error');
  var municipal_list_item = $('.munid');
  var barangay_list_item = $('.barid');
  $.ajax({
    url  :  BASE_URL+'/pasu/pamain/getbarangay/',
    // '<?= base_url('index.php/main_server/cave/getbarangay/') ?>',
    type : 'post',
    dataType : 'JSON',
    data : {
      '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
      munid : $(this).val()
    },
    success : function(data)
    {
      if (data.status == true) {
        barangay_list_item.html(data.message);
        output.html('');

      }
    },
    error : function()
    {
      alert('failed');
    }
  });
});

$("#edit-nature_threats").change(function(){
    var error = $('.error_Threats_nature');
    var output = $('#edit-threats_cat');

    $.ajax({
        url : BASE_URL+'/pasu/pamain/subnatureThreats',
        type : 'POST',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          subcat : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);
              error.html('');
            } else if (data.status == false) {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            } else {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            }
          },
          error : function()
          {
            alert('failed');
          }
    });
});
$("#edit-threats_cat").change(function(){
    var error = $('.error_cat');
    var output = $('#edit-threats_cat_sub');

    $.ajax({
        url : BASE_URL+'/pasu/pamain/subThreatCat',
        type : 'POST',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          subcat : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);
              error.html('');
            } else if (data.status == false) {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            } else {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            }
          },
          error : function()
          {
            alert('failed');
          }
    });
});

$("#edit-nature_threats").change(function(){
    var error = $('.error_Threats_nature');
    var output = $('#edit-threats_cat');

    $.ajax({
        url : BASE_URL+'/pasu/pamain/subnatureThreats',
        type : 'POST',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          subcat : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);
              error.html('');
            } else if (data.status == false) {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            } else {
              output.html('');
              // output.html(data.message).addClass('text-danger').removeClass('text-success')
            }
          },
          error : function()
          {
            alert('failed');
          }
    });
});

$("#editdata_threat").click(function(){
  $.ajax({
      url : BASE_URL + 'index.php/pasu/pamain/insertpathreatslistEdit',
      type: "POST",
      data: $('#ThreatsForm').serialize(),
      dataType: "JSON",
      success:function(response){
        if (response.message == "Add") {
          swal('','Successfully added',"success");
          var res = response.output;
          $("#edit-nature_threats")[0].selectedIndex = 0;
          $("#edit-threats_cat")[0].selectedIndex = 0;
          $("#edit-threats_cat_sub")[0].selectedIndex = 0;
          $("#edit-threats_desc").val('');
          document.getElementById("edit-ddlongoutputes").value="";
          $("#edit-threats_longitude_dms_directiones")[0].selectedIndex = 0;
          document.getElementById("edit-threats_longitude_dms_degreeses").value="";
          document.getElementById("edit-threats_longitude_dms_minuteses").value="";
          document.getElementById("edit-threats_longitude_dms_secondses").value="";
          document.getElementById("edit-ddlatoutputes").value="";
          $("#edit-threats_latitude_dms_directiones")[0].selectedIndex = 0;
          document.getElementById("edit-threats_latitude_dms_degreeses").value="";
          document.getElementById("edit-threats_latitude_dms_minuteses").value="";
          document.getElementById("edit-threats_latitude_dms_secondses").value="";
           var codegen = $('#threats-gencode2').val();
            $.ajax({
                type: 'POST',
                data : {codegens:codegen},
                url: BASE_URL + 'pasu/pamain/listoftrehay',
                success:function(response){
                    $('#threatlistshw').html(response);
                }
            });
          }else if(response.error){
              swal('',response.statusError,"error");
          }
      // getallthreatlistedit();
            getThreatFetch();
      }
  });
});


$('#edit-chk_cupa').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
$('#edit-chk_cupa').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();

function readURLproofdeposit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('add-proofdeposit', document.getElementById('add-proofdeposit').files[0]);
      }
      var file_details    =   document.getElementById("add-proofdeposit").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('add-proofdeposit').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('add-proofdeposit').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/ipafincomebtr25',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#brt25loading').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('add-proofdeposit_span').value =  response.status;
                $('#brt25loading').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/certificateofreceiptipaf/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLbankdeposit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('add-bankdeposit', document.getElementById('add-bankdeposit').files[0]);
      }
      var file_details    =   document.getElementById("add-bankdeposit").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('add-bankdeposit').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('add-bankdeposit').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/ipafincomebankdepost',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#bankcertloading').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('add-bankdeposit_span').value =  response.status;
                $('#bankcertloading').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/ipaf_bank_certificate/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }
  $(document).ready(function(){
    document.getElementById('ipafmonthbtr').disabled = true;
    document.getElementById('ipafdaybtr').disabled = true;
    document.getElementById('ipafyearbtr').disabled = true;
  });

  function readURLdisburepariaEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-disburseparia', document.getElementById('edit-disburseparia').files[0]);
      }
      var file_details    =   document.getElementById("edit-disburseparia").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-disburseparia').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-disburseparia').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/DisbursementPARIAEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#disburementpariafile_upload').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-disburseparia_span').value =  response.status;
                $('#disburementpariafile_upload').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/incomedisburseparia_file/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLdisburesagfEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-disbursesagf', document.getElementById('edit-disbursesagf').files[0]);
      }
      var file_details    =   document.getElementById("edit-disbursesagf").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-disbursesagf').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-disbursesagf').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/DisbursementSAGFEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#disburementsagffile_upload').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-disbursesagf_span').value =  response.status;
                $('#disburementsagffile_upload').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/incomedisbursesagf_file/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLEcoPlanFileEdit(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-ecoplanfile', document.getElementById('edit-ecoplanfile').files[0]);
      }
      var file_details    =   document.getElementById("edit-ecoplanfile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-ecoplanfile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-ecoplanfile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/ecoplanfilessEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-uploadecotourmngtmplans').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-ecoplanfilesload').value =  response.status;
                $('#edit-uploadecotourmngtmplans').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/ecotourism_mgmt_plan/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLWetlandPlanFileEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-wetlandplanfile', document.getElementById('edit-wetlandplanfile').files[0]);
      }
      var file_details    =   document.getElementById("edit-wetlandplanfile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-wetlandplanfile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-wetlandplanfile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/wetlandplanfilessEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-uploadwetlandmngtmplans').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-wetlandplanfilesload').value =  response.status;
                $('#edit-uploadwetlandmngtmplans').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/wetland_management_plan/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLCavePlanFileEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-caveplanfile', document.getElementById('edit-caveplanfile').files[0]);
      }
      var file_details    =   document.getElementById("edit-caveplanfile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-caveplanfile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-caveplanfile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/caveplanfilessEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-uploadcavemngtmplans').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-caveplanfilesload').value =  response.status;
                $('#edit-uploadcavemngtmplans').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/wetland_management_plan/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  $('#edit-pic_facility').change(function(){
  var files = $('#edit-pic_facility')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#AttractionForm').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-pic_facility[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-pic_facility").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('edit-pic_facility').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-pic_facility').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/ecofacilityimguploadEdit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      document.getElementById('facilitiesimageupload').style.display = "block";
     $('#facilitiesimageupload').html("<div id='loaders_iw' class='loader'></div>");
    },
    success:function(response)
    {
      $('#facilitiesimageupload').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/facilities_img/'+response+'" class="img-responsive img-thumbnail img-gallery" /></div>');
      document.getElementById("edit-img_facilitiesoutput").value = response;
    }
   })
  }
 });

$('#edit-pic_product').change(function(){
  var files = $('#edit-pic_product')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#ProductForm').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-pic_product[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-pic_product").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('edit-pic_product').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-pic_product').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/ecoproductimguploadEdit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      document.getElementById('productimageuploads').style.display = "block";
     $('#productimageuploads').html("<div id='loaderss' class='loader'></div>");
    },
    success:function(response)
    {
      $('#productimageuploads').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/product_img/'+response+'" class="img-responsive img-thumbnail img-gallery" /></div>');
      document.getElementById("edit-img_outputproduct").value = response;
    }
   })
  }
 });

$('#edit-pic_enterprise').change(function(){
  var files = $('#edit-pic_enterprise')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#EnterpriseForm').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-pic_enterprise[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-pic_enterprise").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('edit-pic_enterprise').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-pic_enterprise').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/ecoenterpriseimguploadEdit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      document.getElementById('prodenterprisedivupload').style.display = "block";
     $('#prodenterprisedivupload').html("<div id='loaderss' class='loader'></div>");
    },
    success:function(response)
    {
      $('#prodenterprisedivupload').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/enterprise_img/'+response+'" class="img-responsive img-thumbnail img-gallery" /></div>');
      document.getElementById("edit-img_outputenterpriseimage").value = response;
    }
   })
  }
 });

$("#addsapamonitorEdit").click(function(){
  if ($("#edit-old_sapamonitoringupload").val() == "") {
      swal('','Upload pdf file',"warning");
  }else{
  $.ajax({
        // url : BASE_URL + 'index.php/pasu/pamain/insertPATenureSAPA',
        url : BASE_URL + 'pasu/pamain/sapamonitoringreportEdit',
        type: "POST",
        data: $('#SAPAForm').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('',response.status,"success");
            $("#edit-sapamonitoringtext").val('');
            $("#edit-sapamonitoringupload").val('');
            $("#edit-old_sapamonitoringupload").val('');
            document.getElementById('edit-sapamonitoringuploadDivNew').innerHTML = "";
                var codegen = $('#sapa-gencode2').val();
                $.ajax({
                    type: 'POST',
                    data : {codegens:codegen},
                    url: BASE_URL + 'pasu/pamain/refreshsapamonitoringreport',
                    success:function(response){
                        $('#edit-sapamonitoringuploadDiv').html(response);
                    }
                });
            gettenuresapa();
            }
        }
      });
  }
});

function removesapamonreps()
{
    var codegen = $('#sapa-gencode2').val();
    $.ajax({
        type: 'POST',
        data : {codegens:codegen},
        url: BASE_URL + 'pasu/pamain/refreshsapamonitoringreport',
        success:function(response){
            $('#edit-sapamonitoringuploadDiv').html(response);
        }
    });
}

$("#addmoamonitorEdit").click(function(){
  if ($("#edit-moamonitoringupload_span").val() == "") {
      swal('','Upload pdf file',"warning");
  }else{
  $.ajax({
        // url : BASE_URL + 'index.php/pasu/pamain/insertPATenureSAPA',
        url : BASE_URL + 'pasu/pamain/moamonitoringreportaddEdit',
        type: "POST",
        data: $('#MOAForm').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('',response.status,"success");
            $("#edit-moamonitoringtext").val('');
            // $("#sapamonitoringuploadDiv").html('');
            $("#edit-moamonitoringuploads").val('');
            $("#edit-moamonitoringupload_span").val('');
            document.getElementById('edit-moamonitoringuploadDivNew').innerHTML = "";
                var codegen = $('#moa-gencode2').val();
                $.ajax({
                    type: 'POST',
                    data : {codegens:codegen},
                    url: BASE_URL + 'pasu/pamain/refreshmoamonitoringreport',
                    success:function(response){
                        $('#edit-moamonitoringuploadDiv').html(response);
                    }
                });
            gettenuremoa();
            }
        }
      });
  }
});

function removemoamonreps()
{
    var codegen = $('#moa-gencode2').val();
    $.ajax({
        type: 'POST',
        data : {codegens:codegen},
        url: BASE_URL + 'pasu/pamain/refreshmoamonitoringreport',
        success:function(response){
            $('#edit-moamonitoringuploadDiv').html(response);
        }
    });
}

$('#edit-pic_otother').change(function(){
  var files = $('#edit-pic_otother')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#OtherTenureForm').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-pic_otother[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-pic_otother").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('edit-pic_otother').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-pic_otother').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/tenureothersimguploadEdit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
      document.getElementById('fetch_other_map_images').style.display = "block";
     $('#fetch_other_map_images').html("<div id='loaders_iw' class='loader'></div>");
    },
    success:function(response)
    {
     // $('#messagemain').html(data.status);
     // $('#img_iwmapspan').html(data);
      $('#fetch_other_map_images').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/tenure_map_others/'+response+'" class="img-responsive img-thumbnail img-gallery" /></div>');
      document.getElementById("edit-othermapimage_text").value = response;
    }
   })
  }
 });

$('#edit-zip_shpfile_otherinstrument').change(function(){
  var files = $('#edit-zip_shpfile_otherinstrument')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#OtherTenureForm').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['zip','rar']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-zip_shpfile_otherinstrument[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-zip_shpfile_otherinstrument").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["zip", "rar",];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-zip_shpfile_otherinstrument').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.zip, *.rar)','','warning');
    document.getElementById('edit-zip_shpfile_otherinstrument').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/zipSHPothertenuresEdit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#loadingothertenureshpfileEdit').html("<div id='loaderss' class='loader'></div>");
    },
    success:function(response)
    {
      swal('Successfully Uploaded','','success');
      document.getElementById('loadingothertenureshpfileEdit').style.display= "none";
      document.getElementById('edit-shpzip_otherinstrument').value = response;
    }
   })
  }
 });

$("#addsearchpambresosEdit").click(function(){
  if ($("#edit-editsearch_pambreso").val() == "") {
    swal('','Input PAMB Resolution number',"warning");
  }else if ($("#edit-editsearch_titlereso").val() == "") {
    swal('','Input PAMB Resolution title',"warning");
  }else{
  $.ajax({
        url : BASE_URL + 'pasu/pamain/createresearchpambresoEdit',
        type: "POST",
        data: $('#ResearchForm').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('','Success Added',"success");
            $("#edit-research_pambreso").val('');
            $("#edit-load_PAMBReso_File").html('');
            $("#edit-research_titlereso").val('');
            $("#edit-researchreso_span").val('');
            $("#edit-research_pambReso_files").val('');
            // getresearchPAMBResoFileNew();
            getresearchPAMBResoFileNewEdit();
            }
        }
      });
  }
});

function readURLresofile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var formdata = new FormData();
            formdata.append('resofile', document.getElementById('resofile').files[0]);
    }
        var file_details    =   document.getElementById("resofile").files[0];
        var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
        var allowed_extension   =   ["pdf"];
        var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
    if(file_details['size'] > 419430400)
    {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('resofile').value="";
        return false;
    }
        else if(check_for_valid_ext == -1)
    {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('resofile').value="";
        return false;
    }
      else
    {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/pambresofileupload',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#pambresouploaddiv').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                $('#pambresouploaddiv').html('<div class="col-md-12"><a target="_blank" href="'+BASE_URL+'bmb_assets2/upload/pdf_file_resolution/'+response.status+'">'+response.status+'</a></div>');
                document.getElementById('old_file_reso').value =  response.status;
                }
           });
      }
  }

  function readURLresofileEdit(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var formdata = new FormData();
            formdata.append('edit-resofile', document.getElementById('edit-resofile').files[0]);
    }
        var file_details    =   document.getElementById("edit-resofile").files[0];
        var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
        var allowed_extension   =   ["pdf"];
        var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
    if(file_details['size'] > 419430400)
    {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-resofile').value="";
        return false;
    }
        else if(check_for_valid_ext == -1)
    {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-resofile').value="";
        return false;
    }
      else
    {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/pambresofileuploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#pambresouploaddivEdit').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                $('#pambresouploaddivEdit').html('<div class="col-md-12"><a target="_blank" href="'+BASE_URL+'bmb_assets2/upload/pdf_file_resolution/'+response.status+'">'+response.status+'</a></div>');
                document.getElementById('edit-pambresotxt').value =  response.status;
                }
           });
      }
  }

function readURLtransmittalFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();

      formdata.append('transmittalfile', document.getElementById('transmittalfile').files[0]);
      }
       var other_data = $('#AddPAMResolutionForm').serializeArray();
        $.each(other_data,function(key,input){
            formdata.append(input.name,input.value);
        });
        var file_details    =   document.getElementById("transmittalfile").files[0];
        var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
        var allowed_extension   =   ["pdf"];
        var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
        if(file_details['size'] > 419430400)
        {
          swal('Please upload a file less than 50 MB','','warning');
          document.getElementById('transmittalfile').value="";
          return false;
        }
        else if(check_for_valid_ext == -1)
        {
          swal('upload valid extension file(*.pdf)','','warning');
          document.getElementById('transmittalfile').value="";
          return false;
        }
        else
        {

        if ($("#date_submitted_bmb_month")[0].selectedIndex <= 0) {
          swal('Select month submitted','','warning');
          $('#transmittalfile').val('');
          return
        } else if($("#date_submitted_bmb_year")[0].selectedIndex <= 0){
          swal('Select year submitted','','warning');
          $('#transmittalfile').val('');
          return
        }else{
          $.ajax({
            url : BASE_URL + 'pasu/pamain/transmittalFileUploading',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            success:function(response){
              document.getElementById('transmittalfile_span').value = response.status;
                $("#date_submitted_bmb_month")[0].selectedIndex = 0;
                $("#date_submitted_bmb_year")[0].selectedIndex = 0;
                document.getElementById('transmittalfile').value='';
                getrepambtransmitalFile();
                }
           });
        }
        }
  }

  function getrepambtransmitalFile(){

    var codegen = $('#mompambreso-gencode3').val();
    $.ajax({
        type: 'POST',
        data : {codegens:codegen},
        url: BASE_URL + 'pasu/pamain/pambTransmitalFileQuery',
        success:function(response){
            $('#uploadtransmittalfile_file').html(response);
        }
    });
}

$('#addpambresolu').click(function(){
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/insertpambresolutionfile',
    type: "POST",
    data: $('#AddPAMResolutionForm').serialize(),
    dataType: "JSON",
    success:function(response){
      if (response.message == "Add") {
        swal('','Successfully added',"success");
        document.getElementById("resono").value='';
        document.getElementById("resotitle").value='';
        document.getElementById("resofile").value='';
        var node = document.getElementById('uploadtransmittalfile_file');
        node.innerHTML = "";
        document.getElementById('mompambreso-gencode3').value = makePAMBResoTransmittalid(8);
        getResoFile();
        getallminutesofmeeting();
        document.getElementById('pambresouploaddiv').innerHTML="";
        $("#date_approve_chair_month")[0].selectedIndex = 0;
        $("#date_approve_chair_year")[0].selectedIndex = 0;
        $("#date_affirmed_sec_month")[0].selectedIndex = 0;
        $("#date_affirmed_sec_year")[0].selectedIndex = 0;
      }
    }
    });
});

function getResoFile(){
    var codegen = $('#mompambreso-gencode2').val();
    $.ajax({
        type: 'POST',
        data : {d2:codegen},
        url: BASE_URL + 'pasu/pamain/fetchresofile',
        success:function(response){
            $('#tbodyresofile').html(response);
        }
    });
}
function editresofile(elem){
  var table = document.getElementById('tblresofile');
  var ct = elem.value;
  var x = $('#cpe'+ct).val();
  var t_rows = document.getElementById(elem.value);
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
             document.getElementById("edit-old_file_reso").value = this.cells[1].innerHTML;
             document.getElementById("edit-resono").value = this.cells[2].innerHTML;
             document.getElementById("edit-resotitle").value = this.cells[3].innerHTML;
             document.getElementById("linkss").href = this.cells[4].innerHTML;
             document.getElementById("linkss").innerHTML = this.cells[1].innerHTML;
             document.getElementById("resofile-pambresoCode").value = this.cells[5].innerHTML;
             document.getElementById("edit-pambstatus").value = this.cells[6].innerHTML;
             document.getElementById("edit-date_approve_chair_month").value = this.cells[7].innerHTML;
             document.getElementById("edit-date_approve_chair_year").value = this.cells[8].innerHTML;
             document.getElementById("edit-date_affirmed_sec_month").value = this.cells[9].innerHTML;
             document.getElementById("edit-date_affirmed_sec_year").value = this.cells[10].innerHTML;
             document.getElementById("resofile-gencode").value = this.cells[11].innerHTML;
             document.getElementById("resofile-transmitcode").value = this.cells[12].innerHTML;
             $.ajax({
                url : BASE_URL+'/pasu/pamain/researchPamBTransmitalFileQueryEdit',
                type : 'POST',
                data : {codegens : $("#resofile-transmitcode").val()},
                  success : function(response)
                  {
                    $("#edit-uploadtransmittalfile_file").html(response);
                  }
            });
        };

    }
    $('#resofile-id').val(elem.value);
    $("#modal-edit-resofile").modal("toggle");
    $('#modal-edit-resofile').on('hidden.bs.modal', function(){
    $("#ResoForm").trigger("reset");
});
}

$('#edit-pic_map').change(function(){
  var files = $('#edit-pic_map')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#MapForm').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-pic_map[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-pic_map").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-pic_map').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-pic_map').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/img_map_others', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     // $('#loadingspinwatersheds').html("<div id='loaderss' class='loader'></div>");
     $('#mapimageuploadidv').html("<div id='loaderss' class='loader'></div>");
    },
    success:function(response)
    {
     // $('#loadingspinhydro').html(response);
     $('#mapimageuploadidv').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/map_image/'+response+'" class="img-responsive img-thumbnail img-gallery" /></div>');

      document.getElementById("edit-img_outputspan").value = response;
      $('#edit-pic_map').val('');
    }
   })
  }
 });

$("#edit-recognition").change(function(){
    var crit = $('#edit-int_crit');
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getinicitEdit/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          crit : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              crit.html(data.message);
            } else if (data.status == false) {
              $("#edit-int_crit")[0].selectedIndex = 0;
            } else {
              // $("#int_crit")[0].selectedIndex = 0;
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});


$(document).on('change', '#edit-recognition', function(e) {
    if(this.options[e.target.selectedIndex].text == "World Heritage Site"){
        document.getElementById('chck-recogsubEdit').style.display='block';
        document.getElementById("edit-sitenodis").style.display="none";
        document.getElementById("edit-recogareahadiv").style.display="block";
        document.getElementById("edit-recogareasqdiv").style.display="none";
    }else if(this.options[e.target.selectedIndex].text == "Ramsar Site"){
        document.getElementById('chck-recogsubEdit').style.display='block';
        document.getElementById("edit-sitenodis").style.display="block";
        document.getElementById("edit-recogareahadiv").style.display="block";
        document.getElementById("edit-recogareasqdiv").style.display="none";
    }else if(this.options[e.target.selectedIndex].text == "Biosphere Reserve"){
        document.getElementById('chck-recogsubEdit').style.display='block';
        document.getElementById("edit-sitenodis").style.display="none";
        document.getElementById("edit-recogareahadiv").style.display="block";
        document.getElementById("edit-recogareasqdiv").style.display="none";
    }else if(this.options[e.target.selectedIndex].text == "ASEAN Heritage Park"){
        document.getElementById('chck-recogsubEdit').style.display='block';
        document.getElementById("edit-sitenodis").style.display="none";
        document.getElementById("edit-recogareahadiv").style.display="none";
        document.getElementById("edit-recogareasqdiv").style.display="block";
    }else if(this.options[e.target.selectedIndex].text == "East Asian-Australasian Flyway Site Network"){
        document.getElementById('chck-recogsubEdit').style.display='block';
        document.getElementById("edit-sitenodis").style.display="block";
        document.getElementById("edit-recogareahadiv").style.display="block";
        document.getElementById("edit-recogareasqdiv").style.display="none";    
    }else if(this.options[e.target.selectedIndex].text == "European Public Sector Award"){
        document.getElementById('chck-recogsubEdit').style.display='block';
        document.getElementById("edit-sitenodis").style.display="none";
        document.getElementById("edit-recogareahadiv").style.display="block";
        document.getElementById("edit-recogareasqdiv").style.display="none"; 
    }else if(this.options[e.target.selectedIndex].text == "Particularly Sensitive Sea Areas"){
        document.getElementById('chck-recogsubEdit').style.display='block';
        document.getElementById("edit-sitenodis").style.display="block";
        document.getElementById("edit-recogareahadiv").style.display="block";
        document.getElementById("edit-recogareasqdiv").style.display="none"; 
    }else{
        $('#chck-recogsubEdit').hide();
        $("#edit-int_crit")[0].selectedIndex = 0;
        document.getElementById("edit-sitenodis").style.display="block";
    }
    });

$('#edit-img_coralmap').change(function(){
  var files = $('#edit-img_coralmap')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#FormCoralReefeditNew').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-img_coralmap[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-img_coralmap").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('edit-img_coralmap').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-img_coralmap').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/upload_coral_Image_indi_edit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#uploadcoralmapimage').html("<div id='loaderss' class='loader'></div>");
    },
    success:function(data)
    {
     // $('#messagemain').html(data.status);
    $('#uploadcoralmapimage').html(data);
    $('#uploadcoralmapimage').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/coralreef_map_img/'+data+'" class="img-responsive img-thumbnail img-gallery" /></div>');

    document.getElementById("edit-img_coralmapspan").value = data;
     $('#edit-img_coralmap').val('');
     // fetchcoralmap();
    }
   })
  }
 });

$('#edit-img_seagrassmap').change(function(){
  var files = $('#edit-img_seagrassmap')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#FormSeagrasseditNew').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-img_seagrassmap[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-img_seagrassmap").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('edit-img_seagrassmap').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-img_seagrassmap').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/upload_seagrass_Image_indi_edit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#uploadseagrassmapimage').html("<div id='loaderss' class='loader'></div>");
    },
    success:function(data)
    {
     // $('#messagemain').html(data.status);
    $('#uploadseagrassmapimage').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/seagrass_map/'+data+'" class="img-responsive img-thumbnail img-gallery" /></div>');
    document.getElementById("edit-img_seagrassmapspan").value = data;
     $('#edit-img_seagrassmap').val('');
     fetchcoralmap();
    }
   })
  }
 });

$('#edit-img_mangrovemap').change(function(){
  var files = $('#edit-img_mangrovemap')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#FormMangroveeditNew').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-img_mangrovemap[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-img_mangrovemap").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('edit-img_mangrovemap').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-img_mangrovemap').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/upload_mangrove_Image_indi_edit', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#uploadmangrovemapimage').html("<div id='loaderss' class='loader'></div>");
    },
    success:function(data)
    {
     // $('#messagemain').html(data.status);
    $('#uploadmangrovemapimage').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/mangrove_map/'+data+'" class="img-responsive img-thumbnail img-gallery" /></div>');
    document.getElementById("edit-img_mangrovemapspan").value = data;
     $('#edit-img_mangrovemap').val('');
     fetchcoralmap();
    }
   })
  }
 });

$('#img_po_product').change(function(){
  var files = $('#img_po_product')[0].files;
  var error = '';
  var form_data = new FormData();

    var other_data = $('#AddBDFEPOProductsForm').serializeArray();
    $.each(other_data,function(key,input){
        form_data.append(input.name,input.value);
    });

  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("img_po_product[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("img_po_product").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 200097152)
  {
    swal('Please upload a file less than 200 MB','','warning');
    document.getElementById('img_po_product').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('img_po_product').value="";
    return false;
  }
  else
  {
   $.ajax({
    url:BASE_URL+'pasu/pamain/upload_po_product_image', //base_url() return http://localhost/tutorial/codeigniter/
    method:"POST",
    data:form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function()
    {
     $('#fetch_images_po_product').html("<div id='loaderss' class='loader'></div>");
    },
    success:function(data)
    {
    $('#fetch_images_po_product').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/bdfe_po_product_img/'+data+'" class="img-responsive img-thumbnail img-gallery" /></div>');
    document.getElementById("img_po_product_span").value = data;
     $('#img_po_product').val('');
    }
   })
  }
 });

$("#addpoproducts").click(function(){
  $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/insertbdfepoproducts',
    type: "POST",
    data: $('#AddBDFEPOProductsForm').serialize(),
    dataType: "JSON",
    success:function(response){
      if (response.message == "Add") {
        swal('','Successfully added',"success");
        document.getElementById("lhproductsname").value='';
        document.getElementById("img_po_product").value='';
        document.getElementById("img_po_product_span").value='';
        document.getElementById("fetch_images_po_product").innerHTML='';
      }else if(response.error){
        swal('',response.statusError,"error");
      }
     fertchbdfepoproducts();
    }
 });
});
function fertchbdfepoproducts(){
  var codegen = $('#bdfepoproduct-gencode2').val();
  $.ajax({
      type: 'POST',
      data : {codegens:codegen},
      url: BASE_URL + 'pasu/pamain/fetchbdfeporoducts',
      success:function(response){
          $('#tbodypoproducts').html(response);
      }
  });
}

$("#addpolocation").click(function(){
  $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/insertbdfelocations',
    type: "POST",
    data: $('#AddBDFEPOResourceForm').serialize(),
    dataType: "JSON",
    success:function(response){
      if (response.message == "Add") {
        swal('','Successfully added',"success");
        // $("#lh_reg")[0].selectedIndex = 0;
        // $("#lh_prov")[0].selectedIndex = 0;
        // $("#lh_mun")[0].selectedIndex = 0;
        // $("#lh_barangay")[0].selectedIndex = 0;
        $("#lh_long_direction")[0].selectedIndex = 0;
        $("#lh_lat_direction")[0].selectedIndex = 0;
        document.getElementById("lhproductsource").value='';
        document.getElementById("lh_long_deg").value='';
        document.getElementById("lh_long_min").value='';
        document.getElementById("lh_long_sec").value='';
        document.getElementById("lh_dmstodd").value='';
        document.getElementById("lh_lat_deg").value='';
        document.getElementById("lh_lat_min").value='';
        document.getElementById("lh_lat_sec").value='';
        document.getElementById("lh_dmstodd2").value='';
        document.getElementById("lh_area").value='';
      }else if(response.error){
        swal('',response.statusError,"error");
      }
     fertchbdfelocations();
    }
 });
});



function fertchbdfelocations(){

        var codegen = $('#bdfeporesourceloc-gencode2').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'pasu/pamain/fetchbdfelocations',
            success:function(response){
                $('#tbodypolocations').html(response);
            }
        });
    }

function Updatebdferesloc()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_bdfereslocs',
    type: "POST",
    data: $('#EditBDFEPOResourceForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-bdfeporesourcelocEdit').modal('hide');
            fertchbdfelocations();
            fetchbdfefile();
        }
   });
}

$(".edit-lh_longd").click(function(){
    if ($("#edit-lh_dmstodd").prop("readonly") == true) {
        $("#edit-lh_dmstodd").prop('readonly', false);
        $("#edit-lh_dmstodd").focus();

    } else {
        $("#edit-lh_dmstodd").prop('readonly', true);

    }
});

$(".edit-lh_latd").click(function(){
    if ($("#edit-lh_dmstodd2").prop("readonly") == true) {
        $("#edit-lh_dmstodd2").prop('readonly', false);
        $("#edit-lh_dmstodd2").focus();

    } else {
        $("#edit-lh_dmstodd2").prop('readonly', true);

    }
});

function Updatebdfeprofilings()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_bdfeprofiling',
    type: "POST",
    data: $('#BDFEprofilingForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-bdfeprofiling').modal('hide');
            fetchbdfefile();
        }
   });
}


function readURLsupportmatphotodoc(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('supportmaterialphotodoc', document.getElementById('supportmaterialphotodoc').files[0]);
      }
      var other_data = $('#AddBDFEPOsupportingmatForm').serializeArray();
        $.each(other_data,function(key,input){
            formdata.append(input.name,input.value);
      });

      var file_details    =   document.getElementById("supportmaterialphotodoc").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["png", "jpg", "jpeg"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('supportmaterialphotodoc').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
        document.getElementById('supportmaterialphotodoc').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/bdfesupportmaterialphotodocs',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             // $('#upload_supportmaterialphotodoc').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('supportmaterialphotodoc_span').value =  response.status;
                // $('#upload_supportmaterialphotodoc').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/submission_appraisal_pdf/'+response.status+'">'+response.status+'</a></div>');
                // $('#upload_supportmaterialphotodoc').html('<div class="col-md-12"><img style="width:500px;height:400px" src="'+BASE_URL+'bmb_assets2/upload/watershed/'+response.status+'" class="img-responsive img-thumbnail img-gallery" /></div>');
                // $("#upload_supportmaterialphotodoc").style.display="none";
                $("#supportmaterialphotodoc").val('');
                getsupmatphotodocs();
                }
           });
      }
  }

  function getsupmatphotodocs(){

    var codegen = $('#supportingmat-gencode2').val();
    $.ajax({
        type: 'POST',
        data : {codegens:codegen},
        url: BASE_URL + 'pasu/pamain/bdfesupmatphotodocs',
        success:function(response){
            $('#upload_supportmaterialphotodoc').html(response);
        }
    });
}

function Updatebdferecognitions()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_bdferecognition',
    type: "POST",
    data: $('#AddBDFEPOrecognitionForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-bdferecognition').modal('hide');
            fetchbdfefile();
        }
   });
}

function Updatebdfeponames()
{
    $.ajax({
    url : BASE_URL+'pasu/pamain/update_bdfeponames',
    type: "POST",
    data: $('#editBDFEPONAME').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-editbdfeponame').modal('hide');
            getbdfeponames();
            bdfeponamehistoryrefresh();
        }
   });
}

 function readURLUploadvideodocs(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();

      formdata.append('uploadbdfevideodocs', document.getElementById('uploadbdfevideodocs').files[0]);
      }
       var other_data = $('#AddBDFEPOsupportingmatForm').serializeArray();
        $.each(other_data,function(key,input){
            formdata.append(input.name,input.value);
        });
        var file_details    =   document.getElementById("uploadbdfevideodocs").files[0];
        var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
        var allowed_extension   =   ["avi", "mp4", "mov", "mpg", "mpeg", "pptx"];
        var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
        if(file_details['size'] > 2019430400)
        {
          swal('Please upload a file less than 200 MB','','warning');
          document.getElementById('uploadbdfevideodocs').value="";
          return false;
        }
        else if(check_for_valid_ext == -1)
        {
          swal('Upload valid file(*.avi, *.mp4, *.mov, *.mpg, *.mpeg)','','warning');
          document.getElementById('uploadbdfevideodocs').value="";
          return false;
        }
        else
        {
          $.ajax({
            url : BASE_URL + 'pasu/pamain/bdfevideodocumentations',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            success:function(response){
              document.getElementById('uploadbdfevideodocs_spam').value = response.status;
                }
           });
        }

  }

  $("#addvideolinks").click(function(){
  $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/insertbdfevideodocs',
    type: "POST",
    data: $('#AddBDFEPOsupportingmatForm').serialize(),
    dataType: "JSON",
    success:function(response){
      if (response.message == "Add") {
        swal('','Successfully added',"success");

        document.getElementById("videodocs").value='';
        document.getElementById("uploadbdfevideodocs").value='';
        document.getElementById("uploadbdfevideodocs_spam").value='';
        document.getElementById("uploadbdfevideodocsdivs").innerHTML='';
      }else if(response.error){
        swal('',response.statusError,"error");
      }
     getsupmatvideodocs();
    }
 });
});

   function getsupmatvideodocs(){

    var codegen = $('#supportingmat-gencode2').val();
    $.ajax({
        type: 'POST',
        data : {codegens:codegen},
        url: BASE_URL + 'pasu/pamain/bdfesupmatvideodocs',
        success:function(response){
            $('#uploadbdfevideodocsdivs').html(response);
        }
    });
    }


function makebdfeenhancementcode(length) {
   var result           = 'Enhancement-';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}
$(document).ready(function() {
  document.getElementById('enhancement-gencode3').value = makebdfeenhancementcode(10);
});

function makebdfeappraisalscode(length) {
   var result           = 'Appraisal-';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}
$(document).ready(function() {
  document.getElementById('bdfeappraisal-gencode3').value = makebdfeappraisalscode(10);
});


    $("#ta_add_type_assistance").click(function(){
        $.ajax({
        url : BASE_URL + 'index.php/pasu/pamain/insertbdfetatechassistance',
        type: "POST",
        data: $('#AddBDFEenhancement').serialize(),
        dataType: "JSON",
        success:function(response){
            if (response.message == "Add") {
                swal('','Successfully added',"success");
                document.getElementById("ta_type_assistance").value='';
          }else if(response.error){
            swal('',response.statusError,"error");
          }
         fetchbdfeta_techassist();
        }
        });
    });

    function fetchbdfeta_techassist(){
    var codegen = $('#enhancement-gencode3').val();
    $.ajax({
        type: 'POST',
        data : {codegens:codegen},
        url: BASE_URL + 'pasu/pamain/fetchbdfeTAtechassist',
        success:function(response){
            $('#tbodybdfeTA_typeassistance').html(response);
        }
    });
    }

$("#ta_add_tech_assist").click(function(){
  $.ajax({
    url : BASE_URL + 'pasu/pamain/insertbdfeenhancementtechassistance',
    type: "POST",
    data: $('#AddBDFEenhancement').serialize(),
    dataType: "JSON",
    success:function(response){
      if (response.message == "Add") {
        swal('','Successfully added',"success");
        $("#ta_date_month")[0].selectedIndex = 0;
        $("#ta_date_year")[0].selectedIndex = 0;
        document.getElementById("ta_ao_txt").value='';
        document.getElementById("ta_duration").value='';
        document.getElementById("ta_type_assistance").value='';
        document.getElementById("ta_male").value='';
        document.getElementById("ta_female").value='';
        document.getElementById('enhancement-gencode3').value = makebdfeenhancementcode(10);
        $("#tbbdfeTA_typeassistance tbody tr").remove();
      }else if(response.error){
        swal('',response.statusError,"error");
      }
     fetchenahncementtechass();
    }
 });
});

function fetchenahncementtechass(){
    var codegen = $('#enhancement-gencode2').val();
    $.ajax({
        type: 'POST',
        data : {codegens:codegen},
        url: BASE_URL + 'pasu/pamain/fetchbdfeenhanceTA',
        success:function(response){
            $('#tbodybdfeTA_tech_assist').html(response);
        }
    });
}


$("#fa_add_type_assistance").click(function(){
        $.ajax({
        url : BASE_URL + 'index.php/pasu/pamain/insertbdfefatechassistance',
        type: "POST",
        data: $('#AddBDFEenhancement').serialize(),
        dataType: "JSON",
        success:function(response){
            if (response.message == "Add") {
                swal('','Successfully added',"success");
                document.getElementById("fa_type_assistance").value='';
                document.getElementById("fa_amount").value='';
          }else if(response.error){
            swal('',response.statusError,"error");
          }
         fetchbdfefa_techassist();
        }
        });
    });

    function fetchbdfefa_techassist(){
        var codegen = $('#enhancement-gencode3').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'pasu/pamain/fetchbdfeFAtechassist',
            success:function(response){
                $('#tbodybdfeFA_typeassistance').html(response);
            }
        });
    }

    $("#fa_add_tech_assist").click(function(){
      $.ajax({
        url : BASE_URL + 'pasu/pamain/insertbdfeFAenhancementtechassistance',
        type: "POST",
        data: $('#AddBDFEenhancement').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('','Successfully added',"success");
            $("#fa_date_month")[0].selectedIndex = 0;
            $("#fa_date_year")[0].selectedIndex = 0;
            // document.getElementById("tech_assistance_chk").checked=false;
            document.getElementById("fa_ao_txt").value='';
            document.getElementById("fa_duration").value='';
            document.getElementById("fa_type_assistance").value='';
            document.getElementById("fa_amount").value='';
            document.getElementById("efaproposal_span").value='';
            document.getElementById("efawfpfile_span").value='';
            document.getElementById("efaproposal").value='';
            document.getElementById("efawfpfile").value='';
            document.getElementById('enhancement-gencode3').value = makebdfeenhancementcode(10);
            $("#tbbdfeFA_typeassistance tbody tr").remove();
          }else if(response.error){
            swal('',response.statusError,"error");
          }
         fetchFAenahncementtechass();
        }
     });
    });

    function fetchFAenahncementtechass(){
        var codegen = $('#enhancement-gencode2').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'pasu/pamain/fetchbdfeenhanceFA',
            success:function(response){
                $('#tbodybdfeFA_tech_assist').html(response);
            }
        });
    }


    $("#oss_add_type_assistance").click(function(){
        $.ajax({
        url : BASE_URL + 'index.php/pasu/pamain/insertbdfeosstechassistance',
        type: "POST",
        data: $('#AddBDFEenhancement').serialize(),
        dataType: "JSON",
        success:function(response){
            if (response.message == "Add") {
                swal('','Successfully added',"success");
                document.getElementById("oss_type_assistance").value='';
                document.getElementById("oss_amount").value='';
          }else if(response.error){
            swal('',response.statusError,"error");
          }
         fetchbdfeoss_techassist();
        }
        });
    });

    function fetchbdfeoss_techassist(){
        var codegen = $('#enhancement-gencode3').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'pasu/pamain/fetchbdfeosstechassist',
            success:function(response){
                $('#tbodybdfeoss_typeassistance').html(response);
            }
        });
    }

    $("#oss_add_tech_assist").click(function(){
      $.ajax({
        url : BASE_URL + 'pasu/pamain/insertbdfeOSSenhancementtechassistance',
        type: "POST",
        data: $('#AddBDFEenhancement').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('','Successfully added',"success");
            $("#oss_date_month")[0].selectedIndex = 0;
            $("#oss_date_year")[0].selectedIndex = 0;
            // document.getElementById("tech_assistance_chk").checked=false;
            document.getElementById("oss_ao_txt").value='';
            document.getElementById("oss_duration").value='';
            document.getElementById("oss_type_assistance").value='';
            document.getElementById("oss_amount").value='';
            document.getElementById('enhancement-gencode3').value = makebdfeenhancementcode(10);
            $("#tbbdfeoss_typeassistance tbody tr").remove();
          }else if(response.error){
            swal('',response.statusError,"error");
          }
         fetchossenahncementtechass();
        }
     });
    });

    function fetchossenahncementtechass(){
        var codegen = $('#enhancement-gencode2').val();
        $.ajax({
            type: 'POST',
            data : {codegens:codegen},
            url: BASE_URL + 'pasu/pamain/fetchbdfeenhanceoss',
            success:function(response){
                $('#tbodybdfeoss_tech_assist').html(response);
            }
        });
    }

$(document).on('change', '#edit-pacategory_id', function(e) {
    if(this.options[e.target.selectedIndex].text == "Other"){
      document.getElementById('edit-othernipascategoryDiv').style.display="block";
      document.getElementById('edit-othernipascategory').value="";
    }else{
      document.getElementById('edit-othernipascategoryDiv').style.display="none";
      document.getElementById('edit-othernipascategory').value="";
    }
});

$("#edit-nipsub_id").change(function(){
  if (this.value == 3) {
    document.getElementById("edit-statusofimplementID").style.display = "block";
    $("legis_compileMap").val('');
    $("edit-legis_compileMap_span").val('');
    $("edit-legis_pasasrpao").val('');
    $("edit-legis_pasasrpao_span").val('');
    $("edit-legis_paplan").val('');
    $("edit-legis_paplan_span").val('');
    $("edit-legis_regionalreview").val('');
    $("edit-legis_regionalreview_span").val('');
    $("edit-legis_nationalreview").val('');
    $("edit-legis_nationalreview_span").val('');
    $("edit-legis_presproc").val('');
    $("edit-legis_presproc_span").val('');
    $("edit-legis_congressenact").val('');
    $("edit-legis_congressenact_span").val('');
    $("edit-legis_compileMapshp_span").val('');
    $("edit-legis_certproceed_span").val('');
    $("edit-legis_certconsult_span").val('');
    $("edit-legis_regionalreviewstaffwork_span").val('');
    $("edit-legis_regionalreviewendorse_span").val('');
    $("edit-legis_nationalreviewstaffwork_span").val('');
    $("edit-legis_nationalreviewendorse_span").val('');
    $("edit-legis_presprocrecom_span").val('');
    document.getElementById('edit-loadinglegis_compileMap').innerHTML='';
    document.getElementById('edit-loadinglegis_pasasrpao').innerHTML='';
    document.getElementById('edit-loadinglegis_paplan').innerHTML='';
    document.getElementById('edit-loadinglegis_regionalreview').innerHTML='';
    document.getElementById('edit-loadinglegis_nationalreview').innerHTML='';
    document.getElementById('edit-loadinglegis_presproc').innerHTML='';
    document.getElementById('edit-loadinglegis_congressenact').innerHTML='';
    document.getElementById('edit-chk_compileMap').checked =false;
    document.getElementById('edit-chk_pasasrpao').checked =false;
    document.getElementById('edit-chk_initplan').checked =false;
    document.getElementById('edit-chk_regionalreview').checked =false;
    document.getElementById('edit-chk_nationalreview').checked =false;
    document.getElementById('edit-chk_presproc').checked =false;
    document.getElementById('edit-chk_congressenact').checked =false;
    document.getElementById('edit-chk_pubconsult').checked =false;
    document.getElementById('edit-compileMapdiv').style.display = "none";
    document.getElementById('edit-compilePASAdiv').style.display = "none";
    document.getElementById('edit-compilepaplandiv').style.display = "none";
    document.getElementById('edit-compileregionalreviewdiv').style.display = "none";
    document.getElementById('edit-compilenationalreviewdiv').style.display = "none";
    document.getElementById('edit-presprocdiv').style.display = "none";
    document.getElementById('edit-congressenactdiv').style.display = "none";
    document.getElementById('edit-publicconsultdiv').style.display = "none";
  }else{
    document.getElementById("edit-statusofimplementID").style.display = "none";
    $("legis_compileMap").val('');
    $("edit-legis_compileMap_span").val('');
    $("edit-legis_pasasrpao").val('');
    $("edit-legis_pasasrpao_span").val('');
    $("edit-legis_paplan").val('');
    $("edit-legis_paplan_span").val('');
    $("edit-legis_regionalreview").val('');
    $("edit-legis_regionalreview_span").val('');
    $("edit-legis_nationalreview").val('');
    $("edit-legis_nationalreview_span").val('');
    $("edit-legis_presproc").val('');
    $("edit-legis_presproc_span").val('');
    $("edit-legis_congressenact").val('');
    $("edit-legis_congressenact_span").val('');
    $("edit-legis_compileMapshp_span").val('');
    $("edit-legis_certproceed_span").val('');
    $("edit-legis_certconsult_span").val('');
    $("edit-legis_regionalreviewstaffwork_span").val('');
    $("edit-legis_regionalreviewendorse_span").val('');
    $("edit-legis_nationalreviewstaffwork_span").val('');
    $("edit-legis_nationalreviewendorse_span").val('');
    $("edit-legis_presprocrecom_span").val('');
    document.getElementById('edit-loadinglegis_compileMap').innerHTML='';
    document.getElementById('edit-loadinglegis_pasasrpao').innerHTML='';
    document.getElementById('edit-loadinglegis_paplan').innerHTML='';
    document.getElementById('edit-loadinglegis_regionalreview').innerHTML='';
    document.getElementById('edit-loadinglegis_nationalreview').innerHTML='';
    document.getElementById('edit-loadinglegis_presproc').innerHTML='';
    document.getElementById('edit-loadinglegis_congressenact').innerHTML='';
    document.getElementById('edit-chk_compileMap').checked =false;
    document.getElementById('edit-chk_pasasrpao').checked =false;
    document.getElementById('edit-chk_initplan').checked =false;
    document.getElementById('edit-chk_regionalreview').checked =false;
    document.getElementById('edit-chk_nationalreview').checked =false;
    document.getElementById('edit-chk_presproc').checked =false;
    document.getElementById('edit-chk_congressenact').checked =false;
    document.getElementById('edit-chk_pubconsult').checked =false;
    document.getElementById('edit-compileMapdiv').style.display = "none";
    document.getElementById('edit-compilePASAdiv').style.display = "none";
    document.getElementById('edit-compilepaplandiv').style.display = "none";
    document.getElementById('edit-compileregionalreviewdiv').style.display = "none";
    document.getElementById('edit-compilenationalreviewdiv').style.display = "none";
    document.getElementById('edit-presprocdiv').style.display = "none";
    document.getElementById('edit-congressenactdiv').style.display = "none";
    document.getElementById('edit-publicconsultdiv').style.display = "none";
  }
});

function edit_mychkmapcompile() {
  // Get the checkbox
  var checkBox = document.getElementById("edit-chk_compileMap");
  // Get the output text
  var text = document.getElementById("edit-compileMapdiv");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    // document.getElementById('twgname').value="";
  } else {
    text.style.display = "none";
    // document.getElementById('twgname').value="";
    document.getElementById('edit-legis_compileMap').value="";
    document.getElementById('edit-legis_compileMap_span').value="";
    document.getElementById('edit-loadinglegis_compileMap').innerHTML="";
  }
}

function edit_mychkpasasrpao() {
  // Get the checkbox
  var checkBox = document.getElementById("edit-chk_pasasrpao");
  // Get the output text
  var text = document.getElementById("edit-compilePASAdiv");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    // document.getElementById('twgname').value="";
  } else {
    text.style.display = "none";
    // document.getElementById('twgname').value="";
    document.getElementById('edit-legis_pasasrpao').value="";
    document.getElementById('edit-legis_pasasrpao_span').value="";
    document.getElementById('edit-loadinglegis_pasasrpao').innerHTML="";
  }
}

function edit_mychkpubconsult() {
  // Get the checkbox
  var checkBox = document.getElementById("edit-chk_pubconsult");
  // Get the output text
  var text = document.getElementById("edit-publicconsultdiv");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    // document.getElementById('twgname').value="";
  } else {
    text.style.display = "none";
    // document.getElementById('twgname').value="";
    document.getElementById('edit-legis_certproceed').value="";
    // document.getElementById('edit-legis_certproceed_old').value="";
    document.getElementById('edit-legis_certproceed_span').value="";
    document.getElementById('edit-loadinglegis_certproceed').innerHTML="";
    document.getElementById('edit-legis_certconsult').value="";
    // document.getElementById('edit-legis_certconsult_old').value="";
    document.getElementById('edit-legis_certconsult_span').value="";
    document.getElementById('edit-loadinglegis_certconsult').innerHTML="";
  }
}

function edit_mychkpaplan() {
  // Get the checkbox
  var checkBox = document.getElementById("edit-chk_initplan");
  // Get the output text
  var text = document.getElementById("edit-compilepaplandiv");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    // document.getElementById('twgname').value="";
  } else {
    text.style.display = "none";
    document.getElementById('edit-legis_paplan').value="";
    document.getElementById('edit-legis_paplan_span').value="";
    document.getElementById('edit-loadinglegis_paplan').innerHTML="";
    // document.getElementById('twgname').value="";
  }
}

function edit_mychkregrev() {
  // Get the checkbox
  var checkBox = document.getElementById("edit-chk_regionalreview");
  // Get the output text
  var text = document.getElementById("edit-compileregionalreviewdiv");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    // document.getElementById('twgname').value="";
  } else {
    text.style.display = "none";
    document.getElementById('edit-legis_regionalreview').value="";
    document.getElementById('edit-legis_regionalreview_span').value="";
    document.getElementById('edit-loadinglegis_regionalreview').innerHTML="";
    // document.getElementById('twgname').value="";
  }
}

function edit_mychknatrev() {
  // Get the checkbox
  var checkBox = document.getElementById("edit-chk_nationalreview");
  // Get the output text
  var text = document.getElementById("edit-compilenationalreviewdiv");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    // document.getElementById('twgname').value="";
  } else {
    text.style.display = "none";
    document.getElementById('edit-legis_nationalreview').value="";
    document.getElementById('edit-legis_nationalreview_span').value="";
    document.getElementById('edit-loadinglegis_nationalreview').innerHTML="";
    // document.getElementById('twgname').value="";
  }
}

function edit_mychkpresproc() {
  // Get the checkbox
  var checkBox = document.getElementById("edit-chk_presproc");
  // Get the output text
  var text = document.getElementById("edit-presprocdiv");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    // document.getElementById('twgname').value="";
  } else {
    text.style.display = "none";
    document.getElementById('edit-legis_presproc').value="";
    document.getElementById('edit-legis_presproc_span').value="";
    document.getElementById('edit-loadinglegis_presproc').innerHTML="";
    // document.getElementById('twgname').value="";
  }
}

function edit_mychkcongressenact() {
  // Get the checkbox
  var checkBox = document.getElementById("edit-chk_congressenact");
  // Get the output text
  var text = document.getElementById("edit-congressenactdiv");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
    // document.getElementById('twgname').value="";
  } else {
    text.style.display = "none";
    document.getElementById('edit-legis_congressenact').value="";
    document.getElementById('edit-legis_congressenact_span').value="";
    document.getElementById('edit-loadinglegis_congressenact').innerHTML="";
    // document.getElementById('twgname').value="";
  }
}

function readURLlegismapcompilationEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_compileMap', document.getElementById('edit-legis_compileMap').files[0]);
      }
      var other_data = $('#LegisForm').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_compileMap").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_compileMap').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_compileMap').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legismapcompilationUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_compileMap').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_compileMap_span').value =  response.status;
                $('#edit-loadinglegis_compileMap').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_map_compilation/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegispasasrpaoEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_pasasrpao', document.getElementById('edit-legis_pasasrpao').files[0]);
      }
      var other_data = $('#LegisForm').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_pasasrpao").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_pasasrpao').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_pasasrpao').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legispasasrpaoUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_pasasrpao').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_pasasrpao_span').value =  response.status;
                $('#edit-loadinglegis_pasasrpao').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_pasasrpao/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegispaplanEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_paplan', document.getElementById('edit-legis_paplan').files[0]);
      }
      var other_data = $('#LegisForm').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_paplan").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_paplan').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_paplan').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legispaplanUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_paplan').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_paplan_span').value =  response.status;
                $('#edit-loadinglegis_paplan').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_paplan/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegisregionalrevEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_regionalreview', document.getElementById('edit-legis_regionalreview').files[0]);
      }
      var other_data = $('#LegisForm').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_regionalreview").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_regionalreview').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_regionalreview').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legisregrevUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_regionalreview').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_regionalreview_span').value =  response.status;
                $('#edit-loadinglegis_regionalreview').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_regionalreview/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegisnationalrevEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_nationalreview', document.getElementById('edit-legis_nationalreview').files[0]);
      }
      var other_data = $('#LegisForm').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_nationalreview").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_nationalreview').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_nationalreview').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legisnationalrevUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_nationalreview').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_nationalreview_span').value =  response.status;
                $('#edit-loadinglegis_nationalreview').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_nationalreview/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegispresprocEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_presproc', document.getElementById('edit-legis_presproc').files[0]);
      }
      var other_data = $('#LegisForm').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_presproc").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_presproc').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_presproc').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legispresprocUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_presproc').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_presproc_span').value =  response.status;
                $('#edit-loadinglegis_presproc').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_presidentialproc/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegiscongressenactEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_congressenact', document.getElementById('edit-legis_congressenact').files[0]);
      }
      var other_data = $('#LegisForm').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_congressenact").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_congressenact').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_congressenact').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legiscongressenactUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_congressenact').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_congressenact_span').value =  response.status;
                $('#edit-loadinglegis_congressenact').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_congressenactment/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  $("#edit-nipsub_id").change(function(){
    var output = $('#edit-pacategory_id');
    var output2 = $('#edit-legis_id');
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getpacategory/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          regids : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);

            } else if (data.status == false) {
            output.html(data.message);
              // output.html(data.message).addClass('text-danger').removeClass('text-success');
            } else {
              output.html(data.message).addClass('text-danger').removeClass('text-success');
            }
          },
          error : function()
          {
            alert('failed');
          }
        });

    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getleggalacs/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          regids : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output2.html(data.message);

            } else if (data.status == false) {
            output2.html(data.message);
              // output.html(data.message).addClass('text-danger').removeClass('text-success');
            } else {
              output2.html(data.message).addClass('text-danger').removeClass('text-success');
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});

  $('#edit-chk_compileMap').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_pasasrpao').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_initplan').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_regionalreview').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_nationalreview').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_presproc').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_congressenact').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();
    $('#edit-chk_pubconsult').on('change', function(){
       this.value = this.checked ? 1 : 0;
    }).change();

    $(document).on('change', '#edit-nipsub_id', function(e) {
      if(this.options[e.target.selectedIndex].text == "Initial Component"){
        document.getElementById('edit-icapadiv').style.display = "block";
        $("#edit-previouscat").val('');
      }else{
        document.getElementById('edit-icapadiv').style.display = "none";
        $("#edit-previouscat").val('');
          }
    });

    function readURLlegismapcompilationshpEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_compileMapshp', document.getElementById('edit-legis_compileMapshp').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_compileMapshp").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["zip","7z","gz","bz2","rar","tar"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_compileMapshp').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.zip, *.rar)','','warning');
        document.getElementById('edit-legis_compileMapshp').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legismapcompilationUploadshpEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_compileMapshp').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_compileMapshp_span').value =  response.status;
                $('#edit-loadinglegis_compileMapshp').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_map_compilation_shp/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegiscertproceedEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_certproceed', document.getElementById('edit-legis_certproceed').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_certproceed").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_certproceed').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_certproceed').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legiscertprodUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_certproceed').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_certproceed_span').value =  response.status;
                $('#edit-loadinglegis_certproceed').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_certprod/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegiscertconsultEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_certconsult', document.getElementById('edit-legis_certconsult').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_certconsult").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_certconsult').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_certconsult').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legiscertconsultUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_certconsult').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_certconsult_span').value =  response.status;
                $('#edit-loadinglegis_certconsult').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_certconsult/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegisregionalrevstaffworkEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_regionalreviewstaffwork', document.getElementById('edit-legis_regionalreviewstaffwork').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_regionalreviewstaffwork").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_regionalreviewstaffwork').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_regionalreviewstaffwork').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legisregrevstaffworkUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_regionalreviewstaffwork').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_regionalreviewstaffwork_span').value =  response.status;
                $('#edit-loadinglegis_regionalreviewstaffwork').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_regionalreviewstaffwork/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

   function readURLlegisregionalrevendorseEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_regionalreviewendorse', document.getElementById('edit-legis_regionalreviewendorse').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_regionalreviewendorse").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_regionalreviewendorse').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_regionalreviewendorse').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legisregrevendorseUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_regionalreviewendorse').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_regionalreviewendorse_span').value =  response.status;
                $('#edit-loadinglegis_regionalreviewendorse').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_regionalreviewendorse/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }
  function readURLlegisnationalrevstaffworkEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_nationalreviewstaffwork', document.getElementById('edit-legis_nationalreviewstaffwork').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_nationalreviewstaffwork").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_nationalreviewstaffwork').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_nationalreviewstaffwork').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legisnationalrevstaffworkUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_nationalreviewstaffwork').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_nationalreviewstaffwork_span').value =  response.status;
                $('#edit-loadinglegis_nationalreviewstaffwork').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_nationalreviewstaffwork/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegisnationalrevendorseEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-legis_nationalreviewendorse', document.getElementById('edit-legis_nationalreviewendorse').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-legis_nationalreviewendorse").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-legis_nationalreviewendorse').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('edit-legis_nationalreviewendorse').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legisnationalrevendorseUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadinglegis_nationalreviewendorse').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-legis_nationalreviewendorse_span').value =  response.status;
                $('#edit-loadinglegis_nationalreviewendorse').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_nationalreviewendorse/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function readURLlegispresprocrecomEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('Edit-legis_presprocrecom', document.getElementById('Edit-legis_presprocrecom').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("Edit-legis_presprocrecom").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["csv","pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('Edit-legis_presprocrecom').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.csv, *.pdf)','','warning');
        document.getElementById('Edit-legis_presprocrecom').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/legispresprocrecomUploadEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#Edit-loadinglegis_presprocrecom').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('Edit-legis_presprocrecom_span').value =  response.status;
                $('#Edit-loadinglegis_presprocrecom').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/legal_presidentialprocrecom/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  $(document).on('change', '#edit-techcomname', function(e) {
    if(this.options[e.target.selectedIndex].text == "Others"){
      document.getElementById('edit-techcomdiv').style.display="block";
    }else{
      document.getElementById('edit-techcomdiv').style.display="none";
      // document.getElementById('othernipascategory').value="";
    }
  });

  $("#edit-phyquarter").change(function(){
    var output = $('#edit-phyquartersmonth');
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getMonthbyquater/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          qtrid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);

            } else if (data.status == false) {
            output.html(data.message);
            } else {
              output.html(data.message).addClass('text-danger').removeClass('text-success');
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});

function readURLMFOFileEdit(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-mfofile', document.getElementById('edit-mfofile').files[0]);
      }
      var file_details    =   document.getElementById("edit-mfofile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["pdf"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-mfofile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid extension file(*.pdf)','','warning');
        document.getElementById('edit-mfofile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/mfofilesEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-uploadmfofile').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-current_mfofile').value =  response.status;
                $('#edit-uploadmfofile').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/income_mfo_file/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

function calculatephysicalrateEdit() {
  var a, b;
  a = parseFloat(document.getElementById("edit-physicaltarget").value.replace(/,/g, ""));
    if (isNaN(a) == true) {
    a = 0;
  }
  var b = parseFloat(document.getElementById("edit-physicalaccomplishment").value.replace(/,/g, ""));
    if (isNaN(b) == true) {
      b = 0;
  }
  if (b > a) {
    swal('Accomplishement not greater than value to Physical Target','','warning');
    document.getElementById("edit-physicalvariance").value = "";
    document.getElementById("edit-physicalaccomplishment").value = "";
    return 0;
  }else{
    document.getElementById("edit-physicalvariance").value = numberWithCommas(parseFloat(a - b).toFixed());
    return;
  }
}

function UpdatePhysicalReport()
{
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_physicalReport',
    type: "POST",
    data: $('#PhysicalReportForm').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-phyrep').modal('hide');
            fetchphysicalreport();
        }
   });
}

function UpdateActualIncome()
{
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_actualIncome',
    type: "POST",
    data: $('#ActualIncomeform').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-actincome').modal('hide');
            fetchactualincome();
        }
   });
}

// function readURLRAIFileEdit(input) {
//   if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       var formdata = new FormData();
//       formdata.append('edit-riadepositfile', document.getElementById('edit-riadepositfile').files[0]);
//       }
//       var file_details    =   document.getElementById("edit-riadepositfile").files[0];
//       var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
//       var allowed_extension   =   ["pdf"];
//       var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
//       if(file_details['size'] > 419430400)
//       {
//         swal('Please upload a file less than 50 MB','','warning');
//         document.getElementById('edit-riadepositfile').value="";
//         return false;
//       }
//       else if(check_for_valid_ext == -1)
//       {
//         swal('upload valid extension file(*.pdf)','','warning');
//         document.getElementById('edit-riadepositfile').value="";
//         return false;
//       }
//       else
//       {
//         $.ajax({
//             url : BASE_URL + 'pasu/pamain/riafilesEdit',
//             method: 'POST',
//             contentType: false,
//             cache: false,
//             processData: false,
//             data: formdata,
//             dataType: "JSON",
//             beforeSend:function()
//             {
//              $('#edit-uploadriadepositfilefile').html("<div id='loaderss' class='loader'></div>");
//             },
//             success:function(response){
//                 document.getElementById('edit-current_riadepositfile').value =  response.status;
//                 $('#edit-uploadriadepositfilefile').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/ipaf_ria_deposit/'+response.status+'">'+response.status+'</a></div>');
//                 }
//            });
//       }
//   }

//   function readURLSAGFBTRFileEdit(input) {
//   if (input.files && input.files[0]) {
//       var reader = new FileReader();
//       var formdata = new FormData();
//       formdata.append('edit-sagfbtrfile', document.getElementById('edit-sagfbtrfile').files[0]);
//       }
//       var file_details    =   document.getElementById("edit-sagfbtrfile").files[0];
//       var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
//       var allowed_extension   =   ["pdf"];
//       var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
//       if(file_details['size'] > 419430400)
//       {
//         swal('Please upload a file less than 50 MB','','warning');
//         document.getElementById('edit-sagfbtrfile').value="";
//         return false;
//       }
//       else if(check_for_valid_ext == -1)
//       {
//         swal('upload valid extension file(*.pdf)','','warning');
//         document.getElementById('edit-sagfbtrfile').value="";
//         return false;
//       }
//       else
//       {
//         $.ajax({
//             url : BASE_URL + 'pasu/pamain/sagfbtrfilesEdit',
//             method: 'POST',
//             contentType: false,
//             cache: false,
//             processData: false,
//             data: formdata,
//             dataType: "JSON",
//             beforeSend:function()
//             {
//              $('#edit-uploadsagfbtrfilefile').html("<div id='loaderss' class='loader'></div>");
//             },
//             success:function(response){
//                 document.getElementById('edit-current_sagfbtrfile').value =  response.status;
//                 $('#edit-uploadsagfbtrfilefile').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/ipaf_sagf/'+response.status+'">'+response.status+'</a></div>');
//                 }
//            });
//       }
//   }

  $("#edit-phyquarterincome").change(function(){
    var output = $('#edit-phyquartermonth');
    $.ajax({
        url  : BASE_URL+'/pasu/pamain/getMonthbyquater/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          qtrid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              output.html(data.message);

            } else if (data.status == false) {
            output.html(data.message);
            } else {
              output.html(data.message).addClass('text-danger').removeClass('text-success');
            }
          },
          error : function()
          {
            alert('failed');
          }
        });
});

$("#adddonationEdit").click(function(){
    if ($("#edit-ipafdonationselect")[0].selectedIndex <= 0) {
        swal('','Select type of donation',"warning");
    }else{
    $.ajax({
        // url : BASE_URL + 'index.php/pasu/pamain/insertPATenureSAPA',
        url : BASE_URL + 'pasu/pamain/AddDonationEdit',
        type: "POST",
        data: $('#ActualIncomeform').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('',response.status,"success");
            $("#edit-ipafdonationcash").val('');
            $("#edit-ipafinkindbookvalue").val('');
            $("#edit-ipafinkinddesc").val('');
            $("#edit-ipafdonationselect")[0].selectedIndex = 0;
            document.getElementById('edit-donatecashdiv').style.display="none";
            document.getElementById('edit-inkinddiv').style.display="none";
                var codegen = $('#actincome-gencode').val();
                var month = $('#edit-phyquartermonth').val();
                var year = $('#edit-phyquarteryear').val();
                var day = $('#edit-phyquarteday').val();

                $.ajax({
                    type: 'POST',
                    data : {codegens:codegen,month:month,year:year,day:day},
                    url: BASE_URL + 'pasu/pamain/refreshdonationlisted',
                    success:function(response){
                        $('#currentdonationlist').html(response);
                    }
                });
            fetchactualincome();
            }
        }
      });
  }
});

$("#edit-ipafdonationselect").change(function(){
  if (this.value == 1) {
    document.getElementById("edit-donatecashdiv").style.display="block";
    document.getElementById("edit-inkinddiv").style.display="none";
    document.getElementById("edit-ipafdonationcash").value="";
  }else if(this.value == 2){
    document.getElementById("edit-inkinddiv").style.display="block";
    document.getElementById("edit-donatecashdiv").style.display="none";
    document.getElementById("edit-ipafinkindbookvalue").value="";
    document.getElementById("edit-ipafinkinddesc").value="";
  }else{
    document.getElementById("edit-donatecashdiv").style.display="none";
    document.getElementById("edit-inkinddiv").style.display="none";
    document.getElementById("edit-ipafdonationcash").value="";
    document.getElementById("edit-ipafinkindbookvalue").value="";
    document.getElementById("edit-ipafinkinddesc").value="";
  }
});

$("#addotherincomespecifyEdit").click(function(){
    if ($("#edit-ipafincomeotherfee").val()=="") {
        swal('','Input amount for other fees',"warning");
    }else{
    $.ajax({
        // url : BASE_URL + 'index.php/pasu/pamain/insertPATenureSAPA',
        url : BASE_URL + 'pasu/pamain/addOtherfeeS',
        type: "POST",
        data: $('#ActualIncomeform').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('',response.status,"success");
            $("#edit-ipafincomeotherfee").val('');
            $("#edit-ipafincomeotherfee_desc").val('');
                var codegen = $('#actincome-gencode').val();
                var month = $('#edit-phyquartermonth').val();
                var year = $('#edit-phyquarteryear').val();
                var day = $('#edit-phyquarteday').val();
                $.ajax({
                    type: 'POST',
                    data : {codegens:codegen,month:month,year:year,day:day},
                    url: BASE_URL + 'pasu/pamain/refreshincomeotherfee',
                    success:function(response){
                        $('#currentotherincomelist').html(response);
                    }
                });
            fetchactualincome();
            }
        }
      });
  }
});

$("#adddonationothersEdit").click(function(){
    if ($("#edit-ipafotherincomesourcefee").val()=="") {
        swal('','Input amount for other fees',"warning");
    }else{
    $.ajax({
        url : BASE_URL + 'pasu/pamain/addsourceOtherfeeS',
        type: "POST",
        data: $('#ActualIncomeform').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('',response.status,"success");
            $("#edit-ipafotherincomesourcefee").val('');
            $("#edit-ipafotherincomesourcefeespec").val('');
                var codegen = $('#actincome-gencode').val();
                var month = $('#edit-phyquartermonth').val();
                var year = $('#edit-phyquarteryear').val();
                var day = $('#edit-phyquarteday').val();
                $.ajax({
                    type: 'POST',
                    data : {codegens:codegen,month:month,year:year,day:day},
                    url: BASE_URL + 'pasu/pamain/refreshsourceotherfee',
                    success:function(response){
                        $('#currentothersourceincome').html(response);
                    }
                });
            fetchactualincome();
            }
        }
      });
  }
});

$(document).ready(function(){
    $(document).on('click','.removeincomedonations',function(){
        var id  = $(this).data('id');
        var idp = $(this).closest('div').attr('id');
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: BASE_URL+'/pasu/pamain/deleteincomedonation/'+id,
                    type: 'DELETE',
                    data: 'id='+id,
                    dataType: 'json',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                    $("#"+idp).remove();
                    swal("Deleted!", "Your data has been deleted.", "success");
                    var codegen = $('#actincome-gencode').val();
                    var month = $('#edit-phyquartermonth').val();
                    var year = $('#edit-phyquarteryear').val();
                    $.ajax({
                        type: 'POST',
                        data : {codegens:codegen,month:month,year:year},
                        url: BASE_URL + 'pasu/pamain/refreshdonationlisted',
                        success:function(response){
                            $('#currentdonationlist').html(response);
                        }
                    });
                    fetchactualincome();
                  }
                });
            } else {
                swal("Cancelled", "Your data is safe :)", "error");
        }
    });
});
});

$(document).ready(function(){
    $(document).on('click','.removeincomefinespenaltydmgs',function(){
        var id  = $(this).data('id');
        var idp = $(this).closest('div').attr('id');
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: BASE_URL+'/pasu/pamain/deleteincomefinepenaltydmgs/'+id,
                    type: 'DELETE',
                    data: 'id='+id,
                    dataType: 'json',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                    $("#"+idp).remove();
                    swal("Deleted!", "Your data has been deleted.", "success");
                    var codegen = $('#actincome-gencode').val();
                    var month = $('#edit-phyquartermonth').val();
                    var year = $('#edit-phyquarteryear').val();
                    var day = $('#edit-phyquarteday').val();
                    $.ajax({
                        type: 'POST',
                        data : {codegens:codegen,month:month,year:year,day:day},
                        url: BASE_URL + 'pasu/pamain/refreshfinepenaltydmgslisted',
                        success:function(response){
                            $('#penaltydamagefinesdivs').html(response);
                        }
                    });
                    fetchactualincome();
                  }
                });
            } else {
                swal("Cancelled", "Your data is safe :)", "error");
        }
    });
});
});

$(document).ready(function(){
    $(document).on('click','.removeincomeothers',function(){
        var id  = $(this).data('id');
        var idp = $(this).closest('div').attr('id');
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: BASE_URL+'/pasu/pamain/deleteincomeothers/'+id,
                    type: 'DELETE',
                    data: 'id='+id,
                    dataType: 'json',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                    $("#"+idp).remove();
                    swal("Deleted!", "Your data has been deleted.", "success");                    v
                    var codegen = $('#actincome-gencode').val();
                    var month = $('#edit-phyquartermonth').val();
                    var year = $('#edit-phyquarteryear').val();
                    $.ajax({
                        type: 'POST',
                        data : {codegens:codegen,month:month,year:year},
                        url: BASE_URL + 'pasu/pamain/refreshincomeotherfee',
                        success:function(response){
                            $('#currentotherincomelist').html(response);
                        }
                    });
                fetchactualincome();
                  }
                });
            } else {
                swal("Cancelled", "Your data is safe :)", "error");
        }
    });
});
});

$(document).ready(function(){
    $(document).on('click','.removesourceothers',function(){
        var id  = $(this).data('id');
        var idp = $(this).closest('div').attr('id');
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: BASE_URL+'/pasu/pamain/deleteincomesourceothers/'+id,
                    type: 'DELETE',
                    data: 'id='+id,
                    dataType: 'json',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                    $("#"+idp).remove();
                    swal("Deleted!", "Your data has been deleted.", "success");
                    var codegen = $('#actincome-gencode').val();
                    var month = $('#edit-phyquartermonth').val();
                    var year = $('#edit-phyquarteryear').val();
                    $.ajax({
                        type: 'POST',
                        data : {codegens:codegen,month:month,year:year},
                        url: BASE_URL + 'pasu/pamain/refreshsourceotherfee',
                        success:function(response){
                            $('#currentothersourceincome').html(response);
                        }
                    });
                fetchactualincome();
                  }
                });
            } else {
                swal("Cancelled", "Your data is safe :)", "error");
        }
    });
});
});

$(document).ready(function(){
    $(document).on('click','.removehistoryinitialcomp',function(){
        var id = $(this).data('id');
        // var idp = $(this).parent().attr('id');
        var idp = $(this).closest('div').attr('id');
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: BASE_URL+'/pasu/pamain/deleteinitialcomphistory/'+id,
                    type: 'DELETE',
                    data: 'id='+id,
                    dataType: 'json',
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        $("#"+idp).remove();
                        swal("Deleted!", "Your data has been deleted.", "success");
                       // $('#modal-edit-legis').modal('hide');
                       var codegen = $('#legis-gencode2').val();
                       $.ajax({
                           type: 'POST',
                           data : {codegens:codegen},
                           url: BASE_URL + 'pasu/pamain/refreshinitialcomphistory',
                           success:function(response){
                               $('#historyinitialcomp').html(response);
                           }
                       });
                       getTables();
                    }
                    });
            } else {
                swal("Cancelled", "Your data is safe :)", "error");
        }
    });
});
});

$("#addhistoryinitailcompEdit").click(function(){
    // if ($("#edit-ipafotherincomesourcefee").val()=="") {
    //     swal('','Input amount for other fees',"warning");
    // }else{
    $.ajax({
        url : BASE_URL + 'pasu/pamain/addinitialcomphistoryEdit',
        type: "POST",
        data: $('#LegisForm').serialize(),
        dataType: "JSON",
        success:function(response){
          if (response.message == "Add") {
            swal('',response.status,"success");
            $("#edit-history-legisno").val('');
            $("#edit-history-legis_area").val('');
            $("#edit-nipsub_id")[0].selectedIndex = 0;
            $("#edit-previouscat")[0].selectedIndex = 0;
            $("#edit-history-legis_id")[0].selectedIndex = 0;
            $("#edit-history-month")[0].selectedIndex = 0;
            $("#edit-history-day")[0].selectedIndex = 0;
            $("#edit-history-year")[0].selectedIndex = 0;
            document.getElementById("edit-icapadiv").style.display = "none";
              var codegen = $('#legis-gencode2').val();
              $.ajax({
                  type: 'POST',
                  data : {codegens:codegen},
                  url: BASE_URL + 'pasu/pamain/refreshinitialcomphistory',
                  success:function(response){
                      $('#historyinitialcomp').html(response);
                  }
              });
            getTables();
            }
        }
      });
  // }
});
function readURLrecognitionshpfileEdit(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formdata = new FormData();
      formdata.append('edit-recog_shapefile', document.getElementById('edit-recog_shapefile').files[0]);
      }
      var other_data = $('#regFormMain').serializeArray();
        $.each(other_data,function(key,input){
          formdata.append(input.name,input.value);
      });
      var file_details    =   document.getElementById("edit-recog_shapefile").files[0];
      var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
      var allowed_extension   =   ["zip","7z","gz","bz2","rar","tar"];
      var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
      if(file_details['size'] > 419430400)
      {
        swal('Please upload a file less than 50 MB','','warning');
        document.getElementById('edit-recog_shapefile').value="";
        return false;
      }
      else if(check_for_valid_ext == -1)
      {
        swal('upload valid image file(*.zip, *.rar)','','warning');
        document.getElementById('edit-recog_shapefile').value="";
        return false;
      }
      else
      {
        $.ajax({
            url : BASE_URL + 'pasu/pamain/recognitionfileshapeEdit',
            method: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formdata,
            dataType: "JSON",
            beforeSend:function()
            {
             $('#edit-loadingrecog_shapefile').html("<div id='loaderss' class='loader'></div>");
            },
            success:function(response){
                document.getElementById('edit-recog_shapefile_span').value =  response.status;
                $('#edit-loadingrecog_shapefile').html('<div class="col-md-12"><a href="'+BASE_URL+'bmb_assets2/upload/recognition_shapefile/'+response.status+'">'+response.status+'</a></div>');
                }
           });
      }
  }

  function updatebdfeinfor()
{
   $.ajax({
    url : BASE_URL + 'index.php/pasu/pamain/update_bdfeinformation',
    type: "POST",
    data: $('#EditBDFEForms').serialize(),
    dataType: "JSON",
    success:function(response){
            swal({
              title: "Successful Update!",
              text: "Your data has been updated.",
              type: "success",
              showConfirmButton: true,
           });
           $('#modal-edit-bdfeform').modal('hide');
            fetchbdfefile();
        }
   });
}

function edit_ecochk_1() {
  // Get the checkbox
  var checkBox =   document.getElementById("edit-chk_activity1");
  var checkBox2 =  document.getElementById("edit-chk_activity2");
  var checkBox3 =  document.getElementById("edit-chk_activity3");
  var checkBox4 =  document.getElementById("edit-chk_activity4");
  var checkBox5 =  document.getElementById("edit-chk_activity5");
  var checkBox6 =  document.getElementById("edit-chk_activity6");
  var checkBox7 =  document.getElementById("edit-chk_activity7");
  var checkBox8 =  document.getElementById("edit-chk_activity8");
  var checkBox9 =  document.getElementById("edit-chk_activity9");
  var checkBox10 = document.getElementById("edit-chk_activity10");
  var checkBox11 = document.getElementById("edit-chk_activity11");
  var checkBox12 = document.getElementById("edit-chk_activity12");
  var checkBox13 = document.getElementById("edit-chk_activity13");
  var checkBox14 = document.getElementById("edit-chk_activity14");
  var checkBox15 = document.getElementById("edit-chk_activity15");
  // Get the output text
  var text =   document.getElementById("edit-activity1");
  var text2 =  document.getElementById("edit-activity2");
  var text3 =  document.getElementById("edit-activity3");
  var text4 =  document.getElementById("edit-activity4");
  var text5 =  document.getElementById("edit-activity5");
  var text6 =  document.getElementById("edit-activity6");
  var text7 =  document.getElementById("edit-activity7");
  var text8 =  document.getElementById("edit-activity8");
  var text9 =  document.getElementById("edit-activity9");
  var text10 = document.getElementById("edit-activity10");
  var text11 = document.getElementById("edit-activity11");
  var text12 = document.getElementById("edit-activity12");
  var text13 = document.getElementById("edit-activity13");
  var text14 = document.getElementById("edit-activity14");
  var text15 = document.getElementById("edit-activity15");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }

  if (checkBox2.checked == true){
    text2.style.display = "block";
  } else {
    text2.style.display = "none";
  }

  if (checkBox3.checked == true){
    text3.style.display = "block";
  } else {
    text3.style.display = "none";
  }

  if (checkBox4.checked == true){
    text4.style.display = "block";
  } else {
    text4.style.display = "none";
  }

  if (checkBox5.checked == true){
    text5.style.display = "block";
  } else {
    text5.style.display = "none";
  }

  if (checkBox6.checked == true){
    text6.style.display = "block";
  } else {
    text6.style.display = "none";
  }

  if (checkBox7.checked == true){
    text7.style.display = "block";
  } else {
    text7.style.display = "none";
  }

  if (checkBox8.checked == true){
    text8.style.display = "block";
  } else {
    text8.style.display = "none";
  }

  if (checkBox9.checked == true){
    text9.style.display = "block";
  } else {
    text9.style.display = "none";
  }

  if (checkBox10.checked == true){
    text10.style.display = "block";
  } else {
    text10.style.display = "none";
  }

  if (checkBox11.checked == true){
    text11.style.display = "block";
  } else {
    text11.style.display = "none";
  }

  if (checkBox12.checked == true){
    text12.style.display = "block";
  } else {
    text12.style.display = "none";
  }

  if (checkBox13.checked == true){
    text13.style.display = "block";
  } else {
    text13.style.display = "none";
  }

  if (checkBox14.checked == true){
    text14.style.display = "block";
  } else {
    text14.style.display = "none";
  }

  if (checkBox15.checked == true){
    text15.style.display = "block";
  } else {
    text15.style.display = "none";
  }
}


$('#edit-attraction_img_file_1').change(function(){
  var files = $('#edit-attraction_img_file_1')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_1[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_1").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_1').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_1').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_2').change(function(){
  var files = $('#edit-attraction_img_file_2')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_2[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_2").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_2').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_2').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_3').change(function(){
  var files = $('#edit-attraction_img_file_3')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_3[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_3").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_3').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_3').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_4').change(function(){
  var files = $('#edit-attraction_img_file_4')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_4[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_4").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_4').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_4').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_5').change(function(){
  var files = $('#edit-attraction_img_file_5')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_5[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_5").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_5').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_5').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_6').change(function(){
  var files = $('#edit-attraction_img_file_6')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_6[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_6").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_6').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_6').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_7').change(function(){
  var files = $('#edit-attraction_img_file_7')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_7[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_7").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_7').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_7').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_8').change(function(){
  var files = $('#edit-attraction_img_file_8')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_8[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_8").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_8').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_8').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_9').change(function(){
  var files = $('#edit-attraction_img_file_9')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_9[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_9").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_9').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_9').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_10').change(function(){
  var files = $('#edit-attraction_img_file_10')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_10[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_10").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_10').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_10').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_11').change(function(){
  var files = $('#edit-attraction_img_file_11')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_11[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_11").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_11').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_11').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_12').change(function(){
  var files = $('#edit-attraction_img_file_12')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_12[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_12").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_12').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_12').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_13').change(function(){
  var files = $('#edit-attraction_img_file_13')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_13[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_13").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_13').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_13').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_14').change(function(){
  var files = $('#edit-attraction_img_file_14')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_14[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_14").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_14').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_14').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

$('#edit-attraction_img_file_15').change(function(){
  var files = $('#edit-attraction_img_file_15')[0].files;
  var error = '';
  var form_data = new FormData();
  for(var count = 0; count<files.length; count++)
  {
   var name = files[count].name;
   var extension = name.split('.').pop().toLowerCase();
   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
   {
    error += "Invalid " + count + " Image File"
   }
   else
   {
    form_data.append("edit-attraction_img_file_15[]", files[count]);
   }
  }
  var file_details    =   document.getElementById("edit-attraction_img_file_15").files[0];
  var extension       =   file_details['name'].split(/\.(?=[^\.]+$)/);
  var allowed_extension   =   ["png", "jpg", "jpeg"];
  var check_for_valid_ext =   allowed_extension.indexOf(extension[1]);
  if(file_details['size'] > 50097152)
  {
    swal('Please upload a file less than 50 MB','','warning');
    document.getElementById('edit-attraction_img_file_15').value="";
    return false;
  }
  else if(check_for_valid_ext == -1)
  {
    swal('upload valid image file(*.png, *.jpg, *.jpeg)','','warning');
    document.getElementById('edit-attraction_img_file_15').value="";
    return false;
  }
  if(error == '')
  {
 }else{
  alert(error);
  }

 });

function editactivitysave1()
{

var files = $('#edit-attraction_img_file_1')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_1[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_1',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity1').html(data);
   $('#edit-attraction_img_file_1').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave2()
{
 var files = $('#edit-attraction_img_file_2')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_2[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_2',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity2').html(data);
   $('#edit-attraction_img_file_2').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave3()
{
 var files = $('#edit-attraction_img_file_3')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_3[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_3',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity3').html(data);
   $('#edit-attraction_img_file_3').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave4()
{
 var files = $('#edit-attraction_img_file_4')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_4[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_4',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity4').html(data);
   $('#edit-attraction_img_file_4').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave5()
{
 var files = $('#edit-attraction_img_file_5')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_5[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_5',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity5').html(data);
   $('#edit-attraction_img_file_5').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave6()
{
 var files = $('#edit-attraction_img_file_6')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_6[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_6',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity6').html(data);
   $('#edit-attraction_img_file_6').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave7()
{
 var files = $('#edit-attraction_img_file_7')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_7[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_7',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity7').html(data);
   $('#edit-attraction_img_file_7').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave8()
{
 var files = $('#edit-attraction_img_file_8')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_8[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_8',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity8').html(data);
   $('#edit-attraction_img_file_8').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave9()
{
 var files = $('#edit-attraction_img_file_9')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_9[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_9',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity9').html(data);
   $('#edit-attraction_img_file_9').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave10()
{
 var files = $('#edit-attraction_img_file_10')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_10[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_10',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity10').html(data);
   $('#edit-attraction_img_file_10').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave11()
{
 var files = $('#edit-attraction_img_file_11')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_11[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_11',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity11').html(data);
   $('#edit-attraction_img_file_11').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave12()
{
 var files = $('#edit-attraction_img_file_12')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_12[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_12',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity12').html(data);
   $('#edit-attraction_img_file_12').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave13()
{
 var files = $('#edit-attraction_img_file_13')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_13[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_13',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity13').html(data);
   $('#edit-attraction_img_file_13').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave14()
{
 var files = $('#edit-attraction_img_file_14')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_14[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_14',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity14').html(data);
   $('#edit-attraction_img_file_14').val('');
  }
 })
}
else
{
 alert(error);
}
}

function editactivitysave15()
{
 var files = $('#edit-attraction_img_file_15')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#AttractionForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-attraction_img_file_15[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editinsert_activity_15',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
   // $('#upload_img_activity15').html(data);
   $('#edit-attraction_img_file_15').val('');
  }
 })
}
else
{
 alert(error);
}
}

$(document).on('click', '.removeactivityimg1', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr1',
              success:function(data){
                  $('#upload_img_activity1').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg2', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr2',
              success:function(data){
                  $('#upload_img_activity2').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg3', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr3',
              success:function(data){
                  $('#upload_img_activity3').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg4', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr4',
              success:function(data){
                  $('#upload_img_activity4').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg5', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr5',
              success:function(data){
                  $('#upload_img_activity5').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg6', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr6',
              success:function(data){
                  $('#upload_img_activity6').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg7', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr7',
              success:function(data){
                  $('#upload_img_activity7').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg8', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr8',
              success:function(data){
                  $('#upload_img_activity8').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg9', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr9',
              success:function(data){
                  $('#upload_img_activity9').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg10', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr10',
              success:function(data){
                  $('#upload_img_activity10').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg11', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr11',
              success:function(data){
                  $('#upload_img_activity11').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg12', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr12',
              success:function(data){
                  $('#upload_img_activity12').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg13', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr13',
              success:function(data){
                  $('#upload_img_activity13').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg14', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr14',
              success:function(data){
                  $('#upload_img_activity14').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });
$(document).on('click', '.removeactivityimg15', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deleteactivityimg/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#attraction-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchImageAttr15',
              success:function(data){
                  $('#upload_img_activity15').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });

$(document).on('click', '.removefacilityimgmul', function(){
    var id = $(this).data('id');
    swal({
        title: 'Remove from the list?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
    },
    function(){
      $.ajax({
        url: BASE_URL+'/pasu/pamain/deletefacilityimgmulti/'+id,
        type: 'POST',
        data: 'id='+id,
        dataType: 'json',
        success : function(result){
          if (result.status == "success") {
          swal('Removed!', result.message, result.status);
          getTabImageAttr();
          var codegen = $('#facility-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchmultiimageEdit',
              success:function(data){
                  $('#edit-fetch_images_attraction').html(data);
              }
          });
        }else{
          swal('Oops...', 'Something went wrong with ajax !', 'error');
        }
        }
      });
    });
  });


function editsaveMultiImgFacility()
{

var files = $('#edit-facility_img_files')[0].files;
var error = '';
var form_data = new FormData();
  var other_data = $('#FacilityForm').serializeArray();
  $.each(other_data,function(key,input){
      form_data.append(input.name,input.value);
  });
for(var count = 0; count<files.length; count++)
{
 var name = files[count].name;
 var extension = name.split('.').pop().toLowerCase();
 if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
 {
  error += "Invalid " + count + " Image File"
 }
 else
 {
  form_data.append("edit-facility_img_files[]", files[count]);
 }
}
if(error == '')
{
 $.ajax({
  url:BASE_URL+'pasu/pamain/editInsert_FacilityImg',
  method:"POST",
  data:form_data,
  contentType:false,
  cache:false,
  processData:false,
  success:function(data)
  {
    var codegen = $('#facility-gencode2').val();
          $.ajax({
              type: 'POST',
              data : {codegens:codegen},
              url: BASE_URL + 'pasu/pamain/fetchmultiimageEdit',
              success:function(data){
                  $('#edit-fetch_images_attraction').html(data);
              }
          });
   // $('#upload_img_activity1').html(data);
   $('#edit-facility_img_files').val('');
  }
 })
}
else
{
 alert(error);
}
}
</script>
