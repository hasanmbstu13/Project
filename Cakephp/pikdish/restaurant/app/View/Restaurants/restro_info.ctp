<?php $this->assign('title', 'Restaurant');

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
	   
	   
	   
</style>
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit <?=$title;?></h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
      
      <?php echo $this->Form->create('Restaurant',array('url' => 'restro_info','method'=>'post','name'=>'addForm','class'=>'form-horizontal form-label-left',"enctype"=>"multipart/form-data") ); 
	      
		  echo $this->Form->hidden('Restaurant.id');
		  
		  ?>
          
      <ul>
		<li><a href="#tabs-2" >Restaurant Details</a></li>
        <li><a href="#tabs-3">Restaurant Location</a></li>
	  </ul>
          
          
          <div class="x_content" id="tabs-2">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Restaurant Name<span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.restaurant_name', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'placeholder'=>'Restaurant Name','maxlength'=>50));?>
   </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tag Line <span class="required"></span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.tag_line', array( 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Tag line'));?> </div>
          </div>
		  <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Person <span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.contact_person', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Contact Person Name','pattern'=>"^[A-z ]{2,}$",'title'=>'Digit or Special Characters are not allow'));?> </div>
          </div>
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone No. <span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.contact_no', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Phone No.[+xx-(STD code)(Phone No.)]','pattern'=>"(?:(?:\\+|0{0,2})91(\\s*[\\- ]\\s*)?|[0 ]?)?[789]\\d{9}|(\\d[ -]?){10,}\\d"));?>            </div>
         </div>
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Website Url <span class="required"></span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.website_url', array('required'=>'false', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'url','placeholder'=>'Wesite Url'));?>
            <a href="<?=$this->request->data['Restaurant']['website_url']?>" target="_blank" class="error control-label" style="width:100%; text-align:left; float:left;"><?=$this->request->data['Restaurant']['website_url']?></a>
			</div>
  		</div>
        
         <div class="form-group">
             
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile <span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.mobile_no', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Mobile No.[xxxxxxxxxx]','pattern'=>"[789]\d{9}",
			"onchange"=>"check_mobile('RestaurantMobileNo','mobile-error1')","onkeyup"=>"check_mobile('RestaurantMobileNo','mobile-error1')"));?> 
           
    <label id="mobile-error1" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
          </div>
         
       
         
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.email', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'email','placeholder'=>'Email','pattern'=>'[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?'));?>
            <label id="customer-error1" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label> 
            </div>
          </div>
        <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tin No. <span class="required"></span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.tin_no', array('required'=>'false', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Tin No.','pattern'=>"[0][8]\d{9}"));?>
             </div>
        </div>
         <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Tax No. <span class="required"></span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.service_tax_no', array('required'=>'false', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Service Tax No.'));?>
             </div>
        </div>		
        <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Charges <span class="required"></span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.service_charges', array('required'=>'false', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'number',"min"=>"0","max"=>20,"step"=>"0.1",'placeholder'=>'Service Charges.'));?>
             </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address <span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.address', array('type' => 'textarea','style' => 'width: 400px; height: 70px;','required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'placeholder'=>'Address'));?> </div>
            </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country<span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.country_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','onchange'=>'change_country("RestaurantCountryId","RestaurantStateId")','label' => false,  'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select Country"));?> </div>
          </div>
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State<span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.state_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','label' => false, 'div' => false,"data-live-search"=>"true",'onchange'=>'change_state("RestaurantStateId","RestaurantCityId")', "data-live-search-style"=>"begins", "title"=>"Select State"));?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City <span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.city_id', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','label' => false, 'div' => false,"data-live-search"=>"true", "data-live-search-style"=>"begins", "title"=>"Select City"));?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Opening Days <span class="required"></span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php 
			$options=array(
			 "0"=>'Monday',
			 "1"=>'Tuesday',
			 "2"=>'Wednesday',
			 "3"=>'Thursday',
			 "4"=>'Friday',
			 "5"=>'Saturday',
			 "6"=>'Sunday',
			);
			echo $this->Form->input('Restaurant.opening_days', array('options'=>$options,'required'=>'false','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','title'=>'Select Days',"multiple"=>true,"data-done-button"=>"true", "data-actions-box"=>"true"));?> </div>
          </div>
          <div class="form-group form-inline">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Opening Time<span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php 
				echo $this->Form->input('Restaurant.open_time', array('required'=>'false','label' => false, 'div' => false,'class' => 'form-control','placeholder'=>'Opening Time',"type"=>"time"));?> </div>
          </div>
          <div class="form-group form-inline">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Closing Time<span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php 
				echo $this->Form->input('Restaurant.close_time', array('required'=>'false','label' => false, 'div' => false,'class' => 'form-control','placeholder'=>'Closing Time',"type"=>"time"));?> </div>
          </div>
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Restaurant Type <span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> <?php 
			$options=array(
			 "0"=>'Restaurants',
			 "1"=>'Cafe'
			);
			echo $this->Form->input('Restaurant.restaurant_type', array('options'=>$options,'required'=>'true','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','title'=>'Select Type'));?> </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Food Type <span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12" style="padding-top:8px">
             <?PHP if($this->request->data['Restaurant']['food_type_id'] == 0)
                    { ?>
             <input    type="radio" name="data[Restaurant][food_type_id]" value="0" checked="checked" /><img src='<?=$imgpath?>/green.jpg' title="Veg" width='24'  /> Veg <input  type="radio" value="1" name="data[Restaurant][food_type_id]" required/><img src='<?=$imgpath?>/red.jpg' width='26' title="Non-Veg"  />Non-Veg
             <? } else {?>
                        <input    type="radio" name="data[Restaurant][food_type_id]" value="0"  /><img src='<?=$imgpath?>/green.jpg' title="Veg" width='24'  /> Veg <input  type="radio" value="1" name="data[Restaurant][food_type_id]" checked="checked" required/><img src='<?=$imgpath?>/red.jpg' width='26' title="Non-Veg"  />Non-Veg
             <? } ?>
             </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Home Delivery<span class="required">*</span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12" style="padding-top:8px"> 
             <?PHP if($this->request->data['Restaurant']['home_delivery_available'] == 0)
                    { ?>
            <input  type="radio" name="data[Restaurant][home_delivery_available]" value="0" checked="checked" />Yes<input type="radio" value="1" name="data[Restaurant][home_delivery_available]" required/>No
            <? } else {?>
             <input  type="radio" name="data[Restaurant][home_delivery_available]" value="0" />Yes<input type="radio" value="1" name="data[Restaurant][home_delivery_available]" required checked="checked"  />No
              <? } ?>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Order Cancellation Available?<span class="required">*</span> </label>
              <div class="col-md-7 col-sm-6 col-xs-12" style="padding-top:8px">
              <?PHP if($this->request->data['Restaurant']['cancel_available'] == 0)
                    { ?>
               <input  type="radio"  name="cancel_available" value="0" checked="checked" />No<input type="radio" value="1" name="cancel_available" required/>Yes <? } else {?><input  type="radio"  name="cancel_available" value="0"  />No<input type="radio" value="1" name="cancel_available" required checked="checked" />Yes <? } ?>
               </div>
            </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cancel Time(minutes) <span class="required"></span> </label>
            <div class="col-md-7 col-sm-6 col-xs-12"> 
			<?php
			if($this->request->data['Restaurant']['cancel_available'] == 1){
			 echo $this->Form->input('Restaurant.auto_cancel_time', array('required'=>'false','disabled'=>false, 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'number', 'min'=>3,'max'=>15));
			}else
			{
				echo $this->Form->input('Restaurant.auto_cancel_time', array('required'=>'false','disabled'=>true, 'class' => 'form-control col-md-7 col-xs-12','label' => false,"value"=>"", 'div' => false,'type'=>'number', 'min'=>3,'max'=>15));
			}
			
			?>
