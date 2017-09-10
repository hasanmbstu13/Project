<?php $this->assign('title', 'Dashboard');

echo $this->Html->script(array('/js/shortcut/shortcut.js'));
echo $this->Html->script($path.'js/lightbox/js/lightbox.min.js');
echo $this->Html->css($path.'js/lightbox/css/lightbox.min.css');
?>

<style>
.sidebar-footer{ min-height:60px !important }
.error {  padding-left:10px;  color:red  }
 input {  padding:5 5 5 5;  border-radius: 4px !important;  width:42% !important;}
input[type=radio]{padding-top:5px;border-radius: 4px !important;width:5% !important;}
	   input[type=checkbox]
	   {
		  
		   width:5% !important;
		  height:20px;
		  padding-left:2px;
		   
	   }
	    .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }
	   
	   .bs-searchbox input
	    {
		    width:100% !important;
		}
    .table-booking{
      width: 12% !important;
      float: left;
      border: 1px solid #c5c5c5;
      margin: 1px;
      padding: 20px;
      text-align: center;
      border-radius: 3px;
    }
    .maroon{
      color: #800000;
    }
	 .fa-1x{
    font-size: 10px;
     }
     .table-active {
      background: #1ABB9C;
      color: #ffffff;
     }
    .timeline h2.title{
      font-size: 13px !important;
    }
	   
	   
</style>
<div class="right_col" role="main">
  <!--Inventory-->
  <div class="row tile_count">
    <div class="col-md-1 text-center col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-list-ul"></i> Categories</span>
      <div class="count"><?php echo $categories; ?></div>
    </div>
    <div class="col-md-2 text-center col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-tags"></i> Items </span>
      <div class="count"><?php echo $items; ?></div>
    </div>
    <div class="col-md-2 text-center col-sm-4 col-xs-6 tile_stats_count maroon">
      <span class="count_top"><i class="fa fa-rupee"></i> Wallet Amount</span>
      <div class="count"><?php echo intval($wallet); ?></div>
    </div>
    <div class="col-md-2 text-center col-sm-4 col-xs-6 tile_stats_count maroon">
      <span class="count_top"><i class="fa fa-rupee"></i> Today Collection</span>
      <div class="count"><?php echo intval($collection) ?></div>
    </div>
    <div class="col-md-1 text-center col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top">Rating</span>
      <div class="count_top" style="margin-top: 15px;">
        <?php for($r = 1; $r <= $rating[0]['Restaurant']['rating']; $r++ )
          echo '<i class="fa fa-star green"></i>';
        ?>
      </div>
    </div>
    <div class="col-md-2 text-center col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Pre-Order</span>
      <div class="count"><?php echo $pre_order; ?></div>
    </div>
    <div class="col-md-2 text-center col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Packing</span>
      <div class="count"><?php echo $order_packing; ?></div>
    </div>
  </div>
  <!--end Inventory-->
  <!--Last Week Sales in Amount-->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">

        <div class="row x_title">
          <div class="col-md-9">
            <h4>Last Week Sales in Amount</h4>
          </div>
          <div class="col-md-3">
              <h4>Most Popular Items</h4>
          </div>
        </div>

        <div class="col-md-9 col-sm-9 col-xs-12">
          <div id="weekly_sales_amount" class="demo-placeholder"></div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
          <div class="col-md-12 col-sm-12 col-xs-6">
          <?php foreach( $most_popular as  $popular ):?>
            <div>
              <p><?php echo $popular['OrdersL']['item_name']?></p>
              <div class="">
                <div class="progress progress_sm" style="width: 100%;">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $popular['0']['quantity']; ?>"></div>
                </div>
              </div>
            </div>
        <?php endforeach; ?>

        </div>

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
<!--Last Week Sales in Amount end-->
<!--Last Week Sales in Number-->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">

        <div class="row x_title">
          <div class="col-md-9">
            <h4>Last Week Sales in Number</h4>
          </div>
          <div class="col-md-3">
              <h4>Latest 5 Feedback</h4>
          </div>
        </div>

        <div class="col-md-9 col-sm-9 col-xs-12">
          <div id="weekly_sales_number" class="demo-placeholder"></div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
          <div class="x_panel">
            <div class="x_content">
              <div class="dashboard-widget-content">

                <ul class="list-unstyled timeline widget">
                <?php foreach( $feedbacks as $feedback): ?>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title"><?php echo $feedback['User']['name']?>
                        (
                          <?php for($r = 1; $r <= $feedback['Feedbacks']['rating']; $r++ )
                            echo '<i class="fa fa-star fa-1x green"></i>';
                          ?>
                          )
                        </h2>
                        <p class="excerpt"><?php echo date('d/m/Y',strtotime($feedback['Feedbacks']['entry_date']))." ".$feedback['Feedbacks']['feedback_text']?>
                        </p>
                      </div>
                    </div>
                    
                  </li>
                <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
