<div class="col-md-12 col-xs-12 col-lg-12">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <fieldset>
            <div class="card-content" style="margin: 12px 12px 12px 12px;">
                <center><h1>Income Report</h1></center>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <?php echo form_label('Select Protected Area').form_dropdown('paid',$paList,'','class="form-control border-input" id="paid"') ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?php echo form_label('Select Year').form_dropdown('yearid','','','class="form-control border-input" id="yearid"') ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?php echo form_label('&nbsp;')?><br><a type="text" class="btn btn-primary" id="display"><i class="ti-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart" width="600" height="350"></canvas>
                </div>
            </div>
            </fieldset>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12">            
        <div class="card">
            <fieldset>
            <div class="card-content" style="margin: 12px 12px 12px 12px;">
                <center><h1>PA Income Quarterly Report</h1></center>
                <hr>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <?php echo form_label('Select Protected Area').form_dropdown('paids',$paList,'','class="form-control border-input" id="paids"') ?>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <?php echo form_label('Select Year').form_dropdown('yearids','','','class="form-control border-input" id="yearids"') ?>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <?php echo form_label('Quarter').form_dropdown('quarter',$quarter,'','class="form-control border-input" id="quarter"') ?>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <?php echo form_label('&nbsp;')?><br><a type="text" class="btn btn-primary" id="displays"><i class="ti-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="mypaIncomeChart" width="600" height="350"></canvas>
                </div>
            </div>
            </fieldset>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <fieldset>
                <div class="card-content" style="margin: 12px 12px 12px 12px;">
                    <center><h1>Annual income</h1></center><hr>
                    <div class="row"> 
                        <div class="col-lg-6 col-sm-6">
                            <?php echo form_label('Select Protected Area').form_dropdown('paid2',$paList,'','class="form-control border-input" id="paid2"') ?>
                        </div>                      
                        <div class="col-lg-2 col-sm-2">
                            <?php echo form_label('Select Year').form_dropdown('selectYear',$yearListed,'','class="form-control border-input" id="selectYear"') ?>
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <?php echo form_label('Duration').form_dropdown('durationid','','','class="form-control border-input" id="durationid"') ?>
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <?php echo form_label('&nbsp;')?><br><a type="text" class="btn btn-primary" id="displayannual"><i class="ti-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAnnualChart" width="600" height="350"></canvas>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
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
<script src="<?php echo base_url().'assets/'; ?>dist/js/chart/chart-area-demo.js"></script>
