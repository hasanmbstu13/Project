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
          <td colspan="9"><b>Table 3.1: Total Establishment by Type & Location and Total Persons Engaged (TPE) by Sex, 2013</b></td>
        </tr>

        <tr>
            <td rowspan="2"><strong>Type</strong></td>
            <td colspan="2"><strong>Establishments</strong></td>
            <td colspan="6"><strong>Total Persons Engaged (TPE)</strong></td>
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
/*  CALCULATION FOR TOTAL SECTION*/

  # TOTAL SECTION
  
  #PERMANENT ROW:
       $permanent_estb_total = $total_urban_parmanent_est + $total_rural_parmanent_est;

     $permanent_tpe_total = $total_urban_parmanent_est_person + $total_rural_parmanent_est_person;
     $permanent_tpe_male_total = $total_urban_parmanent_est_male + $total_rural_parmanent_est_male;
     $permanent_tpe_female_total = $total_urban_parmanent_est_female + $total_rural_parmanent_est_female;

  #TEMPORARY ROW:
       $temporary_estb_total = $total_urban_temporary_est + $total_rural_temporary_est;

     $temporary_tpe_total = $total_urban_temporary_est_person + $total_rural_temporary_est_person;
     $temporary_tpe_male_total = $total_urban_temporary_est_male + $total_rural_temporary_est_male;
     $temporary_tpe_female_total = $total_urban_temporary_est_female + $total_rural_temporary_est_female;

  #HOUSEHOLD ROW:
       $household_estb_total = $total_urban_household_est + $total_rural_household_est;

     $household_tpe_total = $total_urban_household_est_person + $total_rural_household_est_person;
     $household_tpe_male_total = $total_urban_household_est_male + $total_rural_household_est_male;
     $household_tpe_female_total = $total_urban_household_est_female + $total_rural_household_est_female;

  #TOTAL SECTION ROW:
     $estb_total = $permanent_estb_total+
           $temporary_estb_total+
           $household_estb_total;

     $tpe_total = $permanent_tpe_total+
          $temporary_tpe_total+
          $household_tpe_total;

     $tpe_male_total = $permanent_tpe_male_total+
             $temporary_tpe_male_total+
             $household_tpe_male_total;

     $tpe_female_total = $permanent_tpe_female_total+
               $temporary_tpe_female_total+
               $household_tpe_female_total;


 # ONLY TOTAL SECTION OF URBAN

     $urban_estb_total =  $total_urban_parmanent_est+
                          $total_urban_temporary_est+
                          $total_urban_household_est;

     $urban_tpe_total = $total_urban_parmanent_est_person+
                        $total_urban_temporary_est_person+
                        $total_urban_household_est_person;

     $urban_tpe_male_total =  $total_urban_parmanent_est_male+
                              $total_urban_temporary_est_male+
                              $total_urban_household_est_male ;

     $urban_tpe_female_total = $total_urban_parmanent_est_female+
                               $total_urban_temporary_est_female+
                               $total_urban_household_est_female;

   #ONLY TOTAL SECTION OF RURAL

     $rural_estb_total =  $total_rural_parmanent_est+
                          $total_rural_temporary_est+
                          $total_rural_household_est;

     $rural_tpe_total = $total_rural_parmanent_est_person+
                        $total_rural_temporary_est_person+
                        $total_rural_household_est_person;

     $rural_tpe_male_total =  $total_rural_parmanent_est_male+
                              $total_rural_temporary_est_male+
                              $total_rural_household_est_male;

     $rural_tpe_female_total = $total_rural_parmanent_est_female+
                               $total_rural_temporary_est_female+
                               $total_rural_household_est_female;





 ?>

<?php 
    # percentage for ESTB

//total:
 $estb_perma_total_A = round((( $permanent_estb_total/ $estb_total ) * 100), 2);
 $estb_temp_total_A = round((( $temporary_estb_total/ $estb_total ) * 100), 2);
 $estb_house_total_A = round((( $household_estb_total/ $estb_total ) * 100), 2);

//urban:

