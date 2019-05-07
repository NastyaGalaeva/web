<?php
    $editpage = new CcreateEdit() ;
    $id = $_GET['edit'] ;
    $cont = $editpage->print_pageedit($id) ;
    //echo "<pre>" ;
    //print_r($cont) ;
    //echo "</pre>" ;
?>
<form method="post">
    <input type="hidden" name="id" value="<?=$id;?>">
    Description: <input type="text" name="description" value = "<?=$cont['description'] ; ?>" /><br />
    Keywords: <input type="text" name="keywords" value = "<?=$cont['keywords'] ; ?>" /><br />
    Title: <input type="text" name="title" value = "<?=$cont['title'] ; ?>" /><br />
    Menu name:   <input type="text" name="menu_name" value = "<?=$cont['menu_name'] ; ?>" /><br />
    Menu position:
    <select name = "position"> 
        <?php 
            $menu = $vcreateedit->menu_return(); 
        ?>
        <?php foreach($menu as $menu_name => $position) : ?>
            <option value = "<?=$position;?>" <?php if($menu_name == $cont['menu_name']) {echo "selected" ;} ?>><?=$position." - ".$menu_name ; ?></option>
        <?php endforeach ; ?>
    </select><br />
    Visibility:<select name="visible">
                    <option value="1"><?php if($cont['visible'] == 1) {echo "selected" ;} ?>visible</option>
                    <option value="0"><?php if($cont['visible'] == 0) {echo "selected" ;} ?>not visible</option>
                    </select><br />                
    Page text:<br />
    <textarea name="content"><?=$cont['content'] ; ?></textarea><br />
    <input type="submit" value="OK">
</form>