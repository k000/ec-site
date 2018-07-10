<?php
//カートの内容はモーダルウインドウで表示させます
//フロントエンドの部分
 ?>
<!-- モーダルの設定 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">カートの中身</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="cart_detail">
        <p>モーダルのコンテンツ文。</p>
      </div>
      <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <a href="buy.php"><button type="button" class="btn btn-primary buy">購入する</button></a>
          <button type="button" action="post" class="btn btn-danger delete-cart">カートを空にする</button>

      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
