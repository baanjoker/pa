<div id="mapimge" class="tab-pane">
    <div class="form-style-6">
        <h2>Map Image</h2>
        <div class="col-xs-12  ">
            <div class="col-xs-12 ">
                <div class="col-xs-12 col-lg-12">
                    <div id="fetch_images_maps"></div>
                </div>
                <div class="col-xs-12 col-lg-12 ">
                    <label>Upload images <i>(*.png, *.jpeg, *.jpg format, maximum size of 50MB)</i></label>
                    <input type='file' name="picture2" id="picture2" /><br>
                    <input type="hidden" name="imagemaplast_txt" id="imagemaplast_txt" /> 
                    <span id="img_output_map" class="img_output_map hide"></span>
                </div>
                <div class="col-xs-12 col-lg-12">
                    <fieldset>
                        <label>Upload Shapefile <i>(*.zip  format, maximum size of 200MB)</i></label>
                        <input type='file' name="shp_othermap" id="shp_othermap" onchange="readURLshapefileothermap(this);" />
                        <input type="hidden" name="shp_othermap_txt" id="shp_othermap_txt">
                        <div id="fetch_othermap_shpfile"></div>
                    </fieldset> 
                </div>
                <div class="col-xs-12 col-lg-12 tooltip">
                    <ul><li>
                        <?= form_label('Map description','','for="remarks_image"').form_textarea('remarks_image','','placeholder="Brief description" id="remarks_image" style="height:250px;"');?>
                        <span class="tooltiptext">Information of the map which includes but not limited to title, summary/description, author, source and date modified</span>
                    </li></ul>
                </div>
            </div>
            <div class="col-xs-12">
                <a type="text" id="addimagemap" class="btn btn-primary">Add data</a>
            </div>
            <div class="col-xs-12 ">   
                <div class="table-responsive large-tables"><br>
                    <table id="tableimage" class="content-table">
                        <thead>
                            <tr>
                                <th colspan="3" style="text-align: center; font-size: 24px">Map Image</th>
                            </tr>                           
                        </thead>
                        <tbody id="tbodyimage">
                        </tbody>
                    </table>                   
                </div>                            
            </div>      
        </div>
    </div>
</div>