<?php 
$year_monitoring = array(
	'name'	=>	'year_monitoring',
	'class'	=>	'form-control',
	'placeholder'	=>	'Year'
);
$month_monitoring = array(
	'name'	=>	'month_monitoring',
	'class'	=>	'form-control',
	'placeholder'	=>	'Month'
);
$local_male = array(
	'name'	=>	'local_male',
	'class'	=>	'form-control calc_local calc_male g_total',
	'placeholder'	=>	'Local Male'
);
$local_female = array(
	'name'	=>	'local_female',
	'class'	=>	'form-control calc_local calc_female g_total',
	'placeholder'	=>	'Local Female'
);
$foreign_male = array(
	'name'	=>	'foreign_male',
	'class'	=>	'form-control calc_foreign calc_male g_total',
	'placeholder'	=>	'Foreign Male'
);
$foreign_female = array(
	'name'	=>	'foreign_female',
	'class'	=>	'form-control calc_foreign calc_female g_total',
	'placeholder'	=>	'Foreign Female'
);
$entrancefee = array(
	'name'	=>	'entrancefee',
	'class'	=>	'form-control total_income',
	'placeholder'	=>	'Entrance Fee Income',
	'id'	=>	'entrance'
);
$parkingfee = array(
	'name'	=>	'parkingfee',
	'class'	=>	'form-control total_income',
	'placeholder'	=>	'Parking Fee Income',
	'id'	=>	'parking'
);
$rentalsfee = array(
	'name'	=>	'rentalsfee',
	'class'	=>	'form-control total_income',
	'placeholder'	=>	'Rentals Fee Income',
	'id'	=>	'rentals'
);
$otherfee = array(
	'name'	=>	'otherfee',
	'class'	=>	'form-control total_income',
	'placeholder'	=>	'Other Income',
	'id'	=>	'other'
);
?>
<div class="tab-pane" id="rentals">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading"><div class="panel-title"><i class="fas fa-handshake"></i> MONITORING OF VISITORS</div></div>
				<div class="panel-body">
				    <div class="col-md-12">

				    	<?php echo form_hidden('id_rate'); ?>
				    	<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    		<tr valign="top" class="spaceUnder spaceOver">
				    			<td style="width: 100px">Date Monitoring : </td>
				    			<td><?php echo form_dropdown($month_monitoring,$monthList,'','class="form-control" id="monitor_month"'); ?></td>
				    			<td><?php echo form_dropdown($year_monitoring,$yearList,'','class="form-control" id="monitor_year"'); ?></td>
				    		</tr>				    		
				    	</table>
				    	<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    		<tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3"><label>Number of Visitors</label></div>				    		
				    			<td style="width: 100px;">Local Male : </td>
				    			<td><?php echo form_input($local_male); ?></td>				    			
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<td>Local Female : </td>
				    			<td><?php echo form_input($local_female); ?></td>
				    		</tr>				    		
				    		<tr valign="top" class="spaceUnder">
				    			<td>Foreign Male : </td>
				    			<td><?php echo form_input($foreign_male); ?></td>
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<td>Foreign Female : </td>
				    			<td><?php echo form_input($foreign_female); ?></td>
				    		</tr>				    		
				    	</table>
				    	<table width="100%" border="1" cellpadding="3" cellspacing="1" class="table4">
				    		<tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3"><label>Total Visitors</label></div>
				    			<td style="width: 120px">Total Local Visitors</td>
				    			<td style="width: 200px"><div style="text-align: center;color:red;font-size: 15px;"> <span id="total_local"></span></div></td>
				    			<td style="width: 120px">Total Male Visitors</td>
				    			<td style="width: 200px"><div style="text-align: center;color:red;font-size: 15px;"> <span id="total_male"></span></div></td>
				    		</tr>
				    		<tr valign="top" class="spaceUnder spaceOver">
				    			<td>Total Foreign Visitors</td>
				    			<td><div style="text-align: center;color:red;font-size: 15px;"> <span id="total_foreign"></span></div></td>
				    			<td>Total Female Visitors</td>
				    			<td><div style="text-align: center;color:red;font-size: 15px;"> <span id="total_female"></span></div></td>
				    		</tr>
				    		<tr valign="top">
				    			<td style="font-size: 24px;color: red;">GRAND TOTAL</td>
				    			<td colspan="3"><div style="text-align: center;color:red;font-size: 24px;"> <span id="gtotal"></span></div></td>
				    		</tr>
				    	</table>
				    	<br>
				    	<table width="100%" border="0" cellpadding="3" cellspacing="1" class="table4">
				    		<tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3"><label>Income Generated</label></div>
				    			<td style="width: 100px">Entrance fee : </td>
				    			<td><?php echo form_input($entrancefee); ?></td>	
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<td>Parking fee : </td>
				    			<td><?php echo form_input($parkingfee); ?></td>
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<td>Rentals fee : </td>
				    			<td><?php echo form_input($rentalsfee); ?></td>
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<td>Other fee : </td>
				    			<td><?php echo form_input($otherfee); ?></td>
				    		</tr>
				    	</table>
				    	<table width="100%" border="1" cellpadding="3" cellspacing="1" class="table4">
				    		<tr valign="top" class="spaceUnder spaceOver"><div style="background-color: #ffd9b3"><label>Total Income Generated</label></div>
				    			<td>Sub-IPAF : </td>
				    			<td colspan="3"><div style="text-align: center;color:red;font-size: 15px;">P<span id="gtotal_sub"></span></div></td>
				    		</tr>
				    		<tr valign="top" class="spaceUnder">
				    			<td>Central IPAF : </td>
				    			<td colspan="3"><div style="text-align: center;color:red;font-size: 15px;">P<span id="gtotal_central"></span></div></td>
				    		</tr>
				    		<tr valign="top">
				    			<td style="font-size: 24px;color: red;">GRAND TOTAL INCOME</td>
				    			<td colspan="3"><div style="text-align: center;color:red;font-size: 24px;">P<span id="gtotal_income"></span></div></td>
				    		</tr>
				    	</table>
				    	<br>
				    	<div id="incomeDiv" class="alert text-center" style="display:none;">
			    			<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
			    			<span style="color:#000" id="incomeMessage"></span>
			    		</div>
				    	<div>
				    	 <button type="button" name="btnbiological" onclick="insert_income()" id="id_rate" class="btn btn-success  btn-flat"><i class="fa fa-angle-double-down"> Add to list</i></button>
				    	</div>
				    	<br>
				    	<div class="table-responsive">
					    	<table id="tablefee" class="table table-hover" style="border: 1px solid black;">
								<thead>
									<tr style="background-color:#ffd9b3;">
										<th>Dated</th>
										<th>Local Visitors</th>
										<th>Foreign Visitors</th>
										<th>Income</th>
										<th>Total</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody id="tbodyfee"></tbody>
							</table>
						</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
    $('.calc_local').change(function(){
        var total = 0;
        $('.calc_local').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total_local').html(total);
    });

       $('.calc_foreign').change(function(){
        var total = 0;
        $('.calc_foreign').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total_foreign').html(total);
    });

       $('.calc_male').change(function(){
        var total = 0;
        $('.calc_male').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total_male').html(total);
    });

       $('.calc_female').change(function(){
        var total = 0;
        $('.calc_female').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total_female').html(total);
    });

    $('.g_total').change(function(){
        var total = 0;
        $('.g_total').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#gtotal').html(total);
    });

    $('.total_income').change(function(){
        var total = 0;

        $('.total_income').each(function(){
            if($(this).val() != '')
            {
              if(!isNaN(this.value) && this.value.length!=0) {
                total += parseFloat($(this).val());
            }
                // sub += (Math.floor((number1 / number2) * 100));
            }
        });
        $('#gtotal_income').html(addCommas(total.toFixed(2)));
    });

    $('.total_income').change(function(){
        var total = 0;

        $('.total_income').each(function(){
            if($(this).val() != '')
            {
              if(!isNaN(this.value) && this.value.length!=0) {
                total += (parseFloat($(this).val())*0.75);
            }
                // sub += (Math.floor((number1 / number2) * 100));
            }
        });
        $('#gtotal_sub').html(addCommas(total.toFixed(2)));
    });

    $('.total_income').change(function(){
        var total = 0;

        $('.total_income').each(function(){
            if($(this).val() != '')
            {
              if(!isNaN(this.value) && this.value.length!=0) {
                total += (parseFloat($(this).val())*0.25);
            }
                // sub += (Math.floor((number1 / number2) * 100));
            }
        });
        $('#gtotal_central').html(addCommas(total.toFixed(2)));
    });


})(jQuery);

function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
} 
</script>