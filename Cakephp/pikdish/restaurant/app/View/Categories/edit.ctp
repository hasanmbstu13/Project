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
	   
	   textarea 
	   {
		   width:100% !important;
		   
	   }
</style>
<div class="right_col" role="main">
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Edit Categorie</h3>
    </div>
    <div class="title_right">
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel"> <?php echo $this->Session->flash(); ?>
        <div class="x_content"> <br />
        
          <?php echo $this->Form->create('Categories',array('url'=>'edit','method'=>'post','name'=>'editForm','class'=>'form-horizontal form-label-left') ); 
		  echo $this->Form->hidden('Categories.id');
		  ?>
          
           <div class="container">
            <div class="row clearfix">
              <div class="col-md-12 column" >
                <table class="table table-bordered table-hover" id="tab_logic">
				             
                  <thead>
                    <tr style="background:#FF9" >
                      <th width="1%" class="text-center"> S.No. </th>
					  <th width="45%" class="text-center">Category Name*</th>
                      <th width="45%" class="text-center">Description</th>
                                 </tr>
                  </thead>
                  <tbody>
                    <tr id='addr1' class="tdr">
                   	<td style="text-align:center; padding-top:12px;background:#FF9" class="sr">1</td>
			<td><input name="data[Categories][category_name]" required="required" class="form-control col-md-7 col-xs-12" autofocus="autofocus" placeholder="Categorie Name" value="<?=$this->request->data['Categories']['category_name']?>" ></td>
                     <td><textarea name="data[Categories][description]"   class="form-control col-md-7 col-xs-12"  placeholder="Categorie description" ><?=$this->request->data['Categories']['description']?></textarea></td>
                    </tr>
     
                    
                  </tbody>
                </table>
              </div>
            </div>
           </div>
          
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" id="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo $path ?>categories" class="btn btn-primary">Cancel</a> </div>
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
	window.location.href='<?php echo $path ?>categories';

});
</script>