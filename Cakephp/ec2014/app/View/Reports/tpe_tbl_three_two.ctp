<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>
<h3>Filter Data</h3>
<b>Divn:</b>
<select id="divn_id" name="geo_code_divn">
	<option value="">Please Select</option>
</select>
<b>Zila:</b>
<select id="zila_id" name="geo_code_zila">
	<option value="">Please Select</option>
</select>
<b>Upazila:</b>
<select id="upazila_id" name="geo_code_upazila">
	<option value="">Please Select</option>
</select>
<b>PSA:</b>
<select id="psa_id" name="geo_code_psa">
	<option value="">Please Select</option>
</select>
<b>Union:</b>
<select id="union_id" name="geo_code_union">
	<option value="">Please Select</option>
</select>
<br>
<br>
<hr>
<h3>Search With</h3>
<table style="width: 400px;">
	<tr>
		<td><b>Division:</b></td>
		<td>
		<input type="text" id="divn_text" name="divn_text" value="<?=$divn?>" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td><b>Zila:</b></td>
		<td>
		<input type="text" id="zila_text" name="zila_text" value="<?=$zila?>" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td><b>Upazila:</b></td>
		<td>
		<input type="text" id="upazila_text" name="upazila_text" value="<?=$upazila?>" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td><b>PSA:</b></td>
		<td>
		<input type="text" id="psa_text" name="psa_text" value="<?=$psa?>" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td><b>Union:</b></td>
		<td>
		<input type="text" id="union_text" name="union_text" value="<?=$union?>" readonly="readonly">
		</td>
	</tr>
</table>

<?php echo $this -> Form -> end(__('Submit')); ?>
<br>
<br>
<hr>
<!-- #################################   RESULT SHOW ############################  -->

