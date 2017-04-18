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

  <div class="notice"> </div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">

 <tr>
    <td colspan="10"><b>Table 5.1: Working Status of Total Persons Engaged (TPE) by Category and Sex in 2001 & 03 & in 2013 and Annual Growth Rate</b></td>
  </tr>
   <tr>
  <td rowspan=3>Working Status</td>
  <td colspan=8>Total Persons Engaged (TPE)</td>
  <td>Growth rate</td>
 </tr>
 <tr>
  <td colspan=4>2001 &amp; 03</td>
  <td colspan=4 >2013</td>
  <td >&nbsp;</td>
 </tr>
 <tr>
  <td >Total</td>
  <td >%</td>
  <td >Male</td>
  <td>Female</td>
  <td >Total</td>
  <td >%</td>
  <td >Male</td>
  <td >Female</td>
  <td >&nbsp; </td>
 </tr>

 <tr>
   <td>1</td>
   <td>2</td>
   <td>3</td>
   <td>4</td>
   <td>5</td>
   <td>6</td>
   <td>7</td>
   <td>8</td>
   <td>9</td>
   <td>10</td>
 </tr>


<?php 

$TOTAL = $result[0][0]['WORKING_PROPRIETOR']+ $result[0][0]['UNPAID_FAMILY_WORKERS']+ $result[0][0]['FULL_TIME_WORKERS']
+ $result[0][0]['PART_TIME_WORKERS'] + $result[0][0]['CASUAL_WORKERS']; 

$TOTAL_MALE = $result[0][0]['WORKING_PROPRIETOR_MALE']+ $result[0][0]['UNPAID_FAMILY_WORKERS_MALE']+ $result[0][0]['FULL_TIME_WORKERS_MALE']
+ $result[0][0]['PART_TIME_WORKERS_MALE'] + $result[0][0]['CASUAL_WORKERS_MALE']; 

$TOTAL_FEMALE = $result[0][0]['WORKING_PROPRIETOR_FEMALE']+ $result[0][0]['UNPAID_FAMILY_WORKERS_FEMALE']+ $result[0][0]['FULL_TIME_WORKERS_FEMALE']
+ $result[0][0]['PART_TIME_WORKERS_FEMALE'] + $result[0][0]['CASUAL_WORKERS_FEMALE']; 


$WORKING_PROP_PERCENT = round((($result[0][0]['WORKING_PROPRIETOR']/$TOTAL)*100),2);
$UNPAID_FAMILY_PERCENT = round((($result[0][0]['UNPAID_FAMILY_WORKERS']/$TOTAL)*100),2);
$FULL_TIME_PERCENT = round((($result[0][0]['FULL_TIME_WORKERS']/$TOTAL)*100),2);
$PART_TIME_PERCENT = round((($result[0][0]['PART_TIME_WORKERS']/$TOTAL)*100),2);
$CASUAL_PERCENT = round((($result[0][0]['CASUAL_WORKERS']/$TOTAL)*100),2);




