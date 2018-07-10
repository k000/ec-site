<?php
session_start();

require_once('header.php');
//カートの中身を表示する
require_once('cart_modal.php');

if(!isset($_SESSION["shopping_cart"]) || empty($_SESSION["shopping_cart"])){
  header("location:index.php");
}


//商品購入ボタンが押されたとき






$total_price = 0;

 ?>



<div class="container mt-5 text-center">
  <h1>確認画面</h1>

  <table class="table table-bordered text-center mt-5 mb-5">
    <thead class="thead-dark">
      <tr>
        <th>商品名</th>
        <th>個数</th>
        <th>値段</th>
      </tr>
    </thead>
    <tbody>

  <?php

    foreach ($_SESSION["shopping_cart"] as $keys => $values) { ?>


      <tr>
      <td><?php echo htmlspecialchars($values["name"]) ?></td>
      <td><?php echo htmlspecialchars($values["num"]) ?></td>
      <td><?php echo htmlspecialchars($values["price"]) ?></td>
      </tr>


      <?php $total_price = $total_price + $values["price"] * $values["num"]; ?>



  <?php

}//end foreach

   ?>


     <tr>
     <td></td>
     <td><strong>合計金額</strong></td>
     <td class="text-danger"><strong><?php echo $total_price ?>円</strong></td>
     </tr>
   </tbody>
  </table>

  <h1>お客様情報</h1>

  <form class="m-5" id="buy_form">
    <span id="name-error" class="text-danger"></span>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">名前</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="form-username" placeholder="名前">
      </div>
    </div>


      <span id="addres-error" class="text-danger"></span>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">住所</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="form-addres" placeholder="住所">
      </div>
    </div>

    <div class="form-group row">
      <span id="email-error"></span>
      <label for="staticEmail" class="col-sm-3 col-form-label">メールアドレス</label>
      <div class="col-sm-9">
        <input type="email" name="email" class="form-control" id="form-email" placeholder="メールアドレス" />
      </div>
    </div>


    <span id="email-error2" class="text-danger"></span>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">メールアドレス(再入力)</label>
      <div class="col-sm-9">
        <input type="email" name="email" class="form-control" id="form-email2" placeholder="メールアドレス(再入力)" />
      </div>
    </div>

    <div class="form-group">
      <button type="submit" action="" class="btn btn-info" id="checkout">注文確定する</button>
    </div>


  </form>



</div>





<script>
$(document).ready(function(){


  reflesh_cart();

  //カートの内容を更新する
  function reflesh_cart(){
    $.ajax({
      url:"cart_detail.php",
      method:"post",
      dataType:"json",
      success:function(data){
        $('#cart_detail').html(data.cart_detail_html);
        $('#total_price').html(data.total_price);
      }
    });
  }

  //カートを空にするボタンを押したとき
  $(document).on('click','.delete-cart',function(){
    $.ajax({
        url:"clear_cart.php",
        method:"post",
        success:function(data){
          reflesh_cart();
        }
    });
  });



  /////////////
  //エンターキーを押したときにイベントが発火するのを防ぐ
  /////////////
  $('#form-username,#form-addres,#form-email').on('keypress',function(event){
       //エンターキーでボタンの押下イベントというのは消す
       if(event.which === 13){
         event.preventDefault();
       }
   });



    　//変数の用意
     var username_error = true;
     var addres_error = true;
     //メールアドレスの形式はhtmlのフォームでバリデーション機能がある
     var emial_error = true;



     $("#name-error").hide();
     $("#addres-error").hide();
     $("#email-error2").hide();



  //名前の確認
  $("#form-username").focusout(function(){
    check_name();
  });

  function check_name(){

    //空白チェック
    if($("#form-username").val().match(/^[ 　\r\n\t]*$/) || $("#form-username").val().match(/[<(.*)>.*<\/\1>]/)){
      username_error = true;
      $("#name-error").html("不正な文字列が含まれています");
      $("#name-error").show();
      return;
    }

    var length = $('#form-username').val().length;
    if(length === 0){
      username_error = true;
      $("#name-error").html("必須項目です");
      $("#name-error").show();
      return;
    }

    if(length < 2 || length > 20){
      $("#name-error").html("名前は２文字以上２０文字以内で入力していください");
      $("#name-error").show();
      username_error = true;
    }else{
      $("#name-error").hide();
      username_error = false;
    }
  }

  //住所の確認
  $("#form-addres").focusout(function(){
    check_addres();
  });

  function check_addres(){

    if($("#form-addres").val().match(/[<(.*)>.*<\/\1>]/)){
      $("#addres-error").html("不正な文字が入っています");
      $("#addres-error").show();
      addres_error = true;
      return;
    }

    var length = $("#form-addres").val().length;
    if(length < 5){
      $("#addres-error").html("住所の入力に不備があります");
      $("#addres-error").show();
      addres_error = true;
    }else{
      $("#addres-error").hide();
      addres_error = false;
    }
  }


  //メールアドレスの確認
  $("#form-email2").focusout(function(){
    check_email();
  });

  function check_email(){


    var email1 = $("#form-email").val();
    var email2 = $("#form-email2").val();

    if(email2.length === 0){
      email_error = true;
      $("#email-error2").html("メールアドレスが入力されていません");
      $("#email-error2").show();
      return;
    }

    if(email1 != email2){
      $("#email-error2").html("メールアドレスが一致しません");
      $("#email-error2").show();
      email_error = true;
      return;
    }else{
      $("#email-error2").hide();
      email_error = false;
    }
  }


  //最終的にボタンが押せるかどうか確認する
  $("#buy_form").submit(function(){
    //再度チェックする
    check_name();
    check_addres();
    check_email();

    if(username_error == false && email_error == false && addres_error == false){
      return true;
    }else{
      return false;
    }

  });




});

</script>

</body>
</html>
