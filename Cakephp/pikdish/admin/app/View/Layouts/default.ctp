<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pikdish | Admin</title>

    <!-- Bootstrap core CSS -->
 <?php  
    echo $this->Html->script('/js/jquery-3.2.1.min.js'); 
    echo $this->Html->script('/js/jquery-1.11.3.js'); 
    echo $this->Html->script(array('/js/shortcut/shortcut.js'));
    echo $this->Html->script('bootstrap.min.js');
    echo $this->Html->script('custom.js');
	echo $this->Html->script('jquery.maskedinput.js');
 
 
    echo $this->Html->css('bootstrap.min.css');
    echo $this->Html->css('/fonts/css/font-awesome.min.css');
    echo $this->Html->css('custom.css');
    echo $this->Html->css('animate.min.css');
 
 
 //Jqgrid JS
 	echo $this->Html->script('jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js');
 	echo $this->Html->script('jqGrid/js/jquery.jqGrid.min.js');
 	echo $this->Html->script('jqGrid/src/jquery.jqGrid.js');
 	echo $this->Html->script('jqGrid/js/i18n/grid.locale-en.js');
    echo $this->Html->script('jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.widget.js');
	echo $this->Html->script('jquery-ui-1.9.2.custom/development-bundle/ui/jquery-ui-timepicker-addon.js');
	echo $this->Html->script('jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.dialog.js');
	echo $this->Html->script('jquery-ui-1.9.2.custom/development-bundle/ui/jquery.ui.tabs.js');
	
 //Jqgrid Css
    echo $this->Html->css($path.'js/jqGrid/src/css/ui.jqgrid.css');
    echo $this->Html->css($path.'js/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.css');
 
 //Select Box
		echo $this->Html->script($path.'/js/bootstrap-select/dist/js/bootstrap-select.js');
		echo $this->Html->css($path.'/js/bootstrap-select/dist/css/bootstrap-select.css');  
  ?>
    
   
 <style>
 
   .ui-jqgrid .loading {
        background:  url(<?=$imgpath?>loading.gif) ;
        border-style: none;
        background-repeat: no-repeat;
		color: transparent;
	                   } 

textarea:focus, input:focus,select:focus, input[type]:focus, .uneditable-input:focus 
{   
    border-color: black;
    box-shadow: 0 1px 1px #FFC inset, 0 0 8px #FFC;
    outline: 0 none;
    background-color:#FFC;
}
checkbox:focus
{   
    border-color: #FFC;
    
    
    background-color:#FFC;
}
.btn-success:focus
{
    background: #F39;
}

button.dropdown-toggle	   
{
	border-radius:7px;
}

.loader {
    border-top: 6px solid blue;
    border-right: 6px solid green;
    border-bottom: 6px solid red;
    border-left: 6px solid pink;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    animation: spin 2s linear infinite;
	display:inline-block;
	margin-left:50%;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
}

#back_to_top
{
	display:none;
	width:50px;
	height:50px;
	border-radius:50%;
	font-size:24px;
	position:fixed;
	bottom:100px;
	right:25px;
	background:#FFF;
	opacity:1;
	filter: alpha(opacity=100);
	padding: 8px 0px 0 11px;
	color:#CCC;
	border:1px solid #CCC;

	
}