<!--Last Week Sales in Number end-->
<!--Last Week Sales in Number-->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">

        <div class="row x_title">
          <div class="col-md-9">
            <h4>Table Book Status</h4>
          </div>
          <div class="col-md-3">
              <h4>Most Cancelled Items</h4>
          </div>
        </div>

        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="row">
          <?php 
          for($i = 1; $table_number['0']['tables'] >= $i; $i++ ): 
            $active = '0';
              foreach ( $table_book_status as $status ):  
                if( $status['OrdersH']['restaurant_tables_id'] == $i ):
                  $active = '1';
                endif;
              endforeach;

              if( $active ) :
                echo '<div class="table-booking table-active">';
              else :
                echo '<div class="table-booking">';
              endif;
       
              echo $i.'</div>';
            endfor;
            ?>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 bg-white">
            <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>No. of Cancel</th>
                  </tr>
                </thead>
                <tbody>
                <?php if( $most_cancel ): ?>
                  <?php foreach( $most_cancel as $cancel ): ?>
                  <tr>
                    <th scope="row"><?php echo $cancel['OrdersL']['id']; ?></th>
                    <td><?php echo $cancel['OrdersL']['item_name']; ?></td>
                    <td class="text-center"><?php echo $cancel['0']['cancel']; ?></td>
                  </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
              </table>  
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
<!--Last Week Sales in Number end-->
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?></div>
    </div>
  </div>

<div id="dialog-alert" title="Warning" style="display:none" ></div>	

<?php echo $this->Html->script($path.'js/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>

<?php echo $this->Html->script($path.'js/Flot/jquery.flot.js'); ?>
<?php echo $this->Html->script($path.'js/Flot/jquery.flot.pie.js'); ?>
<?php echo $this->Html->script($path.'js/Flot/jquery.flot.time.js'); ?>
<?php echo $this->Html->script($path.'js/Flot/jquery.flot.stack.js'); ?>
<?php echo $this->Html->script($path.'js/Flot/jquery.flot.resize.js'); ?>
<!--FLOT plugin -->
<?php echo $this->Html->script($path.'js/flot.orderbars/js/jquery.flot.orderBars.js'); ?>
<?php echo $this->Html->script($path.'js/flot-spline/js/jquery.flot.spline.min.js'); ?>
<?php echo $this->Html->script($path.'js/flot.curvedlines/curvedLines.js'); ?>

<script type="text/javascript">
$(document).ready( function(){
  if ($(".progress .progress-bar")[0]) {
      $('.progress .progress-bar').progressbar();
  }
   function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }

        var weekly_sales_amount = [
          <?php 
            $start_date = date('Y-m-d', strtotime("-1 weeks") );
            $end_date = date('Y-m-d');

            while( strtotime($start_date) <= strtotime($end_date) ){
              $start_date = date('Y-m-d', strtotime("+1 day", strtotime($start_date) ) );
              foreach ( $weekly_sales as $sale ) {
                if( $sale['0']['entry_date'] == $start_date) {
                  echo "[gd(".date('Y,n,d',strtotime($start_date))."), ".intval($sale['0']['total'])."],";
                } else {
                  echo "[gd(".date('Y,n,d',strtotime($start_date))."), 0],";
                }
                # code...
              }
            }
          ?>
        ];
        var weekly_sales_number = [
          <?php 
            $start_date = date('Y-m-d', strtotime("-1 weeks") );
            $end_date = date('Y-m-d');

            while( strtotime($start_date) <= strtotime($end_date) ){
              $start_date = date('Y-m-d', strtotime("+1 day", strtotime($start_date) ) );
              foreach ( $weekly_number as $sale ) {
                if( $sale['0']['entry_date'] == $start_date) {
                  echo "[gd(".date('Y,n,d',strtotime($start_date))."), ".$sale['0']['weekly_number']."],";
                } else {
                  echo "[gd(".date('Y,n,d',strtotime($start_date))."), 0],";
                }
                # code...
              }
            }
          ?>
        ];

  var chart_plot_01_settings = {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickDecimals: 0,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        }


    if ($("#weekly_sales_amount").length){
      console.log('Plot1');
      
      $.plot( $("#weekly_sales_amount"), [ weekly_sales_amount ],  chart_plot_01_settings );
    }

    
    if ($("#weekly_sales_number").length){
      console.log('Plot2');
      $.plot( $("#weekly_sales_number"), [ weekly_sales_number ],  chart_plot_01_settings );
    }

});
</script>