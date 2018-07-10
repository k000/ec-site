<?php

//セッションにカートの状態を保存反映させる
//ajaxで値を受け取ります


session_start();

//addcartである時のみ
  if(isset($_POST['action']) && $_POST['action'] == "addcart"){

    //カートが既にある場合（2回目のアクション）
    if(isset($_SESSION["shopping_cart"])){

      $already = false;

      //同じ商品の場合は個数を増やすだけでいいので
      //既にあるセッション変数のkeyとvalueを取り出す
      foreach($_SESSION['shopping_cart'] as $keys=>$values){
        //同じ商品を追加したときは個数を増やす
        if($_SESSION["shopping_cart"][$keys]['id'] == $_POST["id"]){
          $already = true;
          $_SESSION["shopping_cart"][$keys]['num'] = $_SESSION["shopping_cart"][$keys]['num'] + $_POST["num"];
        }
      }//end foreach

      if(!$already){
        $items = array(
          'id' => $_POST['id'],
          'name' => $_POST['name'],
          'price' => $_POST['price'],
          'num' => $_POST['num']
        );

        $_SESSION["shopping_cart"][] = $items;

      }

    }
    //初回のアクション。（初めてカートに入れた時)
    else{
      $items = array(
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'num' => $_POST['num']
      );
      //セッション変数の設定（初回の設定）
      $_SESSION["shopping_cart"][] = $items;
    }
  }

 ?>
