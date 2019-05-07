<form method="post">
    Description: <input type="text" name="description" /><br />
    Keywords: <input type="text" name="keywords" /><br />
    Title: <input type="text" name="title" /><br />
    Menu name:   <input type="text" name="menu_name" /><br />
    Menu position:
    <select name = "position"> 
        <?php 
            $menu = $vcreateedit->menu_return('At the end of the list'); 
            $max = count($menu) ; 
            $counter = 0 ;
        ?>
        <?php foreach($menu as $menu_name => $position) : ?>
            <?php $counter++ ; if($counter != $max) : ?>
                <option value = "<?=$position;?>"><?=$position." - ".$menu_name ; ?></option>
            <?php else : ?>
                <option value = "<?=$position;?>" selected><?=$position." - ".$menu_name ; ?></option>
            <?php endif ; ?>
        
        <?php endforeach ; ?>
    </select><br />
    Visibility:<select name="visible">
                    <option value="1">visible</option>
                    <option value="0">not visible</option>
                    </select><br />                
    Page text:<br />
    <textarea name="content"></textarea><br />
    <input type="submit" name="create" value="OK">
</form>