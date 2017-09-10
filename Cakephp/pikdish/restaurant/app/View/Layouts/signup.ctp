<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pikdish | Sign Up</title>
        
        <?php 
            echo $this->Html->css('main.css');
            echo $this->Html->css('/fonts/css/font-awesome.min.css');
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <style type="text/css">
            #mainImg {
                width: 95%;
            }
            </style>
        <script>var base_url = '<?php echo Router::url('/', true); ?>';</script>
    </head>


    <body>
        <div class="col-lg-8 col-lg-offset-2" style="z-index:0; position:relative;  vertical-align:middle;">
            <div class="limit">
                <?php echo $this->Html->image('background.png'); ?>
            </div>

            <div id="main">
                <section id="content" class="main">     
                    <div class="imgs">
                        <?php echo $this->Html->image('img1.png',array('fullBase' => true) , array('width'=>'95%','id'=>'mainImg')); ?>
                        <?php echo $this->Html->image('title.png',array('fullBase' => true),array('id'=>'titleImg')); ?>
                        <?php echo $this->Html->image('welcome.png',array('fullBase' => true),array('id'=>'welcomeImg')); ?>
                    </div>
                        <div class="whiteBox" style="background-color:white; margin-top: -115px !important; padding-bottom: 10px;">
                        <div style="padding-top:115px;">
                            <div class="introText">     
                                <div class="row">
                                    <h2 class="intro">Dear Customer</h2>
                                </div>
                                <div class="row">
                                    <p class="intro">Thank you so much for joining us! And any other text as required...</p>
                                </div>
                            </div>
                            <div class="row" style="text-align:center; font-weight:590;">
                                More things you would love to see
                            </div>
                        </div>
                        <hr class="style-one" align="center" >
                        
                        
                            <!-- Lists -->
                                <section>
                                    <div class="row columnSection">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-8 menuCol">
                                            <div class="row">
                                            <i class="fa fa-smile-o" aria-hidden="true" style="display:inline-block;"></i><p style=" width: 430px; display:inline-block; vertical-align:middle; font-weight:bold; font-size:22px; word-wrap:break-word; white-space:pre-line; white-space:initial;">Happier Customers</p>
                                            </div>
                                            <div class="row">
                                            <i class="fa fa-certificate" aria-hidden="true" style="display:inline-block;"></i><p style=" width: 430px; display:inline-block; vertical-align:middle; font-weight:bold; font-size:22px; word-wrap:break-word; white-space:pre-line; white-space:initial;">More focus on service and quality</p>
                                            </div>
                                            <div class="row">
                                            <i class="fa fa-list-alt" aria-hidden="true" style="display:inline-block;"></i><p style=" width: 430px; display:inline-block; vertical-align:middle; font-weight:bold; font-size:22px; word-wrap:break-word; white-space:pre-line; white-space:initial;">Manage your order status</p>
                                            </div>
                                            <div class="row">
                                            <i class="fa fa-tasks" aria-hidden="true" style="display:inline-block;"></i><p style=" width: 430px; display:inline-block; vertical-align:middle; font-weight:bold; font-size:22px; word-wrap:break-word; white-space:pre-line; white-space:initial;">Digital Menu</p>
                                            </div>
                                            <div class="row">
                                            <i class="fa fa-rss" aria-hidden="true" style="display:inline-block;"></i><p style=" width: 430px; display:inline-block; vertical-align:middle; font-weight:bold; font-size:22px; word-wrap:break-word; white-space:pre-line; white-space:initial;">Review & Feedback</p>
                                            </div>
                                            <div class="row">
                                            <i class="fa fa-shopping-bag" aria-hidden="true" style="display:inline-block;"></i><p style=" width: 430px; display:inline-block; vertical-align:middle; font-weight:bold; font-size:22px; word-wrap:break-word; white-space:pre-line; white-space:initial;">Seemless Checkout</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                        </div>
                                    </div>
                                </section>
                                <div class="bottomText">
                                    <div class="row moreText">Other text spaces, if required more text could be added here...Customize it as needed</div>
                                    <div class="row moreText">Thanks</div>
                                </div>
                            </div>
                            <div class="row stay">Stay Connected</div>          
                            <div class="row social-icons"> 
                                <?php echo $this->Html->image('tweeterbutton.png'); ?>
                                <?php echo $this->Html->image('facebookbutton.png'); ?>
                                <?php echo $this->Html->image('emailbutton.png'); ?>
                            </div>
                            <div class="row copyrights">© Copyright 2015 all right reserved by Book Cafe</a></div>
                </section>
            </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?  echo $this->Html->script('bootstrap.min.js');
        echo $this->Html->script('nicescroll/jquery.nicescroll.min.js');
    ?>
    </body>

</html>