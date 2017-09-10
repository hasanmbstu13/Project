<?PHP
App::uses('AppController','Controller');
class RestroFeedbackController extends AppController
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

	
	
	public function varify()
    {
		$this->LoadModel("Feedbacks");
		
		if($this->passedArgs[1] == 1)
		{
		 
			 $update = $this->Feedbacks->query("update `om_feedbacks` set `varified` = '1',`is_delete`='0' where `id` = ".$this->passedArgs[0]);
		     $title = "Feedback has";
			 
		}
		else
		{
			$update = $this->Feedbacks->query("update `om_feedbacks` set `varified` = '1',`is_delete`='0' where `id` in (".$this->passedArgs[0].")");
			$title = "Feedbacks have";
			
		}
		
		
		      $data = Array(
		            "message" => "$title been successfully verified",
		            "status" => "ok"
	                 );
	    
	    echo json_encode($data);
		exit;
	}
   
  public function unvarify()
    {
		$this->LoadModel("Feedbacks");
		
		if($this->passedArgs[1] == 1)
		{
	     $update = $this->Feedbacks->query("update `om_feedbacks` set `varified` = '0' where `id` = ".$this->passedArgs[0]);
		 $title = "Feedback has";
		}
		else
		{
			$update = $this->Feedbacks->query("update `om_feedbacks` set `varified` = '0' where `id` in (".$this->passedArgs[0].")");
			$title = "Feedbacks have";
		}
		
		
		      $data = Array(
		            "message" => "$title been successfully unverified",
		            "status" => "ok"
	                 );
	    
	    echo json_encode($data);
		exit;
	}

   public function delete()
	{
		$this->LoadModel("Feedbacks");
		
		if($this->passedArgs[1] == 1)
		{
	     $update = $this->Feedbacks->query("update `om_feedbacks` set `is_delete` = '1' where `id` = ".$this->passedArgs[0]);
		 $title = "Feedback has";
		}
		else
		{
			$update = $this->Feedbacks->query("update `om_feedbacks` set `is_delete` = '1' where `id` in (".$this->passedArgs[0].")");
			$title = "Feedbacks have";
		}
		
		
		      $data = Array(
		            "message" => "$title been successfully deleted",
		            "status" => "ok"
	                 );
	    
	    echo json_encode($data);
		exit;
	}
	
	
	
	
	public function getJson()
	{
	  //$this->request->onlyAllow('ajax'); // No direct access via browser URL
	  //$this->layout = null ;
	  
	  $this->loadModel('Feedbacks');
	  $r = $_GET;  	  
	  $page=$r['page'];
	  $rp=$r['rows'];
	  $sortorder=$r['sord'];
	  $sortname=$r['sidx'];
	  if (!$page) $page = 1;
	  if (!$rp) $rp = 20; 
	  $start = (($page-1) * $rp);
	  $where = array("Feedbacks.restaurant_id <>"=>0);
	  $count=count($this->Feedbacks->find('list',array("group"=>"Feedbacks.restaurant_id","conditions"=>$where)));
	  if( $count >0 ) 
	  {
	   $total_pages = ceil($count/$rp);
	  }
	  else
	  {
     	$total_pages = 0;
      }
      if ($page > $total_pages) $page=$total_pages;	  
	  $tmp=array();
	  if($r['_search'] == 'true')
	  {
		$r['filters'] = str_replace("\\","",$r['filters']);
		$arr = json_decode($r['filters'],true);
		
		foreach( $arr['rules'] as $index => $data)
		{
		 if($data['field'] != "Feedbacks.rating")
		 {
			 $where[$data['field'].' like']='%'.$data['data'].'%';
		 }
		 else
		 {
			 $tmp[$data['field']]=$data['data'];
		 }
		 
		 
		}	    
	   }	  
  	   
	   $result=$this->Feedbacks->find('all',array("fields"=>array("avg(Feedbacks.rating) as `ratings`","Restaurant.id","Restaurant.restaurant_name"),"group"=>array("Feedbacks.restaurant_id"),'order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   
	   $count1=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		  
		  if(count($tmp))
		  {
			  $val = round($row[0]['ratings']);
			  
			  if($tmp["Feedbacks.rating"] < 5)
			  {
			   if( !($val >= $tmp["Feedbacks.rating"] && $val < $tmp["Feedbacks.rating"]+1))
			   {
				   continue;
			   }
			  }
		  }
		    
		 $action ="<div class='btn-group'><a role='button'  href='$this->path/restro_feedback/v_feeds/".$row['Restaurant']['id']."' class='btn btn-success' aria-label='Justify' >Verified FeedBack</a><a href='$this->path/restro_feedback/u_feeds/".$row['Restaurant']['id']."' role='button' class='btn btn-primary' aria-label='Jusified Align' >Unverified Feedback</a><a href='$this->path/restro_feedback/d_feeds/".$row['Restaurant']['id']."' role='button' class='btn btn-danger' aria-label='right Align' >Deleted Feedback</a></div>";
	    if(($key+1)==$count1)
	    {
         $json.='{"id":"'.$row['Restaurant']['id'].'","cell":["'.$row['Restaurant']['restaurant_name'].'","'.round($row[0]['ratings'],2).'","'.$action.'"]}';
	    }
	    else
	    {
         $json.='{"id":"'.$row['Restaurant']['id'].'","cell":["'.$row['Restaurant']['restaurant_name'].'","'.round($row[0]['ratings'],2).'","'.$action.'"]},';
	    }
    }
		
		
	$json.=']}';	
	echo $json;
	exit;
}
	public function v_feedslist()
	{
	  $this->set("restor_id",$this->passedArgs[0]);
	  $this->loadModel('Restaurant');
	  $data = $this->Restaurant->find("first",array("fields"=>array("Restaurant.restaurant_name"),"conditions"=>array("Restaurant.id"=>$this->passedArgs[0])));
	  $this->set("restro_name",$data['Restaurant']['restaurant_name']);
	  $this->loadModel("Feedbacks");
	  $data = $this->Feedbacks->query("SELECT count(`rating`) as `count_r`, `rating` FROM `om_feedbacks` WHERE `restaurant_id` = ".$this->passedArgs[0]." group by `rating` order by `rating` desc");
	  $rating=array(5=>0,4=>0,3=>0,2=>0,1=>0);
	  $total=0;
	  foreach($data as $key=>$val)
	  {
		  
		   $round = round($val['om_feedbacks']['rating']);
		   $rating[$round] += $val[0]['count_r'];   
		   $total+=$val[0]['count_r'];
		 	  
	  }
	  $this->set("total",$total);
	  $this->set("rating",$rating);
	  
	}
	
	public function u_feedslist()
	{
	  $this->set("restor_id",$this->passedArgs[0]);
	  $this->loadModel('Restaurant');
	  $data = $this->Restaurant->find("first",array("fields"=>array("Restaurant.restaurant_name"),"conditions"=>array("Restaurant.id"=>$this->passedArgs[0])));
	  $this->set("restro_name",$data['Restaurant']['restaurant_name']);
	  $this->loadModel("Feedbacks");
	  $data = $this->Feedbacks->query("SELECT count(`rating`) as `count_r`, `rating` FROM `om_feedbacks` WHERE `restaurant_id` = ".$this->passedArgs[0]." group by `rating` order by `rating` desc");
	  $rating=array(5=>0,4=>0,3=>0,2=>0,1=>0);
	  $total=0;
	  foreach($data as $key=>$val)
	  {
		  
		   $round = round($val['om_feedbacks']['rating']);
		   $rating[$round] += $val[0]['count_r'];   
		   $total+=$val[0]['count_r'];
		 	  
	  }
	  $this->set("total",$total);
	  $this->set("rating",$rating);
	}
	public function d_feedslist()
	{
	  $this->set("restor_id",$this->passedArgs[0]);
	  $this->loadModel('Restaurant');
	  $data = $this->Restaurant->find("first",array("fields"=>array("Restaurant.restaurant_name"),"conditions"=>array("Restaurant.id"=>$this->passedArgs[0])));
	  $this->set("restro_name",$data['Restaurant']['restaurant_name']);
	  $this->loadModel("Feedbacks");
	  $data = $this->Feedbacks->query("SELECT count(`rating`) as `count_r`, `rating` FROM `om_feedbacks` WHERE `restaurant_id` = ".$this->passedArgs[0]." group by `rating` order by `rating` desc");
	  $rating=array(5=>0,4=>0,3=>0,2=>0,1=>0);
	  $total=0;
	  foreach($data as $key=>$val)
	  {
		  
		   $round = round($val['om_feedbacks']['rating']);
		   $rating[$round] += $val[0]['count_r'];   
		   $total+=$val[0]['count_r'];
		 	  
	  }
	  $this->set("total",$total);
	  $this->set("rating",$rating);
	}
	
	public function v_feeds()
	{
	  $this->set("restor_id",$this->passedArgs[0]);
	  $this->loadModel('Restaurant');
	  $data = $this->Restaurant->find("first",array("fields"=>array("Restaurant.restaurant_name"),"conditions"=>array("Restaurant.id"=>$this->passedArgs[0])));
	  $this->set("restro_name",$data['Restaurant']['restaurant_name']);
	  
	}
	
	public function u_feeds()
	{
	  $this->set("restor_id",$this->passedArgs[0]);
	  $this->loadModel('Restaurant');
	  $data = $this->Restaurant->find("first",array("fields"=>array("Restaurant.restaurant_name"),"conditions"=>array("Restaurant.id"=>$this->passedArgs[0])));
	  $this->set("restro_name",$data['Restaurant']['restaurant_name']);
	}
	
	public function d_feeds()
	{
	  $this->set("restor_id",$this->passedArgs[0]);
	  $this->loadModel('Restaurant');
	  $data = $this->Restaurant->find("first",array("fields"=>array("Restaurant.restaurant_name"),"conditions"=>array("Restaurant.id"=>$this->passedArgs[0])));
	  $this->set("restro_name",$data['Restaurant']['restaurant_name']);
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
	  if($this->passedArgs[1]==1)
	  {
	   $where = array("Feedbacks.restaurant_id"=>$this->passedArgs[0],"Feedbacks.varified"=>1,"Feedbacks.is_delete"=>0);
	   $count=count($this->Feedbacks->find('list',array("fields"=>array("Feedbacks.id"),"conditions"=>array("Feedbacks.restaurant_id"=>$this->passedArgs[0],"Feedbacks.varified"=>1,"Feedbacks.is_delete"=>0))));
	  }
	  elseif($this->passedArgs[1] == 0)
	  {
	   $where = array("Feedbacks.restaurant_id"=>$this->passedArgs[0],"Feedbacks.varified"=>0,"Feedbacks.is_delete"=>0);
	   $count=count($this->Feedbacks->find('list',array("fields"=>array("Feedbacks.id"),"conditions"=>array("Feedbacks.restaurant_id"=>$this->passedArgs[0],"Feedbacks.varified"=>0,"Feedbacks.is_delete"=>0))));
	  }
	  else
	  {
	   $where = array("Feedbacks.restaurant_id"=>$this->passedArgs[0],"Feedbacks.varified"=>0,"Feedbacks.is_delete"=>1);
	   $count=count($this->Feedbacks->find('list',array("fields"=>array("Feedbacks.id"),"conditions"=>array("Feedbacks.restaurant_id"=>$this->passedArgs[0],"Feedbacks.varified"=>0,"Feedbacks.is_delete"=>1))));
	  }
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
			  //$where[$data['field'].' like']='%'.$data['data'].'%';
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
		   }
		}	    
	   }	  
  	   
	   $result=$this->Feedbacks->find('all',array("fields"=>array("Feedbacks.rating","Feedbacks.entry_date","Feedbacks.id","User.name","User.mobile_no","Feedbacks.feedback_title","Feedbacks.is_delete"),'order'=>$sortname.' '.$sortorder,'limit'=>$rp,'offset'=>$start,"conditions"=>$where));
	   $count1=count($result);
	   $json = '{
				"page":'.$page.',
				"total":'.$total_pages.',
				"records":'.$count.',
				"rows":[';
	   foreach($result as $key => $row)
	  {
		  	 $check= "       <button style='margin-top:3px' type='button' id='button_".$row['Feedbacks']['id']."' onclick='change(".$row['Feedbacks']['id'].")' class='btn btn-default' aria-label='Justify' ><span id='span_".$row['Feedbacks']['id']."' class=' glyphicon glyphicon-unchecked'  aria-hidden='true'></span></button><input type='hidden'  class='hidden_checkbox' id='check_box_".$row['Feedbacks']['id']."' value=''></div>";   
			 
		 if($this->passedArgs[1]==1)
	     {
		 $action ="<div class='btn-group'><a role='button' onclick='details(".$row['Feedbacks']['id'].")' href='javascript:void(0)' class='btn btn-primary' aria-label='Justify' >Details</a><a href='javascript:void(0)' onclick='Delete_feedback(".$row['Feedbacks']['id'].")' role='button' class='btn btn-danger' aria-label='Left Align' >Unverified</a></div>";
		 }
		 elseif($this->passedArgs[1] == 0)
		 {
		
			 $action ="<div class='btn-group'><a role='button' onclick='details(".$row['Feedbacks']['id'].")' href='javascript:void(0)' class='btn btn-primary' aria-label='Justify' >Details</a><a role='button' onclick='varified(".$row['Feedbacks']['id'].")' href='javascript:void(0)' class='btn btn-success' aria-label='Justify' >Verify</a><a href='javascript:void(0)' onclick='Delete_feedback(".$row['Feedbacks']['id'].")' role='button' class='btn btn-danger' aria-label='Left Align' >Delete</a></div>";
		
		 }else
		 {
			 $action ="<div class='btn-group'><a role='button' onclick='details(".$row['Feedbacks']['id'].")' href='javascript:void(0)' class='btn btn-primary' aria-label='Justify' >Details</a><a href='javascript:void(0)' onclick='varified(".$row['Feedbacks']['id'].")' role='button' class='btn btn-danger' aria-label='Left Align' >Verify</a></div>";
		 }
		 
		  
		 
	    if(($key+1)==$count1)
	    {
         $json.='{"id":"'.$row['Feedbacks']['id'].'","cell":["'.$check.'","'.$row['User']['name'].' ('.$row['User']['mobile_no'].')","'.$row['Feedbacks']['feedback_title'].'","'.date("d/m/Y",strtotime($row['Feedbacks']['entry_date'])).'","'.$row['Feedbacks']['rating'].'","'.$action.'"]}';
	    }
	    else
	    {
         $json.='{"id":"'.$row['Feedbacks']['id'].'","cell":["'.$check.'","'.$row['User']['name'].' ('.$row['User']['mobile_no'].')","'.$row['Feedbacks']['feedback_title'].'","'.date("d/m/Y",strtotime($row['Feedbacks']['entry_date'])).'","'.$row['Feedbacks']['rating'].'","'.$action.'"]},';
	    }
    }
		
	$json.=']}';	
	echo $json;
	exit;

	}
	public function getDetails()
	{
		
		$this->loadModel("Feedbacks");
		$row=$this->Feedbacks->find('first',array("fields"=>array("Restaurant.restaurant_name","Feedbacks.id","Feedbacks.varified","Feedbacks.rating","Feedbacks.entry_date","Feedbacks.feedback_text","User.name","User.mobile_no","Feedbacks.feedback_title","Feedbacks.is_delete"),"conditions"=>array("Feedbacks.id"=>$this->passedArgs[0])));
		
				 ?>
		<div id="dialog-details" title="<?=$row['Restaurant']['restaurant_name']?>" style=" overflow:auto" >
        <table id="dialog_table"  class=" table table-hover table-responsive table-bordered " style="margin-bottom:0px; border-spacing: 0" >  
            <tr>
               <th style="text-align:left">User : <span style="color:#666"><?=$row['User']['mobile_no']."(".ucwords($row['User']['name']).")"?></span><div  style="float:right">Date : <span id="d_amt_span_<?=$row['Feedbacks']['id']?>" style="color:#666; "><?=date("d-m-Y",strtotime($row['Feedbacks']['entry_date']))?></span></div>
               </th>
             </tr>
             <tr>
                 <th  style="text-align:left;" colspan="2" ><div style="float:left">Rating : <span class="badge glyphicon glyphicon-star
"><?=$row['Feedbacks']['rating']?></span></div><br /><div id="start_<?=$row['Feedbacks']['id']?>"></div>
                 <script>
				 $("#start_<?=$row['Feedbacks']['id']?>").rateYo({
                        rating: <?=$row['Feedbacks']['rating']?>,
	                   readOnly: true,
					   starWidth: "40px"
	
	                  });
				 </script>
				 </th> 
             </tr>
             <tr>
               <th><span style="text-decoration:underline">Title</span> <br /> <span style="color:#999"><?=$row['Feedbacks']['feedback_title']?></span></th> 
             <tr>
             <tr>
               <th width="100%"><span style="text-decoration:underline">Feedback</span> <br /> <p style="color:#999; width:100%; max-height:150px; overflow-y:auto; border:1px solid #CCC;word-break: break-all; padding:5px; border-radius:5px"><?=$row['Feedbacks']['feedback_text']?></p></th> 
             <tr>            
             <tr>
                <td>
                  <? if($row['Feedbacks']['varified'] == 0 && $row['Feedbacks']['is_delete'] == 0) {?>
                  <Button  class="btn  btn-success" style="float:left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,1)" >Verify</Button>
                  <Button style="float:right" class="btn  btn-danger left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,2)" >Delete</Button>
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
	$restro_id= $data["restro_id"];
	$type= $data["type"];
	
	//Limit
	$limit = $data["records"];
	$start_from = ($page-1) * $limit;  
	
	//Condition
	if($type == -1 )
	{
		$where = array("Feedbacks.restaurant_id"=>$restro_id,"Feedbacks.is_delete"=>1);
	}
	else
	{
	    $where = array("Feedbacks.restaurant_id"=>$restro_id,"Feedbacks.varified"=>$type,"Feedbacks.is_delete"=>0);
	}
	if($data["rating"])
	{
				$arr = array() ;
				switch($data["rating"])
				{
					case '1' :
					         $arr = array(
						        "Feedbacks.rating"=>1
							  );
					         break;
					case '2':
					          $arr = array(
						        "Feedbacks.rating > "=>1,
								"Feedbacks.rating <= "=>2	   
							  );
					         break;
					case '3':
					         $arr = array(
						        "Feedbacks.rating > "=>2,
								"Feedbacks.rating <= "=>3	   
							  );
					         break;
					case '4' :
					         $arr = array(
						        "Feedbacks.rating > "=>3,
								"Feedbacks.rating <= "=>4	   
							  );
					         break;
					case '5' :
					         $arr = array(
						        "Feedbacks.rating > "=>4,
								"Feedbacks.rating <= "=>5	   
							  );
					         break;
							 		 
				}
			    $where["and"] = $arr;		  
				
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
	 
	
		
		
	
	$feeds=$this->Feedbacks->find('all',array("fields"=>array("Restaurant.restaurant_name","Feedbacks.id","Feedbacks.varified","Feedbacks.rating","Feedbacks.entry_date","Feedbacks.feedback_text","User.name","User.mobile_no","Feedbacks.feedback_title","Feedbacks.is_delete"),'limit'=>$limit,'offset'=>$start_from,"conditions"=>$where,"order"=>$order));	
	
	if(count($feeds))
	 {
	  foreach($feeds as $key=>$row)
	  {
		 ?>
    <div class="well col-sm-12" style="background:none" id="feed_<?=$row['Feedbacks']['id']?>" >
     <div style="width: 4%; float:left"><button style='margin-top:3px' type='button' id='button_<?=$row['Feedbacks']['id']?>"' onclick='change(<?=$row['Feedbacks']['id']?>)' class='btn btn-default' aria-label='Justify' ><span id='span_<?=$row['Feedbacks']['id']?>' class=' glyphicon glyphicon-unchecked'  aria-hidden='true'></span></button><input type='hidden'  class='hidden_checkbox' id='check_box_<?=$row['Feedbacks']['id']?>' value=''></div>   
        <div style="float:left"><h3><span style="color:#999; margin-left:12px"><?=ucwords(strtolower($row['Feedbacks']['feedback_title']))?></span></h3></div>
        <table id="dialog_table"  class="table table-hover table-responsive table-bordered " style="margin-bottom:0px; border-spacing: 0" >  
            <tr>
               <th style="text-align:left">User : <span style="color:#666"><?=$row['User']['mobile_no']."(".ucwords($row['User']['name']).")"?></span><div  style="float:right">Date : <span id="d_amt_span_<?=$row['Feedbacks']['id']?>" style="color:#666; "><?=date("d-m-Y",strtotime($row['Feedbacks']['entry_date']))?></span></div>
               </th>
             </tr>
             <tr>
                 <th  style="text-align:left;" colspan="2" ><div style="float:left">Rating : <span class="badge glyphicon glyphicon-star
"><?=$row['Feedbacks']['rating']?></span></div><div id="start_<?=$row['Feedbacks']['id']?>" style="width:50%; float:left; margin-left:12px"></div>
                 <script>
				 $("#start_<?=$row['Feedbacks']['id']?>").rateYo({
                           rating: <?=$row['Feedbacks']['rating']?>,
						   numStars: 5,
						   precision: 2,
						   readOnly: true
					      
	
	                  });
				 </script>
				 </th> 
             </tr>
             
             <tr>
               <th width="100%"><span style="text-decoration:underline">Feedback</span> <br /> <p style="color:#999; width:100%; max-height:150px; overflow-y:auto; border:1px solid #CCC;word-break: break-all; padding:5px; border-radius:5px; margin-top:5px"><?=$row['Feedbacks']['feedback_text']?></p></th> 
             <tr>            
             <tr>
                <td>
                  <? if($row['Feedbacks']['varified'] == 0 && $row['Feedbacks']['is_delete'] == 0) {?>
                  <Button  class="btn  btn-success" style="float:left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,1)" >Verify</Button>
                  <Button style="float:right" class="btn  btn-danger left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,2)" >Delete</Button>
                  <? }elseif($row['Feedbacks']['varified'] == 1){ ?>
                  <Button style="float:right" class="btn  btn-danger left" onclick="dialog_action(<?=$row['Feedbacks']['id']?>,1)" >Unverified</Button>
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
	
		

}

?>