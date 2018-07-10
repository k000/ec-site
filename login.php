<?php


    $msg = "";

    session_start();
    //ログイン済かどうか調べる
    if(isset($_SESSION["login"])){
      header("location:adminmenu.php");
      exit;
    }


    if(isset($_POST['login'])) {

    require('dbinfo.php');

    $name = mysql_real_escape_string($_POST["name"]);
    $pass = md5(mysql_real_escape_string($_POST["password"]));



    $db = get_db();
    $state = $db->prepare("SELECT * FROM user WHERE name = ? and password=?");
    $state->bindValue(1, $name);
    $state->bindValue(2, $pass);
    $state->execute();

    if($row = $state->fetch(PDO::FETCH_ASSOC)){
      $_SESSION["login"] = $name;
      header("location:adminmenu.php");
      exit;
    }else{
      $msg = "ユーザー名またはパスワードに間違いがあります。";
    }


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

       </head>
       <style>
          body{
            background:#f6f6f6;
            color:#777;
          }
       </style>
 <body>

    <div class="container mt-5">
      <h1 class="m-5">管理者メニューログイン</h1>


      <div class="loginarea pl-5 pr-5">
        <?php if($msg != "") : ?>
          <div class="alert alert-danger"><?php echo $msg ?></div>
        <?php endif; ?>
        <form action="" method="post">

          <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" id="name" name="name" class="form-control" />
          </div>

          <div class="form-group">
            <label>パスワード</label>
            <input type="password" id="password" name="password" class="form-control" />
          </div>

          <div class="form-group">
            <input type="hidden" id="login" name="login">
            <button type="submit" class="btn btn-info">ログイン</button>
          </div>

        </form>
    </div>

    <a href="index.php">トップへ</a>

    </div>
</body>
</html>
