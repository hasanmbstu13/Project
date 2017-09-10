<?PHP
App::uses('AppController','Controller');
class AppFeedbackController extends AppController
{
	public function beforeFilter() 
	{
	    parent::beforeFilter();
		$this->path = Router::url('/', true) ;
	    // Allow users to register and logout. This makes this request public (no login needed)
	   	$this->Auth->allow('logout', 'forgot_password', 'request_new_password', 'reset_password', 'perform_reset_password','register','activate');
	}
	
	
	public function isAuthorized($user) 
	{

	  return parent::isAuthorized($user);
		 return true;
	}
     
	 
	 
	 	
	public function index()
	{
		 
	}
    
	public function feedslist()
	{
	  
	}
	
	
	public function feedjson()
	{
	  $this->loadModel('Feedbacks');
	  $r = $_GET;  	  
	  $page=$r['page'];
	  $rp=$r['rows'];
	  $sortorder=$r['sord'];
	  $sortname=$r['sidx'];
	  if (!$page) $page = 1;
	  if (!$rp) $rp = 20; 
	  $start = (($page-1) * $rp);
	  
	   $where = array("Feedbacks.restaurant_id"=>0);
	   $count=count($this->Feedbacks->find('list',array("fields"=>array("Feedbacks.id"),"conditions"=>array("Feedbacks.restaurant_id"=>0))));
	  
	  if( $count >0 ) 
	  {
	   $total_pages = ceil($count/$rp);
	  }
	  else
	  {
     	$total_pages = 0;
      }
      if ($page > $total_pages) $page=$total_pages;	  
	  
	  if($r['_search'] == 'true')
	  {
		$r['filters'] = str_replace("\\","",$r['filters']);
		$arr = json_decode($r['filters'],true);
		foreach( $arr['rules'] as $index => $data)
		{
		    switch($data['field'])
		    {
		     case 'User.name' : 
			  
			  $where["or"]=
			  array(
			   $data['field'].' like'=>'%'.$data['data'].'%',
			   "User.mobile_no like"=>'%'.$data['data'].'%'
			    );
			 
		         break;
			 case 'Feedbacks.entry_date' : $where[$data['field']]=$data['data'];
		         break;
			 case 'Feedbacks.rating' : $where[$data['field']]=$data['data'];
		         break;
			 case 'Feedbacks.feedback_title' : $where[$data['field'].' like']='%'.$data['data'].'%';
		         break;
			case 'Feedbacks.likes' : $where[$data['field']]=$data['data'];
		         break;	 
			 case 'status' :
			               if($data['data'] == 1)
						   {
							 $where["Feedbacks.varified"] = 1;   
						   }
						   elseif($data['data'] == -1)
						   {
							   $where["Feedbacks.is_delete"] = 1;   
						   }
						   else
						   {
							   $where["Feedbacks.varified"] = 0;     
							   $where["Feedbacks.is_delete"] = 0;     
						   }
						   
						    
		         break;	 
		   }
		}	    
	   }	  
	   $result=$this->Feedbacks->find('all',array("fields"=>array(" (case when Feedbacks.likes = 1 then 'Like' else 'Dislike' end ) as likes","Feedbacks.entry_date","Feedbacks.id","User.name","User.mobile_no","Feedbacks.feedback_title","((CASE WHEN Feedbacks.varified = 1  THEN 'Verfied' ELSE (case when Feedbacks.is_delete = 1 then 'Deleted' else 'Unverified' end )  END)) AS `status`"),'order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   
	   $count1=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
         
		 
		 if($row[0]['status'] == "Verfied")
	     {
		 $action ="<div class='btn-group'><a role='button' onclick='details(".$row['Feedbacks']['id'].")' href='javascript:void(0)' class='btn btn-primary' aria-label='Justify' >Details</a><a href='javascript:void(0)' onclick='unvarified(".$row['Feedbacks']['id'].")' role='button' class='btn btn-warning' aria-label='Left Align' >Unverified</a></div>";
		 }
		 elseif($row[0]['status'] == "Unverified" )
		 {
		
			 $action ="<div class='btn-group'><a role='button' onclick='details(".$row['Feedbacks']['id'].")' href='javascript:void(0)' class='btn btn-primary' aria-label='Justify' >Details</a><a role='button' onclick='varified(".$row['Feedbacks']['id'].")' href='javascript:void(0)' class='btn btn-success' aria-label='Justify' >Verify</a><a href='javascript:void(0)' onclick='Delete_feedback(".$row['Feedbacks']['id'].")' role='button' class='btn btn-danger' aria-label='Left Align' >Delete</a></div>";
		
		 }else
		 {
			 $action ="<div class='btn-group'><a role='button' onclick='details(".$row['Feedbacks']['id'].")' href='javascript:void(0)' class='btn btn-primary' aria-label='Justify' >Details</a><a href='javascript:void(0)' onclick='varified(".$row['Feedbacks']['id'].")' role='button' class='btn btn-success' aria-label='Left Align' >Verify</a></div>";
		 }

		 
		 
	    if(($key+1)==$count1)
	    {
         $json.='{"id":"'.$row['Feedbacks']['id'].'","cell":["'.$row['User']['name'].' ('.$row['User']['mobile_no'].')","'.$row['Feedbacks']['feedback_title'].'","'.date("d/m/Y",strtotime($row['Feedbacks']['entry_date'])).'","'.$row[0]['likes'].'","'.$row[0]['status'].'","'.$action.'"]}';
	    }
	    else
	    {
         $json.='{"id":"'.$row['Feedbacks']['id'].'","cell":["'.$row['User']['name'].' ('.$row['User']['mobile_no'].')","'.$row['Feedbacks']['feedback_title'].'","'.date("d/m/Y",strtotime($row['Feedbacks']['entry_date'])).'","'.$row[0]['likes'].'","'.$row[0]['status'].'","'.$action.'"]},';
	    }
    }
		
	$json.=']}';	
	echo $json;
	exit;

	}
	public function getDetails()
	{
		
		$this->loadModel("Feedbacks");
		$row=$this->Feedbacks->find('first',array("fields"=>array("Restaurant.restaurant_name","Feedbacks.id","Feedbacks.varified","Feedbacks.likes","Feedbacks.entry_date","Feedbacks.feedback_text","User.name","User.mobile_no","Feedbacks.feedback_title","Feedbacks.is_delete"),"conditions"=>array("Feedbacks.id"=>$this->passedArgs[0])));
		
				 ?>
		<div id="dialog-details" title="PikDish App Feedback" style=" overflow:auto" >
        <div style="float:left"><h4><? if($row["Feedbacks"]["likes"]) {?><span class="btn btn-primary" style="cursor:default" >Like <span class="glyphicon glyphicon-thumbs-up"></span></span><? }else{ ?><span class="btn btn-danger" style="cursor:default" >Dislike <span class="glyphicon glyphicon-thumbs-down"></span></span> <? }?><span style="color:#999; margin-left:12px"><?=ucwords(strtolower($row['Feedbacks']['feedback_title']))?></span>
        <? if($row['Feedbacks']['varified'] == 0 && $row['Feedbacks']['is_delete'] == 0) {?>
                  <span class="i">[ Unvarify ]</span>
                  <? }elseif($row['Feedbacks']['varified'] == 1){ ?>
                  <span class="p">[ Verfied ]</span>
                  <? }else{?>
                  <span class="w">[ Deleted ]</span>
                  <? } ?>
                  </h4></div>
        <table id="dialog_table"  class=" table table-hover table-responsive table-bordered " style="margin-bottom:0px; border-spacing: 0" >  
            <tr>
               <th style="text-align:left">User : <span style="color:#666"><?=$row['User']['mobile_no']."(".ucwords($row['User']['name']).")"?></span><div  style="float:right">Date : <span id="d_amt_span_<?=$row['Feedbacks']['id']?>" style="color:#666; "><?=date("d-m-Y",strtotime($row['Feedbacks']['entry_date']))?></span></div>
               </th>
             </tr>
            <tr>
               <th width="100%"><span style="text-decoration:underline">Feedback</span> <br /> <p style="color:#999; width:100%; max-height:150px; overflow-y:auto; border:1px solid #CCC;word-break: break-all; padding:5px; border-radius:5px"><?=$row['Feedbacks']['feedback_text']?></p></th> 
             <tr>            
             <tr>
                <td>
                  <? if($row['Feedbacks']['varified'] == 0 && $row['Feedbacks']['is_delete'] == 0) {?>
                  <Button  class="btn  btn-success" style="float:left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,1)" >Verify</Button>
                  <Button style="float:right" class="btn  btn-danger left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,3)" >Delete</Button>
                  <? }elseif($row['Feedbacks']['varified'] == 1){ ?>
                  <Button style="float:right" class="btn  btn-danger left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,2)" >Unverified</Button>
                  <? }else{?>
                  <Button  class="btn  btn-success" style="float:left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,1)" >Verify</Button>
                  <? } ?>
                  
                </td>
              </tr> 
            </table></div>
			<?
		exit;
	
	}
	
	function getPro()
	{
		
	$this->LoadModel("Feedbacks");
	$data = $this->request->data;
	$page= $data["page"];
	$type= $data["type"];
	//Limit
	$limit = $data["records"];
	$start_from = ($page-1) * $limit;  
	
	//Condition
	$where = array("Feedbacks.restaurant_id"=>0);
	if($type == 2 )
	{
		$where["Feedbacks.is_delete"] = 1 ;
	}
	elseif($type == 0 || $type== 1)
	{
	    $where["Feedbacks.varified"]=$type;
		$where["Feedbacks.is_delete"]=0;
	}
	
	
	if($data["rating"] != -1)
	{
		$where["Feedbacks.likes"]=$data["rating"];
	}
	
	if($data["order"] !== "")
	{
		 $order=array($data["order"]);
	} 
	else
	{
	     $order=array("Feedbacks.entry_date desc");
	}
	
	if($data["search"] !== "")
	{
			$where["AND"]= array(
			  "OR" =>array(
			      "User.name like "=>'%'.$data["search"].'%',
				  "User.mobile_no"=>$data["search"],
				  "Feedbacks.feedback_title like "=>'%'.$data["search"].'%',
				  "Feedbacks.feedback_text like "=>'%'.$data["search"].'%',
				  "Feedbacks.entry_date"=>date("Y-m-d",strtotime($data["search"]))
				  
			  ));
	 }
	 
	
		
		
	
	$feeds=$this->Feedbacks->find('all',array("fields"=>array("Feedbacks.id","Feedbacks.varified","Feedbacks.likes","Feedbacks.entry_date","Feedbacks.feedback_text","User.name","User.mobile_no","Feedbacks.feedback_title","Feedbacks.is_delete"),'limit'=>$limit,'offset'=>$start_from,"conditions"=>$where,"order"=>$order));	
	
	if(count($feeds))
	 {
	  foreach($feeds as $key=>$row)
	  {
		 ?>
    <div class="well col-sm-12" style="background:none" id="feed_<?=$row['Feedbacks']['id']?>" >
     
        <div style="float:left"><h3><? if($row["Feedbacks"]["likes"]) {?><span class="btn btn-primary" style="cursor:default" >Like <span class="glyphicon glyphicon-thumbs-up"></span></span><? }else{ ?><span class="btn btn-danger" style="cursor:default" >Dislike <span class="glyphicon glyphicon-thumbs-down"></span></span> <? }?><span style="color:#999; margin-left:12px"><?=ucwords(strtolower($row['Feedbacks']['feedback_title']))?></span>
        <? if($row['Feedbacks']['varified'] == 0 && $row['Feedbacks']['is_delete'] == 0) {?>
                  <span class="i status" >[ Unverified ]</span>
                  <? }elseif($row['Feedbacks']['varified'] == 1){ ?>
                  <span class="p status">[ Verfied ]</span>
                  <? }else{?>
                  <span class="w status">[ Deleted ]</span>
                  <? } ?>
                  </h3></div>
        <table id="dialog_table"  class="table table-hover table-responsive table-bordered " style="margin-bottom:0px; border-spacing: 0" >  
            <tr>
               <th style="text-align:left">User : <span style="color:#666"><?=$row['User']['mobile_no']."(".ucwords($row['User']['name']).")"?></span><div  style="float:right">Date : <span id="d_amt_span_<?=$row['Feedbacks']['id']?>" style="color:#666; "><?=date("d-m-Y",strtotime($row['Feedbacks']['entry_date']))?></span></div>
               </th>
             </tr>
             <tr>
               <th width="100%"><span style="text-decoration:underline">Feedback</span> <br /> <p style="color:#999; width:100%; max-height:150px; overflow-y:auto; border:1px solid #CCC;word-break: break-all; padding:5px; border-radius:5px; margin-top:5px"><?=$row['Feedbacks']['feedback_text']?></p></th> 
             <tr>
             <tr>
                <td class="_button">
                  <? if($row['Feedbacks']['varified'] == 0 && $row['Feedbacks']['is_delete'] == 0) {?>
                  <Button  class="btn  btn-success" style="float:left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,1)" >Verify</Button>
                  <Button style="float:right" class="btn  btn-danger left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,3)" >Delete</Button>
                  <? }elseif($row['Feedbacks']['varified'] == 1){ ?>
                  <Button style="float:right" class="btn  btn-danger left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,2)" >Unverified</Button>
                  <? }else{?>
                  <Button  class="btn  btn-success" style="float:left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,1)" >Verify</Button>
                  <? } ?>
                  
                </td>
              </tr>             
             </table></div>
    <? }
	    
	 }
	 else
	 {
	   echo 0;
	 }
	exit;
	}
	
	public function varify()
    {
		     $this->LoadModel("Feedbacks");
			 $update = $this->Feedbacks->query("update `om_feedbacks` set `varified` = '1',`is_delete`='0' where `id` = ".$this->passedArgs[0]);
		     $title = "Feedback has";
			  $data = Array(
		            "message" => "$title been successfully varified",
		            "status" => "ok"
	                 );
	    
	         echo json_encode($data);
		     exit;
	}
   
  public function unvarify()
    {
		$this->LoadModel("Feedbacks");
		
		
	     $update = $this->Feedbacks->query("update `om_feedbacks` set `varified` = '0' where `id` = ".$this->passedArgs[0]);
		 $title = "Feedback has";
		 $data = Array(
		            "message" => "$title been successfully unvarified",
		            "status" => "ok"
	                 );
	    
	    echo json_encode($data);
		exit;
	}

   public function delete()
	{
		 $this->LoadModel("Feedbacks");
		 $update = $this->Feedbacks->query("update `om_feedbacks` set `is_delete` = '1' where `id` = ".$this->passedArgs[0]);
		 $title = "Feedback has";
		 $data = Array(
		            "message" => "$title been successfully deleted",
		            "status" => "ok"
	                 );
	    
	    echo json_encode($data);
		exit;
	}
	
}

?>