#back_to_top:hover
{
	
	opacity:1;
	background:#CCC;
	color:#FFF;
	border-color:#fff;
	filter: alpha(opacity=100);

	
}
</style>
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo $path; ?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo "PikDish" ?></span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
						<?php if(@$userArr['User']['user_pic']!=""){ ?>
								<img src="<?php echo $userimg;  ?><?php echo @$userArr['User']['user_pic']; ?>" class="img-circle profile_img">
								<?php }else{ ?>
                                    <img src="<?php echo $imgpath;  ?>img.jpg" class="img-circle profile_img">
								<?php } ?>	
                           
                        </div>
						
                        <div class="profile_info">
                            <span><?= __('Welcome') ?>,</span>
                            <h2><?php echo AuthComponent::user('name');?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" style="cursor:pointer;">

                        <div class="menu_section">
                            <h3>&nbsp;</h3>
                                <ul class="nav side-menu">
                            <li>
                            <a><i class="fa fa-edit"></i> Users <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                	 <li><a href="<?php echo $path ?>users">Member User</a> </li>
                                	 <li><a href="<?php echo $path ?>restaurants">Restaurants</a> </li>
                                	 <li><a href="<?php echo $path ?>customers">Customer</a> </li>
                                </ul>
                             </li>

                             <li>
                             <a><i class="fa fa-edit"></i> Payment <span class="fa fa-chevron-down"></span></a>
                                 <ul class="nav child_menu" style="display: none">
                                     <!-- <li><a href="<?php echo $path ?>users">Payment Request</a> </li> -->
                                     <li><a href="<?php echo $path ?>reconciliations">Payment Reconciliation</a> </li>
                                 </ul>
                              </li>

                              <li>
                              <a><i class="fa fa-edit"></i> Advertisement <span class="fa fa-chevron-down"></span></a>
                                  <ul class="nav child_menu" style="display: none">
                                      <li><a href="<?php echo $path ?>businesstypes">Business Type</a> </li>
                                      <li><a href="<?php echo $path ?>adsusers">Ads Users</a> </li>
                                      <li><a href="<?php echo $path ?>adsplans">Ads Plans</a> </li>
                                      <li><a href="<?php echo $path ?>adsuserplans">Ads User Plans</a> </li>
                                  </ul>
                               </li>

                             <li><a href="<?php echo $path ?>taxs"><i class="fa fa-edit"></i>Restaurant Bill Taxs <span class="fa fa-chevron-down"></span></a></li>
                             <li>
                            <a><i class="fa fa-edit"></i> Feedback <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                	 <li><a href="<?php echo $path ?>app_feedback">App Feedback</a> </li>
                                	 <li><a href="<?php echo $path ?>restro_feedback">Restaurants Feedback</a> </li>
                                </ul>
                                
                            </li>
                            <li><a href="<?php echo $path ?>reports"><i class="fa fa-edit"></i> Reports <span class="fa fa-chevron-down"></span></a></li>
						    </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                       
                        <a href="<?php echo $path ?>users/logout" data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<?php if(@$userArr['User']['user_pic']!=""){ ?>
								<img src="<?php echo $userimg;  ?><?php echo @$userArr['User']['user_pic']; ?>" alt="">
								<?php }else{ ?>
                                    <img src="<?php echo $imgpath;  ?>img.jpg" alt="">
								<?php } ?>	
									<?php echo AuthComponent::user('name');?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
								
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo $path ?>users/profile">  Profile</a>
                                    </li>
                                    <li><a href="<?php echo $path ?>users/change_password">  Change Password</a>
                                    </li>
								<?php if(AuthComponent::user('user_type')==0)
								{ ?>	
                                    <li><a href="<?php echo $path ?>settings"> Setting</a></li>
									 <li><a href="<?php echo $path ?>users/add"> Add New Member</a></li>
									 <li><a href="<?php echo $path ?>users">Member List</a></li>
								<?php } ?>	
                                    <li><a href="<?php echo $path ?>users/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                          

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- top navigation -->
  <!-- #page-content-wrapper -->
   <?php echo $this->fetch('content'); ?>
   
  <!-- /#page-content-wrapper -->
                <!-- footer content -->

                 <footer>
				<div class="nav">
				<div style="width:100%; height:40px; text-align:center; overflow:auto;margin-left:0px" class="col-md-offset-1">
				 &copy; Copyright <?php echo date('Y'); ?> @ PikDish<br />
				 Developed and Managed By Winspiration Technologies Pvt Ltd.</div>
				</div>
                   
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->
        </div>


 <?php  echo $this->Html->script('bootstrap.min.js'); 
     echo $this->Html->script('nicescroll/jquery.nicescroll.min.js');
    
	 ?>
 
</body>

</html>