$estb_total_urban_A = round((( $urban_estb_total/ $estb_total ) * 100), 2);
$estb_perma_urban_A = round((( $total_urban_parmanent_est/ $estb_total ) * 100), 2);
$estb_temp_urban_A = round((( $total_urban_temporary_est/ $estb_total ) * 100), 2);
$estb_house_urban_A = round((( $total_urban_household_est/ $estb_total ) * 100), 2);

//rural:

$estb_total_rural_A = round((( $rural_estb_total/ $estb_total ) * 100), 2);
$estb_perma_rural_A = round((( $total_rural_parmanent_est/ $estb_total ) * 100), 2);
$estb_temp_rural_A = round((( $total_rural_temporary_est/ $estb_total ) * 100), 2);
$estb_house_rural_A = round((( $total_rural_household_est/ $estb_total ) * 100), 2);




 # percentage for TPE TOTAL
//total
$tpe_perma_total_B = round((( $permanent_tpe_total/ $tpe_total ) * 100), 2);
$tpe_temp_total_B = round((( $temporary_tpe_total/ $tpe_total ) * 100), 2);
$tpe_house_total_B = round((( $household_tpe_total/ $tpe_total ) * 100), 2);

//urban:
$tpe_total_urban_B = round((( $urban_tpe_total/ $tpe_total ) * 100), 2);
$tpe_perma_urban_B = round((( $total_urban_parmanent_est_person/ $tpe_total ) * 100), 2);
$tpe_temp_urban_B = round((( $total_urban_temporary_est_person/ $tpe_total ) * 100), 2);
$tpe_house_urban_B = round((( $total_urban_household_est_person/ $tpe_total ) * 100), 2);

//rural:

$tpe_total_rural_B = round((( $rural_tpe_total/ $tpe_total ) * 100), 2);
$tpe_perma_rural_B = round((( $total_rural_parmanent_est_person/ $tpe_total ) * 100), 2);
$tpe_temp_rural_B = round((( $total_rural_temporary_est_person/ $tpe_total ) * 100), 2);
$tpe_house_rural_B = round((( $total_rural_household_est_person/ $tpe_total ) * 100), 2);



# percentage for TPE MALE

//total:
$tpe_male_perma_total_C = round((( $permanent_tpe_male_total/ $tpe_male_total ) * 100), 2);
$tpe_male_temp_total_C = round((( $temporary_tpe_male_total/ $tpe_male_total ) * 100), 2);
$tpe_male_house_total_C = round((( $household_tpe_male_total/ $tpe_male_total ) * 100), 2);

//urban:
$tpe_male_urban_total_C = round((( $urban_tpe_male_total/ $tpe_male_total ) * 100), 2);
$tpe_male_urban_pema_C = round((( $total_urban_parmanent_est_male/ $tpe_male_total ) * 100), 2);
$tpe_male_urban_temp_C = round((( $total_urban_temporary_est_male/ $tpe_male_total ) * 100), 2);
$tpe_male_urban_house_C = round((( $total_urban_household_est_male/ $tpe_male_total ) * 100), 2);


//rural:

$tpe_male_rural_total_C = round((( $rural_tpe_male_total/ $tpe_male_total ) * 100), 2);
$tpe_male_rural_pema_C = round((( $total_rural_parmanent_est_male/ $tpe_male_total ) * 100), 2);
$tpe_male_rural_temp_C = round((( $total_rural_temporary_est_male/ $tpe_male_total ) * 100), 2);
$tpe_male_rural_house_C = round((( $total_rural_household_est_male/ $tpe_male_total ) * 100), 2);


# percentage for TPE FEMALE

//total:
$tpe_female_perma_total_D = round((( $permanent_tpe_female_total/ $tpe_female_total ) * 100), 2);
$tpe_female_temp_total_D = round((( $temporary_tpe_female_total/ $tpe_female_total ) * 100), 2);
$tpe_female_house_total_D = round((( $household_tpe_female_total/ $tpe_female_total ) * 100), 2);

