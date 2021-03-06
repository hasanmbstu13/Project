<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>
<h3>Filter Data</h3>
<b>Divn:</b><select id="divn_id" name="geo_code_divn"><option value="">Please Select</option></select>
<b>Zila:</b><select id="zila_id" name="geo_code_zila"><option value="">Please Select</option></select>
<b>Upazila:</b><select id="upazila_id" name="geo_code_upazila"><option value="">Please Select</option></select>
<b>PSA:</b><select id="psa_id" name="geo_code_psa"><option value="">Please Select</option></select>
<b>Union:</b><select id="union_id" name="geo_code_union"><option value="">Please Select</option></select>
<br><br>
<hr>
<h3>Search With</h3>
<table style="width: 400px;">
	<tr>
		<td><b>Division:</b></td>
		<td><input type="text" id="divn_text" name="divn_text" value="<?=$divn?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td><b>Zila:</b></td>
		<td><input type="text" id="zila_text" name="zila_text" value="<?=$zila?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td><b>Upazila:</b></td>
		<td><input type="text" id="upazila_text" name="upazila_text" value="<?=$upazila?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td><b>PSA:</b></td>
		<td><input type="text" id="psa_text" name="psa_text" value="<?=$psa?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td><b>Union:</b></td>
		<td><input type="text" id="union_text" name="union_text" value="<?=$union?>" readonly="readonly"></td>
	</tr>
</table>


<?php echo $this -> Form -> end(__('Submit')); ?>    
<br><br>
<hr>
<!-- #################################   RESULT SHOW ############################  -->