?>


 <tr>
   <td>Working Proprietor</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <!-- 2013 -->
   <td><?=$result[0][0]['WORKING_PROPRIETOR']; ?></td>
   <td><?=$WORKING_PROP_PERCENT; ?></td>
   <td><?=$result[0][0]['WORKING_PROPRIETOR_MALE']; ?></td>
   <td><?=$result[0][0]['WORKING_PROPRIETOR_FEMALE']; ?></td>
   <td></td>
 </tr>


  <tr>
   <td>Unpaid Family Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <!-- 2013 -->
   <td><?=$result[0][0]['UNPAID_FAMILY_WORKERS']; ?></td>
   <td><?=$UNPAID_FAMILY_PERCENT; ?></td>
   <td><?=$result[0][0]['UNPAID_FAMILY_WORKERS_MALE']; ?></td>
   <td><?=$result[0][0]['UNPAID_FAMILY_WORKERS_FEMALE']; ?></td>
   <td></td>
 </tr>

  <tr>
   <td>Full Time Workers</td>   
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <!-- 2013 -->
   <td><?=$result[0][0]['FULL_TIME_WORKERS']; ?></td>
   <td><?=$FULL_TIME_PERCENT; ?></td>
   <td><?=$result[0][0]['FULL_TIME_WORKERS_MALE']; ?></td>
   <td><?=$result[0][0]['FULL_TIME_WORKERS_FEMALE']; ?></td>
   <td></td>
 </tr>

  <tr>
   <td>Part-Time Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <!-- 2013 -->
   <td><?=$result[0][0]['PART_TIME_WORKERS']; ?></td>
   <td><?=$PART_TIME_PERCENT; ?></td>
   <td><?=$result[0][0]['PART_TIME_WORKERS_MALE']; ?></td>
   <td><?=$result[0][0]['PART_TIME_WORKERS_FEMALE']; ?></td>
   <td></td>
 </tr>

  <tr>
   <td>Casual Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <!-- 2013 -->
   <td><?=$result[0][0]['CASUAL_WORKERS']; ?></td>
   <td><?=$CASUAL_PERCENT; ?></td>
   <td><?=$result[0][0]['CASUAL_WORKERS_MALE']; ?></td>
   <td><?=$result[0][0]['CASUAL_WORKERS_FEMALE']; ?></td>
   <td></td>
 </tr>


  <tr>
   <td>Total</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <!-- 2013 -->
   <td><?=$TOTAL; ?></td>
   <td>100.0</td>
   <td><?=$TOTAL_MALE; ?></td>
   <td><?=$TOTAL_FEMALE; ?></td>
   <td></td>
 </tr>


</table>

<br><div class="notice"> </div>


</div>
<br><br>
<div class="submit">
<input type="button" value="Print" id="print_btn">
<input type="button" value="Export to Excel" id="export_to_excel">
</div> 
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
    url : path_load + "/Reports/tpe_tbl_five_one_ajax",
    type : "POST",
    dataType : "json",
    cache : false,
    success : function(data) {
      
      if (data === "false") {
        return;
      }
      var tpe_working = new Array();
      var tpe_unpaid = new Array();
      var tpe_fulltime = new Array();
      var tpe_parttime = new Array();
      var tpe_casual = new Array();

      tpe_working.push(parseInt(data.tpe_working_2003));
      tpe_working.push(parseInt(data.tpe_working_2013));

      tpe_unpaid.push(parseInt(data.tpe_unpaid_2003));
      tpe_unpaid.push(parseInt(data.tpe_unpaid_2013));

      tpe_fulltime.push(parseInt(data.tpe_fulltime_2003));
      tpe_fulltime.push(parseInt(data.tpe_fulltime_2013));

      tpe_parttime.push(parseInt(data.tpe_parttime_2003));
      tpe_parttime.push(parseInt(data.tpe_parttime_2013));

      tpe_casual.push(parseInt(data.tpe_casual_2003)); 
      tpe_casual.push(parseInt(data.tpe_casual_2013));

      make_graph(tpe_working, tpe_unpaid, tpe_fulltime, tpe_parttime, tpe_casual );
    }
  });
});

function make_graph(tpe_working, tpe_unpaid, tpe_fulltime, tpe_parttime, tpe_casual) {
    $('#graph_report').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Establishments by structure'
        },
        subtitle: {
            text: 'Table 5.1: Total establishments by type & location and total persons engaged (TPE) by sex, 2013'
        },
        xAxis: {
            categories: [
                '2001 & 2003',
                '2013'
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
            name: 'Working proprietor',
            data: tpe_working

        }, {
            name: 'Unpaid family workers',
            data: tpe_unpaid

        }, {
            name: 'Full time workers',
            data: tpe_fulltime

        }, {
            name: 'Part-time/irregular workers',
            data: tpe_parttime

        }, {
            name: 'Casual Workers',
            data: tpe_casual

        }]
    });
}
</script>