//urban:
$tpe_female_urban_total_D = round((( $urban_tpe_female_total/ $tpe_female_total ) * 100), 2);
$tpe_female_urban_pema_D = round((( $total_urban_parmanent_est_female/ $tpe_female_total ) * 100), 2);
$tpe_female_urban_temp_D = round((( $total_urban_temporary_est_female/ $tpe_female_total ) * 100), 2);
$tpe_female_urban_house_D = round((( $total_urban_household_est_female/ $tpe_female_total ) * 100), 2);


//rural:

$tpe_female_rural_total_D = round((( $rural_tpe_female_total/ $tpe_female_total ) * 100), 2);
$tpe_female_rural_pema_D = round((( $total_rural_parmanent_est_female/ $tpe_female_total ) * 100), 2);
$tpe_female_rural_temp_D = round((( $total_rural_temporary_est_female/ $tpe_female_total ) * 100), 2);
$tpe_female_rural_house_D = round((( $total_rural_household_est_female/ $tpe_female_total ) * 100), 2);





?>


 <!-- ***************************************************** TOTAL *********************************-->
<tr>
  <td><strong>Total</strong></td>
  <td><?=(int)$estb_total; ?></td>
  <td >100</td>
  <td ><?=(int)$tpe_total; ?></td>
  <td >100</td>
  <td ><?=(int)$tpe_male_total; ?></td>
  <td>100</td>
  <td><?=(int)$tpe_female_total; ?></td>
  <td>100</td>
 </tr>

 <tr>  <!-- Permanent -->
  <td>Permanent</td>
  <td><?=(int)$permanent_estb_total; ?></td>
  <td><?=$estb_perma_total_A ?></td>
  <td><?=(int)$permanent_tpe_total; ?></td>
  <td><?=$tpe_perma_total_B?></td>
  <td><?=(int)$permanent_tpe_male_total; ?></td>
  <td><?=$tpe_male_perma_total_C ?></td>
  <td><?=(int)$permanent_tpe_female_total; ?></td>
  <td><?=$tpe_female_perma_total_D ?></td>
 </tr>




 <tr>  <!-- Temporary -->
  <td>Temporary</td>
  <td><?=(int)$temporary_estb_total; ?></td>
  <td><?=$estb_temp_total_A ?></td>
  <td><?=(int)$temporary_tpe_total; ?></td>
  <td><?=$tpe_temp_total_B?></td>
  <td><?=(int)$temporary_tpe_male_total; ?></td>
  <td><?=$tpe_male_temp_total_C ?></td>
  <td><?=(int)$temporary_tpe_female_total; ?></td>
  <td><?=$tpe_female_temp_total_D ?></td>
 </tr>



 <tr> <!-- Household -->
  <td>Economic Household</td>
  <td><?=(int)$household_estb_total; ?></td>
  <td><?=$estb_house_total_A?></td>
  <td><?=(int)$household_tpe_total; ?></td>
  <td><?=$tpe_house_total_B ?></td>
  <td><?=(int)$household_tpe_male_total; ?></td>
  <td><?=$tpe_male_house_total_C ?></td>
  <td><?=(int)$household_tpe_female_total; ?></td>
  <td><?=$tpe_female_house_total_D ?></td>
 </tr>

 

