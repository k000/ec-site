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




<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- ブランドは常に表示されている -->
    <a class="navbar-brand" href="index.php">Ksショッピング</a>
    <!-- トグルボタン開閉のメニューをdata-targetで指定する -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- メニュー内容 data-target idが一致していること -->
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
              <i class="fas fa-shopping-cart"></i><!--カートアイコンの表示-->
              <!-- <span class="badge badge-pill badge-light">0</span><!-- バッジの表示 -->
              <span id="total_price">カートの金額0.00円</span>
            </button>

        </li>

        <li>
          <a href="login.php"><button class="btn btn-info ml-5">管理画面</button></a>
        </li>
      </ul>

    </div>
</nav>