</div>
          </div>
 
		   
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Restaurant Image <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.logo_path', array('type'=>'file', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false, 'required'=>'false'));?>
             <div><a data-lightbox="example-2" href="<?=$restrologo.$this->request->data['Restaurant']['logo_path']?>"><img  src="<?=$restrologo.$this->request->data['Restaurant']['logo_path']?>" style="width:100px; height:100px; border:solid 2px #CCC;padding:5px 5px;padding-left:5px; margin-left:12px" /></a></div>
             </div>
          </div>

 <div style=" float:right"><a href="javascript:void(0)" onclick="tab2(0,1)" class="btn btn-primary">Next</a> </div>
          
           </div>
          <div class="x_content" id="tabs-3">




         
          <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required"></span> </label>
            
            <div id="map" class="col-md-10 col-sm-10 col-xs-12" style=" width:100%; height:500px; margin-top:10px; margin-bottom:10px; border:1px "></div>
            <input id="locationTextField" type="text" class="form-control col-md-7 col-xs-12 controls "  >
            </div>

 <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('Restaurant.restaurant_lat', array('required'=>'false', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Latitude','readonly'=>'true','onkeyup'=>"this.value=''",'style'=>'margin-right:5px'));?>
            
			<?php echo  $this->Form->input('Restaurant.restaurant_lng', array('required'=>'false', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Longitude','readonly'=>'true','onkeyup'=>"this.value=''"));?> </div>
            
            
          </div>

          
          <div class="form-group">
                    <a href="javascript:void(0)" onclick="tab3()" class="btn btn-primary" style="float:left">Back</a> 
            <div class="col-md-7 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>" class="btn btn-primary">Cancel</a> </div>
          </div>
          
          <div>
            <p>- Ctrl + S for Save Data</p>
            <p>- Ctrl + C for go to list page</p>
          </div>

        </div>
      
        </div>
        
        </form>
      </div>
    </div>
  </div>
  
</div>

<!-- /page content -->
<script>
$(function() {
		$( ".x_panel" ).tabs
		({
			collapsible: true,
			active:1,
			
		});
	});
	
$('body').on('keydown', 'input, select, textarea', function(e) {
var self = $(this)
  , form = self.parents('form:eq(0)')
  , focusable
  , next
  , prev
  ;

if (e.shiftKey) {
 if (e.keyCode == 13) {
     focusable =   form.find('input,a,select,button,textarea').filter(':visible:not([readonly]):enabled');
     prev = focusable.eq(focusable.index(this)-1); 

     if (prev.length) {
        prev.focus();
     } else {
        form.submit();
    }
  }
}
  else
if (e.keyCode == 13) {
    focusable = form.find('input,a,select,button,textarea').filter(':visible:not([readonly]):enabled');
    next = focusable.eq(focusable.index(this)+1);
    if (next.length) {
        next.focus();
    } else {
        form.submit();
    }
    return false;
}
});
$(document).ready(function(){
    $(document).bind('keydown', function(event) {
      //19 for Mac Command+S
     if (!( String.fromCharCode(event.which).toLowerCase() == 's' && event.ctrlKey) && !(event.which == 19)) return true;
      if($( ".x_panel" ).tabs( "option", "active") == 1)
	  {
       event.preventDefault();
       console.log("Ctrl-s pressed");
	   $("#submit").click();
	  }
       return false;

   });



});
shortcut.add("Ctrl+C",function() {
	window.location.href='<?php echo $path ?>';
	
});

shortcut.add("Ctrl+b",function() 
{
	tab = $( ".x_panel" ).tabs( "option", "active");
	if(tab == 1)
	{
		 	  tab3();
	}
	
});

shortcut.add("Ctrl+f",function(event) 
{
	tab = $( ".x_panel" ).tabs( "option", "active");
	if(tab == 0)
	{
	  tab2(0,1);  
	}
		 
});

function change_country(country,state){
	id=$( "#"+country ).val()
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'text',
                                    url: '<?php echo $path;?>/Users/getState/' + id,
                                    success: function(response) 
									{
										$("#"+state).html(response)	
										$("#"+state).selectpicker('refresh');
										return false; 
									}
				});
}

function change_state(state,city){
	id=$( "#"+state ).val()
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'text',
                                    url: '<?php echo $path;?>/Users/getCity/' + id,
                                    success: function(response) 
									{
										$("#"+city).html(response)	
										$("#"+city).selectpicker('refresh');
										return false; 
									}
				});
}



