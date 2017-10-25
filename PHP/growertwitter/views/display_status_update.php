<?php
include_once('../include/webzone.php');

    echo '<p><i class="icon-plus-sign"></i> <b>Update my Twitter status</b></p>';

    echo '<p><textarea id="status_message" style="width:480px; height:90px;"></textarea></p>';

    /* new code */
    $str = file_get_contents('../Categories.json');
    $json = json_decode($str, true);

    echo '<p><b>Choose Category: </b><br><select name="category_'.$i.'"><option id="cate"> Choose the category</option>';
    for($i=0; $i < sizeof($json['categories']); $i++)
    {
              echo '<option class="category" id="cate" value=\''.$json['categories'][$i].'\' data-indexElement="'.$i.'">'.$json['categories'][$i].'</option>';
    }
    echo '</select></p>';
    echo '<p><b>Add #tag: </b><br> <input type="text" name="tag" id="tag" /></p>';
    /* //new code */

    echo '<input type="submit" id="status_update_btn" value="Post status" class="btn">';

?>