<?php
if($this -> request -> is('post'))
{
?>

<div id="table_for_print">

	<div class="notice"> </div><br>

	<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">
		<tr>
          <td colspan="7"><b>Table 3.2: Annual Growth Rate of Establishment and Total Persons Engaged (TPE) by Type & Location Between 2001 & 03 and 2013</b></td>
        </tr>
		<tr>
			<td rowspan="2"><strong>Type</strong></td>
			<td colspan="3"><strong>Establishments</strong></td>
			<td colspan="3"><strong>Total Persons Engaged(TPE)</strong></td>
		</tr>

		<tr>
			<td>2001 & 03</td>
			<td>2013</td>
			<td>Growth Rate</td>
			<td>2001 & 03</td>
			<td>2013</td>
			<td>Growth Rate</td>
		</tr>

		<tr>
			<td>1 </td>
			<td>2 </td>
			<td>3 </td>
			<td>4 </td>
			<td>5 </td>
			<td>6 </td>
			<td>7 </td>
		</tr>
<?php 
//  CALCULATION SECTION


$total_urban_est = $total_urban_parmanent_est + $total_urban_temporary_est + $total_urban_household_est;
$total_urban_est_person = $total_urban_parmanent_est_person + $total_urban_temporary_est_person + $total_urban_household_est_person;

$total_rural_est = $total_rural_parmanent_est + $total_rural_temporary_est + $total_rural_household_est;
$total_rural_est_person = $total_rural_parmanent_est_person + $total_rural_temporary_est_person + $total_rural_household_est_person;



# TOTAL SECTION ESTAB

$total_parmanent_est = $total_urban_parmanent_est + $total_rural_parmanent_est;
$total_temporary_est = $total_urban_temporary_est + $total_rural_temporary_est;
$total_household_est = $total_urban_household_est + $total_rural_household_est;

$total_est = $total_parmanent_est+ $total_temporary_est + $total_household_est;

# TOTAL SECTION TPE:


$total_parmanent_est_person = $total_urban_parmanent_est_person + $total_rural_parmanent_est_person;
$total_temporary_est_person = $total_urban_temporary_est_person + $total_rural_temporary_est_person;
$total_household_est_person = $total_urban_household_est_person + $total_rural_household_est_person;

$total_est_person =  $total_parmanent_est_person + $total_temporary_est_person + $total_household_est_person;




 ?>
		<!-- ONE -->
		<tr>
			<td><strong>Total</strong></td>
			<td></td>
			<td><?= $total_est; ?> </td>
			<td></td>
			<td></td>
			<td><?= $total_est_person ?></td>
			<td> </td>

		</tr>

		<tr>
			<!-- Permanent -->
			<td>Permanent</td>
			<td></td>
			<td> <?= $total_parmanent_est;?>  </td>
			<td></td>
			<td></td>
			<td><?= $total_parmanent_est_person;?></td>
			<td></td>
		</tr>

		<tr>
			<!-- Temporary -->
			<td>Temporary</td>
			<td></td>
			<td><?= $total_temporary_est; ?></td>
			<td></td>
			<td> </td>
			<td><?= $total_temporary_est_person; ?></td>
			<td></td>

		</tr>

		<tr>
			<!-- Household -->
			<td>Economic Household</td>
			<td></td>
			<td><?= $total_household_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_household_est_person; ?></td>
			<td></td>
		</tr>

		<!-- TWO -->

		<tr>
			<!-- Total -->
			<td><strong>Urban</strong></td>
			<td></td>
			<td><?= $total_urban_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_urban_est_person; ?></td>
			<td></td>
		</tr>

		<tr>
			<!-- Permanent -->
			<td>Permanent</td>  
			<td></td>
			<td><?= $total_urban_parmanent_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_urban_parmanent_est_person; ?></td>
			<td></td>

		</tr>

		<tr>
			<!-- Temporary -->
			<td>Temporary</td>
			<td></td>
			<td><?= $total_urban_temporary_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_urban_temporary_est_person; ?></td>
			<td></td>
		</tr>

		<tr>
			<!-- Household -->
			<td>Economic Household</td>
			<td></td>
			<td><?= $total_urban_household_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_urban_household_est_person; ?></td>
			<td></td>
		</tr>

		<!-- THREE_rural -->
		<tr>
			<!-- Total -->

			<td><strong>Rural</strong></td>
			<td></td>
			<td><?= $total_rural_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_rural_est_person; ?></td>
			<td></td>
		</tr>

		<tr>
			<!-- Permanent -->
			<td>Permanent</td>
			<td ></td>
			<td><?= $total_rural_parmanent_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_rural_parmanent_est_person; ?></td>
			<td></td>
		</tr>

		<tr >
			<!-- Temporary -->
			<td>Temporary</td>
			<td></td>
			<td><?= $total_rural_temporary_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_rural_temporary_est_person; ?></td>
			<td></td>
		</tr>

		<tr>
			<!-- Household -->
			<td>Economic Household</td>
			<td></td>
			<td><?= $total_rural_household_est; ?></td>
			<td></td>
			<td></td>
			<td><?= $total_rural_household_est_person; ?></td>
			<td></td>
		</tr>

	</table>
	<br><div class="notice"> </div>
</div>
<br>
<br>
<div class="submit">
	<input type="button" value="Print" id="print_btn">
	<input type="button" value="Export to Excel" id="export_to_excel">
</div>

<!-- GRAPH CONTAINER -->
<br><br>
<div id="graph_report" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



<?php } ?>

<br>
<br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>
<?php echo $this -> Html -> script('highchart/highcharts'); ?>
<?php echo $this -> Html -> script('highchart/exporting'); ?>

<!-- High Chart -->

<script>

$(document).ready(function() {
  $.ajax({
    url : path_load + "/Reports/tpe_tbl_three_two_ajax",
    type : "POST",
    dataType : "json",
    cache : false,
    success : function(data) {
      
      if (data === "false") {
        return;
      }
      var est_03 = new Array();
      var est_13 = new Array();

      est_03.push(parseInt(data.total_est_2003));
      est_03.push(parseInt(data.total_urban_est_2003));
      est_03.push(parseInt(data.total_rural_est_2003));

      est_13.push(parseInt(data.total_est_2013));
      est_13.push(parseInt(data.total_urban_est_2013));
      est_13.push(parseInt(data.total_rural_est_2013));

      make_graph(est_03, est_13);
    }
  });
});

function make_graph(est_03, est_13) {
    $('#graph_report').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Spread of establishments by locality, 2001 & 2003 and 2013'
        },
        subtitle: {
            text: 'Table 3.2: Annual growth rate of establishments and total persons engaged (TPE) by type & location between 2001 & 03 and 2013'
        },
        xAxis: {
            categories: [
                'Total',
                'Urban',
                'Rural',
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{
            name: '2001 & 2003',
            data: est_03

        }, {
            name: '2013',
            data: est_13

        }]
    });
}
</script>





