<?php

//アップロードボタンの押下時
  if(isset($_POST['upload'])){
    //$_FILEは連想配列
    //$_FILES['inputで指定したname']['name']：ファイル名
    $target = "images/" . basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];

    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        echo '<script type="text/javascript">alert("アップロード完了");</script>';
        header('location:adminmenu.php');
    }else{
        echo '<script type="text/javascript">alert("失敗しました。フォルダのアクセス権限等確認してください");</script>';
    
    }
  }

 ?>
