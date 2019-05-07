<?php
  require_once "Z:/home/test1.ru/www/controllers/cmenu.php" ;
  echo "<ul>" ;
  foreach($vmenu as $uri => $link) {
      echo "<li><a href = \"?id={$uri}\">{$link}</a></li>" ;
  }
  echo "</ul>" ;
  
?>
