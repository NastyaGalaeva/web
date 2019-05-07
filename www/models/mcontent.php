<?php
  require_once "Z:/home/test1.ru/www/config/db.php" ;
    
    class Mcontent extends Db {
        function return_content($id = NULL) {
            if($id) {
                settype($id, 'integer') ;
            }
            $sql = "select description, keywords, title, content, created, lastmod 
            from pages where id = {$id} and visible = '1' limit 1" ;
            if(!$id) {
               $sql = "select description, keywords, title, content, created, lastmod
               from pages order by position asc limit 1" ; 
            }
            $result = $this->sql($sql) ;
            return $result ; 
        }
    }
?>
