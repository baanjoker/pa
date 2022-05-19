    function getMe(){
        var token       =   '<?php echo $this->security->get_csrf_token_name(); ?>';
        var hash        =   '<?php echo $this->security->get_csrf_hash(); ?>';
        var url         =   '<?php echo base_url(); ?>';
        var cfield1     =   $('#c_field1').val();
        var ccomp1      =   $('#comparison1').val();
        var cvalue1     =   $('#c_value1').val();
        var cfield2     =   $('#c_field2').val();
        var ccomp2      =   $('#comparison2').val();
        var cvalue2     =   $('#c_value2').val();
        var candor2     =   $('#comparisonandor2').val();
        var cfield3     =   $('#c_field3').val();
        var ccomp3      =   $('#comparison3').val();
        var cvalue3     =   $('#c_value3').val();
        var candor3     =   $('#comparisonandor3').val();
        var sortby      =   $('#c_field4').val();
        var orderby     =   $('#orderby').val();
        $.ajax({
            type: 'POST',
            data: 
                {
                cfield1:cfield1,
                ccomp1:ccomp1,
                cvalue1:cvalue1,
                cfield2:cfield2,
                ccomp2:ccomp2,
                cvalue2:cvalue2,
                candor2:candor2,
                cfield3:cfield3,
                ccomp3:ccomp3,
                cvalue3:cvalue3,
                candor3:candor3,
                hash:token,
                orderby:orderby,
                sortby:sortby,
                },
            url : BASE_URL + 'index.php/report/cave_report/resultsearch',
            success:function(response){
                $('#tbodycavefilter').html(response);
            }
        });
    }

function getMeWetland(){
        var token       =   '<?php echo $this->security->get_csrf_token_name(); ?>';
        var hash        =   '<?php echo $this->security->get_csrf_hash(); ?>';
        var url         =   '<?php echo base_url(); ?>';
        var cfield1     =   $('#c_field1').val();
        var ccomp1      =   $('#comparison1').val();
        var cvalue1     =   $('#c_value1').val();
        var cfield2     =   $('#c_field2').val();
        var ccomp2      =   $('#comparison2').val();
        var cvalue2     =   $('#c_value2').val();
        var candor2     =   $('#comparisonandor2').val();
        var cfield3     =   $('#c_field3').val();
        var ccomp3      =   $('#comparison3').val();
        var cvalue3     =   $('#c_value3').val();
        var candor3     =   $('#comparisonandor3').val();
        var sortby      =   $('#c_field4').val();
        var orderby     =   $('#orderby').val();
        $.ajax({
            type: 'POST',
            data: 
                {
                cfield1:cfield1,
                ccomp1:ccomp1,
                cvalue1:cvalue1,
                cfield2:cfield2,
                ccomp2:ccomp2,
                cvalue2:cvalue2,
                candor2:candor2,
                cfield3:cfield3,
                ccomp3:ccomp3,
                cvalue3:cvalue3,
                candor3:candor3,
                hash:token,
                orderby:orderby,
                sortby:sortby,
                },
            url : BASE_URL + 'index.php/report/wetland_report/resultsearch',
            success:function(response){
                $('#tbodywetlandfilter').html(response);
            }
        });
    }

function getMewaterfowl(){
        var token       =   '<?php echo $this->security->get_csrf_token_name(); ?>';
        var hash        =   '<?php echo $this->security->get_csrf_hash(); ?>';
        var url         =   '<?php echo base_url(); ?>';
        var cfield1     =   $('#c_field1').val();
        var ccomp1      =   $('#comparison1').val();
        var cvalue1     =   $('#c_value1').val();
        var cfield2     =   $('#c_field2').val();
        var ccomp2      =   $('#comparison2').val();
        var cvalue2     =   $('#c_value2').val();
        var candor2     =   $('#comparisonandor2').val();
        var cfield3     =   $('#c_field3').val();
        var ccomp3      =   $('#comparison3').val();
        var cvalue3     =   $('#c_value3').val();
        var candor3     =   $('#comparisonandor3').val();
        var sortby      =   $('#c_field4').val();
        var orderby     =   $('#orderby').val();
        $.ajax({
            type: 'POST',
            data: 
                {
                cfield1:cfield1,
                ccomp1:ccomp1,
                cvalue1:cvalue1,
                cfield2:cfield2,
                ccomp2:ccomp2,
                cvalue2:cvalue2,
                candor2:candor2,
                cfield3:cfield3,
                ccomp3:ccomp3,
                cvalue3:cvalue3,
                candor3:candor3,
                hash:token,
                orderby:orderby,
                sortby:sortby,
                },
            url : BASE_URL + 'index.php/report/waterfowl_report/resultsearch',
            success:function(response){
                $('#tbodywaterfilter').html(response);
            }
        });
    }
