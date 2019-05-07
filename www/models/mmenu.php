<?php
    require_once "Z:/home/test1.ru/www/config/db.php" ;
    
    class Mmenu extends Db {
        function return_menu() {
            $sql = "select id, menu_name from pages where visible = '1' order by position" ;
            $res = $this->sql($sql) ;
            return $res ; 
        }
    }
?>
