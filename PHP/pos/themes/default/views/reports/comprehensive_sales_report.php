<?php 
    // var_dump($this->data); 
    // exit;
    // echo $Settings->header; 
?>


<!-- <head> -->
<style type="text/css">

    @media print {
        body{
            font-size: 10px;
        }

        .main-footer{display: none;}

        .box.box-primary{
            border: none;
            box-shadow: none;
            margin: 0;
        }

        .table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th{
            padding: 2px;
        }

    }
</style>

<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <div class="box-header no-print">
                    <h3 class="box-title">Select date range to see comprehensive sales report.</h3>
                </div>
                
                <div class="box-body no-print">
                    <div id="form" class="panel panel-warning">
                        <div class="panel-body">
                        <?= form_open("reports/comprehensive_sales_report", array('method'=>'get')) ?>
                         <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label" for="start_date"><?= lang("start_date"); ?></label>
                                    <?= form_input('start_date', set_value('start_date'), 'class="form-control datetimepicker" id="start_date"');?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="control-label" for="end_date"><?= lang("end_date"); ?></label>
                                    <?= form_input('end_date', set_value('end_date'), 'class="form-control datetimepicker" id="end_date"');?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary"><?= lang("submit"); ?></button>
                            </div>
                        </div>
                        <?= form_close();?>
                    </div>
                </div>

            </div>



            <?php

            if(count($this->data['results'])>0):
                ?>



            <div class="box-body print">
             <div class="row">
                <div class="col-sm-12">

                    <div class="clearfix no-print">
                        <a href="#" style="float: right;" target="_blank"  onClick="window.print()"><span class="glyphicon glyphicon-print"></span></a>
                    </div>

                    <div id="wrapper" class="table-responsive" >
                        <!--div class="office_address text-center">
                            <?php echo $Settings->header ?>
                        </div-->
                        <div class="reports_date">
                            <h3>Reports from <?php if (isset($this->data['start_date'])): echo $this->data['start_date']; else: echo 'X'; endif; ?> to <?php if (isset($this->data['end_date'])): echo $this->data['end_date']; else: echo 'Y'; endif; ?> </h3>                           
                        </div>
                        <h4><strong>Sales</strong></h4>
                        <table class="table table-hover table-striped table-condensed" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Products(Code/Qty/Store Cost)</th>
                                    <th align="center">Discount</th>                                    
                                    <th align="center">Order Total</th>
                                    <th align="center">Profit</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $total_profit       = 0;
                                $grand_total        = 0; 
                                $no_of_products     = 0; 
                                $total_expenses     = 0; 
                                $net_profit         = 0; 
                                $no_of_orders       = count($this->data['results']);
                                ?>
                                <?php foreach ($this->data['results'] as $order) { 
                                   $total_cost = 0;
                                   if(is_array($order['code'])) {
                                   } 
                                   ?>
                                   <tr>
                                    <td><?php echo $order['id']?></td>
                                    <td>
                                        <?php 
                                        $unixdatetime = strtotime($order['date']);
                                        echo date("D M d, g:iA", $unixdatetime);                                 

                                        ?>
                                    </td>
                                    <td>
                                       <table class="table table-bordered table-condensed" style="margin-bottom:0;">
                                           <tbody>

                                              <?php 
                                              foreach ($order['code'] as $item) { 
                                               $total_cost += $item['p_cost'];
                                               $no_of_products += $item['p_quantity'];

                                               ?>
                                               <tr>
                                                  <td><?=$item['p_code']?></td>
                                                  <td><?=$item['p_quantity']?></td>
                                                  <td><?=$item['p_cost']?></td>
                                              </tr> 

                                              <?php } ?>


                                          </tbody>
                                      </table>
                                  </td>



                                  <td align="center"><?php echo $order['total_discount']?></td>
                                  <td align="center">
                                    <?php 
                                    $grand_total += $order['grand_total'];
                                    echo $order['grand_total'];
                                    ?>
                                </td>
                                <td align="center">
                                    <?php 
                                    $profit = $order['grand_total']-$total_cost;
                                    $total_profit += $profit;
                                    echo $profit;
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>

                            <tr class="success">
                                <td align="center"><strong><?php echo $no_of_orders;?></strong></td>
                                <td align="center" colspan="2"><strong><?php echo $no_of_products;?></strong></td>
                                <td align="center"><strong></strong></td>
                                <td align="center"><strong><?php echo $grand_total;?></strong></td>
                                <td align="center"><strong><?php  echo $total_profit ?></strong></td>
                            </tr>
                        </tbody>
                    </table>



                    <?php if(count($this->data['expenses'])>0){ ?>
                        <h4><strong>Expenses</strong></h4>
                        <table class="table table-hover table-striped table-condensed" >
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reference</th>
                                    <th>Created By</th>                                    
                                    <th>Description</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php foreach ($this->data['expenses'] as $expense) { ?>
                                    <?php $total_expenses += $expense->amount; ?>
                                    <?php  $unixdatetime = strtotime($expense->date); ?>

                                    <tr>
                                        <td align="center"><?= date("D M d, g:iA", $unixdatetime) ?></td>
                                        <td align="center"><?= $expense->reference ?></td>
                                        <td align="center"><?= $expense->created_by ?></td>  
                                        <td align="center"><?= $expense->note ?></td>
                                        <td align="center"><?= $expense->amount ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>                            
                            <?php } ?>

                            <table class="table table-hover table-striped table-condensed" >
                               <tbody>
                                   <?php 
                                   if(!empty($total_expenses))
                                    $total_expenses = $total_expenses;
                                else
                                    $total_expenses = 0;
                                ?>

                                <tr class="success">
                                    <td colspan="4"><strong>Total Sale</strong></td>
                                    <td align="center"><strong><?php echo number_format($grand_total,2); ?></strong></td>
                                </tr>

                                <tr class="success">
                                    <td colspan="4"><strong>Cost of goods</strong></td>
                                    <td align="center"><strong><?php 
                                    $costs = $grand_total - $total_profit;
                                    echo number_format($costs,2); 
	                                    
                                    ?></strong></td>
                                </tr>

                                <tr class="success">
                                    <td colspan="4"><strong>Gross Profit</strong></td>
                                    <td align="center"><strong><?php echo number_format($total_profit,2);?></strong></td>
                                </tr>
                                                                
                                <tr class="success">
                                    <td colspan="4"><strong>Total Expenses</strong></td>
                                    <td align="center"><strong><?php echo number_format($total_expenses,2); ?></strong></td>
                                </tr>
                                <tr class="success">
                                    <td colspan="4"><strong>CASH Withdraws</strong></td>
                                    <td align="center"><strong><?php 
                                    $total_withdraws = $this->data['withdraws']->total_withdraws?$this->data['withdraws']->total_withdraws:0;
                                    echo number_format($total_withdraws,2); ?></strong></td>
                                </tr>
                                <tr class="success">
                                    <td colspan="4"><strong>Net Profit</strong></td>
                                    <td align="center"><strong><?php 
                                    	$net_profit = $total_profit - $total_expenses; 
	                                    echo number_format($net_profit,2);
                                    ?></strong></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <?php
        endif;
        ?>
    </div>

</div>

</div>

</section>


<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>






