<?php
  require_once "Z:/home/test1.ru/www/models/mcreateedit.php" ;
                                                               
  class CcreateEdit extends MCreateEdit {
      function clean_data($str){
          if(get_magic_quotes_gpc() == 1) {
              $str = str_replace('\"', "&quot", $str) ; 
              $str = str_replace("\'", "&#039", $str) ; 
              $str = str_replace("<", "&lt", $str) ; 
              $str = str_replace(">", "&gt", $str) ; 
          }
          else{
              $str = htmlspecialchars($str, ENT_QUOTES, "UTF-8", false) ; 
          }
          return $str ;
      }
      
      function post_data($post) {
          foreach($post as $key => $value) {
              $aux_post[$key] = $this->clean_data($value) ;
          }
          $this->pos_inc($aux_post['position']) ;
          $aux_post['content'] = str_replace("\n", "<br />", $aux_post['content']) ;
          $this->create($aux_post) ;
      }
      function menu_return($last_pos = null) {
          $res = $this->menu_pos() ; 
          while($row = mysql_fetch_assoc($res)) {
              $menu[$row['menu_name']] = $row['position'] ;
          }
          if($last_pos) {
              $count = count($menu) ;
              $menu[$last_pos] = $count+1 ;
          }
          return $menu ;
      }
      
      function print_list() {
          $list = $this->list_pages() ;
          while($row = mysql_fetch_assoc($list)) {
              $l[$row['id']] = $row['menu_name'] ;
          }
          return $l ;
      }
      function print_pageedit($id) {
          $res = $this->retr_pageedit($id) ;
          $row = mysql_fetch_assoc($res) ;
          return $row ;
      }
      function update_data($post) {
          $this->update_page($post) ;
      }
      function del_page($id) {
          $this->delete_page($id) ;
      }
  }
  $vcreateedit = new CcreateEdit() ;
?>