<!-- ******************************************** TWO URBAN **************************************-->

 <tr> <!-- Total -->
  <td><strong>Urban</strong></td> 
  <td><?=(int)$urban_estb_total; ?></td>
  <td><?=$estb_total_urban_A; ?></td>
  <td><?=(int)$urban_tpe_total; ?></td>
  <td><?=$tpe_total_urban_B?></td>
  <td><?=(int)$urban_tpe_male_total; ?></td>
  <td><?=$tpe_male_urban_total_C ?></td>
  <td><?=(int)$urban_tpe_female_total; ?></td>
  <td><?=$tpe_female_urban_total_D?></td>
 </tr>


 <tr>  <!-- Permanent -->
  <td>Permanent</td> 
  <td><?=(int)$total_urban_parmanent_est; ?></td>
  <td><?=$estb_perma_urban_A ?></td>
  <td><?=(int)$total_urban_parmanent_est_person; ?></td>
  <td><?=$tpe_perma_urban_B ?></td>
  <td><?=(int)$total_urban_parmanent_est_male; ?></td>
  <td><?=$tpe_male_urban_pema_C ?></td>
  <td><?=(int)$total_urban_parmanent_est_female; ?></td>
  <td><?= $tpe_female_urban_pema_D ?></td>
 </tr>



 <tr>  <!-- Temporary -->
  <td>Temporary</td>
  <td><?=(int)$total_urban_temporary_est; ?></td>
  <td><?=$estb_temp_urban_A ?></td>
  <td><?=(int)$total_urban_temporary_est_person; ?></td>
  <td><?=$tpe_temp_urban_B ?></td>
  <td><?=(int)$total_urban_temporary_est_male; ?></td>
  <td><?=$tpe_male_urban_temp_C ?> </td>
  <td><?=(int)$total_urban_temporary_est_female; ?></td>
  <td><?=$tpe_female_urban_temp_D;  ?></td>
 </tr>



 <tr> <!-- Household -->
  <td>Economic Household</td> 
  <td><?=(int)$total_urban_household_est; ?></td>
  <td><?=$estb_house_urban_A ?> </td>
  <td><?=(int)$total_urban_household_est_person; ?></td>
  <td><?=$tpe_house_urban_B ?> </td>
  <td><?=(int)$total_urban_household_est_male; ?></td>
  <td><?=$tpe_male_urban_house_C ?></td>
  <td><?=(int)$total_urban_household_est_female; ?></td>
  <td><?=$tpe_female_urban_house_D ?>  </td>
 </tr>





<!-- **********************************************THREE_RURAL*************************************** -->
 <tr> <!-- Total -->
 
  <td><strong>Rural</strong></td> 
  
  <td><?=(int)$rural_estb_total; ?></td>
  <td><?=$estb_total_rural_A?></td>
  <td><?=(int)$rural_tpe_total; ?></td>
  <td><?=$tpe_total_rural_B?> </td>
  <td><?=(int)$rural_tpe_male_total; ?></td>
  <td><?=$tpe_male_rural_total_C?></td>
  <td><?=(int)$rural_tpe_female_total; ?></td>
  <td><?=$tpe_female_rural_total_D?></td>
 </tr>


 <tr>  <!-- Permanent -->
  <td>Permanent</td>
  <td ><?=(int)$total_rural_parmanent_est; ?></td>
  <td><?=$estb_perma_rural_A ?>  </td>
  <td><?=(int)$total_rural_parmanent_est_person; ?></td>
  <td><?=$tpe_perma_rural_B ?>  </td>
  <td><?=(int)$total_rural_parmanent_est_male; ?></td>
  <td><?=$tpe_male_rural_pema_C ?>  </td>
  <td><?=(int)$total_rural_parmanent_est_female; ?></td>
  <td><?=$tpe_female_rural_pema_D ?>  </td>
 </tr>


 <tr >  <!-- Temporary -->
    <td>Temporary</td>
  <td><?=(int)$total_rural_temporary_est; ?></td>
  <td><?=$estb_temp_rural_A ?></td>
  <td><?=(int)$total_rural_temporary_est_person; ?></td>
  <td><?=$tpe_temp_rural_B ?> </td>
  <td><?=(int)$total_rural_temporary_est_male; ?></td>
  <td><?=$tpe_male_rural_temp_C ?>  </td>
  <td><?=(int)$total_rural_temporary_est_female; ?></td>
  <td><?=$tpe_female_rural_temp_D ?></td>
 </tr>

 
 <tr> <!-- Household -->
    <td>Economic Household</td>
  <td><?=(int)$total_rural_household_est; ?></td>
  <td><?=$estb_house_rural_A ?> </td>
  <td><?=(int)$total_rural_household_est_person; ?></td>
  <td><?=$tpe_house_rural_B ?></td>
  <td><?=(int)$total_rural_household_est_male; ?></td>
  <td><?=$tpe_male_rural_house_C ?> </td>
  <td><?=(int)$total_rural_household_est_female; ?></td>
  <td><?=$tpe_female_rural_house_D ?>  </td>
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