<?php $this->assign('title', 'Equipment');?>

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
		   width:100% !important;
		   height:25px !important
		   
		   
	   }
	   #sflashMessage
	   {
		  margin-bottom :0px !important;  
	   }
	   
</style>
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit Tax</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content">
          <?php echo $this->Form->create('TaxMaster',array('url'=>'edit','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left') ); 
		  echo $this->Form->hidden('TaxMaster.id');
		  ?>
           <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column" >
                <table class="table table-bordered table-hover" id="tab_logic">
                  <thead>
                    <tr style="background:#FF9" >
                     <th width="25%" class="text-center">Tax Name*</th>
                      <th width="25%" class="text-center">Tax Print Name*</th>
                      <th width="25%" class="text-center">Rate*</th>
                   </tr>
                  </thead>
                  <tbody>
                    <tr id='addr1' class="tdr" >
                   	
					  <td><input name="data[TaxMaster][tax_name]" required="required" class="form-control col-md-7 col-xs-12" autofocus="autofocus" placeholder="Inter Code" value="<?=$this->request->data['TaxMaster']['tax_name']?>" ></td>
                     <td><input name="data[TaxMaster][print_name]"  required="required" class="form-control col-md-7 col-xs-12"  placeholder="Tax Print Name"  value="<?=$this->request->data['TaxMaster']['print_name']?>"></td>
                     <td><input name="data[TaxMaster][rate]" required="required" class="form-control col-md-7 col-xs-12"  placeholder="Rate"  min=0 type="number" value="<?=$this->request->data['TaxMaster']['rate']?>" step="0.1"></td>
                    </tr>
     
                    
                  </tbody>
                </table>
              </div>
            </div>
           </div>
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>taxs" class="btn btn-primary">Cancel</a> </div>
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
	window.location.href='<?php echo $path ?>taxs';

});
</script>