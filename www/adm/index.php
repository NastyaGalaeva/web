<?php
  require_once "Z:/home/test1.ru/www/config/config.php" ;
?>

<a href="?page=create">Create a page</a> - <a href="?page=list">Page list</a><hr />

<?php
    if($_POST){
        require_once "Z:/home/test1.ru/www/controllers/ccreateedit.php" ;
        if($_GET['page'] == "create") {
            $vcreateedit->post_data($_POST) ;
        } elseif($_GET['edit']) {
            $vcreateedit->update_data($_POST) ;
        }         
    }
    
    if($_GET['page'] == "create") {
        require_once "Z:/home/test1.ru/www/controllers/ccreateedit.php" ;
        require_once "Z:/home/test1.ru/www/views/vcreate.php" ;
    }
    
    if($_GET['page'] == "list") {
        require_once "Z:/home/test1.ru/www/controllers/ccreateedit.php" ;
        require_once "Z:/home/test1.ru/www/views/vlist.php" ;
    }
    
    if($_GET['edit']) {
        require_once "Z:/home/test1.ru/www/controllers/ccreateedit.php" ;
        require_once "Z:/home/test1.ru/www/views/vedit.php" ;
    }
    
    if($_GET['delete']) {
        require_once "Z:/home/test1.ru/www/controllers/ccreateedit.php" ;
        $vcreateedit->del_page($_GET['delete']) ;
        require_once "Z:/home/test1.ru/www/views/vlist.php" ;
    }
?>