function check_mail(){
	id=$( "#RestaurantEmail" ).val()
	
	if(id!==""  && id !== "<?=$userArr['User']['username']?>" && id !== "<?=$userArr['User']['email']?>" && id !== "<?=$this->request->data['Restaurant']['email']?>" )
	{
	
	pattern=/^[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?$/;
	
	if(pattern.test(id)){
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/Users/checkUser/' + id,
                                    success: function(response) 
									{   
									   if(response.status=="error")
									   {
										   
									    $("#customer-error1")										
									      .css({'display':'block','color':'red'})
										  . html("This email id is already used. Please specified different email id");	
										  document.getElementById("RestaurantEmail").setCustomValidity("Please Specified different email id !");
										  
									   }
									   else
									   {
										   $("#customer-error1")										
									      .css({'display':'block','color':'green'})
										  . html("This email id is available");	
										   document.getElementById("RestaurantEmail").setCustomValidity("");
										   
										  
									   }
										return false; 
									}
				});
         }
		 else
		 {
			                               $("#customer-error1")										
									      .css({'display':'none','color':'red'})
										  . html("")	
										  document.getElementById("RestaurantEmail").setCustomValidity("");
										  
		 }
     }else
	 {
		 
		                                  $("#customer-error1")										
									      .css({'display':'block','color':'green'})
										  . html("");	
										  
										  document.getElementById("RestaurantEmail").setCustomValidity("");
	 }
	
}

