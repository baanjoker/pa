
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
