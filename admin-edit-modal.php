<?php
//カートの内容はモーダルウインドウで表示させます
//フロントエンドの部分
 ?>
<!-- モーダルの設定 -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">新規商品登録</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="cart_detail">

        <div class="pt-3 text-center">
          <form>
            <div class="form-group">
              <input type="text" id="add-item_name" class="form-contorl" placeholder="商品名"/>
            </div>

            <div class="form-group">
              <textarea type="text" id="add-item_text" class="form-contorl" placeholder="コメント"></textarea>
            </div>

            <div class="form-group">
              <input type="number" id="add-item_price" class="form-contorl" placeholder="値段"/>
            </div>

            <div class="form-group">
              <input type="text" id="add-item_category" class="form-contorl" placeholder="カテゴリー"/>
            </div>


          </form>
        </div>

      </div>
      <div class="modal-footer">

          <button type="button" action="post" id="register-new_item" class="btn btn-danger delete-cart">新規登録する</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>


      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
