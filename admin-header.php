<?php
session_start();

if(!isset($_SESSION["login"])){
  header("location:login.php");
}

 ?>
<html lang="ja">
      <head>
      <title>ショッピングサイト</title>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
           <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
           <link rel="stylesheet" href="style.css">


      </head>
<body>



  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">TopPage</a>
  </nav>

  <div class="container mt-5 text-center">
    <div class="row">

    </div>
  </div>


  <div class="container text-center mt-5">
    <div class="row">
      <div class="col-12">
        <P><strong>管理者用メニューです。データベースを操作するので慎重に行なってください</strong></P>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItemModal">
            商品の追加
        </button>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addImageModal">
            画像のアップロード
        </button>

      </div>
    </div>
  </div>
