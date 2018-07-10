<?php


if(isset($_POST['action']) && $_POST['action'] == "save_item"){


  require('dbinfo.php');
  $con = get_db();
  //未入力項目は確認済み

  $id = $_POST["id"];
  $name = $_POST["name"];
  $text = $_POST["text"];
  $price = $_POST["price"];
  $category = $_POST["category"];

  $sql = "update product set name='$name',text='$text',price=$price,category='$category' where id=$id";
  $con->query($sql);



}else{
  header('location: adminmenu.php');
}



 ?>
