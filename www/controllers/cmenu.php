<?php
  require_once "Z:/home/test1.ru/www/models/mmenu.php" ;

  class Cmenu extends Mmenu {
      function print_menu() {
          $res = $this->return_menu() ;  //���������� ������ �� ��������� ������� � ��
          while($row = mysql_fetch_array($res)) {  
              $mname[$row['id']] = $row['menu_name'] ; //�������� � ������ ��������� ��������� ������
          }
          return $mname ;
      }
  }
  
  $aux_vmenu = new Cmenu() ;
  $vmenu = $aux_vmenu->print_menu() ;
  
?>
