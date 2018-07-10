<?php
require_once('header.php');
//カートの中身を表示する
require_once('cart_modal.php');
 ?>



<div class="container mt-5">
 <h1 class="text-center m-5">新着商品</h1>


<?php

require ('dbinfo.php');
$con = get_db();
$state = $con->query("select * from product order by id desc");
$products = $state->fetchAll();

?>
<div class="product-wrapper">
<?php
foreach($products as $product){ ?>


    <div class="product-container mt-4">
      <?php echo out_img($product['name']) ?>
      <P><?php echo $product['name'] ?></P>
      <P><?php echo $product['text'] ?></P>
      <div class="price">
        <strong><?php echo $product['price'] ?>円</strong><br />
        <!-- セッション保存 -->
        <input type="hidden" class="product-name" value="<?php echo $product['name'] ?>">
        <input type="hidden" class="product-price" value="<?php echo $product['price'] ?>">
        <input type="hidden" value="<?php $product['id'] ?>" />
        <select class="form-group" name="num">
          <?php for($i = 1; $i <=9; $i++) echo "<option>$i</option>" ?>
        </select>
        <button type="submit" id="<?php echo $product['id'] ?>" class="btn btn-info add-item">カートに入れる</button>
      </div>
    </div>



<?php
}
?>
</div>
</div>












<script>
$(document).ready(function(){

  //まずはカートの中身をロードさせる
  reflesh_cart();


  //カートに入れるボタンの押下時の処理
  //add-itemではセッションに追加したアイテムの情報を保存する
  $(document).on('click','.add-item',function(){
    //商品IDの取得
    var id = $(this).attr("id");
    //商品名の取得
    var name = $(this).parent().find(".product-name").val();
    //値段の取得
    var price = $(this).parent().find(".product-price").val();
    //個数の取得
    var num = $(this).parent().find('[name=num]').val();
    //postで識別するための変数
    var action = "addcart";

    $.ajax({
      url:"cart.php",
      method:"post",
      //postで送る内容
      data:{id:id, name:name, price:price, num:num,action:action},
      success:function(data){
        //alert('カートに追加しました');
        reflesh_cart();
      }
    });

  });


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


});

</script>

</body>
</html>