//$( "#RestaurantEmail" ).keyup(check_mail);
$( "#RestaurantEmail" ).change(check_mail);

function check_mobile(mobile_id,error_label){
	val=$( "#"+mobile_id ).val()
	
	if(val!=="" && val !== "<?=$userArr['User']['mobile_no']?>"  && val !== "<?=$this->request->data['Restaurant']['mobile_no']?>")
	{
	
	pattern=/^[789]\d{9}$/;
	
	if(pattern.test(val)){
	jQuery.ajax({
                                    
                                    async: true,
                                    cache: false,
                                    dataType: 'json',
                                    url: '<?php echo $path;?>/Users/checkmobile/' + val,
                                    success: function(response) 
									{   
									   if(response.status=="error")
									   {
									      $("#"+error_label)										
									      .css({'display':'block','color':'red'})
										  . html(response.message)	
										  document.getElementById(mobile_id).setCustomValidity("Please Specified different mobile no !");
									   }
									   else
									   {
										   $("#"+error_label)										
									      .css({'display':'block','color':'green'})
										  . html(response.message)	
										  document.getElementById(mobile_id).setCustomValidity("");
										  
									   }
										return false; 
									}
				});
         }
		 else
		 {
			                               $("#"+error_label)										
									      .css({'display':'none','color':'red'})
										  . html("")	
										  document.getElementById(mobile_id).setCustomValidity("");
		 }
     }
	
}


