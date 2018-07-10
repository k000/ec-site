
<!-- モーダルの設定 -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">新規画像アップロード</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>




      <div id="cart_detail">
        <div class="pt-3 text-center">

          <P>画像ファイル名は商品名と同じにしてください。(jpgのみ)</P>

          <form method="post" action="admin-uploader.php" enctype="multipart/form-data">
            <div class="form-group">
              <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" name="upload" class="btn btn-success delete-cart">アップロードする</button>

          </form>


        </div>
      </div>

      <div class="modal-footer">


          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>




      </div><!-- /.modal-footer -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
