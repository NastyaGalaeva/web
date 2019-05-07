<?php
  require_once "Z:/home/test1.ru/www/config/config.php" ;
  require_once "Z:/home/test1.ru/www/config/db.php" ;
  
  class McreateEdit extends Db {
      function create($post) {
          $sql = "insert into pages(description, keywords, title, menu_name, 
          position, visible, content, created)
          VALUES('{$post['description']}', '{$post['keywords']}', '{$post['title']}', '{$post['menu_name']}', 
          '{$post['position']}', '{$post['visible']}', '{$post['content']}', NOW())" ;
          //echo $sql ;
          $this->sql($sql) ;
          
          return true ;
      }
      function menu_pos() {
          $sql = "select position, menu_name from pages order by position ASC" ;
          $res = $this->sql($sql) ;
          return $res ; 
      }
      function pos_inc($pos) {
          $sql = "update pages set position = position+1 where position >= {$pos}" ;
          $this->sql($sql) ;
      }
      function list_pages() {
          $sql = 'select id, menu_name from pages order by position' ;
          $res = $this->sql($sql) ;
          return $res ;
      }
      function retr_pageedit($id) {
          $sql = 'select description, keywords, title, menu_name, position, content, visible from pages where id = '.$id ;
          $result = $this->sql($sql) ;
          return $result ;
      }
      function update_page($post) {
          $aux_sql ;
          $count = count($post) -1 ;
          //echo $count ;
          $counter = 0 ;
          foreach($post as $key => $val) {
              if($key != 'id') {
                  $counter++ ;
                  if($counter != $count) {
                      $aux_sql .= $key.'=\''.$val.'\',' ;
                  } else {
                      $aux_sql .= $key.'=\''.$val.'\'' ;
                  }
              }
          }
          $sql = 'update pages set '.$aux_sql.' where id = '.$post['id'] ;
          //echo $sql ;
          $this->sql($sql) ;
      }
      function delete_page($id) {
          $sql = 'delete from pages where id = '.$id ;
          $this->sql($sql) ;
      }
  }   
?>
