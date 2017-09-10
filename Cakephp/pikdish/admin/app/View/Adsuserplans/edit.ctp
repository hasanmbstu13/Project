<?php $this->assign('title', 'Ads User Plan');

echo $this->Html->script(array('/js/shortcut/shortcut.js'));
echo $this->Html->script($path.'js/lightbox/js/lightbox.min.js');
echo $this->Html->css($path.'js/lightbox/css/lightbox.min.css');

?>


<style>
 .error
	   {
		   padding-left:10px;
		   color:red
	   }
	   input
	   {
		   padding:5 5 5 5;
		   border-radius: 4px !important;
		   width:42% !important;
		}
	    input[type=radio]
	    {
		   padding-top:5px;
		   width:5% !important;
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
      <h3>Edit User Plan</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
        
          <?php echo $this->Form->create('AdsUserPlan',array('url' => 'edit','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left',	  'enctype'=>'multipart/form-data') ); 
		  echo $this->Form->hidden('AdsUserPlan.id');
		  ?>
         
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ads-user">Ads User <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php if(empty($users)) $users = ''; echo $this->Form->input('AdsUserPlan.ads_user_id', array('options'=>$users,'required'=>'true','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','title'=>'Select User'));?> </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php if(empty($plans)) $plans = ''; echo $this->Form->input('AdsUserPlan.ads_plan_id', array('options'=>$plans,'required'=>'true','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12 selectpicker show-menu-arrow','title'=>'Select Plan'));?> </div>
          </div>

            <div class="form-group">
             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan Start Date <span class="required">*</span> </label>
             <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUserPlan.plan_start_date', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Plan Start Date'));?> </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan End Date <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUserPlan.plan_end_date', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'text','placeholder'=>'Plan End Date'));?> </div>
           </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Content for ads <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUserPlan.content_for_ads', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'textarea','autofocus'=>true,'placeholder'=>'Content for ads'));?> 
              <label id="plan-name-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Url Link <span class="required">*</span> </label>
            <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUserPlan.url_link', array('required'=>'true', 'class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'type'=>'url','autofocus'=>true,'placeholder'=>'Url Link'));?> 
              <label id="plan-name-error" class="error control-label col-md-3 col-sm-3 col-xs-12" style="width:100%; text-align:left; float:left; display:none"></label>           </div>
            </div>

            <?php 
                $image_row = 0;
                if(substr_count($this->request->data['AdsUserPlan']['ad_image_path'], ',') > 0){
                    $images = explode(",", $this->request->data['AdsUserPlan']['ad_image_path']);
                if(count($images) > 0){
                  foreach ($images as $image) {
                  $image_row++;
            ?>
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Image <span class="required">*</span> </label>
                      <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUserPlan.ad_image_path.', array('type'=>'file', 'multiple'=>'multiple','class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12',));?> 

                         <div><a data-lightbox="example-1" href="<?=$adsimg.$image?>"><img  src="<?=$adsimg.$image?>" style="width:100px; height:100px; border:solid 2px #CCC;padding:5px 5px;padding-left:5px; margin-left:12px" /></a></div>
                      </div>
                  </div>
            <?php
                  }
                }
              } else {
                $image_row++;
             ?>

             <div class="form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Image <span class="required">*</span> </label>
                 <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUserPlan.ad_image_path.', array('type'=>'file', 'multiple'=>'multiple','class' => 'form-control col-md-7 col-xs-12','label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12',));?> 

                    <div><a data-lightbox="example-1" href="<?=$adsimg.$this->request->data['AdsUserPlan']['ad_image_path']?>"><img  src="<?=$adsimg.$this->request->data['AdsUserPlan']['ad_image_path']?>" style="width:100px; height:100px; border:solid 2px #CCC;padding:5px 5px;padding-left:5px; margin-left:12px" /></a></div>
                 </div>
             </div>
             <?php } ?>

             <?php 
                for($count = $image_row; $count <= 4; $count++){
              ?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Image <span class="required">*</span> </label>
                    <div class="col-md-6 col-sm-6 col-xs-12"> <?php echo $this->Form->input('AdsUserPlan.ad_image_path.', array('type'=>'file', 'class' => 'form-control col-md-7 col-xs-12','multiple' => true,'label' => false, 'div' => false,'class' => 'form-control col-md-7 col-xs-12',));?> </div>
                 </div>
              <?php    
                }
              ?>
            
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>businesstypes" class="btn btn-primary">Cancel</a> </div>
          </div>
          </form>
          <div>
                        <p>- Ctrl + S for Save Data</p>
                        <p>- Ctrl + C for go to list page</p>
                     
                        </div>

        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- /page content -->
<script>
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

      event.preventDefault();
      console.log("Ctrl-s pressed");
$("#submit").click();
      return false;

   });



});

shortcut.add("Ctrl+C",function() {
	window.location.href='<?php echo $path ?>adsuserplans';

});

jQuery(function($){
   $("#AdsUserPlanPlanStartDate").mask("99-99-9999",{placeholder:"dd-mm-yyyy"});
    $("#AdsUserPlanPlanEndDate").mask("99-99-9999",{placeholder:"dd-mm-yyyy"});
  });


</script>