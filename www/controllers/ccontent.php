<?php
  require_once "Z:/home/test1.ru/www/models/mcontent.php" ;

  class Ccontent extends Mcontent {
      function print_content($id) {
          settype($id, 'integer') ;
          $res = $this->return_content($id) ;  //���������� ������ �� ��������� ������� � ��
          $row = mysql_fetch_assoc($res) ;
          $page = array() ;
          if($row){
              foreach($row as $key => $value){
                  $page[$key] = $value ;
              }    
          }
          return $page ;
          //$val = $row['content'] ; //������
          //return $val ;
      }
  }    
?>