$("input[type=radio][name=cancel_available]").on('change', function() {
     switch($(this).val()) {
         case '0':
		            $('#RestaurantAutoCancelTime').attr({
						'disabled':true,
						'required':false
						}).val(null);
						
                      break;
         case '1':
                      el =  $('#RestaurantAutoCancelTime').attr({
						'disabled':false,
						'required':true
						});
						
             break;
     }
});


  function myMap()
 {
  var mapCanvas = document.getElementById("map");
  var mapOptions = 
  {
    center: new google.maps.LatLng(<?=$this->request->data['Restaurant']['restaurant_lat']?>,<?=$this->request->data['Restaurant']['restaurant_lng']?>), 
    zoom: 17,
	
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker(
  {
    map: map,
	draggable:true,
	position:new google.maps.LatLng(<?=$this->request->data['Restaurant']['restaurant_lat']?>,<?=$this->request->data['Restaurant']['restaurant_lng']?>)
  });
  
  var infowindow = new google.maps.InfoWindow({
   content:'Latitude: <?=$this->request->data['Restaurant']['restaurant_lat']?> <br /> Longitude: <?=$this->request->data['Restaurant']['restaurant_lng']?>'
  });
  infowindow.open(map,marker)
  google.maps.event.addListener(map, 'click', function(event)
   {
    placeMarker(map, event.latLng,marker,infowindow);
   });
   
   	  var input = document.getElementById('locationTextField');
	   map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      var autocomplete = new google.maps.places.Autocomplete(input);
	     autocomplete.bindTo('bounds', map);
         autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          /*marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          })); */
		  
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
           $('#RestaurantRestaurantLat').val(place.geometry.location.lat()).attr('readonly',true);
           $('#RestaurantRestaurantLng').val(place.geometry.location.lng()).attr('readonly',true);
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        

     // $( ".x_panel" ).tabs( "option", "active", 0 );
  }

function change_marker(event,infowindow) 
{
	$('#RestaurantRestaurantLat').val(event.latLng.lat());
    $('#RestaurantRestaurantLng').val(event.latLng.lng());
	infowindow.setContent('Latitude: ' + event.latLng.lat() + '<br>Longitude: ' + event.latLng.lng());
	return
 
}
    
	
function placeMarker(map, location,marker,infowindow) 
{
   marker.setPosition(location);
   $('#RestaurantRestaurantLat').val(location.lat()).attr('readonly',true);
   $('#RestaurantRestaurantLng').val(location.lng()).attr('readonly',true);
   infowindow.setContent('Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng());
   marker.addListener('drag', function(event){change_marker(event,infowindow)});
   marker.addListener('dragend', function(event){change_marker(event,infowindow)});
   infowindow.open(map,marker)

}


function tab2(a,b)
{ 
        rname =     document.getElementById('RestaurantRestaurantName');
		contact_person = 	document.getElementById('RestaurantContactPerson');
		contact_name = 	document.getElementById('RestaurantContactNo');
		mobile_no =	document.getElementById('RestaurantMobileNo');
		remail  = 	document.getElementById('RestaurantEmail');
		tin_no  = 	document.getElementById('RestaurantTinNo');
		sc  = 	document.getElementById('RestaurantServiceCharges');
		address =	document.getElementById('RestaurantAddress');
		country = 	document.getElementById('RestaurantCountryId');
		state =	document.getElementById('RestaurantStateId');
		city = 	document.getElementById('RestaurantCityId');
		rtype = 	document.getElementById('RestaurantRestaurantType');
     	cancel_time = document.getElementById('RestaurantAutoCancelTime');
    //                $('#RestaurantAutoCancelTime').attr({

	   
		
		if(!rname.validity.valid || !contact_person.validity.valid || !contact_name.validity.valid || !remail.validity.valid || !mobile_no.validity.valid || !address.validity.valid || !tin_no.validity.valid || !sc.validity.valid || !country.validity.valid || !state.validity.valid || !city.validity.valid   ||  !cancel_time.validity.valid ||  !rtype.validity.valid)
		{
		    $("#submit").click();   
		}
		else
		{  
			
			$( ".x_panel" ).tabs( "option", "disabled",  [a]  );			
			$( ".x_panel" ).tabs(  "enable",  b  );
			$( ".x_panel" ).tabs( "option", "active", b);
			
			  $('#RestaurantRestaurantLng').attr('required',true);
			  $('#RestaurantRestaurantLat').attr('required',true);
			  $('#locationTextField').focus()
			  
			
		}
		
}
function tab3()
{
	 
        lat = document.getElementById('RestaurantRestaurantLat')
		lng = document.getElementById('RestaurantRestaurantLng')
		
		if(!lat.validity.valid || !lng.validity.valid )
		{
		    $("#submit").click();   
		}
		else
		{
			
			$( ".x_panel" ).tabs( "option", "disabled",  [1]  );			
			$( ".x_panel" ).tabs(  "enable",   0 );
			$( ".x_panel" ).tabs( "option", "active", 0);
			document.getElementById("RestaurantRestaurantName").focus();
		}
		

}

</script>
<script src="http://maps.googleapis.com/maps/api/js?key=<?=$settings['Setting']['google_mapkey']?>&amp;libraries=places&callback=myMap"></script>	
<div id="dialog-alert" title="Warning" style="display:none" ></div>	
<script>
setTimeout(function(){
	$( ".x_panel" ).tabs( "option", "disabled", [ 1 ] )
	$( ".x_panel" ).tabs( "option", "active", 0 );
	document.getElementById("RestaurantRestaurantName").focus();
	
	}, 2500);
	$('#RestaurantOpeningDays').val('<?=$this->request->data['Restaurant']['opening_days']?>'.split(","));
</script>