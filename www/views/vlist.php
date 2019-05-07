<?php
    $aux_list = new CcreateEdit() ;
    $list = $aux_list->print_list() ;
    echo "<table>" ;
    foreach($list as $id => $menu_name) :
?>  
    <tr>
        <td><?=$menu_name ; ?></td>
        <td><a href = "?edit=<?=$id ; ?>">Edit</a></td>
        <td><a href = "?delete=<?=$id;?>">Delete</a></td>
    </tr>
<?php endforeach ; ?>
<table>