<?php 
if($this -> request -> is('post'))
{
?>

<div id="table_for_print">

  <div class="notice">  
  The data presented in this chapter include all non-farm activity organized in three types (structures) of establishments namely permanent, temporary and household premise based establishments and are drawn from the detailed table -1. Data on establishments and TPE re also provided by locality namely namely for urban and rural areas. The concepts and definitions are given in chapter 2. The table below gives a summary view of non farm establishments both by structure and locality with persons engaged by sex and their percentage distributions.
  </div><br>

 <table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">
        <tr>
          <td colspan="9"><b>Table 3.1: Total establishments by type & location and total persons engaged (TPE) by sex, 2013</b></td>
        </tr>

        <tr>
            <td rowspan="2"><strong>Type</strong></td>
            <td colspan="2"><strong>Establishments</strong></td>
            <td colspan="6"><strong>Total persons engaged (TPE)</strong></td>
        </tr>

        <tr style='height:.1in'>
            <td>Total</td>
            <td>%</td>
            <td>Total</td>
            <td>% </td>
            <td>Male</td>
            <td>%</td>
            <td>Female</td>
            <td>%</td>
        </tr>

        <tr>
            <td>1 </td>
            <td>2 </td>
            <td>3 </td>
            <td>4 </td>
            <td>5 </td>
            <td>6 </td>
            <td>7 </td>
            <td>8 </td>
            <td>9 </td>
        </tr>

<?php 

     #TOTAL PERMANENT
     #total_parmanent_est
     $parmanent_percent_total_est = round((( ($total_parmanent_est*1.007)/$total_est ) * 100), 2);
     #total_parmanent_est_person
     $parmanent_percent_person_total = round((( ($total_parmanent_est_person*1.007)/$total_est_person ) * 100), 2);
     #total_parmanent_est_male
     $parmanent_percent_person_male = round((( ($total_parmanent_est_male*1.007)/$total_est_male ) * 100), 2);
     #total_parmanent_est_female
     $parmanent_percent_person_female = round((( ($total_parmanent_est_female*1.007)/$total_est_female ) * 100), 2);


     # TOTAL TEMPORARY
     #total_temporary_est
     $temporary_percent_total_est = round((( ($total_temporary_est*1.007)/$total_est ) * 100), 2);
     #total_temporary_est_person
     $temporary_percent_person_total = round((( ($total_temporary_est_person*1.007)/$total_est_person ) * 100), 2);
     #total_temporary_est_male
     $temporary_percent_person_male = round((( ($total_temporary_est_male*1.007)/$total_est_male ) * 100), 2);
     #total_temporary_est_female
     $temporary_percent_person_female = round((( ($total_temporary_est_female*1.007)/$total_est_female ) * 100), 2);


     # TOTAL HOUSEHOLD

     #total_household_est
     $household_percent_total_est = round((( ($total_household_est*1.007)/$total_est ) * 100), 2);
     #total_household_est_person
     $household_percent_person_total = round((( ($total_household_est_person *1.007)/$total_est_person ) * 100), 2);
     #total_household_est_male
     $household_percent_person_male = round((( ($total_household_est_male*1.007)/$total_est_male ) * 100), 2);
     #total_household_est_female
     $household_percent_person_female = round((( ($total_household_est_female*1.007)/$total_est_female ) * 100), 2);


    #URBAN TOTAL------------------------------------------------------------------------------------------
     $urban_percent_total_est = round(((  ($total_urban_est*1.007)/$total_est) * 100), 2);
     
     $urban_percent_person_total = round((( ($total_urban_est_person*1.007)/$total_est_person ) * 100), 2);
     
     $urban_percent_person_male = round((( ($total_urban_est_male*1.007)/$total_est_male ) * 100), 2);
    
     $urban_percent_person_female = round((( ($total_urban_est_female*1.007)/$total_est_female ) * 100), 2);

     #URBAN PERMANENT
     $urban_permanent_percent_total_est = round((( ($total_urban_parmanent_est*1.007)/$total_est ) * 100), 2);
     
     $urban_permanent_percent_person_total = round((( ($total_urban_parmanent_est_person*1.007)/$total_est_person ) * 100), 2);
     
     $urban_permanent_percent_person_male = round((( ($total_urban_parmanent_est_male*1.007)/$total_est_male ) * 100), 2);
    
     $urban_permanent_percent_person_female = round((( ($total_urban_parmanent_est_female*1.007)/$total_est_female ) * 100), 2);


     #URBAN TEMPORARY
     $urban_temporary_percent_total_est = round(((($total_urban_temporary_est*1.007)/$total_est ) * 100), 2);
     
     $urban_temporary_percent_person_total = round(((($total_urban_temporary_est_person*1.007)/$total_est_person ) * 100), 2);
     
     $urban_temporary_percent_person_male = round((( ($total_urban_temporary_est_male*1.007)/$total_est_male ) * 100), 2);
    
     $urban_temporary_percent_person_female = round((( ($total_urban_temporary_est_female*1.007)/$total_est_female ) * 100), 2);


     #URBAN HOUSEHOLD
     $urban_household_percent_total_est = round((( ($total_urban_household_est*1.007)/$total_est ) * 100), 2);
     
     $urban_household_percent_person_total = round((( ($total_urban_household_est_person*1.007)/$total_est_person ) * 100), 2);
     
     $urban_household_percent_person_male = round((( ($total_urban_household_est_male*1.007)/$total_est_male ) * 100), 2);
    
     $urban_household_percent_person_female = round((( ($total_urban_household_est_female*1.007)/$total_est_female ) * 100), 2);



     #RURAL TOTAL--------------------------------------------------------------------------------------------------

     $rural_percent_total_est = round(((($total_rural_est*1.007)/ $total_est ) * 100), 2);
     
     $rural_percent_person_total = round((( ($total_rural_est_person*1.007) / $total_est_person ) * 100), 2);
     
     $rural_percent_person_male = round((( ($total_rural_est_male*1.007) / $total_est_male ) * 100), 2);
    
     $rural_percent_person_female = round((( ($total_rural_est_female*1.007)/ $total_est_female ) * 100), 2);


    #RURAL PARMANENT
     $rural_parmanent_percent_total_est = round((( ($total_rural_parmanent_est*1.007) / $total_est ) * 100), 2);
     
     $rural_parmanent_percent_person_total = round((( ($total_rural_parmanent_est_person*1.007) / $total_est_person ) * 100), 2);
     
     $rural_parmanent_percent_person_male = round((( ($total_rural_parmanent_est_male*1.007)/ $total_est_male ) * 100), 2);
    
     $rural_parmanent_percent_person_female = round((( ($total_rural_parmanent_est_female*1.007)/ $total_est_female ) * 100), 2);



    #RURAL TEMPORARY
     $rural_temporary_percent_total_est = round((( ($total_rural_temporary_est*1.007)/ $total_est ) * 100), 2);
     
     $rural_temporary_percent_person_total = round((( ($total_rural_temporary_est_person*1.007)/ $total_est_person ) * 100), 2);
     
     $rural_temporary_percent_person_male = round((( ($total_rural_temporary_est_male*1.007)/ $total_est_male ) * 100), 2);
    
     $rural_temporary_percent_person_female = round((( ($total_rural_temporary_est_female*1.007)/ $total_est_female ) * 100), 2);


    #RURAL HOUSEHOLD
     $rural_household_percent_total_est = round((( ($total_rural_household_est*1.007) / $total_est ) * 100), 2);
     
     $rural_household_percent_person_total = round((( ($total_rural_household_est_person*1.007) / $total_est_person ) * 100), 2);
     
     $rural_household_percent_person_male = round((( ($total_rural_household_est_male*1.007) /$total_est_male ) * 100), 2);
    
     $rural_household_percent_person_female = round((( ($total_rural_household_est_female*1.007) /$total_est_female ) * 100), 2);


?>


 <!-- ONE: TOTAL -->
<tr>
  <td><strong>Total</strong></td>
  <td><?=round((int)$total_est); ?></td>
  <td >100</td>
  <td ><?=round((int)$total_est_person); ?></td>
  <td >100</td>
  <td ><?=round((int)$total_est_male); ?></td>
  <td>100</td>
  <td><?=round((int)$total_est_female); ?></td>
  <td>100</td>
 </tr>

 <tr>  <!-- Permanent -->
  <td>Permanent</td>
  <td><?=round((int)$total_parmanent_est); ?></td>
  <td><?=$parmanent_percent_total_est ?></td>
  <td><?=round((int)$total_parmanent_est_person); ?></td>
  <td><?=$parmanent_percent_person_total?></td>
  <td><?=round((int)$total_parmanent_est_male); ?></td>
  <td><?=$parmanent_percent_person_male ?></td>
  <td><?=round((int)$total_parmanent_est_female); ?></td>
  <td><?=$parmanent_percent_person_female ?></td>
 </tr>




 <tr>  <!-- Temporary -->
  <td>Temporary</td>
  <td>
  	 <?=round((int)$total_temporary_est); ?>
  </td>
  <td><?=$temporary_percent_total_est ?></td>
  <td>
  	 <?=round((int)$total_temporary_est_person); ?>
  </td>
  <td><?=$temporary_percent_person_total?></td>
  <td>
  	 <?=round((int)$total_temporary_est_male); ?>
  </td>
  <td><?=$temporary_percent_person_male ?></td>
  <td>
  	 <?=round((int)$total_temporary_est_female); ?>
  </td>
  <td><?=$temporary_percent_person_female ?></td>
 </tr>



 <tr> <!-- Household -->
  <td>Economic household</td>
  <td>
  	 <?=round((int)$total_household_est); ?>
  </td>
  <td>
  	 <?=$household_percent_total_est?>
  </td>
  <td>
  	 <?=round((int)$total_household_est_person); ?>
  </td>
  <td>
  	<?=$household_percent_person_total ?>
  </td>
  <td>
  	 <?=round((int)$total_household_est_male); ?>
  </td>
  <td>
  	<?=$household_percent_person_male ?>
  </td>
  <td>
  	 <?=round((int)$total_household_est_female); ?>
  </td>
  <td>
  	<?=$household_percent_person_female ?>
  </td>
 </tr>

 

<!-- TWO : URBAN-->

 <tr> <!-- Total -->
  <td><strong>Urban</strong></td> 
  <td>
     <?=round((int)$total_urban_est); ?>
  </td>
  <td>
    <?=$urban_percent_total_est; ?>
  </td>
  <td>
     <?=round((int)$total_urban_est_person); ?>
  </td>
  <td>
     <?=$urban_percent_person_total?>
  </td>
  <td>
     <?=round((int)$total_urban_est_male); ?>
  </td>
  <td>
     <?=$urban_percent_person_male ?>
  </td>
  <td>
     <?=round((int)$total_urban_est_female); ?>
  </td>
  <td>
     <?=$urban_percent_person_female?>
  </td>
 </tr>


 <tr>  <!-- Permanent -->
  <td>Permanent</td> 
  <td>
     <?=round((int)$total_urban_parmanent_est); ?>
  </td>
  <td>
     <?=$urban_permanent_percent_total_est ?>
  </td>
  <td>
     <?=round((int)$total_urban_parmanent_est_person); ?>
  </td>
  <td>
     <?=$urban_permanent_percent_person_total ?>
  </td>
  <td>
     <?=round((int)$total_urban_parmanent_est_male); ?>
  </td>
  <td>
    <?=$urban_permanent_percent_person_male ?>
  </td>
  <td>
     <?=round((int)$total_urban_parmanent_est_female); ?>
  </td>
  <td>
     <?= $urban_permanent_percent_person_female ?>
  </td>
 </tr>



 <tr>  <!-- Temporary -->
  <td>Temporary</td>
  <td>
     <?=round((int)$total_urban_temporary_est); ?>
  </td>
  <td>
    <?=$urban_temporary_percent_total_est ?>
  </td>
  <td>
     <?=round((int)$total_urban_temporary_est_person); ?>
  </td>
  <td>
    <?=$urban_temporary_percent_person_total ?>
  </td>
  <td>
     <?=round((int)$total_urban_temporary_est_male); ?>
  </td>
  <td>
    <?=$urban_temporary_percent_person_male ?> 
  </td>
  <td>
     <?=round((int)$total_urban_temporary_est_female); ?>
  </td>
  <td>
    <?=$urban_temporary_percent_person_female  ?>
  </td>
 </tr>



 <tr> <!-- Household -->
    <td>Economic household</td> 
  <td>
     <?=round((int)$total_urban_household_est); ?>
  </td>
  <td>
   <?=$urban_household_percent_total_est ?> 
  </td>
  <td>
     <?=round((int)$total_urban_household_est_person); ?>
  </td>
  <td>
   <?=$urban_household_percent_person_total ?> 
  </td>
  <td>
     <?=round((int)$total_urban_household_est_male); ?>
  </td>
  <td>
    <?=$urban_household_percent_person_male ?>
  </td>
  <td>
     <?=round((int)$total_urban_household_est_female); ?>
  </td>
  <td>
  <?=$urban_household_percent_person_female ?>  
  </td>
 </tr>





<!-- ROW :THREE RURAL-->
 <tr> <!-- Total -->
 
  <td><strong>Rural</strong></td> 
  
  <td>
     <?=round((int)$total_rural_est* 1.007); ?>
  </td>
  <td>
  	<?=$rural_percent_total_est?>
  </td>
  <td>
     <?=round((int)$total_rural_est_person* 1.007); ?>
  </td>
  <td>
     <?=$rural_percent_person_total?>
  </td>
  <td>
     <?=round((int)$total_rural_est_male* 1.007); ?>
  </td>
  <td>
     <?=$rural_percent_person_male?>
  </td>
  <td>
     <?=round((int)$total_rural_est_female* 1.007); ?>
  </td>
  <td>
     <?=$rural_percent_person_female?>
  </td>
 </tr>



 <tr>  <!-- Permanent -->
  <td>Permanent</td>
  <td >
     <?=round((int)$total_rural_parmanent_est * 1.007); ?>
  </td>
  <td>
   <?=$rural_parmanent_percent_total_est ?>  
  </td>
  <td>
     <?=round((int)$total_rural_parmanent_est_person*1.007); ?>
  </td>
  <td>
   <?=$rural_parmanent_percent_person_total ?>  
  </td>
  <td>
     <?=round((int)$total_rural_parmanent_est_male*1.007); ?>
  </td>
  <td>
  <?=$rural_parmanent_percent_person_male ?>  
  </td>
  <td>
     <?=round((int)$total_rural_parmanent_est_female*1.007); ?>
  </td>
  <td>
   <?=$rural_parmanent_percent_person_female ?>  
  </td>
 </tr>




 <tr >  <!-- Temporary -->
    <td>Temporary</td>
  <td>
     <?=round((int)$total_rural_temporary_est* 1.007); ?>
  </td>
  <td>
    <?=$rural_temporary_percent_total_est ?>
  </td>
  <td>
     <?=round((int)$total_rural_temporary_est_person* 1.007); ?>
  </td>
  <td>
   <?=$rural_temporary_percent_person_total ?> 
  </td>
  <td>
     <?=round((int)$total_rural_temporary_est_male* 1.007); ?>
  </td>
  <td>
   <?=$rural_temporary_percent_person_male ?>  
  </td>
  <td>
     <?=round((int)$total_rural_temporary_est_female* 1.007); ?>
  </td>
  <td>
    <?=$rural_temporary_percent_person_female ?>
  </td>
 </tr>


 
 <tr> <!-- Household -->
    <td>Economic household</td>
  <td>
     <?=round((int)$total_rural_household_est * 1.007); ?>
  </td>
  <td>
  <?=$rural_household_percent_total_est ?> 
  </td>
  <td>
     <?=round((int)$total_rural_household_est_person* 1.007); ?>
  </td>
  <td>
   <?=$rural_household_percent_person_total ?>
  </td>
  <td>
     <?=round((int)$total_rural_household_est_male* 1.007); ?>
  </td>
  <td>
   <?=$rural_household_percent_person_male ?> 
  </td>
  <td>
     <?=round((int)$total_rural_household_est_female* 1.007); ?>
  </td>
  <td>
  <?=$rural_household_percent_person_female ?>  
  </td>
 </tr>
 
</table> 
<br><div class="notice">
  <p>It is seen from the above table that there is a total of <strong><?=$total_est?></strong> establishments enumerated in <?=$zila?> Zila in the economic census 2013 of which the majority of <strong><?=$parmanent_percent_total_est?>%</strong> are parmanent establishments while temporary and household premise based establishments are <strong><?=$temporary_percent_total_est?>%</strong> and <strong><?=$household_percent_total_est?>%</strong> respectively. By urban and rural breakdown majority of <strong><?=$rural_percent_total_est?>%</strong> of the establishments is located in the rural areas and the other <strong><?=$urban_percent_total_est?></strong>  in urban areas.Thus the permanent establishments is located in much higher percentages of <strong><?=$rural_parmanent_percent_total_est ?>%</strong>in rural areas than the total of urban areas <strong><?=$urban_permanent_percent_total_est?>%</strong> of all establishments.</p>

  <p>Total Persons Engaged (TPE) in the zila as reported in the census is <strong><?=$total_est_person?></strong> of which the most percentage of <strong><?=$parmanent_percent_person_total?>%</strong> is in permanent establishment and the rest are in the temporary establishments <strong><?=$temporary_percent_person_total?>%</strong> and household premise based <strong><?=$household_percent_person_total?>%</strong>.The location of these employments is much higher in rural areas <strong><?=$rural_percent_person_total?>%</strong> than that of urban areas <strong><?=$urban_percent_person_total ?>%</strong>.</p>

</div>
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

<br><br>




<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>
<?php echo $this -> Html -> script('highchart/highcharts'); ?>
<?php echo $this -> Html -> script('highchart/exporting'); ?>

<script>

$(document).ready(function() {
  $.ajax({
    url : path_load + "/Reports/tpe_tbl_three_one_ajax",
    type : "POST",
    dataType : "json",
    cache : false,
    success : function(data) {
      
      if (data === "false") {
        return;
      }
      var est = new Array();
      var tpe = new Array();

      est.push(parseInt(data.total_est));
      est.push(parseInt(data.total_urban_est));
      est.push(parseInt(data.total_rural_est));

      tpe.push(parseInt(data.total_est_person));
      tpe.push(parseInt(data.total_urban_est_person));
      tpe.push(parseInt(data.total_rural_est_person));

      make_graph(est, tpe);
    }
  });
});

function make_graph(est, tpe) {
    $('#graph_report').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Establishments by structure'
        },
        subtitle: {
            text: 'Table 3.1: Total establishments by type & location and total persons engaged (TPE) by sex, 2013'
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
            name: 'Establishments',
            data: est

        }, {
            name: 'TPE',
            data: tpe

        }]
    });
}
</script>