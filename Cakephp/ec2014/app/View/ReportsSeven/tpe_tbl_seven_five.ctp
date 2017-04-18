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

<?php 

if($this -> request -> is('post'))
 {
?>

<div id="table_for_print">

  <div class="notice"> </div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">

<tr>
    <td colspan="7"><b>Table 7.5: Total Number of Permanent Establishment & Total Persons Engaged (TPE) by Ownership & Average Size of Establishment in 2013 and in 2001 & 03</b></td>
  </tr>

<!--  <table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">
 -->
    <tr>
      <td rowspan="2"><strong>Ownership</strong></td>
      <td colspan="3"><strong>2001 & 2003</strong></td>
      <td colspan="3"><strong>2013</strong></td>
    </tr>

    <tr>
      <td>Estab.</td>
      <td>TPE</td>
      <td>Average Size of Estab.</td>
      <td>Estab.</td>
      <td>TPE</td>
      <td>Average Size of Estab.</td>
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

  $TOTAL_EST = 0;
  $TOTAL_LOCAL = 0;
  $TOTAL_EXPORT = 0;
  $TOTAL_BOTH = 0;
  $TOTAL_NOT_APPILCABLE = 0;

  #Average estabkishment
  $avg_estb_private_2013 =round(($A_Total_Person / $A_Total_unit), 2);
  $avg_estb_partner_2013 =round(($B_Total_Person / $B_Total_unit), 2);
  $avg_estb_pvtltd_2013 =round(($C_Total_Person / $C_Total_unit), 2);
  $avg_estb_pblicltd_2013 =round(($D_Total_Person / $D_Total_unit), 2);

  $avg_estb_govt_2013 =round(($E_Total_Person / $E_Total_unit), 2);
  $avg_estb_autonomas_2013 =round(($F_Total_Person / $F_Total_unit), 2);
  $avg_estb_foreign_2013 =round(($G_Total_Person / $G_Total_unit), 2);
  $avg_estb_joint_2013 =round(($H_Total_Person / $H_Total_unit), 2);

  $avg_estb_merger_2013 =round(($I_Total_Person / $I_Total_unit), 2);
  $avg_estb_npi_2013 =round(($J_Total_Person / $J_Total_unit), 2);
  $avg_estb_foreignbd_2013 =round(($K_Total_Person / $K_Total_unit), 2);
  $avg_estb_others_2013 =round(($L_Total_Person / $L_Total_unit), 2);


  $Total_unit = $A_Total_unit + $B_Total_unit + $C_Total_unit + $D_Total_unit + 
                $E_Total_unit + $F_Total_unit + $G_Total_unit + $H_Total_unit + $I_Total_unit + 
                $J_Total_unit + $K_Total_unit + $L_Total_unit;

  $Total_Person = $A_Total_Person+ $B_Total_Person+ $C_Total_Person+ $D_Total_Person +
                $E_Total_Person + $F_Total_Person+ $G_Total_Person + $H_Total_Person + $I_Total_Person +
                $J_Total_Person + $K_Total_Person+ $L_Total_Person;


   # Storing Required GraphData in Session variable
    $_SESSION['t_7_5']['avg_estb_private_2013'] = $avg_estb_private_2013;
    $_SESSION['t_7_5']['avg_estb_partner_2013'] = $avg_estb_partner_2013;
    $_SESSION['t_7_5']['avg_estb_pvtltd_2013'] = $avg_estb_pvtltd_2013;
    $_SESSION['t_7_5']['avg_estb_pblicltd_2013'] = $avg_estb_pblicltd_2013;

    $_SESSION['t_7_5']['avg_estb_govt_2013'] = $avg_estb_govt_2013;
    $_SESSION['t_7_5']['avg_estb_autonomas_2013'] = $avg_estb_autonomas_2013;
    $_SESSION['t_7_5']['avg_estb_foreign_2013'] = $avg_estb_foreign_2013;
    $_SESSION['t_7_5']['avg_estb_joint_2013'] = $avg_estb_joint_2013;

    $_SESSION['t_7_5']['avg_estb_merger_2013'] = $avg_estb_merger_2013;
    $_SESSION['t_7_5']['avg_estb_npi_2013'] = $avg_estb_npi_2013;
    $_SESSION['t_7_5']['avg_estb_foreignbd_2013'] = $avg_estb_goreignbd_2013;
    $_SESSION['t_7_5']['avg_estb_others_2013'] = $avg_estb_others_2013;


   // Duplicate dummy data for 2003 . have to change with original data
    $_SESSION['t_7_5']['avg_estb_private_2003'] = $avg_estb_private_2013;
    $_SESSION['t_7_5']['avg_estb_partner_2003'] = $avg_estb_partner_2013;
    $_SESSION['t_7_5']['avg_estb_pvtltd_2003'] = $avg_estb_pvtltd_2013;
    $_SESSION['t_7_5']['avg_estb_pblicltd_2003'] = $avg_estb_pblicltd_2013;

    $_SESSION['t_7_5']['avg_estb_govt_2003'] = $avg_estb_govt_2013;
    $_SESSION['t_7_5']['avg_estb_autonomas_2003'] = $avg_estb_autonomas_2013;
    $_SESSION['t_7_5']['avg_estb_foreign_2003'] = $avg_estb_foreign_2013;
    $_SESSION['t_7_5']['avg_estb_joint_2013'] = $avg_estb_joint_2013;

    $_SESSION['t_7_5']['avg_estb_merger_2003'] = $avg_estb_merger_2013;
    $_SESSION['t_7_5']['avg_estb_npi_2003'] = $avg_estb_npi_2013;
    $_SESSION['t_7_5']['avg_estb_goreignbd_2003'] = $avg_estb_goreignbd_2013;
    $_SESSION['t_7_5']['avg_estb_others_2003'] = $avg_estb_others_2013;



  ?>


  <tr>
      <td><strong>Private/Family</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $A_Total_unit ?></td>
      <td><?= $A_Total_Person ?></td>
     <td><?=$avg_estb_private_2013 ?></td>

    </tr>

    <tr>
      <td><strong>Partnership</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $B_Total_unit ?></td>
      <td><?= $B_Total_Person ?></td>
     <td><?=$avg_estb_partner_2013 ?></td>

    </tr>

    <tr>
      <td><strong>Private Ltd.</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $C_Total_unit ?></td>
      <td><?= $C_Total_Person ?></td>
     <td><?=$avg_estb_pvtltd_2013 ?></td>

    </tr>


    <tr>
      <td><strong>Public Ltd.</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $D_Total_unit ?></td>
      <td><?= $D_Total_Person ?></td>
     <td><?=$avg_estb_pblicltd_2013 ?></td>

    </tr>
    <tr>
      <td><strong>Government</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $E_Total_unit ?></td>
      <td><?= $E_Total_Person ?></td>
     <td><?=$avg_estb_govt_2013 ?></td>
    </tr>


    <tr>
      <td><strong>Autonomous</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $F_Total_unit ?></td>
      <td><?= $F_Total_Person ?></td>
     <td><?=$avg_estb_autonomas_2013?></td>

    </tr>
    <tr>
      <td><strong>Foreign</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $G_Total_unit ?></td>
      <td><?= $G_Total_Person ?></td>
     <td><?=$avg_estb_foreign_2013 ?></td>

    </tr>


    <tr>
      <td><strong>Joint</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $H_Total_unit ?></td>
      <td><?= $H_Total_Person ?></td>
     <td><?=$avg_estb_joint_2013 ?></td>

    </tr>
    <tr>
      <td><strong>Co-operative</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?=$I_Total_unit ?></td>
      <td><?=$I_Total_Person ?></td>
     <td><?=$avg_estb_merger_2013 ?></td>

    </tr>


    <tr>
      <td><strong>NPI</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?=$J_Total_unit ?></td>
      <td><?=$J_Total_Person ?></td>
     <td><?=$avg_estb_npi_2013 ?></td>

    </tr>
    <tr>
      <td><strong>Expatriate</strong></td>
      <td></td>
      <td></td>
      <td></td>
     <td><?=$K_Total_unit ?></td>
      <td><?=$K_Total_Person ?></td>
     <td><?=$avg_estb_foreignbd_2013 ?></td>

    </tr>


    <tr>
      <td><strong>Others</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $L_Total_unit ?></td>
      <td><?= $L_Total_Person ?></td>
      <td><?=$avg_estb_others_2013 ?></td>
    </tr>



    <tr>
      <td><strong>Total</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $Total_unit ?></td>
      <td><?= $Total_Person ?></td>
      <td><?=round(($Total_Person / $Total_unit), 2); ?></td>
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

<?php 

 }

 ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>
