<?php

  //POST送信を確認
  if(isset($_POST['action']) && $_POST['action'] == "register_item"){

      require ('dbinfo.php');
      $db = get_db();

      //postの情報を代入しておく
      $name = $_POST['name'];
      $text = $_POST["text"];
      $price = $_POST["price"];
      $category = $_POST["category"];

      $sql = "insert into product(name,text,price,category) values('$name','$text','$price','$category')";
      $db->query($sql);
      header('location:index.php');
      exit();

  }


 ?>
