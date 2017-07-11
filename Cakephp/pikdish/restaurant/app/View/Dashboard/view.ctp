<?php $this->assign('title', 'Dashboard');
echo $this->Html->script($path.'/js/print/jQuery.print.js');

echo $this->Html->script(array('/js/shortcut/shortcut.js'));
echo $this->Html->script($path.'js/datatables.net/js/jquery.dataTables.min.js');
echo $this->Html->script($path.'js/datatables.net-bs/js/dataTables.bootstrap.min.js');
echo $this->Html->script($path.'js/datatables.net-buttons/js/dataTables.buttons.min.js');
echo $this->Html->script($path.'js/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');
echo $this->Html->script($path.'js/datatables.net-buttons/js/buttons.flash.min.js');
echo $this->Html->script($path.'js/datatables.net-buttons/js/buttons.html5.min.js');
echo $this->Html->script($path.'js/datatables.net-buttons/js/buttons.print.min.js');
echo $this->Html->script($path.'js/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');
echo $this->Html->script($path.'js/datatables.net-keytable/js/dataTables.keyTable.min.js');
echo $this->Html->script($path.'js/datatables.net-responsive/js/dataTables.responsive.min.js');
echo $this->Html->script($path.'js/datatables.net-responsive-bs/js/responsive.bootstrap.js');
echo $this->Html->script($path.'js/datatables.net-scroller/js/dataTables.scroller.min.js');
echo $this->Html->script($path.'js/jszip/dist/jszip.min.js');
echo $this->Html->script($path.'js/pdfmake/build/pdfmake.min.js');
echo $this->Html->script($path.'js/pdfmake/build/vfs_fonts.js');

echo $this->Html->css($path.'js/datatables.net-bs/css/dataTables.bootstrap.min.css');
echo $this->Html->css($path.'js/datatables.net-buttons-bs/css/buttons.bootstrap.min.css');
echo $this->Html->css($path.'js/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css');
echo $this->Html->css($path.'js/datatables.net-responsive-bs/css/responsive.bootstrap.min.css');
echo $this->Html->css($path.'js/datatables.net-scroller-bs/css/scroller.bootstrap.min.css');

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
    .form-control{
      width: 100%;
    }
    .checkbox label {
      min-height: 18px !important;
    }
    .table>tbody>tr>td{
      vertical-align: middle;
    }
	   
	   
</style>
<div class="right_col" role="main">
  <!--Inventory-->
  <div class="row tile_count">
      <div class="col-md-3 text-center col-sm-4 col-xs-6 tile_stats_count">
        <div class="x_panel">
              <table class="table">
                <tbody>
                  <tr>
                    <td> Table Order </td>
                    <td>Add Manually</td>
                  </tr>
                   <tr>
                    <td style="vertical-align: top;">
                      <?php 
                      $count = 1;
                      foreach( $orders as $table): ?>
                        <p><span class="label label-success"><?php echo $count++; ?></span></p>
                      <?php endforeach; ?>
                    </td>
                    <td class="text-center">
                      <p><span class="label label-primary">Status</span></p>
                      <p><span class="label label-primary">New Order</span></p>
                      <p><span class="label label-primary">Bill</span></p>
                      <p><span class="label label-primary">Payment Peding</span></p>
                    </td>
                  </tr>
                
                </tbody>
              </table>
        </div>
      </div>

      <div class="col-md-6 col-sm-4 col-xs-6 tile_stats_count">
      <?php foreach( $orders as $order) : ?>
        <div class="x_panel">
          <div class="x_content">
            <table id="datatable" class="datatable table table-striped table-bordered">
              <thead>
                <tr>
                  <td colspan="4">Orders</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Table No: <?php echo ( $order ) ? $order['OrdersH']['restaurant_tables_id'] : ''; ?></td>
                  <td>Order No: <?php echo ( $order ) ? $order['OrdersH']['order_no'] : ''; ?> </td>
                  <td colspan="2">Amount: <?php echo ( $order ) ? $order['OrdersH']['net_amt'] : ''; ?> </td>
                </tr>
                <tr>
                  <td colspan="4">Online payment recieved from transaction id:</td>
                </tr>
                <tr>
                  <td colspan="2">
                      <button id="confirm" type="submit" class="btn btn-success">Confirm and KOT</button>
                      <button id="send" type="submit" class="btn btn-success">On Table</button>
                  </td>
                   <td colspan="2">
                      <button id="send" type="submit" class="btn btn-success">Print Bill</button>
                      <button id="send" type="submit" class="btn btn-success">Payment Recieved</button>
                  </td>
                </tr>
                 <tr>
                  <td></td>
                  <td colspan="2" class="text-center">Item Name</td>
                  <td class="text-center">Quantity</td>
                </tr>
                <?php foreach( $order['OrdersL'] as  $item ) : ?>
                  <tr>
                    <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="<?php echo $item['id']; ?>" class="flat" data-name="<?php echo $item['item_name']; ?>" />
                          </label>
                          <a href=""><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                    <td colspan="2"><?php echo $item['item_name']; ?></td>
                    <td class="text-center"><?php echo $item['qty']; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
           <div class="clearfix"></div>
          <textarea placeholder="No for Chef" class="form-control col-md-12"></textarea>
        </div>
        <?php endforeach; ?>
      </div>

      <div class="col-md-3 text-center col-sm-4 col-xs-6 tile_stats_count">
        <div class="x_panel">
            <h2 class="count_top">Pre-Order / Packing</h2>
            <table class="table">
              <tbody>
                <tr>
                  <td>Order No:</td>
                  <td> Type </td>
                  <td>Status</td>
                </tr>
               <?php foreach( $orders as $order) : ?>
                 <tr>
                  <td>
                    <p><span class="label label-default">
                      <?php echo $order['OrdersH']['order_no']; ?>
                    </span></p>
                  </td>
                  <td>
                    <p><span class="label label-success">
                    <?php echo ( $order['OrdersH']['order_type'] == 1 ) ? 'Pre-Order' : 'Packing' ; ?>
                    </span></p>
                  </td>
                  <td>
                    <p><span class="label label-danger">
                      <?php echo ( $order['OrdersH']['order_type'] == 1 ) ? 'New Order': ''; ?></td>
                    </span></p>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  <!--end Inventory-->
  <div class="clearfix"></div>
  

<div id="dialog-alert" title="Warning" style="display:none" ></div>	

<script type="text/javascript">
$(document).ready( function(){
  
  /*$('#datatable').DataTable({
    'bSortable': false
  });*/
  $('.flat').click( function(){
    //var val = [];
    //$('.flat:checked').each(function(i){

      if( $(this).prop('checked') ) {
        if( !confirm( 'Are you sure you want to check item '+ $(this).data('name') ) ) return false;
          id = $(this).val();
          url = '<?php echo $path;?>dashboard/getConfirmed/'+ id;
          $.ajax({
            type : "GET",
            accepts: {json: 'application/json'},
            url : url,
            dataType: 'json',
            success : function ( data ) {
              console.log('success' + data );
            },
            error: function( err ){
              console.log( err.responseText );
            }

          })
      }
  });
  
  $('.collapse-link').on('click', function() {
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');
        
        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function(){
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200); 
            $BOX_PANEL.css('height', 'auto');  
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('.close-link').click(function () {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
  
});
</script>