<?php echo $this -> Html -> script('highchart/highcharts'); ?>
<?php echo $this -> Html -> script('highchart/exporting'); ?>

<script>

$(document).ready(function() {
  $.ajax({
    url : path_load + "/ReportsSeven/tpe_tbl_seven_five_ajax",
    type : "POST",
    dataType : "json",
    cache : false,
    success : function(data) {
      
      if (data === "false") {
        // console.log('no data found');
        return;
      }
      var pvt_fmly = new Array();
      var partner = new Array();
      var pvt_ltd = new Array();
      var pub_ltd = new Array();
      var govt = new Array();
      var auto = new Array();
      var foreign = new Array();
      var joint = new Array();
      var merger = new Array();
      var npi = new Array();
      var foreignbd = new Array();
      var others = new Array();

      pvt_fmly.push(parseInt(data.avg_estb_private_2013));
      pvt_fmly.push(parseInt(data.avg_estb_private_2003));

      partner.push(parseInt(data.total_rural_est));
      partner.push(parseInt(data.total_est_person));

      pvt_ltd.push(parseInt(data.total_urban_est_person));
      pvt_ltd.push(parseInt(data.total_rural_est_person));

      pub_ltd.push(parseInt(data.total_urban_est_person));
      pub_ltd.push(parseInt(data.total_rural_est_person));

      govt.push(parseInt(data.total_urban_est_person));
      govt.push(parseInt(data.total_rural_est_person));

      auto.push(parseInt(data.total_urban_est_person));
      auto.push(parseInt(data.total_rural_est_person));


      foreign.push(parseInt(data.total_urban_est_person));
      foreign.push(parseInt(data.total_rural_est_person));

      joint.push(parseInt(data.total_urban_est_person));
      joint.push(parseInt(data.total_rural_est_person));

      merger.push(parseInt(data.total_urban_est_person));
      merger.push(parseInt(data.total_rural_est_person));

      npi.push(parseInt(data.total_urban_est_person));
      npi.push(parseInt(data.total_rural_est_person));

      foreignbd.push(parseInt(data.total_urban_est_person));
      foreignbd.push(parseInt(data.total_rural_est_person));

      others.push(parseInt(data.total_urban_est_person));
      others.push(parseInt(data.total_rural_est_person));

      console.log(pvt_fmly);
      console.log(partner);
      console.log(pvt_ltd);
      console.log(pub_ltd);
      console.log(govt);
      console.log(auto);


      make_graph(pvt_fmly, partner, pvt_ltd, pub_ltd, govt, auto, foreign, joint, merger, npi, foreignbd, others );
    }
  });
});

function make_graph(pvt_fmly, partner, pvt_ltd, pub_ltd, govt, auto, foreign, joint, merger, npi, foreignbd, others ) {
    $('#graph_report').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Average size of establishments by ownership'
        },
        subtitle: {
            text: 'Table 7.5: Total number of permanent establishments &total persons engaged (TPE) by ownership & average size of establishments in 2013 and in 2001 & 03'
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
            name: 'Private/Family',
            data: pvt_fmly

        }, {
            name: 'Partnership',
            data: partner

        }, {
            name: 'Private Ltd',
            data: pvt_ltd

        }
        , {
            name: 'Public Ltd.',
            data: pub_ltd

        }, {
            name: 'Government',
            data: govt

        }, {
            name: 'Autonomous',
            data: auto

        }, {
            name: 'Foreign',
            data: foreign

        }, {
            name: 'Joint',
            data: joint

        }, {
            name: 'Merger',
            data: merger

        }, {
            name: 'NPI',
            data: npi

        }, {
            name: 'Foreign Bangladeshi',
            data: foreignbd

        }, {
            name: 'Other',
            data: others

        }]
    });
}
</script>
