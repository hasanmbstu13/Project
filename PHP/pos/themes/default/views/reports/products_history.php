<?php 
    // var_dump($this->data['p_history']); 
    // echo $Settings->header; 
    // exit;
?>


<head>
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
	        	font-size: 10px;
        	}
        	        
/*
            .no-print { display: none; }
            .main-footer,.box-header {
                display: none;
            }

            .reports_date{
                display: block;
            }

            #form,.content-header, .custom-alerts  {
                display: none;
            }

            .content h1 {
                display: none;
            }
            .box, box-primary{
                display: none;
            } 
        .container h4, .main-footer, .main-header,
        .box-header, .clearfix, .panel-body { display: none; }
        #wrapper {   width: auto; }
        body #wrapper, body #wrapper div{
            display: block; 
        }
        .office_address{
            display: block;            
        }
*/
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>

<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">

                <div class="box-header no-print">
                    <h3 class="box-title"><?php 
                    if (isset($this->data['start_date'])) echo 'Reports from '.$this->data['start_date']; 
                    if (isset($this->data['end_date'])) echo ' to '.$this->data['end_date'];?></h3>
                </div>

                <div class="box-body">
	                    <div id="form" class="panel panel-warning no-print">
	                        <div class="panel-body">
	                         <?php  echo form_open("reports/products_history", array('method'=>'get')) ?>
	                         <?php //echo form_open("reports/products_history") ?>
			                         <div class="row">
			
				                         <div class="col-sm-3">
				                             <div class="form-group">
				                                 <label class="control-label" for="product_name"><?= lang("product_name"); ?></label>
				                                 <?= form_input('product_name', set_value('product_name'));?>
				                             </div>
				                         </div>
			
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
			                                <?//= form_submit('submit', 'submit');?>
			                                <button type="submit" class="btn btn-primary"><?= lang("submit"); ?></button>
			                            </div>
			                        </div>
	                        <?= form_close();?>
	                    </div>
	                </div>
	                <div class="clearfix no-print">
	                    <a href="" style="float: right;" target="_blank"  onClick="window.print()"><span class="glyphicon glyphicon-print"></span></a>
	                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="wrapper" class="table-responsive" >
                            <!--div class="office_address text-center">
                                <?= $Settings->header ?>
                            </div-->
                            <?php if(count($this->data['p_history'])>0) { ?>
                            <div class="reports_date">
                                <h3>Product stock reports from <?php if (isset($this->data['start_date'])): echo $this->data['start_date']; else: echo 'X'; endif; ?> - <?php if (isset($this->data['end_date'])): echo $this->data['end_date']; else: echo 'Y'; endif; ?> </h3>                           
                            </div>

                            <table class="table table-hover table-striped table-condensed" >
                                <thead>
                                    <tr>
                                        <th align="left">Product Code</th>
                                        <th>Quantity</th>
                                        <th>Sold On that duration</th>                                    
                                        <th>Price</th>
                                        <th>Store Cost</th>
                                        <!-- <th>Added Date</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->data['p_history'] as $product) { ?>
                                    <?php   ?>
                                       <tr>
                                           <!-- <td align="center"><?= $product->code ?></td> -->
                                           <td align="center"><?= $product->code ?></td>
                                           <td align="center"><?= (int)$product->quantity ?></td>
                                           <td align="center"><?= (int)$product->SOLD ?></td>
                                           <td align="center"><?= (int)$product->price ?></td>
                                           <td align="center"><?= (int)$product->cost ?></td>
                                           <!-- <td align="center"><?php if($product->date){ $unixdatetime = strtotime($product->date); echo date("D M d, g:iA", $unixdatetime); } else echo $product->date;  ?></td> -->
                                       </tr>
                                   <?php } ?>

                                    <!-- <tr class="success">
                                        <td align="center"><strong><?php echo $no_of_orders;?></strong></td>
                                        <td align="center" colspan="2"><strong><?php echo $no_of_products;?></strong></td>
                                        <td align="center"><strong></strong></td>
                                        <td align="center"><strong><?php echo $grand_total;?></strong></td>
                                        <td align="center"><strong><?php  echo $total_profit ?></strong></td>
                                    </tr> -->
                                </tbody>
                            </table>
                        <?php } ?>
                        </div>
                    </div>
                </div>                
                </div>
                
            </div>
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






