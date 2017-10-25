<?php
for($i = 0;$i < sizeof($currentMenu); $i++)
{
    $currentMenu[$i] = $i == 1 ? 1 : 0;
}
include_once('../include/webzone.php');
include_once('../include/presentation/header.php');
?>

<link rel="stylesheet" href="<?php echo $GLOBALS['path'].'admin/css/styleAdmin.css' ?>" type="text/css">
<script type="text/javascript" src="<?php echo $GLOBALS['path'].'admin/js/scriptAdmin.js' ?>"></script>

<div class="container">
    <div class="row">
        <div class="span10">
            <div class="row">
                <div class="span12">
                    <div id="adminHeader" class = "page-header">
                        <h1>
                           Admin panel 
                        </h1>

                    </div>
                </div>
                <div class="span4">
                </div>
            </div>
            <div class="row">
                <div class="span4 offset4">
                    <div class = "page-header">
                        <h1>
                           <small>Configure categories and ads</small>
                        </h1>
                    </div>
                </div>
                <div class="span4">
                </div>
            </div>
            <div class="row">
                <div id="categoriesContainer" class="span8 offset4 paddingLeft100">
                    <?php
                        $str = file_get_contents('../Categories.json');
                        $json = json_decode($str, true);

                        for($i=0; $i < sizeof($json['categories']); $i++)
                        {
                            echo '<div class="checkbox">'
                                        .'<label><input name="category_'.$i.'" class="category" type="checkbox" value=\''.$json['categories'][$i].'\' data-indexElement="'.$i.'">'.$json['categories'][$i].'</label>'
                                        .'<label>'.$json['ads'][$i].'</label>'
                                .'</div>';
                        }

                    ?>
                </div>

            </div>
            <div class="row">
                <div class="span8 offset4 paddingLeft100">
                    <?php
                        echo '<button id="btnAddCategory" type="button" class="btn btn-success btnAdminForm" data-toggle="modal" data-target="#addCategoryModal">Add new category</button>';
                    ?>
                </div>

            </div>
            <div class="row">
                <div class="span8 offset4 paddingLeft100 paddingTop5">
                    <?php
                        echo '<button id="btnDeleteCategory" type="button" class="btn btn-danger btnAdminForm" >Delete selected categories</button>';
                    ?>
                </div>
            </div>
            <!-- <div class="row">
                <div class="span4 offset4">
                    <div class = "page-header">
                        <h1>
                           <small>Add HTML</small>
                        </h1>
                    </div>
                </div>
                <div class="span4">
                </div>
            </div> -->
            <!-- <div class="row">
                <div id="htmlCodeContainer" class="span8 offset4 paddingLeft100">
                    <?php
                        //$str = file_get_contents('../AdminHtml.json');
                      //  $json = json_decode($str, true);

                        //for($i=0; $i < sizeof($json['elementsSaved']); $i++)
                        {
                          //  echo '<div class="checkbox">'
                            //            .'<label><input name="htmlCode_'.$i.'" class="htmlCode" type="checkbox" value=\''.$json['elementsSaved'][$i].'\' data-indexElement="'.$i.'">'.$json['elementsSaved'][$i].'</label>'
                            //    .'</div>';
                        }
                    ?>
                </div>

            </div> -->
            <!-- <div class="row">
                <div class="span8 offset4 paddingLeft100">
                    <?php
                      //  echo '<button id="btnAddHtmlCode" type="button" class="btn btn-success btnAdminForm" data-toggle="modal" data-target="#addHtmlCodeModal">Add new HTML Code</button>';
                    ?>
                </div>

            </div>
            <div class="row">
                <div class="span8 offset4 paddingLeft100 paddingTop5">
                    <?php
                      //  echo '<button id="btnDeleteHtmlCode" type="button" class="btn btn-danger btnAdminForm" >Delete selected HTML Code</button>';
                    ?>
                </div>
            </div> -->
        </div>
        <div class="span2" style="text-align:right;">

			<p>Some of our other apps</p>

			<a href="http://codecanyon.net/item/advanced-php-store-locator/244349?ref=yougapi" target="_blank"><img src="<?php echo $GLOBALS['path'].'include/graph/advanced-store-locator-mini.png'?>" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/jquery-carousel-evolution-for-wordpress/702228?ref=yougapi" target="_blank"><img src="<?php echo $GLOBALS['path'].'include/graph/carousel-wpress-mini.png' ?>" style="margin-bottom:10px;"></a>
			&nbsp;<a href="http://codecanyon.net/item/domains-names-checker/3298128?ref=yougapi" target="_blank"><img src="<?php echo $GLOBALS['path'].'include/graph/domains-checker-mini.png' ?>" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/facebook-images-gallery/3281185?ref=yougapi" target="_blank"><img src="<?php echo $GLOBALS['path'].'include/graph/fb-gallery-mini.png' ?>" style="margin-bottom:10px;"></a>

			<br>

			<p>Featured mobile apps</p>
			<a href="http://codecanyon.net/item/mobile-site-builder/491023?ref=yougapi" target="_blank"><img src="<?php echo $GLOBALS['path'].'include/graph/mobile-builder-mini.png' ?>" style="margin-bottom:10px;"></a>
			<a href="http://codecanyon.net/item/mobile-store-locator/239351?ref=yougapi" target="_blank"><img src="<?php echo $GLOBALS['path'].'include/graph/mobile-store-locator-mini.png' ?>" style="margin-bottom:10px;"></a>
        </div>
    </div>

    <!-- Modal Category -->
    <div id="addCategoryModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add new category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtNewCategory">Please insert the name for the new category:</label>
                        <input id="txtNewCategory" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtHtmlCode">Please insert your html code below:</label>
                        <textarea id="txtHtmlCode" class="form-control" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnSaveNewCategory" type="button" class="btn btn-success" data-dismiss="modal">Save category</button>
                </div>
            </div>

        </div>
    </div>
    
    <!-- Modal HTML code -->
    <div id="addHtmlCodeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add new code HTML:</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtHtmlCode">Please insert your html code below:</label>
                        <textarea id="txtHtmlCode" class="form-control" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnSaveHtmlCode" type="button" class="btn btn-success" data-dismiss="modal">Save html code</button>
                </div>
            </div>

        </div>
    </div>
  <!-- //Modal HTML code -->
</div>



<?php
include_once('../include/presentation/footer.php');
?>
