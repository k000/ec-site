<?php

  //POST送信を確認
  if(isset($_POST['action']) && $_POST['action'] == "deleteitem"){

      require ('dbinfo.php');
      $db = get_db();

      //postの情報を代入しておく
      $id = $_POST['id'];

      $sql = "delete from product where id=?";

      $state = $db->prepare($sql);

      $state->execute(array($id));


      exit();

  }


 ?>
