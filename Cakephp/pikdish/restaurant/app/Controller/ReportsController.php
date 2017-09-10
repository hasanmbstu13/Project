<?PHP

App::uses('AppController', 'Controller');

class ReportsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();

        // Allow users to register and logout. This makes this request public (no login needed)
        $this->Auth->allow('logout', 'forgot_password', 'request_new_password', 'reset_password', 'perform_reset_password', 'register', 'activate');
    }

    public function isAuthorized($user) {

        return parent::isAuthorized($user);
        return true;
    }

    public function purchase_register() { }

    public function stock() { }

    public function day_book_sales() { }

    public function day_book_cancel() { 
       /* $this->autoRender = false;
        $this->loadModel('OrdersL');
        debug( $this->OrdersL->find('all'));*/
    }

    //JSON
    public function jsonPurchase( ) {

        $this->autoRender = false;
        $this->loadModel('PurchaseH');

        $r = $_GET;
        $page=$r['page'];
        $rp=$r['rows'];
        $sortorder=$r['sord'];
        $sortname=$r['sidx'];
        if( isset($r['start_date']) && isset($r['end_date']) ){
            $start_date = $r['start_date'];
            $end_date = $r['end_date'];  
        }

        if (!$page) $page = 1;
        if (!$rp) $rp = 5;
        $start = (($page-1) * $rp);

        $where = array();
        $count=count($this->PurchaseH->find('list'));

        if( $count > 0 ) {
            $total_pages = ceil($count/$rp);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) $page = $total_pages;

        if($r['_search'] == 'true')  {

            $r['filters'] = str_replace("\\","",$r['filters']);
            $arr = json_decode($r['filters'],true); 

            foreach( $arr['rules'] as $index => $data) {
                    $where[$data['field'].' like']='%'.$data['data'].'%';
   
            }
       }

       if( !empty($start_date) && !empty($end_date)  ){
            $where = array( 'date(PurchaseH.vch_date ) BETWEEN ? and ?' => array( $start_date, $end_date ) );
       }

       $result = $this->PurchaseH->find('all',array(
                                    'order'=> $sortname.' '.$sortorder,
                                    'limit'=>$rp,
                                    'offset'=>$start,
                                    "conditions"=>$where));
       $count=count($result);
       $json = '{
                "page":'.$page.',
                "total":'.$total_pages.',
                "records":'.$count.',
                "rows":[';
       foreach($result as $key => $row) {
    
            if(($key+1)==$count) {
                $json.='{"id":"'.$row['PurchaseH']['id'].'","cell":["'.date('d M, Y', strtotime( $row['PurchaseH']['vch_date']) ).'","'.$row['PurchaseH']['vch_no'].'","'.$row['Vendor']['name'].'","'.$row['PurchaseH']['bill_no'].'","'.date('d M, Y', strtotime( $row['PurchaseH']['bill_date']) ).'","'.$row['PurchaseH']['tax_amt'].'","'.$row['PurchaseH']['bill_amt'].'"]}';
            } else {
                $json.='{"id":"'.$row['PurchaseH']['id'].'","cell":["'.date('d M, Y', strtotime( $row['PurchaseH']['vch_date']) ).'","'.$row['PurchaseH']['vch_no'].'","'.$row['Vendor']['name'].'","'.$row['PurchaseH']['bill_no'].'","'.date('d M, Y', strtotime( $row['PurchaseH']['bill_date']) ).'","'.$row['PurchaseH']['tax_amt'].'","'.$row['PurchaseH']['bill_amt'].'"]},';
            }
        }

        $json.=']}';
        echo $json;
        exit();
    }

    public function jsonStock( ) {

        $this->autoRender = false;
        $this->loadModel('Material');

        $r = $_GET;
        $page=$r['page'];
        $rp=$r['rows'];
        $sortorder=$r['sord'];
        $sortname=$r['sidx'];
        if (!$page) $page = 1;
        if (!$rp) $rp = 5;
        $start = (($page-1) * $rp);

        $where = array();
        $count=count($this->Material->find('list'));

        if( $count > 0 ) {
            $total_pages = ceil($count/$rp);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) $page = $total_pages;

        if($r['_search'] == 'true')  {

            $r['filters'] = str_replace("\\","",$r['filters']);
            $arr = json_decode($r['filters'],true); 

            foreach( $arr['rules'] as $index => $data) {
                    $where[$data['field'].' like']='%'.$data['data'].'%';
   
            }
       }

       $result = $this->Material->find('all',array(
                                    'order'=> $sortname.' '.$sortorder,
                                    'limit'=>$rp,
                                    'offset'=>$start,
                                    "conditions"=>$where));
       $count=count($result);
       $json = '{
                "page":'.$page.',
                "total":'.$total_pages.',
                "records":'.$count.',
                "rows":[';
       foreach($result as $key => $row) {
    
            if(($key+1)==$count) {
                $json.='{"id":"'.$row['Material']['id'].'","cell":["'.$row['Material']['name'].'","'.$row['Material']['op_qty'].'","'.$row['Material']['purchase_qty'].'","'.$row['Material']['consume_qty'].'","'.$row['Material']['closing_qty'].'"]}';
            } else {
                $json.='{"id":"'.$row['Material']['id'].'","cell":["'.$row['Material']['name'].'","'.$row['Material']['op_qty'].'","'.$row['Material']['purchase_qty'].'","'.$row['Material']['consume_qty'].'","'.$row['Material']['closing_qty'].'"]},';
            }
        }

        $json.=']}';
        echo $json;
        exit();
    }

    public function jsonBookSale( ) {

        $this->autoRender = false;
        $this->loadModel('OrdersH');

        $r = $_GET;
        $page=$r['page'];
        $rp=$r['rows'];
        $sortorder=$r['sord'];
        $sortname=$r['sidx'];
        if( isset($r['start_date']) && isset($r['end_date']) ){
            $start_date = $r['start_date'];
            $end_date = $r['end_date'];  
        }
        if (!$page) $page = 1;
        if (!$rp) $rp = 5;
        $start = (($page-1) * $rp);

        $where = array(/*'OrdersH.restaurant_id' => $this->Session->read('resto_id') */);
        $count=count($this->OrdersH->find('list'));

        if( $count > 0 ) {
            $total_pages = ceil($count/$rp);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) $page = $total_pages;

        if($r['_search'] == 'true')  {

            $r['filters'] = str_replace("\\","",$r['filters']);
            $arr = json_decode($r['filters'],true); 

            foreach( $arr['rules'] as $index => $data) {
                    $where[$data['field'].' like']='%'.$data['data'].'%';
   
            }
       }

       if( !empty($start_date) && !empty($end_date)  ){
            $where = array( 'date(OrdersH.entry_date ) BETWEEN ? and ?' => array( $start_date, $end_date ) );
       }

       $result = $this->OrdersH->find('all',array(
                                    'order'=> $sortname.' '.$sortorder,
                                    'limit'=>$rp,
                                    'offset'=>$start,
                                    "conditions"=>$where));
       $count=count($result);
       $json = '{
                "page":'.$page.',
                "total":'.$total_pages.',
                "records":'.$count.',
                "rows":[';
       foreach($result as $key => $row) {
    
            if(($key+1)==$count) {
                $json.='{"id":"'.$row['OrdersH']['id'].'","cell":["'.date('d M, Y', strtotime( $row['OrdersH']['entry_date']) ).'","'.$row['OrdersH']['order_no'].'","'.$row['OrdersH']['inv_no'].'","'.date('d M, Y', strtotime( $row['OrdersH']['inv_date'] )).'","'.$row['User']['name'].'","'.$row['OrdersH']['total_amt'].'","'.$row['OrdersH']['vat_cgst'].'","'.$row['OrdersH']['total_amt'].'"]}';
            } else {
                $json.='{"id":"'.$row['OrdersH']['id'].'","cell":["'.date('d M, Y', strtotime( $row['OrdersH']['entry_date'] )).'","'.$row['OrdersH']['order_no'].'","'.$row['OrdersH']['inv_no'].'","'.date('d M, Y', strtotime( $row['OrdersH']['inv_date'] )).'","'.$row['User']['name'].'","'.$row['OrdersH']['total_amt'].'","'.$row['OrdersH']['vat_cgst'].'","'.$row['OrdersH']['total_amt'].'"]},';
            }
        }

        $json.=']}';
        echo $json;
        exit();
    }

    public function jsonBookCancel( ) {
        $this->autoRender = false;
        $this->loadModel('OrdersL');

        $r = $_GET;
        $page=$r['page'];
        $rp=$r['rows'];
        $sortorder=$r['sord'];
        $sortname=$r['sidx'];
        if( isset($r['start_date']) && isset($r['end_date']) ){
            $start_date = $r['start_date'];
            $end_date = $r['end_date'];  
        }
        if (!$page) $page = 1;
        if (!$rp) $rp = 5;
        $start = (($page-1) * $rp);

        $where = array(
                    'OrdersL.restaurant_id' => $this->Session->read('restro_id'),
                    'OrdersL.is_cancel' => 0,
                    );
        $count=count($this->OrdersL->find('list'));

        if( $count > 0 ) {
            $total_pages = ceil($count/$rp);
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) $page = $total_pages;

        if($r['_search'] == 'true')  {

            $r['filters'] = str_replace("\\","",$r['filters']);
            $arr = json_decode($r['filters'],true); 

            foreach( $arr['rules'] as $index => $data) {
                    $where[$data['field'].' like']='%'.$data['data'].'%';
   
            }
       }

       if( !empty($start_date) && !empty($end_date)  ){
            $where = array( 
                'date(OrdersL.entry_date_time ) BETWEEN ? and ?' => array( $start_date, $end_date ),
                'OrdersL.restaurant_id' => $this->Session->read('restro_id'),
                'OrdersL.is_cancel' => 1, 
                );
       }

       $result = $this->OrdersL->find('all',array(
                                    'order'=> $sortname.' '.$sortorder,
                                    'limit'=>$rp,
                                    'offset'=>$start,
                                    "conditions"=>$where));
       $count=count($result);
       $json = '{
                "page":'.$page.',
                "total":'.$total_pages.',
                "records":'.$count.',
                "rows":[';
       foreach($result as $key => $row) {
    
            if(($key+1)==$count) {
                $json.='{"id":"'.$row['OrdersL']['id'].'","cell":["'.$row['OrdersH']['order_no'].'","'.date('d M, Y', strtotime( $row['OrdersL']['entry_date_time']) ).'","'.$row['OrdersL']['item_name'].'","'.$row['OrdersL']['qty'].'"]}';
            } else {
                $json.='{"id":"'.$row['OrdersL']['id'].'","cell":["'.$row['OrdersH']['order_no'].'","'.date('d M, Y', strtotime( $row['OrdersL']['entry_date_time']) ).'","'.$row['OrdersL']['item_name'].'","'.$row['OrdersL']['qty'].'"]},';
            }
        }

        $json.=']}';
        echo $json;
        exit();
    }

    public function exportPurchase(){
        $this->loadModel('PurchaseH');
        $sql = "SELECT `PurchaseH`.`vch_date` AS `Voucher_Date`, `PurchaseH`.`vch_no` AS `Voucher_No`, `Vendor`.`name` AS `Vendor_Name`, `PurchaseH`.`bill_no` AS `Bill_No`, `PurchaseH`.`bill_date` AS `Bill_Date`, `PurchaseH`.`tax_amt` AS `Tax_Amount`, `PurchaseH`.`bill_amt` AS `Bill_Amount`, `PurchaseH`.`id` FROM `pikdish_onlinemenu`.`om_purchase_h` AS `PurchaseH` LEFT JOIN `pikdish_onlinemenu`.`om_vendors` AS `Vendor` ON (`PurchaseH`.`vendor_id` = `Vendor`.`id`)  WHERE 1 = 1";

        $data = $this->PurchaseH->query($sql);

        $this->Export->exportCsv($data, 'purchase.csv');
    }


    public function exportStock(){
        $this->loadModel('Material');
        $data = $this->Material->find('all', array(
             'fields' => array(
                                'Material.name AS Name',
                                'Material.op_qty AS Opening_Quantity',
                                'Material.purchase_qty AS Purchase_Quantity',
                                'Material.consume_qty AS Consume_Quantity',
                                'Material.closing_qty AS Closing_Quantity'

                              )
            )
        );

        $this->Export->exportCsv($data, 'stock.xls');
    }


    public function exportBookSale(){
        $this->loadModel('OrdersH');
        $data = $this->OrdersH->find('all', array(
             'fields' => array(
                                'OrdersH.entry_date AS Entry_Date',
                                'OrdersH.order_no AS Order_No',
                                'OrdersH.inv_no AS Invoice_No',
                                'OrdersH.inv_date AS Invoice_Date',
                                'User.name AS Name',
                                'OrdersH.total_amt AS Total_amount',
                                'OrdersH.vat_cgst AS Vat_Cgst',
                                'OrdersH.total_amt AS Total_amount'

                              )
            )
        );

        $this->Export->exportCsv($data, 'booksale.csv');
    }

    public function exportBookCancel(){
        $this->loadModel('OrdersL');
        $data = $this->OrdersL->find('all', array(
             'fields' => array(
                                'OrdersH.order_no AS Order_No',
                                'OrdersL.entry_date_time AS Entry_Date_Time',
                                'OrdersL.item_name AS Item_Name',
                                'OrdersL.qty AS Quantity'
                              ),
              'conditions' => array(
                    'OrdersL.restaurant_id' => $this->Session->read('restro_id'),
                    'OrdersL.is_cancel' => 0
                    )
            )
        );

        $this->Export->exportCsv($data, 'bookcancel.csv');
    }





}
?>
