<div class="right_col " role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Payment Reconciliation</h3>      
    </div>
    <div class="title_right">
    <button style="margin-top:10px; margin-left: 90px; width: 150px;
height: 30px; float: right;" onclick="window.location.href='<?php echo Router::url(array('controller'=>'Reconciliations', 'action'=>'export_data'))?>'">Export to Excel</button> 
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row" style="margin-top: 40px">
    <div class="col-md-12 col-sm-12 col-xs-12">
       
      <div class="x_panel"> <?php //echo $this->Session->flash(); ?>
        <div>
          <h4 style="float: left; color:  #800000"> Total Amount : <img src="<?php echo $imgpath ?>rupess.png"> <?php if($restaurant_trans_total['0']['0']['Total']) echo $restaurant_trans_total['0']['0']['Total']; else echo '0'; ?></h4 >
          <!-- <button type="button" style="margin-top:10px; margin-left: 90px; width: 150px;
height: 30px;" <?php //if($restaurant_trans_total) echo 'disabled' ?>>Transfer Cash</button> -->
          
   <!-- <button style="margin-top:10px; margin-left: 90px; width: 150px;
height: 30px;" <?php //if(!empty($total_rows_trans_cash['0']['0']['Total']) && $total_rows_trans_cash['0']['0']['Total'] <=1 ) echo 'disabled' ?> onclick="window.location.href='<?php //echo Router::url(array('controller'=>'Wallets', 'action'=>'transfer_cash'))?>'">Transfer Cash</button> -->


          <p style="float: left; margin-left: 400px; margin-top : 10px; color:  #800000"> Total Restaurants : <?php if($total_restaurant['0']['0']['Total']) echo $total_restaurant['0']['0']['Total']; else echo '0'; ?></p >
          <p style="float: right; margin-left: 50px; margin-top : 10px; color:  #800000"> Total Entries : <?php if($total_entries['0']['0']['Total']) echo $total_entries['0']['0']['Total']; else echo '0'; ?></p >
        </div>

        <?php if(!empty($restau_trans_selected) && count($restau_trans_selected) > 0){ ?>
        <div class="container restau-trans-all" style="margin-top: 70px;border-top: 5px solid">
          <h4><strong>Payment Reconciliation List</strong></h4>
          <table class="table table-hover table-striped table-condensed">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Restaurant Name</th>
                <th>Restaurant Vch No</th>
                <th>Pikdish Vch No</th>
                <th>Ref</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
            <?php $serial_no = 1; ?>
            <?php $total_amount = 0; ?>
            <?php foreach ($restau_trans_selected as $result) { ?>
              <tr>
                <td><?php echo $serial_no++; ?></td>
                <td><?php echo $result['Restaurant']['restaurant_name'] ?></td>
                <td><?php echo $result['RestaurantTransaction']['pikdish_vch_no'] ?></td>
                <td><?php echo $result['RestaurantTransaction']['restro_vch_no'] ?></td>
                <td><?php echo $result['RestaurantTransaction']['ref'] ?></td>
                <td style="text-align: right;"><?php echo $result['RestaurantTransaction']['cr_amt'] ?></td>
              </tr>
              <?php $total_amount += $result['RestaurantTransaction']['cr_amt'] ?>
           <?php } ?>
              <tr>
                <td class="success" colspan="6" style="text-align: right;"><strong>Total Amount : </strong><?php echo $total_amount; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php } ?>

       

    </div>
  </div>
  
</div>