<?php


require_once('admin-header.php');
require_once('admin-add-item.php');
require_once('admin-imageupload-modal.php');



 ?>



<div class="container-fulid text-center mt-5">
   <div class="row">
       <div class="col-12">

         <table class="table table-bordered text-center mb-5">

           <thead class="table-dark">
             <tr>
               <th>商品名</th>
               <th>コメント</th>
               <th>値段</th>
               <th>カテゴリ</th>
               <th>編集</th>
               <th>削除</th>
            </tr>

          </thead>

          <tbody>


           <?php

             require ('dbinfo.php');
             $con = get_db();
             $state = $con->query("select * from product");
             $products = $state->fetchAll();



         foreach($products as $product){ ?>

                <tr>

                  <td>
                    <span><?php echo htmlspecialchars($product["name"]) ?></span>
                    <input type="text" class="editText-name" value="<?php echo htmlspecialchars($product["name"]) ?>">
                  </td>

                  <td>
                    <span><?php echo htmlspecialchars($product["text"]) ?></span>
                    <input type="text" class="editText-text" value="<?php echo htmlspecialchars($product["text"]) ?>">
                  </td>

                  <td>
                    <span><?php echo htmlspecialchars($product["price"]) ?></span>
                    <input type="number" class="editText-price" value="<?php echo htmlspecialchars($product["price"]) ?>">
                  </td>

                  <td>
                    <span><?php echo htmlspecialchars($product["category"]) ?></span>
                    <input type="text" class="editText-category" value="<?php echo htmlspecialchars($product["category"]) ?>">
                  </td>

                  <td>
                    <i class="fas fa-edit editItem" itemno="<?php echo htmlspecialchars($product["id"]) ?>"></i>
                    <i class="fas fa-check text-success saveItem" itemno="<?php echo htmlspecialchars($product["id"]) ?>"></i>
                  </td>
                  <td><i class="fas fa-trash-alt text-danger deleteItem" itemno="<?php echo htmlspecialchars($product["id"]) ?>"></i></td>

                </tr>

          <?php
              }
           ?>

         </tbody>


         </table>

         <button class="btn btn-danger"><span id="logout">ログアウト</span></button>


        </div>
   </div>
</div>


<div id="error"></div>



<script>
$(document).ready(function(){

  /*
  //画像のアップロード
  $('#upload-new_image').on('click',function(){


      var file = $(this).prop('files')[0];
      var fd = new FormData();
      fd.append($(this).attr('name'),file);

      $.ajax({
        url:"admin-uploader.php",
        type:"POST",
        data:fd,
        processData:false,
        contentType:false
      }).done(function(result){

      }).fail(function(){

      });


  });
  */


  //新規商品追加
  $("#register-new_item").on('click',function(){

    var name_length = $('#add-item_name').val().length;
    var text_length = $('#add-item_text').val().length;
    var price_length = $('#add-item_price').val().length;
    var category_length = $('#add-item_category').val().length;



    if(name_length === 0 || text_length === 0 || price_length === 0 || category_length === 0){
      alert("未入力の項目があります");
    }else{
      //postの内容
      var action = "register_item";
      var name = $('#add-item_name').val();
      var text = $('#add-item_text').val();
      var price = $('#add-item_price').val();
      var category = $('#add-item_category').val();

      //登録処理を行う
      $.ajax({
          url:"register-item.php",
          method:"post",
          data:{name:name,text:text,price:price,category:category,action:action},
          success:function(date){
            //現在のページをリロードする
            location.reload();
          }
      });
    }

  });


    //削除マークを押した時
    $(".deleteItem").on('click',function(){
      //yesの時にtrueが帰る
      if(confirm('本当に削除しますか？')){

        var id = $(this).attr("itemno");
        var action = "deleteitem";

        $.ajax({
          url:"admin-delete-item.php",
          method:"post",
          data:{id:id,action:action},
          success:function(date){
            location.reload();
          }
        });

      }//end if

    });


        //編集マークを押した時
        $(".editItem").on('click',function(){

            var parent = $(this).parent().parent();
            parent.find("input").show();
            parent.find("span").hide();
            parent.find(".saveItem").show();
            $(this).hide();


            /*
            var id = $(this).attr("itemno");
            var action = "edititem";

            $.ajax({
              url:"admin-edit-item.php",
              method:"post",
              data:{id:id,action:action},
              success:function(date){
                location.reload();
              }
            });

            */


        });


        $(".saveItem").on("click",function(){
            var parent = $(this).parent().parent();
            var id = $(this).attr("itemno");
            var name = parent.find(".editText-name").val();
            var text = parent.find(".editText-text").val();
            var price = parent.find(".editText-price").val();
            var category = parent.find(".editText-category").val();
            var action = "save_item";

            if(name=="" || text=="" || price=="" || category==""){
              alert("空の項目があります");
              return;
            }

            $.ajax({
              url:"admin-edit-item.php",
              data:{id:id,name:name,text:text,price:price,category:category,action:action},
              method:"post",
              success:function(data){
                location.reload();
              }
            });

        });


        //カートを空にするボタンを押したとき
        $(document).on('click','#logout',function(){
          $.ajax({
              url:"logout.php",
              method:"post",
              success:function(data){
                location.reload();
              }
          });
        });



});

</script>

</body>
</html>
