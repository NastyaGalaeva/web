<?php
  require_once "Z:/home/test1.ru/www/controllers/ccontent.php" ;
  
  $id = $_GET['id'] ;
  $vcontent = new Ccontent() ;
  $page = $vcontent->print_content($id) ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
    Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Description" content="<?=$page['description'];?>" />
    <meta name="Keywords" content="<?=$page['keywords'];?>" />
    <title><?=$page['title'];?></title>
    <link rel="stylesheet" type="text/css" href="CSS" />
</head>
<body>
<table border="1" style="margin: 0 auto; width: 900px; height: 300px">
    <tr>
        <td align="center" colspan="2" width = "100%" height = "20%">News</td>
    </tr>
    <tr>
        <td width="30%">
            <?php require_once "Z:/home/test1.ru/www/views/vmenu.php" ; ?>
        </td>
        <td width="70%">
            <?= $page['content'] ; ?><hr />
            <?= $page['created'] ; ?>
        </td>
    </tr>
</table>
</body>
</html>

