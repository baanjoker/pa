
<div class="row">
    <div class="col-xs-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="container hidden"><h1>List of Protected Area</h1></div>   
                <div class="container hidden">Total no. of Protected Area : (<?php echo $countPa; ?>)</div>                  
                <div class="row clearfix">
                    <?php foreach ($pamain as $datas): ?>        
                    <div class="col-xs-12" >
                      <!-- <div ></div> -->
                      <table class="content-table">
                        <thead id="displayPAHead"></thead>
                        <tbody id="displayPA"></tbody>
                      </table>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" data-backdrop="static" id="myModalUpdates" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Changelog</h4>
            </div>
            <div class="modal-body" >
                <div class="message  message--success">
                  <div class="message-gap">
                    <em>May 21, 2022</em>
                    <p>BIOLOGICAL FEATURES - FAUNA AND FLORA</p>
                     <ol>
                      <li>Estimated Population</li>
                      <ul>
                        <li>Month and Year are required.</li>
                        <li>Activity/Monitoring type</li>
                        <li>Estimated Population</li>
                        <li>Remarks</li>
                      </ul>
                    </ol>
                  </div>
                  <div class="message-gap">
                    <p>MANAGEMENT BOARD – MEMBERS</p>
                     <ol>
                      <li>Appointment type if select ex-officio</li>
                      <ul>
                        <li>Added checkbox for co-chair</li>
                        <li>First name, Middle name, Last name, and Suffix</li>
                        <li>Designation/position</li>
                        <li>Sex</li>
                        <li>Landline no.</li>
                        <li>Mobile no.</li>
                      </ul>
                    </ol>
                  </div>
                  <div class="message-gap">
                    <p>PHYSICAL FEATURES – HYDROLOGY</p>
                     <ol>
                      <li>If Water body classification and usage of marine waters selected added water quality field</li>
                      <ul>
                        <li>Date of monitoring report(month/day/year)</li>
                        <li>Upload map images of monitoring site</li>
                        <li>Upload Shapefile of monitoring site</li>
                        <li>Uploading monitoring report file</li>
                        <li>Status (Passed/Failed)</li>
                        <li>Parameters of water quality</li>
                        <li>Remarks</li>
                      </ul>
                    </ol>
                  </div>
                </div>
                <div class="message  message--success">
                  <div class="message-gap">
                    <em>May 22, 2022</em>
                    <p>SOCIO-ECONOMIC AND CULTURAL FEATURES</p>
                     <ol>
                      <li>Socio-Economic tab -> Biodiversity-friendly enterprise (BDFE) tab</li>
                      <ul>
                        <li>For the name of PO added contact details (Landline no./Mobile no./Email address)</li>
                        <li>Under Enhancement included sex disaggregation data for technical assistance</li>   
                      </ul> 
                      <li>Socio-Economic - Demographic Information (SRPAO)</li>  
                      <ul>
                        <li>Add checkbox titled lands</li>
                        <li>Add checkbox if Alienable and Disposable (A&D) and within or outside titled land</li>
                      </ul>     
                    </ol>
                  </div>
                  <div class="message-gap">
                    <p>INTEGRATED PROTECTED AREA FUND (IPAF)</p>
                     <ol>
                      <li>Actual Income tab –> Certificate tab</li>
                      <ul>
                        <li>Change weekly into custom date for uploading certificate of SAGF btr and RIA deposit slip</li>                        
                      </ul>
                    </ol>
                  </div>
                </div>
                <!-- <div class="message  message--error">
                  <p style="margin-left: 30px">Pastrami biltong sirloin alcatra ham hock ball tip short ribs tail chuck. Brisket turkey bacon ham porchetta ball tip. Andouille kielbasa pork loin turkey.</p>
                </div>

                <div class="message  message--warning">
                  <p>Pastrami fatback frankfurter ground round pork belly. Meatloaf landjaeger boudin pork strip steak. Bresaola tail capicola, salami landjaeger jerky pork loin tenderloin bacon filet mignon.</p>
                </div> -->

                

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script type="text/javascript">
    $("#paid").change(function(){
    var year_list = $('#yearid');
    $.ajax({
        url  : BASE_URL+'pasu/dashboard/getYear/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          paid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              year_list.html(data.message);                       
            } else if (data.status == false) {
              year_list.html('');             
            } else {
              year_list.html('');          
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$("#selectYear").change(function(){
    var duration = $('#durationid');    
    $.ajax({
        url  : BASE_URL+'pasu/dashboard/getYearadd/',
        type : 'post',
        dataType : 'JSON',
        data : {'<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
                selectYear : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              duration.html(data.lists);                       
            } else if (data.status == false) {
              duration.html('');             
            } else {
              duration.html('');          
            }
          }, 
          error : function()
          {
            alert('failed');
          }
    });
});

$("#paids").change(function(){
    var year_list = $('#yearids');
    $.ajax({
        url  : BASE_URL+'pasu/dashboard/getYear/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          paid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              year_list.html(data.message);                       
            } else if (data.status == false) {
              year_list.html('');             
            } else {
              year_list.html('');          
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

$("#pavisit").change(function(){
    var year_list = $('#visityear');
    $.ajax({
        url  : BASE_URL+'pasu/dashboard/getYearaddvisitor/',
        type : 'post',
        dataType : 'JSON',
        data : {
          '<?= $this->security->get_csrf_token_name(); ?>' : '<?= $this->security->get_csrf_hash(); ?>',
          paid : $(this).val()},
          success : function(data)
          {
            if (data.status == true) {
              year_list.html(data.message);                       
            } else if (data.status == false) {
              year_list.html('');             
            } else {
              year_list.html('');          
            }
          }, 
          error : function()
          {
            alert('failed');
          }
        });
});

</script>

                
<!-- <script src="<?php echo base_url().'assets/'; ?>dist/js/chart/chart-area-demo.js"></script> -->
