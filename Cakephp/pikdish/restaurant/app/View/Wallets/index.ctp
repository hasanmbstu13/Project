  <div class="right_col " role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Wallet</h3>
        </div>
        <div class="title_right">
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
         
          <div class="x_panel"> <?php echo $this->Session->flash(); ?>
            <div>
              <h4 style="float: left; color:  #800000"> Wallet Amount : <img src="<?=$imgpath?>rupess.png"> <?php if($wallet_payment) echo $wallet_payment; else echo '0'; ?></h4 >
                <button style="margin-top:10px; margin-left: 90px; width: 150px; height: 30px; font-size: 15px; opacity: 0.6; color: #000" <?php if(!empty($total_rows_trans_cash['0']['0']['Total']) && $total_rows_trans_cash['0']['0']['Total'] <=1 ) echo 'disabled' ?> onclick="window.location.href='<?php echo Router::url(array('controller'=>'Wallets', 'action'=>'transfer_cash'))?>'">Transfer Cash</button>
                <p style="float: right;margin-top : 10px; color:  #800000"> Today Collection : <img src="<?=$imgpath?>rupess.png"><?php if($today_collection['0']['0']['Total']) echo $today_collection['0']['0']['Total']; else echo '0'; ?></p >
                </div>

                <?php if(!empty($payment_release_list) && count($payment_release_list) > 0){ ?>
                <div class="container request-amount-list" style="margin-top: 30px;border-top: 5px solid">
                  <h4><strong>Payment Release Request List</strong></h4>
                  <table class="table table-hover table-striped table-condensed">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Vch No</th>
                        <th>Ref</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $serial_no = 1; ?>
                      <?php $total_amount = 0; ?>
                      <?php foreach ($payment_release_list as $result) { ?>
                      <tr>
                        <td><?php echo $serial_no++; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($result['RestaurantTransaction']['entry_date'])) ?></td>
                        <td><?php echo $result['RestaurantTransaction']['pikdish_vch_no'] ?></td>
                        <td><?php echo $result['RestaurantTransaction']['ref'] ?></td>
                        <td style="text-align: right;"><?php echo $result['RestaurantTransaction']['cr_amt'] ?></td>
                      </tr>
                      <?php } ?>
                      <tr>
                        <td class="success" colspan="5" style="text-align: right;"><strong>Total Amount : </strong><?php if($restaurant_trans_total['0']['0']['Total']) echo $restaurant_trans_total['0']['0']['Total']; else echo '0'; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php } ?>

                <?php if(count($pending_payment) > 0){ ?>
                <div class="container summary-table" style="margin-top: 40px;">
                  <h4><strong>Pending Amount List</strong></h4>
                  <table class="table table-hover table-striped table-condensed">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Order No</th>
                        <th>Invoice No</th>
                        <th>Total Amt</th>
                        <th>Net Amt</th>
                        <th>Transaction Charges(%)</th>
                        <th>Commission Charges(%)</th>
                        <th>Final Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $serial_no = 1 ?>
                      <?php $final_amount_total = 0 ?>
                      <?php foreach ($pending_payment as $result) { ?>         
                      <tr>
                        <td><?php echo $serial_no++ ?></td>
                        <td><?php echo date("d/m/Y", strtotime($result['RestaurantPayment']['entry_date'])) ?></td>
                        <td><?php echo $result['OrdersH']['order_no'] ?></td>
                        <td><?php echo $result['OrdersH']['inv_no'] ?></td>
                        <td style="text-align: right;"><?php echo $result['RestaurantPayment']['total_amt'] ?></td>
                        <td style="text-align: right;"><?php echo $result['RestaurantPayment']['net_amt'] ?></td>
                        <td><?php echo $result['RestaurantPayment']['trans_charge_amt'] ?></td>
                        <td><?php echo $result['RestaurantPayment']['commision_charge_amt'] ?></td>
                        <td style="text-align: right;"><?php echo $result['RestaurantPayment']['final_restro_amt'] ?></td>
                      </tr>
                      <?php $final_amount_total += $result['RestaurantPayment']['final_restro_amt'] ?>
                      <?php   } ?>
                      <tr>
                        <td colspan="9" style="text-align: right;" class="success"><strong>Total Amount : </strong><?php echo $final_amount_total; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php } ?>


              </div>
            </div>
            
          </div>