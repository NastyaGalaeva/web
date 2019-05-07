<?php
  require_once "debug.php" ;
  
  class Config extends Debug {
      var $BASE_URL = "test1.ru"; //базовый url сайта
      var $DB_HOST = "localhost";  //имя хоста
      var $DB_USER = "root";
      var $DB_PASS = "";
      var $DB_NAME = "mydatabase";     
  }     
?>
