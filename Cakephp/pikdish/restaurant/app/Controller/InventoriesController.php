<?php
App::uses('AppController','Controller');

class InventoriesController extends AppController{
    
    public function beforeFilter(){
        parent::beforeFilter();
    }
        
    public function vendors(){
    }
    
    public function vendor_add(){
        $this->loadModel('Vendor');
        $this->loadModel('Country');
        $this->set('country',$this->Country->find('list'));
        if ($this->request->is('post')) {
            $this->Vendor->create();
            if ($this->Vendor->save($this->request->data)) {
                $this->Session->setFlash(__('The vendor has been saved.', true));
                return $this->redirect(array('action' => 'vendors'));
            } else {
                $this->Session->setFlash(__("The vendor could not be saved. Please, try again.", true));
            }
        }
    }
    
    public function vendor_edit($id=null){
        $this->loadModel('Vendor');
        $this->loadModel('Country');
        $this->loadModel('State');
        $this->loadModel('City');
        $this->set('country',$this->Country->find('list'));
        if (!$this->Vendor->exists($id)) {
            throw new NotFoundException(__('Invalid vendor'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Vendor->save($this->request->data)) {
                $this->Session->setFlash(__('The vendor has been saved.', true));
                return $this->redirect(array('action' => 'vendors'));
            } else {
                $this->Session->setFlash(__("The vendor could not be saved. Please, try again.", true));
            }
        } else {
            $this->request->data = $this->Vendor->find('first', array('conditions'=>array('Vendor.id'=>$id)));
            $this->set('state',$this->State->find('list',array('conditions'=>array( 'State.country_id'=>$this->request->data['Vendor']['country_id']))));
            $this->set('city',$this->City->find('list',array('conditions'=>array('City.state_id'=>$this->request->data['Vendor']['state_id']))));
        }
    }
    
    public function vendor_delete($id=null){
        $this->loadModel('Vendor');
        $this->autoRender = false;
        $this->Vendor->id = $id;
        if (!$this->Vendor->exists($id)) {
            throw new NotFoundException(__('Invalid Vendor'));
        }
        if ($this->request->is(array('ajax', 'delete'))) {
            if ($this->Vendor->delete()) {
                $data = array(
                    "message" => "Vendor has been successfully deleted",
                    "status" => "ok"
                 );
            } else {
                $data = Array(
                    "message" => "Vendor could not be deleted",
                    "status" => "error"
                );
            }
        }else{
            throw new NotFoundException(__('Invalid method'));
        }
        echo json_encode($data);
    }
    
    public function getvendor(){
        $this->autoRender = false;
        $this->loadModel('Vendor');
        $r = $this->request->query;
        $page = $r['page'];
        $rp = $r['rows'];
        if (!$page) $page = 1;
        if (!$rp) $rp = 20;
        $start = (($page-1) * $rp);
        $count=count($this->Vendor->find('list'));
        $total_pages = ( $count >0 )?ceil($count/$rp):0;
        ($page > $total_pages) AND $page=$total_pages;
        $result=$this->Vendor->find('all');
        $count=count($result);
        $json = '{
                    "page":'.$page.',
                    "total":'.$total_pages.',
                    "records":'.$count.',
                    "rows":[';
            foreach($result as $key => $row){
                $json .='{"id":"'.$row['Vendor']['id'].'","cell":["'.$row['Vendor']['name'].'","'.$row['Vendor']['address'].'","'.$row['Country']['name'].'","'.$row['State']['name'].'","'.$row['City']['name'].'","'.$row['Vendor']['mobile_no'].'","'.$row['Vendor']['email'].'"]},';
            }
        $json = rtrim($json, ',');
	$json .=']}';
        echo $json;
    }
    
    public function material(){
        
    }
    
    public function material_add(){
         $this->loadModel('Material');
         $this->loadModel('Unit');
         $this->set('unit',$this->Unit->find('list',array('fields'=>array('id','unit_name'))));
        if ($this->request->is('post')) {
            $this->Material->create();
            $this->request->data['Material']['restaurant_id'] = $this->Session->read('restro_id');
            if ($this->Material->save($this->request->data)) {
                $this->Session->setFlash(__('The material has been saved.', true));
                return $this->redirect(array('action' => 'material'));
            } else {
                $this->Session->setFlash(__("The material could not be saved. Please, try again.", true));
            }
        }
    }
    
    public function material_edit($id=null){
        $this->loadModel('Material');
        if (!$this->Material->exists($id)) {
            throw new NotFoundException(__('Invalid vendor'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Material->save($this->request->data)) {
                $this->Session->setFlash(__('The material has been saved.', true));
                return $this->redirect(array('action' => 'material'));
            } else {
                $this->Session->setFlash(__("The material could not be saved. Please, try again.", true));
            }
        } else {
            $this->request->data = $this->Material->find('first', array('conditions'=>array('Material.id'=>$id,'Material.restaurant_id'=>$this->Session->read('restro_id'))));
        }
        $this->loadModel('Unit');
        $this->set('unit',$this->Unit->find('list',array('fields'=>array('id','unit_name'))));
    }
    
    public function material_delete($id=null){
        $this->loadModel('Material');
        $this->autoRender = false;
        $this->Material->id = $id;
        if (!$this->Material->exists($id)) {
            throw new NotFoundException(__('Invalid Material'));
        }
        if ($this->request->is(array('ajax', 'delete'))) {
            try{
                if ($this->Material->deleteAll(array('Material.id'=>$id, 'Material.restaurant_id'=>$this->Session->read('restro_id')))) {
                    $data = array(
                        "message" => "Material has been successfully deleted",
                        "status" => "ok"
                     );
                } else {
                    $data = Array(
                        "message" => "Material could not be deleted",
                        "status" => "error"
                    );
                }
            } catch (Exception $ex) {
                $data = array(
                        "message" => "Material you are trying to delete is associated with other records.",
                        "status" => "error"
                     );
                // The exact error message is $e->getMessage();
            }
        }else{
            throw new NotFoundException(__('Invalid method'));
        }
        echo json_encode($data);
    }
    
    public function getmaterial(){
        $this->autoRender = false;
        $this->loadModel('Material');
        $r = $this->request->query;
        $page = $r['page'];
        $rp = $r['rows'];
        if (!$page) $page = 1;
        if (!$rp) $rp = 20;
        $start = (($page-1) * $rp);
        $count=count($this->Material->find('list'));
        $total_pages = ( $count >0 )?ceil($count/$rp):0;
        ($page > $total_pages) AND $page=$total_pages;
        $result=$this->Material->find('all',array('conditions'=>array('Material.restaurant_id'=>$this->Session->read('restro_id'))));
        $count=count($result);
        $json = '{
                    "page":'.$page.',
                    "total":'.$total_pages.',
                    "records":'.$count.',
                    "rows":[';
            foreach($result as $key => $row){
                $json .='{"id":"'.$row['Material']['id'].'","cell":["'.$row['Material']['material_code'].'","'.$row['Material']['name'].'","'.(($row['Material']['is_stockable']=='1')?'Yes':'No').'","'.$row['Unit']['unit_name'].'","'.$row['Material']['reorder_level'].'"]},';
            }
        $json = rtrim($json, ',');
	$json .=']}';
        echo $json;
    }
    
    public function purchase(){
        
    }
    
    public function purchase_add(){
        $this->loadModel('PurchaseH');
        if ($this->request->is('post')) {
            $this->PurchaseH->create();
            foreach($this->request->data['PurchaseL'] as $key=>$list){
            if(!$list['material_id']||!$list['qty']||!$list['unit_id']||!$list['unit_name']||!$list['rate']||!$list['tax_amt']){
                    unset($this->request->data['PurchaseL'][$key]);
                }
            }
            $this->request->data['PurchaseH']['restaurant_id'] = $this->Session->read('restro_id');
            if ($this->PurchaseH->saveAll($this->request->data)) {
                $this->loadModel('Material');
                foreach($this->request->data['PurchaseL'] as $list){
                    $this->Material->recursive = -1;
                    $material = $this->Material->find('first',array('conditions'=>array('Material.id'=>$list['material_id'])));
                    $data = array();
                    $data['Material']['id'] = $list['material_id'];
                    $data['Material']['purchase_qty'] = $list['qty'];
                    $data['Material']['avg_rate'] = ($material['Material']['closing_qty']*$material['Material']['avg_rate']) + ($list['qty']*$list['rate'])/($list['qty']+$material['Material']['closing_qty']);
                    $data['Material']['closing_qty'] = ($list['qty']+$material['Material']['op_qty'])-$material['Material']['consume_qty'];
                    $this->Material->save($data);
                    $this->loadModel('Restaurant');
                    $res['Restaurant']['id'] = $this->Session->read('restro_id');
                    $res['Restaurant']['vch_no'] = $this->request->data['PurchaseH']['vch_no'];
                    $this->Restaurant->save($res);
                }
                $this->Session->setFlash(__('The Purchase has been saved.', true));
                return $this->redirect(array('action' => 'purchase'));
            } else {
                $this->Session->setFlash(__("The Purchase could not be saved. Please, try again.", true));
            }
        }
        $this->loadModel('Material');
        $this->loadModel('Unit');
        $this->loadModel('Vendor');
        $this->loadModel('Restaurant');
        $this->Restaurant->recursive = -1;
        $res = $this->Restaurant->find('first',array('fields'=>array('vch_no'),'conditions'=>array('id'=>$this->Session->read('restro_id'))));
        $this->set('vhc_no',(int) (isset($res['Restaurant']['vch_no'])?$res['Restaurant']['vch_no']:0)+1);
        $this->set('vendor',$this->Vendor->find('list',array('fields'=>array('id','name'))));
        $this->set('unit',$this->Unit->find('list',array('fields'=>array('id','unit_name'))));
        $this->set('material',$this->Material->find('all',array('conditions'=>array('Material.restaurant_id'=>$this->Session->read('restro_id')))));
    }
    
    public function purchase_edit($id=null){
        $this->loadModel('PurchaseH');
        if (!$this->PurchaseH->exists($id)) {
            throw new NotFoundException(__('Invalid vendor'));
        }
        if ($this->request->is(array('post', 'put'))) {
             $data = $this->PurchaseH->find('first', array('conditions'=>array('PurchaseH.id'=>$id)));
             if($data['PurchaseH']['is_lock']==1){
                 return $this->redirect(array('action' => 'purchase_edit',$id));
             }
            foreach($this->request->data['PurchaseL'] as $key=>$list){
                if(!$list['material_id']||!$list['qty']||!$list['unit_id']||!$list['unit_name']||!$list['rate']||!$list['tax_amt']){
                    unset($this->request->data['PurchaseL'][$key]);
                }
            }
            $newitem = array();
            foreach($this->request->data['PurchaseL'] as $l){
                if(isset( $l['id'])){
                    array_push($newitem, $l['id']);
                }
            }
            
            $this->PurchaseH->PurchaseL->deleteAll(array(
                    'PurchaseL.purchase_h_id'=>$this->request->data['PurchaseH']['id'],
                    'PurchaseL.id NOT IN'=>$newitem), true);
            if ($this->PurchaseH->saveAll($this->request->data)) {
                $this->loadModel('Material');
                foreach($this->request->data['PurchaseL'] as $list){
                    $this->Material->recursive = -1;
                    $material = $this->Material->find('first',array('conditions'=>array('Material.id'=>$list['material_id'])));
                    $data = array();
                    $data['Material']['id'] = $list['material_id'];
                    $data['Material']['purchase_qty'] = $list['qty'];
                    $data['Material']['avg_rate'] = ($material['Material']['closing_qty']*$material['Material']['avg_rate']) + ($list['qty']*$list['rate'])/($list['qty']+$material['Material']['closing_qty']);
                    $data['Material']['closing_qty'] = ($list['qty']+$material['Material']['op_qty'])-$material['Material']['consume_qty'];
                    $this->Material->save($data);
                }
                $this->Session->setFlash(__('The purchase has been saved.', true));
                return $this->redirect(array('action' => 'purchase'));
            } else {
                $this->Session->setFlash(__("The purchase could not be saved. Please, try again.", true));
            }
        } else {
            $this->request->data = $this->PurchaseH->find('first', array('conditions'=>array('PurchaseH.id'=>$id,'PurchaseH.restaurant_id'=>$this->Session->read('restro_id'))));
        }
        $this->loadModel('Material');
        $this->loadModel('Unit');
        $this->loadModel('Vendor');
        $this->set('vendor',$this->Vendor->find('list',array('fields'=>array('id','name'))));
        $this->set('unit',$this->Unit->find('list',array('fields'=>array('id','unit_name'))));
        $this->set('material',$this->Material->find('all',array('conditions'=>array('Material.restaurant_id'=>$this->Session->read('restro_id')))));
    }
    
    public function purchase_delete($id=null){
        $this->loadModel('PurchaseH');
        $this->autoRender = false;
        $this->PurchaseH->id = $id;
        if (!$this->PurchaseH->exists($id)) {
            throw new NotFoundException(__('Invalid Purchase'));
        }
        if ($this->request->is(array('ajax', 'delete'))) {
            if ($this->PurchaseH->deleteAll(array('PurchaseH.id'=>$id,'PurchaseH.restaurant_id'=>$this->Session->read('restro_id')),true)) {
                $data = array(
                    "message" => "Purchase has been successfully deleted",
                    "status" => "ok"
                 );
            } else {
                $data = Array(
                    "message" => "Purchase could not be deleted",
                    "status" => "error"
                );
            }
        }else{
            throw new NotFoundException(__('Invalid method'));
        }
        echo json_encode($data);
    }
    
    public function getpurchase(){
        $this->autoRender = false;
        $this->loadModel('PurchaseH');
        $r = $this->request->query;
        $page = $r['page'];
        $rp = $r['rows'];
        if (!$page) $page = 1;
        if (!$rp) $rp = 20;
        $start = (($page-1) * $rp);
        $count=count($this->PurchaseH->find('list'));
        $total_pages = ( $count >0 )?ceil($count/$rp):0;
        ($page > $total_pages) AND $page=$total_pages;
        $result=$this->PurchaseH->find('all',array('conditions'=>array('PurchaseH.restaurant_id'=>$this->Session->read('restro_id'))));
        $count=count($result);
        $json = '{
                    "page":'.$page.',
                    "total":'.$total_pages.',
                    "records":'.$count.',
                    "rows":[';
            foreach($result as $key => $row){
                $json .='{"id":"'.$row['PurchaseH']['id'].'","cell":["'.$row['PurchaseH']['bill_no'].'","'.$row['PurchaseH']['bill_date'].'","'.$row['Vendor']['name'].'","'.$row['PurchaseH']['vch_no'].'","'.$row['PurchaseH']['vch_date'].'","'.$row['PurchaseH']['tax_amt'].'","'.$row['PurchaseH']['bill_amt'].'"]},';
            }
        $json = rtrim($json, ',');
	$json .=']}';
        echo $json;
    }
    
    public function build_material(){
        
    }
    
    public function build_material_add(){
        $this->loadModel('BuildMaterialH');
        if ($this->request->is('post')) {
            $this->BuildMaterialH->create();
            $this->request->data['BuildMaterialH']['restaurant_id'] = $this->Session->read('restro_id');
            foreach($this->request->data['BuildMaterialL'] as $key=>$list){
                if(!$list['material_id']||!$list['qty']||!$list['unit_id']||!$list['rate']){
                    unset($this->request->data['BuildMaterialL'][$key]);
                }
            }
            if ($this->BuildMaterialH->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The build of material has been saved.', true));
                return $this->redirect(array('action' => 'build_material'));
            } else {
                $this->Session->setFlash(__("The build of material could not be saved. Please, try again.", true));
            }
        }
        $this->loadModel('Material');
        $this->loadModel('Unit');
        $this->loadModel('ItemsRate');
        $item  = $this->ItemsRate->find("all",array("order"=>array("Item.item_name"),"fields"=>array("ItemsRate.id","Item.item_name","Portion.portion_name"),"conditions"=>array("Item.restuarant_id"=>$this->Session->read('restro_id')))); 
        $this->set('item',$item);
        $this->set('unit',$this->Unit->find('list',array('fields'=>array('id','unit_name'))));
        $this->set('material',$this->Material->find('all',array('fields'=>array('id','name','avg_rate','unit_id'),'conditions'=>array('Material.restaurant_id'=>$this->Session->read('restro_id')))));
    }
    
    public function build_material_edit($id=null){
        $this->loadModel('BuildMaterialH');
        if (!$this->BuildMaterialH->exists($id)) {
            throw new NotFoundException(__('Invalid vendor'));
        }
        if ($this->request->is(array('post', 'put'))) {
            foreach($this->request->data['BuildMaterialL'] as $key=>$list){
                if(!$list['material_id']||!$list['qty']||!$list['unit_id']||!$list['rate']){
                    unset($this->request->data['BuildMaterialL'][$key]);
                }
            }
            $newitem = array();
            foreach($this->request->data['BuildMaterialL'] as $l){
                if(isset( $l['id'])){
                    array_push($newitem, $l['id']);
                }
            }
            $this->BuildMaterialH->BuildMaterialL->deleteAll(array(
                    'BuildMaterialL.build_of_material_id'=>$this->request->data['BuildMaterialH']['id'],
                    'BuildMaterialL.id NOT IN'=>$newitem), true);
            if ($this->BuildMaterialH->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The build of material has been saved.', true));
                return $this->redirect(array('action' => 'build_material'));
            } else {
                $this->Session->setFlash(__("The build of material could not be saved. Please, try again.", true));
            }
        } else {
            $this->request->data = $this->BuildMaterialH->find('first', array('conditions'=>array('BuildMaterialH.id'=>$id,'BuildMaterialH.restaurant_id'=>$this->Session->read('restro_id'))));
        }
        $this->loadModel('Material');
        $this->loadModel('Unit');
        $this->loadModel('ItemsRate');
        $item  = $this->ItemsRate->find("all",array("order"=>array("Item.item_name"),"fields"=>array("ItemsRate.id","Item.item_name","Portion.portion_name"),"conditions"=>array("Item.restuarant_id"=>$this->Session->read('restro_id')))); 
        $this->set('item',$item);
        $this->set('unit',$this->Unit->find('list',array('fields'=>array('id','unit_name'))));
        $this->set('material',$this->Material->find('all'));
                $this->set('material',$this->Material->find('all',array('fields'=>array('id','name','avg_rate','unit_id'),'conditions'=>array('Material.restaurant_id'=>$this->Session->read('restro_id')))));
    }
    
    public function build_material_delete($id=null){
        $this->loadModel('BuildMaterialH');
        $this->autoRender = false;
        $this->BuildMaterialH->id = $id;
        if (!$this->BuildMaterialH->exists($id)) {
            throw new NotFoundException(__('Invalid Purchase'));
        }
        if ($this->request->is(array('ajax', 'delete'))) {
            if ($this->BuildMaterialH->deleteAll(array('BuildMaterialH.id'=>$id,'BuildMaterialH.restaurant_id'=>$this->Session->read('restro_id')),true)) {
                $data = array(
                    "message" => "Build of Material has been successfully deleted",
                    "status" => "ok"
                 );
            } else {
                $data = Array(
                    "message" => "Build of Material could not be deleted",
                    "status" => "error"
                );
            }
        }else{
            throw new NotFoundException(__('Invalid method'));
        }
        echo json_encode($data);
    }
    
    public function getbuild_material(){
         $this->autoRender = false;
        $this->loadModel('BuildMaterialH');
        $r = $this->request->query;
        $page = $r['page'];
        $rp = $r['rows'];
        if (!$page) $page = 1;
        if (!$rp) $rp = 20;
        $start = (($page-1) * $rp);
        $count=count($this->BuildMaterialH->find('list'));
        $total_pages = ( $count >0 )?ceil($count/$rp):0;
        ($page > $total_pages) AND $page=$total_pages;
        $this->BuildMaterialH->Behaviors->attach('Containable');
        $result=$this->BuildMaterialH->find('all',array('contain'=>array('BuildMaterialL','ItemsRate'=>array('Item')),'conditions'=>array('BuildMaterialH.restaurant_id'=>$this->Session->read('restro_id'))));
        $count=count($result);
        $json = '{
                    "page":'.$page.',
                    "total":'.$total_pages.',
                    "records":'.$count.',
                    "rows":[';
            foreach($result as $key => $row){
                $json .='{"id":"'.$row['BuildMaterialH']['id'].'","cell":["'.$row['BuildMaterialH']['no_of_items'].'","'.$row['ItemsRate']['Item']['item_name'].'","'.$row['BuildMaterialH']['total_cost'].'"]},';
            }
        $json = rtrim($json, ',');
	$json .=']}';
        echo $json;
    }
}